<?php
$kb=1024;
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    //echo str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
// echo "-> Test finished in $deltat seconds. Your speed is ". round($kb / $deltat, 3)."Kb/s";

if ( round($kb / $deltat, 3) <= 2500 ) {
    echo "Your internet connection is to slow... Try again later..."; 
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta name="robots" content="noodp,noydir" />
      <title><?php echo $header_title . AUTHOR ?></title>
      <meta name="title" content="<?php echo $header_title?>">
      <meta name="description" content="<?php echo $header_desc?>">
      <meta name="keywords" content="<?php echo $header_keywords?>">
      <!-- <meta name="robots" content="index, follow"> -->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="language" content="English">
      <meta name="author" content="aj nocolai garrigues">
    
      <meta itemprop="image" content="https://www.motogarahe.com/resources/site/images/logo.jpg">

      <!-- Facebook Meta Tags -->
      <!-- <meta property="og:image:width" content="212">
      <meta property="og:image:height" content="212"> -->
      <meta property="og:description" content="<?php echo $header_desc?>">
      <meta property="og:image" content="https://www.motogarahe.com/resources/site/images/logo.jpg">
      <meta property="og:url" content="<?php echo current_url()?>">
      <meta property="og:title" content="<?php echo $header_title . AUTHOR ?>">

      <!-- Twitter Meta Tags -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="<?php echo $header_title . AUTHOR ?>">
      <meta name="twitter:description" content="<?php echo $header_desc?>">
      <meta name="twitter:image" content="https://www.motogarahe.com/resources/site/images/logo.jpg">


      <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_IMG_PATH?>favicon.png" /> -->

      <link href="<?php echo SITE_CSS_PATH?>master.css" rel="stylesheet">

      <!-- SWITCHER -->
      <!-- <link rel="stylesheet" id="switcher-css" type="text/css" href="<?php echo SITE_CSS_PATH?>switcher.css" media="all" /> -->
      <link rel="alternate stylesheet" type="text/css" href="<?php echo SITE_CSS_PATH?>color1.css" title="color1" media="all" data-default-color="true" />
      <!-- <link rel="alternate stylesheet" type="text/css" href="<?php echo SITE_CSS_PATH?>color2.css" title="color2" media="all" />
      <link rel="alternate stylesheet" type="text/css" href="<?php echo SITE_CSS_PATH?>color3.css" title="color3" media="all" />
      <link rel="alternate stylesheet" type="text/css" href="<?php echo SITE_CSS_PATH?>color4.css" title="color4" media="all" />
      <link rel="alternate stylesheet" type="text/css" href="<?php echo SITE_CSS_PATH?>color5.css" title="color5" media="all" />
      <link rel="alternate stylesheet" type="text/css" href="<?php echo SITE_CSS_PATH?>color6.css" title="color6" media="all" /> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
      <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.css">
      <style>  
         .b-nav__list ul li a:hover, .b-nav__list ul li .active{
            color: #ffdb00 !important;
            border:none;  
         }

         .no_items{
            padding:0 5px;background:#c12418;border-radius:10px;color:#fff;
         }

         .fixed-top {
             position: fixed;
             top: 0;
             right: 0;
             left: 0;
             z-index: 999999;
             transition: padding 0.8s ease;
                 padding: 10px 0px;

         }

         .m-home .b-info__aside {
             z-index: 1 !important;
          }
            
          .b-info__latest-article-photo.m-audi {
            display: none !important;
          }

          .b-info__latest-article-info {
            margin:0px !important;
          }
         .b-nav__list {background: #000;}
         .b-topBar__addr {
              font-size: 15px;
              text-align: center;
              color: #face0b !important;
         }

         .s-shadow {
          z-index: 80
         }

         .b-detail__main-aside form select {
          color: #000
         }
         .pd-unset{
          padding-right: 0px!important;
         }
         .sticky-nav{
            position: fixed;
            width: 100%;
            z-index: 9999;
            padding: 0px 0px;
            transition: 0.15s all ease;
         }
         .b-nav{
          transition: 0.15s all ease;
         }
      </style>
      <link href="<?php echo SITE_CSS_PATH?>custom.css" rel="stylesheet">
      <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
      <style>
        /*body{background-color: #000}*/
        section {background-color: #fff}
        /*.home2 {height: 100vh}*/
        *:not(.fa) {
          font-family: 'Inter var', sans-serif !important;
        }
      </style>
      <script src="<?php echo SITE_JS_PATH?>jquery-1.11.3.min.js"></script>
      <!-- for google map -->
      <script type="text/javascript">
           var centreGot = false;
      </script>

     

   </head>
   <body class="m-home" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
      <?php echo $map['js']; ?>

      <!-- <header class="b-topBar">
         <div class="container slideInDown" data-wow-delay="0.7s">
            <div class="row">
               <div class="col-md-12 col-xs-12">
                  <div class="b-topBar__addr">
                     All the data in this website is inaccurate and for testing purposes only</span>
                  </div>
               </div>
            </div>
         </div>
      </header> -->
      <!--b-topBar-->
      <nav class="b-nav">
         <div class="container">
            <div class="row">
               <div class="col-sm-3 col-xs-4">
                  <div class="b-nav__logo hidden-xs ">
                        <a href="<?php echo base_url('home')?>"><img class="img img-responsive" src="<?php echo SITE_IMG_PATH?>logo/logo.jpg"></a>
                  </div>
               </div>
               <div class="col-sm-9 col-xs-8 pd-unset">
                  <div class="b-nav__list slideInRight" data-wow-delay="0.3s">
                    
                     <div class="navbar-header">
                        <div class="b-nav__logo hidden-sm hidden-md hidden-lg" style="padding-top: 0px; float:left;">
                            <a href="<?php echo base_url('home')?>"><img class="img img-responsive" src="<?php echo SITE_IMG_PATH?>logo/logo.jpg"></a>
                        </div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>
                     </div>
                     <div class="collapse navbar-collapse navbar-main-slide " id="nav">
                        <ul class="navbar-nav-menu">
                           <li><a class="<?php echo ( $this->router->fetch_class() == 'home' ? 'active' : ''); ?>" href="<?php echo base_url('home')?>">Home</a></li>

              
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle='dropdown' href="#">Motorcycles <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown-menu h-nav">
                  <li><a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>">New</a></li>
                  <li><a href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">Repo</a></li>
                  <li><a class="<?php echo ( $this->router->fetch_class() == 'compare' ? 'active' : ''); ?>" href="<?php echo base_url('compare')?>">Compare <?php if ( $this->cart->total_items() != 0 ):?>
                                <span class="no_items">
                                <?php echo $this->cart->total_items() ?>
                                </span>
                                <?php endif?></a>
                        </li>
                </ul>
              </li>














                           <!-- <li><a class="<?php echo ( $this->router->fetch_class() == 'motorcycles' ? 'active' : ''); ?>" href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>">Motorcycles</a></li>
                           <li><a class="<?php echo ( $this->router->fetch_class() == 'repo' ? 'active' : ''); ?>" href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">Repo</a></li> -->
                           <!-- <li><a class="<?php echo ( $this->router->fetch_class() == 'compare' ? 'active' : ''); ?>" href="<?php echo base_url('compare')?>">Compare <?php if ( $this->cart->total_items() != 0 ):?>
                            <span class="no_items">
                            <?php echo $this->cart->total_items() ?>
                            </span>
                            <?php endif?></a>
                    </li> -->
                           <!-- <li><a class="<?php echo ( $this->router->fetch_class() == 'dealers' ? 'active' : ''); ?>" href="<?php echo base_url('dealers/index/all/0/0')?>">Dealers</a></li> -->

                           <!-- <li><a class="<?php echo ( $this->router->fetch_class() == 'about_us' ? 'active' : ''); ?>" href="<?php echo base_url('about_us')?>">About Us</a></li>
                    
                           <li><a class="<?php echo ( $this->router->fetch_class() == 'contact_us' ? 'active' : ''); ?>" href="<?php echo base_url('contact_us')?>">Contact Us</a> -->




              <li><a class="" href="#">Moto Promo</a></li>
              <li><a class="<?php echo ( $this->router->fetch_class() == 'blogs' ? 'active' : ''); ?>" href="<?php echo base_url('blogs')?>">MG Blogs</a></li>
              <li><a class="" href="#">MG Club</a></li>


                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </nav><!--b-nav-->

<script type="text/javascript">
  $(window).scroll(function() {
              var height = $(window).scrollTop();
            //   console.log(height);

              if(height) {
                  // do something
                 $('nav.b-nav').addClass('sticky-nav');
              }
              else{
                 $('nav.b-nav').removeClass('sticky-nav');
              }
          });
  

</script>









