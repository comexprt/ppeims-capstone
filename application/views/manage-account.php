<?php
include 'include/header.php';
include 'include/sidebar.php';
?>

<nav class="navbar navbar--blue navbar-static-top">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="navbar-left">
				<ul class="navbar-breadcrumbs list-inline">
					<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
					<li>/</li>
					<li>Account</li>
				</ul>
			</div>
	   	 	<ul class="nav navbar-nav navbar-right">
	   	 		<li class="dropdown">
	   	 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname;?> <span class="caret"></span></a>
	   	 			<ul class="dropdown-menu">
	   	 				<li><a href="<?php echo base_url();?>ppeims/emp_logout">Log Out</a></li>
	   	 			</ul>
	   	 		</li>
	   	 	</ul>
   	 	</div>
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
						<strong>Success!</strong> <?php echo $message;?>
						<script>
							var timer = setTimeout(function() {
								window.location='<?=base_url();?>ppeims/emp_logout'
							}, 3000);
						</script>
					</div>

					<?php else : ?>
					
					<div class="alert alert-danger alert-dismissable" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Error!</strong> <?=$message;?>
					</div>
					
					<?php endif; ?>
				<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<h1 class="page-title">Account Settings</h1>
					</div>
				</div>
			</div>
			<?php foreach ($getAdmin as $row) : ?>
			<div class="row">
				<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
							<div class="row">
								<div class="col-sm-6">
									<h4>Profile</h4>
								</div>
								<div class="col-sm-6">
									<div class="text-right">
										<a href="<?php echo base_url();?>ppeims/edit_account" class="btn btn-success">Edit Profile</a>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-3">
									<img src="<?php echo base_url();?>images/<?=$u_image;?>" class="img-thumbnail img-responsive" alt="">
								</div>
								<div class="col-sm-9">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" id="fname" class="form-control" value="<?=$row->Fname;?>" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" id="lname" class="form-control" value="<?=$row->Lname;?>	" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="position">Position</label>
												<input type="text" id="position" class="form-control" value="<?=$row->Position;?>" readonly>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="uname">Username</label>
												<input type="text" id="uname" class="form-control" value="<?=$row->Username;?>" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="">Password</label>
												<button type="button" data-toggle="modal" data-target="#changeModal" class="btn btn-primary btn-block">Change Password</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Change Password</h4>
									</div>
									<?php echo form_open("ppeims/update_account_password"); ?>
										<input type="hidden" name="access" value="add-account">
										<input type="hidden" name="A_No" value="<?=$row->A_No;?>">
										<input type="hidden" name="Username" value="<?=$row->Username;?>">
										<input type="hidden" name="password" value="<?=$row->Password;?>">
										<input type="hidden" name="Fname" value="<?=$row->Fname;?>">
										<input type="hidden" name="Lname" value="<?=$row->Lname;?>">
										<input type="hidden" name="Position" value="<?=$row->Position;?>">
										<div class="modal-body">
											<div class="form-group">
												<label for="current_password">Current Password</label>
												<input type="password" class="form-control" name="cpassword" required>
											</div>
											<div class="form-group">
												<label for="new_password">New Password</label>
												<input type="password" class="form-control" name="npassword" required>
											</div>
											<div class="form-group">
												<label for="retyped_new_password">Retype New Password</label>
												<input type="password" class="form-control" name="rpassword" required>
											</div>
										</div>
										
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<?php echo form_submit("loginSubmit","Save"," class='btn btn-primary'"); ?>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					
				  </div>
				</div>
			</div>
					
		
	
			
			<?php endforeach; ?>
		</section>
	</div>
</div>

<?php 
include 'include/footer.php';

// EOF