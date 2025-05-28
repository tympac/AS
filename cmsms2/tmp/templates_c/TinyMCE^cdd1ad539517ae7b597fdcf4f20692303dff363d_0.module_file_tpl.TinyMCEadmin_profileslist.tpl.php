<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:10:13
  from 'module_file_tpl:TinyMCE;admin_profileslist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_68375185323653_74146663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdd1ad539517ae7b597fdcf4f20692303dff363d' => 
    array (
      0 => 'module_file_tpl:TinyMCE;admin_profileslist.tpl',
      1 => 1748449066,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68375185323653_74146663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_action_url.php','function'=>'smarty_cms_function_cms_action_url',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.admin_icon.php','function'=>'smarty_function_admin_icon',),));
?>

<?php if ($_smarty_tpl->tpl_vars['profiles']->value) {?>

  <table class="pagetable">
    <thead>
      <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('id');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_name');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('usergroups');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('priority');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('default');?>
</th>
        <th class="pageicon"></th>
        <th class="pageicon"></th>
        <th class="pageicon"></th>
      </tr>
    </thead>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profiles']->value, 'profile');
$_smarty_tpl->tpl_vars['profile']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['profile']->value) {
$_smarty_tpl->tpl_vars['profile']->do_else = false;
?>

      <?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

      <?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_editprofile','id_profile'=>$_smarty_tpl->tpl_vars['profile']->value->id_profile,'assign'=>'edit_url'),$_smarty_tpl);?>

      <?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_copyprofile','id_profile'=>$_smarty_tpl->tpl_vars['profile']->value->id_profile,'assign'=>'copy_url'),$_smarty_tpl);?>

      <?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_deleteprofile','id_profile'=>$_smarty_tpl->tpl_vars['profile']->value->id_profile,'assign'=>'delete_url'),$_smarty_tpl);?>


      <tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
';">
        <td>
          <a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value->id_profile;?>
</a>
        </td>
        <td>
          <a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value->name;?>
</a>
        </td>
        <td>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value->usergroups, 'usergroup', true);
$_smarty_tpl->tpl_vars['usergroup']->iteration = 0;
$_smarty_tpl->tpl_vars['usergroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['usergroup']->value) {
$_smarty_tpl->tpl_vars['usergroup']->do_else = false;
$_smarty_tpl->tpl_vars['usergroup']->iteration++;
$_smarty_tpl->tpl_vars['usergroup']->last = $_smarty_tpl->tpl_vars['usergroup']->iteration === $_smarty_tpl->tpl_vars['usergroup']->total;
$__foreach_usergroup_1_saved = $_smarty_tpl->tpl_vars['usergroup'];
echo $_smarty_tpl->tpl_vars['usergroup']->value->name;
if (!$_smarty_tpl->tpl_vars['usergroup']->last) {?>, <?php }
$_smarty_tpl->tpl_vars['usergroup'] = $__foreach_usergroup_1_saved;
}
if ($_smarty_tpl->tpl_vars['usergroup']->do_else) {
?>-<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['profile']->value->priority;?>

        </td>
        <td>
          <?php if ($_smarty_tpl->tpl_vars['profile']->value->id_profile == $_smarty_tpl->tpl_vars['id_default_profile']->value) {?>
            <?php echo smarty_function_admin_icon(array('icon'=>'true.gif'),$_smarty_tpl);?>

          <?php } else { ?>
            <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_setdefaultprofile','id_profile'=>$_smarty_tpl->tpl_vars['profile']->value->id_profile),$_smarty_tpl);?>
">
              <?php echo smarty_function_admin_icon(array('icon'=>'false.gif'),$_smarty_tpl);?>

            </a>
          <?php }?>
        </td>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif'),$_smarty_tpl);?>
</a></td>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['copy_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('copy_profile');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'copy.gif'),$_smarty_tpl);?>
</a></td>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['delete_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('delete_profile');?>
" onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('delete_profile_confirm');?>
');"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif'),$_smarty_tpl);?>
</a></td>
      </tr>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  </table>

<?php }
}
}
