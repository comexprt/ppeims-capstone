<?php 
include 'include/header.php';
include 'include/sidebar.php';
include 'include/topbar.php'; 
?>

<div class="content">
	<div class="container-fluid">
		<section class="section">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li class="active">Issuance</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<div class="row">
							<div class="col-md-8">
								<h1 class="page-title">Issuance</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
									<a href="add-equipment-issuance-step-2.html" class="btn btn-primary"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Add</a>
									<a href="edit-equipment-issuance-step-2.html" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
									<!-- <a href="equipment-issuance-drafts.html" class="btn btn-primary">Issuance Drafts <span class="badge">1</span></a> -->
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
										<th>Completed</th>
										<th>Total Item</th>
										<th>Prepared By</th>
										<th>View</th>
										<th>Adjust</th>
									</tr>
								</thead>
								<tbody>
									<tr class="active">
										<th scope="row">1</th>
										<td>004</td>
										<td><span class="label label-default">Pending</span></td>
										<td>5</td>
										<td>G. Manlimos</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-warning btn-xs disabled"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>003</td>
										<td>02-14-2017</td>
										<td>5</td>
										<td>G. Manlimos</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>002</td>
										<td>12-05-2016</td>
										<td>10</td>
										<td>G. Manlimos</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
									</tr>
									<tr>
										<th scope="row">4</th>
										<td>001</td>
										<td>01-01-2016</td>
										<td>15</td>
										<td>G. Manlimos</td>
										<td class="col-md-1">
											<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
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