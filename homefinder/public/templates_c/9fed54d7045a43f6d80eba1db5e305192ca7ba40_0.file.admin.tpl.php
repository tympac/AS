<?php
/* Smarty version 4.3.4, created on 2025-01-18 14:01:07
  from 'C:\xampp\htdocs\homefinder\app\views\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678ba61359e484_77892202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fed54d7045a43f6d80eba1db5e305192ca7ba40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homefinder\\app\\views\\templates\\admin.tpl',
      1 => 1737205238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678ba61359e484_77892202 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
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
<!DOCTYPE html>
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
        <?php if (count($_smarty_tpl->tpl_vars['users']->value) > 0) {?>           
            <div class="py-5 text-center">
                <h2>USER MANAGEMENT</h2>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID User</th>
                        <th scope="col">Login</th>
                        <th scope="col">Role</th>
                        <th scope="col">Make Admin</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['user']->value["idUser"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value["login"];?>
</td><td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value["roles"], 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?><span><?php echo $_smarty_tpl->tpl_vars['role']->value["roleName"];?>
</span><?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_role']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_role']->value['last'] : null)) {?>, <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></td><td><?php if (!in_array('admin',array_column($_smarty_tpl->tpl_vars['user']->value['roles'],'roleName'))) {?><a class="btn btn-warning rounded-pill px-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
makeAdmin/<?php echo $_smarty_tpl->tpl_vars['user']->value['idUser'];?>
">Make Admin</a><?php }?></td><td><a class="btn btn-danger rounded-pill px-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteUser/<?php echo $_smarty_tpl->tpl_vars['user']->value['idUser'];?>
">Delete</a></td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        <?php }?>
    </div>
</section>


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
