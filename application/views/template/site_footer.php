




<style type="text/css">
  .sticky-compare{
    display: none!important;
  }
</style>
<?php if ( $this->cart->total_items() != 0 ):?>




<div class="sticky-compare" style="    bottom: 265px;
    position: fixed;
    /* top: 100px; */
    z-index: 2000000 !important;
    right: -120px;
    background: #000;
    padding: 15px 20px 15px 20px;
    border-radius: 10px 10px 0px 0;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
    transform: rotate(270deg);">
  <a href="<?php echo base_url('compare')?>" style="    color: #fdcf08;
    font-size: 18px;">Compare Motorcycles  
                    <span class="no_items">
                    <?php echo $this->cart->total_items() ?>
                    </span>
                    </a>
 <a href="<?php echo base_url() . 'compare/remove_all' ?>"> <span class="fa fa-times" style="font-size: 18px; color: #fff; font-weight: 800; transform: rotate(90deg); padding: 0 15px; cursor: pointer;"></span>
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
  .b-info__contacts-item span.fa-mobile{
    margin-right: 18px!important
  }
  .send-link{
    color: #999;

  }
  .send-link:hover{
    color: #face0b;
    
  }

</style>



<div class="b-info" style="z-index:999;">
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
                 <p>This platform will also update the buyers and motorcycle enthusiasts about trends, products and services related to motorcycle industry.
                 </p>
                 <h6 class="theme-text-color">Hanap Moto? Easy!
                </h6>
               </div>
              </article>
            </aside>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="b-info__latest">
              <!-- <h3 class=" slideInUp" data-wow-delay="0.3s">LATEST MOTORS</h3> -->
             <!--  <?php if ( isset( $latest_motorcycles ) ):$x=1;?>
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
              <?php endif;?> -->
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <address class="b-info__contacts  slideInUp" data-wow-delay="0.3s">
              <p>contact us</p>
              <div class="b-info__contacts-item">
                <span class="fa fa-map-marker" style="    margin-bottom: 16px;"></span>
                <a class="send-link" target="_blank" href="https://www.google.com/maps/place/One+Joroma+Place/@14.6716565,121.0408989,19z/data=!4m5!3m4!1s0x0:0x210bc90aa1d5efba!8m2!3d14.6716757!4d121.0410772"><em>7th Floor, Unit-G One Joroma Place Building Congressional Ave. Extn. Corner San Beda St., Quezon City, Philippines</em></a>
              </div>
              <div class="b-info__contacts-item">
                <span class="fa fa-mobile"></span>
                <a class="send-link" href="tel:(+63) 919-007-5800"><em>Mobile:  (+63) 919-007-5800 </em></a>
              </div>
              <div class="b-info__contacts-item">
                <span class="fa fa-phone"></span>
                <a class="send-link" href="tel:(02) 8421-7993"><em>Phone: &nbsp;(02) 8421-7993</em></a>
              </div>
              <div class="b-info__contacts-item">
                <span class="fa fa-envelope"></span>
               <a class="send-link" href="mailto:info@motogarahe.com"><em> Email:  info@motogarahe.com </em></a>
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

   <!-- start promo modal -->
     <div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document" style="top:20%">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
              <div class="col-md-11 col-xs-10">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>Motogarahe.com Club Mechanics</strong></h5>
              </div>
              <div class="col-md-1 col-xs-2">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            
          </div>
          <div class="modal-body">
            1.) Customers who purchased their motorcycles using the motogarahe.com website are entitled to a 2-year membership from motogarahe.com club. If in case the member will purchase again in the next two years and has an active membership from motogarahe.com, the new membership can be transferred to a family member or the existing membership expiration will be extended by using the date of the new purchase.<br><br>
            2.) Customers need to text the sales invoice number to 09190075800 (Smart) then they will be given a unique 8 digit number that will serve as their membership number. The membership number will be sent to their registered mobile number. In case the member needs to change his/ her mobile number, the member needs to email club@motogarahe.com and request to update their registered mobile number.<br><br>
            3.) The membership is valid for two years and can be extended for one year but the member needs to pay Php150 pesos.<br> <br>
            4.) Discounts and privileges are exclusive for the member only.<br> <br>
            5.) Membership, including the discounts and privileges, can be cancelled by motogarahe.com anytime with the reasons that is accordance to the law of the Philippines.<br><br> 
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>

   <!-- end of promo modal -->
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
                <a href="https://www.facebook.com/motogarahecom/" target="_blank"><span class="fa fa-facebook-square"></span></a>
                <a href="https://www.youtube.com/channel/UCvgfjcdVFMv0TkN-ISt5mNA" target="_blank"><span class="fa fa-youtube-square"></span></a>

                <a href="https://twitter.com/MotogaraheO" target="_blank"><span class="fa fa-twitter-square"></span></a>
                
                <!-- <a href="#"><span class="fa fa-google-plus-square"></span></a> -->
                <a href="https://www.instagram.com/motogarahe.com.ph/" target="_blank"><span class="fa fa-instagram"></span></a>
                <a href="https://www.linkedin.com/company/motogarahe-com/about/" target="_blank"><span class="fa fa-linkedin-square"></span></a>

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
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
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



    <style>
       @import url("https://fonts.googleapis.com/css?family=Nunito:300,700");
      .cookie-dialog,.cookie-dialog__text,.cookie-dialog__text a,.cookie-dialog__btn{
          font-family:"Nunito",Arial,sans-serif !important
      }
      .cookie-dialog{
          box-shadow:3px 3px 8px #000
      }
      .cookie-dialog__btn:hover{
          cursor:pointer
      }
      .cookie-dialog{
          background-color:rgba(0,0,0,0.95) !important;
          color:#fff !important
      }
      .cookie-dialog__btn{
          text-align:center
      }
      .cookie-dialog{
          position:fixed
      }
      .cookie-dialog__btn{
          text-transform:uppercase
      }
      .cookie-dialog__btn{
          font-weight:700
      }
      .cookie-dialog{
          box-sizing:border-box
      }
      .cookie-dialog{
          overflow:none
      }
      .cookie-transition{
          transform:translateX(0%) !important;
          -webkit-transform:translateX(0%) !important;
          right: 20%!important;
      }
      .cookie-dialog{
          -webkit-border-radius:15px;
          -moz-border-radius:15px;
          -o-border-radius:15px;
          border-radius:15px;
          bottom:100px;
          right:20px;
          width:280px;
          transform:translateX(111%);
          -webkit-transform:translateX(111%);
          -moz-transform:translateX(111%);
          -o-transform:translateX(111%);
          transition:transform 0.55s cubic-bezier(0.06, 0.71, 0.39, 1.17);
          -webkit-transition:transform 0.55s cubic-bezier(0.06, 0.71, 0.39, 1.17);
          -moz-transition:transform 0.55s cubic-bezier(0.06, 0.71, 0.39, 1.17);
          -o-transition:transform 0.55s cubic-bezier(0.06, 0.71, 0.39, 1.17);
          -webkit-backdrop-filter:blur(30px);
          padding:1.2em;
          z-index:9999;
          will-change:transform;
          max-height:unset;
      }
      .cookie-dialog .cookie-button__container{
          display:-webkit-flex;
          display:flex;
          -webkit-flex-direction:column;
          flex-direction:column
      }
      .cookie-dialog .cookie-button__container .cookie-dialog__btn:not(:last-child){
          margin-bottom:8px
      }
      .cookie-dialog .cookie-button__container .cookie-dialog__btn.is-gry{
          background-color:#b2b2b2 !important;
          opacity:0.8
      }
      .cookie-dialog .cookie-button__container .cookie-dialog__btn.is-gry:hover{
          background-color:#7f7f7f !important;
          opacity:1
      }
      .cookie-dialog__text{
          font-size:16px !important;
          line-height:1.3em !important;
          margin:0 0 10px 0 !important
      }
      .cookie-dialog__text a{
          color:#fff !important;
          text-decoration:underline !important
      }
      .cookie-dialog__text a:hover{
          color:#e7e7e7 !important
      }
      .cookie-dialog__btn{
          -webkit-border-radius:5px;
          -moz-border-radius:5px;
          -o-border-radius:5px;
          border-radius:5px;
          width:100% !important;
          -webkit-appearance:none;
          padding:12px !important;
          font-size:16px !important;
          background-color:#fff !important;
          background:#fff !important;
          color:#1a1a1a;
          border:none;
          font-size:.875em
      }
      .cookie-dialog__btn:hover{
          background-color:#FDCF09 !important;
          background:#FDCF09 !important;
          border:none !important
      }
      @media screen and (max-width: 736px){
          .cookie-dialog{
              /*bottom:60px;*/
              left:20px;
              right:20px;
             bottom: 10px;
             
              margin:0 auto;

              width:80%;
              max-width:414px;
              min-width:280px;
              transform:translateY(140%);
              -webkit-transform:translateY(140%);
              -moz-transform:translateY(140%);
              -o-transform:translateY(140%)
          }
          .cookie-transition{
              transform:translateY(0%) !important;
              -webkit-transform:translateY(0%) !important
          }
      }
      @media screen and (min-width: 737px){
          .cookie-dialog{
              /*bottom:100px;
              right:20px;
              width:280px;*/

              bottom: 9px;
              right: 0%;
              width: 60%;

              left:unset;
              transform:translateX(111%);
              -webkit-transform:translateX(111%);
              -moz-transform:translateX(111%);
              -o-transform:translateX(111%)
          }
          .cookie-transition{
              transform:translateX(0%) !simportant;
              -webkit-transform:translateX(0%) !important
          }
      }
       @media screen and (max-width: 500px){
          .cookie-dialog{
              left: 45px;
          }
          
      }
      @media screen and (max-width: 414px){
          .cookie-dialog{
              left: 45px;
          }
          
      }
      @media screen and (max-width: 375px){
          .cookie-dialog{
              left: 45px;
          }
          
      }
      @media screen and (max-width: 320px){
          .cookie-dialog{
              left: 25px;
          }
          
      }

  </style>
  <div class="cookie-dialog gtm-privacyPolicy" id="cookie-dialog">
  <div class="cookie-dialog__content" id="cookie-dialog-content">
  <p class="cookie-dialog__text" style="text-align: center">We use cookies to ensure you get the best experience on motogarahe.com. By continued use, you agree to our privacy policy and accept our use of such cookies. 
    <!-- Find out more <a href="/privacy-policy" target="_blank">here</a>. -->
  </p>
  <div class="cookie-button__container">
  <button class="cookie-dialog__btn gtm-privacyAgree" id="cookie-cta" style="background-color: #FDCF09 !important;color: #323232 !important;">
  I Agree
  </button>
  <a class="" id="cookie-cta2" style="text-align: center;
    color: #656565;cursor: pointer;">
  I Disagree
  </a>
  </div>
  </div>
  </div>

  <script type="text/javascript">
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return null;
    }

    $(function() {
        /*setTimeout(function() {*/
            if(getCookie('MOTOGARAHE') === null){
                $('#cookie-dialog').addClass('cookie-transition');
            }
        /*}, 999);*/
        
        $('#cookie-cta,#cookie-cta2').click(function() {
            $('#cookie-dialog').toggleClass('cookie-transition');
            var date = new Date();
            var year = date.getFullYear();
            var month = date.getMonth();
            var day = date.getDate();
            var d = new Date(year + 2, month, day);
            var n = d.toUTCString();

            if($(this).attr('id') == 'cookie-cta'){
                MOTOGARAHE = 1;
            }else{
                MOTOGARAHE = 0;
            }

            document.cookie = "MOTOGARAHE="+MOTOGARAHE+"; expires=" + n +"; path=/";
        });

    });
    </script>


  </body>


</html>