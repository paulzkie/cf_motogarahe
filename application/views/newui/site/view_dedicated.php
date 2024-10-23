
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/dedicatedv2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

<style>

@media only screen and (max-width:800px){
  
}
@media only screen and (max-width:360px){
  
}
</style>

<div class="body-content">
     <!-- title page  start-->
     <div class="title-info">
        <div class="container mx-auto text-white text-center title-header row">
              <div class="col-md-6 col-sm-6 col-6 text-right">
                    <img class="ex-logo" src="<?php echo base_url() ?>resources/site/newui-assets2/assets/t.png">
                    <h6 class="text-theme-yellow"><i class="fas fa-globe"></i><span class="ml-2 sub-title">www.tvsmotor.com</span></h6>
                    <!-- <h6 class="text-theme-yellow"><i class="fa fa-globe"></i><span class="ml-2 sub-title">www.tvsmotor.com</span></h6> -->
              </div>
              <!-- left side end-->
              <div class="col-md-6 col-sm-6 col-6 text-left">
                    <h1 class="title-page text-white ex-suzuki">TVS</h1>
                    <h6 class="mg-ex">MG EXCLUSIVE</h6>
                    <h6 class="text-theme-yellow"><i class="fab fa-facebook"></i><span class="ml-2 sub-title">TVS Philippines-ORGINAL </span></h6>
                    <!-- <h6 class="text-theme-yellow"><i class="fab fa-facebook"></i><span class="ml-2 sub-title">TVS Philippines-ORGINAL </span></h6> -->
              </div>
              <!-- right side end -->
        </div>
     </div>
    <!-- title page end -->

    <section class="content">
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-sm-12 col-12 text-left">
            <h3  class="sub-title-page active-sub">Homepage</h3>
            <h3  class="sub-title-page ">All products</h3>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <div class="has-search">
                    <div class="wrap">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input  autocomplete="off" id="model-search" class="form-control search-mot"  autocomplete="off" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" placeholder="Search model" inputmode="search">
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 col-sm-12 d-flex flex-row justify-content-center flex-wrap  u-m-t align-content-center moto-offer">
                   <a href="<?php echo base_url() ?>motorcycles/index/dazz-110-prime/brand/type/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>resources/site/newui-assets2/img/tvs-dazz.png" class="flex-fill "></a>
                </div>
                <div class=" col-lg-6 col-sm-12 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                   <a href="<?php echo base_url() ?>motorcycles/index/all/tvs/underbone/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>uploads/tvs/underbone.jpg" class="flex-fill "></a>
                   <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <div class="col-lg-6 col-sm-12 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                <a href="<?php echo base_url() ?>motorcycles/index/all/tvs/backbone/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>uploads/tvs/backbone.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                <a href="<?php echo base_url() ?>motorcycles/index/all/tvs/scooter/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>uploads/tvs/scooter.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                <a href="<?php echo base_url() ?>motorcycles/index/all/tvs/big-bike/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>uploads/tvs/bigbikes.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <div class="col-md-12 col-sm-12 col-12"> 
                    <h3 class=" btn-title">Promos</h3>
                    <button type="" class=" view-all-btn ">View All<i class="fa fa-chevron-right ml-1"></i></button>
                </div>
                <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <a href="#" class="link-mot"><img src="<?php echo base_url() ?>uploads/tvs/pr1.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                 </div>
                 <div class="col-lg-6 col-sm-12  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                     <a href="#" class="link-mot"><img src="<?php echo base_url() ?>uploads/tvs/pr2.jpg" class="flex-fill"></a>
                     <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                 </div>
            </div>
        </div>
    </section>


</div>