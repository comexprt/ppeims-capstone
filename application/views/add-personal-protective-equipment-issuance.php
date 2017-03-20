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
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="personal-protective-equipment-issuance.html">Issuance</a></li>
						<li><a href="select-plant-personnel.html">Select Plant Personnel</a></li>
						<li><a href="print-plant-personnel-draft.html">Print Plant Personnel Draft</a></li>
						<li class="active">Add Personal Protective Equipment Issuance</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h2>Add Personal Protective Equipment Issuance</h2>
					</div>
				</div>
			</div>
			<div class="row margin-bottom-20">
				<div class="col-md-4">
					<strong>Issuance No: 003</strong>
				</div>
				<div class="col-md-4">
					<strong>Date: March 20, 2017</strong>
				</div>
				<div class="col-md-4">
					<strong>Prepared By: G. Manlimos</strong>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th class="col-md-1">No.</th>
									<th class="col-md-3">Personnel</th>
									<th class="col-md-3">Group</th>
									<th class="col-md-3">Total Equipment Added</th>
									<th class="col-md-1">Add/Update</th>
									<th class="col-md-1">Remove</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="col-md-1" scope="row">1</th>
									<td class="col-md-3">Henry Hiceta</td>
									<td class="col-md-3">Office of the Plant Manager</td>
									<td class="col-md-3">2</td>
									<td class="col-md-1">
										<a href="add-personal-protective-equipment-issuance-equipment.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add Equipment</span></a>
									</td>
									<td class="col-md-1">
										<a href="#" role="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove Entry</span></a>
									</td>
								</tr>
								<tr>
									<th class="col-md-1" scope="row">2</th>
									<td class="col-md-3">Romeo Encabo</td>
									<td class="col-md-3">Maintenance</td>
									<td class="col-md-3">0</td>
									<td class="col-md-1">
										<a href="add-personal-protective-equipment-issuance-equipment.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add Equipment</span></a>
									</td>
									<td class="col-md-1">
										<a href="#" role="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove Entry</span></a>
									</td>
								</tr>
								<tr>
									<th class="col-md-1" scope="row">3</th>
									<td class="col-md-3">Wilfredo Alfeche</td>
									<td class="col-md-3">Agus 6 HEP</td>
									<td class="col-md-3">0</td>
									<td class="col-md-1">
										<a href="add-personal-protective-equipment-issuance-equipment.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add Equipment</span></a>
									</td>
									<td class="col-md-1">
										<a href="#" role="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove Entry</span></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a href="<?=base_url();?>ppeims/print_plant_personnel_draft" class="btn btn-default">Back</a>
				</div>
				<div class="col-md-6">
					<div class="text-right">
						<a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save Draft</a>
						<a href="#" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Mark as Complete</a>
						<a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete Issuance</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php require_once 'include/footer.php';