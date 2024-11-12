<?php
/* Smarty version 4.5.4, created on 2024-11-12 17:02:37
  from 'C:\xampp\htdocs\kredyt_obiektowość_kontroler_glowny_zad05\app\calc\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_67337c1d94e833_83986255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2172423b1aad83ab63fb1e48474051ac7a118023' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kredyt_obiektowość_kontroler_glowny_zad05\\app\\calc\\calc_view.tpl',
      1 => 1731427347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67337c1d94e833_83986255 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_159411255167337c1d943eb4_57366991', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_211553325467337c1d9447c8_33079444', 'content');
?>
     






<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../../templates/index.tpl");
}
/* {block 'footer'} */
class Block_159411255167337c1d943eb4_57366991 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_159411255167337c1d943eb4_57366991',
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
class Block_211553325467337c1d9447c8_33079444 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_211553325467337c1d9447c8_33079444',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="content style4 featured">
        <div class="container medium">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute">
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
