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
<body class="page-dashboard">

	<div class="sidebar">
		<div class="sidebar-logo">
			<!-- <a href="#"><img src="images/db-logo.png" alt=""></a> -->
		</div>
		<div class="sidebar-user">
			<div class="sidebar-user-pic"></div>
			<div class="sidebar-user-name">
				<span><?php echo $Fname." ".$Lname;?></span>
				<span><?php echo $Position;?></span>
			</div>
		</div>
		<div class="sidebar-nav">
			<ul>
				<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
				<li><a href="<?php echo base_url();?>ppeims/equipment">Equipment Batch</a></li>
				<li><a href="<?php echo base_url();?>ppeims/inventory">Inventory</a></li>
				<li class="current"><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
				<li><a href="<?php echo base_url();?>ppeims/issuance">Equipement Issuance</a></li>
			</ul>
		</div>
	</div>

	<div class="main">
		<nav class="navbar navbar-top">
			 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			 	<ul class="nav navbar-nav navbar-right">
			 		<li class="dropdown">
			 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname;?> <span class="caret"></span></a>
			 			<ul class="dropdown-menu">
			 				<li><a href="<?php echo base_url();?>ppeims/manage_account">Account</a></li>
			 				<li><a href="<?php echo base_url();?>ppeims/emp_logout">Log Out</a></li>
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
					<?php if($message){
						  if (strpos($message, 'added') !== false || strpos($message, 'updated') !== false){
					?>
							<!-- Alert for success -->
							<div class="alert alert-success alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?php echo $message;?>
							</div><?php }else{?>
							<div class="alert alert-danger alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?php echo $message;?>
							</div>
					<?php }} else{}?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
								<li class="active">Personnel Group</li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="page-heading page">
								<h2 class="page-heading__title">Agus 6/7 HEPC Personnel Group</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="margin-bottom-20">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Personnel Group</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Personnel Group</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									
									 <?php $i=1; foreach ($getGroupName as $row){ ?>
										<tr>
											<th scope="row"><? echo $i++;?></th>
											<td><?php echo $row->GroupName;?></td>
											<td><?php echo $row->Description;?></td>
											<td>
												<a data-toggle="modal" data-target="#<?php echo $row->G_No;?>update" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
												<a data-toggle="modal" data-target="#<?php echo $row->G_No;?>delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> <span class="sr-only">Delete</span></a>
											</td>
										</tr>
										<?php }?>
										
									</tbody>
								</table>
								<!--div class="panel-footer">
									<div class="table-pagination">
										<ul class="pagination">
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
										</ul>
									</div>
								</div-->
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Modal update-->
	 <?php foreach ($getGroupName as $row){ ?>
	<div class="modal fade" id="<?php echo $row->G_No;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Update Personnel Group Form</h4>
				</div>
				<?php echo form_open("ppeims/update_personnel_group");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-group" name="access">
						<input type="hidden" value="<?php echo $row->G_No;?>" name="G_No">
						<label for="ename">Personnel Group Name</label>
						<input type="text" class="form-control" value="<?php echo $row->GroupName;?>" name="GroupName">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="edescription">Personnel Group Description</label>
							<textarea name="Description" cols="30" rows="5" class="form-control"><?php echo $row->Description;?></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?php //registration button
								
									echo form_submit("loginSubmit","Save"," class='btn btn-primary'");
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
					<h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
				</div>
				<?php echo form_open("ppeims/delete_personnel_group");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="<?php echo $row->G_No;?>" name="G_No">
						<input type="hidden" value="add-group" name="access">
						<input type="hidden" class="form-control" value="<?php echo $row->GroupName;?>" name="GroupName">
						<p>Are you sure to delete Group Name : 
						<code style="background-color:#FFFFFF;font-size:12px;font-weight:bold;"><?php echo $row->GroupName;?></code> ?<p>
						
					</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?php //registration button
								
									echo form_submit("loginSubmit","OK"," class='btn btn-danger'");
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
					<h4 class="modal-title" id="myModalLabel">Add Personnel Group Form</h4>
				</div>
				<?php echo form_open("ppeims/new_personnel_group");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-group" name="access">
						<label for="ename">Personnel Group Name</label>
						<input type="text" class="form-control" name="GroupName">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="edescription">Personnel Group Description</label>
							<textarea name="Description" cols="30" rows="5" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<?php 
							echo form_submit("loginSubmit","Save"," class='btn btn-primary'");
							echo form_close();
						?>
					</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</html>