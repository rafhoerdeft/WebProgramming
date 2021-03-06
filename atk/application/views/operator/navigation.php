<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html">Permintaan ATK</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li class="dropdown" id="notif-permintaan" onclick="clearCount();">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count"></span>
                    </a>
                    <ul class="dropdown-menu" id="notif">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <!-- <ul class="menu"> -->
                                <!-- <li style="background: lightgrey;">
                                    <a href="#">
                                        <div style="width: 7px; height:50px; background: orange; float: left; margin-right: 10px;">
                                            <i class="material-icons">notifications_active</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Unit PDSI</h4>
                                            <p style="color: grey;">
                                                <b>Kode: 34524252525425</b> <br>
                                                <i class="material-icons" style="color: grey;">access_time</i> 05-09-2018 (08:53)
                                            </p>
                                        </div>
                                    </a>
                                </li> -->
                            <!-- </ul> -->
                        </li>
                        <!-- <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li> -->
                    </ul>
                </li>
                <!-- #END# Notifications -->

                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<!-- Modal View Detail Notifikasi -->
<div class="modal fade" id="detail-permintaan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel" align="center">Detail Permintaan</h4>
            </div>
            <div class="modal-body">
                <div id="header-detail">
                    <!-- Data AJAX -->
                </div>
                <br>
                <hr>
                <table id="tbl-detail" class="table table-hover">
                    <thead>
                        <!-- <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th><center>Jumlah</center></th> -->
                            <!-- <th><center>Setuju (Ya/Tidak)</center></th> -->
                            <!-- <th>Disetujui</th>
                            <th>Status</th>
                        </tr> -->
                    </thead>
                    <tbody id="show-detail">
                       <!-- DATA AJAX -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-simpan-pmt" class="btn btn-link waves-effect">SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url();?>assets/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->session->userdata('username'); ?>
                </div>
                <div class="email"><?php echo $this->session->userdata('nama_unit'); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Ubah_Pwd"><i class="material-icons">person</i>Ubah Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url().'Operator/logout'; ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php if ($id_nav==1) { echo 'active';}  ?>">
                    <a href="<?php echo base_url()."Operator" ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==2) { echo 'active';}  ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Inventory</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="<?php if ($id_nav_sub==2.1) { echo 'active';}  ?>">
                            <a href="<?php echo base_url()."Operator/barang" ?>">Data Barang</a>
                        </li>
                        <li class="<?php if ($id_nav_sub==2.2) { echo 'active';}  ?>">
                            <a href="<?php echo base_url()."Operator/satuan" ?>">Data Satuan Barang</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($id_nav==3) { echo 'active';}  ?>">
                    <a href="<?php echo base_url()."Operator/permintaan" ?>">
                        <i class="material-icons">swap_calls</i>
                        <span>Permintaan Masuk</span>
                    </a>
                </li>
                <li class="<?php if ($id_nav==4) { echo 'active';}  ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span>Laporan</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="<?php if ($id_nav_sub==5) { echo 'active';}  ?>">
                            <a href="<?php echo base_url().'Operator/laporanBarang'; ?>">Barang</a>
                        </li>
                        <li class="<?php if ($id_nav_sub==6) { echo 'active';}  ?>">
                            <a href="<?php echo base_url().'Operator/laporanUnit'; ?>">Unit</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 - 2018 <a href="javascript:void(0);">Create By - PDSI UMMGL</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar" style="width: 200px;">
        <ul class="nav nav-tabs tab-nav-right" role="tablist" style="width: 200px;">
            <li class="active"><a href="#skins" data-toggle="tab" style="width: 200px;">SKINS</a></li>
            <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
        </ul>
        <div class="tab-content" >
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<!-- Ubah Password -->
<div class="modal fade" id="Modal_Ubah_Pwd" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="defaultModalLabel">Ubah Password</h4>
                </center>
            </div>
            <div class="modal-body">
                <form name="change-password" id="cp">
                <div class="form-group form-float">
                    <div id="username" class="form-line">
                        <input type="text" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" name="user" id="user" readonly required>
                        <label class="form-label">Username</label>
                    </div>
                    <label id="error_user" class="error" for="user" style="display: block;"></label>
                </div>
                <div class="form-group form-float">
                    <div id="oldPass" class="form-line">
                        <input type="Password" class="form-control" name="old_pass" id="old_pass" onkeyup="validPass();" required>
                        <label class="form-label">Password Lama</label>
                    </div>
                    <label id="error_oldPass" class="error" for="old_pass" style="display: block;"></label>
                </div>
                <div class="form-group form-float">
                    <div id="newPass" class="form-line">
                        <input type="Password" class="form-control" name="new_pass" id="new_pass" onkeyup="ulangPass();" required>
                        <label class="form-label">Password Baru</label>
                    </div>
                    <label id="error_newPass" class="error" for="new_pass" style="display: block;"></label>
                </div>
                <div class="form-group form-float">
                    <div id="newPass2" class="form-line">
                        <input type="Password" class="form-control" name="new_pass2" id="new_pass2" onkeyup="ulangPass();" required>
                        <label class="form-label">Ulangi Password</label>
                    </div>
                    <label id="error_newPass2" class="error" for="new_pass2" style="display: block;"></label>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_simpan" class="btn btn-link waves-effect">UBAH PASSWORD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>