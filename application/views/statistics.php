<?php
include 'include/header.php';
include 'include/sidebar.php'; 
?>
<script src="<?php echo base_url();?>graph_js/amcharts.js"></script>
<script src="<?php echo base_url();?>graph_js/pie.js"></script>
<script src="<?php echo base_url();?>graph_js/export.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>graph_js/export.css" type="text/css" media="all" />
<script src="<?php echo base_url();?>graph_js/light.js"></script>
<style>
#chartdiv {
	width		: 100%;
	height		: 400px;
	font-size	: 11px;
}						
</style>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
   "type": "pie",
  "startDuration": 0,
   "theme": "light",
  "addClassNames": true,
  "legend":{
   	"position":"right",
    "marginRight":100,
    "autoMargins":false
  },
  "innerRadius": "30%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [
  <?php foreach ($getitemssummary as $row){ ?>
  {
    "Items": "<?php echo $row->Particulars;?>",
    "Stock": <?php echo $row->Stock;?>
  },
  <?php } ?>
  
  ],
  "valueField": "Stock",
  "titleField": "Items",
 
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);
}
</script>
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
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo base_url();?>ppeims/Graphs_Statistics_Pie" class="btn btn-primary">Summary</a>
							<a href="<?php echo base_url();?>ppeims/Graphs_Statistics_line" class="btn btn-default">Performance</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="chartdiv"></div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	
</body>
	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/Chart.bundle.min.js"></script>
</html>
