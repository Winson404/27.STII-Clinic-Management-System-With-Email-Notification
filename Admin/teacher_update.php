<title>STII Clinic Management System | Faculty info</title>
<?php 
  include 'navbar.php'; 
  if(isset($_GET['teacher_Id'])) {
    $teacher_Id = $_GET['teacher_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$teacher_Id' ");
    $row = mysqli_fetch_array($fetch);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update Faculty</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Faculty info</li>
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

              <input type="hidden" class="form-control" name="teacher_Id" value="<?php echo $teacher_Id; ?>">

              <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <span class="text-dark"><b>Vaccination status</b></span>
                                <select class="form-control" name="vaccine_status" required>
                                  <option selected disabled value="">Select vaccine status</option>
                                  <option value="Unvaccinated" <?php if($row['vaccine_status'] == 'Unvaccinated') { echo 'selected'; } ?>>Unvaccinated</option>
                                  <option value="1st Dose" <?php if($row['vaccine_status'] == '1st Dose') { echo 'selected'; } ?>>1st Dose</option>
                                  <option value="2nd Dose" <?php if($row['vaccine_status'] == '2nd Dose') { echo 'selected'; } ?>>2nd Dose</option>
                                  <option value="1st Booster" <?php if($row['vaccine_status'] == '1st Booster') { echo 'selected'; } ?>>1st Booster</option>
                                  <option value="Fully Vaccinated" <?php if($row['vaccine_status'] == 'Fully Vaccinated') { echo 'selected'; } ?>>Fully Vaccinated</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Civil Status</b></span>
                              <select class="form-control" name="civil_status" required>
                                <option selected disabled value="">Select status</option>
                                <option value="Single" <?php if($row['civil_status'] == 'Single') { echo 'selected'; } ?>>Single</option>
                                <option value="Married" <?php if($row['civil_status'] == 'Married') { echo 'selected'; } ?>>Married</option>
                                <option value="Widow/er" <?php if($row['civil_status'] == 'Widow/er') { echo 'selected'; } ?>>Widow/er</option>
                                <option value="Separated" <?php if($row['civil_status'] == 'Separated') { echo 'selected'; } ?>>Separated</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Full name</b></span>
                              <input type="text" class="form-control"  placeholder="Enter full name" name="name" required value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Position</b></span>
                              <input type="text" class="form-control"  placeholder="Enter position" name="teacher_position" required value="<?php echo $row['teacher_position']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Date of birth</b></span>
                              <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()" value="<?php echo $row['dob']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control"  placeholder="Enter age" name="age" id="txtage" required value="<?php echo $row['age']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <select class="form-control" name="sex" required>
                              <option selected disabled value="">Select sex</option>
                              <option value="Male" <?php if($row['sex'] == 'Male') { echo 'selected'; } ?>>Male</option>
                              <option value="Female" <?php if($row['sex'] == 'Female') { echo 'selected'; } ?>>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Address</b></span>
                              <textarea name="address" class="form-control" id="" placeholder="Enter address" cols="30" rows="1" required><?php echo $row['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Religion</b></span>
                              <input type="text" class="form-control" placeholder="Enter your religion" name="religion" value="<?php echo $row['religion']; ?>" required>
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

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Email</b></span>
                              <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required value="<?php echo $row['email']; ?>">
                              <small id="text" style="font-style: italic;"></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent's name/Guardian</b></span>
                              <input class="form-control" placeholder="Enter Parent's name/Guardian" name="parentName" required value="<?php echo $row['parentName']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent/Guardian contact #</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="parentContact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['parentContact']; ?>">
                              </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>History of Present Illness</b></span>
                              <textarea name="illness" class="form-control" placeholder="Enter History of Present Illness" id="" cols="30" rows="1" required><?php echo $row['illness']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Past medical history</b></span>
                              <textarea name="pastMedical" class="form-control" placeholder="Enter past medical history" id="" cols="30" rows="1" required><?php echo $row['pastMedical']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>OB-GYNE and Surgical History</b></span>
                              <textarea name="surgicalHistory" class="form-control" placeholder="Enter OB-GYNE and Surgical History" id="" cols="30" rows="1" required><?php echo $row['surgicalHistory']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Blood Type</b></span>
                              <input class="form-control" placeholder="Blood Type" name="blood_type" required value="<?php echo $row['blood_type']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Height</b></span>
                              <input class="form-control" placeholder="Height" name="height" required value="<?php echo $row['height']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Weight</b></span>
                              <input class="form-control" placeholder="Weight" name="weight" required value="<?php echo $row['weight']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Known allergy to any food or drug, please specify(If applicable)</b></span>
                              <textarea name="allergy" class="form-control" placeholder="Enter known allergy to any food or drug, please specify" id="" cols="30" rows="1" required><?php echo $row['allergy']; ?></textarea>
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
                              <input id="Complete immunization" class="form-check-input position-static" type="checkbox" value="Complete immunization" name="nutritional_Immunization[]" <?php if(in_array('Complete immunization', $aa)) { echo 'checked'; } ?> > 
                              <label for="Complete immunization" class="m-0">Complete immunization</label>
                           </div>
                           <div class="form-check">
                              <input id="Incomplete immunization" class="form-check-input position-static" type="checkbox" value="Incomplete immunization" name="nutritional_Immunization[]"  <?php if(in_array('Incomplete immunization', $aa)) { echo 'checked'; } ?>>
                              <label for="Incomplete immunization" class="m-0">Incomplete immunization</label>
                           </div>
                           <div class="form-check">
                              <input id="Normal Filipino Diet" class="form-check-input position-static" type="checkbox" value="Normal Filipino Diet" name="nutritional_Immunization[]" <?php if(in_array('Normal Filipino Diet', $aa)) { echo 'checked'; } ?>>
                              <label for="Normal Filipino Diet" class="m-0">Normal Filipino Diet</label>
                           </div>
                           <div class="form-check">
                              <input id="High Protein Diet" class="form-check-input position-static" type="checkbox" value="High Protein Diet" name="nutritional_Immunization[]"  <?php if(in_array('High Protein Diet', $aa)) { echo 'checked'; } ?>>
                              <label for="High Protein Diet" class="m-0">High Protein Diet</label>
                           </div>
                           <div class="form-check">
                              <input id="Prefers Vegetables" class="form-check-input position-static" type="checkbox" value="Prefers Vegetables" name="nutritional_Immunization[]" <?php if(in_array('Prefers Vegetables', $aa)) { echo 'checked'; } ?>>
                              <label for="Prefers Vegetables" class="m-0">Prefers Vegetables</label>
                           </div>
                           <div class="form-check">
                              <input id="Prefers Canned Goods" class="form-check-input position-static" type="checkbox" value="Prefers Canned Goods" name="nutritional_Immunization[]"  <?php if(in_array('Prefers Canned Goods', $aa)) { echo 'checked'; } ?>>
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
                              <input id="Asthma" class="form-check-input position-static" type="checkbox" value="Asthma" name="familyHistory[]" <?php if(in_array('Asthma', $bb)) { echo 'checked'; } ?>> 
                              <label for="Asthma" class="m-0">Asthma</label>
                           </div>
                           <div class="form-check">
                              <input id="Hypertension" class="form-check-input position-static" type="checkbox" value="Hypertension" name="familyHistory[]" <?php if(in_array('Hypertension', $bb)) { echo 'checked'; } ?>>
                              <label for="Hypertension" class="m-0">Hypertension</label>
                           </div>
                           <div class="form-check">
                              <input id="Cancer" class="form-check-input position-static" type="checkbox" value="Cancer" name="familyHistory[]" <?php if(in_array('Cancer', $bb)) { echo 'checked'; } ?>>
                              <label for="Cancer" class="m-0">Cancer</label>
                           </div>
                           <div class="form-check">
                              <input id="Boold Dyscracis" class="form-check-input position-static" type="checkbox" value="Boold Dyscracis" name="familyHistory[]" <?php if(in_array('Boold Dyscracis', $bb)) { echo 'checked'; } ?>>
                              <label for="Boold Dyscracis" class="m-0">Boold Dyscracis</label>
                           </div>
                           <div class="form-check">
                              <input id="Psychiatric Diseases" class="form-check-input position-static" type="checkbox" value="Psychiatric Diseases" name="familyHistory[]" <?php if(in_array('Psychiatric Diseases', $bb)) { echo 'checked'; } ?>>
                              <label for="Psychiatric Diseases" class="m-0">Psychiatric Diseases</label>
                           </div>
                           <div class="form-check">
                              <input id="DM" class="form-check-input position-static" type="checkbox" value="DM" name="familyHistory[]" <?php if(in_array('DM', $bb)) { echo 'checked'; } ?>>
                              <label for="DM" class="m-0">DM</label>
                           </div>
                           <div class="form-check">
                              <input id="Allergy" class="form-check-input position-static" type="checkbox" value="Allergy" name="familyHistory[]" <?php if(in_array('Allergy', $bb)) { echo 'checked'; } ?>>
                              <label for="Allergy" class="m-0">Allergy</label>
                           </div>
                           <div class="form-check">
                              <input id="No Heradi - Familiar Diseases" class="form-check-input position-static" type="checkbox" value="No Heradi - Familiar Diseases" name="familyHistory[]" <?php if(in_array('No Heradi - Familiar Diseases', $bb)) { echo 'checked'; } ?>>
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
                              <input id="Non-Smoker" class="form-check-input position-static" type="checkbox" value="Non-Smoker" name="socialHistory[]"  <?php if(in_array('Non-Smoker', $cc)) { echo 'checked'; } ?>> 
                              <label for="Non-Smoker" class="m-0">Non-Smoker</label>
                           </div>
                           <div class="form-check">
                              <input id="Smoker" class="form-check-input position-static" type="checkbox" value="Smoker" name="socialHistory[]" onclick="toggleSmoker()" <?php if(in_array('Smoker', $cc)) { echo 'checked'; } ?>>
                              <label for="Smoker" class="m-0">Smoker</label>
                           </div>
                           <div class="mb-2" id="myInput2" style="display:none">
                              <span class="text-dark"><b>Packs/Years</b></span>
                              <input type="text" id="packs" class="form-control form-control-sm" name="packsYears" placeholder="Enter packs/years" value="<?php echo $row['packsYears']; ?>" >
                           </div>
                           <div class="mb-2" id="myInput3" style="display:none">
                              <span class="text-dark"><b>Environment</b></span>
                              <input type="text" id="environ" class="form-control form-control-sm" name="environment" placeholder="Enter environment" value="<?php echo $row['environment']; ?>" >
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
                              <input id="Non-Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Non-Alcoholic Beverage Drinker" name="socialHistory[]" <?php if(in_array('Non-Alcoholic Beverage Drinker', $cc)) { echo 'checked'; } ?>>
                              <label for="Non-Alcoholic Beverage Drinker" class="m-0">Non-Alcoholic Beverage Drinker</label>
                           </div>
                           <div class="form-check">
                              <input id="Occasional Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Occasional Alcoholic Beverage Drinker" name="socialHistory[]" <?php if(in_array('Occasional Alcoholic Beverage Drinker', $cc)) { echo 'checked'; } ?>>
                              <label for="Occasional Alcoholic Beverage Drinker" class="m-0">Occasional Alcoholic Beverage Drinker</label>
                           </div>
                           <div class="form-check">
                              <input id="Frequent Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Frequent Alcoholic Beverage Drinker" name="socialHistory[]" onclick="toggle()" <?php if(in_array('Frequent Alcoholic Beverage Drinker', $cc)) { echo 'checked'; } ?>>
                              <label for="Frequent Alcoholic Beverage Drinker" class="m-0">Frequent Alcoholic Beverage Drinker</label>
                           </div>
                           <div id="myInput" style="display:none">
                              <span class="text-dark"><b>Frequency</b></span>
                              <input type="text" id="frequency" class="form-control form-control-sm" name="frequency" placeholder="Enter frequency" value="<?php echo $row['frequency']; ?>"/>
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
                              <input id="Weight loss" class="form-check-input position-static" type="checkbox" value="Weight loss" name="general[]" <?php if(in_array('Weight loss', $dd)) { echo 'checked'; } ?>> 
                              <label for="Weight loss" class="m-0">Weight loss</label>
                           </div>
                           <div class="form-check">
                              <input id="Weakness" class="form-check-input position-static" type="checkbox" value="Weakness" name="general[]" <?php if(in_array('Weakness', $dd)) { echo 'checked'; } ?>>
                              <label for="Weakness" class="m-0">Weakness</label>
                           </div>
                           <div class="form-check">
                              <input id="Fatigue" class="form-check-input position-static" type="checkbox" value="Fatigue" name="general[]" <?php if(in_array('Fatigue', $dd)) { echo 'checked'; } ?>>
                              <label for="Fatigue" class="m-0">Fatigue</label>
                           </div>
                           <div class="form-check">
                              <input id="Fever" class="form-check-input position-static" type="checkbox" value="Fever" name="general[]" <?php if(in_array('Fever', $dd)) { echo 'checked'; } ?>>
                              <label for="Fever" class="m-0">Fever</label>
                           </div>
                           <div class="form-check">
                              <input id="None" class="form-check-input position-static" type="checkbox" value="None" name="general[]" <?php if(in_array('None', $dd)) { echo 'checked'; } ?>>
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
                              <input id="Anemia" class="form-check-input position-static" type="checkbox" value="Anemia" name="hematologic[]" <?php if(in_array('Anemia', $ee)) { echo 'checked'; } ?>> 
                              <label for="Anemia" class="m-0">Anemia</label>
                           </div>
                           <div class="form-check">
                              <input id="Easy Bruising or Bleeding" class="form-check-input position-static" type="checkbox" value="Easy Bruising or Bleeding" name="hematologic[]" <?php if(in_array('Easy Bruising or Bleeding', $ee)) { echo 'checked'; } ?>>
                              <label for="Easy Bruising or Bleeding" class="m-0">Easy Bruising or Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="Past Transfusion" class="form-check-input position-static" type="checkbox" value="Past Transfusion" name="hematologic[]" <?php if(in_array('Past Transfusion', $ee)) { echo 'checked'; } ?>>
                              <label for="Past Transfusion" class="m-0">Past Transfusion</label>
                           </div>
                           <div class="form-check">
                              <input id="None2" class="form-check-input position-static" type="checkbox" value="None" name="hematologic[]" <?php if(in_array('None', $ee)) { echo 'checked'; } ?>>
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
                              <input id="Heat and Cold Tolerance" class="form-check-input position-static" type="checkbox" value="Heat and Cold Tolerance" name="endocrine[]" <?php if(in_array('Heat and Cold Tolerance', $ff)) { echo 'checked'; } ?>> 
                              <label for="Heat and Cold Tolerance" class="m-0">Heat and Cold Tolerance</label>
                           </div>
                           <div class="form-check">
                              <input id="Excessive Sweating" class="form-check-input position-static" type="checkbox" value="Excessive Sweating" name="endocrine[]" <?php if(in_array('Excessive Sweating', $ff)) { echo 'checked'; } ?>>
                              <label for="Excessive Sweating" class="m-0">Excessive Sweating</label>
                           </div>
                           <div class="form-check">
                              <input id="Excessive Thirst or Hunger" class="form-check-input position-static" type="checkbox" value="Excessive Thirst or Hunger" name="endocrine[]" <?php if(in_array('Excessive Thirst or Hunger', $ff)) { echo 'checked'; } ?>>
                              <label for="Excessive Thirst or Hunger" class="m-0">Excessive Thirst or Hunger</label>
                           </div>
                           <div class="form-check">
                              <input id="Polyuria" class="form-check-input position-static" type="checkbox" value="Polyuria" name="endocrine[]" <?php if(in_array('Polyuria', $ff)) { echo 'checked'; } ?>>
                              <label for="Polyuria" class="m-0">Polyuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Change in shoe size" class="form-check-input position-static" type="checkbox" value="Change in shoe size" name="endocrine[]" <?php if(in_array('Change in shoe size', $ff)) { echo 'checked'; } ?>>
                              <label for="Change in shoe size" class="m-0">Change in shoe size</label>
                           </div>
                           <div class="form-check">
                              <input id="None3" class="form-check-input position-static" type="checkbox" value="None" name="endocrine[]" <?php if(in_array('None', $ff)) { echo 'checked'; } ?>>
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
                              <input id="Good Pulse" class="form-check-input position-static" type="checkbox" value="Good Pulse" name="extremities[]" <?php if(in_array('Good Pulse', $gg)) { echo 'checked'; } ?>> 
                              <label for="Good Pulse" class="m-0">Good Pulse</label>
                           </div>
                           <div class="form-check">
                              <input id="Weak Pulse" class="form-check-input position-static" type="checkbox" value="Weak Pulse" name="extremities[]" <?php if(in_array('Weak Pulse', $gg)) { echo 'checked'; } ?>>
                              <label for="Weak Pulse" class="m-0">Weak Pulse</label>
                           </div>
                           <div class="form-check">
                              <input id="CRT <2s" class="form-check-input position-static" type="checkbox" value="CRT <2s" name="extremities[]" <?php if(in_array('CRT <2s', $gg)) { echo 'checked'; } ?>>
                              <label for="CRT <2s" class="m-0">CRT <2s</label>
                           </div>
                           <div class="form-check">
                              <input id="Edema" class="form-check-input position-static" type="checkbox" value="Edema" name="extremities[]" <?php if(in_array('Edema', $gg)) { echo 'checked'; } ?>>
                              <label for="Edema" class="m-0">Edema</label>
                           </div>
                           <div class="form-check">
                              <input id="Limited ROM" class="form-check-input position-static" type="checkbox" value="Limited ROM" name="extremities[]" <?php if(in_array('Limited ROM', $gg)) { echo 'checked'; } ?>>
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
                              <input id="Rashes" class="form-check-input position-static" type="checkbox" value="Rashes" name="skin[]" <?php if(in_array('Rashes', $hh)) { echo 'checked'; } ?>> 
                              <label for="Rashes" class="m-0">Rashes</label>
                           </div>
                           <div class="form-check">
                              <input id="Lumps" class="form-check-input position-static" type="checkbox" value="Lumps" name="skin[]" <?php if(in_array('Lumps', $hh)) { echo 'checked'; } ?>>
                              <label for="Lumps" class="m-0">Lumps</label>
                           </div>
                           <div class="form-check">
                              <input id="Itching" class="form-check-input position-static" type="checkbox" value="Itching" name="skin[]" <?php if(in_array('Itching', $hh)) { echo 'checked'; } ?>>
                              <label for="Itching" class="m-0">Itching</label>
                           </div>
                           <div class="form-check">
                              <input id="Moles" class="form-check-input position-static" type="checkbox" value="Moles" name="skin[]" <?php if(in_array('Moles', $hh)) { echo 'checked'; } ?>>
                              <label for="Moles" class="m-0">Moles</label>
                           </div>
                           <div class="form-check">
                              <input id="None4" class="form-check-input position-static" type="checkbox" value="None" name="skin[]" <?php if(in_array('None', $hh)) { echo 'checked'; } ?>>
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
                              <input id="Headache" class="form-check-input position-static" type="checkbox" value="Headache" name="head[]" <?php if(in_array('Headache', $ii)) { echo 'checked'; } ?>> 
                              <label for="Headache" class="m-0">Headache</label>
                           </div>
                           <div class="form-check">
                              <input id="Diziness" class="form-check-input position-static" type="checkbox" value="Diziness" name="head[]" <?php if(in_array('Diziness', $ii)) { echo 'checked'; } ?>>
                              <label for="Diziness" class="m-0">Diziness</label>
                           </div>
                           <div class="form-check">
                              <input id="Head injury" class="form-check-input position-static" type="checkbox" value="Head injury" name="head[]" <?php if(in_array('Head injury', $ii)) { echo 'checked'; } ?>>
                              <label for="Head injury" class="m-0">Head injury</label>
                           </div>
                           <div class="form-check">
                              <input id="None5" class="form-check-input position-static" type="checkbox" value="None" name="head[]" <?php if(in_array('None', $ii)) { echo 'checked'; } ?>>
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
                              <input type="text" class="form-control-sm form-control" placeholder="Enter vision" name="vision" value="<?php echo $row['vision']; ?>"> 
                           </div>
                           <div class="form-check">
                              <input id="Glasses or Contact Lens" class="form-check-input position-static" type="checkbox" value="Glasses or Contact Lens" name="Eyes[]" <?php if(in_array('Glasses or Contact Lens', $jj)) { echo 'checked'; } ?>>
                              <label for="Glasses or Contact Lens" class="m-0">Glasses or Contact Lens</label>
                           </div>
                           <div class="form-check">
                              <input id="Redness" class="form-check-input position-static" type="checkbox" value="Redness" name="Eyes[]" <?php if(in_array('Redness', $jj)) { echo 'checked'; } ?>>
                              <label for="Redness" class="m-0">Redness</label>
                           </div>
                           <div class="form-check">
                              <input id="Eye pain" class="form-check-input position-static" type="checkbox" value="Eye pain" name="Eyes[]" <?php if(in_array('Eye pain', $jj)) { echo 'checked'; } ?>>
                              <label for="Eye pain" class="m-0">Eye pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Blurring of Vision" class="form-check-input position-static" type="checkbox" value="Blurring of Vision" name="Eyes[]" <?php if(in_array('Blurring of Vision', $jj)) { echo 'checked'; } ?>>
                              <label for="Blurring of Vision" class="m-0">Blurring of Vision</label>
                           </div>
                           <div class="form-check">
                              <input id="None6" class="form-check-input position-static" type="checkbox" value="None" name="Eyes[]" <?php if(in_array('None', $jj)) { echo 'checked'; } ?>>
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
                              <input id="Tinnitus" class="form-check-input position-static" type="checkbox" value="Tinnitus" name="ears[]" <?php if(in_array('Tinnitus', $kk)) { echo 'checked'; } ?>>
                              <label for="Tinnitus" class="m-0">Tinnitus</label>
                           </div>
                           <div class="form-check">
                              <input id="Vertigo" class="form-check-input position-static" type="checkbox" value="Vertigo" name="ears[]" <?php if(in_array('Vertigo', $kk)) { echo 'checked'; } ?>>
                              <label for="Vertigo" class="m-0">Vertigo</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear infection" class="form-check-input position-static" type="checkbox" value="Ear infection" name="ears[]" <?php if(in_array('Ear infection', $kk)) { echo 'checked'; } ?>>
                              <label for="Ear infection" class="m-0">Ear infection</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear Discharge" class="form-check-input position-static" type="checkbox" value="Ear Discharge" name="ears[]" <?php if(in_array('Ear Discharge', $kk)) { echo 'checked'; } ?>>
                              <label for="Ear Discharge" class="m-0">Ear Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear Pain" class="form-check-input position-static" type="checkbox" value="Ear Pain" name="ears[]" <?php if(in_array('Ear Pain', $kk)) { echo 'checked'; } ?>>
                              <label for="Ear Pain" class="m-0">Ear Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="None7" class="form-check-input position-static" type="checkbox" value="None" name="ears[]" <?php if(in_array('None', $kk)) { echo 'checked'; } ?>>
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
                              <input id="Nasal Discharge" class="form-check-input position-static" type="checkbox" value="Nasal Discharge" name="nose[]" <?php if(in_array('Nasal Discharge', $ll)) { echo 'checked'; } ?>>
                              <label for="Nasal Discharge" class="m-0">Nasal Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="Nose Bleeding" class="form-check-input position-static" type="checkbox" value="Nose Bleeding" name="nose[]" <?php if(in_array('Nose Bleeding', $ll)) { echo 'checked'; } ?>>
                              <label for="Nose Bleeding" class="m-0">Nose Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="None8" class="form-check-input position-static" type="checkbox" value="None" name="nose[]" <?php if(in_array('None', $ll)) { echo 'checked'; } ?>>
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
                              <input id="Bleeding Gums" class="form-check-input position-static" type="checkbox" value="Bleeding Gums" name="mouthThroat[]"  <?php if(in_array('Bleeding Gums', $mm)) { echo 'checked'; } ?>>
                              <label for="Bleeding Gums" class="m-0">Bleeding Gums</label>
                           </div>
                           <div class="form-check">
                              <input id="Use of Dentures" class="form-check-input position-static" type="checkbox" value="Use of Dentures" name="mouthThroat[]" onclick="toggleDentures()" <?php if(in_array('Use of Dentures', $mm)) { echo 'checked'; } ?>>
                              <label for="Use of Dentures" class="m-0">Use of Dentures</label>
                           </div>
                           <div class="mb-2" id="myInput4" style="display:none">
                              <span class="text-dark"><b>Years/Months</b></span>
                              <input type="text" id="yearsMonths" class="form-control form-control-sm" name="yearsMonths" placeholder="Enter Years/Months" value="<?php echo $row['yearsMonths']; ?>" />
                           </div>
                           <div class="form-check">
                              <input id="Sore Throat" class="form-check-input position-static" type="checkbox" value="Sore Throat" name="mouthThroat[]" <?php if(in_array('Sore Throat', $mm)) { echo 'checked'; } ?>>
                              <label for="Sore Throat" class="m-0">Sore Throat</label>
                           </div>
                           <div class="form-check">
                              <input id="None9" class="form-check-input position-static" type="checkbox" value="None" name="mouthThroat[]" <?php if(in_array('None', $mm)) { echo 'checked'; } ?>>
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
                              <input id="Goiter" class="form-check-input position-static" type="checkbox" value="Goiter" name="neck[]" <?php if(in_array('Goiter', $nn)) { echo 'checked'; } ?>>
                              <label for="Goiter" class="m-0">Goiter</label>
                           </div>
                           <div class="form-check">
                              <input id="Lamps" class="form-check-input position-static" type="checkbox" value="Lamps" name="neck[]" <?php if(in_array('Lamps', $nn)) { echo 'checked'; } ?>>
                              <label for="Lamps" class="m-0">Lamps</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain" class="form-check-input position-static" type="checkbox" value="Pain" name="neck[]" <?php if(in_array('Pain', $nn)) { echo 'checked'; } ?>>
                              <label for="Pain" class="m-0">Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="None10" class="form-check-input position-static" type="checkbox" value="None" name="neck[]" <?php if(in_array('None', $nn)) { echo 'checked'; } ?>>
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
                              <input id="Lumps2" class="form-check-input position-static" type="checkbox" value="Lumps" name="Breast[]" <?php if(in_array('Lumps', $oo)) { echo 'checked'; } ?>>
                              <label for="Lumps2" class="m-0">Lumps</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain2" class="form-check-input position-static" type="checkbox" value="Pain" name="Breast[]" <?php if(in_array('Pain', $oo)) { echo 'checked'; } ?>>
                              <label for="Pain2" class="m-0">Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Nipple Discharge" class="form-check-input position-static" type="checkbox" value="Nipple Discharge" name="Breast[]" <?php if(in_array('Nipple Discharge', $oo)) { echo 'checked'; } ?>>
                              <label for="Nipple Discharge" class="m-0">Nipple Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="None11" class="form-check-input position-static" type="checkbox" value="None" name="Breast[]" <?php if(in_array('None', $oo)) { echo 'checked'; } ?>>
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
                              <input id="Cough" class="form-check-input position-static" type="checkbox" value="Cough" name="Respiratory[]" <?php if(in_array('Cough', $pp)) { echo 'checked'; } ?>>
                              <label for="Cough" class="m-0">Cough</label>
                           </div>
                           <div class="form-check">
                              <input id="Haemoptysis" class="form-check-input position-static" type="checkbox" value="Haemoptysis" name="Respiratory[]"<?php if(in_array('Haemoptysis', $pp)) { echo 'checked'; } ?>>
                              <label for="Haemoptysis" class="m-0">Haemoptysis</label>
                           </div>
                           <div class="form-check">
                              <input id="Dyspnea" class="form-check-input position-static" type="checkbox" value="Dyspnea" name="Respiratory[]" <?php if(in_array('Dyspnea', $pp)) { echo 'checked'; } ?>>
                              <label for="Dyspnea" class="m-0">Dyspnea</label>
                           </div>
                           <div class="form-check">
                              <input id="None12" class="form-check-input position-static" type="checkbox" value="None" name="Respiratory[]" <?php if(in_array('None', $pp)) { echo 'checked'; } ?>>
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
                              <input id="Chest Pain" class="form-check-input position-static" type="checkbox" value="Chest Pain" name="Cardiovascular[]" <?php if(in_array('Chest Pain', $qq)) { echo 'checked'; } ?> >
                              <label for="Chest Pain" class="m-0">Chest Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Palpitation" class="form-check-input position-static" type="checkbox" value="Palpitation" name="Cardiovascular[]" <?php if(in_array('Palpitation', $qq)) { echo 'checked'; } ?>>
                              <label for="Palpitation" class="m-0">Palpitation</label>
                           </div>
                           <div class="form-check">
                              <input id="Edema2" class="form-check-input position-static" type="checkbox" value="Edema" name="Cardiovascular[]"  <?php if(in_array('Edema', $qq)) { echo 'checked'; } ?>>
                              <label for="Edema2" class="m-0">Edema</label>
                           </div>
                           <div class="form-check">
                              <input id="None13" class="form-check-input position-static" type="checkbox" value="None" name="Cardiovascular[]"  <?php if(in_array('None', $qq)) { echo 'checked'; } ?>>
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
                              <input id="Difficulty Swallowing" class="form-check-input position-static" type="checkbox" value="Difficulty Swallowing" name="Gastrointestinal[]" <?php if(in_array('Difficulty Swallowing', $rr)) { echo 'checked'; } ?>>
                              <label for="Difficulty Swallowing" class="m-0">Difficulty Swallowing</label>
                           </div>
                           <div class="form-check">
                              <input id="Heart Burn" class="form-check-input position-static" type="checkbox" value="Heart Burn" name="Gastrointestinal[]" <?php if(in_array('Heart Burn', $rr)) { echo 'checked'; } ?>>
                              <label for="Heart Burn" class="m-0">Heart Burn</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain w/ Defecation" class="form-check-input position-static" type="checkbox" value="Pain w/ Defecation" name="Gastrointestinal[]" <?php if(in_array('Pain w/ Defecation', $rr)) { echo 'checked'; } ?>>
                              <label for="Pain w/ Defecation" class="m-0">Pain w/ Defecation</label>
                           </div>
                           <div class="form-check">
                              <input id="Abdominal Pain" class="form-check-input position-static" type="checkbox" value="Abdominal Pain" name="Gastrointestinal[]" <?php if(in_array('Abdominal Pain', $rr)) { echo 'checked'; } ?>>
                              <label for="Abdominal Pain" class="m-0">Abdominal Pain</label>
                           </div>
                          </div>
                        </div>


                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Haemorrhoids" class="form-check-input position-static" type="checkbox" value="Haemorrhoids" name="Gastrointestinal[]"  <?php if(in_array('Haemorrhoids', $rr)) { echo 'checked'; } ?>>
                              <label for="Haemorrhoids" class="m-0">Haemorrhoids</label>
                           </div>
                           <div class="form-check">
                              <input id="Constipation" class="form-check-input position-static" type="checkbox" value="Constipation" name="Gastrointestinal[]" <?php if(in_array('Constipation', $rr)) { echo 'checked'; } ?>>
                              <label for="Constipation" class="m-0">Constipation</label>
                           </div>
                           <div class="form-check">
                              <input id="Diarrhoea" class="form-check-input position-static" type="checkbox" value="Diarrhoea" name="Gastrointestinal[]" <?php if(in_array('Diarrhoea', $rr)) { echo 'checked'; } ?> >
                              <label for="Diarrhoea" class="m-0">Diarrhoea</label>
                           </div>
                           <div class="form-check">
                              <input id="Hepatitis" class="form-check-input position-static" type="checkbox" value="Hepatitis" name="Gastrointestinal[]"  <?php if(in_array('Hepatitis', $rr)) { echo 'checked'; } ?>>
                              <label for="Hepatitis" class="m-0">Hepatitis</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Loss of Appetite" class="form-check-input position-static" type="checkbox" value="Loss of Appetite" name="Gastrointestinal[]"  <?php if(in_array('Loss of Appetite', $rr)) { echo 'checked'; } ?>>
                              <label for="Loss of Appetite" class="m-0">Loss of Appetite</label>
                           </div>
                           <div class="form-check">
                              <input id="Nausea & Vomiting" class="form-check-input position-static" type="checkbox" value="Nausea & Vomiting" name="Gastrointestinal[]" <?php if(in_array('Nausea & Vomiting', $rr)) { echo 'checked'; } ?>>
                              <label for="Nausea & Vomiting" class="m-0">Nausea & Vomiting</label>
                           </div>
                           <div class="form-check">
                              <input id="Rectal Bleeding" class="form-check-input position-static" type="checkbox" value="Rectal Bleeding" name="Gastrointestinal[]"  <?php if(in_array('Rectal Bleeding', $rr)) { echo 'checked'; } ?>>
                              <label for="Rectal Bleeding" class="m-0">Rectal Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="Black Stool" class="form-check-input position-static" type="checkbox" value="Black Stool" name="Gastrointestinal[]"  <?php if(in_array('Black Stool', $rr)) { echo 'checked'; } ?>>
                              <label for="Black Stool" class="m-0">Black Stool</label>
                           </div>
                           <div class="form-check">
                              <input id="None14" class="form-check-input position-static" type="checkbox" value="None" name="Gastrointestinal[]"  <?php if(in_array('None', $rr)) { echo 'checked'; } ?> >
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
                              <input id="Leg Cramps" class="form-check-input position-static" type="checkbox" value="Leg Cramps" name="peripheralvascular[]" <?php if(in_array('Leg Cramps', $ss)) { echo 'checked'; } ?>>
                              <label for="Leg Cramps" class="m-0">Leg Cramps</label>
                           </div>
                           <div class="form-check">
                              <input id="Varicose Veins" class="form-check-input position-static" type="checkbox" value="Varicose Veins" name="peripheralvascular[]" <?php if(in_array('Varicose Veins', $ss)) { echo 'checked'; } ?>>
                              <label for="Varicose Veins" class="m-0">Varicose Veins</label>
                           </div>
                           <div class="form-check">
                              <input id="Swellign in Legs or Feet" class="form-check-input position-static" type="checkbox" value="Swellign in Legs or Feet" name="peripheralvascular[]" <?php if(in_array('Swellign in Legs or Feet', $ss)) { echo 'checked'; } ?>>
                              <label for="Swellign in Legs or Feet" class="m-0">Swellign in Legs or Feet</label>
                           </div>
                           <div class="form-check">
                              <input id="None15" class="form-check-input position-static" type="checkbox" value="None" name="peripheralvascular[]" <?php if(in_array('None', $ss)) { echo 'checked'; } ?>>
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
                              <input type="text" class="form-control-sm form-control" placeholder="Enter frequency of urinary" name="freq_urinary" value="<?php echo $row['freq_urinary']; ?>"> 
                          </div>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Polyuria2" class="form-check-input position-static" type="checkbox" value="Polyuria" name="Urinary[]" <?php if(in_array('Polyuria', $tt)) { echo 'checked'; } ?>>
                              <label for="Polyuria2" class="m-0">Polyuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Dysuria" class="form-check-input position-static" type="checkbox" value="Dysuria" name="Urinary[]" <?php if(in_array('Dysuria', $tt)) { echo 'checked'; } ?>>
                              <label for="Dysuria" class="m-0">Dysuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Haematuria" class="form-check-input position-static" type="checkbox" value="Haematuria" name="Urinary[]" <?php if(in_array('Haematuria', $tt)) { echo 'checked'; } ?>>
                              <label for="Haematuria" class="m-0">Haematuria</label>
                           </div>
                           <div class="form-check">
                              <input id="None16" class="form-check-input position-static" type="checkbox" value="None" name="Urinary[]" <?php if(in_array('None', $tt)) { echo 'checked'; } ?>>
                              <label for="None16" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Kidney Stone" class="form-check-input position-static" type="checkbox" value="Kidney Stone" name="Urinary[]"  <?php if(in_array('Kidney Stone', $tt)) { echo 'checked'; } ?>>
                              <label for="Kidney Stone" class="m-0">Kidney Stone</label>
                           </div>
                           <div class="form-check">
                              <input id="UTI" class="form-check-input position-static" type="checkbox" value="UTI" name="Urinary[]" <?php if(in_array('UTI', $tt)) { echo 'checked'; } ?>>
                              <label for="UTI" class="m-0">UTI</label>
                           </div>
                           <div class="form-check">
                              <input id="None17" class="form-check-input position-static" type="checkbox" value="None" name="Urinary[]"  <?php if(in_array('None', $tt)) { echo 'checked'; } ?>>
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
                              <input id="Hernia" class="form-check-input position-static" type="checkbox" value="Hernia" name="male[]"  <?php if(in_array('Hernia', $uu)) { echo 'checked'; } ?>>
                              <label for="Hernia" class="m-0">Hernia</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharges/Sore on the penis" class="form-check-input position-static" type="checkbox" value="Discharges/Sore on the penis" name="male[]" <?php if(in_array('Discharges/Sore on the penis', $uu)) { echo 'checked'; } ?>>
                              <label for="Discharges/Sore on the penis" class="m-0">Discharges/Sore on the penis</label>
                           </div>
                           <div class="form-check">
                              <input id="Testicular Pain or Mass" class="form-check-input position-static" type="checkbox" value="Testicular Pain or Mass" name="male[]" <?php if(in_array('Testicular Pain or Mass', $uu)) { echo 'checked'; } ?> >
                              <label for="Testicular Pain or Mass" class="m-0">Testicular Pain or Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="History of STD" class="form-check-input position-static" type="checkbox" value="History of STD" name="male[]"  <?php if(in_array('History of STD', $uu)) { echo 'checked'; } ?>>
                              <label for="History of STD" class="m-0">History of STD</label>
                           </div>
                           <div class="form-check">
                              <input id="N/A" class="form-check-input position-static" type="checkbox" value="N/A" name="male[]" <?php if(in_array('N/A', $uu)) { echo 'checked'; } ?>>
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
                              <input type="text" class="form-control-sm form-control" placeholder="Enter Age of Menarche" name="age_menarche" value="<?php echo $row['age_menarche']; ?>"> 
                          </div>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Female_History of STD" class="form-check-input position-static" type="checkbox" value="History of STD" name="female[]"  <?php if(in_array('History of STD', $vv)) { echo 'checked'; } ?>>
                              <label for="Female_History of STD" class="m-0">History of STD</label>
                           </div>
                           <div class="form-check">
                              <input id="Itching2" class="form-check-input position-static" type="checkbox" value="Itching" name="female[]" <?php if(in_array('Itching', $vv)) { echo 'checked'; } ?>>
                              <label for="Itching2" class="m-0">Itching</label>
                           </div>
                           <div class="form-check">
                              <input id="Vaginal Discharge" class="form-check-input position-static" type="checkbox" value="Vaginal Discharge" name="female[]"  <?php if(in_array('Vaginal Discharge', $vv)) { echo 'checked'; } ?>>
                              <label for="Vaginal Discharge" class="m-0">Vaginal Discharge</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Sores" class="form-check-input position-static" type="checkbox" value="Sores" name="female[]"  <?php if(in_array('Sores', $vv)) { echo 'checked'; } ?>>
                              <label for="Sores" class="m-0">Sores</label>
                           </div>
                           <div class="form-check">
                              <input id="Lumps22" class="form-check-input position-static" type="checkbox" value="Lumps" name="female[]"  <?php if(in_array('Lumps', $vv)) { echo 'checked'; } ?>>
                              <label for="Lumps22" class="m-0">Lumps</label>
                           </div>
                           </div>
                           <div class="form-check">
                              <input id="N/A2" class="form-check-input position-static" type="checkbox" value="N/A" name="female[]"  <?php if(in_array('N/A', $vv)) { echo 'checked'; } ?>>
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
                              <input id="Muscle of Joint Pain" class="form-check-input position-static" type="checkbox" value="Muscle of Joint Pain" name="muscularSkeletal[]" <?php if(in_array('Muscle of Joint Pain', $ww)) { echo 'checked'; } ?>>
                              <label for="Muscle of Joint Pain" class="m-0">Muscle of Joint Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Arthritis" class="form-check-input position-static" type="checkbox" value="Arthritis" name="muscularSkeletal[]" <?php if(in_array('Arthritis', $ww)) { echo 'checked'; } ?>>
                              <label for="Arthritis" class="m-0">Arthritis</label>
                           </div>
                           <div class="form-check">
                              <input id="Backache" class="form-check-input position-static" type="checkbox" value="Backache" name="muscularSkeletal[]" <?php if(in_array('Backache', $ww)) { echo 'checked'; } ?>>
                              <label for="Backache" class="m-0">Backache</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Gout" class="form-check-input position-static" type="checkbox" value="Gout" name="muscularSkeletal[]" <?php if(in_array('Gout', $ww)) { echo 'checked'; } ?>>
                              <label for="Gout" class="m-0">Gout</label>
                           </div>
                           <div class="form-check">
                              <input id="Inflammation" class="form-check-input position-static" type="checkbox" value="Inflammation" name="muscularSkeletal[]" <?php if(in_array('Inflammation', $ww)) { echo 'checked'; } ?>>
                              <label for="Inflammation" class="m-0">Inflammation</label>
                           </div>
                           <div class="form-check">
                              <input id="History of Trauma" class="form-check-input position-static" type="checkbox" value="History of Trauma" name="muscularSkeletal[]" <?php if(in_array('History of Trauma', $ww)) { echo 'checked'; } ?>>
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
                              <input id="Nervousness" class="form-check-input position-static" type="checkbox" value="Nervousness" name="Psychiatric[]" <?php if(in_array('Nervousness', $xx)) { echo 'checked'; } ?>>
                              <label for="Nervousness" class="m-0">Nervousness</label>
                           </div>
                           <div class="form-check">
                              <input id="Depression" class="form-check-input position-static" type="checkbox" value="Depression" name="Psychiatric[]" <?php if(in_array('Depression', $xx)) { echo 'checked'; } ?>>
                              <label for="Depression" class="m-0">Depression</label>
                           </div>
                           <div class="form-check">
                              <input id="Suicide Attempts" class="form-check-input position-static" type="checkbox" value="Suicide Attempts" name="Psychiatric[]" <?php if(in_array('Suicide Attempts', $xx)) { echo 'checked'; } ?>>
                              <label for="Suicide Attempts" class="m-0">Suicide Attempts</label>
                           </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="None173" class="form-check-input position-static" type="checkbox" value="None" name="Psychiatric[]" <?php if(in_array('None', $xx)) { echo 'checked'; } ?>>
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
                              <input id="Change of Moods" class="form-check-input position-static" type="checkbox" value="Change of Moods" name="Neurologic[]" <?php if(in_array('Change of Moods', $yy)) { echo 'checked'; } ?>>
                              <label for="Change of Moods" class="m-0">Change of Moods</label>
                           </div>
                           <div class="form-check">
                              <input id="Headache2" class="form-check-input position-static" type="checkbox" value="Headache" name="Neurologic[]" <?php if(in_array('Headache', $yy)) { echo 'checked'; } ?>>
                              <label for="Headache2" class="m-0">Headache</label>
                           </div>
                           <div class="form-check">
                              <input id="Dizziness" class="form-check-input position-static" type="checkbox" value="Dizziness" name="Neurologic[]" <?php if(in_array('Dizziness', $yy)) { echo 'checked'; } ?>>
                              <label for="Dizziness" class="m-0">Dizziness</label>
                           </div>
                           <div class="form-check">
                              <input id="Blackouts" class="form-check-input position-static" type="checkbox" value="Blackouts" name="Neurologic[]" <?php if(in_array('Blackouts', $yy)) { echo 'checked'; } ?>>
                              <label for="Blackouts" class="m-0">Blackouts</label>
                           </div>
                           <div class="form-check">
                              <input id="Loss of Sensation" class="form-check-input position-static" type="checkbox" value="Loss of Sensation" name="Neurologic[]" <?php if(in_array('Loss of Sensation', $yy)) { echo 'checked'; } ?>>
                              <label for="Loss of Sensation" class="m-0">Loss of Sensation</label>
                           </div>
                           <div class="form-check">
                              <input id="Tremors" class="form-check-input position-static" type="checkbox" value="Tremors" name="Neurologic[]" <?php if(in_array('Tremors', $yy)) { echo 'checked'; } ?>>
                              <label for="Tremors" class="m-0">Tremors</label>
                           </div>
                           <div class="form-check">
                              <input id="None18" class="form-check-input position-static" type="checkbox" value="None" name="Neurologic[]" <?php if(in_array('None', $yy)) { echo 'checked'; } ?>>
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
                              <input id="GCS 15" class="form-check-input position-static" type="checkbox" value="GCS 15" name="NeurologicExam[]" <?php if(in_array('GCS 15', $zz)) { echo 'checked'; } ?>>
                              <label for="GCS 15" class="m-0">GCS 15</label>
                           </div>
                           <div class="form-check">
                              <input id="Oriented to Time and Place" class="form-check-input position-static" type="checkbox" value="Oriented to Time and Place" name="NeurologicExam[]" <?php if(in_array('Oriented to Time and Place', $zz)) { echo 'checked'; } ?>>
                              <label for="Oriented to Time and Place" class="m-0">Oriented to Time and Place</label>
                           </div>
                           <div class="form-check">
                              <input id="Intact CN" class="form-check-input position-static" type="checkbox" value="Intact CN" name="NeurologicExam[]" <?php if(in_array('Intact CN', $zz)) { echo 'checked'; } ?>>
                              <label for="Intact CN" class="m-0">Intact CN</label>
                           </div>
                           <div class="form-check">
                              <input id="5/5 Motor Strength Bilateral U/L Extremities" class="form-check-input position-static" type="checkbox" value="5/5 Motor Strength Bilateral U/L Extremities" name="NeurologicExam[]" <?php if(in_array('5/5 Motor Strength Bilateral U/L Extremities', $zz)) { echo 'checked'; } ?> >
                              <label for="5/5 Motor Strength Bilateral U/L Extremities" class="m-0">5/5 Motor Strength Bilateral U/L Extremities</label>
                           </div>
                           <div class="form-check">
                              <input id="100% Sensory Bilateral U/L Extremities" class="form-check-input position-static" type="checkbox" value="100% Sensory Bilateral U/L Extremities" name="NeurologicExam[]" <?php if(in_array('100% Sensory Bilateral U/L Extremities', $zz)) { echo 'checked'; } ?>>
                              <label for="100% Sensory Bilateral U/L Extremities" class="m-0">100% Sensory Bilateral U/L Extremities</label>
                           </div>
                          </div>
                        </div>



                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>Additional information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        
                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Faculty's photo</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)" >
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


                       <!--  <div class="col-12 text-right mt-4">
                            <p><b>Dr. Gabby R. Batuigas, Rph, M.D., MPH</b> <br>Licence Number: 124101</p>
                        </div> -->



                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="student.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="update_teacher" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
<?php include 'footer.php';  ?>
