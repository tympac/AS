<?php
/* Smarty version 4.3.4, created on 2025-01-17 19:46:42
  from 'C:\xampp\htdocs\homefinder\app\views\templates\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678aa59271f999_81950516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c018eb86cf1ae79d5d0ea819c5a90d32062bb37' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homefinder\\app\\views\\templates\\add.tpl',
      1 => 1737139600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678aa59271f999_81950516 (Smarty_Internal_Template $_smarty_tpl) {
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
        <section class="section" id="features">
            <div class="container">
                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>Home information</h2>
                        </div>

                        <div class="row g-5">
                            <div class="container">
                                <h4 class="mb-3">Detailed data</h4>
                                <form class="needs-validation" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
houseSave" method="post" enctype="multipart/form-data">

                                    <div class="col-12">
                                        <label for="username" class="form-label">Address</label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control" id="address" placeholder="Address" name ="address" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->address;?>
" required>
                                            <div class="invalid-feedback">
                                                Your address is required.
                                            </div>
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="lastName" class="form-label">Descryption</label>
                                        <div class="input-group has-varlidation">
                                            <input type="text" class="form-control" id="descryption" placeholder="Descryption" name="descryption" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->descryption;?>
" required>
                                            <div class="invalid-feedback">
                                                Valid price is required.
                                            </div>
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="lastName" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" placeholder="$$$" name="price" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->price;?>
" required>
                                        <div class="invalid-feedback">
                                            Valid price is required.
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="lastName" class="form-label">Type</label>
                                        <input type="text" class="form-control" id="Type" placeholder="Type" name="type" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->type;?>
" required>
                                        <div class="invalid-feedback">
                                            Valid type is required.
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="houseImage" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="houseImage" name="houseImage" accept="image/*" required>
                                        <div class="invalid-feedback">
                                            Please upload a valid image file.
                                        </div>
                                    </div>
                                    <label for="username" class="form-label">  </label>
                            </div>






                            <button class="w-100 btn btn-primary btn-lg" type="submit">ADD</button>
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
                            </form>
                        </div>
                </div>
                 <?php if (count($_smarty_tpl->tpl_vars['house']->value) > 0) {?>           
                <label for="username" class="form-label">  </label>
                <label for="username" class="form-label">  </label>
                <label for="username" class="form-label">  </label>
                <div class="py-5 text-center">
                            <h2>EDIT & DELETE LIST</h2>
                        </div>

                       
                    <table table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Address</th>
                                <th scope="col">Descryption</th>
                                <th scope="col">Price</th>
                                <th scope="col">Type</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DEL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['house']->value, 'h');
$_smarty_tpl->tpl_vars['h']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
$_smarty_tpl->tpl_vars['h']->do_else = false;
?>
                                <tr><th><?php echo $_smarty_tpl->tpl_vars['h']->value["address"];?>
</td><th><?php echo $_smarty_tpl->tpl_vars['h']->value["descryption"];?>
</td><th><?php echo $_smarty_tpl->tpl_vars['h']->value["price"];?>
</td><th><?php echo $_smarty_tpl->tpl_vars['h']->value["type"];?>
</td><th><a class="btn btn-success rounded-pill px-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
houseEdit/<?php echo $_smarty_tpl->tpl_vars['h']->value['idHouse'];?>
">EDIT</a></td><th><a class="btn btn-danger rounded-pill px-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
houseDelete/<?php echo $_smarty_tpl->tpl_vars['h']->value['idHouse'];?>
">DEL</a></td></tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                <?php }?>

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
                </main>

                <footer class="my-5 pt-5 text-body-secondary text-center text-small">
                    <p class="mb-1">&copy; 2017–2024 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>
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
