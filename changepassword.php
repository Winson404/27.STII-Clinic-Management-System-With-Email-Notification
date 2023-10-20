<title>STII Clinic Management System | Change password</title>
<?php include 'navbar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <?php
        if(isset($_GET['user_Id'])) {
        $user_Id = $_GET['user_Id'];
        ?>
        <div class="col-lg-4 mt-5">
          <div class="card card-outline card-primary mt-4">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>Create new password</b></a>
            </div>
            <div class="card-body">
              <p class="login-box-msg">Please create new password.</p>
              <form action="processes.php" method="post">
                <input type="hidden" class="form-control" name="user_Id" value="<?php echo $user_Id; ?>">
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="New password" name="password" id="mynewpassword" minlength="8">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Confirm new password" name="cpassword" id="cpassword" onkeyup="validate_password()" minlength="8">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <small id="wrong_pass_alert"></small>
                <div class="icheck-primary mt-3">
                  <input type="checkbox" id="remember" onclick="myFunction2()">
                  <label for="remember">
                    Show password
                  </label>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-block bg-gradient-primary" type="submit" name="changepassword" id="changepassword">Change password</button>
                  </div>
                </div>
              </form>
              <p class="mt-3 mb-1">
                <a href="login.php">Login</a>
              </p>
            </div>
          </div>
        </div>
        <?php } elseif(isset($_GET['patient_Id'])) {
        $patient_Id = $_GET['patient_Id'];
        ?>
        <div class="col-lg-4 mt-5">
          <div class="card card-outline card-primary mt-4">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>Create new password</b></a>
            </div>
            <div class="card-body">
              <p class="login-box-msg">Please create new password.</p>
              <form action="processes.php" method="post">
                <input type="hidden" class="form-control" name="patient_Id" value="<?php echo $patient_Id; ?>">
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="New password" name="password" id="mynewpassword" minlength="8">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Confirm new password" name="cpassword" id="cpassword" onkeyup="validate_password()" minlength="8">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <small id="wrong_pass_alert"></small>
                <div class="icheck-primary mt-3">
                  <input type="checkbox" id="remember" onclick="myFunction2()">
                  <label for="remember">
                    Show password
                  </label>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-block bg-gradient-primary" type="submit" name="changepassword_patient" id="changepassword">Change password</button>
                  </div>
                </div>
              </form>
              <p class="mt-3 mb-1">
                <a href="login.php">Login</a>
              </p>
            </div>
          </div>
        </div>
        <?php } else { include '404.php'; } ?>
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>