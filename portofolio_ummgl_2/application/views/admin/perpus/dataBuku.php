    
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Portofolio</a></li>
            <li class="breadcrumb-item"><a href="#">Perpustakaan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Statistik Buku</li>
          </ol>
          <h6 class="slim-pagetitle">Statistik Buku Perpustakaan</h6>
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
        <div id="alert"></div>

        <!-- Content -->
        <div class="section-wrapper">
          <!-- <label class="section-title">Bar Chart</label> -->
          <!-- <p class="mg-b-20 mg-sm-b-40">Below is the basic bar chart example.</p> -->
          <div class="row" style="margin-bottom: 30px; ">
            <div class="col-lg-3" style="float: left;">
              <select class="form-control" data-placeholder="Choose one" onchange="pilih()" id="select">
                <!-- <option label="Choose one"></option> -->
                <option value="grafik">Tampil Grafik</option>
                <option value="tabel">Tampil Tabel</option>
              </select>
            </div>
            
            <!-- Tombol Cetak -->
            <div class="col-sm-6 col-md-3" id="button-show" style="margin-bottom: -10px;">
                <!-- <?php 
                    // echo anchor('admin/cetakBuku','<button id="cetak" class="btn btn-primary btn-block mg-b-10"><i class="fa fa-print mg-r-5"></i> Cetak</button>'); 
                ?> -->
                 <a href="cetakBuku" target="_blank"><button id="cetak" class="btn btn-primary btn-block mg-b-10"><i class="fa fa-print mg-r-5"></i> Cetak</button></a>
            </div>
          </div>

          <div class="row" id="grafik">
            <div class="col-xl-8" style="margin: auto;">
              <div class="bd pd-t-30 pd-b-20 pd-x-20" id="grafik_buku">
                <!-- <canvas id="chartBarDataBuku" height="200"></canvas> -->
              </div>
            </div><!-- col-6 -->
          </div><!-- row -->

          <div class="row" id="tabel">
            <div class="col-xl-7" style="margin: auto;">
                <table id="tbl-buku" class="table table-bordered table-striped table-hover">
                  <thead class="thead-colored bg-primary">
                    <!-- <tr>
                      <th width="75px"><center>No.</center></th>
                      <th><center>Kategori Buku</center></th>
                      <th><center>Jumlah</center></th>             
                    </tr> -->
                  </thead>
                  <tbody>
                  <!-- <?php
                    // $no = 1;
                    // foreach ($Buku as $row){ 
                    //   if($row->jenis_buku!='Image' AND $row->jenis_buku!='Video' AND $row->jenis_buku!='Sirkulasi'){
                  ?>
                      <tr>
                        <td align='center'><?php //echo $no++;?></td>
                        <td><?php //echo $row->jenis_buku;?></td>
                        <td align="center"><?php //echo $row->jml;?></td>
                      </tr>
                  <?php //}} ?> -->
                  </tbody>
                </table>
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- section-wrapper -->

      </div><!-- container -->
    </div><!-- slim-mainpanel -->

