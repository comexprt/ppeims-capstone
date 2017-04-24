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
							<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
							<li>/</li>
							<li>Inventory Report</li>
						</ul>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname; ?> <spa class="caret"></span></a>
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
				<?php if($message){
					  if (strpos($message, 'added') !== false || strpos($message, 'Filter') !== false || strpos($message, 'updated') !== false){
				?>
						<!-- Alert for success -->
						<div id="success-alert" class="alert alert-success alert-dismissable" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Success!</strong> <?=$message;?>
						</div><?php }else{?>
						<div id="danger-alert" class="alert alert-danger alert-dismissable alert-auto-dismiss" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Attention!</strong> <?=$message;?>
						</div>
				<?php }} else{}?>
					</div>
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row-header">
								<div class="row">
									<div class="col-md-8">
										<h1 class="page-title">Inventory Report</h1>
									</div>
									<div class="col-md-4 text-right">
									
									<?php 
									$count = count($getLastInventoryReport);
									
									if ($count == 0): ?>
									<?php echo form_open("ppeims/createinventoryreport"); ?>
										
										<input type="hidden" value="add-ui" name="access">
										<?php foreach ($getEquipment as $row){ ?>
										<input type="hidden" name="equipment[]" value="<?= $row->Particulars."-".$row->Stock."-".$row->Unit; ?>">
										
										<?php }
											$data = [
												'class' => "btn btn-primary pull-right",
												'title' => 'create',
												'type' => 'submit'
											];
											echo form_button($data, 'Create Report');
											echo form_close();
										 ?>
									<?php endif; ?>
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
											<label for="search-item" class="sr-only">Search reports...</label>
											<div class="input-group">
												<input type="search" id="search-item" class="form-control" placeholder="Search reports...">
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
												<th class="col-md-1">No.</th>
												<th>Report</th>
												<th>Prepared By</th>
												<th>Noted By</th>
												<th>Status</th>
												<th>Created</th>
												<th class="col-md-1">View</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$i=1;
											$last_id="";
											foreach ($getInventoryReportInfo as $row){
											
											if($row->irid == $last_id){}else{
										
										?>
											
												<tr>
												<th class="col-md-1" scope="row"><?= $i++;?></th>
												<td>
												<?php 
												
													$lastprid = $row->irid;
													if($lastprid < 10){
														  echo "00$lastprid";
														}else if ($lastprid >= 10 && $lastprid < 100){
														 echo "0$lastprid";
														}else{
														echo "$lastprid";
														}
												?>
												
												</td>
												<td><?= $row->prepared_by;?></td>
												<td></td>
												<td>
													<?php if($row->status == '1'): ?>
													Pending
													<?php else: ?>
													Completed
													<?php endif; ?>
												</td>
												<td>
													<?php if($row->status == '1'): ?>
													<a href="<?php echo base_url();?>ppeims/update_inventory_report/<?php echo $row->irid;?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-share-alt"></i> Resume</a>
													<?php else: ?>
													<?= $row->date_create;?>
													<?php endif; ?>
												</td>
												<td class="col-md-1">
													<a href="#" role="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?=$row->irid;?>viewReportModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></a>
												</td>
											</tr>
										<?php 
										}
										$last_id= $row->irid;
										} ?>
											
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
	
	<?php foreach ($getInventoryReportInfo as $row) { ?>
	<div class="modal fade" id="<?=$row->irid?>viewReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Report 
						<?php 
						$lastprid = $row->irid;
						if($lastprid < 10){
							echo "00$lastprid";
						}else if ($lastprid >= 10 && $lastprid < 100){
							echo "0$lastprid";
						}else{
							echo "$lastprid";
						}
						?>
					</h4>
				</div>
				<div class="modal-body">
					<div class="table-responsive max-height-350">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="col-md-1">No.</th>
									<th>Particulars</th>
									<th>In Stock</th>
									<th class="col-md-4">Remarks</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$count = 1;
								foreach ($getInventoryReportInfo as $row1) {
								if ($row->irid != $row1->irid){}else{
							?>
								<tr>
									<th class="col-md-1" scope="row"><?=$count++;?></th>
									<td><?=$row1->Particular;?></td>
									<td><?=$row1->In_Stock;?></td>
									<td class="col-md-4"><?=$row1->Remarks;?></td>
								</tr>
							<?php  }} ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Print Preview</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

<?php 
include 'include/footer.php';
// EOF
