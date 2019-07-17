<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_kelas/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<section class="content-header">
			<h1>
				Kelas
			</h1>
			<ol class="breadcrumb">
				<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Kelas</li>
			</ol>
		</section>

        <section class="content">
      		<div class="row">
        		<div class="col-xs-12">
          			<div class="box box-primary">
            			<div class="box-header">
              				<h3 class="box-title">Data Kelas</h3>
            			</div>
            			<div class="box-body">

		      			<?php
		  				    $query  = "SELECT * FROM kelas ORDER BY kode_kelas DESC";
					        $hasil 	= mysqli_query($con, $query);
					        $data  	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		  				?>

		  				<p><input type="button" class="btn btn-primary" value="Tambah Kelas" onclick="window.location.href='?module=kelas&act=add'"></p>

	                    <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Kode Kelas</th>
		                    <th>Nama Kelas</th>
		                    <th>Ruang Kelas</th>
		                    <th>Aksi</th>
		                  </tr>
		                </thead>
		                <tfoot>
		                  <tr>
		                    <th>No</th>
		                    <th>Kode Kelas</th>
		                    <th>Nama Kelas</th>
		                    <th>Ruang Kelas</th>
		                    <th>Aksi</th>
		                  </tr>
		                </tfoot>
		                <tbody>
		                	<?php
	                		$no = 1;
								foreach($data as $r) : 
	  						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $r['kode_kelas']; ?></td>
								<td><?php echo $r['nama_kelas']; ?></td>
								<td><?php echo $r['ruang']; ?></td>
								<td>
									<center>
										<a class="btn btn-warning" href="?module=kelas&act=edit&id=<?php echo $r['kode_kelas'];?>">Edit</a>
										<a class="btn btn-danger" href="<?php echo $aksi .'?module=kelas&act=delete&id=' . $r['kode_kelas'];?>">Hapus</a>
									</center>
								</td>
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
	    <section class="content-header">
	      <h1>
	        Tambah Kelas
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	        <li class="active">Form Tambah Data</li>
	      </ol>
	    </section>
	    <section class="content">
			<div class="row">
				<div class="col-md-12">
		  			<div class="box box-primary">
		    			<div class="box-header with-border">
		      				<h3 class="box-title">Form Kelas</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi .'?module=kelas&act=input'; ?>">
							<div class="box-body">
							<div class="form-group">
								<label for="exampleInputTitle">Kode Kelas</label>
								<input type="text" name="kode_kelas" class="form-control" id="kode_kelas" placeholder="Kode Kelas">
							</div>
							<div class="form-group">
								<label for="exampleInputTitle">Nama Kelas</label>
								<input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Nama Kelas">
							</div>
							<div class="form-group">
								<label for="exampleInputTitle">Ruang Kelas</label>
								<input type="text" name="ruang" class="form-control" id="ruang" placeholder="Ruang Kelas">
							</div>
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<button type="button" class="btn btn-success" onclick="self.history.back()">Batal</button>
							</div>
						</div>
						</form>
		          	</div>
			    </div>
			</div>
		</section>

		<?php 
      	break;

      	case "edit" : ?>
        	<?php 
			$query = "SELECT * FROM kelas WHERE kode_kelas='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<section class="content-header">
				<h1>
					Edit Kelas
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active">Form Edit Data</li>
				</ol>
			</section>
	    	
	    	<section class="content">
			<div class="row">
				<div class="col-md-12">
		  			<div class="box box-primary">
		    			<div class="box-header with-border">
		      				<h3 class="box-title">Form Kelas</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi . '?module=kelas&act=update'; ?>">
	          				<div class="box-body">
	          				<input type="hidden" name="id" value="<?php echo $r['kode_kelas']; ?>">
							<div class="form-group">
								<label for="exampleInputKode">Kode Kelas</label>
								<input type="text" name="kode_kelas" value="<?php echo $r['kode_kelas']; ?>" class="form-control" id="title" placeholder="Kode Kelas">
							</div>
							<div class="form-group">
								<label for="exampleInputNama">Nama Kelas</label>
								<input type="text" name="nama_kelas" value="<?php echo $r['nama_kelas']; ?>" class="form-control" id="title" placeholder="Nama Kelas">
							</div>
							<div class="form-group">
								<label for="exampleInputKetua">Ruang Kelas</label>
								<input type="text" name="ruang" value="<?php echo $r['ruang']; ?>" class="form-control" id="title" placeholder="Ruang Kelas">
							</div>
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
								<button type="button" class="btn btn-success" onclick="self.history.back()">Batal</button>
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