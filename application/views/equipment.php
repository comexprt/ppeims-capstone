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
					<li>Equipment</li>
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
				  if (strpos($message, 'added') !== false || strpos($message, 'updated') !== false){
			?>
					<!-- Alert for success -->
					<div class="alert alert-success alert-dismissable alert-auto-dismiss" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?=$message;?>
					</div><?php }else{?>
					<div class="alert alert-danger alert-dismissable alert-auto-dismiss" role="alert">
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
								<h1 class="page-title">Equipment</h1>
							</div>
							<div class="col-md-4">
								<div class="text-right">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Equipment</button>
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
						</div>
						<div class="table-responsive max-height-400">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="col-md-1">No.</th>
										<th>Particulars</th>
										<th>Unit</th>
										<th>Description</th>
										<th class="col-md-1">Edit</th>
										<th class="col-md-1">Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									foreach ($getEquipment as $row) : ?>
									<tr>
										<th class="col-md-1" scope="row"><?=$i++;?></th>
										<td><?=$row->Particulars;?></td>
										<td><?=$row->Unit;?></td>
										<td><?=$row->Description;?></td>
										<td class="col-md-1">
											<a role="button" data-toggle="modal" data-target="#<?=$row->EI_No;?>update" class="btn btn-success btn-xs">
												<i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
												<span class="sr-only">Edit</span>
											</a>
										</td>
										<td class="col-md-1">
											<a role="button" data-toggle="modal" data-target="#<?=$row->EI_No;?>delete" class="btn btn-danger btn-xs">
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
				<h4 class="modal-title" id="myModalLabel">Edit Equipment</h4>
			</div>
			<?php echo form_open("ppeims/update_equipment");?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<input type="hidden" value="add-equipment" name="access">
							<input type="hidden" class="form-control" value="<?php echo $row->EI_No;?>" name="EI_No">
							<input type="hidden" class="form-control" value="<?php echo $row->Stock;?>" name="Stock">
							<input type="hidden" class="form-control" value="<?php echo $row->Re_Ordering_Pt;?>" name="Re_Ordering_Pt">
							<input type="hidden" class="form-control" value="<?php echo $row->Issued;?>" name="Issued">
							<input type="hidden" class="form-control" value="<?php echo $row->Unit;?>" name="Unit">
							<input type="hidden" class="form-control" value="<?php echo $row->Remarks;?>" name="Remarks">

							<label for="ename">Name*</label>
							<input type="text" class="form-control" value="<?=$row->Particulars;?>" name="Particulars" required/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="unit">Unit*</label>
							<select id="unit"  name="Unit" class="form-control">
								<option selected value="pcs">pcs</option>
								<option value="pairs">pairs</option>
								<option value="set">set</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="edescription">Description</label>
							<textarea name="Description" cols="30" rows="4" class="form-control"><?=$row->Description;?></textarea>
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?php
					echo form_submit("loginSubmit","Save"," class='btn btn-success'");
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
				<h4 class="modal-title" id="myModalLabel">Delete Equipment</h4>
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
				<h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
			</div>
			<?php echo form_open("ppeims/new_equipment");?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<input type="hidden" value="add-equipment" name="access">
							<input type="hidden" class="form-control" value="0" name="Stock">
							<input type="hidden" class="form-control" value="0" name="Re_Ordering_Pt">
							<input type="hidden" class="form-control" value="0" name="Issued">
							<input type="hidden" class="form-control" value="" name="Remarks">

							<label for="ename">Name*</label>
							<input type="text" class="form-control" name="Particulars" required/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="unit">Unit*</label>
							<select id="unit" name="unit" class="form-control">
								<option selected value="pcs">pcs</option>
								<option value="pairs">pairs</option>
								<option value="set">set</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="edescription">Description</label>
							<textarea name="Description" cols="30" rows="4" class="form-control"></textarea>
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?php
					echo form_submit("loginSubmit","Save"," class='btn btn-primary'");
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>

<?php 
include 'include/footer.php';

// EOF
