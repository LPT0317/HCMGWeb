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
// include database connection

// link to create record form
echo "<a href='create.php' class='btn btn-primary m-b-1em'>New User</a>";

echo "<br> <br>";
//check if more than 0 record found

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


// creating new table row per record
echo "<tr>
 <td>Database</td>
 <td>Database</td>
 <td>Database</td>
 <td>Database</td>
 <td>";
    
     // we will use this links on next part of this post
     echo "<a href='update.php' class='btn btn-primary m-r-1em'>Edit</a>";

     // we will use this links on next part of this post
     echo "<a href='#' class='btn btn-danger'>Delete</a>";
 echo "</td>";
echo "</tr>";
echo "</table>";

?>

    </section>
</div>