<?php 
include 'include/header.php';
include 'include/sidebar.php';
include 'include/navbar-top.php'; 
?>

<div class="content">
	<div class="container-fluid">

		<section class="section">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="<?=base_url();?>ppeims/issuance">Personal Protective Equipment Issuance</a></li>
						<li class="active">Select Plant Personnel</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h2>Select Plant Personnel</h2>
					</div>
				</div>
			</div>
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
					<div class="text-right margin-bottom-20">
						<a href="<?=base_url();?>ppeims/print_plant_personnel_draft" class="btn btn-primary">Personnel Draft <span class="badge">3</span></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th class="col-md-1">No.</th>
								<th class="col-md-5">Personnel</th>
								<th class="col-md-5">Group</th>
								<th class="col-md-1">Add</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="col-md-1" scope="row">1</th>
								<td class="col-md-5">Henry Hiceta</td>
								<td class="col-md-5">Office of the Plant Manager</td>
								<td class="col-md-1">
									<span class="label label-success">Added</span>
								</td>
							</tr>
							<tr>
								<th class="col-md-1" scope="row">2</th>
								<td class="col-md-5">Romeo Encabo</td>
								<td class="col-md-5">Maintenance</td>
								<td class="col-md-1">
									<span class="label label-success">Added</span>
								</td>
							</tr>
							<tr>
								<th class="col-md-1" scope="row">3</th>
								<td class="col-md-5">Wilfredo Alfeche</td>
								<td class="col-md-5">Agus 6 HEP</td>
								<td class="col-md-1">
									<span class="label label-success">Added</span>
								</td>
							</tr>
							<tr>
								<th class="col-md-1" scope="row">4</th>
								<td class="col-md-5">Edgar Bas</td>
								<td class="col-md-5">Agus 6 HEP</td>
								<td class="col-md-1">
									<a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
								</td>
							</tr>
							<tr>
								<th class="col-md-1" scope="row">5</th>
								<td class="col-md-5">Auxiliador Cabusas</td>
								<td class="col-md-5">Agus 6 HEP</td>
								<td class="col-md-1">
									<a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?=base_url();?>ppeims/issuance" class="btn btn-default">Back</a>
				</div>
			</div>
		</section>
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

<?php 
include 'include/footer.php';
// EOF