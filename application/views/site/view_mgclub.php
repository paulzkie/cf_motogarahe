<style type="text/css">
	.spacer{
		height: 150px;
	}
	.spacer-2{
		height: 50px;
	}
	/* [1] The container */
	.img-hover-zoom {
	  /*z-index: 999;*/
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
	.img-thumbnail{
		border: unset;
		background-color: unset;
	}
	.text-fade-gray{
		color: #908b73!important;
	}
	.text-strong-red{
		color: #e44d26!important;
		font-weight: 900;
	}
	.discount-text{
		font-size: 27px!important;
	}
	.text-shadow-title{
		text-shadow: 1px 2px #635e5e;
	}
	.b-error p {
    font: 400 14px 'Open Sans',sans-serif;
    margin: 0 0 40px 0;
	}
	.b-pageHeader__search{
		background-color: unset;
	}
	.b-pageHeader h1{
        margin-left:15px;
        padding-left: 5px;
        float: right;
        margin-bottom: -10px;
        padding: 25px 0px 0 0;
    }
	.v-line{
		border-left: 1px solid #b4b4b4;
 		height: 500px;
	}
	.borders{
	    border: 1px solid #a7a4a49e;
		padding: 15px;
		box-shadow: -1px 3px #b1acac;

	}
	.mg-logo{
		height: auto;
    	width: 120px;
	}
	.title-page{
		 margin-top: 63px;
	    font-size: 35px;
	    font-weight: 800;
	}
	.hiddenlg{
		display: none!important;
	}
	.d-none{
		display: none!important;
	}


	@media only screen and (max-width: 950px){
		/*.b-features__items:first-child{
			border-left: unset;
			padding-left: unset;
		}*/
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
            .v-line{
				border-left:unset;
		 		height: unset;
			}

    }
    @media only screen and (max-width: 600px){
		.discount-text {
		   
		    font-size: 16px!important;
		}
		.b-error p{
			margin-bottom: 15px;
		}
		.b-pageHeader h1{
	        float: left;
	    }
	    .hiddenxs{
	    	display: none;
	    }
	    .hiddenlg{
			display: block!important;
		}
		.b-error{
			padding: 20px 0 0 0;
		}
	}
</style>

<section class="b-pageHeader">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h2 class="font-weight-light  hiddenxs title-page  text-lg-left mt-4 mb-0 zoomInUp text-shadow-title" data-wow-delay="0.7s">Our Partner Merchants </h2>
						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
						<h1 class="zoomInLeft" data-wow-delay="0.7s">MG Club  <img class="mg-logo" src="<?php echo base_url('uploads/icon/mgclublogo.png') ?>"></h1>
					</div>
					
				</div>
				
				<!-- <div class="b-pageHeader__search zoomInRight" data-wow-delay="0.7s">
				  		<h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
						</h3>
				</div> -->
			</div>
		</section><!--b-pageHeader-->


<section class="b-error s-shadow">
			
			<div class="container">
				  <div class="row">
				  	<div class="cold-lg-12 col-md-12 col-xs-12">
				  		 <h2 class="font-weight-light hiddenlg text-center text-lg-left mt-4 mb-0 s-lineDownCenter zoomInUp text-shadow-title"  style="color: #000000; font-size: 27px" data-wow-delay="0.7s">Our Partner Merchants </h2>

				  	</div>
				  </div>
				 
				  <!-- <hr class="mt-2 mb-5"> -->

				  <div class="row text-center text-lg-left">

				  <!--   <div class="col-lg-3 col-md-4 col-xs-0 ">
				    	<div class="img-hover-zoom d-none">
				     	 <a href="https://motoworld.com.ph/" class="d-block mb-4 h-100 logo-partners">
				         <img class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/partners/motoworld270x150.png') ?>" alt=""> 
				          </a>
				          <p class="discount-text">Get <span class="text-strong-red">10%</span> discount on all items</p>
				          </div>

				    	<div class="img-hover-zoom d-none">
				          <a href="" class="d-block mb-4 h-100 logo-partners">
				         <img class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/partners/motoworld270x150.png') ?>" alt=""> 
				          </a>
				          <p class="discount-text">Get <span class="text-strong-red">10%</span> on all items</p>
				     	 </div>



				    </div> -->

				  	<div class="col-lg-8 col-md-8 col-xs-12">
				  		<div class="row">
				  			  <div class="col-lg-6 col-md-6 col-xs-6 ">
							    	<div class="img-hover-zoom">
							   		  <a href="https://imprintcustomsph.com/" target="_blank" class="d-block mb-4 h-100 logo-partners">
							            <img class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/partners/imprint270x150.png') ?>" alt="">
							          </a>
							          <p class="discount-text">Get <span class="text-strong-red">10%</span> discount on all items</p>
							        </div>
							    	
						    </div>


				    <div class="col-lg-6 col-md-6 col-xs-6 ">

					    	<div class="img-hover-zoom">
					      	  <a href="" target="_blank" class="d-block mb-4 h-100 logo-partners">
					            <img class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/partners/yrs270x150v2.png') ?>" alt="">
					          </a>
					          <p class="discount-text">Get <span class="text-strong-red">10%</span> discount on all items</p>
					        </div> 

					    	

				  		</div>
				  		
				  	</div>
				  	<h2 class="" style="color: #e44d26;">More Partners Coming Soon!</h2>
				    </div>
				    <div class="col-lg-4 col-md-4 col-xs-12 ">
				     	<!-- <div class="img-hover-zoom">
					      	  <a href="https://motoworld.com.ph/" target="_blank" class="d-block mb-4 h-100 logo-partners">
					            <img class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/promo/Promoimage360x360.jpg') ?>" alt="">
					          </a>
					        </div>  -->
					      <!--   <div class="v-line"></div> -->

							<div class="card text-center borders" >
							  <div class="card-body">
							    <h5 class="card-title"><strong>Motogarahe.com Club Mechanics</strong></h5>
							    <p class="card-text text-left">
							    	1.) Customers who purchased their motorcycles using the motogarahe.com website are entitled to a 2-year membership from motogarahe.com club. If in case the member will purchase again in the next two years and has an active membership from motogarahe.com, the new membership can be transferred to a family member or the existing membership expiration will be extended by using the date of the new purchase.<br><br>
							    	2.) Members will be given a unique 8 digit number that will serve as their membership number. The membership number will be sent to their registered mobile number. In case the member needs to change his/ her mobile number, the member needs to email club@motogarahe.com and request to update their registered mobile number.<br><br>
							    	3.) The membership is valid for two years and can be extended for one year but the member needs to pay Php150 pesos.<br> <br>
									4.) Discounts and privileges are exclusive for the member only.The member needs to present one valid government ID for verification purposes.<br> <br>
									5.) Membership, including the discounts and privileges, can be cancelled by motogarahe.com anytime with the reasons that is accordance to the law of the Philippines.<br><br>   
							    </p>
							    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
							  </div>
							</div>

				    </div>
				   
				   
				    
				  </div>

				</div>
				<!-- /.container -->


			<div class="spacer-2"></div>
			
</section><!--b-error-->

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
