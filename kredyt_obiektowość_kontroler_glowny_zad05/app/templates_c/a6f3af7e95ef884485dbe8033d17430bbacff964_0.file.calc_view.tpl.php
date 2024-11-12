<?php
/* Smarty version 4.5.4, created on 2024-11-12 16:34:14
  from 'C:\xampp\htdocs\kredyt_obiektowość_kontroler_glowny_zad05\app\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_6733757695ea76_84797208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f3af7e95ef884485dbe8033d17430bbacff964' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kredyt_obiektowość_kontroler_glowny_zad05\\app\\calc_view.tpl',
      1 => 1731399928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6733757695ea76_84797208 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_152236700467337576954a16_17135887', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_88642889667337576955293_44593215', 'content');
?>
     






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/index.tpl");
}
/* {block 'footer'} */
class Block_152236700467337576954a16_17135887 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_152236700467337576954a16_17135887',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="footer">
        <ul class="icons">
            <li><a href="https://github.com/tympac/AS" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
        </ul>
        <div class="copyright">
            <ul class="menu">
                <li>&copy; Untitled. All rights reserved.</li>
                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </section>

<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_88642889667337576955293_44593215 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_88642889667337576955293_44593215',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="content style4 featured">
        <div class="container medium">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php">
                <div class="row gtr-50">

                    <div class="col-12 col-12-mobile"><input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
" placeholder="Kwota" /></div>
                    <div class="col-12 col-12-mobile"><input id="id_lata" type="text" name="lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
" placeholder="Lata" /></div>
                    <div class="col-12 col-12-mobile"><input id="id_opr" type="text" name="opr" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->opr;?>
" placeholder="Oprocentowanie" /></div>

                    <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" class="button" value="Potwierdź" /></li>
                        </ul>
                    </div>
                </div>
            </form>


            <div class="Wynik">
                <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
                    <p>Wynik</p>
                    <p class="result-box"><?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
</p>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
                    <p>Wystąpiły błędy:<p>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                        <h1><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</h1>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>          
            </div>



        </div>
    </div>

<?php
}
}
/* {/block 'content'} */
}
