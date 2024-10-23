<style>
	select {
	    width: 100%;
	    padding: 10px 20px 10px 25px;
	    border: 1px solid #323232;
	    border-radius: 30px;
	    font: 400 13px 'Open Sans',sans-serif;
	    background: #323232;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    -ms-appearance: none;
	    appearance: none!important;
	    cursor: pointer;
	    color: #fff;
	}

	select + span.fa {
    top: 14px;
    right: 45px;
    position: absolute;
}

.m-firstSelects {
    margin-bottom: 10px;
}.panel-title {    text-align: right;
    font-size: 13px;
    color: #fff;}
    .slider {
    width: 100%;
     margin-left: 0px; 
}
.m-secondSelects.b-error {
	text-align: left !important
}

.slider {margin-top: 0px;}
.b-search__main-form-range {margin-bottom: 0px;}

.panel, .panel-group .panel-heading+.panel-collapse>.panel-body{
    border: none;
    box-shadow:none;
}

.home2 img {
	max-width: 600px;
	width: 100%;
}

.b-topBar, .b-nav, .b-info, .b-footer {display: none}

.b-error {padding-top: 200px;}

.b-blog__aside-search button {
    background: initial;
    position: initial;
    border: 2px solid #323232;
    display: initial;
    top: initial;
    font-size: initial;
    margin-top: initial;
    right: initial;
    -moz-transform: initial;
    -webkit-transform: initial;
    -o-transform: initial;
    transform: initial;
    filter: initial;
    -ms-filter: initial;
        color: #fcd103;
    background-color: #323232;
    width: 175px;
    margin-top: 10px;
    font-size: 14px !important;
}

.b-blog__aside-search a.repo  {
	background-color: #323232;
	border: 1px solid #323232;
	    color: #fcd103;
	    width: 175px;
	    margin-top: 10px;
}

.s-title.zoomInUp {
	border:none;
	    padding-left: 0px;
    padding-right: 0px;
    color: #ffffff !important; 
    margin: 0px 0 36px 0 !important;
}
.adv-btn{
	width: 100%;
    padding: 10px 20px 10px 25px;
    border: 1px solid #323232;
    border-radius: 30px;
    font: 400 13px 'Open Sans',sans-serif;
    background: #323232;
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    appearance: none!important;
    cursor: pointer;
    color: #fcd103;
    margin-top: 0;
}
.adv-btn:hover{
	
    color: #fcd103;
    
}


section, .panel-group .panel{
	background-color: transparent !important;
	fill: transparent !important;
}

body {
	    background-color: #000000;
    background-image: linear-gradient( to right, black, #252525 );
}

.btn-default:hover {
	background-color: #323232;
    border: 1px solid #323232	;
    color: #fcd103;
}
@media only screen and (max-width: 600px){
	.m-firstSelects{
		margin-bottom: 0px;
	}
}


/* 
## ##  ##  ##  ##  ## ##  ## ##  ##  ##  ##
## ##  ##  ##  ##  ## ##  ## ##  ##  ##  ##
for input search style  with magnifying glass
## ##  ##  ##  ##  ##  ## ##  ## ##  ##  ## 
## ##  ##  ##  ##  ##  ## ##  ## ##  ##  ## 
*/


.inputSearch {
  padding: 10px;
  border: 2px solid white!important;
  float: left;
  width: 90%!important;
  background: white;
  border-bottom-left-radius: 30px!important;
  border-bottom-right-radius: unset!important;
  border-top-right-radius: unset!important;
  border-top-left-radius: 30px!important;
}

.magnifyingGlass {
  float: left;
  width: 10%!important;
  padding: 10px;
  background: #fdcf06;
  color: #fdcf06;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  margin-top: unset!important;
  border-top-right-radius: 30px!important;
 border-bottom-right-radius: 30px!important;
}

/*
form.b-blog__aside-search::after {
  content: "";
  clear: both;
  display: table;
}*/
.search-div{
	height: 50px;
}
.magnifying-icon{
	color: #fdcf06!important;

}

</style>
<section class="b-error home2">
	<div class="container">
		<center><img class="img img-responsive" src="<?php echo SITE_IMG_PATH?>motogarahe_logo.png" alt=""></center>
		<!-- <h3 class="s-title">The easiest way to buy a motorcycle</h3> -->
		<h3 class="s-title zoomInUp" data-wow-delay="0.7s">Search .</h3>
		<h3 class="s-title zoomInUp" data-wow-delay="0.7s">Compare .</h3>
		<h3 class="s-title zoomInUp" data-wow-delay="0.7s">Purchase</h3>
		<!-- <div>The easiest way to buy a motorcycle</div> -->
		<form class="b-blog__aside-search" id="formmm" method="post">
			<div class="search-div">
				<input class="inputSearch" autocomplete="off" type="text" name="mot_model" value="" placeholder="What motorcycle is on your mind?" inputmode="search"/>
				<button type="button"  class="magnifyingGlass" ><span class="fa fa-search magnifying-icon"></span></button>
			</div>  
			<div id="accordion" class="panel-group">
			    <div class="panel">
			      <div class="panel-heading">
			      <h4 class="panel-title">
			        <a href="#panelBodyOne" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Advance Search</a>
			        </h4>
			      </div>
			      <div id="panelBodyOne" class="panel-collapse collapse">
			      <div class="panel-body">
			      		<div class="panel-search">
			        	<div class="container-fluid">
			        		<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="m-firstSelects">
										<div class="col-xs-4">
											<select name="mot_brand">
												<option selected value>Brand</option>
												<option value="Kymco">Kymco</option>
												<option value="Kawasaki">Kawasaki</option>
												<option value="Yamaha">Yamaha</option>
												<option value="Suzuki">Suzuki</option>
												<option value="Honda">Honda</option>
												<option value="Euro-Motor">Euro-Motor</option>
												<option value="Keeway">Keeway</option>
												<option value="SYM">Sym</option>

											</select>
											<span class="fa fa-caret-down"></span>
										</div>
										<div class="col-xs-4">
											<select name="mot_type">
												<option selected value>Category</option>
												<option value="Scooter">Scooter</option>
												<option value="Backbone">Backbone</option>
												<option value="Underbone">Underbone</option>
												<option value="Business">Business</option>
												<option value="ATV">ATV</option>
											</select>
											<span class="fa fa-caret-down"></span>
										</div>
										<div class="col-xs-4">
											<select name="status">
												<option selected value>Status</option>
												<option value="USED">USED</option>
												<option value="NEW">NEW</option>
											</select>
											<span class="fa fa-caret-down"></span>
										</div>
									</div>
									<div class="m-firstSelects">

										<!-- <div class="col-xs-2 hidden-xs">
										</div> -->
										<div class="col-xs-4">
											<select name="mot_transmission">
												<option selected value>Transmission</option>
												<option value="Automatic">Automatic</option>
												<option value="Manual">Manual</option>
												
											</select>
											<span class="fa fa-caret-down"></span>
										</div>
										<div class="col-xs-4">
											<select name="mot_diplacement">
												<option selected value>Displacement</option>
												<option value="100">100cc</option>
												<option value="125">125cc</option>
												<option value="150">150cc</option>
												<option value="200">200cc</option>
												<option value="300">300cc</option>
												<option value="400">400cc</option>
											</select>
											<span class="fa fa-caret-down"></span>
										</div>
										<div class="col-xs-4">
											<a href="" class="adv-btn btn"> Submit </a>
											
										</div>
										
									</div>
									<!-- <hr>
									<div class="m-secondSelects">
										<div class="col-xs-8"></div>
										<div class="col-xs-4">
											<button type="button" class="btn m-btn advance-search" style="transform:inherit;margin-top:initial;background-color:#fdcf09;width:100%;position:initial;border-radius:5px;padding:10px;">Search</button>
										</div>	
									</div> -->
									<!-- <div class="m-secondSelects">
										<div class="col-xs-4">
											<select name="select4">
												<option value="0" selected="selected">Fuel System</option>
												<option value="1">Min Year</option>
												<option value="2">Min Year</option>
												<option value="3">Min Year</option>
												<option value="4">Min Year</option>
												<option value="5">Min Year</option>
											</select>
											<span class="fa fa-caret-down"></span>
										</div>
										<div class="col-xs-4">
											<select name="select5">
												<option value="0" selected="selected">Displacement</option>
												<option value="1">Max Year</option>
												<option value="2">Max Year</option>
												<option value="3">Max Year</option>
												<option value="4">Max Year</option>
											</select>
											<span class="fa fa-caret-down"></span>
										</div> -->
										<!-- <div class="col-xs-4">
											<div class="b-search__main-form-range">
												<label>PRICE RANGE</label>
												<div class="slider"></div>
												<input type="hidden" name="min" class="j-min" value="" />
												<input type="hidden" name="max" class="j-max" value="" />
											</div>
										</div> -->
										<!-- <div class="col-xs-4">
											<select name="select5">
												<option value="0" selected="selected">Engine Type</option>
												<option value="1">Max Year</option>
												<option value="2">Max Year</option>
												<option value="3">Max Year</option>
												<option value="4">Max Year</option>
											</select>
											<span class="fa fa-caret-down"></span>
										</div>
									</div> -->
								</div>
							</div>
			        	</div>  
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="row">
			  	<div style="display: none;" class="col-md-offset-2 col-md-4">
			  		<button type="submit" name="search_mode" value="search_mode" class="btn btn-default submitSearch">New Motorcycles</button>
			  	</div>
			  	<div class="col-md-offset-2 col-md-4">
			  		<a href="<?php echo base_url('motorcycles/index/all/brand/Scooter/transmission/diplacement/engine-type')?>" class="btn btn-default repo">New Motorcycles</a>
			  	</div>
			  	<!-- <div class="col-md-offset-2 col-md-4">
			  		<a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type/')?>" class="btn btn-default repo">New Motorcycles</a>
			  	</div> -->
			  	<div class="col-md-4">
			  		<a  class="btn btn-default repo" href="<?php echo base_url('repo/index/all/brand/type/transmission/diplacement/engine-type')?>">Repo Motorcycles</a>
			  	</div>
			  </div>
		</form>
	</div>
	<!-- <img alt="audi" src="<?php echo SITE_IMG_PATH?>backgrounds/404Bg.png" class="img-responsive center-block b-error-img" /> -->
</section>

<script type="text/javascript">
	$(document).ready(function(){
		var fixHeight = $(".inputSearch").outerHeight();
		var convertheight =  fixHeight + "px";

		$(".inputSearch").css("height", convertheight);
		$(".magnifyingGlass").css("height", convertheight);
		

		// magniyfying trigger click function 
		$(".magnifyingGlass").click(function(){
			$(".submitSearch").trigger("click");
		});
		// advanced search submit
		$(".adv-btn").click(function(){
			$(".submitSearch").trigger("click");
		});
	});
</script>


<!-- <script>
	$( ".advance-search" ).click(function() {
		  $('#formmm').submit(function (evt) {
	   evt.preventDefault(); //prevents the default action

	}
	});
</script> -->

