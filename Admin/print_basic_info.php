<title>STII Clinic Management System | Basic information</title>
<?php 
  include 'navbar.php'; 
  if(isset($_GET['patient_Id'])) {
    $student_Id = $_GET['patient_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$student_Id' ");
    $row = mysqli_fetch_array($fetch);


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Basic information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Basic information</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <div class="card card-light p-0">
              <div class="card-header">
                <button class="btn btn-secondary float-sm-right" id="printButton"><i class="fa-solid fa-print"></i> Print</button>
              </div>
              <div class="card-body">
                <div class="container"id="printElement">
                  <div class="row invoice-info d-flex p-0 m-0" style="line-height: 18px;">
                    <div class="col-sm-2">
                      <img src="../images/stii.png"  alt="" style="margin-left: 90px;"  width="75">
                    </div>    
                    <div class="col-sm-8 invoice-col text-center">
                      <address>
                        <!-- Republic of the Philippines<br> -->
                        <strong>SIBUGAY TECHNICAL, INSTITUTE, INC.</strong><br>
                        Lower Taway, Ipil, Zamboanga Sibugay<br>
                        Email address: sibugaytech07@gmail.com <br>
                        www.sibugaytech.edu.ph
                      </address>
                    </div>
                    <div class="col-sm-12">
                      <!-- <center>
                        <small>Multi-Purpose Barangay Hall Pildera II, Pasay City 1300, MM, Phil's, Telefax: 8853-6275; email:brgy193@gmail.com</small>
                      </center> -->
                      <div class="dropdown-divider"></div>
                    </div>

                    <div class="col-12 mb-3">
                      <p class="text-center text-bold">PERSONAL INFORMATION</p>
                      <p class="float-right" style="margin-top: -30px;"><?php echo date("d/m/Y"); ?></p>
                    </div>













                        <div class="col-6">
                          <p><b>Vaccination status:</b> <?php echo $row['vaccine_status']; ?></p>
                        </div>
                        <!--<div class="col-6">
                          <p><b>Password:</b> <?php echo $row['pass']; ?></p>
                        </div>-->
                        <div class="col-6">
                          <p><b>Full name:</b> <?php echo $row['name']; ?></p>
                        </div>
                        <div class="col-6">
                          <p><b>Year/Course:</b> <?php echo $row['grade']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Date of birth:</b> <?php echo $row['dob']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Age:</b> <?php echo $row['age']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Sex:</b> <?php echo $row['sex']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Address:</b> <?php echo $row['address']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Religion:</b> <?php echo $row['religion']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Contact number:</b> <?php echo $row['contact']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Email:</b> <?php echo $row['email']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Parent's name/Guardian:</b> <?php echo $row['parentName']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Parent/Guardian contact #:</b> 0<?php echo $row['parentContact']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>History of Present Illness:</b> <?php echo $row['illness']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Past medical history:</b> <?php echo $row['pastMedical']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>OB-GYNE and Surgical History:</b> <?php echo $row['surgicalHistory']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Blood type:</b> <?php echo $row['blood_type']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Height:</b> <?php echo $row['height']; ?></p>
                        </div>
                        <div class="col-4">
                          <p><b>Weight:</b> <?php echo $row['weight']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Known allergy to any food or drug, please specify(If applicable):</b> <?php echo $row['allergy']; ?></p>
                        </div>

                        <div class="col-12">
                          <p><b>Nutritional and Immunization:</b> <?php echo $row['nutritional_Immunization']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Family History:</b> <?php echo $row['familyHistory']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Social History:</b> <?php echo $row['socialHistory']; ?></p>
                        </div>
                        <div class="col-6">
                          <p><b>Packs/Years:</b> <?php echo $row['packsYears']; ?></p>
                        </div>
                        <div class="col-6">
                          <p><b>Environment:</b> <?php echo $row['environment']; ?></p>
                        </div>
                        <div class="col-12">
                          <h5>Review of Systems</h5>
                        </div>
                        <div class="col-12">
                          <p><b>GENERAL:</b> <?php echo $row['general']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>HEMATOLOGIC:</b> <?php echo $row['hematologic']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>ENDOCRINE:</b> <?php echo $row['endocrine']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>EXTREMITIES:</b> <?php echo $row['extremities']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>SKIN:</b> <?php echo $row['skin']; ?></p>
                        </div>
                        <div class="col-12">
                          <h5>Heent</h5>
                        </div>
                        <div class="col-12">
                          <p><b>Head:</b> <?php echo $row['head']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Eyes:</b> <?php echo $row['Eyes']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Ears:</b> <?php echo $row['ears']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Nose:</b> <?php echo $row['nose']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Mouth and Throat:</b> <?php echo $row['mouthThroat']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Neck:</b> <?php echo $row['neck']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Breast:</b> <?php echo $row['Breast']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Respiratory:</b> <?php echo $row['Respiratory']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Cardiovascular:</b> <?php echo $row['Cardiovascular']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Gastrointestinal:</b> <?php echo $row['Gastrointestinal']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Peripheral Vascular:</b> <?php echo $row['peripheralvascular']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Urinary:</b> <?php echo $row['Urinary']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Male:</b> <?php echo $row['male']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Female:</b> <?php echo $row['female']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Muscular Skeletal:</b> <?php echo $row['muscularSkeletal']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Psychiatric:</b> <?php echo $row['Psychiatric']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Neurologic:</b> <?php echo $row['Neurologic']; ?></p>
                        </div>
                        <div class="col-12">
                          <p><b>Neurologic Exam:</b> <?php echo $row['NeurologicExam']; ?></p>
                        </div>

                       
                        


                  </div>
                </div>
              </div>
              <div class="card-footer">
                  
              </div>
            </div>
         </div>
        </div>
      </div>
    </section>

    <?php } else { include '404.php'; } ?>
  
  </div>

<script src="print.js"> </script>
<?php include 'footer.php'; ?>
 

<script>
   $(window).on('load', function() {
    document.getElementById("printButton").click();
   })
 </script>