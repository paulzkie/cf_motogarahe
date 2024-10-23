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
	    padding: 0px !important;
	    border: 1px solid #eeeeee;
	    padding-bottom: 25px;
	    margin-bottom: 40px;
	    height: 400px;
	    position: relative;
	}

	.view_motor {
		background-color: #F2F3F7;
	}

	.b-items__cell {
		background-color: #fff;
		box-shadow: 0 2px 8px 0 rgba(0,0,0,.05);
	}

	.b-items__cell-info-title {
		padding-bottom: 10px !important;
		margin-bottom: 0px;
		border-bottom: none;
	}

	.b-items__cell-info a.btn.m-btn {
		    position: absolute;
	    bottom: 15px;
	        border-radius: 0px;
	            padding: 10px 0px !important;
    width: 38%;
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
	.b-items__cell-info b {
		font-weight: normal
	}

	.b-items__cell-info>p {
	    font: 300 13px open sans,sans-serif;
	    margin: 0 0px 3px;
	    font-size: 12px;
	}
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
				<h1 class=" zoomInLeft" data-wow-delay="0.5s">Search Results</h1>
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
						        <a href="#panelBodyOne" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Filter Search</a>
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
													<input autocomplete="off" placeholder="" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" >
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Brand</label>
													<div>
														<select name="mot_brand" class="m-select">
															<option value></option>
															<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>
															<option <?php echo 'Kawasaki' == $mot_brand ? 'selected' : '' ?> value="Kawasaki">Kawasaki</option>
															<option <?php echo 'Yamaha' == $mot_brand ? 'selected' : '' ?> value="Yamaha">Yamaha</option>
															<option <?php echo 'Suzuki' == $mot_brand ? 'selected' : '' ?> value="Suzuki">Suzuki</option>
															<option <?php echo 'Honda' == $mot_brand ? 'selected' : '' ?> value="Honda">Honda</option>
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Category</label>
													<div>
														<select name="mot_type" class="m-select">
															<option value></option>
															<option <?php echo 'Scooter' == $mot_type ? 'selected' : '' ?> value="Scooter">Scooter</option>
															<option <?php echo 'Backbone' == $mot_type ? 'selected' : '' ?> value="Backbone">Backbone</option>
															<option <?php echo 'Underbone' == $mot_type ? 'selected' : '' ?> value="Underbone">Underbone</option>
															<option <?php echo 'Business' == $mot_type ? 'selected' : '' ?> value="Business">Business</option>
															<option <?php echo 'ATV' == $mot_type ? 'selected' : '' ?> value="ATV">ATV</option>
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
															<option value></option>
															<option <?php echo 'Automatic' == $mot_transmission ? 'selected' : '' ?> value="Automatic">Automatic</option>
															<option <?php echo 'Manual' == $mot_transmission ? 'selected' : '' ?> value="Manual">Manual</option>
															
														</select>
														<span class="fa fa-caret-down"></span>
													</div>
												</div>
												<div class="b-items__aside-main-body-item">
													<label>Diplacement</label>
													<div>
														<select name="mot_diplacement" class="m-select">
															<option value></option>
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
												<div class="b-items__aside-main-body-item">
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
												</div>
											</div>
											<footer class="b-items__aside-main-footer">
												<button type="submit" name="search_mode" value="search_mode" class="btn m-btn">FILTER SEARCH</button><br />
												<a href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">RESET ALL FILTERS</a>
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

							<?php if ( empty($motorcycles) ):?>
					            <div class="col-lg-12 col-md-12 col-xs-12">
					                <div class="alert alert-danger">
					                  <strong>No Results!</strong> Your search did not match any listings..
					                </div>
					            </div>
					        <?php  endif; ?>

							<?php if ( isset( $motorcycles ) ):$x=1;?>
                            <?php foreach($motorcycles as $motorcycle): ?>
							<div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<?php if ( $motorcycle['mop_image'] == 'none' ):?>
                                            <img class='img-responsive' src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt='<?php echo $motorcycle['mot_model']?>'/>
                                        <?php else:?>
                                            <img class='img-responsive' src="<?php echo base_url() . $motorcycle['mop_image']?>" alt='<?php echo $motorcycle['mot_model']?>'/>
                                        <?php endif;?> 
										
									</div>
									<div class="b-items__cell-info">
				
											<div class="s-lineDownLeft b-items__cell-info-title">
												<h2 class=""><a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>"><?php echo $motorcycle['mot_model'] ." - ". $motorcycle['mot_brand']?></a></h2>
											</div>
											<p><b><?php echo $motorcycle['mot_brand']?></b></p>
											<p><b>Type:</b> <?php echo $motorcycle['mot_type']?></p>
											<p><b>Diplacement:</b> <?php echo $motorcycle['mot_diplacement']?></p>
										
										<a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>" class="btn m-btn view-btn" style="left:15px;">View Details</a>

										<a href="<?php echo base_url('compare') . "/add_new_motorcycle/" . $motorcycle['mot_id']?>" class="btn m-btn" style="right:15px;">Compare</a>
										<!-- <h5 class="b-items__cell-info-price"><span>Price:</span> &#8369;<?php echo number_format( $motorcycle['dem_price'], 2) ?></h5> -->
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
				</div>
			</div>
		</div><!--b-items-->

		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-sm-12 col-xs-12">
						<ul class="b-features__items">
							<li class= zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class= zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Motor Dealership</li>
							<li class= zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->