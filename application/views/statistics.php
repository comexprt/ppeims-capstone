<?php
include 'include/header.php';
include 'include/sidebar.php'; 
?>
	<div class="main">
		<nav class="navbar navbar--blue navbar-static-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-left">
						<ul class="navbar-breadcrumbs list-inline">
							<li><a href="<?php echo base_url();?>ppeims">Dashboard</a></li>
							<li>/</li>
							<li>Graphs &amp; Statistics</li>
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
								<h1 class="page-title">Graphs &amp; Statistics</h1>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-3">
								<a href="<?php echo base_url();?>ppeims/Graphs_Statistics_Pie" class="btn btn-primary">Summary</a>
							</div>
							
							<div class="col-md-3">
								<a href="<?php echo base_url();?>ppeims/Graphs_Statistics_line" class="btn btn-default">Performance</a>
							
							</div>
						</div>
					</div>
					
					<div class="row">
						<center>
							<div class="panel-body" style="width:50%;">
								<canvas id="pieChart"></canvas>
							</div>
						</center>
					</div>
				</section>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/Chart.bundle.min.js"></script>
	<!-- <script src="<?php echo base_url();?>js/script.js"></script> -->
	<script>
		var pieChartElement = $('#pieChart');

		var data = {
			labels: [
				"Red",
				"Blue",
				"Yellow"
			],
			datasets: [
				{
					data: [300, 50, 100],
					backgroundColor: [
						"#FF6384",
						"#36A2EB",
						"#FFCE56"
					],
					hoverBackgroundColor: [
						"FF6384",
						"#36A2EB",
						"#FFCE56"
					]
				}]
		};

		var pieChart = new Chart(pieChartElement, {
			type: 'doughnut',
			data: data

		});
	</script>
</body>
