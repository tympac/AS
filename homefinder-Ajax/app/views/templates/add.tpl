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
                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>Home information</h2>
                        </div>

                        <div class="row g-5">
                            <div class="container">
                                <h4 class="mb-3">Detailed data</h4>
                                <form class="needs-validation" action="{$conf->action_root}houseSave" method="post" enctype="multipart/form-data">

                                    <div class="col-12">
                                        <label for="username" class="form-label">Address</label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control" id="address" placeholder="Address" name ="address" value="{$form->address}" required>
                                            <div class="invalid-feedback">
                                                Your address is required.
                                            </div>
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="lastName" class="form-label">Descryption</label>
                                        <div class="input-group has-varlidation">
                                            <input type="text" class="form-control" id="descryption" placeholder="Descryption" name="descryption" value="{$form->descryption}" required>
                                            <div class="invalid-feedback">
                                                Valid price is required.
                                            </div>
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="lastName" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" placeholder="$$$" name="price" value="{$form->price}" required>
                                        <div class="invalid-feedback">
                                            Valid price is required.
                                        </div>
                                        <label for="username" class="form-label">  </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="lastName" class="form-label">Type</label>
                                        <input type="text" class="form-control" id="Type" placeholder="Type" name="type" value="{$form->type}" required>
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
                            <input type="hidden" name="id" value="{$form->id}">
                            </form>
                        </div>
                </div>
                 {if count($house)>0}           
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
                            {foreach $house as $h}
                                {strip}
                                    <tr>
                                        <th>{$h["address"]}</td>
                                        <th>{$h["descryption"]}</td>
                                        <th>{$h["price"]}</td>
                                        <th>{$h["type"]}</td>
                                        <th><a class="btn btn-success rounded-pill px-2" href="{$conf->action_url}houseEdit/{$h['idHouse']}">EDIT</a></td>

                                        <th><a class="btn btn-danger rounded-pill px-2" href="{$conf->action_url}houseDelete/{$h['idHouse']}">DEL</a></td>

                                    </tr>
                                {/strip}
                            {/foreach}
                        </tbody>
                    </table>
                {/if}

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