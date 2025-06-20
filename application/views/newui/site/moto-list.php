<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/filtSort.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/moto-list.css">
<script src="<?php echo base_url() ?>resources/site/newui-js2/moto-listv3.js"></script>
<script src="<?php echo base_url() ?>resources/site/newui-js2/classie.js"></script>
<script src="<?php echo base_url() ?>resources/site/newui-js2/modernizr.custom.js"></script>



<style>

#back2Top {
    width: 40px;
    line-height: 40px;
    overflow: hidden;
    z-index: 999;
    display: none;
    cursor: pointer;
    -moz-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
    position: fixed;
    bottom: 70px;
    right: 0;
    background-color: #fdcf07;
    color: #000;
    text-align: center;
    font-size: 30px;
    text-decoration: none;
}
#back2Top:hover {
    background-color: #DDF;
    color: #000;
}
.ads-sticky{
  position: absolute;
  z-index: 99;
  right: 0;
}
.small-ads{
  /* width:200px; */
}

.brand-logo {
  width: 100%;
  max-width: 50px;
}
@media only screen and (max-width:414px) {
    .brand-logo {
        width: 100%;
        max-width: 50px;
        height: 50px;
    }
}
@media only screen and (max-width:  : 600px) {

}
/* Smartphones (portrait and landscape) ----------- */

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .ads-footer{
    width:100%; 
    height:60px; 
    margin-bottom:0px;
  }
}

</style>

 <!-- mobile filter start -->
 <?php
if($this->uri->segment(1)=="motorcyclespromo" || $this->uri->segment(1)=="motorcyclespromogms"
|| $this->uri->segment(1)=="motorcycles_royalenfield"){
}
else{
 ?>
 <div id="mob-filter-left" class="sidenav d-lg-none  left-slide">
    <a class="sub-filter-left-back-last" data-sub="back"><span class="icon-nav-text">back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <a class="sub-filter-right" data-sub="brand"><span class="icon-nav-text">BRAND </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <a class="sub-filter-right" data-sub="categ"><span class="icon-nav-text">CATEGORY </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <a class="sub-filter-right" data-sub="trans"><span class="icon-nav-text">TRANSMISSION </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <a class="sub-filter-right" data-sub="displacement"><span class="icon-nav-text">DISPLACEMENT </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
  </div>
  <div id="mob-filter-right" class="sidenav d-lg-none   right-slide">
    <a class="sub-filter-right-back-last" data-sub="back" ><span class="icon-nav-text">Back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_sort" type="checkbox" class="form-check-input" <?php echo 'name' == $mot_diplacement ? 'checked' : '' ?> value="name"                  id="sort-by-name-mob"  data-cb="sort_by_name"><label class="f" for="sort-by-name-mob">Name</label></li></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_sort" type="checkbox" class="form-check-input" <?php echo 'low-high' == $mot_diplacement ? 'checked' : '' ?>  value="sort-by-low-high" id="sort-by-low-high-mob"  data-cb="sort_by_low_high"><label class="f" for="sort-by-low-high-mob">Price low-high</label></li></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_sort" type="checkbox" class="form-check-input" <?php echo 'high-low' == $mot_diplacement ? 'checked' : '' ?> value="sort-by-high-low"  id="sort-by-high-low-mob"  data-cb="sort_by_high_low" ><label class="f" for="sort-by-high-low-mob">Price high-low</label></li></span></a>
  </div>
  <!-- sub menu filter  -->
  <!-- brand start -->
  <div id="brand" class="sidenav d-lg-none  left-slide">
    <a class="sub-filter-right-back" data-sub="back"><span class="icon-nav-text">back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo ( 'kawasaki' == $mot_brand)? 'checked' : '' ?>    value="kawasaki"   name="mob_mot_brand" data-cb="kawasaki"     id="kawasaki-mob"><label class="f" for="kawasaki-mob">Kawasaki</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo ('yamaha' == $mot_brand) ? 'checked' : '' ?>      value="yamaha"     name="mob_mot_brand" data-cb="yamaha"       id="yamaha-mob"><label class="f" for="yamaha-mob">Yamaha</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo ('honda'==$mot_brand) ? 'checked' : '' ?>         value="honda"      name="mob_mot_brand" data-cb="honda"        id="honda-mob"><label class="f" for="honda-mob">Honda</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo ('suzuki'==$mot_brand) ? 'checked' : '' ?>        value="suzuki"     name="mob_mot_brand" data-cb="suzuki"       id="suzuki-mob"><label class="f" for="suzuki-mob">Suzuki</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'vespa' == $mot_brand ? 'checked' : '' ?>         value="vespa"      name="mob_mot_brand" data-cb="vespa"        id="vespa-mob"><label class="f" for="vespa-mob">Vespa</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'benelli' == $mot_brand ? 'checked' : '' ?>       value="benelli"    name="mob_mot_brand" data-cb="benelli"      id="benelli-mob"><label class="f" for="benelli-mob">Benelli</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'ktm' == $mot_brand ? 'checked' : '' ?>           value="ktm"        name="mob_mot_brand" data-cb="ktm"          id="ktm-mob"><label class="f" for="ktm-mob">Ktm</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'bmw' == $mot_brand ? 'checked' : '' ?>           value="bmw"        name="mob_mot_brand" data-cb="bmw"          id="bmw-mob"><label class="f" for="bmw-mob">Bmw</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'ducati' == $mot_brand ? 'checked' : '' ?>        value="ducati"     name="mob_mot_brand" data-cb="ducati"       id="ducati-mob"><label class="f" for="ducati-mob">Ducati</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'euro-motor' == $mot_brand ? 'checked' : '' ?>    value="euro-motor" name="mob_mot_brand" data-cb="euro_motor"   id="euro-motor-mob"><label class="f" for="euro-motor-mob">Euro-motor</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'keeway' == $mot_brand ? 'checked' : '' ?>        value="keeway"     name="mob_mot_brand" data-cb="keeway"       id="keeway-mob"><label class="f" for="keeway-mob">Keeway</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'sym' == $mot_brand ? 'checked' : '' ?>           value="sym"        name="mob_mot_brand" data-cb="sym"          id="sym-mob"><label class="f" for="sym-mob">Sym</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'kymco' == $mot_brand ? 'checked' : '' ?>         value="kymco"      name="mob_mot_brand" data-cb="kymco"        id="kymco-mob"><label class="f" for="kymco-mob">Kymco</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'moto-morini' == $mot_brand ? 'checked' : '' ?>   value="moto-morini"name="mob_mot_brand" data-cb="moto_morini"  id="moto-morini-mob"><label class="f" for="moto-morini-mob">Moto-Morini</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'motoguzzi' == $mot_brand ? 'checked' : '' ?>     value="motoguzzi"  name="mob_mot_brand" data-cb="motoguzzi"    id="motoguzzi-mob"><label class="f" for="moto-guzzi-mob">Motoguzzi</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'aprilia' == $mot_brand ? 'checked' : '' ?>       value="aprilia"    name="mob_mot_brand" data-cb="aprilia"      id="aprilia-mob"><label class="f" for="aprilia-mob">Aprilia</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'tvs' == $mot_brand ? 'checked' : '' ?>           value="tvs"        name="mob_mot_brand" data-cb="tvs"          id="tvs-mob"><label class="f" for="tvs-mob">TVS</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'bajaj' == $mot_type ? 'checked' : '' ?>          value="bajaj"      name="mob_mot_brand" data-cb="bajaj"        id="bajaj-mob" ><label class="f" for="bajaj-mob">Bajaj</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'royal-enfield' == $mot_type ? 'checked' : '' ?>          value="royal-enfield"      name="mob_mot_brand" data-cb="royal-enfield"        id="royal-enfield-mob" ><label class="f" for="royal-enfield-mob">Royal Enfield</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'husqvarna' == $mot_type ? 'checked' : '' ?>          value="husqvarna"      name="mob_mot_brand" data-cb="husqvarna"        id="husqvarna-mob" ><label class="f" for="husqvarna-mob">Husqvarna</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'bristol' == $mot_type ? 'checked' : '' ?>          value="bristol"      name="mob_mot_brand" data-cb="bristol"        id="bristol-mob" ><label class="f" for="bristol-mob">Bristol</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input  type="checkbox" class="form-check-input" <?php echo 'mv-agusta' == $mot_type ? 'checked' : '' ?>          value="mv-agusta"      name="mob_mot_brand" data-cb="mv-agusta"        id="mv-agusta-mob" ><label class="f" for="mv-agusta-mob">MV Agusta</label></span></a>

  </div>
  <!-- brand end -->
  <!-- category start -->
  <div id="categ" class="sidenav d-lg-none  left-slide">
    <a class="sub-filter-right-back" data-sub="back"><span class="icon-nav-text">back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'big-bike' == $mot_type ? 'checked' : '' ?>          value="big-bike"          id="big-bike-mob"           data-cb="big_bike"><label class="f" for="big-bike-mob">Big-Bike</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'scooter' == $mot_type ? 'checked' : '' ?>           value="scooter"           id="scooter-mob"            data-cb="scooter"><label class="f" for="scooter-mob">Scooter</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'backbone' == $mot_type ? 'checked' : '' ?>          value="backbone"          id="backbone-mob"           data-cb="backbone"><label class="f" for="backbone-mob">Backbone</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'sports' == $mot_type ? 'checked' : '' ?>            value="sports"            id="sports-mob"             data-cb="sports"><label class="f" for="sports-mob">Sports</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'underbone' == $mot_type ? 'checked' : '' ?>         value="underbone"         id="underbone-mob"          data-cb="underbone"><label class="f" for="underbone-mob">Underbone</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'business' == $mot_type ? 'checked' : '' ?>          value="business"          id="business-mob"           data-cb="business"><label class="f" for="business-mob">Business</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'adventure' == $mot_type ? 'checked' : '' ?>         value="adventure"         id="adventure-mob"          data-cb="adventure"><label class="f" for="adventure-mob">Adventure</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'cafe' == $mot_type ? 'checked' : '' ?>              value="cafe"              id="cafe-mob"               data-cb="cafe"><label class="f" for="cafe-mob">CafÃ©</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'cruiser' == $mot_type ? 'checked' : '' ?>           value="cruiser"           id="cruiser-mob"            data-cb="cruiser"><label class="f" for="cruiser-mob">Cruiser</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'naked' == $mot_type ? 'checked' : '' ?>             value="naked"             id="naked-mob"              data-cb="naked"><label class="f" for="naked-mob">Naked</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'off-road' == $mot_type ? 'checked' : '' ?>          value="off-road"          id="off-road-mob"           data-cb="off_road"><label class="f" for="off-road-mob">Off-Road</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'retro' == $mot_type ? 'checked' : '' ?>             value="retro"             id="retro-mob"              data-cb="retro"><label class="f" for="retro-mob">Retro</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'sport-touring' == $mot_type ? 'checked' : '' ?>     value="sport-touring"     id="sport-touring-mob"      data-cb="sport_touring"><label class="f" for="sport-touring-mob">Sport-Touring</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'dual-sport' == $mot_type ? 'checked' : '' ?>        value="dual-sport"        id="dual-sport-mob"         data-cb="dual_sport"><label class="f" for="dual-sport-mob">Dual-Sport</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'supermoto' == $mot_type ? 'checked' : '' ?>         value="supermoto"         id="supermoto-mob"          data-cb="supermoto"><label class="f" for="supermoto-mob">Supermoto</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'scrambler' == $mot_type ? 'checked' : '' ?>         value="scrambler"         id="scrambler-mob"          data-cb="scrambler"><label class="f" for="scrambler-mob">Scrambler</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'touring' == $mot_type ? 'checked' : '' ?>           value="touring"           id="touring-mob"            data-cb="touring"><label class="f" for="touring-mob">Touring</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'adventure-touring' == $mot_type ? 'checked' : '' ?> value="adventure-touring" id="adventure-touring-mob"  data-cb="adventure_touring"><label class="f" for="adventure-touring-mob">Adventure-Touring</label></span></a>
    <!-- <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'bajaj' == $mot_type ? 'checked' : '' ?> value="bajaj" id="bajaj-mob"  data-cb="bajaj"><label class="f" for="bajaj-mob">Bajaj</label></span></a> -->

  </div>
  <!-- category start -->
  <div id="trans" class="sidenav d-lg-none  left-slide">
   <a class="sub-filter-right-back" data-sub="back"><span class="icon-nav-text">back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
   <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_transmission" type="checkbox" class="form-check-input" <?php echo 'automatic' == $mot_transmission ? 'checked' : '' ?>  value="automatic" data-cb="automatic" id="automatic-mob"><label class="f" for="automatic-mob">Automatic</label></li></span></a>
   <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_transmission" type="checkbox" class="form-check-input" <?php echo 'manual' == $mot_transmission ? 'checked' : '' ?>     value="manual"    data-cb="manual"    id="manual-mob"><label class="f" for="manual-mob">Manual</label></li></span></a>
  </div>
  <!-- category end -->
  <!-- displacement start -->
  <div id="displacement" class="sidenav d-lg-none  left-slide">
    <a class="sub-filter-right-back" data-sub="back"><span class="icon-nav-text">back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    <!-- <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '100' == $mot_diplacement ? 'checked' : '' ?> value="100"   data-cb="_100cc"  id="_100cc-mob"><label class="f" for="_100cc-mob">100cc</label></li></a> -->
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '125' == $mot_diplacement ? 'checked' : '' ?> value="125"   data-cb="_125cc"  id="_125cc-mob"><label class="f" for="_125cc-mob">0 -1 25cc</label></li></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '150' == $mot_diplacement ? 'checked' : '' ?> value="150"   data-cb="_150cc"  id="_150cc-mob"><label class="f" for="_150cc-mob">126cc - 150cc</label></li></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '200' == $mot_diplacement ? 'checked' : '' ?> value="200"   data-cb="_200cc"  id="_200cc-mob"><label class="f" for="_200cc-mob">151cc - 200cc</label></li></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '300' == $mot_diplacement ? 'checked' : '' ?> value="300"   data-cb="_300cc"  id="_300cc-mob"><label class="f" for="_300cc-mob">201cc - 300cc</label></li></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '400' == $mot_diplacement ? 'checked' : '' ?> value="400"   data-cb="_400cc"  id="_400cc-mob"><label class="f" for="_400cc-mob">301cc - 400cc</label></li></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '500' == $mot_diplacement ? 'checked' : '' ?> value="500"   data-cb="_500cc" id="_500cc-mob"><label class="f" for="_500cc-mob">401cc up</label></li></a>
  </div>
<?php } ?>
  <!-- displacement end -->

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
/*test*/
@media only screen and (max-width:1920px){
    .xl-ads1{
      position:absolute;
      height:auto;
      width: 150px;
      right: 20px;
      margin-top: -60px;
    }
    .xl-ads3{
      position:absolute;
      height:auto;
      width: 150px;
      right: 20px;
      margin-top:115px;
    }
    .xl-ads4{
      position:absolute;
      height:auto;
      width: 150px;
      right: 20px;
      margin-top:285px;
    }
}
@media only screen and (min-width:1800px){
    .motorcycles{
        min-height:1240px;
    }
}
@media only screen and (max-width:1440px){
    .xl-ads1{
      position:absolute;
      height:auto;
      width: 150px;
      right: 20px;
      margin-top: -60px;
    }
    .xl-ads3{
      position:absolute;
      height:auto;
      width: 150px;
      right: 20px;
      margin-top:115px;
    }
    .xl-ads4{
      position:absolute;
      height:auto;
      width: 150px;
      right: 20px;
      margin-top:285px;
    }
}
@media only screen and (min-width:1600px){
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
  -webkit-box-shadow: -1px -1px 6px 1px rgba(0,0,0,0.39);
  -moz-box-shadow: -1px -1px 6px 1px rgba(0,0,0,0.39);
  box-shadow: -1px -1px 6px 1px rgba(0,0,0,0.39);
  margin-top:5px;
}

.ads-img-hor{
    width:60%;
    height:auto;
    margin-bottom:2em;
}

/* .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
   z-index:999;
} */

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
  #ads-placement{
    display: none;
  }
}
@media only screen and (max-width:414px){
  .ads-img{
    padding:0!important;
  }
  #ads-placement{
    display: none;
  }
  #mobilebanner{
    display: block;
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

  <!-- mobile filter end -->
<div class="body-content">
   <section id="ads-placement" class="sticky">
    <a href="#"><img data-type="xl" class="xl-ads1  ads" src="<?php echo base_url() ?>uploads/motoads/motul1.jpg" > </a>
    <a href="#"><img data-type="xl" class="xl-ads3  ads" src="<?php echo base_url() ?>uploads/motoads/customprint1.jpg" > </a>
    <a href="#"><img data-type="xl" class="xl-ads4  ads" src="<?php echo base_url() ?>/uploads/ads/shirtsv4.jpg" > </a>
   </section>
   <section class="search-filter-nav">
     <div class="container">
            <div class="row">
                <div class="col-12">
                     <?php
                        if($this->uri->segment(1)=="motorcyclespromo" || $this->uri->segment(1)=="rheanmotorcyclespromo"){
                        }
                        else{
                            if($this->uri->segment(1)=="ebike"){
                                echo '<h1 class="">NEW EBIKES</h1>';
                            }else{
                                echo '<h1 class="">NEW MOTORCYCLES</h1>';
                            }
                        }
                     ?>            
                </div>
            </div>
            <!-- filter start -->
            <div class="row filter border-search dp">
                <?php
                    if($this->uri->segment(1)=="motorcyclespromo"){
                    //   echo '<div class="col-md-12 desktopbanner" id="desktopbanner" align="center">
                    //   <img src="'.base_url().'resources/site/newui-assets2/landingimg/banner/yamahapromo.jpeg" style="width: 60%;">
                    //     </div>';
                   }else if($this->uri->segment(1)=="motorcyclespromogms"){
                      echo '<div class="col-md-12 desktopbanner" id="desktopbanner" align="center">
                       <img src="'.base_url().'resources/site/newui-assets2/poster/gmsmechanics3.jpg" style="width: 60%;">
                        </div>';
                   }
                   else if($this->uri->segment(1)=="rheanmotorcyclespromo"){
                       echo '<div class="col-md-12 desktopbanner" id="desktopbanner" align="center">
                        <img src="'.base_url().'resources/site/newui-assets2/poster/rheankawasaki.jpeg" style="width: 60%;">
                         </div>';
                   }else if($this->uri->segment(1)=="motorcycles_royalenfield"){

                   }
                    else{
                ?>   
            <nav class="navbar navbar-expand-lg navbar-light col-lg-12">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse col-lg-12" id="navbarNavDropdown">
                    <ul class="navbar-nav col-lg-12">
                      <li class="has-search ">
                        <div class="wrap">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input  autocomplete="off" id="model-search" class="form-control search-mot"  autocomplete="off" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" placeholder="Search model" inputmode="search">
                        <!-- onfocus="inputIn()"  onfocusout="inputOut()" -->
                        <!-- <div class="suggestions-div">
                          <ul class="suggestions list-group" style="">
                          </ul> 
                        </div> -->
                        </div>
                       
                        
                      </li>
                      
                     <li class="nav-item dropdown" >
                        <div class="wrap ">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          Brand
                        </button>
                        <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuMenu">
                          <ul class="">
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo ( 'kawasaki' == $mot_brand)? 'checked' : '' ?> value="kawasaki" id="kawasaki"><label class="f" for="kawasaki">Kawasaki</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo ('yamaha' == $mot_brand) ? 'checked' : '' ?> value="yamaha" id="yamaha"><label class="f" for="yamaha">Yamaha</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo ('honda'==$mot_brand) ? 'checked' : '' ?> value="honda" id="honda"><label class="f" for="honda">Honda</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo ('suzuki'==$mot_brand) ? 'checked' : '' ?> value="suzuki" id="suzuki"><label class="f" for="suzuki">Suzuki</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'vespa' == $mot_brand ? 'checked' : '' ?> value="vespa" id="vespa"><label class="f" for="vespa">Vespa</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'benelli' == $mot_brand ? 'checked' : '' ?> value="benelli" id="benelli"><label class="f" for="benelli">Benelli</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'ktm' == $mot_brand ? 'checked' : '' ?> value="ktm" id="ktm"><label class="f" for="ktm">Ktm</label></li>
                            <!--<li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'bmw' == $mot_brand ? 'checked' : '' ?> value="bmw" id="bmw"><label class="f" for="bmw">Bmw</label></li>-->
                            <!--<li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'ducati' == $mot_brand ? 'checked' : '' ?> value="ducati" id="ducati"><label class="f" for="ducati">Ducati</label></li>-->
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'euro-motor' == $mot_brand ? 'checked' : '' ?> value="euro-motor" id="euro_motor"><label class="f" for="euro_motor">Euro-motor</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'keeway' == $mot_brand ? 'checked' : '' ?> value="keeway" id="keeway"><label class="f" for="keeway">Keeway</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'sym' == $mot_brand ? 'checked' : '' ?> value="sym"  id="sym"><label class="f" for="sym">Sym</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'kymco' == $mot_brand ? 'checked' : '' ?> value="kymco" id="kymco"><label class="f" for="kymco">Kymco</label></li>
                            <!--<li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'moto-morini' == $mot_brand ? 'checked' : '' ?>  value="moto-morini" id="moto_morini"><label class="f" for="moto_morini">Moto-Morini</label></li>-->
                            <!--<li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'motoguzzi' == $mot_brand ? 'checked' : '' ?>  value="motoguzzi" id="motoguzzi"><label class="f" for="motoguzzi">Motoguzzi</label></li>-->
                            <!--<li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'aprilia' == $mot_brand ? 'checked' : '' ?> value="aprilia" id="aprilia"><label class="f" for="aprilia">Aprilia</label></li>-->
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'tvs' == $mot_brand ? 'checked' : '' ?>  value="tvs" id="tvs"><label class="f" for="tvs">TVS</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'bajaj' == $mot_brand ? 'checked' : '' ?>  value="bajaj" id="bajaj"><label class="f" for="bajaj">Bajaj</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'royal-enfield' == $mot_brand ? 'checked' : '' ?>  value="royal-enfield" id="royal-enfield"><label class="f" for="royal-enfield">Royal-Enfield</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'husqvarna' == $mot_brand ? 'checked' : '' ?>  value="husqvarna" id="husqvarna"><label class="f" for="husqvarna">Husqvarna</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'bristol' == $mot_brand ? 'checked' : '' ?>  value="bristol" id="bristol"><label class="f" for="bristol">Bristol</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'mv-agusta' == $mot_brand ? 'checked' : '' ?>  value="mv-agusta" id="mv-agusta"><label class="f" for="mv-agusta">MV Agusta</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'cfmoto' == $mot_brand ? 'checked' : '' ?>  value="cfmoto" id="cfmoto"><label class="f" for="cfmoto">CFMOTO</label></li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item dropdown"  >
                        <div class="wrap">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          Category
                        </button>
                        <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuMenu">
                              <ul class="">
                                <!--<li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'big-bike' == $mot_type ? 'checked' : '' ?> value="big-bike" id="big_bike"><label class="f" for="big_bike">Big-bike</label></li>-->
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'scooter' == $mot_type ? 'checked' : '' ?> value="scooter" id="scooter"><label class="f" for="scooter">scooter</label></li>
                                <!--<li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'backbone' == $mot_type ? 'checked' : '' ?> value="backbone" id="backbone"><label class="f" for="backbone">Backbone</label></li>-->
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'sports' == $mot_type ? 'checked' : '' ?> value="sports" id="sports"><label class="f" for="sports">Sports</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'underbone' == $mot_type ? 'checked' : '' ?> value="underbone" id="underbone"><label class="f" for="underbone">Underbone</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'business' == $mot_type ? 'checked' : '' ?> value="business" id="business"><label class="f" for="business">Business</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'adventure' == $mot_type ? 'checked' : '' ?> value="adventure" id="adventure"><label class="f" for="adventure">Adventure</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'cafe' == $mot_type ? 'checked' : '' ?> value="cafe" id="cafe"><label class="f" for="cafe">CafÃ©</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'cruiser' == $mot_type ? 'checked' : '' ?> value="cruiser" id="cruiser"><label class="f" for="cruiser">Cruiser</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'naked' == $mot_type ? 'checked' : '' ?> value="naked" id="naked"><label class="f" for="naked">Naked</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'off-road' == $mot_type ? 'checked' : '' ?> value="off-road" id="off_road"><label class="f" for="off_road">Off-Road</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'retro' == $mot_type ? 'checked' : '' ?> value="retro" id="retro"><label class="f" for="retro">Retro</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'sport-touring' == $mot_type ? 'checked' : '' ?> value="sport-touring" id="sport_touring"><label class="f" for="sport_touring">sport-touring</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'dual-sport' == $mot_type ? 'checked' : '' ?> value="dual-sport" id="dual_sport"><label class="f" for="dual_sport">dual-sport</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'supermoto' == $mot_type ? 'checked' : '' ?> value="supermoto" id="supermoto"><label class="f" for="supermoto">Supermoto</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'scrambler' == $mot_type ? 'checked' : '' ?> value="scrambler" id="scrambler"><label class="f" for="scrambler">Scrambler</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'touring' == $mot_type ? 'checked' : '' ?> value="touring" id="touring"><label class="f" for="touring">Touring</label></li>
                                <li><input name="mot_type"type="checkbox" class="form-check-input" <?php echo 'adventure-touring' == $mot_type ? 'checked' : '' ?> value="adventure-touring" id="adventure_touring"><label class="f" for="adventure_touring">Adventure-Touring</label></li>
                                <!-- <li><input name="mot_type"type="checkbox" class="form-check-input" <?php echo 'bajaj' == $mot_type ? 'checked' : '' ?> value="bajaj" id="bajaj"><label class="f" for="bajaj">Bajaj</label></li> -->
                              </ul>
                        </div>
                      </div>
                      </li>
                      <li class="nav-item dropdown"  class="col-md-3">
                        <div class="wrap">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Transmission
                          </button>
                          <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuMenu">
                            <ul class="">
                              <li><input name="mot_transmission" type="checkbox" class="form-check-input" <?php echo 'automatic' == $mot_transmission ? 'checked' : '' ?>  value="automatic" id="automatic"><label class="f" for="automatic">Automatic</label></li>
                              <li><input name="mot_transmission" type="checkbox" class="form-check-input" <?php echo 'manual' == $mot_transmission ? 'checked' : '' ?> value="manual" id="manual"><label class="f" for="manual">Manual</label></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <div class="wrap">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Displacement
                          </button>
                          <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuMenu">
                              <ul class="">
                                <!-- <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '100' == $mot_diplacement ? 'checked' : '' ?> value="100" id="_100cc"><label class="f" for="_100cc">100cc</label></li> -->
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '100' == $mot_diplacement ? 'checked' : '' ?> value="100" id="_100cc"><label class="f" for="_100cc">0 - 100cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '200' == $mot_diplacement ? 'checked' : '' ?> value="200" id="_200cc"><label class="f" for="_200cc">101cc - 200cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '300' == $mot_diplacement ? 'checked' : '' ?> value="300" id="_300cc"><label class="f" for="_300cc">201cc - 400cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '500' == $mot_diplacement ? 'checked' : '' ?> value="500" id="_500cc"><label class="f" for="_500cc">401cc - 600cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '700' == $mot_diplacement ? 'checked' : '' ?> value="700" id="_700cc"><label class="f" for="_700cc">601cc - 1000cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '1000' == $mot_diplacement ? 'checked' : '' ?> value="1000" id="_1000cc"><label class="f" for="_1000cc">1001cc up</label></li>
                              </ul>
                          </div>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <div class="wrap">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          Sort by
                        </button>
                        <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuMenu">
                            <ul class="">
                              <li><input name="sort" type="checkbox" class="form-check-input" <?php echo 'name' == $mot_diplacement ? 'checked' : '' ?> value="sort-by-name" id="sort_by_name"><label class="f" for="sort_by_name">Name</label></li>
                              <li><input name="sort" type="checkbox" class="form-check-input" <?php echo 'low-high' == $mot_diplacement ? 'checked' : '' ?>  value="sort-by-low-high" id="sort_by_low_high"><label class="f" for="sort_by_high_low">Price low-high</label></li>
                              <li><input name="sort" type="checkbox" class="form-check-input" <?php echo 'high-low' == $mot_diplacement ? 'checked' : '' ?> value="sort-by-high-low" id="sort_by_high_low" ><label class="f" for="sort_by_high_low">Price high-low</label></li>
                            </ul>
                        </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </nav>
                <?php } ?>
              
            </div>
           
    
            <!-- end of filter -->

            
      </div>
      <!-- mobile filter start-->
          <?php
             if($this->uri->segment(1)=="motorcyclespromo"){ 
            //   echo '<div class="col-md-12 mobilebanner" id="mobilebanner" align="center">
            //  <img src="'.base_url().'resources/site/newui-assets2/landingimg/banner/yamahapromo.jpeg" style="width: 100%;">
            //   </div>';
             }else if($this->uri->segment(1)=="motorcyclespromogms"){
              echo '<div class="col-md-12 mobilebanner" id="mobilebanner" align="center">
             <img src="'.base_url().'resources/site/newui-assets2/poster/gmsmechanics.jpeg" style="width: 100%;">
              </div>';
             }
             else if($this->uri->segment(1)=="rheanmotorcyclespromo"){
             //  echo '<div class="col-md-12 mobilebanner" id="mobilebanner" align="center">
             // <img src="'.base_url().'resources/site/newui-assets2/poster/gmsmechanics.jpeg" style="width: 100%;">
             //  </div>';
             }
              else{
          ?> 
         <div class="d-lg-none d-md-none">
            <div class="col-md-12 form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input id="mobile" class="form-control"  autocomplete="off" type="text" name="mot_model_mobile" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" placeholder="Search model" inputmode="search">
            </div>
            <div class="suggestions-div">
              <ul class="suggestions list-group" style="">
              </ul> 
            </div>
            <div class="row ">
              <div class="col-md-6 col-6">
                <button id="showLeft" class="filt-sort">FILTER BY <i class="fa fa-chevron-down"></i></button>
              </div>
              <div class="col-md-6 col-6 text-center">
                <button id="showRight" class="filt-sort">SORT BY <i class="fa fa-chevron-down"></i></button>
              </div>
            </div>
            
         </div>
       <?php } ?>
      <!-- mobile filter end-->
   </section>
  <section id="section-check" class="container">
  
    <span class="" id="brand-result">
    <?php   if($mot_brand == 'brand'){ echo '<button type="button" onClick="display_remove_btn('.str_replace("-", "_", $mot_brand).')" class="btn res-btn m-2" data-value="'.$mot_brand.'">'. $mot_brand .'   <span >X</span></button>'; } ?>
    </span>   
    <span class="" id="type-result">
    <?php   if($mot_type != 'type' ){ echo '<button type="button"  onClick="display_remove_btn('.str_replace("-", "_", $mot_type).')" class="btn res-btn m-2" data-value="'.$mot_type.'">'. $mot_type .'   <span >X</span></button>'; } ?>
    </span>      
    <span class="" id="transmission-result">
    <?php   if($mot_transmission != 'transmission' ){ echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn('.$mot_transmission.')"  data-value="'.$mot_transmission.'">'. $mot_transmission .'   <span >X</span></button>'; } ?>
    </span>
    <span class="" id="displacement-result">
    <?php   if($mot_diplacement != 'diplacement' ){

          if($mot_diplacement == '100'){
           echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn(_'.$mot_diplacement.'cc)"  data-value="'.$mot_diplacement.'cc">0 - '. $mot_diplacement .'cc   <span >X</span></button>'; 
          }
          if($mot_diplacement == '200'){
            echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn(_'.$mot_diplacement.'cc)"  data-value="'.$mot_diplacement.'cc">101cc - '. $mot_diplacement .'cc   <span >X</span></button>'; 
          }
          if($mot_diplacement == '300'){
            echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn(_'.$mot_diplacement.'cc)"  data-value="'.$mot_diplacement.'cc">201cc - 400cc   <span >X</span></button>'; 
          }
          if($mot_diplacement == '500'){
            echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn(_'.$mot_diplacement.'cc)"  data-value="'.$mot_diplacement.'cc">401cc - 600cc   <span >X</span></button>'; 
          }
          if($mot_diplacement == '700'){
            echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn(_'.$mot_diplacement.'cc)"  data-value="'.$mot_diplacement.'cc">601cc - 1000cc   <span >X</span></button>'; 
          }
          if($mot_diplacement == '1000'){
            echo '<button type="button" class="btn res-btn m-2" onClick="display_remove_btn(_'.$mot_diplacement.'cc)"  data-value="'.$mot_diplacement.'cc"> 1001cc up   <span >X</span></button>'; 
          }
       } 
    ?>
    </span>  
    <span class="" id="sort-result">
    </span>     
    <!-- <span class="" id="clear-filter">
      <?php if($mot_brand != 'brand' || $mot_type != 'type' || $mot_diplacement != 'diplacement' || $mot_transmission != 'transmission'){ echo '<button class="btn">Clear</button>'; } ?>
    </span> -->
  </section>

  <section class=section-ads>
       <!-- <img class="ads-sticky small-ads" src="<?php echo base_url('uploads/promo/test4.png') ?>"> -->
  </section>
  <!-- ads -->
  <section class="motorcycles">
      <div class="container">
        <div class="row text-center d-flex flex-wrap justify-content-center moto-row" id="load_data">
        </div>
        <div id="load_data_message" class="row text-center d-flex flex-wrap justify-content-center"></div>

      </div>
      
  </section>

 <section class="slider">
      <div class="container-fluid slider-bg">
          <div class="row">
              <div class="col d-none">
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
                   <a href="" class="text-center d-block promoButton">View All Promos</a>
              </div>
          </div>
      </div>
  </section>            

  <!-- <div class="footer">
    <a href="https://www.moduvi.com.ph/" target="_blank">
      <img class="ads-footer" src="<?php echo base_url() ?>uploads/motoads/footer.jpeg" >
    </a>
  </div> -->

</div>

<a id="back2Top" title="Back to top" href="#">&#10148;</a>

<script>$('#slideshow .slick').slick({dots:!0,infinite:!0,speed:300,slidesToShow:2,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:425,settings:{slidesToShow:1,slidesToScroll:1,speed:300}}]})</script>

<!--  -->

<script>
    var ads = false; // ads condition
    let limit_scroll = 1000; // scroll limit
    let cur_url = window.location.pathname; // current url
    let limit = 9;// limiter of database
    let offset = 0;// offset of database
    var action = 'inactive'; // scroll detect  active and inactive

    // preapre search keyword
    // var searchval = '<?php echo $this->uri->segment("3"); ?>';
    var searchval = 'all';
    var searchCheck = searchval.replace(/-/g," ");
    var mot_keyword = (searchCheck != 'all') ? searchCheck: null ;

    // prepare brand
    //var searchBrand = '<?php echo $this->uri->segment("4"); ?>'
    var searchBrand = '';
    var brandval = (searchBrand.toLowerCase() != '') ? searchBrand : 'brand' ;

    // prepare scooter
    //var searchType = '<?php echo $this->uri->segment("5"); ?>'
    var searchType = 'type'
    var mot_type = (searchType.toLowerCase() != 'type') ? searchType : 'type' ;

    // prepare trans
    //var searchTrans = '<?php echo $this->uri->segment("6"); ?>';
    var searchTrans = 'transmission';
    var mot_trans = (searchTrans.toLowerCase() != 'transmission') ? searchTrans : 'transmission' ;

    // prepare displacement
    //var searchDisplacement = '<?php echo $this->uri->segment("7"); ?>';
    var searchDisplacement = 'diplacement';
    var mot_dis = (searchDisplacement.toLowerCase() != 'diplacement') ? searchDisplacement : 'diplacement' ;
    
    
    let slug = mot_keyword;
    let brand = ( brandval !='brand') ? [brandval] : [];
    let type =  ( mot_type !='type') ? [mot_type] : [];
    let transmission = ( mot_trans !='transmission') ? [mot_trans] : [];
    let displacement = ( mot_dis !='diplacement') ? [mot_dis] : [];
    let engine = [];
    let sort = [];
    
    // typing variable
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 second for example
    var key_search = $("#model-search");

    var typingTimer2;                //timer identifier
    var doneTypingInterval2 = 1000;  //time in ms, 5 second for example
    var key_search2 = $("input[name='mot_model_mobile']");
    urlslug = "<?php if(empty($_GET['model'])){}else{ echo $_GET['model'];}?>";
    //  desktop input search model start =========

    //on keyup, start the countdown

    key_search.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    key_search.on('keydown', function () {
      clearTimeout(typingTimer);
    });
    

    //user is "finished typing,"
    function doneTyping () {
      let val = key_search.val();
      slug = val;
      if(val == ''){
        slug = "all";
        window.location.href='<?php echo base_url()?>motorcycles';
      }
      $(".nav-input-search").val(val); // nav mot model
      key_search2.val(val);// mobile input mot model
      //reload_data(url_change); // reaload data ajax after mag mot_keyword
      // url_change(slug,brand); // change the url key word value
      if(urlslug!=''){
          slug = urlslug;
      }else{
          slug = ''
      }
      window.history.pushState('state', 'title','<?php echo base_url() ?>motorcycles?model='+val);
      reload_data(load_data);
      
    }
    //  desktop input search model end ========= 

    // mobile input search model start ====

    //on keyup, start the countdown
    key_search2.on('keyup', function () {
      clearTimeout(typingTimer2);
      typingTimer2 = setTimeout(doneTyping2, doneTypingInterval2);
    });
    //on keydown, clear the countdown 
    key_search2.on('keydown', function () {
      clearTimeout(typingTimer2);
    });
    function doneTyping2 () {
      let val = key_search2.val();
      slug = val;
      if(val == ''){
        slug = "all";
      }
      $(".nav-input-search").val(val); // nav mot model
      key_search.val(val);// desktop input mot model
      //reload_data(url_change); // reaload data ajax after mag mot_keyword
      // url_change(slug,brand);// change the url key word value
      reload_data(load_data);
    }
    // mobile input search model end   ====

    // checbox function ========================================= start
    $(document).ready(function(){
        getbrand = "<?php echo $this->uri->segment(2)?>";

        $(".scrollable-menu").find("input[name='mot_brand'").each(function(){
                if($(this).prop( "checked") == true){
                   var val = $(this).val();
                    if($(this).prop( "checked") == true){ 
                       brand.push(val);
                       $("#"+val+"-mob").prop("checked",true);
                       display_check(add_under_score(val),'brand');// display checkbox

                    }else{
                      $("#"+val+"-mob").prop("checked",false);
                      remove_check(remove_under_score(val),'brand');
                      removeA(brand,val);// remove array by value
                    }
                    //reload_data(url_change); // reload new selection
                    //reload_data(load_data);
                    
                }
        });

        $(".scrollable-menu").find("input[name='mot_type'").each(function(){
                if($(this).prop( "checked") == true){
                   var val = $(this).val();
                    if($(this).prop( "checked") == true){ 
                       type.push(val);
                       $("#"+val+"-mob").prop("checked",true);
                       display_check(add_under_score(val),'type');// display checkbox
                    }else{
                      $("#"+val+"-mob").prop("checked",false);
                      remove_check(remove_under_score(val),'type');
                      removeA(brand,val);// remove array by value
                    }
                    //reload_data(url_change); // reload new selection
                    reload_data(load_data);
                }
        });

        $(".scrollable-menu").find("input[name='mot_transmission'").each(function(){
                if($(this).prop( "checked") == true){
                   var val = $(this).val();
                    if($(this).prop( "checked") == true){ 
                       transmission.push(val);
                       $("#"+val+"-mob").prop("checked",true);
                       display_check(add_under_score(val),'transmission');// display checkbox
                    }else{
                      $("#"+val+"-mob").prop("checked",false);
                      remove_check(remove_under_score(val),'transmission');
                      removeA(brand,val);// remove array by value
                    }
                    //reload_data(url_change); // reload new selection
                    reload_data(load_data);
                }
        });

        $(".scrollable-menu").find("input[name='mot_diplacement'").each(function(){
                if($(this).prop( "checked") == true){
                   var val = $(this).val();
                    if($(this).prop( "checked") == true){ 
                       displacement.push(val);
                       $("#"+val+"-mob").prop("checked",true);
                       display_check(add_under_score(val),'diplacement');// display checkbox
                    }else{
                      $("#"+val+"-mob").prop("checked",false);
                      remove_check(remove_under_score(val),'diplacement');
                      removeA(brand,val);// remove array by value
                    }
                    //reload_data(url_change); // reload new selection
                    reload_data(load_data);
                }
        });

        $(".scrollable-menu").find("input[name='sort'").each(function(){
                if($(this).prop( "checked") == true){
                   var val = $(this).val();
                    if($(this).prop( "checked") == true){ 
                       sort.push(val);
                       $("#"+val+"-mob").prop("checked",true);
                       display_check(add_under_score(val),'sort');// display checkbox
                    }else{
                      $("#"+val+"-mob").prop("checked",false);
                      remove_check(remove_under_score(val),'sort');
                      removeA(brand,val);// remove array by value
                    }
                    //reload_data(url_change); // reload new selection
                    reload_data(load_data);
                }
        });

        if(key_search!=''){
            models = key_search.val();
            split = models.split(" ");
            slug = split[0];
            //slug = models;
        }

    });

     // brand function
     function multi_brand(callback){
      $("input[name='mot_brand'").change(function(){ // pag nag palit ng value ung check box 
        var val = $(this).val();
        if($(this).prop( "checked") == true){ 
           brand.push(val);
           $("#"+val+"-mob").prop("checked",true);
           display_check(add_under_score(val),'brand');// display checkbox
        }else{
          $("#"+val+"-mob").prop("checked",false);
          remove_check(remove_under_score(val),'brand');
          removeA(brand,val);// remove array by value
        }
        reload_data(url_change); // reload new selection
        //reload_data(load_data);

      });
    }
    function multi_brand_mob(){
      $("input[name='mob_mot_brand'").change(function(){ // pag nag palit ng value ung check box 
        var thiss = $(this);
        var data_cb = thiss.attr("data-cb"); // custom attribute
        $("#"+data_cb+"").trigger("click");
      });
    }

    // type
    function multi_type(){
      $("input[name='mot_type'").change(function(){
        var val = $(this).val();
        if($(this).prop( "checked") == true){ 
          type.push(val);
          $("#"+val+"-mob").prop("checked",true);
          display_check(add_under_score(val),'brand');// display checkbox
        }else{
          $("#"+val+"-mob").prop("checked",false);
          remove_check(remove_under_score(val),'type');
          removeA(type,val);// remove array by value
        }
       // reload_data(url_change); // reload new selection
       reload_data(load_data);
      });
    }
    function multi_type_mob(){
      $("input[name='mob_mot_type'").change(function(){ // pag nag palit ng value ung check box 
        var thiss = $(this);
        var data_cb = thiss.attr("data-cb"); // custom attribute
           $("#"+data_cb+"").trigger("click");
      });
    }

    // mot_transmission
    function multi_trans(){
      $("input[name='mot_transmission'").change(function(){
        var val = $(this).val();

        if($(this).prop( "checked") == true){ 
          transmission.push(val);
          $("#"+val+"-mob").prop("checked",true);
          display_check(val,'transmission');// display checkbox
          
        }else{
          $("#"+val+"-mob").prop("checked",false);
          remove_check(val,'transmission');
          removeA(transmission,val);// remove array by value
        }
        //reload_data(url_change); // reload new selection
        reload_data(load_data);
      });
    }
    function multi_trans_mob(){
      $("input[name='mob_mot_transmission'").change(function(){ // pag nag palit ng value ung check box 
        var thiss = $(this);
        var data_cb = thiss.attr("data-cb"); // custom attribute
           $("#"+data_cb+"").trigger("click");
      });
    }

    // mot_diplacement
    function mot_diplacement(){
      $("input[name='mot_diplacement'").change(function(){
        var val = $(this).val();
        if($(this).prop( "checked") == true){ 
          displacement.push(val);
          $("#"+fix_cc(add_cc_displacment(val))+"-mob").prop("checked",true);
          display_check(add_cc_displacment(val),'displacement');// display checkbox

        }else{
          $("#"+fix_cc(add_cc_displacment(val))+"-mob").prop("checked",false);
          remove_check(add_cc_displacment(val),'displacement');
          removeA(displacement,val);// remove array by value
        }
        //reload_data(url_change); // reload new selection
         reload_data(load_data);
      });
    }
    
    function multi_displacement_mob(){
      $("input[name='mob_mot_diplacement'").change(function(){ // pag nag palit ng value ung check box 
        var thiss = $(this);
        var data_cb = thiss.attr("data-cb"); // custom attribute
           $("#"+data_cb+"").trigger("click");
      });
    }
    // sort
    function mot_sort(){
      $("input[name='sort'").change(function(){
        var val = $(this).val();
        // console.log(val)
        if($(this).prop( "checked") == true){ 
          sort.push(val);
          $("#"+val+"-mob").prop("checked",true);
          display_check(add_under_score(val),'sort');// display checkbox

        }else{
          console.log(val);
          $("#"+val+"-mob").prop("checked",false);
          remove_check(remove_under_score(val),'sort');
          removeA(sort,val);// remove array by value
        }
        //reload_data(url_change); // reload new selection
        reload_data(load_data);
      });
    }
    function multi_sort_mob(){
      $("input[name='mob_sort'").change(function(){ // pag nag palit ng value ung check box 
        var thiss = $(this);
        var data_cb = thiss.attr("data-cb"); // custom attribute
           $("#"+data_cb+"").trigger("click");
      });
    }
    // checbox function ========================================= end


    function lazzy_loader(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col">';
        output += '<span class="content-placeholder" >&nbsp;</span>';
        output += '<div class="data-holder hide">';
        output += '<a href="#>';
        output += '<img class="moto-img" src=" " alt="loading" width="300">';
        output += '</a>';
        output += '<h3 class="">/h3>';
        output += '<h4 class="moto-descrip"></h4>';
        output += '<a href="#" class="compare-btn">+ Compare</a><img class="brand-logo" src=""></div></div>';
      }
      $('#load_data_message').html(output);
    }

    function load_data(limit, offset)
    {
      // console.log(limit, start);
      getpromourl = "<?php echo $this->uri->segment(1)?>";
      url2 = "<?php echo $this->uri->segment(2)?>";
      if(getpromourl=="motorcyclespromo" && url2==''){
          $.ajax({
            url:"<?php echo base_url(); ?>motorcyclespromo/loadmotorpromo",
            method:"post",
            data:{
              limit:limit, 
              offset:offset,
              slug:slug,
              brand:brand,
              type:type,
              transmission:transmission,
              displacement:displacement,
              engine:engine,
              sort:sort,
              promo: "kymcopromo"
            },
            cache: false,
            success:function(data)
            {
              // console.log(data);
              if(data == '')
              {
                $('#load_data_message').html('<h3></h3>');
                action = 'active';
              }
              else
              {
                $('#load_data').append(data);
                $('#load_data_message').html("");
                action = 'inactive';
              }
              loadAds();
              checkLargeAds();
            }
          })  
      }
      else if(getpromourl=="motorcyclespromo" && url2==url2){
              $.ajax({
                url:"<?php echo base_url(); ?>motorcyclespromo/loadmotorpromo",
                method:"post",
                data:{
                  limit:limit, 
                  offset:offset,
                  slug:slug,
                  brand:brand,
                  type:type,
                  transmission:transmission,
                  displacement:displacement,
                  engine:engine,
                  sort:sort,
                  promo: url2
                },
                cache: false,
                success:function(data)
                {
                  // console.log(data);
                  if(data == '')
                  {
                    $('#load_data_message').html('<h3></h3>');
                    action = 'active';
                  }
                  else
                  {
                    $('#load_data').append(data);
                    $('#load_data_message').html("");
                    action = 'inactive';
                  }
                  loadAds();
                  checkLargeAds();
                }
              })  
      }
      else if(getpromourl=="motorcyclespromogms"){
          $.ajax({
            url:"<?php echo base_url(); ?>motorcyclespromogms/loadmotorpromogms",
            method:"post",
            data:{
              limit:limit, 
              offset:offset,
              slug:slug,
              brand:brand,
              type:type,
              transmission:transmission,
              displacement:displacement,
              engine:engine,
              sort:sort
            },
            cache: false,
            success:function(data)
            {
              // console.log(data);
              if(data == '')
              {
                $('#load_data_message').html('<h3></h3>');
                action = 'active';
              }
              else
              {
                $('#load_data').append(data);
                $('#load_data_message').html("");
                action = 'inactive';
              }
              loadAds();
              checkLargeAds();
            }
          }) 
      }else if(getpromourl=="motorcycles_royalenfield"){
          $.ajax({
            url:"<?php echo base_url(); ?>motorcycles_royalenfield/loadroyalenfieldmotor",
            method:"post",
            data:{
              limit:limit, 
              offset:offset,
              slug:slug,
              brand:brand,
              type:type,
              transmission:transmission,
              displacement:displacement,
              engine:engine,
              sort:sort
            },
            cache: false,
            success:function(data)
            {
              // console.log(data);
              if(data == '')
              {
                $('#load_data_message').html('<h3></h3>');
                action = 'active';
              }
              else
              {
                $('#load_data').append(data);
                $('#load_data_message').html("");
                action = 'inactive';
              }
              loadAds();
              checkLargeAds();
            }
          })
      }
      else if(getpromourl=="ebike"){
          $.ajax({
            url:"<?php echo base_url(); ?>ebike/loadmotorebike",
            method:"post",
            data:{
              limit:limit, 
              offset:offset,
              slug:slug,
              brand:brand,
              type:type,
              transmission:transmission,
              displacement:displacement,
              engine:engine,
              sort:sort
            },
            cache: false,
            success:function(data)
            {
              // console.log(data);
              if(data == '')
              {
                $('#load_data_message').html('<h3></h3>');
                action = 'active';
              }
              else
              {
                $('#load_data').append(data);
                $('#load_data_message').html("");
                action = 'inactive';
              }
              loadAds();
              checkLargeAds();
            }
          })
      }
      else{
        if($("#model-search").val()!=''){
            slug = $("#model-search").val();
        }else if(urlslug!=''){
            slug = urlslug;
        }else{
            slug = '';
             window.history.pushState('state', 'title','<?php echo base_url() ?>motorcycles');
        }
            $.ajax({
              url:"<?php echo base_url(); ?>motorcycles/loadmotor",
              method:"post",
              data:{
                limit:limit, 
                offset:offset,
                slug:slug,
                brand:brand,
                type:type,
                transmission:transmission,
                displacement:displacement,
                engine:engine,
                sort:sort
              },
              cache: false,
              success:function(data)
              {
                // console.log(data);
                if(data == '')
                {
                  $('#load_data_message').html('<h3></h3>');
                  action = 'active';
                }
                else
                {
                  $('#load_data').append(data);
                  $('#load_data_message').html("");
                  action = 'inactive';
                }
                loadAds();
                checkLargeAds();
              }
            })
          }
    }

    function reload_data(callback){
      limit=9;
      offset=0;
      limit_scroll=1000;

      $(".moto-col").remove();
      lazzy_loader(limit);
        action = 'active';
        // start = start + limit;
        setTimeout(function(){
          load_data(limit, offset);
        }, 1500);
        callback();
    }

    ////////////// start of utitlities
    function add_cc_displacment(data){
      data = data +'cc'.toString();
      return data;
    }
    function fix_cc(data){
      data = '_'+data
      return data;
    }
    // change dash underscrore
    function add_under_score(data){
      data =data.split("-").join("_").toLowerCase();
      return data;
    }
    function remove_under_score(data){
      data = data.split("_").join("-").toLowerCase();
      return data;
    }
    // display checkbox 
    function display_check(data,res) {
        // append selected checkbox
        if(res != 'displacement'){
          $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+data+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'">'+remove_under_score(data)+'   <span  >X</span></button>');
        }
        if(res == 'displacement'){
          if(data == "100cc"){
           $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'"> 0 - 100cc   <span  >X</span></button>');
          }
          if(data == "200cc"){
           $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'"> 101cc - 200cc  <span  >X</span></button>');
          }
          if(data == "300cc"){
           $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'"> 201cc - 400cc  <span  >X</span></button>');
          }
          if(data == "500cc"){
           $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'"> 401cc - 600cc   <span  >X</span></button>');
          }
          if(data == "700cc"){
           $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'"> 601cc - 1000cc   <span  >X</span></button>');
          }
          if(data == "1000cc"){
           $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'">  1001cc up   <span  >X</span></button>');
          }
        }
    } 
    function remove_check(dataval,brand){
        let data_val = dataval.toString();
        // console.log(data_val);
        if(dataval !== "undefined" && dataval !== null ){
            $(".res-btn[data-value='"+data_val+"']").remove();
        }
    }
    function conss(data){
      console.log(data);
    }
    
    function display_remove_btn(data){
      // console.log(data);
      var theElement = $(data);
      var theAttribute = theElement.attr("id");
      $("#"+theAttribute+"").trigger("click");
      window.history.pushState('state', 'title','<?php echo base_url() ?>motorcycles');
    }

    // change url 
    function url_change(){
        //  var slugs = slugs.split(" ").join("-").toLowerCase();
         var slugs = slug == null || slug == '' || slug == ' ' ? 'all' : slug.replace(/ /g,"-").toString();
         var brands = brand[0] == 'undefined' || brand[0] == null ? '' : brand[0]  ;
         var types = type[0] == 'undefined' || type[0] == null ? 'type' : type[0] ;
         var transmissions = transmission[0] == 'undefined' || transmission[0] == null ? 'transmission' : transmission[0];
         var diplacements = displacement[0] == 'undefined' || displacement[0] == null ? 'diplacement' : displacement[0];
         console.log(slugs);
      
        //  alert();
        //  var types = types[0];
        //  var transmissions = transmissions[0];
        //  var diplacements = diplacements[0];
         window.history.pushState('state', 'title','<?php echo base_url() ?>motorcycles/'+brands);

        //  window.history.pushState('state', 'title','<?php echo base_url() ?>motorcycles/index/'+slugs+'/'+brands+'/'+types+'/'+transmission+'/'+diplacement+'/engine-type' );
    }


    function checkLargeAds(){
      if($( window ).width() <= 1024){
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

 //Remove ads
 function loadAds(){
      var countMot = $(".moto-col").length;

      checkLargeAds();

      if(ads == true){return;}
      var place1 = `<div data-type="lg" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result ads">
                      <a href="#">
                        <img class=" p-4 ads-img" src=" <?php echo base_url() ?>uploads/motoads/motul1.jpg" alt="Z250SL" width="300">
                      </a>
                  </div>`;
      var place2 = `<div data-type="lg" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result ads">
                      <a href="#">
                        <img class="p-4 ads-img" src="<?php echo base_url() ?>uploads/motoads/customprint1.jpg" alt="Z250SL" width="300">
                      </a>
                  </div>`;                
      var place3 = `<div data-type="lg" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result ads">
                      <a href="https://www.shell.com.ph/bikerenhancedprotection" target="_blank">
                        <img class="p-4 ads-img" src="<?php echo base_url() ?>uploads/motoads/shellarm.jpg" title="Shell Promo" alt="Get Free Arm Sleeves for every purchase of Shell V Power and Shell Advance" width="300">
                      </a>
                  </div>`;
      var place4 = `<div data-type="lg" class="col-lg-4 col-md-6 col-sm-6 col-6 moto-col mot_result ads">
                      <a href="#">
                        <img class=" p-4 ads-img" src="<?php echo base_url() ?>/uploads/ads/shirtsv4.jpg" alt="Z250SL" width="300">
                      </a>
                  </div>`;         
      var holder = `<div data-type="" class="blankholder col-lg-12 col-md-12 col-sm-12 col-12  mot_result ads">
                  </div>`            

      if($( window ).width() > 700){
        if(countMot >= 3){
          $(".moto-col[data-count='3']").before(place1,place2,place3,place4);
          console.log(countMot);

          }else{
          if(countMot % 2){
            console.log("even");
            $(".moto-col").last().after(place1,place2,place3,place4);
          }else{
            console.log("odd");
            $(".moto-col").last().after(holder,holder,place1,place2,place3,place4);
          }
        }
      }else{
        if(countMot >= 3){
          $(".moto-col[data-count='4']").before(place1,place2,place3,place4);
          console.log(countMot);

          }else{
          if(countMot % 2){
            console.log("even");
            $(".moto-col").last().after(place1,place3,place4);
          }else{
            console.log("odd");
            $(".moto-col").last().after(holder,holder,place1,place2,place3,place4);
          }
        }
      }

      ads=true;

    }
    

    // remove array by value
    function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }
    // url_change(slug,brand,type,transmission,displacement);
    // url_change();



    

    /////////// end of utilities    
  $(document).ready(function(){
    multi_brand() // run multiple brand
    multi_brand_mob() // mobile 

    multi_type() // run multiple type 
    multi_type_mob() // mobile
    
    multi_trans() // run multiple trans
    multi_trans_mob() // mobile
    
    mot_diplacement() // run multiple displacement
    multi_displacement_mob() //mobile

    mot_sort() // run multiple sort 
    multi_sort_mob() // mobile


    

    lazzy_loader(limit);

    

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, offset);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        offset = offset + limit;
        setTimeout(function(){
          load_data(limit, offset);
        }, 1000);
      }
    });

  });
</script>

<script>
 $(window).resize(function() {
      loadAds();
      checkLargeAds();
    });
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 400) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {

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
});s
  
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
</script>

