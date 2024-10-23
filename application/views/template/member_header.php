<!-- <div class="alert hide_alert">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong></strong> <span></span>
</div> -->
<?php
$kb=1024;
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    //echo str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
// echo "-> Test finished in $deltat seconds. Your speed is ". round($kb / $deltat, 3)."Kb/s";

if ( round($kb / $deltat, 3) <= 2500 ) {
    echo "Your internet connection is to slow... Try again later..."; 
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $header_title . AUTHOR ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>update/fontawesome.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>update/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>update/blue/style.css">
  <link rel="stylesheet" href="<?php echo MEMBER_CSS_PATH?>style.css">

  <script data-ad-client="ca-pub-6651134912935743" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    .user-panel>.info {
        padding: 5px 5px 5px 15px;
        line-height: 1;
        position: relative;
        left: 13px;
    }
  </style>
</head>
<body class="hold-transition skin-yellow sidebar-mini layout-boxed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
      <span class="logo-lg text-capitalize"><b><?php echo ( $this->session->userdata('usr_type') == 'sparkle' ) ? 'Premium' : 'Starter'; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('usr_username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 
                  <?php echo ( $this->session->userdata('usr_type') == 'sparkle' ) ? 'Premium' : 'Starter'; ?>
                  <small><?php echo $this->session->userdata('usr_created');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url('home/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image">
            <!-- <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
            <center><img src="<?php echo SITE_IMG_PATH?>logo.png" class="img-responsive" alt="User Image" style="width:150px; max-width:none;"></center>
          </div>
          <div class="info">
          <div class="pull-left info">
            <p class="text-capitalize"><?php echo $this->session->userdata('usr_fname') . ' ' . $this->session->userdata('usr_mname') . ' ' . $this->session->userdata('usr_lname');?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
          </div>
        </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ( $this->router->fetch_class() == 'dashboard' ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('member/dashboard')?>">
        		<i class="fa fa-dashboard"></i> <span>Dashboard</span>
        	</a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'my_information' ? 'active' : ''); ?>">
        	<a href="<?php echo base_url() . 'member/my_information/edit/'?>">
        		<i class="fa fa-user"></i> <span>My Information</span>
        	</a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'direct_indirect' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/direct_indirect')?>">
            <i class="fa fa-money"></i> <span>My finances</span>
          </a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'downlines' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/downlines')?>">
            <i class="fa fa-users"></i> <span>Members</span>
          </a>
        </li> 

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'top_up' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/top_up')?>">
            <i class="fa fa-arrow-up"></i> <span>Upgrade</span>
          </a>
        </li>  -->

        <!-- <li class="">
          <a href="<?php echo base_url('member/captcha')?>">
            <i class="fa fa-code"></i> <span>Captcha</span>
          </a>
        </li> 

        <li class="">
          <a href="<?php echo base_url('member/captcha/view')?>">
            <i class="fa fa-money"></i> <span>Captcha Earnings</span>
          </a>
        </li>  -->
        
        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'rebates' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/rebates')?>">
            <i class="fa fa-money"></i> <span>Unilevel Bonus</span>
          </a>
        </li> 
        
        <li class="<?php echo ( $this->router->fetch_class() == 'rebates_confirmation' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/rebates_confirmation')?>">
            <i class="fa fa-handshake-o"></i> <span>Unilevel Request</span>
          </a>
        </li>   

        <?php if ( $this->session->userdata('usr_type') == 'sparkle' ) :?>

        <li class="<?php echo ( $this->router->fetch_class() == 'shares' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/shares')?>">
            <i class="fa fa-money"></i> <span>Share Profit</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'shares_confirmation' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/shares_confirmation')?>">
            <i class="fa fa-credit-card"></i> <span>Profit Shares Request</span>
          </a>
        </li>   

        <?php endif;?>

        <li class="<?php echo ( $this->router->fetch_class() == 'incentives' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('member/incentives')?>">
            <i class="fa fa-gift"></i> <span>Incentives</span>
          </a>
        </li> -->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1> <?php echo $header?> <small><?php echo $header_small?></small> </h1>
      <?php echo generateBreadcrumb();?>
  </section>

  <!-- Main content -->
  <section class="content">