<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_users/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<section class="content-header">
			<h1>
				All Users
			</h1>
			<ol class="breadcrumb">
				<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">All Users</li>
			</ol>
		</section>

        <section class="content">
      		<div class="row">
        		<div class="col-xs-12">
          			<div class="box">
            			<div class="box-header">
              				<h3 class="box-title">All Users Table</h3>
            			</div>
            			<div class="box-body">
		      			<?php
		  				if ($_SESSION['level']=='admin'){
					        $query  = "SELECT * FROM users ORDER BY username";
					        $hasil 	= mysqli_query($con, $query);
					        $users 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
					        echo "<p><input type='button' class='btn btn-primary' value='Add User' onclick=window.location.href='?module=users&act=add'></p>";
				      	}
				      	else{
					        $query  = "SELECT * FROM users WHERE username='$_SESSION[username]'";
					        $hasil = mysqli_query($con, $query);
					        $users 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
				      	}
		  				?>
              			<table id="example1" class="table table-bordered table-striped">
			                <thead>
			                  <tr>
			                    <th>No</th>
			                    <th>Username</th>
			                    <th>Full Name</th>
			                    <th>Email</th>
			                    <th>Level</th>
			                    <th>Block</th>
			                    <th>Action</th>
			                  </tr>
			                </thead>
			             	<tfoot>
			                  <tr>
			                    <th>No</th>
			                    <th>Username</th>
			                    <th>Full Name</th>
			                    <th>Email</th>
			                    <th>Level</th>
			                    <th>Block</th>
			                    <th>Action</th>
			                  </tr>
			                </tfoot>
			                <tbody>
			                	<?php
		                		$no = 1;
									foreach($users as $user) : 
		  						?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $user['username']; ?></td>
									<td><?php echo $user['full_name']; ?></td>
									<td><?php echo $user['email']; ?></td>
									<td><?php echo $user['level']; ?></td>
									<td><?php echo $user['block']; ?></td>
									<td><center><a class="btn btn-warning" href="?module=users&act=edit&id=<?php echo $user['username'];?>">Edit User</a></center></td>
								</tr>
								<?php
								$no++;
								endforeach;
								?>
			                </tbody>
				        </table>
	    				</div>
        			</div>
				</div>
			</div>
		</section>
     <?php break;

        case "add" : ?>
    	<?php if ($_SESSION['level']=='admin'){ ?>
		    <section class="content-header">
		      <h1>
		        Add User
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Add Form</li>
		      </ol>
		    </section>
		    <section class="content">
				<div class="row">
					<div class="col-md-12">
			  			<div class="box box-primary">
			    			<div class="box-header with-border">
			      				<h3 class="box-title">Form User</h3>
			    			</div>

							<form method="POST" action="<?php echo $aksi .'?module=users&act=input'; ?>">
							<div class="box-body">
      			
								<div class="form-group">
									<label for="exampleInputUsername">Username</label>
									<input type="text" name="username" class="form-control" id="username"placeholder="Username">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="exampleInputFullname">Full Name</label>
									<input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail">Email</label>
									<input type="email" name="email" class="form-control" id="email" placeholder="Email">
								</div>
								<div class="box-footer">
									<button type="submit" class="btn btn-primary">Save</button>
									<button type="button" class="btn btn-success" onclick="self.history.back()">Cancel</button>
								</div>
							</div>
							</form>
      					</div>
        			</div>
    			</div>
			</section>

		<?php 
		}
      	else {
        	echo "<p>Anda tidak berhak mengakses halaman ini.</p>";
      	}
      	break;

      	case "edit" : 
			$query = "SELECT * FROM users WHERE username='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
		    <section class="content-header">
		      <h1>
		        Add User
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Add Form</li>
		      </ol>
		    </section>
		    <section class="content">
				<div class="row">
					<div class="col-md-12">
			  			<div class="box box-primary">
			    			<div class="box-header with-border">
			      				<h3 class="box-title">Form User</h3>
			    			</div>
          					<form method="POST" action="<?php echo $aksi . '?module=users&act=update'; ?>">
          					<div class="box-body">
          			
	          				<input type="hidden" name="id" value="<?php echo $r['username']; ?>">
							<div class="form-group">
								<label for="exampleInputUsername">Username **)</label>
								<input type="text" name="username" value="<?php echo $r['username']; ?>" class="form-control" id="username"placeholder="Username" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword">Password *)</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputFullname">Full Name</label>
								<input type="text" name="full_name" value="<?php echo $r['full_name']; ?>" class="form-control" id="full_name" placeholder="Full Name">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail">Email</label>
								<input type="email" name="email" value="<?php echo $r['email']; ?>" class="form-control" id="email" placeholder="Email">
							</div>

							<?php
							if ($_SESSION['level']=='admin'){ 
								if ($r['block']=='No'){
								?>
								<div class="form-group">
									<label for="block">Block User</label>
									<div class="form-check form-check">
										<input class="form-check-input" type="radio" name="block" id="Radio1" value="Yes">
										<label class="form-check-label" for="Radio1">Yes</label>
									</div>
									<div class="form-check form-check">
										<input class="form-check-input" type="radio" name="block" id="Radio2" value="No" checked>
										<label class="form-check-label" for="Radio2">No</label>
									</div>
								</div>
								<?php }
								else { ?>
									<div class="form-group">
										<label for="block">Block User</label>
										<div class="form-check form-check">
											<input class="form-check-input" type="radio" name="block" id="Radio1" value="Yes" checked>
											<label class="form-check-label" for="Radio1">Yes</label>
										</div>
										<div class="form-check form-check">
											<input class="form-check-input" type="radio" name="block" id="Radio2" value="No">
											<label class="form-check-label" for="Radio2">No</label>
										</div>
									</div>
								<?php } 
							} ?>


							<div class='form-group'>
								<p>*) Apabila password tidak diubah, dikosongkan saja.<br />
	                                **) Username tidak bisa diubah.</p>
	                        </div>
	                        <div class="box-footer">
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="button" class="btn btn-success" onclick="self.history.back()">Cancel</button>
							</div>
						</div>
						</form>
          			</div>
	        	</div>
	       </div>
	    </section>

		<?php 
      	break;
	}
}
?>

	