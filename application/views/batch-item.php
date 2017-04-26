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
					<li><a href="<?php echo base_url(); ?>ppeims/batch_equipment">Batch</a></li>
					<li>/</li>
					<li>Batch</li>
				</ul>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>ppeims/emp_logout">Log Out</a></li>
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
					<?php 
					if($message) : 
						if (strpos($message, 'added') !== false || strpos($message, 'Completed') !== false || strpos($message, 'updated') !== false || strpos($message, 'adjusted') !== false || strpos($message, 'removed') !== false) : ?>

						<div class="alert alert-success alert-dismissable alert-auto-dismiss" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Success!</strong> <?php echo $message; ?>
						</div>

						<?php else : ?>
							
						<div class="alert alert-danger alert-dismissable alert-auto-dismiss" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Success!</strong> <?php echo $message; ?>
						</div>
					
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<h1 class="page-title">Batch</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-6">
									<button type="button" data-toggle="modal" data-target="#addPersonnelModal" class="btn btn-primary">Add Equipment</button>
								</div>
								
							</div>
						</div>
						<div class="table-responsive max-height-300">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="col-md-1">No.</th>
										<th>Particulars</th>
										<th>In Stock</th>
										<th>Added</th>
										<th>Threshold</th>
										<th>Expiry</th>
										<th class="col-md-1">Add</th>
										<th class="col-md-1">Remove</th>
									</tr>
								</thead>
								<tbody>
									
									<?php 
									$i=1;
									foreach ($getLastIssuanceData as $row){
									if ($row->Added_S == 0){ ?> 
										<tr>
									<?php }else { ?>
										<tr class="success">
									<?php } ?>
									
										<th scope="row"><?= $i++; ?></th>
									
										<td><?= $row->Particulars; ?></td>
										<td><?php
										foreach ($getUpdatedStock as $row1){
											if ($row->EI_No == $row1->EI_No){ echo $row1->Stock." ".$row->Unit;}else{}
										}
										
										 ?></td>
										<td><?= $row->Added_S." ".$row->Unit; ?></td>
										<td><?= $row->Re_OrderPt." ".$row->Unit; ?></td>
										<td><?php 
										if ($row->Added_S == 0 ){} else {
										echo $row->Expiration_Date;} ?></td>
										
									<?php if ($row->Added_S == 0){ ?> 
										<td>
											<a data-toggle="modal" data-target="#<?=$row->Tr_D_No; ?>addModal" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
										</td>
										
										<td>
											<a  href="<?php echo base_url(); ?>ppeims/removeBatchItem/<?= $LastSId; ?>/<?= $row->Tr_D_No; ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></a>
										</td>
									<?php }else { ?>
										
										<td>
											<a data-toggle="modal" data-target="#<?= $row->Tr_D_No; ?>addModal" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Add</span></a>
										</td>
										<td>
											<a  href="<?php echo base_url(); ?>ppeims/removeBatchItem/<?= $LastSId; ?>/<?= $row->Tr_D_No; ?>" class="btn btn-<?php echo ($row->Added_S == 0) ? 'default' : 'danger' ?> btn-xs"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></a>
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
								<?php foreach ($getIssuedOnPersonnel as $row){ 
									$countissued = $row->countissued;
									
								}
								if ($countissued >= 1){}else{
								?>
									<button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
								<?php } ?>
								</div>
								<div class="col-md-6">
									<div class="text-right">
										
										<button type="button" data-toggle="modal" data-target="#completeModal" class="btn btn-primary">Complete Batch</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo base_url();?>ppeims/batch_equipment/" role="button" class="btn btn-default">Back</a>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="modal fade" id="addPersonnelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add/Select Equipment</h4>
			</div>
			<div class="modal-body">
				<p>Select the Equipment you want to add in this Batch.</p>
				<div class="panel panel-default">
					
					<div class="table-responsive max-height-300">
					
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="col-md-1">Select</th>	
									<th>Particulars</th>
									<th>In Stock</th>
								</tr>
							</thead>
							<tbody>
							<?php echo form_open("ppeims/addBatchItem"); ?>
									
									<input type="hidden" value="add-ui" name="access">
									<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
							<?php 
						
							foreach ($getallitems as $row){ ?>
							
							<tr>
								<td class="col-md-1">
									<input type="checkbox" name="items[]" value="<?= $row->Particulars."//".$row->EI_No."//".$row->Re_Ordering_Pt."//".$row->Unit;?>">
								</td>
								<td><?= $row->Particulars; ?></td>
								<td>
									<?php if($row->Stock > 0): ?>
										<?=$row->Stock." ".$row->Unit;?>
									<?php else: ?>
										<span class="label label-danger">Out of Stock</span>
									<?php endif; ?>
								</td>
							</tr>
							<?php } ?>
						
								
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
										echo form_button($data, 'Add');
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
				<h4 class="modal-title" id="myModalLabel">Complete Batch</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to save this Batch as complete?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				
				<a href="<?php echo base_url(); ?>ppeims/CompleteBatchItem/<?= $LastSId; ?>" class="btn btn-primary">Complete</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Delete Batch</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this Batch?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" > <a href="<?php echo base_url();?>ppeims/deleteBatchItem/<?= $LastSId; ?>" style="color:#ffffff;text-decoration:none;">Delete</a></button>
			</div>
		</div>
	</div>
</div>
	
<?php foreach ($getLastIssuanceData as $row){ ?>
<div class="modal fade" id="<?=$row->Tr_D_No; ?>addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>Add Stock on <?=$row->Particulars?></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
						<?php echo form_open("ppeims/updateBatchItem"); ?>
										
										<input type="hidden" value="add-ui" name="access">
										<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
										<input type="hidden" value="<?= $row->Tr_D_No; ?>" name="Tr_D_No">
							
							<div class="form-group">
								<label for="">Quantity*</label>
								<input type="number" class="form-control" placeholder="0" name="Added_S" min="0" value="<?=$row->Added_S;?>" required>
							</div>
							<div class="form-group">
								<label for="">Threshold</label>
								<input type="number" class="form-control" name="Re_OrderPt" placeholder="0" min="0" value="<?=$row->Re_OrderPt;?>" required>
							</div>
							<div class="form-group">
								<label for="">Expiry</label>
								
								<input type="date" class="form-control" name="Expiration_Date" value="<?=$row->Expiration_Date; ?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p><em>All fields marked with an asterisk (*) are required.</em></p>
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

<?php 

}
include 'include/footer.php';
