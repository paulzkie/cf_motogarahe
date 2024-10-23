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
      <meta charset="UTF-8" />
      <!--<meta charset="utf-8"/>-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta name="robots" content="noodp,noydir" />
      <!--<meta name="robots" content="noindex, nofollow" />-->
      <title><?php echo $header_title . AUTHOR ?></title>
      <meta name="title" content="<?php echo $header_title?>">
      <meta name="description" content="<?php echo $header_desc?>">
      <meta name="keywords" content="<?php echo $header_keywords?>">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="language" content="English">
      <meta name="author" content="aj nocolai garrigues">
      <meta itemprop="image" content="<?php echo $header_featured_img ? base_url($header_featured_img) : 'https://www.motogarahe.com/resources/site/images/logo.jpg' ?> ">

      <!-- Facebook Meta Tags -->
      <!-- <meta property="og:image:width" content="212">
      <meta property="og:image:height" content="212"> -->
      <!-- <meta property="og:url" content="<?php echo current_url()?>">
      <meta property="og:title" content="<?php echo $header_title . AUTHOR ?>">
      <meta property="og:description" content="<?php echo $header_desc?>">
      <meta property="og:image" content="<?php echo $header_featured_img ? base_url($header_featured_img) : 'https://www.motogarahe.com/resources/site/images/logo.jpg' ?> "> -->

      <meta property="og:url"           content="<?php echo current_url()?>" />
      <meta property="og:type"          content="website" />
      <meta property="og:title"         content="<?php echo $header_title . AUTHOR ?>" />
      <meta property="og:description"   content="<?php echo $header_desc?>" />
      <meta property="og:image"         content="<?php echo $header_featured_img ? base_url($header_featured_img) : 'https://www.motogarahe.com/resources/site/images/logo.jpg' ?> " />
      
      

      <!-- Twitter Meta Tags -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="<?php echo $header_title . AUTHOR ?>">
      <meta name="twitter:description" content="<?php echo $header_desc?>">
      <meta name="twitter:image" content="<?php echo $header_featured_img ? base_url($header_featured_img) : 'https://www.motogarahe.com/resources/site/images/logo.jpg' ?> ">


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
      <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
      <style>  
        
        .b-topBar {
          display: none
        }
        .b-topBar__addr {
          padding: 15px 0px;
          /*display: none*/
        }

        .b-topBar.error {
          background-color: #C23934;
          display: block
        }
        
        .b-topBar.error span {
          color: #fff;
        }


        .b-nav {
              padding: 10px 0 0px;
              position: relative;
              z-index: 99;
          }
         .b-nav__list ul li a:hover, .b-nav__list ul li .active:not(.dpm){
            color: white !important;
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
         .b-nav__list {
          background: #000;
          float: unset;
        }
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
            /*padding: 0px 0px;*/
            transition: 0.15s all ease;
         }
         .b-nav{
          transition: 0.15s all ease;
          top:0;
         }
         .tag-line{
          margin-left: 15px;
         }
         .tag-line img{
           
         }
         .logo-img2{
            width: 260px;
            margin-top: 12px;
            margin-left: -15px;
         }
         .tag-line-mob{
          height: auto;
          width: 150px;
          margin-left: 5px;
         }
         .yellow-color{
        
         }
         .navbar-nav-menu>li>a{
            color :#ffdb00 !important;
         }
         .tag-line img {
              height: auto;
              width: 250px;
          }
          .users{
              color: #ffdb00;
              margin-left: 50px;
              margin-top: 20px;
          }
          .b-nav__list ul{ 
              margin-top:10px;
              
          }

          .b-nav__list ul li a.dpm:hover {
              color: black !important;
              border: none;
              background: #face0b;
          }

          .h-nav li a {
              display: block!important;
              text-align: left;
              padding: 10px 50px 10px 14px !important;
          }

        /*select:focus > option:checked , select:focus > option:hover { */
        /*    background: #000 !important;*/
        /*}*/
        
        option:hover{background-color:yellow !important;}
         @media only screen and (max-width: 999px){
            .tag-line {
            margin-left: 5px;
            }
            .tag-line img{
              height: auto;
              width: 230px;
            }
            .logo-img2 {
                width: 220px;
                margin-top: 10px;
            }
         }
         @media only screen and (max-width: 850px){
          .tag-line img {
              height: auto;
              width: 170px;
          }
          .logo-img2 {
              width: 180px;
              margin-top: 0px;
          }
          .tag-line-mob{
            margin-top: -15px;
            margin-left: 75px;
          }

         }
         @media only screen and (max-width: 600px){
          .hidden-mob{
            display: none;
          }
          .tagline-mob{
            margin-top: -15px;
            margin-left: 75px;
          }
         }
         @media only screen and (max-width: 414px){
            .tag-line-mob {
                margin-top: -12px;
                margin-left: 55px;
                width: 125px;
            }

         }
         @media only screen and (max-width: 375px) {
            .tag-line-mob {
                margin-top: -10px;
                margin-left: 50px;
                width: 105px;
            }
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

      <div id="fb-root"></div>

  
  <script>
      var url= "<?php echo current_url()?>";
        $.ajax({
        type: 'POST',
        url: 'https://graph.facebook.com/?id='+url+'&scrape=true',
            success: function(data){
               console.log(data);
           }
    });
  </script>
      
      <!-- for google map -->
      <script type="text/javascript">
           var centreGot = false;
      </script>
        
    
     

   </head>
   <body class="m-home" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
       
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '2721953924521480',
          cookie     : true,
          xfbml      : true,
          version    : 'v6.0'
        });
          
        FB.AppEvents.logPageView();   
        
          
      };
    
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

      <?php echo $map['js']; ?>

      <header class="b-topBar">
         <div class="container slideInDown" data-wow-delay="0.7s">
            <div class="row">
               <div class="col-md-12 col-xs-12">
                  <div class="b-topBar__addr">
                     <span id="myPlaceTextBox"></span>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <nav class="b-nav">
        
        <div class="container">
            <div class="row">
              

               <div class="col-sm-9 col-xs-8 pd-unset">
                <div class="tag-line hidden-mob"> 
                  <a href="<?php echo base_url('home')?>"><img class="hidden-xs" src="<?php echo base_url('resources/site/images/motogarahe_logo.png') ?>"></a>
                </div>
                <div class="b-nav__list slideInRight" data-wow-delay="0.3s">
                  <div class="navbar-header row">
                     <div class="b-nav__logo hidden-sm hidden-md hidden-lg" >
                          <div class=" col-xs-6"> 
                            <a href="<?php echo base_url('home')?>"><img class="img img-responsive" src="<?php echo base_url('uploads/icon/logotagline4.png') ?>">
                              <!-- <a href="<?php echo base_url('home')?>"><img class="img img-responsive" src="<?php echo SITE_IMG_PATH?>logo/logo.jpg"> -->
                            <!-- <img class="tag-line-mob img img-responsive" src="<?php echo base_url('uploads/icon/logotagline2.png') ?>"> -->
                            </a>
                          </div>
                           
                            <div class="col-xs-6"> 
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                               <span class="sr-only">Toggle navigation</span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                              </button>
                            </div>
                        </div>
                       
                     </div>

                     <div class="collapse navbar-collapse navbar-main-slide " id="nav">
                        <ul class="navbar-nav-menu">
                          <li><a class=" <?php echo ( $this->router->fetch_class() == 'home' ? 'active' : ''); ?>" href="<?php echo base_url('home')?>">Home</a>
                          </li>
                          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle='dropdown' href="#">Motorcycles <span class="fa fa-caret-down"></span></a>
                        <ul class="dropdown-menu h-nav">
                          <li><a  class="dpm" href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>">New</a></li>
                          <li><a  class="dpm" href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">Repo</a></li>
                          <li><a class="dpm <?php echo ( $this->router->fetch_class() == 'compare' ? 'active' : ''); ?>" href="<?php echo base_url('compare')?>">Compare <?php if ( $this->cart->total_items() != 0 ):?>
                                        <span class="no_items">
                                        <?php echo $this->cart->total_items() ?>
                                        </span>
                                        <?php endif?></a>
                            </li>

                        </ul>
                      </li>
                      <!-- <li><a class="" href="#">Moto Promo</a></li> -->
                      <li><a class="" href="<?php echo base_url('mgclub') ?>">MG Club</a></li>
                      <li><a class="<?php echo ( $this->router->fetch_class() == 'blogs' ? 'active' : ''); ?>" href="<?php echo base_url('blogs')?>">MG News & Blogs</a></li>
                        </ul>
                     </div>     
                </div>
               </div>


               <div class="col-sm-3 col-xs-4">
                  <div class="b-nav__logo hidden-xs ">
                        <a href="">
                          <img class="img  logo-img2" src="<?php echo base_url('uploads/icon/hanapmototag.png')?>">
                        </a>
                        <div class="users hidden"> <i class="fa fa-user"></i> Sign up / <i class="fa fa-sign-in"></i> Log in</div>
                  </div>
               </div>



            </div>
        </div>    
      </nav>
     

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









