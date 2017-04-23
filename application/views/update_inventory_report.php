<?php
include 'include/header.php';
include 'include/sidebar.php'; 
?>

<div class="main">
		<nav class="navbar navbar--blue navbar-static-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-left">
						<ul class="navbar-breadcrumbs list-inline">
							<li><a href="index.html">Dashboard</a></li>
							<li>/</li>
							<li><a href="inventory-report.html">Inventory Report</a></li>
							<li>/</li>
							<li>Report Details</li>
						</ul>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lemence <spa class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Log Out</a></li>
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
					<?php if($message){
						  if (strpos($message, 'added') !== false || strpos($message, 'Filter') !== false || strpos($message, 'created') !== false){
					?>
							<!-- Alert for success -->
							<div class="alert alert-success alert-dismissable alert-auto-dismiss" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?=$message;?>
							</div><?php }else{?>
							<div id="danger-alert" class="alert alert-danger alert-dismissable" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?=$message;?>
							</div>
					<?php }} else{}?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row-header">
								<h1 class="page-title">Report Details</h1>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-4">
											<label for="search-item" class="sr-only">Search particulars...</label>
											<div class="input-group">
												<input type="search" id="search-item" class="form-control" placeholder="Search particulars...">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">Submit</span></button>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive max-height-350">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Particulars</th>
												<th>In Stock</th>
												<th>Remarks</th>
												<th>Add</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
										foreach ($getInventoryReport as $row){ 
											if (!empty($row->Remarks)){ echo "<tr class='success' >";
											}else{ echo "<tr>";}
										?>
										
											
												<th scope="row"><?= $i++;?></th>
												<td><?= $row->Particular;?></td>
												<td><?= $row->In_Stock;?></td>
												<td><?= $row->Remarks;?></td>
												<td class="col-md-1">
												<?php
													if (!empty($row->Remarks)){?> 
													<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#<?=$row->irdid;?>editRemarksModal"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add Remarks</span></button>
												<?php }else{ ?>
													<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?=$row->irdid;?>addRemarksModal"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add Remarks</span></button>
												<?php }?>
												</td>
											</tr>
										<?php }?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6">
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteReportModal">Delete</button>
										</div>
										<div class="col-md-6 text-right">
										
											<button type="button" class="btn btn-primary" href="#" data-toggle="modal" data-target="#completeReportModal">Complete Report</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url();?>ppeims/Inventory_Report" class="btn btn-default">Back</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	
	<?php foreach ($getInventoryReport as $row){ ?>
	<div class="modal fade" id="<?=$row->irdid;?>addRemarksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Remarks on <?=$row->Particular;?></h4>
				</div>
				<div class="modal-body">
				<?=form_open("ppeims/addremarks");?>
				<input type="hidden" value="add-ui" name="access">
				<input type="hidden" value="<?=$row->irdid;?>" name="irdid">
				<input type="hidden" value="<?=$row->irid;?>" name="irid">
						<div class="form-group">
							<label for="quantity">Remarks</label>
							<textarea id="" cols="30" rows="5" name="Remarks" class="form-control"></textarea>
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<?php
					echo form_submit("loginSubmit","Save"," class='btn btn-primary'");
					echo form_close();
				?>
				</div>
			</div>
		</div>
	</div>

	<?php } foreach ($getInventoryReport as $row){ ?>
	<div class="modal fade" id="<?=$row->irdid;?>editRemarksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Remarks on <?=$row->Particular;?></h4>
				</div>
				<div class="modal-body">
				<?=form_open("ppeims/addremarks");?>
				<input type="hidden" value="add-ui" name="access">
				<input type="hidden" value="<?=$row->irdid;?>" name="irdid">
				<input type="hidden" value="<?=$row->irid;?>" name="irid">
						<div class="form-group">
							<label for="quantity">Remarks</label>
							<textarea id="" cols="30" rows="5" name="Remarks" class="form-control"><?=$row->Remarks;?></textarea>
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<?php
					echo form_submit("loginSubmit","Save"," class='btn btn-success'");
					echo form_close();
				?>
				</div>
			</div>
		</div>
	</div>
	
	<?php } ?>
	<div class="modal fade" id="createReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Complete Report</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to save this report as complete?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Complete</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="deleteReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Report</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this report?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a type="button" class="btn btn-danger" href="<?php echo base_url();?>ppeims/delete_inventory_report/<?php echo $id;?>">Delete</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="completeReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to complete this report ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a type="button" class="btn btn-primary" href="<?php echo base_url();?>ppeims/print_inventory_report_confirm/<?php echo $id;?>">Yes</a>
				</div>
			</div>
		</div>
	</div>

<?php 
include 'include/footer.php';
// EOF
