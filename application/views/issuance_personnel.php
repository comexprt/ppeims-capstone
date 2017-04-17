<?php 
include 'include/header.php';
include 'include/sidebar.php';
?>
		<nav class="navbar navbar--blue navbar-static-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-left">
						<ul class="navbar-breadcrumbs list-inline">
							<li><a href="index.html">Dashboard</a></li>
							<li>/</li>
							<li><a href="equipment-issuance.html">Issuance</a></li>
							<li>/</li>
							<li>Add Issuance</li>
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
							<div class="row-header">
								<h1 class="page-title">Add Issuance</h1>
							</div>
						</div>
					</div>
					
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
							<div class="panel panel-default">
								<div class="panel-heading text-right">
									<button type="button" data-toggle="modal" data-target="#addPersonnelModal" class="btn btn-primary"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Personnel</button>
									<button type="button" class="btn btn-info" onclick="window.print();"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print</button>
								</div>
								<div class="table-responsive max-height-300">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="col-md-1">No.</th>
												<th>Personnel</th>
												<th>Work Center</th>
												<th>Issued</th>
												<th class="col-md-1">Issue</th>
												<th class="col-md-1">Remove</th>
											</tr>
										</thead>
										<tbody>
											
											<?php 
											$i=1;
											foreach ($getLastIssuanceData as $row){
											if ($row->total_item_issued == 0){ ?> 
												<tr>
											<?php }else { ?>
												<tr class="success">
											<?php } ?>
											
												<th scope="row"><?= $i++; ?></th>
												<td><?= $row->personnel_name; ?></td>
												<td><?= $row->work_center; ?></td>
												<td><?= $row->total_item_issued; ?></td>
												
											<?php if ($row->total_item_issued == 0){ ?> 
												<td>
													<a href="<?php echo base_url();?>ppeims/update_issuance_item/<?= $row->pino;?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add Equipment</span></a>
												</td>
												
												<td>
													<a  href="<?php echo base_url();?>ppeims/delete_issuance_personnel/<?= $LastSId; ?>/<?= $row->pino;?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></a>
												</td>
											<?php }else { ?>
												
												<td>
													<a href="<?php echo base_url();?>ppeims/update_issuance_item/<?= $row->pino;?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
												</td>
												<td>
													<a  href="<?php echo base_url();?>ppeims/delete_issuance_personnel/<?= $LastSId; ?>/<?= $row->pino;?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></a>
												</td>
											<?php } ?>
												
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6">
											<button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="submit" class="btn btn-success">Save</button>
												<button type="button" data-toggle="modal" data-target="#completeModal" class="btn btn-primary">Complete</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url();?>ppeims/issuance/" role="button" class="btn btn-default">Back</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addPersonnelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add/Select Personnel</h4>
				</div>
				<div class="modal-body">
					<p>Select the personnel you want to add in this issuance.</p>
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Filter <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">All</a></li>
									<li><a href="#">Agus 6 HEP (Maintenance)</a></li>
									<li><a href="#">Agus 7 HEP (Technical)</a></li>
									<li><a href="#">Agus 7 HEP (Maintenance)</a></li>
									<li><a href="#">Maintenance</a></li>
									<li><a href="#">Office of the Plant Manager</a></li>
								</ul>
							</div>
						</div>
						<div class="table-responsive max-height-300">
						
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="col-md-2"><input type="checkbox"> Select</th>
										<th>Name</th>
										<th>Work Center</th>
									</tr>
								</thead>
								<tbody>
								<?php echo form_open("ppeims/addPersonnelIssued"); ?>
										
										<input type="hidden" value="add-ui" name="access">
										<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
								<?php 
								
							
								foreach ($getPersonnelName as $row){ ?>
								
								<tr>
									<td><input type="checkbox" name="items[]" value="<?= $row->PersonnelName."-".$row->GroupName; ?>"></td>
									<td><?= $row->PersonnelName; ?></td>
									<td><?= $row->GroupName; ?></td>
								</tr>
								<? } ?>
							
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<?php 
											$data = [
												'class' => "btn btn-primary pull-right",
												'title' => 'Add Personnel',
												'type' => 'submit'
											];
											echo form_button($data, 'Save');
											echo form_close();
										?>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Complete Issuance</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to save this issuance as complete?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Complete</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Issuance</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this issuance?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" > <a href="<?php echo base_url();?>ppeims/delete_issuance/<?= $LastSId; ?>" style="color:#ffffff;text-decoration:none;">Delete</a></button>
				</div>
			</div>
		</div>
	</div>

<?php 
include 'include/footer.php';
