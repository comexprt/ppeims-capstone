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
				<li><a href="<?php echo base_url();?>ppeims/equipment">Equipment</a></li>
				<li class="current"><a href="<?php echo base_url();?>ppeims/inventory">Inventory</a></li>
				<li><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
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
								<li><a href="<?php echo base_url();?>ppeims/inventory">Inventory</a></li>
								<li class="active">Add/Select Equipment</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="page-heading page">
								<h2 class="page-heading__title">Add/Select Personal Protective Equipment to Update</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="search-item" class="sr-only">Search Item</label>
												<div class="input-group">
													<input type="search" id="search-item" class="form-control" placeholder="Search particulars...">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
													</span>
												</div>
											</div>
										</div>
										<div class="col-md-8">
									
											<?php foreach ($getLastTransaction as $lt){if ($lt->Status == 1){
												echo form_open("ppeims/inventory_equipmen_list");?>
												<input type="hidden" value="add-iel" name="access">
												<input type="hidden" class="form-control" value="<?php echo $LastSId;?>" name="LastSId">
												<?php $data = array('class' => "btn btn-primary pull-right",'title' => 'Add to List','type' => 'submit');
												echo form_button($data, '<i	data-toggle="tooltip" data-placement="top" title="View equipment list">Equipment List <span class="badge">
												'.count($getLastTransactionData).'</span></i>');
												echo form_close();
											
											}else{?>
												<a class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="View equipment list">Equipment List <span class="badge">0
											</span></a>
											<?php }}?>
											
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Particulars</th>
												<th>Description</th>
												<th>On Stock</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($getLastTransaction as $lt){ }
												if ($lt->Status == 1){?>
												<?php $i=1; foreach ($getEquipment as $row){ ?>
												<tr>
													<th scope="row"><?php echo $i++;?></th>
													<td><?php echo $row->Particulars;?></td>
													<td><?php echo $row->Description;?></td>
													<td><?php echo $row->Stock." ".$row->Unit;;?></td>
													<td>
													<?php $ii=0;
														foreach ($getLastTransactionData as $ltd){
														if ($ltd->Particulars==$row->Particulars){
															$ii++;}else{}}
														if ($ii==0){
														echo form_open("ppeims/new_ui");?>
														<input type="hidden" value="add-ui" name="access">
														<input type="hidden" class="form-control" value="<?php echo $row->Particulars;?>" name="Particulars">
														<input type="hidden" class="form-control" value="<?php echo $row->EI_No;?>" name="EI_No">
														<?php $data = array('class' => "btn btn-default btn-xs",'title' => 'Add to List','type' => 'submit');
														echo form_button($data, '<i class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Add to List" aria-hidden="true"></i> <span class="sr-only">Add</span>');
														echo form_close();
														}else{ ?>
														<span class="label label-success">Added</span>
														<?php } $ii=0;?>
													</td>
												</tr>
												<?php }
												 
												 }else {?>
											
												<?php $i=1; foreach ($getEquipment as $row){ ?>
												<tr>
													
													<th scope="row"><?php echo $i++;?></th>
													<td><?php echo $row->Particulars;?></td>
													<td><?php echo $row->Description;?></td>
													<td><?php echo $row->Stock." ".$row->Unit;?></td>
													<td>
													<?php
														echo form_open("ppeims/new_ui");?>
														<input type="hidden" value="add-ui" name="access">
														<input type="hidden" class="form-control" value="<?php echo $row->Particulars;?>" name="Particulars">
														<input type="hidden" class="form-control" value="<?php echo $row->EI_No;?>" name="EI_No">
														<?php $data = array('class' => "btn btn-default btn-xs",'type' => 'submit');
														echo form_button($data, '<i class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Add to List" aria-hidden="true"></i> <span class="sr-only">Add</span>');
														echo form_close();
													?>
													</td>
												</tr>
											<?php }?>
											
											<?php }?>
											
										</tbody>
									</table>
								</div>
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

	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</html>