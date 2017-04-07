<?php
include 'include/header.php';
include 'include/sidebar.php';
include 'include/topbar.php';
?>

<div class="content">
	<div class="container-fluid">

		<section class="section">
			<div class="row">
				<div class="col-md-12">
					<div class="row-header">
						<div class="row">
							<div class="col-md-8">
								<h1 class="page-title">PPE Inventory <small>as of March 20, 2017</small></h1>
							</div>
							<div class="col-md-4 text-right">
								<a href="low-supply.html" class="btn btn-warning">Low Supplies <span class="badge">10</span></a>
								<a href="expired.html" class="btn btn-danger">Expired <span class="badge">5</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-4">
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
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Particulars</th>
										<th>In Stock</th>
										<th>Reserved</th>
										<th>Issued</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Hard Hat (Blue)</td>
										<td>14 pcs</td>
										<td>0 pcs</td>
										<td>0 pcs</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Hard Hat (Yellow)</td>
										<td>49 pcs</td>
										<td>0 pcs</td>
										<td>0 pcs</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Protective Eyewear</td>
										<td>15 pcs</td>
										<td>0 pcs</td>
										<td>0 pcs</td>
									</tr>
									<tr>
										<th scope="row">4</th>
										<td>Face Shield</td>
										<td>0 pcs</td>
										<td>0 pcs</td>
										<td>0 pcs</td>
									</tr>
									<tr>
										<th scope="row">5</th>
										<td>Safety Shoes</td>
										<td>0 pairs</td>
										<td>0 pairs</td>
										<td>0 pairs</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php include 'include/footer.php'; 
// EOF
