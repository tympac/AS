<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:04:29
  from 'module_file_tpl:AceSyntax;prefstab_frontend.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6837502d091077_94070357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7bf03ecaee6f5bd70b4f4032665506f2de6f330' => 
    array (
      0 => 'module_file_tpl:AceSyntax;prefstab_frontend.tpl',
      1 => 1748448965,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6837502d091077_94070357 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('action'=>'save_settings_frontend'),$_smarty_tpl);?>
<fieldset><p class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('content_description_frontend');?>
</p><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('frontend_width_title');?>
 </p><p class="pageinput"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_width" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_width" size="5" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_width','400');?>
" /><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_width_units" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_width_units"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['unitsinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_width_units')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('frontend_height_title');?>
 </p><p class="pageinput"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_height" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_height" size="5" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_height','500');?>
" /><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_height_units" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_height_units"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['unitsinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_height_units')),$_smarty_tpl);?>
</select><br /><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_auto_height" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_auto_height" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_auto_height');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_auto_height') == 1) {?> checked="checked"<?php }?> /> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('auto_height');?>
</p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('syntax_mode');?>
 </p><p class="pageinput"><select name='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_syntaxarea_mode' id='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_syntaxarea_mode'><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetModes(),'selected'=>$_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_syntaxarea_mode','html')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('themes');?>
 </p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_syntaxarea_theme" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_syntaxarea_theme"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetThemes(),'selected'=>$_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_syntaxarea_theme','github')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('font_size');?>
 </p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_fontsize" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
frontend_fontsize"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['fontsizeinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->GetPreference('frontend_fontsize','12px')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> &nbsp; </p><p class="pageinput"> <?php echo $_smarty_tpl->tpl_vars['frontendsubmit']->value;?>
 </p></div></fieldset><?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
