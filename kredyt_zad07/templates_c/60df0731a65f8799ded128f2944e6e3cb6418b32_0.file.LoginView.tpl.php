<?php
/* Smarty version 4.5.4, created on 2024-12-08 13:22:30
  from 'C:\xampp\htdocs\kredyt_zad07\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67558f86d6d136_01757223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60df0731a65f8799ded128f2944e6e3cb6418b32' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kredyt_zad07\\app\\views\\LoginView.tpl',
      1 => 1733660550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_67558f86d6d136_01757223 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_54845001867558f86d63613_14893256', 'content');
?>

<?php }
/* {block 'content'} */
class Block_54845001867558f86d63613_14893256 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_54845001867558f86d63613_14893256',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
}
}
/* {/block 'content'} */
}
