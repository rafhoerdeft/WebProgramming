

    <div class="slim-navbar">
      <div class="container">
        <ul class="nav">
          <!-- Menu 1 -->
          <li class="nav-item <?php if ($id_nav==1) { echo 'active';}  ?> ">
            <a class="nav-link" href="<?php echo base_url(); ?>admin">
              <i class="icon ion-ios-home-outline"></i>
              <span>Home</span>
            </a>
            <!-- <div class="sub-item">
              <ul>
                <li><a href="index.html">Dashboard 01</a></li>
                <li><a href="index2.html">Dashboard 02</a></li>
                <li><a href="index3.html">Dashboard 03</a></li>
                <li><a href="index4.html">Dashboard 04</a></li>
                <li><a href="index5.html">Dashboard 05</a></li>
              </ul>
            </div> --><!-- sub-item -->
          </li>
          <!-- Menu 2 -->
          <li class="nav-item with-sub <?php if ($id_nav==2) { echo 'active';}  ?> ">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-book-outline"></i>
              <span>Perpustakaan</span>
            </a>
            <div class="sub-item">
              <ul>
                <!-- <li class="sub-with-sub">
                  <a href="#">Perpustakaan</a>
                  <ul> -->
                    <li><a href="<?php echo base_url(); ?>admin/perpusAnggotaAll">Data Statistik Anggota</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/perpusBuku">Data Statistik Buku</a></li>
                  <!-- </ul>
                </li>
                <li class="sub-with-sub">
                  <a href="#">Fakultas</a>
                  <ul>
                    <li><a href="page-signin.html">Signin Simple</a></li>
                    <li><a href="page-signin2.html">Signin Split</a></li>
                  </ul>
                </li>
                <li class="sub-with-sub">
                  <a href="#">Biro Kampus</a>
                  <ul>
                    <li><a href="page-signup.html">Signup Simple</a></li>
                    <li><a href="page-signup2.html">Signup Split</a></li>
                  </ul>
                </li>
                <li class="sub-with-sub">
                  <a href="#">Lain-Lain</a>
                  <ul>
                     <li><a href="page-signup.html">Signup Simple</a></li>
                    <li><a href="page-signup2.html">Signup Split</a></li>
                  </ul>
                </li> -->
              </ul>
            </div><!-- dropdown-menu -->
          </li>
          <!-- Menu 3 -->
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-people-outline"></i>
              <span>Mahasiswa</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="#">Fakultas Ekonomi</a></li>
                <li><a href="#">Fakultas Hukum</a></li>
                <li><a href="#">Fakultas Agama Islam</a></li>
                <li><a href="#">Fakultas Keguruan & Ilmu Pendidikan</a></li>
                <li><a href="#">Fakultas Teknik</a></li>
                <li><a href="#">Fakultas Ilmu Kesehatan</a></li>
                <li><a href="#">Fakultas Psikologi & Humaniora</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>
          <!-- Menu 4 -->
          <li class="nav-item with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-filing-outline"></i>
              <span>Biro Kampus</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="#">Biro 1</a></li>
                <li><a href="#">Biro 2</a></li>
                <li><a href="#">Biro 3</a></li>
                <li><a href="#">Biro 4</a></li>
                <li><a href="#">Biro 5</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>
          <!-- Menu 5 -->
         <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-folder-outline"></i>
              <span>Program Studi</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="#">Fakultas Ekonomi</a></li>
                <li><a href="#">Fakultas Hukum</a></li>
                <li><a href="#">Fakultas Agama Islam</a></li>
                <li><a href="#">Fakultas Keguruan & Ilmu Pendidikan</a></li>
                <li><a href="#">Fakultas Teknik</a></li>
                <li><a href="#">Fakultas Ilmu Kesehatan</a></li>
                <li><a href="#">Fakultas Psikologi & Humaniora</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>
          <!-- Menu 6 -->
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon ion-ios-analytics-outline"></i>
              <span>Lain-Lain</span>
            </a>
          </li>
        </ul>
      </div><!-- container -->
    </div><!-- slim-navbar -->