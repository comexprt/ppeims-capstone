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
					<li><a href="<?php echo base_url();?>ppeims/issuance/">Issuance</a></li>
					<li>/</li>
					<li>
						<?php
							if ($LastSId < 10){
								echo "00".$LastSId;
							}
							elseif ($LastSId < 100 && $LastSId >= 10){
								echo "0".$LastSId;
							} else {
								echo $LastSId; 
							}
						?>
					</li>
				</ul>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname;?> <spa class="caret"></span></a>
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
							<div class="col-md-8">
								<h1 class="page-title">Issuance
								<?php
									if ($LastSId < 10){
									echo "00".$LastSId;
								}
								elseif ($LastSId < 100 && $LastSId >= 10){
									echo "0".$LastSId;
								}else {echo $LastSId; }
								?>
								
								</h1>
							</div>
							<div class="col-md-4 text-right">
								<a href="<?php echo base_url();?>ppeims/Print_view_issuance/<?=$LastSId;?>/<?=$LastSId1;?>" class="btn btn-primary">Print Preview</a>
								<?php if ($LastSId1 == 3): ?>
									<a href="<?php echo base_url();?>ppeims/update_issuance/<?=$LastSId;?>" class="btn btn-success"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
								<?php elseif ($LastSId1 == 2): ?>
									<a href="<?php echo base_url();?>ppeims/update_issuance/<?=$LastSId;?>" class="btn btn-warning"><i class="glyphicon glyphicon-share-alt" aria-hidden="true"></i> Resume</a>
								<?php else: ?>
									
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel-group panel-group-issuance" id="accordion" role="tablist" aria-multiselectable="true">
					<?php foreach ($getIssuanceDistinctItem as $row){ ?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$row->EI_No;?>" aria-expanded="true" aria-controls="collapseOne">
									<span><?=$row->particulars;?></span>
									<span><i class="glyphicon glyphicon-menu-down" aria-hidden="true"></i></span>
								</a>
							</div>
							<div id="collapse<?=$row->EI_No;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="col-md-1">No.</th>
												<th>Personnel</th>
												<th>Work Center</th>
												<th class="col-md-1">Issued</th>
												<th class="col-md-2">Received</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 1; 
										foreach ($getIssuanceDistinctItemInfo as $row1) { 
										if ($row->EI_No != $row1->EI_No){}else{
										?>
											<tr>
												<th scope="row"><?=$i++;?></th>
												<td><?php
												$PersonnelName=explode ("-",$row1->personnel_name);
												 $Mname=$PersonnelName[2];
												 echo $PersonnelName[0].", ".$PersonnelName[1].". ".$Mname[0]."."; 														
												 ?></td>
												<td><?=$row1->work_center;?></td>
												<td><?=$row1->issued;?></td>
												<td>
													<?php if($row1->date_received != '0000-00-00'): ?>
														<?php echo $row1->date_received; ?>
													<?php endif; ?>
												</td>
											</tr>
										<?php }} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo base_url();?>ppeims/issuance/" role="button" class="btn btn-default">Back</a>
				</div>
			</div>
		</section>
	</div>
</div>
	
<?php 
include 'include/footer.php';