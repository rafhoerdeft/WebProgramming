<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect" data-toggle="modal" data-target="#request">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        <span><?php echo $Request; ?></span>
                    </div>
                    <div class="content">
                        <div class="text">REQUEST ITEM THIS TODAY</div>
                        <small>Total Permintaan Hari Ini</small>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="request" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Daftar Permintaan</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-sent" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Permintaan</th>
                                            <th>Nama Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-sent">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListRequest->result() as $data) {
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->kode_permintaan; ?></td>
                                            <td><?php echo $data->ukerja_name; ?></td>
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
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect" data-toggle="modal" data-target="#goods">
                    <div class="icon">
                        <i class="material-icons">shopping_cart</i>
                        <span><?php echo $Goods; ?></span>
                    </div>

                    <div class="content">
                        <div class="text">ITEM THIS TODAY</div>
                        <small>Total Barang Hari Ini</small>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="goods" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Daftar Barang Yang Ditolak</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-sent" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-sent">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListGoods->result() as $data) {
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->kode_barang; ?></td>
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
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect" data-toggle="modal" data-target="#sent">
                    <div class="icon">
                        <i class="material-icons">send</i>
                        <span><?php echo $Sent; ?></span>
                    </div>

                    <div class="content">
                        <div class="text">ITEM SENT THIS TODAY</div>
                        <small>Barang Dikirim Hari Ini</small>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="sent" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Daftar Barang Yang Sedang Dikirim</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-sent" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Permintaan</th>
                                            <th>Nama Unit</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-sent">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListSent->result() as $data) {
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->kode_permintaan; ?></td>
                                            <td><?php echo $data->ukerja_name; ?></td>
                                            <td><?php echo $data->kode_barang; ?></td>
                                            <td><?php echo $data->brgmtang_name; ?></td>
                                            <td><?php echo $data->jml_brgsetuju; ?></td>
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
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box bg-indigo hover-expand-effect" data-toggle="modal" data-target="#accept">
                    <div class="icon">
                        <i class="material-icons">assignment</i>
                        <span><?php echo $Accept; ?></span>
                    </div>

                    <div class="content">
                        <div class="text">ITEM ACCEPT THIS TODAY</div>
                        <small>Barang Diterima Hari Ini</small>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                <!-- Default Size -->
                <div class="modal fade" id="accept" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Daftar Barang Yang Sudah Diterima</h4>
                                </center>
                            </div>
                            <div class="modal-body">
                                <table id="tbl-accept" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Permintaan</th>
                                            <th>Nama Unit</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-accept">
                                        <?php 
                                            $no = 1;
                                            foreach ($ListAccept->result() as $data) {
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->kode_permintaan; ?></td>
                                            <td><?php echo $data->ukerja_name; ?></td>
                                            <td><?php echo $data->kode_barang; ?></td>
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
        </div>
        <!-- #END# Widgets -->
        
    </div>
</section>