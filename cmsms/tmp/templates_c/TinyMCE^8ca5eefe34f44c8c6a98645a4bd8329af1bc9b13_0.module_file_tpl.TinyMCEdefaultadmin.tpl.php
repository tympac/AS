<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:10:13
  from 'module_file_tpl:TinyMCE;defaultadmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_683751852414f8_96640849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ca5eefe34f44c8c6a98645a4bd8329af1bc9b13' => 
    array (
      0 => 'module_file_tpl:TinyMCE;defaultadmin.tpl',
      1 => 1748449066,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
    'module_file_tpl:TinyMCE;admin_profileslist.tpl' => 1,
  ),
),false)) {
function content_683751852414f8_96640849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_action_url.php','function'=>'smarty_cms_function_cms_action_url',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.admin_icon.php','function'=>'smarty_function_admin_icon',),));
?>


<div class="pagecontainer">

	<a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_editprofile'),$_smarty_tpl);?>
">
		<?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('new_profile');?>

	</a>

	<?php $_smarty_tpl->_subTemplateRender('module_file_tpl:TinyMCE;admin_profileslist.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 8, false);
?>



</div>
<?php }
}
