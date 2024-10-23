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

		/* overide css */
    
    .b-pageHeader h1{
        margin-left:15px;
        padding-left: 0px;
        font-size:25px!important;
    }


    .pl-65{
        padding-left: 65px;
    }
   @media only screen and (max-width: 950px){
       
        .pl-65{
            padding-left: unset;
        }
        .b-pageHeader h1{
                margin-left:0px;
                padding-left: 0px;
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
	</style>

		<section class="b-pageHeader">
			<div class="container">
				<h1 class="zoomInLeft text-uppercase" data-wow-delay="0.5s"><?php echo $repo[0]['mot_brand'] ." ". $repo[0]['mot_model']?> Details</h1>
			</div>
		</section><!--b-pageHeader-->

		<section class="b-detail s-shadow">
			<div class="container">
				<header class="b-detail__head s-lineDownLeft zoomInUp" data-wow-delay="0.5s">
					<div class="row">
						<div class="col-sm-9 col-xs-12">
							<div class="b-detail__head-title">
								<h1><?php echo $repo[0]['mot_model']?></h1>
								<h3><i class="fa fa-tags" aria-hidden="true"></i> Keywords: <?php echo $repo[0]['keywords']?></h3>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12">
							<div class="b-detail__head-price">
								<div class="b-detail__head-price-num">₱<?php echo number_format( $repo[0]['mot_dp'], 2) ?></div>
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
												<li class="s-relative">                                        
													
													<img class="img-responsive center-block" src="<?php echo base_url() . $repo[0]['mot_image'] ?>" alt="nissan" />
												</li>
												
											</ul>
										</div>
										<div class="col-xs-2 pagerSlider pagerVertical">
											<div class="b-detail__main-info-images-small" id="bx-pager">
												<a href="#" data-slide-index="0" class="b-detail__main-info-images-small-one">
													<img class="img-responsive" src="<?php echo base_url() . $repo[0]['mot_image'] ?>" alt="nissan" />
												</a>							
												
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
											<p class="b-detail__main-aside-desc-value"><?php echo $repo[0]['mot_model']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brand</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $repo[0]['mot_brand']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Category</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $repo[0]['mot_type']?></p>
										</div>
									</div>
							</aside>
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">PAYMENT SUMMARY</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Downpayment</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $repo[0]['mot_dp'], 2) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Monthly Installment (36mos.)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $repo[0]['mot_ma_36'], 2) ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Monthly Installment (24mos.)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $repo[0]['mot_ma_24'], 2) ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Monthly Installment (12mos.)</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">₱ <?php echo number_format( $repo[0]['mot_ma_12'], 2) ?></p>
										</div>
									</div>
									
									<div class="row">
										<!-- <div class="col-xs-12">
											<a href="<?php echo base_url('compare') . "/add_repo_motorcycle/" . $repo[0]['mot_id']?>" class="btn m-btn m-infoBtn btn-lg btn-block">ADD TO COMPARE<span class="fa fa-angle-right"></span></a>
										</div>	 -->

										<div class="col-xs-12">
											<a href="<?php echo base_url('repo/fill_up/') . '/' . $repo[0]['mot_id'] ?>" class="btn m-btn m-infoBtn btn-lg btn-block">SET AN APPOINTMENT</a>
										</div>	
									</div>
							</aside>
						</div>

						<div class="col-md-12 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Dealer's Information</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Dealer Name</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $repo[0]['dea_name']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Branch</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $repo[0]['name']?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Address</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $repo[0]['address']?></p>
										</div>
									</div>
									
							</aside>
							
						</div>

					</div>
				</div>
			</div>
		</section><!--b-detail-->


	
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
			<span class="pdp-mod-sbutton default lazada "><a href="<?php echo base_url('repo/fill_up/') . '/' . $repo[0]['mot_id'] ?>" style="color:#444;"><span class="pdp-mod-sbutton-inner">INQUIRE NOW!</span></a></span>
		</div>

		<script src="<?php echo SITE_JS_PATH?>wow.min.js"></script>

		<script type="text/javascript">


			    if($(window).width() <= 480){
			        $('.sticky_footer').show();
			    } else {
			    	$('.sticky_footer').hide();
			    }
			
		</script>