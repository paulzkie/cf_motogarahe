<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/moto-promo.css">


<div class="body-content">
    <section class="moto-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">MOTO PROMO</h1>
                    <p class="text-center">Don't Miss Out on our Latest Promotions</p>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class=" col-lg-6 col-sm-12 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                   <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/promo1.jpg" class="flex-fill ">
                   <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a>
                </div>
                <div class="col-lg-6 col-sm-12 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/promo2.jpg" class="flex-fill">
                    <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a>
                </div>
                <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/promo3.jpg" class="flex-fill">
                    <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a>
                </div>
                <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/promo4.jpg" class="flex-fill">
                    <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a>
                </div>
                <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/promo2.jpg" class="flex-fill">
                    <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a>
                 </div>
                 <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                     <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/promo1.jpg" class="flex-fill">
                     <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a>
                 </div>
            </div>
        </div>
    </section>

    <section class="slider">
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
    </section>
</div>    
<script>
$('#slideshow .slick').slick({dots:!1,infinite:!0,speed:300,slidesToShow:3,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:2,infinite:!0,speed:300}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:425,settings:{slidesToShow:1,slidesToScroll:1,speed:300}}]})</script>