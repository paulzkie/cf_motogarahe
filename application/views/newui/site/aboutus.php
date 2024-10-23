<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/aboutus.css">

<!-- content start -->
<div class="body-content">

<!-- title page  start-->

<div class="title-info">
	
	<div class="container mx-auto text-white text-center title-header">
		<h1 class="title-page text-white">ABOUT US</h1>
		<p class="desc-text text-white">Learn More About Our Story</p>
	</div>
</div>
<!-- title page end -->



<div class="container">
	<section class="youtube">
		<div class="description">
			<!--<h2 class="title-content">WHY MOTOGARAHE.COM</h2>-->
			<h2 class="title-content"><?php echo $data[0]['title']?></h2>
			<!--<p class="">motogarahe.com is an interactive website that helps you to SEARCH,COMPARE and PURCHASE the right motorcycle for you.</p>-->
			<!--<p>This platform will also update the buyers and motorcycle enthusiasts about trends, products and services related to motorcycle industry.</p>-->
			<!--<p>Hanap Moto? Easy!</p>-->
			    <?php echo $data[0]['desc']?>
			<div class="video-youtube">
				<iframe id="youtube-vid" src="<?php echo $data[0]['video']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>

		</div>
	</section>
	<section class="sec-box steps" id="step-1">
		<div class="row">
			<div class="col-md-7 col-sm-12"> <img src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/step1.png"></div>
			<div class="col-md-5 col-sm-12">
				<div class="text-container-right">
					<h2 class="step-title">STEP 1 -SEARCH</h2>
					<p><b>SEARCH</b> for the brand/model of a motorcycle that you have in mind or you would like to buy.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="sec-box steps" id="step-2">
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<h2 class="step-title d-none d-lg-block d-md-block">STEP 2 -COMPARE</h2>
				<p class="d-none d-lg-block d-md-block"><b>COMPARE</b> the models, specs, prices of different motorcycles based on your chosen city location.</p>
			</div>
			<div class="col-md-8 col-sm-12"> 
				<img class="img-right" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/step2.png">
				<h2 class="step-title d-lg-none d-md-none">STEP 2 -COMPARE</h2>
				<p class="d-lg-none d-md-none"><b>Compare</b> the models, specs, prices of different motorcycles based on your chosen city location.</p>
			</div>
				
		</div>
	</section>
	<section class="sec-box steps" id="step-3">
		<div class="row">
			<div class="col-md-7 col-sm-12"> <img src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/step3.png"></div>
			<div class="col-md-5 col-sm-12">
				<div class="text-container-right">
				<h2 class="step-title">STEP 3 -PURCHASE</h2>
				<p><b>PURCHASE</b> now. Our partner-dealer will assist you in your buying journey.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="sec-box" id="explore-mot">
		<div class="description text-center">
			<h2 class="title">so what are you waiting for?</h2>
			<p>Start browsing now and find your dream motorcycle</p>
			<a class="btn bg-black" href="<?php echo base_url() ?>motorcycles/index/all/brand/type/transmission/diplacement/engine-type" role="button">Explore Motorcycles</a>
		</div>
		
	</section>
</div>
	<!-- <div class="container-fluid slider-bg">
		<div class="row">
			<div class="col text-center">
				<h1 class="title-slider">Featured Motorcycles</h1>
				<br>
				<div id="slideshow">
				<div class="slick">
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/honda-CLICK150i-Brown.png"><p class="moto-descrip">MOTORCYLE 1</p></div>
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/SPRINT-CARBON-Black.png"><p class="moto-descrip">MOTORCYLE 2</p></div>
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/kawasaki-versys-650-black.png"><p class="moto-descrip">MOTORCYLE 3</p></div>
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/yamaha-mio-i125-black.png"><p class="moto-descrip">MOTORCYLE 4</p></div>
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/sym-bonus-110-blue.png"><p class="moto-descrip">MOTORCYLE 5</p></div>
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/yamaha-mio-aerox-s-matte-blue.png"><p class="moto-descrip">MOTORCYLE 6</p></div>
					<div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/kymco-xtown-300i-black.png"><p class="moto-descrip">MOTORCYLE 7</p></div>
					
				
				</div>
				</div>
			</div>
		</div>
	</div> -->
</div>

<script>
	 $('#slideshow .slick').slick({
		slidesToShow:3,
		slidesToScroll:1,
		autoplay:true,
		autoplaySpeed:2000,
    	infinite: true,
		responsive: [
						{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
						}
						},
						{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
						}
					]
		});
</script>


<!-- content end -->