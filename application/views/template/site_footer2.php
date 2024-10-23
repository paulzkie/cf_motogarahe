<div class="col-md-12" style="z-index: 0;">
  <div class="address">
    <h5>Copyright © Boutique Tracks. All rights reserved.</h5>
    <p>Powered & Designed by <a href="http://webenius.tech" target="_blank">Webenius</a></p>
  </div>
</div>
<!-- Large modal -->
<div class="modal fade reg-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Welcome to Boutique Tracks</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Login" data-toggle="tab">Login</a>
              </li>
              <li><a href="#Registration" data-toggle="tab">Registration</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="Login">
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="usr_email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="usr_email" name="usr_email" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usr_password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="usr_password" name="usr_password" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary btn-sm" name="login_mode" value="login_mode">Submit</button> 
                      <!-- <a href="javascript:;">Forgot your password?</a> -->
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="Registration">
                <form class="form-horizontal" method="post">
                  <!-- <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-md-3">
                          <select class="form-control">
                            <option>Mr.</option>
                            <option>Ms.</option>
                            <option>Mrs.</option>
                          </select>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" placeholder="Name" />
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label for="usr_fname" class="col-sm-2 control-label">Firstname</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="usr_fname" name="usr_fname" value="<?php echo set_value('usr_fname'); ?>"  required="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usr_lname" class="col-sm-2 control-label">Lastname</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="usr_lname" name="usr_lname" value="<?php echo set_value('usr_lname'); ?>"  required="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usr_email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="usr_email" name="usr_email" value="<?php echo set_value('usr_email'); ?>"  required="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usr_contact" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-10">
                      <input type="tel" class="form-control" id="usr_contact" name="usr_contact" value="<?php echo set_value('usr_contact'); ?>" required="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usr_password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="usr_password" name="usr_password" required="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usr_password_conf" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="usr_password_conf" name="usr_password_conf"  required="" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary btn-sm" name="reg_mode" value="reg_mode">Save & Continue</button>
                      <button type="button" class="btn btn-default btn-sm">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4" style="border-left: 1px dotted #C2C2C2;">
            <img class="img img-responsive" src="<?php echo SITE_IMG_PATH?>bg_logo.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <a class="back_to_top" href="#top"> <img src="<?php echo SITE_IMG_PATH?>back-to-top.png" alt="Back to top" /> </a>

<script src="<?php echo  SITE_JS_PATH?>lib/bootstrap.min.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/flexslider-min.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/slick.min.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/magnific-popup.min.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/parallax.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/rellax.min.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/atvimg.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/jquery.jplayer.min.js"></script>
<script src="<?php echo  SITE_JS_PATH?>plugins/jplayer.playlist.min.js"></script>
<!-- <script src="<?php echo  SITE_JS_PATH?>audio-player.js"></script> -->
<script src="<?php echo  SITE_JS_PATH?>validate.js"></script>
<script src="<?php echo  SITE_JS_PATH?>contact.js"></script>
<script src="<?php echo  SITE_JS_PATH?>subscribe.js"></script>
<script src="<?php echo  SITE_JS_PATH?>script.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>


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