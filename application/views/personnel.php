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
						<ol class="breadcrumb">
							<li><a href="<?=base_url();?>ppeims">Dashboard</a></li>
							<li class="active">Personnel</li>
						</ol>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<h2>Plant Personnel</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group pull-left">
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
					</div>
					<div class="col-md-8">
						<div class="margin-bottom-20 text-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								<i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Add Personnel
							</button>
							<a href="<?=base_url();?>ppeims/personnel_group" class="btn btn-primary">Personnel Group</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th class="col-md-1">No.</th>
									<th class="col-md-4">Personnel</th>
									<th class="col-md-5">Group</th>
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
									<td class="col-md-4"><?=$row->PersonnelName;?></td>
									<td class="col-md-5"><?=$row->GroupName;?></td>
									<td class="col-md-1">
										<a data-toggle="modal" data-target="#<?=$row->P_No;?>update" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Edit</span>
										</a>
									</td>
									<td class="col-md-1">
										<a data-toggle="modal" data-target="#<?=$row->P_No;?>delete" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> <span class="sr-only">Delete</span>
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
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
					<h4 class="modal-title" id="myModalLabel">Update Personnel Form</h4>
				</div>
				<?=form_open("ppeims/update_personnel");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-personnel" name="access">
						<input type="hidden" value="<?=$row->P_No;?>" name="P_No">
						<label for="ename">Personnel Name</label>
						<input type="text" class="form-control" value="<?=$row->PersonnelName;?>" name="PersonnelName">
					</div>
					<div class="form-group">
						<label for="">Personnel Group</label>
						<select class="form-control" name="G_No">
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?php 
						echo form_submit("loginSubmit","Save Changes"," class='btn btn-success'");
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
					<h4 class="modal-title" id="myModalLabel">Delete Plant Personnel</h4>
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
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
					<h4 class="modal-title" id="myModalLabel">New Plant Personnel Details</h4>
				</div>
				<?=form_open("ppeims/new_personnel");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-personnel" name="access">
						<label for="ename">Name</label>
						<input type="text" class="form-control" name="PersonnelName">
					</div>
					<div class="form-group">
						<label for="">Group</label>
						<select class="form-control" name="G_No">
							<option value="" disabled selected>Select a group</option>
							<?php foreach ($getGroupName as $row) : ?>
								<option value="<?=$row->G_No;?>"><?=$row->GroupName;?></option>
							<?php endforeach; ?>
						</select>
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

<?php require_once 'include/footer.php';