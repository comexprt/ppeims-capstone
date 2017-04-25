<?php
include 'include/header.php';
include 'include/sidebar.php'; 
?>
<script src="<?php echo base_url();?>graph_js/amcharts.js"></script>
<script src="<?php echo base_url();?>graph_js/serial.js"></script>
<script src="<?php echo base_url();?>graph_js/export.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>graph_js/export.css" type="text/css" media="all" />
<script src="<?php echo base_url();?>graph_js/light.js"></script>
<style>
#chartdiv {
	width		: 100%;
	height		: 400px;
	font-size	: 11px;
}

#chartdiv1 {
	width		: 100%;
	height		: 400px;
	font-size	: 11px;
}						
</style>

<script>
var chart = AmCharts.makeChart("chartdiv", {
	"type": "serial",
     "theme": "light",
	"categoryField": "year",
	"rotate": true,
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Issued:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.8,
			"title": "Issued",
			"type": "column",
			"valueField": "Issued"
		},
		{
			"balloonText": "Expenses:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		
		<?php foreach($getitemssummaryannual as $row){ ?>
		{
			"year": <?=$row->date_received;?>,
			
			"Issued": <?=$row->sum_issued;?>,
		
			
		},
	<?php } ?>
	],
 

});


var chart1 = AmCharts.makeChart("chartdiv1", {
	"type": "serial",
     "theme": "light",
	"categoryField": "year",
	"rotate": true,
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Issued:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.8,
			"title": "Issued",
			"type": "column",
			"valueField": "Issued"
		},
		{
			"balloonText": "Expenses:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		
		<?php foreach($getbatchsummaryannual as $row){ ?>
		{
			"year": <?=$row->date_delivered;?>,
			
			"Issued": <?=$row->sum_batch;?>,
		
			
		},
	<?php } ?>
	],
 

});
</script>
	
	<div class="main">
		<nav class="navbar navbar--blue navbar-static-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-left">
						<ul class="navbar-breadcrumbs list-inline">
							<li><a href="index.html">Dashboard</a></li>
							<li>/</li>
							<li>Graphs &amp; Statistics</li>
						</ul>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lemence <spa class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Log Out</a></li>
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
								<h1 class="page-title">Graphs & Statistics</h1>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-3">
								<a  href="<?php echo base_url();?>ppeims/Graphs_Statistics_Pie" class="btn btn-default">Summary</a>
							</div>
							
							<div class="col-md-3">
								<a  href="<?php echo base_url();?>ppeims/Graphs_Statistics_line" class="btn btn-primary">Performance</a>
							
							</div>
						</div>
					</div>
					
					<div class="row">
							<h3> Summary of Batch Annually</h3>
							<center>
								<div class="panel-body">
									<div id="chartdiv1"></div>	
								</div>
							</center>
					</div>
					<div class="row">
							<h3> Summary of Issuance Annually</h3>
							<center>
								<div class="panel-body">
									<div id="chartdiv"></div>	
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
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</div>