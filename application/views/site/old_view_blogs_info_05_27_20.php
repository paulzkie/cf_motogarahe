<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
<style>	
		.b-blog__posts-one p {
			margin-bottom: 10px;
		}

		.b-blog__posts-one-body-head {
			margin-bottom: 10px
		}

		.b-blog__posts-one-body-head h1 {
		    font-size: 22px;
		    text-transform: none;
		    margin: 10px 0 20px;
		}
		.blog_content p {
		    font-family: open sans,Arial,sans-serif!important;
		    font-size: 2.0625rem;
		    line-height: 1.7em;
		    color: black;
		}

		.b-blog__posts-one-body {
			margin-left: 0px; 
		}

		.social-area a,
		.social-area a:hover,
		.social-area a:focus,
		.social-area a:active {
		  text-decoration: none;
		}

		ul.social-area {
		  margin: 0 0px;
		  padding: 0;
		  list-style: none;
		  display: flex;
		  flex-wrap: wrap;
		}
		ul.social-area li {
		  display: inline-block;
		  padding: 0 10px;
		  flex-grow: 1;
		}
		ul.social-area li a {
		  display: block;
		  padding: 10px;
		  color: #fff;
		  background: #2d2d2d;
		  border-radius: 2px;
		  text-align: center;
		}
		ul.social-area li a.rs:before {
		  content: "\f39e";
		  font-family: "Font Awesome 5 Brands";
		  font-weight: 900;
		  margin-right: 10px;
		  font-size: 14px;
		}
		ul.social-area li a.fb {
		  background: #3b5998;
		}
		ul.social-area li a.fb:before {
		  content: "\f39e";
		}
		ul.social-area li a.tw {
		  background: #55acee;
		}
		ul.social-area li a.tw:before {
		  content: "\f099";
		}
		ul.social-area li a.gp {
		  background: #dd4b39;
		}
		ul.social-area li a.gp:before {
		  content: "\f0d5";
		}
		ul.social-area li a.yt {
		  background: #ff0000;
		}
		ul.social-area li a.yt:before {
		  content: "\f167";
		}
		ul.social-area li a.ln {
		  background: #007bb5;
		}
		ul.social-area li a.ln:before {
		  content: "\f0e1";
		}
		ul.social-area li a.pn {
		  background: #cb2027;
		}
		ul.social-area li a.pn:before {
		  content: "\f231";
		}

		ul.social-area li:first-child {
			padding-left: 0px
		}

		ul.social-area li:last-child {
			padding-right: 0px
		}
		.blog_image{
			height: 400px;
			width: 100%;
		}

		@media only screen and (min-width: 768px) and (max-width: 991px) {
		  ul.social-area li {
		    /*min-width: 33.33%;*/
		    margin-bottom: 10px;
		  }

		 
		}
		@media only screen and (max-width: 767px) {
		  ul.social-area li {
		    margin-bottom: 10px;
		    flex: 1;
		  }
		  ul.social-area li a span {
		    display: none;
		  }
		  ul.social-area li a:before {
		    margin: 0 !important;
		  }
		}
		@media only screen and (max-width: 480px){
		    .blog_content p img {
                width: 100%;
                height: auto;
            }
            .blog_image{
				height: 200px;
				width: 100%;
			}
		}

</style>


<?php $x = 1; if ( isset( $blogs ) ):?>
                            <?php foreach($blogs as $blogs): ?>
<section class="b-article">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="b-article__main">
							<div class="b-blog__posts-one">
								<div class="row m-noBlockPadding">
									<div class="col-sm-12 col-xs-12">
										<div class="b-blog__posts-one-body">
											<header class="b-blog__posts-one-body-head zoomInUp" data-wow-delay="0.5s">
												<h1 class="s-titleDet"><?php echo $blogs['blo_title']?></h1>

												<!-- <div class="row">
													<div class="col-sm-12"> -->
														<div class="b-blog__posts-one-body-head-notes" style="    margin-bottom: 15px;">
															<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php echo $blogs['blo_author']?></span>
															<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php echo date("F j, Y, g:i a",strtotime($blogs['blo_created'])) ?></span>
															
															<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-tag"></span></span><?php echo $blogs['blo_status'] ?></span>
														</div>	
													<!-- </div>
													<div class="col-sm-12">
													  <ul class="social-area">
													    <li><a href="#" class="fb rs"><span>facebook</span></a></li>
													    <li><a href="#" class="tw rs"><span>twitter</span></a></li>
													    <li><a href="#" class="gp rs"><span>google+</span></a></li>  
													    <li><a href="#" class="yt rs"><span>youtube</span></a></li>
													    <li><a href="#" class="ln rs"><span>linkedin</span></a></li>
													    <li><a href="#" class="pn rs"><span>pinterest</span></a></li>
													  </ul>
													</div> -->
												<!-- </div> -->

												<ul class="social-area">
														
													    <li><a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url()?>', '_black', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' )" class="fb rs"><span>facebook</span></a></li>
													    <li><a href="#" class="tw rs"><span>twitter</span></a></li>
													    <li><a href="#" class="gp rs"><span>google+</span></a></li>  
													    <li><a href="#" class="yt rs"><span>youtube</span></a></li>
													    <li><a href="#" class="ln rs"><span>linkedin</span></a></li>
													    <li><a href="#" class="pn rs"><span>pinterest</span></a></li>
													  </ul>
												
											</header>
											<div class="b-blog__posts-one-body-main zoomInUp" data-wow-delay="0.5s">
												<div class="b-blog__posts-one-body-main-img">
													<div class="blog_image" style="background:url('<?php echo base_url() . "/" .$blogs['blo_image']?>') no-repeat center; -webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" alt="<?php echo $blogs['blo_title']?>"></div>
												</div>
												<div class="blog_content">
													<?php echo $blogs['blo_content']?>
												</div>
											</div>
									
											<!-- <div class="b-blog__posts-one-body-tags zoomInUp" data-wow-delay="0.5s">
												<span class="fa fa-tags"></span>
												TAGS:
												<a href="#">bmw</a>
												<a href="#">comparison</a>
												<a href="#">comparison test</a>
												<a href="#">coupe</a>
												<a href="#">f-type</a>
												<a href="#">jaguar</a>
												<a href="#">m4</a>
												<a href="#">slideshow</a>
											</div> -->
										</div>
									</div>
								</div>
							</div>
				
						
						</div>
					</div>
					
				</div>
			</div>
		</section>
<?php endforeach;?>
	                        <?php endif;?>