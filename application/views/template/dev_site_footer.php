





<?php if ( $this->cart->total_items() != 0 ):?>




<div style="    bottom: 265px;
    position: fixed;
    /* top: 100px; */
    z-index: 2000000 !important;
    right: -113px;
    background: #000;
    padding: 15px 40px;
    border-radius: 10px 10px 0px 0;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
    transform: rotate(270deg);">
  <a href="<?php echo base_url('compare')?>" style="    color: #fdcf08;
    font-size: 18px;">Compare Motorcycles  
                    <span class="no_items">
                    <?php echo $this->cart->total_items() ?>
                    </span>
                    </a>
</div>



<?php endif?>

<style type="text/css">
  .theme-text-color{
    color:#face0b!important;
  }
  .m-unset{
    margin: unset!important;
  }
  .mtb-10{
    margin: 10px 0px !important;
  }

</style>



<div class="b-info">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <aside class="b-info__aside  zoomInLeft" data-wow-delay="0.3s">
              <!-- <article class="b-info__aside-article">
                <h3>OPENING HOURS</h3>
                <div class="b-info__aside-article-item">
                  <h6>Sales Department</h6>
                  <p>Mon-Sat : 8:00am - 5:00pm<span>&middot;</span> 
                    Sunday is closed</p>
                </div>
                <div class="b-info__aside-article-item">
                  <h6>Service Department</h6>
                  <p>Mon-Sat : 8:00am - 5:00pm<span>&middot;</span> 
                    Sunday is closed</p>
                </div>
              </article> -->
              <article class="b-info__aside-article">
                <h3>About us</h3>
                <div class="zoomInLeft" data-wow-delay="0.3s"> <p> motogarahe.com 
                  is an interactive website that helps you to <span class="theme-text-color">SEARCH</span>,<span class="theme-text-color">COMPARE</span> and <span class="theme-text-color">PURCHASE</span> the right motorcycle for you.
                  </p>
                 <p class="search mtb-10"> <span class="theme-text-color m-unset"> SEARCH </span> for the brand/model of a motorcycle that you have in mind or you would like to buy.</p>
                 <p class="compare mtb-10"> <span class="theme-text-color m-unset"> COMPARE </span> the models, specs, prices of different motorcycles based on your chosen city location.</p>
                 <p class="purchase mtb-10"> <span class="theme-text-color m-unset"> PURCHASE </span> now. Our partner-dealer will assist you in your buying journey.</p>
                 <p>This platform will also update the buyers/ motorcycle enthusiasts about trends, products and services related to motorcycle industry.
                 </p>
                 <h6 class="tme">Hanap moto? Easy. -motogarahe.com 
                </h6>
               </div>
              </article>
            </aside>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="b-info__latest">
              <h3 class=" slideInUp" data-wow-delay="0.3s">LATEST MOTORS</h3>
              <?php if ( isset( $latest_motorcycles ) ):$x=1;?>
              <?php foreach($latest_motorcycles as $motorcycle): ?>
                <div class="b-info__latest-article slideInUp" data-wow-delay="0.3s">
                  <div class="b-info__latest-article-photo m-audi"></div>
                  <div class="b-info__latest-article-info">
                    <h6><a href="<?php echo base_url('motorcycles/details')?>"><?php echo $motorcycle['mot_model']?></b></a></h6>
                    <div class="b-featured__item-links m-auto">
                      <a href="#"><?php echo $motorcycle['mot_brand']?> - <?php echo $motorcycle['name']?></a>
                    </div>
                    <p>&#8369; <?php echo number_format( $motorcycle['dem_price'], 2) ?></p>
                  </div>
                </div>
              <?php endforeach;?>
              <?php endif;?>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <address class="b-info__contacts  slideInUp" data-wow-delay="0.3s">
              <p>contact us</p>
              <div class="b-info__contacts-item">
                <span class="fa fa-map-marker" style="    margin-bottom: 16px;"></span>
                <em>7th Floor, Unit-G One Jorama Place Building Congressional Ave. Extn. Corner San Beda St., Quezon City, Philippines</em>
              </div>
              <div class="b-info__contacts-item">
                <span class="fa fa-phone"></span>
                <em>Phone:  (02) 8421-7993 </em>
              </div>
              <!-- <div class="b-info__contacts-item">
                <span class="fa fa-fax"></span>
                <em>FAX:  1-800- 624-5462</em>
              </div> -->
              <div class="b-info__contacts-item">
                <span class="fa fa-envelope"></span>
                <em>Email:  info@motogarahe.com</em>
              </div>
            </address>
            <address class="b-info__map">
              <a href="<?php echo base_url('contact_us')?>">Open Location Map</a>
            </address>
          </div>
        </div>
      </div>
    </div>
    <div style="display: none">
    <?php echo $map['html']; ?>
   </div>
<footer class="b-footer">
      <!-- <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a> -->
      <div class="container">
        <div class="row">
          <div class="col-xs-4">
            
              <div class="b-nav__logo">
                <a href="home-2.html"><img src="<?php echo SITE_IMG_PATH?>logo/logo.jpg"></a>
              </div>
              
          </div>
          <div class="col-xs-8">
            <div class="b-footer__content  slideInRight" data-wow-delay="0.3s">
              <div class="b-footer__content-social">
                <a href="https://www.facebook.com/motogarahecom/"><span class="fa fa-facebook-square"></span></a>
                <a href="https://twitter.com/MotogaraheO"><span class="fa fa-twitter-square"></span></a>
                <!-- <a href="#"><span class="fa fa-google-plus-square"></span></a> -->
                <a href="https://www.instagram.com/motogarahe.com.ph/"><span class="fa fa-instagram"></span></a>
                <a href="https://www.youtube.com/channel/UCvgfjcdVFMv0TkN-ISt5mNA"><span class="fa fa-youtube-square"></span></a>
                <!-- <a href="#"><span class="fa fa-skype"></span></a> -->
              </div>
              <nav class="b-footer__content-nav">
                <ul>
                  <li><a href="<?php echo base_url('home')?>">Home</a></li>
                  <li><a href="<?php echo base_url('motorcycles/index/all/brand/type/transmission/diplacement/engine-type')?>">Motorcycles</a></li>
                  <li><a href="<?php echo base_url('repo')?>">Repo</a></li>
                  <li><a href="<?php echo base_url('compare')?>">Compare</a></li>
                  <!-- <li><a href="404.html">Dealers</a></li> -->
                  <li><a href="<?php echo base_url('about_us')?>">About Us</a></li>
                  <li><a href="<?php echo base_url('contact_us')?>">Contact Us</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </footer><!--b-footer-->

    <script src="<?php echo SITE_JS_PATH?>jquery-ui.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>bootstrap.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>modernizr.custom.js"></script>

    <script src="<?php echo SITE_ASSETS_PATH?>rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>waypoints.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>jquery.easypiechart.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>classie.js"></script>

    <!--Owl Carousel-->
    <script src="<?php echo SITE_ASSETS_PATH?>owl-carousel/owl.carousel.min.js"></script>
    <!--bxSlider-->
    <script src="<?php echo SITE_ASSETS_PATH?>bxslider/jquery.bxslider.js"></script>
    <!-- jQuery UI Slider -->
    <script src="<?php echo SITE_ASSETS_PATH?>slider/jquery.ui-slider.js"></script>

    <!--Theme-->
    <script src="<?php echo SITE_JS_PATH?>jquery.smooth-scroll.js"></script>
    <script src="<?php echo SITE_JS_PATH?>wow.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>jquery.placeholder.min.js"></script>
    <script src="<?php echo SITE_JS_PATH?>theme.js"></script>

    <script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>
    
     <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5dad1a4278ab74187a5a9f6e/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150753655-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-150753655-1');
    </script>


    

    <script>  

            $('iframe').css("bottom", 75);
        
            // Define the menu we are working with
            var menu = $('.b-nav');
            var menu2 = $('.b-topBar');
            var currentHeight = menu.outerHeight();
            var currentHeight2 = menu2.outerHeight();

            // Get the menus current offset
            var origOffsetY = menu.offset().top;

            /**
             * scroll
             * Perform our menu mod
             */
            function scroll() {

                // Check the menus offset. 
                if ($(window).scrollTop() >= (currentHeight + currentHeight2)) {

                    //If it is indeed beyond the offset, affix it to the top.
                    //$(menu).addClass('fixed-top');
                    // $(".b-topBar").css("margin-bottom", currentHeight);
                } else {

                    // Otherwise, un affix it.
                    //$(menu).removeClass('fixed-top');
                    // $(".b-topBar").css("margin-bottom", 0);
                }
            }

            // Anytime the document is scrolled act on it
            document.onscroll = scroll;

     
    </script>
    

    

    <?php if ( isset( $msg_error ) ): ?>
      <div id="dom-target" style="display: none;">  
        <?php
          echo "<pre>";
          print_r ($msg_error);
          echo "</pre>";
        ?>
      </div>  
      <?php endif;?>
    <script>
      var msg_success = "<?php echo $this->session->flashdata('msg_success') ?>";
      if ( msg_success != "" ) {
        toastr.success('Success!', msg_success );
      }

      var msg_error = "<?php echo $this->session->flashdata('msg_error') ?>";
      if ( msg_error != "" ) {
        toastr.error('Error!', msg_error );
      }

      var div = document.getElementById("dom-target");
      var msg_error = div.textContent;
      if ( msg_error != "" || msg_error == 'false') {
        toastr.error('Error!', msg_error );
      }
    </script>
    <script type="text/javascript">
      $('.datepicker').datepicker({
        "todayHighlight":true,
        "autoclose": true
      });
    </script>
  </body>
</html>