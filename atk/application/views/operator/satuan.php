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
                                DATA SATUAN BARANG
                            </h2>
                            <div class="pull-right" style="margin-top: -28px;">
                                <button type="button" class="btn btn-primary waves-effect" data-target="#addModalSatuan" data-toggle="modal"><i class="material-icons">add_box</i><span>TAMBAH</span></button>
                            </div>
                        </div>
                        <!-- COBA AMBIL ATRIBUT SELECT -->
                        <!-- <button onclick="ambil()">Coba</button>
                        <div id="ambil"></div> -->

                        <!-- Tambah Data Modal -->
                        <div class="modal fade" id="addModalSatuan" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="defaultModalLabel" align="center">TAMBAH SATUAN</h4>
                                    </div>
                                    <!-- <form id="form_validation" method="POST" id="add_Barang" action=""> -->
                                    <div class="modal-body">
                                        <div class="form-group form-float">
                                            <div id="nmSat" class="form-line">
                                                <input type="text" class="form-control" name="nama_satuan" id="nasat" required>
                                                <label class="form-label">Nama Satuan</label>
                                            </div>
                                            <label id="error_nmSat" class="error" for="nama_satuan" style="display: block;"></label>
                                        </div>
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
                        <div class="modal fade" id="editModalSatuan" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="defaultModalLabel" align="center">UPDATE BARANG</h4>
                                    </div>
                                   <div class="modal-body">
                                        <div class="form-group form-float">
                                            <div id="nmSat" class="form-line">
                                                <input type="text" class="form-control" name="nama_satuan" id="nasat" required>
                                                <label class="form-label">Nama Barang</label>
                                            </div>
                                            <label id="error_nmSat" class="error" for="nama_satuan" style="display: block;"></label>
                                        </div>
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
                            <div id="table-sat">
                                <div class="table-responsive">
                                    <table id="tbl-satuan" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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