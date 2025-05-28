<?php
/* Smarty version 4.5.2, created on 2025-05-28 19:59:40
  from 'C:\xampp\htdocs\cmsms\admin\templates\editusertag.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_68374f0c615569_34178012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aae5c66cf1d4f0f40efa1c14c3faeb8025a6a3e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cmsms\\admin\\templates\\editusertag.tpl',
      1 => 1748410080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68374f0c615569_34178012 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_date_format.php','function'=>'smarty_modifier_cms_date_format',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_header.php','function'=>'smarty_function_tab_header',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_start.php','function'=>'smarty_function_tab_start',),5=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_textarea.php','function'=>'smarty_function_cms_textarea',),6=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.tab_end.php','function'=>'smarty_function_tab_end',),7=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo '<script'; ?>
 type="text/javascript">
// <![CDATA[
$(document).ready(function(){
  $('#runbtn').button({
     icons: { primary: 'ui-icon-gear' }
  });
  $(document).on('click', '#runbtn', function(ev){
    // get the data
    ev.preventDefault();
    cms_confirm('<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)preg_replace('!\s+!u', ' ',lang('confirm_runusertag')));?>
').done(function(){
        var code = $('#udtcode').val();
    	if( code.length == 0 ) {
            var d = '<?php echo lang('noudtcode');?>
';
	    txt = '<div class="pageerrorcontainer"><ul class="pageerror">' + d + '<\/ul><\/div>';
      	    $('#edit_userplugin_result').html( txt );
      	    return false;
    	}
	var data = $('#edit_userplugin').find('input:not([type=submit]), select, textarea').serializeArray();
	data.push({ 'name': 'code', 'value': code });
	data.push({ 'name': 'run', 'value': 1 });
	data.push({ 'name': 'apply', 'value': 1 });
	data.push({ 'name': 'ajax', 'value': 1 });
	$.post('<?php echo $_SERVER['REQUEST_URI'];?>
',data,function(resultdata,text) {
      	    var r,d,e;
	    try {
	        var x = $.parseJSON(resultdata);
		if( typeof x.response != 'undefined' ) {
		    r = x.response;
		    d = x.details;
	        } else {
		    d = resultdata;
		}
           } catch( e ) {
	       r = '_error';
	       d = resultdata;
	   }

	   e = $('<div />').text(d).html(); // quick tip for entity encoding.
	   if( r = '_error' ) e = d;
	   $('#edit_userplugin_runout').html(e);
	   $('#edit_userplugin_runout').dialog({ modal: true, width: 'auto' });
        });
    	return false;
    }).fail(function(){
       return false;
    })
  });

  $(document).on('click', '#applybtn', function(){
    var data = $('#edit_userplugin').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'ajax', 'value': 1 });
    data.push({ 'name': 'apply', 'value': 1 });

    $.post('<?php echo $_SERVER['REQUEST_URI'];?>
',data,function(resultdata,text) {
      var x = $.parseJSON(resultdata);
      var r = x.response;
      var d = x.details;
      var txt = '';
      if( r == 'Success' ) {
        txt = '<div class="pagemcontainer"><span class="close-warning"></span><p class="pagemessage">' + d + '<\/p><\/div>';
        $('[name=cancel]').fadeOut();
        $('[name=cancel]').attr('value','<?php echo lang('close');?>
');
        $('[name=cancel]').button('option','label','<?php echo lang('close');?>
');
        $('[name=cancel]').fadeIn();
      }
      else {
        txt = '<div class="pageerrorcontainer"><ul class="pageerror">' + d + '<\/ul><\/div>';
      }
      $('#edit_userplugin_result').html( txt );
    });
    return false;
  });
});
//]]>
<?php echo '</script'; ?>
>

<div class="pagecontainer">
	<?php if ($_smarty_tpl->tpl_vars['record']->value['userplugin_id'] == '') {?>
		<h3><?php echo lang('addusertag');?>
</h3>
	<?php } else { ?>
		<h3><?php echo lang('editusertag');?>
</h3>
	<?php }?>

	<div id="edit_userplugin_runout" title="<?php echo lang('output');?>
" style="display: none;"></div>
	<div id="edit_userplugin_result"></div>

<?php echo smarty_function_form_start(array('url'=>'editusertag.php','id'=>'edit_userplugin','userplugin_id'=>$_smarty_tpl->tpl_vars['record']->value['userplugin_id']),$_smarty_tpl);?>

	<fieldset>
		<div style="width: 49%; float: left;">
			<div class="pageoverflow">
				<p class="pagetext"></p>
				<p class="pageinput">
					<input id="submitme" type="submit" name="submit" value="<?php echo lang('submit');?>
" />
					<input type="submit" name="cancel" value="<?php echo lang('cancel');?>
" />
					<?php if ($_smarty_tpl->tpl_vars['record']->value['userplugin_id'] != '') {?>
						<input id="applybtn" type="submit" name="apply" value="<?php echo lang('apply');?>
" title="<?php echo lang('title_applyusertag');?>
" />
						<button id="runbtn" type="submit" name="run" title="<?php echo lang('runuserplugin');?>
"/><?php echo lang('run');?>
</button>
					<?php }?>
				</p>
			</div>
			<div class="pageoverflow">
				<p class="pagetext">
					<label for="name"><?php echo lang('name');?>
:&nbsp;<?php echo smarty_function_cms_help(array('key1'=>'h_udtname','title'=>lang('name')),$_smarty_tpl);?>
</label>
				</p>
				<p class="pageinput">
					<input type="text" id="name" name="userplugin_name" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['userplugin_name'];?>
" size="50" maxlength="50" />
				</p>
			</div>
		</div>

		<div style="width: 49%; float: right;">
			<?php if ($_smarty_tpl->tpl_vars['record']->value['create_date'] != '') {?>
				<div class="pageoverflow">
					<p class="pagetext"><?php echo lang('created_at');?>
:</p>
					<p class="pageinput"><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['record']->value['create_date']);?>
</p>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['record']->value['modified_date'] != '') {?>
				<div class="pageoverflow">
					<p class="pagetext"><?php echo lang('last_modified_at');?>
:</p>
					<p class="pageinput"><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['record']->value['modified_date']);?>
</p>
				</div>
			<?php }?>
		</div>
	</fieldset>

	<?php echo smarty_function_tab_header(array('name'=>'code','label'=>lang('code')),$_smarty_tpl);?>

	<?php echo smarty_function_tab_header(array('name'=>'description','label'=>lang('description')),$_smarty_tpl);?>


	<?php echo smarty_function_tab_start(array('name'=>'code'),$_smarty_tpl);?>

		<div class="pageoverflow">
			<p class="pagetext">
				<label for="code"><b><?php echo lang('code');?>
:</b></label>&nbsp;<?php echo smarty_function_cms_help(array('key1'=>'h_udtcode','title'=>lang('code')),$_smarty_tpl);?>

			</p>
			<p class="pageinput">
				<?php echo smarty_function_cms_textarea(array('id'=>'udtcode','name'=>'code','value'=>$_smarty_tpl->tpl_vars['record']->value['code'],'wantedsyntax'=>'php','rows'=>10,'cols'=>80),$_smarty_tpl);?>

			</p>
		</div>
		
	<?php echo smarty_function_tab_start(array('name'=>'description'),$_smarty_tpl);?>

		<div class="pageoverflow">
			<p class="pagetext">
				<label for="description"><?php echo lang('description');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key1'=>'h_udtdesc','title'=>lang('description')),$_smarty_tpl);?>

			</p>
			<p class="pageinput">
				<textarea id="description" name="description" rows="3" cols="80"><?php echo $_smarty_tpl->tpl_vars['record']->value['description'];?>
</textarea>
			</p>
		</div>
	<?php echo smarty_function_tab_end(array(),$_smarty_tpl);?>


<?php echo smarty_function_form_end(array(),$_smarty_tpl);?>


</div><?php }
}
