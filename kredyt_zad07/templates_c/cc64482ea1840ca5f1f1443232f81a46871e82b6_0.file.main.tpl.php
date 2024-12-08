<?php
/* Smarty version 4.5.4, created on 2024-12-08 12:40:03
  from 'C:\xampp\htdocs\kredyt_zad07\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67558593329000_83263450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc64482ea1840ca5f1f1443232f81a46871e82b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kredyt_zad07\\app\\views\\templates\\main.tpl',
      1 => 1731401239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67558593329000_83263450 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
        <?php if ($_smarty_tpl->tpl_vars['hide_intro']->value) {?>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/style_hide_intro.css">
        <?php }?>
    </head>

    <body class="is-preload">

        <!-- Header -->
        <section id="header" class="dark">
            <header>
                <h1><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
                <p><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
</p>
            </header>
            <footer>
                <a href="#fourth" class="button scrolly">Rozwiń</a>
            </footer>
        </section>

        <!-- Main Content -->

        <section id="fourth" class="main">
            <header>
                <div class="container">
                    <h2>Kalkulator kredytów</h2>
                    <p>Podaj kwtotę, liczbę lat oraz oprocentowanie, aby obliczyc wysokość miesięcznej raty.</p>
                </div>
            </header>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1688323569675585933224a9_42399655', 'content');
?>

        </section>







        <!-- Footer -->
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1302976110675585933235d6_36665979', 'footer');
?>


        <!-- Scripts -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

    </body>
</html>
<?php }
/* {block 'content'} */
class Block_1688323569675585933224a9_42399655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1688323569675585933224a9_42399655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1302976110675585933235d6_36665979 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1302976110675585933235d6_36665979',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php
}
}
/* {/block 'footer'} */
}
