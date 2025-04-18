<?php
/* Smarty version 4.3.4, created on 2025-01-17 18:15:38
  from 'C:\xampp\htdocs\homefinder\app\views\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678a903ae94584_26392295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c23e8d0cef6f9edfe2628003c662a26e520b5ce5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homefinder\\app\\views\\templates\\register.tpl',
      1 => 1737134129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678a903ae94584_26392295 (Smarty_Internal_Template $_smarty_tpl) {
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

        <section class="section section-bg" id="call-to-action" style="background-image: url(http://localhost/homefinder/app/views/templates/assets/images/banner-image-1-1920x500.jpg)">

        </section>

        <!-- ***** Features Item Start ***** -->
        <label > </label>
        <label > </label>
        <label > </label>
        <label > </label>
        <label > </label>

        <section class="section">
            <div class="container">
                <h4 class="mb-3 text-center">Create a New Account</h4>
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->firstName;?>
" required>
                        <div class="invalid-feedback">First name is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lastName;?>
" required>
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter your login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" required>
                        <div class="invalid-feedback">Login is required.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <div class="invalid-feedback">Password is required.</div>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                </form>
                <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
                    <div class="messages bottom-margin">
                        <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                <?php }?>
            </div>
        </section>
        <!-- ***** Features Item End ***** -->



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
