	<style>	
		.bx-wrapper .bx-next {
		    right: 20px;
		}

		.btn.m-btn.m-infoBtn {
		    color: #555555;
		    background: #ffdb00;
		    padding: 10px 15px;
		    font-size: 12px;
		    font-weight: 700;
		    margin-top: 20px;
		    border-radius: 0px;
		    width: 150px;
		}

		.btn.m-btn.m-infoBtn span.fa {
			    margin-left: 4px;
		}

		.b-info__aside  {
			z-index: 999 !important;
		}

			.sticky_footer {
				position: fixed;
			    left: -2px;
		    bottom: -1px;
					    width: 100%;
					    background-color: #fff;
					    z-index: 1000 !important;
					    display: -webkit-box;
		    display: -webkit-flex;
		    display: -ms-flexbox;
		    display: flex;
		    -webkit-transform: translateX(.18rem);
		    transform: translateX(.18rem);
					}

					.pdp-mod-sbutton {
						width: 50%;
					    -webkit-box-flex: 1;
					    -webkit-flex: 1;
					    -ms-flex: 1;
					    flex: 1;
					    display: inline-block;

					    text-align: center;
					    height: 5rem;
					    background: -webkit-linear-gradient(left,#ff9f36,#ff6700);
					    display: -webkit-box;
					    display: -webkit-flex;
					    display: -ms-flexbox;
					    display: flex;
					    -webkit-box-align: center;
					    -webkit-align-items: center;
					    -ms-flex-align: center;
					    align-items: center;
					    -webkit-box-pack: center;
					    -webkit-justify-content: center;
					    -ms-flex-pack: center;
					    justify-content: center;
					        font-weight: bold;
					}

					.pdp-mod-sbutton.lazada.buyNow, .pdp-mod-sbutton.lazada.secondary {
		    background: -webkit-linear-gradient(left,#000000,#292929);
		    color: #fff;
		    padding-left: 15%;
		}

					.pdp-mod-sbutton.lazada {
		    background: -webkit-linear-gradient(left,#face0b,#ffdc42);
		    color: #000;
		}

		.b-detail {
			padding-top: 50px
		}

		.b-detail__main-aside-desc {
		    margin-bottom: 10px;
		}

		.b-detail__main-aside-desc-value {
			padding-left: 0px;
			border: none;
		}

		.b-detail__main-aside-desc-title {
			font-weight: bold;
			color: #000;
			padding-left: 0px;
			border:none;
		}

		.b-detail__head-price {
		    width: 100%;
		}

		.b-detail__head-price-num {
		    color: #FACE0B;
		    background-color: #000;
		}

		.form_to_dealer {
			-webkit-box-shadow: 0 10px 6px -6px #777;
      		-moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
		    border: 1px solid #e8e3e3;
		    background-color: #efefef;
		        padding: 20px;
		        margin-top: 10px;
		}

		.form_to_dealer .s-titleDet{
			padding-left: 0px;
    		border-left: 1px solid #efefef;
    		margin:0px;
    		margin-bottom: 5px;
		}

		.b-detail__head-title {
			    border: none;
    		padding-left: 0px;
		}

		.s-lineDownLeft:after {
			display: none
		}

		.b-detail__head {
			    padding: 0 0 0px 0;
		    margin-bottom: 40px;
		    border: none;
		}

		.b-detail__main-aside form button.btn.m-btn:hover{
			background-color: #FACE0B;
		}
		</style>

		<!-- <section class="b-pageHeader">
			<div class="container">
				<h1 class="zoomInLeft text-uppercase" data-wow-delay="0.5s"><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?> Information</h1>
			</div>
		</section> -->
		<!--b-pageHeader-->

		<section class="b-detail s-shadow">
			<div class="container">
				<header class="b-detail__head s-lineDownLeft zoomInUp" data-wow-delay="0.5s">
					<div class="row">
						<div class="col-sm-8 col-xs-12">
							<div class="b-detail__head-title">
								<h1><?php echo $motorcycles[0]['mot_brand'] ." ". $motorcycles[0]['mot_model']?></h1>
								<h3><i class="fa fa-tags" aria-hidden="true"></i> Keywords: <?php echo $motorcycles[0]['keywords']?></h3>
							</div>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div class="b-detail__head-price">
								<div class="b-detail__head-price-num">₱<?php echo number_format( $motorcycles[0]['mot_srp'], 2) ?></div>
								<!-- <p>Included Taxes &amp; Checkup</p> -->
							</div>
						</div>
					</div>
				</header>
				<div class="b-detail__main">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="b-detail__main-info">
								<div class="b-detail__main-info-images zoomInUp" data-wow-delay="0.5s">
									<div class="row m-smallPadding">
										<div class="col-xs-10">
											<ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
												<?php if ( isset( $motorcycles_pictures ) ):$x=1;?>
						                            <?php foreach($motorcycles_pictures as $motorcycles_picture): ?>



															<li class="s-relative"> 
															<?php if ( $motorcycles_picture['mop_image'] == 'none' ):?>

										                        <img class="img-responsive center-block" src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt="<?php echo $motorcycles[0]['mot_model']?>" />
										                        
										                    <?php else:?>

										                        <img class="img-responsive center-block" src="<?php echo base_url().$motorcycles_picture['mop_image']?>" alt="<?php echo $motorcycles[0]['mot_model']?>" />

										                    <?php endif;?> 
															</li>


													<?php endforeach;?>
														
						                        	<?php endif;?>
											</ul>
										</div>
										<div class="col-xs-2 pagerSlider pagerVertical">
											<div class="b-detail__main-info-images-small" id="bx-pager">
												

												<?php if ( isset( $motorcycles_pictures ) ):$y=1;?>
						                            <?php foreach($motorcycles_pictures as $motorcycles_picture): ?>


														<?php if ( $motorcycles_picture['mop_image'] == 'none' ):?>

										                        <a href="#" data-slide-index="<?php echo $y?>" class="b-detail__main-info-images-small-one">
																	<img class="img-responsive" src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt="<?php echo $motorcycles[0]['mot_model']?>" />
																</a>
										                        
									                    <?php else:?>

									                        <a href="#" data-slide-index="<?php echo $y?>" class="b-detail__main-info-images-small-one">
																<img class="img-responsive" src="<?php echo base_url().$motorcycles_picture['mop_image']?>" alt="<?php echo $motorcycles[0]['mot_model']?>" />
															</a>		

									                    <?php endif;?> 




																
											<!-- 	<?php $y++?> -->
													<?php endforeach;?>
														
						                        	<?php endif;?>	

											</div>
										</div>
									</div>
								</div>
								

								
								
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<aside class="b-detail__main-aside">
								<form class="form_to_dealer" method="post" id="loadForm">
										<div class="row ">
											<div class="col-xs-12">
												<input type="hidden" name="lat" class="lat" value="0" required>
												<input type="hidden" name="long" class="long" value="0" required>
												
												<div class="b-items__aside-main-body-item">
													<h2 class="s-titleDet">Choose Color:</h2>
													<div>
														<select name="dem_colors" class="m-select" style="    margin-bottom: 0px;border-radius: 0px;" required>
															<option value="" disabled selected>Select Color</option>
															<option value="any">Any Color</option>
															
															<?php foreach( $color_variants as $color_variant ):?>
																<option value="<?php echo $color_variant?>"><?php echo $color_variant?></option>
															<?php endforeach;?>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
											</div>
											<div class="kwek">
												<!-- <div class="col-xs-6">
													<a href="<?php echo base_url('compare') . "/add_new_motorcycle/" . $motorcycles[0]['mot_id']?>" class="btn m-btn m-infoBtn btn-lg">Add To Compare</a>
												</div> -->	
												<div class="col-xs-12">
													<button type="submit" href="<?php echo base_url('motorcycles/dealers')?>" class="btn m-btn m-infoBtn btn-lg" value="dealers_mode" name="dealers_mode" style="    padding: 10px 15px;
													    color: #060808;
													    margin-top: 20px;
													    width: 100%;
													    font-size: 15px;">Find Dealers</button>
												</div>	
											</div>
											
										</div>
										<div class="sticky_footer" style="display:none;z-index: 2000000 !important;">
											<span class="pdp-mod-sbutton buyNow lazada "><a href="<?php echo base_url('compare') . "/add_new_motorcycle/" . $motorcycles[0]['mot_id']?>" style="color: #fff">
												<span class="pdp-mod-sbutton-inner">Add to Compare</span>
											</a></span>
											<span class="pdp-mod-sbutton default lazada"><button type="submit" value="dealers_mode" name="dealers_mode" style="background-color: initial; border: initial;"><span class="pdp-mod-sbutton-inner">Find Dealer</span></button></span>
										</div>
									</form>
									<br>
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Description</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Model</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_model']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brand</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_brand']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Category</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_type']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Diplacement</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_diplacement']?>cc</p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Transmission Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_transmission']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Engine Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo str_replace('-', ' ', $motorcycles[0]['mot_engine_type'])?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel System</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo str_replace('-', ' ', $motorcycles[0]['mot_fuel_system'])?></p>
										</div>		
									</div>
									
							</aside>
						</div>

						

						

						
					</div>
					<div class="row">	
						<div class="col-md-6 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">ENGINE</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Color Variant</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_color_variant']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Engine Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_engine_type']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Displacement (cc)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_engine_type']?>cc</p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Bore x Stroke (mm)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_bore_stroke_mm']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Starting System</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_starting_system']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Ignition Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $motorcycles[0]['mot_ignition_type']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Transmission Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $motorcycles[0]['mot_transmission_type']?></p>
										</div>		
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel System</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_fuel_system']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Engine Oil Capacity (L)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_engine_oil_capacity']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Maximum Horse Power</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $motorcycles[0]['mot_maximum_horse_power']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Maximum Torque</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $motorcycles[0]['mot_maximum_torque']?></p>
										</div>		
									</div>
							</aside>
						</div>		
					</div>
					<div class="row">	
						<div class="col-md-6 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">CHASSIS</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brake System (Front])</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_brake_system_front']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brake System (Rear)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_brake_system_rear']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Suspension (Front)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_suspension_front']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Suspension (Rear)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_suspension_rear']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Wheels Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_wheels_type']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Front Tire</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $motorcycles[0]['mot_front_tire']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Rear Tire</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $motorcycles[0]['mot_rear_tire']?></p>
										</div>		
									</div>
							</aside>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">DIMENSION</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Overall Dimensions (lenght x width x height)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_overall_dimensions']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Wet/Curb Weight (with oil & fuel)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_wet_curb_weight']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Dry Weight (without oil & Fuel)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_dry_weight']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Wheelbase</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_wheelbase']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Seat Height</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $motorcycles[0]['mot_seat_height']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Minimum Ground Clearance</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $motorcycles[0]['mot_seat_height']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel Capacity (L)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $motorcycles[0]['mot_fuel_capacity']?></p>
										</div>		
									</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-detail-->

		<!-- <section class="b-related m-home">
			<div class="container">
				<h5 class="s-titleBg zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
				<h2 class="s-title zoomInUp" data-wow-delay="0.5s">RELATED MOTORCYCLES ON SALE</h2>
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="b-auto__main-item zoomInLeft" data-wow-delay="0.5s">
							<img class="img-responsive center-block"  src="<?php echo SITE_IMG_PATH?>270x150/m1.jpg" alt="LandRover" />
							<form action="http://templines.rocks/" method="post">
											
											<label for="check2" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>

										</form>
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
							</div>
							<h2><a href="<?php echo base_url('motorcycles/details')?>">Land Rover Range Rover</a></h2>
							<div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									$44,380
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>35,000 KM
								</span>
							</div>
							<div class="b-featured__item-links m-auto">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Manual</a>
								<a href="#">Orange</a>
								<a href="#">Petrol</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-auto__main-item zoomInLeft" data-wow-delay="0.5s">
							<img class="img-responsive center-block"  src="<?php echo SITE_IMG_PATH?>270x150/m2.jpg" alt="nissan" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
							</div>
							<h2><a href="<?php echo base_url('motorcycles/details')?>">Nissan GT-R NISMO</a></h2>
							<div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									$10,857
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>35,000 KM
								</span>
							</div>
							<div class="b-featured__item-links m-auto">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Manual</a>
								<a href="#">Orange</a>
								<a href="#">Petrol</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-auto__main-item zoomInRight" data-wow-delay="0.5s">
							<img class="img-responsive center-block"  src="<?php echo SITE_IMG_PATH?>270x150/m3.jpg" alt="bmw" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
							</div>
							<h2><a href="<?php echo base_url('motorcycles/details')?>">BMW 650i Coupe</a></h2>
							<div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									$95,900
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>12,000 KM
								</span>
							</div>
							<div class="b-featured__item-links m-auto">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Manual</a>
								<a href="#">Orange</a>
								<a href="#">Petrol</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-auto__main-item zoomInRight" data-wow-delay="0.5s">
							<img class="img-responsive center-block"  src="<?php echo SITE_IMG_PATH?>270x150/m4.jpg" alt="camaro" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
							</div>
							<h2><a href="<?php echo base_url('motorcycles/details')?>">Chevrolet Corvette Z06</a></h2>
							<div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									$95,900
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>12,000 KM
								</span>
							</div>
							<div class="b-featured__item-links m-auto">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Manual</a>
								<a href="#">Orange</a>
								<a href="#">Petrol</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<!-- <section class="b-brands s-shadow">
			<div class="container">
				<h5 class="s-titleBg zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
				<h2 class="s-title zoomInUp" data-wow-delay="0.5s">BRANDS WE OFFER</h2>
				<div class="">
					<div class="b-brands__brand rotateIn" data-wow-delay="0.5s">
						<img src="<?php echo SITE_IMG_PATH?>brands/honda.png" alt="brand" />
					</div>
					<div class="b-brands__brand rotateIn" data-wow-delay="0.5s">
						<img src="<?php echo SITE_IMG_PATH?>brands/kawasaki.jpg" alt="brand" />
					</div>
					<div class="b-brands__brand rotateIn" data-wow-delay="0.5s">
						<img src="<?php echo SITE_IMG_PATH?>brands/yamaha.jpg" alt="brand" />
					</div>
					<div class="b-brands__brand rotateIn" data-wow-delay="0.5s">
						<img src="<?php echo SITE_IMG_PATH?>brands/suzuki.jpg" alt="brand" />
					</div>
				</div>
			</div>
		</section> -->

		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
						<ul class="b-features__items">
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Motor Dealership</li>
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->

		

		

		<script src="<?php echo SITE_JS_PATH?>wow.min.js"></script>

		<script type="text/javascript">


			    if($(window).width() <= 480){
			    	$('.kwek').remove()
			        $('.sticky_footer').show();
			        
			    } else {
			    	$('.sticky_footer').remove();
			    	$('.kwek').show()
			    }


		</script>