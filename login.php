<title>STII Clinic Management System | Login</title>
<?php include 'navbar.php'; ?>
<style>
input[type="email"],
input[type="password"] {
text-transform: none;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 card shadow-sm rounded mt-5 ">
          <div class="card-header text-center justify-content-center d-flex">
            <div class="col-5 p-3">
              <a href="login.php" class="h1">
                <img src="images/stii.png" alt="logo" class="img-fluid">
              </a>
              <!-- <a href="login.php" class="h1"><b>Login</b></a> -->
            </div>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="processes.php" method="post" id="quickForm">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" style="text-transform:none">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <!-- FOR INVALID EMAIL -->
              <div class="input-group mt-1 mb-3">
                <small id="text" style="font-style: italic;"></small>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" minlength="8" required style="text-transform:none">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember" id="remember" onclick="myFunction()">
                    <label for="remember">
                      Show password
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn bg-gradient-primary btn-block" name="login" id="login">Sign In</button>
                </div>
              </div>
            </form>
            <p>
              <a href="forgot-password.php">I forgot my password</a>
              <br>
              <a href="register.php" class="text-center">Register here</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>