 <section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> -->
            <!-- Basic Examples -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA BARANG
                            </h2>
                            <div class="pull-right" style="margin-top: -28px;">
                                <button type="button" class="btn btn-primary waves-effect" data-target="#addModal" data-toggle="modal"><i class="material-icons">add_box</i><span>TAMBAH</span></button>
                            </div>
                        </div>
                        <!-- COBA AMBIL ATRIBUT SELECT -->
                        <!-- <button onclick="ambil()">Coba</button>
                        <div id="ambil"></div> -->

                        <!-- Tambah Data Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="defaultModalLabel" align="center">TAMBAH BARANG</h4>
                                    </div>
                                    <!-- <form id="form_validation" method="POST" id="add_Barang" action=""> -->
                                    <div class="modal-body">
                                        <div class="form-group form-float">
                                            <div id="kdBar" class="form-line">
                                                <input type="text" class="form-control" name="kode_barang" id="kobar" readonly required>
                                                <label class="form-label">Kode Barang</label>
                                            </div>
                                            <label id="error_kdBar" class="error" for="kode_barang" style="display: block;"></label>
                                        </div>
                                        <div class="form-group form-float">
                                            <div id="nmBar" class="form-line">
                                                <input type="text" class="form-control" name="nama_barang" id="nabar" required>
                                                <label class="form-label">Nama Barang</label>
                                            </div>
                                            <label id="error_nmBar" class="error" for="nama_barang" style="display: block;"></label>
                                        </div>
                                        <!-- <div class="col-sm-6"> -->
                                        <p>
                                            <b>Satuan Barang</b>
                                        </p>
                                        <div id="stBar" class="form-line">
                                        <select class="form-control show-tick" data-live-search="true" name="satuan_barang" id="sabar">
                                            <option id="pilihBrg" value="">-- Pilih Satuan Barang --</option>
                                            <?php 
                                                foreach ($satuan as $key) {
                                                    echo "<option value=".$key->sat_id." nama=".$key->sat_nama.">".$key->sat_nama."</option>";
                                                } 
                                            ?>
                                        </select>
                                        </div>
                                        <label id="error_stBar" for="satuan_barang" class="col-red" style="font-size: 12px; "></label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn_simpan" class="btn btn-link waves-effect">SAVE</button>
                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>

                        <!-- Update Data Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="defaultModalLabel" align="center">UPDATE BARANG</h4>
                                    </div>
                                   <div class="modal-body">
                                        <div class="form-group form-float">
                                            <div id="kdBar" class="form-line">
                                                <input type="text" class="form-control" name="kode_barang" id="kobar" readonly required>
                                                <label class="form-label">Kode Barang</label>
                                            </div>
                                            <label id="error_kdBar" class="error" for="kode_barang" style="display: block;"></label>
                                        </div>
                                        <div class="form-group form-float">
                                            <div id="nmBar" class="form-line">
                                                <input type="text" class="form-control" name="nama_barang" id="nabar" required>
                                                <label class="form-label">Nama Barang</label>
                                            </div>
                                            <label id="error_nmBar" class="error" for="nama_barang" style="display: block;"></label>
                                        </div>
                                        <!-- <div class="col-sm-6"> -->
                                        <p>
                                            <b>Satuan Barang</b>
                                        </p>
                                        <div id="stBar">
                                       <!--  <select class="form-control show-tick" data-live-search="true" name="satuan_barang" id="sabar">
                                            <option id="pilihBrg" value="">-- Pilih Satuan Barang --</option>
                                            <?php 
                                                //foreach ($satuan as $key) {
                                                    //echo "<option id='pilih".$key->sat_id."' value=".$key->sat_id." nama=".$key->sat_nama.">".$key->sat_nama."</option>";
                                                //} 
                                            ?>
                                        </select> -->
                                        </div>
                                        <label id="error_stBar" for="satuan_barang" class="col-red" style="font-size: 12px; "></label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn_simpan" class="btn btn-link waves-effect">SAVE</button>
                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Tabel -->
                        <div class="body">
                            <div id="table-brg">
                                <div class="table-responsive">
                                    <table id="tbl-barang" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>