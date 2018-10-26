<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Laporan Unit</h2>
        </div>

        <!-- #END# CPU Usage -->
        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-default">
                        <div class="row">
                            <form action="<?php echo base_url().'Operator/printUnit'; ?>" method="post" target="_blank">
                            <div class="col-md-3">
                                <font style="font-size: 25px;">Laporan Unit</font>
                            </div>
                            <div class="col-md-2" id="plh_unit">
                                <select class="form-control show-tick" name="pilih_unit" id="pilih_unit" onchange="PilihUnit();">
                                    <option value="All"> Tampil Semua </option>
                                    <option value="Unit"> Tampil Per Unit </option>
                                </select>
                            </div>
                            <div class="col-md-3" id="tanggal">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control pull-right" name="reservation-unit" id="reservation-unit" placeholder="Tanggal" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" id="unit">
                                <select class="form-control show-tick" data-live-search="true" name="nama_unit" id="nama_unit">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" id="print">
                                    <i class="material-icons">print</i> Export to .Xlx
                                </button>
                            </div>
                            </form>
                        </div>
                                                <div class="table-responsive">
                            <table id="tbl-laporanUnit" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="150">Kode Permintaan</th>
                                        <th>Unit</th>
                                        <th>Tanggal Permintaan</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show-laporanUnit">
                                </tbody>
                            </table>
                            <!-- Default Size -->
                            <div class="modal fade" id="Modal_DetailLaporanUnit" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <center>
                                                <h4 class="modal-title" id="defaultModalLabel">Detail Permintaan</h4>
                                            </center>
                                        </div>
                                        <div class="modal-body">
                                            <table id="tbl-detail" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Barang</th>
                                                        <th width="400">Nama Barang</th>
                                                        <th>Satuan</th>
                                                        <th>Diajukan</th>
                                                        <th>Diterima</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show-detail">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Default Size -->
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- #END# Visitors -->
        </div>
    </div>
</section>