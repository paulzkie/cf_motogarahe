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
  <link rel="stylesheet" href="<?php echo ADMIN_LTE_PATH?>update/fontawesome.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
  <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH?>style.css">
  <!--<link rel="stylesheet" href="<?php echo base_url()?>resources/admin/css/style.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    /*Popup modal*/
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 999; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 50%;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {top:-300px; opacity:0} 
      to {top:0; opacity:1}
    }

    @keyframes animatetop {
      from {top:-300px; opacity:0}
      to {top:0; opacity:1}
    }

    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header {
      padding: 2px 16px;
      background-color: #f39c12;
      color: white;
    }

    .modal-header>h2 {
      font-size: 16px;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }
  </style>
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('dealer/dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
      <span class="logo-lg">
        <!-- <img class="img img-responsive" src="<?php echo ADMIN_IMG_PATH?>sparklingwords.png" alt="User Image"> -->
        BRANCH
      </span>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" alt="User Image" class="img-circle">
              <span class="hidden-xs"><?php echo $this->session->userdata('acc_name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="<?php echo ADMIN_IMG_PATH?>logo.png" class="img-circle" alt="User Image"> -->

                <p>
                  <?php echo $this->session->userdata('acc_name');?>
                  <small><?php echo $this->session->userdata('acc_created');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url('dealer/login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
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
    <div class="user-panel">
        <div class="image">
          <!-- <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
          <center><img src="<?php echo SITE_IMG_PATH?>logo.png" class="img-responsive" alt="User Image" style="width:150px; max-width:none;"></center>
        </div>
        <div class="info">
          <p class="text-capitalize"><?php echo $this->session->userdata('acc_name');?> <?php echo $this->session->userdata('acc_head_office') === 'true' ? '<br>= Head Office =' : '';?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'dashboard' ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('dealer/dashboard')?>">
        		<i class="fa fa-dashboard"></i> <span>Dashboard</span>
        	</a>
        </li>  -->

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'categories' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/categories')?>">
            <i class="fa fa-tag"></i> <span>Categories</span>
          </a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'products' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/products')?>">
            <i class="fa fa-cube"></i> <span>Products</span>
          </a>
        </li>
        <li class="<?php echo ( $this->router->fetch_class() == 'users' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/users')?>">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li> -->

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'user_accounts' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/user_accounts')?>">
            <i class="fa fa-users"></i> <span>Accounts</span>
          </a>
        </li> -->

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'codes' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/codes')?>">
            <i class="fa fa-users"></i> <span>Codes</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'direct_indirect_withdraw' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/direct_indirect_withdraw')?>">
            <i class="fa fa-money"></i> <span>Encashment</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'lottery_seasons' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/lottery_seasons')?>">
            <i class="fa fa-money"></i> <span>Lucky Draw</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'season_participants' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/season_participants')?>">
            <i class="fa fa-money"></i> <span>Lucky Draw Participants</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'lottery_prizes' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/lottery_prizes')?>">
            <i class="fa fa-car"></i> <span>Lucky Prizes</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'captchas' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/captchas')?>">
            <i class="fa fa-code"></i> <span>Captchas</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'settings' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/settings')?>">
            <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'rebates_withdraw' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/rebates_withdraw')?>">
            <i class="fa fa-money"></i> <span>Rebates Withdraw</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'rebates_confirmation' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/rebates_confirmation')?>">
            <i class="fa fa-money"></i> <span>Rebates Confirmation</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'shares_confirmation' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/shares_confirmation')?>">
            <i class="fa fa-money"></i> <span>Share Profit Confirmation</span>
          </a>
        </li>

        <li class="<?php echo ( $this->router->fetch_class() == 'shares_generation' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/shares_generation')?>">
            <i class="fa fa-money"></i> <span>Shares Profit Generate</span>
          </a>
        </li> -->

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'motorcycles' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/motorcycles')?>">
            <i class="fa fa-tag"></i> <span>Motorcycles</span>
          </a>
        </li>  -->

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'repo' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/repo')?>">
            <i class="fa fa-tag"></i> <span>Repo</span>
          </a>
        </li>  -->

        <li class="<?php echo ( $this->router->fetch_class() == 'inquiries' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/inquiries')?>">
            <i class="fa fa-list-alt"></i> <span>Inquiries</span>
          </a>
        </li>

        <li id="myBtn">
          <a>
            <i class="fa fa-list-alt"></i> <span>Download File</span>
          </a>
        </li> 
        
        <li id="myBtn">
          <a href="<?php echo base_url('dealer/repo')?>">
            <i class="fa fa-list-alt"></i> <span>Repo Motorcycles</span>
          </a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'motorcycles' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/repoinquiries')?>">
            <i class="fa fa-tag"></i> <span>Repo Motor Inquiries</span>
          </a>
        </li> 
        
        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'projects' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/projects')?>">
            <i class="fa fa-tag"></i> <span>Projects</span>
          </a>
        </li>  -->

        <!-- <li class="<?php echo ( $this->router->fetch_class() == 'dealers' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/dealers')?>">
            <i class="fa fa-tag"></i> <span>Dealers</span>
          </a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'dealers_branches' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/dealers_branches')?>">
            <i class="fa fa-tag"></i> <span>Branches</span>
          </a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'motorcycles' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/motorcycles')?>">
            <i class="fa fa-tag"></i> <span>New Motor Inquiries</span>
          </a>
        </li> 

        <li class="<?php echo ( $this->router->fetch_class() == 'motorcycles' ? 'active' : ''); ?>">
          <a href="<?php echo base_url('dealer/motorcycles')?>">
            <i class="fa fa-tag"></i> <span>Repo Motor Inquiries</span>
          </a>
        </li>  -->


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