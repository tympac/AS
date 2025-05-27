<?php
/* Smarty version 4.5.2, created on 2025-05-27 17:31:47
  from 'C:\xampp\htdocs\cmsms\admin\themes\OneEleven\templates\pagetemplate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6835dae364fba9_65863235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d254de7277872d00df9e1ddc2a34a594e6bfacd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cmsms\\admin\\themes\\OneEleven\\templates\\pagetemplate.tpl',
      1 => 1748357326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shortcuts.tpl' => 1,
    'file:navigation.tpl' => 1,
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6835dae364fba9_65863235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.sitename.php','function'=>'smarty_function_sitename',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_jquery.php','function'=>'smarty_function_cms_jquery',),));
?>
<!doctype html>
<html lang="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['lang']->value,'2','');?>
" dir="<?php echo $_smarty_tpl->tpl_vars['lang_dir']->value;?>
">
  <head>
    <?php $_smarty_tpl->_assignInScope('thetitle', $_smarty_tpl->tpl_vars['pagetitle']->value);?>
    <?php if ($_smarty_tpl->tpl_vars['thetitle']->value && $_smarty_tpl->tpl_vars['subtitle']->value) {
$_smarty_tpl->_assignInScope('thetitle', ((string)$_smarty_tpl->tpl_vars['thetitle']->value)." - ".((string)$_smarty_tpl->tpl_vars['subtitle']->value));
}?>
    <?php if ($_smarty_tpl->tpl_vars['thetitle']->value) {
$_smarty_tpl->_assignInScope('thetitle', ((string)$_smarty_tpl->tpl_vars['thetitle']->value)." - ");
}?>
		<meta charset="utf-8" />
		<title><?php echo $_smarty_tpl->tpl_vars['thetitle']->value;
echo smarty_function_sitename(array(),$_smarty_tpl);?>
</title>
		<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/" />
		<meta name="generator" content="CMS Made Simple - Copyright (C) 2004-14 Ted Kulp. All rights reserved." />
		<meta name="robots" content="noindex, nofollow" />
		<meta name="referrer" content="origin"/>
		<meta name="viewport" content="initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />
		<meta name="HandheldFriendly" content="True"/>
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/favicon/cmsms-favicon.ico"/>
		<link rel='apple-touch-icon' href='<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/favicon/apple-touch-icon-iphone.png' />
		<link rel='apple-touch-icon' sizes='72x72' href='<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/favicon/apple-touch-icon-ipad.png' />
		<link rel='apple-touch-icon' sizes='114x114' href='<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/favicon/apple-touch-icon-iphone4.png' />
		<link rel='apple-touch-icon' sizes='144x144' href='<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/favicon/apple-touch-icon-ipad3.png' />
		<meta name='msapplication-TileImage' content='<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/favicon/ms-application-icon.png' />
		<meta name='msapplication-TileColor' content='#f89938'>
		<!-- learn IE html5 -->
		<!--[if lt IE 9]>
		<?php echo '<script'; ?>
 src="http://html5shiv.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
		<![endif]-->
		<!-- custom jQueryUI Theme 1.10.04 see link in UI Stylesheet for color reference //-->
		<link rel="stylesheet" href="style.php?<?php echo $_smarty_tpl->tpl_vars['secureparam']->value;?>
" />
		<?php echo smarty_function_cms_jquery(array('append'=>((string)$_smarty_tpl->tpl_vars['config']->value['admin_url'])."/themes/OneEleven/includes/standard.js",'include_css'=>0),$_smarty_tpl);?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/css/default-cmsms/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
		<!-- THIS IS WHERE HEADER STUFF SHOULD GO -->
	 	<?php echo (($tmp = $_smarty_tpl->tpl_vars['headertext']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

	</head>
	<body lang="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['lang']->value,'2','');?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'md5' ][ 0 ], array( $_smarty_tpl->tpl_vars['pagetitle']->value ));?>
" class="oe_<?php echo $_smarty_tpl->tpl_vars['pagealias']->value;?>
">
		<!-- start container -->
		<div id="oe_container" class="sidebar-on">
			<!-- start header -->
			<header role="banner" class="cf header">
				<!-- start header-top -->
				<div class="header-top cf">
					<!-- logo -->
					<div class="cms-logo">
						<a href="http://www.cmsmadesimple.org" rel="external"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['admin_url'];?>
/themes/OneEleven/images/layout/cmsms-logo.jpg" width="205" height="69" alt="CMS Made Simple" title="CMS Made Simple" /></a>
					</div>
					<!-- title -->
					<span class="admin-title"> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'adminpaneltitle' ));?>
 - <?php echo smarty_function_sitename(array(),$_smarty_tpl);?>
</span>
				</div>
				<div class='clear'></div>
				<!-- end header-top //-->
				<!-- start header-bottom -->
				<div class="header-bottom cf">
					<!-- welcome -->
					<div class="welcome">
					<?php if ((isset($_smarty_tpl->tpl_vars['myaccount']->value))) {?>
						<span><a class="welcome-user" href="myaccount.php?<?php echo $_smarty_tpl->tpl_vars['secureparam']->value;?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'myaccount' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'myaccount' ));?>
</a> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'welcome_user' ));?>
: <a href="myaccount.php?<?php echo $_smarty_tpl->tpl_vars['secureparam']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</a></span>
					<?php } else { ?>
						<span><a class="welcome-user"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'myaccount' ));?>
</a> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'welcome_user' ));?>
: <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</span>
					<?php }?>
					</div>
					<!-- bookmarks -->
					<?php $_smarty_tpl->_subTemplateRender('file:shortcuts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				</div>
				<!-- end header-bottom //-->
			</header>
			<!-- end header //-->
			<!-- start content -->
			<div id="oe_admin-content">
				<div class="shadow">
					&nbsp;
				</div>
				<!-- start sidebar -->
				<div id="oe_sidebar">
				  <aside>
				    <span title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'open' ));?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'close' ));?>
" class="toggle-button close"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'open' ));?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'close' ));?>
</span>
 			            <?php $_smarty_tpl->_subTemplateRender('file:navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('nav'=>$_smarty_tpl->tpl_vars['theme']->value->get_navigation_tree()), 0, false);
?>
				    </aside>
				</div>
				<!-- end sidebar //-->
				<!-- start main -->
				<div id="oe_mainarea" class="cf">
					<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?><article role="main" class="content-inner"><header class="pageheader<?php if ((isset($_smarty_tpl->tpl_vars['is_ie']->value))) {?> drop-hidden<?php }?> cf"><?php if ((isset($_smarty_tpl->tpl_vars['module_icon_url']->value)) || (isset($_smarty_tpl->tpl_vars['pagetitle']->value))) {?><h1><?php if ((isset($_smarty_tpl->tpl_vars['module_icon_url']->value))) {?><img src="<?php echo $_smarty_tpl->tpl_vars['module_icon_url']->value;?>
" alt="<?php echo (($tmp = $_smarty_tpl->tpl_vars['module_name']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="module-icon" /><?php }
echo (($tmp = $_smarty_tpl->tpl_vars['pagetitle']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</h1><?php }
if ((isset($_smarty_tpl->tpl_vars['module_help_url']->value))) {?> <span class="helptext"><a href="<?php echo $_smarty_tpl->tpl_vars['module_help_url']->value;?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'lang' ][ 0 ], array( 'module_help' ));?>
</a></span><?php }?></header><?php if ($_smarty_tpl->tpl_vars['pagetitle']->value && $_smarty_tpl->tpl_vars['subtitle']->value) {?><header class="subheader"><h3 class="subtitle"><?php echo $_smarty_tpl->tpl_vars['subtitle']->value;?>
</h3></header><?php }?><section class="cf"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</section></article>
				</div>
				<!-- end main //-->
				<div class="spacer">
					&nbsp;
				</div>
			</div>
			<!-- end content //-->
			<!-- start footer -->
			<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			<!-- end footer //-->
			<?php echo (($tmp = $_smarty_tpl->tpl_vars['footertext']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

		</div>
		<!-- end container //-->
		</body>
</html>
<?php }
}
