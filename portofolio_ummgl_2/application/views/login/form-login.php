<div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="background: lightgrey">
                        <h3 class="panel-title" style="color: grey">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo base_url().'login/prosesLogin' ?>" method="post">
                           <div class="form-group has-feedback">
                                <input type="text" required class="form-control" name='user' placeholder="Username">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                <input type="password" required class="form-control" name='pass' placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="row">
                                <div class="col-xs-4">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                                <!-- /.col -->
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>