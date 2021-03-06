<?php 
include 'include/header.php';
include 'include/sidebar.php';
include 'include/topbar.php';
?>
		
<div class="content">
	<div class="container-fluid">

		<section class="section">
		<div class="row">
			<div class="col-md-12">
		<?php if($message){
			  if (strpos($message, 'Completed') !== false || strpos($message, 'Saved') !== false){
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
						<li><a href="index.html">Dashboard</a></li>
						<li class="active">Personal Protective Equipment Batch</li>
					</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<h3>Equipment Batch</h3>
					</div>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th>No.</th>
									<th>Batch No.</th>
									<th>Date Saved</th>
									<th>Prepared By</th>
								
									<th>Edit</th>
									<th>View</th>
								</tr>
							</thead>
							<tbody>
							<?php $i=1;
							foreach ($getEquipmentListDraft as $row){?>
								<tr>
									<th scope="row"><?= $i++;?></th>
									<td><?= $row->Tr_No;?></td>
									<td><?= date('F d , Y',strtotime($row->Tr_Date));?></td>
									<td><?= $row->Pb;?></td>
									<td class="col-md-1">
											<a href="<?php echo base_url();?>ppeims/update_inventory/<?php echo $row->Tr_No;?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> <span class="sr-only">Adjust</span></a>												</td>
										<td class="col-md-1">
											<a href="#" class="btn btn-default btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-trash"></i> <span class="sr-only">View</span></a>
										</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4>Batch No. 003</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th>No.</th>
								<th>Particulars</th>
								<th>Added Stock</th>
								<th>Subtracted Stock</th>
								<th>Total Stock</th>
								<th>Reorder Point</th>
								<th>Expiration Date</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Hard Hat (Yellow)</td>
								<td>30 pcs</td>
								<td>0 pcs</td>
								<td>79 pcs</td>
								<td>10</td>
								<td>01-01-2018</td>
								<td></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Protective Eyewear</td>
								<td>20 pcs</td>
								<td>0 pcs</td>
								<td>35 pcs</td>
								<td>10</td>
								<td>01-01-2018</td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Face Shield</td>
								<td>50 pcs</td>
								<td>0 pcs</td>
								<td>50 pcs</td>
								<td>10</td>
								<td>01-01-2018</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
							</tr>
						</tbody>
					</table>
					<p>Date: 04-20-2017</p>
					<p>Prepared By: G. Manlimos</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print</button>
				</div>
			</div>
		</div>

<?php 
include 'include/footer.php';

// EOF