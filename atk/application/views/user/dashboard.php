<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
            <!-- <?php 
            //date_default_timezone_set('Asia/Jakarta');
            //echo date('Y-m-d H:i:s'); ?>     -->
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-blue hover-expand-effect" data-toggle="modal" data-target="#submitted">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        <span><?php echo $Submitted; ?></span>
                    </div>
                    <div class="content">
                        <div class="text">NEW ITEM SUBMITTED</div>
                        <small>Barang Diajukan</small>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="submitted" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Barang Diajukan</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-submitted" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-submitted">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListSubmitted->result() as $data) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->brgmtang_kode; ?></td>
                                                <td><?php echo $data->brgmtang_name; ?></td>
                                                <td><?php echo $data->jumlah_barang; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button> -->
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Default Size -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-red hover-expand-effect" data-toggle="modal" data-target="#rejected">
                    <div class="icon">
                        <i class="material-icons">backspace</i>
                        <span><?php echo $Rejected; ?></span>
                    </div>
                    <div class="content">
                        <div class="text">NEW ITEM REJECTED</div>
                        <small>Barang Ditolak</small>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="rejected" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Barang Ditolak</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-rejected" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-rejected">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListRejected->result() as $data) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->brgmtang_kode; ?></td>
                                                <td><?php echo $data->brgmtang_name; ?></td>
                                                <td><?php echo $data->jumlah_barang; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button> -->
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Default Size -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect" data-toggle="modal" data-target="#processed">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                        <span><?php echo $Processed; ?></span>
                    </div>
                    <div class="content">
                        <div class="text">NEW ITEM PROCESSED</div>
                        <small>Barang Diproses</small>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="processed" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Barang Diproses</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-processed" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-processed">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListProcessed->result() as $data) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->brgmtang_kode; ?></td>
                                                <td><?php echo $data->brgmtang_name; ?></td>
                                                <td><?php echo $data->jumlah_barang; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button> -->
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Default Size -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect" data-toggle="modal" data-target="#sent">
                    <div class="icon">
                        <i class="material-icons">send</i>
                        <span><?php echo $Sent; ?></span>
                    </div>
                    <div class="content">
                        <div class="text">NEW ITEM SENT</div>
                        <small>Barang Dikirim</small>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                 <div class="modal fade" id="sent" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="<?php echo base_url().'User/Diterima/'; ?>" method="post">
                                <div class="modal-header">
                                    <center>
                                        <h4 class="modal-title" id="defaultModalLabel">Barang Dikirim</h4>
                                    </center>
                                </div>
                                <div class="modal-body">
                                    <table id="tbl-sent" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Permintaan</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Diterima</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show-sent">
                                            <?php 
                                                $no = 0;
                                                foreach ($ListSent->result() as $data) { 
                                                    $no++;
                                            ?>
                                                <tr>
                                                    <input type="hidden" id="kd_permintaan<?php echo $no; ?>" disabled name="kode_permintaan[]" value="<?php echo $data->kode_permintaan; ?>">
                                                    <input type="hidden" id="kd_barang<?php echo $no; ?>" disabled name="kode_barang[]" value="<?php echo $data->brgmtang_kode; ?>">
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $data->kode_permintaan; ?></td>
                                                    <td><?php echo $data->brgmtang_kode; ?></td>
                                                    <td><?php echo $data->brgmtang_name; ?></td>
                                                    <td><?php echo $data->jumlah_barang; ?></td>
                                                    <td>
                                                        <div class="col-sm-3">
                                                            <div class="switch">
                                                                <label id="ceked<?php echo $no; ?>"><input type="checkbox" onclick="inputAktif(<?php echo $no; ?>)"><span class="lever switch-col-blue"></span></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <?php if ($ListSent->num_rows()==0) {?>
                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                    <?php }else{ ?>
                                    <button type="submit" class="btn btn-link waves-effect">DITERIMA</button>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Default Size -->
            </div>
        </div>
        <!-- #END# Widgets -->
    </div>
</section>