<?php
/* 
   FormBuilder. Copyright (c) 2005-2008 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2008 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbForm
{
  
  var     $module_ptr = -1; // deprecated, to be removed (Jo Morg)
  private $_module_id = -1; // added as a dirty solution to be able to override $this->module_ptr->module_id (Jo Morg)
  // but doesn't seem to be needed, so....
  var $module_params  = -1;
  var $Id             = -1;
  var $Name           = '';
  var $Alias          = '';
  var $loaded         = 'not';
  var $formTotalPages = 0;
  var $Page;
  var $Attrs;
  var $Fields;
  var $formState;
  var $sampleTemplateCode;
  var $templateVariables;
  
  /*********************** private methods ***********************************************/
  
  /**
   * are we expanding or shrinking a field?
   *
   * @param mixed $params
   *
   * @return bool
   */
  private function _IsFieldExpandOp(&$params)
  {
    foreach($params as $pKey => $pVal)
    {
      if(substr($pKey, 0, 9) == 'fbrp_FeX_' || substr($pKey, 0, 9) == 'fbrp_FeD_')
      {
        // expanding or shrinking a field
        // we just break the loop here: no need to go on after the 1st occurrence
        return TRUE;
      }
    }
    
    return FALSE;
  }
  
  /*********************** public methods ***********************************************/
  
  function __construct($module_ptr = NULL, &$params = NULL, $loadDeep = FALSE, $loadResp = FALSE)
  {
    //$this->module_ptr = $module_ptr; // we are going to ignore $module_ptr from now on (JM)
    // reverted to this as the class 'formbuilder_utils' is already loaded here by an explicit call on the module - needs testing though(JM)
    $this->module_ptr    = formbuilder_utils::GetFB();
    $fb                  = $this->module_ptr;
    $this->_module_id    = $fb->module_id;
    $this->module_params = $params;
    $this->Fields        = [];
    $this->Attrs         = [];
    $this->formState     = 'new';
    
    // Stikki adding: $id overwrite possible with $param  (to be used were? [Jo Morg])
    //    if ((!isset($this->module_ptr->module_id) || empty($this->module_ptr->module_id)) && isset($params['module_id']))
    //    {
    //      $this->module_ptr->module_id = $params['module_id'];
    //    }
    
    # alternative method just in case
    if((empty($this->_module_id)) && !empty($params['module_id']))
    {
      $this->_module_id = $params['module_id'];
      $fb->module_id    = $params['module_id']; # this shouldn't even work, but.... (Jo Morg)
    }
    
    if(isset($params['form_id']))
    {
      $this->Id = $params['form_id'];
    }
    
    if(isset($params['fbrp_form_alias']))
    {
      $this->Alias = $params['fbrp_form_alias'];
    }
    
    if(isset($params['fbrp_form_name']))
    {
      $this->Name = $params['fbrp_form_name'];
    }
    
    if($this->_IsFieldExpandOp($params))
    {
      $params['fbrp_done'] = 0;
      
      if(isset($params['fbrp_continue']))
      {
        $this->Page = $params['fbrp_continue'] - 1;
      }
      else
      {
        $this->Page = 1;
      }
    }
    else
    {
      if(isset($params['fbrp_continue']))
      {
        $this->Page = $params['fbrp_continue'];
      }
      else
      {
        $this->Page = 1;
      }
      
      if(isset($params['fbrp_prev']) && isset($params['fbrp_previous']))
      {
        $this->Page          = $params['fbrp_previous'];
        $params['fbrp_done'] = 0;
      }
    }
    
    $this->formTotalPages = 1;
    
    if(isset($params['fbrp_done']) && $params['fbrp_done'] == 1)
    {
      $this->formState = 'submit';
    }
    
    if(isset($params['fbrp_user_form_validate']) && $params['fbrp_user_form_validate'] == TRUE)
    {
      $this->formState = 'confirm';
    }
    
    if($this->Id != -1)
    {
      
      if(isset($params['response_id']) && $this->formState == 'submit')
      {
        $this->formState = 'update';
      }
      
      $this->Load($this->Id, $params, $loadDeep, $loadResp);
    }
    
    foreach($params as $thisParamKey => $thisParamVal)
    {
      
      if(substr($thisParamKey, 0, 11) == 'fbrp_forma_')
      {
        $thisParamKey               = substr($thisParamKey, 11);
        $this->Attrs[$thisParamKey] = $thisParamVal;
      }
      else if($thisParamKey == 'fbrp_form_template' && $this->Id != -1)
      {
        $fb->SetTemplate('fb_' . $this->Id, $thisParamVal);
      }
    }
    
    $this->templateVariables = [
      '{$sub_form_name}' => $fb->Lang('title_form_name'),
      '{$sub_date}'      => $fb->Lang('help_submission_date'),
      '{$sub_host}'      => $fb->Lang('help_server_name'),
      '{$sub_source_ip}' => $fb->Lang('help_sub_source_ip'),
      '{$sub_url}'       => $fb->Lang('help_sub_url'),
      '{$fb_version}'    => $fb->Lang('help_fb_version'),
      '{$TAB}'           => $fb->Lang('help_tab'),
    ];
    
  } // end of __construct()
  
  function SetAttributes($attrArray)
  {
    $this->Attrs = array_merge($this->Attrs, $attrArray);
  }
  
  function SetTemplate($template)
  {
    $fb                           = formbuilder_utils::GetFB();
    $this->Attrs['form_template'] = $template;
    $fb->SetTemplate('fb_' . $this->Id, $template);
  }
  
  function GetId()
  {
    return $this->Id;
  }
  
  function SetId($id)
  {
    $this->Id = $id;
  }
  
  function GetName()
  {
    return $this->Name;
  }
  
  function GetFormState()
  {
    return $this->formState;
  }
  
  function GetPageCount()
  {
    return $this->formTotalPages;
  }
  
  function GetPageNumber()
  {
    return $this->Page;
  }
  
  function PageBack()
  {
    $this->Page--;
  }
  
  function SetName($name)
  {
    $this->Name = $name;
  }
  
  function GetAlias()
  {
    return $this->Alias;
  }
  
  function SetAlias($alias)
  {
    $this->Alias = $alias;
  }
  
  /**
   * dump params
   *
   * @param mixed $params
   */
  function DebugDisplay($params = [])
  {
    # we are no longer using $this->module_ptr (Jo Morg)
    //$tmp = $this->module_ptr;
    $this->module_ptr = '[mdptr]';
    
    if(isset($params['FORM']))
    {
      $fpt            = $params['FORM'];
      $params['FORM'] = '[form_pointer]';
    }
    
    $template_tmp = $this->GetAttr('form_template', '');
    $this->SetAttr('form_template', strlen($template_tmp) . ' characters');
    $field_tmp    = $this->Fields;
    $this->Fields = 'Field Array: ' . count($field_tmp);
    debug_display($this);
    $this->SetAttr('form_template', $template_tmp);
    $this->Fields = $field_tmp;
    
    foreach($this->Fields as $fld)
    {
      $fld->DebugDisplay();
    }
    //$this->module_ptr = $tmp;
  }
  
  
  function SetAttr($attrname, $val)
  {
    $this->Attrs[$attrname] = $val;
  }
  
  function GetAttr($attrname, $default = '')
  {
    if(isset($this->Attrs[$attrname]))
    {
      return $this->Attrs[$attrname];
    }
    else
    {
      return $default;
    }
  }
  
  function GetFieldCount()
  {
    return count($this->Fields);
  }
  
  function HasFieldNamed($name)
  {
    $ret = -1;
    
    foreach($this->Fields as $fld)
    {
      if($fld->GetName() == $name)
      {
        $ret = $fld->GetId();
      }
    }
    
    return $ret;
  }
  
  function AddTemplateVariable($name, $def)
  {
    $theKey                           = '{$' . $name . '}';
    $this->templateVariables[$theKey] = $def;
  }
  
  /**
   * deprecated
   *
   * @param mixed $fieldName
   * @param mixed $button_text
   * @param mixed $suffix
   */
  function createSampleTemplateJavascript($fieldName = 'opt_email_template', $button_text = '', $suffix = '')
  {
    return formbuilder_utils::createSampleTemplateJavascript($fieldName, $button_text, $suffix);
  }
  
  
  function fieldValueTemplate()
  {
    $mod    = formbuilder_utils::GetFB();
    $ret    = '<table class="module_fb_legend"><tr><th colspan="2">' . $mod->Lang('help_variables_for_computation') .
              '</th></tr>';
    $ret    .= '<tr><th>' . $mod->Lang('help_php_variable_name') . '</th><th>' . $mod->Lang('help_form_field') .
               '</th></tr>';
    $odd    = FALSE;
    $others = $this->GetFields();
    
    for($i = 0; $i < count($others); $i++)
    {
      // Removed by Stikki: BUT WHY?
      //if (!$others[$i]->HasMultipleFormComponents())
      //{
      $ret .= '<tr><td class="' . ($odd ? 'odd' : 'even') . '">$fld_' . $others[$i]->GetId() . '</td><td class="' .
              ($odd ? 'odd' : 'even') . '">' . $others[$i]->GetName() . '</td></tr>';
      //}
      $odd = !$odd;
    }
    
    return $ret;
  }
  
  function createSampleTemplate($htmlish = FALSE, $email = TRUE, $oneline = FALSE, $header = FALSE, $footer = FALSE)
  {
    $mod = formbuilder_utils::GetFB();
    $ret = "";
    
    if($email)
    {
      if($htmlish)
      {
        $ret .= "<h1>" . $mod->Lang('email_default_template') . "</h1>\n";
      }
      else
      {
        $ret .= $mod->Lang('email_default_template') . "\n";
      }
      
      foreach($this->templateVariables as $thisKey => $thisVal)
      {
        if($htmlish)
        {
          $ret .= '<strong>' . $thisVal . '</strong>: ' . $thisKey . "<br />";
        }
        else
        {
          $ret .= $thisVal . ': ' . $thisKey;
        }
        
        $ret .= "\n";
      }
      if($htmlish)
      {
        $ret .= "\n<hr />\n";
      }
      else
      {
        $ret .= "\n-------------------------------------------------\n";
      }
    }
    else if(!$oneline)
    {
      if($htmlish)
      {
        $ret .= '<h2>';
      }
      
      $ret .= $mod->Lang('thanks');
      
      if($htmlish)
      {
        $ret .= '</h2>';
      }
    }
    else if($footer)
    {
      $ret .= '------------------------------------------\nEOF\n';
      
      return $ret;
    }
    
    $others = $this->GetFields();
    
    for($i = 0; $i < count($others); $i++)
    {
      if($others[$i]->DisplayInSubmission())
      {
        if($others[$i]->GetAlias() != '')
        {
          $fldref = $others[$i]->GetAlias();
        }
        else
        {
          $fldref = 'fld_' . $others[$i]->GetId();
        }
        
        $ret    .= '{if $' . $fldref . ' != "" && $' . $fldref . ' != "' .
                   $this->GetAttr('unspecified', $mod->Lang('unspecified')) . '" }';
        $fldref = '{$' . $fldref . '}';
        
        if($htmlish)
        {
          $ret .= '<strong>' . $others[$i]->GetName() . '</strong>: ' . $fldref . "<br />";
        }
        else if($oneline && !$header)
        {
          $ret .= $fldref . '{$TAB}';
        }
        else if($oneline && $header)
        {
          $ret .= $others[$i]->GetName() . '{$TAB}';
        }
        else
        {
          $ret .= $others[$i]->GetName() . ': ' . $fldref;
        }
        $ret .= "{/if}\n";
      }
    }
    
    /* Stikki says: Don't see any use for this, correct me if i'm wrong.
     if ($oneline)
     {
     $ret = substr($ret,0,strlen($ret) - 6). "\n";
     }
   */
    
    return $ret;
  }
  
  
  //  function AdminTemplateHelp($formDescriptor,$fields='opt_email_template',
  //  	$includeHTML=true, $includeText=true, $oneline = false, $headerName='')
  function AdminTemplateHelp($formDescriptor, $fieldStruct)
  {
    $mod = formbuilder_utils::GetFB();
    
    $ret = '<table class="module_fb_legend"><tr><th colspan="2">'
           . $mod->Lang('help_variables_for_template')
           . '</th></tr>';
    
    $ret .= '<tr><th>'
            . $mod->Lang('help_variable_name')
            . '</th><th>'
            . $mod->Lang('help_form_field')
            . '</th></tr>';
    
    $odd = FALSE;
    
    foreach($this->templateVariables as $thisKey => $thisVal)
    {
      $ret .= '<tr><td class="'
              . ($odd ? 'odd' : 'even')
              . '">'
              . $thisKey
              . '</td><td class="'
              . ($odd ? 'odd' : 'even')
              . '">'
              . $thisVal
              . '</td></tr>';
      
      $odd = !$odd;
    }
    
    $others = $this->GetFields();
    
    for($i = 0; $i < count($others); $i++)
    {
      if($others[$i]->DisplayInSubmission())
      {
        $ret .= '<tr><td class="'
                . ($odd ? 'odd' : 'even')
                . '">{$'
                . $others[$i]->GetVariableName()
                . '} / {$fld_'
                . $others[$i]->GetId() . '}';
        
        if($others[$i]->GetAlias() != '')
        {
          $ret .= ' / {$' . $others[$i]->GetAlias() . '}';
        }
        
        $ret .= '</td><td class="'
                . ($odd ? 'odd' : 'even')
                . '">'
                . $others[$i]->GetName()
                . '</td></tr>';
        $odd = !$odd;
      }
    }
    
    $ret .= '<tr><td colspan="2">' . $mod->Lang('help_array_fields') . '</td></tr>';
    $ret .= '<tr><td colspan="2">' . $mod->Lang('help_other_fields') . '</td></tr>';
    
    $sampleTemplateCode = '';
    foreach($fieldStruct as $key => $val)
    {
      $html_button = (isset($val['html_button']) && $val['html_button']);
      $text_button = (isset($val['text_button']) && $val['text_button']);
      $is_oneline  = (isset($val['is_oneline']) && $val['is_oneline']);
      $is_email    = (isset($val['is_email']) && $val['is_email']);
      $is_header   = (isset($val['is_header']) && $val['is_header']);
      $is_footer   = (isset($val['is_footer']) && $val['is_footer']);
      
      if($html_button)
      {
        $button_text = $mod->Lang('title_create_sample_html_template');
      }
      else if($is_header)
      {
        $button_text = $mod->Lang('title_create_sample_header_template');
      }
      else if($is_footer)
      {
        $button_text = $mod->Lang('title_create_sample_footer_template');
      }
      else
      {
        $button_text = $mod->Lang('title_create_sample_template');
      }
      
      if($html_button && $text_button)
      {
        $sample             = $this->createSampleTemplate(FALSE, $is_email, $is_oneline, $is_header, $is_footer);
        $sample             = preg_replace('/\'/', "\\'", $sample);
        $sample             = preg_replace('/\n/', "\\n'+\n'", $sample);
        $sampleTemplateCode .= preg_replace(
          '/\|TEMPLATE\|/', "'" . $sample . "'",
          $this->createSampleTemplateJavascript($key, $mod->Lang('title_create_sample_template'), 'text')
        );
      }
      
      $sample = $this->createSampleTemplate($html_button, $is_email, $is_oneline, $is_header, $is_footer);
      $sample = preg_replace('/\'/', "\\'", $sample);
      $sample = preg_replace('/\n/', "\\n'+\n'", $sample);
      
      $sampleTemplateCode .= preg_replace(
        '/\|TEMPLATE\|/', "'" . $sample . "'",
        $this->createSampleTemplateJavascript($key, $button_text)
      );
    }
    
    $sampleTemplateCode = preg_replace('/ID/', $formDescriptor, $sampleTemplateCode);
    $ret                .= '<tr><td colspan="2">' . $sampleTemplateCode . '</td></tr>';
    $ret                .= '</table>';
    
    return $ret;
  }
  
  function Validate()
  {
    $gCms          = cmsms();
    $validated     = TRUE;
    $message       = [];
    $formPageCount = 1;
    $valPage       = $this->Page - 1;
    
    for($i = 0, $iMax = count($this->Fields); $i < $iMax; $i++)
    {
      if($this->Fields[$i]->GetFieldType() == 'PageBreakField')
      {
        $formPageCount++;
      }
      
      if($valPage != $formPageCount)
      {
        continue;
      }
      
      $deny_space_validation = (formbuilder_utils::GetFB()->GetPreference('blank_invalid', '0') == '1');
      
      if($this->Fields[$i]->IsRequired() && $this->Fields[$i]->HasValue($deny_space_validation) === FALSE)
      {
        array_push($message, formbuilder_utils::GetFB()->Lang('please_enter_a_value', $this->Fields[$i]->GetName()));
        $validated = FALSE;
        $this->Fields[$i]->SetOption('is_valid', FALSE);
        $this->Fields[$i]->validationErrorText = formbuilder_utils::GetFB()->Lang(
          'please_enter_a_value', $this->Fields[$i]->GetName()
        )
        ;
        $this->Fields[$i]->validated           = FALSE;
      }
      else if($this->Fields[$i]->GetValue() != formbuilder_utils::GetFB()->Lang('unspecified'))
      {
        $res = $this->Fields[$i]->Validate();
        
        if($res[0] != TRUE)
        {
          array_push($message, $res[1]);
          $validated = FALSE;
          $this->Fields[$i]->SetOption('is_valid', FALSE);
        }
        else
        {
          $this->Fields[$i]->SetOption('is_valid', TRUE);
        }
      }
    }
    
    /**
     *  UDTs and Simple plugins changes (JM)
     */
    
    $udt    = $this->GetAttr('validate_udt', '');
    $unspec = $this->GetAttr('unspecified', formbuilder_utils::GetFB()->Lang('unspecified'));
    
    if($validated == TRUE && !empty($udt) && "-1" != $udt)
    {
      $parms  = $params;
      $others = $this->GetFields();
      
      for($i = 0, $iMax = count($others); $i < $iMax; $i++)
      {
        $replVal = '';
        
        if($others[$i]->DisplayInSubmission())
        {
          $replVal = $others[$i]->GetHumanReadableValue();
          
          if($replVal == '')
          {
            $replVal = $unspec;
          }
        }
        
        $name                = $others[$i]->GetVariableName();
        $parms[$name]        = $replVal;
        $id                  = $others[$i]->GetId();
        $parms['fld_' . $id] = $replVal;
        $alias               = $others[$i]->GetAlias();
        
        if(!empty($alias))
        {
          $parms[$alias] = $replVal;
        }
      }
      
      $udt_handler_pref = formbuilder_utils::GetFB()->GetPreference('udt_handler_pref', 'core_udts');
      $udt_done         = FALSE;
      
      if(!formbuilder_utils::is_CMS2_3())
      {
        if($udt_handler_pref == 'core_udts')
        {
          $res      = $gCms->GetUserTagOperations()->CallUserTag($udt, $parms);
          $udt_done = TRUE;
        }
      }
      else
      {
        if($udt_handler_pref == 'core_sps')
        {
          $res      = $gCms->GetSimplePluginOperations()->call_plugin($udt, $parms);
          $udt_done = TRUE;
        }
      }
      
      if(!$udt_done)
      {
        $UDTsHandler = \cms_utils::get_module($udt_handler_pref);
        
        if(is_object($UDTsHandler))
        {
          $UserTagOperations = $UDTsHandler->GetUserTagOperations();
          $res               = $UserTagOperations->CallUserTag($udt, $parms);
        }
        else
        {
          # throw an error here? (JM)
        }
      }
      
      if($res[0] != TRUE)
      {
        array_push($message, $res[1]);
        $validated = FALSE;
      }
    }
    
    return [$validated, $message];
  }
  
  
  function HasDisposition()
  {
    $hasDisp = FALSE;
    for($i = 0, $iMax = count($this->Fields); $i < $iMax; $i++)
    {
      if($this->Fields[$i]->IsDisposition())
      {
        $hasDisp = TRUE;
      }
    }
    
    return $hasDisp;
  }
  
  // return an array: element 0 is true for success, false for failure
  // element 1 is an array of reasons, in the event of failure.
  function Dispose($returnid, $suppress_email = FALSE)
  {
    // first, we run all field methods that will modify other fields
    $computes = [];
    for($i = 0, $iMax = count($this->Fields); $i < $iMax; $i++)
    {
      if($this->Fields[$i]->ModifiesOtherFields())
      {
        $this->Fields[$i]->ModifyOtherFields();
      }
      
      if($this->Fields[$i]->ComputeOnSubmission())
      {
        $computes[$i] = $this->Fields[$i]->ComputeOrder();
      }
    }
    
    asort($computes);
    
    foreach($computes as $cKey => $cVal)
    {
      $this->Fields[$cKey]->Compute();
    }
    
    $resArray = [];
    $retCode  = TRUE;
    
    // for each form disposition pseudo-field, dispose the form results
    for($i = 0, $iMax = count($this->Fields); $i < $iMax; $i++)
    {
      if($this->Fields[$i]->IsDisposition() && $this->Fields[$i]->DispositionIsPermitted())
      {
        if(!($suppress_email && $this->Fields[$i]->IsEmailDisposition()))
        {
          $res = $this->Fields[$i]->DisposeForm($returnid);
          
          if($res[0] === FALSE)
          {
            $retCode = FALSE;
            array_push($resArray, $res[1]);
          }
        }
      }
    }
    
    // handle any last cleanup functions
    for($i = 0, $iMax = count($this->Fields); $i < $iMax; $i++)
    {
      $this->Fields[$i]->PostDispositionAction();
    }
    
    return [$retCode, $resArray];
  }
  
  function RenderFormHeader()
  {
    if(formbuilder_utils::GetFB()->GetPreference('show_version', 0) == 1)
    {
      return "\n<!-- Start FormBuilder Module (" . formbuilder_utils::GetFB()->GetVersion() . ") -->\n";
    }
  }
  
  function RenderFormFooter()
  {
    if(formbuilder_utils::GetFB()->GetPreference('show_version', 0) == 1)
    {
      return "\n<!-- End FormBuilder Module -->\n";
    }
  }
  
  
  // returns a string.
  function RenderForm($id, &$params, $returnid)
  {
    // Check if form id given
    $mod = formbuilder_utils::GetFB();
    
    /**
     * This needs revisiting
     * All three work but raise different issues
     * for now I'll revert this (this is frontend only)
     * to 8.0 (pre CMSMS 2.0 working code)
     * "$mod->smarty;"
     * (JM)
     */
    //$smarty = \cms_utils::get_smarty();
    //$smarty = $mod->GetActionTemplateObject();
    $smarty = $mod->smarty;
    
    # minor fix to remove core dependency
    $replacement_inc = cms_join_path($mod->GetModulePath(), 'includes', 'replacement.inc');
    include($replacement_inc);
    
    if($this->Id == -1)
    {
      return "<!-- no form -->\n";
    }
    
    // Check if show full form
    if($this->loaded != 'full')
    {
      $this->Load($this->Id, $params, TRUE);
    }
    
    // Usual crap
    $reqSymbol = $this->GetAttr('required_field_symbol', '*');
    
    $smarty->assign('title_page_x_of_y', $mod->Lang('title_page_x_of_y', [$this->Page, $this->formTotalPages]));
    $smarty->assign('css_class', $this->GetAttr('css_class', ''));
    $smarty->assign('total_pages', $this->formTotalPages);
    $smarty->assign('this_page', $this->Page);
    $smarty->assign('form_name', $this->Name);
    $smarty->assign('form_id', $this->Id);
    $smarty->assign('actionid', $id);
    
    // Build hidden
    $hidden = $mod->CreateInputHidden($id, 'form_id', $this->Id);
    
    if(isset($params['lang']))
    {
      $hidden .= $mod->CreateInputHidden($id, 'lang', $params['lang']);
    }
    
    $hidden .= $mod->CreateInputHidden($id, 'fbrp_continue', ($this->Page + 1));
    
    if(isset($params['fbrp_browser_id']))
    {
      $hidden .= $mod->CreateInputHidden($id, 'fbrp_browser_id', $params['fbrp_browser_id']);
    }
    
    if(isset($params['response_id']))
    {
      $hidden .= $mod->CreateInputHidden($id, 'response_id', $params['response_id']);
    }
    
    if($this->Page > 1)
    {
      $hidden .= $mod->CreateInputHidden($id, 'fbrp_previous', ($this->Page - 1));
    }
    
    if($this->Page == $this->formTotalPages)
    {
      $hidden .= $mod->CreateInputHidden($id, 'fbrp_done', 1);
    }
    
    // Start building fields
    $fields        = [];
    $prev          = [];
    $formPageCount = 1;
    
    
    for($i = 0; $i < count($this->Fields); $i++)
    {
      $thisField = &$this->Fields[$i];
      
      if($thisField->GetFieldType() == 'PageBreakField')
      {
        $formPageCount++;
      }
      
      if($formPageCount != $this->Page)
      {
        $testIndex = 'fbrp__' . $this->Fields[$i]->GetId();
        
        // Ryan's ugly fix for Bug 4307
        // # note: the fix won't work because it's not a bug it's a security policy on all browsers...
        // # this will be revisited (JM)
        // We should figure out why this field wasn't populating its Smarty variable
        if($thisField->GetFieldType() == 'FileUploadField')
        {
          $smarty->assign('fld_' . $thisField->GetId(), $thisField->GetHumanReadableValue());
          $hidden  .= $mod->CreateInputHidden(
            $id,
            $testIndex,
            $this->unmy_htmlentities($thisField->GetHumanReadableValue())
          );
          $thisAtt = $thisField->GetHumanReadableValue(FALSE);
          $smarty->assign('test_' . $thisField->GetId(), $thisAtt);
          $smarty->assign('value_fld' . $thisField->GetId(), $thisAtt[0]);
        }
        
        if(!isset($params[$testIndex]))
        {
          // do we need to write something?
        }
        else if(is_array($params[$testIndex]))
        {
          foreach($params[$testIndex] as $val)
          {
            $hidden .= $mod->CreateInputHidden(
              $id,
              $testIndex . '[]',
              $this->unmy_htmlentities($val)
            );
          }
        }
        else
        {
          $hidden .= $mod->CreateInputHidden(
            $id,
            $testIndex,
            $this->unmy_htmlentities($params[$testIndex])
          );
        }
        
        if($formPageCount < $this->Page && $this->Fields[$i]->DisplayInSubmission())
        {
          $oneset        = new stdClass();
          $oneset->value = $this->Fields[$i]->GetHumanReadableValue();
          
          $smarty->assign($this->Fields[$i]->GetName(), $oneset);
          
          if($this->Fields[$i]->GetAlias() != '')
          {
            $smarty->assign($this->Fields[$i]->GetAlias(), $oneset);
          }
          
          array_push($prev, $oneset);
        }
        continue;
      }
      
      $oneset                    = new stdClass();
      $oneset->id                = $thisField->Id;
      $oneset->display           = $thisField->DisplayInForm() ? 1 : 0;
      $oneset->required          = $thisField->IsRequired() ? 1 : 0;
      $oneset->required_symbol   = $thisField->IsRequired() ? $reqSymbol : '';
      $oneset->css_class         = $thisField->GetOption('css_class');
      $oneset->helptext          = $thisField->GetOption('helptext');
      $oneset->field_helptext_id = 'fbrp_ht_' . $thisField->GetID();
      //	$oneset->valid = $thisField->GetOption('is_valid',true)?1:0;
      $oneset->valid     = $thisField->validated ? 1 : 0;
      $oneset->error     = $thisField->GetOption('is_valid', TRUE) ? '' : $thisField->validationErrorText;
      $oneset->hide_name = 0;
      
      if(
        ((!$thisField->HasLabel()) || $thisField->HideLabel()) &&
        ($thisField->GetOption('fbr_edit', '0') == '0' || $params['in_admin'] != 1)
      )
      {
        $oneset->hide_name = 1;
      }
      
      $oneset->has_label = $thisField->HasLabel();
      $oneset->needs_div = $thisField->NeedsDiv();
      $oneset->name      = $thisField->GetName();
      
      $tmp_input = $thisField->GetFieldInput($id, $params, $returnid);
      
      if($thisField->HasMultipleFormComponents() || is_array($tmp_input))
      {
        foreach($tmp_input as &$one)
        {
          // this solves the fbTextFieldExpandable warning for the moment but this must be fixed in the class not here (I think). Jo Morg
          if(isset($one->input))
          {
            if(!$thisField->GetOption('sanitise', '1'))
            {
              $one->input = $this->unmy_htmlentities($one->input);
            }
          }
          else
          {
            $one->input = NULL;
          }
        }
      }
      else
      {
        if(!(bool)$thisField->GetOption('sanitise', 1))
        {
          $tmp_input = $this->unmy_htmlentities($tmp_input);
        }
      }
      
      $oneset->input          = $tmp_input;
      $oneset->logic          = $thisField->GetFieldLogic();
      $oneset->values         = $thisField->GetAllHumanReadableValues();
      $tmpvalue               = $thisField->GetHumanReadableValue(TRUE);
      $unsp                   = $mod->Lang('unspecified');
      $oneset->value          = ($tmpvalue == $unsp) ? '' : $tmpvalue;
      $oneset->smarty_eval    = $thisField->GetSmartyEval() ? 1 : 0;
      $oneset->multiple_parts = $thisField->HasMultipleFormComponents() ? 1 : 0;
      $oneset->label_parts    = $thisField->LabelSubComponents() ? 1 : 0;
      $oneset->type           = $thisField->GetDisplayType();
      
      /**
       * using 'input_id' for CSS/DOM field id is, IMO,
       * inconsistent with the rest of CMSMS API
       * and handling of forms
       * I moved this to 'input_css_id'
       * and changed 'input_id' to hold the correct field id
       * so it can be used like name="{$actionid}{$fieldname->input_id} id="{$fieldname->input_id}"
       * or alternatively like name="{$actionid}{$fieldname->input_id} id="{$fieldname->input_css_id}"
       * Jo Morg
       */
      $oneset->input_css_id = $thisField->GetCSSId();
      //$oneset->input_id = $thisField->GetCSSId(); // what's this for??? (JM)
      $oneset->input_id = 'fbrp__' . $oneset->id;
      
      // Added by Stikki STARTS
      $name_alias = $thisField->GetName();
      $name_alias = str_replace($toreplace, $replacement, $name_alias);
      $name_alias = strtolower($name_alias);
      $name_alias = preg_replace('/[^a-z0-9]+/i', '_', $name_alias);
      
      $smarty->assign($name_alias, $oneset);
      // Added by Stikki ENDS
      
      if($thisField->GetAlias() != '')
      {
        $smarty->assign($thisField->GetAlias(), $oneset);
        $oneset->alias = $thisField->GetAlias();
      }
      else
      {
        $oneset->alias = $name_alias;
      }
      
      $fields[$oneset->input_id] = $oneset;
      //array_push($fields,$oneset);
    }
    
    $smarty->assign('fb_hidden', $hidden);
    $smarty->assign('fields', $fields);
    $smarty->assign('previous', $prev);
    
    $jsStr     = '';
    $jsTrigger = '';
    if($this->GetAttr('input_button_safety', '0') == '1')
    {
      $jsStr     = '<script type="text/javascript">
	/* <![CDATA[ */
    var submitted = 0;
    function LockButton ()
       {
       var ret = false;
       if ( ! submitted )
          {
           var item = document.getElementById("' . $id . 'fbrp_submit");
           if (item != null)
             {
             setTimeout(function() {item.disabled = true}, 0);
             }
           submitted = 1;
           ret = true;
          }
        return ret;
        }
/* ]]> */
</script>';
      $jsTrigger = " onclick='return LockButton()'";
    }
    
    $js = $this->GetAttr('submit_javascript');
    
    if($this->Page > 1)
    {
      $smarty->assign(
        'prev', '<input class="cms_submit fbsubmit_prev" name="' . $id . 'fbrp_prev" id="' . $id .
                'fbrp_prev" value="' . $this->GetAttr('prev_button_text') . '" type="submit" ' . $js .
                ' />'
      );
    }
    else
    {
      $smarty->assign('prev', '');
    }
    
    if($this->Page < $formPageCount)
    {
      
      $smarty->assign(
        'submit', '<input class="cms_submit fbsubmit_next" name="' . $id . 'fbrp_submit" id="' . $id .
                  'fbrp_submit" value="' . $this->GetAttr('next_button_text') . '" type="submit" ' . $js .
                  ' />'
      );
    }
    else
    {
      $captcha = \cms_utils::get_module('Captcha');
      if($this->GetAttr('use_captcha', '0') == '1' && $captcha != NULL)
      {
        $smarty->assign('graphic_captcha', $captcha->getCaptcha());
        $smarty->assign('title_captcha', $this->GetAttr('title_user_captcha', $mod->Lang('title_user_captcha')));
        #this should work with Captcha 0.4.6 and higher (JM)
        $cptcneedsinput = method_exists($captcha, 'NeedsInputField') ? $captcha->NeedsInputField() : TRUE;
        if($cptcneedsinput)
        {
          $smarty->assign('input_captcha', $mod->CreateInputText($id, 'fbrp_captcha_phrase', ''));
        }
        $smarty->assign('has_captcha', '1');
      }
      else
      {
        $smarty->assign('has_captcha', '0');
      }
      
      
      $smarty->assign(
        'submit', '<input class="cms_submit fbsubmit" name="' . $id . 'fbrp_submit" id="' . $id .
                  'fbrp_submit" value="' . $this->GetAttr('submit_button_text') . '" type="submit" ' .
                  $js . ' />'
      );
    }
    
    return $mod->ProcessTemplateFromDatabase('fb_' . $this->Id);
  }
  
  function LoadForm($loadDeep = FALSE)
  {
    return $this->Load($this->Id, [], $loadDeep);
  }
  
  /**
   * deprecated
   * moved to formbuilder_utils class
   * to be removed in FB 1.0
   *
   * @param mixed $val
   */
  function unmy_htmlentities($val)
  {
    return formbuilder_utils::htmlentities($val);
  }
  
  function Load($formId, &$params, $loadDeep = FALSE, $loadResp = FALSE)
  {
    
    $mod = formbuilder_utils::GetFB();
    
    //error_log("entering Form Load with usage ".memory_get_usage());
    $sql = 'SELECT * FROM '
           . cms_db_prefix()
           . 'module_fb_form WHERE form_id=?';
    
    $rs = $mod->dbHandle->Execute($sql, [$formId]);
    
    if($rs && $rs->RecordCount() > 0)
    {
      $result   = $rs->FetchRow();
      $this->Id = $result['form_id'];
      
      if(!isset($params['fbrp_form_name']) || empty($params['fbrp_form_name']))
      {
        $this->Name = $result['name'];
      }
      
      if(!isset($params['fbrp_form_alias']) || empty($params['fbrp_form_alias']))
      {
        $this->Alias = $result['alias'];
      }
    }
    else
    {
      return FALSE;
    }
    
    $sql = 'SELECT name,value FROM '
           . cms_db_prefix()
           . 'module_fb_form_attr WHERE form_id=?';
    
    $rs = $mod->dbHandle->Execute($sql, [$formId]);
    
    while($rs && $result = $rs->FetchRow())
    {
      $this->Attrs[$result['name']] = $result['value'];
    }
    
    $this->loaded = 'summary';
    
    if(isset($params['response_id']))
    {
      $loadDeep = TRUE;
      $loadResp = TRUE;
    }
    
    if($loadDeep)
    {
      if($loadResp)
      {
        // if it's a stored form, load the results -- but we need to manually merge them,
        // since $params[] should override the database value (say we're resubmitting a form)
        $fbf = $mod->GetFormBrowserField($formId);
        
        if($fbf != FALSE)
        {
          // if we're binding to FEU, get the FEU ID, see if there's a response for
          // that user. If so, load it. Otherwise, bring up an empty form.
          if($fbf->GetOption('feu_bind', '0') == '1')
          {
            $feu = \cms_utils::get_module('FrontEndUsers');
            
            if($feu == FALSE)
            {
              debug_display("FAILED to instatiate FEU!");
              
              return;
            }
            
            if(!isset($_COOKIE['cms_admin_user_id']))
            {
              // Fix for Bug 5422. Adapted from Mike Hughesdon's code.
              $response_id = $mod->GetResponseIDFromFEUID($feu->LoggedInId(), $formId);
              
              if($response_id !== FALSE)
              {
                $check = $mod->dbHandle->GetOne(
                  'select count(*) from ' . cms_db_prefix() .
                  'module_fb_formbrowser where fbr_id=?', [$response_id]
                );
                
                if($check == 1)
                {
                  $params['response_id'] = $response_id;
                }
              }
            }
          }
        }
        
        if(isset($params['response_id']))
        {
          $loadParams = ['response_id' => $params['response_id']];
          $loadTypes  = [];
          $this->LoadResponseValues($loadParams, $loadTypes);
          
          foreach($loadParams as $thisParamKey => $thisParamValue)
          {
            if(!isset($params[$thisParamKey]))
            {
              if($this->GetFormState() == 'update' && $loadTypes[$thisParamKey] == 'CheckboxField')
              {
                $params[$thisParamKey] = '';
              }
              else
              {
                $params[$thisParamKey] = $thisParamValue;
              }
            }
          }
        }
      }
      
      $sql = 'SELECT * FROM '
             . cms_db_prefix()
             . 'module_fb_field WHERE form_id=? ORDER BY order_by';
      
      $result = $mod->dbHandle->GetArray($sql, [$formId]);
      
      /*$result = array();
      if ($rs && $rs->RecordCount() > 0)
        {
          $result = $rs->GetArray();
        }
      */
      
      $fieldCount = 0;
      
      if(count($result) > 0)
      {
        foreach($result as $thisRes)
        {
          //error_log("Instantiating Field. usage ".memory_get_usage());
          
          $className = $this->MakeClassName($thisRes['type'], '');
          
          // create the field object
          if(
            (
              isset($thisRes['field_id']) &&
              (
                isset($params['fbrp__' . $thisRes['field_id']]) || isset($params['fbrp___' . $thisRes['field_id']])
              )
            )
            || (isset($thisRes['field_id']) && isset($params['value_' . $thisRes['name']]))
            || (isset($thisRes['field_id']) && isset($params['value_fld' . $thisRes['field_id']]))
            ||
            (isset($params['field_id']) && isset($thisRes['field_id']) && $params['field_id'] == $thisRes['field_id'])
          )
          {
            
            $thisRes = array_merge($thisRes, $params);
          }
          
          $this->Fields[$fieldCount] = $this->NewField($thisRes);
          $fieldCount++;
        }
      }
      
      $this->loaded = 'full';
    }
    
    for($i = 0; $i < count($this->Fields); $i++)
    {
      if($this->Fields[$i]->Type == 'PageBreakField')
      {
        $this->formTotalPages++;
      }
    }
    
    return TRUE;
  }
  
  /* notable params:
    fbrp_xml_file -- source file for the XML
    xml_string -- source string for the XML
  */
  
  function ImportXML(&$params)
  {
    // xml_parser_create, xml_parse_into_struct
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 0); // was 1
    if(isset($params['fbrp_xml_file']) && !empty($params['fbrp_xml_file']))
    {
      xml_parse_into_struct($parser, file_get_contents($params['fbrp_xml_file']), $values);
    }
    else if(isset($params['xml_string']) && !empty($params['xml_string']))
    {
      xml_parse_into_struct($parser, $params['xml_string'], $values);
    }
    else
    {
      return FALSE;
    }
    xml_parser_free($parser);
    $elements = [];
    $stack    = [];
    $fieldMap = [];
    foreach($values as $tag)
    {
      $index = count($elements);
      if($tag['type'] == "complete" || $tag['type'] == "open")
      {
        $elements[$index]               = [];
        $elements[$index]['name']       = $tag['tag'];
        $elements[$index]['attributes'] = empty($tag['attributes']) ? "" : $tag['attributes'];
        $elements[$index]['content']    = empty($tag['value']) ? "" : $tag['value'];
        if($tag['type'] == "open")
        {
          # push
          $elements[$index]['children'] = [];
          $stack[count($stack)]         = &$elements;
          $elements                     = &$elements[$index]['children'];
        }
      }
      if($tag['type'] == "close")
      {    # pop
        $elements = &$stack[count($stack) - 1];
        unset($stack[count($stack) - 1]);
      }
    }
    //debug_display($elements);
    if(!isset($elements[0]) || !isset($elements[0]) || !isset($elements[0]['attributes']))
    {
      //parsing failed, or invalid file.
      return FALSE;
    }
    $params['form_id'] = -1; // override any form_id values that may be around
    $formAttrs         = &$elements[0]['attributes'];
    
    if(isset($params['fbrp_import_formalias']) && !empty($params['fbrp_import_formalias']))
    {
      $this->SetAlias($params['fbrp_import_formalias']);
    }
    else if($this->inXML($formAttrs['alias']))
    {
      $this->SetAlias($formAttrs['alias']);
    }
    if(isset($params['fbrp_import_formname']) && !empty($params['fbrp_import_formname']))
    {
      $this->SetName($params['fbrp_import_formname']);
    }
    $foundfields = FALSE;
    // populate the attributes and field name first. When we see a field, we save the form and then start adding the fields to it.
    
    foreach($elements[0]['children'] as $thisChild)
    {
      if($thisChild['name'] == 'form_name')
      {
        $curname = $this->GetName();
        if(empty($curname))
        {
          $this->SetName($thisChild['content']);
        }
      }
      else if($thisChild['name'] == 'attribute')
      {
        $this->SetAttr($thisChild['attributes']['key'], $thisChild['content']);
      }
      else
      {
        // we got us a field
        if(!$foundfields)
        {
          // first field
          $foundfields = TRUE;
          if(
            isset($params['fbrp_import_formname']) &&
            trim($params['fbrp_import_formname']) != ''
          )
          {
            $this->SetName(trim($params['fbrp_import_formname']));
          }
          if(
            isset($params['fbrp_import_formalias']) &&
            trim($params['fbrp_import_formname']) != ''
          )
          {
            $this->SetAlias(trim($params['fbrp_import_formalias']));
          }
          $this->Store();
          $params['form_id'] = $this->GetId();
        }
        //debug_display($thisChild);
        $fieldAttrs = &$thisChild['attributes'];
        $className  = $this->MakeClassName($fieldAttrs['type'], '');
        //debug_display($className);
        $newField = new $className($this, $params);
        $oldId    = $fieldAttrs['id'];
        
        if($this->inXML($fieldAttrs['alias']))
        {
          $newField->SetAlias($fieldAttrs['alias']);
        }
        $newField->SetValidationType($fieldAttrs['validation_type']);
        if($this->inXML($fieldAttrs['order_by']))
        {
          $newField->SetOrder($fieldAttrs['order_by']);
        }
        if($this->inXML($fieldAttrs['required']))
        {
          $newField->SetRequired($fieldAttrs['required']);
        }
        if($this->inXML($fieldAttrs['hide_label']))
        {
          $newField->SetHideLabel($fieldAttrs['hide_label']);
        }
        foreach($thisChild['children'] as $thisOpt)
        {
          if($thisOpt['name'] == 'field_name')
          {
            $newField->SetName($thisOpt['content']);
          }
          if($thisOpt['name'] == 'options')
          {
            foreach($thisOpt['children'] as $thisOption)
            {
              $newField->OptionFromXML($thisOption);
            }
          }
        }
        $newField->Store(TRUE);
        array_push($this->Fields, $newField);
        $fieldMap[$oldId] = $newField->GetId();
      }
    }
    
    // clean up references
    
    if(isset($params['fbrp_xml_file']) && !empty($params['fbrp_xml_file']))
    {
      // need to update mappings in templates.
      $tmp = $this->updateRefs($this->GetAttr('form_template', ''), $fieldMap);
      $this->SetAttr('form_template', $tmp);
      $tmp = $this->updateRefs($this->GetAttr('submit_response', ''), $fieldMap);
      $this->SetAttr('submit_response', $tmp);
      
      // need to update mappings in field templates.
      $options = ['email_template', 'file_template'];
      foreach($this->Fields as $fid => $thisField)
      {
        $changes = FALSE;
        foreach($options as $to)
        {
          $templ = $thisField->GetOption($to, '');
          if(!empty($templ))
          {
            $tmp = $this->updateRefs($templ, $fieldMap);
            $thisField->SetOption($to, $tmp);
            $changes = TRUE;
          }
        }
        // need to update mappings in FormBrowser sort fields
        if($thisField->GetFieldType() == 'DispositionFormBrowser')
        {
          for($i = 1; $i < 6; $i++)
          {
            $old = $thisField->GetOption('sortfield' . $i);
            if(isset($fieldMap[$old]))
            {
              $thisField->SetOption('sortfield' . $i, $fieldMap[$old]);
              $changes = TRUE;
            }
          }
        }
        if($changes)
        {
          $thisField->Store(TRUE);
        }
      }
      
      $this->Store();
    }
    
    return TRUE;
  }
  
  /**
   * deprecated
   * moved to formbuilder_utils
   * to be removed in FB 1.0
   *
   * @param mixed $text
   * @param mixed $fieldMap
   */
  function updateRefs($text, &$fieldMap)
  {
    return formbuilder_utils::updateRefs($text, $fieldMap);
  }
  
  
  /**
   * deprecated
   * moved to formbuilder_utils
   * to be removed in FB 1.0
   *
   * @param mixed $var
   */
  function inXML(&$var)
  {
    return formbuilder_utils::inXML($var);
  }
  
  // storeDeep also stores all fields and options for a form
  function Store($storeDeep = FALSE)
  {
    
    $db     = formbuilder_utils::GetFB()->dbHandle;
    $params = $this->module_params;
    
    // Check if new or old form
    $res = FALSE;
    $j   = '';
    $new = FALSE;
    
    if($this->Id == -1)
    {
      $this->Id = $db->GenID(cms_db_prefix() . 'module_fb_form_seq');
      $new      = TRUE;
    }
    
    while(!$res && $j < 10)
    {
      $adj_alias = $this->Alias . $j;
      
      if($new)
      {
        $sql = 'INSERT INTO ' . cms_db_prefix() . 'module_fb_form (form_id, name, alias) VALUES (?, ?, ?)';
        $res = $db->Execute($sql, [$this->Id, $this->Name, $adj_alias]);
      }
      else
      {
        $sql = 'UPDATE ' . cms_db_prefix() . 'module_fb_form set name=?, alias=? where form_id=?';
        $res = $db->Execute($sql, [$this->Name, $adj_alias, $this->Id]);
      }
      
      $j++;
    }
    
    # TO #DO -JoMorg: change this to exception DONE!
    if(!$res)
    {
      $message = 'FATAL SQL ERROR: ' . $db->ErrorMsg() . '<br/>QUERY: ' . $db->sql;
      throw new \RuntimeException($message);
      //die($message);
    }
    
    // Save out the attrs
    $sql = 'DELETE FROM ' . cms_db_prefix() . 'module_fb_form_attr WHERE form_id=?';
    $res = $db->Execute($sql, [$this->Id]);
    
    foreach($this->Attrs as $thisAttrKey => $thisAttrValue)
    {
      $formAttrId = $db->GenID(cms_db_prefix() . 'module_fb_form_attr_seq');
      $sql        = 'INSERT INTO ' . cms_db_prefix() .
                    'module_fb_form_attr (form_attr_id, form_id, name, value) VALUES (?, ?, ?, ?)';
      $res        = $db->Execute($sql, [$formAttrId, $this->Id, $thisAttrKey, $thisAttrValue]);
      
      if($thisAttrKey == 'form_template')
      {
        formbuilder_utils::GetFB()->SetTemplate('fb_' . $this->Id, $thisAttrValue);
      }
    }
    
    // Update field position
    $order_list = FALSE;
    
    if(isset($params['fbrp_sort']))
    {
      $order_list = explode(',', $params['fbrp_sort']);
    }
    
    if(is_array($order_list) && count($order_list) > 0)
    {
      $count = 1;
      $sql   = 'UPDATE ' . cms_db_prefix() . 'module_fb_field SET order_by=? WHERE field_id=?';
      
      foreach($order_list as $onefldid)
      {
        $fieldid = substr($onefldid, 5);
        $db->Execute($sql, [$count, $fieldid]);
        $count++;
      }
    }
    
    // Reload everything
    $this->Load($this->Id, $params, TRUE);
    
    return $res;
  }
  
  function Delete()
  {
    if($this->Id == -1)
    {
      return FALSE;
    }
    if($this->loaded != 'full')
    {
      $this->Load($this->Id, [], TRUE);
    }
    foreach($this->Fields as $field)
    {
      $field->Delete();
    }
    $db = formbuilder_utils::GetFB()->dbHandle;
    formbuilder_utils::GetFB()->DeleteTemplate('fb_' . $this->Id);
    $sql = 'DELETE FROM ' . cms_db_prefix() . 'module_fb_form where form_id=?';
    $res = $db->Execute($sql, [$this->Id]);
    $sql = 'DELETE FROM ' . cms_db_prefix() . 'module_fb_form_attr where form_id=?';
    $res = $db->Execute($sql, [$this->Id]);
    
    return TRUE;
  }
  
  // returns a class name, and makes sure the file where the class is
  // defined has been loaded.
  function MakeClassName($type, $classDirPrefix)
  {
    // perform rudimentary security, since Type could come in from a form
    $type = preg_replace("/[\W]|\.\./", "_", $type);
    if($type == '' || strlen($type) < 1)
    {
      $type = 'Field';
    }
    $classFile = '';
    if(strlen($classDirPrefix) > 0)
    {
      $classFile = $classDirPrefix . '/' . $type . '.class.php';
    }
    else
    {
      $classFile = $type . '.class.php';
    }
    require_once cms_join_path(dirname(__FILE__), $classFile);
    
    // class names are prepended with "fb" to prevent namespace clash.
    return ('fb' . $type);
  }
  
  /**
   * This renders the form edit page
   *
   * Note: This doesn't belong here (JM)
   * TODO: - JoMorg - remove this from here and put it on the action file
   * TODO: - JoMorg - remove all $mod->CreateInput... stuff and replace with real HTML/Smarty fields on the templates
   *
   * @param        $id
   * @param        $returnid
   * @param        $tab
   * @param string $message
   *
   * @return mixed
   */
  function AddEditForm($id, $returnid, $tab, $message = '')
  {
    $gCms       = cmsms();
    $mod        = formbuilder_utils::GetFB();
    $smarty     = \cms_utils::get_smarty();
    $admintheme = cms_utils::get_theme_object();
    
    if(!empty($message))
    {
      $smarty->assign('message', $mod->ShowMessage($message));
    }
    
    $smarty->assign('formstart', $mod->CreateFormStart($id, 'admin_store_form', $returnid));
    $smarty->assign('formid', $mod->CreateInputHidden($id, 'form_id', $this->Id));
    
    # fixes for CMSMS 2 compatibility (JM)
    if(!formbuilder_utils::is_CMS2())
    {
      $smarty->assign(
        'tab_start', $mod->StartTabHeaders() .
                     $mod->SetTabHeader('maintab', $mod->Lang('tab_main'), ('maintab' == $tab) ? TRUE : FALSE) .
                     $mod->SetTabHeader('submittab', $mod->Lang('tab_submit'), ('submittab' == $tab) ? TRUE : FALSE) .
                     $mod->SetTabHeader('symboltab', $mod->Lang('tab_symbol'), ('symboltab' == $tab) ? TRUE : FALSE) .
                     $mod->SetTabHeader(
                       'captchatab', $mod->Lang('tab_captcha'), ('captchatab' == $tab) ? TRUE : FALSE
                     ) .
                     $mod->SetTabHeader('udttab', $mod->Lang('tab_udt'), ('udttab' == $tab) ? TRUE : FALSE) .
                     $mod->SetTabHeader(
                       'templatelayout', $mod->Lang('tab_templatelayout'), ('templatelayout' == $tab) ? TRUE : FALSE
                     ) .
                     $mod->SetTabHeader(
                       'submittemplate', $mod->Lang('tab_submissiontemplate'), ('submittemplate' == $tab) ? TRUE : FALSE
                     ) .
                     $mod->EndTabHeaders() . $mod->StartTabContent()
      );
      
      $smarty->assign('tabs_end', $mod->EndTabContent());
      $smarty->assign('maintab_start', $mod->StartTab("maintab"));
      $smarty->assign('submittab_start', $mod->StartTab("submittab"));
      $smarty->assign('symboltab_start', $mod->StartTab("symboltab"));
      $smarty->assign('udttab_start', $mod->StartTab("udttab"));
      $smarty->assign('templatetab_start', $mod->StartTab("templatelayout"));
      $smarty->assign('submittemplatetab_start', $mod->StartTab("submittemplate"));
      $smarty->assign('captchatab_start', $mod->StartTab("captchatab"));
      $smarty->assign('tab_end', $mod->EndTab());
    }
    
    $smarty->assign('form_end', $mod->CreateFormEnd());
    $smarty->assign('title_form_name', $mod->Lang('title_form_name'));
    $smarty->assign('input_form_name', $mod->CreateInputText($id, 'fbrp_form_name', $this->Name, 50));
    
    $smarty->assign('title_load_template', $mod->Lang('title_load_template'));
    $modLink = $mod->CreateLink($id, 'admin_get_template', $returnid, '', [], '', TRUE);
    $smarty->assign('security_key', CMS_SECURE_PARAM_NAME . '=' . $_SESSION[CMS_USER_KEY]);
    
    $templateList = [
      $mod->Lang('select_source_template') => '', $mod->Lang('default_template') => 'RenderFormDefault.tpl',
      $mod->Lang('table_left_template')    => 'RenderFormTableTitleLeft.tpl',
      $mod->Lang('table_top_template')     => 'RenderFormTableTitleTop.tpl'
    ];
    
    $allForms = $mod->GetForms();
    
    foreach($allForms as $thisForm)
    {
      if($thisForm['form_id'] != $this->Id)
      {
        $templateList[$mod->Lang('form_template_name', $thisForm['name'])] = $thisForm['form_id'];
      }
    }
    
    $smarty->assign(
      'input_load_template', $mod->CreateInputDropdown(
      $id,
      'fbrp_fb_template_load', $templateList, -1, '',
      'id="fb_template_load" onchange="jQuery(this).fb_get_template(\'' . $mod->Lang('template_are_you_sure') .
      '\',\'' . $modLink . '\');"'
    )
    );
    
    $smarty->assign('help_template_variables', $mod->Lang('template_variable_help'));
    $smarty->assign('title_form_unspecified', $mod->Lang('title_form_unspecified'));
    
    $smarty->assign(
      'input_form_unspecified',
      $mod->CreateInputText(
        $id, 'fbrp_forma_unspecified',
        $this->GetAttr('unspecified', $mod->Lang('unspecified')), 50
      )
    );
    
    $smarty->assign('title_form_status', $mod->Lang('title_form_status'));
    $smarty->assign('text_ready', $mod->Lang('title_ready_for_deployment'));
    $smarty->assign('title_form_alias', $mod->Lang('title_form_alias'));
    
    $smarty->assign(
      'input_form_alias',
      $mod->CreateInputText(
        $id, 'fbrp_form_alias',
        $this->Alias, 50
      )
    );
    
    $smarty->assign('title_form_css_class', $mod->Lang('title_form_css_class'));
    
    $smarty->assign(
      'input_form_css_class',
      $mod->CreateInputText(
        $id, 'fbrp_forma_css_class',
        $this->GetAttr('css_class', 'formbuilderform'), 50, 50
      )
    );
    
    $smarty->assign('title_form_fields', $mod->Lang('title_form_fields'));
    $smarty->assign('title_form_main', $mod->Lang('title_form_main'));
    
    if($mod->GetPreference('show_fieldids', 0) != 0)
    {
      $smarty->assign('title_field_id', $mod->Lang('title_field_id'));
    }
    if($mod->GetPreference('show_fieldaliases', 1) != 0)
    {
      $smarty->assign('title_field_alias', $mod->Lang('title_field_alias_short'));
    }
    
    $smarty->assign('back', $mod->CreateLink($id, 'defaultadmin', '', $mod->Lang('back_top'), []));
    
    $smarty->assign('title_field_name', $mod->Lang('title_field_name'));
    $smarty->assign('title_field_type', $mod->Lang('title_field_type'));
    $smarty->assign('title_field_type', $mod->Lang('title_field_type'));
    $smarty->assign('title_form_template', $mod->Lang('title_form_template'));
    $smarty->assign('title_list_delimiter', $mod->Lang('title_list_delimiter'));
    $smarty->assign('title_redirect_page', $mod->Lang('title_redirect_page'));
    $smarty->assign('title_submit_action', $mod->Lang('title_submit_action'));
    $smarty->assign('title_submit_response', $mod->Lang('title_submit_response'));
    $smarty->assign('title_must_save_order', $mod->Lang('title_must_save_order'));
    $smarty->assign('title_inline_form', $mod->Lang('title_inline_form'));
    $smarty->assign('title_submit_actions', $mod->Lang('title_submit_actions'));
    $smarty->assign('title_submit_labels', $mod->Lang('title_submit_labels'));
    $smarty->assign('title_submit_javascript', $mod->Lang('title_submit_javascript'));
    $smarty->assign('title_submit_help', $mod->Lang('title_submit_help'));
    $smarty->assign('title_submit_response_help', $mod->Lang('title_submit_response_help'));
    
    $submitActions = [$mod->Lang('display_text') => 'text', $mod->Lang('redirect_to_page') => 'redir'];
    
    $smarty->assign(
      'input_submit_action',
      $mod->CreateInputRadioGroup(
        $id, 'fbrp_forma_submit_action', $submitActions, $this->GetAttr('submit_action', 'text')
      )
    );
    
    $captcha = \cms_utils::get_module('Captcha');
    
    if($captcha == NULL)
    {
      $smarty->assign(
        'title_install_captcha',
        $mod->Lang('title_captcha_not_installed')
      );
      $smarty->assign('captcha_installed', 0);
    }
    else
    {
      $smarty->assign(
        'title_use_captcha',
        $mod->Lang('title_use_captcha')
      );
      $smarty->assign('captcha_installed', 1);
      
      $smarty->assign(
        'input_use_captcha', $mod->CreateInputHidden($id, 'fbrp_forma_use_captcha', '0') .
                             $mod->CreateInputCheckbox(
                               $id, 'fbrp_forma_use_captcha', '1', $this->GetAttr('use_captcha', '0')
                             ) .
                             $mod->Lang('title_use_captcha_help')
      );
    }
    
    $smarty->assign('title_information', $mod->Lang('information'));
    $smarty->assign('title_order', $mod->Lang('order'));
    $smarty->assign('title_field_required_abbrev', $mod->Lang('title_field_required_abbrev'));
    $smarty->assign('hasdisposition', $this->HasDisposition() ? 1 : 0);
    $maxOrder = 1;
    
    if($this->Id > 0)
    {
      $smarty->assign(
        'fb_hidden', $mod->CreateInputHidden($id, 'fbrp_form_op', $mod->Lang('updated')) .
                     $mod->CreateInputHidden($id, 'fbrp_sort', '', 'class="fbrp_sort"')
      );
      
      $smarty->assign('adding', 0);
      $smarty->assign('save_button', $mod->CreateInputSubmit($id, 'fbrp_submit', $mod->Lang('save')));
      
      $smarty->assign(
        'submit_button', $mod->CreateInputHidden($id, 'active_tab', '', 'id="fbr_atab"') .
                         $mod->CreateInputSubmit(
                           $id, 'fbrp_submit', $mod->Lang('save_and_continue'), 'onclick="jQuery(this).fb_set_tab()"'
                         )
      );
      
      $fieldList = [];
      $currow    = "row1";
      $count     = 1;
      $last      = $this->GetFieldCount();
      
      foreach($this->Fields as $thisField)
      {
        $oneset           = new stdClass();
        $oneset->rowclass = $currow;
        $oneset->name     = $mod->CreateLink(
          $id, 'admin_add_edit_field', '', $thisField->GetName(),
          ['field_id' => $thisField->GetId(), 'form_id' => $this->Id]
        );
        
        if($mod->GetPreference('show_fieldids', 0) != 0)
        {
          $oneset->id = $mod->CreateLink(
            $id, 'admin_add_edit_field', '', $thisField->GetId(),
            ['field_id' => $thisField->GetId(), 'form_id' => $this->Id]
          );
        }
        
        $oneset->type  = $thisField->GetDisplayType();
        $oneset->alias = $thisField->GetAlias();
        $oneset->id    = $thisField->GetID();
        
        if(!$thisField->DisplayInForm() || $thisField->IsNonRequirableField())
        {
          $no_avail = $mod->Lang('not_available');
          
          if($admintheme->themeName == 'NCleanGrey')
          {
            $oneset->disposition = '<img src="' . $mod->GetModuleURLPath() .
                                   '/images/stop.gif" width="20" height="20" alt="' . $no_avail . '" title="' .
                                   $no_avail . '" />';
          }
          else
          {
            $oneset->disposition = '<img src="' . $mod->GetModuleURLPath() .
                                   '/images/stop.gif" width="16" height="16" alt="' . $no_avail . '" title="' .
                                   $no_avail . '" />';
          }
        }
        else if($thisField->IsRequired())
        {
          $oneset->disposition = $mod->CreateLink(
            $id, 'admin_update_field_required', '', $admintheme->DisplayImage(
            'icons/system/true.gif', 'true', '', '', 'systemicon'
          ), ['form_id' => $this->Id, 'fbrp_active' => 'off', 'field_id' => $thisField->GetId()], '', '', '',
            'class="true" onclick="jQuery(this).fb_admin_update_field_required(); return false;"'
          );
        }
        else
        {
          $oneset->disposition = $mod->CreateLink(
            $id, 'admin_update_field_required', '', $admintheme->DisplayImage(
            'icons/system/false.gif', 'false', '', '', 'systemicon'
          ), ['form_id' => $this->Id, 'fbrp_active' => 'on', 'field_id' => $thisField->GetId()], '', '', '',
            'class="false" onclick="jQuery(this).fb_admin_update_field_required(); return false;"'
          );
        }
        
        $oneset->field_status = $thisField->StatusInfo();
        $oneset->editlink     = $mod->CreateLink(
          $id, 'admin_add_edit_field', '', $admintheme->DisplayImage(
          'icons/system/edit.gif', $mod->Lang('edit'), '', '', 'systemicon'
        ), ['field_id' => $thisField->GetId(), 'form_id' => $this->Id]
        );
        $oneset->deletelink   = $mod->CreateLink(
          $id, 'admin_delete_field', '', $admintheme->DisplayImage(
          'icons/system/delete.gif', $mod->Lang('delete'), '', '', 'systemicon'
        ), ['field_id' => $thisField->GetId(), 'form_id' => $this->Id], '', '', '',
          'onclick="jQuery(this).fb_delete_field(\'' . $mod->Lang(
            'are_you_sure_delete_field', htmlspecialchars($thisField->GetName())
          ) . '\'); return false;"'
        );
        
        /* Removed By Stikki, reinstated by SjG with Javascript to hide it if Javascript's enabled. */
        if($count > 1)
        {
          $oneset->up = $mod->CreateLink(
            $id, 'admin_update_field_order', '', $admintheme->DisplayImage(
            'icons/system/arrow-u.gif', 'up', '', '', 'systemicon'
          ), ['form_id' => $this->Id, 'fbrp_dir' => 'up', 'field_id' => $thisField->GetId()]
          );
        }
        else
        {
          $oneset->up = '&nbsp;';
        }
        
        if($count < $last)
        {
          $oneset->down = $mod->CreateLink(
            $id, 'admin_update_field_order', '', $admintheme->DisplayImage(
            'icons/system/arrow-d.gif', 'down', '', '', 'systemicon'
          ), ['form_id' => $this->Id, 'fbrp_dir' => 'down', 'field_id' => $thisField->GetId()]
          );
        }
        else
        {
          $oneset->down = '&nbsp;';
        }
        
        $currow == "row1" ? $currow = "row2" : $currow = "row1";
        $count++;
        
        if($thisField->GetOrder() >= $maxOrder)
        {
          $maxOrder = $thisField->GetOrder() + 1;
        }
        
        array_push($fieldList, $oneset);
      }
      
      $smarty->assign('fields', $fieldList);
      
      $smarty->assign(
        'add_field_link',
        $mod->CreateLink(
          $id, 'admin_add_edit_field', $returnid, $admintheme->DisplayImage(
          'icons/system/newobject.gif', $mod->Lang('title_add_new_field'), '', '', 'systemicon'
        ), ['form_id' => $this->Id, 'fbrp_order_by' => $maxOrder], '', FALSE
        ) . $mod->CreateLink(
          $id, 'admin_add_edit_field', $returnid, $mod->Lang('title_add_new_field'),
          ['form_id' => $this->Id, 'fbrp_order_by' => $maxOrder], '', FALSE
        )
      );
      
      if($mod->GetPreference('enable_fastadd', 1) == 1)
      {
        $smarty->assign('fastadd', 1);
        $smarty->assign('title_fastadd', $mod->Lang('title_fastadd'));
        $typeInput = "<script type=\"text/javascript\">
                      /* <![CDATA[ */
                      function fast_add(field_type)
                      {
                        var type=field_type.options[field_type.selectedIndex].value;
                        var link = '" . $mod->CreateLink(
            $id, 'admin_add_edit_field', $returnid, '', ['form_id' => $this->Id, 'fbrp_order_by' => $maxOrder], '',
            TRUE, TRUE
          ) . "&" . $id . "fbrp_field_type='+type;
                        this.location=link;
                        return true;
                      }
                      /* ]]> */
                      </script>";
        
        $typeInput = str_replace('&amp;', '&', $typeInput);
        $mod->initialize();
        
        if($mod->GetPreference('show_field_level', 'basic') == 'basic')
        {
          $smarty->assign(
            'input_fastadd', $typeInput . $mod->CreateInputDropdown(
                             $id, 'fbrp_field_type',
                             array_merge([$mod->Lang('select_type') => ''], $mod->std_field_types), -1, '',
                             'onchange="fast_add(this)"'
                           ) .
                             $mod->Lang('title_switch_advanced') .
                             $mod->CreateLink(
                               $id, 'admin_add_edit_form', $returnid, $mod->Lang('title_switch_advanced_link'),
                               ['form_id' => $this->Id, 'fbrp_set_field_level' => 'advanced']
                             )
          );
        }
        else
        {
          $smarty->assign(
            'input_fastadd', $typeInput . $mod->CreateInputDropdown(
                             $id, 'fbrp_field_type', array_merge([$mod->Lang('select_type') => ''], $mod->field_types),
                             -1, '', 'onchange="fast_add(this)"'
                           ) .
                             $mod->Lang('title_switch_basic') .
                             $mod->CreateLink(
                               $id, 'admin_add_edit_form', $returnid, $mod->Lang('title_switch_basic_link'),
                               ['form_id' => $this->Id, 'fbrp_set_field_level' => 'basic']
                             )
          );
        }
      }
    }
    else
    {
      $smarty->assign('save_button', '');
      
      $smarty->assign(
        'submit_button',
        $mod->CreateInputSubmit($id, 'fbrp_submit', $mod->Lang('add'))
      );
      
      $smarty->assign(
        'fb_hidden',
        $mod->CreateInputHidden($id, 'fbrp_form_op', $mod->Lang('added')) .
        $mod->CreateInputHidden($id, 'fbrp_sort', '', 'id="fbrp_sort"')
      );
      
      $smarty->assign('adding', 1);
    }
    
    $smarty->assign('cancel_button', $mod->CreateInputSubmit($id, 'fbrp_cancel', $mod->Lang('cancel')));
    
    $smarty->assign(
      'link_notready',
      "<strong>" . $mod->Lang('title_not_ready1') . "</strong> " . $mod->Lang('title_not_ready2') . " " .
      $mod->CreateLink(
        $id, 'admin_add_edit_field', $returnid, $mod->Lang('title_not_ready_link'),
        ['form_id' => $this->Id, 'fbrp_order_by' => $maxOrder, 'fbrp_dispose_only' => 1], '', FALSE, FALSE,
        'class="module_fb_link"'
      ) . " " . $mod->Lang('title_not_ready3')
    );
    
    
    $smarty->assign(
      'input_inline_form', $mod->CreateInputHidden($id, 'fbrp_forma_inline', '0') .
                           $mod->CreateInputCheckbox($id, 'fbrp_forma_inline', '1', $this->GetAttr('inline', '0')) .
                           $mod->Lang('title_inline_form_help')
    );
    
    $smarty->assign('title_form_submit_button', $mod->Lang('title_form_submit_button'));
    
    $smarty->assign(
      'input_form_submit_button',
      $mod->CreateInputText(
        $id, 'fbrp_forma_submit_button_text',
        $this->GetAttr('submit_button_text', $mod->Lang('button_submit')), 35, 35
      )
    );
    
    $smarty->assign('title_submit_button_safety', $mod->Lang('title_submit_button_safety_help'));
    
    $smarty->assign(
      'input_submit_button_safety', $mod->CreateInputHidden($id, 'fbrp_forma_input_button_safety', '0') .
                                    $mod->CreateInputCheckbox(
                                      $id, 'fbrp_forma_input_button_safety', '1',
                                      $this->GetAttr('input_button_safety', '0')
                                    ) .
                                    $mod->Lang('title_submit_button_safety')
    );
    
    $smarty->assign('title_form_prev_button', $mod->Lang('title_form_prev_button'));
    
    $smarty->assign(
      'input_form_prev_button',
      $mod->CreateInputText(
        $id, 'fbrp_forma_prev_button_text',
        $this->GetAttr('prev_button_text', $mod->Lang('button_previous')), 35, 35
      )
    );
    
    $smarty->assign(
      'input_title_user_captcha',
      $mod->CreateInputText(
        $id, 'fbrp_forma_title_user_captcha',
        $this->GetAttr('title_user_captcha', $mod->Lang('title_user_captcha')), 35, 256
      )
    );
    
    $smarty->assign('title_title_user_captcha', $mod->Lang('title_title_user_captcha'));
    
    $smarty->assign(
      'input_title_user_captcha_error',
      $mod->CreateInputText(
        $id, 'fbrp_forma_captcha_wrong',
        $this->GetAttr('captcha_wrong', $mod->Lang('wrong_captcha')), 35, 256
      )
    );
    
    $smarty->assign('title_user_captcha_error', $mod->Lang('title_user_captcha_error'));
    
    $smarty->assign(
      'title_form_next_button',
      $mod->Lang('title_form_next_button')
    );
    $smarty->assign(
      'input_form_next_button',
      $mod->CreateInputText(
        $id, 'fbrp_forma_next_button_text',
        $this->GetAttr('next_button_text', $mod->Lang('button_continue')), 35, 35
      )
    );
    $smarty->assign(
      'title_form_predisplay_udt',
      $mod->Lang('title_form_predisplay_udt')
    );
    $smarty->assign(
      'title_form_predisplay_each_udt',
      $mod->Lang('title_form_predisplay_each_udt')
    );
    /* ++++++++++++++ */
    /**
     * NOTE 1: For a while the UserTagOperations's functionality
     * will be there for backwards compatibility
     * So while the To Do's are pertinent we still ahve time to work it out
     * JoMorg
     *
     * NOTE 2: meanwhile there is (at least) one UDT manager module
     * so we add a few options to handle them
     */
    
    $usertags                        = '';
    $usertaglist                     = [];
    $usertaglist[$mod->lang('none')] = -1;
    $usertagops                      = NULL;
    
    if(!formbuilder_utils::is_CMS2_3())
    {
      $udt_handler_pref = $mod->GetPreference('udt_handler_pref', 'core_udts');
      
      if($udt_handler_pref == 'core_sps')
      {
        $udt_handler_pref = 'core_udts';
      }
      
      if($udt_handler_pref == 'core_udts')
      {
        
        $method_name = 'ListUserTags';
        $usertagops  = $gCms->GetUserTagOperations();
      }
    }
    else
    {
      $udt_handler_pref = $mod->GetPreference('udt_handler_pref', 'core_sps');
      
      if($udt_handler_pref == 'core_udts')
      {
        $udt_handler_pref = 'core_sps';
      }
      
      if($udt_handler_pref == 'core_sps')
      {
        $method_name = 'get_list';
        $usertagops  = $gCms->GetUserTagOperations();
      }
    }
    
    
    if(empty($usertagops))
    {
      $UDTsHandler = \cms_utils::get_module($udt_handler_pref);
      
      if(is_object($UDTsHandler))
      {
        $method_name = 'ListUserTags';
        $usertagops  = $UDTsHandler->GetUserTagOperations();
      }
      else
      {
        # throw an error here? (JM)
      }
    }
    
    $usertags = $usertagops->$method_name();
    
    # temp fix for current core bug (JM)
    $usertags = is_array($usertags) ? $usertags : [];
    
    foreach($usertags as $key => $value)
    {
      #$usertaglist[$value] = $key;
      # fix for simple plugins et al.
      $usertaglist[$value] = $value;
    }
    
    $smarty->assign(
      'input_form_predisplay_udt',
      $mod->CreateInputDropdown(
        $id, 'fbrp_forma_predisplay_udt', $usertaglist, -1,
        $this->GetAttr('predisplay_udt', -1)
      )
    );
    
    $smarty->assign(
      'input_form_predisplay_each_udt',
      $mod->CreateInputDropdown(
        $id, 'fbrp_forma_predisplay_each_udt', $usertaglist, -1,
        $this->GetAttr('predisplay_each_udt', -1)
      )
    );
    
    $smarty->assign(
      'title_form_validate_udt',
      $mod->Lang('title_form_validate_udt')
    );
    
    $smarty->assign(
      'input_form_validate_udt',
      $mod->CreateInputDropdown(
        $id, 'fbrp_forma_validate_udt', $usertaglist, -1,
        $this->GetAttr('validate_udt', -1)
      )
    );
    
    $smarty->assign('title_form_required_symbol', $mod->Lang('title_form_required_symbol'));
    
    $smarty->assign(
      'input_form_required_symbol',
      $mod->CreateInputText(
        $id, 'fbrp_forma_required_field_symbol',
        $this->GetAttr('required_field_symbol', '*'), 50
      )
    );
    
    $smarty->assign(
      'input_list_delimiter',
      $mod->CreateInputText(
        $id, 'fbrp_forma_list_delimiter',
        $this->GetAttr('list_delimiter', ','), 50
      )
    );
    
    $contentops = $gCms->GetContentOperations();
    $smarty->assign(
      'input_redirect_page', $contentops->CreateHierarchyDropdown(
      '', $this->GetAttr('redirect_page', '0'), $id . 'fbrp_forma_redirect_page'
    )
    );
    
    $smarty->assign(
      'input_form_template',
      $mod->CreateTextArea(
        FALSE, $id,
        $this->GetAttr('form_template', $this->DefaultTemplate()), 'fbrp_forma_form_template', 'module_fb_area_wide',
        'fb_form_template',
        '', '', '80', '15', '', 'html'
      )
    );
    
    $smarty->assign(
      'input_submit_javascript',
      $mod->CreateTextArea(
        FALSE, $id,
        $this->GetAttr('submit_javascript', ''), 'fbrp_forma_submit_javascript', 'module_fb_area_short',
        'fb_submit_javascript',
        '', '', '80', '15', '', 'javascript'
      ) .
      '<br />' . $mod->Lang('title_submit_javascript_long')
    );
    
    
    $smarty->assign(
      'input_submit_response',
      $mod->CreateTextArea(
        FALSE, $id,
        $this->GetAttr('submit_response', $this->createSampleTemplate(TRUE, FALSE)),
        'fbrp_forma_submit_response', 'module_fb_area_wide', '',
        '', '', '80', '15', '', 'html'
      )
    );
    
    $parms                                         = [];
    $parms['forma_submit_response']['html_button'] = TRUE;
    $parms['forma_submit_response']['txt_button']  = FALSE;
    $parms['forma_submit_response']['is_one_line'] = FALSE;
    $parms['forma_submit_response']['is_email']    = FALSE;
    $smarty->assign('help_submit_response', $this->AdminTemplateHelp($id, $parms));
    
    # fixes for CMSMS 2 compatibility (JM)
    # we need this to get (at least) the lang method on the template {$frmbld->Lang('string')}
    $smarty->assign('frmbld', $mod);
    
    # todo - JM remove core 1.12 related code
    if(formbuilder_utils::is_CMS2())
    {
      return $mod->ProcessTemplate('AddEditForm2.tpl');
    }
    
    return $mod->ProcessTemplate('AddEditForm.tpl');
  }
  
  // Add new field
  function &NewField(&$params)
  {
    //$aefield = new fbFieldBase($this,$params);
    $aefield = FALSE;
    if(isset($params['field_id']) && $params['field_id'] != -1)
    {
      // we're loading an extant field
      $sql = 'SELECT type FROM ' . cms_db_prefix() . 'module_fb_field WHERE field_id=?';
      $rs  = formbuilder_utils::GetFB()->dbHandle->Execute($sql, [$params['field_id']]);
      if($rs && $result = $rs->FetchRow())
      {
        if($result['type'] != '')
        {
          $className = $this->MakeClassName($result['type'], '');
          $aefield   = new $className($this, $params);
          $aefield->LoadField($params);
        }
      }
    }
    if($aefield === FALSE)
    {
      // new field
      if(!isset($params['fbrp_field_type']))
      {
        // unknown field type
        $aefield = new fbFieldBase($this, $params);
      }
      else
      {
        // specified field type via params
        $className = $this->MakeClassName($params['fbrp_field_type'], '');
        $aefield   = new $className($this, $params);
      }
    }
    
    return $aefield;
  }
  
  function AddEditField($id, &$aefield, $dispose_only, $returnid, $message = '')
  {
    $mod    = formbuilder_utils::GetFB();
    $smarty = \cms_utils::get_smarty();
    
    if(!empty($message))
    {
      $smarty->assign('message', $mod->ShowMessage($message));
    }
    
    $smarty->assign(
      'backtoform_nav', $mod->CreateLink(
      $id, 'admin_add_edit_form', $returnid, $mod->Lang('link_back_to_form'), ['form_id' => $this->Id]
    )
    );
    $mainList = [];
    $advList  = [];
    $baseList = $aefield->PrePopulateBaseAdminForm($id, $dispose_only);
    
    if($aefield->GetFieldType() == '')
    {
      // still need type
      $smarty->assign('start_form', $mod->CreateFormStart($id, 'admin_add_edit_field', $returnid));
      $fieldList = ['main' => [], 'adv' => []];
    }
    else
    {
      // we have our type
      $smarty->assign('start_form', $mod->CreateFormStart($id, 'admin_add_edit_field', $returnid));
      $fieldList = $aefield->PrePopulateAdminForm($id);
    }
    
    $smarty->assign('end_form', $mod->CreateFormEnd());
    
    #### JM fixes for CMSMS 2
    # todo - JM remove core 1.12 related code
    if(!formbuilder_utils::is_CMS2())
    {
      $smarty->assign(
        'tab_start', $mod->StartTabHeaders() .
                     $mod->SetTabHeader('maintab', $mod->Lang('tab_main')) .
                     $mod->SetTabHeader('advancedtab', $mod->Lang('tab_advanced')) .
                     $mod->EndTabHeaders() . $mod->StartTabContent()
      );
      $smarty->assign('tabs_end', $mod->EndTabContent());
      $smarty->assign('maintab_start', $mod->StartTab("maintab"));
      $smarty->assign('advancedtab_start', $mod->StartTab("advancedtab"));
      $smarty->assign('tab_end', $mod->EndTab());
    }
    
    $smarty->assign('notice_select_type', $mod->Lang('notice_select_type'));
    
    if($aefield->GetId() != -1)
    {
      $smarty->assign('op', $mod->CreateInputHidden($id, 'fbrp_op', $mod->Lang('updated')));
      $smarty->assign('submit', $mod->CreateInputSubmit($id, 'fbrp_aef_upd', $mod->Lang('update')));
    }
    else if($aefield->GetFieldType() != '')
    {
      $smarty->assign('op', $mod->CreateInputHidden($id, 'fbrp_op', $mod->Lang('added')));
      $smarty->assign('submit', $mod->CreateInputSubmit($id, 'fbrp_aef_add', $mod->Lang('add')));
    }
    
    $smarty->assign('cancel', $mod->CreateInputSubmit($id, 'fbrp_cancel', $mod->Lang('cancel')));
    
    if($aefield->HasAddOp())
    {
      $smarty->assign('add', $mod->CreateInputSubmit($id, 'fbrp_aef_optadd', $aefield->GetOptionAddButton()));
    }
    else
    {
      $smarty->assign('add', '');
    }
    if($aefield->HasDeleteOp())
    {
      $smarty->assign('del', $mod->CreateInputSubmit($id, 'fbrp_aef_optdel', $aefield->GetOptionDeleteButton()));
    }
    else
    {
      $smarty->assign('del', '');
    }
    
    
    $smarty->assign(
      'fb_hidden',
      $mod->CreateInputHidden($id, 'form_id', $this->Id) . $mod->CreateInputHidden($id, 'field_id', $aefield->GetId()) .
      $mod->CreateInputHidden($id, 'fbrp_order_by', $aefield->GetOrder()) .
      $mod->CreateInputHidden($id, 'fbrp_set_from_form', '1')
    );
    
    if(/*!$aefield->IsDisposition() && */ !$aefield->IsNonRequirableField())
    {
      $smarty->assign('requirable', 1);
    }
    else
    {
      $smarty->assign('requirable', 0);
    }
    
    if(isset($baseList['main']))
    {
      foreach($baseList['main'] as $item)
      {
        $titleStr      = $item[0];
        $inputStr      = $item[1];
        $oneset        = new stdClass();
        $oneset->title = $titleStr;
        
        if(is_array($inputStr))
        {
          $oneset->input = $inputStr[0];
          $oneset->help  = $inputStr[1];
        }
        else
        {
          $oneset->input = $inputStr;
          $oneset->help  = '';
        }
        
        array_push($mainList, $oneset);
      }
    }
    
    if(isset($baseList['adv']))
    {
      foreach($baseList['adv'] as $item)
      {
        $titleStr      = $item[0];
        $inputStr      = $item[1];
        $oneset        = new stdClass();
        $oneset->title = $titleStr;
        
        if(is_array($inputStr))
        {
          $oneset->input = $inputStr[0];
          $oneset->help  = $inputStr[1];
        }
        else
        {
          $oneset->input = $inputStr;
          $oneset->help  = '';
        }
        
        array_push($advList, $oneset);
      }
    }
    
    if(isset($fieldList['main']))
    {
      foreach($fieldList['main'] as $item)
      {
        $titleStr      = $item[0];
        $inputStr      = $item[1];
        $oneset        = new stdClass();
        $oneset->title = $titleStr;
        
        if(is_array($inputStr))
        {
          $oneset->input = $inputStr[0];
          $oneset->help  = $inputStr[1];
        }
        else
        {
          $oneset->input = $inputStr;
          $oneset->help  = '';
        }
        
        array_push($mainList, $oneset);
      }
    }
    
    if(isset($fieldList['adv']))
    {
      foreach($fieldList['adv'] as $item)
      {
        $titleStr      = $item[0];
        $inputStr      = $item[1];
        $oneset        = new stdClass();
        $oneset->title = $titleStr;
        
        if(is_array($inputStr))
        {
          $oneset->input = $inputStr[0];
          $oneset->help  = $inputStr[1];
        }
        else
        {
          $oneset->input = $inputStr;
          $oneset->help  = '';
        }
        
        array_push($advList, $oneset);
      }
    }
    
    $aefield->PostPopulateAdminForm($mainList, $advList);
    $smarty->assign('mainList', $mainList);
    $smarty->assign('advList', $advList);
    
    # fixes for CMSMS 2 compatibility (JM)
    # we need this to get (at least) the lang method on the template {$frmbld->Lang('string')}
    $smarty->assign('frmbld', $mod);
    
    # todo - JM remove core 1.12 related code
    if(formbuilder_utils::is_CMS2())
    {
      return $mod->ProcessTemplate('AddEditField2.tpl');
    }
    
    return $mod->ProcessTemplate('AddEditField.tpl');
  }
  
  function MakeAlias($string, $isForm = FALSE)
  {
    $string = trim(htmlspecialchars($string));
    
    if($isForm)
    {
      return strtolower($string);
    }
    else
    {
      return 'fb' . strtolower($string);
    }
  }
  
  function SwapFieldsByIndex($src_field_index, $dest_field_index)
  {
    $srcField   = $this->GetFieldByIndex($src_field_index);
    $destField  = $this->GetFieldByIndex($dest_field_index);
    $tmpOrderBy = $destField->GetOrder();
    $destField->SetOrder($srcField->GetOrder());
    $srcField->SetOrder($tmpOrderBy);
    //it seems this makes php4 go crazy fixed by reloading form before showing it again
    #        $this->Fields[$dest_field_index] = $srcField;
    #        $this->Fields[$src_field_index] = $destField;
    $srcField->Store();
    $destField->Store();
  }
  
  function &GetFields()
  {
    return $this->Fields;
  }
  
  function &GetFieldById($field_id)
  {
    $index = -1;
    $ret   = FALSE;
    for($i = 0; $i < count($this->Fields); $i++)
    {
      if($this->Fields[$i]->GetId() == $field_id)
      {
        $index = $i;
      }
    }
    if($index != -1)
    {
      $ret = $this->Fields[$index];
    }
    
    return $ret;
  }
  
  
  function &GetFieldByAlias($field_alias)
  {
    $index = -1;
    $ret   = FALSE;
    for($i = 0; $i < count($this->Fields); $i++)
    {
      if($this->Fields[$i]->GetAlias() == $field_alias)
      {
        $index = $i;
      }
    }
    if($index != -1)
    {
      $ret = $this->Fields[$index];
    }
    
    return $ret;
  }
  
  function &GetFieldByName($field_name)
  {
    $index = -1;
    $ret   = FALSE;
    for($i = 0; $i < count($this->Fields); $i++)
    {
      if($this->Fields[$i]->GetName() == $field_name)
      {
        $index = $i;
      }
    }
    if($index != -1)
    {
      $ret = $this->Fields[$index];
    }
    
    return $ret;
  }
  
  
  function &GetFieldByIndex($field_index)
  {
    return $this->Fields[$field_index];
  }
  
  
  function GetFieldIndexFromId($field_id)
  {
    $index = -1;
    for($i = 0; $i < count($this->Fields); $i++)
    {
      if($this->Fields[$i]->GetId() == $field_id)
      {
        $index = $i;
      }
    }
    
    return $index;
  }
  
  /**
   * NOTE needs revisiting (JM)
   *
   * @return false|string
   */
  function DefaultTemplate()
  {
    return file_get_contents(dirname(__FILE__) . '/../templates/RenderFormDefault.tpl');
  }
  
  function DeleteField($field_id)
  {
    $index = $this->GetFieldIndexFromId($field_id);
    if($index != -1)
    {
      $this->Fields[$index]->Delete();
      array_splice($this->Fields, $index, 1);
    }
  }
  
  function ResetFields()
  {
    for($i = 0; $i < count($this->Fields); $i++)
    {
      $this->Fields[$i]->ResetValue();
    }
  }
  
  // FormBrowser >= 0.3 Response load method. This populates the Field values directly
  // (as opposed to LoadResponseValues, which places the values into the $params array)
  // Also used by validate action for fbDispositionEmailConfirmation (JM note)
  function LoadResponse($response_id)
  {
    $mod = formbuilder_utils::GetFB();
    $db  = $mod->dbHandle;
    
    $oneset = new StdClass();
    $res    = $db->Execute(
      'SELECT response, form_id FROM ' . cms_db_prefix() .
      'module_fb_formbrowser WHERE fbr_id=?', [$response_id]
    );
    
    if($res && $row = $res->FetchRow())
    {
      $oneset->xml     = $row['response'];
      $oneset->form_id = $row['form_id'];
    }
    if($oneset->form_id != $this->GetId())
    {
      return FALSE;
    }
    $fbField = $this->GetFormBrowserField();
    if($fbField == FALSE)
    {
      // error handling goes here.
      echo($mod->Lang('error_has_no_fb_field'));
    }
    $mod->HandleResponseFromXML($fbField, $oneset);
    
    [$fnames, $aliases, $vals] = $mod->ParseResponseXML($oneset->xml, FALSE);
    $this->ResetFields();
    foreach($vals as $id => $val)
    {
      //error_log("setting value of field ".$id." to be ".$val);
      $index = $this->GetFieldIndexFromId($id);
      if($index != -1 && is_object($this->Fields[$index]))
      {
        $this->Fields[$index]->SetValue($val);
      }
    }
    
    return TRUE;
  }
  
  // Check if FormBroweiser field exists
  function GetFormBrowserField()
  {
    $fields  = $this->GetFields();
    $fbField = FALSE;
    foreach($fields as $thisField)
    {
      if($thisField->GetFieldType() == 'DispositionFormBrowser')
      {
        $fbField = $thisField;
      }
    }
    if($fbField == FALSE)
    {
      // error handling goes here.
      return FALSE;
    }
    
    return $fbField;
  }
  
  
  function ReindexResponses()
  {
    @set_time_limit(0);
    $mod       = formbuilder_utils::GetFB();
    $db        = $mod->dbHandle;
    $responses = [];
    $res       = $db->Execute(
      'SELECT fbr_id FROM ' . cms_db_prefix() . 'module_fb_formbrowser WHERE form_id=?', [$this->Id]
    );
    while($res && $row = $res->FetchRow())
    {
      array_push($responses, $row['fbr_id']);
    }
    $fbr_field = $this->GetFormBrowserField();
    foreach($responses as $this_resp)
    {
      if($this->LoadResponse($this_resp))
      {
        $this->StoreResponse($this_resp, '', $fbr_field);
      }
    }
  }
  
  
  // FormBrowser >= 0.3 Response load method. This populates the $params array for later processing/combination
  // (as opposed to LoadResponse, which places the values into the Field values directly)
  // Also used by validate action for fbDispositionEmailConfirmation (JM note)
  function LoadResponseValues(&$params, &$types)
  {
    $mod     = formbuilder_utils::GetFB();
    $db      = $mod->dbHandle;
    $oneset  = new StdClass();
    $form_id = -1;
    $res     = $db->Execute(
      'SELECT response, form_id FROM ' . cms_db_prefix() . 'module_fb_formbrowser WHERE fbr_id=?',
      [$params['response_id']]
    );
    
    if($res && $row = $res->FetchRow())
    {
      $oneset->xml = $row['response'];
      $form_id     = $row['form_id'];
    }
    // loaded a response -- at this point, we check that the response
    // is for the correct form_id!
    if($form_id != $this->GetId())
    {
      return FALSE;
    }
    
    $fbField = $mod->GetFormBrowserField($form_id);
    
    if($fbField === FALSE)
    {
      $fbField = $mod->GetEmailValidationField($form_id);
    }
    
    if($fbField === FALSE)
    {
      // error handling goes here.
      echo($mod->Lang('error_has_no_fb_field'));
    }
    
    $mod->HandleResponseFromXML($fbField, $oneset);
    
    
    [$fnames, $aliases, $vals] = $mod->ParseResponseXML($oneset->xml, FALSE);
    $types = $mod->ParseResponseXMLType($oneset->xml);
    
    foreach($vals as $id => $val)
    {
      if(
        isset($params['fbrp__' . $id]) &&
        !is_array($params['fbrp__' . $id])
      )
      {
        $params['fbrp__' . $id] = [$params['fbrp__' . $id]];
        array_push($params['fbrp__' . $id], $val);
      }
      else if(isset($params['fbrp__' . $id]))
      {
        array_push($params['fbrp__' . $id], $val);
      }
      else
      {
        $params['fbrp__' . $id] = $val;
      }
    }
    
    return TRUE;
  }
  
  // FormBrowser < 0.3 Response load method
  function LoadResponseValuesOld(&$params)
  {
    $db = formbuilder_utils::GetFB()->dbHandle;
    // loading a response -- at this point, we check that the response
    // is for the correct form_id!
    $sql = 'SELECT form_id FROM ' . cms_db_prefix() .
           'module_fb_resp where resp_id=?';
    if($result = $db->GetRow($sql, [$params['response_id']]))
    {
      if($result['form_id'] != $this->GetId())
      {
        return FALSE;
      }
      $sql      = 'SELECT * FROM ' . cms_db_prefix() .
                  'module_fb_resp_val WHERE resp_id=? order by resp_val_id';
      $dbresult = $db->Execute($sql, [$params['response_id']]);
      while($dbresult && $row = $dbresult->FetchRow())
      { // was '__'
        if(
          isset($params['fbrp__' . $row['field_id']]) &&
          !is_array($params['fbrp__' . $row['field_id']])
        )
        {
          $params['fbrp__' . $row['field_id']] = [$params['fbrp__' . $row['field_id']]];
          array_push($params['fbrp__' . $row['field_id']], $row['value']);
        }
        else if(isset($params['fbrp__' . $row['field_id']]))
        {
          array_push($params['fbrp__' . $row['field_id']], $row['value']);
        }
        else
        {
          $params['fbrp__' . $row['field_id']] = $row['value'];
        }
      }
    }
    else
    {
      return FALSE;
    }
  }
  
  // Validation stuff action.validate.php
  function CheckResponse($form_id, $response_id, $code)
  {
    $db  = formbuilder_utils::GetFB()->dbHandle;
    $sql = 'SELECT secret_code FROM '
           . cms_db_prefix()
           . 'module_fb_formbrowser WHERE form_id=? AND fbr_id=?';
    
    if($result = $db->GetRow($sql, [$form_id, $response_id]))
    {
      if($result['secret_code'] == $code)
      {
        return TRUE;
      }
    }
    
    return FALSE;
  }
  
  // Master response inputter
  function StoreResponse($response_id = -1, $approver = '', &$formBuilderDisposition = NULL)
  {
    $mod         = formbuilder_utils::GetFB();
    $db          = formbuilder_utils::GetFB()->dbHandle;
    $fields      = $this->GetFields();
    $newrec      = FALSE;
    $crypt       = FALSE;
    $hash_fields = FALSE;
    $sort_fields = [];
    
    // Check if form has Database fields, do init
    if(
      is_object($formBuilderDisposition) &&
      (
        $formBuilderDisposition->GetFieldType() === 'DispositionFormBrowser'
        || $formBuilderDisposition->GetFieldType() === 'DispositionDatabase'
        || $formBuilderDisposition->GetFieldType() === 'DispositionEmailConfirmation'
      )
    )
    {
      $crypt       = ($formBuilderDisposition->GetOption('crypt', '0') === '1');
      $hash_fields = ($formBuilderDisposition->GetOption('hash_sort', '0') === '1');
      
      for($i = 0; $i < 5; $i++)
      {
        $sort_fields[$i] = $formBuilderDisposition->getSortFieldVal($i + 1);
      }
    }
    
    // If new field
    if($response_id == -1)
    {
      if(is_object($formBuilderDisposition) && $formBuilderDisposition->GetOption('feu_bind', '0') == '1')
      {
        $feu = \cms_utils::get_module('FrontEndUsers');
        
        if($feu == FALSE)
        {
          debug_display("FAILED to instatiate FEU!");
          
          return [FALSE, ''];
        }
        $feu_id = $feu->LoggedInId();
      }
      else
      {
        $feu_id = -1;
      }
      
      $response_id = $db->GenID(cms_db_prefix() . 'module_fb_formbrowser_seq');
      
      foreach($fields as $thisField)
      {
        // set the response_id to be the attribute of the database disposition
        if(
          $thisField->GetFieldType() === 'DispositionDatabase'
          || $thisField->GetFieldType() === 'DispositionFormBrowser'
          || $formBuilderDisposition->GetFieldType() === 'DispositionEmailConfirmation'
        )
        {
          $thisField->SetValue($response_id);
        }
      }
      
      $newrec = TRUE;
    }
    else
    {
      $feu_id = $mod->getFEUIDFromResponseID($response_id);
    }
    
    // Convert form to XML
    $xml = $this->ResponseToXML();
    
    // Do the actual adding
    if(!$crypt)
    {
      $output = $this->StoreResponseXML(
        $response_id,
        $newrec,
        $approver,
        isset($sort_fields[0]) ? $sort_fields[0] : '',
        isset($sort_fields[1]) ? $sort_fields[1] : '',
        isset($sort_fields[2]) ? $sort_fields[2] : '',
        isset($sort_fields[3]) ? $sort_fields[3] : '',
        isset($sort_fields[4]) ? $sort_fields[4] : '',
        $feu_id,
        $xml
      );
    }
    else if(!$hash_fields)
    {
      [$res, $xml] = $mod->crypt($xml, $formBuilderDisposition);
      
      if(!$res)
      {
        return [FALSE, $xml];
      }
      $output = $this->StoreResponseXML(
        $response_id,
        $newrec,
        $approver,
        isset($sort_fields[0]) ? $sort_fields[0] : '',
        isset($sort_fields[1]) ? $sort_fields[1] : '',
        isset($sort_fields[2]) ? $sort_fields[2] : '',
        isset($sort_fields[3]) ? $sort_fields[3] : '',
        isset($sort_fields[4]) ? $sort_fields[4] : '',
        $feu_id,
        $xml
      );
    }
    else
    {
      [$res, $xml] = $mod->crypt($xml, $formBuilderDisposition);
      
      if(!$res)
      {
        return [FALSE, $xml];
      }
      
      $output = $this->StoreResponseXML(
        $response_id,
        $newrec,
        $approver,
        isset($sort_fields[0]) ? $mod->getHashedSortFieldVal($sort_fields[0]) : '',
        isset($sort_fields[1]) ? $mod->getHashedSortFieldVal($sort_fields[1]) : '',
        isset($sort_fields[2]) ? $mod->getHashedSortFieldVal($sort_fields[2]) : '',
        isset($sort_fields[3]) ? $mod->getHashedSortFieldVal($sort_fields[3]) : '',
        isset($sort_fields[4]) ? $mod->getHashedSortFieldVal($sort_fields[4]) : '',
        $feu_id,
        $xml
      );
    }
    
    return $output;
    //return [TRUE, $response_id];
    //return [true, ''];
  }
  
  // Converts form to XML
  function &ResponseToXML()
  {
    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $xml .= "<response form_id=\"" . $this->Id . "\">\n";
    foreach($this->Fields as $thisField)
    {
      $xml .= $thisField->ExportXML(TRUE);
    }
    $xml .= "</response>\n";
    
    return $xml;
  }
  
  // Inserts parsed XML data to database
  function StoreResponseXML(
    $response_id = -1, $newrec = FALSE, $approver = '', $sortfield1 = NULL,
    $sortfield2 = NULL, $sortfield3 = NULL, $sortfield4 = NULL, $sortfield5 = NULL, $feu_id  = NULL, $xml = NULL
  )
  {
    $db          = formbuilder_utils::GetFB()->dbHandle;
    $secret_code = '';
    
    if($newrec)
    {
      // saving a new response
      $secret_code = substr(md5(session_id() . '_' . time()), 0, 7);
      //$response_id = $db->GenID(cms_db_prefix(). 'module_fb_formbrowser_seq');
      $sql = 'INSERT INTO ' . cms_db_prefix() .
             'module_fb_formbrowser (fbr_id, form_id, submitted, secret_code, index_key_1, index_key_2, index_key_3, index_key_4, index_key_5, feuid, response) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
      $res = $db->Execute(
        $sql,
        [
          $response_id,
          $this->GetId(),
          $this->clean_datetime($db->DBTimeStamp(time())),
          $secret_code,
          $sortfield1, $sortfield2, $sortfield3, $sortfield4, $sortfield5,
          $feu_id,
          $xml
        ]
      );
    }
    else if($approver != '')
    {
      $sql = 'UPDATE ' . cms_db_prefix() .
             'module_fb_formbrowser set user_approved=? where fbr_id=?';
      $res = $db->Execute(
        $sql,
        [$this->clean_datetime($db->DBTimeStamp(time())), $response_id]
      );
      audit(
        -1, (isset($name) ? $name : ""),
        formbuilder_utils::GetFB()->Lang('user_approved_submission', [$response_id, $approver])
      );
    }
    if(!$newrec)
    {
      $sql = 'UPDATE ' . cms_db_prefix() .
             'module_fb_formbrowser set index_key_1=?, index_key_2=?, index_key_3=?, index_key_4=?, index_key_5=?, response=? where fbr_id=?';
      $res = $db->Execute(
        $sql,
        [$sortfield1, $sortfield2, $sortfield3, $sortfield4, $sortfield5, $xml, $response_id]
      );
    }
    
    return [$response_id, $secret_code];
  }
  
  // Some stupid date function
  // deprecated.... use formbuilder_utils::clean_datetime($dt) instead if needed at all (Jo Morg)
  // to be removed on FB 1.0
  function clean_datetime($dt)
  {
    return formbuilder_utils::clean_datetime($dt);
  }
  
  // When downloading form.
  function ExportXML($exportValues = FALSE)
  {
    $xmlstr = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $xmlstr .= "<form id=\"" . $this->Id . "\"\n";
    $xmlstr .= "\talias=\"" . $this->Alias . "\">\n";
    $xmlstr .= "\t\t<form_name><![CDATA[" . $this->Name . "]]></form_name>\n";
    foreach($this->Attrs as $thisAttrKey => $thisAttrValue)
    {
      $xmlstr .= "\t\t<attribute key=\"$thisAttrKey\"><![CDATA[$thisAttrValue]]></attribute>\n";
    }
    foreach($this->Fields as $thisField)
    {
      $xmlstr .= $thisField->ExportXML($exportValues);
    }
    $xmlstr .= "</form>\n";
    
    return $xmlstr;
  }
  
  function GetFormBrowsersForForm()
  {
    $db       = formbuilder_utils::GetFB()->dbHandle;
    $fbr      = formbuilder_utils::GetFB()->GetModuleInstance('FormBrowser');
    $browsers = [];
    if($fbr != FALSE)
    {
      $res = $db->Execute(
        'SELECT browser_id from ' . cms_db_prefix() . 'module_fbr_browser where form_id=?',
        [$this->GetId()]
      );
      while($res && $row = $res->FetchRow())
      {
        array_push($browsers, $row['browser_id']);
      }
    }
    
    return $browsers;
  }
  
  /**
   * ??????????
   * @param $response_id
   */
  function AddToSearchIndex($response_id)
  {
    // find browsers keyed to this
    $browsers = $this->GetFormBrowsersForForm();
    if(count($browsers) < 1)
    {
      return;
    }
    
    $module = formbuilder_utils::GetFB()->GetModuleInstance('Search');
    
    if($module != FALSE)
    {
      $submitstring = '';
      foreach($this->Fields as $thisField)
      {
        if($thisField->DisplayInSubmission())
        {
          $submitstring .= ' ' . $thisField->GetHumanReadableValue($as_string = TRUE);
        }
      }
      foreach($browsers as $thisBrowser)
      {
        $module->AddWords('FormBrowser', $response_id, 'sub_' . $thisBrowser, $submitstring, NULL);
      }
    }
  }
  
  function setFinishedFormSmarty($htmlemail = FALSE)
  {
    $mod    = formbuilder_utils::GetFB();
    $smarty = \cms_utils::get_smarty();
    
    $theFields = $this->GetFields();
    $unspec    = $this->GetAttr('unspecified', $mod->Lang('unspecified'));
    
    $formInfo = [];
    for($i = 0; $i < count($theFields); $i++)
    {
      $replVal  = $unspec;
      $replVals = []; // what is this doing here? (Jo Morg)
      if($theFields[$i]->DisplayInSubmission())
      {
        $replVal = $theFields[$i]->GetHumanReadableValue();
        
        // this should no longer be necessary but let it stay just in case (JoMorg)
        if(is_array($replVal))
        {
          $replVal = $replVal[0];
        }
        
        if($htmlemail)
        {
          // allow <BR> as delimiter or in content
          $replVal = preg_replace('/<br(\s)*(\/)*>/i', '|BR|', $replVal);
          $replVal = preg_replace('/[\n\r]+/', '|BR|', $replVal);
          $replVal = htmlspecialchars($replVal);
          $replVal = preg_replace('/\|BR\|/', '<br />', $replVal);
        }
        if($replVal == '')
        {
          $replVal = $unspec;
        }
      }
      
      $smarty->assign($theFields[$i]->GetVariableName(), $replVal);
      $smarty->assign('fld_' . $theFields[$i]->GetId(), $replVal);
      $fldobj = $theFields[$i]->ExportObject();
      $smarty->assign($theFields[$i]->GetVariableName() . '_obj', $fldobj);
      $smarty->assign('fld_' . $theFields[$i]->GetId() . '_obj', $fldobj);
      if($theFields[$i]->GetAlias() != '')
      {
        $smarty->assign($theFields[$i]->GetAlias(), $replVal);
        $smarty->assign($theFields[$i]->GetAlias() . '_obj', $fldobj);
      }
    }
    // general form details
    $smarty->assign('sub_form_name', $this->GetName());
    $smarty->assign('sub_date', date('r'));
    $smarty->assign('sub_host', $_SERVER['SERVER_NAME']);
    $smarty->assign('sub_source_ip', $_SERVER['REMOTE_ADDR']);
    $smarty->assign(
      'sub_url', (empty($_SERVER['HTTP_REFERER']) ? $mod->Lang('no_referrer_info') : $_SERVER['HTTP_REFERER'])
    );
    $smarty->assign('fb_version', $mod->GetVersion());
    $smarty->assign('TAB', "\t");
  }
  
  
  /**
   * NOTE:
   * This method will have to be refactored
   * The Form class should NOT be responsible for handling the uploads
   * TODO: change this and move the pertinent code to the upload fields (JM)
   *
   * @return array
   */
  function manageFileUploads()
  {
    $gCms      = cmsms();
    $theFields = $this->GetFields();
    $mod       = formbuilder_utils::GetFB();
    
    // build rename map
    $mapId       = [];
    $eval_string = FALSE;
    
    for($j = 0, $jMax = count($theFields); $j < $jMax; $j++)
    {
      $mapId[$theFields[$j]->GetId()] = $j;
    }
    
    for($i = 0, $iMax = count($theFields); $i < $iMax; $i++)
    {
      if(strtolower(get_class($theFields[$i])) == 'fbfileuploadfield')
      {
        // Handle file uploads
        // if the uploads module is found, and the option is checked in
        // the field, then the file is added to the uploads module
        // and a link is added to the results
        // if the option is not checked, then the file is merely uploaded to
        // the "uploads" directory
        
        $_id = $mod->module_id . 'fbrp__' . $theFields[$i]->Id;
        if(isset($_FILES[$_id]) && $_FILES[$_id]['size'] > 0)
        {
          $thisFile =& $_FILES[$_id];
          $thisExt  = substr($thisFile['name'], strrpos($thisFile['name'], '.'));
          
          if($theFields[$i]->GetOption('file_rename', '') == '')
          {
            $destination_name = $thisFile['name'];
          }
          else
          {
            $flds             = [];
            $destination_name = $theFields[$i]->GetOption('file_rename');
            preg_match_all('/\$fld_(\d+)/', $destination_name, $flds);
            foreach($flds[1] as $tF)
            {
              if(isset($mapId[$tF]))
              {
                $ref              = $mapId[$tF];
                $destination_name = str_replace(
                  '$fld_' . $tF,
                  $theFields[$ref]->GetHumanReadableValue(), $destination_name
                );
              }
            }
            $destination_name = str_replace('$ext', $thisExt, $destination_name);
            # finally parse through smarty
            $smarty           = \cms_utils::get_smarty();
            $destination_name = $smarty->fetch('eval:' . $destination_name);
          }
          
          if($theFields[$i]->GetOption('sendto_uploads'))
          {
            // we have a file we can send to the uploads
            $uploads = \cms_utils::get_module('Uploads');
            if(!$uploads)
            {
              // no uploads module
              audit(-1, $mod->GetName(), $mod->Lang('submit_error'), $mail->GetErrorInfo());
              
              return [$res, $mod->Lang('nouploads_error')];
            }
            
            $parms                   = [];
            $parms['input_author']   = $mod->Lang('anonymous');
            $parms['input_summary']  = $mod->Lang('title_uploadmodule_summary');
            $parms['category_id']    = $theFields[$i]->GetOption('uploads_category');
            $parms['field_name']     = $_id;
            $parms['input_destname'] = $destination_name;
            if($theFields[$i]->GetOption('allow_overwrite', '0') == '1')
            {
              $parms['input_replace'] = 1;
            }
            $res = $uploads->AttemptUpload(-1, $parms, -1);
            
            if($res[0] == FALSE)
            {
              // failed upload kills the send.
              audit(-1, $mod->GetName(), $mod->Lang('submit_error', $res[1]));
              
              return [$res[0], $mod->Lang('uploads_error', $res[1])];
            }
            
            $uploads_destpage = $theFields[$i]->GetOption('uploads_destpage');
            $url              = $uploads->CreateLink(
              $parms['category_id'], 'getfile', $uploads_destpage, '',
              ['upload_id' => $res[1]], '', TRUE
            );
            
            $url = str_replace('admin/moduleinterface.php?', 'index.php?', $url);
            
            $theFields[$i]->ResetValue();
            $theFields[$i]->SetValue($url);
          }
          else
          {
            // Handle the upload ourselves
            $src       = $thisFile['tmp_name'];
            $dest_path = $theFields[$i]->GetOption('file_destination', $gCms->config['uploads_path']);
            
            // validated message before, now do it for the file itself
            $valid = TRUE;
            $ms    = $theFields[$i]->GetOption('max_size');
            $exts  = $theFields[$i]->GetOption('permitted_extensions', '');
            if($ms != '' && $thisFile['size'] > ($ms * 1024))
            {
              $valid = FALSE;
            }
            else if($exts != '')
            {
              $match     = FALSE;
              $legalExts = explode(',', $exts);
              foreach($legalExts as $thisExt)
              {
                if(preg_match('/\.' . trim($thisExt) . '$/i', $thisFile['name']))
                {
                  $match = TRUE;
                }
                else if(preg_match('/' . trim($thisExt) . '/i', $thisFile['type']))
                {
                  $match = TRUE;
                }
              }
              if(!$match)
              {
                $valid = FALSE;
              }
            }
            if(!$valid)
            {
              unlink($src);
              audit(-1, $mod->GetName(), $mod->Lang('illegal_file', [$thisFile['name'], $_SERVER['REMOTE_ADDR']]));
              
              return [FALSE, ''];
            }
            $dest = $dest_path . DIRECTORY_SEPARATOR . $destination_name;
            if(file_exists($dest) && $theFields[$i]->GetOption('allow_overwrite', '0') == '0')
            {
              unlink($src);
              
              return [FALSE, $mod->Lang('file_already_exists', [$destination_name])];
            }
            if(!move_uploaded_file($src, $dest))
            {
              audit(-1, $mod->GetName(), $mod->Lang('submit_error', ''));
              
              return [FALSE, $mod->Lang('uploads_error', '')];
            }
            else
            {
              if(strpos($dest_path, $gCms->config['root_path']) !== FALSE)
              {
                #render a properlly formed relative path (JoMorg)
                $url = str_replace($gCms->config['root_path'] . DIRECTORY_SEPARATOR, '/', $dest_path) . '/' .
                       $destination_name;
                
              }
              else
              {
                $url = $mod->Lang('uploaded_outside_webroot', $destination_name);
              }
              
              $tmp      = explode('/', $destination_name);
              $filename = array_pop($tmp);
              
              $theFields[$i]->ResetValue();
              $theFields[$i]->SetValue([$filename, $url]);
            }
          }
        }
      }
    }
    
    return [TRUE, ''];
  }
  
  
}

?>