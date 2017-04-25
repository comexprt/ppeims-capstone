<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head>
<body class="page-login">

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 page-login-form">
				<img src="<?php echo base_url(); ?>images/logo.png" alt="" class="img-responsive center-block">
				<h1>Sign in to Agus 6/7 PPE-IMS</h1>
				<div class="well">
					<?php echo form_open("ppeims/verifyloginEmployee"); ?>
						<?php if(validation_errors() == true): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						
						<input type="hidden" name="login" value="login">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="Username" placeholder="Username" autofocus>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="Password" placeholder="Password">
						</div>
					<?php  echo form_submit("loginSubmit","LOGIN","class='btn btn-primary btn-block'"); 
					echo form_close(); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</html>