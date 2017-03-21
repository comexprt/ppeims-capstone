<?php 
require_once 'include/header.php';
include 'include/sidebar.php';
include 'include/navbar-top.php'; ?>
		<div class="content">
			<div class="container-fluid">

				<section class="section">
				<div class="row">
					<div class="col-md-12">
				<?php if($message){
					  if (strpos($message, 'Completed') !== false || strpos($message, 'Saved') !== false){
				?>
						<!-- Alert for success -->
						<div class="alert alert-success alert-dismissable" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Success!</strong> <?=$message;?>
						</div><?php }else{?>
						<div class="alert alert-danger alert-dismissable" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Success!</strong> <?=$message;?>
						</div>
				<?php }} else{}?>
					</div>
				</div>
				
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Dashboard</a></li>
								<li class="active">Personal Protective Equipment Batch</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="page-header">
								<h2>Personal Protective Equipment Batch</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="margin-bottom-20">
								<a href="<?php echo base_url();?>ppeims/update_inventory" class="btn btn-primary">Create Batch</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th>No.</th>
											<th>Batch No.</th>
											<th>Date Completed</th>
											<th>Prepared By</th>
											<th>Status</th>
											<th>Update</th>
											<th>View</th>
										</tr>
									</thead>
									<tbody>
									<?php $i=1;
									foreach ($getEquipmentList as $row){?>
										<tr>
											<th scope="row"><?= $i++;?></th>
											<td><?= $row->Tr_No;?></td>
											<td><?= $row->Tr_Date;?></td>
											<td><?= $row->Pb;?></td>
											<td>
											<?php if ($row->Status == 1){?>
											<span class="label label-success">Completed</span>
											<?php }else{?>
											<span class="label label-default">Pending</span>
											<?php } ?>
											</td>
											
											<td>
												<?php if ($row->Status == 1){?>
												<a href="select-personal-protective-equipment.html" role="button" class="btn btn-default btn-xs disabled"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
											<?php }else{?>
												<a href="select-personal-protective-equipment.html" role="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></a>
											<?php } ?>
											</td>
											<td>
												<?php if ($row->Status == 1){?>
											<a href="#" class="btn btn-default btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-zoom-in"></i> <span class="sr-only">View</span></a>
											<?php }else{?>
											<a href="#" class="btn btn-default btn-xs disabled" role="button" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-zoom-in"></i> <span class="sr-only">View</span></a>
											<?php } ?>
												
											</td>
										</tr>
									<?php }?>
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
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>Batch No. 003</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th>No.</th>
								<th>Particulars</th>
								<th>Added Stock</th>
								<th>Subtracted Stock</th>
								<th>Total Stock</th>
								<th>Reorder Point</th>
								<th>Expiration Date</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Hard Hat (Yellow)</td>
								<td>30 pcs</td>
								<td>0 pcs</td>
								<td>79 pcs</td>
								<td>10</td>
								<td>01-01-2018</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Protective Eyewear</td>
								<td>20 pcs</td>
								<td>0 pcs</td>
								<td>35 pcs</td>
								<td>10</td>
								<td>01-01-2018</td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Face Shield</td>
								<td>50 pcs</td>
								<td>0 pcs</td>
								<td>50 pcs</td>
								<td>10</td>
								<td>01-01-2018</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
							</tr>
						</tbody>
					</table>
					<p>Date: 04-20-2017</p>
					<p>Prepared By: G. Manlimos</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print</button>
				</div>
			</div>
		</div>
<?php require_once 'include/footer.php';