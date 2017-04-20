<?php 
include 'include/header.php';
include 'include/sidebar.php';
?>

<nav class="navbar navbar--blue navbar-static-top">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="navbar-left">
				<ul class="navbar-breadcrumbs list-inline">
					<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
					<li>/</li>
					<li>Batch</li>
				</ul>
			</div>
	   	 	<ul class="nav navbar-nav navbar-right">
	   	 		<li class="dropdown">
	   	 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname;?> <span class="caret"></span></a>
	   	 			<ul class="dropdown-menu">
	   	 				<li><a href="<?php echo base_url();?>ppeims/emp_logout">Log Out</a></li>
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
					<div class="row">
					<div class="col-md-12">
					<?php if($message){
						  if (strpos($message, 'added') !== false || strpos($message, 'updated') !== false || strpos($message, 'completed') !== false){
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
							<div class="col-md-8">
								<h1 class="page-title">Equipment Batch</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
								<?php foreach ($getlast_issuance as $lt): ?>

									<?php if ($lt->Status != 3): ?>
										
									<?php echo form_open("ppeims/addBatch1"); ?>
										
										<input type="hidden" value="add-ui" name="access">
										<?php 
											$data = [
												'class' => "btn btn-primary pull-right",
												'title' => 'Add Batch',
												'type' => 'submit'
											];
											echo form_button($data, '<i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Add');
											echo form_close();
										?>
								
									<?php else: ?>
									
										<a href="<?php echo base_url();?>ppeims/update_batch/<?php echo "new_entry"?>" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
									
									<?php endif; ?>
								
								<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-4">
									<label for="search-batch" class="sr-only">Search Batch</label>
									<div class="input-group">
										<input type="search" id="search-batch" class="form-control" placeholder="Search Batch...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> <span class="sr-only">Search</span></button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Batch</th>
										
										<th>Complete</th>
										<th>Action</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>	
								<?php 
								$id = 1;
								foreach($getlist_issuance as $row){?>
										
										<?php if ($row->Status == 1 || $row->Status == 2){ ?>
										<tr>
										<?php }else{ ?>
										<tr class="success">
										<?php } ?>
										
										<th scope="row"><?php echo $id++; ?></th>
										<td><?php 
										if ($row->Tr_No < 10){
											echo "00".$row->Tr_No;
										}
										elseif ($row->Tr_No < 100 && $row->Tr_No >= 10){
											echo "0".$row->Tr_No;
										}else {echo $row->Tr_No; }
										
										?></td>
										
										
										
										<?php if ($row->Status == 2){ ?>
										<td><?php echo  date('F d, Y',strtotime($row->Tr_Date)); ?></td>
										<td class="col-md-1">
										<?php 
										foreach ($getPendingCount as $row1){
											$countpending = $row1->countpending;
										}
										if ($countpending >= 1){ ?>
										<a href="adjust-equipment-issuance-step-1.html" class="btn btn-default btn-xs disabled"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										<?php }else { ?>
										<a href="<?php echo base_url();?>ppeims/adjust_issuance/<?=$row->Tr_No;?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										<?php } ?>
										</td>
										
										<td class="col-md-1">
											<a type="button" class="btn btn-default btn-xs" role="button" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></a>
										</td>
										
										<?php }elseif ($row->Status == 2){ ?>
										<td><span class="label label-warning">Adjusting</span></td>
										<td class="col-md-1">
											<a href="<?php echo base_url();?>ppeims/update_batch/<?=$row->Tr_No;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
										
										<td class="col-md-1">
											<a type="button" class="btn btn-warning btn-xs" role="button" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></a>
										</td>
										<?php }else{ ?>
										<td><span class="label label-success">Pending</span></td>
										<td class="col-md-1">
											<a href="<?php echo base_url();?>ppeims/update_batch/<?=$row->Tr_No;?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
										
										<td class="col-md-1">
											<a type="button" class="btn btn-success btn-xs" role="button" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></a>
										</td>
										<?php } ?>
										
										
									</tr>
								<?php } ?>
							
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
					<h4>Batch 001</h4>
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
										<th>Added</th>
										<th>Threshold</th>
										<th>Expiry Date</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Hard Hat (Blue)</td>
										<td>60 pcs</td>
										<td>50 pcs</td>
										<td>15 pcs</td>
										<td>02-10-2020</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Hard Hat (Yellow)</td>
										<td>40 pcs</td>
										<td>29 pcs</td>
										<td>10 pcs</td>
										<td>02-10-2019</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Protective Eyewear</td>
										<td>80 pcs</td>
										<td>40 pcs</td>
										<td>20 pcs</td>
										<td>02-10-2018</td>
									</tr>
									<tr>
										<th scope="row">4</th>
										<td>Face Shield</td>
										<td>100 pcs</td>
										<td>70 pcs</td>
										<td>10 pcs</td>
										<td>02-10-2020</td>
									</tr>
									<tr>
										<th scope="row">5</th>
										<td>Safety Shoes</td>
										<td>80 pairs</td>
										<td>30 pairs</td>
										<td>20 pairs</td>
										<td>02-10-2018</td>
									</tr>
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

<?php 
include 'include/footer.php';

// EOF