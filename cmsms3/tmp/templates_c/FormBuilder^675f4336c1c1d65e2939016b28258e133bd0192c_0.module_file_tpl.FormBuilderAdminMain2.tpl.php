<?php
/* Smarty version 4.5.2, created on 2025-05-30 19:54:23
  from 'module_file_tpl:FormBuilder;AdminMain2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6839f0cf99c347_94751588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '675f4336c1c1d65e2939016b28258e133bd0192c' => 
    array (
      0 => 'module_file_tpl:FormBuilder;AdminMain2.tpl',
      1 => 1748627613,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6839f0cf99c347_94751588 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_header.php','function'=>'smarty_function_tab_header',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_start.php','function'=>'smarty_function_tab_start',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_end.php','function'=>'smarty_function_tab_end',),));
if ($_smarty_tpl->tpl_vars['message']->value != '') {?><div class="pagemcontainer"><p class="pagemessage"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p></div><?php }?>

<?php echo smarty_function_tab_header(array('name'=>'forms','label'=>$_smarty_tpl->tpl_vars['frmbld']->value->lang('forms')),$_smarty_tpl);?>

<?php echo smarty_function_tab_header(array('name'=>'config','label'=>$_smarty_tpl->tpl_vars['frmbld']->value->lang('configuration')),$_smarty_tpl);?>


<?php echo smarty_function_tab_start(array('name'=>'forms'),$_smarty_tpl);?>

<table class="pagetable">
<thead>
<tr>
  <th><?php echo $_smarty_tpl->tpl_vars['title_form_name']->value;?>
</th>
  <th><?php echo $_smarty_tpl->tpl_vars['title_form_alias']->value;?>
</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
</thead>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['forms']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
  <tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
';">
    <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
    <td>&#123;FormBuilder form='<?php echo $_smarty_tpl->tpl_vars['entry']->value->usage;?>
'&#125;</td>
    <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->xml;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
  </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<tr>
  <td colspan="5">
<?php if ($_smarty_tpl->tpl_vars['addlink']->value != '') {
echo $_smarty_tpl->tpl_vars['addlink']->value;
echo $_smarty_tpl->tpl_vars['addform']->value;
}?>
  </td>
</tr>
</table>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['legend_xml_import']->value;?>
</legend>
<?php echo $_smarty_tpl->tpl_vars['start_xmlform']->value;?>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_xml_to_upload']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_xml_to_upload']->value;?>
</p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_xml_upload_formname']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_xml_upload_formname']->value;?>
&nbsp;<em><?php echo $_smarty_tpl->tpl_vars['info_leaveempty']->value;?>
</em></p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_xml_upload_formalias']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_xml_upload_formalias']->value;?>
&nbsp;<em><?php echo $_smarty_tpl->tpl_vars['info_leaveempty']->value;?>
</em></p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submitxml']->value;?>
</p>
</div>
<?php echo $_smarty_tpl->tpl_vars['end_xmlform']->value;?>

</fieldset>
<?php echo smarty_function_tab_start(array('name'=>'config'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['may_config']->value == 1) {
echo $_smarty_tpl->tpl_vars['start_configform']->value;?>

<div class="pageoverflow">
	<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_hide_errors']->value;?>
:</p>
	<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_hide_errors']->value;?>
</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_require_fieldnames']->value;?>
:</p>
	<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_require_fieldnames']->value;?>
</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_unique_fieldnames']->value;?>
:</p>
	<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_unique_fieldnames']->value;?>
</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_blank_invalid']->value;?>
:</p>
	<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_blank_invalid']->value;?>
</p>
</div>
<div class="pageoverflow">
	<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['frmbld']->value->lang('title_select_udt_handler');?>
:</p>
	<p class="pageinput">
    <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
udt_handler_pref">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['udts_handlers_list']->value,'selected'=>$_smarty_tpl->tpl_vars['udt_handler_pref']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>
<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
</p>
</div>
<?php echo $_smarty_tpl->tpl_vars['end_configform']->value;?>


<?php } else { ?>
  <p><?php echo $_smarty_tpl->tpl_vars['no_permission']->value;?>
</p>
<?php }
echo smarty_function_tab_end(array(),$_smarty_tpl);
}
}
