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
						<li><a href="personal-protective-equipment-issuance.html">Personal Protective Equipment Issuance</a></li>
						<li class="active">Print Plant Personnel Draft</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h2>Print Plant Personnel Draft</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="margin-bottom-20">
						<a href="#" role="button" class="btn btn-primary"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print</a>
					</div>
				</div>
				<div class="col-md-6 text-right">
					<div class="margin-bottom-20">
						<a href="<?=base_url();?>ppeims/add_personal_protective_equipment_issuance" class="btn btn-primary">Proceed to Issuance <i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i></a>
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
									<th class="col-md-5">Personnel</th>
									<th class="col-md-5">Total Equipment Issued</th>
									<th class="col-md-1">Remove</th>
								</tr>
								<tr>
									<th class="col-md-12" colspan="4">Office of the Plant Manager</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="col-md-1" scope="row">1</th>
									<td class="col-md-5">Henry Hiceta</td>
									<td class="col-md-5">2</td>
									<td class="col-md-1">
										<a href="#" role="button" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>
											<span class="sr-only">Remove</span>
										</a>
									</td>
								</tr>
							</tbody>

							<thead>
								<tr>
									<th class="col-md-12" colspan="4">Maintenance</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="col-md-1" scope="row">2</th>
									<td class="col-md-5">Romeo Encabo</td>
									<td class="col-md-5">0</td>
									<td class="col-md-1">
										<a href="#" role="button" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>
											<span class="sr-only">Remove</span>
										</a>
									</td>
								</tr>
							</tbody>

							<thead>
								<tr>
									<th class="col-md-12" colspan="4">Agus 6 HEP</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="col-md-1" scope="row">3</th>
									<td class="col-md-5">Wilfredo Alfeche</td>
									<td class="col-md-5">0</td>
									<td class="col-md-1">
										<a href="#" role="button" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>
											<span class="sr-only">Remove Entry</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?=base_url();?>ppeims/select_plant_personnel" class="btn btn-default">Back</a>
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