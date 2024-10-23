<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Top Up | MLM Capcha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>update/fontawesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>update/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>dist/css/AdminLTE.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.css">

  <style>
    #preloader {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 999;
        width: 100%;
        height: 100%;
        overflow: visible;
        /* background: #333 url('//cdnjs.cloudflare.com/ajax/libs/file-uploader/3.7.0/processing.gif') no-repeat center center; */
        background:white;
    }
  </style>

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo ADMIN_LTE_PATH?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  
  <script>
    jQuery(document).ready(function ($) {
        $(window).load(function () {
            setTimeout(function(){
                $('#preloader').fadeOut('fast', function () {
                });
            },2000);

        });  
    });
  </script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
  	body {
  		display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  	}

    .login-page {
      background-color: #fbbd18;
    }

    /* .login-box-body {
      padding-top: 0px;
    } */

    /* .form-control {
        border-color: green ;
    } */

    .btn-primary {
      color: #FFFFFF;
      background-color: #191919 !important;
      border-color: #191919 !important;
    }
    /*.btn:hover,
    .btn:focus,
    .btn:active,
    .btn.active,
    .btn.disabled,
    .btn[disabled] {
      color: #FFFFFF;
      background-color: #e80b02 !important;
      border-color: #e80b02 !important;
    }
    .btn-primary:active:hover{
      color: #FFFFFF;
      background-color: #e80b02 !important;
      border-color: #e80b02 !important;
    }*/
  </style>
</head>
<div id="preloader"></div>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">
      <center>
        <img src="<?php echo SITE_IMG_PATH?>logo.jpg" class="img-responsive" alt="">
      </center>
      <!-- <b>MLM</b>CAPCHA -->
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <form method="post">
    <div class="form-group has-feedback">
        <input readonly name="cap_code" type="text" class="form-control" placeholder="Code" id="mainCaptcha" style='    color: black;
    background-color: rgb(251, 189, 24);
    font-size: 20px;
    text-align: center;
    text-decoration: line-through;
    font-weight: bold;'>
      </div>
      <div class="form-group has-feedback">
        <input name="cap_codeConf" type="text" class="form-control" placeholder="Captcha Code" autofocus>
        <span class="glyphicon glyphicon-arrow-up form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="" value="" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <div class="col-xs-12">
          <a class="btn btn-default btn-block btn-flat"  href="<?php echo base_url('member/dashboard')?>" style="margin-top:10px;">Back to Dashboard</a>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
  </div>
  <!-- /.login-box-body -->
</div>

 <div class="modal fade in" id="modal-registration">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST">  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Registration</h4>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                  <div class="col-md-12">
                      <label>Username</label>
                      <input required type="text" class="form-control" name="usr_username" value="<?php echo set_value('usr_username'); ?>">     
                  </div>
              </div> 
              <div class="form-group row">
                  <div class="col-md-6">
                      <label>Password</label>
                      <input required type="password" class="form-control" name="usr_password" value="<?php echo set_value('usr_password'); ?>">     
                  </div>
                  <div class="col-md-6">
                      <label>Confirm Password</label>
                      <input required type="password" class="form-control" name="usr_password_conf" value="<?php echo set_value('usr_password_conf'); ?>">     
                  </div>
              </div> 
              <hr/>
              <div class="form-group row">
                  <div class="col-md-4">
                      <label>Firstname</label>
                      <input required type="text" class="form-control" name="usr_fname" value="<?php echo set_value('usr_fname'); ?>">     
                  </div>
                  <div class="col-md-4">
                      <label>Middlename</label>
                      <input required type="text" class="form-control" name="usr_mname" value="<?php echo set_value('usr_mname'); ?>">   
                  </div>
                  <div class="col-md-4">
                      <label>Lastname</label>
                      <input required type="text" class="form-control" name="usr_lname" value="<?php echo set_value('usr_lname'); ?>">    
                  </div>
                  
              </div> 

              <div class="form-group row">
                  <div class="col-md-12">
                      <label>Address</label>
                      <textarea required class="form-control" rows="3" name="usr_address" id="myPlaceTextBox" value="<?php echo set_value('usr_address'); ?>"></textarea>
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-md-6">
                      <label>Gender</label>
                      <select required class="form-control" name="usr_gender">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label>Birthday</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input required type="text" class="form-control pull-right datepicker" name="usr_bday" value="<?php echo set_value('usr_bday'); ?>">
                      </div>
                  </div>
              </div> 

              <div class="form-group row">
                  <div class="col-md-6">
                      <label>Contact Number</label>
                      <input required type="text" class="form-control" name="usr_contact" value="<?php echo set_value('usr_contact'); ?>">
                  </div>
                  <div class="col-md-6">
                      <label>Email</label>
                      <input required type="text" class="form-control" name="usr_email" value="<?php echo set_value('usr_email'); ?>">
                  </div>
              </div> 

              <div class="form-group row">
                  <div class="col-md-12">
                      <label>Code:</label>
                      <input required type="text" class="form-control" name="cod_name">
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-md-12">
                      <label>Referred By:</label>
                      <input required type="text" class="form-control" name="dir_to_username">
                  </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-colored" name="reg_mode" value="reg_mode">Register</button>
            </div>
          </form>
        </div>
      </div>
  </div>

<?php if ( isset( $msg_error ) ): ?>
<div id="dom-target" style="display: none;">  
  <?php
    echo "<pre>";
    print_r ($msg_error);
    echo "</pre>";
  ?>
</div>  
<?php endif;?>


<!-- Bootstrap 3.3.6 -->
<script src="<?php echo ADMIN_LTE_PATH?>bootstrap/js/bootstrap.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo ADMIN_LTE_PATH?>update/moment.min.js"></script>
<script src="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>

<script>
  function generate_code() {
      var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','0');
      var i;
      for (i=0;i<6;i++){
          var a = alpha[Math.floor(Math.random() * alpha.length)];
          var b = alpha[Math.floor(Math.random() * alpha.length)];
          var c = alpha[Math.floor(Math.random() * alpha.length)];
          var d = alpha[Math.floor(Math.random() * alpha.length)];
          var e = alpha[Math.floor(Math.random() * alpha.length)];
          var f = alpha[Math.floor(Math.random() * alpha.length)];
          var g = alpha[Math.floor(Math.random() * alpha.length)];
          var h = alpha[Math.floor(Math.random() * alpha.length)];
      }
      var code = a + b + c + d + e + f + g + h;
      document.getElementById("mainCaptcha").value = code;
      $('#mainCaptcha').val(code);
      localStorage.setItem("mainCaptcha", code);
      $('#mainCaptcha').css("background-color", "#FBBD18");

      //console.log('new code');
    }

    generate_code();


</script>

<script type="text/javascript">
$(document).ready(function() {
 $('input').bind('copy paste cut',function(e) { 
 e.preventDefault(); //disable cut,copy,paste
 alert('cut,copy & paste options are disabled !!');
 });
});
</script>

<script>
  $('.datepicker').datepicker({
    "todayHighlight":true,
    "autoclose": true
  });

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

</body>
</html>
