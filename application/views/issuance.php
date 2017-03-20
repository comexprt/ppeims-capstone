<?php 
require_once 'include/header.php';
include 'include/sidebar.php';
include 'include/navbar-top.php'; ?>

		<div class="content">
			<div class="container-fluid">

				<section class="section">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><a href="<?=base_url();?>ppeims">Dashboard</a></li>
								<li class="active">Personal Protective Equipment Issuance</li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="page-header">
								<h2>Personal Protective Equipment Issuance</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group pull-left">
								<label for="search-item" class="sr-only">Search Issuance</label>
								<div class="input-group">
									<input type="search" id="search-item" class="form-control" placeholder="Search issuance...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">
											<i class="glyphicon glyphicon-search" aria-hidden="true"></i>
											<span class="sr-only">Search</span>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="margin-bottom-20 text-right">
								<a href="<?=base_url();?>ppeims/select_plant_personnel" class="btn btn-primary">
									<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>Create Issuance
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th class="col-md-1">No.</th>
											<th class="col-md-2">Issuance No.</th>
											<th class="col-md-3">Date Completed</th>
											<th class="col-md-3">Prepared By</th>
											<th class="col-md-1">Status</th>
											<th class="col-md-1">Update</th>
											<th class="col-md-1">View</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th class="col-md-1" scope="row">1</th>
											<td class="col-md-2">003</td>
											<td class="col-md-3"></td>
											<td class="col-md-3">G. Manlimos</td>
											<td class="col-md-1"><span class="label label-default">Pending</span></td>
											<td class="col-md-1">
												<a href="select-plant-personnel.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
											</td>
											<td class="col-md-1">
												<a href="#" role="button" class="btn btn-default btn-xs disabled" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-zoom-in"></i> <span class="sr-only">View</span></a>
											</td>
										</tr>
										<tr>
											<th class="col-md-1" scope="row">2</th>
											<td class="col-md-2">002</td>
											<td class="col-md-3">04-05-2017</td>
											<td class="col-md-3">G. Manlimos</td>
											<td class="col-md-1"><span class="label label-success">Completed</span></td>
											<td class="col-md-1">
												<a href="#" class="btn btn-default btn-xs disabled"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
											</td>
											<td class="col-md-1">
												<a href="#" role="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-zoom-in"></i> <span class="sr-only">View</span></a>
											</td>
										</tr>
										<tr>
											<th class="col-md-1" scope="row">3</th>
											<td class="col-md-2">001</td>
											<td class="col-md-3">03-29-2017</td>
											<td class="col-md-3">G. Manlimos</td>
											<td class="col-md-1"><span class="label label-success">Completed</span></td>
											<td class="col-md-1">
												<a href="#" class="btn btn-default btn-xs disabled"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
											</td>
											<td class="col-md-1">
												<a href="#" role="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-zoom-in"></i> <span class="sr-only">View</span></a>
											</td>
										</tr>
									</tbody>
								</table>
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

<?php require_once 'include/footer.php';