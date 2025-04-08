<?php
/* Smarty version 4.3.4, created on 2025-04-08 17:05:23
  from 'C:\xampp\htdocs\homefinder\app\views\templates\properties.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67f53b33402f33_41800959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef9f12d522329b10a6b1281f245a087e083c07a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homefinder\\app\\views\\templates\\properties.tpl',
      1 => 1744124721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f53b33402f33_41800959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

        <title>PHPJabbers.com | Free Real Estate Website Template</title>

        <link rel="stylesheet" type="text/css" href="http://localhost/homefinder/app/views/templates/assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="http://localhost/homefinder/app/views/templates/assets/css/font-awesome.css">

        <link rel="stylesheet" href="http://localhost/homefinder/app/views/templates/assets/css/style.css">

    </head>

    <body>

        <!-- ***** Preloader Start ***** -->
        <div id="js-preloader" class="js-preloader">
            <div class="preloader-inner">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->


        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
hello" class="logo">Home<em> Finder</em></a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
hello" class="active">Home</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
properties">Properties</a></li>
                                    <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) != 0) {?>
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Properties</a>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addShow">Add</a>
                                            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addShow">Edit</a>
                                            <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addShow">Delete</a>
                                        </div>
                                    </li>
                                <?php }?>
                                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) == 0) {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">LOG IN</a></li> 
                                    <?php } else { ?>	
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">LOG OUT</a></li> 
                                    <?php }?>

                            </ul>        
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

        <!-- ***** Call to Action Start ***** -->
        <section class="section section-bg" id="call-to-action" style="background-image: url(http://localhost/homefinder/app/views/templates/assets/images/banner-image-1-1920x500.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cta-content">
                            <br>
                            <br>
                            <h2>Our <em>Properties</em></h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Call to Action End ***** -->

        <!-- ***** Fleet Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <br>
                <br>

                <div class="contact-form">
                                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
properties" method="GET">

                        <div class="col-12">
                            <div class="form-group">
                                <label>Search option:</label>
                                <input type="text" name="sf_type" value="<?php echo (($tmp = (($tmp = $_smarty_tpl->tpl_vars['searchForm']->value->type ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['searchType']->value ?? null : $tmp) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">                              </div>
                        </div>

                        <div class="col-sm-4 offset-sm-4">
                            <div class="main-button text-center">
                                <button type="submit">Search</button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>

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
</del>  <sup>$</sup><?php echo $_smarty_tpl->tpl_vars['h']->value["price"];?>

                                        </span>

                                        <h4><?php echo $_smarty_tpl->tpl_vars['h']->value["descryption"];?>
</h4>

                                        <p><?php echo $_smarty_tpl->tpl_vars['h']->value["address"];?>
</p>
                                        <p><?php echo $_smarty_tpl->tpl_vars['h']->value["type"];?>
</p>

                                        <ul class="social-icons">
                                            <li><a href="http://localhost/app/views/templates/assets/property-details.html">+ View More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




                </div>

                <br>

            <?php if ((isset($_smarty_tpl->tpl_vars['totalPages']->value)) && $_smarty_tpl->tpl_vars['totalPages']->value > 0) {?>
    <nav>
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


            </div>
        </section>
        <!-- ***** Fleet Ends ***** -->


        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            Copyright © 2020 Company Name
                            - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/jquery-2.1.0.min.js"><?php echo '</script'; ?>
>

        <!-- Bootstrap -->
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/popper.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>

        <!-- Plugins -->
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/scrollreveal.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/waypoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/jquery.counterup.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/imgfix.min.js"><?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/mixitup.js"><?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/accordions.js"><?php echo '</script'; ?>
>

        <!-- Global Init -->
        <?php echo '<script'; ?>
 src="http://localhost/homefinder/app/views/templates/assets/js/custom.js"><?php echo '</script'; ?>
>

    </body>
</html><?php }
}
