<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        	
        </div>

        <!-- #END# CPU Usage -->
        <div class="row clearfix">
            <!-- Visitors -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-default">
                        <div class="table-responsive">
					        <table class="table table-bordered table-striped" border="1" width="100%">
								<tr>
									<td colspan="2" align="center" middle-align="center">
										<center>
											<img src="<?php echo base_url().'assets/images/print logo2.png'; ?>" style="width: 100px; height: 100px;">
										</center>
									</td>
									<td colspan="3" align="center" middle-align="center">
										<h1>UNIVERSITAS MUHAMMADIYAH MAGELANG</h1>
										<span>Jl. Mayjend. Bambang Soegeng, Mertoyudan, Magelang 56172</span>
									</td>
							 	</tr>
							</table>


                            <center>
                                <h2 class="modal-title" id="defaultModalLabel">Detail Permintaan Barang</h2>
                            </center>


                            <?php
                            	foreach ($PerUnit->result() as $datakey) { ?>
                        			<table id="tbl-detail-laporan" class="table table-hover" border="0" width="100%">
		                            	<thead>
		                            		<tr>
		                            			<th align="center" colspan="5"><?php echo $datakey->ukerja_name; ?></th>
		                            		</tr>
		                            	</thead>
                        	<?php 
                            		foreach ($Unit->result() as $data) {
                            			if ($datakey->ukerja_kode == $data->ukerja_kode) {

                			?>
	                            	<!-- <thead>
	                            		<tr>Kode Permintaan</tr>
	                            		<tr>:</tr>
	                            		<tr><?php //echo $data->kode_permintaan ?></tr>
	                            		<tr>&nbsp;</tr>
	                            		<tr>Tanggal Permintaan</tr>
	                            		<tr><?php //echo $data->tgl_permintaan ?></tr>
	                            	</thead> -->
	                            	<tbody>

	                            		<table id="tbl-detail" class="table table-hover" border="1" width="100%">
	                            			<tr>
												<td colspan="3">Kode Permintaan : <?php echo $data->kode_permintaan ?></td>
			                            		<td colspan="2">Tanggal Permintaan : <?php echo $data->tgl_permintaan ?></td>
											</tr>

				                                <tr>
				                                    <th>No</th>
				                                    <th>Kode Barang</th>
				                                    <th width="400">Nama Barang</th>
				                                    <th>Jumlah Barang Diminta</th>
				                                    <th>Jumlah Barang Disetujui</th>
				                                </tr>

				                            <tbody id="show-detail">
				                            	<?php 
				                            		$no=1;
				                            		foreach ($LaporanBarang->result() as $key) { 
				                            			if ($data->kode_permintaan == $key->kode_permintaan) {
				                            				// if ($data->ukerja_name == $key->ukerja_name) {
	                        					?>
						                            		<tr>
						                            			<td align="center"><?php echo $no++; ?></td>
						                            			<td align="center"><?php echo $key->kode_barang ?></td>
						                            			<td valign="center"><?php echo $key->brgmtang_name ?></td>
						                            			<td align="center"><?php echo $key->jumlah_barang ?></td>
						                            			<td align="center"><?php echo $key->jml_brgsetuju ?></td>
						                            		</tr>

				                            	<?php
				                            				// }
				                            			} 
			                            			}
				                            	?>
				                            </tbody>
				                        </table>
				                        <br>
	                            	</tbody>
	                            </table>
                        	<?php 
		                        	}
                        		}
                        	}?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Visitors -->
        </div>
    </div>
</section>