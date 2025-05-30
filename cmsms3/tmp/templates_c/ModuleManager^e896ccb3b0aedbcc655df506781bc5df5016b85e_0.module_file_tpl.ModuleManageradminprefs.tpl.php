<?php
/* Smarty version 4.5.2, created on 2025-05-30 19:53:37
  from 'module_file_tpl:ModuleManager;adminprefs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6839f0a1e313c5_72977437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e896ccb3b0aedbcc655df506781bc5df5016b85e' => 
    array (
      0 => 'module_file_tpl:ModuleManager;adminprefs.tpl',
      1 => 1748538719,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6839f0a1e313c5_72977437 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_yesno.php','function'=>'smarty_cms_function_cms_yesno',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $(document).on('click','#reseturl',function(ev){
      ev.preventDefault();
      var form = $(this).closest('form');
      cms_confirm('<?php echo strtr((string)$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('confirm_reseturl'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
').done(function(){
          $('#inp_reset').val(1);
	  form.submit();
      });
  });
  $(document).on('click','#settings_submit',function(ev){
      ev.preventDefault();
      var form = $(this).closest('form');
      cms_confirm('<?php echo strtr((string)$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('confirm_settings'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
                       "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
                       "`" => "\\`", "\${" => "\\\$\{"));?>
').done(function(){
          form.submit();
      });
  });
});
<?php echo '</script'; ?>
>
<?php if ((isset($_smarty_tpl->tpl_vars['message']->value))) {?><p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p><?php }?>

<?php echo smarty_function_form_start(array('action'=>'setprefs'),$_smarty_tpl);?>
<input type="hidden" id="inp_reset" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
reseturl" value=""/>
<?php if ((isset($_smarty_tpl->tpl_vars['module_repository']->value))) {?>
  <div class="pageoverflow">
    <p class="pagetext"><label for="mr_url"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('prompt_repository_url');?>
:</label></p>
    <p class="pageinput">
      <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
url" id="mr_url" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['module_repository']->value;?>
"/>
      <input type="submit" id="reseturl" value="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('reset');?>
"/>
    </p>
  </div>

<?php }?>

  <div class="pageoverflow">
    <p class="pagetext"><label><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('prompt_dl_chunksize');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_dl_chunksize','title'=>$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('prompt_dl_chunksize')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
dl_chunksize" value="<?php echo $_smarty_tpl->tpl_vars['dl_chunksize']->value;?>
" size="4" maxlength="4"/>
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext"><label for="latestdepends"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('latestdepends');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_latestdepends','title'=>$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('latestdepends')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <select id="latestdepends" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
latestdepends"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['latestdepends']->value),$_smarty_tpl);?>
</select>
    </p>
  </div>

<?php if ((isset($_smarty_tpl->tpl_vars['developer_mode']->value))) {?>
  <div class="pageoverflow">
    <p class="pagetext"><label for="allowuninstall"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('allowuninstall');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_allowuninstall','title'=>$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('allowuninstall')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <select id="allowuninstall" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
allowuninstall"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['allowuninstall']->value),$_smarty_tpl);?>
</select>
    </p>
  </div>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['disable_caching']->value))) {?>
  <div class="pageoverflow">
    <p class="pagetext"><label for="disable_caching"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('prompt_disable_caching');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_disable_caching','title'=>$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('prompt_disable_caching')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <select id="disable_caching" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
disable_caching"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['disable_caching']->value),$_smarty_tpl);?>
</select>
    </p>
  </div>
<?php }?>

  <div class="pageoverflow">
    <p class="pagetext"></p>
    <p class="pageinput">
      <input type="submit" id="settings_submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('submit');?>
"/>
    </p>
  </div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

<?php }
}
