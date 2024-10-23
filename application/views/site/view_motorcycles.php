<style>
	a {
		text-decoration: none !important
	}
	.b-items {
		padding-top: 50px
	}
	.b-items__cars-one-img-check span.fa {
	    display: block;
	    padding: 5px 8px;
	    border-radius: 5px;
	    background-color: #337ab7;
	    color: #fff;
	    /* box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); */
	    -webkit-box-shadow: 0px 3px 0px rgba(0, 0, 0, 0.3);
	    -moz-box-shadow: 0px 3px 0px rgba(0, 0, 0, 0.3);
	    box-shadow: 0px 3px 0px rgba(0, 0, 0, 0.3);
	    cursor: pointer;
	}
	.b-items__cell .b-items__cars-one-img-check {
	    border: none;
	    background-color: transparent;
	    top: 5px;
	    cursor: pointer;
	    right: 15px;
	}

	.panel, .panel-group .panel-heading+.panel-collapse>.panel-body{
	    border: none;
	    box-shadow:none;
	}
	.panel-heading {
	    padding: 0px 20px;
	}

	.b-items__cell {
	    padding: 10px !important;
	    border: 1px solid #fff;
	    padding-bottom: 25px;
	    margin-bottom: 40px;
	    height: auto;
	    /*height: 300px;*/
	    position: relative;
	}

	.view_motor {
		background-color: #fff;
	}

	.b-items__cell {
		background-color: #fff;
		/*box-shadow: 0 2px 8px 0 rgba(0,0,0,.05);*/
	}

	.b-items__cell-info-title {
		padding-bottom: 0px !important;
		margin-bottom: 0px;
		border-bottom: none;
	}

	.b-items__cell-info a.btn.m-btn {
		   /* position: initial;
	    bottom: 15px;
	        border-radius: 0px;
	            padding: 10px 0px !important;
    width: 48%;
    margin-top: 0px;*/

    		    position: initial;
	    bottom: 15px;
	    border-radius: 0px;
	    padding: 0px !important;
	    margin-top: 0px;
	    border: none !important;
	    background-color: transparent !important;
	    font-size: 12px !important;
	    margin-right: 20px !important;
	    color: #908b73 !important
	    /*color:#face0b !important;*/
	}

	.b-items__cell-info a.btn.m-btn:nth-child(2){
		text-align: right;
	}

	.view-btn {
		border-color: #FACE0B !important;
		color:#111 !important;
		background-color: #FACE0B !important;
	}

	.s-lineDownLeft:after {
		display: none
	}

	.b-items__aside-main-body {
		background-color: #fff;
	}

	.b-items__aside-main-body-item label {
		color: #111;
	}

	.b-items__aside-main-body-item input, .b-items__aside-main-body-item select {
		background-color: #fbfbfb;
		border-radius: 0px;
		padding: 10px;
		border: 1px solid #d4d4d4;
		color: #444;
	}

	.b-items__aside-main-body-item > div select + span.fa {
		color: #444;
	}

	.b-items__aside-main-footer {
		background-color: #fff;
		padding-top:0px;
	}

	.b-items__aside-main-footer button {
		background-color: #444 !important;
		border: 1px solid #444 !important;
		 padding: 10px 0px !important;
		 width: 80%;
		 border-radius: 0px !important;
	}

	.b-items__aside-main-footer button.btn.m-btn:hover {
		color:#fff !important;
	}

	.b-items__aside-main-body {
		padding-top: 0px;
	}

	.panel-heading  {
		text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
	}

	.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
		    z-index: 2;
    color: #444;
    cursor: default;
    background-color: #face0b;
    border-color: #face0b;
	}

	.pagination > li > a, .pagination > li > span {
		color: #444;
	}

	.panel-title>a {
		border: 0;
	    text-shadow: 0px 1px 0px #3071a9;
	    /*background-color: #428bca;*/
	    /*-webkit-box-shadow: 0px 6px 0px #3071a9;*/
	    /*-moz-box-shadow: 0px 6px 0px #3071a9;*/
	    /*box-shadow: 0px 6px 0px #3071a9;*/
	    position: relative;
	    border: 0 !important;
	    cursor: pointer;
	    -webkit-font-smoothing: antialiased;
	    font-weight: bold !important;
	    -webkit-border-radius: 10px;
	    -webkit-background-clip: padding-box;
	    -moz-border-radius: 10px;
	    -moz-background-clip: padding;
	    border-radius: 10px;
	    background-clip: padding-box;
	    -webkit-transition: all 50ms ease;
	    -moz-transition: all 50ms ease;
	    -o-transition: all 50ms ease;
	    transition: all 50ms ease;
	    border: 0;
	    text-shadow: 0px 1px 0px #999999;
	    background-color: #cccccc;
	    /*-webkit-box-shadow: 0px 6px 0px #999999;*/
	    /*-moz-box-shadow: 0px 6px 0px #999999;*/
	    /*box-shadow: 0px 6px 0px #999999;*/
	    border: 0;
	    text-shadow: 0px 1px 0px #ffffff;
	    background-color: #face0b;
	    /*-webkit-box-shadow: 0px 6px 0px #3071a9;*/
	    /*-moz-box-shadow: 0px 6px 0px #3071a9;*/
	    /*box-shadow: 0px 6px 0px #a2891a;*/
	    padding: 3px 45px;
	    text-decoration: none;
	    border-radius: 5px;
	}
	.b-items__cell-info b {
		font-weight: normal
	}

	.b-items__cell-info>p {
	    font: 300 13px open sans,sans-serif;
	    margin: 0 0px 3px;
	    font-size: 12px;
	}

	.b-items__cell-info {
		padding: 0px;
		position: relative;
	}
		
	.panel-group {
		    box-shadow: 0 2px 8px 0 rgba(0,0,0,.05);

   		 border: 1px solid #eeeeee;
	}


	 /* overide css */
	 .panel-heading-filter{
	    background-color: #f4cf14 !important;
	    border: 1px solid #f4cf14 !important;
	    padding: 10px 0px !important;
	    width: 80%;
	    border-radius: 0px !important;
	    color: black;
	 }

	
	 .b-items__cars-one-img.img-hover-zoom--quick-zoom {
		    z-index: 9999;
		}
	    /* Quick-zoom Container */
	.img-hover-zoom--quick-zoom img {
	  transform-origin: 0 0;
	  transition: transform .25s, visibility .25s ease-in;
	}

	/* The Transformation */
	.img-hover-zoom--quick-zoom:hover img {
	  transform: scale(1.1);
	}

	.b-items__cars-one-img {
		float: initial;
	}
	/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

	/* [1] The container */
	.img-hover-zoom {
	  z-index: 999;
	  height: initial; /* [1.1] Set it as per your need */
	  overflow: hidden; /* [1.2] Hide the overflowing of child elements */
	}

	/* [2] Transition property for smooth transformation of images */
	.img-hover-zoom img {
	  transition: transform .5s ease;
	}

	/* [3] Finally, transforming the image when container gets hovered */
	.img-hover-zoom:hover img {
	  transform: scale(1.1);
	}

	.brand_logo {
		    position: absolute;
	    width: 40px;
	    bottom: 0px;
	    right: 0px;

	}

	.cmp-btn{
		padding: 5px 18px!important;
		border: 1px solid #928d6c !important;
		position: initial;
	    bottom: 8px;
	    margin-top: 0px;
	    background-color: transparent !important;
	    font-size: 12px !important;
	    margin-right: 20px !important;
	    color: #908b73 !important /*color:#face0b !important;*/;
	    margin-top: unset!important;
	    border-radius: 0px!important
	}
	.cmp-btn:hover{
		background-color: #444444!important;
		color: white!important;
	}

	.mobile{
		display: none;
	}

    @media only screen and (max-width: 950px){
      
        .pl-65{
            padding-left: unset;
        }
      
        
    }
    @media only screen and (max-width: 600px){
      
        
        .mb-20{
        	margin-bottom: 20px;
        }
        .mobile{
        	display: block;
        }
        .desktop-tablet{
        	display: none;
        }
        .b-items {
			padding-top: 0;
		}
		.panel-heading {
		    text-align: center;
		    padding-top: 0px;
		    padding-bottom: 0px;
		}
		.hide-xs{
			display: none!important;
		}
		.panel-group {
		    margin-bottom: 0;
		}
        
    }

    @media only screen and (max-width:495px){
      
        .b-items__cell {
		    height: 180px !important;
		    margin-bottom: 45px;
		}        
    }

</style>		

<script>
	$(document).ready(function(){
	  var windowWidth = $(window).width();
	  if(windowWidth <= 767) //for iPad & smaller devices
	     $('.panel-collapse').removeClass('in')
	});
</script>

		<!-- <section class="b-pageHeader">
			<div class="container">
				<h1 class=" zoomInLeft" data-wow-delay="0.5s">Search Results</h1>
				<div class="b-pageHeader__search zoomInRight" data-wow-delay="0.5s">
					<h3>Get In Touch With Us Now</h3>
				</div>
			</div>
		</section> -->
		<!--b-pageHeader-->

		<!-- <div class="b-breadCumbs s-shadow">
			<div class="container zoomInUp" data-wow-delay="0.5s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listTableTwo.html" class="b-breadCumbs__page m-active">Search Results</a>
			</div>
		</div> --><!--b-breadCumbs-->

		
		<div class="b-items view_motor">
			<div class="container">
				<div class="row">
					<!-- <div class="col-xs-12">
						<?php echo $map['html']; ?>
					</div> -->
					<div class="col-lg-3 col-sm-4 col-xs-12 desktop-tablet">
						<div id="accordion" class="panel-group">
							<div class="panel">
						      <div class="panel-heading">
						      <h4 class="">
						        <a href="#panelBodyOne" class="accordion-toggle btn m-btn panel-heading-filter" data-toggle="collapse" data-parent="#accordion">FILTER SEARCH</a>
						        </h4>
						      </div>
						      <div id="panelBodyOne" class="panel-collapse collapse in">
						      <div class="panel-body">
						      	<aside class="b-items__aside">
									<div class="b-items__aside-main zoomInUp" data-wow-delay="0.5s">
										<form method="post">
											<!-- <input type="hidden" id="lat" value="">
											<input type="hidden" id="lng" value=""> -->
											<div class="b-items__aside-main-body">
												<div class="b-items__aside-main-body-item">
													<label>Model Name</label>
													<input autocomplete="off" placeholder="" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" inputmode="search">
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Brand</label>
													<div>
														<select name="mot_brand" class="m-select">
															<option value>All</option>
															<!--<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>-->
															<option <?php echo 'Kawasaki' == $mot_brand ? 'selected' : '' ?> value="Kawasaki">Kawasaki</option>
															<option <?php echo 'Yamaha' == $mot_brand ? 'selected' : '' ?> value="Yamaha">Yamaha</option>
															<option <?php echo 'Suzuki' == $mot_brand ? 'selected' : '' ?> value="Suzuki">Suzuki</option>
															<option <?php echo 'Honda' == $mot_brand ? 'selected' : '' ?> value="Honda">Honda</option>
															<option <?php echo 'Euro-Motor' == $mot_brand ? 'selected' : '' ?> value="Euro-Motor">Euro-Motor</option>
															<option <?php echo 'Vespa' == $mot_brand ? 'selected' : '' ?> value="Vespa">Vespa</option>
															<option <?php echo 'Keeway' == $mot_brand ? 'selected' : '' ?> value="Keeway">Keeway</option>
															<option <?php echo 'SYM' == $mot_brand ? 'selected' : '' ?> value="Sym">Sym</option>
															<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>
														    <option <?php echo 'Ducati' == $mot_brand ? 'selected' : '' ?> value="Ducati">Ducati</option>
														    <option <?php echo 'BMW' == $mot_brand ? 'selected' : '' ?> value="BMW">BMW</option>
														    <option <?php echo 'KTM' == $mot_brand ? 'selected' : '' ?> value="KTM">KTM</option>
														    <option <?php echo 'Moto-Morini' == $mot_brand ? 'selected' : '' ?> value="Moto-Morini">Moto-Morini</option>
														    <option <?php echo 'Motoguzzi' == $mot_brand ? 'selected' : '' ?> value="Motoguzzi">Motoguzzi</option>
														    <option <?php echo 'Aprilia' == $mot_brand ? 'selected' : '' ?> value="Aprilia">Aprilia</option>
														    <option <?php echo 'Benelli' == $mot_brand ? 'selected' : '' ?> value="Benelli">Benelli</option>
														    <option <?php echo 'TVS' == $mot_brand ? 'selected' : '' ?> value="TVS">TVS</option>
														    <option <?php echo 'Bajaj' == $mot_brand ? 'selected' : '' ?> value="Bajaj">Bajaj</option>
														    <option <?php echo 'MV-Agusta' == $mot_brand ? 'selected' : '' ?> value="MV-Agusta">MV Agusta</option>
														    <option <?php echo 'CFMOTO' == $mot_brand ? 'selected' : '' ?> value="CFMOTO">CFMOTO</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Category</label>
													<div>
														<select name="mot_type" class="m-select">
															<option value>All</option>
															<option <?php echo 'Big-Bike' == $mot_type ? 'selected' : '' ?> value="Big-Bike">Big Bike</option>
															<option <?php echo 'Scooter' == $mot_type ? 'selected' : '' ?> value="Scooter">Scooter</option>
															<option <?php echo 'Backbone' == $mot_type ? 'selected' : '' ?> value="Backbone">Backbone</option>
															<option <?php echo 'Sports' == $mot_type ? 'selected' : '' ?> value="Sports">Sports</option>
															<option <?php echo 'Underbone' == $mot_type ? 'selected' : '' ?> value="Underbone">Underbone</option>
															<option <?php echo 'Business' == $mot_type ? 'selected' : '' ?> value="Business">Business</option>
															<option <?php echo 'Adventure' == $mot_type ? 'selected' : '' ?> value="Adventure">Adventure</option>
															<option <?php echo 'Café' == $mot_type ? 'selected' : '' ?> value="Café">Café</option>
															<option <?php echo 'Cruiser' == $mot_type ? 'selected' : '' ?> value="Cruiser">Cruiser</option>
															<option <?php echo 'Naked' == $mot_type ? 'selected' : '' ?> value="Naked">Naked</option>
															<option <?php echo 'Off-Road' == $mot_type ? 'selected' : '' ?> value="Off-Road">Off-Road</option>
															<option <?php echo 'Retro' == $mot_type ? 'selected' : '' ?> value="Retro">Retro</option>
															<option <?php echo 'Sport-Touring' == $mot_type ? 'selected' : '' ?> value="Sport-Touring">Sport-Touring</option>
															<option <?php echo 'Dual-Sport' == $mot_type ? 'selected' : '' ?> value="Dual-Sport">Dual-Sport</option>
															<option <?php echo 'Supermoto' == $mot_type ? 'selected' : '' ?> value="Supermoto">Supermoto</option>
															<option <?php echo 'Scrambler' == $mot_type ? 'selected' : '' ?> value="Scrambler">Scrambler</option>
															<option <?php echo 'Touring' == $mot_type ? 'selected' : '' ?> value="Touring">Touring</option>
															<option <?php echo 'Adventure-Touring' == $mot_type ? 'selected' : '' ?> value="Adventure-Touring">Adventure-Touring</option>
															
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<!-- <div class="b-items__aside-main-body-item">
													<label>PRICE RANGE</label>
													<div class="slider"></div>
													<input type="hidden" name="min" value="100" class="j-min" />
													<input type="hidden" name="max" value="1000" class="j-max" />
												</div> -->
												<div class="b-items__aside-main-body-item">
													<label>Transmission</label>
													<div>
														<select name="mot_transmission" class="m-select">
															<option value>All</option>
															<option <?php echo 'Automatic' == $mot_transmission ? 'selected' : '' ?> value="Automatic">Automatic</option>
															<option <?php echo 'Manual' == $mot_transmission ? 'selected' : '' ?> value="Manual">Manual</option>
															
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Displacement</label>
													<div>
														<select name="mot_diplacement" class="m-select">
															<option value>All</option>
															<option <?php echo '100' == $mot_diplacement ? 'selected' : '' ?> value="100">100cc</option>
															<option <?php echo '125' == $mot_diplacement ? 'selected' : '' ?> value="125">125cc</option>
															<option <?php echo '150' == $mot_diplacement ? 'selected' : '' ?> value="150">150cc</option>
															<option <?php echo '200' == $mot_diplacement ? 'selected' : '' ?> value="200">200cc</option>
															<option <?php echo '300' == $mot_diplacement ? 'selected' : '' ?> value="300">300cc</option>
															<option <?php echo '400' == $mot_diplacement ? 'selected' : '' ?> value="400">400cc</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<!-- <div class="b-items__aside-main-body-item">
													<label>Engine Type</label>
													<div>
														<select name="mot_engine_type" class="m-select">
															<option value></option>
															<option <?php echo '4s-sohc-4valve' == $mot_engine_type ? 'selected' : '' ?> value="4s-sohc-4valve">4S SOHC 4VALVE</option>
															<option <?php echo '4s-sohc' == $mot_engine_type ? 'selected' : '' ?> value="4s-sohc">4S SOHC</option>
															<option <?php echo '4s-dohc-2-cylinder' == $mot_engine_type ? 'selected' : '' ?> value="4s-dohc-2-cylinder">4S DOHC 2 CYLINDER</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div> -->
											</div>
											<footer class="b-items__aside-main-footer">
												<button type="submit" name="search_mode" value="search_mode" class="btn m-btn">SUBMIT </button><br />
												<a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>">RESET ALL FILTERS</a>
											</footer>
										</form>
									</div>
								</aside>		
						      </div>
						    </div>
						  </div>
						</div>
						
					</div>
					<div class="col-lg-9 col-sm-8 col-xs-12">
						<div class="row">
							<a href="#" data-toggle="modal" data-target="#promoModal"> 
							<img src="<?php echo base_url('uploads/promo/Banner1023x240.jpg') ?>" alt="" style="width: 100%; margin-bottom: 10px;">
							</a>
						</div>
						<!-- mobile accodion start -->
						<div id="accordion" class="panel-group mobile">
							<div class="panel">
						      <div class="panel-heading">
						      <h4 class="">
						        <a href="#panelBodyTwo" class="accordion-toggle btn m-btn panel-heading-filter collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">FILTER SEARCH</a>
						        </h4>
						      </div>
						      <div id="panelBodyTwo" class="panel-collapse collapse ">
						      <div class="panel-body">
						      	<aside class="b-items__aside">
									<div class="b-items__aside-main zoomInUp" data-wow-delay="0.5s">
										<form method="post">
											<!-- <input type="hidden" id="lat" value="">
											<input type="hidden" id="lng" value=""> -->
											<div class="b-items__aside-main-body">
												<div class="b-items__aside-main-body-item">
													<label>Model Name</label>
													<input autocomplete="off" placeholder="" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" inputmode="search">
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Brand</label>
													<div>
														<select name="mot_brand" class="m-select">
															<option value>All</option>
															<!--<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>-->
															<option <?php echo 'Kawasaki' == $mot_brand ? 'selected' : '' ?> value="Kawasaki">Kawasaki</option>
															<option <?php echo 'Yamaha' == $mot_brand ? 'selected' : '' ?> value="Yamaha">Yamaha</option>
															<option <?php echo 'Suzuki' == $mot_brand ? 'selected' : '' ?> value="Suzuki">Suzuki</option>
															<option <?php echo 'Honda' == $mot_brand ? 'selected' : '' ?> value="Honda">Honda</option>
															<option <?php echo 'Euro-Motor' == $mot_brand ? 'selected' : '' ?> value="Euro-Motor">Euro-Motor</option>
															<option <?php echo 'Keeway' == $mot_brand ? 'selected' : '' ?> value="Keeway">Keeway</option>
															<option <?php echo 'SYM' == $mot_brand ? 'selected' : '' ?> value="Sym">Sym</option>
															<option <?php echo 'Vespa' == $mot_brand ? 'selected' : '' ?> value="Vespa">Vespa</option>
															<option <?php echo 'Ducati' == $mot_brand ? 'selected' : '' ?> value="Ducati">Ducati</option>
															<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>
															<option <?php echo 'BMW' == $mot_brand ? 'selected' : '' ?> value="BMW">BMW</option>
															<option <?php echo 'KTM' == $mot_brand ? 'selected' : '' ?> value="KTM">KTM</option>
															<option <?php echo 'TVS' == $mot_brand ? 'selected' : '' ?> value="TVS">TVS</option>
															<option <?php echo 'Moto-Morini' == $mot_brand ? 'selected' : '' ?> value="Moto-Morini">Moto-Morini</option>
															<option <?php echo 'Motoguzzi' == $mot_brand ? 'selected' : '' ?> value="Motoguzzi">Motoguzzi</option>
															<option <?php echo 'Aprilia' == $mot_brand ? 'selected' : '' ?> value="Aprilia">Aprilia</option>
															<option <?php echo 'Bajaj' == $mot_brand ? 'selected' : '' ?> value="Bajaj">Bajaj</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Category</label>
													<div>
														<select name="mot_type" class="m-select">
															<option value>All</option>
															<option <?php echo 'Big-Bike' == $mot_type ? 'selected' : '' ?> value="Big-Bike">Big Bike</option>
															<option <?php echo 'Scooter' == $mot_type ? 'selected' : '' ?> value="Scooter">Scooter</option>
															<option <?php echo 'Backbone' == $mot_type ? 'selected' : '' ?> value="Backbone">Backbone</option>
															<option <?php echo 'Underbone' == $mot_type ? 'selected' : '' ?> value="Underbone">Underbone</option>
															<option <?php echo 'Business' == $mot_type ? 'selected' : '' ?> value="Business">Business</option>
															<!-- <option <?php echo 'ATV' == $mot_type ? 'selected' : '' ?> value="ATV">ATV</option> -->
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<!-- <div class="b-items__aside-main-body-item">
													<label>PRICE RANGE</label>
													<div class="slider"></div>
													<input type="hidden" name="min" value="100" class="j-min" />
													<input type="hidden" name="max" value="1000" class="j-max" />
												</div> -->
												<div class="b-items__aside-main-body-item">
													<label>Transmission</label>
													<div>
														<select name="mot_transmission" class="m-select">
															<option value>All</option>
															<option <?php echo 'Automatic' == $mot_transmission ? 'selected' : '' ?> value="Automatic">Automatic</option>
															<option <?php echo 'Manual' == $mot_transmission ? 'selected' : '' ?> value="Manual">Manual</option>
															
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Displacement</label>
													<div>
														<select name="mot_diplacement" class="m-select">
															<option value>All</option>
															<option <?php echo '100' == $mot_diplacement ? 'selected' : '' ?> value="100">100cc</option>
															<option <?php echo '125' == $mot_diplacement ? 'selected' : '' ?> value="125">125cc</option>
															<option <?php echo '150' == $mot_diplacement ? 'selected' : '' ?> value="150">150cc</option>
															<option <?php echo '200' == $mot_diplacement ? 'selected' : '' ?> value="200">200cc</option>
															<option <?php echo '300' == $mot_diplacement ? 'selected' : '' ?> value="300">300cc</option>
															<option <?php echo '400' == $mot_diplacement ? 'selected' : '' ?> value="400">400cc</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<!-- <div class="b-items__aside-main-body-item">
													<label>Engine Type</label>
													<div>
														<select name="mot_engine_type" class="m-select">
															<option value></option>
															<option <?php echo '4s-sohc-4valve' == $mot_engine_type ? 'selected' : '' ?> value="4s-sohc-4valve">4S SOHC 4VALVE</option>
															<option <?php echo '4s-sohc' == $mot_engine_type ? 'selected' : '' ?> value="4s-sohc">4S SOHC</option>
															<option <?php echo '4s-dohc-2-cylinder' == $mot_engine_type ? 'selected' : '' ?> value="4s-dohc-2-cylinder">4S DOHC 2 CYLINDER</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div> -->
											</div>
											<footer class="b-items__aside-main-footer">
												<button type="submit" name="search_mode" value="search_mode" class="btn m-btn">SUBMIT </button><br />
												<a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>">RESET ALL FILTERS</a>
											</footer>
										</form>
									</div>
								</aside>		
						      </div>
						    </div>
						  </div>
						</div>
						<!-- mobile accodion end -->


						<div class="row m-border">

							<?php if ( empty($motorcycles) ):?>
					            <div class="col-lg-12 col-md-12 col-xs-12">
					            	<hr class="mt-2 mb-5 hide-xs">
					                <div class="alert alert-danger">
					                  <strong>No Results!</strong> Your search did not match any listings..
					                </div>
					            </div>
					        <?php  else: ?>    
					        	<div class="col-lg-12 col-md-12 col-xs-12">
					        		<hr class="mt-2 mb-5 hide-xs">
					                <h4><strong>Results found for</strong> <?php echo $mot_model != 'all' ? $mot_model : ''?></h4>
					            </div>
					        <?php  endif; ?>

							<?php if ( isset( $motorcycles ) ):$x=1;?>
                            <?php foreach($motorcycles as $motorcycle): ?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 zoomInUp mb-20" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>">
										<span class="b-items__cars-one-img img-hover-zoom">
										
											<?php if ( $motorcycle['mop_image'] == 'none' ):?>
	                                            <img class='img-responsive  img-result' src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt='<?php echo $motorcycle['mot_model']?>'/>
	                                        <?php else:?>
	                                            <img class='img-responsive  img-result' src="<?php echo base_url() . $motorcycle['mop_image']?>" alt='<?php echo $motorcycle['mot_model']?>'/>
	                                        <?php endif;?> 
											
										</span>
									</a>
									<div class="b-items__cell-info">
				
											<!-- <!<div class="s-lineDownLeft b-items__cell-info-title">
												<a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>">
											
												</a>
											</div> -->
											
											<a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>">
												<span>
													<h2 class="mot_header" style="margin-bottom: 5px;font-weight: 700;color: #000; line-height:1.2;"><?php echo $motorcycle['mot_brand']?>  <?php echo $motorcycle['mot_model']?></h2>
												</span>
											</a>
											<h2 style="margin-bottom: 5px;font-weight: 700;color:#e44d26;">₱<?php echo number_format( $motorcycle['mot_srp'], 2) ?></h2>
											<!-- <b><p><?php echo $motorcycle['mot_brand']?></p></b> -->

										
											<!-- <a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>" class="btn m-btn view-btn" style="left:15px;">View Details</a> -->

											<a href="<?php echo base_url('compare') . "/add_new_motorcycle/" . $motorcycle['mot_id']?>" class="btn cmp-btn" style="right:15px;"><i class="fa fa-plus"></i> Compare</a>
											<!-- <h5 class="b-items__cell-info-price"><span>Price:</span> &#8369;<?php echo number_format( $motorcycle['dem_price'], 2) ?></h5> -->

											<?php if ( $motorcycle['mot_brand'] == 'Kawasaki' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/kawasakilogo80x80.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'Yamaha' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/yamahalogo80x80.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'Kymco' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/kymco80x80.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'Suzuki' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/suzukilogo80x80.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'Euro-Motor' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/euro-motors80x80-2.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'Keeway' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/keeway2new80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Vespa' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/vespa80x80.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'SYM' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/sym80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Motoguzzi' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/motoguzzi80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Aprilia' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/aprilia80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Moto-Morini' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/moto-morini80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Ducati' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/ducati80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'BMW' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/bmw80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'KTM' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/ktm80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'TVS' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/tvs80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Bajaj' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/bajaj80x80.png'; ?>" alt="">
												<?php elseif( $motorcycle['mot_brand'] == 'Benelli' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/benelli80x80.png'; ?>" alt="">
											<?php elseif( $motorcycle['mot_brand'] == 'Honda' ):?>
												<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/hondalogo80x80.png'; ?>" alt="">
											<?php endif;?>

									</div>
								</div>
							</div>
							<?php endforeach;?>
								
                        	<?php endif;?>
						</div>
						<?php echo $this->pagination->create_links(); ?>
						<!-- <div class="b-items__pagination">
							<div class="b-items__pagination-main zoomInUp" data-wow-delay="0.5s">
								<a data-toggle="modal" data-target="#myModal" href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
								<span class="m-active"><a href="#">1</a></span>
								<span><a href="#">2</a></span>
								<span><a href="#">3</a></span>
								<span><a href="#">4</a></span>
								<a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>    
							</div>
						</div> -->
					</div>
					<!-- hide on tablet accordion mobile start -->
					
					<!-- hide on tablet accordion mobile end -->
				</div>
			</div>
		</div><!--b-items-->

	
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

		<script>
			(function( $ ) {
			    // the sameHeight functions makes all the selected elements of the same height
			    $.fn.sameHeight = function() {
			        var selector = this;
			        var heights = [];

			        // Save the heights of every element into an array
			        selector.each(function(){
			            var height = $(this).height();
			            heights.push(height);
			        });

			        // Get the biggest height
			        var maxHeight = Math.max.apply(null, heights);
			        // Show in the console to verify
			        console.log(heights,maxHeight);

			        // Set the maxHeight to every selected element
			        selector.each(function(){
			            $(this).height(maxHeight);
			        }); 
			    };
			 
			}( jQuery ));

			$('.mot_header').sameHeight();

			$(window).resize(function(){
			    // Do it when the window resizes too
			    $('.mot_header').sameHeight();
			});
		</script>