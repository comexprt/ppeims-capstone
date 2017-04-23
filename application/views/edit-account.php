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
					<li><a href="<?php echo base_url(); ?>ppeims/manage_account">Account</a></li>
					<li>/</li>
					<li>Edit Profile</li>
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
					<?php if($message){
						 if (strpos($message, 'Uploaded') !== false){
					?>
							<!-- Alert for success -->
							<div class="alert alert-success alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?php echo $message;?>
							</div><?php }elseif(strpos($message, 'saved') !== false){?>
								<div class="alert alert-success alert-dismissable" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>Success!</strong> <?php echo $message;?>
									<script>
										var timer = setTimeout(function() {
											window.location='<?=base_url();?>ppeims/emp_logout'
										}, 3000);
									</script>
								</div>
							<?php }else{?>
							<div class="alert alert-danger alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?php echo $message;?>
							</div>
					<?php }} else{}?>
						</div>
						</div>

			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<h1 class="page-title">Edit Profile</h1>
					</div>
				</div>
			</div>
		
			<?php foreach ($getAdmin as $row) : ?>
			<div class="row">
				<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
							<div class="row">
								<div class="col-sm-12">
									<h4>Profile</h4>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
							
								<div class="col-sm-3">
									<img src="<?php echo base_url();?>images/<?=$u_image;?>" class="img-thumbnail img-responsive" alt="" style="margin-bottom:5px;">
									<a href="#" role="button" data-toggle="modal" data-target="#changePictureModal" class="btn btn-success btn-sm btn-block">Change Picture</a>
									<a href="#" role="button" data-toggle="modal" data-target="#removePictureModal" class="btn btn-danger btn-sm btn-block">Remove Picture</a>
								</div>
								<div class="col-sm-9">
								<?=form_open("ppeims/update_info");?>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" name="fname" class="form-control" value="<?=$row->Fname;?>" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" name="lname" class="form-control" value="<?=$row->Lname;?>	" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="position">Position</label>
												<input type="text" name="position" class="form-control" value="<?=$row->Position;?>" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="uname">Username</label>
												<input type="text" name="uname" class="form-control" value="<?=$row->Username;?>" required>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
							<div class="panel-footer">
							<div class="text-right">
								<?php
								echo form_submit("loginSubmit","Save"," class='btn btn-success'");
								echo form_close();
							?>
							</div>
						</div>
						
						
					
				  </div>
				</div>
			</div>
					
		
	
			
			<?php endforeach; ?>
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo base_url();?>ppeims/manage_account" class="btn btn-default">Back</a>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="modal fade" id="changePictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Change Picture</h4>
			</div>
			<div class="modal-body">
			<?php echo form_open_multipart("ppeims/add_pic"); ?>
				<div class="form-group">
					<input type='file' name='userfile' size='20' id='file' required>
					<p class="help-block">Upload a profile picture, 1mb max.</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php 
											$data = [
												'class' => "btn btn-primary pull-right",
												'title' => 'change pic',
												'type' => 'submit'
											];
											echo form_button($data, 'Upload');
											echo form_close();
										?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="removePictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Remove Picture</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to remove this picture?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="<?php echo base_url();?>ppeims/remove_pic" class="btn btn-danger">Remove</a>
			</div>
		</div>
	</div>
</div>

<?php include 'include/footer.php';
// EOF