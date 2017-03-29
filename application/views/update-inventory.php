
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
								<li class="active">Select Personal Protective Equipment</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row-header">
								<h3>Add Equipment Batch Step 1</h3>
								<p>Select the equipment you want to add in this batch.</p>
							</div>
						</div>
					</div>
					<div class="row margin-bottom-20">
					<?php foreach($gettransaction_last as $row):
						$uri=$row->Tr_No;
						
					?>
						<div class="col-md-3">
							<strong>Batch:</strong><?php echo $row->Tr_No; ?>
						</div>
						<div class="col-md-3">
							<strong>Date Changes:</strong> <?php echo date('F d , Y',strtotime($row->Tr_Date));?>
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
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="search-item" class="sr-only">Search Item</label>
												<div class="input-group">
													<input type="search" id="search-item" class="form-control" placeholder="Search particulars...">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
													</span>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											<div class="margin-bottom-20 text-right">	
												<?php 
													echo form_open("ppeims/inventory_equipmen_list");?>
													<input type="hidden" value="add-iel" name="access">
													<input type="hidden" class="form-control" value="<?php echo $LastSId;?>" name="LastSId">
													<?php $data = array('class' => "btn btn-primary pull-right",'type' => 'submit');
													echo form_button($data, '<i	data-toggle="tooltip" data-placement="top" title="View equipment list">Proceed to Step 2
													<i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i></a>
													');
													echo form_close();
												?>
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
												<th>Description</th>
												<th>On Stock</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($getLastTransaction as $lt){ $Status = $lt->Status; }
												if ($Status == 0 || $Status == 1 || $Status == 2){?>
												<?php $i=1; foreach ($getEquipment as $row){ ?>
												<tr>
													<th scope="row"><?php echo $i++;?></th>
													<td><?php echo $row->Particulars;?></td>
													<td><?php echo $row->Description;?></td>
													<td><?php echo $row->Stock." ".$row->Unit;;?></td>
													
													<?php $ii=0;
														foreach ($getLastTransactionData as $ltd){
														if ($ltd->Particulars==$row->Particulars){ $detail_id=$ltd->Tr_D_No;$detail_particulars=$ltd->Particulars;
															$ii++;}else{}}
														if ($ii==0){
													echo '<td></td><td>';
														echo form_open("ppeims/new_ui");?>
														<input type="hidden" value="add-ui" name="access">
														<input type="hidden" class="form-control" value="<?php echo $row->Particulars;?>" name="Particulars">
														<input type="hidden" class="form-control" value="<?php echo $uri;?>" name="uri">
														<input type="hidden" class="form-control" value="<?php echo $row->EI_No;?>" name="EI_No">
														<?php $data = array('class' => "btn btn-default btn-xs",'title' => 'Add to List','type' => 'submit');
														echo form_button($data, '<i class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Add to List" aria-hidden="true"></i> <span class="sr-only">Add</span>');
														echo form_close();
													echo '</td>';
														}else{ ?>
														
													<td>
														<span class="label label-success">Added</span>
													</td>
													<td>
														<?php
														
														echo form_open("ppeims/delete_iel_step1");?>
														<input type="hidden" value="add-ui" name="access">
														<input type="hidden" class="form-control" value="<?php echo $detail_particulars; ?>" name="Particulars">
														<input type="hidden" class="form-control" value="<?php echo $uri;?>" name="uri">
														<input type="hidden" class="form-control" value="<?php echo $detail_id;?>" name="Tr_D_No">
														<?php $data = array('class' => "btn btn-danger btn-xs",'title' => 'Remove to List','type' => 'submit');
														echo form_button($data, '<i class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Remove to List" aria-hidden="true"></i> <span class="sr-only">Add</span>');
														echo form_close();
											
														?>
													</td>
														<?php } $ii=0;?>
												</tr>
												<?php }
												 
												 }else {?>
											
												<?php $i=1; foreach ($getEquipment as $row){ ?>
												<tr>
													
													<th scope="row"><?php echo $i++;?></th>
													<td><?php echo $row->Particulars;?></td>
													<td><?php echo $row->Description;?></td>
													<td><?php echo $row->Stock." ".$row->Unit;?></td>
													<td></td>
													<td>
													<?php
														echo form_open("ppeims/new_ui");?>
														<input type="hidden" value="add-ui" name="access">
														<input type="hidden" class="form-control" value="<?php echo $row->Particulars;?>" name="Particulars">
														<input type="hidden" class="form-control" value="<?php echo $uri;?>" name="uri">
														<input type="hidden" class="form-control" value="<?php echo $row->EI_No;?>" name="EI_No">
													
														<?php $data = array('class' => "btn btn-default btn-xs",'type' => 'submit');
														echo form_button($data, '<i class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Add to List" aria-hidden="true"></i>');
														echo form_close();
													?>
													</td>
												</tr>
											<?php }?>
											
											<?php }?>
											
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php require_once 'include/footer.php';