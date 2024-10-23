<style type="text/css">
	/* desktop neutral view  */

	.cmp-btn{
		padding: 5px 18px!important;
		border: 1px solid #928d6c !important;
		position: initial;
	    bottom: 8px;
	    margin-top: 0px;
	    background-color: transparent !important;
	    font-size: 12px !important;
	    margin-right: 20px !important;
	    color: #908b73 !important /*color:#face0b !important;*/;
	    margin-top: unset!important;
	    border-radius: 0px!important
	}
	.cmp-btn:hover{
		background-color: #444444!important;
		color: white!important;
	}
	.spacer{
		height: 200px;
	}
	.brand_logo {
	    width: 40px;
	    bottom: 0px;
	    right: 0px;
	    float: right;
	    padding: 0;
	    margin-top: -5px;

	}
	.pd-4{
		padding: 40px;
	}
	/* [1] The container */
	.img-hover-zoom {
	  z-index: 999;
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
	.mot_header{
		font: 600 15px open sans,sans-serif;
	}
	.mot-price{
		font: 600 15px open sans,sans-serif;

	}
	/* enable absolute positioning */
	.inner-addon { 
	    position: relative; 
	}

	/* style icon */
	.inner-addon .glyphicon {
	  position: absolute;
	  padding: 5px 25px;
	  pointer-events: none;
	}

	/* align icon */
	.left-addon .glyphicon  { left:  0px;}
	.right-addon .glyphicon { right: 0px;}

	/* add padding  */
	.left-addon input  { padding-left:  30px; }
	.right-addon input { padding-right: 30px; }

	select.m-select {
        width: 100%;
	    padding: 0px 0 12px 20px!important;
	    border: unset!important;
	}
	.fa-caret-down{
		float: right;
		margin-top: -10px;
		z-index: -1;
	}

	/* shrink web */
	@media only screen and (max-width: 600px){
		.spacer{
			height: 150px;
		}
		select.m-select {
		    width: 100%;
		    padding: 5px 0px 12px 5px!important;
		    border: unset!important;
		}
	}
	/* new phones with bigger size */
	@media only screen and (max-width: 500){

	}
	/* pixel 1 and 2 */
	@media only screen and (max-width: 414px){

	}
	/* small phone */
	@media only screen and (max-width: 360px){

	}
	/* smallest phone */
	@media only screen and (max-width: 320px){

	}
</style>	

<script>
	$(document).ready(function(){
	  var windowWidth = $(window).width();
	  if(windowWidth <= 767) //for iPad & smaller devices
	     $('.panel-collapse').removeClass('in')
	});
</script>
<div class="container">

	<h1 class="title-page">NEW MOTORCYCLES</h1>
	<div class="" id="search-option">
        		<hr class="mt-2 mb-5 hide-xs">

        		<div class="row">
        			<form >
        				<div class="inner-addon left-addon col-md-2">
						    <i class="glyphicon fa fa-search"></i>
						   <input autocomplete="off" placeholder="" type="text" name="mot_model" value="<?php echo $mot_model != 'all' ? $mot_model : ''?>" inputmode="search">
						   
						</div>
        				
        			<div class="col-md-2">
        				<div>
							<select name="mot_brand" class="m-select">
								<option value>Brand</option>
								<!--<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>-->
								<option <?php echo 'Kawasaki' == $mot_brand ? 'selected' : '' ?> value="Kawasaki">Kawasaki</option>
								<option <?php echo 'Yamaha' == $mot_brand ? 'selected' : '' ?> value="Yamaha">Yamaha</option>
								<option <?php echo 'Suzuki' == $mot_brand ? 'selected' : '' ?> value="Suzuki">Suzuki</option>
								<option <?php echo 'Honda' == $mot_brand ? 'selected' : '' ?> value="Honda">Honda</option>
								<option <?php echo 'Euro-Motor' == $mot_brand ? 'selected' : '' ?> value="Euro-Motor">Euro-Motor</option>
								<option <?php echo 'Keeway' == $mot_brand ? 'selected' : '' ?> value="Keeway">Keeway</option>
								<option <?php echo 'SYM' == $mot_brand ? 'selected' : '' ?> value="Sym">Sym</option>
								<option <?php echo 'Vespa' == $mot_brand ? 'selected' : '' ?> value="Vespa">Vespa</option>
								<option <?php echo 'Kymco' == $mot_brand ? 'selected' : '' ?> value="Kymco">Kymco</option>
							</select>
							<span class="fa fa-caret-down"></span>
						</div>
        			</div>
        			<div class="col-md-2">
        				<div>
							<select name="mot_type" class="m-select">
								<option value>Category</option>
								<option <?php echo 'Big-Bike' == $mot_type ? 'selected' : '' ?> value="Big-Bike">Big Bike</option>
								<option <?php echo 'Scooter' == $mot_type ? 'selected' : '' ?> value="Scooter">Scooter</option>
								<option <?php echo 'Backbone' == $mot_type ? 'selected' : '' ?> value="Backbone">Backbone</option>
								<option <?php echo 'Underbone' == $mot_type ? 'selected' : '' ?> value="Underbone">Underbone</option>
								<option <?php echo 'Business' == $mot_type ? 'selected' : '' ?> value="Business">Business</option>
								<!-- <option <?php echo 'ATV' == $mot_type ? 'selected' : '' ?> value="ATV">ATV</option> -->
							</select>
							<span class="fa fa-caret-down"></span>
						</div>
        			</div>
        			<div class="col-md-2">
        				<div>
							<select name="mot_transmission" class="m-select">
								<option value>Transmission</option>
								<option <?php echo 'Automatic' == $mot_transmission ? 'selected' : '' ?> value="Automatic">Automatic</option>
								<option <?php echo 'Manual' == $mot_transmission ? 'selected' : '' ?> value="Manual">Manual</option>
								
							</select>
							<span class="fa fa-caret-down"></span>
						</div>
        			</div>
        			<div class="col-md-2">
        				<div>
							<select name="mot_diplacement" class="m-select">
								<option value>Displacement</option>
								<option <?php echo '100' == $mot_diplacement ? 'selected' : '' ?> value="100">100cc</option>
								<option <?php echo '125' == $mot_diplacement ? 'selected' : '' ?> value="125">125cc</option>
								<option <?php echo '150' == $mot_diplacement ? 'selected' : '' ?> value="150">150cc</option>
								<option <?php echo '200' == $mot_diplacement ? 'selected' : '' ?> value="200">200cc</option>
								<option <?php echo '300' == $mot_diplacement ? 'selected' : '' ?> value="300">300cc</option>
								<option <?php echo '400' == $mot_diplacement ? 'selected' : '' ?> value="400">400cc</option>
							</select>
							<span class="fa fa-caret-down"></span>
						</div>
        			</div>
        			<div class="col-md-2">
        				<div>
							<select name="sort_by" class="m-select">
								<option value>Sort by</option>
								
							</select>
							<span class="fa fa-caret-down"></span>
						</div>
        			</div>
        			<button style="display: none;" type="submit" name="search_mode" value="search_mode" class="btn m-btn">SUBMIT </button><br />
        			</form>
        		</div>


        		<hr class="mt-2 mb-5 hide-xs">
	</div>
	<div class="row" id="motor-result-display">
		<!-- no result start -->
		<?php if ( empty($motorcycles) ):?>
            <div class="col-lg-12 col-md-12 col-xs-12">
            	<hr class="mt-2 mb-5 hide-xs">
                <div class="alert alert-danger">
                  <strong>No Results!</strong> Your search did not match any listings..
                </div>
            </div>
        <?php  else: ?>    
        	<div class="col-lg-12 col-md-12 col-xs-12">
                <h4><strong>Results found for</strong> <?php echo $mot_model != 'all' ? $mot_model : ''?></h4>
            </div>
        <?php  endif; ?>
		<!-- no result end -->

		<!-- result page start -->
		<?php if ( isset( $motorcycles ) ):$x=1;?>
        <?php foreach($motorcycles as $motorcycle): ?>
        	<div class="col-md-4 col-lg-4 col-sm-6 col-xs-6 pd-4 zoomInUp">
        		<div class="img-thumb">
					<a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>">
						<span class="img-hover-zoom">

							<?php if ( $motorcycle['mop_image'] == 'none' ):?>
	                            <img class='img-responsive  img-result' src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" alt='<?php echo $motorcycle['mot_model']?>'/>
	                        <?php else:?>
	                            <img class='img-responsive  img-result' src="<?php echo base_url() . $motorcycle['mop_image']?>" alt='<?php echo $motorcycle['mot_model']?>'/>
	                        <?php endif;?>
	                    </span>
					</a>
        			
        		</div>
        		<div class="motor-info">
        			<a href="<?php echo base_url('motorcycles/info/') . '/' . $motorcycle['mot_slug'] ?>">
						<span>
							<h4 class="mot_header" style="margin-bottom: 5px;font-weight: 700;color: #000; line-height:1.2;"><?php echo $motorcycle['mot_brand']?>  <?php echo $motorcycle['mot_model']?></h4>
						</span>
					</a>
					<h4 class="mot-price" style="margin-bottom: 5px;font-weight: 700;color:#e44d26;">₱<?php echo number_format( $motorcycle['mot_srp'], 2) ?></h4>
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<a href="<?php echo base_url('compare') . "/add_new_motorcycle/" . $motorcycle['mot_id']?>" class="btn cmp-btn" style="right:15px;"><i class="fa fa-plus"></i> Compare</a>
						</div>
						<div class="col-md-6 col-xs-6 brand_logo">
							<?php if ( $motorcycle['mot_brand'] == 'Kawasaki' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/kawasakilogo80x80.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'Yamaha' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/yamahalogo80x80.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'Kymco' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/kymco80x80.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'Suzuki' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/suzukilogo80x80.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'Euro-Motor' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/euro-motors80x80-2.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'Keeway' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/keeway2new80x80.png'; ?>" alt="">
								<?php elseif( $motorcycle['mot_brand'] == 'Vespa' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/vespa80x80.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'SYM' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/sym80x80.png'; ?>" alt="">
							<?php elseif( $motorcycle['mot_brand'] == 'Honda' ):?>
								<img class="brand_logo" src="<?php echo base_url('uploads/motorlogo') . '/hondalogo80x80.png'; ?>" alt="">
							<?php endif;?>
						</div>
						
					
					</div>
        		</div>

        	</div>
        	<?php endforeach;?>
        	<?php endif;?>
		<!-- result page end -->

	</div>
</div>
<div class="spacer"></div>

	


		<script>
			// (function( $ ) {
			//     // the sameHeight functions makes all the selected elements of the same height
			//     $.fn.sameHeight = function() {
			//         var selector = this;
			//         var heights = [];

			//         // Save the heights of every element into an array
			//         selector.each(function(){
			//             var height = $(this).height();
			//             heights.push(height);
			//         });

			//         // Get the biggest height
			//         var maxHeight = Math.max.apply(null, heights);
			//         // Show in the console to verify
			//         console.log(heights,maxHeight);

			//         // Set the maxHeight to every selected element
			//         selector.each(function(){
			//             $(this).height(maxHeight);
			//         }); 
			//     };
			 
			// }( jQuery ));

			// $('.mot_header').sameHeight();

			// $(window).resize(function(){
			//     // Do it when the window resizes too
			//     $('.mot_header').sameHeight();
			// });
		</script>