<style>
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
	    height: 640px;
	}
	.b-items__cell-info-price {
		position: initial;
	}

	.b-items__cell-info a.btn {
		margin-top: 20px;
	}

	.b-items__cell-info a.btn.m-btn {
	    font: 600 15px 'Open Sans',sans-serif!important;
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
</style>		

<script>
	$(document).ready(function(){
	  var windowWidth = $(window).width();
	  if(windowWidth <= 767) //for iPad & smaller devices
	     $('.panel-collapse').removeClass('in')
	});
</script>

		<section class="b-pageHeader">
			<div class="container">
				<h1 class=" zoomInLeft" data-wow-delay="0.5s">Dealers Near You</h1>
				<div class="b-pageHeader__search zoomInRight" data-wow-delay="0.5s">
					<h3>Get In Touch With Us Now</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<!-- <div class="b-breadCumbs s-shadow">
			<div class="container zoomInUp" data-wow-delay="0.5s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listTableTwo.html" class="b-breadCumbs__page m-active">Search Results</a>
			</div>
		</div> --><!--b-breadCumbs-->

		<?php echo $map['html']; ?>
		<div class="b-items view_motor">
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
						        <a href="#panelBodyOne" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Advance Search</a>
						        </h4>
						      </div>
						      <div id="panelBodyOne" class="panel-collapse collapse in">
						      <div class="panel-body">
						      	<aside class="b-items__aside">
									<div class="b-items__aside-main zoomInUp" data-wow-delay="0.5s">
										<form>
											<input type="hidden" id="lat" value="">
											<input type="hidden" id="lng" value="">
											<div class="b-items__aside-main-body">
												<div class="b-items__aside-main-body-item">
													<label>Model Name</label>
													<input placeholder="" type="text" name="input1">
												</div>
												<div class="b-items__aside-main-body-item">
													<label>FILTER INPUT</label>
													<div>
														<select name="select1" class="m-select">
															<option value="" selected="">Any Make</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>FILTER INPUT</label>
													<div>
														<select name="select1" class="m-select">
															<option value="" selected="">Any Make</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>PRICE RANGE</label>
													<div class="slider"></div>
													<input type="hidden" name="min" value="100" class="j-min" />
													<input type="hidden" name="max" value="1000" class="j-max" />
												</div>
												<div class="b-items__aside-main-body-item">
													<label>FILTER INPUT</label>
													<div>
														<select name="select1" class="m-select">
															<option value="" selected="">Any Type</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>FILTER INPUT</label>
													<div>
														<select name="select1" class="m-select">
															<option value="" selected="">Any Status</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>FILTER INPUT</label>
													<div>
														<select name="select1" class="m-select">
															<option value="" selected="">All Fuel Types</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
											</div>
											<footer class="b-items__aside-main-footer">
												<button type="submit" class="btn m-btn">FILTER MOTORCYCLES<span class="fa fa-angle-right"></span></button><br />
												<a href="#">RESET ALL FILTERS</a>
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

							<?php if ( isset( $motorcycles ) ):$x=1;?>
                            <?php foreach($motorcycles as $motorcycle): ?>
							<div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<img class='img-responsive' src="<?php echo SITE_IMG_PATH?>260x230/mt5.jpg" alt='mers'/>
									</div>
									<div class="b-items__cell-info">
										<div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class=""><a href="<?php echo base_url('motorcycles/details')?>"><?php echo $motorcycle['mot_model']?></a></h2>
										</div>
										<h5 class="b-items__cell-info-price"><span>Price:</span> &#8369;<?php echo number_format( $motorcycle['dem_price'], 2) ?></h5>
										<p><b><?php echo $motorcycle['mot_brand']?> - <?php echo $motorcycle['name']?></b></p>
										<p><b>Address:</b> <?php echo $motorcycle['address']?> - <?php echo number_format( $motorcycle['distance'], 2) ?>km</p>
										<div>
											<div class="row m-smallPadding">
												<div class="col-xs-8">
													<span class="b-items__cars-one-info-title">Cash:</span>
													<span class="b-items__cars-one-info-title">Downpayment:</span>
													<span class="b-items__cars-one-info-title">Monthly Installment (36mos.):</span>
												</div>
												<div class="col-xs-4">
													<span class="b-items__cars-one-info-value">₱76,900</span>
													<span class="b-items__cars-one-info-value">₱6,500</span>
													<span class="b-items__cars-one-info-value">₱3,759</span>
												</div>
											</div>
										</div>
										
										<a href="<?php echo base_url('motorcycles/fill_up')?>" class="btn m-btn" style="width:100%;">SET AN APPOINTMENT<span class="fa fa-angle-right"></span></a>
										<a href="<?php echo base_url('motorcycles/fill_up')?>" class="btn m-btn" style="width:100%;margin-top:10px;">ADD TO COMPARE<span class="fa fa-angle-right"></span></a>
									</div>
								</div>
							</div>
							<?php endforeach;?>
                        	<?php endif;?>
						</div>
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

		


