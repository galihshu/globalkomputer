<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_matakuliah/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<section class="content-header">
			<h1>
				Mata Kuliah
			</h1>
			<ol class="breadcrumb">
				<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Mata Kuliah</li>
			</ol>
		</section>

        <section class="content">
      		<div class="row">
        		<div class="col-xs-12">
          			<div class="box box-primary">
            			<div class="box-header">
              				<h3 class="box-title">Data Mata Kuliah</h3>
            			</div>
            			<div class="box-body">

		      			<?php
		  				    $query  = "SELECT * FROM matakuliah ORDER BY kode_mk DESC";
					        $hasil 	= mysqli_query($con, $query);
					        $data  	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		  				?>

		  				<p><input type="button" class="btn btn-primary" value="Tambah Mata Kuliah" onclick="window.location.href='?module=matakuliah&act=add'"></p>

	                    <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Kode Mata Kuliah</th>
		                    <th>Nama Mata Kuliah</th>
		                    <th>Jumlah SKS</th>
		                    <th>Jenis Mata Kuliah</th>
		                    <th>Jumlah Pertemuan</th>
		                    <th>Aksi</th>
		                  </tr>
		                </thead>
		                <tfoot>
		                  <tr>
		                    <th>No</th>
		                    <th>Kode Mata Kuliah</th>
		                    <th>Nama Mata Kuliah</th>
		                    <th>Jumlah SKS</th>
		                    <th>Jenis Mata Kuliah</th>
		                    <th>Jumlah Pertemuan</th>
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
								<td><?php echo $r['kode_mk']; ?></td>
								<td><?php echo $r['nama_mk']; ?></td>
								<td><?php echo $r['sks']; ?></td>
								<td><?php echo $r['jenis']; ?></td>
								<td><?php echo $r['jumlah_pertemuan']; ?></td>
								<td>
									<center>
										<a class="btn btn-warning" href="?module=matakuliah&act=edit&id=<?php echo $r['kode_mk'];?>">Edit</a>
										<a class="btn btn-danger" href="<?php echo $aksi .'?module=matakuliah&act=delete&id=' . $r['kode_mk'];?>">Hapus</a>
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
	        Tambah Mata Kuliah
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
		      				<h3 class="box-title">Form Mata Kuliah</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi .'?module=matakuliah&act=input'; ?>">
							<div class="box-body">
							<div class="form-group">
								<label for="exampleInputTitle">Kode Mata Kuliah</label>
								<input type="text" name="kode_mk" class="form-control" id="kode_mk" placeholder="Kode Mata Kuliah">
							</div>
							<div class="form-group">
								<label for="exampleInputTitle">Nama Mata Kuliah</label>
								<input type="text" name="nama_mk" class="form-control" id="nama_mk" placeholder="Nama Mata Kuliah">
							</div>
							<div class="form-group">
								<label for="exampleInputTitle">Jumlah SKS</label>
								<input type="text" name="sks" class="form-control" id="sks" placeholder="Jumlah SKS">
							</div>

							<div class="form-group">
								<label for="jenis">Jenis Mata Kuliah</label>
								<select class="form-control" name="jenis" id="jenis">
									<option value="" selected>Pilih Jenis Mata Kuliah</option>
									<option value="Praktek">Praktek</option>
									<option value="Teori">Teori</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputTitle">Jumlah Pertemuan</label>
								<input type="text" name="jumlah_pertemuan" class="form-control" id="jumlah_pertemuan" placeholder="Jumlah Pertemuan">
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
			$query = "SELECT * FROM matakuliah WHERE kode_mk='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<section class="content-header">
				<h1>
					Edit Mata Kuliah
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
		      				<h3 class="box-title">Form Mata Kuliah</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi . '?module=matakuliah&act=update'; ?>">
	          				<div class="box-body">
	          				<input type="hidden" name="id" value="<?php echo $r['kode_mk']; ?>">
							<div class="form-group">
								<label for="exampleInputKode">Kode Mata Kuliah</label>
								<input type="text" name="kode_mk" value="<?php echo $r['kode_mk']; ?>" class="form-control" id="kode_mk" placeholder="Kode Mata Kuliah">
							</div>
							<div class="form-group">
								<label for="exampleInputNama">Nama Mata Kuliah</label>
								<input type="text" name="nama_mk" value="<?php echo $r['nama_mk']; ?>" class="form-control" id="nama_mk" placeholder="Nama Mata Kuliah">
							</div>
							<div class="form-group">
								<label for="exampleInputKetua">Jumlah SKS</label>
								<input type="text" name="sks" value="<?php echo $r['sks']; ?>" class="form-control" id="sks" placeholder="Jumlah SKS">
							</div>
							<div class="form-group">
								<label for="exampleInputKetua">Jenis Mata Kuliah</label>
								<select class="form-control" name="jenis" id="jenis">
								<?php if($r['jenis']=="Praktek") { ?>
									<option value="Praktek" selected>Praktek</option>
									<option value="Teori">Teori</option>
								<?php }
								else { ?>
									<option value="Praktek">Praktek</option>
									<option value="Teori" selected>Teori</option>
								<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputKetua">Jumlah Pertemuan</label>
								<input type="text" name="jumlah_pertemuan" value="<?php echo $r['jumlah_pertemuan']; ?>" class="form-control" id="jumlah_pertemuan" placeholder="Jumlah Pertemuan">
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