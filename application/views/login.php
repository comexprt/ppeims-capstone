<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head>
<body class="page-login">


	<div class="login-form">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="login-form-header">
						<img src="<?php echo base_url();?>images/logo.png" alt="">
						<h1>AGUS 6/7 HYDROELECTRIC POWER PLANT COMPLEX PERSONAL PROTECTIVE EQUIPMENT INVENTORY MANAGEMENT SYSTEM</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					 <?php
					echo form_open("ppeims/verifyloginEmployee");
					?>
				
							
								<center>
								<h3 style='color:#FF0000;font-size:12px;margin-top:-5px;'>
								<?php 
									
									if (validation_errors()==false)
									{}else {
									echo validation_errors();
									} 
									echo "</h3>";
									?>
							</center>
							<input type="hidden" name="login" value="login">
							<div class="form-group">
								<label for="username">Username</label>
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
									<input type="text" class="form-control" name="Username">
								</div>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
									<input type="password" class="form-control" name="Password">
								</div>
							</div>							
						<?php 
						 echo form_submit("loginSubmit","LOGIN","class='btn btn-primary btn-block'"); 
						 echo form_close(); 
					 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</html>