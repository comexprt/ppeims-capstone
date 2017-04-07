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
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
						<li class="active">Inventory</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="page-heading page">
						<h2 class="page-heading__title">Personal Protective Equipment Inventory <small>as of <?php echo date('F d , Y');?></small></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="margin-bottom-20">
						<a href="<?php echo base_url();?>ppeims/update_inventory" class="btn btn-primary">Update Inventory</a>
						<a href="<?php echo base_url();?>ppeims/inventory_transactions" class="btn btn-primary">Inventory Transactions</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading panel-heading--white clearfix">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="search-item" class="sr-only">Search particulars...</label>
										<div class="input-group">
											<input type="search" id="search-item" class="form-control" placeholder="Search particulars...">
											<span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> <span class="sr-only">Submit</span></button>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-8">
									<button type="button" aria-label="Print" data-toggle="tooltip" data-placement="top" title="Print List" class="btn btn-default pull-right"><i class="glyphicon glyphicon-print" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Particulars</th>
										<th>On Stock</th>
										<th>Issued</th>
										<th>Remarks</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($getEquipment as $row){ ?>
										<tr>
											<th scope="row"><?php echo $i++;?></th>
											<td><?php echo $row->Particulars;?></td>
											<td><?php echo $row->Stock." ".$row->Unit;?></td>
											<td><?php echo $row->Issued." ".$row->Unit;;?></td>
											<td><?php echo $row->Remarks;?></td>
										</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
						<!--div class="panel-footer">
							<div class="table-pagination">
								<ul class="pagination">
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
								</ul>
							</div>
						</div-->
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php 
include 'include/footer.php';

// EOF