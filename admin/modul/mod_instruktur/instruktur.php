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

		  				<p><input type="button" class="btn btn-primary" value="Tambah Instruktur" onclick="window.location.href='?module=instruktur&act=add'"></p>

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
			$query = "SELECT * FROM siswa WHERE nis='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<section class="content-header">
				<h1>
					Edit Siswa
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
		      				<h3 class="box-title">Form Siswa</h3>
		    			</div>

	          			<form method="POST" action="<?php echo $aksi .'?module=siswa&act=update'; ?>" enctype="multipart/form-data">
	          				<input type="hidden" name="id" value="<?php echo $r['nis']; ?>">
							<div class="box-body">
							<div class="form-group">
								<label for="exampleInputNis">Nomor Induk Siswa</label>
								<input type="text" name="nis" class="form-control" id="nis" placeholder="Nomor Induk Siswa" value="<?php echo $r['nis']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputNama">Nama Siswa</label>
								<input type="text" name="nama_siswa" class="form-control" value="<?php echo $r['nama_siswa']; ?>" id="nama_siswa" placeholder="Nama Siswa">
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
								<label for="exampleInputNokwi">Nomor Kwitansi</label>
								<input type="text" name="nokwi" value="<?php echo $r['nokwi']; ?>" class="form-control" id="nokwi" placeholder="Nomor Kwitansi">
							</div>

							<div class="form-group">
								<label for="exampleInputDaftar">Tanggal Daftar</label>
								<div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <?php 
									$tgldaftar		= date('Y-m-d', strtotime($r['tgldaftar']));
				                  ?>
				                  <input type="date" name="tgldaftar" class="form-control pull-right" value="<?php echo $tgldaftar; ?>" id="tgldaftar" placeholder="Tanggal Daftar">
				                </div>

							</div>

							<div class="form-group">
								<label for="ProgramStudi">Program Studi</label>
								<select class="form-control" name="kode_program" id="kode_program">
									<?php 
									$query = "SELECT * FROM program_studi ORDER BY nama_program";
									$p = mysqli_query($con, $query);
									

									while($w=mysqli_fetch_array($p)){
										if($r['kode_program']==$w['kode_program']) {

											echo "<option value='$w[kode_program]' selected>$w[nama_program]</option>";
											}
											else {
											echo "<option value='$w[kode_program]'>$w[nama_program]</option>";
										}
									} 

									?>
								</select>
							</div>
							
							<div class="form-group">
								<label for="exampleInputAngkatan">Angkatan</label>
								<?php 
								$get_thn=substr("$r[angkatan]",0,4);
								$thn_sekarang=date("Y");
								combotgl(1970,$thn_sekarang,'angkatan',$get_thn);
								?>
							</div>

	  						<div class="form-group">
								<label for="gambar">Foto Siswa</label><br>
								<a href="../img_siswa/<?php echo $r['foto']; ?>">
								  <img src="../img_siswa/<?php echo $r['foto']; ?>" width=250 class="rounded">
								</a>
							</div>  

	  						<div class="form-group">
								<label for="exampleFormControlFile1">Ganti Foto Siswa</label>
								<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
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
								<label for="AsalSekolah">Asal Sekolah</label>
								<input type="text" name="asalsekolah" value="<?php echo $r['asalsekolah']; ?>" class="form-control" id="asalsekolah" placeholder="Asal Sekolah">
							</div>						

							<div class="form-group">
								<label for="exampleInputThlulus">Tahun Lulus</label>
								<?php 
								$get_thn=substr("$r[thnlulus]",0,4);
								$thn_sekarang=date("Y");
								combotgl(1970,$thn_sekarang,'thnlulus',$get_thn);
								?>
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

  	case "search" : ?>
  		<section class="content-header">
			<h1>
				Cari Data Siswa
			</h1>
			<ol class="breadcrumb">
				<li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Cari Siswa</li>
			</ol>
		</section>
	    	
	    <section class="content">
			<div class="row">
				<div class="col-md-12">
		  			<div class="box box-primary">
		    			<div class="box-header with-border">
		      				<h3 class="box-title">Pilih Kategori Pencarian</h3>
		    			</div>

		    			<form method="post" action="?module=siswa" autocomplete="off">
		    			<div class="box-body">
		    				<div class="form-group">
			    				<div class="input-group">
	                        		<span class="input-group-addon">
	                          			<input type="checkbox" name="nisCat">
	                        		</span>
	                    			<input type="text" class="form-control pencarian" name="nis" placeholder="Nomor Induk Siswa" id="textbox">
	                  			</div>
	                  		</div>
	                  		<div class="form-group">
	                  			<div class="input-group">
	                        		<span class="input-group-addon">
	                          			<input type="checkbox" name="nama_siswaCat">
	                        		</span>
	                    			<input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa">
	                  			</div>
	                  		</div>

	                  		<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
	                          			<input type="checkbox" name="kode_programCat">
	                        		</span>
									<select class="form-control" name="kode_program" id="kode_program">
										<option value="" selected>Pilih Program Studi</option>
										<?php
										$query = "SELECT * FROM program_studi ORDER BY kode_program";
										$hasil = mysqli_query($con, $query);
										$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
										foreach ($data as $a) :
										?>
										<option value="<?php echo $a['kode_program']; ?>"><?php echo $a['nama_program']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>	
							</div>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
	                          			<input type="checkbox" name="angkatanCat">
	                        		</span>
									<select name="angkatan" class="form-control">
										<option value="" selected>Pilih Angkatan</option>
										<?php
										for ($a=1990; $a<=$thn_sekarang;$a++){
											echo "<option value='$a'>$a</option>";
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
	                          			<input type="checkbox" name="jekelCat">
	                        		</span>
									<select class="form-control" name="jekel" id="jekel">
										<option value="" selected>Pilih Jenis Kelamin</option>
										<option value="Pria">Pria</option>
										<option value="Wanita">Wanita</option>
									</select>
								</div>	
							</div>

							<div class="box-footer">
								<input type="submit" name="submit" class="btn btn-primary" value="Cari Siswa">
							</div>
						</div>
						</form>
		    		</div>
		    	</div>
		    </div>
		</section>

		 <!-- Trigger the modal with a button -->
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				     <button type="button" class="close" data-dismiss="modal">&times;</button>
				     <h4 class="modal-title">DATA SISWA</h4>
				  </div>
				  <div class="modal-body">
				     <table id="example" class="table table-bordered">
				        <thead>
				           <tr>
				              <th>NIS</th>
				              <th>Nama Siswa</th>
				           </tr>
				        </thead>
				        <tbody>
				        	<?php
		  				    $query  = "SELECT nis,nama_siswa FROM siswa ORDER BY nis ASC";
					        $hasil 	= mysqli_query($con, $query);
					        $datacari  	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
					        foreach($datacari as $dc) : 
		  					?>
					           <tr id="data" onClick="masuk(this,'<?php echo $dc['nis']; ?>')" href="javascript:void(0)">
					              <td><a id="data" onClick="masuk(this,'<?php echo $dc['nis']; ?>')" href="javascript:void(0)"><?php echo $dc['nis']; ?></a></td>
					              <td><?php echo $dc['nama_siswa']; ?></td>
					           </tr>
				       		<?php endforeach; ?>
				        </tbody>
				     </table>
				  </div>
				  <div class="modal-footer">
				     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>
			</div>
		</div>
  	<?php break;
	}
}
?>