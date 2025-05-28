<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:28:02
  from 'cms_template:minimal_menu' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_683755b29d58e8_19054080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b7345e03035e961b2ff8028a1c2039a7f4be114' => 
    array (
      0 => 'cms_template:minimal_menu',
      1 => '1748410181',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683755b29d58e8_19054080 (Smarty_Internal_Template $_smarty_tpl) {
if (!(isset($_smarty_tpl->tpl_vars['depth']->value))) {
$_smarty_tpl->_assignInScope('depth', 0);
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['nodes']->value))) {?><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nodes']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
if ($_smarty_tpl->tpl_vars['node']->value->type == 'sectionheader') {?><li class="sectionheader<?php if ($_smarty_tpl->tpl_vars['node']->value->parent) {?> activeparent<?php }?>"><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;
if ((isset($_smarty_tpl->tpl_vars['node']->value->children))) {
$_smarty_tpl->_subTemplateRender(basename($_smarty_tpl->source->filepath), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('nodes'=>$_smarty_tpl->tpl_vars['node']->value->children,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), 0, true);
}?></li><?php } elseif ($_smarty_tpl->tpl_vars['node']->value->type == 'separator') {?><li style="list-style-type: none;"><hr class="separator"/></li><?php } else {
$_smarty_tpl->_assignInScope('liclass', '');
$_smarty_tpl->_assignInScope('aclass', '');
if ($_smarty_tpl->tpl_vars['node']->value->current) {
$_smarty_tpl->_assignInScope('liclass', 'currentpage');
$_smarty_tpl->_assignInScope('aclass', 'currentpage');
} elseif ($_smarty_tpl->tpl_vars['node']->value->parent) {
$_smarty_tpl->_assignInScope('liclass', 'activeparent');
$_smarty_tpl->_assignInScope('aclass', 'activeparent');
}?><li<?php if ($_smarty_tpl->tpl_vars['liclass']->value != '') {?> class="<?php echo $_smarty_tpl->tpl_vars['liclass']->value;?>
"<?php }?>><a<?php if ($_smarty_tpl->tpl_vars['aclass']->value != '') {?> class="<?php echo $_smarty_tpl->tpl_vars['aclass']->value;?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
"<?php if ($_smarty_tpl->tpl_vars['node']->value->target != '') {?> target="<?php echo $_smarty_tpl->tpl_vars['node']->value->target;?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a><?php if ((isset($_smarty_tpl->tpl_vars['node']->value->children))) {
$_smarty_tpl->_subTemplateRender(basename($_smarty_tpl->source->filepath), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('nodes'=>$_smarty_tpl->tpl_vars['node']->value->children,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), 0, true);
}?></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}
}
