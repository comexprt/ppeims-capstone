<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head>
<body class="page-dashboard">

	<div class="sidebar">
		<div class="sidebar-logo">
			<!-- <a href="#"><img src="images/db-logo.png" alt=""></a> -->
			<!--style="background-image: url(<?php //echo base_url();?>images/user.png);"-->
		</div>
		<div class="sidebar-user">
			<div class="sidebar-user-pic"></div>
			<div class="sidebar-user-name">
				<span><?php echo $Fname." ".$Lname;?></span>
				<span><?php echo $Position;?></span>
			</div>
		</div>
		<div class="sidebar-nav">
		
			<ul>
				<li class="current"><a href="<?php echo base_url();?>">Dashboard</a></li>
				<li><a href="<?php echo base_url();?>ppeims/equipment">Equipment</a></li>
				<li><a href="<?php echo base_url();?>ppeims/inventory">Inventory</a></li>
				<li><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
				<li><a href="<?php echo base_url();?>ppeims/issuance">Issuance</a></li>
			</ul>
		</div>
	</div>

	<div class="main">
		<nav class="navbar navbar-top">
			 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			 	<ul class="nav navbar-nav navbar-right">
			 		<li class="dropdown">
			 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $Lname;?> <span class="caret"></span></a>
			 			<ul class="dropdown-menu">
			 				<li><a href="<?php echo base_url();?>ppeims/manage_account">Account</a></li>
			 				<li><a href="<?php echo base_url();?>ppeims/emp_logout">Log Out</a></li>
			 			</ul>
			 		</li>
			 	</ul>
			 </div>
		</nav>



		<div class="content">
			<div class="container-fluid">
			</div>
		</div>
		
	</div>

	<script src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
</body>
</html>