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
                    {* Change action to properties and add method="GET" *}
                    <form action="{$conf->action_root}properties" method="GET">

                        <div class="col-12">
                            <div class="form-group">
                                <label>Search option:</label>
                                <input type="text" name="sf_type" value="{$searchForm->type|default:$searchType|default:''}">  {* Also ensure value persists *}
                            </div>
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

                    {foreach $house as $h}
                        {strip}



                            <div class="col-lg-4">
                                <div class="trainer-item">
                                    {foreach $housefoto as $hf}
                                        {strip}
                                            {if $hf["idHouse"]==$h["idHouse"]}
                                                <div class="image-thumb">
                                                    <img src="{$hf["imagePath"]}">
                                                </div>
                                            {/if}
                                        {/strip}
                                    {/foreach}
                                    <div class="down-content">
                                        <span>
                                            <del><sup>$</sup>{$h["price"]+($h["price"])/10}</del>  <sup>$</sup>{$h["price"]}
                                        </span>

                                        <h4>{$h["descryption"]}</h4>

                                        <p>{$h["address"]}</p>
                                        <p>{$h["type"]}</p>

                                        <ul class="social-icons">
                                            <li><a href="http://localhost/app/views/templates/assets/property-details.html">+ View More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        {/strip}
                    {/foreach}




                </div>

                <br>

            {if isset($totalPages) && $totalPages > 0}
    <nav>
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item {if $page == 1}disabled{/if}">
                <a class="page-link" href="{$conf->action_root}properties?page={$page-1}&sf_type={$searchType}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            {for $i=1 to $totalPages}
                <li class="page-item {if $i == $page}active{/if}">
                    <a class="page-link" href="{$conf->action_root}properties?page={$i}&sf_type={$searchType}">{$i}</a>
                </li>
            {/for}

            <li class="page-item {if $page == $totalPages}disabled{/if}">
                <a class="page-link" href="{$conf->action_root}properties?page={$page+1}&sf_type={$searchType}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
{/if}


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