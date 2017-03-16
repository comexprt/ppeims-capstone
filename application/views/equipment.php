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
							<li class="active">Equipment</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<h2>Personal Protective Equipment</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="search-item" class="sr-only">Search Item</label>
							<div class="input-group">
								<input type="search" id="search-item" class="form-control" placeholder="Search particulars...">
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
						<div class="text-right margin-bottom-20">
							<a href="#" role="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								<i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Add Equipment
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th>No.</th>
									<th>Particulars</th>
									<th>Description</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1; 
								foreach ($getEquipment as $row) : ?>
								<tr>
									<th scope="row"><?=$i++;?></th>
									<td><?=$row->Particulars;?></td>
									<td><?=$row->Description;?></td>
									<td>
										<a role="button" data-toggle="modal" data-target="#<?=$row->EI_No;?>update" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
											<span class="sr-only">Edit</span>
										</a>
									</td>
									<td>
										<a role="button" data-toggle="modal" data-target="#<?=$row->EI_No;?>delete" class="btn btn-default btn-xs">
											<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
											<span class="sr-only">Delete</span>
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

	<?php foreach ($getEquipment as $row) : ?>
	<div class="modal fade" id="<?=$row->EI_No;?>update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Personal Protective Equipment</h4>
				</div>
				<?php echo form_open("ppeims/update_equipment");?>
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-equipment" name="access">
						<input type="hidden" class="form-control" value="<?php echo $row->EI_No;?>" name="EI_No">
						<input type="hidden" class="form-control" value="<?php echo $row->Stock;?>" name="Stock">
						<input type="hidden" class="form-control" value="<?php echo $row->Re_Ordering_Pt;?>" name="Re_Ordering_Pt">
						<input type="hidden" class="form-control" value="<?php echo $row->Issued;?>" name="Issued">
						<input type="hidden" class="form-control" value="<?php echo $row->Unit;?>" name="Unit">
						<input type="hidden" class="form-control" value="<?php echo $row->Remarks;?>" name="Remarks">
						
						<label for="ename">Name</label>
						<input type="text" class="form-control" value="<?=$row->Particulars;?>" name="Particulars">
					</div>
					<div class="form-group">
						<label for="edescription">Description</label>
						<textarea name="Description" cols="30" rows="4" class="form-control"><?=$row->Description;?></textarea>
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
	
	<?php foreach ($getEquipment as $row) : ?>
		<div class="modal fade" id="<?=$row->EI_No;?>delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Personal Protective Equipment</h4>
				</div>
				<?php echo form_open("ppeims/delete_equipment");?>	
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="<?=$row->EI_No;?>" name="EI_No">
						<input type="hidden" value="add-equipment" name="access">
						<input type="hidden" class="form-control" value="<?=$row->Particulars;?>" name="Particulars">
						<p>Are you sure to delete <strong><?=$row->Particulars;?></strong>?<p>
						
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
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Personel Protective Equipment</h4>
				</div>
				<?php echo form_open("ppeims/new_equipment");?>
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="add-equipment" name="access">
						<input type="hidden" class="form-control" value="0" name="Stock">
						<input type="hidden" class="form-control" value="0" name="Re_Ordering_Pt">
						<input type="hidden" class="form-control" value="0" name="Issued">
						<input type="hidden" class="form-control" value="" name="Remarks">
						
						<label for="ename">Name</label>
						<input type="text" class="form-control" name="Particulars">
					</div>
					<div class="form-group">
						<label for="edescription">Description</label>
						<textarea name="Description" cols="30" rows="4" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?php 
						echo form_submit("loginSubmit","Submit"," class='btn btn-primary'");
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</div>

<?php require_once 'include/footer.php';