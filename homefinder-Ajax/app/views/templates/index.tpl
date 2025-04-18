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

        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner" id="top">
            <video autoplay muted loop id="bg-video">
                <source src="http://localhost/homefinder/app/views/templates/assets/images/video.mp4" type="video/mp4" />
            </video>

            <div class="video-overlay header-text">
                <div class="caption">
                    <br><br/>
                    <h6>With thoughts of people </h6>
                    <h6>looking for a new home</h6>
                    <br><br/>
                    <br><br/>
                    <h2>Home <em>Finder</em></h2>
                    <br><br/>
                    <br><br/>
                    <div class="main-button">
                        {if count($conf->roles)==0}
                            <li><a href="{$conf->action_root}loginShow">LOG IN</a></li> 
                            {else}	
                            <li><a href="{$conf->action_root}logout">LOG OUT</a></li> 
                            {/if}
                    </div>
                    <br><br/>
                    <div class="main-button">
                        <a href="{$conf->action_root}properties">List of apartments</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Main Banner Area End ***** -->

        <!-- ***** Cars Starts ***** -->
        <section class="section" id="trainers">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2>Featured <em>Properties</em></h2>
                            <img src="http://localhost/homefinder/app/views/templates/assets/images/line-dec.png" alt="">
                            <h2>. <em>.</em> .</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {foreach $house as $key => $h}
                        {if $key < 3}



                            <div class="col-lg-4">
                                <div class="trainer-item">
                                    {foreach $housefoto as $hf}
                                        {strip}
                                            {if $hf["idHouse"]==$h["idHouse"]}
                                                <div class="image-thumb">
                                                    <img src="{$hf["imagePath"]}" alt="">
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
                                {/if}
                                    {/foreach}
                                    </div>

                                    <br>

                                    <div class="main-button text-center">
                                        <a href="http://localhost/homefinder/app/views/templates/properties.tpl">View Properties</a>
                                    </div>
                                </div>
                            </section>
                            <!-- ***** Cars Ends ***** -->

                            <section class="section section-bg" id="schedule" style="background-image: url(http://localhost/homefinder/app/views/templates/assets/images/about-fullscreen-1-1920x700.jpg)">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <label for="username" class="form-label">  </label>
                                            <label for="username" class="form-label">  </label>
                                            <label for="username" class="form-label">  </label>
                                            <label for="username" class="form-label">  </label>
                                            <div class="section-heading dark-bg">
                                                <h2>Read <em>About Us</em></h2>
                                                <img src="http://localhost/homefinder/app/views/templates/assets/images/line-dec.png" alt="">
                                                <label for="username" class="form-label">    </label>
                                                <label for="username" class="form-label">    </label>
                                                <label for="username" class="form-label">  </label>
                                                <p>HomeFinder Portal is an online platform designed for individuals looking to rent an apartment as well as those who wish to offer one. </p>
                                                <label for="username" class="form-label">    </label>
                                                <p>Registered users can add listings, update them, and manage their offers. Visitors to the site who are not registered can browse the available rental options but do not have the ability to create or edit listings.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- ***** Blog Start ***** -->
                            <section class="section" id="our-classes">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="section-heading">
                                                <h2>Read our <em>Blog</em></h2>
                                                <img src="http://localhost/homefinder/app/views/templates/assets/images/line-dec.png" alt="">
                                                <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="tabs">
                                        <div class="col-lg-4">
                                            <ul>
                                                <li><a href='#tabs-1'>Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                                                <li><a href='#tabs-2'>Aspernatur excepturi magni, placeat rerum nobis magnam libero! Soluta.</a></li>
                                                <li><a href='#tabs-3'>Sunt hic recusandae vitae explicabo quidem laudantium corrupti non adipisci nihil.</a></li>
                                                <div class="main-rounded-button"><a href="http://localhost/homefinder/app/views/templates/blog.tpl">Read More</a></div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-8">
                                            <section class='tabs-content'>
                                                <article id='tabs-1'>
                                                    <img src="http://localhost/homefinder/app/views/templates/assets/images/blog-image-1-940x460.jpg" alt="">
                                                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>

                                                    <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>

                                                    <p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui eleifend hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem fermentum sem tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut, accumsan diam.</p>
                                                    <div class="main-button">
                                                        <a href="http://localhost/homefinder/app/views/templates/blog-details.tpl">Continue Reading</a>
                                                    </div>
                                                </article>
                                                <article id='tabs-2'>
                                                    <img src="http://localhost/homefinder/app/views/templates/assets/images/blog-image-2-940x460.jpg" alt="">
                                                    <h4>Aspernatur excepturi magni, placeat rerum nobis magnam libero! Soluta.</h4>
                                                    <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                                                    <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam tortor a velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus. Nam tellus nibh, ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                    <div class="main-button">
                                                        <a href="http://localhost/homefinder/app/views/templates/blog-details.tpl">Continue Reading</a>
                                                    </div>
                                                </article>
                                                <article id='tabs-3'>
                                                    <img src="http://localhost/homefinder/app/views/templates/assets/images/blog-image-3-940x460.jpg" alt="">
                                                    <h4>Sunt hic recusandae vitae explicabo quidem laudantium corrupti non adipisci nihil.</h4>
                                                    <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                                                    <p>Fusce laoreet malesuada rhoncus. Donec ultricies diam tortor, id auctor neque posuere sit amet. Aliquam pharetra, augue vel cursus porta, nisi tortor vulputate sapien, id scelerisque felis magna id felis. Proin neque metus, pellentesque pharetra semper vel, accumsan a neque.</p>
                                                    <div class="main-button">
                                                        <a href="http://localhost/homefinder/app/views/templates/blog-details.tpl">Continue Reading</a>
                                                    </div>
                                                </article>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- ***** Blog End ***** -->

                            <!-- ***** Call to Action Start ***** -->
                            <section class="section section-bg" id="call-to-action" style="background-image: url(http://localhost/homefinder/app/views/templates/assets/images/banner-image-1-1920x500.jpg)">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="cta-content">
                                                <h2>Send us a <em>message</em></h2>
                                                <h2>. <em>.</em> .</h2>
                                                <label for="username" class="form-label">  </label>
                                                <div class="main-button">
                                                    <a href="http://localhost/homefinder/app/views/templates/contact.tpl">Contact us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- ***** Call to Action End ***** -->



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