<?php
/* Smarty version 4.5.2, created on 2025-05-30 19:54:15
  from 'module_file_tpl:ModuleManager;showmodule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6839f0c71867d6_27128086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f4d008cb6ec8391167a2b2f9456f3781cc92dfe' => 
    array (
      0 => 'module_file_tpl:ModuleManager;showmodule.tpl',
      1 => 1748538719,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6839f0c71867d6_27128086 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'get_module_status_icon' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\ModuleManager^1f4d008cb6ec8391167a2b2f9456f3781cc92dfe_0.module_file_tpl.ModuleManagershowmodule.tpl.php',
    'uid' => '1f4d008cb6ec8391167a2b2f9456f3781cc92dfe',
    'call_name' => 'smarty_template_function_get_module_status_icon_6718675676839f0c7093738_95537586',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.localedate_format.php','function'=>'smarty_modifier_localedate_format',),));
if ((isset($_smarty_tpl->tpl_vars['header']->value))) {?>
<h3><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</h3>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['letters']->value))) {?>
<p class="pagerows"><?php echo $_smarty_tpl->tpl_vars['letters']->value;?>
</p>
<?php }?>
<div style="clear:both;">&nbsp;</div>
<?php if ((isset($_smarty_tpl->tpl_vars['message']->value))) {?>
<p class="pageerror"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {?>
<table class="pagetable scrollable">
	<thead>
		<tr>
			<th></th>
			<th><?php echo $_smarty_tpl->tpl_vars['nametext']->value;?>
</th>
			<th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulelastversion');?>
"><?php echo $_smarty_tpl->tpl_vars['vertext']->value;?>
</span></th>
			<th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulereleasedate');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('releasedate');?>
</span></th>
						<th><?php echo $_smarty_tpl->tpl_vars['sizetext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['statustext']->value;?>
</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
		<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['entry']->value->age == 'new') {?>style="font-weight: bold;"<?php }?>>
			<td><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'get_module_status_icon', array('status'=>$_smarty_tpl->tpl_vars['entry']->value->age), true);?>
</td>
			<td><span title="<?php echo (($tmp = smarty_modifier_cms_escape(preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['entry']->value->description)) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->version;?>
</td>
			<td><?php echo smarty_modifier_localedate_format($_smarty_tpl->tpl_vars['entry']->value->date,'%x');?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->size;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->status;?>
</td>
			<td><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulereleasedepends');?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->dependslink;?>
</span></td>
			<td><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulereleasehelp');?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->helplink;?>
</span></td>
			<td><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulereleaseabout');?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->aboutlink;?>
</span></td>
		</tr> 
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</tbody>
</table>
<?php }
}
/* smarty_template_function_get_module_status_icon_6718675676839f0c7093738_95537586 */
if (!function_exists('smarty_template_function_get_module_status_icon_6718675676839f0c7093738_95537586')) {
function smarty_template_function_get_module_status_icon_6718675676839f0c7093738_95537586(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

<?php if ($_smarty_tpl->tpl_vars['status']->value == 'stale') {
echo $_smarty_tpl->tpl_vars['stale_img']->value;
} elseif ($_smarty_tpl->tpl_vars['status']->value == 'warn') {
echo $_smarty_tpl->tpl_vars['warn_img']->value;
} elseif ($_smarty_tpl->tpl_vars['status']->value == 'new') {
echo $_smarty_tpl->tpl_vars['new_img']->value;
}
}}
/*/ smarty_template_function_get_module_status_icon_6718675676839f0c7093738_95537586 */
}
