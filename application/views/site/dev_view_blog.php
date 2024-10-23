<style>	
		.s-lineDownLeft {
			border-bottom: none;
		}

		.s-lineDownLeft:after {
			display: none
		}

		.b-blog__posts-one-info p {
			margin-top: 0px;
			margin-bottom: 0px
		}

		.b-blog__posts-one-body-head {
    margin-bottom: 10px;
}

.b-blog__posts-one-body-head h2 {
	margin-bottom: 0px
}

.b-blog__posts-one {
    padding-bottom: 15px;
    border-bottom: none;
    margin-bottom: 15px;
}

.btn:active, .btn.active {
	box-shadow: none
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

    /*.b-features__items:first-child{
        border-left: 3px solid #fff;
        padding-left: 30px;
    }*/

    .pl-65{
        padding-left: 65px;
    }

	.blog_image {
		position: relative;
    top: -60px;

	}

	.b-pageHeader__search{
		background-color: unset;
	}
	.text-black-solid{
		color: black!important;
		font-weight:400!important;
	    padding-right: 20px;
 	   text-align: justify;
	}


   @media only screen and (max-width: 950px){
       /* .b-features__items:first-child{
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

    }

    @media only screen and (max-width:480PX){
           .blog_image {
           			top: initial;
           }

    }
</style>

<section class="b-pageHeader">
			<div class="container">
				<h1 class="zoomInLeft" data-wow-delay="0.7s">MG News</h1>
				<div class="b-pageHeader__search zoomInRight" data-wow-delay="0.7s">
					<h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
						</h3>
				</div>
			</div>
		</section>

		<div class="b-blog s-shadow">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="b-blog__posts">
							<?php $x = 1; if ( isset( $blogs ) ):?>
                            <?php foreach($blogs as $blogs): ?>

								<div class="b-blog__posts-one zoomInUp" data-wow-delay="0.3s">
									<div class="row">
										<div class="col-xs-8">
											<header class="b-blog__posts-one-body-head s-lineDownLeft">              
												<div class="b-blog__posts-one-body-head-notes">
													<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php echo $blogs['blo_author']?></span>
													<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php echo date("F j, Y, g:i a",strtotime($blogs['blo_created'])) ?></span>

													<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-tag"></span><?php echo $blogs['blo_status'] ?></span>
												</div>
												<h2 class="s-titleDet"><?php echo $blogs['blo_title']?></h2>
											</header>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-4 pull-right">
											<div class="blog_image" style="background:url('<?php echo $blogs['blo_image']?>') no-repeat center; -webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;height: 200px;width: 100%;" alt="<?php echo $blogs['blo_title']?>"></div>

										</div>
										<div class="col-xs-8 pull-right">
											<div class="b-blog__posts-one-info">
												<p class="">
													<?php echo $blogs['blo_desc']?>
												</p>
												<a href="<?php echo base_url('blogs/content') . "/" . $blogs['blo_slug'] ?> " class="btn m-btn" style="color: #e44d26; padding-left: 0px">Read More</a>
												<!-- <div class="b-blog__posts-one-social pull-right">
													<em>SHARE THIS</em>
													<a href="#"><span class="fa fa-google-plus-square "></span></a>
													<a href="#"><span class="fa  fa-facebook-square"></span></a>
													<a href="#"><span class="fa fa-twitter-square "></span></a>
													<a href="#"><span class="fa fa-pinterest-square"></span></a>
												</div> -->
											</div>
										</div>

									</div>
								</div>

								<?php endforeach;?>
	                        <?php endif;?>
							
						</div>
					</div>
				</div>
			</div>
		</div><!--b-blog-->


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