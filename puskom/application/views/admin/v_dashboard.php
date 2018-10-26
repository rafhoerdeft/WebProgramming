<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-newspaper-o"></i> Dashboard
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
              <h3><?php echo $today->num_rows(); ?></h3>
              <p>Jadwal Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-calendar"></i>
          </div>
          <a href="#" class="small-box-footer today" data-id="<?php echo date('M');?>">Lihat Jadwal <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $thismonth->num_rows(); ?></h3>
              <p>Jadwal Bulan Ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="hidden" name="bulan" value="<?php echo date('M');?>">
            <a href="#" class="small-box-footer thismonth">Lihat Jadwal <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- MODAL Jadwal Hari Ini-->
        <form>
            <div class="modal fade" id="Modal_Today" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal Hari Ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Jadwal Nama</th>
                          <th>Jadwal Tanggal</th>
                          <th>Jadwal Waktu</th>
                          <th>Jadwal Ruang</th>
                          <th>Jadwal Keterangan</th>
                          <th>Penguji 1</th>
                          <th>Penguji 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          foreach ($today->result() as $data) { ?>
                          <tr>
                            <td><?php echo $data->jd_nama ?></td>
                            <td><?php echo $data->jd_tanggal ?></td>
                            <td><?php echo $data->jd_waktu ?></td>
                            <td><?php echo $data->jd_ruang ?></td>
                            <td><?php echo $data->jd_keterangan ?></td>
                            <td><?php echo $data->penguji_1 ?></td>
                            <td><?php echo $data->penguji_2 ?></td>
                          </tr> 
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!-- MODAL Jadwal Hari Ini-->

        <!-- MODAL Jadwal Bulan Ini-->
        <form>
            <div class="modal fade" id="Modal_ThisMonth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal Bulan Ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Jadwal Nama</th>
                          <th>Jadwal Tanggal</th>
                          <th>Jadwal Waktu</th>
                          <th>Jadwal Ruang</th>
                          <th>Jadwal Keterangan</th>
                          <th>Penguji 1</th>
                          <th>Penguji 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          foreach ($thismonth->result() as $data) { ?>
                          <tr>
                            <td><?php echo $data->jd_nama ?></td>
                            <td><?php echo $data->jd_tanggal ?></td>
                            <td><?php echo $data->jd_waktu ?></td>
                            <td><?php echo $data->jd_ruang ?></td>
                            <td><?php echo $data->jd_keterangan ?></td>
                            <td><?php echo $data->penguji_1 ?></td>
                            <td><?php echo $data->penguji_2 ?></td>
                          </tr> 
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!-- MODAL Jadwal Bulan Ini-->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->