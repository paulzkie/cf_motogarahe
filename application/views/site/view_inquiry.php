		<!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.css">
		<style>
			.b-contacts__address-hours {d
			    margin-bottom: 0px;
			}

			select, input {    color: #000 !important;    display: block;
    width: 100%;
    margin-bottom: 15px;
    padding: 15px 20px;
    font: 400 10px 'Open Sans',sans-serif;
    border: 1px solid #eeeeee;
    text-transform: uppercase;
    border-radius: 30px;}
    #ui-datepicker-div{display: none !important}

    select, input, button, textarea {
    	    border-radius: 0px !important;
    }

    .fa-angle-right {
    	background-color: transparent !important; 
    }

    /* overide css */
    .b-pageHeader__search h3{
        font-size: 17px!important;
        font-weight: 600!important;
    }
    .b-pageHeader h1{
        margin-left:15px;
        padding-left: 5px;
        font-size:25px!important;
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
		</style>
		<section class="b-pageHeader">
			<div class="container">
				<h1 class=" zoomInLeft" data-wow-delay="0.5s"><?php echo $motorcycles[0]['mot_model']?> <?php echo $motorcycles[0]['mot_brand']?></h1>
				<!-- <div class="b-pageHeader__search zoomInRight" data-wow-delay="0.5s">
					<h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
						</h3>
				</div> -->
			</div>
		</section><!--b-pageHeader-->

		


		<section class="b-contacts s-shadow">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<div class="b-contacts__form">
							<header class="b-contacts__form-header s-lineDownLeft zoomInUp" data-wow-delay="0.5s">
								<h2 class="s-titleDet">Inquiry Form</h2> 
							</header>
							<p class=" zoomInUp" data-wow-delay="0.5s">Kindly fill-up the form below, and our customer service professionals will contact you as soon as possible.</p>
							<div id="success"></div>
							<form id="contactForm" method="post" class="s-form zoomInUp" data-wow-delay="0.5s">
								<!-- <div class="s-relative">
									<select name="user-topic" id="user-topic" class="m-select">
										<option value="Not select">SELECT A TOPIC</option>
										<option value="Topic 1">TOPIC 1</option>
										<option value="Topic 2">TOPIC 2</option>
										<option value="Topic 3">TOPIC 3</option>
										<option value="Topic 4">TOPIC 4</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div> -->
								<!-- <input required type="hidden" name="dem_id" value="<?php echo $dealers_motorcycles[0]['dem_id']?>"> -->
								<input required type="hidden" name="mot_id" value="<?php echo $motorcycles[0]['mot_id']?>">
								<!-- <input required type="hidden" name="deb_id" value="<?php echo $dealers_motorcycles[0]['deb_id']?>"> -->
								 <!-- <div class="s-relative">
									<select required name="inq_color" id="user-topic" class="m-select">
										<option value="Not select">PREFERRED COLOR VARIANT?</option>
										
										<?php foreach( $colors as $color ):?>
											<option value="<?php echo $color?>" class="text-uppercase"><?php echo $color?></option>
										<?php endforeach;?>

									</select>
									<span class="fa fa-caret-down"></span>
								</div> -->
								<!-- <input required type="text" placeholder="COLOR VARIANT" value="<?php echo set_value('inq_color'); ?>" name="inq_color" id="user-name" /> -->
								<input required type="text" placeholder="YOUR NAME" value="<?php echo set_value('inq_name'); ?>" name="inq_name" id="user-name" />
								<input required type="text" placeholder="ADRESSS" value="<?php echo set_value('inq_address'); ?>" name="inq_address" id="user-address" />
								<input required type="tel" placeholder="PHONE NO." min="11" value="<?php echo set_value('inq_phone'); ?>" name="inq_phone" id="user-phone" />
								<input required type="email" placeholder="EMAIL ADDRESS" value="<?php echo set_value('inq_email'); ?>" name="inq_email" id="user-email" />

								<div class="s-relative">
									<select required name="inq_payment" id="inq_payment" class="m-select">
										<option value="Not select">Mode of  Payment</option>
										<option value="cash">Cash</option>
										<option value="installement">Installment</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>

								<div class="s-relative">
									<select required name="inq_buy_duration" id="inq_buy_duration" class="m-select">
										<option value="Not select">When do you plan to Buy?</option>
										<option value="Within 30 days">Within 30 days</option>
										<option value="1 - 3 months">1 - 3 months</option>
										<option value="3 - 6 months">3 - 6 months</option>
										<option value="6 - 12 months">6 - 12 months</option>
										<!-- <option value="1 - 2 years">1 - 2 years</option> -->
										<option value="Undecided">Undecided</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>
								<!-- <input required type="text" class="datepicker" placeholder="START DATE OF VISIT" value="<?php echo set_value('inq_tentative'); ?>" name="inq_tentative" id="user-tentative" autocomplete="off"/>
								<input required type="text" class="datepicker" placeholder="END DATE OF VISIT" value="<?php echo set_value('inq_tentative2'); ?>" name="inq_tentative2" id="user-tentative2" autocomplete="off"/> -->
								 <div class="s-relative">
									<select required name="inq_have_motor" id="inq_have_motor" class="m-select">
										<option value="Not select">DO YOU OWN A MOTORCYCLE?</option>
										<option value="YES">YES</option>
										<option value="NO">NO</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>
								<!--  <div class="s-relative">
									<select required name="inq_payment" id="inq_payment" class="m-select">
										<option value="Not select">MODE OF PAYMENT?</option>
										<option value="Cash">Cash</option>
										<option value="12 months">12 months</option>
										<option value="24 months">24 months</option>
										<option value="36 months">36 months</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div> -->
								<input required type="text" placeholder="OCCUPATION" value="<?php echo set_value('inq_occupation'); ?>" name="inq_occupation" id="user-occupation" />
								<input required type="text" placeholder="POSITION" value="<?php echo set_value('inq_position'); ?>" name="inq_position" id="user-position" />
									
								<textarea id="user-message" name="inq_message" placeholder="COMMENT/SUGGESTION/FEEDBACK"></textarea>
								<button type="submit" class="btn m-btn" name="fill_mode" value="fill_mode">SUBMIT NOW<span class="fa fa-angle-right"></span></button>
							</form>
						</div>
					</div>
					<div class="col-xs-6">

						<div class="b-contacts__address">
							<img class="img-responsive center-block" src="<?php echo base_url() . $motorcycles_pictures[0]['mop_image']?>" alt="nissan" />
							<div class="b-contacts__address-hours">
								<h2 class="s-titleDet zoomInUp" data-wow-delay="0.5s"><?php echo $motorcycles[0]['mot_model']?> <?php echo $motorcycles[0]['mot_brand']?></h2>
							</div>
							<div class="b-contacts__address-info">
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
											<td>Displacement</td>
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
										<!-- <tr>
											<td style="text-transform: uppercase;color: #e44d26;">Promo</td>
											<td style="text-transform: uppercase;color: #e44d26;">Free Registration, Free Helmet</td>
										</tr> -->
									</table>
							</div>
							<div class="b-contacts__address-info">
								<address class="" data-wow-delay="0.5s" style="background-color: #fff !important">
									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-xs-12">
												<a href="#" data-toggle="modal" data-target="#promoModal"> 
													<img class="center-block" src="<?php echo base_url('uploads/promo/Promoimage360x360.jpg') ?>" alt="" style="width: 100%;">
												</a>	
											</div>
										</div>
									</div>
								</address>
							</div>
							<!-- <div class="b-contacts__address-info">
								<h2 class="s-titleDet zoomInUp" data-wow-delay="0.5s">Payment Summary</h2>
								<address class="b-contacts__address-info-main zoomInUp" data-wow-delay="0.5s">
									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-7 col-md-8 col-xs-12">
												
												Cash
											</div>
											<div class="col-lg-5 col-md-4 col-xs-12">
												<b>₱ <?php echo number_format( $dealers_motorcycles[0]['dem_price'], 2) ?></b>
											</div>
										</div>
									</div>
									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-7 col-md-8 col-xs-12">
												
												Downpayment
											</div>
											<div class="col-lg-5 col-md-4 col-xs-12">
												<b>₱ <?php echo number_format( $dealers_motorcycles[0]['dem_dp'], 2) ?></b>
											</div>
										</div>
									</div>
									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-7 col-md-8 col-xs-12">
												
												Monthly Installment (36mos.)
											</div>
											<div class="col-lg-5 col-md-4 col-xs-12">
												<b>₱ <?php echo number_format( $dealers_motorcycles[0]['dem_installment'], 2) ?></b>
											</div>
										</div>
									</div>

									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-7 col-md-8 col-xs-12">
												
												Monthly Installment (24mos.)
											</div>
											<div class="col-lg-5 col-md-4 col-xs-12">
												<b>₱ <?php echo number_format( $dealers_motorcycles[0]['dem_installment2'], 2) ?></b>
											</div>
										</div>
									</div>

									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-7 col-md-8 col-xs-12">
												
												Monthly Installment (12mos.)
											</div>
											<div class="col-lg-5 col-md-4 col-xs-12">
												<b>₱ <?php echo number_format( $dealers_motorcycles[0]['dem_installment3'], 2) ?></b>
											</div>
										</div>
									</div>
								</address>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section><!--b-contacts-->

		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-6 col-xs-6 col-xs-offset-6">
						<ul class="b-features__items">
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">SEARCH</li>
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">COMPARE</li>
							<li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">PURCHASE</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->


		<!-- daterangepicker -->
<script src="<?php echo ADMIN_LTE_PATH?>update/moment.min.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/bootstrap-datepicker.js"></script>

<script>	

		 $('.datepicker').datepicker({
    "todayHighlight":true,
    "autoclose": true
  });
</script>