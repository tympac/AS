<?php
/* Smarty version 4.5.2, created on 2025-05-28 19:59:26
  from 'C:\xampp\htdocs\cmsms\admin\templates\listusertags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_68374efe1672f7_65908526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7803056f1f3a2d2fa6ca245fad352bde3fd7c439' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cmsms\\admin\\templates\\listusertags.tpl',
      1 => 1748410080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68374efe1672f7_65908526 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.admin_icon.php','function'=>'smarty_function_admin_icon',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
   $('a.delusertag').click(function(ev){
      ev.preventDefault();
      var _hr = $(this).attr('href');
      cms_confirm('<?php echo smarty_modifier_cms_escape(lang('confirm_deleteusertag'),'javascript');?>
').done(function(){
         window.location.href = _hr;
      })
   })
})
<?php echo '</script'; ?>
>

<div class="pagecontainer">
    <div class="pageoptions">
       <a href="<?php echo $_smarty_tpl->tpl_vars['addurl']->value;?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo lang('addusertag');?>
</a>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['tags']->value) {?>
  <table class="pagetable">
     <thead>
       <tr>
         <th><?php echo lang('name');?>
</th>
         <th><?php echo lang('description');?>
</th>
	 <th class="pageicon"></th>
	 <th class="pageicon"></th>
       </tr>
     </thead>
     <tbody>
     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag', false, 'tag_id');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tag_id']->value => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
       <?php $_smarty_tpl->_assignInScope('edit_url', "editusertag.php".((string)$_smarty_tpl->tpl_vars['urlext']->value)."&amp;userplugin_id=".((string)$_smarty_tpl->tpl_vars['tag_id']->value));?>
       <tr class="<?php echo smarty_function_cycle(array('values'=>'row1,row2'),$_smarty_tpl);?>
">
          <td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo lang('editusertag');?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a></td>
          <td><?php echo $_smarty_tpl->tpl_vars['tag']->value['description'];?>
</td>
	  <td>
	     <a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif','title'=>lang('editusertag')),$_smarty_tpl);?>
</a>
	  </td>
	  <td>
	     <a class="delusertag" href="deleteuserplugin.php<?php echo $_smarty_tpl->tpl_vars['urlext']->value;?>
&amp;userplugin_id=<?php echo $_smarty_tpl->tpl_vars['tag_id']->value;?>
"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif','title'=>lang('delete')),$_smarty_tpl);?>
</a>
	  </td>
       </tr>
     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
     </tbody>
  </table>
<?php }
}
}
