<div class="sidebar">
	<div class="sidebar-logo">
		<!-- <a href="#"><img src="images/db-logo.png" alt=""></a> -->
	
	</div>
	<div class="sidebar-user">
		<div class="sidebar-user-pic" style="background-image: url(<?php echo base_url();?>images/Penguins.jpg);"></div>
		<div class="sidebar-user-name">
			<span><?php echo $Fname." ".$Lname;?></span>
			<span><?php echo $Position;?></span>
		</div>
	</div>
	<div class="sidebar-nav">
		<ul>
			<li><a href="<?php echo base_url();?>">Dashboard</a></li>
			<li><a href="<?php echo base_url();?>ppeims/equipment">Equipment</a></li>
			<li><a href="<?php echo base_url();?>ppeims/Equipment_Batch">Equipment Batch</a></li>
			<li><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
			<li><a href="<?php echo base_url();?>ppeims/issuance">Equipment Issuance</a></li>
		</ul>
	</div>
</div>