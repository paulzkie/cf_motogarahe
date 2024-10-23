<?php if ( isset( $msg_error ) ): ?>
<div id="dom-target" style="display: none;">  
  <?php
    echo "<pre>";
    print_r ($msg_error);
    echo "</pre>";
  ?>
</div>  
<?php endif;?>


    <img class="center-image" src="<?php echo SITE_IMG_PATH?>special/bg-1.jpg" alt="">
    <div class="container">
        <div class="login-fullpage">
            <div class="row">
                <div class="login-logo"><img class="center-image" src="<?php echo SITE_IMG_PATH?>special/login.jpg" alt=""></div>
                <div class="col-xs-12 col-sm-7">
                    <div class="f-login-content">
                        <div class="f-login-header">
                            <div class="f-login-title color-dr-blue-2">Welcome back!</div>
                            <div class="f-login-desc color-grey">Please login to your account</div>
                        </div>
                        <form class="f-login-form" method="post">
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input name="cus_username" type="text" placeholder="Enter your email or username" required>
                            </div>
                            <div class="input-style-1 b-50 type-2 color-5">
                                <input name="cus_password" type="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o">LOGIN TO YOUR ACCOUNT</button>

                             <div class="input-entry color-3">
                                <input class="checkbox-form" id="text-1" type="checkbox" name="checkbox" value="climat control">
                                <label class="clearfix" for="text-1">
                                    <span class="checkbox-text"><a href="<?php echo base_url('customer/registration')?>">Register now</a></span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="full-copy">© 2015 All rights reserved. let’stravel</div>
    </div>

<script>
  var msg_success = "<?php echo $this->session->flashdata('msg_success') ?>";
  if ( msg_success != "" ) {
    toastr.success('Success!', msg_success );
  }

  var div = document.getElementById("dom-target");
  var msg_error = div.textContent;
  if ( msg_error != "" || msg_error == 'false') {
    toastr.error('Error!', msg_error );
  }
</script>