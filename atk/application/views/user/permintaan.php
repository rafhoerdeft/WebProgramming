<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>Permintaan</h2>
        </div> -->

        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-default">
                        <div class="row">
                            <div class="col-md-3">
                                <font style="font-size: 18px;">Daftar Permintaan Barang</font>
                            </div>
                            <div class="col-md-4" id="barang">
                                <select class="form-control show-tick" data-live-search="true" name="kode_barang" id="kode_barang">
                                </select>
                                <label id="error_nmbrg" for="kode_barang" class="col-red" style="font-size: 12px; "></label>
                            </div>
                            <div class="col-md-1">
                                <div class="input-group">
                                    <div class="form-line" id="satbrg">
                                        <input type="text" class="form-control" placeholder="Satuan" id="satuan_barang" name="satuan_barang[]" style="width: 60px;" readonly>
                                    </div>
                                    <!-- <label id="error_jmlbrg" class="error" for="jumlah_barang" style="display: block;"></label> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <div class="form-line" id="jmlbrg">
                                        <input type="text" class="form-control" placeholder="Jumlah" id="jumlah_barang" name="jumlah_barang[]" onkeypress="return inputAngka(event);">
                                    </div>
                                    <label id="error_jmlbrg" class="error" for="jumlah_barang" style="display: block;"></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" name="add" id="add" class="btn btn-info waves-effect">Add <i class="material-icons">library_add</i></button>
                            </div>
                        </div>
                        <table id="tbl-barang" class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th width="150">Kode Barang</th>
                                    <th width="520">Nama Barang</th>
                                    <th width="150">Satuan Barang</th>
                                    <th width="150">Jumlah</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <center>
                            <button type='button' class='btn btn-primary waves-effect' id='Simpan'>
                                <i class="material-icons">send</i> Ajukan Permintaan
                            </button>
                        </center>
                    </div>
                </div>
            </div>
            <!-- #END# Visitors -->
        </div>
    </div>
</section>