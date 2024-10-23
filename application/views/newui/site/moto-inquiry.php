<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/site/newui-css2/inquiry.css">


<!-- css -->
<div class="body-content">
  <div class="container">
        <div class="row" id="inq">
            <div class="col-md-6 col-sm-12 col-12" id="left-side">
                <h1>
                    INQUIRY FORM
                </h1>
                <hr class="mt-2 mb-3 hr-2"/>
                <h5>Kindly fill-up the form below, and our customer service professionals will contact you as soon as possible.</h5>
                <form id="inq-form"  method="post">
                    <input required type="hidden" name="mot_id" value="<?php echo $motorcycles[0]['mot_id']?>">

                    <div class="form-group">
                        <input type="text" required value="<?php echo set_value('inq_name'); ?>" name="inq_name" class="form-control" id="user-name" aria-describedby="name" placeholder="FULL NAME">
                    </div>
                    <div class="form-group">
                        <input type="text" required value="<?php echo set_value('inq_address'); ?>" name="inq_address" class="form-control" id="user-address" aria-describedby="address" placeholder="ADDRESS">
                    </div>
                    <div class="form-group">
                        <input type="tel" required value="<?php echo set_value('inq_phone'); ?>" name="inq_phone" class="form-control" id="user-phone" aria-describedby="phone" placeholder="PHONE NO.">
                    </div>
                    <div class="form-group">
                      <input type="email" required value="<?php echo set_value('inq_email'); ?>" name="inq_email" class="form-control" id="user-email" aria-describedby="emailHelp" placeholder="EMAIL ADDRESS ">
                    </div>
                    <div class="form-group">
                    <?php
                    if($this->uri->segment(5)=='promogms'){
                        echo '<input type="text" name="inq_payment" value="Installment" class="form-control" readonly>';
                    }else{
                        echo '
                        <select class="form-control" required name="inq_payment" id="inq_payment" aria-describedby="whento">
                            <option value="Not select">MODE OF PAYMENT</option>
                            <option value="cash">CASH</option>
                            <option value="installement">INSTALLMENT</option>
                        </select>
                    ';
                    }
                    ?>
                    </div>    

                    <div class="form-group">
                        <select class="form-control" required name="inq_buy_duration" id="inq_buy_duration"  aria-describedby="whento">
                            <option value="Not select">WHEN DO YOU PLAN TO BUY?</option>
                            <option value="Within 30 days">WITHIN 30 DAYS</option>
                            <option value="1 - 3 months">1 - 3 MONTHS</option>
                            <option value="3 - 6 months">3 - 6 MONTHS</option>
                            <option value="6 - 12 months">6 - 12 MONTHS</option>
                            <!-- <option value="1 - 2 years">1 - 2 years</option> -->
                            <option value="Undecided">Undecided</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" required name="inq_have_motor" id="inq_have_motor" aria-describedby="own">
                            <option value="Not select">DO YOU OWN A MOTORCYCLE?</option>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" value="<?php echo set_value('inq_occupation'); ?>" name="inq_occupation" id="user-occupation" aria-describedby="occupation" placeholder="OCCUPATION ">
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" value="<?php echo set_value('inq_position'); ?>" name="inq_position" id="user-position" aria-describedby="pos" placeholder="POSITION ">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="user-message" name="inq_message" rows="5" placeholder="COMMENT/SUGGESTION/FEEDBACK"></textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" required>
                        <label class="form-check-label" for="">I have read and agree to the <a target="_blank" href="<?php echo base_url('privacy_policy')?>" style="color: #d2aa00 !important;">privacy policy</a></label>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-dark pull-right inq-sbt" name="fill_mode" value="fill_mode">SUBMIT NOW</button>
                    
                </form>
            </div>
            <div class="col-md-6 col-sm-12 col-12" id="right-side">
                <hr class="mt-2 mb-3 hr-2 d-md-none d-lg-none d-xl-none"/>
                <img class="mot-img" src="<?php echo base_url() . $motorcycles_pictures[0]['mop_image']?>">
                <div class="mot-info">
                    <h2><?php echo $motorcycles[0]['mot_model']?> <?php echo $motorcycles[0]['mot_brand']?></h2>
                    <h2><?php 
                    if($this->uri->segment(5)=='promogms'){
                        echo '<p style="color:red;">Zero Downpayment and Low Weekly Payment</p>';
                    }else if($this->uri->segment(5)=='promo' || $this->uri->segment(5)=='rheanmotorcyclespromo'){
                        echo '<del>₱'.number_format($motorcycles[0]['mot_srp'],2).'</del>
                        <span style="color:red;">₱'.number_format($motorcycles[0]['mot_srp']-$motorcycles[0]['mot_discountpromo'],2).'</span>';
                    }else{
                        echo '₱'.number_format($motorcycles[0]['mot_srp'],2); 

                    }?></h2>
                    <div class="row">
                        <!-- color start -->
                        <div class="col-md-6 col-sm-6 col-6"><p>COLOR SELECTED</p></div>
                        <div class="col-md-6 col-sm-6 col-6"><p><?php echo $dem_colors?></p></div>
                        <!-- color end -->
                        <!-- category start -->
                        <div class="col-md-6 col-sm-6 col-6"><p>Category</p></div>
                        <div class="col-md-6 col-sm-6 col-6"><p><?php echo $motorcycles[0]['mot_type']?></p></div>
                        <!-- category end -->
                        <!-- Displacement start -->
                        <div class="col-md-6 col-sm-6 col-6"><p>Displacement</p></div>
                        <div class="col-md-6 col-sm-6 col-6"><p><?php echo $motorcycles[0]['mot_diplacement']?>cc</p></div>
                        <!-- Displacement end -->
                        <!-- Transmission Type start -->
                        <div class="col-md-6 col-sm-6 col-6"><p>Transmission Type</p></div>
                        <div class="col-md-6 col-sm-6 col-6"><p><?php echo $motorcycles[0]['mot_transmission']?></p></div>
                        <!-- Transmission Type end -->
                        <!-- Engine Type start -->
                        <div class="col-md-6 col-sm-6 col-6"><p>Engine Type</p></div>
                        <div class="col-md-6 col-sm-6 col-6"><p><?php echo str_replace('-', ' ', $motorcycles[0]['mot_engine_type'])?>D</p></div>
                        <!-- Engine Type end -->
                        <!-- Fuel System start -->
                        <div class="col-md-6 col-sm-6 col-6"><p>Fuel System</p></div>
                        <div class="col-md-6 col-sm-6 col-6"><p><?php echo str_replace('-', ' ', $motorcycles[0]['mot_fuel_system'])?></p></div>
                        <!-- Fuel System end -->
                    </div>
                </div>
            </div>

        </div>

  </div>
</div>

<!-- start of end -->