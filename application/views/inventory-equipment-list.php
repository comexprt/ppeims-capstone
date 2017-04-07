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
					<ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="personal-protective-equipment-batch.html">Personal Protective Equipment Batch</a></li>
						<li><a href="select-personal-protective-equipment.html">Select Personal Protective Equipment</a></li>
						<li class="active">Add Personal Protective Equipment Batch</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h2>Add Personal Protective Equipment Batch</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
						<div class="row margin-bottom-20">
						<?php foreach($getupdated_transactionDate as $row):?>
							<div class="col-md-3">
								<strong>Batch:</strong><?php 
								 $uri=$row->Tr_No; 
								 $stat=$row->Status; 
								echo $uri; 
								 ?>
							</div>
							<div class="col-md-3">
								<strong>Date Added:</strong> <?php echo date('F d , Y',strtotime($row->Tr_Date));?>
							</div>
							<div class="col-md-3">
								<strong>Prepared by:</strong> <?php if (empty($row->Pb)){
																		echo "-- -- --";
																	}else{
																		echo $row->Pb;
																		}	 ?>
							</div>
							<div class="col-md-3">
								<strong>Total Items:</strong> <?php echo count($getLastTransactionData);?>
							</div>
							<?php endforeach; ?>
						</div>

						<div class="row">
							<div class="col-md-12">
							<div class="panel-heading">
							<div class="row">
								<div class="col-md-12">
									<div class="text-right">
									<?php 
									if ($stat == 1) { 
										
										foreach ($getUpdated_Transaction as $row){
												echo form_open("ppeims/update_tr_complete");?>
												<input type="hidden" value="add-ui" name="access">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_No;?>" name="Tr_No">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_Date;?>" name="Tr_Date">
												<?php foreach($getupdated_transactionAdmin as $row1){?>
												<input type="hidden" class="form-control" value="<?php echo $row1->Fname[0].". ".$Lname;?>" name="Pb">
												<?php } ?>
												<?php $data = array('class' => "btn btn-success pull-right",'type' => 'submit','role' => 'button','style' => 'margin-left:1%');
												echo form_button($data, '<i class="glyphicon glyphicon-check" > </i> Save Changes');
												echo form_close();
											}
										
										
										}else{
									foreach ($getUpdated_Transaction as $row){
												echo form_open("ppeims/update_tr_complete");?>
												<input type="hidden" value="add-ui" name="access">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_No;?>" name="Tr_No">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_Date;?>" name="Tr_Date">
												<?php foreach($getupdated_transactionAdmin as $row1){?>
												<input type="hidden" class="form-control" value="<?php echo $row1->Fname[0].". ".$Lname;?>" name="Pb">
												<?php } ?>
												<?php $data = array('class' => "btn btn-primary pull-right",'type' => 'submit','role' => 'button','style' => 'margin-left:1%');
												echo form_button($data, '<i class="glyphicon glyphicon-check" > </i> Mark as Complete');
												echo form_close();
											}
											}?>
											
									</div>
								</div>
							</div>
						</div>
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Particulars</th>
												<th>Current Stock</th>
												<th>Added Stock</th>
												<th>Total Stock</th>
												<th>Reorder Point</th>
												<th>Expiration Date</th>
												<th>Remarks</th>
												<th>Update</th>
												<th>Remove</th>
											</tr>
										</thead>
										<tbody>
										<?php $i=1; foreach ($getUpdated_TransactionData as $row){ 
											if($row->Total_S == 0){
												$current_stock = $row->Stock;
											
											}else{
												$current_stock = $row->Total_S - $row->Added_S;
											
											}
										?>
											<tr>
												<th scope="row"><?php echo $i++;?></th>
												<td><?php echo $row->Particulars;?></td>
												<td><?php echo $current_stock." ".$row->Unit;?></td>
												<td><?php echo $row->Added_S." ".$row->Unit;?></td>
												<td><?php echo $row->Total_S." ".$row->Unit;?></td>
												<td><?php echo $row->Re_OrderPt;?></td>
												<td><?php echo $row->Expiration_Date;?></td>
												<td><?php echo $row->Remarks;?></td>
												<td>
													<a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?php echo $row->Tr_D_No;?>update"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Update</span></a>
												</td><td>	
													<a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?php echo $row->Tr_D_No;?>delete" data-placement="top" title="Remove this item"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></a>
													
												</td>
											</tr>
										<?php }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="<?php echo base_url();?>ppeims/update_inventory/<?= $uri;?>" role="button" class="btn btn-default">Back</a>
							</div>
							<div class="col-md-6">
								<div class="">
											<?php foreach ($getupdated_transactionDate as $row){
												echo form_open("ppeims/delete_tr");?>
												<input type="hidden" value="add-ui" name="access">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_No;?>" name="Tr_No">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_No;?>" name="Pb">
												<?php $data = array('class' => "btn btn-danger pull-right",'type' => 'submit','style' => 'margin-left:1%');
												echo form_button($data, 'Delete');
												echo form_close();
											}?>
										
											
											<?php 
											if ($stat == 0) { 
											foreach ($getUpdated_Transaction as $row){
												echo form_open("ppeims/update_tr_draft");?>
												<input type="hidden" value="add-ui" name="access">
												<?php foreach($getupdated_transactionAdmin as $row1){?>
												<input type="hidden" class="form-control" value="<?php echo $row1->Fname[0].". ".$Lname;?>" name="Pb">
												<?php } ?>
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_No;?>" name="Tr_No">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_Date;?>" name="Tr_Date">
												<?php $data = array('class' => "btn btn-success pull-right",'type' => 'submit','role' => 'button');
												echo form_button($data, 'Save as Draft');
												echo form_close();
											} }else if ($stat == 2) {
											
											foreach ($getUpdated_Transaction as $row){
												echo form_open("ppeims/update_tr_draft");?>
												<input type="hidden" value="add-ui" name="access">
												<?php foreach($getupdated_transactionAdmin as $row1){?>
												<input type="hidden" class="form-control" value="<?php echo $row1->Fname[0].". ".$Lname;?>" name="Pb">
												<?php } ?>
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_No;?>" name="Tr_No">
												<input type="hidden" class="form-control" value="<?php echo $row->Tr_Date;?>" name="Tr_Date">
												<?php $data = array('class' => "btn btn-success pull-right",'type' => 'submit','role' => 'button');
												echo form_button($data, 'Save Changes');
												echo form_close();
											 }}else{} ?>
										
								</div>
							</div>
						</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php foreach ($getUpdated_TransactionData as $row){ ?>
<div class="modal fade" id="<?php echo $row->Tr_D_No;?>delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
			</div>
			<?php echo form_open("ppeims/delete_iel");?>	
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" value="<?php echo $row->Tr_D_No;?>" name="Tr_D_No">
					<input type="hidden" value="<?php echo $row->Tr_No;?>" name="Tr_No">
					<input type="hidden" value="<?php echo $row->Particulars;?>" name="Particulars">
					<input type="hidden" value="add-iel" name="access">
					<p>Are you sure to delete Particulars : 
					<code style="background-color:#FFFFFF;font-size:12px;font-weight:bold;"><?php echo $row->Particulars;?></code> on the list ?<p>
					
				</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?php //registration button
							
								echo form_submit("loginSubmit","OK"," class='btn btn-danger'");
								echo form_close();
						?>
				</div>
		</div>
	</div>
</div>
<?php } ?>
<?php foreach ($getUpdated_TransactionData as $row){ ?>
<!-- Modal -->
<div class="modal fade" id="<?php echo $row->Tr_D_No;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><?php echo $row->Particulars;?></h4>
			</div>
			<?php echo form_open("ppeims/update_iel");?>	
			<input type="hidden" value="add-iel" name="access">
					<input type="hidden" value="<?php echo $row->Stock;?>" name="Stock">
					<input type="hidden" value="<?php echo $row->Tr_D_No;?>" name="Tr_D_No">
					<input type="hidden" value="<?php echo $row->Tr_No;?>" name="Tr_No">
					<input type="hidden" value="<?php echo $row->Added_S;?>" name="old_Added_S">
					<input type="hidden" value="<?php echo $row->EI_No;?>" name="EI_No">
					<input type="hidden" value="<?php echo $row->Particulars;?>" name="Particulars">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="">Stock Quantity</label>
							<input type="number" class="form-control" placeholder="0" name="Added_S" value="<?php echo $row->Added_S;?>">
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label for="">Unit</label>
							<select class="form-control" name="Unit">
								<option value="pcs">pcs</option>
								<option value="pairs">pairs</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="">Reordering Point</label>
							<input type="number" class="form-control" placeholder="0" name="Re_OrderPt" value="<?php echo $row->Re_OrderPt;?>">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="">Expiration Date</label>
							<input type="date" class="form-control" value="<?php echo $row->Expiration_Date;?>" name="Expiration_Date">
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Remarks (optional)</label>
						<textarea class="form-control" name="Remarks"><?php echo $row->Remarks;?></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?php 
					echo form_submit("loginSubmit","Save"," class='btn btn-primary'");
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>
<?php }?>

	
<?php 
include 'include/footer.php';

// EOF