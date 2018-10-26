<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Laporan</h2>
        </div>

        <!-- #END# CPU Usage -->
        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-default">
                        <div class="row">
                            <div class="col-md-6">
                                <font style="font-size: 25px;">Laporan Barang</font>
                            </div>
                            <form action="<?php echo base_url().'Operator/printLaporanBarang'; ?>" method="post" target="_blank">
                                <div class="col-md-4" id="barang">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control pull-right" name="reservation-brg" id="reservation-brg" placeholder="Tanggal" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success" id="print"><i class="material-icons">print</i> Export to .Xlxs</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive" id="report-barang">
                            <table id="tbl-laporanBarang" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="100">Kode Barang</th>
                                        <th width="250">Nama Barang</th>
                                        <th width="50">Jumlah Barang</th>
                                        <th width="50">Satuan</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show-laporanBarang">
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="header">
                        <h2>BAR CHART</h2>
                    </div>
                    <div class="body">
                        <canvas id="bar_chart" height="150"></canvas>
                    </div>
                </div> -->
                <!-- Default Size -->
                <div class="modal fade" id="Modal_GrafikBarang" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Detail Permintaan Barang</h4>
                                </center> -->
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="header">
                                        <h2>Diagram Permintaan Barang</h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <!-- <i class="material-icons">more_vert</i> -->
                                                </a>
                                                <!-- <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);">Action</a></li>
                                                    <li><a href="javascript:void(0);">Another action</a></li>
                                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                                </ul> -->
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body" id="Chartbody">
                                        <!-- <canvas id="bar_chart" height="150"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Size -->

                <!-- Default Size -->
                <div class="modal fade" id="Modal_ListUnit" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <center>
                                    <h4 class="modal-title" id="defaultModalLabel">Detail Permintaan Barang</h4>
                                </center> -->
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <font id="show_namaBarang" style="font-weight: bold; font-size: 18px;">
                                                <!-- <b>
                                                    Amplop
                                                </b> -->
                                            </font>
                                        </center>
                                        <br>
                                        <div class="table-responsive">
                                            <table id="tbl-list" class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="25">No</th>
                                                        <th>Nama Unit</th>
                                                        <th width="25">Jumlah Permintaan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show-list">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Size -->
                
                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BAR CHART</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- #END# Visitors -->
        </div>
    </div>
</section>