<style>	

	a:hover, a:focus {
		text-decoration: none;
		
	}

	a:hover h2, a:focus h2{
		transition: color 0.3s ease;
		color: #e44d26
	}
	
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
    padding-bottom: 25px;
    border-bottom: none;
    margin-bottom: 25px;
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
	    /*top: -60px;*/

	}

	.b-pageHeader__search{
		background-color: unset;
	}
	.text-black-solid{
		color: black!important;
		font-weight:400!important;
 	   text-align: justify;
	}
	.author-name{
		color: #999999;
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
	    /*background-color: #428bca;*/
	    /*-webkit-box-shadow: 0px 6px 0px #3071a9;*/
	    /*-moz-box-shadow: 0px 6px 0px #3071a9;*/
	    /*box-shadow: 0px 6px 0px #3071a9;*/
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
	    /*-webkit-box-shadow: 0px 6px 0px #999999;*/
	    /*-moz-box-shadow: 0px 6px 0px #999999;*/
	    /*box-shadow: 0px 6px 0px #999999;*/
	    border: 0;
	    text-shadow: 0px 1px 0px #ffffff;
	    background-color: #face0b;
	    /*-webkit-box-shadow: 0px 6px 0px #3071a9;*/
	    /*-moz-box-shadow: 0px 6px 0px #3071a9;*/
	    /*box-shadow: 0px 6px 0px #a2891a;*/
	    padding: 3px 45px;
	    text-decoration: none;
	    border-radius: 5px;
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
                float: left;

            }
        /*    .b-blog__posts-one {
			    padding-bottom: 25px;
			    border-bottom: none;
			    margin-bottom: 35px;
			}*/

    }

    @media only screen and (max-width:480PX){
           .blog_image {
           			top: initial;
           }

    }
</style>

<section class="b-pageHeader">
			<div class="container">
				<h1 class="zoomInLeft" data-wow-delay="0.7s">MG News & Blogs</h1>
				<!-- <div class="b-pageHeader__search zoomInRight" data-wow-delay="0.7s">
					<h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
						</h3>
				</div> -->
			</div>
		</section>

		<div class="b-blog s-shadow">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="b-blog__posts">
							<?php $x = 1; if ( isset( $blogs ) ):?>
                            <?php foreach($blogs as $blogs): ?>

								<div class="b-blog__posts-one zoomInUp m-3" data-wow-delay="0.3s">
									<div class="row">
										<div class="col-xs-4 col-md-4">
											<div class="blog_image" style="background:url('<?php echo base_url() . $blogs['blo_image']?>') no-repeat center; -webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;height: 200px;width: 100%;" alt="<?php echo $blogs['blo_title']?>"></div>
										</div>
										<div class="col-xs-8 col-md-8">
											<header class="b-blog__posts-one-body-head s-lineDownLeft">  
												<div class="b-blog__posts-one-body-head-notes">
														<!-- <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php echo $blogs['blo_author']?></span> -->
														<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php echo date("F j, Y",strtotime($blogs['blo_created'])) ?></span>

														<!-- <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-tag"></span><?php echo $blogs['blo_status'] ?></span> -->
												</div>
												<a href="<?php echo base_url('blogs/content') . "/" . $blogs['blo_slug'] ?> "><h2 class="s-titleDet"><?php echo $blogs['blo_title']?></h2></a>
												<br>
												<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span>
												By <i class="author-name"><?php echo ucwords($blogs['blo_author'])?></i></span>
											</header>
											<div class="b-blog__posts-one-info">
												<p class="text-black-solid">
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
						<?php echo $this->pagination->create_links(); ?>
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