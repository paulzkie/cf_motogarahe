<style>
	.s-lineDownLeft {
		border-bottom: none;
	}

	.s-lineDownLeft:after {
		display: none;
	}

	.b-items__cars-one-info a.btn.m-btn:hover {
		background: #FACE0B;
	    border-color: #FACE0B;
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

	.b-items__cars-one-info p {margin-bottom: 10px;}
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
				<h1 class=" zoomInLeft" data-wow-delay="0.5s">List of Dealers</h1>
				<div class="b-pageHeader__search zoomInRight" data-wow-delay="0.5s">
					<h3>Get In Touch With Us Now</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow zoomInUp" data-wow-delay="0.5s">
			<div class="container">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="contacts.html" class="b-breadCumbs__page m-active">Contact Us</a>
			</div>
		</div><!--b-breadCumbs-->

		

		<section class="b-items s-shadow">
			<div class="container">
				<div class="row">
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
							<!-- <h2 class="s-title zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2> -->
							<div class="b-items__aside-main zoomInUp" data-wow-delay="0.5s">
								<form>
									<div class="b-items__aside-main-body">
										<div class="b-items__aside-main-body-item">
											<label>SELECT DEALER</label>
											<div>
												<select name="select1" class="m-select">
													<option <?php echo  $dealers_choice == 'all' ? 'selected' : '' ?> value="all"></option>

													<?php if ( !empty( $dealers_options ) ):$x=1;?>
                            						<?php foreach($dealers_options as $dealers_option): ?>
                            							<option <?php echo $dealers_option['dea_slug'] == $dealers_choice ? 'selected' : '' ?> value="<?php echo  $dealers_option['dea_slug']?>"><?php echo  $dealers_option['dea_name']?></option>
                            						<?php endforeach;?>
                            						<?php endif;?>

												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<!-- <div class="b-items__aside-main-body-item">
											<label>SELECT YOUR CITY</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Makati City</option>
													<option value="" selected="">Pasig City</option>
													<option value="" selected="">Quezon City</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div> -->
										<!-- <div class="b-items__aside-main-body-item">
											<label>PRICE RANGE</label>
											<div class="slider" data-min-val="100" data-max-val="1000"></div>
											<input type="hidden" name="min" value="100" class="j-min" />
											<input type="hidden" name="max" value="1000" class="j-max" />
										</div> -->
										
									</div>
									<footer class="b-items__aside-main-footer">
										<button type="submit" class="btn m-btn">FILTER DEALERS<span class="fa fa-angle-right"></span></button><br />
										<a href="#">RESET ALL FILTERS</a>
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
						<div class="b-items__cars">
							<?php if ( isset( $dealers ) ):$x=1;?>
                            <?php foreach($dealers as $dealer): ?>
							<div class="b-items__cars-one zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cars-one-img">
									<center>
										<img src="<?php echo SITE_IMG_PATH?>270x230/motoworld.jpg" style="width: 70%" alt='dodge'/>
									</center>
									<!-- <span class="b-items__cars-one-img-type m-premium">PROMO ONGOING</span> -->
								</div>
								<div class="b-items__cars-one-info">
									<header class="b-items__cars-one-info-header s-lineDownLeft">
										<h2><?php echo $dealer['dea_name'] . ' - ' . $dealer['name']?></h2>
									</header>
									<p>
										<b>Address: </b><?php echo $dealer['address']?>
									</p>
									<p>
										<b>Contact #: </b><?php echo $dealer['tel']?>
									</p>
									<div class="b-items__cars-one-info-details">
										<a href="<?php echo base_url('dealers')?>" class="btn m-btn pull-left" style="    margin-top: 10px;">MOTOR LISTING<span class="fa fa-angle-right"></span></a>
									</div>
								</div>
							</div>
							<?php endforeach;?>
                        	<?php endif;?>
						</div>
						<?php echo $this->pagination->create_links(); ?>
						<!-- <div class="b-items__pagination zoomInUp" data-wow-delay="0.5s">
							<div class="b-items__pagination-main">
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
		</section><!--b-items-->