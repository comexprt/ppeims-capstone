<?php include 'include/header.php'; ?>

<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Print Report</h4>
					</div>
					<div class="panel-body">
						<p>Are you sure you want to print this report?</p>
					</div>
					<div class="panel-footer text-right">
						<a href="<?php echo base_url();?>ppeims/Inventory_Report" class="btn btn-default">Cancel</a>
						<a href="#" class="btn btn-primary">Print</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
include 'include/footer.php'; ?>