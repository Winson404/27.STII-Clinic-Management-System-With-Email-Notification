<title>STII Clinic Management System | Dental Admission Record</title>
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
            <h3>New Dental Admission Record</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dental Admission Record</li>
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
                              <span><b>Patient name</b></span>
                              <select class="select2" data-placeholder="Patient name" id="patient_Id" style="width: 100%;" onchange="fetchPatientInfo()" required >
                                  <option selected disabled value="">Select patient</option>
                                  <?php 
                                    $ff = mysqli_query($conn, "SELECT * FROM patient");
                                    if(mysqli_num_rows($ff) > 0) {
                                      while ($r_p = mysqli_fetch_array($ff)) {
                                        echo "<option value=".$r_p['user_Id'].">".$r_p['name']."</option>";
                                      }
                                    } else {
                                      echo "<option selected disabled value=''>No record found</option>";
                                    }
                                  ?>
                              </select>
                              <!-- PASSING VALUE ON CHANGE -->
                              <input type="hidden" class="form-control" id="as_is_patient" name="patient_Id" required>
                              <!-- END PASSING VALUE ON CHANGE -->
                          </div>
                        </div>
                        <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark" id="studentPosition"><b>Course & Year</b></span>
                              <span class="text-dark" id="teacherPosition" style="display: none;"><b>Position</b></span>
                              <input type="text" class="form-control"  placeholder="Course & Year" readonly id="grade">
                            </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Contact number</b></span>
                              <input type="text" class="form-control"  placeholder="Contact number" readonly id="contact">
                          </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control"  placeholder="Age" readonly id="age">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <input type="text" class="form-control"  placeholder="Sex" readonly id="sex">
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Address</b></span>
                              <input type="text" class="form-control"  placeholder="Address" readonly id="address">
                            </div>
                        </div>


                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Parents information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent's name</b></span>
                              <input type="text" class="form-control"  placeholder="Parent's name" readonly id="parentName">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="text-dark"><b>Parent's contact</b></span>
                                <input type="text" class="form-control"  placeholder="Parent's contact" readonly id="parentContact">
                            </div>
                        </div>
                        

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>DENTAL </b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental problem history</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Dental problem history" name="dental_history" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 m-3">
                          <p>Select which part of your teeth has/have problem</p>
                          <img src="../images/tooth.jpg" alt="" class="shadow-sm d-block m-auto">
                        </div>

                        <div class="col-6 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Enter the number of the teeth you are concerning for</b></span>
                              <input class="form-control" placeholder="Ex: 1, 2, 3" name="teeth_no" required>
                            </div>
                        </div>
                        <div class="col-6"></div>

                        <div class="col-lg-4 col-lg-4 col-sm-6 col-12 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Vital sign(VS) Blood presure(BP)</b></span>
                              <input type="text" class="form-control" placeholder="Enter VS/BP" name="vs_bp" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-sm-6 col-12 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Pulse rate(PR)</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4 col-sm-6 col-12 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Respiratory rate(RR)</b></span>
                              <input type="text" class="form-control" placeholder="Enter RR" name="rr" required>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                              <h5 class="text-center mt-5">List of Available Medicines</h5>
                              <hr>
                              <table id="" class="table table-bordered table-hover table-sm text-sm">
                                  <thead>
                                      <tr>
                                          <th>Medicine Name</th>
                                          <th class="text-center">Available Stock</th>
                                          <th class="text-center">Medicine given</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                          $fetchProducts = mysqli_query($conn, "SELECT * FROM medicine WHERE med_stock_in > 0 AND expiration_date >= CURDATE() ORDER BY med_name ASC");

                                        $products = array();
                                        while ($product = mysqli_fetch_assoc($fetchProducts)) {
                                            $products[] = $product;
                                        }

                                        foreach ($products as $product) {
                                        ?>
                                          <tr>
                                              <td>
                                                <input type="hidden" class="form-control" name="medicine_given[]" value="<?php echo $product['med_Id']; ?>">
                                                <?php echo ucwords($product['med_name']); ?>
                                              </td>
                                              <td class="text-center"><?php echo $product['med_stock_in']; ?></td>
                                              <td>
                                                  <input type="number" class="form-control form-control-sm text-center" name="stock_used[<?php echo $product['med_Id']; ?>]" placeholder="Enter number of stock to release to the patient" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  </tbody>
                              </table>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental advised</b></span>
                              <textarea cols="30" rows="2" class="form-control" placeholder="Dental advised" name="dental_advised" required></textarea>
                            </div>
                        </div>
                        

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="dental.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_dental" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
  $dental_Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE dental.dental_Id='$dental_Id'");
  $row = mysqli_fetch_array($fetch);
  $user_Id = $row['user_Id'];
?>


  <!-- UPDATE -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update Dental Admission record</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dental Admission record</li>
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

              <input type="hidden" class="form-control" name="dental_Id" value="<?php echo $dental_Id; ?>">
              <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            
                            <div class="form-group">
                              <span><b>Patient name</b></span>
                              <select class="select2" data-placeholder="Patient name" id="patient_Id" style="width: 100%;" onchange="fetchPatientInfo()" required >
                                  <option selected disabled value="">Select patient</option>
                                                                    <?php 
                                    $ff = mysqli_query($conn, "SELECT * FROM patient");
                                    if(mysqli_num_rows($ff) > 0) {
                                      while ($r_p = mysqli_fetch_array($ff)) {
                                  ?>
                                    <option value="<?php echo $r_p['user_Id']; ?>" <?php if($r_p['user_Id'] == $user_Id) { echo 'selected'; } ?>> <?php echo $r_p['name']; ?></option>
                                  <?php
                                         
                                      }
                                    } else {
                                      echo "<option selected disabled value=''>No record found</option>";
                                    }
                                  ?>
                              </select>
                              <!-- PASSING VALUE ON CHANGE -->
                              <input type="hidden" class="form-control" id="as_is_patient" name="patient_Id" required value="<?php echo $user_Id; ?>">
                              <!-- END PASSING VALUE ON CHANGE -->
                          </div>
                        </div>
                        <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark" id="studentPosition"><b>Course & Year</b></span>
                              <span class="text-dark" id="teacherPosition" style="display: none;"><b>Position</b></span>
                              <input type="text" class="form-control"  placeholder="Course & Year" readonly id="grade" value="<?php echo $row['grade']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Contact number</b></span>
                              <input type="text" class="form-control"  placeholder="Contact number" readonly id="contact" value="<?php echo $row['contact']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control"  placeholder="Age" readonly id="age" value="<?php echo $row['age']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <input type="text" class="form-control"  placeholder="Sex" readonly id="sex" value="<?php echo $row['sex']; ?>">
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Address</b></span>
                              <input type="text" class="form-control"  placeholder="Address" readonly id="address" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>


                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Parents information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent's name</b></span>
                              <input type="text" class="form-control"  placeholder="Parent's name" readonly id="parentName" value="<?php echo $row['parentName']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <span class="text-dark"><b>Parent's contact</b></span>
                                <input type="text" class="form-control"  placeholder="Parent's contact" readonly id="parentContact" value="<?php echo $row['parentContact']; ?>">
                            </div>
                        </div>
                        

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>DENTAL </b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental problem history</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Dental problem history" name="dental_history" required><?php echo $row['dental_history']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 m-3">
                          <p>Select which part of your teeth has/have problem</p>
                          <img src="../images/tooth.jpg" alt="" class="shadow-sm d-block m-auto">
                        </div>

                        <div class="col-6 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Enter the number of the teeth you are concerning for</b></span>
                              <input class="form-control" placeholder="Ex: 1, 2, 3" name="teeth_no" value="<?php echo $row['teeth_no']; ?>" required>
                            </div>
                        </div>
                        <div class="col-6"></div>

                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>VS/BP</b></span>
                              <input type="text" class="form-control" placeholder="Enter VS/BP" name="vs_bp" required value="<?php echo $row['vs_bp']; ?>">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required value="<?php echo $row['pr']; ?>">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>RR</b></span>
                              <input type="text" class="form-control" placeholder="Enter RR" name="rr" required value="<?php echo $row['rr']; ?>">
                            </div>
                        </div>

                        <!-- <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Medicine given</b></span>
                              <textarea cols="30" rows="2" class="form-control" placeholder="Medicine given" name="medicine_given" required><?php //echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="form-group">
                              <h5 class="text-center mt-5">List of Available Medicines</h5>
                              <hr>
                              <table id="" class="table table-bordered table-hover table-sm text-sm">
                                  <thead>
                                      <tr>
                                          <th>Medicine Name</th>
                                          <th class="text-center">Available Stock</th>
                                          <th class="text-center">Medicine given</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                          $fetchProducts = mysqli_query($conn, "SELECT * FROM medicine WHERE med_stock_in > 0 AND expiration_date >= CURDATE() ORDER BY med_name ASC");

                                        $products = array();
                                        while ($product = mysqli_fetch_assoc($fetchProducts)) {
                                            $products[] = $product;
                                        }

                                        foreach ($products as $product) {
                                        ?>
                                          <tr>
                                              <td>
                                                <input type="hidden" class="form-control" name="medicine_given[]" value="<?php echo $product['med_Id']; ?>">
                                                <?php echo ucwords($product['med_name']); ?>
                                              </td>
                                              <td class="text-center"><?php echo $product['med_stock_in']; ?></td>
                                              <td>
                                                  <input type="number" class="form-control form-control-sm text-center" name="stock_used[<?php echo $product['med_Id']; ?>]" placeholder="Enter number of stock to release to the patient" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  </tbody>
                              </table>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental advised</b></span>
                              <textarea cols="30" rows="2" class="form-control" placeholder="Dental advised" name="dental_advised" required><?php echo $row['dental_advised']; ?></textarea>
                            </div>
                        </div>
                        

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="dental.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="update_dental" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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


<script>
function fetchPatientInfo() {


  var patientId = $("#patient_Id").val();
  document.getElementById("as_is_patient").value = patientId;

  if (patientId !== "") {
    // Send the AJAX request
    $.ajax({
      url: "ajax.php",
      type: "GET",
      data: { patientId: patientId },
      dataType: "json",
      success: function(response) {
        if (response.user_type === "Student") {
          // Display studentPosition and hide teacherPosition
          $("#studentPosition").show();
          $("#teacherPosition").hide();
          // $("#studentPosition").text(response.courseYear);
        } else if (response.user_type === "Teacher") {
          // Display teacherPosition and hide studentPosition
          $("#teacherPosition").show();
          $("#studentPosition").hide();
          // $("#teacherPosition").text(response.teacherPosition);
        }
        // Update the input fields with the retrieved data
        $("#grade").val(response.courseYear);
        $("#contact").val(response.contactNumber);
        $("#age").val(response.age);
        $("#sex").val(response.sex);
        $("#address").val(response.address);
        $("#parentName").val(response.parentName);
        $("#parentContact").val(response.parentContact);
      },
      error: function(xhr, status, error) {
        console.log("AJAX Error: " + error);
      }
    });
  }
}
</script>
