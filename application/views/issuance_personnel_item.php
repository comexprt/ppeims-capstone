<?php 
include 'include/header.php';
include 'include/sidebar.php';
?>

<nav class="navbar navbar--blue navbar-static-top">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="navbar-left">
				<ul class="navbar-breadcrumbs list-inline">
					<li><a href="index.html">Dashboard</a></li>
					<li>/</li>
					<li><a href="<?php echo base_url(); ?>/issuance">Issuance</a></li>
					<li>/</li>
					<li><a href="<?php echo base_url(); ?>update_issuance/issuance">Add Issuance</a></li>
					<li>/</li>
					<li>Issue Equipment</li>
				</ul>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname; ?> <spa class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>ppeims/emp_logout">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
		
<div class="content">
	<div class="container-fluid">
		<section class="section">
			<!-- <div class="row"> -->
			<!-- <div class="col-md-12"> -->
			<?php // if($message){
				  // if (strpos($message, 'added') !== false || strpos($message, 'issued') !== false || strpos($message, 'removed') !== false){
					?>
					
					<!-- <div class="alert alert-success alert-dismissable alert-auto-dismiss" role="alert"> -->
						<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
						<!-- <strong>Success!</strong> <?php echo $message;?> -->
					<!-- </div> -->

					<?php // }else{?>
					
					<!-- <div class="alert alert-danger alert-dismissable" role="alert"> -->
						<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
						<!-- <strong>Success!</strong> <?php echo $message;?> -->
					<!-- </div> -->
					
					<?php // }} else{}?>
				<!-- </div> -->
			<!-- </div> -->
			<div class="row">
				<div class="col-md-12">
				<?php
				foreach ($getPersonnelIssuanceISNO as $row){ $isno = $row->isno;$personnel_name = $row->personnel_name; }?>
					<div class="row-header">
						<h1 class="page-title">Issue Equipment to <?php
						$PersonnelName=explode ("-",$personnel_name);
						 $Mname=$PersonnelName[2];
						 echo $PersonnelName[0].", ".$PersonnelName[1]." ".$Mname[0]."."; 
						 ?></h1>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<button type="button" data-toggle="modal" data-target="#addEquipmentModal" class="btn btn-primary">Add Equipment</button>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="col-md-1">No.</th>
										<th>Particulars</th>
										<th>In Stock</th>
										<th>Issued</th>
										<th>Received</th>
										<th class="col-md-1">Issue</th>
										<th class="col-md-1">Remove</th>
									</tr>
								</thead>
								<tbody>
								
								<?php 
								$count_item = count($getPersonnelIssuanceItemData );
								
								$i = 1;
								foreach ($getPersonnelIssuanceItemData as $row){ 
								if ($row->issued == 0){ ?> 
										<tr>
									<?php }else { ?>
										<tr class="success">
									<?php } ?>
										<th class="col-md-1" scope="row"><?= $i++; ?></th>
										<td><?= $row->particulars; ?></td>
										<td>
										<?php
										  foreach ($getUpdatedStock as $row1){
											if ($row->EI_No == $row1->EI_No){echo $row1->Stock;}else{}
										  }
										?>
										
										</td>
										<td><?= $row->issued." ".$row->unit; ?></td>
										<td><?php
											if (date('F d , Y',strtotime($row->date_received))== "January 01 , 1970"){
											echo "";}else{
											echo date('m/d/Y',strtotime($row->date_received));} ?></td>
										
										<?php if ($row->issued == 0){ ?>
											<td class="col-md-1"><button type="button" data-toggle="modal" data-target="#issueAddModal<?= $row->iino; ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Issue</span></button></td>
											<td class="col-md-1"><button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#<?=$row->iino;?>removeIssuedEquipmentModal"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></button></td>
										<?php }else{ ?> 
											<td class="col-md-1"><button type="button" data-toggle="modal" data-target="#issueEditModal<?= $row->iino; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> <span class="sr-only">Issue</span></button></td>
											<td class="col-md-1"><button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?=$row->iino;?>removeIssuedEquipmentModal"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i> <span class="sr-only">Remove</span></button></td>
										<?php }?>
										
										
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
						
						<div class="panel-footer">
						<?php if ($count_item <= 0){}else{ ?>
							<div class="row">
								
								<div class="col-md-6">
									<button type="button" data-toggle="modal" data-target="#removeModal" class="btn btn-danger">Remove All</button>
								</div>
								
								
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo base_url();?>ppeims/update_issuance/<?= $isno;?>" class="btn btn-default">Back</a>
				</div>
			</div>
		</section>
	</div>
</div>

<?php foreach ($getPersonnelIssuanceItemData as $row) : ?>
<div class="modal fade" id="<?=$row->iino;?>removeIssuedEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Remove Equipment</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to remove <strong><?=$row->particulars;?></strong>?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a type="button" href="<?php echo base_url();?>ppeims/delete_issuance_personnel_item/<?= $LastSId; ?>/<?= $row->issued;?>/<?= $row->EI_No;?>/<?=$row->iino;?>" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
	
<div class="modal fade" id="addEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add/Select Equipment</h4>
			</div>
			<div class="modal-body">
				<p>Select the equipment you want to issue in this personnel.</p>
				<div class="panel panel-default">
					<div class="table-responsive max-height-300">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="col-md-1">Select</th>
									<th>Particulars</th>
									<th>In Stock</th>
								</tr>
							</thead>
							<tbody>
							<?php echo form_open("ppeims/addItemIssued"); ?>
									
									<input type="hidden" value="add-ui" name="access">
									<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
							<?php foreach ($getEquipment as $row){ ?>	
								<tr>
									<td>
									<?php if ($row->Stock == 0){ }else{ ?> <input type="checkbox" name="particulars[]" 
									value="<?= $row->Particulars."-".$row->Stock."-".$row->Unit."-".$row->EI_No; ?>"
									> <?php } ?>
									
									</td>
									<td><?= $row->Particulars; ?></td>
									<td>
										<?php if ($row->Stock == 0){?> <span class="label label-danger">Out Of Stock</span> <?php }else{echo $row->Stock." ".$row->Unit;}?>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php 
					$data = [
						'class' => "btn btn-primary pull-right",
						'title' => 'Add Personnel',
						'type' => 'submit'
					];
					echo form_button($data, 'Add');
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>

<?php foreach ($getPersonnelIssuanceItemData as $row) : ?>
<div class="modal fade" id="issueEditModal<?= $row->iino; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit <?= $row->particulars; ?></h4>
			</div>
			<div class="modal-body">
				<?php echo form_open("ppeims/UpdateItemIssued"); ?>
									
									<input type="hidden" value="add-ui" name="access">
									<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
									<input type="hidden" value="<?= $row->iino; ?>" name="iino">
									<input type="hidden" value="<?= $row->EI_No; ?>" name="EI_No">
									<input type="hidden" value="<?= $row->issued; ?>" name="old_issued">
					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input type="number" class="form-control" name="issued" placeholder="0" min="0" max="<?= $row->in_stock; ?>" value="<?= $row->issued;?>" required>
					</div>
					<div class="form-group">
						<label for="">Received</label>
						<input type="date" name="date_received" class="form-control" value="<?=$row->date_received; ?>" required>
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php 
					$data = [
						'class' => "btn btn-success pull-right",
						'title' => 'Add Personnel',
						'type' => 'submit'
					];
					echo form_button($data, 'Save');
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="issueAddModal<?= $row->iino; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Issue <?= $row->particulars; ?></h4>
			</div>
			<div class="modal-body">
				<?php echo form_open("ppeims/UpdateItemIssued"); ?>
									
									<input type="hidden" value="add-ui" name="access">
									<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
									<input type="hidden" value="<?= $row->iino; ?>" name="iino">
									<input type="hidden" value="<?= $row->EI_No; ?>" name="EI_No">
									<input type="hidden" value="0" name="old_issued">
					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input type="number" class="form-control" name="issued" placeholder="0" min="0" max="<?= $row->in_stock; ?>" value="0" required>
					</div>
					<div class="form-group">
						<label for="">Received</label>
						<input type="date" name="date_received" class="form-control" required>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php 
					$data = [
						'class' => "btn btn-primary pull-right",
						'title' => 'Add Personnel',
						'type' => 'submit'
					];
					echo form_button($data, 'Save');
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
	
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Remove Equipment</h4>
			</div>
			<div class="modal-body">
			<?php echo form_open("ppeims/delete_issuance_item"); ?>
			<input type="hidden" value="<?= $LastSId; ?>" name="LastSId">
				<?php 
					foreach ($getPersonnelIssuanceItemData as $row){
				?>
				<input type="hidden" name="item_issued[]" 
									value="<?= $row->issued."-".$row->EI_No; ?>">
				<?php } ?>
				<p>Are you sure you want to remove all added equipment? </p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<?php 
					$data = [
						'class' => "btn btn-danger pull-right",
						'title' => 'Remove All',
						'type' => 'submit'
					];
					echo form_button($data, 'Delete');
					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>


<?php 
include 'include/footer.php';