<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:28:02
  from 'tpl_head:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_683755b2ba5717_07724359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64060443164a9839c71c34206331731aaeeac788' => 
    array (
      0 => 'tpl_head:1',
      1 => '1748456880',
      2 => 'tpl_head',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683755b2ba5717_07724359 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.metadata.php','function'=>'smarty_function_metadata',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.sitename.php','function'=>'smarty_function_sitename',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_stylesheet.php','function'=>'smarty_function_cms_stylesheet',),));
?>
<head>
    <title><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 <?php echo smarty_function_metadata(array(),$_smarty_tpl);?>
 - <?php echo smarty_function_sitename(array(),$_smarty_tpl);?>
</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-0A0xQR6DkCoMlih8yFnu25d7Eq/PHS21PC1pwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    <?php echo smarty_function_cms_stylesheet(array(),$_smarty_tpl);?>

  </head><?php }
}
