<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/landing.css">
<style>
#nav-footer{
    display:none!important;
}
nav.navbar.navbar-expand-lg.navbar-light.nav-color{
    display:none;
}
#main-nav{
    display:none!important;
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
    margin-top: -32px;
    width: 95%;
    overflow-x: auto;
}
.suggestions-div{
    overflow-y: auto;
    z-index: 99;
}
.scrollySuggestion{
    /*overflow-y: auto;*/
    /* height: 250px; */
}
</style>
  <!--Navbar Desktop-->
  <div class="landing" style="display:block!important;">
  <nav class="desktop">
        <div class="desktop container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="dropdown">
                        <a href="#" class="dropbtn nav-link active">MOTORCYCLES</a>
                        <div class="dropdown-content">
                            <hr class=" div divider-1">
                            <a href="<?php echo base_url() ?>motorcycles/index/all/brand/type/transmission/diplacement/engine-type">NEW MOTORCYCLE</a>
                            <a href="<?php echo base_url() ?>compare">COMPARE</a>
                            <!-- <a href="#">REPO </a> -->
                            <!-- <a href="#">ACCESSORIES</a>
                            <a href="#">APPAREL</a>
                            <a href="#">REVIEWS</a> -->
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="<?php echo base_url() ?>mgclub" class="dropbtn nav-link active">MG CLUB</a>
                        <!-- <div class="dropdown-content"> -->
                            <!-- <hr class="div divider-2">
                            <a href="#">NEW MOTORCYCLE</a>
                            <a href="#">REPO MOTORCYCLE</a>
                            <a href="#">ACCESSORIES</a>
                            <a href="#">APPAREL</a>
                            <a href="#">COMPARE</a> -->
                        <!-- </div> -->
                    </div>
                    <div class="dropdown">
                        <a href="<?php echo base_url() ?>blogs" class="dropbtn nav-link active">MG NEWS AND BLOGS</a>
                        <!-- <div class="dropdown-content">
                            <hr class="div divider-3">
                            <a href="#">NEW MOTORCYCLE</a>
                            <a href="#">REPO MOTORCYCLE</a>
                            <a href="#">ACCESSORIES</a>
                            <a href="#">APPAREL</a>
                        </div> -->
                    </div>
                    <div class="dropdown">
                        <a href="<?php echo base_url() ?>aboutus" class="dropbtn nav-link active">ABOUT US</a>
                        <!-- <div class="dropdown-content">
                            <hr class="div divider-4">
                            <a href="#">NEW MOTORCYCLE</a>
                            <a href="#">REPO MOTORCYCLE</a>
                            <a href="#">ACCESSORIES</a>
                        </div> -->
                    </div>
                    <!-- <div class="dropdown">
                        <a href="#" class="dropbtn nav-link active">MOTO PROMO</a>
                        <div class="dropdown-content">
                            <hr class="div divider-5">
                            <a href="#">NEW MOTORCYCLE</a>
                            <a href="#">REPO MOTORCYCLE</a>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-2">
                    <div class="dropdown log">
                        <!-- <a href="<?php echo base_url().'login' ?>" class="dropbtn nav-link">LOG IN</a> -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--/.Navbar Desktop-->
    
    <!--Navbar Mobile-->
     <nav class="mobile">
        <button class="navbar-toggler text-white" onclick="toogleMenu(event)" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-fa z-1 fa fa-bars"></span>
        </button><strong>MENU</strong>
    </nav>
    <!-- back up space  this -->
            <!-- sub menus end -->
        <!-- menu items mobile end -->
    <!--Navbar Mobile-->

            <!-- sub menus end -->
        <!-- menu items mobile end -->
    <!--Navbar Mobile-->
    <div class="container moto-search">

        <div class="row">
    <form class="" id="form" method="post">

            <div class="col-lg-12 text-center">
                <img src="<?php echo base_url() ?>resources/site/newui-assets2/img/motogarahe_logo.png" class="img-fluid" width="516" height="78"><br>
                <h1 class="head-font">Hanap Moto? Easy!</h1>

                <div class="input-group search">
                    <input type="text" class="form-control inputSearch search-mot" onfocus="inputIn()"  onfocusout="inputOut()" autocomplete="off"  name="mot_model" placeholder="What motorcycle is on your mind?">
                        <div class="input-group-append">
                            <button class="btn btn-secondary magnifyingGlass" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                </div>
                <div class="suggestions-div">
					<ul class="suggestions list-group" style="">
					</ul> 
				</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-right">
                <a class="advs adv-search" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Advance Search</a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body col-lg-12">
                        <div class="col-lg-12 d-flex">
                            <select name="mot_brand" class="browser-default col-6">
                                <option selected value>Brand</option>
                                <!--<option value="Kymco">Kymco</option>-->
                                <option value="kawasaki">Kawasaki</option>
                                <option value="yamaha">Yamaha</option>
                                <option value="suzuki">Suzuki</option>
                                <option value="honda">Honda</option>
                                <option value="euro-motor">Euro-Motor</option>
                                <option value="keeway">Keeway</option>
                                <option value="sym">Sym</option>
                                <option value="vespa">Vespa</option>
                                <option value="kymco">Kymco</option>
                                <option value="bmw">BMW</option>
                                <option value="ktm">KTM</option>
                                <option value="tvs">TVS</option>
                                <option value="moto-morini">Moto-Morini</option>
                                <option value="motoguzzi">Motoguzzi</option>
                                <option value="aprilia">Aprilia</option>
                                <option value="Benelli">Benelli</option>
                                <option  value="bajaj">Bajaj</option>

                            </select>
                            <select name="mot_type" class="browser-default col-6">
                                <option selected value>Category</option>
                                <option  value="big-bike" id="big_bike">Big-Bike</option>
                                <option  value="scooter" id="scooter">Scooter</option>
                                <option  value="backbone" id="backbone">Backbone</option>
                                <option  value="sports" id="sports">Sports</option>
                                <option  value="underbone" id="underbone">Underbone</option>
                                <option  value="business" id="business">Business</label></li>
                                <option  value="adventure" id="adventure">Adventure</option>
                                <option  value="cafe" id="cafe">Café</option>
                                <option  value="cruiser" id="cruiser">Cruiser</option>
                                <option  value="naked" id="naked">Naked</option>
                                <option  value="off-road" id="off_road">Off-Road</option>
                                <option  value="retro" id="retro">Retro</option>
                                <option  value="sport-touring" id="sport_touring">Sport-Touring</option>
                                <option  value="dual-sport" id="dual_sport">Dual-Sport</option>
                                <option  value="supermoto" id="supermoto">Supermoto</option>
                                <option  value="scrambler" id="scrambler">Scrambler</option>
                                <option  value="touring" id="touring">Touring</option>
                                <option  value="adventure-touring" id="adventure_touring">Adventure-Touring</option>

                            </select>
                        </div>
                        <div class="col-12 d-flex">
                        <select name="mot_transmission" class="browser-default col-6">
                                <option selected value>Transmission</option>
                                <option value="automatic">Automatic</option>
                                <option value="manual">Manual</option>
                        </select>
                        <select name="mot_diplacement" class="browser-default col-6">
                                <option selected value>Displacement</option>
                                <option value="100">100cc</option>
                                <option value="125">125cc</option>
                                <option value="150">150cc</option>
                                <option value="200">200cc</option>
                                <option value="300">300cc</option>
                                <option value="400">400cc</option>
                                <option value="1000">1000cc</option>
                        </select>
                        </div>
                        <div class="col-12 mt-2 text-center">
                        <button  type="submit" name="search_mode" value="search_mode" class="adv-btn btn col-4 submitSearch">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

    </div>
</div>    

<script>

function getMobileOperatingSystem(status) {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {
    }

    if (/android/i.test(userAgent)) {
        changeUiMob(status);

    }

    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        changeUiMob(status);
        
    }

    return;
}
function changeUiMob(status){
    if(status == "open"){
        $(".container").css("margin-top", "-25%");
    }else{
        $(".container").css("margin-top", "0");

    }
}
function pickResult(slug){
    // $(".search-mot").val(slug);
    // setTimeout(function(){$(".magnifyingGlass").trigger("click");},800)
    window.location.href = "<?php echo base_url(); ?>motorcycles/info/"+slug;

}

function hoverInRes (event){
    console.log(event.target);
    $(".activeSuggestion").removeClass("activeSuggestion");
    event.target.classList.add('class', 'activeSuggestion');
    console.log("in");
}

function hoverOutRes(event){
    console.log("out");
    event.target.classList.remove('class', 'activeSuggestion');
    $(".moto-result:first-child").addClass("activeSuggestion");
    

}

function firstHover(){
    $(".moto-result:first-child").addClass("activeSuggestion");
}
function inputIn(){
    var searchres = $(".search-mot").val().length;
    var countresult  = $(".moto-result").length;
        if(searchres >= 1){
            $(".suggestions").show();
            // getMobileOperatingSystem("open");
            $(".suggestions-div").addClass("scrollySuggestion");
            $(".adv-search").hide();
        }
        // if(countresult >= 11){
        // }else{
        // 	$(".suggestions-div").removeClass("scrollySuggestion");

        // }
}
function inputOut(){
    setTimeout(function(){
        $(".suggestions").hide();
        $(".suggestions-div").removeClass("scrollySuggestion");
        $(".adv-search").show();
        // getMobileOperatingSystem("close");

    },150);	
}

$(document).ready(function(){
$(".search-mot").keyup(function(){
            var getVal = $(this).val();
            var valLen = $(this).val().length;
            var searchResult = valLen == 0 ?  null : getVal ;
            try{
                $.ajax({
                type: "POST",
                data:{ search : searchResult },
                url:' <?php echo site_url("home/searchajax2"); ?>',
                success:function(res){
                    if(res == ""){
                        inputOut();
                    }else{
                        $(".suggestions").html(res);
                        inputIn();
                        firstHover();
                    }
                    if( valLen>= 1){
                        inputIn();
                    
                    }else{
                        inputOut();

                    }
                }

            });

            }catch (e){
                console.log("Error");

            }
        });

// magniyfying trigger click function 
$(".magnifyingGlass").click(function(){
        $(".submitSearch").trigger("click");
});

// advanced search submit
// $(".adv-btn").click(function(){
    // e.preventDefault();
    // $(".submitSearch").trigger("click");
// });
});
</script>