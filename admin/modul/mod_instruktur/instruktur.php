<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_instruktur/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<section class="content-header">
			<h1>
				Instruktur
			</h1>
			<ol class="breadcrumb">
				<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Instruktur</li>
			</ol>
		</section>

        <section class="content">
      		<div class="row">
        		<div class="col-xs-12">
          			<div class="box box-primary">
            			<div class="box-header">
              				<h3 class="box-title">Data Instruktur</h3>
            			</div>
            			<div class="box-body">

		      			<?php
		      			$query  = "SELECT * FROM instruktur  ORDER BY kdinstruktur";
				        $hasil 	= mysqli_query($con, $query);
				        $data  	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		  				?>

		  				<p><a class="btn btn-primary" href="?module=instruktur&act=add">Tambah Instruktur</a></p>

		  				<div class="responsive">
	                    <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Kd Instruktur</th>
		                    <th>Nama Instruktur</th>
		                    <th>Status</th>
		                    <th>Email</th>
		                    <th>No. Telpon</th>
		                 	<th>Jenis Kelamin</th>
		                    <th>Aksi</th>
		                  </tr>
		                </thead>
		                <tfoot>
		                  <tr>
		                    <th>No</th>
		                    <th>Kd Instruktur</th>
		                    <th>Nama Instruktur</th>
		                    <th>Status</th>
		                    <th>Email</th>
		                    <th>No. Telpon</th>
		                 	<th>Jenis Kelamin</th>
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
								<td><?php echo $r['kdinstruktur']; ?></td>
								<td><?php echo $r['nama']; ?></td>
								<td><?php echo $r['status']; ?></td>
								<td><?php echo $r['email']; ?></td>
								<td><?php echo $r['notelp']; ?></td>
								<td><?php echo $r['jekel']; ?></td>
								<td>
									<center>
										<a class="btn btn-warning" href="?module=instruktur&act=edit&id=<?php echo $r['kdinstruktur'];?>">Edit</a>
										<a class="btn btn-danger" href="<?php echo $aksi .'?module=instruktur&act=delete&id=' . $r['kdinstruktur'];?>">Hapus</a>
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
		</div>
	</section>
     <?php break;

    case "add" : ?>
	    <section class="content-header">
	      <h1>
	        Tambah Instruktur
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	        <li class="active">Form Tambah Data</li>
	      </ol>
	    </section>
	    <section class="content">
			<div class="row">
				<div class="col-md-12">
		  			<div class="box box-primary">
		    			<div class="box-header with-border">
		      				<h3 class="box-title">Form Instruktur</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi .'?module=instruktur&act=input'; ?>" enctype="multipart/form-data">
							<div class="box-body">
							<div class="form-group">
								<label for="exampleInputNis">Kode Instruktur</label>
								<input type="text" name="kdinstruktur" class="form-control" id="nis" placeholder="Kode Instruktur">
							</div>
							<div class="form-group">
								<label for="exampleInputNama">Nama Instruktur</label>
								<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Instruktur">
							</div>
							<div class="form-group">
								<label for="exampleInputPass">Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail">Alamat Email</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="Alamat Email">
							</div>

							<div class="form-group">
								<label for="exampleInputTitle">Alamat Instruktur</label>
								<textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
							</div>

							<div class="form-group">
								<label for="exampleInputTplhr">Tempat Lahir</label>
								<input type="text" name="tplhr" class="form-control" id="tplhr" placeholder="Tempat Lahir">
							</div>

							<div class="form-group">
								<label for="exampleInputTglLahir">Tanggal Lahir</label>
								<div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="date" name="tglhr" class="form-control pull-right" id="tglhr" placeholder="Tanggal Lahir">
				                </div>
							</div>

							<div class="form-group">
								<label for="jekel">Jenis Kelamin</label>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="jekel" id="Radio1" value="Pria" checked>
									<label class="form-check-label" for="Radio1">Pria</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="jekel" id="Radio2" value="Wanita">
									<label class="form-check-label" for="Radio2">Wanita</label>
								</div>
							</div>

							<div class="form-group">
								<label for="agama">Agama</label>
								<select class="form-control" name="agama" id="agama">
									<option value="" selected="">Pilih Agama</option>
									<option value="Islam">Islam</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Kristen Katholik">Kristen Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputTelpon">Nomor Telepon</label>
								<input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telepon">
							</div>						


							<div class="form-group">
								<label for="exampleInputTplhr">Pendidikan Terakhir</label>
								<input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Pendidikan Terakhir">
							</div>

							<div class="form-group">
								<label for="exampleInputTplhr">Jabatan</label>
								<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
							</div>

							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" name="status" id="status">
									<option value="" selected="">Pilih Status</option>
									<option value="Instruktur Tetap">Instruktur Tetap</option>
									<option value="Instruktur Freelance">Instruktur Freelance</option>
								</select>
							</div>


							<div class="form-group">
								<label for="exampleInputTitle">Spesial Mengajar</label>
								<textarea name="spesialmengajar" class="form-control" id="spesialmengajar" rows="3"></textarea>
							</div>

							
							<div class="form-group">
								<label for="exampleFormControlFile1">Foto Instruktur</label>
								<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
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
			$query = "SELECT * FROM instruktur WHERE kdinstruktur='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<section class="content-header">
				<h1>
					Edit Instruktur
				</h1>
				<ol class="breadcrumb">
					<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active">Form Edit Data</li>
				</ol>
			</section>
	    	
	    	<section class="content">
			<div class="row">
				<div class="col-md-12">
		  			<div class="box box-primary">
		    			<div class="box-header with-border">
		      				<h3 class="box-title">Form Instruktur</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi .'?module=instruktur&act=update'; ?>" enctype="multipart/form-data">
	          				<input type="hidden" name="id" value="<?php echo $r['kdinstruktur']; ?>">
							<div class="box-body">
							<div class="form-group">
								<label for="exampleInputKdInstruktur">Kode Instruktur</label>
								<input type="text" name="kdinstruktur" class="form-control" id="kdinstruktur" placeholder="Kode Instruktur" value="<?php echo $r['kdinstruktur']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputNama">Nama Instruktur</label>
								<input type="text" name="nama" class="form-control" value="<?php echo $r['nama']; ?>" id="nama" placeholder="Nama Instruktur">
							</div>
							<div class="form-group">
								<label for="exampleInputPass">Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail">Alamat Email</label>
								<input type="email" name="email" value="<?php echo $r['email']; ?>" class="form-control" id="email" placeholder="Alamat Email">
							</div>

							<div class="form-group">
								<label for="exampleInputTitle">Alamat Siswa</label>
								<textarea name="alamat" class="form-control" id="alamat" rows="3"><?php echo $r['alamat']; ?></textarea>
							</div>

							<div class="form-group">
								<label for="exampleInputTplhr">Tempat Lahir</label>
								<input type="text" name="tplhr" value="<?php echo $r['tplhr']; ?>" class="form-control" id="tplhr" placeholder="Tempat Lahir">
							</div>

							<div class="form-group">
								<label for="exampleInputDaftar">Tanggal Lahir</label>
								<div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <?php 
									$tglhr		= date('Y-m-d', strtotime($r['tglhr']));
				                  ?>
				                  <input type="date" name="tglhr" class="form-control pull-right" value="<?php echo $tglhr; ?>" id="tglhr" placeholder="Tanggal Lahir">
				                </div>

							</div>

							<div class="form-group">
								<label for="jekel">Jenis Kelamin</label>
								<?php if ($r['jekel']=='Pria') { ?> 
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="jekel" id="Radio1" value="Pria" checked>
									<label class="form-check-label" for="Radio1">Pria</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="jekel" id="Radio2" value="Wanita">
									<label class="form-check-label" for="Radio2">Wanita</label>
								</div>
								<?php 
								}
								else {
								?>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="jekel" id="Radio1" value="Pria">
									<label class="form-check-label" for="Radio1">Pria</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="jekel" id="Radio2" value="Wanita" checked>
									<label class="form-check-label" for="Radio2">Wanita</label>
								</div>
							<?php } ?>
							</div>

							<div class="form-group">
								<label for="agama">Agama</label>
								<select class="form-control" name="agama" id="agama">
									<?php if ($r['agama']=='Islam') { ?>
									<option value="Islam" selected>Islam</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Kristen Katholik">Kristen Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
									<?php 
									}
									elseif ($r['agama']=='Kristen Protestan') { ?>
									<option value="Islam">Islam</option>
									<option value="Kristen Protestan" selected>Kristen Protestan</option>
									<option value="Kristen Katholik">Kristen Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
									<?php }
									elseif ($r['agama']=='Kristen katholik') { ?>
									<option value="Islam">Islam</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Kristen Katholik" selected>Kristen Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
									<?php }
									elseif ($r['agama']=='Hindu') { ?>
									<option value="Islam">Islam</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Kristen Katholik">Kristen Katholik</option>
									<option value="Hindu" selected>Hindu</option>
									<option value="Budha">Budha</option>
									<?php }
									elseif ($r['agama']=='Budha') { ?>
									<option value="Islam">Islam</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Kristen Katholik">Kristen Katholik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha" selected>Budha</option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputTelpon">Nomor Telepon</label>
								<input type="text" name="notelp" value="<?php echo $r['notelp']; ?>" class="form-control" id="notelp" placeholder="Nomor Telepon">
							</div>						
							
							<div class="form-group">
								<label for="exampleInputTplhr">Pendidikan Terakhir</label>
								<input type="text" name="pendidikan" class="form-control" id="pendidikan" value="<?php echo $r['pendidikan']; ?>" placeholder="Pendidikan Terakhir">
							</div>

							<div class="form-group">
								<label for="exampleInputTplhr">Jabatan</label>
								<input type="text" name="jabatan" value="<?php echo $r['jabatan']; ?>" class="form-control" id="jabatan" placeholder="Jabatan">
							</div>

							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" name="status" id="status">
									<?php if ($r['status']=='Instruktur Tetap') { ?>
										<option value="Instruktur Tetap" selected>Instruktur Tetap</option>
										<option value="Instruktur Freelance">Instruktur Freelance</option>
									<?php }
									 else { ?>
										<option value="Instruktur Tetap">Instruktur Tetap</option>
										<option value="Instruktur Freelance" selected>Instruktur Freelance</option>	
									<?php } ?>
								</select>
							</div>


							<div class="form-group">
								<label for="exampleInputTitle">Spesial Mengajar</label>
								<textarea name="spesialmengajar" class="form-control" id="spesialmengajar" rows="3"><?php echo $r['spesialmengajar']; ?></textarea>
							</div>

							<div class="form-group">
								<label for="gambar">Foto Siswa</label><br>
								<a href="../img_instruktur/<?php echo $r['foto']; ?>">
								  <img src="../img_instruktur/<?php echo $r['foto']; ?>" width=250 class="rounded">
								</a>
							</div>  

	  						<div class="form-group">
								<label for="exampleFormControlFile1">Ganti Foto Instruktur</label>
								<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
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