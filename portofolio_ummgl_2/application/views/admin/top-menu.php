<body>


    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <!-- Logo Header-->
          <a href="#"><img width="50px" style="margin-right: 10px;" src="<?php echo base_url(); ?>assets/img/logo-UMM.png"></a>
          <a href="#"><h2 class="slim-logo"> Portofolio UMMgl. </h2></a>
          
          <div class="search-box">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
          </div><!-- search-box -->
        </div><!-- slim-header-left -->
        <div class="slim-header-right">
         
          
          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
             <!-- <i class="fa fa-user"></i> -->
             <img src="<?php echo base_url(); ?>assets/img/LOGO.png" alt="">
              <?php 
                $data = $user->row_array();
                $nama_user = $data['nama_user'];
              ?> 
              <span><?php echo $nama_user; ?></span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                <a href="page-profile.html" class="nav-link"><i class="icon ion-person"></i> View Profile</a>
                <a href="page-edit-profile.html" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a>
                <a href="page-activity.html" class="nav-link"><i class="icon ion-ios-bolt"></i> Activity Log</a>
                <a href="page-settings.html" class="nav-link"><i class="icon ion-ios-gear"></i> Account Settings</a>
                <a href="<?php echo base_url(); ?>login/logout" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
              </nav>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->