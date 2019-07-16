<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_programstudi/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<section class="content-header">
			<h1>
				Program Studi
			</h1>
			<ol class="breadcrumb">
				<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Program Studi</li>
			</ol>
		</section>

        <section class="content">
      		<div class="row">
        		<div class="col-xs-12">
          			<div class="box box-primary">
            			<div class="box-header">
              				<h3 class="box-title">Data Program Studi</h3>
            			</div>
            			<div class="box-body">

		      			<?php
		  				    $query  = "SELECT * FROM program_studi ORDER BY kode_program DESC";
					        $hasil 	= mysqli_query($con, $query);
					        $data  	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		  				?>

		  				<p><input type="button" class="btn btn-primary" value="Tambah Program Studi" onclick="window.location.href='?module=programstudi&act=add'"></p>

	                    <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Kode Program</th>
		                    <th>Nama Program</th>
		                    <th>Ketua Program</th>
		                    <th>Aksi</th>
		                  </tr>
		                </thead>
		                <tfoot>
		                  <tr>
		                    <th>No</th>
		                    <th>Kode Program</th>
		                    <th>Nama Program</th>
		                    <th>Ketua Program</th>
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
								<td><?php echo $r['kode_program']; ?></td>
								<td><?php echo $r['nama_program']; ?></td>
								<td><?php echo $r['ketua_program']; ?></td>
								<td>
									<center>
										<a class="btn btn-warning" href="?module=programstudi&act=edit&id=<?php echo $r['kode_program'];?>">Edit</a>
										<a class="btn btn-danger" href="<?php echo $aksi .'?module=programstudi&act=delete&id=' . $r['kode_program'];?>">Hapus</a>
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
	        Tambah Program Studi
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
		      				<h3 class="box-title">Form Program Studi</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi .'?module=programstudi&act=input'; ?>">
							<div class="box-body">
							<div class="form-group">
								<label for="exampleInputTitle">Kode Program Studi</label>
								<input type="text" name="kode_program" class="form-control" id="kode_program" placeholder="Kode Program Studi">
							</div>
							<div class="form-group">
								<label for="exampleInputTitle">Nama Program Studi</label>
								<input type="text" name="nama_program" class="form-control" id="nama_program" placeholder="Nama Program Studi">
							</div>
							<div class="form-group">
								<label for="exampleInputTitle">Ketua Program Studi</label>
								<input type="text" name="ketua_program" class="form-control" id="ketua_program" placeholder="Ketua Program Studi">
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
			$query = "SELECT * FROM program_studi WHERE kode_program='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<section class="content-header">
				<h1>
					Edit Program Studi
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
		      				<h3 class="box-title">Form Program Studi</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi . '?module=programstudi&act=update'; ?>">
	          				<div class="box-body">
	          				<input type="hidden" name="id" value="<?php echo $r['kode_program']; ?>">
							<div class="form-group">
								<label for="exampleInputKode">Kode Program Studi</label>
								<input type="text" name="kode_program" value="<?php echo $r['kode_program']; ?>" class="form-control" id="title" placeholder="Kode Program Studi">
							</div>
							<div class="form-group">
								<label for="exampleInputNama">Nama Program Studi</label>
								<input type="text" name="nama_program" value="<?php echo $r['nama_program']; ?>" class="form-control" id="title" placeholder="Nama Program Studi">
							</div>
							<div class="form-group">
								<label for="exampleInputKetua">Ketua Program Studi</label>
								<input type="text" name="ketua_program" value="<?php echo $r['ketua_program']; ?>" class="form-control" id="title" placeholder="Ketua Program Studi">
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