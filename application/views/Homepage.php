<?php
include 'include/header.php';
include 'include/sidebar.php';
include 'include/topbar.php';
foreach ($getitemlowcount as $row){
	$low_count = $row->count;
}

foreach ($getitemexpiredcount as $row){
	$expired_count = $row->count;
}
?>

			<div class="content">
			<div class="container-fluid">
				<section class="section">
					<div class="row">
						<div class="col-md-12">
							<div class="row-header">
								<div class="row">
									<div class="col-md-8">
										<h1 class="page-title">PPE Inventory <small><?php echo date('F d, Y',time()); ?></small></h1>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							
							<?php foreach ($getlast_issuance as $lt): ?>

									<?php if ($lt->status != 3):else: ?>
									<div class="alert alert-success" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<p>Looks like you have a pending issuance, click <strong>Resume</strong> to resume.</p>
										<p>
										<a href="<?php echo base_url();?>ppeims/update_issuance/<?php echo "new_entry"?>" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
											</p>
										</div>
									
									<?php endif; ?>
								
								<?php endforeach; ?>
							
							
									<?php foreach ($getLastInventoryReport as $row) {
									
										if ($row->status == '1'){ ?>
										<div class="alert alert-success" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<p>Looks like you have a pending inventory report, click <strong>Resume</strong> to resume.</p>
											<p>
												<a href="<?php echo base_url();?>ppeims/update_inventory_report/<?php echo $row->irid;?>" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
											</p>
										</div>
										<?php }else{ ?>
										<div class="alert alert-info" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<p>Would you like to create an inventory report, click <strong>Create</strong> to create.</p>
											<p>
												
													<?php echo form_open("ppeims/createinventoryreport"); ?>
													
													<input type="hidden" value="add-ui" name="access">
													<?php foreach ($getEquipment as $row){ ?>
													<input type="hidden" name="equipment[]" value="<?= $row->Particulars."-".$row->Stock."-".$row->Unit; ?>">
													
													<?php }
														$data = [
															'class' => "btn btn-primary",
															'title' => 'create',
															'type' => 'submit'
														];
														echo form_button($data, '<i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Create');
														echo form_close(); ?>
															</p>
										</div>
										<?php } ?>
										
									<?php } ?>
							
							
						<?php  if ($low_count != 0){ ?>
							<div class="alert alert-warning" role="alert">
							
								<p>Looks like you have <strong><?=$low_count;?></strong> supplies below their threshold, click <strong>View</strong> to view them.</p>
								<p>
									<a href="#" role="button" data-toggle="modal" data-target="#viewModal" class="btn btn-warning"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> View</a>
								</p>
							</div>
						<?php } if ($expired_count != 0){ ?>
							<div class="alert alert-danger" role="alert">
								
								<p>Looks like you have <strong><?=$expired_count;?></strong> supplies that are expired, click <strong>View</strong> to view them.</p>
								<p>
									<a href="#" role="button" data-toggle="modal" data-target="#viewModalE" class="btn btn-danger"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> View</a>
								</p>
							</div>
						<?php }?>
						</div>
						<div class="col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6">
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
												<th>Issued</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i = 1;
										foreach ($getallitems as $row){ ?>
											<tr>
												<th scope="row"><?=$i++;?></th>
												<td><?=$row->Particulars;?></td>
												<td><?=$row->Stock." ".$row->Unit;?></td>
											
												<td><?php
												foreach ($getallissueditems as $row1) {
													if ($row->EI_No == $row1->EI_No){
														echo $row1->sum_issued." ".$row->Unit;
													}else {}
												}
												?></td>
											</tr>
										<?php } ?>
										<?php ?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>LOW SUPPLIES ( <?=$low_count;?> ITEMS)</h4>
				</div>
				<div class="modal-body">
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Particulars</th>
										<th>In Stock</th>
										<th>Threshold</th>
									</tr>
								</thead>
								<tbody>
								<?php $i=1;
								foreach ($getitemlow as $row){ ?>
									<tr>
										<th scope="row"><?=$i++;?></th>
										<td><?=$row->Particulars;?></td>
										<td><?=$row->Stock." ".$row->Unit;?> </td>
										<td><?=$row->Re_Ordering_Pt." ".$row->Unit;?> </td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="viewModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>EXPIRED ( <?=$low_count;?> ITEMS)</h4>
				</div>
				<div class="modal-body">
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Particulars</th>
										<th>Expired</th>
										<th>Batch No</th>
									</tr>
								</thead>
								<tbody>
								<?php $i=1;
								foreach ($getitemexpired as $row){ ?>
									<tr>
										<th scope="row"><?=$i++;?></th>
										<td><?=$row->Particulars;?></td>
										<td><?=$row->Expiration_Date;?></td>
										<td>
										<?php
											if ($row->Tr_No < 10){
											echo "00".$row->Tr_No;
										}
										elseif ($row->Tr_No < 100 && $row->Tr_No >= 10){
											echo "0".$row->Tr_No;
										}else {echo $row->Tr_No; }
										?>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	
<?php include 'include/footer.php'; 
// EOF
