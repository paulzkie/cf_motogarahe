
  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/compare.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/comparev2.css">


<!-- content start -->
  
<div class="title-info">
      
      <div class="container mx-auto text-white text-center title-header">
          <h1 class="title-page text-white">COMPARE MOTORCYCLES</h1>
          <p class="desc-text text-white">Compare up to three motorcycles.</p>
      </div>
  </div>
  <!-- title page end -->
  

  



  <div class="body-content">
    <div class="container">
      <section id="moto-pic">
          <div class="row">
          <?php if ( empty($this->cart->contents())):?>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="compare-add ">
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
                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>" class="compare-remove">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/close-3.png">
                        </a>
                        <a class="" href="<?php echo base_url(). 'motorcycles/info/' .$item["options"]['data']['mot_slug']; ?> ">
                        <img class="compare-moto-image" src="<?php echo $item["options"]['pics']['mop_image']; ?>">
                        </a>
                        <div class="mot-title text-center">
                            <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                            <a href="#" class="btn btn-outline-secondary btn-fsize change-mot">Change</a>
                            <a href="<?php echo base_url() ?>motorcycles/info/<?php  echo str_replace(" ","-",$item["options"]['data']['mot_model']); ?>" class="btn btn-outline-secondary btn-fsize">Select</a>
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
                    <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-4">
                <div class="moto-box empty text-center">
                    <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="compare-add ">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="">MOTORCYCLE</h3>
                      </a>

                </div>
            </div>
          <?php endif;?>

          <?php if ( count($this->cart->contents()) == 2):?>
            
            <?php foreach($this->cart->contents() as $item): ?>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="moto-box">
                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>" class="compare-remove">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/close-3.png">
                        </a>
                        <a class="" href="<?php echo base_url(). 'motorcycles/info/' .$item["options"]['data']['mot_slug']; ?> ">
                        <img class="compare-moto-image" src="<?php echo $item["options"]['pics']['mop_image']; ?>">
                        </a>
                        <div class="mot-title text-center">
                            <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                            <a href="" class="btn btn-outline-secondary btn-fsize change-mot">Change</a>
                            <a href="<?php echo base_url() ?>motorcycles/info/<?php  echo str_replace(" ","-",$item["options"]['data']['mot_model']); ?>" class="btn btn-outline-secondary btn-fsize">Select</a>
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
                    <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="compare-add ">
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
                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>" class="compare-remove">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/assets/close-3.png">
                        </a>
                        <a href="<?php echo base_url(). 'motorcycles/info/' .$item["options"]['data']['mot_slug']; ?> ">
                        <img class="compare-moto-image" src="<?php echo $item["options"]['pics']['mop_image']; ?>">
                        </a>
                        <div class="mot-title text-center">
                            <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                            <a href="#" class="btn btn-outline-secondary btn-fsize change-mot">Change</a>
                            <a href="<?php echo base_url() ?>motorcycles/info/<?php  echo str_replace(" ","-",$item["options"]['data']['mot_model']); ?>" class="btn btn-outline-secondary btn-fsize">Select</a>
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
      <section id="moto-details">
         
      <hr class="mt-2 mb-3"/>
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
  
  
      </div>
  
  
      </section>
  
    </div>
    <section id="slide-promo" class="">
    <!-- <section id="slide-promo" class="slider-bg"> -->
        <div class="container-fluid  container">
          <div class="row">
            <div class="col text-center">
              <!-- <h1 class="title-slider">PROMOS</h1> -->
              <br>
              <div id="slideshow">
              <div class="slick">
                <!-- actual photo po natin sa website start -->
                <!-- <div><img class="promo-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/promo1.png"></div>
                <div><img class="promo-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/promo2.png"></div>
                <div><img class="promo-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/promo1.png"></div>
                <div><img class="promo-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/promo2.png"></div>
                 -->
                <!-- psd photo  -->
                <!-- <div><img  src="img/mio-i125-black.png"><p class="moto-descrip">MOTORCYLE 4</p></div>
                <div><img  src="img/honda-CLICK150i-black3.png"><p class="moto-descrip">MOTORCYLE 5</p></div>
                <div><img  src="img/rouser-200ns-wild-red.png"><p class="moto-descrip">MOTORCYLE 6</p></div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="text-center btn-div">
          <!-- <button type="button" class="btn btn-outline-secondary btn-promo">View All Promos</button> -->
    
          </div>
        </div>
    </section>
  </div>
  
  <!-- content end -->

  <script>
  $('#slide-promo .slick').slick({
      lazyLoad: 'ondemand',
      slidesToShow: 2,
      slidesToScroll: 1,
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
						{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							infinite: true,
							speed: 300
						}
						}
					]
    });
  </script>
  <script>
    $(document).ready(function(){
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
                      window.location= '<?php echo base_url() ?>motorcycles/index/all/brand/type/transmission/diplacement/engine-type';
                  }, 500);
                }
            });
      });
    });
  </script>