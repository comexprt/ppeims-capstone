<?php 
require_once 'include/header.php';
include 'include/sidebar.php';
include 'include/navbar-top.php'; ?>
<div class="content">
			<div class="container-fluid">

				<section class="section">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header">
								<h2>Personal Protective Equipment Inventory <small>as of March 20, 2017</small></h2>
							</div>
						</div>
					</div>
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
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th>No.</th>
											<th>Particulars</th>
											<th>On Stock</th>
											<th>Issued</th>
											<th>Remarks</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Hard Hat (Blue)</td>
											<td>14 pcs</td>
											<td>0 pcs</td>
											<td></td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Hard Hat (Yellow)</td>
											<td>49 pcs</td>
											<td>0 pcs</td>
											<td></td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Protective Eyewear</td>
											<td>15 pcs</td>
											<td>85 pcs</td>
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>Face Shield</td>
											<td>0 pcs</td>
											<td>0 pcs</td>
											<td>Lorem ipsum dolor sit amet, consectetur.</td>
										</tr>
										<tr>
											<th scope="row">5</th>
											<td>Safety Shoes</td>
											<td>0 pairs</td>
											<td>110 pairs</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Overview of Low Supply Personal Protective Equipment</h4>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Particulars</th>
											<th>On Stock</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Face Shield</td>
											<td>0 pcs</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Safety Shoes</td>
											<td>0 pcs</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>	
				</section>

			</div>
		</div>
	</div>
<?php require_once 'include/footer.php';