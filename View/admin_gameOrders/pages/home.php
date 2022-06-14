<div class="content-wrapper" style="min-height: 365px; background-color: rgb(227, 227, 242);">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Game Orders</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="../../View/Admin_home">HCMG Admin</a></li>
						<li class="breadcrumb-item active">Game Orders</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
	<?php
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			require_once 'api/read.php';
			if($suc)
			{
				echo
					'<table class="table">
						<thead class="thead-primary">
						<tr>
							<th>Game ID</th>
							<th>Image</th>
							<th>Name</th>
							<th>Price</th>
							<th>Produce Studio</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>';
				for($i = 0; $i < 4; $i++)
				{
					extract($productInfo[$i]);
					$productData = array(
						'id' => $Product_id,
						'img' => $Background_image,
						'name' => $Name,
						'desc' => $Description,
						'type' => $Type,
						'studio' => $Produce_studio,
						'price' => $Price
					);
					echo
					'<tr class="alert" role="alert">
						<td>'
						. $productData['id'] .
						'</td>
						<td>
							<div class="img" style="background-image: url(../../'
							. $productData['img'] .
							');"></div>
						</td>
						<td>
						<div class="email" style="text-align: left;">
							<span>'
							. $productData['name'] .
							'</span>
							<span>'
							. $productData['desc'] .
							'</span>
						</div>
						</td>
						<td>$'
						. $productData['price'] .
						'</td>
						<td>'
						. $productData['studio'] .
						'</td>
						<td>'
						. $productData['type'] .
						'</td>
						<td>							
							<a href=\'details01.php?id='
							. $productData['id'] .
							'\' class=\'btn btn-danger\' style=\'text-decoration: none;\'>Details</a>							
						</td>
					</tr>';
				}
				echo
						'</tbody>
					</table>';
			}
		?>
		<div class="center">
  <div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#" class="active">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
  </div>
</div>
	</section>
</div>