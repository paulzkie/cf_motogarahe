<!--view repo-->
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
    
    .repoimgsize{
        width: 260px !important;
	    height: 350px !important;
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
	    margin-bottom: 160px;
	    height: 490px;
	    position: relative;
	}


	.view_motor {
		background-color: #F2F3F7;
	}

	.b-items__cell {
		background-color: #fff;
		box-shadow: 0 2px 8px 0 rgba(0,0,0,.05);
	}

	.b-items__cell-info {
		padding: 0px 10px 10px 10px;
	}

	.b-items__cell-info-title {
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
		background-color: #efecec;
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


    /* overide css */
    .b-pageHeader__search h3{
        font-size: 17px!important;
        font-weight: 600!important;
       
    }
    .b-pageHeader h1{
        margin-left:15px;
        padding-left: 5px;
    }

    

    .pl-65{
        padding-left: 65px;
    }
    .b-pageHeader__search{
		background-color: unset;
	}
   @media only screen and (max-width: 950px){
        .pl-65{
            padding-left: unset;
        }
        .b-pageHeader h1{
                margin-left:0px;
                padding-left: 5px;
                font-size:20px!important;

        }
    }
    @media only screen and (max-width:850px){
            

    }
    @media only screen and (max-width:650px){
            .b-pageHeader h1{
                font-size:27px!important;

            }

    }
    
    @media only screen and (max-width: 414px) {
        .repoimgsize{
            width: auto !important;
    	    height: auto !important;
        }
        .b-items__cell {
	    padding: 0px !important;
	    border: 1px solid #eeeeee;
	    padding-bottom: 25px;
	    margin-bottom: 40px;
	    height: 490px;
	    position: relative;
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

		<section class="b-pageHeader">
			<div class="container">
				<h1 class=" zoomInLeft" data-wow-delay="0.5s">Repossessed Motorcycles</h1>
				<!-- <div class="b-pageHeader__search zoomInRight" data-wow-delay="0.5s">
					<h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
						</h3>
				</div> -->
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
						        <a href="#panelBodyOne" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Advance Search</a>
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
													<!--<input autocomplete="off" placeholder="" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" inputmode="search">-->
													<input autocomplete="off" placeholder="" type="text" name="mot_model" inputmode="search">
												</div>
											</div>
											<footer class="b-items__aside-main-footer">
												<button type="submit" name="search_mode" value="search_mode" class="btn m-btn">FILTER SEARCH</button><br />
												<a href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">RESET ALL FILTERS</a>
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
						<div class="row m-border">

							<?php if ( empty($repo) ):?>
					            <div class="col-lg-12 col-md-12 col-xs-12">
					                <div class="alert alert-danger">
					                  <strong>No Results!</strong> Your search did not match any listings..
					                </div>
				  					<h1 class="" style="color: #e44d26; font-weight: 800; margin-top: 30px; font-size: 42px">Coming Soon!</h1>

					            </div>
					        <?php  endif; ?>

							<?php if ( isset( $repo ) ):$x=1;?>
                            <?php foreach($repo as $rep): ?>
							<div class="col-lg-4 col-md-6 col-xs-12 zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<img class='img-responsive repoimgsize' src="<?php echo base_url() . $rep['mot_image'] ?>" alt='mers'/>
									</div>
									<div class="b-items__cell-info">
										<div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class=""><a href="<?php echo base_url('repo/info/') . '/' . $rep['mot_slug'] . '/' . $rep['mot_id'] ?>"><?php echo $rep['mot_model'] ." - ". $rep['mot_brand']?></a></h2>
										</div>
										<h5 class="b-items__cell-info-price" style="    position: inherit;"><span>Price:</span> &#8369;<?php echo number_format( $rep['mot_price'], 2) ?></h5>
										
										<p style="height: 40px;"><b>Dealer:</b> <?php echo $rep['dea_name'] . " - " . $rep['name']?></p>

										<div>	
											<div class="row m-smallPadding">
												<div class="col-xs-8">
													<!-- <span class="b-items__cars-one-info-title">Cash:</span> -->
													<span class="b-items__cars-one-info-title">DP:</span>
													<span class="b-items__cars-one-info-title">MA(36mos.):</span>
													<span class="b-items__cars-one-info-title">MA(24mos.):</span>
													<span class="b-items__cars-one-info-title">MA(14mos.):</span>
												</div>
												<div class="col-xs-4">
													<!-- <span class="b-items__cars-one-info-value">₱76,900</span> -->
													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $rep['mot_dp'], 2) ?></span>
													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $rep['mot_ma_36'], 2) ?></span>
													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $rep['mot_ma_24'], 2) ?></span>
													<span class="b-items__cars-one-info-value">₱<?php echo number_format( $rep['mot_ma_12'], 2) ?></span>
												</div>
											</div>
										</div>

										<a href="<?php echo base_url('repo/info/') . '/' . $rep['mot_slug'] . '/' . $rep['mot_id'] ?>" class="btn m-btn view-btn" style="position:initial;margin-top:20px;width: 100%">View Details</a>

										<!-- <a href="<?php echo base_url('compare') . "/add_repo_motorcycle/" . $rep['mot_id']?>" class="btn m-btn" style="position:absolute;bottom:10px;right:20px;"><i class="fa fa-plus" aria-hidden="true"></i> Compare<span class="fa fa-angle-right"></span></a> -->
										<!-- <h5 class="b-items__cell-info-price"><span>Price:</span> &#8369;<?php echo number_format( $rep['mot_srp'], 2) ?></h5> -->
									</div>
								</div>
							</div>
							<?php endforeach;?>
                        	<?php endif;?>
						</div>
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>

	
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