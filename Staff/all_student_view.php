<title>STII Clinic Management System | Student info</title>
<?php 
  include 'navbar.php'; 
  if(isset($_GET['student_Id'])) {
    $student_Id = $_GET['student_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$student_Id' ");
    $row = mysqli_fetch_array($fetch);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Student Info</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student Info</li>
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

              <input type="hidden" class="form-control" name="student_Id" value="<?php echo $student_Id; ?>">

              <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12 mb-3">
                          <img src="../images-users/<?php echo $row['picture'] ?>" alt="" width="150" class="d-block m-auto img-circle">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group">
                                <span class="text-dark"><b>Vaccination status</b></span>
                                <select class="form-control" name="vaccine_status" readonly>
                                  <option selected disabled value="">Select vaccine status</option>
                                  <option value="Unvaccinated" <?php if($row['vaccine_status'] == 'Unvaccinated') { echo 'selected'; } ?>>Unvaccinated</option>
                                  <option value="1st Dose" <?php if($row['vaccine_status'] == '1st Dose') { echo 'selected'; } ?>>1st Dose</option>
                                  <option value="2nd Dose" <?php if($row['vaccine_status'] == '2nd Dose') { echo 'selected'; } ?>>2nd Dose</option>
                                  <option value="1st Booster" <?php if($row['vaccine_status'] == '1st Booster') { echo 'selected'; } ?>>1st Booster</option>
                                  <option value="Fully Vaccinated" <?php if($row['vaccine_status'] == 'Fully Vaccinated') { echo 'selected'; } ?>>Fully Vaccinated</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Date registered</b></span>
                            <input type="text" class="form-control"  placeholder="Enter full name" name="name" readonly value="<?php echo date("F d, Y",strtotime($row['date_registered'])); ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Civil status</b></span>
                            <input type="text" class="form-control" name="civil_status" readonly value="<?php echo $row['civil_status']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Full name</b></span>
                              <input type="text" class="form-control"  placeholder="Enter full name" name="name" readonly value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Grade/Course</b></span>
                              <input type="text" class="form-control"  placeholder="Enter grade/course" name="grade" readonly value="<?php echo $row['grade']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Date of birth</b></span>
                              <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()" value="<?php echo $row['dob']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control"  placeholder="Enter age" name="age" readonly value="<?php echo $row['age']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <select class="form-control" name="sex" readonly>
                              <option selected disabled value="">Select sex</option>
                              <option value="Male" <?php if($row['sex'] == 'Male') { echo 'selected'; } ?>>Male</option>
                              <option value="Female" <?php if($row['sex'] == 'Female') { echo 'selected'; } ?>>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Address</b></span>
                              <textarea name="address" class="form-control" id="" placeholder="Enter address" cols="30" rows="1" readonly><?php echo $row['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Religion</b></span>
                              <input type="text" class="form-control" placeholder="Enter your religion" name="religion" value="<?php echo $row['religion']; ?>" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Contact number</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" readonly maxlength="10" value="<?php echo $row['contact']; ?>">
                              </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Email</b></span>
                              <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" readonly value="<?php echo $row['email']; ?>">
                              <small id="text" style="font-style: italic;"></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent's name</b></span>
                              <input class="form-control" placeholder="Enter Parent's name" name="parentName" readonly value="<?php echo $row['parentName']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent's contact #</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="parentContact" placeholder = "9123456789" readonly maxlength="10" value="<?php echo $row['parentContact']; ?>">
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Guardian name</b></span>
                              <input class="form-control" placeholder="Enter Guardian name" name="guardianName" required value="<?php echo $row['guardianName']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>History of Present Illness</b></span>
                              <textarea name="illness" class="form-control" placeholder="Enter History of Present Illness" id="" cols="30" rows="1" readonly><?php echo $row['illness']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Past medical history</b></span>
                              <textarea name="pastMedical" class="form-control" placeholder="Enter past medical history" id="" cols="30" rows="1" readonly><?php echo $row['pastMedical']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>OB-GYNE and Surgical History</b></span>
                              <textarea name="surgicalHistory" class="form-control" placeholder="Enter OB-GYNE and Surgical History" id="" cols="30" rows="1" readonly><?php echo $row['surgicalHistory']; ?></textarea>
                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Blood type</b></span>
                              <input class="form-control" placeholder="Blood type" name="blood_type" readonly value="<?php echo $row['blood_type']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Height</b></span>
                              <input class="form-control" placeholder="Height" name="height" readonly value="<?php echo $row['height']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Weight</b></span>
                              <input class="form-control" placeholder="Weight" name="weight" readonly value="<?php echo $row['weight']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Known allergy to any food or drug, please specify(If applicable)</b></span>
                              <textarea name="allergy" class="form-control" placeholder="Enter known allergy to any food or drug, please specify" id="" cols="30" rows="1" readonly><?php echo $row['allergy']; ?></textarea>
                            </div>
                        </div>

                        <?php 
                          $a   = $row['nutritional_Immunization'];
                          $a   = trim($a);
                          $aa  = explode(",", $a);
                          $aa  = array_map('trim', $aa);
                        ?>


                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Nutritional and Immunization</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Complete immunization" class="form-check-input position-static" type="checkbox" value="Complete immunization" name="nutritional_Immunization[]" <?php if(in_array('Complete immunization', $aa)) { echo 'checked'; } ?> disabled> 
                              <label for="Complete immunization" class="m-0">Complete immunization</label>
                           </div>
                           <div class="form-check">
                              <input id="Incomplete immunization" class="form-check-input position-static" type="checkbox" value="Incomplete immunization" name="nutritional_Immunization[]"  <?php if(in_array('Incomplete immunization', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Incomplete immunization" class="m-0">Incomplete immunization</label>
                           </div>
                           <div class="form-check">
                              <input id="Normal Filipino Diet" class="form-check-input position-static" type="checkbox" value="Normal Filipino Diet" name="nutritional_Immunization[]" <?php if(in_array('Normal Filipino Diet', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Normal Filipino Diet" class="m-0">Normal Filipino Diet</label>
                           </div>
                           <div class="form-check">
                              <input id="High Protein Diet" class="form-check-input position-static" type="checkbox" value="High Protein Diet" name="nutritional_Immunization[]"  <?php if(in_array('High Protein Diet', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="High Protein Diet" class="m-0">High Protein Diet</label>
                           </div>
                           <div class="form-check">
                              <input id="Prefers Vegetables" class="form-check-input position-static" type="checkbox" value="Prefers Vegetables" name="nutritional_Immunization[]" <?php if(in_array('Prefers Vegetables', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Prefers Vegetables" class="m-0">Prefers Vegetables</label>
                           </div>
                           <div class="form-check">
                              <input id="Prefers Canned Goods" class="form-check-input position-static" type="checkbox" value="Prefers Canned Goods" name="nutritional_Immunization[]"  <?php if(in_array('Prefers Canned Goods', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Prefers Canned Goods" class="m-0">Prefers Canned Goods</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $b   = $row['familyHistory'];
                          $b   = trim($b);
                          $bb  = explode(",", $b);
                          $bb  = array_map('trim', $bb);
                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Family History</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Asthma" class="form-check-input position-static" type="checkbox" value="Asthma" name="familyHistory[]" <?php if(in_array('Asthma', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Asthma" class="m-0">Asthma</label>
                           </div>
                           <div class="form-check">
                              <input id="Hypertension" class="form-check-input position-static" type="checkbox" value="Hypertension" name="familyHistory[]" <?php if(in_array('Hypertension', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Hypertension" class="m-0">Hypertension</label>
                           </div>
                           <div class="form-check">
                              <input id="Cancer" class="form-check-input position-static" type="checkbox" value="Cancer" name="familyHistory[]" <?php if(in_array('Cancer', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Cancer" class="m-0">Cancer</label>
                           </div>
                           <div class="form-check">
                              <input id="Boold Dyscracis" class="form-check-input position-static" type="checkbox" value="Boold Dyscracis" name="familyHistory[]" <?php if(in_array('Boold Dyscracis', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Boold Dyscracis" class="m-0">Boold Dyscracis</label>
                           </div>
                           <div class="form-check">
                              <input id="Psychiatric Diseases" class="form-check-input position-static" type="checkbox" value="Psychiatric Diseases" name="familyHistory[]" <?php if(in_array('Psychiatric Diseases', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Psychiatric Diseases" class="m-0">Psychiatric Diseases</label>
                           </div>
                           <div class="form-check">
                              <input id="DM" class="form-check-input position-static" type="checkbox" value="DM" name="familyHistory[]" <?php if(in_array('DM', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="DM" class="m-0">DM</label>
                           </div>
                           <div class="form-check">
                              <input id="Allergy" class="form-check-input position-static" type="checkbox" value="Allergy" name="familyHistory[]" <?php if(in_array('Allergy', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Allergy" class="m-0">Allergy</label>
                           </div>
                           <div class="form-check">
                              <input id="No Heradi - Familiar Diseases" class="form-check-input position-static" type="checkbox" value="No Heradi - Familiar Diseases" name="familyHistory[]" <?php if(in_array('No Heradi - Familiar Diseases', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="No Heradi - Familiar Diseases" class="m-0">No Heradi - Familiar Diseases</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $c   = $row['socialHistory'];
                          $c   = trim($c);
                          $cc  = explode(",", $c);
                          $cc  = array_map('trim', $cc);
                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Social History</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Non-Smoker" class="form-check-input position-static" type="checkbox" value="Non-Smoker" name="socialHistory[]"  <?php if(in_array('Non-Smoker', $cc)) { echo 'checked'; } ?> disabled> 
                              <label for="Non-Smoker" class="m-0">Non-Smoker</label>
                           </div>
                           <div class="form-check">
                              <input id="Smoker" class="form-check-input position-static" type="checkbox" value="Smoker" name="socialHistory[]" onclick="toggleSmoker()" <?php if(in_array('Smoker', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Smoker" class="m-0">Smoker</label>
                           </div>
                           <div class="mb-2" id="myInput2" style="display:none">
                              <span class="text-dark"><b>Packs/Years</b></span>
                              <input type="text" id="packs" class="form-control form-control-sm" name="packsYears" placeholder="Enter packs/years" value="<?php echo $row['packsYears']; ?>" readonly>
                           </div>
                           <div class="mb-2" id="myInput3" style="display:none">
                              <span class="text-dark"><b>Environment</b></span>
                              <input type="text" id="environ" class="form-control form-control-sm" name="environment" placeholder="Enter environment" value="<?php echo $row['environment']; ?>" readonly>
                           </div>
                           <script>
                            function toggleSmoker() {
                              var checkBox = document.getElementById("Smoker");
                              var inputField2 = document.getElementById("myInput2");
                              var inputField3 = document.getElementById("myInput3");
                              var packs = document.getElementById("packs");
                              var environ = document.getElementById("environ");

                              if (checkBox.checked == true) {
                                inputField2.style.display = "block";
                                inputField3.style.display = "block";
                                // packs.value = "";
                                // environ.value = "";
                              } else {
                                inputField2.style.display = "none";
                                inputField3.style.display = "none";
                                packs.value = "NA";
                                environ.value = "NA";
                              }
                            }
                          </script>


                           <div class="form-check">
                              <input id="Non-Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Non-Alcoholic Beverage Drinker" name="socialHistory[]" <?php if(in_array('Non-Alcoholic Beverage Drinker', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Non-Alcoholic Beverage Drinker" class="m-0">Non-Alcoholic Beverage Drinker</label>
                           </div>
                           <div class="form-check">
                              <input id="Occasional Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Occasional Alcoholic Beverage Drinker" name="socialHistory[]" <?php if(in_array('Occasional Alcoholic Beverage Drinker', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Occasional Alcoholic Beverage Drinker" class="m-0">Occasional Alcoholic Beverage Drinker</label>
                           </div>
                           <div class="form-check">
                              <input id="Frequent Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Frequent Alcoholic Beverage Drinker" name="socialHistory[]" onclick="toggle()" <?php if(in_array('Frequent Alcoholic Beverage Drinker', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Frequent Alcoholic Beverage Drinker" class="m-0">Frequent Alcoholic Beverage Drinker</label>
                           </div>
                           <div id="myInput" style="display:none">
                              <span class="text-dark"><b>Frequency</b></span>
                              <input type="text" id="frequency" class="form-control form-control-sm" name="frequency" placeholder="Enter frequency" value="<?php echo $row['frequency']; ?>" readonly/>
                           </div>
                          </div>
                        </div>
                        
                        <script>
                          function toggle() {
                            var checkBox = document.getElementById("Frequent Alcoholic Beverage Drinker");
                            var inputField = document.getElementById("myInput");
                            var frequency = document.getElementById("frequency");
                            if (checkBox.checked == true) {
                              inputField.style.display = "block";
                              // frequency.value = "";
                            } else {
                              inputField.style.display = "none";
                              frequency.value = "NA";
                            }
                          }
                        </script>



                        <?php 
                          $d   = $row['general'];
                          $d   = trim($d);
                          $dd  = explode(",", $d);
                          $dd  = array_map('trim', $dd);
                        ?>
                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>Review of Systems</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>GENERAL</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Weight loss" class="form-check-input position-static" type="checkbox" value="Weight loss" name="general[]" <?php if(in_array('Weight loss', $dd)) { echo 'checked'; } ?> disabled> 
                              <label for="Weight loss" class="m-0">Weight loss</label>
                           </div>
                           <div class="form-check">
                              <input id="Weakness" class="form-check-input position-static" type="checkbox" value="Weakness" name="general[]" <?php if(in_array('Weakness', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="Weakness" class="m-0">Weakness</label>
                           </div>
                           <div class="form-check">
                              <input id="Fatigue" class="form-check-input position-static" type="checkbox" value="Fatigue" name="general[]" <?php if(in_array('Fatigue', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="Fatigue" class="m-0">Fatigue</label>
                           </div>
                           <div class="form-check">
                              <input id="Fever" class="form-check-input position-static" type="checkbox" value="Fever" name="general[]" <?php if(in_array('Fever', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="Fever" class="m-0">Fever</label>
                           </div>
                           <div class="form-check">
                              <input id="None" class="form-check-input position-static" type="checkbox" value="None" name="general[]" <?php if(in_array('None', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="None" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $e   = $row['hematologic'];
                          $e   = trim($e);
                          $ee  = explode(",", $e);
                          $ee  = array_map('trim', $ee);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>HEMATOLOGIC</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Anemia" class="form-check-input position-static" type="checkbox" value="Anemia" name="hematologic[]" <?php if(in_array('Anemia', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Anemia" class="m-0">Anemia</label>
                           </div>
                           <div class="form-check">
                              <input id="Easy Bruising or Bleeding" class="form-check-input position-static" type="checkbox" value="Easy Bruising or Bleeding" name="hematologic[]" <?php if(in_array('Easy Bruising or Bleeding', $ee)) { echo 'checked'; } ?> disabled>
                              <label for="Easy Bruising or Bleeding" class="m-0">Easy Bruising or Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="Past Transfusion" class="form-check-input position-static" type="checkbox" value="Past Transfusion" name="hematologic[]" <?php if(in_array('Past Transfusion', $ee)) { echo 'checked'; } ?> disabled>
                              <label for="Past Transfusion" class="m-0">Past Transfusion</label>
                           </div>
                           <div class="form-check">
                              <input id="None2" class="form-check-input position-static" type="checkbox" value="None" name="hematologic[]" <?php if(in_array('None', $ee)) { echo 'checked'; } ?> disabled>
                              <label for="None2" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $f   = $row['endocrine'];
                          $f   = trim($f);
                          $ff  = explode(",", $f);
                          $ff  = array_map('trim', $ff);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>ENDOCRINE</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Heat and Cold Tolerance" class="form-check-input position-static" type="checkbox" value="Heat and Cold Tolerance" name="endocrine[]" <?php if(in_array('Heat and Cold Tolerance', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Heat and Cold Tolerance" class="m-0">Heat and Cold Tolerance</label>
                           </div>
                           <div class="form-check">
                              <input id="Excessive Sweating" class="form-check-input position-static" type="checkbox" value="Excessive Sweating" name="endocrine[]" <?php if(in_array('Excessive Sweating', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Excessive Sweating" class="m-0">Excessive Sweating</label>
                           </div>
                           <div class="form-check">
                              <input id="Excessive Thirst or Hunger" class="form-check-input position-static" type="checkbox" value="Excessive Thirst or Hunger" name="endocrine[]" <?php if(in_array('Excessive Thirst or Hunger', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Excessive Thirst or Hunger" class="m-0">Excessive Thirst or Hunger</label>
                           </div>
                           <div class="form-check">
                              <input id="Polyuria" class="form-check-input position-static" type="checkbox" value="Polyuria" name="endocrine[]" <?php if(in_array('Polyuria', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Polyuria" class="m-0">Polyuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Change in shoe size" class="form-check-input position-static" type="checkbox" value="Change in shoe size" name="endocrine[]" <?php if(in_array('Change in shoe size', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Change in shoe size" class="m-0">Change in shoe size</label>
                           </div>
                           <div class="form-check">
                              <input id="None3" class="form-check-input position-static" type="checkbox" value="None" name="endocrine[]" <?php if(in_array('None', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="None3" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $g   = $row['extremities'];
                          $g   = trim($g);
                          $gg  = explode(",", $g);
                          $gg  = array_map('trim', $gg);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>EXTREMITIES</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Good Pulse" class="form-check-input position-static" type="checkbox" value="Good Pulse" name="extremities[]" <?php if(in_array('Good Pulse', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Good Pulse" class="m-0">Good Pulse</label>
                           </div>
                           <div class="form-check">
                              <input id="Weak Pulse" class="form-check-input position-static" type="checkbox" value="Weak Pulse" name="extremities[]" <?php if(in_array('Weak Pulse', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="Weak Pulse" class="m-0">Weak Pulse</label>
                           </div>
                           <div class="form-check">
                              <input id="CRT <2s" class="form-check-input position-static" type="checkbox" value="CRT <2s" name="extremities[]" <?php if(in_array('CRT <2s', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="CRT <2s" class="m-0">CRT <2s</label>
                           </div>
                           <div class="form-check">
                              <input id="Edema" class="form-check-input position-static" type="checkbox" value="Edema" name="extremities[]" <?php if(in_array('Edema', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="Edema" class="m-0">Edema</label>
                           </div>
                           <div class="form-check">
                              <input id="Limited ROM" class="form-check-input position-static" type="checkbox" value="Limited ROM" name="extremities[]" <?php if(in_array('Limited ROM', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="Limited ROM" class="m-0">Limited ROM</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $h  = $row['skin'];
                          $h  = trim($h);
                          $hh = explode(",", $h);
                          $hh = array_map('trim', $hh);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>SKIN</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Rashes" class="form-check-input position-static" type="checkbox" value="Rashes" name="skin[]" <?php if(in_array('Rashes', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Rashes" class="m-0">Rashes</label>
                           </div>
                           <div class="form-check">
                              <input id="Lumps" class="form-check-input position-static" type="checkbox" value="Lumps" name="skin[]" <?php if(in_array('Lumps', $hh)) { echo 'checked'; } ?> disabled>
                              <label for="Lumps" class="m-0">Lumps</label>
                           </div>
                           <div class="form-check">
                              <input id="Itching" class="form-check-input position-static" type="checkbox" value="Itching" name="skin[]" <?php if(in_array('Itching', $hh)) { echo 'checked'; } ?> disabled>
                              <label for="Itching" class="m-0">Itching</label>
                           </div>
                           <div class="form-check">
                              <input id="Moles" class="form-check-input position-static" type="checkbox" value="Moles" name="skin[]" <?php if(in_array('Moles', $hh)) { echo 'checked'; } ?> disabled>
                              <label for="Moles" class="m-0">Moles</label>
                           </div>
                           <div class="form-check">
                              <input id="None4" class="form-check-input position-static" type="checkbox" value="None" name="skin[]" <?php if(in_array('None', $hh)) { echo 'checked'; } ?> disabled>
                              <label for="None4" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $i  = $row['head'];
                          $i  = trim($i);
                          $ii = explode(",", $i);
                          $ii = array_map('trim', $ii);
                        ?>

                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>HEENT</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Head</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Headache" class="form-check-input position-static" type="checkbox" value="Headache" name="head[]" <?php if(in_array('Headache', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Headache" class="m-0">Headache</label>
                           </div>
                           <div class="form-check">
                              <input id="Diziness" class="form-check-input position-static" type="checkbox" value="Diziness" name="head[]" <?php if(in_array('Diziness', $ii)) { echo 'checked'; } ?> disabled>
                              <label for="Diziness" class="m-0">Diziness</label>
                           </div>
                           <div class="form-check">
                              <input id="Head injury" class="form-check-input position-static" type="checkbox" value="Head injury" name="head[]" <?php if(in_array('Head injury', $ii)) { echo 'checked'; } ?> disabled>
                              <label for="Head injury" class="m-0">Head injury</label>
                           </div>
                           <div class="form-check">
                              <input id="None5" class="form-check-input position-static" type="checkbox" value="None" name="head[]" <?php if(in_array('None', $ii)) { echo 'checked'; } ?> disabled>
                              <label for="None5" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $j  = $row['Eyes'];
                          $j  = trim($j);
                          $jj = explode(",", $j);
                          $jj = array_map('trim', $jj);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Eyes</b></a></span>
                          <div class="form-group">
                           <div class="form-group m-0">
                              <span class="text-dark"><b>Vision</b></span>
                              <input type="text" class="form-control-sm form-control" placeholder="Enter vision" name="vision" value="<?php echo $row['vision']; ?>" readonly> 
                           </div>
                           <div class="form-check">
                              <input id="Glasses or Contact Lens" class="form-check-input position-static" type="checkbox" value="Glasses or Contact Lens" name="Eyes[]" <?php if(in_array('Glasses or Contact Lens', $jj)) { echo 'checked'; } ?> disabled>
                              <label for="Glasses or Contact Lens" class="m-0">Glasses or Contact Lens</label>
                           </div>
                           <div class="form-check">
                              <input id="Redness" class="form-check-input position-static" type="checkbox" value="Redness" name="Eyes[]" <?php if(in_array('Redness', $jj)) { echo 'checked'; } ?> disabled>
                              <label for="Redness" class="m-0">Redness</label>
                           </div>
                           <div class="form-check">
                              <input id="Eye pain" class="form-check-input position-static" type="checkbox" value="Eye pain" name="Eyes[]" <?php if(in_array('Eye pain', $jj)) { echo 'checked'; } ?> disabled>
                              <label for="Eye pain" class="m-0">Eye pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Blurring of Vision" class="form-check-input position-static" type="checkbox" value="Blurring of Vision" name="Eyes[]" <?php if(in_array('Blurring of Vision', $jj)) { echo 'checked'; } ?> disabled>
                              <label for="Blurring of Vision" class="m-0">Blurring of Vision</label>
                           </div>
                           <div class="form-check">
                              <input id="None6" class="form-check-input position-static" type="checkbox" value="None" name="Eyes[]" <?php if(in_array('None', $jj)) { echo 'checked'; } ?> disabled>
                              <label for="None6" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $k  = $row['ears'];
                          $k  = trim($k);
                          $kk = explode(",", $k);
                          $kk = array_map('trim', $kk);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Ears</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Tinnitus" class="form-check-input position-static" type="checkbox" value="Tinnitus" name="ears[]" <?php if(in_array('Tinnitus', $kk)) { echo 'checked'; } ?> disabled>
                              <label for="Tinnitus" class="m-0">Tinnitus</label>
                           </div>
                           <div class="form-check">
                              <input id="Vertigo" class="form-check-input position-static" type="checkbox" value="Vertigo" name="ears[]" <?php if(in_array('Vertigo', $kk)) { echo 'checked'; } ?> disabled>
                              <label for="Vertigo" class="m-0">Vertigo</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear infection" class="form-check-input position-static" type="checkbox" value="Ear infection" name="ears[]" <?php if(in_array('Ear infection', $kk)) { echo 'checked'; } ?> disabled>
                              <label for="Ear infection" class="m-0">Ear infection</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear Discharge" class="form-check-input position-static" type="checkbox" value="Ear Discharge" name="ears[]" <?php if(in_array('Ear Discharge', $kk)) { echo 'checked'; } ?> disabled>
                              <label for="Ear Discharge" class="m-0">Ear Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear Pain" class="form-check-input position-static" type="checkbox" value="Ear Pain" name="ears[]" <?php if(in_array('Ear Pain', $kk)) { echo 'checked'; } ?> disabled>
                              <label for="Ear Pain" class="m-0">Ear Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="None7" class="form-check-input position-static" type="checkbox" value="None" name="ears[]" <?php if(in_array('None', $kk)) { echo 'checked'; } ?> disabled>
                              <label for="None7" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $l  = $row['nose'];
                          $l  = trim($l);
                          $ll = explode(",", $l);
                          $ll = array_map('trim', $ll);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Nose</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nasal Discharge" class="form-check-input position-static" type="checkbox" value="Nasal Discharge" name="nose[]" <?php if(in_array('Nasal Discharge', $ll)) { echo 'checked'; } ?> disabled>
                              <label for="Nasal Discharge" class="m-0">Nasal Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="Nose Bleeding" class="form-check-input position-static" type="checkbox" value="Nose Bleeding" name="nose[]" <?php if(in_array('Nose Bleeding', $ll)) { echo 'checked'; } ?> disabled>
                              <label for="Nose Bleeding" class="m-0">Nose Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="None8" class="form-check-input position-static" type="checkbox" value="None" name="nose[]" <?php if(in_array('None', $ll)) { echo 'checked'; } ?> disabled>
                              <label for="None8" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $m  = $row['mouthThroat'];
                          $m  = trim($m);
                          $mm = explode(",", $m);
                          $mm = array_map('trim', $mm);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Mouth and Throat</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Bleeding Gums" class="form-check-input position-static" type="checkbox" value="Bleeding Gums" name="mouthThroat[]"  <?php if(in_array('Bleeding Gums', $mm)) { echo 'checked'; } ?> disabled>
                              <label for="Bleeding Gums" class="m-0">Bleeding Gums</label>
                           </div>
                           <div class="form-check">
                              <input id="Use of Dentures" class="form-check-input position-static" type="checkbox" value="Use of Dentures" name="mouthThroat[]" onclick="toggleDentures()" <?php if(in_array('Use of Dentures', $mm)) { echo 'checked'; } ?> disabled>
                              <label for="Use of Dentures" class="m-0">Use of Dentures</label>
                           </div>
                           <div class="mb-2" id="myInput4" style="display:none">
                              <span class="text-dark"><b>Years/Months</b></span>
                              <input type="text" id="yearsMonths" class="form-control form-control-sm" name="yearsMonths" placeholder="Enter Years/Months" value="<?php echo $row['yearsMonths']; ?>" readonly/>
                           </div>
                           <div class="form-check">
                              <input id="Sore Throat" class="form-check-input position-static" type="checkbox" value="Sore Throat" name="mouthThroat[]" <?php if(in_array('Sore Throat', $mm)) { echo 'checked'; } ?> disabled>
                              <label for="Sore Throat" class="m-0">Sore Throat</label>
                           </div>
                           <div class="form-check">
                              <input id="None9" class="form-check-input position-static" type="checkbox" value="None" name="mouthThroat[]" <?php if(in_array('None', $mm)) { echo 'checked'; } ?> disabled>
                              <label for="None9" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <script>
                          function toggleDentures() {
                            var checkBox = document.getElementById("Use of Dentures");
                            var inputField = document.getElementById("myInput4");
                            var yearsMonths = document.getElementById("yearsMonths");
                            if (checkBox.checked == true) {
                              inputField.style.display = "block";
                              // yearsMonths.value = "";
                            } else {
                              inputField.style.display = "none";
                              yearsMonths.value = "NA";
                            }
                          }
                        </script>



                        <?php 
                          $n  = $row['neck'];
                          $n  = trim($n);
                          $nn = explode(",", $n);
                          $nn = array_map('trim', $nn);
                        ?>


                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Neck</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Goiter" class="form-check-input position-static" type="checkbox" value="Goiter" name="neck[]" <?php if(in_array('Goiter', $nn)) { echo 'checked'; } ?> disabled>
                              <label for="Goiter" class="m-0">Goiter</label>
                           </div>
                           <div class="form-check">
                              <input id="Lamps" class="form-check-input position-static" type="checkbox" value="Lamps" name="neck[]" <?php if(in_array('Lamps', $nn)) { echo 'checked'; } ?> disabled>
                              <label for="Lamps" class="m-0">Lamps</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain" class="form-check-input position-static" type="checkbox" value="Pain" name="neck[]" <?php if(in_array('Pain', $nn)) { echo 'checked'; } ?> disabled>
                              <label for="Pain" class="m-0">Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="None10" class="form-check-input position-static" type="checkbox" value="None" name="neck[]" <?php if(in_array('None', $nn)) { echo 'checked'; } ?> disabled>
                              <label for="None10" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $o  = $row['Breast'];
                          $o  = trim($o);
                          $oo = explode(",", $o);
                          $oo = array_map('trim', $oo);
                        ?>

                         <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Breast</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Lumps2" class="form-check-input position-static" type="checkbox" value="Lumps" name="Breast[]" <?php if(in_array('Lumps', $oo)) { echo 'checked'; } ?> disabled>
                              <label for="Lumps2" class="m-0">Lumps</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain2" class="form-check-input position-static" type="checkbox" value="Pain" name="Breast[]" <?php if(in_array('Pain', $oo)) { echo 'checked'; } ?> disabled>
                              <label for="Pain2" class="m-0">Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Nipple Discharge" class="form-check-input position-static" type="checkbox" value="Nipple Discharge" name="Breast[]" <?php if(in_array('Nipple Discharge', $oo)) { echo 'checked'; } ?> disabled>
                              <label for="Nipple Discharge" class="m-0">Nipple Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="None11" class="form-check-input position-static" type="checkbox" value="None" name="Breast[]" <?php if(in_array('None', $oo)) { echo 'checked'; } ?> disabled>
                              <label for="None11" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $p  = $row['Respiratory'];
                          $p  = trim($p);
                          $pp = explode(",", $p);
                          $pp = array_map('trim', $pp);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Respiratory</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Cough" class="form-check-input position-static" type="checkbox" value="Cough" name="Respiratory[]" <?php if(in_array('Cough', $pp)) { echo 'checked'; } ?> disabled>
                              <label for="Cough" class="m-0">Cough</label>
                           </div>
                           <div class="form-check">
                              <input id="Haemoptysis" class="form-check-input position-static" type="checkbox" value="Haemoptysis" name="Respiratory[]"<?php if(in_array('Haemoptysis', $pp)) { echo 'checked'; } ?> disabled>
                              <label for="Haemoptysis" class="m-0">Haemoptysis</label>
                           </div>
                           <div class="form-check">
                              <input id="Dyspnea" class="form-check-input position-static" type="checkbox" value="Dyspnea" name="Respiratory[]" <?php if(in_array('Dyspnea', $pp)) { echo 'checked'; } ?> disabled>
                              <label for="Dyspnea" class="m-0">Dyspnea</label>
                           </div>
                           <div class="form-check">
                              <input id="None12" class="form-check-input position-static" type="checkbox" value="None" name="Respiratory[]" <?php if(in_array('None', $pp)) { echo 'checked'; } ?> disabled>
                              <label for="None12" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $q  = $row['Cardiovascular'];
                          $q  = trim($q);
                          $qq = explode(",", $q);
                          $qq = array_map('trim', $qq);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Cardiovascular</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Chest Pain" class="form-check-input position-static" type="checkbox" value="Chest Pain" name="Cardiovascular[]" <?php if(in_array('Chest Pain', $qq)) { echo 'checked'; } ?> disabled>
                              <label for="Chest Pain" class="m-0">Chest Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Palpitation" class="form-check-input position-static" type="checkbox" value="Palpitation" name="Cardiovascular[]" <?php if(in_array('Palpitation', $qq)) { echo 'checked'; } ?> disabled>
                              <label for="Palpitation" class="m-0">Palpitation</label>
                           </div>
                           <div class="form-check">
                              <input id="Edema2" class="form-check-input position-static" type="checkbox" value="Edema" name="Cardiovascular[]"  <?php if(in_array('Edema', $qq)) { echo 'checked'; } ?> disabled>
                              <label for="Edema2" class="m-0">Edema</label>
                           </div>
                           <div class="form-check">
                              <input id="None13" class="form-check-input position-static" type="checkbox" value="None" name="Cardiovascular[]"  <?php if(in_array('None', $qq)) { echo 'checked'; } ?> disabled>
                              <label for="None13" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $r  = $row['Gastrointestinal'];
                          $r  = trim($r);
                          $rr = explode(",", $r);
                          $rr = array_map('trim', $rr);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Gastrointestinal</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Difficulty Swallowing" class="form-check-input position-static" type="checkbox" value="Difficulty Swallowing" name="Gastrointestinal[]" <?php if(in_array('Difficulty Swallowing', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Difficulty Swallowing" class="m-0">Difficulty Swallowing</label>
                           </div>
                           <div class="form-check">
                              <input id="Heart Burn" class="form-check-input position-static" type="checkbox" value="Heart Burn" name="Gastrointestinal[]" <?php if(in_array('Heart Burn', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Heart Burn" class="m-0">Heart Burn</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain w/ Defecation" class="form-check-input position-static" type="checkbox" value="Pain w/ Defecation" name="Gastrointestinal[]" <?php if(in_array('Pain w/ Defecation', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Pain w/ Defecation" class="m-0">Pain w/ Defecation</label>
                           </div>
                           <div class="form-check">
                              <input id="Abdominal Pain" class="form-check-input position-static" type="checkbox" value="Abdominal Pain" name="Gastrointestinal[]" <?php if(in_array('Abdominal Pain', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Abdominal Pain" class="m-0">Abdominal Pain</label>
                           </div>
                          </div>
                        </div>


                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Haemorrhoids" class="form-check-input position-static" type="checkbox" value="Haemorrhoids" name="Gastrointestinal[]"  <?php if(in_array('Haemorrhoids', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Haemorrhoids" class="m-0">Haemorrhoids</label>
                           </div>
                           <div class="form-check">
                              <input id="Constipation" class="form-check-input position-static" type="checkbox" value="Constipation" name="Gastrointestinal[]" <?php if(in_array('Constipation', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Constipation" class="m-0">Constipation</label>
                           </div>
                           <div class="form-check">
                              <input id="Diarrhoea" class="form-check-input position-static" type="checkbox" value="Diarrhoea" name="Gastrointestinal[]" <?php if(in_array('Diarrhoea', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Diarrhoea" class="m-0">Diarrhoea</label>
                           </div>
                           <div class="form-check">
                              <input id="Hepatitis" class="form-check-input position-static" type="checkbox" value="Hepatitis" name="Gastrointestinal[]"  <?php if(in_array('Hepatitis', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Hepatitis" class="m-0">Hepatitis</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Loss of Appetite" class="form-check-input position-static" type="checkbox" value="Loss of Appetite" name="Gastrointestinal[]"  <?php if(in_array('Loss of Appetite', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Loss of Appetite" class="m-0">Loss of Appetite</label>
                           </div>
                           <div class="form-check">
                              <input id="Nausea & Vomiting" class="form-check-input position-static" type="checkbox" value="Nausea & Vomiting" name="Gastrointestinal[]" <?php if(in_array('Nausea & Vomiting', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Nausea & Vomiting" class="m-0">Nausea & Vomiting</label>
                           </div>
                           <div class="form-check">
                              <input id="Rectal Bleeding" class="form-check-input position-static" type="checkbox" value="Rectal Bleeding" name="Gastrointestinal[]"  <?php if(in_array('Rectal Bleeding', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Rectal Bleeding" class="m-0">Rectal Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="Black Stool" class="form-check-input position-static" type="checkbox" value="Black Stool" name="Gastrointestinal[]"  <?php if(in_array('Black Stool', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="Black Stool" class="m-0">Black Stool</label>
                           </div>
                           <div class="form-check">
                              <input id="None14" class="form-check-input position-static" type="checkbox" value="None" name="Gastrointestinal[]"  <?php if(in_array('None', $rr)) { echo 'checked'; } ?> disabled>
                              <label for="None14" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $s  = $row['peripheralvascular'];
                          $s  = trim($s);
                          $ss = explode(",", $s);
                          $ss = array_map('trim', $ss);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Peripheral Vascular</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Leg Cramps" class="form-check-input position-static" type="checkbox" value="Leg Cramps" name="peripheralvascular[]" <?php if(in_array('Leg Cramps', $ss)) { echo 'checked'; } ?> disabled>
                              <label for="Leg Cramps" class="m-0">Leg Cramps</label>
                           </div>
                           <div class="form-check">
                              <input id="Varicose Veins" class="form-check-input position-static" type="checkbox" value="Varicose Veins" name="peripheralvascular[]" <?php if(in_array('Varicose Veins', $ss)) { echo 'checked'; } ?> disabled>
                              <label for="Varicose Veins" class="m-0">Varicose Veins</label>
                           </div>
                           <div class="form-check">
                              <input id="Swellign in Legs or Feet" class="form-check-input position-static" type="checkbox" value="Swellign in Legs or Feet" name="peripheralvascular[]" <?php if(in_array('Swellign in Legs or Feet', $ss)) { echo 'checked'; } ?> disabled>
                              <label for="Swellign in Legs or Feet" class="m-0">Swellign in Legs or Feet</label>
                           </div>
                           <div class="form-check">
                              <input id="None15" class="form-check-input position-static" type="checkbox" value="None" name="peripheralvascular[]" <?php if(in_array('None', $ss)) { echo 'checked'; } ?> disabled>
                              <label for="None15" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $t  = $row['Urinary'];
                          $t  = trim($t);
                          $tt = explode(",", $t);
                          $tt = array_map('trim', $tt);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Urinary</b></a></span>
                          <div class="form-group m-0">
                              <span class="text-dark"><b>Frequency of Urination</b></span>
                              <input type="text" class="form-control-sm form-control" placeholder="Enter frequency of urinary" name="freq_urinary" value="<?php echo $row['freq_urinary']; ?>" readonly> 
                          </div>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Polyuria2" class="form-check-input position-static" type="checkbox" value="Polyuria" name="Urinary[]" <?php if(in_array('Polyuria', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="Polyuria2" class="m-0">Polyuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Dysuria" class="form-check-input position-static" type="checkbox" value="Dysuria" name="Urinary[]" <?php if(in_array('Dysuria', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="Dysuria" class="m-0">Dysuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Haematuria" class="form-check-input position-static" type="checkbox" value="Haematuria" name="Urinary[]" <?php if(in_array('Haematuria', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="Haematuria" class="m-0">Haematuria</label>
                           </div>
                           <div class="form-check">
                              <input id="None16" class="form-check-input position-static" type="checkbox" value="None" name="Urinary[]" <?php if(in_array('None', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="None16" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Kidney Stone" class="form-check-input position-static" type="checkbox" value="Kidney Stone" name="Urinary[]"  <?php if(in_array('Kidney Stone', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="Kidney Stone" class="m-0">Kidney Stone</label>
                           </div>
                           <div class="form-check">
                              <input id="UTI" class="form-check-input position-static" type="checkbox" value="UTI" name="Urinary[]" <?php if(in_array('UTI', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="UTI" class="m-0">UTI</label>
                           </div>
                           <div class="form-check">
                              <input id="None17" class="form-check-input position-static" type="checkbox" value="None" name="Urinary[]"  <?php if(in_array('None', $tt)) { echo 'checked'; } ?> disabled>
                              <label for="None17" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $u  = $row['male'];
                          $u  = trim($u);
                          $uu = explode(",", $u);
                          $uu = array_map('trim', $uu);
                        ?>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Male</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Hernia" class="form-check-input position-static" type="checkbox" value="Hernia" name="male[]"  <?php if(in_array('Hernia', $uu)) { echo 'checked'; } ?> disabled>
                              <label for="Hernia" class="m-0">Hernia</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharges/Sore on the penis" class="form-check-input position-static" type="checkbox" value="Discharges/Sore on the penis" name="male[]" <?php if(in_array('Discharges/Sore on the penis', $uu)) { echo 'checked'; } ?> disabled>
                              <label for="Discharges/Sore on the penis" class="m-0">Discharges/Sore on the penis</label>
                           </div>
                           <div class="form-check">
                              <input id="Testicular Pain or Mass" class="form-check-input position-static" type="checkbox" value="Testicular Pain or Mass" name="male[]" <?php if(in_array('Testicular Pain or Mass', $uu)) { echo 'checked'; } ?> disabled>
                              <label for="Testicular Pain or Mass" class="m-0">Testicular Pain or Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="History of STD" class="form-check-input position-static" type="checkbox" value="History of STD" name="male[]"  <?php if(in_array('History of STD', $uu)) { echo 'checked'; } ?> disabled>
                              <label for="History of STD" class="m-0">History of STD</label>
                           </div>
                           <div class="form-check">
                              <input id="N/A" class="form-check-input position-static" type="checkbox" value="N/A" name="male[]" <?php if(in_array('N/A', $uu)) { echo 'checked'; } ?> disabled>
                              <label for="N/A" class="m-0">N/A</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $v  = $row['female'];
                          $v  = trim($v);
                          $vv = explode(",", $v);
                          $vv = array_map('trim', $vv);
                        ?>


                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Female</b></a></span>
                          <div class="form-group m-0">
                              <span class="text-dark"><b>Age of Menarche</b></span>
                              <input type="text" class="form-control-sm form-control" placeholder="Enter Age of Menarche" name="age_menarche" value="<?php echo $row['age_menarche']; ?>" readonly> 
                          </div>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Female_History of STD" class="form-check-input position-static" type="checkbox" value="History of STD" name="female[]"  <?php if(in_array('History of STD', $vv)) { echo 'checked'; } ?> disabled>
                              <label for="Female_History of STD" class="m-0">History of STD</label>
                           </div>
                           <div class="form-check">
                              <input id="Itching2" class="form-check-input position-static" type="checkbox" value="Itching" name="female[]" <?php if(in_array('Itching', $vv)) { echo 'checked'; } ?> disabled>
                              <label for="Itching2" class="m-0">Itching</label>
                           </div>
                           <div class="form-check">
                              <input id="Vaginal Discharge" class="form-check-input position-static" type="checkbox" value="Vaginal Discharge" name="female[]"  <?php if(in_array('Vaginal Discharge', $vv)) { echo 'checked'; } ?> disabled>
                              <label for="Vaginal Discharge" class="m-0">Vaginal Discharge</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Sores" class="form-check-input position-static" type="checkbox" value="Sores" name="female[]"  <?php if(in_array('Sores', $vv)) { echo 'checked'; } ?> disabled>
                              <label for="Sores" class="m-0">Sores</label>
                           </div>
                           <div class="form-check">
                              <input id="Lumps22" class="form-check-input position-static" type="checkbox" value="Lumps" name="female[]"  <?php if(in_array('Lumps', $vv)) { echo 'checked'; } ?> disabled>
                              <label for="Lumps22" class="m-0">Lumps</label>
                           </div>
                           </div>
                           <div class="form-check">
                              <input id="N/A2" class="form-check-input position-static" type="checkbox" value="N/A" name="female[]"  <?php if(in_array('N/A', $vv)) { echo 'checked'; } ?> disabled>
                              <label for="N/A2" class="m-0">N/A</label>
                           </div>
                        </div>



                        <?php 
                          $w  = $row['muscularSkeletal'];
                          $w  = trim($w);
                          $ww = explode(",", $w);
                          $ww = array_map('trim', $ww);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Muscular Skeletal</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Muscle of Joint Pain" class="form-check-input position-static" type="checkbox" value="Muscle of Joint Pain" name="muscularSkeletal[]" <?php if(in_array('Muscle of Joint Pain', $ww)) { echo 'checked'; } ?> disabled>
                              <label for="Muscle of Joint Pain" class="m-0">Muscle of Joint Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Arthritis" class="form-check-input position-static" type="checkbox" value="Arthritis" name="muscularSkeletal[]" <?php if(in_array('Arthritis', $ww)) { echo 'checked'; } ?> disabled>
                              <label for="Arthritis" class="m-0">Arthritis</label>
                           </div>
                           <div class="form-check">
                              <input id="Backache" class="form-check-input position-static" type="checkbox" value="Backache" name="muscularSkeletal[]" <?php if(in_array('Backache', $ww)) { echo 'checked'; } ?> disabled>
                              <label for="Backache" class="m-0">Backache</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Gout" class="form-check-input position-static" type="checkbox" value="Gout" name="muscularSkeletal[]" <?php if(in_array('Gout', $ww)) { echo 'checked'; } ?> disabled>
                              <label for="Gout" class="m-0">Gout</label>
                           </div>
                           <div class="form-check">
                              <input id="Inflammation" class="form-check-input position-static" type="checkbox" value="Inflammation" name="muscularSkeletal[]" <?php if(in_array('Inflammation', $ww)) { echo 'checked'; } ?> disabled>
                              <label for="Inflammation" class="m-0">Inflammation</label>
                           </div>
                           <div class="form-check">
                              <input id="History of Trauma" class="form-check-input position-static" type="checkbox" value="History of Trauma" name="muscularSkeletal[]" <?php if(in_array('History of Trauma', $ww)) { echo 'checked'; } ?> disabled>
                              <label for="History of Trauma" class="m-0">History of Trauma</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $x  = $row['Psychiatric'];
                          $x  = trim($x);
                          $xx = explode(",", $x);
                          $xx = array_map('trim', $xx);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Psychiatric</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nervousness" class="form-check-input position-static" type="checkbox" value="Nervousness" name="Psychiatric[]" <?php if(in_array('Nervousness', $xx)) { echo 'checked'; } ?> disabled>
                              <label for="Nervousness" class="m-0">Nervousness</label>
                           </div>
                           <div class="form-check">
                              <input id="Depression" class="form-check-input position-static" type="checkbox" value="Depression" name="Psychiatric[]" <?php if(in_array('Depression', $xx)) { echo 'checked'; } ?> disabled>
                              <label for="Depression" class="m-0">Depression</label>
                           </div>
                           <div class="form-check">
                              <input id="Suicide Attempts" class="form-check-input position-static" type="checkbox" value="Suicide Attempts" name="Psychiatric[]" <?php if(in_array('Suicide Attempts', $xx)) { echo 'checked'; } ?> disabled>
                              <label for="Suicide Attempts" class="m-0">Suicide Attempts</label>
                           </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="None173" class="form-check-input position-static" type="checkbox" value="None" name="Psychiatric[]" <?php if(in_array('None', $xx)) { echo 'checked'; } ?> disabled>
                              <label for="None173" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $y  = $row['Neurologic'];
                          $y  = trim($y);
                          $yy = explode(",", $y);
                          $yy = array_map('trim', $yy);
                        ?>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Neurologic</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Change of Moods" class="form-check-input position-static" type="checkbox" value="Change of Moods" name="Neurologic[]" <?php if(in_array('Change of Moods', $yy)) { echo 'checked'; } ?> disabled>
                              <label for="Change of Moods" class="m-0">Change of Moods</label>
                           </div>
                           <div class="form-check">
                              <input id="Headache2" class="form-check-input position-static" type="checkbox" value="Headache" name="Neurologic[]" <?php if(in_array('Headache', $yy)) { echo 'checked'; } ?> disabled>
                              <label for="Headache2" class="m-0">Headache</label>
                           </div>
                           <div class="form-check">
                              <input id="Dizziness" class="form-check-input position-static" type="checkbox" value="Dizziness" name="Neurologic[]" <?php if(in_array('Dizziness', $yy)) { echo 'checked'; } ?>disabled>
                              <label for="Dizziness" class="m-0">Dizziness</label>
                           </div>
                           <div class="form-check">
                              <input id="Blackouts" class="form-check-input position-static" type="checkbox" value="Blackouts" name="Neurologic[]" <?php if(in_array('Blackouts', $yy)) { echo 'checked'; } ?> disabled>
                              <label for="Blackouts" class="m-0">Blackouts</label>
                           </div>
                           <div class="form-check">
                              <input id="Loss of Sensation" class="form-check-input position-static" type="checkbox" value="Loss of Sensation" name="Neurologic[]" <?php if(in_array('Loss of Sensation', $yy)) { echo 'checked'; } ?> disabled>
                              <label for="Loss of Sensation" class="m-0">Loss of Sensation</label>
                           </div>
                           <div class="form-check">
                              <input id="Tremors" class="form-check-input position-static" type="checkbox" value="Tremors" name="Neurologic[]" <?php if(in_array('Tremors', $yy)) { echo 'checked'; } ?> disabled>
                              <label for="Tremors" class="m-0">Tremors</label>
                           </div>
                           <div class="form-check">
                              <input id="None18" class="form-check-input position-static" type="checkbox" value="None" name="Neurologic[]" <?php if(in_array('None', $yy)) { echo 'checked'; } ?> disabled>
                              <label for="None18" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $z  = $row['NeurologicExam'];
                          $z  = trim($z);
                          $zz = explode(",", $z);
                          $zz = array_map('trim', $zz);
                        ?>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Neurologic Exam</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="GCS 15" class="form-check-input position-static" type="checkbox" value="GCS 15" name="NeurologicExam[]" <?php if(in_array('GCS 15', $zz)) { echo 'checked'; } ?> disabled>
                              <label for="GCS 15" class="m-0">GCS 15</label>
                           </div>
                           <div class="form-check">
                              <input id="Oriented to Time and Place" class="form-check-input position-static" type="checkbox" value="Oriented to Time and Place" name="NeurologicExam[]" <?php if(in_array('Oriented to Time and Place', $zz)) { echo 'checked'; } ?> disabled>
                              <label for="Oriented to Time and Place" class="m-0">Oriented to Time and Place</label>
                           </div>
                           <div class="form-check">
                              <input id="Intact CN" class="form-check-input position-static" type="checkbox" value="Intact CN" name="NeurologicExam[]" <?php if(in_array('Intact CN', $zz)) { echo 'checked'; } ?> disabled>
                              <label for="Intact CN" class="m-0">Intact CN</label>
                           </div>
                           <div class="form-check">
                              <input id="5/5 Motor Strength Bilateral U/L Extremities" class="form-check-input position-static" type="checkbox" value="5/5 Motor Strength Bilateral U/L Extremities" name="NeurologicExam[]" <?php if(in_array('5/5 Motor Strength Bilateral U/L Extremities', $zz)) { echo 'checked'; } ?> disabled>
                              <label for="5/5 Motor Strength Bilateral U/L Extremities" class="m-0">5/5 Motor Strength Bilateral U/L Extremities</label>
                           </div>
                           <div class="form-check">
                              <input id="100% Sensory Bilateral U/L Extremities" class="form-check-input position-static" type="checkbox" value="100% Sensory Bilateral U/L Extremities" name="NeurologicExam[]" <?php if(in_array('100% Sensory Bilateral U/L Extremities', $zz)) { echo 'checked'; } ?> disabled>
                              <label for="100% Sensory Bilateral U/L Extremities" class="m-0">100% Sensory Bilateral U/L Extremities</label>
                           </div>
                          </div>
                        </div>



                       <?php 
                          $fetch = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE dental.patient_Id='$student_Id' ORDER BY dental.date_admitted DESC LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                       ?> 
                        

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>DENTAL </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental problem history</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Dental problem history" name="dental_history" readonly><?php echo $row['dental_history']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 m-3">
                          <p>Select which part of your teeth has/have problem</p>
                          <img src="../images/tooth.jpg" alt="" class="shadow-sm d-block m-auto">
                        </div>

                        <div class="col-6 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Enter the number of the teeth you are concerning for</b></span>
                              <input class="form-control" placeholder="Ex: 1, 2, 3" name="teeth_no" value="<?php echo $row['teeth_no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6"></div>

                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>VS/BP</b></span>
                              <input type="text" class="form-control" placeholder="Enter VS/BP" name="vs_bp" required readonly value="<?php echo $row['vs_bp']; ?>">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required readonly value="<?php echo $row['pr']; ?>">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>RR</b></span>
                              <input type="text" class="form-control" placeholder="Enter RR" name="rr" required readonly value="<?php echo $row['rr']; ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Medicine given</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Medicine given" name="medicine_given" readonly><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental advised</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Dental advised" name="dental_advised" readonly><?php echo $row['dental_advised']; ?></textarea>
                            </div>
                        </div>

                      <?php 
                        } else { 
                          $fetch = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE dental.patient_Id='$student_Id' LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                      ?>
                                                  
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>DENTAL </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental problem history</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Dental problem history" name="dental_history" readonly><?php echo $row['dental_history']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 m-3">
                          <p>Select which part of your teeth has/have problem</p>
                          <img src="../images/tooth.jpg" alt="" class="shadow-sm d-block m-auto">
                        </div>

                        <div class="col-6 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Enter the number of the teeth you are concerning for</b></span>
                              <input class="form-control" placeholder="Ex: 1, 2, 3" name="teeth_no" value="<?php echo $row['teeth_no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6"></div>

                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>VS/BP</b></span>
                              <input type="text" class="form-control" placeholder="Enter VS/BP" name="vs_bp" required readonly value="<?php echo $row['vs_bp']; ?>">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required readonly value="<?php echo $row['pr']; ?>">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>RR</b></span>
                              <input type="text" class="form-control" placeholder="Enter RR" name="rr" required readonly value="<?php echo $row['rr']; ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Medicine given</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Medicine given" name="medicine_given" readonly><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Dental advised</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Dental advised" name="dental_advised" readonly><?php echo $row['dental_advised']; ?></textarea>
                            </div>
                        </div>

                      <?php } else { ?>
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary text-center"><b>NO DENTAL RECORD</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                      <?php } } ?>






                      <?php 

                        $fetch = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE form2.patient_Id='$student_Id' ORDER BY form2.date_admitted DESC LIMIT 1");
                        if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                      ?>
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>MEDICAL RECORD </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>VS/BP</b></span>
                              <input type="text" class="form-control" placeholder="Enter VS/BP" name="vs_bp" required readonly value="<?php echo $row['vs_bp']; ?>">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required readonly value="<?php echo $row['pr']; ?>">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>RR</b></span>
                              <input type="text" class="form-control" placeholder="Enter RR" name="rr" required readonly value="<?php echo $row['rr']; ?>">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
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
                            <div class="form-group">
                              <span class="text-dark"><b>Treatment/ Medical advised</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Treatment/ Medical advised" name="medical_advised" readonly><?php echo $row['medical_advised']; ?></textarea>
                            </div>
                        </div>

                       
                      <?php 
                        } else { 
                          $fetch = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE form2.patient_Id='$student_Id' LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                            $row = mysqli_fetch_array($fetch);
                      ?> 
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>MEDICAL RECORD </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>VS/BP</b></span>
                              <input type="text" class="form-control" placeholder="Enter VS/BP" name="vs_bp" required readonly value="<?php echo $row['vs_bp']; ?>">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required readonly value="<?php echo $row['pr']; ?>">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>RR</b></span>
                              <input type="text" class="form-control" placeholder="Enter RR" name="rr" required readonly value="<?php echo $row['rr']; ?>">
                            </div>
                        </div>
                        <div class="col-3 mt-3">
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
                            <div class="form-group">
                              <span class="text-dark"><b>Treatment/ Medical advised</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Treatment/ Medical advised" name="medical_advised" readonly><?php echo $row['medical_advised']; ?></textarea>
                            </div>
                        </div>

                        
                      <?php } else { ?>

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>NO MEDICAL RECORD </b></a>
                          <div class="dropdown-divider"></div>
                        </div>

                      <?php } } ?> 


                      <?php
                        $fetch = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE physical.patient_Id='$student_Id' ORDER BY physical.date_admitted DESC LIMIT 1");
                        if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                          $user_Id = $row['user_Id'];
                      ?>

                        <?php 
                          $a   = $row['p_general'];
                          $a   = trim($a);
                          $aa  = explode(",", $a);
                          $aa  = array_map('trim', $aa);
                        ?>

                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>PHYSICAL EXAMINATION </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>General Survey</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Awake" class="form-check-input position-static" type="checkbox" value="Awake" name="p_general[]" <?php if(in_array('Awake', $aa)) { echo 'checked'; } ?> disabled> 
                              <label for="Awake" class="m-0">Awake</label>
                           </div>
                           <div class="form-check">
                              <input id="Coherent" class="form-check-input position-static" type="checkbox" value="Coherent" name="p_general[]" <?php if(in_array('Coherent', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Coherent" class="m-0">Coherent</label>
                           </div>
                           <div class="form-check">
                              <input id="Responsive" class="form-check-input position-static" type="checkbox" value="Responsive" name="p_general[]" <?php if(in_array('Responsive', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Responsive" class="m-0">Responsive</label>
                           </div>
                           <div class="form-check">
                              <input id="Well Groomed" class="form-check-input position-static" type="checkbox" value="Well Groomed" name="p_general[]" <?php if(in_array('Well Groomed', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Well Groomed" class="m-0">Well Groomed</label>
                           </div>
                          </div>
                        </div>

                        <?php 
                          $b   = $row['p_skin'];
                          $b   = trim($b);
                          $bb  = explode(",", $b);
                          $bb  = array_map('trim', $bb);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Skin</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Warrm to Touch" class="form-check-input position-static" type="checkbox" value="Warrm to Touch" name="p_skin[]" <?php if(in_array('Warrm to Touch', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Warrm to Touch" class="m-0">Warrm to Touch</label>
                           </div>
                           <div class="form-check">
                              <input id="Dry Skin" class="form-check-input position-static" type="checkbox" value="Dry Skin" name="p_skin[]"  <?php if(in_array('Dry Skin', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Dry Skin" class="m-0">Dry Skin</label>
                           </div>
                           <div class="form-check">
                              <input id="Dry Skin Turgor" class="form-check-input position-static" type="checkbox" value="Dry Skin Turgor" name="p_skin[]"  <?php if(in_array('Dry Skin Turgor', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Dry Skin Turgor" class="m-0">Dry Skin Turgor</label>
                           </div>
                           <div class="form-check">
                              <input id="Other" class="form-check-input position-static" type="checkbox" value="Other" name="p_skin[]" onclick="toggleSkin()" <?php if(in_array('Other', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Other" class="m-0">Other</label>
                           </div>
                           <div id="myInputSkin" style="display:none">
                              <span class="text-dark"><b>Specify here</b></span>
                              <input type="text" id="inputOther" class="form-control form-control-sm" name="skinOther" placeholder="Specify here..." value="<?php echo $row['skinOther']; ?>" readonly/>
                           </div>
                          </div>
                        </div>

                        <script>
                          function toggleSkin() {
                            var checkBox = document.getElementById("Other");
                            var inputField = document.getElementById("myInputSkin");
                            var inputOther = document.getElementById("inputOther");
                            if (checkBox.checked == true) {
                              inputField.style.display = "block";
                              inputOther.value = "";
                            } else {
                              inputField.style.display = "none";
                              inputOther.value = "NA";
                            }
                          }
                        </script>

                        <!-- <div class="col-lg-6 col-md-4 col-sm-6 col-12"></div> -->

                        <?php 
                          $c   = $row['p_heent'];
                          $c   = trim($c);
                          $cc  = explode(",", $c);
                          $cc  = array_map('trim', $cc);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>HEENT</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Anicteric Sclerae" class="form-check-input position-static" type="checkbox" value="Anicteric Sclerae" name="p_heent[]"  <?php if(in_array('Anicteric Sclerae', $cc)) { echo 'checked'; } ?> disabled> 
                              <label for="Anicteric Sclerae" class="m-0">Anicteric Sclerae</label>
                           </div>
                           <div class="form-check">
                              <input id="Pale Palpebral Conjunctive" class="form-check-input position-static" type="checkbox" value="Pale Palpebral Conjunctive" name="p_heent[]"  <?php if(in_array('Pale Palpebral Conjunctive', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Pale Palpebral Conjunctive" class="m-0">Pale Palpebral Conjunctive</label>
                           </div>
                           <div class="form-check"> 
                              <input id="Icyeric Sclerae" class="form-check-input position-static" type="checkbox" value="Icyeric Sclerae" name="p_heent[]"  <?php if(in_array('Icyeric Sclerae', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Icyeric Sclerae" class="m-0">Icyeric Sclerae</label>
                           </div>
                           <div class="form-check">
                              <input id="Pupils Equally Reactive to light & accomodation" class="form-check-input position-static" type="checkbox" value="Pupils Equally Reactive to light & accomodation" name="p_heent[]" <?php if(in_array('Pupils Equally Reactive to light & accomodation', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Pupils Equally Reactive to light & accomodation" class="m-0">Pupils Equally Reactive to light & accomodation</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $d   = $row['p_auditory'];
                          $d   = trim($d);
                          $dd  = explode(",", $d);
                          $dd  = array_map('trim', $dd);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>AUDITORY ACUITY</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Intact" class="form-check-input position-static" type="checkbox" value="Intact" name="p_auditory[]" <?php if(in_array('Intact', $dd)) { echo 'checked'; } ?> disabled> 
                              <label for="Intact" class="m-0">Intact</label>
                           </div>
                           <div class="form-check">
                              <input id="Non-Intact" class="form-check-input position-static" type="checkbox" value="Non-Intact" name="p_auditory[]" <?php if(in_array('Non-Intact', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="Non-Intact" class="m-0">Non-Intact</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $e   = $row['p_nose'];
                          $e   = trim($e);
                          $ee  = explode(",", $e);
                          $ee  = array_map('trim', $ee);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>NOSE</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nasal Deformity" class="form-check-input position-static" type="checkbox" value="Nasal Deformity" name="p_nose[]" <?php if(in_array('Nasal Deformity', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Nasal Deformity" class="m-0">Nasal Deformity</label>
                           </div>
                           <div class="form-check">
                              <input id="Tender Sinuses" class="form-check-input position-static" type="checkbox" value="Tender Sinuses" name="p_nose[]" <?php if(in_array('Tender Sinuses', $ee)) { echo 'checked'; } ?> disabled>
                              <label for="Tender Sinuses" class="m-0">Tender Sinuses</label>
                           </div> 
                           <div class="form-check">
                              <input id="Normal Nasal Septum" class="form-check-input position-static" type="checkbox" value="Normal Nasal Septum" name="p_nose[]" <?php if(in_array('Normal Nasal Septum', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Normal Nasal Septum" class="m-0">Normal Nasal Septum</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $f   = $row['p_mouth_throat'];
                          $f   = trim($f);
                          $ff  = explode(",", $f);
                          $ff  = array_map('trim', $ff);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>MOUTH & THROAT</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Oral Mass" class="form-check-input position-static" type="checkbox" value="Oral Mass" name="p_mouth_throat[]" <?php if(in_array('Oral Mass', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Oral Mass" class="m-0">Oral Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Inflamed Tonsils" class="form-check-input position-static" type="checkbox" value="Inflamed Tonsils" name="p_mouth_throat[]" <?php if(in_array('Inflamed Tonsils', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Inflamed Tonsils" class="m-0">Inflamed Tonsils</label>
                           </div>
                           <div class="form-check">
                              <input id="Bleeding Gums2" class="form-check-input position-static" type="checkbox" value="Bleeding Gums" name="p_mouth_throat[]" <?php if(in_array('Bleeding Gums', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Bleeding Gums2" class="m-0">Bleeding Gums</label>
                           </div>
                           <div class="form-check">
                              <input id="None20" class="form-check-input position-static" type="checkbox" value="None" name="p_mouth_throat[]" <?php if(in_array('None', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="None20" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $g   = $row['p_neck'];
                          $g   = trim($g);
                          $gg  = explode(",", $g);
                          $gg  = array_map('trim', $gg);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>NECK</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Lymphadenpathy" class="form-check-input position-static" type="checkbox" value="Lymphadenpathy" name="p_neck[]" <?php if(in_array('Lymphadenpathy', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Lymphadenpathy" class="m-0">Lymphadenpathy</label>
                           </div>
                           <div class="form-check">
                              <input id="Neck Mass" class="form-check-input position-static" type="checkbox" value="Neck Mass" name="p_neck[]" <?php if(in_array('Neck Mass', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="Neck Mass" class="m-0">Neck Mass</label>
                           </div>
                           <div class="form-check"> 
                              <input id="Tracheal Deviation" class="form-check-input position-static" type="checkbox" value="Tracheal Deviation" name="p_neck[]" <?php if(in_array('Tracheal Deviation', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Tracheal Deviation" class="m-0">Tracheal Deviation</label>
                           </div>
                           <div class="form-check">
                              <input id="None21" class="form-check-input position-static" type="checkbox" value="None" name="p_neck[]" <?php if(in_array('None', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="None21" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $h   = $row['p_breast'];
                          $h   = trim($h);
                          $hh  = explode(",", $h);
                          $hh  = array_map('trim', $hh);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>BREAST</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Mass" class="form-check-input position-static" type="checkbox" value="Mass" name="p_breast[]" <?php if(in_array('Mass', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Mass" class="m-0">Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharge" class="form-check-input position-static" type="checkbox" value="Discharge" name="p_breast[]" <?php if(in_array('Discharge', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Discharge" class="m-0">Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="None22" class="form-check-input position-static" type="checkbox" value="None" name="p_breast[]" <?php if(in_array('None', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="None22" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $i   = $row['p_cardiovascular'];
                          $i   = trim($i);
                          $ii  = explode(",", $i);
                          $ii  = array_map('trim', $ii);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>CARDIOVASCULAR</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Jugular Vein Distension" class="form-check-input position-static" type="checkbox" value="Jugular Vein Distension" name="p_cardiovascular[]" <?php if(in_array('Jugular Vein Distension', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Jugular Vein Distension" class="m-0">Jugular Vein Distension</label>
                           </div>
                           <div class="form-check">
                              <input id="Carotid Bruit" class="form-check-input position-static" type="checkbox" value="Carotid Bruit" name="p_cardiovascular[]" <?php if(in_array('Carotid Bruit', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Carotid Bruit" class="m-0">Carotid Bruit</label>
                           </div>
                           <div class="form-check">
                              <input id="Murmur" class="form-check-input position-static" type="checkbox" value="Murmur" name="p_cardiovascular[]" <?php if(in_array('Murmur', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Murmur" class="m-0">Murmur</label>
                           </div>
                           <div class="form-check">
                              <input id="Apex beat at 5th ICS" class="form-check-input position-static" type="checkbox" value="Apex beat at 5th ICS" name="p_cardiovascular[]" <?php if(in_array('Apex beat at 5th ICS', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Apex beat at 5th ICS" class="m-0">Apex beat at 5th ICS</label>
                           </div>
                           <div class="form-check">
                              <input id="Normal Rate & Rythm" class="form-check-input position-static" type="checkbox" value="Normal Rate & Rythm" name="p_cardiovascular[]" <?php if(in_array('Normal Rate & Rythm', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Normal Rate & Rythm" class="m-0">Normal Rate & Rythm</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $j   = $row['p_abdomen'];
                          $j   = trim($j);
                          $jj  = explode(",", $j);
                          $jj  = array_map('trim', $jj);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>ABDOMEN</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Flat" class="form-check-input position-static" type="checkbox" value="Flat" name="p_abdomen[]" <?php if(in_array('Flat', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Flat" class="m-0">Flat</label>
                           </div>
                           <div class="form-check">
                              <input id="Normoactive" class="form-check-input position-static" type="checkbox" value="Normoactive" name="p_abdomen[]" <?php if(in_array('Normoactive', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Normoactive" class="m-0">Normoactive</label>
                           </div>
                           <div class="form-check">
                              <input id="Tenderness" class="form-check-input position-static" type="checkbox" value="Tenderness" name="p_abdomen[]" <?php if(in_array('Tenderness', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Tenderness" class="m-0">Tenderness</label>
                           </div>
                           <div class="form-check">
                              <input id="Flabby" class="form-check-input position-static" type="checkbox" value="Flabby" name="p_abdomen[]" <?php if(in_array('Flabby', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Flabby" class="m-0">Flabby</label>
                           </div>
                           <div class="form-check">
                              <input id="Bowel Sound" class="form-check-input position-static" type="checkbox" value="Bowel Sound" name="p_abdomen[]" <?php if(in_array('Bowel Sound', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Bowel Sound" class="m-0">Bowel Sound</label>
                           </div>
                           <div class="form-check">
                              <input id="None23" class="form-check-input position-static" type="checkbox" value="None" name="p_abdomen[]" <?php if(in_array('None', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="None23" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $k   = $row['p_genitals'];
                          $k   = trim($k);
                          $kk  = explode(",", $k);
                          $kk  = array_map('trim', $kk);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>GENITALS</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Mass2" class="form-check-input position-static" type="checkbox" value="Mass" name="p_genitals[]" <?php if(in_array('Mass', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="Mass2" class="m-0">Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharges" class="form-check-input position-static" type="checkbox" value="Discharges" name="p_genitals[]" <?php if(in_array('Discharges', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="Discharges" class="m-0">Discharges</label>
                           </div>
                           <div class="form-check">
                              <input id="None24" class="form-check-input position-static" type="checkbox" value="None" name="p_genitals[]" <?php if(in_array('None', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="None24" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>CLINICAL IMPRESSION</b></a></span>
                            <div class="form-group">
                                <textarea name="clinical_impression" id="" cols="30" rows="3" class="form-control" placeholder="Enter clinical impression..." disabled><?php echo $row['clinical_impression']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>POTENTIAL RISK</b></a></span>
                            <div class="form-group">
                                <textarea name="potential_risk" id="" cols="30" rows="2" class="form-control" placeholder="Enter potential_risk..." disabled><?php echo $row['potential_risk']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>PLAN/MEDICATION</b></a></span>
                            <div class="form-group">
                                <textarea name="plan_medication" id="" cols="30" rows="2" class="form-control" placeholder="Enter plan/medication..." disabled><?php echo $row['plan_medication']; ?></textarea>
                            </div>
                        </div>

                      <?php 
                        } else { 
                          $fetch = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE physical.patient_Id='$student_Id' LIMIT 1");
                        if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                          $user_Id = $row['user_Id'];
                      ?>
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>PHYSICAL EXAMINATION </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>General Survey</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Awake" class="form-check-input position-static" type="checkbox" value="Awake" name="p_general[]" <?php if(in_array('Awake', $aa)) { echo 'checked'; } ?> disabled> 
                              <label for="Awake" class="m-0">Awake</label>
                           </div>
                           <div class="form-check">
                              <input id="Coherent" class="form-check-input position-static" type="checkbox" value="Coherent" name="p_general[]" <?php if(in_array('Coherent', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Coherent" class="m-0">Coherent</label>
                           </div>
                           <div class="form-check">
                              <input id="Responsive" class="form-check-input position-static" type="checkbox" value="Responsive" name="p_general[]" <?php if(in_array('Responsive', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Responsive" class="m-0">Responsive</label>
                           </div>
                           <div class="form-check">
                              <input id="Well Groomed" class="form-check-input position-static" type="checkbox" value="Well Groomed" name="p_general[]" <?php if(in_array('Well Groomed', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Well Groomed" class="m-0">Well Groomed</label>
                           </div>
                          </div>
                        </div>

                        <?php 
                          $b   = $row['p_skin'];
                          $b   = trim($b);
                          $bb  = explode(",", $b);
                          $bb  = array_map('trim', $bb);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Skin</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Warrm to Touch" class="form-check-input position-static" type="checkbox" value="Warrm to Touch" name="p_skin[]" <?php if(in_array('Warrm to Touch', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Warrm to Touch" class="m-0">Warrm to Touch</label>
                           </div>
                           <div class="form-check">
                              <input id="Dry Skin" class="form-check-input position-static" type="checkbox" value="Dry Skin" name="p_skin[]"  <?php if(in_array('Dry Skin', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Dry Skin" class="m-0">Dry Skin</label>
                           </div>
                           <div class="form-check">
                              <input id="Dry Skin Turgor" class="form-check-input position-static" type="checkbox" value="Dry Skin Turgor" name="p_skin[]"  <?php if(in_array('Dry Skin Turgor', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Dry Skin Turgor" class="m-0">Dry Skin Turgor</label>
                           </div>
                           <div class="form-check">
                              <input id="Other" class="form-check-input position-static" type="checkbox" value="Other" name="p_skin[]" onclick="toggleSkin()" <?php if(in_array('Other', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Other" class="m-0">Other</label>
                           </div>
                           <div id="myInputSkin" style="display:none">
                              <span class="text-dark"><b>Specify here</b></span>
                              <input type="text" id="inputOther" class="form-control form-control-sm" name="skinOther" placeholder="Specify here..." value="<?php echo $row['skinOther']; ?>" readonly/>
                           </div>
                          </div>
                        </div>

                        <script>
                          function toggleSkin() {
                            var checkBox = document.getElementById("Other");
                            var inputField = document.getElementById("myInputSkin");
                            var inputOther = document.getElementById("inputOther");
                            if (checkBox.checked == true) {
                              inputField.style.display = "block";
                              inputOther.value = "";
                            } else {
                              inputField.style.display = "none";
                              inputOther.value = "NA";
                            }
                          }
                        </script>

                        <!-- <div class="col-lg-6 col-md-4 col-sm-6 col-12"></div> -->

                        <?php 
                          $c   = $row['p_heent'];
                          $c   = trim($c);
                          $cc  = explode(",", $c);
                          $cc  = array_map('trim', $cc);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>HEENT</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Anicteric Sclerae" class="form-check-input position-static" type="checkbox" value="Anicteric Sclerae" name="p_heent[]"  <?php if(in_array('Anicteric Sclerae', $cc)) { echo 'checked'; } ?> disabled> 
                              <label for="Anicteric Sclerae" class="m-0">Anicteric Sclerae</label>
                           </div>
                           <div class="form-check">
                              <input id="Pale Palpebral Conjunctive" class="form-check-input position-static" type="checkbox" value="Pale Palpebral Conjunctive" name="p_heent[]"  <?php if(in_array('Pale Palpebral Conjunctive', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Pale Palpebral Conjunctive" class="m-0">Pale Palpebral Conjunctive</label>
                           </div>
                           <div class="form-check"> 
                              <input id="Icyeric Sclerae" class="form-check-input position-static" type="checkbox" value="Icyeric Sclerae" name="p_heent[]"  <?php if(in_array('Icyeric Sclerae', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Icyeric Sclerae" class="m-0">Icyeric Sclerae</label>
                           </div>
                           <div class="form-check">
                              <input id="Pupils Equally Reactive to light & accomodation" class="form-check-input position-static" type="checkbox" value="Pupils Equally Reactive to light & accomodation" name="p_heent[]" <?php if(in_array('Pupils Equally Reactive to light & accomodation', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Pupils Equally Reactive to light & accomodation" class="m-0">Pupils Equally Reactive to light & accomodation</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $d   = $row['p_auditory'];
                          $d   = trim($d);
                          $dd  = explode(",", $d);
                          $dd  = array_map('trim', $dd);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>AUDITORY ACUITY</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Intact" class="form-check-input position-static" type="checkbox" value="Intact" name="p_auditory[]" <?php if(in_array('Intact', $dd)) { echo 'checked'; } ?> disabled> 
                              <label for="Intact" class="m-0">Intact</label>
                           </div>
                           <div class="form-check">
                              <input id="Non-Intact" class="form-check-input position-static" type="checkbox" value="Non-Intact" name="p_auditory[]" <?php if(in_array('Non-Intact', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="Non-Intact" class="m-0">Non-Intact</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $e   = $row['p_nose'];
                          $e   = trim($e);
                          $ee  = explode(",", $e);
                          $ee  = array_map('trim', $ee);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>NOSE</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nasal Deformity" class="form-check-input position-static" type="checkbox" value="Nasal Deformity" name="p_nose[]" <?php if(in_array('Nasal Deformity', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Nasal Deformity" class="m-0">Nasal Deformity</label>
                           </div>
                           <div class="form-check">
                              <input id="Tender Sinuses" class="form-check-input position-static" type="checkbox" value="Tender Sinuses" name="p_nose[]" <?php if(in_array('Tender Sinuses', $ee)) { echo 'checked'; } ?> disabled>
                              <label for="Tender Sinuses" class="m-0">Tender Sinuses</label>
                           </div> 
                           <div class="form-check">
                              <input id="Normal Nasal Septum" class="form-check-input position-static" type="checkbox" value="Normal Nasal Septum" name="p_nose[]" <?php if(in_array('Normal Nasal Septum', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Normal Nasal Septum" class="m-0">Normal Nasal Septum</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $f   = $row['p_mouth_throat'];
                          $f   = trim($f);
                          $ff  = explode(",", $f);
                          $ff  = array_map('trim', $ff);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>MOUTH & THROAT</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Oral Mass" class="form-check-input position-static" type="checkbox" value="Oral Mass" name="p_mouth_throat[]" <?php if(in_array('Oral Mass', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Oral Mass" class="m-0">Oral Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Inflamed Tonsils" class="form-check-input position-static" type="checkbox" value="Inflamed Tonsils" name="p_mouth_throat[]" <?php if(in_array('Inflamed Tonsils', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Inflamed Tonsils" class="m-0">Inflamed Tonsils</label>
                           </div>
                           <div class="form-check">
                              <input id="Bleeding Gums2" class="form-check-input position-static" type="checkbox" value="Bleeding Gums" name="p_mouth_throat[]" <?php if(in_array('Bleeding Gums', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Bleeding Gums2" class="m-0">Bleeding Gums</label>
                           </div>
                           <div class="form-check">
                              <input id="None20" class="form-check-input position-static" type="checkbox" value="None" name="p_mouth_throat[]" <?php if(in_array('None', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="None20" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $g   = $row['p_neck'];
                          $g   = trim($g);
                          $gg  = explode(",", $g);
                          $gg  = array_map('trim', $gg);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>NECK</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Lymphadenpathy" class="form-check-input position-static" type="checkbox" value="Lymphadenpathy" name="p_neck[]" <?php if(in_array('Lymphadenpathy', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Lymphadenpathy" class="m-0">Lymphadenpathy</label>
                           </div>
                           <div class="form-check">
                              <input id="Neck Mass" class="form-check-input position-static" type="checkbox" value="Neck Mass" name="p_neck[]" <?php if(in_array('Neck Mass', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="Neck Mass" class="m-0">Neck Mass</label>
                           </div>
                           <div class="form-check"> 
                              <input id="Tracheal Deviation" class="form-check-input position-static" type="checkbox" value="Tracheal Deviation" name="p_neck[]" <?php if(in_array('Tracheal Deviation', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Tracheal Deviation" class="m-0">Tracheal Deviation</label>
                           </div>
                           <div class="form-check">
                              <input id="None21" class="form-check-input position-static" type="checkbox" value="None" name="p_neck[]" <?php if(in_array('None', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="None21" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $h   = $row['p_breast'];
                          $h   = trim($h);
                          $hh  = explode(",", $h);
                          $hh  = array_map('trim', $hh);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>BREAST</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Mass" class="form-check-input position-static" type="checkbox" value="Mass" name="p_breast[]" <?php if(in_array('Mass', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Mass" class="m-0">Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharge" class="form-check-input position-static" type="checkbox" value="Discharge" name="p_breast[]" <?php if(in_array('Discharge', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Discharge" class="m-0">Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="None22" class="form-check-input position-static" type="checkbox" value="None" name="p_breast[]" <?php if(in_array('None', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="None22" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $i   = $row['p_cardiovascular'];
                          $i   = trim($i);
                          $ii  = explode(",", $i);
                          $ii  = array_map('trim', $ii);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>CARDIOVASCULAR</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Jugular Vein Distension" class="form-check-input position-static" type="checkbox" value="Jugular Vein Distension" name="p_cardiovascular[]" <?php if(in_array('Jugular Vein Distension', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Jugular Vein Distension" class="m-0">Jugular Vein Distension</label>
                           </div>
                           <div class="form-check">
                              <input id="Carotid Bruit" class="form-check-input position-static" type="checkbox" value="Carotid Bruit" name="p_cardiovascular[]" <?php if(in_array('Carotid Bruit', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Carotid Bruit" class="m-0">Carotid Bruit</label>
                           </div>
                           <div class="form-check">
                              <input id="Murmur" class="form-check-input position-static" type="checkbox" value="Murmur" name="p_cardiovascular[]" <?php if(in_array('Murmur', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Murmur" class="m-0">Murmur</label>
                           </div>
                           <div class="form-check">
                              <input id="Apex beat at 5th ICS" class="form-check-input position-static" type="checkbox" value="Apex beat at 5th ICS" name="p_cardiovascular[]" <?php if(in_array('Apex beat at 5th ICS', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Apex beat at 5th ICS" class="m-0">Apex beat at 5th ICS</label>
                           </div>
                           <div class="form-check">
                              <input id="Normal Rate & Rythm" class="form-check-input position-static" type="checkbox" value="Normal Rate & Rythm" name="p_cardiovascular[]" <?php if(in_array('Normal Rate & Rythm', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Normal Rate & Rythm" class="m-0">Normal Rate & Rythm</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $j   = $row['p_abdomen'];
                          $j   = trim($j);
                          $jj  = explode(",", $j);
                          $jj  = array_map('trim', $jj);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>ABDOMEN</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Flat" class="form-check-input position-static" type="checkbox" value="Flat" name="p_abdomen[]" <?php if(in_array('Flat', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Flat" class="m-0">Flat</label>
                           </div>
                           <div class="form-check">
                              <input id="Normoactive" class="form-check-input position-static" type="checkbox" value="Normoactive" name="p_abdomen[]" <?php if(in_array('Normoactive', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Normoactive" class="m-0">Normoactive</label>
                           </div>
                           <div class="form-check">
                              <input id="Tenderness" class="form-check-input position-static" type="checkbox" value="Tenderness" name="p_abdomen[]" <?php if(in_array('Tenderness', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Tenderness" class="m-0">Tenderness</label>
                           </div>
                           <div class="form-check">
                              <input id="Flabby" class="form-check-input position-static" type="checkbox" value="Flabby" name="p_abdomen[]" <?php if(in_array('Flabby', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Flabby" class="m-0">Flabby</label>
                           </div>
                           <div class="form-check">
                              <input id="Bowel Sound" class="form-check-input position-static" type="checkbox" value="Bowel Sound" name="p_abdomen[]" <?php if(in_array('Bowel Sound', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Bowel Sound" class="m-0">Bowel Sound</label>
                           </div>
                           <div class="form-check">
                              <input id="None23" class="form-check-input position-static" type="checkbox" value="None" name="p_abdomen[]" <?php if(in_array('None', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="None23" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $k   = $row['p_genitals'];
                          $k   = trim($k);
                          $kk  = explode(",", $k);
                          $kk  = array_map('trim', $kk);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>GENITALS</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Mass2" class="form-check-input position-static" type="checkbox" value="Mass" name="p_genitals[]" <?php if(in_array('Mass', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="Mass2" class="m-0">Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharges" class="form-check-input position-static" type="checkbox" value="Discharges" name="p_genitals[]" <?php if(in_array('Discharges', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="Discharges" class="m-0">Discharges</label>
                           </div>
                           <div class="form-check">
                              <input id="None24" class="form-check-input position-static" type="checkbox" value="None" name="p_genitals[]" <?php if(in_array('None', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="None24" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>CLINICAL IMPRESSION</b></a></span>
                            <div class="form-group">
                                <textarea name="clinical_impression" id="" cols="30" rows="3" class="form-control" placeholder="Enter clinical impression..." disabled><?php echo $row['clinical_impression']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>POTENTIAL RISK</b></a></span>
                            <div class="form-group">
                                <textarea name="potential_risk" id="" cols="30" rows="2" class="form-control" placeholder="Enter potential_risk..." disabled><?php echo $row['potential_risk']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>PLAN/MEDICATION</b></a></span>
                            <div class="form-group">
                                <textarea name="plan_medication" id="" cols="30" rows="2" class="form-control" placeholder="Enter plan/medication..." disabled><?php echo $row['plan_medication']; ?></textarea>
                            </div>
                        </div>
                      <?php } else { ?> 
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>NO PHYSICAL EXAMINATION RECORD </b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                      <?php } } ?>






                       <?php 
                          $fetch = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE consultation.patient_Id='$student_Id' ORDER BY consultation.date_admitted DESC LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                       ?> 
                        
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>CONSULTATION RECORDS </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Mother's maiden name</span>
                            <input type="text" class="form-control" name="mothers_maiden_name" placeholder="Enter mothers maiden name" required value="<?php echo $row['mothers_maiden_name']; ?>" readonly> 
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Chief complaints</span>
                            <textarea class="form-control" name="chief_complaints" placeholder="Enter Chief complaints" required cols="30" rows="2" disabled><?php echo $row['chief_complaints']; ?></textarea>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Temperature</span>
                            <input type="text" class="form-control" name="temperature" placeholder="Enter Temperature" required value="<?php echo $row['temperature']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">VS/BP</span>
                            <input type="text" class="form-control" name="bp" placeholder="Enter BP" value="<?php echo $row['vs_bp']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">PR</span>
                            <input type="text" class="form-control" name="bp" placeholder="Enter BP" value="<?php echo $row['pr']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">RR</span>
                            <input type="text" class="form-control" name="rr" placeholder="Enter RR" value="<?php echo $row['rr']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">O2ZAT</span>
                            <input type="text" class="form-control" name="o2zat" placeholder="Enter O2ZAT" value="<?php echo $row['o2zat']; ?>" readonly>  
                          </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>NUrse's Advice</b></span>
                            <div class="form-group">
                                <textarea name="doctors_advice" id="" cols="30" rows="3" class="form-control" placeholder="Enter doctor's advice..." disabled><?php echo $row['doctors_advice']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medicine given</b></span>
                            <div class="form-group">
                                <textarea name="medicine_given" id="" cols="30" rows="2" class="form-control" placeholder="Enter medicine given..." disabled><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medical personnel</b></span>
                            <div class="form-group">
                                <textarea name="medical_personnel" id="" cols="30" rows="2" class="form-control" placeholder="Enter medical personnel..." disabled><?php echo $row['medical_personnel']; ?></textarea>
                            </div>
                        </div>

                      <?php 
                        } else { 
                          $fetch = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE consultation.patient_Id='$student_Id' LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                      ?>
                          
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>CONSULTATION RECORDS </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Mother's maiden name</span>
                            <input type="text" class="form-control" name="mothers_maiden_name" placeholder="Enter mothers maiden name" required value="<?php echo $row['mothers_maiden_name']; ?>" readonly> 
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Chief complaints</span>
                            <textarea class="form-control" name="chief_complaints" placeholder="Enter Chief complaints" required cols="30" rows="2" disabled><?php echo $row['chief_complaints']; ?></textarea>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Temperature</span>
                            <input type="text" class="form-control" name="temperature" placeholder="Enter Temperature" required value="<?php echo $row['temperature']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">VS/BP</span>
                            <input type="text" class="form-control" name="bp" placeholder="Enter BP" value="<?php echo $row['vs_bp']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">PR</span>
                            <input type="text" class="form-control" name="bp" placeholder="Enter BP" value="<?php echo $row['pr']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">RR</span>
                            <input type="text" class="form-control" name="rr" placeholder="Enter RR" value="<?php echo $row['rr']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">O2ZAT</span>
                            <input type="text" class="form-control" name="o2zat" placeholder="Enter O2ZAT" value="<?php echo $row['o2zat']; ?>" readonly>  
                          </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>NUrse's Advice</b></span>
                            <div class="form-group">
                                <textarea name="doctors_advice" id="" cols="30" rows="3" class="form-control" placeholder="Enter doctor's advice..." disabled><?php echo $row['doctors_advice']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medicine given</b></span>
                            <div class="form-group">
                                <textarea name="medicine_given" id="" cols="30" rows="2" class="form-control" placeholder="Enter medicine given..." disabled><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medical personnel</b></span>
                            <div class="form-group">
                                <textarea name="medical_personnel" id="" cols="30" rows="2" class="form-control" placeholder="Enter medical personnel..." disabled><?php echo $row['medical_personnel']; ?></textarea>
                            </div>
                        </div>

                      <?php } else { ?>
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary text-center"><b>NO CONSULTATION RECORDS</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                      <?php } } ?>

                      <?php 
                          $fetch = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id WHERE asking_med.patient_Id='$student_Id' ORDER BY asking_med.date_admitted DESC LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                       ?> 
                        
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>ASKING MEDICINE RECORDS </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required value="<?php echo $row['pr']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Temperature</b></span>
                              <input type="text" class="form-control" placeholder="Enter Temperature" name="rr" required value="<?php echo $row['temperature']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Vital sign</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Vital sign" name="vital_sign" required disabled><?php echo $row['vital_sign']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Treatment/ Medical advised</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Treatment/ Medical advised" name="medical_advised" required disabled><?php echo $row['medical_advised']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Medicine given</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Medicine given" name="medicine_given" required disabled><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Chief complaint</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Chief complaint" name="chief_complaints" required disabled><?php echo $row['chief_complaints']; ?></textarea>
                            </div>
                        </div>

                      <?php 
                        } else { 
                          $fetch = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id WHERE asking_med.patient_Id='$student_Id' LIMIT 1");
                          if(mysqli_num_rows($fetch) > 0) {
                          $row = mysqli_fetch_array($fetch);
                      ?>
                          
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary"><b>ASKING MEDICINE RECORDS </b> </a>
                          <br>
                          Date admitted: <?php echo date("F d, Y",strtotime($row['date_admitted'])); ?>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>PR</b></span>
                              <input type="text" class="form-control" placeholder="Enter PR" name="pr" required value="<?php echo $row['pr']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-3 mt-3">
                            <div class="form-group">
                              <span class="text-dark"><b>Temperature</b></span>
                              <input type="text" class="form-control" placeholder="Enter Temperature" name="rr" required value="<?php echo $row['temperature']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Vital sign</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Vital sign" name="vital_sign" required disabled><?php echo $row['vital_sign']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Treatment/ Medical advised</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Treatment/ Medical advised" name="medical_advised" required disabled><?php echo $row['medical_advised']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Medicine given</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Medicine given" name="medicine_given" required disabled><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Chief complaint</b></span>
                              <textarea cols="30" rows="3" class="form-control" placeholder="Chief complaint" name="chief_complaints" required disabled><?php echo $row['chief_complaints']; ?></textarea>
                            </div>
                        </div>

                      <?php } else { ?>
                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <hr>
                          <a class="h5 text-primary text-center"><b>NO ASKING MEDICINE RECORDS</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                      <?php } } ?>


                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a onclick="history.back()" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <!-- <a href="student_update.php?student_Id=<?php echo $student_Id; ?>" class="btn bg-info"><i class="fas fa-pencil-alt"></i> Edit</a> -->
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->

<?php } else { include '404.php'; } ?>


</div>




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
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php';  ?>
