<style>
  .b-contacts {
      padding: 30px 0 140px 0;
  }

  body {
  font-family: 'Montserrat', sans-serif;
  -webkit-font-smoothing: antialiased;
  background-color: #245682 !important;
}
.true-center {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  height: 106px;
  width: 690px;
}
.btn {
  position: relative;
  border: 0 !important;
  cursor: pointer;
  -webkit-font-smoothing: antialiased;
  font-weight: bold !important;
  -webkit-border-radius: 10px;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 10px;
  -moz-background-clip: padding;
  border-radius: 10px;
  background-clip: padding-box;
  -webkit-transition: all 50ms ease;
  -moz-transition: all 50ms ease;
  -o-transition: all 50ms ease;
  transition: all 50ms ease;
  border: 0;
  /*text-shadow: 0px 1px 0px #999999;*/
  background-color: #cccccc;
  /*-webkit-box-shadow: 0px 6px 0px #999999;*/
  /*-moz-box-shadow: 0px 6px 0px #999999;*/
  /*box-shadow: 0px 6px 0px #999999;*/
}
.btn:focus {
  outline: 0;
}
.btn:hover {
  top: 2px;
}
.btn:active {
  top: 6px;
}
.btn:hover {
  border: 0;
  background-color: #d9d9d9 !important;
  -webkit-box-shadow: 0px 4px 0px #999999;
  -moz-box-shadow: 0px 4px 0px #999999;
  box-shadow: 0px 4px 0px #999999;
}
.btn:active {
  -webkit-box-shadow: inset 0px 3px 0px #999999;
  -moz-box-shadow: inset 0px 3px 0px #999999;
  box-shadow: inset 0px 3px 0px #999999;
}
.btn-primary {
  border: 0;
  /*text-shadow: 0px 1px 0px #3071a9;*/
  background-color: #428bca;
  /*-webkit-box-shadow: 0px 6px 0px #3071a9;*/
  /*-moz-box-shadow: 0px 6px 0px #3071a9;*/
  /*box-shadow: 0px 6px 0px #3071a9;*/
}
.btn-primary:hover {
  border: 0;
  background-color: #5697d0 !important;
  -webkit-box-shadow: 0px 4px 0px #3071a9;
  -moz-box-shadow: 0px 4px 0px #3071a9;
  box-shadow: 0px 4px 0px #3071a9;
}
.btn-primary:active {
  -webkit-box-shadow: inset 0px 3px 0px #3071a9;
  -moz-box-shadow: inset 0px 3px 0px #3071a9;
  box-shadow: inset 0px 3px 0px #3071a9;
}
.btn-success {
  border: 0;
  text-shadow: 0px 1px 0px #449d44;
  background-color: #5cb85c;
  -webkit-box-shadow: 0px 6px 0px #449d44;
  -moz-box-shadow: 0px 6px 0px #449d44;
  box-shadow: 0px 6px 0px #449d44;
}
.btn-success:hover {
  border: 0;
  background-color: #6ec06e !important;
  -webkit-box-shadow: 0px 4px 0px #449d44;
  -moz-box-shadow: 0px 4px 0px #449d44;
  box-shadow: 0px 4px 0px #449d44;
}
.btn-success:active {
  -webkit-box-shadow: inset 0px 3px 0px #449d44;
  -moz-box-shadow: inset 0px 3px 0px #449d44;
  box-shadow: inset 0px 3px 0px #449d44;
}
.btn-info {
  border: 0;
  text-shadow: 0px 1px 0px #31b0d5;
  background-color: #5bc0de;
  -webkit-box-shadow: 0px 6px 0px #31b0d5;
  -moz-box-shadow: 0px 6px 0px #31b0d5;
  box-shadow: 0px 6px 0px #31b0d5;
}
.btn-info:hover {
  border: 0;
  background-color: #70c8e2 !important;
  -webkit-box-shadow: 0px 4px 0px #31b0d5;
  -moz-box-shadow: 0px 4px 0px #31b0d5;
  box-shadow: 0px 4px 0px #31b0d5;
}
.btn-info:active {
  -webkit-box-shadow: inset 0px 3px 0px #31b0d5;
  -moz-box-shadow: inset 0px 3px 0px #31b0d5;
  box-shadow: inset 0px 3px 0px #31b0d5;
}
.btn-warning {
  border: 0;
  text-shadow: 0px 1px 0px #ec971f;
  background-color: #f0ad4e;
  -webkit-box-shadow: 0px 6px 0px #ec971f;
  -moz-box-shadow: 0px 6px 0px #ec971f;
  box-shadow: 0px 6px 0px #ec971f;
}
.btn-warning:hover {
  border: 0;
  background-color: #f2b866 !important;
  -webkit-box-shadow: 0px 4px 0px #ec971f;
  -moz-box-shadow: 0px 4px 0px #ec971f;
  box-shadow: 0px 4px 0px #ec971f;
}
.btn-warning:active {
  -webkit-box-shadow: inset 0px 3px 0px #ec971f;
  -moz-box-shadow: inset 0px 3px 0px #ec971f;
  box-shadow: inset 0px 3px 0px #ec971f;
}
.btn-danger {
  border: 0;
  text-shadow: 0px 1px 0px #c9302c;
  background-color: #d9534f;
  -webkit-box-shadow: 0px 6px 0px #c9302c;
  -moz-box-shadow: 0px 6px 0px #c9302c;
  box-shadow: 0px 6px 0px #c9302c;
}
.btn-danger:hover {
  border: 0;
  background-color: #de6764 !important;
  -webkit-box-shadow: 0px 4px 0px #c9302c;
  -moz-box-shadow: 0px 4px 0px #c9302c;
  box-shadow: 0px 4px 0px #c9302c;
}
.btn-danger:active {
  -webkit-box-shadow: inset 0px 3px 0px #c9302c;
  -moz-box-shadow: inset 0px 3px 0px #c9302c;
  box-shadow: inset 0px 3px 0px #c9302c;
}
.btn-link {
  text-shadow: none;
  background: none !important;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.btn-link:hover {
  border: 0;
  background: none !important;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  top: 0;
}
.btn-link:active {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  top: 0;
}

/* overide css */
    .b-pageHeader__search h3{
        font-size: 17px!important;
        font-weight: 700!important;
    }
    .b-pageHeader h1{
        margin-left:15px;
        padding-left: 5px;
    }

  /*  .b-features__items:first-child{
        border-left: 3px solid #fff;
        padding-left: 30px;
    }*/

    .pl-65{
        padding-left: 65px;
    }
    .b-pageHeader__search{
    background-color: unset;
  }
   @media only screen and (max-width: 950px){
       /* .b-features__items:first-child{
            border-left: unset;
            padding-left: unset;
        }*/
        .pl-65{
            padding-left: unset;
        }
        .b-pageHeader h1{
                margin-left:0px;
                padding-left: 5px;
                font-size:20px!important;

        }
    }
    @media only screen and (max-width:850px){
            

    }
    @media only screen and (max-width:650px){
            .b-pageHeader h1{
                font-size:27px!important;

            }

    }

</style>

    <section class="b-pageHeader">
      <div class="container">
        <h1 class=" zoomInLeft" data-wow-delay="0.5s">Contact Us</h1>
        <!-- <div class="b-pageHeader__search zoomInRight" data-wow-delay="0.5s">
          <h3><img src="<?php echo base_url('uploads/icon/hanapmototag.png') ?>">
            </h3>
        </div> -->
      </div>
    </section><!--b-pageHeader-->

    <!-- <div class="b-breadCumbs s-shadow zoomInUp" data-wow-delay="0.5s">
      <div class="container">
        <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="contacts.html" class="b-breadCumbs__page m-active">Contact Us</a>
      </div>
    </div> --><!--b-breadCumbs-->


    <section class="b-contacts s-shadow">
      <div class="container">
        <div class="row">
          <div class="col-xs-6">
            <div class="b-contacts__form">
              <header class="b-contacts__form-header s-lineDownLeft zoomInUp" data-wow-delay="0.5s">
                <!-- <h2 class="s-titleDet">Contact Form</h2>  -->
                <a target="_blank" href="https://www.messenger.com/t/motogarahecom" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i> Message us on Facebook</a>
              </header>
              <p class=" zoomInUp" data-wow-delay="0.5s">Message us through facebook messenger, and our customer service professionals will contact you as soon as possible.</p>
              <div id="success"></div>
              <!-- <a target="_blank" href="https://www.messenger.com/t/motogarahecom" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i> Message us on Facebook</a> -->
            </div>
          </div>
          <div class="col-xs-6">
            <div class="b-contacts__address">
              
              <div class="b-contacts__address-info">
                <h2 class="s-titleDet zoomInUp" data-wow-delay="0.5s">get in touch</h2>
                <address class="b-contacts__address-info-main zoomInUp" data-wow-delay="0.5s">
                  <div class="b-contacts__address-info-main-item">
                    <span class="fa fa-home"></span>
                    ADDRESS
                    <p> 7th Floor, Unit-G One Jorama  Place Building Congressional Ave. Extn. Corner San BedaSt., Quezon City, Philippines</p>
                  </div>
                  <div class="b-contacts__address-info-main-item">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 col-xs-12">
                        <span class="fa fa-mobile"></span>
                        MOBILE
                      </div>
                      <div class="col-lg-9 col-md-8 col-xs-12">
                        <em>(+63) 919-007-5800</em>
                      </div>
                    </div>
                  </div>
                  <div class="b-contacts__address-info-main-item">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 col-xs-12">
                        <span class="fa fa-phone"></span>
                        PHONE
                      </div>
                      <div class="col-lg-9 col-md-8 col-xs-12">
                        <em>(02) 8421-7993</em>
                      </div>
                    </div>
                  </div>
                  <div class="b-contacts__address-info-main-item">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 col-xs-12">
                        <span class="fa fa-envelope"></span>
                        EMAIL
                      </div>
                      <div class="col-lg-9 col-md-8 col-xs-12">
                        <em>info@motogarahe.com</em>
                      </div>
                    </div>
                  </div>
                </address>
              </div>
              <div class="b-footer__content-social">
                <a href="https://www.facebook.com/motogarahecom/" target="_blank"><span class="fa fa-facebook-square"></span></a>
                <a href="https://www.youtube.com/channel/UCvgfjcdVFMv0TkN-ISt5mNA" target="_blank"><span class="fa fa-youtube-square"></span></a>
                <a href="https://twitter.com/MotogaraheO" target="_blank"><span class="fa fa-twitter-square"></span></a>
                <a href="https://www.instagram.com/motogarahe.com.ph/" target="_blank"><span class="fa fa-instagram"></span></a>
                <a href="https://www.linkedin.com/company/motogarahe-com/about/" target="_blank"><span class="fa fa-linkedin-square"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!--b-contacts-->


    
<div class="b-features">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-6 col-xs-6">
        <ul class="b-features__items">
          <li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">SEARCH</li>
          <li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">COMPARE</li>
          <li class="zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">PURCHASE</li>
        </ul>
      </div>
    </div>
  </div>
</div><!--b-features-->