<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Lucky Draw | MLM Capcha</title>
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
			.login-box {
			width:700px;
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
	<body class="hold-transition login-page">
	<?php if ( !empty( $lottery_users ) ):?>
		<div class="login-box">
			<div class="login-logo">
				<a href="#">
					<!-- <img src="<?php echo SITE_IMG_PATH?>logo_l.jpeg" class="img-responsive" alt=""> -->
					<b>Prize: <?php echo $lottery_prizes[0]['lop_name']?></b>
				</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<style>
					/* reset */
					body, ul, li, p, h1, h2, h3, h4 {
					margin: 0;
					padding: 0;
					}
					body {
					width: 100%;
					height: 100%;
					background-size: cover;
					}
					/* body:before {
					content: '';
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					background-image: linear-gradient(to bottom right,#002f4b,#dc4225);
					opacity: .6; 
					z-index:1;
					} */
					/* slideshow */
					ul {
					width: 500px;
					height: 200px;
					margin: 0 auto;
					position: relative;
					list-style: none;
					-webkit-perspective: 700;
					perspective: 700;
					margin-bottom:50px;
                    margin-top: 50px;
					}
					li {
					position: absolute;  
					transform-origin: 0 100%;
					}
					li.current {
					transition: all 0.3s ease-out;
					opacity: 1.0;
					}
					li.in {
					opacity: 0.0;
					transform: rotate3d(1, 0, 0, -90deg);
					}
					li.out {
					transition: all 0.3s ease-out;
					opacity: 0.0;
					transform: rotate3d(1, 0, 0, 90deg);
					}
				</style>
				<!-- style="background: url('<?php echo $lottery_prizes[0]['lop_img']?>') center center no-repeat;" -->
				
				<ul id='slideshow'>
                    <?php foreach ( $lottery_users as $lottery_user ):?>
                        <?php if ( $lottery_user['usr_id'] == $winner ):?>
                            <li id="win"><img src='http://placehold.it/500x200&text=<?php echo $lottery_user['usr_username'];?>' alt=''></li>
                        <?php else:?>
                            <li><img src='http://placehold.it/500x200&text=<?php echo $lottery_user['usr_username'];?>' alt=''></li>
                        <?php endif;?>
                    <?php endforeach;?>
				</ul>
				<center><button id='again' class="btn btn-primary btn-lg">START DRAW!</button></center>
				
			</div>
			<?php endif;?>
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
		<script src="<?php echo ADMIN_LTE_PATH?>plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php echo ADMIN_LTE_PATH?>bootstrap/js/bootstrap.min.js"></script>
		<!-- daterangepicker -->
		<script src="<?php echo ADMIN_LTE_PATH?>update/moment.min.js"></script>
		<script src="<?php echo ADMIN_LTE_PATH?>plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="<?php echo ADMIN_LTE_PATH?>plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo ADMIN_LTE_PATH?>toastr/toastr.min.js"></script>
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
		<script>
			var slides = $('#slideshow').find('li');
			
			// move all to the right.
			slides.addClass('in');
			
			// move first one to current.
			$(slides[0]).removeClass().addClass('current');
			
			var currentIndex = 0;
			
			var minimumCount = 50;
			var maximumCount = 200;
			var count = 0;
			
			function nextSlide() {
			$('#again').attr('disabled','disabled');
			
			currentIndex += 1;
			if (currentIndex >= slides.length) {
			    currentIndex = 0;
			}
			
			// move any previous 'out' slide to the right side.
			$('.out').removeClass().addClass('in');
			
			// move current to left.
			$('.current').removeClass().addClass('out');
			
			// move next one to current.
			$(slides[currentIndex]).removeClass().addClass('current');
			
			
			count += 1;
			if (count > maximumCount || (count > minimumCount && Math.random()>0.6) ) {
			    
			    clearInterval(interval);
			    $(slides[currentIndex]).removeClass().addClass('in');
			    $('#slideshow>li#win').removeClass().addClass('current');
			    $('#again').removeAttr('disabled');
			}
			
			console.log(count);
			}
			
			//var interval = setInterval(nextSlide, 120);
			
			
			$('#again').click(function(){  
			count = 0;
			interval = setInterval(nextSlide, 120);
			});
		</script>
	</body>
</html>