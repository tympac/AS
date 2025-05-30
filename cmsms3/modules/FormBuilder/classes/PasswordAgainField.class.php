<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbPasswordAgainField extends fbFieldBase {

	function __construct($form_ptr, &$params)
	{
		parent::__construct($form_ptr, $params);
		$mod = formbuilder_utils::GetFB();
		$this->Type = 'PasswordAgainField';
		$this->DisplayInForm = true;
		$this->ValidationTypes = array(
			);
		$this->modifiesOtherFields = false;
	}

	function GetFieldInput($id, &$params, $returnid)
	{
		$mod = formbuilder_utils::GetFB();
		$js = $this->GetOption('javascript','');
		$val = '';
		$html5 = '';

		if ($this->GetOption('html5','0') == '1')
		{
                        $val = $this->Value;
                        $html5 = ' placeholder="'.$this->GetOption('default').'"';
		        if ($this->IsRequired()) {
		                $html5 .= ' required';
		        }
                }
                else
                {
                        $val = $this->Value ? $this->Value : $this->GetOption('default');
                        if($this->GetOption('clear_default','0') == 1)
                        {
                                $js .= ' onfocus="if(this.value==this.defaultValue) this.value=\'\';" onblur="if(this.value==\'\') this.value=this.defaultValue;"';
                        }
                }
		if ($this->GetOption('hide','1') == '0')
		{
			return $mod->fbCreateInputText($id, 'fbrp__'.$this->Id,
				$val,$this->GetOption('length'), 255,
				$html5.$js.$this->GetCSSIdTag());
		}
		else
		{
			return $mod->CreateInputPassword($id, 'fbrp__'.$this->Id,
				$val, $this->GetOption('length'),255,
				$html5.$js.$this->GetCSSIdTag());
		}
	}

	function StatusInfo()
	{
		$mod = formbuilder_utils::GetFB();
		return $mod->Lang('title_field_id') . ': ' . $this->GetOption('field_to_validate','');
	}
	
	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();
		$flds = $this->form_ptr->GetFields();
		$opts = array();
		foreach ($flds as $tf)
			{
			if ($tf->GetFieldType() == 'PasswordField')
            {
			   $opts[$tf->GetName()]=$tf->GetName();
			   }
			}
		$main = array(
			array(
				$mod->Lang('title_field_to_validate'),
			$mod->CreateInputDropdown($formDescriptor, 'fbrp_opt_field_to_validate', $opts, -1, $this->GetOption('field_to_validate'))
			),
			array($mod->Lang('title_display_length'),
			      $mod->CreateInputText($formDescriptor,
						    'fbrp_opt_length',
			         $this->GetOption('length','12'),25,25)),
			array($mod->Lang('title_minimum_length'),
			      $mod->CreateInputText($formDescriptor,
						    'fbrp_opt_min_length',
			         $this->GetOption('min_length','8'),25,25)),
			array($mod->Lang('title_hide'),
			      $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_hide','0').
            		$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_hide',
            		'1',$this->GetOption('hide','1')).$mod->Lang('title_hide_help')),

		);

		$adv = array();
		array_push($adv, array($mod->Lang('title_field_default_value'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_default',$this->GetOption('default'),25,1024)));
		array_push($adv, array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.$mod->Lang('title_clear_default_help')));
		return array('main'=>$main,'adv'=>$adv);
	}


	function Validate()
	{
		$this->validated = true;
		$this->validationErrorText = '';
		$mod = formbuilder_utils::GetFB();

		$field_to_validate = $this->GetOption('field_to_validate','');

		if ($field_to_validate != '')
		{
			foreach ($this->form_ptr->Fields as $one_field)
			{
				if ($one_field->Name == $field_to_validate)
				{
					$value = $one_field->GetValue();
					if ($value != $this->Value)
					{
						$this->validated = false;
						$this->validationErrorText = $mod->Lang('password_does_not_match', $field_to_validate);
					}
				}
			}
		}
		return array($this->validated, $this->validationErrorText);
	}
}

?>
