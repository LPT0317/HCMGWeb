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
		require_once 'core/product.php';
		require_once 'includes/config.php';
		$page = empty($_GET['page']) ? 1 : $_GET['page'];
		$row = 10;
		$start = $row * ($page - 1);
		$product = new Product($db);
		$count = $product->count()->fetchColumn();
		$count =ceil($count / $row);
		$result = $product->readPage($start, $row);
		$num = $result->rowCount();
		if($num > 0)
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
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
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
						'&page=' . $page .
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
	<?php
		for($i = 1; $i <= $count; $i++)
		{
			echo '<a href="index.php?page='
			. $i . '"';
			if($page == $i) echo 'class="active"';
			echo '>' . $i . '</a>';
		}
	?>
	<a href="#">&raquo;</a>
  </div>
</div>
	</section>
</div>