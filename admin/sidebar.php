  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../img_admin/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="media.php?module=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-university"></i> <span>Master Akademik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="media.php?module=programstudi">Program Studi</a></li>
            <li><a href="media.php?module=kelas">Kelas</a></li>
            <li><a href="media.php?module=matakuliah">Mata Kuliah</a></li>
            <li><a href="media.php?module=instruktur">Instruktur</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa  fa-folder"></i> <span>Master Siswa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="media.php?module=siswa">Semua Siswa</a></li>
            <li><a href="media.php?module=siswa&act=search">Cari Siswa</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-archive"></i> <span>Daftar Siswa Perkelas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Cari Siswa Perkelas</a></li>
            <li><a href="#">Entry Siswa Perkelas</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-archive"></i> <span>Daftar Kurikulum</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Entry Kurikulum</a></li>
            <li><a href="#">Cari Kurikulum</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-graduation-cap"></i> <span>Daftar Alumni</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Semua Alumni</a></li>
            <li><a href="#">Cari Alumni</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-briefcase"></i> <span>Daftar Nilai</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Entry Nilai</a></li>
            <li><a href="#">Kartu Hasil Studi (KHS)</a></li>
            <li><a href="#">Cetak Transkrip Nilai</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="media.php?module=users">User</a></li>
            <li><a href="#">menu</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-globe"></i> <span>Info Kursus</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Pengumuman</a></li>
          </ul>
        </li>

        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>