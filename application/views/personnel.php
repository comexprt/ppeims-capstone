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
					<div id="success-alert" class="alert alert-success alert-dismissable alert-auto-dismiss" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?=$message;?>
					</div><?php }else{?>
					<div id="danger-alert" class="alert alert-danger alert-dismissable alert-auto-dismiss" role="alert">
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Personnel</button>
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
										<td>
										<?php 
											$PersonnelName=explode ("-",$row->PersonnelName);
											$Mname=$PersonnelName[2];
											echo $PersonnelName[0].", ".$PersonnelName[1]." ".$Mname[0].". ";
										
										?>
										</td>
										<td><?=$row->GroupName;?></td>
										<td class="col-md-1">
													<a href="#" class="btn btn-info btn-xs" role="button" data-toggle="modal" data-target="#<?=$row->P_No;?>viewModal"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">View</span></a>
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
										<?php 
											$PersonnelName=explode ("-",$row->PersonnelName);
											$Mname=$PersonnelName[2];
											
										
										?>
							<input type="hidden" value="add-personnel" name="access">
							<input type="hidden" value="<?=$row->P_No;?>" name="P_No">
							<label for="first-name">First Name*</label>
							<input type="text" class="form-control" id="first-name" value="<?=$PersonnelName[1];?>" name="Fname">
						</div>
					</div>
					<div class="col-md-4">
						<label for="middle-name">Middle Name*</label>
						<input type="text" class="form-control" id="middle-name" name="Mname" value="<?=$PersonnelName[2];?>">
					</div>
					<div class="col-md-4"
						<label for="last-name">Last Name*</label>
						<input type="text" class="form-control" id="last-name" value="<?=$PersonnelName[0];?>" name="Lname">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="work-center">Work Center*</label>
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
					<p>Are you sure to delete <strong style="text-transform:capitalize;">
					<?php 
					$PersonnelName=explode ("-",$row->PersonnelName);
											$Mname=$PersonnelName[2];
											echo $PersonnelName[0].", ".$PersonnelName[1]." ".$Mname[0].". ";
					?></strong>?
					<p>
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
							<input type="text" class="form-control" id="first-name" name="Fname" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="middle-name">Middle Name*</label>
							<input type="text" class="form-control" id="middle-name" name="Mname" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="last-name">Last Name*</label>
							<input type="text" class="form-control" id="last-name" name="Lname" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="work-center">Work Center*</label>
							<select class="form-control" id="work-center" name="G_No" required>
								<option value="" disabled selected>Choose a Work Center</option>
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

<?php foreach ($getPersonnelName as $row) : ?>
<div class="modal fade" id="<?=$row->P_No;?>viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>Issued Items History - <?php
						$PersonnelName=explode ("-",$row->PersonnelName);
											$Mname=$PersonnelName[2];
											echo $PersonnelName[0].", ".$PersonnelName[1].". ".$Mname[0].". ";
					?></h4>
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
									</tr>
								</thead>
								<tbody>
								<?php foreach ($getissueonpersonnel as $row1) : 
									if ($row->PersonnelName != $row1->personnel_name){}else{
								?>
								
									<tr>
										
										<td><?php
											if ($row1->isno < 10){
											echo "00".$row1->isno;
										}
										elseif ($row1->isno < 100 && $row1->isno >= 10){
											echo "0".$row1->isno;
										}else {echo $row1->isno; }
										?></td>
										<td><?=$row1->date_received;?></td>
										<td><?=$row1->particulars;?></td>
										<td><?=$row1->issued." ".$row1->unit;?></td>
									</tr>
								<?php } endforeach; ?>
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
<?php endforeach; ?>

<?php 
include 'include/footer.php';
// EOF
