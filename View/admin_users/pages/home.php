<div class="content-wrapper" style="min-height: 365px; background-color: rgb(227, 227, 242);">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Users</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="../../View/Admin_home">HCMG Admin</a></li>
						<li class="breadcrumb-item active">Users</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section>
        <!-- container -->
    <div class="container">

	<?php
	$action = isset($_GET['action']) ? $_GET['action'] : "";

	// if it was redirected from delete.php
	if($action=='deleted'){
	echo "<div class='alert alert-success'>Record was deleted.</div>";
	}
	// link to create record form
	echo "<a href='#' class='btn btn-primary m-b-1em'>New User</a>";
	echo "<br> <br>";

	// include database connection
	require_once 'api/read.php';

	//check if more than 0 record found
	if($num > 0)
	{
		//start table
		echo "<table>";

		//creating our table heading
		echo "<tr>
		<th>User ID</th>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Action</th>
		</tr>";
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
            extract($row);
			$user_item = array(
                'id' => $User_id,
                'name' => $User_name,
                'pass' => $User_password
            );
			// creating new table row per record
			echo '<tr>
			 <td>' . $user_item['id'] . '</td>
			 <td>' . $user_item['name'] . '</td>
			 <td>None</td>
			 <td>' . $user_item['pass'] . '</td>
			 <td>';
				
				 // we will use this links on next part of this post
				 echo "<a href='#' class='btn btn-primary m-r-1em'>Edit</a>";
			
				 // we will use this links on next part of this post
				 echo '<a onclick=\'deleteUser(' . $user_item['id'] .')\' class=\'btn btn-danger\'>Delete</a>';
			 echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}else
	{
		echo 'There are no user!';
	}
?>
    </section>
</div>
<script type='text/javascript'>
	function deleteUser(id)
	{
		if(confirm('Are you sure?'))
		{
			window.location = 'api/delete.php?id=' + id;
		}
	}
</script>