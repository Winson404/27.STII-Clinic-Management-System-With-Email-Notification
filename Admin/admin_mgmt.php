<title>STII Clinic Management System | System user info</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



<?php if($page === 'create') { ?>

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>New system user</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">System user info</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <div class="form-group">
                                <span class="text-dark"><b>User type</b></span>
                                <select class="form-control" name="user_type" required>
                                  <option selected disabled value="">Select type</option>
                                  <option value="Admin">Nurse/Admin</option>
                                  <option value="Staff">Staff</option>
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>First name</b></span>
                              <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Middle name</b></span>
                              <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
                          </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Last name</b></span>
                              <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Ext/Suffix</b></span>
                            <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix">
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Date of Birth</b></span>
                              <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly>
                              <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Place of Birth</b></span>
                              <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <select class="form-control" name="gender" required>
                              <option selected disabled value="">Select sex</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Non-Binary">Non-Binary</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Civil Status</b></span>
                            <select class="form-control" name="civilstatus" required>
                              <option selected disabled value="">Select status</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widow/ER">Widow/ER</option>
                              <option value="Separated">Separated</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Profession/ Occupation</b></span>
                              <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Religion</b></span>
                            <select class="form-control" name="religion" required>
                              <option selected disabled value="">Select religion</option>
                              <option value="Roman Catholic">Roman Catholic</option>
                              <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                              <option value="Evangelical Christianity">Evangelical Christianity</option>
                              <option value="Islam">Islam</option>
                              <option value="Protestants">Protestants</option>
                              <option value="Seventh-day Adventism">Seventh-day Adventism</option>
                              <option value="Aglipayan">Aglipayan</option>
                              <option value="Bible Baptist Church">Bible Baptist Church</option>
                              <option value="United Church of Christ in the Philippines">United Church of Christ in the Philippines</option>
                              <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                              <option value="Buddhist">Buddhist</option>
                              <option value="Methodist">Methodist</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Judaism">Judaism</option>
                              <option value="Ang Dating Daan">Ang Dating Daan</option>
                              <option value="Other Religion">Other Religion</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Contact details</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Email</b></span>
                              <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required>
                              <small id="text" style="font-style: italic;"></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Contact number</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10">
                              </div>
                            </div>
                        </div>
                        

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>System user's address</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>House No.</b></span>
                              <input type="text" class="form-control"  placeholder="House No." name="house_no">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Street name</b></span>
                              <input type="text" class="form-control"  placeholder="Street name" name="street_name">
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Sitio/Purok</b></span>
                              <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Zone</b></span>
                              <input type="text" class="form-control"  placeholder="Zone" name="zone">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Barangay</b></span>
                              <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Municipality</b></span>
                              <input type="text" class="form-control"  placeholder="Municipality" name="municipality" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Province</b></span>
                              <input type="text" class="form-control"  placeholder="Province" name="province" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Region</b></span>
                              <input type="text" class="form-control"  placeholder="Region" name="region" required>
                            </div>
                        </div>



                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Account password</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Password</b></span>
                              <input type="password" class="form-control" name="password" placeholder="Password" id="password" required minlength="8" onkeypress="validate_password()">
                              <small id="length"></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Confirm password</b></span>
                              <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password_confirm_password()" required minlength="8">
                              <small id="wrong_pass_alert"></small>
                            </div>
                        </div>


                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>Additional information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        
                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Administrator photo</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)" required>
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>

                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                            </div>
                        </div>
                         <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group" id="preview">
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="admin.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_admin" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->









<?php } else { 
  $user_Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
  $row = mysqli_fetch_array($fetch);
?>


  <!-- UPDATE -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Update system user</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">System user info</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="user_Id" required value="<?php echo $row['user_Id']; ?>">
            <div class="card">
              <div class="card-body">
                  <div class="row">

                      <div class="col-lg-12 mt-1 mb-2">
                        <a class="h5 text-primary"><b>Basic information</b></a>
                        <div class="dropdown-divider"></div>
                      </div>
                      <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <div class="form-group">
                              <span class="text-dark"><b>User type</b></span>
                              <select class="form-control" name="user_type" required>
                                <option selected disabled value="">Select type</option>
                                  <option value="Admin" <?php if($row['user_type'] == 'Admin') { echo 'selected'; } ?>>Nurse/Admin</option>
                                  <option value="Staff" <?php if($row['user_type'] == 'Staff') { echo 'selected'; } ?>>Staff</option>
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                      <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>First name</b></span>
                            <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <span class="text-dark"><b>Middle name</b></span>
                            <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Last name</b></span>
                            <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Ext/Suffix</b></span>
                          <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix" value="<?php echo $row['suffix']; ?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Date of Birth</b></span>
                            <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);" value="<?php echo $row['dob']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Age</b></span>
                            <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly value="<?php echo $row['age']; ?>">
                            <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus" value="<?php echo $row['age']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Place of Birth</b></span>
                            <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth"><?php echo $row['birthplace']; ?></textarea>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Sex</b></span>
                          <select class="form-control" name="gender" required>
                            <option selected disabled value="">Select sex</option>
                            <option value="Male"       <?php if($row['gender'] == 'Male') { echo 'selected'; } ?>>Male</option>
                            <option value="Female"     <?php if($row['gender'] == 'Female') { echo 'selected'; } ?>>Female</option>
                            <option value="Non-Binary" <?php if($row['gender'] == 'Non-Binary') { echo 'selected'; } ?>>Non-Binary</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Civil Status</b></span>
                          <select class="form-control" name="civilstatus" required>
                            <option selected disabled value="">Select status</option>
                            <option value="Single"    <?php if($row['civilstatus'] == 'Single') { echo 'selected'; } ?> >Single</option>
                            <option value="Married"   <?php if($row['civilstatus'] == 'Married') { echo 'selected'; } ?> >Married</option>
                            <option value="Widow/ER"  <?php if($row['civilstatus'] == 'Widow/ER') { echo 'selected'; } ?> >Widow/ER</option>
                            <option value="Separated" <?php if($row['civilstatus'] == 'Separated') { echo 'selected'; } ?> >Separated</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Profession/ Occupation</b></span>
                            <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" required value="<?php echo $row['occupation']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <span class="text-dark"><b>Religion</b></span>
                            <select class="form-control" name="religion" required>
                              <option selected disabled value="">Select religion</option>
                              <option value="Roman Catholic" <?php if($row['religion'] == 'Roman Catholic') { echo 'selected'; } ?>>Roman Catholic</option>
                              <option value="Iglesia Ni Cristo" <?php if($row['religion'] == 'Iglesia Ni Cristo') { echo 'selected'; } ?>>Iglesia Ni Cristo</option>
                              <option value="Evangelical Christianity" <?php if($row['religion'] == 'Evangelical Christianity') { echo 'selected'; } ?>>Evangelical Christianity</option>
                              <option value="Islam" <?php if($row['religion'] == 'Islam') { echo 'selected'; } ?>>Islam</option>
                              <option value="Protestants" <?php if($row['religion'] == 'Protestants') { echo 'selected'; } ?>>Protestants</option>
                              <option value="Seventh-day Adventism" <?php if($row['religion'] == 'Seventh-day Adventism') { echo 'selected'; } ?>>Seventh-day Adventism</option>
                              <option value="Aglipayan" <?php if($row['religion'] == 'Aglipayan') { echo 'selected'; } ?>>Aglipayan</option>
                              <option value="Bible Baptist Church" <?php if($row['religion'] == 'Bible Baptist Church') { echo 'selected'; } ?>>Bible Baptist Church</option>
                              <option value="United Church of Christ in the Philippines" <?php if($row['religion'] == 'United Church of Christ in the Philippines') { echo 'selected'; } ?>>United Church of Christ in the Philippines</option>
                              <option value="Jehovah's Witnesses" <?php if($row['religion'] == "Jehovah's Witnesses") { echo 'selected'; } ?>>Jehovah's Witnesses</option>
                              <option value="Buddhist" <?php if($row['religion'] == 'Buddhist') { echo 'selected'; } ?>>Buddhist</option>
                              <option value="Methodist" <?php if($row['religion'] == 'Methodist') { echo 'selected'; } ?>>Methodist</option>
                              <option value="Hindu" <?php if($row['religion'] == 'Hindu') { echo 'selected'; } ?>>Hindu</option>
                              <option value="Judaism" <?php if($row['religion'] == 'Judaism') { echo 'selected'; } ?>>Judaism</option>
                              <option value="Ang Dating Daan" <?php if($row['religion'] == 'Ang Dating Daan') { echo 'selected'; } ?>>Ang Dating Daan</option>
                              <option value="Other Religion" <?php if($row['religion'] == 'Other Religion') { echo 'selected'; } ?>>Other Religion</option>
                            </select>
                          </div>
                      </div>


                      <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                        <a class="h5 text-primary"><b>Contact details</b></a>
                        <div class="dropdown-divider"></div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Email</b></span>
                            <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required value="<?php echo $row['email']; ?>">
                            <small id="text" style="font-style: italic;"></small>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Contact number</b></span>
                            <div class="input-group">
                              <div class="input-group-text">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
                            </div>
                          </div>
                      </div>
                      

                      <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                        <a class="h5 text-primary"><b>System user's address</b></a>
                        <div class="dropdown-divider"></div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>House No.</b></span>
                            <input type="text" class="form-control"  placeholder="House No." name="house_no" value="<?php echo $row['house_no']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Street name</b></span>
                            <input type="text" class="form-control"  placeholder="Street name" name="street_name" value="<?php echo $row['street_name']; ?>">
                          </div>
                      </div>
                       <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sitio/Purok</b></span>
                            <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok" value="<?php echo $row['purok']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Zone</b></span>
                            <input type="text" class="form-control"  placeholder="Zone" name="zone" value="<?php echo $row['zone']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Barangay</b></span>
                            <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required value="<?php echo $row['barangay']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Municipality</b></span>
                            <input type="text" class="form-control"  placeholder="Municipality" name="municipality" required value="<?php echo $row['municipality']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Province</b></span>
                            <input type="text" class="form-control"  placeholder="Province" name="province" required value="<?php echo $row['province']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Region</b></span>
                            <input type="text" class="form-control"  placeholder="Region" name="region" required value="<?php echo $row['region']; ?>">
                          </div>
                      </div>



                      <div class="col-lg-12 mt-3 mb-2">
                        <a class="h5 text-primary"><b>Additional information</b></a>
                        <div class="dropdown-divider"></div>
                      </div>
                      
                      <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Administrator photo</b></span>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>

                            </div>
                            <p class="help-block text-danger">Max. 500KB</p>
                          </div>
                      </div>
                       <!-- LOAD IMAGE PREVIEW -->
                      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <div class="form-group" id="preview">
                          </div>
                      </div>

                  </div>
                  <!-- END ROW -->
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <a href="admin.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  <button type="submit" class="btn bg-primary" name="update_admin" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- END UPDATE -->


<?php } ?>







  </div>

<?php } else { include '404.php'; } ?>









    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php include 'footer.php';  ?>

<script>

   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }


   function signaturess(event)
  {
    var signatureimage=URL.createObjectURL(event.target.files[0]);
    var signatureimagediv= document.getElementById('qrpreview');
    var signaturenewimg=document.createElement('img');
    signatureimagediv.innerHTML='';
    signaturenewimg.src=signatureimage;
    signaturenewimg.width="90";
    signaturenewimg.height="90";
    signaturenewimg.style['border-radius']="50%";
    signaturenewimg.style['display']="block";
    signaturenewimg.style['margin-left']="auto";
    signaturenewimg.style['margin-right']="auto";
    signaturenewimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    signatureimagediv.appendChild(signaturenewimg);
  }

  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }


    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
    }

    function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 1);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
      document.getElementById("agestatus").value = age;
      }
      }else{
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      return false;
      }
    }



    function validate_password_confirm_password() {
      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }

    function validate_password() {
       var pass = document.getElementById('password').value;
       var confirm_pass = document.getElementById('cpassword').value;
       var regex = /[a-zA-Z0-9]/g;
       var pass2 = pass.match(regex).length;

      if(pass2 < 8) {
        document.getElementById('length').style.color = 'red';
        document.getElementById('length').innerHTML = 'Password must be at least 8 characters.';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);

      } else {
        document.getElementById('length').style.color = 'green';
        document.getElementById('length').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }
</script>