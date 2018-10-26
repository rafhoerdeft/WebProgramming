<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>Laporan Permintaan</h2>
        </div> -->

        <!-- #END# CPU Usage -->
        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-default">
                        <div class="row">
                            <div class="col-md-8">
                                <font style="font-size: 25px;">Laporan Permintaan</font>
                            </div>
                            <div class="col-md-4" id="barang">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control pull-right" name="reservation-lpgbrg" id="reservation-lpgbrg" placeholder="Tanggal" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tbl-laporan" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Kode Permintaan</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show-laporan">
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Visitors -->
        </div>
    </div>
</section>