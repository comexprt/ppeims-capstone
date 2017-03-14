<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	
	<link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>css/style.css">
</head>
<body class="page-dashboard">

	<div class="sidebar">
		<div class="sidebar-logo">
			<!-- <a href="#"><img src="images/db-logo.png" alt=""></a> -->
		</div>
		<div class="sidebar-user">
			<div class="sidebar-user-pic"></div>
			<div class="sidebar-user-name">
				<span><?=$Fname." ".$Lname;?></span>
				<span><?=$Position;?></span>
			</div>
		</div>
		<div class="sidebar-nav">
			<ul>
				<li class="current"><a href="<?=base_url();?>">Dashboard</a></li>
				<li><a href="<?=base_url();?>ppeims/equipment">Equipment</a></li>
				<li><a href="<?=base_url();?>ppeims/inventory">Inventory</a></li>
				<li><a href="<?=base_url();?>ppeims/personnel">Personnel</a></li>
				<li><a href="<?=base_url();?>ppeims/issuance">Issuance</a></li>
			</ul>
		</div>
	</div>

	<div class="main">
		<nav class="navbar navbar-top">
			 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			 	<ul class="nav navbar-nav navbar-right">
			 		<li class="dropdown">
			 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$Lname;?> <span class="caret"></span></a>
			 			<ul class="dropdown-menu">
			 				<li><a href="<?=base_url();?>ppeims/manage_account">Account</a></li>
			 				<li><a href="<?=base_url();?>ppeims/emp_logout">Log Out</a></li>
			 			</ul>
			 		</li>
			 	</ul>
			 </div>
		</nav>

		<div class="content">
			<div class="container-fluid">

				<section class="section">
					<div class="row">
						<div class="col-md-12">
						<?php 
						if ($message) :
							if (strpos($message, 'Saved') !== false) : ?>
							
							<div class="alert alert-success alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success !</strong> <?php echo $message;?>
								<script>
									var timer = setTimeout(function() {
										window.location='<?=base_url();?>ppeims/emp_logout'
									}, 3000);
								</script>
							</div>

							<?php else : ?>
							
							<div class="alert alert-danger alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Error !</strong> <?=$message;?>
							</div>
							
							<?php endif; ?>
						<?php endif; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>ppeims">Dashboard</a></li>
								<li class="active">Account</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="page-header">
								<h2>Account Settings</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<h4>User Information</h4>
								</div>
							</div>
						</div>
					</div>
					<?php foreach ($getAdmin as $row) : ?>
					<div class="row">
						<div class="col-md-8">
							<div class="form-horizontal">
								<?=form_open("ppeims/update_account");?>
								<div class="form-group">
									<label for="Fname" class="col-sm-3 control-label">First Name:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="Fname" name="Fname" value="<?=$row->Fname;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="Lname" class="col-sm-3 control-label">Last Name:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="Lname" name="Lname" value="<?=$row->Lname;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="Position" class="col-sm-3 control-label">Position:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="Position" name="Position" value="<?=$row->Position;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Profile Picture:</label>
									<div class="col-sm-6">
										<div class="row">
											<div class="col-xs-6">
												<img src="<?=base_url(); ?>images/user.png" class="img-thumbnail img-responsive margin-bottom-20" alt="">
												<a href="#" role="button" class="btn btn-default btn-xs">Remove Picture</a>
											</div>
											<div class="col-xs-6">
												<input type="file">
												<p class="help-block">Upload a profile picture, 1mb max.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<h4>Change Username &amp; Password</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-horizontal">
								<div class="form-group">
									<input type="hidden" value="add-account" name="access">
									<input type="hidden" class="form-control" name="Username" value="<?=$row->Username;?>">
									<input type="hidden" class="form-control" name="A_No" value="<?=$row->A_No;?>">
									<input type="hidden" class="form-control" name="old_id1" value="<?=$row->Password;?>">

									<label for="" class="col-sm-3 control-label">Username:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" value="<?=$row->Username;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="old_id2" class="col-sm-3 control-label">Old Password:</label>
									<div class="col-sm-6">
										<input type="password" class="form-control" id="old_id2" name="old_id2" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="new_id" class="col-sm-3 control-label">New Password:</label>
									<div class="col-sm-6">
										<input type="password" class="form-control" id="new_id" name="new_id" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="new_id" class="col-sm-3 control-label">Retype New Password:</label>
									<div class="col-sm-6">
										<input type="password" class="form-control" id="new_id" name="new_id" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<?=form_submit("loginSubmit","Save Changes"," class='btn btn-primary'");?>
									<?=form_close();?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</section>
			</div>
		</div>
	</div>

	<script src="<?=base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url();?>js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>js/script.js"></script>
</body>
</html>