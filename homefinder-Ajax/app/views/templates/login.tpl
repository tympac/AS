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
                            <a href="{$conf->action_root}hello" class="logo">Home<em> Finder</em></a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="{$conf->action_root}hello" class="active">Home</a></li>
                                <li><a href="{$conf->action_root}properties">Properties</a></li>
                                    {if count($conf->roles)!=0}
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Properties</a>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{$conf->action_root}addShow">Add</a>
                                            <a class="dropdown-item" href="{$conf->action_root}addShow">Edit</a>
                                            <a class="dropdown-item" href="{$conf->action_root}addShow">Delete</a>
                                        </div>
                                    </li>
                                {/if}
                                {if count($conf->roles)==0}
                                    <li><a href="{$conf->action_root}loginShow">LOG IN</a></li> 
                                    {else}	
                                    <li><a href="{$conf->action_root}logout">LOG OUT</a></li> 
                                    {/if}

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
                <div class="row text-center">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2>LOG <em> IN</em></h2>
                            <img src="http://localhost/homefinder/app/views/templates/assets/images/line-dec.png" alt="waves">

                            <main class="form-signin w-100 m-auto">
                                <form action="{$conf->action_root}login" method="post">
                                    <div class="form-floating">
                                        <input  class="form-control" id="floatingInput" placeholder="E-Mail" name="login" value="{$form->login}">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="form-check text-start my-3">
                                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

                                </form>
                                <label > </label>
                                <a class="btn btn-primary w-100 py-2" href="{$conf->action_root}registerUser">Register</a>

                                {if $msgs->isMessage()}
                                    <div class="messages bottom-margin">
                                        <ul>
                                            {foreach $msgs->getMessages() as $msg}
                                                {strip}
                                                    <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                                                    {/strip}
                                                {/foreach}
                                        </ul>
                                    </div>
                                {/if}

                        </div>
                    </div>


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
        <script src="http://localhost/homefinder/app/views/templates/assets/js/jquery-2.1.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="http://localhost/homefinder/app/views/templates/assets/js/popper.js"></script>
        <script src="http://localhost/homefinder/app/views/templates/assets/js/bootstrap.min.js"></script>

        <!-- Plugins -->
        <script src="http://localhost/homefinder/app/views/templates/assets/js/scrollreveal.min.js"></script>
        <script src="http://localhost/homefinder/app/views/templates/assets/js/waypoints.min.js"></script>
        <script src="http://localhost/homefinder/app/views/templates/assets/js/jquery.counterup.min.js"></script>
        <script src="http://localhost/homefinder/app/views/templates/assets/js/imgfix.min.js"></script> 
        <script src="http://localhost/homefinder/app/views/templates/assets/js/mixitup.js"></script> 
        <script src="http://localhost/homefinder/app/views/templates/assets/js/accordions.js"></script>

        <!-- Global Init -->
        <script src="http://localhost/homefinder/app/views/templates/assets/js/custom.js"></script>

    </body>
</html>