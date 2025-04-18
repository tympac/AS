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
        {if count($users) > 0}           
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
                    {foreach $users as $user}
                        {strip}
                            <tr>
                                <td>{$user["idUser"]}</td>
                                <td>{$user["login"]}</td>
                                <td>
                                    {foreach $user["roles"] as $role}
                                        <span>{$role["roleName"]}</span>{if !$smarty.foreach.role.last}, {/if}
                                    {/foreach}
                                </td>
                                <td>
                                    {if !in_array('admin', array_column($user['roles'], 'roleName'))}
                                        <a class="btn btn-warning rounded-pill px-2" href="{$conf->action_url}makeAdmin/{$user['idUser']}">Make Admin</a>
                                    {/if}
                                </td>
                                <td>
                                    <a class="btn btn-danger rounded-pill px-2" href="{$conf->action_url}deleteUser/{$user['idUser']}">Delete</a>
                                </td>
                            </tr>
                        {/strip}
                    {/foreach}
                </tbody>
            </table>
        {/if}
    </div>
</section>


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