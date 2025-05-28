<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:28:18
  from 'cms_template:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_683755c2e9b3e8_04072007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50470a741f99fb273c021a465e5d45647bca304c' => 
    array (
      0 => 'cms_template:1',
      1 => '1748456880',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683755c2e9b3e8_04072007 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_get_language.php','function'=>'smarty_function_cms_get_language',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.metadata.php','function'=>'smarty_function_metadata',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.sitename.php','function'=>'smarty_function_sitename',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_stylesheet.php','function'=>'smarty_function_cms_stylesheet',),));
?>

<!doctype html>
<html lang="<?php echo smarty_function_cms_get_language(array(),$_smarty_tpl);?>
">
  <head>
    <title><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 <?php echo smarty_function_metadata(array(),$_smarty_tpl);?>
 - <?php echo smarty_function_sitename(array(),$_smarty_tpl);?>
</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-0A0xQR6DkCoMlih8yFnu25d7Eq/PHS21PC1pwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    <?php echo smarty_function_cms_stylesheet(array(),$_smarty_tpl);?>

  </head>
  <body>
    <nav id="menu">
      
    </nav>
    <section id="content">
      <h1><?php echo smarty_function_title(array(),$_smarty_tpl);?>
</h1>
      
    </section>
  </body>
</html><?php }
}
