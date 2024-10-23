	<style>	
		.bx-wrapper .bx-next {
		    right: 20px;
		}

		.btn.m-btn.m-infoBtn {
		    color: #555555;
		    background: #ffdb00;
		    padding: 10px 31px;
		    font-size: 12px;
		    font-weight: 700;
		    margin-top: 20px;
		}

		.b-detail__head-price {
			width:100%;
		}
		.b-detail__main-aside-desc {margin-bottom: 0px;}
		.b-detail__main-aside-desc-value{border-left:none;}
		.b-detail__head-price-num {
			color: #FACE0B;
			background-color: #000;
		}

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
		    width: 200px;
		}
	</style>

		<section class="b-pageHeader">
			<div class="container">
				<h1 class="zoomInLeft text-uppercase" data-wow-delay="0.5s"><?php echo $dealers_motorcycles[0]['mot_brand'] ." ". $dealers_motorcycles[0]['mot_model']?> Details</h1>
			</div>
		</section><!--b-pageHeader-->

		<section class="b-detail s-shadow">
			<div class="container">
				<header class="b-detail__head s-lineDownLeft zoomInUp" data-wow-delay="0.5s">
					<div class="row">
						<div class="col-sm-9 col-xs-12">
							<div class="b-detail__head-title">
								<h1><?php echo $dealers_motorcycles[0]['mot_model']?></h1>
								<h3><i class="fa fa-tags" aria-hidden="true"></i> Keywords: <?php echo $dealers_motorcycles[0]['keywords']?></h3>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12">
							<div class="b-detail__head-price">
								<div class="b-detail__head-price-num">₱<?php echo number_format( $dealers_motorcycles[0]['dem_price'], 2) ?></div>
								<p>Included Taxes &amp; Checkup</p>
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

										                        <img class="img-responsive center-block" src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt="<?php echo $dealers_motorcycles[0]['mot_model']?>" />
										                        
										                    <?php else:?>

										                        <img class="img-responsive center-block" src="<?php echo base_url().$motorcycles_picture['mop_image']?>" alt="<?php echo $dealers_motorcycles[0]['mot_model']?>" />

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
																	<img class="img-responsive" src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt="<?php echo $dealers_motorcycles[0]['mot_model']?>" />
																</a>
										                        
									                    <?php else:?>

									                        <a href="#" data-slide-index="<?php echo $y?>" class="b-detail__main-info-images-small-one">
																<img class="img-responsive" src="<?php echo base_url().$motorcycles_picture['mop_image']?>" alt="<?php echo $dealers_motorcycles[0]['mot_model']?>" />
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
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Description</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Model</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_model']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brand</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_brand']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Category</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_type']?></p>
										</div>
									</div>
									<!--<div class="row">-->
									<!--	<div class="col-xs-6">-->
									<!--		<h4 class="b-detail__main-aside-desc-title">Displacement</h4>-->
									<!--	</div>-->
									<!--	<div class="col-xs-6">-->
									<!--		<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_diplacement']?>cc</p>-->
									<!--	</div>-->
									<!--</div>-->
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Transmission Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_transmission']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Engine Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo str_replace('-', ' ', $dealers_motorcycles[0]['mot_engine_type'])?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel System</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo str_replace('-', ' ', $dealers_motorcycles[0]['mot_fuel_system'])?></p>
										</div>		
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Color Variants</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo str_replace('-', ' ', $dealers_motorcycles[0]['dem_colors'])?></p>
										</div>		
									</div>
							</aside>
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">PAYMENT SUMMARY</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Cash</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $dealers_motorcycles[0]['dem_price'], 2) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Downpayment</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $dealers_motorcycles[0]['dem_dp'], 2) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Monthly Installment (36mos.)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $dealers_motorcycles[0]['dem_installment'], 2) ?></p>
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12">
											<a href="<?php echo base_url('motorcycles/fill_up/') . '/' . $dealers_motorcycles[0]['dea_slug'] . '/' . $dealers_motorcycles[0]['mot_slug'] . '/' . $dealers_motorcycles[0]['dem_id'] ?>" class="btn m-btn m-infoBtn btn-lg">SET AN APPOINTMENT</a>
										</div>	
									</div>
							</aside>
						</div>

						

						

						

						
					</div>
					<div class="row"><div class="col-md-5 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Dealer's Information</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Dealer Name</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['dea_name']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Branch</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['name']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Address</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['address']?></p>
										</div>
									</div>
									
							</aside>
							
						</div>	</div>
					<div class="row">
					<div class="col-md-5 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">ENGINE</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Color Variant</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_color_variant']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Engine Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_engine_type']?></p>
										</div>
									</div>
									<!--<div class="row">-->
									<!--	<div class="col-xs-6">-->
									<!--		<h4 class="b-detail__main-aside-desc-title">Displacement (cc)</h4>-->
									<!--	</div>-->
									<!--	<div class="col-xs-6">-->
									<!--		<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_engine_type']?>cc</p>-->
									<!--	</div>-->
									<!--</div>-->
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Bore x Stroke (mm)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_bore_stroke_mm']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Starting System</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_starting_system']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Ignition Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $dealers_motorcycles[0]['mot_ignition_type']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Transmission Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $dealers_motorcycles[0]['mot_transmission_type']?></p>
										</div>		
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel System</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_fuel_system']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Engine Oil Capacity (L)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_engine_oil_capacity']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Maximum Horse Power</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $dealers_motorcycles[0]['mot_maximum_horse_power']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Maximum Torque</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $dealers_motorcycles[0]['mot_maximum_torque']?></p>
										</div>		
									</div>
							</aside>
						</div>	</div>
					<div class="row">	
					<div class="col-md-5 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">CHASSIS</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brake System (Front])</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_brake_system_front']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brake System (Rear)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_brake_system_rear']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Suspension (Front)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_suspension_front']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Suspension (Rear)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_suspension_rear']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Wheels Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_wheels_type']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Front Tire</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $dealers_motorcycles[0]['mot_front_tire']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Rear Tire</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $dealers_motorcycles[0]['mot_rear_tire']?></p>
										</div>		
									</div>
							</aside>
						</div></div>
					<div class="row">
					<div class="col-md-5 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">DIMENSION</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Overall Dimensions (lenght x width x height)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_overall_dimensions']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Wet/Curb Weight (with oil & fuel)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_wet_curb_weight']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Dry Weight (without oil & Fuel)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_dry_weight']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Wheelbase</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_wheelbase']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Seat Height</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $dealers_motorcycles[0]['mot_seat_height']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Minimum Ground Clearance</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-uppercase"><?php echo $dealers_motorcycles[0]['mot_seat_height']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel Capacity (L)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value text-capitalize"><?php echo $dealers_motorcycles[0]['mot_fuel_capacity']?></p>
										</div>		
									</div>
							</aside>
						</div>	</div>
				</div>
			</div>
		</section><!--b-detail-->


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

		<style type="text/css">
			.sticky_footer {
				position: fixed;
			    left: -2px;
    bottom: -1px;
			    width: 100%;
			    background-color: #fff;
			    z-index: 200000;
			    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-transform: translateX(.18rem);
    transform: translateX(.18rem);
			}

			.pdp-mod-sbutton {
				width: 100%;
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
}

			.pdp-mod-sbutton.lazada {
    background: -webkit-linear-gradient(left,#face0b,#ffdc42);
    color: #000;
}
		</style>

		<div class="sticky_footer" style="display:none;">
			<!-- <span class="pdp-mod-sbutton buyNow lazada "><span class="pdp-mod-sbutton-inner">INQUIRE NOW!</span></span> -->
			<span class="pdp-mod-sbutton default lazada "><span class="pdp-mod-sbutton-inner">INQUIRE NOW!</span></span>
		</div>

		<script src="<?php echo SITE_JS_PATH?>wow.min.js"></script>

		<script type="text/javascript">


			    if($(window).width() <= 480){
			        $('.sticky_footer').show();
			    } else {
			    	$('.sticky_footer').hide();
			    }
			
		</script>