    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
           <li class="breadcrumb-item"><a href="#">Portofolio</a></li>
            <li class="breadcrumb-item"><a href="#">Perpustakaan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Statistik Anggota</li>
          </ol>
          <h6 class="slim-pagetitle">Statistik Anggota Perpustakaan</h6>
        </div><!-- slim-pageheader -->

        <!-- Alert Notification -->
        <div class="alert <?php echo $this->session->flashdata('alert'); ?>">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
          <?php 
              $alert = $this->session->flashdata('hasil');
              echo '<i>'.$alert.'</i>'; 
          ?>
        </div>

        <!-- Menu Pilihan -->
        <div class="section-wrapper bg-gray-200">
          <div class="row" style="margin-top: -20px; margin-bottom: -30px;">
            <div class="col-sm-6 col-md-3" id="button" >
                  <a href="perpusAnggotaAll"><button id="cetak" type="submit" class="btn btn-secondary btn-block mg-b-10"><i class="fa fa-bar-chart mg-r-5"></i> Semua Anggota</button></a>
            </div>
            <div class="col-sm-6 col-md-3" id="button" >
                  <a href="perpusAnggotaMhs"><button id="cetak" type="submit" class="btn btn-outline-secondary btn-block mg-b-10"><i class="fa fa-bar-chart mg-r-5"></i> Anggota Mahasiswa</button></a>
            </div>
          </div>
        </div>

        <!-- Content -->
        <div class="section-wrapper">
          <!-- <label class="section-title">Bar Chart</label> -->
          <!-- <p class="mg-b-20 mg-sm-b-40">Below is the basic bar chart example.</p> -->
          <!-- <div class="row" style="margin-bottom: 30px; "> -->
          <div class="row" style="margin-bottom: 30px; margin-top: -15px;">
              <!-- Select Tampilan -->
              <div class="col-lg-3">
                <select class="form-control" data-placeholder="Choose one" onchange="pilih()" id="select">
                  <option value="grafik">Tampil Grafik</option>
                  <option value="tabel">Tampil Tabel</option>
                </select>
              </div>

              <!-- Tombol Cetak -->
              <div class="col-sm-6 col-md-3" id="button-show" style="margin-bottom: -10px;">
                  <a href="cetakAnggotaAll" target="_blank"><button id="cetak" class="btn btn-primary btn-block mg-b-10"><i class="fa fa-print mg-r-5"></i> Cetak</button></a>
              </div>
          </div>
          
          <!-- <div class="row" id="coba">
            
          </div> -->
          
          <div class="row" id="grafik">
            <div class="col-xl-9" style="margin: auto;">
              <div class="bd pd-t-30 pd-b-20 pd-x-20" id="grafik_anggota">
                <!-- <canvas id="chartBarDataAnggota" height="200"></canvas> -->
              </div>
            </div><!-- col-6 -->
          </div><!-- row -->

          <div class="row" id="tabel">
            <div class="col-xl-7" style="margin: auto;">
                <table id="tbl-anggota" class="table table-bordered table-striped table-hover">
                  <thead class="thead-colored bg-primary">
                    
                  </thead>
                  <tbody>
                 
                  </tbody>
                </table>
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- section-wrapper -->

      </div><!-- container -->
    </div><!-- slim-mainpanel -->
