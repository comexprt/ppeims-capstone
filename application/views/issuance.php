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
					<li>Issuance</li>
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
							<div class="col-md-8">
								<h1 class="page-title">Equipment Issuance</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
								<?php foreach ($getlast_issuance as $lt): ?>

									<?php if ($lt->status != 3): ?>
										
									<?php echo form_open("ppeims/addIssuance"); ?>
										
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
									
										<a href="<?php echo base_url();?>ppeims/update_issuance/<?php echo "new_entry"?>" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
									
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
									<label for="search-batch" class="sr-only">Search Issuance</label>
									<div class="input-group">
										<input type="search" id="search-batch" class="form-control" placeholder="Search issuance...">
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
										<th>Issuance</th>
										<th>Total Personnel</th>
										<th>Date Modified</th>
										<th>Status</th>
										<th>Action</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>	
								<?php 
								$id = 1;
								foreach($getlist_issuance as $row){?>
										
										<tr>
										<th scope="row"><?php echo $id++; ?></th>
										<td><?php 
										if ($row->isno < 10){
											echo "00".$row->isno;
										}
										elseif ($row->isno < 100 && $row->isno >= 10){
											echo "0".$row->isno;
										}else {echo $row->isno; }
										
										?></td>
										<td><?php echo $row->total_personnel; ?></td>
										<td><?php echo $row->date_modified; ?></td>
										<td>
										<?php if ($row->status == 1){ ?>
										<span class="label label-danger">Completed</span>
										<?php }elseif ($row->status == 2){ ?>
										<span class="label label-warning">Adjusting</span>
										<?php }else{ ?>
										<span class="label label-success">Pending</span>
										<?php } ?>
										</td>
										<td class="col-md-1">
											<a href="adjust-equipment-issuance-step-1.html" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>
										</td>
										
										<td class="col-md-1">
											<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></button>
										</td>
										
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

<?php 
include 'include/footer.php';

// EOF