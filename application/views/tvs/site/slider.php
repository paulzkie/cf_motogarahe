<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/demo.css">
<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/css/jquery.flipster.css">
<link rel="stylesheet" href="<?php echo base_url() ?>resources/site/flipster/flipsternavtabs.css">
<script src="<?php echo base_url() ?>resources/site/flipster/js/jquery.flipster.js"></script>

<div id="Main-Content">
	<div class="Container">
		<h3>Flipster Carousel</h3>
<!-- Flipster List -->	
		<div id="Carousel">
		  <ul class="flip-items">
	    	<li id="Carousel-1" title="Cricket" data-flip-category="Fun Sports">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-1.jpeg">
	    	</li>
	    	<li id="Carousel-2" title="Surfing" data-flip-category="Fun Sports">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-2.jpeg">
	    	</li>
	    	<li id="Carousel-3" title="Baseball" data-flip-category="Boring Sports">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-3.jpeg">
	    	</li>
	    	<li id="Carousel-4" title="Running" data-flip-category="Boring Sports">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-4.jpeg">
	    	</li>
	    	<li id="Carousel-7" title="Air Kicking" data-flip-category="These are Sports?">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-7.jpeg">
	    	</li>
	    	<li id="Carousel-5" title="Bike Sitting" data-flip-category="These are Sports?">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-5.jpeg">
	    	</li>
	    	<li id="Carousel-6" title="Extreme Bike Sitting" data-flip-category="These are Sports?">
	    		<img src="<?php echo base_url() ?>resources/site/flipster/img/Sport-6.jpeg">
	    	</li>
		  </ul>
		</div>
<!-- End Flipster List -->

	</div>
</div>
<script>

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