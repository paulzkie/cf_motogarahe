<style>
    /*.b-compare.s-shadow{padding-top: 10px}*/
    .b-compare__images-item-price {background-color: transparent !important; color: red !important;}
    .remove_all{    margin-bottom: 30px;}
    .b-compare__block-inside-value {border-bottom: none;}
    .s-lineDownCenter {border-bottom: none !important; padding-bottom: 0px;}
    .s-lineDownCenter:after {display: none !important}
    .m-btn{
        color: #555555 !important;
        padding: 10px 15px !important;
        font-size: 12px !important;
        font-weight: 700 !important;
        margin-top: 20px !important;
        border-radius: 0px !important;
        width: 150px !important;
        border: 1px solid #928d6c !important;

    }
    .m-btn:hover{
        background: #face0b !important;
        border: unset!important;

    }
    .close {
        opacity: .5;
        float: left;
    }

    /* overide css */
    .b-pageHeader__search h3{
        font-size: 17px!important;
        font-weight: 600!important;
       
    }
    .b-pageHeader h1{
        margin-left:15px;
        padding-left: 5px;
    }

    /*.b-features__items:first-child{
        border-left: 3px solid #fff;
        padding-left: 30px;
    }*/

    .pl-65{
        padding-left: 65px;
    }
    .promoimg{
        height: auto;
        width: 100%;
    }
    .b-compare__images{
        position: -webkit-sticky;
        position: sticky;
        top: 94px;
        background: white;
        z-index: 9999;
    }

    .b-pageHeader__search{
        background-color: unset;
    }

   @media only screen and (max-width: 950px){
       /* .b-features__items:first-child{
            border-left: unset;
            padding-left: unset;
        }*/
        .pl-65{
            padding-left: unset;
        }
        .b-pageHeader h1{
                margin-left:0px;
                padding-left: 5px;
                font-size:20px!important;

        }
    }
    @media only screen and (max-width:750px){
            .b-compare__images{
                position: unset;
                top: unset;
                background: unset;
                z-index: 9999;
            }
            .promoimg{
                height: auto;
                width: unset!important;
            }
            

    }
    @media only screen and (max-width:650px){
            .b-pageHeader h1{
                font-size:27px!important;

            }
             .promoimg{
                height: auto;
                width: 70%!important;
            }

    }
    @media only screen and(max-width: 500px){
        
    }
  
</style>

<section class="b-pageHeader">
    <div class="container">
        <h1 class=" zoomInLeft" data-wow-delay="0.3s">Compare Motorcycles</h1>
        <!-- <div class="b-pageHeader__search zoomInRight" data-wow-delay="0.3s">
            <h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
                        </h3>
        </div> -->
    </div>
</section>
<!--b-pageHeader-->

<!-- <div class="b-breadCumbs s-shadow">
    <div class="container zoomInUp" data-wow-delay="0.3s">
        <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="compare.html" class="b-breadCumbs__page m-active">Compare Motorcycles</a>
    </div>
</div> -->
<!--b-breadCumbs-->

<section class="b-compare s-shadow">
    <div class="container">

        <?php if ( empty($this->cart->contents()) ):?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="alert alert-danger">
                      <strong>Add Motorcycle!</strong> No motorcycles to be compared.
                    </div>
                </div>
            </div>

            <!-- <div class="b-compare__images">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                       <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                            <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                <div style="    font-size: 22px;
                                height: 100%;
                                color: #bdc3ca;
                                border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                </div>
                            </a>
                        </div> 
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                        <a href="#" data-toggle="modal" data-target="#promoModal"> 
                         <img class="center-block promoimg" src="<?php echo base_url('uploads/promo/Promoimage262x365.jpg') ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                    <div style="    font-size: 22px;
                                    height: 100%;
                                    color: #bdc3ca;
                                    border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                    </div>
                                </a>
                            </div> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                    <div style="    font-size: 22px;
                                    height: 100%;
                                    color: #bdc3ca;
                                    border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                    </div>
                                </a>
                            </div> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                    <div style="    font-size: 22px;
                                    height: 100%;
                                    color: #bdc3ca;
                                    border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                    </div>
                                </a>
                            </div> 
                        </div>
            </div>
        <?php  else: ?>
        <div class="b-compare__images">

            <!-- <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-danger remove_all pull-right" href="<?php echo base_url('compare/remove_all')?>"><i class="fa fa-trash" aria-hidden="true"></i> Remove All</a>
                </div>
            </div> -->
            <div class="row">
                <!-- <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <h3>Suzuki Smash</h3>
                                <img class="img-responsive center-block" src="<?php echo SITE_IMG_PATH?>270x180/moto3.jpg" alt="lexus" />
                                <div class="b-compare__images-item-price m-right"><div class="b-compare__images-item-price-vs">vs</div>$113,600</div>
                            </div>
                        </div>
                -->
                    <!-- <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                            <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                <div style="    font-size: 22px;
                                height: 100%;
                                color: #bdc3ca;
                                border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                </div>
                            </a>
                        </div> 
                    </div> -->
                    
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                            <a href="#" data-toggle="modal" data-target="#promoModal"> 
                            <img class="center-block promoimg" src="<?php echo base_url('uploads/promo/Promoimage262x365.jpg') ?>" alt="" >
                            </a>
                        </div>
                    </div>
    
                    
                    <?php if (count($this->cart->contents()) == 1) :?>
                        <?php foreach($this->cart->contents() as $item): ?>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                    <div class="close">
                                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>"><i class="fa fa-times" style="color: red;"></i></a>
                                    </div>
                                    <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                                    <img class="img-responsive center-block" src="<?php echo $item["options"]['pics']['mop_image']; ?>" alt="jaguar" />
                                    <div class="b-compare__images-item-price m-right">
                                        <?php if ( isset($item["options"]['data']['dem_price']) ):?>
                                            ₱ <?php echo number_format( $item["options"]['data']['dem_price'], 2) ?>
                                        <?php elseif ( isset($item["options"]['data']['mot_srp']) && $item["options"]['data']['mot_srp'] >= 1 ):?>    

                                            ₱ <?php echo number_format( $item["options"]['data']['mot_srp'], 2) ?>

                                        <?php else:?>
                                            <!-- <a href="#">FIND DEALER</a> -->
                                        <?php endif;?>    
                                    </div>

                                    <a href="<?php echo $item["options"]['info']; ?>" class="btn m-btn">VIEW DETAILS</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                    <div style="    font-size: 22px;
                                    height: 100%;
                                    color: #bdc3ca;
                                    border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                    </div>
                                </a>
                            </div> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                    <div style="    font-size: 22px;
                                    height: 100%;
                                    color: #bdc3ca;
                                    border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                    </div>
                                </a>
                            </div> 
                        </div>
                    

                    <?php elseif (count($this->cart->contents()) == 2) :?>
                        <?php foreach($this->cart->contents() as $item): ?>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                    <div class="close">
                                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>"><i class="fa fa-times" style="color: red;"></i></a>
                                    </div>
                                    <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                                    <img class="img-responsive center-block" src="<?php echo $item["options"]['pics']['mop_image']; ?>" alt="jaguar" />
                                    <div class="b-compare__images-item-price m-right">
                                        <?php if ( isset($item["options"]['data']['dem_price']) ):?>
                                            ₱ <?php echo number_format( $item["options"]['data']['dem_price'], 2) ?>
                                        <?php elseif ( isset($item["options"]['data']['mot_srp']) && $item["options"]['data']['mot_srp'] >= 1 ):?>    

                                            ₱ <?php echo number_format( $item["options"]['data']['mot_srp'], 2) ?>

                                        <?php else:?>
                                            <!-- <a href="#">FIND DEALER</a> -->
                                        <?php endif;?>    
                                    </div>

                                    <a href="<?php echo $item["options"]['info']; ?>" class="btn m-btn">VIEW DETAILS</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                <a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" style="text-decoration: none">
                                    <div style="    font-size: 22px;
                                    height: 100%;
                                    color: #bdc3ca;
                                    border: 1px dashed #bdc3ca;     padding: 90px 0px;">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Motorcycle
                                    </div>
                                </a>
                            </div> 
                        </div>
                    <?php elseif (count($this->cart->contents()) == 3) :?>
                        <?php foreach($this->cart->contents() as $item): ?>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="b-compare__images-item s-lineDownCenter zoomInUp" data-wow-delay="0.3s">
                                    <div class="close">
                                        <a href="<?php echo base_url() . 'compare/remove_item/' . $item['rowid']?>"><i class="fa fa-times" style="color: red;"></i></a>
                                    </div>
                                    <h3><?php echo $item["options"]['data']['mot_model']; ?></h3>
                                    <img class="img-responsive center-block" src="<?php echo $item["options"]['pics']['mop_image']; ?>" alt="jaguar" />
                                    <div class="b-compare__images-item-price m-right">
                                        <?php if ( isset($item["options"]['data']['dem_price']) ):?>
                                            ₱ <?php echo number_format( $item["options"]['data']['dem_price'], 2) ?>
                                        <?php elseif ( isset($item["options"]['data']['mot_srp']) && $item["options"]['data']['mot_srp'] >= 1 ):?>    

                                            ₱ <?php echo number_format( $item["options"]['data']['mot_srp'], 2) ?>

                                        <?php else:?>
                                            <!-- <a href="#">FIND DEALER</a> -->
                                        <?php endif;?>    
                                    </div>

                                    <a href="<?php echo $item["options"]['info']; ?>" class="btn m-btn">VIEW DETAILS</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>

            </div>
        </div>

        <!-- <div class="b-compare__block zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">PROMOTIONS</h3>
                <a class="j-more" href="#"><span class="fa fa-minus"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Promos
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['dem_promo']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div> -->

        <div class="b-compare__block zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">DESCRIPTION</h3>
                <a class="j-more" href="#"><span class="fa fa-minus"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Model
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_model']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Brand
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_brand']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Category
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_type']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Displacement
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_diplacement']; ?>cc
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Transmission Type
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_transmission']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Engine Type
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo str_replace('-', ' ', $item["options"]['data']['mot_engine_type'])?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Fuel System
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo str_replace('-', ' ', $item["options"]['data']['mot_fuel_system'])?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <div class="b-compare__block zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">ENGINE</h3>
                <a class="j-more" href="#"><span class="fa fa-minus"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Color Variant
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_color_variant']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Engine Type
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_engine_type']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Displacement (cc)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_engine_type']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Starting System
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_starting_system']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Ignition Type
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_ignition_type']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Transmission Type
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_transmission_type']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Fuel System
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_fuel_system']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
              <!--   <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Engine Oil Capacity (L)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_engine_oil_capacity']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> -->
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                           Maximum Horse Power
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_maximum_horse_power']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Maximum Torque
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_maximum_torque']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        
        
        <div class="b-compare__block zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">CHASSIS</h3>
                <a class="j-more" href="#"><span class="fa fa-minus"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Brake System (Front])
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_brake_system_rear']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <!-- <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Suspension (Front)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_suspension_front']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Suspension (Rear)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_suspension_rear']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> -->
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Wheels Type
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_wheels_type']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                           Front Tire
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_front_tire']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Rear Tire
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_rear_tire']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </div>
        </div>
        

        <div class="b-compare__block zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">DIMENSION</h3>
                <a class="j-more" href="#"><span class="fa fa-minus"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Overall Dimensions (lenght x width x height)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_overall_dimensions']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Wet/Curb Weight (with oil & fuel)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_wet_curb_weight']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Dry Weight (without oil & Fuel)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_dry_weight']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Wheelbase
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_wheelbase']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <!-- <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                           Seat Height
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_seat_height']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> -->
                <!-- <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Minimum Ground Clearance
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_seat_height']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> -->

                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Fuel Capacity (L)
                        </div>
                    </div>
                    <?php foreach($this->cart->contents() as $item): ?>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $item["options"]['data']['mot_fuel_capacity']; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </div>
        </div>



        <div class="b-compare__links zoomInUp" data-wow-delay="0.3s">
            <div class="row">
                <!-- <div class="col-sm-3 col-xs-12">
                            <a href="<?php echo base_url('motorcycles/details')?>" class="btn m-btn">VIEW DETAILS</a>      
                        </div> -->
                <div class="col-sm-3 col-xs-12"></div>       
                <?php foreach($this->cart->contents() as $item): ?> 
                    <div class="col-sm-3 col-xs-12">
                        <a href="<?php echo $item["options"]['info']; ?>" class="btn m-btn">VIEW DETAILS</a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>

    <?php endif;?>
    </div>
</section>
<!--b-compare-->


<div class="b-features">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-6 col-xs-6">
                <ul class="b-features__items">
                    <li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">SEARCH</li>
                    <li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">COMPARE</li>
                    <li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">PURCHASE</li>
                </ul>
            </div>
        </div>
    </div>
</div><!--b-features-->
<!-- <script src="<?php echo SITE_JS_PATH?>wow.min.js"></script> -->