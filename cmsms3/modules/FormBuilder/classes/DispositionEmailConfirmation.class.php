<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

require_once('DispositionEmailBase.class.php');

class fbDispositionEmailConfirmation extends fbDispositionEmailBase {

	//var $validated;
	
	function __construct($form_ptr, &$params)
	{
		parent::__construct($form_ptr, $params);
		$mod                       = formbuilder_utils::GetFB();
		$this->Type                = 'DispositionEmailConfirmation';
		$this->DisplayInForm       = TRUE;
		$this->NonRequirableField  = FALSE;
		$this->DisplayInSubmission = TRUE;
		$this->IsDisposition       = TRUE;
		$this->ValidationTypes     = [];
		$this->ValidationType      = 'email';
		$this->modifiesOtherFields = TRUE;
		$this->form_ptr->AddTemplateVariable(
			'confirm_url',
			$mod->Lang('title_confirmation_url')
		);
		$this->approvedToGo = FALSE;
	}
	
	function StatusInfo()
	{
        return $this->TemplateStatus();
	}

	function ApproveToGo($response_id)
	{
		$this->approvedToGo = true;
	}
	
	function ModifyOtherFields()
	{
		$mod = formbuilder_utils::GetFB();
		
		if($this->form_ptr->GetFormState() == 'update')
		{
			$this->approvedToGo = TRUE;
			
			return;
		}
		
		// If we haven't been approved, inhibit all other dispositions!
		$others = $this->form_ptr->GetFields();
		
		for($i = 0, $iMax = count($others); $i < $iMax; $i++)
		{
			if(
				($this->approvedToGo && $others[$i]->GetFieldType() == 'DispositionDatabase') ||
				($this->approvedToGo && $others[$i]->GetFieldType() == 'DispositionFormBrowser')
			)
			{
				$others[$i]->SetApprovalName($this->GetValue());
			}
			else if(!$this->approvedToGo && $others[$i]->IsDisposition())
			{
				$others[$i]->SetDispositionPermission(FALSE);
			}
		}
		$this->SetDispositionPermission(TRUE);
	}
	
	function GetFieldInput($id, &$params, $returnid)
	{
		$mod   = formbuilder_utils::GetFB();
		$js    = $this->GetOption('javascript', '');
		$val   = '';
		$html5 = '';
		
		if($this->GetOption('html5', '0') == '1')
		{
			$val   = $this->Value;
			$html5 = ' placeholder="' . $this->GetOption('default') . '"';
			if($this->IsRequired())
			{
				$html5 .= ' required';
			}
		}
		else
		{
			$val = $this->Value ? $this->Value : $this->GetOption('default');
			
			if($this->GetOption('clear_default', '0') == 1)
			{
				$js .= ' onfocus="if(this.value==this.defaultValue) this.value=\'\';" onblur="if(this.value==\'\') this.value=this.defaultValue;"';
			}
		}
		
		return $mod->fbCreateInputText(
																		$id, 'fbrp__' . $this->Id,
																		htmlspecialchars($val, ENT_QUOTES),
																		25, 80, $js . $html5 . $this->GetCSSIdTag(), 'email'
																	);
	}


    // Send off those emails
	function DisposeForm($returnid)
	{
		$mod = formbuilder_utils::GetFB();
		
		if(!$this->approvedToGo)
		{
			// create response URL
			# $fbrf = null;
			
			$fbrf = $this;
			[$rid, $code] = $this->form_ptr->StoreResponse(-1, '', $fbrf);
			
			\cms_utils::get_smarty()->assign(
				'confirm_url', $mod->CreateFrontendLink(
																												'', $returnid,
																												'validate', '', ['fbrp_f' => $this->form_ptr->GetId(), 'fbrp_r' => $rid, 'fbrp_c' => $code], '',
																												TRUE, FALSE, '', TRUE
																											)
			);
			
			return $this->SendForm($this->GetValue(), $this->GetOption('email_subject'));
		}
		else
		{
			return [TRUE, ''];
		}
	}
	
	function PrePopulateAdminForm($formDescriptor)
	{
	  $mod = formbuilder_utils::GetFB();
	  
	  $gCms = cmsms();
	  $contentops = $gCms->GetContentOperations();

	  [$main,$adv] = $this->PrePopulateAdminFormBase($formDescriptor);
	  array_push($adv, array($mod->Lang('title_field_default_value'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_default',$this->GetOption('default'),25,1024)));
	  array_push($adv, array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.$mod->Lang('title_clear_default_help')));

	  array_push($main,array($mod->Lang('redirect_after_approval'),
				 @$contentops->CreateHierarchyDropdown('',$this->GetOption('redirect_page','0'), $formDescriptor.'fbrp_opt_redirect_page')));
	  return array('main'=>$main,'adv'=>$adv);
	}
	
	function Validate()
	{
		$this->validated           = TRUE;
		$this->validationErrorText = '';
		$mod                       = formbuilder_utils::GetFB();
		switch($this->ValidationType)
		{
			case 'email':
				if(
					$this->Value !== FALSE
					&& !email_validator::is_email($this->Value)
				)
				{
					$this->validated           = FALSE;
					$this->validationErrorText = $mod->Lang('please_enter_an_email', $this->Name);
				}
			break;
		}
		
		return [$this->validated, $this->validationErrorText];
	}
	
	function getSortFieldVal($sortFieldNumber)
	{
		return -1;
	}
}

?>
