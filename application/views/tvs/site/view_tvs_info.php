<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/tvs-css/moto-info.css">
<style>
.tvs-logo {
    width: 100%;
    height: auto;
    cursor: pointer;
}
</style>
<div class="body-content">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 back-btn">
                    <a onclick="goBack(event)" href="#!"><p>< Back</p></a>
                </div>
            </div>
            <div class="row d-flex flex-row">
                <div class="col-lg-7">
                
                    <!--Carousel Wrapper-->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                        <?php if ( isset( $motorcycles_pictures ) ):$x=0;?>
                            <?php foreach($motorcycles_pictures as $motorcycles_picture): ?>
                                <?php if ( $motorcycles_picture['mop_image'] == 'none' ):?>
                                    <div class="carousel-item ">
                                        <img class="d-block w-100" src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image"
                                        alt="<?php echo $motorcycles[0]['mot_model']?>">
                                    </div>
                                <?php else:?>
                                    <div class="carousel-item ">
                                        <img class="d-block w-100 " src="<?php echo base_url().$motorcycles_picture['mop_image']?>"
                                        alt="<?php echo $motorcycles[0]['mot_model']?>">
                                    </div>
                                <?php endif;?>
                                <?php endforeach;?>
                                <?php endif;?> 
                            <!-- <div class="carousel-item active">
                                <img class="d-block w-100" src="img/kawasaki-1.png"
                                alt="First slide">
                            </div> -->
                        <!-- <div class="carousel-item">
                            <img class="d-block w-100" src="img/kawasaki-2.png"
                            alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/kawasaki-1.png"
                            alt="Third slide">
                        </div> -->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <?php if ( count( $motorcycles_pictures ) > 1 ):?>

                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                        <?php endif;?>

                        <!--/.Controls-->
                    </div>
                    <!-- <div class="moto-color text-center d-flex justify-content-center">
                            <a href="/"><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/Blue-Color.png"></a>
                            <a href="/"><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/Green-Color.png"></a>
                            <a href="/"><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/Silver-Color.png"></a>
                    </div> -->
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <a href="<?php echo base_url('tvs') ?>"><img src="<?php echo base_url() ?>resources/site/tvs-assets/tvslogov2.png" class="flex-fil tvs-logo "></a>
                        <div class="row">
                                <div class="col-lg-6">
                                    <ol class="carousel-indicators">
                                        <?php if ( isset( $motorcycles_pictures ) ):$x=0;?>
                                            <?php foreach($motorcycles_pictures as $motorcycles_picture): ?>
                                                <?php if ( $motorcycles_picture['mop_image'] == 'none' ):?>
                                                    <li data-target="#carousel-thumb" data-slide-to="<?php echo $x++?>" class=" c-thumb">
                                                    <img src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" width="100">
                                                    </li>
                                                <?php else:?>
                                                    <li data-target="#carousel-thumb" data-slide-to="<?php echo $x++?>" class=" c-thumb">
                                                    <img src="<?php echo base_url().$motorcycles_picture['mop_image']?>" width="100">
                                                    </li>
                                                <?php endif;?>
                                                <?php endforeach;?>
                                            <?php endif;?> 
                                        <!-- <li data-target="#carousel-thumb" data-slide-to="0" class="active c-thumb">
                                        <img src="img/kawasaki-1.png" width="100">
                                        </li>
                                        <li data-target="#carousel-thumb" data-slide-to="1" class="c-thumb">
                                        <img src="img/kawasaki-2.png" width="100">
                                        </li>
                                        <li data-target="#carousel-thumb" data-slide-to="2" class="c-thumb">
                                        <img src="img/kawasaki-1.png" width="100">
                                        </li> -->
                                    </ol>
                                    <!--/.Carousel Wrapper-->
                                </div>
                                <div class="col-lg-6 mb-center">
                                    <span  class="d-block sub"><?php echo $motorcycles[0]['mot_brand']?></span>
                                    <h1 class="title"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h1>
                                    <span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>(No customer reviews yet)</span>
                                    <h3 class="price">₱<?php echo number_format( $motorcycles[0]['mot_srp'], 2) ?></h3>
                                    <span class="d-block notice"><b class="text-danger">*</b> This is an indicative price and may vary based on location.</span>
                                    <!-- <a href="<?php echo base_url('compare') . "/add_new_motorcycle/" . $motorcycles[0]['mot_id']?>" class="d-block offerButton">+ ADD TO COMPARE</a> -->
                                    <form method="POST" id="loadForm">
                                    <!-- 14.627635199999999 -->
                                    <!-- 121.06792959999999 -->
                                    <input type="hidden" id="lat" name="lat" class="lat" value="" >
                                    <input type="hidden" id="long" name="long" class="long" value="" >
                                    <select name="dem_colors" class="d-block cstm-select" required>
                                        <option value="" disabled  selected>SELECT COLOR</option>
                                        <option value="any" >any color</option>
                                        <?php foreach( $color_variants as $color_variant ):?>
                                            <option value="<?php echo $color_variant?>"><?php echo $color_variant?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <button type="submit" href="<?php echo base_url('motorcycles/dealers')?>" id="dealers_mode" value="dealers_mode" name="dealers_mode" class="d-block dealers col-md-12"><i class="fa fa-map-marker"></i> FIND DEALERS</button>

                                    </form>
                                </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col sm-icons">
                    <?php
                        $space= "                                                             "; 
                        $tweetBody = "@MotogaraheO".$space;
                        $shareUrl = base_url("dev_motorcycles/info/". $motorcycles[0]['mot_slug']) 
                    ?>
                    <!-- <a href="#"  onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo $tweetBody; ?>&url=<?php echo $shareUrl ?>')"><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/Twitter-icon.png" width="30" height="30"></a> -->
                    <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url()?>', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )"><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/FB-icon.png" width="20" height="30"></a>
                    
                    <!-- <a href="#" ><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/Pdf-print-icon.png" width="30" height="30"></a> -->
                </div>
            </div>
        </div>
    </section>
    <section class="tab dp">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specs</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#tabs-3" role="tab">Reviews</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="tab-content dp">
        <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="container">
                    <h1 class="title-tab"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h1>
                    <p class="descrip-tab"><?php echo $motorcycles[0]['mot_desc']?></p>
                    <!-- <h3 class="title2">Features</h3>
                    <div class="d-inline-flex flex-row justify-content-start justify-content-between">
                        <div class="img-feature">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/feature1.jpg">
                            <h3 class="title3">Feature 1</h3>
                        </div>
                        <div class="img-feature">
                            <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/feature2.jpg">
                            <h3 class="title3">Feature 2</h3>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
                <div class="container">
                    <div class="row specs">
                        <div class="col-6">
                            <h1 class="title-tab"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h1>
                                <div class="row main-info">
                                    <!-- Specs Infos-->
                                    <div class="col-6">
                                    <p><strong>Model</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo  $motorcycles[0]['mot_model']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Brand</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_brand'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Category</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_type'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Displacement</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_diplacement'] ?>cc</p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Transmission Type</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_transmission'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Engine Type</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo  str_replace('-', ' ', $motorcycles[0]['mot_engine_type']); ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Fuel System</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo str_replace('-', ' ', $motorcycles[0]['mot_fuel_system']); ?></p>
                                    </div>
                                </div>
                                <div class="row main-engine">
                                    <div class="col-12 specs-title">
                                        <p>ENGINE</p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Color Variant</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_color_variant']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Engine Type</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo  str_replace('-', ' ', $motorcycles[0]['mot_engine_type']); ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Bore x Stroke (mm)</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_bore_stroke_mm']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Starting System</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_starting_system']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Ignition Type</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_ignition_type']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Transmission Type</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_transmission_type']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Fuel System</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_fuel_system']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Maximum Horse Power</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_maximum_horse_power']?></p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Maximum Torque</strong></p>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $motorcycles[0]['mot_maximum_torque']?></p>
                                    </div>       
                                </div>
                                    <!-- Specs Infos-->
                        </div>
                        <div class="col-6">
                            <div class="row main-chassis">
                                <!-- Specs Infos-->
                                <div class="col-12 specs-title">
                                    <p>CHASSIS</p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Brake System (Front)</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_brake_system_front']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Brake System (Rear)</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_brake_system_rear']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Wheel Type</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_wheels_type']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Front Tire</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_front_tire']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Rear Tire</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_rear_tire']?></p>
                                </div>
                            </div>
                            <div class="row main-dimension">
                                <div class="col-12 specs-title">
                                    <p>DIMENSION</p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Overall Dimensions (length x width x height)</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_overall_dimensions']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Wet/Curb Weight (with oil & fuel)</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_wet_curb_weight']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Dry Weight (without oil & fuel)</strong></p>
                                </div>
                                <div class="col-6">
                                 <p><?php echo $motorcycles[0]['mot_dry_weight']?></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Wheel Base</strong></p>
                                </div>
                                <div class="col-6">
                                    <p><?php echo $motorcycles[0]['mot_wheelbase']?></p>
                                </div>
                            </div>
                                    <!-- Specs Infos-->    
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-3" role="tabpanel">
                <div class="container">
                    <div class="row reviews">
                        <div class="col-12">
                            <h3 class="title-ratings">Ratings & Reviews of  <?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tab-accordion-mb">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><p>Description</p> <i class="fa fa-plus"></i></button>									
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <h1 class="title-tab"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h1><br />
                                    <?php echo $motorcycles[0]['mot_desc']?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><p>Specs</p> <i class="fa fa-plus"></i></button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row specs">
                                        <div class="col-12">
                                            <h1 class="title-tab"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h1>
                                                <div class="row main-info">
                                                    <!-- Specs Infos-->
                                                    <div class="col-6">
                                                    <p><strong>Model</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_model']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Brand</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_brand'] ?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Category</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_type'] ?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Displacement</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_diplacement'] ?>cc</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Transmission Type</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_transmission'] ?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Engine Type</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo  str_replace('-', ' ', $motorcycles[0]['mot_engine_type']); ?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Fuel System</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo str_replace('-', ' ', $motorcycles[0]['mot_fuel_system']); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row main-engine">
                                                    <div class="col-12 specs-title">
                                                        <p>ENGINE</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Color Variant</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_color_variant']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Engine Type</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo  str_replace('-', ' ', $motorcycles[0]['mot_engine_type']); ?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Bore x Stroke (mm)</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_bore_stroke_mm']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Starting System</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_starting_system']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Ignition Type</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_ignition_type']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Transmission Type</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_transmission_type']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Fuel System</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_fuel_system']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Maximum Horse Power</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_maximum_horse_power']?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><strong>Maximum Torque</strong></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p><?php echo $motorcycles[0]['mot_maximum_torque']?></p>
                                                    </div>       
                                                </div>
                                                    <!-- Specs Infos-->
                                        </div>
                                        <div class="col-12">
                                            <div class="row main-chassis">
                                                <!-- Specs Infos-->
                                                <div class="col-12 specs-title">
                                                    <p>CHASSIS</p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Brake System (Front)</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_brake_system_front']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Brake System (Rear)</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_brake_system_rear']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Wheel Type</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_wheels_type']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Front Tire</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_front_tire']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Rear Tire</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_rear_tire']?></p>
                                                </div>
                                            </div>
                                            <div class="row main-dimension">
                                                <div class="col-12 specs-title">
                                                    <p>DIMENSION</p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Overall Dimensions (length x width x height)</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_overall_dimensions']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Wet/Curb Weight (with oil & fuel)</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_wet_curb_weight']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Dry Weight (without oil & fuel)</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_dry_weight']?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Wheel Base</strong></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php echo $motorcycles[0]['mot_wheelbase']?></p>
                                                </div>
                                            </div>
                                                    <!-- Specs Infos-->    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <!-- <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><p>Reviews</p> <i class="fa fa-plus"></i></button>                      -->
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Ratings & Reviews of <?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
 
    <!-- <section class="slider">
        <div class="container-fluid slider-bg">
            <div class="row">
                <div class="col">
                    <h1 class="title text-center">Featured Brand Promo</h1>
                    <br><br>
                    <div id="slideshow">
                    <div class="slick text-center">
                        <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/sample-promo-1.jpg"><p class="moto-descrip"></p></div>
                        <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/sample-promo-2.jpg"><p class="moto-descrip"></p></div>
                        <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/sample-promo-1.jpg"><p class="moto-descrip"></p></div>
                        <div><img  src="<?php echo base_url() ?>resources/site/newui-assets2/img/sample-promo-2.jpg"><p class="moto-descrip"></p></div>
                    </div>
                    </div>
                    <a href="<?php echo base_url().'motopromo' ?>" class="text-center d-block promoButton">View All Promos</a>
                </div>
            </div>
        </div>
    </section> -->
</div>



<!-- <script>$('#slideshow .slick').slick({dots:!0,infinite:!0,speed:300,slidesToShow:2,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:425,settings:{slidesToShow:1,slidesToScroll:1,speed:300}}]})</script> -->
<!-- <script>$('.moto-slider').slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,asNavFor:'.moto-nav'});$('.moto-nav').slick({slidesToShow:3,slidesToScroll:1,asNavFor:'.moto-slider',dots:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:4,infinite:!0,dots:!0}},{breakpoint:600,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]})</script> -->
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
        // carousel active
        $("#carousel-thumb").find(".carousel-item:first-child").addClass("active");
        // $('#carousel-thumb').carousel({
        //         interval: 2000
        //         });
    });
    function goBack(event){ history.go(-1); event.preventDefault(); }

</script>