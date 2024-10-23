
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/tvs-css/mg-mallv3.css">
<!-- <link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/demo.css"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/css/jquery.flipster.css">
<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/flipsternavtabs.css">
<script src="<?php echo base_url() ?>resources/site/flipster/js/jquery.flipster.js"></script>

<style>
.video-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>

<div class="body-content">
    <section class="content">
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-sm-6 col-6 text-left head-text">
                <h3  class="sub-title-page active-sub">Homepage</h3>
            </div>
                <div class="col-md-6 col-sm-6 col-6 text-right logo-holder  ">
                <a href="#"><img src="<?php echo base_url() ?>resources/site/tvs-assets/tvslogov2.png" class="flex-fil tvs-logo "></a>
                </div>
                <!-- /. col -->
                <!-- <div style="" class="d-none col-lg-12 col-sm-12 d-flex flex-row justify-content-center flex-wrap  u-m-t align-content-center moto-offer">
                   <a onclick="download_counter()" href="<?php echo base_url() ?>resources/site/tvs-assets/voucher.jpg" download="" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/voucher.jpg" class="flex-fill "></a>
                </div> -->
                <!-- /.col -->
                <div style="" class="d-none col-lg-12 col-sm-12 d-flex flex-row justify-content-center flex-wrap  u-m-t align-content-center moto-offer">
                    <!--<div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/0gvUVOAVD_A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>-->
                    <!-- /. embed -->
                </div>
                <!-- /.col -->
                <div class="col-lg-6 col-sm-6 col-6  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                     <a href="<?php echo base_url() ?>tvs/info/dazz-110-prime" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/quickv3.jpg" class="flex-fill"></a>
                     <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <!-- /.col -->
                <div class="col-lg-6 col-sm-6 col-6  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <a href="<?php echo base_url() ?>tvs/info/dazz-110-prime" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/sav-time.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <!-- /.col -->
                <div class=" col-lg-6 col-sm-6 col-6 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                   <a href="<?php echo base_url() ?>tvs/index/all/tvs/underbone/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/underbone.jpg" class="flex-fill "></a>
                   <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <!-- /.col -->
                <div class="col-lg-6 col-sm-6 col-6 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                <a href="<?php echo base_url() ?>tvs/index/all/tvs/backbone/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/back-bone.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <!-- /.col -->
                <div class="col-lg-6 col-sm-6 col-6 d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                <a href="<?php echo base_url() ?>tvs/index/all/tvs/scooter/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/scooter.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <!-- /.col -->
                <div class="col-lg-6 col-sm-6 col-6  d-flex flex-row justify-content-center flex-wrap  align-content-center moto-offer">
                    <a href="<?php echo base_url() ?>tvs/index/all/tvs/business/transmission/diplacement/engine-type" class="link-mot"><img src="<?php echo base_url() ?>resources/site/tvs-assets/business.jpg" class="flex-fill"></a>
                    <!-- <a href="https://www.messenger.com/t/motogarahecom" target="_blank" class="offerButton">Get Offer</a> -->
                </div>
                <div class="text-center col-lg-12 col-12">
                    <a href="<?php echo base_url() ?>tvs/index/all/tvs/type/transmission/diplacement/engine-type"   class="m-5 btn btn-primary bg-tvs-blue"> View All TVS Motorcycles</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.sectiont content -->

<div id="Main-Content" class="slider-bg" style="display:none;" >
    <div class="Container">
            <div id="Carousel">
                <ul class="flip-items">
                    <li id="Carousel-1" title="voucher" data-flip-category="promo">
                        <img src="<?php echo base_url() ?>resources/site/flipster/img/car1.jpg">
                    </li>
                    <!-- /. items -->
                    <li id="Carousel-2" title="tvs1" data-flip-category="motor">
                        <img src="<?php echo base_url() ?>resources/site/tvs-assets/t1.png">
                    </li>
                    <!-- /. items -->
                    <li id="Carousel-3" title="tvs2" data-flip-category="motor">
                        <img src="<?php echo base_url() ?>resources/site/tvs-assets/t2.png">
                    </li>
                    <!-- /. items -->
                    <li id="Carousel-4" title="tvs3" data-flip-category="motor">
                        <img src="<?php echo base_url() ?>resources/site/tvs-assets/t3.png">
                    </li>
                    <!-- /. items -->
                </ul>
                <!-- /.flip items -->
            </div>
            <!-- /.flip carousel -->
        </div>
            <div class="text-center">
                <a href="<?php echo base_url() ?>resources/site/tvs-assets/voucher.jpg"  download="" onclick="download_counter()"  class="m-5 btn btn-primary bg-tvs-blue"> Download Voucher</a>
            </div>
            <!-- /. div button -->
    </div>
    <!-- /. container -->
</div>
<!-- /.body content -->


<script>
function download_counter(){
    $.ajax({
        method:"post",
        url:'<?php echo base_url(); ?>tvs/download',
        cache:false,
        success:function(res){
				toastr.success('Download success!')
        },
        fail:function(res){
				toastr.warning('something went wrong!')
        }
    });
}

$(function(){
		
	

		$("#Carousel").flipster({
			itemContainer: 			'ul', // Container for the flippin' items.
			itemSelector: 			'li', // Selector for children of itemContainer to flip
			style:							'carousel', // Switch between 'coverflow' or 'carousel' display styles
			start: 							0, // Starting item. Set to 0 to start at the first, 'center' to start in the middle or the index of the item you want to start with.
			
			enableKeyboard: 		true, // Enable left/right arrow navigation
			enableMousewheel: 	false, // Enable scrollwheel navigation (up = left, down = right)
			enableTouch: 				true, // Enable swipe navigation for touch devices
			
			enableNav: 					false, // If true, flipster will insert an unordered list of the slides
			enableNavButtons: 	true, // If true, flipster will insert Previous / Next buttons
			
			onItemSwitch: 			function(){}, // Callback function when items are switches
		});
	
	});
</script>