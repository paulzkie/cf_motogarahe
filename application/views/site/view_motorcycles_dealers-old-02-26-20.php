<style>
	/*.b-topBar{display: none;}*/
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

	.b-items__cars-one-img {
	    position: relative;
	    float: left;
	    margin-bottom: 15px;
	        /*background-color: #4444440d;*/
	}

	.panel, .panel-group .panel-heading+.panel-collapse>.panel-body{
	    border: none;
	    box-shadow:none;
	}
	.panel-heading {
	    padding: 0px 20px;
	}

	/*.b-items__cell {
	    height: 655px !important;
	}*/
	.b-items__cell-info-price {
		position: initial;
		margin: 0px;
		margin-bottom: 5px;
	}

	.promo{
		height: 30px;
		/*color:#ffdb00 !important;*/
	}

	.address {
		height: 80px;
	}

	.b-items__cell-info .fa {
		margin-right: 5px;
	}

	.b-items__cell-info a.btn {
		margin-top: 20px;
	}

	.b-items__cell-info a.btn.m-btn {
	    font: 600 15px 'Open Sans',sans-serif!important;
	    margin-top: 0px !important;
	}

	.b-items__cell-info a.btn.compare{
		margin-top: 10px !important;
	}

	/*.b-items__cell-info-title a:after {
	  content: ' ';
	  display: block;
	  height: 20px;
	}

	.b-items__cell-info-title a:before {
	  content: ' ';
	  display: block;
	  height: 20px;
	}*/

	.b-items__cell {
	    padding: 10px !important;
	    border: 1px solid #efefef;
	    padding-bottom: 25px;
	    margin-bottom: 40px;
	    height: auto;
	    position: relative;
	}


	.view_motor {
		background-color: #fff;
	}

	.b-items__cell {
		background-color: #fff;
		box-shadow: 0 2px 8px 0 rgba(0,0,0,.05);
	}

	.b-items__cell-info-title {
		margin: 0px;
		margin-bottom: 5px;
		border-bottom: none;
		padding-bottom: 0px; 
	}

	.b-items__cell-info a.btn.m-btn {
		    position: initial;
	    bottom: 60px;
	        border-radius: 0px;
	            padding: 10px 0px !important;
    width: 100%;
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
	    background-color: #428bca;
	    -webkit-box-shadow: 0px 6px 0px #3071a9;
	    -moz-box-shadow: 0px 6px 0px #3071a9;
	    box-shadow: 0px 6px 0px #3071a9;
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
	    -webkit-box-shadow: 0px 6px 0px #999999;
	    -moz-box-shadow: 0px 6px 0px #999999;
	    box-shadow: 0px 6px 0px #999999;
	    border: 0;
	    text-shadow: 0px 1px 0px #ffffff;
	    background-color: #face0b;
	    -webkit-box-shadow: 0px 6px 0px #3071a9;
	    -moz-box-shadow: 0px 6px 0px #3071a9;
	    box-shadow: 0px 6px 0px #a2891a;
	    padding: 3px 45px;
	    text-decoration: none;
	    border-radius: 5px;
	}

	.b-items__cell-info {
		padding: 0px !important;
	}

	.b-items__cell-info>p {
		font-size: 14px !important;
		margin: 0px;
		margin-bottom: 5px;
		color: #333;
	}

	.b-items__cell-info>p+div {
		margin-top: 5px !important
	}

	.freebies {
		    height: 30px;
	}


	.b-items__cell-info>p:first-child{
		    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100%;
	}

	.b-items__cars-one-info-title {
		color: #333;
		font-size: 14px
	}

	.brand_model {color: #e44d26}

	.panel-group {
	    box-shadow: 0 2px 8px 0 rgba(0,0,0,.05);
	    border: 1px solid #eeeeee;
	}

	.alert {
		margin-bottom: 0px
	}

	.b-best__info-head {
		padding: 0px;
		margin: 0px;
		border:none;
	}

	.table-bordered > tbody > tr > td {
		font-size: 12px;
		color: #525252;
		font-weight: 600;
		border:none;
		padding-left:0px;
		padding-bottom: 2px
	}

	.table-bordered {
		border:none;	
	}

	.selected_ {
		outline:3px solid #face0b;
		/*transform: scale(1.04);*/
	}

	.selected_:hover {
		outline:3px solid red;	
	}

	.remove_dealer {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
		z-index: 20

	}

	.selected_ .remove_dealer {
		display: block
	}

	div.sticky {
	  position: -webkit-sticky;
	      position: sticky;
    top: 0;
    background-color: #333333;
    color: #fff;
    padding: 10px 25px;
    font-size: 14px;
    z-index: 40;
    width: 96.2%;
    margin-left: 2%;
    line-height: 2
	}

	@media (max-width: 991px) {
	    .address, .promo {
	        height: initial
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
				<h1 class=" zoomInLeft" data-wow-delay="0.5s">
					<?php echo empty($motorcycles) ? 'No' : $motorcycles[0]['mot_model']?> Dealers Near You</h1>
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
		<div style="display: none">
			<?php echo $map['html']; ?>
		</div>
		<div class="b-items view_motor motor_dets">
			<div class="container">
				<div class="row">


					<!-- <div class="col-xs-12">
						<?php echo $map['html']; ?>
					</div> -->
					<div class="col-lg-3 col-sm-4 col-xs-12">
						<div id="accordion" class="panel-group">
							<div class="panel">
						      <div class="panel-heading">
						      <h4 class="panel-title">
						        <a href="#panelBodyOne" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Filter Search</a>
						        </h4>
						      </div>
						      <div id="panelBodyOne" class="panel-collapse collapse in">
						      <div class="panel-body">
						      	<aside class="b-items__aside">
									<div class="b-items__aside-main zoomInUp" data-wow-delay="0.5s">
										<form method="post">
											<input type="hidden" id="lat" value="">
											<input type="hidden" id="lng" value="">
											<input type="hidden" id="lng" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>">
											<div class="b-items__aside-main-body">
												<div class="b-items__aside-main-body-item">
													<label>Distance (km)</label>
													<input autocomplete="off" placeholder="" type="text" name="km" value="<?php echo $km?>">
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Location</label>
													<div>
														<select name="loc" class="m-select">
															<option value="">Any Location</option>
															<option <?php echo 'manila' == $loc ? 'selected' : '' ?>  value="manila">Manila, Metro Manila</option>
															<option <?php echo 'angeles' == $loc ? 'selected' : '' ?>  value="angeles">Angeles City</option>
															<option <?php echo 'antipolo' == $loc ? 'selected' : '' ?>  value="antipolo">Antipolo</option>
															<option <?php echo 'baguio' == $loc ? 'selected' : '' ?>  value="baguio">Baguio City</option>
															<option <?php echo 'batangas' == $loc ? 'selected' : '' ?>  value="batangas">Batangas</option>
															<option <?php echo 'cabanatuan' == $loc ? 'selected' : '' ?>  value="cabanatuan">Cabanatuan City</option>
															<option <?php echo 'caloocan' == $loc ? 'selected' : '' ?>  value="caloocan">Caloocan City</option>
															<option <?php echo 'cebu' == $loc ? 'selected' : '' ?>  value="cebu">Cebu City</option>
															<option <?php echo 'davao' == $loc ? 'selected' : '' ?>  value="davao">Davao</option>
															<option <?php echo 'kalibo' == $loc ? 'selected' : '' ?>  value="kalibo">Kalibo</option>
															<option <?php echo 'makati' == $loc ? 'selected' : '' ?>  value="makati">Makati City</option>
															<option <?php echo 'marikina' == $loc ? 'selected' : '' ?>  value="marikina">Marikina City</option>
															<option <?php echo 'pasay' == $loc ? 'selected' : '' ?>  value="pasay">Pasay City</option>
															<option <?php echo 'pasig' == $loc ? 'selected' : '' ?>  value="pasig">Pasig City</option>
															<option <?php echo 'tarlac' == $loc ? 'selected' : '' ?>  value="tarlac">Tarlac City</option>
															<option <?php echo 'zamboanga' == $loc ? 'selected' : '' ?>  value="zamboanga">Zamboanga City</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<!-- <div class="b-items__aside-main-body-item">
													<label>Dealer</label>
													<div>
														<select name="dea_name" class="m-select">
															<option value="" selected="">Any Make</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div> -->
												<!-- <div class="b-items__aside-main-body-item">
													<label>Min Price</label>
													<input autocomplete="off" placeholder="" type="text" name="minprice" value="<?php echo $minprice != 0 ? $minprice : ''?>">
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Max Price</label>
													<input autocomplete="off" placeholder="" type="text" name="maxprice" value="<?php echo $maxprice != 0 ? $maxprice : ''?>">
												</div> -->
												<!-- <div class="b-items__aside-main-body-item">
													<label>PRICE RANGE</label>
													<div class="slider"></div>
													<input type="hidden" name="min" value="100" class="j-min" />
													<input type="hidden" name="max" value="1000" class="j-max" />
												</div> -->
												
											</div>
											<footer class="b-items__aside-main-footer">
												<button type="submit" class="btn m-btn" name="search_mode" value="search_mode">FILTER DEALERS</button><br />
												<!-- <a href="#">RESET ALL FILTERS</a> -->
											</footer>
										</form>
									</div>
									<div class="b-items__aside-sell zoomInUp" data-wow-delay="0.5s">
										<div class="b-items__aside-sell-img">
											<h3>ADDS HERE</h3>
										</div>
										<div class="b-items__aside-sell-info">
											<p>
												Nam tellus enimds eleifend dignis lsim
												biben edum tristique sed metus fusce
												Maecenas lobortis.
											</p>
											<!-- <a href="submit1.html" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></a> -->
										</div>
									</div>
								</aside>		
						      </div>
						    </div>
						  </div>
						</div>
						
					</div>
					<div class="col-lg-9 col-sm-8 col-xs-12">
						<div class="row m-border">
							<!-- <div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<img class='img-responsive' src="<?php echo SITE_IMG_PATH?>260x230/mt5.jpg" alt='chevrolet'/>
										
										<span class="b-items__cars-one-img-type m-listing">FEATURED</span>
										<form action="http://templines.rocks/" method="post">
											<input type="checkbox" name="check1" id='check1'/>
											<label for="check1" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
										</form>
									</div>
									<div class="b-items__cell-info">
										<div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class=""><a href="<?php echo base_url('motorcycles/details')?>">HONDA CLICK 125I 2019</a></h2>
										</div>
										<p><b>Yamaha 3S Motortrade</b></p>
										<p><b>Address:</b> 304 Shoe Ave, STO Nino, Marikina, 1800 Metro Manila</p>

										<h5 class="b-items__cell-info-price"><span>Price:</span>$29,415</h5>
										
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<img class='img-responsive' src="<?php echo SITE_IMG_PATH?>260x230/mt5.jpg" alt='ferrari'/>
										
										<span class="b-items__cars-one-img-type m-listing">FEATURED</span>
										<form action="http://templines.rocks/" method="post">
											<input type="checkbox" name="check2" id='check2'/>
											<label for="check2" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
										</form>
									</div>
									<div class="b-items__cell-info">
										<div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class=""><a href="<?php echo base_url('motorcycles/details')?>">HONDA CLICK 125I 2019</a></h2>
										</div>
										<p><b>Yamaha - Wheeltek</b></p>
										<p><b>Address:</b> 606 Quirino Hwy, Novaliches, Quezon City, 1116 Metro Manila</p>
										<h5 class="b-items__cell-info-price"><span>Price:</span>$29,415</h5>

									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<img class='img-responsive' src="<?php echo SITE_IMG_PATH?>260x230/mt5.jpg" alt='maxima'/>
										
										<span class="b-items__cars-one-img-type m-listing">FEATURED</span>
										<form action="http://templines.rocks/" method="post">
											<input type="checkbox" name="check3" id='check3'/>
											<label for="check3" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
										</form>
									</div>
									<div class="b-items__cell-info">
										<div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class=""><a href="<?php echo base_url('motorcycles/details')?>">HONDA CLICK 125I 2019</a></h2>
										</div>
										<p><b>YZone Yamaha Motor Philippines Inc.</b></p>
										<p><b>Address:</b> Unit 1 Portal, The Portal Greenfield District, Sto. Cristo, Mandaluyong, Metro Manila</p>
										<h5 class="b-items__cell-info-price"><span>Price:</span>$29,415</h5>
									</div>
								</div>
							</div> -->

							<?php if ( !empty( $motorcycles ) ):$x=1;?>

							
							
							<div class="col-sm-6 col-xs-12">
								<img class="img-responsive center-block"  src="<?php echo base_url().$motorcycles[0]['mop_image']?>" alt="<?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?>">
							</div>
							<div class="col-sm-6 col-xs-12">
								<div class="b-best__info">
									<header class="s-lineDownLeft b-best__info-head">
										<h2 class="" style="border:none;padding-left: 0px"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h2>

										<h4 style="font-weight: 700; color: #e44d26;">₱<?php echo number_format( $motorcycles[0]['mot_srp'], 2) ?></h4>

									</header>
									<!-- <h6 class="" >Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod etg tempor incididunt ut labore dolore magna aliqua. </h6>
									<p class="" >Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam mus etern nunc. Nunc conseq sem velde metus imperdiet lacinia. Aenean vulputate. Donec vene natis leo curabitur at neque ut sapien fusce cursus dapibus ligula Lorem ipsum dolor sitter amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uit enim ad minim veniami quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat. Duis aute irure dolor in reprehenderit.</p> -->

									<table class="table table-bordered">
										<tr>
											<td style="color: #e44d26;">COLOR SELECTED</td>
											<td style="text-transform: uppercase;color: #e44d26;"><?php echo $dem_colors?></td>
										</tr>
										<tr>
											<td>Category</td>
											<td><?php echo $motorcycles[0]['mot_type']?></td>
										</tr>
										<tr>
											<td>Diplacement</td>
											<td><?php echo $motorcycles[0]['mot_diplacement']?>cc</td>
										</tr>
										<tr>
											<td>Transmission Type</td>
											<td><?php echo $motorcycles[0]['mot_transmission']?></td>
										</tr>
										<tr>
											<td>Engine Type</td>
											<td><?php echo str_replace('-', ' ', $motorcycles[0]['mot_engine_type'])?></td>
										</tr>
										<tr>
											<td>Fuel System</td>
											<td><?php echo str_replace('-', ' ', $motorcycles[0]['mot_fuel_system'])?></td>
										</tr>
										<tr>
											<td>Color Variant</td>
											<td><?php echo $motorcycles[0]['mot_color_variant']?></td>
										</tr>
										<tr>
											<td style="text-transform: uppercase;color: #e44d26;">Promo</td>
											<td style="text-transform: uppercase;color: #e44d26;">Free Registration, Free Helmet</td>
										</tr>
									</table>
								</div>
							</div>
								

							<div class="col-sm-6 col-xs-12 sticky">Select 3 Dealers Below: <span class="pull-right">
								<a href="<?php echo base_url('motorcycles/inquiry/') . '/' . $motorcycles[0]['mot_slug'] . '/' . $dem_colors ?>" class="btn btn-warning" style="    background-color: #face0b;
							    color: #000;
							    font-weight: 600;
							    font-size: 14px;">INQUIRE NOW!</a>
							</span></div>


							<div class="col-lg-12 col-md-12 col-xs-12">
								
								<div class="alert alert-default">
								  <h4 class="pull-right"><a href="<?php echo base_url('motorcycles/remove_all_dealer/')?>" style="color: #e44d26;">Remove All Selected</a></h4>
								</div>
							</div>
								
                            <?php foreach($motorcycles as $motorcycle): ?>

							
							
							
							<div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell <?php foreach( $this->session->userdata('selected_dealers') as $selected_dealer ):?> <?php echo ( $selected_dealer == $motorcycle['dem_id'] ? 'selected_' : ''); ?> <?php endforeach;?>" href="<?php echo base_url('home')?>">


									<a class="remove_dealer" href="<?php echo base_url('motorcycles/remove_dealer/') . '/' . $motorcycle['dem_id'] ?>">
										<img src="https://cdn3.iconfinder.com/data/icons/musthave/256/Delete.png" alt="" width="20">
									</a>

									<div class="b-items__cars-one-img">
										<!-- <a href="<?php echo base_url('motorcycles/details/') . '/' . $motorcycle['dea_slug'] . '/' . $motorcycle['mot_slug'] . '/' . $motorcycle['dem_id'] ?>"> -->
											<!-- <img class='img-responsive' src="<?php echo base_url() . $motorcycle['mop_image']?>" alt="<?php echo $motorcycle['mot_model']?> <?php echo $motorcycle['mot_brand']?>"/> -->
										<a href="<?php echo base_url('motorcycles/add_dealers/') . '/' . $motorcycle['dem_id'] ?>">		
											<img class='img-responsive' src="<?php echo base_url('/uploads/dealers/'. $motorcycle['dea_slug'].'.png')  ?>" alt="<?php echo $motorcycle['mot_model']?> <?php echo $motorcycle['mot_brand']?>"/>
										</a>	
										<!-- </a> -->
										<!-- <img src="<?php echo SITE_IMG_PATH?>brand/honda.png" alt="" style="width:60px;position:absolute;bottom:0;"> -->
									</div>
									<div class="b-items__cell-info">
										<!-- <div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class="" style="white-space:nowrap!important;overflow:hidden!important;text-overflow:ellipsis!important;width:100%;"><a href="<?php echo base_url('motorcycles/details/') . '/' . $motorcycle['dea_slug'] . '/' . $motorcycle['mot_slug'] . '/' . $motorcycle['dem_id'] ?>"><?php echo $motorcycle['mot_model']?> <?php echo $motorcycle['mot_brand']?></a></h2>
										</div> -->
										<!-- <h5 class="b-items__cell-info-price"><span>Price:</span> &#8369;<?php echo number_format( $motorcycle['dem_price'], 2) ?></h5> -->
										<p class="brand_model"><b><?php echo $motorcycle['name']?></b></p>
										<p class=""><i class="fa fa-location-arrow" aria-hidden="true"></i><?php echo number_format( $motorcycle['distance'], 2) ?>km <a href="#" style="color:#e44d26;">(View on Map)</a></p>
										<p class=""><i class="fa fa-phone" aria-hidden="true"></i> 0927-123-1234</p>
										<p class="address"><i class="fa fa-building" aria-hidden="true"></i> <?php echo $motorcycle['address']?></p>
										<div style="padding: 10px;
										    margin: 0px;
										    background-color: #face0b;
										    border-radius: 5px;">
											<p class="promo"><b>PROMO</b> <span><?php echo $motorcycle['dem_promo'] ?></span></p>
										</div>
										<!-- <div>
											<div class="row m-smallPadding">
												<div class="col-xs-12"> -->
												
													<!-- <span class="b-items__cars-one-info-title">Downpayment:</span>
													<span class="b-items__cars-one-info-title">M.A 36mos:</span>

													<span class="b-items__cars-one-info-title">M.A 24mos:</span>

													<span class="b-items__cars-one-info-title">M.A 12mos:</span> -->

													<!-- <span class="b-items__cars-one-info-title">PROMO: <?php echo $motorcycle['dem_promo'] ?></span> -->
												<!-- </div> -->
												<!-- <div class="col-xs-7"> -->
											
													<!-- <span class="b-items__cars-one-info-value">₱<?php echo number_format( $motorcycle['dem_dp'], 2) ?></span>
													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $motorcycle['dem_installment'], 2) ?></span>

													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $motorcycle['dem_installment2'], 2) ?></span>

													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $motorcycle['dem_installment3'], 2) ?></span> -->

													<!-- <span class="b-items__cars-one-info-value freebies"><?php echo $motorcycle['dem_promo'] ?></span> -->
												<!-- </div> -->
											<!-- </div>
										</div> -->
										
										<!-- <a href="<?php echo base_url('motorcycles/fill_up/') . '/' . $motorcycle['dea_slug'] . '/' . $motorcycle['mot_slug'] . '/' . $motorcycle['dem_id'] ?>" class="btn m-btn" >SET AN APPOINTMENT</a> -->
										<!-- <a href="<?php echo base_url('compare') . "/add_new_dealer_motorcycle/" . $motorcycle['dem_id']?>" class="btn m-btn compare" style="    margin-top: 10px;">ADD TO COMPARE</a> -->
									</div>
								</div>
							</div>
							
							
							<?php endforeach;?>

							<?php else:?>
								<div class="col-lg-12 col-md-12 col-xs-12">
									<div class="alert alert-danger">
									  <strong>No Available Dealers near to you!</strong> Try to change the distance or location filter.
									</div>
								</div>
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
				</div>
			</div>
		</div><!--b-items-->

		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-sm-12 col-xs-12">
						<ul class="b-features__items">
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Motor Dealership</li>
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->

		


		