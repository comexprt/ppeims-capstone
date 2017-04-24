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
					<li>Work Center</li>
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
				  if (strpos($message, 'added') !== false || strpos($message, 'updated') !== false){
			?>
					<!-- Alert for success -->
					<div class="alert alert-success alert-dismissable alert-auto-dismiss" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?php echo $message;?>
					</div><?php }else{?>
					<div class="alert alert-danger alert-dismissable alert-auto-dismiss" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?php echo $message;?>
					</div>
			<?php }} else{}?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<div class="row">
							<div class="col-md-8">
								<h1 class="page-title">Work Center</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Work Center</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-4">
									<label for="search-item" class="sr-only">Search Work Center</label>
									<div class="input-group">
										<input type="search" id="search-item" class="form-control" placeholder="Search work center...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button">
												<i class="glyphicon glyphicon-search"></i>
												<span class="sr-only">Search</span>
											</button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive max-height-500">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="col-md-1">No.</th>
										<th>Work Center</th>
										<th>Description</th>
										<th class="col-md-1">Edit</th>
										<th class="col-md-1">Delete</th>
									</tr>
								</thead>
								<tbody>
								
								 <?php $i=1; foreach ($getGroupName as $row): ?>
									<tr>
										<th scope="row"><?=$i++;?></th>
										<td><?=$row->GroupName;?></td>
										<td><?=$row->Description;?></td>
										<td>
											<a data-toggle="modal" data-target="#<?php echo $row->G_No;?>update" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
										</td>
										<td>
											<a data-toggle="modal" data-target="#<?php echo $row->G_No;?>delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> <span class="sr-only">Delete</span></a>
										</td>
									</tr>
									<?php endforeach; ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- Modal update-->
 <?php foreach ($getGroupName as $row){ ?>
<div class="modal fade" id="<?php echo $row->G_No;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Work Center</h4>
			</div>
			<?php echo form_open("ppeims/update_personnel_group");?>	
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" value="add-group" name="access">
					<input type="hidden" value="<?php echo $row->G_No;?>" name="G_No">
					<label for="ename">Work Center Name*</label>
					<input type="text" class="form-control" value="<?php echo $row->GroupName;?>" name="GroupName">
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="edescription">Description</label>
						<textarea name="Description" cols="30" rows="5" class="form-control"><?php echo $row->Description;?></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php //registration button
							
								echo form_submit("loginSubmit","Save"," class='btn btn-success'");
								echo form_close();
						?>
				</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- Modal delete-->
 <?php foreach ($getGroupName as $row){ ?>
<div class="modal fade" id="<?php echo $row->G_No;?>delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Delete Work Center</h4>
			</div>
			<?php echo form_open("ppeims/delete_personnel_group");?>	
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" value="<?php echo $row->G_No;?>" name="G_No">
					<input type="hidden" value="add-group" name="access">
					<input type="hidden" class="form-control" value="<?php echo $row->GroupName;?>" name="GroupName">
					<p>Are you sure you want to delete <strong><?php echo $row->GroupName;?></strong>?</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php //registration button
							
								echo form_submit("loginSubmit","Delete"," class='btn btn-danger'");
								echo form_close();
						?>
				</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- Modal Insert-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Work Center</h4>
			</div>
			<?php echo form_open("ppeims/new_personnel_group");?>	
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" value="add-group" name="access">
					<label for="ename">Work Center Name*</label>
					<input type="text" class="form-control" name="GroupName">
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="edescription">Description</label>
						<textarea name="Description" cols="30" rows="5" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<p><em>All fields marked with an asterisk (*) are required.</em></p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<?php 
						echo form_submit("loginSubmit","Save"," class='btn btn-primary'");
						echo form_close();
					?>
				</div>
		</div>
	</div>
</div>

<?php 
include 'include/footer.php';
// EOF