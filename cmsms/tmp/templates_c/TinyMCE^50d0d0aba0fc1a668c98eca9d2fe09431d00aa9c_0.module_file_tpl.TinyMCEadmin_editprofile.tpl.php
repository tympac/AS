<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:10:22
  from 'module_file_tpl:TinyMCE;admin_editprofile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6837518e2ec335_72670469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c' => 
    array (
      0 => 'module_file_tpl:TinyMCE;admin_editprofile.tpl',
      1 => 1748449066,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
    'module_file_tpl:TinyMCE;admin_example.tpl' => 1,
  ),
),false)) {
function content_6837518e2ec335_72670469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'label' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\TinyMCE^50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c_0.module_file_tpl.TinyMCEadmin_editprofile.tpl.php',
    'uid' => '50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c',
    'call_name' => 'smarty_template_function_label_13789134646837518e256de5_07875166',
  ),
  'submit_form_buttons' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\TinyMCE^50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c_0.module_file_tpl.TinyMCEadmin_editprofile.tpl.php',
    'uid' => '50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c',
    'call_name' => 'smarty_template_function_submit_form_buttons_13789134646837518e256de5_07875166',
  ),
  'checkbox' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\TinyMCE^50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c_0.module_file_tpl.TinyMCEadmin_editprofile.tpl.php',
    'uid' => '50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c',
    'call_name' => 'smarty_template_function_checkbox_13789134646837518e256de5_07875166',
  ),
  'text_input' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\TinyMCE^50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c_0.module_file_tpl.TinyMCEadmin_editprofile.tpl.php',
    'uid' => '50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c',
    'call_name' => 'smarty_template_function_text_input_13789134646837518e256de5_07875166',
  ),
  'textarea' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\TinyMCE^50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c_0.module_file_tpl.TinyMCEadmin_editprofile.tpl.php',
    'uid' => '50d0d0aba0fc1a668c98eca9d2fe09431d00aa9c',
    'call_name' => 'smarty_template_function_textarea_13789134646837518e256de5_07875166',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_textarea.php','function'=>'smarty_function_cms_textarea',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_header.php','function'=>'smarty_function_tab_header',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_start.php','function'=>'smarty_function_tab_start',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),5=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),6=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_end.php','function'=>'smarty_function_tab_end',),7=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['mod']->value->getModuleURLPath();?>
/lib/js/autosize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		ta = $('textarea');
		autosize(ta);

		$('.tinymce-profile-edit #page_tabs > div').mousedown(function(){
			autosize.update(ta);
		});
	});
<?php echo '</script'; ?>
>













<div class="tinymce-profile-edit">

	<h3><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'add') {
echo $_smarty_tpl->tpl_vars['mod']->value->Lang('new_profile');
} else {
echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile');?>
: <?php echo $_smarty_tpl->tpl_vars['profile']->value->name;?>
&nbsp;(ID <?php echo $_smarty_tpl->tpl_vars['profile']->value->id_profile;?>
)<?php }?></h3>


	<?php echo smarty_function_form_start(array(),$_smarty_tpl);?>


		<?php if ($_smarty_tpl->tpl_vars['playground_content']->value == '') {?>
		<?php ob_start();
$_smarty_tpl->_subTemplateRender('module_file_tpl:TinyMCE;admin_example.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->assign('playground_content', ob_get_clean());
?>
	<?php }?>
	<?php echo smarty_function_cms_textarea(array('forcemodule'=>'TinyMCE','name'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."playground_content",'id'=>'tinymce_example','class'=>'TinyMCE','value'=>$_smarty_tpl->tpl_vars['playground_content']->value),$_smarty_tpl);?>






		<?php $_smarty_tpl->_assignInScope('active_tab', 'general');?>
	<?php if ((isset($_smarty_tpl->tpl_vars['actionparams']->value['active_tab']))) {?>
		<?php $_smarty_tpl->_assignInScope('active_tab', $_smarty_tpl->tpl_vars['actionparams']->value['active_tab']);?>
	<?php }?>
	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
active_tab" id="active_tab" value="<?php echo $_smarty_tpl->tpl_vars['active_tab']->value;?>
">
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function(){
			$('#page_tabs > div').mousedown(function(){
				tab_id = $(this).attr('id');
				$('#active_tab').val(tab_id);
			});
		});
	<?php echo '</script'; ?>
>

	<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'submit_form_buttons', array(), true);?>


	<?php if ($_smarty_tpl->tpl_vars['profile']->value->id_profile) {?>
		<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
id_profile" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value->id_profile;?>
">
	<?php }?>





		<?php echo smarty_function_tab_header(array('name'=>'general','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('general'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'plugins','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('plugins'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'menubar','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('menubar'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'toolbar','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('toolbar'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'contextmenu','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('contextmenu'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'css','label'=>'CSS','active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'filemanager','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('filemanager'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'users_groups','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('usergroups'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>

		<?php echo smarty_function_tab_header(array('name'=>'templates','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('templates'),'active'=>$_smarty_tpl->tpl_vars['active_tab']->value),$_smarty_tpl);?>



				<?php echo smarty_function_tab_start(array('name'=>'general'),$_smarty_tpl);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'text_input', array('fld_name'=>'name','label_name'=>'profile_name'), true);?>


			<hr>
			<div class="pageoverflow">
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'resize','for'=>'resize'), true);?>

				<p class="pageinput">
					<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
resize" id="resize_0" value="0" <?php if (!$_smarty_tpl->tpl_vars['profile']->value->resize) {?> checked="checked"<?php }?>>
					<label for="resize_0"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('resize_no');?>
</label><br>

					<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
resize" id="resize_1" value="1" <?php if ($_smarty_tpl->tpl_vars['profile']->value->resize == '1') {?> checked="checked"<?php }?>>
					<label for="resize_1"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('resize_vertical');?>
</label><br>

					<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
resize" id="resize_both" value="both" <?php if ($_smarty_tpl->tpl_vars['profile']->value->resize == 'both') {?> checked="checked"<?php }?>>
					<label for="resize_both"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('resize_both');?>
</label>
				</p>
			</div>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'autoresize','help'=>'autoresize'), true);?>


			<hr>
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'show_statusbar','help'=>'show_statusbar'), true);?>


			<hr>
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'forced_root_block','help'=>'forced_root_block','documentation'=>'https://www.tinymce.com/docs/configure/content-filtering/#forced_root_block'), true);?>




				<?php echo smarty_function_tab_start(array('name'=>'plugins'),$_smarty_tpl);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'plugins','documentation'=>'https://www.tinymce.com/docs/plugins/','help'=>'plugins'), true);?>


			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'enable_linker','help'=>'cmsms_linker'), true);?>



						<?php if ((isset($_smarty_tpl->tpl_vars['external_modules']->value)) && !empty($_smarty_tpl->tpl_vars['external_modules']->value)) {?>
				<hr>

				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'external_modules','help'=>'external_modules'), true);?>


				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['external_modules']->value, 'mod_infos', false, 'mod_name');
$_smarty_tpl->tpl_vars['mod_infos']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod_name']->value => $_smarty_tpl->tpl_vars['mod_infos']->value) {
$_smarty_tpl->tpl_vars['mod_infos']->do_else = false;
?>
					<label>
						<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
external_modules[]" value="<?php echo $_smarty_tpl->tpl_vars['mod_name']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['profile']->value->external_modules) && in_array($_smarty_tpl->tpl_vars['mod_name']->value,$_smarty_tpl->tpl_vars['profile']->value->external_modules)) {?>checked="checked"<?php }?>> <?php echo $_smarty_tpl->tpl_vars['mod_infos']->value['friendlyname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('button_name');?>
: <strong><?php echo $_smarty_tpl->tpl_vars['mod_infos']->value['button_name'];?>
</strong>
					</label>
					<br>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'external_modules_show_menutext'), true);?>


			<?php }?>

			<hr>

						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'enable_custom_dropdown','help'=>'enable_custom_dropdown'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'text_input', array('fld_name'=>'custom_dropdown_title','label_name'=>'custom_dropdown_title'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'custom_dropdown','subhelp'=>'custom_dropdown'), true);?>


			<hr>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'image_plugin'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'image_advtab','simple'=>true), true);?>






				<?php echo smarty_function_tab_start(array('name'=>'menubar'),$_smarty_tpl);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'show_menubar'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'menubar','documentation'=>'https://www.tinymce.com/docs/advanced/editor-control-identifiers/','help'=>'menubar'), true);?>


			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'advanced_menu','help'=>'advanced_menu'), true);?>


			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'use_advanced_menu','help'=>'use_avanced_menu','simple'=>true), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'advanced_menu','nolabel'=>1), true);?>




				<?php echo smarty_function_tab_start(array('name'=>'toolbar'),$_smarty_tpl);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'show_toolbar','help'=>'toolbar'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'toolbar1','documentation'=>'https://www.tinymce.com/docs/advanced/editor-control-identifiers/'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'toolbar2','documentation'=>'https://www.tinymce.com/docs/advanced/editor-control-identifiers/','subhelp'=>'toolbar'), true);?>


			<?php if ((isset($_smarty_tpl->tpl_vars['external_modules']->value)) && is_array($_smarty_tpl->tpl_vars['profile']->value->external_modules)) {?>
				<p class="pageinput">
					<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('external_modules');?>
:
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value->external_modules, 'ext_module_loaded');
$_smarty_tpl->tpl_vars['ext_module_loaded']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ext_module_loaded']->value) {
$_smarty_tpl->tpl_vars['ext_module_loaded']->do_else = false;
?>
						<em><?php echo $_smarty_tpl->tpl_vars['external_modules']->value[$_smarty_tpl->tpl_vars['ext_module_loaded']->value]['button_name'];?>
</em>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</p>
			<?php }?>

			<hr>

						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'use_custom_block_formats','help'=>'use_custom_block_formats'), true);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'block_formats','subhelp'=>'custom_block_formats'), true);?>






				<?php echo smarty_function_tab_start(array('name'=>'contextmenu'),$_smarty_tpl);?>


			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'contextmenu','text'=>'contextmenu_content','documentation'=>'https://www.tiny.cloud/docs/configure/editor-appearance/#contextmenu','subhelp'=>'contextmenu_content'), true);?>



				<?php echo smarty_function_tab_start(array('name'=>'css'),$_smarty_tpl);?>

			<fieldset>
				<legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('css_editor_render');?>
</legend>
				<div class="pageoverflow">
					<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'design_css','for'=>'id_design','help'=>'design_css'), true);?>

					<p class="pageinput">
						<select name='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
id_design' id="id_design">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['profile']->value->id_design == 0) {?>selected="selected"<?php }?>>
								- <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('no_design_linked');?>
 -
							</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['designs']->value, 'design');
$_smarty_tpl->tpl_vars['design']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['design']->value) {
$_smarty_tpl->tpl_vars['design']->do_else = false;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['design']->value->get_id();?>
" <?php if ($_smarty_tpl->tpl_vars['design']->value->get_id() == $_smarty_tpl->tpl_vars['profile']->value->id_design) {?>selected="selected"<?php }?>>
									<?php echo $_smarty_tpl->tpl_vars['design']->value->get_name();?>

								</option>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select>
					</p>
				</div>
				
				<?php if ((isset($_smarty_tpl->tpl_vars['cmsms_version_23']->value)) && $_smarty_tpl->tpl_vars['cmsms_version_23']->value) {?>
					<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'css_files','help'=>'css_files','subtext'=>'css_files_info'), true);?>

				<?php }?>
			
			</fieldset>

			<fieldset>
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'style_formats','subtext'=>'style_formats_info','help'=>'style_formats','documentation'=>'https://www.tinymce.com/docs/configure/content-formatting/#style_formats'), true);?>

			</fieldset>

			<fieldset>
				<legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('css_classes');?>
</legend>

				<div class="c_full cf">
					<div class="grid_6">
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'link_classes','subtext'=>'link_classes_info','help'=>'link_classes'), true);?>

					</div>
					<div class="grid_6">
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'image_classes','subtext'=>'image_classes_info','help'=>'image_classes'), true);?>

					</div>
				</div>
			</fieldset>




				<?php echo smarty_function_tab_start(array('name'=>'filemanager'),$_smarty_tpl);?>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_use','help'=>'filemanager_use'), true);?>


			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'relative_urls','help'=>'relative_urls'), true);?>


						<div class="pageoverflow">
				<fieldset>
					<legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filemanager_options');?>
</legend>

					<div class="c_full cf">
						<div class="grid_6">
							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_delete_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_create_folders','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_delete_folders','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_upload_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_rename_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_rename_folders','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_duplicate_files','simple'=>true), true);?>

						</div>
						<div class="grid_6">
							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_copy_cut_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_copy_cut_dirs','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_chmod_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_chmod_dirs','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_preview_text_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_create_text_files','simple'=>true), true);?>

							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_edit_text_files','simple'=>true), true);?>

						</div>
					</div>
				</fieldset>
			</div>

			<div class="pageoverflow">
				<fieldset>
					<legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filemanager_image_resizing_title');?>
 <?php echo smarty_function_cms_help(array('title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('filemanager_image_resizing_title'),'key'=>'help_filemanager_image_resizing'),$_smarty_tpl);?>
</legend>
					<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_image_resizing','simple'=>true), true);?>


					<div class="c_full cf">
						<div class="grid_6">
							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'text_input', array('fld_name'=>'filemanager_image_resizing_width','ext'=>'px','size'=>3), true);?>

						</div>
						<div class="grid_6">
							<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'text_input', array('fld_name'=>'filemanager_image_resizing_height','ext'=>'px','size'=>3), true);?>

						</div>
					</div>
				</fieldset>
			</div>


			<div class="pageoverflow">
				<fieldset>
					<legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filemanager_photo_editor');?>
 <?php echo smarty_function_cms_help(array('title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('filemanager_photo_editor'),'key'=>"help_tui_editor"),$_smarty_tpl);?>
</legend>
					<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'filemanager_tui_active','simple'=>true), true);?>

				</fieldset>
			</div>



				<?php echo smarty_function_tab_start(array('name'=>'users_groups'),$_smarty_tpl);?>

			<div class="pageoverflow">
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'usergroups','for'=>'usergroups','help'=>'usergroups'), true);?>

				<p class="pageinput">
					<select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
usergroups[]" id="usergroups" multiple="multiple" size="5">
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['usergroups']->value,'selected'=>$_smarty_tpl->tpl_vars['profile']->value->usergroups_ids),$_smarty_tpl);?>

					</select>
				</p>
			</div>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'text_input', array('fld_name'=>'priority','help'=>'priority','size'=>3), true);?>




				<?php echo smarty_function_tab_start(array('name'=>'templates'),$_smarty_tpl);?>

			<div class="pageoverflow">
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>'js_template','for'=>'id_template','help'=>'js_template'), true);?>

				<p class="pageinput">
					<select name='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
id_template' id="id_template">
						<option value="-1" <?php if ($_smarty_tpl->tpl_vars['profile']->value->id_template == -1) {?>selected="selected"<?php }?>>
							- <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('orig_js_template_file');?>
 -
						</option>

						<?php if (!empty($_smarty_tpl->tpl_vars['templates']->value)) {?>
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['profile']->value->id_template == 0) {?>selected="selected"<?php }?>>
								- <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('default_designmanager_template');?>
 -
							</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['templates']->value, 'template');
$_smarty_tpl->tpl_vars['template']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->do_else = false;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
" <?php if ($_smarty_tpl->tpl_vars['template']->value->get_id() == $_smarty_tpl->tpl_vars['profile']->value->id_template) {?>selected="selected"<?php }?>>
									<?php echo $_smarty_tpl->tpl_vars['template']->value->get_name();?>

								</option>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</select>
				</p>
			</div>

			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'textarea', array('fld_name'=>'extra_js','help'=>'extra_js'), true);?>


			<hr>

			<div class="pageoverflow">
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'checkbox', array('fld_name'=>'enable_user_templates','help'=>'user_templates'), true);?>


									<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'text_input', array('fld_name'=>'user_templates_files_dir','help'=>'user_templates_files_dir','size'=>80), true);?>

							</div>



		<?php echo smarty_function_tab_end(array(),$_smarty_tpl);?>






		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'submit_form_buttons', array(), true);?>




	<?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

</div>
<?php }
/* smarty_template_function_label_13789134646837518e256de5_07875166 */
if (!function_exists('smarty_template_function_label_13789134646837518e256de5_07875166')) {
function smarty_template_function_label_13789134646837518e256de5_07875166(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),));
?>

	<p class="pagetext">
		<label <?php if ((isset($_smarty_tpl->tpl_vars['for']->value))) {?>for="<?php echo $_smarty_tpl->tpl_vars['for']->value;?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang($_smarty_tpl->tpl_vars['text']->value);?>
</label>
		<?php if ((isset($_smarty_tpl->tpl_vars['help']->value)) && $_smarty_tpl->tpl_vars['help']->value) {?>
			<?php echo smarty_function_cms_help(array('title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang($_smarty_tpl->tpl_vars['text']->value),'key'=>"help_".((string)$_smarty_tpl->tpl_vars['help']->value)),$_smarty_tpl);?>

		<?php }?>
		<?php if (!empty($_smarty_tpl->tpl_vars['documentation']->value)) {?>
			&nbsp;(<a href="<?php echo $_smarty_tpl->tpl_vars['documentation']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('documentation');?>
</a>)
		<?php }?>
	</p>
<?php
}}
/*/ smarty_template_function_label_13789134646837518e256de5_07875166 */
/* smarty_template_function_submit_form_buttons_13789134646837518e256de5_07875166 */
if (!function_exists('smarty_template_function_submit_form_buttons_13789134646837518e256de5_07875166')) {
function smarty_template_function_submit_form_buttons_13789134646837518e256de5_07875166(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

	<div class="pageoverflow">
		<p class="pagetext"></p>
		<p class="pageinput">
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
" class="pagebutton" />
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
" class="pagebutton" />
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
apply" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('apply');?>
" class="pagebutton" />
		</p>
	</div>
<?php
}}
/*/ smarty_template_function_submit_form_buttons_13789134646837518e256de5_07875166 */
/* smarty_template_function_checkbox_13789134646837518e256de5_07875166 */
if (!function_exists('smarty_template_function_checkbox_13789134646837518e256de5_07875166')) {
function smarty_template_function_checkbox_13789134646837518e256de5_07875166(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('simple'=>false), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

	<?php if (!$_smarty_tpl->tpl_vars['simple']->value) {?>
		<div class="pageoverflow">
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>$_smarty_tpl->tpl_vars['fld_name']->value,'for'=>$_smarty_tpl->tpl_vars['fld_name']->value), true);?>

			<p class="pageinput">
				<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;
echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
" value="0">
				<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;
echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['profile']->value->{$_smarty_tpl->tpl_vars['fld_name']->value}) {?>checked="checked"<?php }?>>
			</p>
		</div>
	<?php } else { ?> 		<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;
echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
" value="0">
		<label>
			<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;
echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['profile']->value->{$_smarty_tpl->tpl_vars['fld_name']->value}) {?>checked="checked"<?php }?>> <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang($_smarty_tpl->tpl_vars['fld_name']->value);?>

		</label><br>
	<?php }
}}
/*/ smarty_template_function_checkbox_13789134646837518e256de5_07875166 */
/* smarty_template_function_text_input_13789134646837518e256de5_07875166 */
if (!function_exists('smarty_template_function_text_input_13789134646837518e256de5_07875166')) {
function smarty_template_function_text_input_13789134646837518e256de5_07875166(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>


	<?php if (!(isset($_smarty_tpl->tpl_vars['help']->value))) {?>
		<?php $_smarty_tpl->_assignInScope('help', false);?>
	<?php }?>

	<div class="pageoverflow">
		<?php if ((isset($_smarty_tpl->tpl_vars['label_name']->value))) {?>
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>$_smarty_tpl->tpl_vars['label_name']->value,'for'=>$_smarty_tpl->tpl_vars['fld_name']->value,'help'=>$_smarty_tpl->tpl_vars['help']->value), true);?>

		<?php } else { ?>
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>$_smarty_tpl->tpl_vars['fld_name']->value,'for'=>$_smarty_tpl->tpl_vars['fld_name']->value,'help'=>$_smarty_tpl->tpl_vars['help']->value), true);?>

		<?php }?>
		<p class="pageinput">
			<input name='<?php echo $_smarty_tpl->tpl_vars['actionid']->value;
echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['profile']->value->{$_smarty_tpl->tpl_vars['fld_name']->value};?>
' id='<?php echo $_smarty_tpl->tpl_vars['fld_name']->value;?>
' <?php if ((isset($_smarty_tpl->tpl_vars['size']->value))) {?>size="<?php echo $_smarty_tpl->tpl_vars['size']->value;
}?>"> <?php if ((isset($_smarty_tpl->tpl_vars['ext']->value))) {
echo $_smarty_tpl->tpl_vars['ext']->value;
}?>
		</p>
	</div>
<?php
}}
/*/ smarty_template_function_text_input_13789134646837518e256de5_07875166 */
/* smarty_template_function_textarea_13789134646837518e256de5_07875166 */
if (!function_exists('smarty_template_function_textarea_13789134646837518e256de5_07875166')) {
function smarty_template_function_textarea_13789134646837518e256de5_07875166(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_textarea.php','function'=>'smarty_function_cms_textarea',),));
?>

	<div class="pageoverflow">
		<?php if (!(isset($_smarty_tpl->tpl_vars['text']->value))) {?>
			<?php $_smarty_tpl->_assignInScope('text', $_smarty_tpl->tpl_vars['fld_name']->value);?>
		<?php }?>
		<?php if (!empty($_smarty_tpl->tpl_vars['documentation']->value)) {?>
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>$_smarty_tpl->tpl_vars['text']->value,'for'=>$_smarty_tpl->tpl_vars['fld_name']->value,'documentation'=>$_smarty_tpl->tpl_vars['documentation']->value), true);?>

		<?php } elseif (!(isset($_smarty_tpl->tpl_vars['nolabel']->value))) {?>
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'label', array('text'=>$_smarty_tpl->tpl_vars['text']->value,'for'=>$_smarty_tpl->tpl_vars['fld_name']->value), true);?>

		<?php }?>
		<?php if ((isset($_smarty_tpl->tpl_vars['subtext']->value))) {?>
			<p class="pageinput">
				<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang($_smarty_tpl->tpl_vars['subtext']->value);?>

			</p>
		<?php }?>

		<p class="pageinput">
			<?php echo smarty_function_cms_textarea(array('name'=>((string)$_smarty_tpl->tpl_vars['actionid']->value).((string)$_smarty_tpl->tpl_vars['fld_name']->value),'value'=>$_smarty_tpl->tpl_vars['profile']->value->{$_smarty_tpl->tpl_vars['fld_name']->value},'rows'=>1),$_smarty_tpl);?>

			<?php if ((isset($_smarty_tpl->tpl_vars['subhelp']->value))) {?>
				<br><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang(('subhelp_').($_smarty_tpl->tpl_vars['subhelp']->value));?>

			<?php }?>
		</p>
	</div>
<?php
}}
/*/ smarty_template_function_textarea_13789134646837518e256de5_07875166 */
}
