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
					<li>Personnel</li>
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
			<?php if($message){
				  if (strpos($message, 'added') !== false || strpos($message, 'Filter') !== false || strpos($message, 'updated') !== false){
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
					<div class="row-header">
						<div class="row">
							<div class="col-md-8">
								<h1 class="page-title">Personnel</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Add</button>
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
									<label for="search-item" class="sr-only">Search Personnel</label>
									<div class="input-group">
										<input type="search" id="search-item" class="form-control" placeholder="Search personnel...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button">
												<i class="glyphicon glyphicon-search"></i>
												<span class="sr-only">Search</span>
											</button>
										</span>
									</div>
								</div>
								<div class="col-md-8">
									<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Filter by Work Center <span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url();?>ppeims/filter_work_center/All">All</a></li>
											<?php foreach($getGroupName as $row){?>
											<li><a href="<?php echo base_url();?>ppeims/filter_work_center/<?= $row->GroupName; ?>"><?= $row->GroupName; ?></a></li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="col-md-1">No.</th>
										<th>Personnel</th>
										<th>Work Center</th>
										<th class="col-md-1">Issued</th>
										<th class="col-md-1">Edit</th>
										<th class="col-md-1">Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									foreach ($getPersonnelName as $row) : ?>
									<tr>
										<th class="col-md-1" scope="row"><?=$i++;?></th>
										<td><?=$row->PersonnelName;?></td>
										<td><?=$row->GroupName;?></td>
										<td class="col-md-1">
													<a href="#" class="btn btn-info btn-xs" role="button" data-toggle="modal" data-target="#viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></a>
										</td>
										<td class="col-md-1">
											<button type="button" data-toggle="modal" data-target="#<?=$row->P_No;?>update" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span></button>
										</td>
										<td class="col-md-1">
											<button type="button" data-toggle="modal" data-target="#<?=$row->P_No;?>delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> <span class="sr-only">Delete</span></button>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- Modal -->
<?php foreach ($getPersonnelName as $row) : ?>
<div class="modal fade" id="<?=$row->P_No;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Personnel</h4>
			</div>
			<?=form_open("ppeims/update_personnel");?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="hidden" value="add-personnel" name="access">
							<input type="hidden" value="<?=$row->P_No;?>" name="P_No">
							<label for="first-name">First Name*</label>
							<input type="text" class="form-control" id="first-name" value="<?=$row->PersonnelName;?>" name="PersonnelName">
						</div>
					</div>
					<div class="col-md-4">
						<label for="last-name">Last Name*</label>
						<input type="text" class="form-control" id="last-name">
					</div>
					<div class="col-md-4">
						<label for="middle-name">Middle Name*</label>
						<input type="text" class="form-control" id="middle-name">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="work-center">Work Center</label>
							<select class="form-control" id="work-center" name="G_No">
								<option value="<?=$row->G_No;?>"><?=$row->GroupName;?></option>
								<?php
								foreach ($getGroupName as $row1) :
									if ($row->G_No == $row1->G_No) : ?>
									<?php else : ?>
									<option value="<?=$row1->G_No;?>"><?=$row1->GroupName;?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<p><em>All fields marked with an asterisk (*) are required.</em></p>
						</div>
					</div>
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
<?php endforeach; ?>

<!-- Modal delete-->
<?php foreach ($getPersonnelName as $row) : ?>
<div class="modal fade" id="<?=$row->P_No;?>delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Delete Personnel</h4>
			</div>
			<?=form_open("ppeims/delete_personnel");?>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" value="<?=$row->P_No;?>" name="P_No">
					<input type="hidden" value="add-personnel" name="access">
					<input type="hidden" class="form-control" value="<?=$row->PersonnelName;?>" name="PersonnelName">
					<p>Are you sure to delete <strong><?=$row->PersonnelName;?></strong>?<p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php
					echo form_submit("loginSubmit","Delete"," class='btn btn-danger'");
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Personnel</h4>
			</div>
			<?=form_open("ppeims/new_personnel");?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="hidden" value="add-personnel" name="access">
							<label for="first-name">First Name*</label>
							<input type="text" class="form-control" id="first-name" name="PersonnelName">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="last-name">Last Name*</label>
							<input type="text" class="form-control" id="last-name" name="last-name">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="middle-name">Middle Name*</label>
							<input type="text" class="form-control" id="middle-name" name="middle-name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="work-center">Group</label>
							<select class="form-control" id="work-center" name="G_No">
								<option value="" disabled selected>Select a group</option>
								<?php foreach ($getGroupName as $row) : ?>
									<option value="<?=$row->G_No;?>"><?=$row->GroupName;?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<p><em>All fields marked with an asterisk (*) are required.</em></p>
						</div>
					</div>
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

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>Issued Items History</h4>
				</div>
				<div class="modal-body">
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										
										<th>Issuance No.</th>
										<th>Date Received</th>
										<th>Particular</th>
										<th>Issued</th>
										<th>Issued By</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td>088</td>
										<td>02-22-17</td>
										<td>Hard Hat (Blue)</td>
										<td>2 pcs</td>
										<td>Rolando Lemence</td>
									</tr>
									<tr>
									
										<td>050</td>
										<td>02-01-17</td>
										<td>Hard Hat (Yellow)</td>
										<td>1 pcs</td>
										<td>Rolando Lemence</td>
									</tr>
									<tr>
										
										<td>022</td>
										<td>01-22-17</td>
										<td>Protective Eyewear</td>
										<td>1 pcs</td>
										<td>Rolando Lemence</td>
									</tr>
									<tr>
									
										<td>011</td>
										<td>10-22-16</td>
										<td>Face Shield</td>
										<td>3 pcs</td>
										<td>Rolando Lemence</td>
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
