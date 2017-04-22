<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">

	<style>
		body {
			background-color: #e1e1e1;
			padding-top: 50px;
		}
		.print-form-header {
			display: none;
		}
		@media print {
			/*.container {
				display: none;
			}*/
			.panel-heading,
			.panel-footer {
				display: none;
			}
			.print-form-header {
				display: block;
				margin-bottom: 40px;
				width: 500px;
				margin-left: auto;
				margin-right: auto;
			}
			.container {
				width: 100%;
			}
			.print-form-header img {
				display: block;
				margin-right: 15px;
				float: left;
			}
			.print-form-header h4 {
				display: block;
				/*padding-top: 20px;*/
				float: left;
				font-size: 20px;
			}
		}
	</style>
</head>

<div class="container">
		<div class="row print-form-header clearfix">
			<!-- <div class="col-md-10 col-md-offset-1"> -->
				<!-- <div class="row"> -->
					<!-- <div class="col-md-2"> -->
						<img src="<?php echo base_url(); ?>images/logo.png">
					<!-- </div> -->
					<!-- <div class="col-md-10"> -->
						<h4>
							NATIONAL POWER CORPORATION <br>
							AGUS 6/7 HYDROELECTRIC PLANT COMPLEX <br>
							MINDANAO GENERATION
						</h4>
						<!-- <p>AGUS 6/7 HYDROELECTRIC PLANT COMPLEX</p>
						<p>MINDANAO GENERATION</p> -->
					<!-- </div> -->
				<!-- </div> -->
			<!-- </div> -->
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-8">
								<h4>Report Preview</h4>
							</div>
							<div class="col-md-4 text-right">
								<a href="#" onclick="window.print();" role="button" class="btn btn-info"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print Report</a>
							</div>
						</div>
					</div>
					<div class="table-responsive max-height-350">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="col-md-1">No.</th>
												<th>Particulars</th>
												<th>In Stock</th>
												<th class="col-md-4">Remarks</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
										foreach ($getInventoryReport as $row){
										?>
										
												<tr>
												<th class="col-md-1" scope="row"><?= $i++;?></th>
												<td><?= $row->Particular;?></td>
												<td><?= $row->In_Stock;?></td>
												<td><?= $row->Remarks;?></td>
											
											</tr>
										<?php }?>
										</tbody>
									</table>
								</div>
					<div class="panel-footer">
						<div class="row">
							
							<div class="col-md-12 text-right">
								<a href="<?php echo base_url();?>ppeims/Inventory_Report" class="btn btn-primary">Done</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
include 'include/footer.php'; ?>