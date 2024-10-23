<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/filtSort.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/moto-list.css">
<script src="<?php echo base_url() ?>resources/site/newui-js2/moto-list.js"></script>
<script src="<?php echo base_url() ?>resources/site/newui-js2/classie.js"></script>
<script src="<?php echo base_url() ?>resources/site/newui-js2/modernizr.custom.js"></script>



<style>
.sk-fading-circle {
  margin: 100px auto;
  width: 40px;
  height: 40px;
  position: relative;
}

.sk-fading-circle .sk-circle {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.sk-fading-circle .sk-circle:before {
  content: '';
  display: block;
  margin: 0 auto;
  width: 15%;
  height: 15%;
  background-color: #333;
  border-radius: 100%;
  -webkit-animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
          animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
}
.sk-fading-circle .sk-circle2 {
  -webkit-transform: rotate(30deg);
      -ms-transform: rotate(30deg);
          transform: rotate(30deg);
}
.sk-fading-circle .sk-circle3 {
  -webkit-transform: rotate(60deg);
      -ms-transform: rotate(60deg);
          transform: rotate(60deg);
}
.sk-fading-circle .sk-circle4 {
  -webkit-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
          transform: rotate(90deg);
}
.sk-fading-circle .sk-circle5 {
  -webkit-transform: rotate(120deg);
      -ms-transform: rotate(120deg);
          transform: rotate(120deg);
}
.sk-fading-circle .sk-circle6 {
  -webkit-transform: rotate(150deg);
      -ms-transform: rotate(150deg);
          transform: rotate(150deg);
}
.sk-fading-circle .sk-circle7 {
  -webkit-transform: rotate(180deg);
      -ms-transform: rotate(180deg);
          transform: rotate(180deg);
}
.sk-fading-circle .sk-circle8 {
  -webkit-transform: rotate(210deg);
      -ms-transform: rotate(210deg);
          transform: rotate(210deg);
}
.sk-fading-circle .sk-circle9 {
  -webkit-transform: rotate(240deg);
      -ms-transform: rotate(240deg);
          transform: rotate(240deg);
}
.sk-fading-circle .sk-circle10 {
  -webkit-transform: rotate(270deg);
      -ms-transform: rotate(270deg);
          transform: rotate(270deg);
}
.sk-fading-circle .sk-circle11 {
  -webkit-transform: rotate(300deg);
      -ms-transform: rotate(300deg);
          transform: rotate(300deg); 
}
.sk-fading-circle .sk-circle12 {
  -webkit-transform: rotate(330deg);
      -ms-transform: rotate(330deg);
          transform: rotate(330deg); 
}
.sk-fading-circle .sk-circle2:before {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s; 
}
.sk-fading-circle .sk-circle3:before {
  -webkit-animation-delay: -1s;
          animation-delay: -1s; 
}
.sk-fading-circle .sk-circle4:before {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s; 
}
.sk-fading-circle .sk-circle5:before {
  -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s; 
}
.sk-fading-circle .sk-circle6:before {
  -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s; 
}
.sk-fading-circle .sk-circle7:before {
  -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s; 
}
.sk-fading-circle .sk-circle8:before {
  -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s; 
}
.sk-fading-circle .sk-circle9:before {
  -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
}
.sk-fading-circle .sk-circle10:before {
  -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
}
.sk-fading-circle .sk-circle11:before {
  -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
}
.sk-fading-circle .sk-circle12:before {
  -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
}

@-webkit-keyframes sk-circleFadeDelay {
  0%, 39%, 100% { opacity: 0; }
  40% { opacity: 1; }
}

@keyframes sk-circleFadeDelay {
  0%, 39%, 100% { opacity: 0; }
  40% { opacity: 1; } 
}



.sug-btn {
    border: unset!important;
    font-size: unset!important;
    color: unset!important;
    background-color: unset!important;
    text-align: left!important;
    width: 100%!important;
}
li.list-group-item.moto-result{
    cursor: pointer;
    padding: 5px 20px!important;
    font-size: 13px!important;
}
li.list-group-item.moto-result:hover {
}
.activeSuggestion{
    background-color: #fdcf07;

}
.list-group-item{
    border: unset!important;
}
.suggestions{
    text-align: left;
    position: absolute;
    transition: all 0.3s ease-in-out;
    height: 30vh;
    margin-top: 0px;
    width: 100%;
    overflow-x: auto;
    /* border: black solid 1px; */
}
.suggestions-div{
    /*height: 250px;*/
    /*position: absolute!important;*/
    /*overflow-y: auto;*/
    overflow-y: auto;
    z-index: 99;
    display:none;

}

.scrollySuggestion{
    display:block;

}
</style>

 <!-- mobile filter start -->
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
  </div>
  <!-- brand end -->
  <!-- category start -->
  <div id="categ" class="sidenav d-lg-none  left-slide">
    <a class="sub-filter-right-back" data-sub="back"><span class="icon-nav-text">back </span> <i style=" margin-top: 5px;" class="fa fa-chevron-right pull-right"></i> </a>
    
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'big-bike' == $mot_type ? 'checked' : '' ?>          value="big-bike"          id="big-bike-mob"           data-cb="big_bike"><label class="f" for="big-bike-mob">Big-bike</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'scooter' == $mot_type ? 'checked' : '' ?>           value="scooter"           id="scooter-mob"            data-cb="scooter"><label class="f" for="scooter-mob">scooter</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'backbone' == $mot_type ? 'checked' : '' ?>          value="backbone"          id="backbone-mob"           data-cb="backbone"><label class="f" for="backbone-mob">Backbone</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'sports' == $mot_type ? 'checked' : '' ?>            value="sports"            id="sports-mob"             data-cb="sports"><label class="f" for="sports-mob">Sports</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'underbone' == $mot_type ? 'checked' : '' ?>         value="underbone"         id="underbone-mob"          data-cb="underbone"><label class="f" for="underbone-mob">Underbone</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'business' == $mot_type ? 'checked' : '' ?>          value="business"          id="business-mob"           data-cb="business"><label class="f" for="business-mob">Business</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'adventure' == $mot_type ? 'checked' : '' ?>         value="adventure"         id="adventure-mob"          data-cb="adventure"><label class="f" for="adventure-mob">Adventure</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'cafe' == $mot_type ? 'checked' : '' ?>              value="cafe"              id="cafe-mob"               data-cb="cafe"><label class="f" for="cafe-mob">Café</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'cruiser' == $mot_type ? 'checked' : '' ?>           value="cruiser"           id="cruiser-mob"            data-cb="cruiser"><label class="f" for="cruiser-mob">Cruiser</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'naked' == $mot_type ? 'checked' : '' ?>             value="naked"             id="naked-mob"              data-cb="naked"><label class="f" for="naked-mob">Naked</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'off-road' == $mot_type ? 'checked' : '' ?>          value="off-road"          id="off-road-mob"           data-cb="off_road"><label class="f" for="off-road-mob">Off-Road</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'retro' == $mot_type ? 'checked' : '' ?>             value="retro"             id="retro-mob"              data-cb="retro"><label class="f" for="retro-mob">Retro</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'sport-touring' == $mot_type ? 'checked' : '' ?>     value="sport-touring"     id="sport-touring-mob"      data-cb="sport_touring"><label class="f" for="sport-touring-mob">sport-touring</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'dual-sport' == $mot_type ? 'checked' : '' ?>        value="dual-sport"        id="dual-sport-mob"         data-cb="dual_sport"><label class="f" for="dual-sport-mob">dual-sport</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'supermoto' == $mot_type ? 'checked' : '' ?>         value="supermoto"         id="supermoto-mob"          data-cb="supermoto"><label class="f" for="supermoto-mob">Supermoto</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'scrambler' == $mot_type ? 'checked' : '' ?>         value="scrambler"         id="scrambler-mob"          data-cb="scrambler"><label class="f" for="scrambler-mob">Scrambler</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'touring' == $mot_type ? 'checked' : '' ?>           value="touring"           id="touring-mob"            data-cb="touring"><label class="f" for="touring-mob">Touring</label></span></a>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_type" type="checkbox" class="form-check-input" <?php echo 'adventure-touring' == $mot_type ? 'checked' : '' ?> value="adventure-touring" id="adventure-touring-mob"  data-cb="adventure_touring"><label class="f" for="adventure-touring-mob">Adventure-Touring</label></span></a>

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
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '100' == $mot_diplacement ? 'checked' : '' ?> value="100"   data-cb="_100cc"  id="_100cc-mob"><label class="f" for="_100cc-mob">100cc</label></li>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '125' == $mot_diplacement ? 'checked' : '' ?> value="125"   data-cb="_125cc"  id="_125cc-mob"><label class="f" for="_125cc-mob">125cc</label></li>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '150' == $mot_diplacement ? 'checked' : '' ?> value="150"   data-cb="_150cc"  id="_150cc-mob"><label class="f" for="_150cc-mob">150cc</label></li>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '200' == $mot_diplacement ? 'checked' : '' ?> value="200"   data-cb="_200cc"  id="_200cc-mob"><label class="f" for="_200cc-mob">200cc</label></li>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '300' == $mot_diplacement ? 'checked' : '' ?> value="300"   data-cb="_300cc"  id="_300cc-mob"><label class="f" for="_300cc-mob">300cc</label></li>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '400' == $mot_diplacement ? 'checked' : '' ?> value="400"   data-cb="_400cc"  id="_400cc-mob"><label class="f" for="_400cc-mob">400cc</label></li>
    <a class="sub-menu sub-filter-items" ><span class="icon-nav-text"><input name="mob_mot_diplacement" type="checkbox" class="form-check-input" <?php echo '1000' == $mot_diplacement ? 'checked' : '' ?> value="1000" data-cb="_1000cc" id="_1000cc-mob"><label class="f" for="_1000cc-mob">1000cc</label></li>
  </div>
  <!-- displacement end -->
  <!-- mobile filter end -->
<div class="body-content">
   <section class="search-filter-nav">
     <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="">NEW MOTORCYCLES</h1>
                </div>
            </div>
            <!-- filter start -->
            <div class="row filter border-search dp">
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
                        <div class="suggestions-div">
                          <ul class="suggestions list-group" style="">
                          </ul> 
                        </div>
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
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'bmw' == $mot_brand ? 'checked' : '' ?> value="bmw" id="bmw"><label class="f" for="bmw">Bmw</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'ducati' == $mot_brand ? 'checked' : '' ?> value="ducati" id="ducati"><label class="f" for="ducati">Ducati</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'euro-motor' == $mot_brand ? 'checked' : '' ?> value="euro-motor" id="euro_motor"><label class="f" for="euro_motor">Euro-motor</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'keeway' == $mot_brand ? 'checked' : '' ?> value="keeway" id="keeway"><label class="f" for="keeway">Keeway</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'sym' == $mot_brand ? 'checked' : '' ?> value="sym"  id="sym"><label class="f" for="sym">Sym</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'kymco' == $mot_brand ? 'checked' : '' ?> value="kymco" id="kymco"><label class="f" for="kymco">Kymco</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'moto-morini' == $mot_brand ? 'checked' : '' ?>  value="moto-morini" id="moto_morini"><label class="f" for="moto_morini">Moto-Morini</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'motoguzzi' == $mot_brand ? 'checked' : '' ?>  value="motoguzzi" id="motoguzzi"><label class="f" for="motoguzzi">Motoguzzi</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'aprilia' == $mot_brand ? 'checked' : '' ?> value="aprilia" id="aprilia"><label class="f" for="aprilia">Aprilia</label></li>
                            <li><input name="mot_brand" type="checkbox" class="form-check-input" <?php echo 'tvs' == $mot_brand ? 'checked' : '' ?>  value="tvs" id="tvs"><label class="f" for="tvs">TVS</label></li>
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
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'big-bike' == $mot_type ? 'checked' : '' ?> value="big-bike" id="big_bike"><label class="f" for="big_bike">Big-bike</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'scooter' == $mot_type ? 'checked' : '' ?> value="scooter" id="scooter"><label class="f" for="scooter">scooter</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'backbone' == $mot_type ? 'checked' : '' ?> value="backbone" id="backbone"><label class="f" for="backbone">Backbone</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'sports' == $mot_type ? 'checked' : '' ?> value="sports" id="sports"><label class="f" for="sports">Sports</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'underbone' == $mot_type ? 'checked' : '' ?> value="underbone" id="underbone"><label class="f" for="underbone">Underbone</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'business' == $mot_type ? 'checked' : '' ?> value="business" id="business"><label class="f" for="business">Business</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'adventure' == $mot_type ? 'checked' : '' ?> value="adventure" id="adventure"><label class="f" for="adventure">Adventure</label></li>
                                <li><input name="mot_type" type="checkbox" class="form-check-input" <?php echo 'cafe' == $mot_type ? 'checked' : '' ?> value="cafe" id="cafe"><label class="f" for="cafe">Café</label></li>
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
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '100' == $mot_diplacement ? 'checked' : '' ?> value="100" id="_100cc"><label class="f" for="_100cc">100cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '125' == $mot_diplacement ? 'checked' : '' ?> value="125" id="_125cc"><label class="f" for="_125cc">125cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '150' == $mot_diplacement ? 'checked' : '' ?> value="150" id="_150cc"><label class="f" for="_150cc">150cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '200' == $mot_diplacement ? 'checked' : '' ?> value="200" id="_200cc"><label class="f" for="_200cc">200cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '300' == $mot_diplacement ? 'checked' : '' ?> value="300" id="_300cc"><label class="f" for="_300cc">300cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '400' == $mot_diplacement ? 'checked' : '' ?> value="400" id="_400cc"><label class="f" for="_400cc">400cc</label></li>
                                <li><input name="mot_diplacement" type="checkbox" class="form-check-input" <?php echo '1000' == $mot_diplacement ? 'checked' : '' ?> value="1000" id="_1000cc"><label class="f" for="_1000cc">1000cc</label></li>
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
                
              
            </div>
           
    
            <!-- end of filter -->

            
      </div>
      <!-- mobile filter start-->
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
      <!-- mobile filter end-->
   </section>
  <section id="section-check" class="container">
  
    <span class="" id="brand-result">
    <?php   if($mot_brand != 'brand'){ echo '<button type="button" class="btn res-btn m-2" data-value="'.$mot_brand.'">'. $mot_brand .'   <span >X</span></button>'; } ?>
    </span>   
    <span class="" id="type-result">
    <?php   if($mot_type != 'type' ){ echo '<button type="button" class="btn res-btn m-2" data-value="'.$mot_type.'">'. $mot_type .'   <span >X</span></button>'; } ?>

    </span>      
    <span class="" id="transmission-result">
    <?php   if($mot_transmission != 'transmission' ){ echo '<button type="button" class="btn res-btn m-2" data-value="'.$mot_transmission.'">'. $mot_transmission .'   <span >X</span></button>'; } ?>
    </span>
    <span class="" id="displacement-result">
    <?php   if($mot_diplacement != 'diplacement' ){ echo '<button type="button" class="btn res-btn m-2" data-value="'.$mot_diplacement.'">'. $mot_diplacement .'   <span >X</span></button>'; } ?>
    </span>  
    <span class="" id="sort-result">
    </span>     
    <span class="" id="clear-filter">
      <?php if($mot_brand != 'brand' || $mot_type != 'type' || $mot_diplacement != 'diplacement' || $mot_transmission != 'transmission'){ echo '<button class="btn">Clear</button>'; } ?>
    </span>
  </section>
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

</div>

<script>$('#slideshow .slick').slick({dots:!0,infinite:!0,speed:300,slidesToShow:2,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,infinite:!0,speed:300}},{breakpoint:425,settings:{slidesToShow:1,slidesToScroll:1,speed:300}}]})</script>

<!--  -->
<script>
    let limit_scroll = 1000; // scroll limit
    let cur_url = window.location.pathname; // current url
    let limit = 9;// limiter of database
    let offset = 9;// offset of database
    var action = 'inactive'; // scroll detect  active and inactive

    // preapre search keyword
    var searchval = '<?php echo $this->uri->segment("3"); ?>';
    var searchCheck = searchval.replace(/-/g," ");
    var mot_keyword = (searchCheck != 'all') ? searchCheck: null ;

    // prepare brand
    var searchBrand = '<?php echo $this->uri->segment("4"); ?>'
    var brandval = (searchBrand.toLowerCase() != 'brand') ? searchBrand : 'brand' ;

    // prepare scooter
    var searchType = '<?php echo $this->uri->segment("5"); ?>'
    var mot_type = (searchType.toLowerCase() != 'type') ? searchType : 'type' ;

    // prepare trans
    var searchTrans = '<?php echo $this->uri->segment("6"); ?>';
    var mot_trans = (searchTrans.toLowerCase() != 'transmission') ? searchTrans : 'transmission' ;

    // prepare displacement
    var searchDisplacement = '<?php echo $this->uri->segment("7"); ?>';
    var mot_dis = (searchDisplacement.toLowerCase() != 'diplacement') ? searchDisplacement : 'diplacement' ;

    let slug = mot_keyword;
    let brand = ( brandval !='brand') ? [brandval] : [];
    let type =  ( mot_type !='type') ? [mot_type] : [];
    let transmission = ( mot_trans !='transmission') ? [mot_trans] : [];
    let displacement = ( mot_dis !='diplacement') ? [mot_dis] : [];
    let engine = [];
    let sort = [];

    let activeheight = 300;

    // typing variable
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 second for example
    var key_search = $("#model-search");

    var typingTimer2;                //timer identifier
    var doneTypingInterval2 = 1000;  //time in ms, 5 second for example
    var key_search2 = $("input[name='mot_model_mobile']");

    // end of variable ===========
    // js function start


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
      }
      $(".nav-input-search").val(val); // nav mot model
      key_search2.val(val);// mobile input mot model
      reload_data(); // reaload data ajax after mag mot_keyword
      url_change(slug); // change the url key word value

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
      reload_data(); // reaload data ajax after mag mot_keyword
      url_change(slug);// change the url key word value
    }


    
    // mobile input search model end   ====

    // checkbox function start Xxxxxxxxx
     // brand function
    function multi_brand(){
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
        reload_data(); // reload new selection
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
        reload_data(); // reload new selection

       
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
        reload_data(); // reload new selection
       
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
        reload_data(); // reload new selection
      
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
        reload_data(); // reload new selection
      
      });
    }
    function multi_sort_mob(){
      $("input[name='mob_sort'").change(function(){ // pag nag palit ng value ung check box 
        var thiss = $(this);
        var data_cb = thiss.attr("data-cb"); // custom attribute
           $("#"+data_cb+"").trigger("click");
      });
    }
    // checbox function end    Xxxxxxxx

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
          $("#"+res+"-result").append('<button type="button"  onClick="display_remove_btn('+fix_cc(data)+')" class="btn res-btn m-2" data-value="'+remove_under_score(data)+'">'+remove_under_score(data)+'   <span  >X</span></button>');
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
    }

    // change url 
    function url_change(data){
         var data = data.split(" ").join("-").toLowerCase();
         window.history.pushState('state', 'title','<?php echo base_url() ?>motorcycles/index/'+data+'/brand/type/transmission/diplacement/engine-type' );
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

    /////////// end of utilities

    // ajax JS 0000000000
    // motor img  lazy loader
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
        output += '<a href="#" class="compare-btn">+ Compare</a><img class="brand-logo" src="" width="50" height="30"></div></div>';
      }
      $('#load_data_message').html(output);
    }
    function load_data(limit, offset)
    {
      // console.log(limit, start);
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
            $('#load_data_message').html('<h3>No Result Found</h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
            $(".moto-col").each(function(){
              var data = $(this).attr("data-count");
              if(data <= 8){
                setTimeout(() => {
                  $(this).removeClass("d-none");
                }, 500);
                setTimeout(() => {
                  $(this).find(".content-placeholder").remove();
                  $(this).find(".data-holder").removeClass("hide");
                  offset+=4;
                }, 1500);
              }
            });
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';

      load_data(limit, offset);
    }

    function reload_data(){
      limit=9;
      offset=9;
      limit_scroll=1000;

      $(".moto-col").remove();
      lazzy_loader(limit);
        action = 'active';
        // start = start + limit;
        setTimeout(function(){
          load_data(limit, offset);
        }, 1500);
    }

    function scroll_motor(scroll){
      action = 'active';
      $(".moto-col").each(function(){
        var data = $(this).attr("data-count");
          if(data <= scroll){
            setTimeout(() => {
              $(this).removeClass("d-none");
            }, 500);
            setTimeout(() => {
              $(this).find(".content-placeholder").remove();
              $(this).find(".data-holder").removeClass("hide");
              offset+=4;
            }, 1500);
          }
        });
      
      
    }
    function check_position_y(scroll_cur, max, lim_scroll,offset_lim){
          
     if(scroll_cur >= lim_scroll){
      limit_scroll += 500;
      offset+=5;
      console.log("limit");
      // console.log(scroll_cur, max, lim_scroll);
      $(".moto-col").each(function(){
        var data = $(this).attr("data-count");
        if(data <= offset){
            setTimeout(() => {
              $(this).removeClass("d-none");
            }, 500);
            setTimeout(() => {
              $(this).find(".content-placeholder").remove();
              $(this).find(".data-holder").removeClass("hide");
            }, 4000);
          }

      });
     }
      
    }







    // js function end
    
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

          $(window).scroll(function(){
              var scroll = $(window).scrollTop();
            
              let maxheight = $(window).height();
              let dataheight = $("#load_data").height();
              // activeheight += scroll;
              // scroll_motor(scroll);

              check_position_y(scroll,maxheight,limit_scroll,offset);

               
            });
          $(window).resize(function() {
              var windowWidth = $(window).width();
              var windowHeight = $(window).height();
              
              if(windowWidth >= 768){
              $(".left-slide").css("transform","translateX(-100%)");
              $(".right-slide").css("transform","translateX(100%)");
              setTimeout(() => {
                $(".right-slide").hide();
              }, 200);
              }
          });

    });




</script>