<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Motogarahe Admin</title>
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
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.css">
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
      background-color: #fff;
    }

    .login-box-body {
      padding-top: 0px;
      background-color: #fff;
    }

    .btn {
      color: #FFFFFF;
      background-color: #000 !important;
      border-color: #000 !important;
    }
    .btn:hover,
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
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="#">
      <img src="<?php echo SITE_IMG_PATH?>logo_l.jpeg" class="img-responsive" alt="">
    </a>
  </div> -->
  <div class="login-logo">
    <a href="#">
      <center><img src="<?php echo SITE_IMG_PATH?>logo.png" class="img-responsive" alt=""></center>
      <!-- <b>MLM</b>CAPCHA -->
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <form method="post">
      <div class="form-group has-feedback">
        <input name="acc_username" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="acc_password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
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

<!-- jQuery 2.2.3 -->
<script src="<?php echo ADMIN_LTE_PATH?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo ADMIN_LTE_PATH?>bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>

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
</body>
</html>
