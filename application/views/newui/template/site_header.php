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
    
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MPTLR8F');</script>
<!-- End Google Tag Manager -->

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
      <meta name="author" content="Paul Ezekhiele Fradejas">
      <meta name="google-site-verification" content="vJdbqIGU9_1DJtx7O_zx_JT8C6bymojdNO3iMEt3tYE" />
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
  
  <!-- <?php
    if($this->uri->segment(1)=="motorcycles"){ ?>
       <link rel=“canonical” href="https://www.motogarahe.com/motorcycles/<?php echo $motorcycle[0]["mot_brand"].'/'.$motorcycles[0]["mot_slug"]?>"/>
  <?php  } ?> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/newui-cdn/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/newui-cdn/css/font-awesome.css" />
  <!-- custom css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/stylev2.css">
  <!-- google fonts -->
  <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
   <!-- slick -->
   <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/newui-cdn/js/slick/slick.css">
   <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/newui-cdn/js/slick/slick-theme.css">
   <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.css">
    
  <!-- footer end -->
  <script src="<?php echo base_url() ?>resources/site/newui-cdn/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>resources/site/newui-cdn/js/popper.min.js" ></script>
  <script src="<?php echo base_url() ?>resources/site/newui-cdn/js/bootstrap.min.js" ></script>
  <!-- slick script -->
  <script src="<?php echo base_url() ?>resources/site/newui-cdn/js/slick/slick.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/site/newui-js2/nav.js"></script>
  <script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>

  <script data-ad-client="ca-pub-1069357982113446" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  
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

  <title> </title>
  <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId            : '912333495590130',
                    autoLogAppEvents : true,
                    xfbml            : true,
                    version          : 'v2.11'
                });
            };
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPTLR8F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

      <?php echo $map['js']; ?>
      
<style>
li.list-group-item.moto-result-nav-input-search{
    cursor: pointer;
    padding: 5px 20px!important;
    font-size: 13px!important;
}
li.list-group-item.moto-result-nav-input-search:hover {
}
.activeSuggestion-nav-input-search{
    background-color: #fdcf07;

}
.list-group-item{
    border: unset!important;
}
.suggestions-nav-input-search{
    text-align: left;
    position: absolute;
    transition: all 0.3s ease-in-out;
    /* height: 0; */
    margin-top: 0px;
    width: 80%;
    overflow-x: auto;
}
.suggestions-div-nav-input-search{
    overflow-y: auto;
}
.scrollySuggestion-nav-input-search{
    overflow-y: auto;
    z-index: 99;
    height : 30px;
}
.ex-logo{
    width: 50%;
    float: left;
    height: auto;
    padding-top: 3px;
}
.ex-logo-nav{
    height: auto;
    width: 40%;
    position: absolute;
    right: 20px;
    top: 8px;
}
.icon-mg{
    height: auto;
    width: 90px;
    margin-top: -5px;
}
.ex-a{
  height:50px;
  border-top: 1px 2px gold;
}
.nav-border-gold{
  /* border-top: 1px solid #fdcf07; */
  /* border-bottom: 1px solid #fdcf07; */
}
.fixed-top-right {
  position: fixed;
  top: 0;
  right: 0;
  z-index: 1030;
  width: 100%;
}
.pd-r-0{
  padding-right:0px!important;
}
.pd-l-0{
  padding-left:0px!important;
}
.bg-half{
  
}
.hr-half{
  margin: 0;
  padding: 0;
  border-top: 1px solid rgb(253,207,9);

}
.bt-1-b{
}
div.items {
    padding-right: 0px;
    margin-right: 0px;
}
.bg-green-theme {
    background: rgb(0,204,51);
}
.glow {
          /*    */
          font-size: 18px;
          color: #fff;
          /*text-align: center;*/
          -webkit-animation: glow 1s ease-in-out infinite alternate;
          -moz-animation: glow 1s ease-in-out infinite alternate;
          animation: glow 1s ease-in-out infinite alternate;
        }

        @-webkit-keyframes glow {
          from {
            text-shadow: 0 0 20px #ffc107, 0 0 20px #ffc107, 0 0 30px #ffc107, 0 0 30px #ffc107, 0 0 10px #ffc107, 0 0 10px #ffc107, 0 0 10px #ffc107;
          }
          
          to {
            text-shadow: 0 0 30px #ffc107, 0 0 30px #ffc107, 0 0 30px #ffc107, 0 0 30px #ffc107, 0 0 10px #ffc107, 0 0 10px #ffc107, 0 0 10px #ffc107;
          }
        }
        .glow:hover{
            color: #fff;
            background: none;
        }
@media only screen and (min-width: 1361px){
  .omfmenu{
    width: 220px;
    margin-left:-15px;
  }
}
@media only screen and (max-width: 1366px){
  .btn{
    padding: .375rem .25rem !important;
  }
}
@media only screen and (max-width: 1280px){
  .omfmenu{
    width: 170px;
    margin-left:-15px;
  }
}
@media only screen and (max-width: 1024px){
  .omfmenu{
    width: 120px;
    margin-left:-15px;
  }
}
@media only screen and (max-width: 1055px) and (min-width:990px){
  .nav-link-desktop {
      margin-right: 0px;
      padding: 2px;
  }
}

@media only screen and (max-width: 950px){
.nav-link-desktop {
    margin-right: 5px;
    padding: 5px;
}
.omfmenu{
    width: 80px;
    margin-left:-15px;
  }
}

@media only screen and (max-width: 650px){

.ex-logo{
    width: 15%;
    float: left;
    height: auto;
    padding-top: 3px;
}
}


/* resize small web windows 1*/
@media only screen and (max-width: 650px){

  .suggestions-nav-input-search{
      text-align: left;
      position: absolute;
      transition: all 0.3s ease-in-out;
      /* height: 30vh; */
      margin-top: 0px;
      width: 85%;
      overflow-x: auto;
  }
  .ex-logo{
      width: 20%;
      float: left;
      height: auto;
      padding-top: 3px;
  }
}
@media only screen and (max-width: 500px){
  .ex-logo{
      width: 20%;
      float: left;
      height: auto;
      padding-top: 3px;
  }
}
@media only screen and (max-width:1920px){
  .mobilebanner{
    display: none;
  }
  .mobilebanner img{
    box-shadow: -1px -1px 7px 3px rgba(0,0,0,0.39);
  }
  .desktopbanner{
    display: block;
  }
  .desktopbanner img{
    box-shadow: -1px -1px 7px 3px rgba(0,0,0,0.39);
  }
  
}
@media only screen and (max-width:768px){
  .mobilebanner{
    display: block;
  }
  .desktopbanner{
    display: none;
  }
}
</style>
<!-- nav start -->
<div id="">
<a href="<?php echo base_url()?>allmotorcycles"></a> 
<a href="<?php echo base_url()?>blogs/allblogs"></a> 
<div id="header-nav">
  <nav class="navbar navbar-expand-lg navbar-light nav-color">
    <div class="container mx-auto">
      <div><a href="<?php echo base_url() ?>"> <img class="logo d-md-none d-lg-none d-xl-none" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/moblogo.png"></a></div>
      <div class="row" style="width: 100%">
        <div class="col-md-4 col-2" style="padding-left: 0px;">
          <div class="logo-tag ">
            <a href="<?php echo base_url() ?>"> 
            <img class="logo d-none  d-md-block d-lg-block d-xl-block" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/newlogosize.png">
            </a>
          </div>
          <!-- button nav mobile -->
          <!-- <button class="navbar-toggler text-white" onclick="toogleMenu(event)" type="button" data-menu="#sidebar"> -->
            <button class="navbar-toggler text-white d-md-none d-lg-none d-xl-none " onclick="toogleMenu(event)" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="menu-fa z-1 fa fa-bars"></i>
          </button>
        </div>
        <div class="col-md-8 col-10 pd-mob">
                <div class="main">
                  <!--<form method="post" action="<?php echo base_url()?>motorcycles" id="header_search_section">-->
                  <div class="input-group">
                    <input type="text"  onfocus="inputInNav()"  onfocusout="inputOutNav()" class="form-control nav-input-search" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" placeholder="Search motorcycle" autocomplete="off" id="search_mode_header">
                    
                    <div class="input-group-append">
                      <button class="btn  nav-input-search2" type="submit" name="search_mode" value="search_mode" id="search_mode">
                        <i class="fa fa-search text-dark"></i>
                      </button>
                    </div>
                    </div> 
                    <div class="suggestions-div-nav-input-search">
                        <ul class="suggestions-nav-input-search list-group" style="">
                        </ul> 
                      </div>                 
                    <!--</form>-->
                    <!-- /. form -->
      
              </div>
        </div> 
      </div>  
    </div>  
  </nav>

  <!-- menu items mobile start -->
  <div id="mySidenav" class="sidenav d-lg-none  closeNav">
    <a class="sub-menu" data-sub="mot"><img class="icon-nav "  src="<?php echo base_url() ?>resources/site/newui-assets2/icon/motor.png"><span class="icon-nav-text">MOTORYCLES </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    
    <!--<a class="" href="<?php echo base_url() ?>ebike"><img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/motor.png"><span class="icon-nav-text">E-BIKE </span></a>-->
    <!--<a class="" href="<?php echo base_url() ?>repo"><img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/mgclublogo.png"><span class="icon-nav-text">REPO </span></a>-->
    <a class="" href="<?php echo base_url() ?>mgclub"><img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/mgclublogo.png"><span class="icon-nav-text">MG CLUB </span></a>
    <a class="" href="<?php echo base_url() ?>blogs"><img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/interface.png"><span class="icon-nav-text">MG NEWS & BLOGS</span> </a>
    <a class="" href="<?php echo base_url() ?>aboutus"><img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/aboutus.png"><span class="icon-nav-text">ABOUT US</span> </a>
    <!-- <a class="" href="<?php echo base_url() ?>aboutus"><img class="icon-mg" src="<?php echo base_url() ?>resources/site/tvs-assets/tvslogov2.png"> </a> -->
    <a class="sub-menu" data-sub="mg_ex"><span class="icon-nav-text"><img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/star_black.png">MG EXCLUSIVE </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <!--<a class="btn  nav-link-desktop" href="<?php echo base_url() ?>motorcyclespromo" style="background-color:white !important;" role="button">-->
    <!--                  <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motor.png"><span class="icon-nav-text" >DEALER'S PROMO</span>-->
    <!--                </a>-->
    <a class="sub-menu" data-sub="mot_promo"><img class="icon-nav "  src="<?php echo base_url() ?>resources/site/newui-assets2/icon/motor.png"><span class="icon-nav-text">PROMO </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>            
    <!--<a class="sub-menu glow" href="https://onlinemotofestival.com" target="_blank" data-sub="mg_ex"><span class="icon-nav-text"><img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motor.png">ONLINEMOTOFESTIVAL</span> </a>-->

    <!-- <a class="" href="<?php echo base_url() ?>motopromo"><img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motopromo.png"><span class="icon-nav-text">MOTO PROMO</span> </a> -->
    <!-- <a class="sub-menu" data-sub="acc" ><img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/login.png"><span class="icon-nav-text">MY ACCOUNT</span><i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a> -->
  </div>

  <!-- sub menus  start -->
  <div class="sub-items" id="mot">
    <a class="back-sub icon-nav-text">Back</a>
    <a class="icon-nav-text" href="<?php echo base_url() ?>motorcycles">New Motorcycle &nbsp; &nbsp; &nbsp;  &nbsp;</a>
    <!-- <a class="icon-nav-text" href="#">Repo</a> -->
    <a class="icon-nav-text" href="<?php echo base_url()."compare" ?>">Compare</a>
  </div>
  <!-- mot end -->
  <div class="sub-items" id="mg_ex">
    <a class="back-sub icon-nav-text">Back</a>
    <a class="icon-nav-text" href="<?php echo base_url('tvs') ?>"> <img class="ex-logo" src="<?php echo base_url() ?>resources/site/tvs-assets/exlogo.png"> </a>
  </div>
  <!-- mg ex end -->
  
  <div class="sub-items" id="mot_promo">
    <a class="back-sub icon-nav-text">Back</a>
    <a class="icon-nav-text" href="<?php echo base_url() ?>motorcyclespromogms">ZERO DOWNPAYMENT PROMO</a>
  </div>
  
  <div class="sub-items" id="acc">
    <a class="back-sub icon-nav-text">Back</a>
    <a class="icon-nav-text" href="#">Customer Account</a>
    <a class="icon-nav-text" href="#">Favorites</a>
    <a class="icon-nav-text" href="#">Transaction</a>
    <a class="icon-nav-text" href="#">Change log in detials</a>
    <a class="icon-nav-text" href="#">Log out on all other device</a>
    <a class="icon-nav-text" href="#">Log out </a>
  </div>

  <!-- sub menus end -->

  <!-- menu items mobile end -->

  <!-- desktop nav start -->

  <nav id="main-nav"  class=" navbar-expand-lg  d-none d-md-block d-lg-block d-xl-block">
      <div class="container-fluid">
        <div class="row" style="min-height:40px">
            <?php
            if($this->uri->segment(1)=='ebike'){ 
                echo '<div class="bg-green-theme col-7 col-md-8 col-lg-7 text-right main-nav-left pd-l-0 pd-r-0 ">';
            }else{
                echo '<div class="bg-yellow-theme col-7 col-md-8 col-lg-7 text-right main-nav-left pd-l-0 pd-r-0 ">';
            }
            ?>
            
              <hr class="hr-half">
                <div class="items">
                    <button class="btn nav-dropdown nav-link-desktop" href="#" role="button">
                      <img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motor.png"><span class="icon-nav-text">MOTORCYCLES</span> 
                          <div class="dropdown-menu">
                              <a class="dropdown-item nav-dd" href="<?php echo base_url() ?>motorcycles">New Motorcycle &nbsp; &nbsp; &nbsp;  &nbsp;</a>
                              <a class="dropdown-item nav-dd" href="<?php echo base_url()."compare" ?>">Compare
                              <?php if ( $this->cart->total_items() != 0 ):?>
                                <span class="no_items">
                                <?php echo $this->cart->total_items() ?>
                                </span>
                                <?php endif?>
                              </a>
                          </div>
                    </button>
                    <!--<a class="btn  nav-link-desktop" href="<?php echo base_url() ?>ebike" role="button">-->
                    <!--  <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motor.png"><span class="icon-nav-text">E-BIKE</span> -->
                    <!--</a>-->
                    <!--<a class="btn  nav-link-desktop" href="<?php echo base_url() ?>repo" role="button">-->
                    <!--  <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/mgclublogo.png"><span class="icon-nav-text">Repo</span> -->
                    <!--</a>-->
                    <a class="btn  nav-link-desktop" href="<?php echo base_url() ?>mgclub" role="button">
                      <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/mgclublogo.png"><span class="icon-nav-text">MG CLUB </span> 
                    </a>
                    <a class="btn  nav-link-desktop" href="<?php echo base_url() ?>blogs" role="button">
                      <img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/interface.png"><span class="icon-nav-text">MG NEWS & BLOGS</span> 
                    </a>
                    <a class="btn  nav-link-desktop" href="<?php echo base_url() ?>aboutus" role="button">
                      <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/aboutus.png"><span class="icon-nav-text">ABOUT US</span>
                    </a>
                </div>
              <!-- /. div-items -->
              <hr class="hr-half">
            </div>
            <!-- /. col -->
            <div class="col-5 col-md-4 col-lg-5 pd-l-0 pd-r-0 main-nav-right nav-color">
              <hr class="hr-half bt-1-b">
                    <a class="btn  nav-link-desktop star-nav" href="#" role="button">
                      <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/star_white.png"><span class="icon-nav-text text-white">MG EXCLUSIVE </span> 
                    </a>
                  <!-- <a class="btn  nav-link-desktop star-nav" href="#" role="button">
                    <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/star.png"><span class="btn icon-nav-text text-white">MG EXCLUSIVE</span>
                  </a> -->
                    <a class="btn  nav-link-desktop" href="<?php echo base_url() ?>tvs" role="button" style="width: 20%;">
                      <img class="icon-mg " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/tvsnav.png">
                    <span class="icon-nav-text"></span>
                    </a>
                    <!--<a class="btn  nav-link-desktop" href="<?php echo base_url() ?>motorcyclespromo" style="background-color:white !important;" role="button">-->
                    <!--  <img class="icon-nav " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motor.png"><span class="icon-nav-text">DEALER'S PROMO</span>-->
                    <!--</a>-->
                    
                    <button class="btn nav-dropdown nav-link-desktop" href="#" role="button" style="background-color:white !important;">
                      <img class="icon-nav" src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/motor.png"><span class="icon-nav-text">PROMO</span> 
                          <div class="dropdown-menu">
                              <a class="dropdown-item nav-dd" href="<?php echo base_url() ?>motorcyclespromogms">ZERO DOWNPAYMENT PROMO</a>
                          </div>
                    </button>
                    
                    <!--<a class="btn  nav-link-desktop star-nav" href="https://onlinemotofestival.com" target="_blank" role="button">-->
                    <!-- <span class="icon-nav-text glow">ONLINEMOTOFESTIVAL</span> -->
                    <!--</a>-->
                  <!-- <a class="btn  nav-link-desktop" href="<?php echo base_url() ?>tvs" role="button">
                    <img class="icon-mg " src="<?php echo base_url() ?>resources/site/newui-assets2/icon/edit/kymco.png">
                    <span class="icon-nav-text"></span>
                  </a> -->
            <hr class="hr-half">
                  
            </div>
            <!-- /. col -->
        </div>
        <!-- /. row -->
    </div>    
  </nav>

<!-- desktop nav end -->
</div>

<!-- nav end -->



<script>
$(document).on("keyup","#search_mode_header",function(e){
    model = $("#search_mode_header").val();
    if(e.keyCode===13){
        window.location.href = "<?php echo base_url(); ?>motorcycles?model="+model;
    }
});
          
$(window).scroll(function(){
              let scroll = $(window).scrollTop();
              let maxheight = $(window).height();
              let dataheight = $("#load_data").height();
                if(scroll >= 166){
                  $(".main-nav-left").addClass("fixed-top");
                  $(".main-nav-right").addClass("fixed-top-right");
                  $(".hr-half").css({"margin":"unset","padding":"unset"})
                }else{
                  $(".main-nav-left").removeClass("fixed-top");
                  $(".main-nav-right").removeClass("fixed-top-right");
                  $(".hr-half").css({"margin":"0","padding":"0"})

                }
            });
</script>

<script>

function pickResultNav(slug){
    $(".nav-input-search").val(slug);
    split = slug.split(" ");
    brand = split[0];
    model = split[1];
    window.location.href = "<?php echo base_url(); ?>motorcycles"+"/"+brand+"/"+model;
    
    // setTimeout(function(){$(".nav-input-search2").trigger("click");},800)
}

function hoverInResNav (event){
    console.log(event.target);
    $(".activeSuggestion-nav-input-search").removeClass("activeSuggestion-nav-input-search");
    event.target.classList.add('class', 'activeSuggestion-nav-input-search');
    console.log("in");
}

function hoverOutResNav(event){
    console.log("out");
    event.target.classList.remove('class', 'activeSuggestion-nav-input-search');
    $(".moto-result-nav-input-search:first-child").addClass("activeSuggestion-nav-input-search");
    

}

function firstHoverNav(){
    $(".moto-result-nav-input-search:first-child").addClass("activeSuggestion-nav-input-search");
}
function inputInNav(){
    var searchres = $(".nav-input-search").val().length;
    var countresult  = $(".moto-result-nav-input-search").length;
        if(searchres >= 1){
            $(".suggestions-nav-input-search").show();
            $(".suggestions-nav-input-search").css("z-index","999");
            $(".suggestions-nav-input-search").css("height","30vh");
            // getMobileOperatingSystem("open");
            $(".suggestions-div-nav-input-search").addClass("scrollySuggestion-nav-input-search");
        }
        // if(countresult >= 11){
        // }else{
        //  $(".suggestions-div").removeClass("scrollySuggestion");

        // }
}
function inputOutNav(){
    setTimeout(function(){
        $(".suggestions-nav-input-search").hide();
        $(".suggestions-div-nav-input-search").removeClass("scrollySuggestion-nav-input-search");
        $(".suggestions-nav-input-search").css("z-index","0");
        $(".suggestions-nav-input-search").css("height","0");


        // getMobileOperatingSystem("close");

    },150); 
}

$(document).ready(function(){
$(".nav-input-search").keyup(function(){
            var getVal = $(this).val();
            var valLen = $(this).val().length;
            var searchResult = valLen == 0 ?  null : getVal ;

            try{
                $.ajax({
                type: "POST",
                data:{ search : searchResult },
                url:' <?php echo base_url("motorcycles/search_suggestion_nav"); ?>',
                success:function(res){

                    if(res == ""){
                        inputOutNav();
                    }else{
                        $(".suggestions-nav-input-search").html(res);
                        inputInNav();
                        firstHoverNav();
                    }
                    if( valLen>= 1){
                        inputInNav();
                    
                    }else{
                        inputOutNav();

                    }
                }

            });

            }catch (e){
                console.log("Error");

            }
        });
});
$(document).ready(function (e){
  $("#header_search_section").on('submit',(function(e){
  //e.preventDefault(); 
        slug = document.getElementById("brandmodel").getAttribute("data-value");
        document.getElementById("search_mode").value = slug;
  }));
});

</script>