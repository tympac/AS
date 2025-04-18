<?php
/* Smarty version 4.3.4, created on 2025-04-18 18:10:42
  from 'C:\xampp\htdocs\homefinder\app\views\templates\properties_fragment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6802798242d2e0_31755903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f05a3f4f94bc45d3b0fbec83bce4f13b1ebeec8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homefinder\\app\\views\\templates\\properties_fragment.tpl',
      1 => 1744992378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6802798242d2e0_31755903 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="results">
    <div class="row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['house']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
        <div class="col-lg-4"><div class="trainer-item"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['housefoto']->value, 'hf');
$_smarty_tpl->tpl_vars['hf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hf']->value) {
$_smarty_tpl->tpl_vars['hf']->do_else = false;
if ($_smarty_tpl->tpl_vars['hf']->value["idHouse"] == $_smarty_tpl->tpl_vars['h']->value["idHouse"]) {?><div class="image-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['hf']->value["imagePath"];?>
"></div><?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <div class="down-content">
                    <span>
                        <del><sup>$</sup><?php echo $_smarty_tpl->tpl_vars['h']->value["price"]+($_smarty_tpl->tpl_vars['h']->value["price"])/10;?>
</del>
                        <sup>$</sup><?php echo $_smarty_tpl->tpl_vars['h']->value["price"];?>

                    </span>
                    <h4><?php echo $_smarty_tpl->tpl_vars['h']->value["descryption"];?>
</h4>
                    <p><?php echo $_smarty_tpl->tpl_vars['h']->value["address"];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['h']->value["type"];?>
</p>
                    <ul class="social-icons">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
propertiesDetails?id=<?php echo $_smarty_tpl->tpl_vars['h']->value["idHouse"];?>
">+ View More</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

    <?php if ((isset($_smarty_tpl->tpl_vars['totalPages']->value)) && $_smarty_tpl->tpl_vars['totalPages']->value > 0) {?>
    <nav id="pagination">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page']->value == 1) {?>disabled<?php }?>">
                <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
properties?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
&sf_type=<?php echo $_smarty_tpl->tpl_vars['searchType']->value;?>
" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <li class="page-item <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['page']->value) {?>active<?php }?>">
                <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
properties?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&sf_type=<?php echo $_smarty_tpl->tpl_vars['searchType']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            </li>
            <?php }
}
?>

            <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['totalPages']->value) {?>disabled<?php }?>">
                <a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
properties?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
&sf_type=<?php echo $_smarty_tpl->tpl_vars['searchType']->value;?>
" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php }?>
</div><?php }
}
