<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/blog-content.css">

<!-- content start -->
<div class="body-content">
  <div class="container">
    <div class="nav-back">
      <a href="<?php echo base_url().'blogs' ?>" class="back-btn"><span class="b-icon"><</span><span> Back</span></a>
    </div>
    <!-- blog content details start -->
    <?php $x = 1; if ( isset( $blogs ) ):?>
                      <?php foreach($blogs as $blogs): ?>
    <div class="blog-details  ">
    
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
          <h1 class="blog-title "><?php echo $blogs['blo_title']?></h1>
          <h6><span class="blog-author">By: <?php echo $blogs['blo_author']?></span>|<span class="blog-date"><?php echo date("F j, Y, g:i a",strtotime($blogs['blo_created'])) ?></span></h6>
          </div>
        </div>
        <!-- <h1 class="blog-title "><?php echo $blogs['blo_title']?></h1>
        <h6><span class="blog-author">By: JLR</span>|<span class="blog-date"><?php echo date("F j, Y, g:i a",strtotime($blogs['blo_created'])) ?></span></h6> -->
        <!-- <h1 class="blog-title">2020 NFMCP Annual Convention Cancelled</h1>
        <h6><span class="blog-author">By: JLR</span>|<span class="blog-date">April 18,2020</span></h6> -->
        <div class="text-center"><img class="" src="<?php echo base_url() . "/" .$blogs['blo_image']?>"></div>
        <p><?php echo $blogs['blo_content']?>
        </p>
        <p>
          So mga Motopips let’s all be patient and cooperative, we will be riding again soon! Stay safe Motopips!
        </p>
    </div>
    <?php endforeach;?>
                <?php endif;?>


    <!-- blog content details end -->
    <!-- subscribe start -->

    <div class="subscribe-sec text-center">
      <h1 class="blog-title">SIGN UP FOR THE MOTORGARAHE.COM NEWSLETTER</h1>
      <p>Don’t miss out on our regular newsletter. Receive updates on the motorcycle community and other
        fresh and relevant motorcycle content by signing up. </p>
        <form class="subs-form" method="post">
          <div class="form-group">
            <input type="email" class="subs-email" id="exampleInputEmail1" name="new_email" aria-describedby="emailHelp" placeholder="Enter email">
            <br>
            <button type="submit" class="btn btn-outline-secondary signup-btn">SIGN UP</button>
          </div>
        </form>

    </div>
    <!-- subscribe end -->
  </div>
  <!-- <div class="container-fluid slider-bg"> -->
  <div class="container-fluid ">
    <div class="row">
      <div class="col text-center">
        <!-- <h1 class="title-slider">Popular Motorcycles</h1> -->
        <br>
        <div id="slideshow">
        <div class="slick">
          <!-- actual photo po natin sa website start -->
          <!-- <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/honda-CLICK150i-Brown.png"><p class="moto-descrip">MOTORCYLE 1</p></div>
          <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/SPRINT-CARBON-Black.png"><p class="moto-descrip">MOTORCYLE 2</p></div>
          <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/kawasaki-versys-650-black.png"><p class="moto-descrip">MOTORCYLE 3</p></div>
          <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/yamaha-mio-i125-black.png"><p class="moto-descrip">MOTORCYLE 4</p></div>
          <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/sym-bonus-110-blue.png"><p class="moto-descrip">MOTORCYLE 5</p></div>
          <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/yamaha-mio-aerox-s-matte-blue.png"><p class="moto-descrip">MOTORCYLE 6</p></div>
          <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/kymco-xtown-300i-black.png"><p class="moto-descrip">MOTORCYLE 7</p></div> -->
          
         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content end -->



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