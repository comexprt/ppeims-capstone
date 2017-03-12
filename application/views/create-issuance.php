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
				<li><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
				<li class="current"><a href="<?php echo base_url();?>ppeims/issuance">Issuance</a></li>
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
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
								<li class="active">Issuance</li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="page-heading page">
								<h2 class="page-heading__title">Add/Select Personnel for Personal Protective Equipment Issuance</h2>
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
											<a href="personnel-issuance-list.html" class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View equipment list">Personnel List <span class="badge">3</span></a>
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
										<tr>
											<th scope="row">1</th>
											<td>Henry Hiceta</td>
											<td>Office of the Plant Manager</td>
											<td>
												<span class="label label-success">Added</span>
											</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Romeo Encabo</td>
											<td>Maintenance</td>
											<td>
												<span class="label label-success">Added</span>
											</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Wilfredo Alfeche</td>
											<td>Agus 6 HEP</td>
											<td>
												<span class="label label-success">Added</span>
											</td>
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>Edgar Bas</td>
											<td>Agus 6 HEP</td>
											<td>
												<a href="#" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Add to List"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
											</td>
										</tr>
										<tr>
											<th scope="row">5</th>
											<td>Auxiliador Cabusas</td>
											<td>Agus 6 HEP</td>
											<td>
												<a href="#" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Add to List"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="panel-footer">
									<div class="table-pagination">
										<ul class="pagination">
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Equipment Form</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="ename">Equipment Name</label>
						<input type="text" class="form-control" id="ename">
					</div>
					<div class="form-group">
						<label for="edescription">Equipment Description</label>
						<textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</html>