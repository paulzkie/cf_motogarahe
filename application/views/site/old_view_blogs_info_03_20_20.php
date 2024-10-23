<style>	
		.b-blog__posts-one p {
			margin-bottom: 10px;
		}

		.b-blog__posts-one-body-head h1 {
    font-size: 22px;
    text-transform: none;
    margin: 10px 0 20px;
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
												<div class="b-blog__posts-one-body-head-notes">
													<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-user"></span><?php echo $blogs['blo_author']?></span>
													<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php echo date("F j, Y, g:i a",strtotime($blogs['blo_created'])) ?></span>
													
													<span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-tag"></span></span><?php echo $blogs['blo_status'] ?></span>
												</div>
											</header>
											<div class="b-blog__posts-one-body-main zoomInUp" data-wow-delay="0.5s">
												<div class="b-blog__posts-one-body-main-img">
													<div class="blog_image" style="background:url('<?php echo base_url() . "/" .$blogs['blo_image']?>') no-repeat center; -webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;height: 400px;width: 100%;" alt="<?php echo $blogs['blo_title']?>"></div>
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