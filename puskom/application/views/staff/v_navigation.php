<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><i class="fa fa-laptop"></i></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><i class="fa fa-laptop"></i> <b>PUSKOM</b></span>
  </a>
    
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url().'assets/dist/img/noavatar.png';?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url().'assets/dist/img/noavatar.png';?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $this->session->userdata('nama');?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url().'staff/showProfile';?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url().'login/logout';?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
       <!--  <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url().'assets/dist/img/noavatar.png';?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama');?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigation</li>
      <li><a href="<?php echo base_url().'staff/index'; ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?php echo base_url().'staff/showMahasiswa'; ?>"><i class="fa fa-users"></i> <span>Mahasiswa</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-calendar"></i> <span>Jadwal</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="<?php echo base_url().'staff/tambahJadwal'; ?>"><i class="fa fa-circle-o"></i> Tambah Jadwal</a></li>
          <li><a href="<?php echo base_url().'staff/viewJadwal'; ?>"><i class="fa fa-circle-o"></i> Lihat Jadwal</a></li>
        </ul>
      </li>
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Peserta</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="<?php echo base_url().'staff/inputPeserta'; ?>"><i class="fa fa-circle-o"></i> Tambah Peserta</a></li>
          <li><a href="<?php echo base_url().'staff/viewPeserta'; ?>"><i class="fa fa-circle-o"></i> Lihat Peserta</a></li>
        </ul>
      </li> -->
      <li><a href="<?php echo base_url().'staff/viewNilai'; ?>"><i class="fa fa-book"></i> <span>Nilai</span></a></li>
      <li class="header">Sinkron Data</li>
      <li class="treeview">
        <a href="<?php echo base_url().'staff/index'; ?>">
          <i class="fa fa-refresh"></i> <span>Sync</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="<?php echo base_url().'staff/viewFakultas'; ?>"><i class="fa fa-circle-o"></i> Fakultas</a></li>
          <li><a href="<?php echo base_url().'staff/viewProdi'; ?>"><i class="fa fa-circle-o"></i> Program Studi</a></li>
          <li><a href="<?php echo base_url().'staff/viewMahasiswa'; ?>"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>