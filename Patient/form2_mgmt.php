<title>STII Clinic Management System | Patient record</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $form2_Id = $_GET['page'];
      $fetch = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE form2.form2_Id='$form2_Id'");
      $row = mysqli_fetch_array($fetch);
      $user_Id = $row['user_Id'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- UPDATE -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Patient record</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Patient record</li>
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
              <input type="hidden" class="form-control"  placeholder="Address" name="form2_Id" value="<?php echo $form2_Id; ?>">
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
                                <span class="text-dark"><b>Patient name</b></span>
                                <select class="form-control" name="patient_Id" readonly id="patient_Id" onchange="fetchPatientInfo()">
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
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Course & Year</b></span>
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
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Temperature</b></span>
                              <input type="text" class="form-control" placeholder="Enter Temperature" name="temperature" required readonly value="<?php echo $row['temperature']; ?>">
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Vital sign</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Vital sign" name="vital_sign" readonly><?php echo $row['vital_sign']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Diagnosis</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Diagnosis" name="diagnosis" readonly><?php echo $row['diagnosis']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                          <h5 class="text-center mt-5">List of Given Medicines</h5>
                          <hr>
                         <table id="example1" class="table table-bordered table-hover table-sm text-sm">
                            <thead>
                                <tr>
                                    <th>Medicine Name</th>
                                    <!-- <th class="text-center">Available Stock</th> -->
                                    <th class="text-center"># of medicine given</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch data from asking_med_transaction_log and medicine tables
                                $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM form2_transaction_log WHERE form2_Id='$form2_Id' GROUP BY med_Id");
                                $medicineData = array();

                                // Iterate through the results of asking_med_transaction_log
                                while ($logRow = mysqli_fetch_assoc($fetch2)) {
                                    $med_Id = $logRow['med_Id'];

                                    // Fetch medicine information based on med_Id
                                    $fetchMedicine = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id'");
                                    $medicineRow = mysqli_fetch_assoc($fetchMedicine);

                                    // Check if the medicine is found and has positive stock
                                    if ($medicineRow && $medicineRow['med_stock_in'] > 0 && strtotime($medicineRow['expiration_date']) >= strtotime(date('Y-m-d'))) {
                                        // Use regular expression to extract the unit label
                                        preg_match('/(\d+)\s*(\w+)/', $medicineRow['med_stock_in'], $matches);

                                        $medicineData[] = array(
                                            'med_name' => ucwords($medicineRow['med_name']),
                                            'stock_in' => $matches[1], // Quantity
                                            'units_label' => $matches[2], // Units label
                                            'stock_used_value' => $logRow['sum_stock_used_value'],
                                        );
                                    }
                                }

                                // Display the medicine data in the table
                                foreach ($medicineData as $medicine) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $medicine['med_name']; ?>
                                        </td>
                                       <!--  <td class="text-center">
                                            <?php //echo $medicine['stock_in'] . ' ' . $medicine['units_label']; ?>
                                        </td> -->
                                        <td class="text-center">
                                            <?php echo $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="form2.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END UPDATE -->






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
  if (patientId !== "") {
    // Send the AJAX request
    $.ajax({
      url: "ajax.php",
      type: "GET",
      data: { patientId: patientId },
      dataType: "json",
      success: function(response) {
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
