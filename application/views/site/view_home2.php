	<style>
		select {
		    width: 100%;
		    padding: 10px 20px 10px 25px;
		    border: 1px solid #323232;
		    border-radius: 30px;
		    font: 400 13px 'Open Sans',sans-serif;
		    background: #323232;
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    -ms-appearance: none;
		    appearance: none!important;
		    cursor: pointer;
		    color: #fff;
		}

		select + span.fa {
	    top: 14px;
	    right: 45px;
	    position: absolute;
	}

	.m-firstSelects {
	    margin-bottom: 10px;
	}.panel-title {    text-align: right;
	    font-size: 13px;
	    color: #fff;}
	    .slider {
	    width: 100%;
	     margin-left: 0px; 
	}
	.m-secondSelects.b-error {
		text-align: left !important
	}

	.slider {margin-top: 0px;}
	.b-search__main-form-range {margin-bottom: 0px;}

	.panel, .panel-group .panel-heading+.panel-collapse>.panel-body{
	    border: none;
	    box-shadow:none;
	}

	.home2 img {
		max-width: 600px;
		width: 100%;
	}

	.b-topBar, .b-nav, .b-info, .b-footer {display: none}

	.b-error {padding-top: 200px;}

	.b-blog__aside-search button {
	    background: initial;
	    position: initial;
	    border: 2px solid #323232;
	    display: initial;
	    top: initial;
	    font-size: initial;
	    margin-top: initial;
	    right: initial;
	    -moz-transform: initial;
	    -webkit-transform: initial;
	    -o-transform: initial;
	    transform: initial;
	    filter: initial;
	    -ms-filter: initial;
	        color: #fcd103;
	    background-color: #323232;
	    width: 175px;
	    margin-top: 10px;
	    font-size: 14px !important;
	}

	.b-blog__aside-search a.repo  {
		background-color: #323232;
		border: 1px solid #323232;
		    color: #fcd103;
		    width: 175px;
		    margin-top: 10px;
	}

	.s-title.zoomInUp {
		border:none;
		    padding-left: 0px;
	    padding-right: 0px;
	    color: #ffffff !important; 
	    margin: 0px 0 36px 0 !important;
	}
	.adv-btn{
		width: 100%;
	    padding: 10px 20px 10px 25px;
	    border: 1px solid #323232;
	    border-radius: 30px;
	    font: 400 13px 'Open Sans',sans-serif;
	    background: #323232;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    -ms-appearance: none;
	    appearance: none!important;
	    cursor: pointer;
	    color: #fcd103;
	    margin-top: 0;
	}
	.adv-btn:hover{
		
	    color: #fcd103;
	    
	}
::-webkit-scrollbar {
    display: none;
}

	section, .panel-group .panel{
		background-color: transparent !important;
		fill: transparent !important;
	}

	body {
		    background-color: #000000;
	    background-image: linear-gradient( to right, black, #252525 );
	}

	.btn-default:hover {
		background-color: #323232;
	    border: 1px solid #323232	;
	    color: #fcd103;
	}
	@media only screen and (max-width: 600px){
		.m-firstSelects{
			margin-bottom: 0px;
		}
	}


	/* 
	## ##  ##  ##  ##  ## ##  ## ##  ##  ##  ##
	## ##  ##  ##  ##  ## ##  ## ##  ##  ##  ##
	for input search style  with magnifying glass
	## ##  ##  ##  ##  ##  ## ##  ## ##  ##  ## 
	## ##  ##  ##  ##  ##  ## ##  ## ##  ##  ## 
	*/


	.inputSearch {
	  padding: 10px;
	  border: 2px solid white!important;
	  float: left;
	  width: 90%!important;
	  background: white;
	  border-bottom-left-radius: 30px!important;
	  border-bottom-right-radius: unset!important;
	  border-top-right-radius: unset!important;
	  border-top-left-radius: 30px!important;
	}

	.magnifyingGlass {
	  float: left;
	  width: 10%!important;
	  padding: 10px;
	  background: #fdcf06;
	  color: #fdcf06;
	  font-size: 17px;
	  border: 1px solid grey;
	  border-left: none;
	  cursor: pointer;
	  margin-top: unset!important;
	  border-top-right-radius: 30px!important;
	 border-bottom-right-radius: 30px!important;
	}

	/*
	form.b-blog__aside-search::after {
	  content: "";
	  clear: both;
	  display: table;
	}*/
	.search-div{
		height: 50px;
	}
	.magnifying-icon{
		color: #fdcf06!important;

	}

	.nav-pills>li>a{
		font-weight: 800;
		font-size: 15px;
		color: #fdcf07;
	}
	.nav-pills>li>a{
		font-weight: 800;
		font-size: 15px;
		color: #fdcf07;
	}
	a#dropdownMenu1{
		cursor: pointer;
		/*position: relative;
	    display: block;
	    padding: 10px 15px;
	    font-weight: 800;
		color: #fdcf07;*/
	}
	.open{
		background-color: unset!important;
	}
	.nav-pills>li>a:hover{
		background-color: unset;
		text-decoration: underline;
	}
	.tag-line{
			height: auto;
			width: 70%!important;
			float: right;
		}
		a.dpm {
	    color: #555!important;
	    font-weight: 800!important;
	    font-size: 16px;
	}
	.dropdown-menu{
		width: 100%
	}
	a.dpm:hover {
	    background-color: #fdcf07!important;
	}

	.suggestions{
		text-align: left;
		position: absolute;
		transition: all 0.3s ease-in-out;
	    height: 250px;
		transition: all 0.3s ease-in-out; 


	}
	.suggestions-div{
	    /*height: 250px;*/
		/*position: absolute!important;*/
		/*overflow-y: auto;*/

	}
	.scrollySuggestion{
		/*overflow-y: auto;*/
	    height: 250px;
		overflow-y: auto;
		z-index: 99;
		

	}


	.nav .open>a, .nav .open>a:hover, .nav .open>a:focus{
			    background-color: #ffffff00!important;
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
	@media only screen and (max-width: 650px){
		.tag-line{
			display: none;
			height: auto;
			width: 50%!important;
		}
		.nav-pills>li>a{
			font-weight: 800;
			font-size: 13px;
			color: #fdcf07;
		}
	}
	@media only screen and (max-width: 500px){
		.search-div{
			/*width: 110%;*/
		}
		.nav-pills>li>a{
			font-weight: 800;
			font-size: 11px;
			color: #fdcf07;
		}
		.nav {
	        padding-left: 65px;
		}
		.inputSearch{
			/*width: 60%!important;*/
		}

	}
	@media only screen and (max-width: 450px){
		.nav {
		    padding-left: 30px;
		}
		.nav-pills>li>a{
			font-weight: 800;
			font-size: 11px;
			color: #fdcf07;
		}
	}
	@media only screen and (max-width: 380px){
		.nav-pills>li>a{
			font-weight: 800;
			font-size: 11px;
			color: #fdcf07;
		}
		.nav {
		    padding-left: 11px;
		}
	}

	@media only screen and (max-width: 320px){
		.nav-pills>li>a{
			font-weight: 800;
			font-size: 9px;
			color: #fdcf07;
		}
	}


	</style>
	<section class="b-error home2">
	<!-- new nav bar for home start -->
	<div class="fixed-top">
			<ul class="nav nav-pills">
			  <li role="presentation" class="dropdown">
			  	<a id="dropdownMenu1" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">MOTORCYCLES <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			  		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>" class="dpm">NEW</a></li>
					    <li><a href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>" class="dpm">REPO</a></li>
					    <li><a class="dpm <?php echo ( $this->router->fetch_class() == 'compare' ? 'active' : ''); ?>" href="<?php echo base_url('compare')?>">COMPARE <?php if ( $this->cart->total_items() != 0 ):?>
	                                        <span class="no_items">
	                                        <?php echo $this->cart->total_items() ?>
	                                        </span>
	                                        <?php endif?></a>
	                            </li>
	<!-- 				    <li role="separator" class="divider"></li>
					    <li><a href="#">Separated link</a></li> -->
					  </ul>
			  </li>
			  <li role="presentation"><a href="<?php echo base_url('mgclub') ?>">MG CLUB</a></li>
			  <li role="presentation"><a class="<?php echo ( $this->router->fetch_class() == 'blogs' ? 'active' : ''); ?>" href="<?php echo base_url('blogs')?>">MG NEWS & BLOGS</a></li>
			  <p class="navbar-text navbar-right"><img class="tag-line" src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>"></p>
			</ul>
		</div>
	<!-- new nav bar for home end -->
		<div class="container">
			<center><img class="img img-responsive" src="<?php echo SITE_IMG_PATH?>motogarahe_logo.png" alt=""></center>
			<!-- <h3 class="s-title">The easiest way to buy a motorcycle</h3> -->
			<h3 class="s-title zoomInUp" data-wow-delay="0.7s">Search .</h3>
			<h3 class="s-title zoomInUp" data-wow-delay="0.7s">Compare .</h3>
			<h3 class="s-title zoomInUp" data-wow-delay="0.7s">Purchase</h3>
			<!-- <div>The easiest way to buy a motorcycle</div> -->
			<form class="b-blog__aside-search" id="formmm" method="post">
				<div class="search-div">
					<input class="inputSearch search-mot" onfocus="inputIn()"  onfocusout="inputOut()" autocomplete="off" type="text" name="mot_model" value="" placeholder="What motorcycle is on your mind?" inputmode="search"/>
					<button type="button"  class="magnifyingGlass" ><span class="fa fa-search magnifying-icon"></span></button>
				</div> 
				<div class="suggestions-div">
					<ul class="suggestions list-group" style="">
					</ul> 
				</div>
				<div id="accordion" class="panel-group">
				    <div class="panel">
				      <div class="panel-heading">
				      <h4 class="panel-title">
				        <a href="#panelBodyOne" class="accordion-toggle adv-search" data-toggle="collapse" data-parent="#accordion">Advance Search</a>
				        </h4>
				      </div>
				      <div id="panelBodyOne" class="panel-collapse collapse">
				      <div class="panel-body">
				      		<div class="panel-search">
				        	<div class="container-fluid">
				        		<div class="row">
									<div class="col-xs-12 col-md-12">
										<div class="m-firstSelects">
											<div class="col-xs-6">
												<select name="mot_brand">
													<option selected value>Brand</option>
													<!--<option value="Kymco">Kymco</option>-->
													<option value="Kawasaki">Kawasaki</option>
													<option value="Yamaha">Yamaha</option>
													<option value="Suzuki">Suzuki</option>
													<option value="Honda">Honda</option>
													<option value="Euro-Motor">Euro-Motor</option>
													<option value="Keeway">Keeway</option>
													<option value="SYM">Sym</option>
													<option value="Vespa">Vespa</option>
													<option value="Kymco">Kymco</option>
													<!--<option value="BMW">BMW</option>-->
													<option value="KTM">KTM</option>
													<option value="TVS">TVS</option>
													<!--<option value="Moto-Morini">Moto-Morini</option>-->
													<!--<option value="Motoguzzi">Motoguzzi</option>-->
													<!--<option value="Aprilia">Aprilia</option>-->
													<option value="Benelli">Benelli</option>
                                                    <option value="TVS">TVS</option>
                                                    <option value="Bajaj">Bajaj</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
											<div class="col-xs-6">
												<select name="mot_type">
													<option selected value>Category</option>
													<option value="Scooter">Scooter</option>
													<!--<option value="Backbone">Backbone</option>-->
													<option value="Underbone">Underbone</option>
													<option value="Business">Business</option>
													<!--<option value="Big-Bike">Big-Bike</option>-->
													<option value="Sports">Sports</option>
													<option value="Adventure">Adventure</option>
													<option value="Café">Café</option>
													<option value="Cruiser">Cruiser</option>
													<option value="Naked">Naked</option>
													<option value="Off-Road">Off-Road</option>
													<option value="Retro">Retro</option>
													<option value="Sport-Touring">Sport-Touring</option>
													<option value="Dual-Sport">Dual-Sport</option>
													<option value="Supermoto">Supermoto</option>
													<option value="Scrambler">Scrambler</option>
													<option value="Touring">Touring</option>
													<option value="Adventure-Touring">Adventure-Touring</option>
													<!--<option value="ATV">ATV</option>-->
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
											<!-- <div class="col-xs-4">
												<select name="status">
													<option selected value>Status</option>
													<option value="USED">USED</option>
													<option value="NEW">NEW</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div> -->
										</div>
										<div class="m-firstSelects">

											<!-- <div class="col-xs-2 hidden-xs">
											</div> -->
											<div class="col-xs-4">
												<select name="mot_transmission">
													<option selected value>Transmission</option>
													<option value="Automatic">Automatic</option>
													<option value="Manual">Manual</option>
													
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
											<div class="col-xs-4">
												<select name="mot_diplacement">
													<option selected value>Displacement</option>
													<option value="100">100cc</option>
													<option value="125">125cc</option>
													<option value="150">150cc</option>
													<option value="200">200cc</option>
													<option value="300">300cc</option>
													<option value="400">400cc</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
											<div class="col-xs-4">
												<a href="" class="adv-btn btn"> Submit </a>
												
											</div>
											
										</div>
										<!-- <hr>
										<div class="m-secondSelects">
											<div class="col-xs-8"></div>
											<div class="col-xs-4">
												<button type="button" class="btn m-btn advance-search" style="transform:inherit;margin-top:initial;background-color:#fdcf09;width:100%;position:initial;border-radius:5px;padding:10px;">Search</button>
											</div>	
										</div> -->
										<!-- <div class="m-secondSelects">
											<div class="col-xs-4">
												<select name="select4">
													<option value="0" selected="selected">Fuel System</option>
													<option value="1">Min Year</option>
													<option value="2">Min Year</option>
													<option value="3">Min Year</option>
													<option value="4">Min Year</option>
													<option value="5">Min Year</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
											<div class="col-xs-4">
												<select name="select5">
													<option value="0" selected="selected">Displacement</option>
													<option value="1">Max Year</option>
													<option value="2">Max Year</option>
													<option value="3">Max Year</option>
													<option value="4">Max Year</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div> -->
											<!-- <div class="col-xs-4">
												<div class="b-search__main-form-range">
													<label>PRICE RANGE</label>
													<div class="slider"></div>
													<input type="hidden" name="min" class="j-min" value="" />
													<input type="hidden" name="max" class="j-max" value="" />
												</div>
											</div> -->
											<!-- <div class="col-xs-4">
												<select name="select5">
													<option value="0" selected="selected">Engine Type</option>
													<option value="1">Max Year</option>
													<option value="2">Max Year</option>
													<option value="3">Max Year</option>
													<option value="4">Max Year</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div> -->
									</div>
								</div>
				        	</div>  
				        </div>
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<div style="display: none;" class="col-md-offset-2 col-md-4">
				  		<button type="submit" name="search_mode" value="search_mode" class="btn btn-default submitSearch">New Motorcycles</button>
				  	</div>
				  	<!-- <div class="col-md-offset-2 col-md-4">
				  		<a href="<?php echo base_url('motorcycles/index/all/brand/Scooter/transmission/diplacement/engine-type')?>" class="btn btn-default repo">New Motorcycles</a>
				  	</div> -->
				  	<!-- <div class="col-md-offset-2 col-md-4">
				  		<a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type/')?>" class="btn btn-default repo">New Motorcycles</a>
				  	</div> -->
				  	<!-- <div class="col-md-4">
				  		<a  class="btn btn-default repo" href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">Repo Motorcycles</a>
				  	</div> -->
				  </div>
			</form>
		</div>
		<!-- <img alt="audi" src="<?php echo SITE_IMG_PATH?>backgrounds/404Bg.png" class="img-responsive center-block b-error-img" /> -->
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


	<script type="text/javascript">

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
			$(".search-mot").val(slug);
			setTimeout(function(){$(".magnifyingGlass").trigger("click");},800)
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
					getMobileOperatingSystem("open");
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

				getMobileOperatingSystem("close");

			},150);	
		}
		$(document).ready(function(){
			getMobileOperatingSystem();
			var fixHeight = $(".inputSearch").outerHeight();
			var searcdiv = $(".search-div").width();
			$(".suggestions").css("width", searcdiv+"px");
			var convertheight =  fixHeight + "px";
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

			$(".inputSearch").css("height", convertheight);
			$(".magnifyingGlass").css("height", convertheight);
			

			// magniyfying trigger click function 
			$(".magnifyingGlass").click(function(){
				$(".submitSearch").trigger("click");
			});
			// advanced search submit
			$(".adv-btn").click(function(e){
			    e.preventDefault();
				$(".submitSearch").trigger("click");
			});
		});
	</script>


	<!-- <script>
		$( ".advance-search" ).click(function() {
			  $('#formmm').submit(function (evt) {
		   evt.preventDefault(); //prevents the default action

		}
		});
	</script> -->
