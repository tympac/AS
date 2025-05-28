<?php
/* Smarty version 4.5.2, created on 2025-05-28 20:28:02
  from 'tpl_body:1' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_683755b28efd35_84381414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '763e63b089e7c52bfafe4a16588e3defdf19eb95' => 
    array (
      0 => 'tpl_body:1',
      1 => '1748456880',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683755b28efd35_84381414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.title.php','function'=>'smarty_function_title',),));
?>
<body>
    <nav id="menu">
      <?php echo Navigator::function_plugin(array(),$_smarty_tpl);?>

    </nav>
    <section id="content">
      <h1><?php echo smarty_function_title(array(),$_smarty_tpl);?>
</h1>
      <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
    </section>
  </body>
</html><?php }
}
