<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:07:37
  from 'module_file_tpl:DesignManager;admin_edit_design.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_683750e947d168_04039384',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd209ce292e2613346b40af4078ea5ac961cfea09' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_edit_design.tpl',
      1 => 1748410097,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
    'module_file_tpl:DesignManager;admin_edit_design_templates.tpl' => 1,
    'module_file_tpl:DesignManager;admin_edit_design_stylesheets.tpl' => 1,
  ),
),false)) {
function content_683750e947d168_04039384 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.localedate_format.php','function'=>'smarty_modifier_localedate_format',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_header.php','function'=>'smarty_function_tab_header',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_start.php','function'=>'smarty_function_tab_start',),5=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_end.php','function'=>'smarty_function_tab_end',),6=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo smarty_function_form_start(array('id'=>"admin_edit_design"),$_smarty_tpl);?>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
design" value="<?php echo $_smarty_tpl->tpl_vars['design']->value->get_id();?>
"/>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
ajax" id="ajax"/>

<fieldset>
  <div style="width: 49%; float: left;">
    <div class="pageoverflow">
      <p class="pagetext"></p>
      <p class="pageinput">
        <input id="submitme" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
        <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
        <input id="applyme" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
apply" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('apply');?>
"/>
      </p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="design_name"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
</label>:&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_name','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
        <input type="text" id="design_name" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name" value="<?php echo $_smarty_tpl->tpl_vars['design']->value->get_name();?>
" size="50" maxlength="90"/>
      </p>
    </div>
  </div>
  <div style="width: 49%; float: right;">
    <div class="pageoverflow">
      <p class="pagetext"><label for="created"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_created','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
      <?php echo smarty_modifier_localedate_format($_smarty_tpl->tpl_vars['design']->value->get_created(),'%x %X');?>

      </p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="modified"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_modified','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
      <?php echo smarty_modifier_localedate_format($_smarty_tpl->tpl_vars['design']->value->get_modified(),'%x %X');?>

      </p>
    </div>
  </div>
</fieldset>

<?php echo smarty_function_tab_header(array('name'=>'templates','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_templates')),$_smarty_tpl);?>

<?php echo smarty_function_tab_header(array('name'=>'stylesheets','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_stylesheets')),$_smarty_tpl);?>

<?php echo smarty_function_tab_header(array('name'=>'tab_description','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>

<?php echo smarty_function_tab_start(array('name'=>'templates'),$_smarty_tpl);?>

  <?php $_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_edit_design_templates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 8, false);
echo smarty_function_tab_start(array('name'=>'stylesheets'),$_smarty_tpl);?>

  <?php $_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_edit_design_stylesheets.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 8, false);
echo smarty_function_tab_start(array('name'=>'tab_description'),$_smarty_tpl);?>

  <div class="pageoverflow">
    <p class="pagetext"><label for="description"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_description','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <textarea id="description" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
description" rows="5"><?php echo $_smarty_tpl->tpl_vars['design']->value->get_description();?>
</textarea>
    </p>
  </div>
<?php echo smarty_function_tab_end(array(),$_smarty_tpl);?>

<?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

<div style="display: none;"><div id="help_design_name" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_design_name');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_design_name');?>
</div></div>

<?php echo '<script'; ?>
 type="text/javascript">
var __changed=0;
function set_changed() {
   __changed=1;
   console.debug('design is changed');
}
function save_design() {
   var form = $('#admin_edit_design');
   var action = form.attr('action');

   $('#ajax').val(1);
   return $.ajax({
      url: action,
      data: form.serialize()
   })
}
$(document).on('change',':input',function(){
   set_changed();
});
$(document).ready(function(){
    $('.sortable-list input[type="checkbox"]').hide();
    $('ul.available-items').on('click', 'li', function () {
        $(this).toggleClass('selected ui-state-hover');
    });
    $(document).on('click', '#submitme,#applyme', function(){
        $('select.selall').attr('multiple','multiple');
        $('select.selall option').attr('selected','selected');
    });
});

<?php echo '</script'; ?>
>
<?php }
}
