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
					<li>Issuance</li>
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
					<div class="row-header">
						<div class="row">
							<div class="col-md-8">
								<h1 class="page-title">Equipment Issuance</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
									<a href="add-equipment-issuance-step-2.html" class="btn btn-primary"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Add</a>
									<a href="edit-equipment-issuance-step-2.html" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
									<a href="adjust-equipment-issuance-step-2.html" class="btn btn-warning"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
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
									<label for="search-batch" class="sr-only">Search Issuance</label>
									<div class="input-group">
										<input type="search" id="search-batch" class="form-control" placeholder="Search issuance...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> <span class="sr-only">Search</span></button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Issuance</th>
										<th>Total Item</th>
										<th>Completed</th>
										<th>Action</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>
									<tr class="success">
										<th scope="row">1</th>
										<td>004</td>
										<td>5</td
										><td><span class="label label-success">Pending</span></td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> <span class="sr-only">Resume Batch</span></a>
										</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										
									</tr>
									<tr class="warning">
										<th scope="row">2</th>
										<td>003</td>
										<td>5</td>
										<td><span class="label label-warning">Adjusting</span></td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> <span class="sr-only">Resume Adjustment</span></a>
										</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>002</td>
										<td>10</td>
										<td>12-05-2016</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										
									</tr>
									<tr>
										<th scope="row">4</th>
										<td>001</td>
										<td>15</td>
										<td>01-01-2016</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php 
include 'include/footer.php';

// EOF