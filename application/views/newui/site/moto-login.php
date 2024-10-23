<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/login.css">


<!-- content start -->
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="head">YOUR MOTOGARAHE CUSTOMER ACCOUNT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-12 divider">
                <h3 class="karla log">Log in with email address</h3>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- Material outline input -->
                        <div class="md-form md-outline">
                            <input type="text" id="form1" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- Material outline input -->
                        <div class="md-form md-outline">
                            <input type="text" id="form1" class="form-control" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row signed">
                    <div class="col-lg-6 col-md-6 col-sm-12" >
                        <input type="checkbox">
                        <label class="karla bold">Keep me signed in</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="#" class="karla forgot">Forgot your password?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="float-xl-right login">Log In</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <h3 class="beb-h3">DON'T HAVE AN ACCOUNT YET?</h3>
                <p class="karla">Sign up now and take advantage of the benefits offered by motogarahe.com</p>
                <button class="signup">Sign up now</button>
            </div>
        </div>
    </div>

    <div class="container-fluid slider-bg">
        <div class="row">
            <div class="col">
                <h1 class="title text-center">Popular Motorcycles</h1>
                <br>
                <div id="slideshow">
                <div class="slick text-center">
                    <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/mio-i125-black.png"><p class="moto-descrip">MOTORCYLE 1</p></div>
                    <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/honda-CLICK150i-black3.png"><p class="moto-descrip">MOTORCYLE 2</p></div>
                    <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/rouser-200ns-wild-red.png"><p class="moto-descrip">MOTORCYLE 3</p></div>
                    <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/mio-i125-black.png"><p class="moto-descrip">MOTORCYLE 4</p></div>
                    <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/honda-CLICK150i-black3.png"><p class="moto-descrip">MOTORCYLE 5</p></div>
                    <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/rouser-200ns-wild-red.png"><p class="moto-descrip">MOTORCYLE 6</p></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content end -->


<script>$('#slideshow .slick').slick({dots:!1,infinite:!0,speed:300,slidesToShow:3,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:2,infinite:!0,speed:300}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:425,settings:{slidesToShow:1,slidesToScroll:1,speed:300}}]})
</script>