<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>5000</h3>

              <p>Data Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
            <a href="media.php?module=siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>250</h3>

              <p>Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
            <a href="media.php?module=matakuliah" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Program Studi</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <a href="media.php?module=programstudi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>1500</h3>

              <p>Daftar Alumni</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="media.php?module=alumni" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
<!--       <div class="row">
  			<div class="col-xl-6 col-md-6 col-sm-12">
  		        <div class="card mb-3">
  		          <div class="card-header">
  		            <i class="fas fa-table"></i>
  		            User Info</div>
  		          	<div class="card-body">
  						<table class="table">
  							<tbody>
  								<tr>
  									<th>Full Name</th>
  									<th>:</th>
  									<td><?php echo $_SESSION['full_name']; ?></td>
  								</tr>
  								<tr>
  									<th>Username</th>
  									<th>:</th>
  									<td><?php echo $_SESSION['username']; ?></td>
  								</tr>
  								<tr>
  									<th>Email</th>
  									<th>:</th>
  									<td><?php echo $_SESSION['email']; ?></td>
  								</tr>
  								<tr>
  									<th>Level</th>
  									<th>:</th>
  									<td><?php echo $_SESSION['level']; ?></td>
  								</tr>
  							</tbody>
  						</table>
  					</div>
  				</div>
  			</div>				
  			<div class="col-xl-6 col-md-6 col-sm-12">
  				<div class="card mb-3">
  		          <div class="card-header">
  		            <i class="fas fa-table"></i>
  		            Other Info</div>
  		          	<div class="card-body">
  						<table class="table">
  							<tbody>
  								<tr>
  									<th>Last Login</th>
  									<th>:</th>
  									<td><?php echo date('d-m-Y'); ?></td>
  								</tr>
  								<tr>
  									<th>IP Address</th>
  									<th>:</th>
  									<td><?php echo $_SERVER["REMOTE_ADDR"]; ?></td>
  								</tr>
  								<tr>
  									<th>Server</th>
  									<th>:</th>
  									<td><?php echo $_SERVER['SERVER_NAME']; ?></td>
  								</tr>
  								<tr>
  									<th>Browser</th>
  									<th>:</th>
  									<td><?php echo $_SERVER["HTTP_USER_AGENT"]; ?></td>
  								</tr>
  							</tbody>
  						</table>
  					</div>
  				</div>
  			</div>
		  </div> -->
    </section>
<?php } ?>