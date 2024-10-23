<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/mgnews-blog.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/mgnews-blogv2.css">
<style>
@-webkit-keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0;
  }
  100% {
    background-position: 468px 0;
  }
}

@keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0;
  }
  100% {
    background-position: 468px 0;
  }
}

.content-placeholder {
  display: inline-block;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-name: placeHolderShimmer;
  animation-name: placeHolderShimmer;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  background: #f6f7f8;
  background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
  background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
  background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
  -webkit-background-size: 800px 104px;
  background-size: 800px 104px;
  height: inherit;
  position: relative;
}

.post_data
{
  padding:24px;
  /* border:1px solid #f9f9f9; */
  /* border-radius: 5px; */
  margin-bottom: 24px;
  /* box-shadow: 10px 10px 5px #eeeeee; */
}
#load_data_message,#load_data{
  width:100%
}



#back2Top {
    width: 40px;
    line-height: 40px;
    overflow: hidden;
    z-index: 999;
    display: none;
    cursor: pointer;
    -moz-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
    position: fixed;
    bottom: 50px;
    right: 0;
    background-color: #fdcf07;
    color: #000;
    text-align: center;
    font-size: 30px;
    text-decoration: none;
}
#back2Top:hover {
    background-color: #DDF;
    color: #000;
}

</style>
<!-- content start -->
<div class="body-content">
  <div class="title-info blog-bg">

      <div class="container mx-auto text-white text-center title-header">
          <div class="header-box">
              <h1 class="title-page text-white">MG'S NEWS AND BLOGS</h1>
              <p class="desc-text text-white">Stay up to Date With the Latest News</p>
          </div>
      </div>
  </div>

<div class="container">
  <div class="row blogs-content" id="load_data">
  

  </div>
  <div id="load_data_message"></div>


</div>
<!-- <div class="container-fluid slider-bg">
    <div class="row">
      <div class="col text-center">
        <h1 class="title-slider">Popular Motorcycles</h1>
        <br>
        <div id="slideshow">
        <div class="slick"> -->
          <!-- actual photo po natin sa website start -->
          <!-- <div><img class="moto-img-slide" src="<?php echo base_url() ?>resources/site/newui-assets2/aboutus/honda-CLICK150i-Brown.png"><p class="moto-descrip">MOTORCYLE 1</p></div>
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
<!-- content end -->

<a id="back2Top" title="Back to top" href="#">&#10148;</a>



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

<!-- start ajax script for scroll start -->

<script>
  $(document).ready(function(){

    var limit = 6;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
      // console.log(limit, start);
      $.ajax({
        url:"<?php echo base_url(); ?>blogs/scroll",
        method:"post",
        data:{limit:limit, start:start},
        cache: false,
        success:function(data)
        {
          // console.log(data);
          if(data == '')
          {
            $('#load_data_message').html('<h3></h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

  });
</script>


<script>
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 400) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
</script>
            
           
                
            