<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
            <?php 
                $data = $user->row_array();
                $nama_user = $data['nama_user'];
            ?> 
          <h6 class="slim-pagetitle">Welcome back, <?php echo $nama_user; ?></h6>
        </div><!-- slim-pageheader -->


        <div class="row row-xs mg-t-10">
          <div class="col-lg-8 col-xl-9">
            <div class="row row-xs">
              <div class="col-md-5 col-lg-6 col-xl-5">
                <div class="card card-activities pd-20">
                  <h6 class="slim-card-title">Recent Activities</h6>
                  <p>Last activity was 1 hour ago</p>

                  <div class="media-list">
                    <div class="media">
                      <div class="activity-icon bg-primary">
                        <i class="icon ion-stats-bars"></i>
                      </div><!-- activity-icon -->
                      <div class="media-body">
                        <h6>Report has been updated</h6>
                        <p>Aenean vulputate eleifend tellus. A nean leo ligula, porttitor.</p>
                        <span>2 hours ago</span>
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                      <div class="activity-icon bg-success">
                        <i class="icon ion-trophy"></i>
                      </div><!-- activity-icon -->
                      <div class="media-body">
                        <h6>Achievement Unlocked</h6>
                        <p>Aenean vulputate eleifend tellus. A nean leo ligula, porttitor.</p>
                        <span>2 hours ago</span>
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                      <div class="activity-icon bg-purple">
                        <i class="icon ion-image"></i>
                      </div><!-- activity-icon -->
                      <div class="media-body">
                        <h6>Added new images</h6>
                        <p>Aenean vulputate eleifend tellus. A nean leo ligula, porttitor.</p>
                        <span>2 hours ago</span>
                      </div><!-- media-body -->
                    </div><!-- media -->
                  </div><!-- media-list -->
                </div><!-- card -->
              </div><!-- col-5 -->
            </div><!-- row -->
          </div><!-- col-9 -->

          
        </div><!-- row -->

      </div><!-- container -->
    </div><!-- slim-mainpanel -->
