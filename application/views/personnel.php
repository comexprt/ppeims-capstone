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
				<li><a href="<?php echo base_url();?>">Dashboard</a></li>
				<li><a href="<?php echo base_url();?>ppeims/equipment">Equipment</a></li>
				<li><a href="<?php echo base_url();?>ppeims/inventory">Inventory</a></li>
				<li class="current"><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
				<li><a href="<?php echo base_url();?>ppeims/issuance">Issuance</a></li>
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
								<li class="active">Personnel</li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="page-heading page">
								<h2 class="page-heading__title">Agus 6/7 HEPC Personnel</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="margin-bottom-20">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Personnel</button>
								<a href="<?php echo base_url();?>ppeims/personnel_group" class="btn btn-primary">Personnel Group</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group pull-left">
												<label for="search-item" class="sr-only">Search Personnel</label>
												<div class="input-group">
													<input type="search" id="search-item" class="form-control" placeholder="Search personnel...">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i> <span class="sr-only">Search</span></button>
													</span>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											<button type="button" aria-label="Print" data-toggle="tooltip" data-placement="top" title="Print List" class="btn btn-default pull-right"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> <span class="sr-only">Print</span></button>
										</div>
									</div>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Personnel</th>
											<th>Group</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($getPersonnelName as $row){ ?>
										<tr>
											<th scope="row"><? echo $i++;?></th>
											<td><?php echo $row->PersonnelName;?></td>
											<td><?php echo $row->GroupName;?></td>
											<td>
												<a data-toggle="modal" data-target="#<?php echo $row->P_No;?>update" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
												<a data-toggle="modal" data-target="#<?php echo $row->P_No;?>delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> <span class="sr-only">Delete</span></a>
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

	<!-- Modal -->
	<?php foreach ($getPersonnelName as $row){ ?>
	<div class="modal fade" id="<?php echo $row->P_No;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Update Personnel Form</h4>
				</div>
				<?php echo form_open("ppeims/update_personnel");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-personnel" name="access">
						<input type="hidden" value="<?php echo $row->P_No;?>" name="P_No">
						<label for="ename">Personnel Name</label>
						<input type="text" class="form-control" value="<?php echo $row->PersonnelName;?>" name="PersonnelName">
					</div>
					<div class="form-group">
						<label for="">Personnel Group</label>
						<select class="form-control" name="G_No">
							<option value="<?php 
 							echo $row->G_No;?>"><?php echo $row->GroupName;?></option>
							<?php foreach ($getGroupName as $row1){ 
								if ($row->G_No == $row1->G_No){}else{
								?>
								<option value="<?php echo $row1->G_No;?>"><?php echo $row1->GroupName;?></option>
							<?php }} ?>
						</select>
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
	<?php }?>
	
	
	<!-- Modal delete-->
	 <?php foreach ($getPersonnelName as $row){ ?>
	<div class="modal fade" id="<?php echo $row->P_No;?>delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
				</div>
				<?php echo form_open("ppeims/delete_personnel");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="<?php echo $row->P_No;?>" name="P_No">
						<input type="hidden" value="add-personnel" name="access">
						<input type="hidden" class="form-control" value="<?php echo $row->PersonnelName;?>" name="PersonnelName">
						<p>Are you sure to delete Personnel Name : 
						<code style="background-color:#FFFFFF;font-size:12px;font-weight:bold;"><?php echo $row->PersonnelName;?></code> ?<p>
						
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
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Personnel Form</h4>
				</div>
				<?php echo form_open("ppeims/new_personnel");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-personnel" name="access">
						<label for="ename">Personnel Name</label>
						<input type="text" class="form-control" name="PersonnelName">
					</div>
					<div class="form-group">
						<label for="">Personnel Group</label>
						<select class="form-control" name="G_No">
							<?php foreach ($getGroupName as $row){ ?>
								<option value="<?php echo $row->G_No;?>"><?php echo $row->GroupName;?></option>
							<?php } ?>
						</select>
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