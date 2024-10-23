<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
.img-fluid{
    padding:50px;
}
</style>

<div class="body-content">


    <section class="container mt-5">
        <div class="row ">
            <div class="col-md-4 col-lg-4">
			  <img class="card-img-top img-fluid" src="<?php echo base_url('/resources/site/newui-assets2/img/inquire.png') ?>" alt="Step 1 image">
              <div class="card-body">
			    <p class="card-text steps">1. Your inquiry form has been sent to the three dealers you have chosen.</p>
			  </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <img class="card-img-top img-fluid" src="<?php echo base_url('/resources/site/newui-assets2/img/call.png') ?>" alt="step 2 image">
			  <div class="card-body">
			    <p class="card-text steps">2. Our partner-dealers will call you within 24 hours to guide you on your buying journey.</p>
			  </div>
            </div>
            <div class="col-md-4 col-lg-4">
             <img class="card-img-top img-fluid" src="<?php echo base_url('/resources/site/newui-assets2/img/gift.png') ?>" alt="step 3 image">
			  <div class="card-body">
			    <p class="card-text steps">3. After motorcycle purchase, text your sales invoice number to 09190075800 or send a picture of it to our FB page messenger in order to claim your motogarahe.com shirt and motogarahe.com club membership. </p>
			  </div>
            </div>
        </div>
        <br>
    <?php
      $bajajmodels = array('re-4s','re-4s-new','maxima-z','maxima-cargo');
      if(in_array($this->uri->segment(2), $bajajmodels)){ ?>
        <div class="col-md-4">
          <p><b>For more updates about BAJAJ Philippines. You may visit their FB page
          <a href="https://www.facebook.com/BajajPhilippines" target="_blank"><u>BajajPhilippines</u></a>  and website 
          <a href="https://www.bajaj.com.ph/" target="_blank"><u>www.bajaj.com.ph</a></u>.</b></p>
        </div>
    <?php } ?>
    
    </section>
    
</div>

