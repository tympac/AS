<?php
/*
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder

   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbDispositionEmailBase extends fbFieldBase
{
  
  function __construct($form_ptr, &$params)
  {
    parent::__construct($form_ptr, $params);
    $mod                      = formbuilder_utils::GetFB();
    $this->IsDisposition      = TRUE;
    $this->IsEmailDisposition = TRUE;
    $this->ValidationTypes    = array();
  }
  
  // override me!
  function StatusInfo(){}
  
  function TemplateStatus()
  {
    $mod = formbuilder_utils::GetFB();
    if($this->GetOption('email_template', '') == '')
    {
      return $mod->Lang('email_template_not_set');
    }
  }
  
  // override me!
  function DisposeForm($returnid)
  {
    return array(TRUE, '');
  }
  
  // override me as necessary
  function SetFromAddress()
  {
    return TRUE;
  }
  
  // override me as necessary
  function SetFromName()
  {
    return TRUE;
  }
  
  // override me as necessary
  function SetReplyToName()
  {
    return TRUE;
  }
  
  // override me as necessary
  function SetReplyToAddress()
  {
    return TRUE;
  }
  
  // Attach files to the emails
  function AttachFiles($file, $directory, $mail, $mod)
  {
    if( empty($file) )
    {
      audit(-1, 'FormBuilder', 'File name is not provided or invalid' );
      return FALSE;
    }
    
    $fullfilename = cms_join_path($directory, $file);
    
    if( !is_file($fullfilename) )
    {
      audit(-1, 'FormBuilder', 'File is inaccessible: ' . $fullfilename );
      return FALSE;
    }
    
    
    if(function_exists('finfo_open'))
    {
      $finfo    = finfo_open(FILEINFO_MIME); // return mime type ala mimetype extension
      $thisType = finfo_file($finfo, $fullfilename);
      finfo_close($finfo);
    }
    else if(function_exists('mime_content_type'))
    {
      $thisType = mime_content_type($fullfilename);
    }
    else
    {
      $thisType = 'application/octet-stream';
    }
    
    try
    {
      $mail->AddAttachment($fullfilename, basename($file), "base64", $thisType);
    }
    catch(\Exception $e)
    {
      audit(-1, 'FormBuilder', 'Attachment error: ' . $e->getMessage() );
      return FALSE;
    }
    
    return TRUE;
    
//    if(!)
//    {
//      // failed upload kills the send. #not passing this through, so it won't fail the send - ajprog 2015-08-06
//      audit(-1, (isset($name) ? $name : ""), $mod->Lang('submit_error', $mail->GetErrorInfo()));
//
//      return array(
//        $res, $mod->Lang(
//          'upload_attach_error',
//          array($file, $fullfilename, $thisType)
//        )
//      );
//    }
    
  }
  
  // Send off those emails
  function SendForm($destination_array, $subject)
  {
    $mod   = formbuilder_utils::GetFB();
    $form  = $this->form_ptr;
    $files = array();
    
    # the "enable_antispam" prefence has been deprecated and can only be changed on
    # modules\FormBuilder\includes\fb_cnf.inc
    # were we hid a few settings removed from the configurations (JM)
    $fb_config = fb_config::GetInstance();
    
    if($fb_config['enable_antispam'])
    {
      $db    = $mod->GetDb();
      $query = 'select count(src_ip) as sent from ' . cms_db_prefix() .
               'module_fb_ip_log where src_ip=? AND sent_time > ?';
      
      $dbresult = $db->GetOne(
                                  $query, array(
                                  $_SERVER['REMOTE_ADDR'],
                                  trim($db->DBTimeStamp(time() - 3600), "'")
                                )
                              );
      
      if($dbresult > 9)
      {
        // too many from this IP address. Kill it.
        $msg = '<hr />' . $mod->Lang('suspected_spam') . '<hr />';
        audit(-1, $mod->GetName(), $mod->Lang('log_suspected_spam', $_SERVER['REMOTE_ADDR']));
        
        return array(FALSE, $msg);
      }
    }
    
    $mail = new \cms_mailer();
    
    if($mail == FALSE)
    {
      //$msg = '';
      //if (! $mod->GetPreference('hide_errors',0))
      //  {
      $msg = '<hr />' . $mod->Lang('missing_cms_mailer') . '<hr />';
      //  }
      audit(-1, $mod->GetName(), $mod->Lang('missing_cms_mailer'));
      
      return array(FALSE, $msg);
    }
    
    $mail->reset();
    
    $rt = $this->GetOption('email_reply_to_address', '');
    $rn = $this->GetOption('email_reply_to_name', '');
    
    if(empty($rn))
    {
      $rn = $this->GetOption('email_from_name', '');
    }
    
    if($this->SetReplyToAddress() && !empty($rt))
    {
      $mail->AddReplyTo($rt, $this->SetFromName() ? $rn : '');
    }
    
    if($this->SetFromAddress())
    {
      $mail->SetFrom($this->GetOption('email_from_address'));
    }
    
    if($this->SetFromName())
    {
      $mail->SetFromName($this->GetOption('email_from_name'));
    }
    
    $cc = $this->GetOption('email_cc_address', '');
    
    if(!empty($cc))
    {
      $usebcc  = $this->GetOption('use_bcc', 0);
      $sub_ads = explode(',', $cc . ',');
      
      foreach($sub_ads as $this_ad)
      {
        if(!empty($this_ad))
        {
          if($usebcc == 1)
          {
            $mail->AddBCC(trim($this_ad));
          }
          else
          {
            $mail->AddCC(trim($this_ad));
          }
        }
      }
    }
    
    $mail->SetCharSet($this->GetOption('email_encoding', 'utf-8'));
    
    $message   = $this->GetOption('email_template', '');
    $htmlemail = ($this->GetOption('html_email', '0') == '1');
    
    if($this->GetFieldType() == 'DispositionEmailConfirmation')
    {
      $form->AddTemplateVariable('confirm_url', $mod->Lang('title_confirmation_url'));
    }
    
    if($htmlemail)
    {
      $mail->IsHTML(TRUE);
    }
    
    if(strlen($message) < 1)
    {
      $message = $form->createSampleTemplate(FALSE);
      
      if($htmlemail)
      {
        $message2 = $form->createSampleTemplate(TRUE);
      }
    }
    else if($htmlemail)
    {
      $message2 = $message;
    }
    
    $form->setFinishedFormSmarty($htmlemail);
    
    $theFields = $form->GetFields();
    
    for($i = 0, $iMax = count($theFields); $i < $iMax; $i++)
    {
      if(
        (
          strtolower(get_class($theFields[$i])) == 'fbfileuploadfield'
          || strtolower(get_class($theFields[$i])) == 'fbstaticfilefield'
        )
        && !$theFields[$i]->GetOption('suppress_attachment')
        && !$theFields[$i]->GetOption('sendto_uploads')
      )
      {
        if($this->GetOption('file_attachment', '1'))
        {
          $this->AttachFiles(
            $theFields[$i]->GetHumanReadableValue(), $theFields[$i]->GetOption('file_destination', ''), $mail, $mod
          );
        }
        else
        {
          $files[] = array(
            'file'      => $theFields[$i]->GetHumanReadableValue(),
            'directory' => $theFields[$i]->GetOption('file_destination', '')
          );
        }
      }
      
      if(
        strtolower(get_class($theFields[$i])) == 'fbdirectoryscannerfield' &&
        !$theFields[$i]->GetOption('suppress_attachment')
      )
      {
        
        if($this->GetOption('file_attachment', '1'))
        {
          $files = $theFields[$i]->GetHumanReadableValue(FALSE);
          
          if($files)
          {
            foreach($files as $one)
            {
              $tfn = explode('/', $one);
              $this->AttachFiles(end($tfn), $theFields[$i]->get_path(), $mail, $mod);
            }
          }
          
        }
        else
        {
          if(is_array($theFields[$i]->GetHumanReadableValue()))
          {
            $files = $theFields[$i]->GetHumanReadableValue();
          }
        }
        
      }
    }
    
    $message = $mod->ProcessTemplateFromData($message);
    $subject = $mod->ProcessTemplateFromData($subject);
    $mail->SetSubject($subject);
    
    if($htmlemail)
    {
      $message2 = $mod->ProcessTemplateFromData($message2);
      $mail->SetAltBody(strip_tags(html_entity_decode($message)));
      $mail->SetBody($message2);
    }
    else
    {
      $mail->SetBody(html_entity_decode($message));
    }
    
    // send the message...
    if(!is_array($destination_array))
    {
      $destination_array = array($destination_array);
    }
    
    foreach($destination_array as $thisDest)
    {
      if(strpos($thisDest, ',') !== FALSE)
      {
        $sub_ads = explode(',', $thisDest);
        
        foreach($sub_ads as $this_ad)
        {
          if( !email_validator::is_email($this_ad) ) continue;
          
          if($this->GetOption('send_using', 'to') == 'to')
          {
            $mail->AddAddress(trim($this_ad));
          }
          else if($this->GetOption('send_using') == 'cc')
          {
            $mail->AddCC(trim($this_ad));
          }
          else
          {
            $mail->AddBCC(trim($this_ad));
          }
        }
      }
      else
      {
        if( !email_validator::is_email($thisDest) ) continue;
        
        if($this->GetOption('send_using', 'to') == 'to')
        {
          $mail->AddAddress(trim($thisDest));
        }
        else if($this->GetOption('send_using') == 'cc')
        {
          $mail->AddCC(trim($thisDest));
        }
        else
        {
          $mail->AddBCC(trim($thisDest));
        }
      }
    }
    
    try
    {
      $res = $mail->Send();
    }
    catch(\Exception $e)
    {
      # we prevent FB from just dying...
      # TODO improve the whole handling of the errors
    }
    
    if($res === FALSE)
    {
      audit(-1, (isset($name) ? $name : ""), $mod->Lang('submit_error', $mail->GetErrorInfo()));
    }
    else if($mod->GetPreference('enable_antispam', 1))
    {
      $db = $mod->GetDb();
      
      $rec_id = $db->GenID(cms_db_prefix() . 'module_fb_ip_log_seq');
      
      $query = 'INSERT INTO '
               . cms_db_prefix()
               . 'module_fb_ip_log (sent_id, src_ip, sent_time) VALUES (?, ?, ?)';
      
      $dbresult = $db->Execute(
        $query, array(
        $rec_id, $_SERVER['REMOTE_ADDR'],
        trim($db->DBTimeStamp(time()), "'")
      )
      );
    }
    
    if(trim($this->GetOptionRef('sendcopy')) != FALSE)
    {
      $mail->ClearAllRecipients();
      $mail->AddAddress(trim($this->GetOptionRef('sendcopy')));
      if($this->GetOption('sendcopy_attach_files', '1'))
      {
        foreach($files as $onefile)
        {
          $this->AttachFiles($onefile['file'], $onefile['directory'], $mail, $mod);
        }
      }
  
      try
      {
        $res = $mail->Send();
      }
      catch(\Exception $e)
      {
        # we prevent FB from just dying...
        # TODO improve the whole handling of the errors
      }
      
      if($res === FALSE)
      {
        audit(-1, (isset($name) ? $name : ""), $mod->Lang('submit_error', $mail->GetErrorInfo()));
      }
    }
    
    $toReturn = array($res, $mail->GetErrorInfo());
    $mail->reset();
    
    return $toReturn;
  }
  
  function PrePopulateAdminFormBase($formDescriptor)
  {
    $mod     = formbuilder_utils::GetFB();
    $message = $this->GetOption('email_template', '');
    
    $parm                                      = array();
    $parm['opt_email_template']['html_button'] = TRUE;
    $parm['opt_email_template']['text_button'] = TRUE;
    $parm['opt_email_template']['is_email']    = TRUE;
    
    if($this->GetFieldType() == 'DispositionEmailConfirmation')
    {
      $this->form_ptr->AddTemplateVariable('confirm_url', $mod->Lang('title_confirmation_url'));
    }
    
    return array(
      array(
        array(
          $mod->Lang('title_email_subject'), $mod->CreateInputText(
               $formDescriptor, 'fbrp_opt_email_subject', $this->GetOption('email_subject', ''), 50
             ) . '<br/>' . $mod->Lang('canuse_smarty')
        ),
        array(
          $mod->Lang('title_send_using'), $mod->CreateInputDropdown(
          $formDescriptor, 'fbrp_opt_send_using',
          array($mod->Lang('to_field') => 'to', $mod->Lang('cc_field') => 'cc', $mod->Lang('bcc_field') => 'bcc'), -1,
          $this->getOption('send_using')
        )
        ),
        array(
          $mod->Lang('title_email_from_name'), $mod->CreateInputText(
          $formDescriptor, 'fbrp_opt_email_from_name', $this->GetOption('email_from_name', $mod->Lang('friendlyname')),
          25, 128
        )
        ),
        array(
          $mod->Lang('title_email_from_address'), $mod->CreateInputText(
               $formDescriptor, 'fbrp_opt_email_from_address', $this->GetOption('email_from_address', ''), 25, 128
             ) . '<br />' .
                                                  $mod->Lang('email_from_addr_help', array($_SERVER['SERVER_NAME']))
        ),
        array(
          $mod->Lang('title_email_cc_address'), $mod->CreateInputText(
          $formDescriptor, 'fbrp_opt_email_cc_address', $this->GetOption('email_cc_address', ''), 25, 128
        )
        ),
        array(
          $mod->Lang('title_use_bcc'),
          $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_use_bcc', '0') . $mod->CreateInputCheckbox(
            $formDescriptor, 'fbrp_opt_use_bcc',
            '1', $this->GetOption('use_bcc', '0')
          )
        ),
      ),
      array(
        array(
          $mod->Lang('title_html_email'),
          $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_html_email', '0') . $mod->CreateInputCheckbox(
            $formDescriptor, 'fbrp_opt_html_email',
            '1', $this->GetOption('html_email', '0')
          )
        ),
        array(
          $mod->Lang('title_file_attachment'),
          $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_file_attachment', '0') . $mod->CreateInputCheckbox(
            $formDescriptor, 'fbrp_opt_file_attachment',
            '1', $this->GetOption('file_attachment', '1')
          )
        ),
        array(
          $mod->Lang('title_email_template'),
          array(
            $mod->CreateTextArea(
              FALSE, $formDescriptor,
              /*($this->GetOption('html_email','0')=='1'?$message:htmlspecialchars($message))*/
              $message, 'fbrp_opt_email_template', 'module_fb_area_wide', '', '', '', '80', '15', '', 'html'
            ),
            $this->form_ptr->AdminTemplateHelp($formDescriptor, $parm)
          )
        ),
        array(
          $mod->Lang('title_email_encoding'), $mod->CreateInputText(
          $formDescriptor, 'fbrp_opt_email_encoding', $this->GetOption('email_encoding', 'utf-8'), 25, 128
        )
        )
      )
    );
  }
  
  function validateEmailAddr($email)
  {
    $mod     = formbuilder_utils::GetFB();
    $ret     = TRUE;
    $message = '';
    
    if(strpos($email, ',') !== FALSE)
    {
      $ta = explode(',', $email);
    }
    else
    {
      $ta = array($email);
    }
    
    foreach($ta as $to)
    {
      if(!email_validator::is_email($to))
      {
        $ret     = FALSE;
        $message .= $mod->Lang('not_valid_email', $to);
      }
    }
    
    return array($ret, $message);
  }
  
}

// EOF
?>
