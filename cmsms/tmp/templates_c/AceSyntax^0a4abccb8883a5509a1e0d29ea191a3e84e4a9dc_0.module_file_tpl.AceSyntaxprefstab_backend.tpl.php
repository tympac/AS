<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:03:42
  from 'module_file_tpl:AceSyntax;prefstab_backend.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_68374ffe4ece50_98960382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a4abccb8883a5509a1e0d29ea191a3e84e4a9dc' => 
    array (
      0 => 'module_file_tpl:AceSyntax;prefstab_backend.tpl',
      1 => 1748448965,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68374ffe4ece50_98960382 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('action'=>'save_settings_backend'),$_smarty_tpl);?>
<fieldset><p class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('content_description_backend');?>
</p><div class="c_full"><div class="grid_6"><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('width_title');?>
 </p><p class="pageinput"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
width" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
width" size="5" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('width','100');?>
" /><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
width_units" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
width_units"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['unitsinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('width_units','%')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('height_title');?>
 </p><p class="pageinput"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
height" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
height" size="5" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('height','600');?>
" /><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
height_units" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
height_units"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['unitsinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('height_units','px')),$_smarty_tpl);?>
</select><br /><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
auto_height" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
auto_height" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('auto_height',0);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('auto_height') == 1) {?> checked="checked"<?php }?> /> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('auto_height');?>
</p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('syntax_mode');?>
 </p><p class="pageinput"><select name='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
mode' id='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
mode' onchange="this.form.submit()"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetModes(),'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('mode','html')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('themes');?>
 </p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
theme" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
theme" onchange="this.form.submit()"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetThemes(),'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('theme','twilight')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('font_size');?>
 </p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
fontsize" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
fontsize"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['fontsizeinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('fontsize','13px')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('full_line');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
full_line" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
full_line" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('full_line',1);?>
" <?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('full_line') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('full_line') == 1) {?>checked<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('highlight_active');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
highlight_active" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
highlight_active" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('highlight_active',1);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('highlight_active') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('highlight_active') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('show_invisibles');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
show_invisibles" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
show_invisibles" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('show_invisibles',0);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('show_invisibles') == 1) {?> checked="checked"<?php }?> /></p></div></div><div class="grid_6"><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('persistent_hscroll');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
persistent_hscroll" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
persistent_hscroll" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('persistent_hscroll',0);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('persistent_hscroll') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('soft_wrap');?>
 </p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
soft_wrap" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
soft_wrap"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['soft_wrapinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('soft_wrap','80')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('show_gutter');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
show_gutter" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
show_gutter" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('show_gutter',1);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('show_gutter') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('show_gutter') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('wrap_line');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
wrap_line" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
wrap_line" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('wrap_line',1);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('wrap_line') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('wrap_line') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('print_margin');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
print_margin" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
print_margin" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('print_margin',0);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('print_margin') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('soft_tab');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
soft_tab" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
soft_tab" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('soft_tab',1);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('soft_tab') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('soft_tab') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('tab_size');?>
 </p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
tab_size" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
tab_size"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tab_sizeinput']->value,'selected'=>$_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('tab_size','4')),$_smarty_tpl);?>
</select></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('highlight_selected');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
highlight_selected" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
highlight_selected" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('highlight_selected',1);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('highlight_selected') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('highlight_selected') == 1) {?> checked="checked"<?php }?> /></p></div><div class="pageoverflow"><p class="pagetext"> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('enable_behaviors');?>
 </p><p class="pageinput"><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
enable_behaviors" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
enable_behaviors" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('enable_behaviors',1);?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('enable_behaviors') == '' || $_smarty_tpl->tpl_vars['mod']->value->AceGetPreference('enable_behaviors') == 1) {?> checked="checked"<?php }?> /></p></div></div></div><div class="pageoverflow"><p class="pagetext"> &nbsp; </p><p class="pageinput"> <?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
 </p></div></fieldset><fieldset><legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('testareatext');?>
</legend><div class="pageoverflow"><div class="pageinput"><textarea id="as_test" class="AceSyntax" data-cms-lang="smarty"><?php echo $_smarty_tpl->tpl_vars['testareacontent']->value;?>
</textarea></div></div></fieldset><?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
