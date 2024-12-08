<?php
/* Smarty version 4.5.4, created on 2024-11-16 16:21:06
  from 'C:\xampp\htdocs\kredyt_namespace_zad06\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_6738b86285eca3_61802621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8da8660c694d0cacc4ba1d3a3a394c771c81270' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kredyt_namespace_zad06\\templates\\index.tpl',
      1 => 1731401239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6738b86285eca3_61802621 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13369839276738b86285c8a1_98980332', 'content');
?>

        </section>







        <!-- Footer -->
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15601786476738b86285cf40_80935852', 'footer');
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
class Block_13369839276738b86285c8a1_98980332 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13369839276738b86285c8a1_98980332',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_15601786476738b86285cf40_80935852 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_15601786476738b86285cf40_80935852',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php
}
}
/* {/block 'footer'} */
}
