<div class="sidebar">
	<div class="sidebar-logo">
		<a href="<?=base_url();?>"><h4>AGUS 6/7 PPE IMS</h4></a>
	</div>
	<div class="sidebar-user clearfix">
		<div class="sidebar-user-pic" style="background-image: url(<?php echo base_url();?>images/<?=$u_image;?>);"></div>
		<div class="sidebar-user-name">
			<span><?php echo $Fname." ".$Lname;?></span>
			<span><?php echo $Position;?></span>
		</div>
	</div>
	<div class="sidebar-nav">
		<ul>
			<li><a href="<?php echo base_url();?>">Dashboard</a></li>
			<li><a href="<?php echo base_url();?>ppeims/equipment">Equipment</a></li>
			<li><a href="<?php echo base_url();?>ppeims/personnel_group">Work Center</a></li>
			<li><a href="<?php echo base_url();?>ppeims/personnel">Personnel</a></li>
			<li><a href="<?php echo base_url();?>ppeims/batch_equipment">Equipment Batch</a></li>
			<li><a href="<?php echo base_url();?>ppeims/issuance">Equipment Issuance</a></li>
			<li><a href="<?php echo base_url();?>ppeims/Inventory_Report">Inventory Report</a></li>
			<li><a href="<?php echo base_url();?>ppeims/Graphs_Statistics_Pie">Graphs &amp; Statistics</a></li>
			<li><a href="<?php echo base_url();?>ppeims/manage_account">Account Settings</a></li>
		</ul>
	</div>
</div>