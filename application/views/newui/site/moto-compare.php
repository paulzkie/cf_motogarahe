
  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/comparev3.css">
<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/css/jquery.flipsterv2.css">
<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/flipsternavtabs.css">
<script src="<?php echo base_url() ?>resources/site/flipster/js/jquery.flipster.js"></script>
<style>
/* .parallelogram {
	width: 45%;
  height: 55px;
  font-size: 35px;
  transform: skew(5deg, -5deg);
  background: #ee313c;
}
.off-text{
  width: 45%;
  height: 35px;
  font-size: 25px;
  transform: skew(2deg, -1deg);
  background: rgb(253,207,9);
  position: absolute;
  left: 75px;
  top: 45px;
}
.promo-shape{
  background-color: rgb(253,207,9);
  height: 150px;
  z-index: -1;
  width: 100%;
  top: -95px;
  position: absolute;
  clip-path: polygon(0 56%, 100% 30%, 100% 100%, 0% 100%);
}
.holder{
  position: relative;
  width:100%;
  height:auto;
  
} */
/* css shape design of promo */
@media only screen and (min-width:1800px){
    .motorcycles{
        min-height:1240px;
    }
}

.xl-ads1{
  position:absolute;
  height:auto;
  width: 250px;
  right: 20px;
  margin-top:3px;
}
.xl-ads3{
  position:absolute;
  height:auto;
  width: 250px;
  right: 20px;
  margin-top:329px;
}
.xl-ads4{
  position:absolute;
  height:auto;
  width: 250px;
  right: 20px;
  margin-top:643px;
}

section.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 90px;
  font-size: 20px;
  z-index:1;
}

section.sticky-bottom {
  position: -webkit-sticky;
  position: sticky;
  top: -565px;
  font-size: 20px;
  z-index:10;
}

.ads-img{
  width:100%;

}

.ads-img-hor{
    width:60%;
    height:auto;
    margin-bottom:2em;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
   z-index:999;
}

@media only screen and (max-width:700px){
  .ads-img-hor{
    width:100%;
    height:auto;
    margin-bottom:2em;
  }
  [data-type="horizontal"] + .moto-col {
    margin-top:0!important;
  }
  [data-type="horizontal"] + .moto-col + .moto-col{
    margin-top:0!important;
  }
}
@media only screen and (max-width:414px){
  .ads-img{
    padding:0!important;
  }
}

.ads-img{
  width:100%;
  -webkit-box-shadow: -1px -1px 6px 1px rgba(0,0,0,0.39);
  -moz-box-shadow: -1px -1px 6px 1px rgba(0,0,0,0.39);
  box-shadow: -1px -1px 6px 1px rgba(0,0,0,0.39);
  margin-bottom:25px;
}

/* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .ads-footer{
    width:100%; 
    height:60px; 
    margin-bottom:0px;
  }
}

/*
@media only screen and (max-width:1399px){
  .d-xxl-block {
      display: block!important;
  }
}

@media only screen and (max-width:550px){
  .promo-shape{
    background-color: rgb(253,207,9);
    height: 150px;
    z-index: -1;
    width: 100%;
    top: -95px;
    position: absolute;
    clip-path: polygon(0 56%, 100% 30%, 100% 100%, 0% 100%);
  }
} */

/* @media only screen and (max-width: 1800px) and (min-width: 1395px)  {
  .d-xxl-block {
      display: block!important;
  }
} */


/* @media  (max-width: 1374px){
  .d-xxl-block {
      display: none!important;
  }
} */

  </style>

<!-- content start -->
  
<div class="title-info">
      
      <div class="container mx-auto text-white text-center title-header">
          <h1 class="title-page text-white">COMPARE MOTORCYCLES</h1>
          <p class="desc-text text-white">Compare up to three motorcycles.</p>
      </div>
  </div>
  <!-- title page end -->

  <div class="body-content">
    <section id="ads-placement" class="sticky">
        <a href="<?php echo base_url('mgclub') ?>" target="_blank"><img data-type="xl" class="xl-ads1  ads" src="<?php echo base_url() ?>uploads/motoads/kyt.jpg" > </a>
        <a href="https://www.facebook.com/YSS-suspension-Philippines-490464687757308/" target="_blank"><img data-type="xl" class="xl-ads3  ads" src="<?php echo base_url() ?>uploads/motoads/customprint3.jpg" > </a>
        <a href="https://www.facebook.com/KYT-Philippines-486910951369031" target="_blank"><img data-type="xl" class="xl-ads4  ads" src="<?php echo base_url() ?>/uploads/ads/shirtsv4.jpg" > </a>
    </section>
    <div class="container">
      <section id="moto-pic">
          <div class="row">
          <?php if ( empty($this->cart->contents())):?>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
             
            <?php endif;?>

            <?php if ( count($this->cart->contents()) == 1):?>
            
            <?php foreach($this->cart->contents() as $item): ?>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="moto-box">
                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>" data-rowid="<?php echo $item['rowid']?>" class="compare-remove">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/close-3.png">
                        </a>
                        <a class="" href="<?php echo base_url(). 'motorcycles'.'/'.strtolower($item["options"]['data']['mot_brand']).'/'.$item["options"]['data']['mot_slug']; ?> ">
                        <img class="compare-moto-image mt-4" src="<?php echo $item["options"]['pics']['mop_image']; ?>">
                        </a>
                        <div class="mot-title mt-5 text-center">
                            <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                            <a href="#" class="btn btn-outline-secondary btn-fsize change-mot">Change</a>
                            <a href="<?php echo base_url() ?>motorcycles<?php  echo str_replace(" ","-",'/'.strtolower($item["options"]['data']['mot_brand']).'/'.$item["options"]['data']['mot_model']); ?>" class="btn btn-outline-secondary btn-fsize">Select</a>
                            <?php if ( isset($item["options"]['data']['dem_price']) ):?>
                              <h2>  ₱ <?php echo number_format( $item["options"]['data']['dem_price'], 2) ?></h2>
                            
                            <?php elseif ( isset($item["options"]['data']['mot_srp']) && $item["options"]['data']['mot_srp'] >= 1 ):?>    
                              <h2> ₱ <?php echo number_format( $item["options"]['data']['mot_srp'], 2) ?></h2>

                              <?php else:?>
                              <?php endif;?>    
                          </div>
                    </div>
                </div>

              <?php endforeach;?>

            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
          <?php endif;?>

          <?php if ( count($this->cart->contents()) == 2):?>
            
            <?php foreach($this->cart->contents() as $item): ?>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="moto-box ">
                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>" data-rowid="<?php echo $item['rowid']?>" class="compare-remove">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/close-3.png">
                        </a>
                        <a class="" href="<?php echo base_url(). 'motorcycles'.'/'.strtolower($item["options"]['data']['mot_brand']).'/'.$item["options"]['data']['mot_slug']; ?> ">
                        <img class="mt-4 compare-moto-image" src="<?php echo $item["options"]['pics']['mop_image']; ?>">
                        </a>
                        <div class="mot-title mt-5 text-center">
                            <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                            <a href="" class="btn btn-outline-secondary btn-fsize change-mot">Change</a>
                            <a href="<?php echo base_url() ?>motorcycles<?php  echo str_replace(" ","-",'/'.strtolower($item["options"]['data']['mot_brand']).'/'.$item["options"]['data']['mot_model']); ?>" class="btn btn-outline-secondary btn-fsize">Select</a>
                            <?php if ( isset($item["options"]['data']['dem_price']) ):?>
                              <h2>  ₱ <?php echo number_format( $item["options"]['data']['dem_price'], 2) ?></h2>
                            
                            <?php elseif ( isset($item["options"]['data']['mot_srp']) && $item["options"]['data']['mot_srp'] >= 1 ):?>    
                              <h2> ₱ <?php echo number_format( $item["options"]['data']['mot_srp'], 2) ?></h2>

                              <?php else:?>
                              <?php endif;?>    
                          </div>
                    </div>
                </div>

              <?php endforeach;?>

            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
          <?php endif;?>
          
          <?php if ( count($this->cart->contents()) == 3):?>
            <?php foreach($this->cart->contents() as $item): ?>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="moto-box">
                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>" data-rowid="<?php echo $item['rowid']?>" class="compare-remove">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/close-3.png">
                        </a>
                        <a href="<?php echo base_url(). 'motorcycles'.'/'.strtolower($item["options"]['data']['mot_brand']).'/'.$item["options"]['data']['mot_slug']; ?> ">
                        <img class="compare-moto-image mt-4" src="<?php echo $item["options"]['pics']['mop_image']; ?>">
                        </a>
                        <div class="mot-title mt-5 text-center">
                            <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                            <a href="#" class="btn btn-outline-secondary btn-fsize change-mot">Change</a>
                            <a href="<?php echo base_url() ?>motorcycles<?php  echo str_replace(" ","-",'/'.strtolower($item["options"]['data']['mot_brand']).'/'.$item["options"]['data']['mot_model']); ?>" class="btn btn-outline-secondary btn-fsize">Select</a>
                            <?php if ( isset($item["options"]['data']['dem_price']) ):?>
                              <h2>  ₱ <?php echo number_format( $item["options"]['data']['dem_price'], 2) ?></h2>
                            
                            <?php elseif ( isset($item["options"]['data']['mot_srp']) && $item["options"]['data']['mot_srp'] >= 1 ):?>    
                              <h2> ₱ <?php echo number_format( $item["options"]['data']['mot_srp'], 2) ?></h2>

                              <?php else:?>
                              <?php endif;?>    
                          </div>
                    </div>
                </div>

              <?php endforeach;?>
          <?php endif;?>
          </div>
  
      </section>
      <hr class="mt-2 mb-3"/>

      <section class="row flex-row d-flex" id="lg-ads">
          <div data-type="lg" class="col-lg-3 col-md-3 col-sm-6 col-6  text-center ads">
              <a href="https://www.shell.com.ph/bikerenhancedprotection" target="_blank">
                <!--<img class="  ads-img" src=" <?php echo base_url() ?>uploads/ads/Shellads.jpg" alt="shell v-power" width="300">-->
                <img class="  ads-img" src=" <?php echo base_url() ?>uploads/motoads/shellarm.jpg" title="Shell Promo" alt="Get Free Arm Sleeves for every purchase of Shell V Power and Shell Advance" width="300">
              </a>
          </div>
          <!-- /. ads -->
          <div data-type="lg" class="col-lg-3 col-md-3 col-sm-6 col-6 text-center ads">
              <a href="https://www.merrymart.com.ph" target="_blank">
                <img class=" ads-img" src=" <?php echo base_url() ?>uploads/motoads/kyt.jpg" alt="Z250SL" width="300">
              </a>
          </div>
          <!-- /. ads -->
          <div data-type="lg" class="col-lg-3 col-md-3 col-sm-6 col-6 text-center ads">
              <a href="https://www.facebook.com/YSS-suspension-Philippines-490464687757308/" target="_blank">
                <img class="ads-img" src=" <?php echo base_url() ?>uploads/motoads/customprint3.jpg" alt="Z250SL" width="300">
              </a>
          </div>
          <!-- /. ads -->
          <div data-type="lg" class="col-lg-3 col-md-3 col-sm-6 col-6 text-center ads">
              <a href="https://www.facebook.com/KYT-Philippines-486910951369031" target="_blank">
                <img class=" ads-img" src=" <?php echo base_url() ?>/resources/site/newui-assets2/home/mm_ads_v2.jpg" alt="Z250SL" width="300">
              </a>
          </div>
          <!-- /. ads -->

      </section>
      <hr data-type="lg" class="mt-2 mb-3 ads"/>

     
      <section id="moto-details">
         
      <!-- descriton start -->
      <div class="row">
          <div class="col-md-6">
              <div class="yellow-square pull-left"></div> <h3 class=""> Description</h3>
          </div>
          <div class="col-md-6">
              <button class="btn btn-link accord pull-right" data-toggle="collapse" data-target="#desc" aria-expanded="true" aria-controls="collapseOne">
                  <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/showmore.png">
              </button>
          </div>
      </div>
      <div id="accordion">
         
        
            <div id="desc" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="header-cards">
                <div class="header-card text-center" id="headingOne">
                  <h5 class="mb-0">
                      Description
                    
                  </h5>
                </div>
                  <div class="card-body">
                    <div class="row">
                      <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                            <?php echo $item["options"]['data']['mot_desc']; ?>
                          </p>
                      </div>
                    <?php endforeach;?>
                        <!-- <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                              labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                            
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                              labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4">
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                          </p>
                        </div> -->
                    </div>
                  </div>
            </div>
          </div>
        </div>
      <!-- descriton end -->
  
         <hr class="mt-2 mb-3"/>
      <!-- engine start -->
      <div class="row">
          <div class="col-md-6">
              <div class="yellow-square pull-left"></div> <h3 class=""> ENGINE</h3>
          </div>
      <!-- color start -->
  
          <div class="col-md-6">
              <button class="btn btn-link accord pull-right" data-toggle="collapse" data-target="#colorvar" aria-expanded="true" aria-controls="collapseOne">
                  <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/showmore.png">
              </button>
          </div>
      </div>
      <div id="accordion">
          <div id="colorvar" class="collapse  show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="header-cards">
              <div class="header-card text-center" id="headingOne">
                  <h5 class="mb-0">
                      COLOR VARIANT                  
                  </h5>
              </div>
  
                <div class="card-body">
                <div class="row">
                  <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-md-4 col-sm-4 col-4">
                        <p>
                          <?php $colors =  explode (",", $item["options"]['data']['mot_color_variant']); 
                             foreach ($colors as $value){
                              echo $value. ",<br>";
                             }
                          ?>
                        </p>
                    </div>
                  <?php endforeach;?>
                </div>
                </div>
                
            </div>
            </div> 
       </div>
      <!-- color end -->
      
      <!-- egine type start -->
      <div id="accordion">
        
    
        <div id="colorvar" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                    ENGINE TYPE
                
                </h5>
            </div>
              <div class="card-body">
              <div class="row">
                  <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-md-4 col-sm-4 col-4">
                        <p>
                          <?php echo $item["options"]['data']['mot_engine_type']; ?>
                        </p>
                    </div>
                  <?php endforeach;?>
              </div>
              </div>
              
          </div>
          </div> 
      </div>
      <!-- egine type end -->
  
      <!-- displacement start -->
      <div id="accordion">
        
    
        <div id="colorvar" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                    DISPLACEMENT
                
                </h5>
            </div>
              <div class="card-body">
              <div class="row">
                    <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                           <?php echo $item["options"]['data']['mot_diplacement']; ?>cc
                          </p>
                      </div>
                    
                    <?php endforeach;?>
              </div>
              </div>
              
          </div>
          </div> 
      </div>
      <!-- dispalcement end -->
  
      <!-- Transmission start -->
      <div id="accordion">
        
    
        <div id="colorvar" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                    TRANSMISSION TYPE
                
                </h5>
            </div>
              <div class="card-body">
              <div class="row">
                    <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                           <?php echo $item["options"]['data']['mot_transmission']; ?>
                          </p>
                      </div>
                    
                    <?php endforeach;?>
              </div>
              </div>
              
          </div>
          </div> 
      </div>
      <!-- transmission end -->
  
      <!-- max horse power start -->
      <div id="accordion">
        
    
        <div id="colorvar" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                    MAXIMUM HORSE POWER
                
                </h5>
            </div>
              <div class="card-body">
              <div class="row">
                    <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                            <?php echo $item["options"]['data']['mot_maximum_horse_power']; ?>
                            </p>
                        </div>
                    <?php endforeach;?>
              </div>
              </div>
              
          </div>
          </div> 
      </div>
      <!-- max horse power end -->
      <!-- max horse power start -->
      <div id="accordion">
        
        <div id="colorvar" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                    MAXIMUM TORQUE
                
                </h5>
            </div>
              <div class="card-body">
              <div class="row">
                    <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                          <?php echo $item["options"]['data']['mot_maximum_torque']; ?>
                          </p>
                      </div>
                    <?php endforeach;?>
              </div>
              </div>
              
          </div>
          </div> 
      </div>
      <!-- max horse power end -->    
      <!-- engine end -->
  
      <hr class="mt-2 mb-3"/>
      <!-- chasis start -->
      <div class="row">
          <div class="col-md-6">
              <div class="yellow-square pull-left"></div> <h3 class=""> CHASSIS</h3>
          </div>
          <div class="col-md-6">
              <button class="btn btn-link accord pull-right" data-toggle="collapse" data-target="#chassis" aria-expanded="true" aria-controls="collapseOne">
                  <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/hide.png">
              </button>
          </div>
      </div>
      <div id="accordion">
        <!-- brake system front start -->
            <div id="chassis" class="collapse " aria-labelledby="headingOne" data-parent="#chassis">
                <div class="header-cards">
                  <div class="header-card text-center" id="headingOne">
                    <h5 class="mb-0">
                      Brake System (Front)
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                            <?php echo $item["options"]['data']['mot_brake_system_front']; ?>
                            </p>
                        </div>
                      <?php endforeach;?>
                    </div>
                  </div>
              </div>
            </div>
        <!-- brean system front end -->
  
        <div id="chassis" class="collapse " aria-labelledby="headingOne" data-parent="#chassis">
            <div class="header-cards">
              <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                  Brake System (Rear)
                </h5>
              </div>
            <div class="card-body">
              <div class="row">
                 <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                            <?php echo $item["options"]['data']['mot_brake_system_front']; ?>
                            </p>
                        </div>
                  <?php endforeach;?>
              </div>
            </div>
          </div>
        </div>
      <!-- chassis end -->
        <div id="chassis" class="collapse " aria-labelledby="headingOne" data-parent="#chassis">
            <div class="header-cards">
              <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                  Brake System (Rear)
                </h5>
              </div>
            <div class="card-body">
              <div class="row">
                <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                          <?php echo $item["options"]['data']['mot_brake_system_rear']; ?>
                          </p>
                      </div>
                <?php endforeach;?>
              </div>
            </div>
          </div>
        </div>
        <!-- wheel type start -->
        <div id="chassis" class="collapse " aria-labelledby="headingOne" data-parent="#chassis">
            <div class="header-cards">
              <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                  Wheels Type
                </h5>
              </div>
            <div class="card-body">
              <div class="row">
                <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                            <?php echo $item["options"]['data']['mot_wheels_type']; ?>
                          </p>
                      </div>
                <?php endforeach;?>
              </div>
            </div>
          </div>
        </div>
        <!-- wheel type start -->
        <!-- Front Tire start -->
        <div id="chassis" class="collapse " aria-labelledby="headingOne" data-parent="#chassis">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
              <h5 class="mb-0">
                Front Tire
              </h5>
            </div>
          <div class="card-body">
            <div class="row">
              <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                            <?php echo $item["options"]['data']['mot_front_tire']; ?>
                          </p>
                      </div>
                <?php endforeach;?>
                    
                </div>
            </div>
          </div>
        </div>
      <!-- Front Tire end -->
      
      <!-- Rear Tire start -->
      <div id="chassis" class="collapse " aria-labelledby="headingOne" data-parent="#chassis">
        <div class="header-cards">
          <div class="header-card text-center" id="headingOne">
            <h5 class="mb-0">
              Rear Tire
            </h5>
          </div>
        <div class="card-body">
          <div class="row text-center">
               <?php foreach($this->cart->contents() as $item): ?>
                      <div class="col-md-4 col-sm-4 col-4">
                          <p>
                            <?php echo $item["options"]['data']['mot_rear_tire']; ?>
                          </p>
                      </div>
                <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Rear Tire end -->
  
  
        
      <!-- chassis end -->
  
      <hr class="mt-2 mb-3"/>
  
      <!-- dimension start -->
      <div class="row">
        <div class="col-md-6">
            <div class="yellow-square pull-left"></div> <h3 class=""> DIMENSION</h3>
        </div>
        <div class="col-md-6">
            <button class="btn btn-link accord pull-right" data-toggle="collapse" data-target="#deminsion " aria-expanded="true" aria-controls="collapseOne">
                <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/hide.png">
            </button>
        </div>
    </div>
    <div id="accordion">
       
      <!--   Overall Dimensions (lenght x width x height) start -->
          <div id="deminsion" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
              <div class="header-cards">
                <div class="header-card text-center" id="headingOne">
                  <h5 class="mb-0">
                    Overall Dimensions (lenght x width x height)
                  </h5>
                </div>
              <div class="card-body">
                <div class="row">
                  <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              <?php echo $item["options"]['data']['mot_overall_dimensions']; ?>
                            </p>
                        </div>
                  <?php endforeach;?>
                </div>
              </div>
            </div>
          </div>
      <!--   Overall Dimensions (lenght x width x height) end -->
  
      <!-- Wet/Curb Weight (with oil & fuel) start -->
  
          <div id="deminsion" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
              <div class="header-cards">
                <div class="header-card text-center" id="headingOne">
                  <h5 class="mb-0">
                    Wet/Curb Weight (with oil & fuel)
                  </h5>
                </div>
              <div class="card-body">
                <div class="row">
                  <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              <?php echo $item["options"]['data']['mot_wet_curb_weight']; ?>
                            </p>
                        </div>
                  <?php endforeach;?>
                </div>
              </div>
            </div>
          </div>
      <!-- Wet/Curb Weight (with oil & fuel) end -->
      <!-- Dry Weight (without oil & Fuel) start -->
        <div id="deminsion" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
            <div class="header-cards">
              <div class="header-card text-center" id="headingOne">
                <h5 class="mb-0">
                  Dry Weight (without oil & Fuel)
                </h5>
              </div>
            <div class="card-body">
              <div class="row">
                 <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              <?php echo $item["options"]['data']['mot_dry_weight']; ?>
                            </p>
                        </div>
                  <?php endforeach;?>
              </div>
            </div>
          </div>
        </div>
      <!-- Dry Weight (without oil & Fuel) end -->
      <!-- Wheelbase start -->
      <div id="deminsion" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
          <div class="header-cards">
            <div class="header-card text-center" id="headingOne">
              <h5 class="mb-0">
                 Wheelbase
              </h5>
            </div>
          <div class="card-body">
            <div class="row">
                 <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              <?php echo $item["options"]['data']['mot_wheelbase']; ?>
                            </p>
                        </div>
                 <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
    <!-- Wheelbase end -->
    <!-- Fuel Capacity (L) start -->
    <div id="deminsion" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="header-cards">
          <div class="header-card text-center" id="headingOne">
            <h5 class="mb-0">
              Fuel Capacity (L)
            </h5>
          </div>
        <div class="card-body">
          <div class="row">
                 <?php foreach($this->cart->contents() as $item): ?>
                        <div class="col-md-4 col-sm-4 col-4">
                            <p>
                              <?php echo $item["options"]['data']['mot_fuel_capacity']; ?>
                            </p>
                        </div>
                 <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
    <!-- Fuel Capacity (L) end -->
  
  
      <!-- dimension end -->
  
      <hr class="mt-2 mb-3"/>
       
        <!-- /. ads hor -->
  
  
      </div>
  
  
      </section>
  
    </div>
    <section class="slider">
        <div class="container-fluid tab-content">
            <div class="row">
                <div class="col">
                    <h1 class="title text-center mt-5">Featured Motorcycle</h1>
                    <br><br>
                        <div id="Carousel">
                        <ul class="flip-items">
                                    <li id="Carousel-0" title="tvs0" data-flip-category="motor">
                                    <a href="<?php echo base_url() ?>tvs/index/dazz/tvs/type/transmission/diplacement/engine-type"><img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a-b.jpg"></a>
                                    </li>
                              
                                    <li id="Carousel-1" title="tvs1" data-flip-category="motor">
                                        <img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a2.jpg">
                                    </li>
                                    <!-- /. items -->
                                    <li id="Carousel-2" title="tvs2" data-flip-category="motor">
                                        <img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a1.jpg">
                                    </li>
                                    <!-- /. items -->
                                    <li id="Carousel-3" title="tvs3" data-flip-category="motor">
                                        <img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a3.jpg">
                                    </li>
                                    <!-- /. items -->
                                    <li id="Carousel-4" title="tvs4" data-flip-category="motor">
                                        <img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a4.jpg">
                                    </li>
                                    <!-- /. items -->
                                    <li id="Carousel-5" title="tvs5" data-flip-category="motor">
                                        <img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a5.jpg">
                                    </li>
                                    <!-- /. items -->
                                    <li id="Carousel-6" title="tvs6" data-flip-category="motor">
                                        <img src="<?php echo base_url() ?>resources/site/newui-assets2/slider/a6.jpg">
                                    </li>
                                    <!-- /. items -->
                                   
                                </ul>
                                <!-- /.flip items -->
                            </div>
                            <!-- /.flip carousel -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="text-center col-lg-12 col-12">
                    <a href="<?php echo base_url() ?>tvs/index/all/tvs/type/transmission/diplacement/engine-type"   class="m-5 btn bg-black bg-tvs-blue"> View All TVS Motorcycles</a>
                </div>
                </div>
            </div>
            
        </div>
         
    </div>
    <!-- /.slider -->
    </section>
  </div>
  <div class="footer">
    <a href="https://www.moduvi.com.ph/" target="_blank">
      <img class="ads-footer" src=" <?php echo base_url() ?>uploads/motoads/footer.jpeg" >
    </a>
  </div>
  <!-- content end -->

  <script>
  // $('#slide-promo .slick').slick({
  //     lazyLoad: 'ondemand',
  //     slidesToShow: 2,
  //     slidesToScroll: 1,
  //     dots: true,
  //     autoplay: true,
  //     autoplaySpeed: 2000,
  //     responsive: [
	// 					{
	// 					breakpoint: 768,
	// 					settings: {
	// 						slidesToShow: 1,
	// 						slidesToScroll: 1,
	// 						infinite: true,
	// 						speed: 300
	// 					}
	// 					}
	// 				]
  //   });
  </script>
  <script>
    $(document).ready(function(){
        
    $(window).scroll(function () {
      var st = $(window).scrollTop();
      var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
    
      if(scrollBottom > 612){
        $('#ads-placement').removeClass('sticky-bottom');
        $('#ads-placement').addClass('sticky');
      }
      if(scrollBottom < 612){
        $('#ads-placement').removeClass('sticky');
        $('#ads-placement').addClass('sticky-bottom');
      }
    
      //$('#st').replaceWith('<h1 id="st" style="position: fixed; right: 25px; bottom: 25px;">scrollTop: ' + st + '<br>scrollBottom: ' + scrollBottom + '</h1>');
    });
        
      checkLargeAds();
      cars();

      $(".accord").click(function(){
        var dataTarget = $(this).attr("data-target");
        var openAccord = "<?php echo base_url() ?>resources/site/newui-assets2/assets/showmore.png";
        var closeAccord = "<?php echo base_url() ?>resources/site/newui-assets2/assets/hide.png";
        if($(dataTarget).hasClass("show")){
          console.log("closed");
          $(this).find("img").attr("src", closeAccord);
        }else{
          console.log("open");
          $(this).find("img").attr("src", openAccord);
        }
      })
      $(".change-mot").click(function(e){
        e.preventDefault();
        var remove_compare = $(this).closest(".moto-box").find(".compare-remove").attr("href");
        // $(this).closest(".moto-box").find(".compare-remove").trigger("click");
        console.log(remove_compare);
        $.ajax({
                type: "GET",
                // data:{ search : searchResult },
                url:remove_compare,
                success:function(res){
                  setTimeout(() => {
                      window.location= '<?php echo base_url() ?>motorcycles';
                  }, 500);
                }
            });
      });
      $(window).resize(function() {
        checkLargeAds();
        cars();
      });
    });
    
    function cars(){
        $("#Carousel").flipster({
			itemContainer: 			'ul', // Container for the flippin' items.
			itemSelector: 			'li', // Selector for children of itemContainer to flip
			style:							'carousel', // Switch between 'coverflow' or 'carousel' display styles
			start: 							0, // Starting item. Set to 0 to start at the first, 'center' to start in the middle or the index of the item you want to start with.
			
			enableKeyboard: 		true, // Enable left/right arrow navigation
			enableMousewheel: 	false, // Enable scrollwheel navigation (up = left, down = right)
			enableTouch: 				true, // Enable swipe navigation for touch devices
			
			enableNav: 					false, // If true, flipster will insert an unordered list of the slides
			enableNavButtons: 	true, // If true, flipster will insert Previous / Next buttons
			
			onItemSwitch: 			function(){}, // Callback function when items are switches
		});
    }

    function checkLargeAds(){
      if($( window ).width() <= 1600){
        console.log($( window ).width())
        $(".ads[data-type='xl']").hide();
        $(".ads[data-type='lg']").show();
        $(".ads[data-type='horizontal']").show();
      }else{
        console.log($( window ).width())
        $(".ads[data-type='xl']").show();
        $(".ads[data-type='lg']").hide();
        $(".ads[data-type='horizontal']").show();

      }
    }

    
  </script>