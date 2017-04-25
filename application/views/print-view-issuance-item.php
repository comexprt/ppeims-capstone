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
		.print-preview-header-top,
		.print-preview-footer {
			display: none;
		}
		.print-preview-header-bottom {
			margin-bottom: 20px;
		}
		.print-preview-header-bottom h4 {
			font-size: 22px;
			font-family: 'source_sans_probold';
		}
		@media print {
			@page {
				margin: 0;
			}
			body {
				font-family: sans-serif;
				padding-top: 0;
				margin: 40px 20px;
			}
			.panel-heading,
			.panel-footer {
				display: none;
			}
			.container {
				width: 100%;
			}
			.print-preview-header-top {
				position: relative;
				display: block;
				width: 100%;
				margin-bottom: 20px;
				padding-top: 10px;
			}
			.print-preview-header-top img {
				display: block;
				width: 64px;
				height: auto;
				position: absolute;
				top: 0;
				left: 12%;
			}
			.print-preview-header-top p {
				margin-bottom: 3px;
				font-size: 16px;
				line-height: 16px;
			}
			.print-preview-header-bottom h4 {
				font-size: 18px;
				margin-bottom: 5px;
			}
			.print-preview-footer {
				width: 100%;
				display: block;
			}
			.print-preview-footer-left,
			.print-preview-footer-right {
				width: 50%;
				float: left;
			}

			.print-preview-footer-left p,
			.print-preview-footer-right p {
				margin-bottom: 30px;
			}

			.print-preview-footer-name p:first-child {
				margin-bottom: 0;
				font-weight: 700;
				text-transform: uppercase;
			}
		}
	</style>
</head>


<div class="container">
	<div class="content">
		<div class="container-fluid">
			<section class="section">
				<div class="print-preview-header-top text-center">
					<img src="<?php echo base_url(); ?>images/logo.png">
					<p><small>NATIONAL POWER CORPORATION</small></p>
					<p>AGUS 6/7 HYDROELECTRIC PLANT COMPLEX</p>
					<p><small>MINDANAO GENERATION</small></p>
				</div>
				<div class="print-preview-header-bottom text-center">
					<h4>
						<?php if($LastSId < 10): ?>
							PERSONAL PROTECTIVE EQUIPMENT ISSUANCE <?php echo '00' . $LastSId; ?>
						<?php elseif($LastSId < 100 && $LastSId >= 10): ?>
							Issuance <?php echo '0' . $LastSId; ?>
						<?php else: ?>
							PERSONAL PROTECTIVE EQUIPMENT ISSUANCE <?php echo $LastSId; ?>
						<?php endif; ?>
					</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-8">
										<h4>Issuance Form Preview</h4>
									</div>
									<div class="col-md-4 text-right">
										<a href="#" role="button" class="btn btn-info printBtn"><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Print</a>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<th>No.</th>
										<th>Personnel</th>
										<th>Work Center</th>
										<th>Issued</th>
										<th>Received</th>
									</thead>
									<tbody>
									<?php foreach($getIssuanceDistinctItem as $row): ?>
										<tr>
											<th class="text-center" colspan="5">Issued <?php echo $row->particulars; ?></th>
										</tr>
										<?php 
											$i = 1;
											foreach($getIssuanceDistinctItemInfo as $row1): ?>
											<?php if($row->EI_No == $row1->EI_No): ?>
											<tr>
												<th scope="row"><?php echo $i++; ?></th>
												<td>
													<?php
														$PersonnelName=explode ("-",$row1->personnel_name);
														$Mname=$PersonnelName[2];
														echo $PersonnelName[0].", ".$PersonnelName[1].". ".$Mname[0]."."; 
													?>
												</td>
												<td><?php echo $row1->work_center; ?></td>
												<td><?php echo $row1->issued; ?></td>
												<td>
													<?php if($row1->date_received != '0000-00-00'): ?>
														<?php echo $row1->date_received; ?>
													<?php endif; ?>
												</td>
											</tr>
											<?php endif;
											endforeach; ?>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer text-right">
								<a href="<?php echo base_url(); ?>ppeims/issuance" class="btn btn-primary">Done</a>
							</div>
						</div>
					</div>
				</div>
				<div class="print-preview-footer">
					<div class="print-preview-footer-left">
						<p>Prepared by:</p>
						<div class="print-preview-footer-name">
							<p>RS LEMENCE</p>
							<p>Safety Officer, Agus 6/7 HEPC</p>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
	
<?php 
include 'include/footer.php';