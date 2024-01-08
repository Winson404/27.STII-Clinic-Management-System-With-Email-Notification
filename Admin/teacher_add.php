<title>STII Clinic Management System | Faculty info</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>New School Staff</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active"> School Staff Info</li>
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
              <!-- ID OF THE LOGGED IN USER -->
              <input type="hidden" class="form-control" name="added_by" value="<?= $row['user_Id']; ?>">
              
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
                                  <option value="Unvaccinated">Unvaccinated</option>
                                  <option value="1st Dose">1st Dose</option>
                                  <option value="2nd Dose">2nd Dose</option>
                                  <option value="1st Booster">1st Booster</option>
                                  <option value="Fully Vaccinated">Fully Vaccinated</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Civil Status</b></span>
                              <select class="form-control" name="civil_status" required>
                                <option selected disabled value="">Select status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow/er">Widow/er</option>
                                <option value="Separated">Separated</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Full name</b></span>
                              <input type="text" class="form-control"  placeholder="Enter full name" name="name" required>
                            </div>
                        </div>                    
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" id="position">
                          <div class="form-group">
                              <span class="text-dark"><b>Position</b></span>
                              <input type="text" class="form-control"  placeholder="Enter position" name="teacher_position">
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Date of birth</b></span>
                              <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" name="age" readonly>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <select class="form-control" name="sex" required>
                              <option selected disabled value="">Select sex</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Address</b></span>
                              <textarea name="address" class="form-control" id="" placeholder="Enter address" cols="30" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Religion</b></span>
                              <input type="text" class="form-control" placeholder="Enter your religion" name="religion" required>
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
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Email</b></span>
                              <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required style="text-transform:none">
                              <small id="text" style="font-style: italic;"></small>
                            </div>
                        </div>
                        


                        
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent's name/Guardian Or Spouse</b></span>
                              <input class="form-control" placeholder="Enter Parent's name/Guardian Or Spouse" name="parentName" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Parent/Guardian contact #</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="parentContact" placeholder = "9123456789" required maxlength="10">
                              </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>History of Present Illness</b></span>
                              <textarea name="illness" class="form-control" placeholder="Enter History of Present Illness" id="" cols="30" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Past medical history</b></span>
                              <textarea name="pastMedical" class="form-control" placeholder="Enter past medical history" id="" cols="30" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>OB-GYNE and Surgical History</b></span>
                              <textarea name="surgicalHistory" class="form-control" placeholder="Enter OB-GYNE and Surgical History" id="" cols="30" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Blood Type</b></span>
                              <input class="form-control" placeholder="Blood Type" name="blood_type" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Height(ft)</b></span>
                              <input class="form-control" placeholder="Height" name="height" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Weight(klg)</b></span>
                              <input class="form-control" placeholder="Weight" name="weight" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Known allergy to any food or drug, please specify(If applicable)</b></span>
                              <textarea name="allergy" class="form-control" placeholder="Enter known allergy to any food or drug, please specify" id="" cols="30" rows="1" required></textarea>
                            </div>
                        </div>


                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Account password</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Password</b></span>
                              <input type="password" class="form-control" name="password" placeholder="Password" id="password" required maxlength="8" onkeypress="validate_password()" style="text-transform:none">
                              <small id="length"></small>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Confirm password</b></span>
                              <input type="password" class="form-control" placeholder="Retype password" id="cpassword" onkeyup="validate_password_confirm_password()" required maxlength="8" style="text-transform:none">
                              <small id="wrong_pass_alert"></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"></div>


                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Nutritional and Immunization</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Complete immunization" class="form-check-input position-static" type="checkbox" value="Complete immunization" name="nutritional_Immunization[]" > 
                              <label for="Complete immunization" class="m-0">Complete immunization</label>
                           </div>
                           <div class="form-check">
                              <input id="Incomplete immunization" class="form-check-input position-static" type="checkbox" value="Incomplete immunization" name="nutritional_Immunization[]" >
                              <label for="Incomplete immunization" class="m-0">Incomplete immunization</label>
                           </div>
                           <div class="form-check">
                              <input id="Normal Filipino Diet" class="form-check-input position-static" type="checkbox" value="Normal Filipino Diet" name="nutritional_Immunization[]" >
                              <label for="Normal Filipino Diet" class="m-0">Normal Filipino Diet</label>
                           </div>
                           <div class="form-check">
                              <input id="High Protein Diet" class="form-check-input position-static" type="checkbox" value="High Protein Diet" name="nutritional_Immunization[]" >
                              <label for="High Protein Diet" class="m-0">High Protein Diet</label>
                           </div>
                           <div class="form-check">
                              <input id="Prefers Vegetables" class="form-check-input position-static" type="checkbox" value="Prefers Vegetables" name="nutritional_Immunization[]">
                              <label for="Prefers Vegetables" class="m-0">Prefers Vegetables</label>
                           </div>
                           <div class="form-check">
                              <input id="Prefers Canned Goods" class="form-check-input position-static" type="checkbox" value="Prefers Canned Goods" name="nutritional_Immunization[]" >
                              <label for="Prefers Canned Goods" class="m-0">Prefers Canned Goods</label>
                           </div>
                          </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Family History</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Asthma" class="form-check-input position-static" type="checkbox" value="Asthma" name="familyHistory[]" > 
                              <label for="Asthma" class="m-0">Asthma</label>
                           </div>
                           <div class="form-check">
                              <input id="Hypertension" class="form-check-input position-static" type="checkbox" value="Hypertension" name="familyHistory[]" >
                              <label for="Hypertension" class="m-0">Hypertension</label>
                           </div>
                           <div class="form-check">
                              <input id="Cancer" class="form-check-input position-static" type="checkbox" value="Cancer" name="familyHistory[]" >
                              <label for="Cancer" class="m-0">Cancer</label>
                           </div>
                           <div class="form-check">
                              <input id="Boold Dyscracis" class="form-check-input position-static" type="checkbox" value="Boold Dyscracis" name="familyHistory[]" >
                              <label for="Boold Dyscracis" class="m-0">Boold Dyscracis</label>
                           </div>
                           <div class="form-check">
                              <input id="Psychiatric Diseases" class="form-check-input position-static" type="checkbox" value="Psychiatric Diseases" name="familyHistory[]" >
                              <label for="Psychiatric Diseases" class="m-0">Psychiatric Diseases</label>
                           </div>
                           <div class="form-check">
                              <input id="DM" class="form-check-input position-static" type="checkbox" value="DM" name="familyHistory[]" >
                              <label for="DM" class="m-0">DM</label>
                           </div>
                           <div class="form-check">
                              <input id="Allergy" class="form-check-input position-static" type="checkbox" value="Allergy" name="familyHistory[]" >
                              <label for="Allergy" class="m-0">Allergy</label>
                           </div>
                           <div class="form-check">
                              <input id="No Heradi - Familiar Diseases" class="form-check-input position-static" type="checkbox" value="No Heradi - Familiar Diseases" name="familyHistory[]" >
                              <label for="No Heradi - Familiar Diseases" class="m-0">No Heradi - Familiar Diseases</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Social History</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Non-Smoker" class="form-check-input position-static" type="checkbox" value="Non-Smoker" name="socialHistory[]" > 
                              <label for="Non-Smoker" class="m-0">Non-Smoker</label>
                           </div>
                           <div class="form-check">
                              <input id="Smoker" class="form-check-input position-static" type="checkbox" value="Smoker" name="socialHistory[]" onclick="toggleSmoker()">
                              <label for="Smoker" class="m-0">Smoker</label>
                           </div>
                           <div class="mb-2" id="myInput2" style="display:none">
                              <span class="text-dark"><b>Packs/Years</b></span>
                              <input type="text" id="packs" class="form-control form-control-sm" name="packsYears" placeholder="Enter packs/years" value="NA" />
                           </div>
                           <div class="mb-2" id="myInput3" style="display:none">
                              <span class="text-dark"><b>Environment</b></span>
                              <input type="text" id="environ" class="form-control form-control-sm" name="environment" placeholder="Enter environment" value="NA" />
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
                                packs.value = "";
                                environ.value = "";
                              } else {
                                inputField2.style.display = "none";
                                inputField3.style.display = "none";
                                packs.value = "NA";
                                environ.value = "NA";
                              }
                            }
                          </script>


                           <div class="form-check">
                              <input id="Non-Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Non-Alcoholic Beverage Drinker" name="socialHistory[]" >
                              <label for="Non-Alcoholic Beverage Drinker" class="m-0">Non-Alcoholic Beverage Drinker</label>
                           </div>
                           <div class="form-check">
                              <input id="Occasional Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Occasional Alcoholic Beverage Drinker" name="socialHistory[]" >
                              <label for="Occasional Alcoholic Beverage Drinker" class="m-0">Occasional Alcoholic Beverage Drinker</label>
                           </div>
                           <div class="form-check">
                              <input id="Frequent Alcoholic Beverage Drinker" class="form-check-input position-static" type="checkbox" value="Frequent Alcoholic Beverage Drinker" name="socialHistory[]" onclick="toggle()">
                              <label for="Frequent Alcoholic Beverage Drinker" class="m-0">Frequent Alcoholic Beverage Drinker</label>
                           </div>
                           <div id="myInput" style="display:none">
                              <span class="text-dark"><b>Frequency</b></span>
                              <input type="text" id="frequency" class="form-control form-control-sm" name="frequency" placeholder="Enter frequency" value="NA" />
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
                              frequency.value = "";
                            } else {
                              inputField.style.display = "none";
                              frequency.value = "NA";
                            }
                          }
                        </script>




                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>Review of Systems</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>GENERAL</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Weight loss" class="form-check-input position-static" type="checkbox" value="Weight loss" name="general[]" > 
                              <label for="Weight loss" class="m-0">Weight loss</label>
                           </div>
                           <div class="form-check">
                              <input id="Weakness" class="form-check-input position-static" type="checkbox" value="Weakness" name="general[]" >
                              <label for="Weakness" class="m-0">Weakness</label>
                           </div>
                           <div class="form-check">
                              <input id="Fatigue" class="form-check-input position-static" type="checkbox" value="Fatigue" name="general[]" >
                              <label for="Fatigue" class="m-0">Fatigue</label>
                           </div>
                           <div class="form-check">
                              <input id="Fever" class="form-check-input position-static" type="checkbox" value="Fever" name="general[]" >
                              <label for="Fever" class="m-0">Fever</label>
                           </div>
                           <div class="form-check">
                              <input id="None" class="form-check-input position-static" type="checkbox" value="None" name="general[]" >
                              <label for="None" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>HEMATOLOGIC</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Anemia" class="form-check-input position-static" type="checkbox" value="Anemia" name="hematologic[]" > 
                              <label for="Anemia" class="m-0">Anemia</label>
                           </div>
                           <div class="form-check">
                              <input id="Easy Bruising or Bleeding" class="form-check-input position-static" type="checkbox" value="Easy Bruising or Bleeding" name="hematologic[]" >
                              <label for="Easy Bruising or Bleeding" class="m-0">Easy Bruising or Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="Past Transfusion" class="form-check-input position-static" type="checkbox" value="Past Transfusion" name="hematologic[]" >
                              <label for="Past Transfusion" class="m-0">Past Transfusion</label>
                           </div>
                           <div class="form-check">
                              <input id="None2" class="form-check-input position-static" type="checkbox" value="None" name="hematologic[]" >
                              <label for="None2" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>ENDOCRINE</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Heat and Cold Tolerance" class="form-check-input position-static" type="checkbox" value="Heat and Cold Tolerance" name="endocrine[]" > 
                              <label for="Heat and Cold Tolerance" class="m-0">Heat and Cold Tolerance</label>
                           </div>
                           <div class="form-check">
                              <input id="Excessive Sweating" class="form-check-input position-static" type="checkbox" value="Excessive Sweating" name="endocrine[]" >
                              <label for="Excessive Sweating" class="m-0">Excessive Sweating</label>
                           </div>
                           <div class="form-check">
                              <input id="Excessive Thirst or Hunger" class="form-check-input position-static" type="checkbox" value="Excessive Thirst or Hunger" name="endocrine[]" >
                              <label for="Excessive Thirst or Hunger" class="m-0">Excessive Thirst or Hunger</label>
                           </div>
                           <div class="form-check">
                              <input id="Polyuria" class="form-check-input position-static" type="checkbox" value="Polyuria" name="endocrine[]" >
                              <label for="Polyuria" class="m-0">Polyuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Change in shoe size" class="form-check-input position-static" type="checkbox" value="Change in shoe size" name="endocrine[]" >
                              <label for="Change in shoe size" class="m-0">Change in shoe size</label>
                           </div>
                           <div class="form-check">
                              <input id="None3" class="form-check-input position-static" type="checkbox" value="None" name="endocrine[]" >
                              <label for="None3" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>EXTREMITIES</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Good Pulse" class="form-check-input position-static" type="checkbox" value="Good Pulse" name="extremities[]" > 
                              <label for="Good Pulse" class="m-0">Good Pulse</label>
                           </div>
                           <div class="form-check">
                              <input id="Weak Pulse" class="form-check-input position-static" type="checkbox" value="Weak Pulse" name="extremities[]" >
                              <label for="Weak Pulse" class="m-0">Weak Pulse</label>
                           </div>
                           <div class="form-check">
                              <input id="CRT <2s" class="form-check-input position-static" type="checkbox" value="CRT <2s" name="extremities[]" >
                              <label for="CRT <2s" class="m-0">CRT <2s</label>
                           </div>
                           <div class="form-check">
                              <input id="Edema" class="form-check-input position-static" type="checkbox" value="Edema" name="extremities[]" >
                              <label for="Edema" class="m-0">Edema</label>
                           </div>
                           <div class="form-check">
                              <input id="Limited ROM" class="form-check-input position-static" type="checkbox" value="Limited ROM" name="extremities[]" >
                              <label for="Limited ROM" class="m-0">Limited ROM</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>SKIN</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Rashes" class="form-check-input position-static" type="checkbox" value="Rashes" name="skin[]" > 
                              <label for="Rashes" class="m-0">Rashes</label>
                           </div>
                           <div class="form-check">
                              <input id="Lumps" class="form-check-input position-static" type="checkbox" value="Lumps" name="skin[]" >
                              <label for="Lumps" class="m-0">Lumps</label>
                           </div>
                           <div class="form-check">
                              <input id="Itching" class="form-check-input position-static" type="checkbox" value="Itching" name="skin[]" >
                              <label for="Itching" class="m-0">Itching</label>
                           </div>
                           <div class="form-check">
                              <input id="Moles" class="form-check-input position-static" type="checkbox" value="Moles" name="skin[]" >
                              <label for="Moles" class="m-0">Moles</label>
                           </div>
                           <div class="form-check">
                              <input id="None4" class="form-check-input position-static" type="checkbox" value="None" name="skin[]" >
                              <label for="None4" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>HEENT</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Head</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Headache" class="form-check-input position-static" type="checkbox" value="Headache" name="head[]" > 
                              <label for="Headache" class="m-0">Headache</label>
                           </div>
                           <div class="form-check">
                              <input id="Diziness" class="form-check-input position-static" type="checkbox" value="Diziness" name="head[]" >
                              <label for="Diziness" class="m-0">Diziness</label>
                           </div>
                           <div class="form-check">
                              <input id="Head injury" class="form-check-input position-static" type="checkbox" value="Head injury" name="head[]" >
                              <label for="Head injury" class="m-0">Head injury</label>
                           </div>
                           <div class="form-check">
                              <input id="None5" class="form-check-input position-static" type="checkbox" value="None" name="head[]" >
                              <label for="None5" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Eyes</b></a></span>
                          <div class="form-group">
                           <div class="form-group m-0">
                              <span class="text-dark"><b>Vision</b></span>
                              <input type="text" class="form-control-sm form-control" placeholder="Enter vision" name="vision"> 
                           </div>
                           <div class="form-check">
                              <input id="Glasses or Contact Lens" class="form-check-input position-static" type="checkbox" value="Glasses or Contact Lens" name="Eyes[]" >
                              <label for="Glasses or Contact Lens" class="m-0">Glasses or Contact Lens</label>
                           </div>
                           <div class="form-check">
                              <input id="Redness" class="form-check-input position-static" type="checkbox" value="Redness" name="Eyes[]" >
                              <label for="Redness" class="m-0">Redness</label>
                           </div>
                           <div class="form-check">
                              <input id="Eye pain" class="form-check-input position-static" type="checkbox" value="Eye pain" name="Eyes[]" >
                              <label for="Eye pain" class="m-0">Eye pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Blurring of Vision" class="form-check-input position-static" type="checkbox" value="Blurring of Vision" name="Eyes[]" >
                              <label for="Blurring of Vision" class="m-0">Blurring of Vision</label>
                           </div>
                           <div class="form-check">
                              <input id="None6" class="form-check-input position-static" type="checkbox" value="None" name="Eyes[]" >
                              <label for="None6" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Ears</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Tinnitus" class="form-check-input position-static" type="checkbox" value="Tinnitus" name="ears[]" >
                              <label for="Tinnitus" class="m-0">Tinnitus</label>
                           </div>
                           <div class="form-check">
                              <input id="Vertigo" class="form-check-input position-static" type="checkbox" value="Vertigo" name="ears[]" >
                              <label for="Vertigo" class="m-0">Vertigo</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear infection" class="form-check-input position-static" type="checkbox" value="Ear infection" name="ears[]" >
                              <label for="Ear infection" class="m-0">Ear infection</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear Discharge" class="form-check-input position-static" type="checkbox" value="Ear Discharge" name="ears[]" >
                              <label for="Ear Discharge" class="m-0">Ear Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="Ear Pain" class="form-check-input position-static" type="checkbox" value="Ear Pain" name="ears[]" >
                              <label for="Ear Pain" class="m-0">Ear Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="None7" class="form-check-input position-static" type="checkbox" value="None" name="ears[]" >
                              <label for="None7" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Nose</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nasal Discharge" class="form-check-input position-static" type="checkbox" value="Nasal Discharge" name="nose[]" >
                              <label for="Nasal Discharge" class="m-0">Nasal Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="Nose Bleeding" class="form-check-input position-static" type="checkbox" value="Nose Bleeding" name="nose[]" >
                              <label for="Nose Bleeding" class="m-0">Nose Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="None8" class="form-check-input position-static" type="checkbox" value="None" name="nose[]" >
                              <label for="None8" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Mouth and Throat</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Bleeding Gums" class="form-check-input position-static" type="checkbox" value="Bleeding Gums" name="mouthThroat[]" >
                              <label for="Bleeding Gums" class="m-0">Bleeding Gums</label>
                           </div>
                           <div class="form-check">
                              <input id="Use of Dentures" class="form-check-input position-static" type="checkbox" value="Use of Dentures" name="mouthThroat[]" onclick="toggleDentures()">
                              <label for="Use of Dentures" class="m-0">Use of Dentures</label>
                           </div>
                           <div class="mb-2" id="myInput4" style="display:none">
                              <span class="text-dark"><b>Years/Months</b></span>
                              <input type="text" id="yearsMonths" class="form-control form-control-sm" name="yearsMonths" placeholder="Enter Years/Months" value="NA" />
                           </div>
                           <div class="form-check">
                              <input id="Sore Throat" class="form-check-input position-static" type="checkbox" value="Sore Throat" name="mouthThroat[]" >
                              <label for="Sore Throat" class="m-0">Sore Throat</label>
                           </div>
                           <div class="form-check">
                              <input id="None9" class="form-check-input position-static" type="checkbox" value="None" name="mouthThroat[]" >
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
                              yearsMonths.value = "";
                            } else {
                              inputField.style.display = "none";
                              yearsMonths.value = "NA";
                            }
                          }
                        </script>


                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Neck</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Goiter" class="form-check-input position-static" type="checkbox" value="Goiter" name="neck[]" >
                              <label for="Goiter" class="m-0">Goiter</label>
                           </div>
                           <div class="form-check">
                              <input id="Lamps" class="form-check-input position-static" type="checkbox" value="Lamps" name="neck[]">
                              <label for="Lamps" class="m-0">Lamps</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain" class="form-check-input position-static" type="checkbox" value="Pain" name="neck[]" >
                              <label for="Pain" class="m-0">Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="None10" class="form-check-input position-static" type="checkbox" value="None" name="neck[]" >
                              <label for="None10" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                         <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Breast</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Lumps2" class="form-check-input position-static" type="checkbox" value="Lumps" name="Breast[]" >
                              <label for="Lumps2" class="m-0">Lumps</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain2" class="form-check-input position-static" type="checkbox" value="Pain" name="Breast[]">
                              <label for="Pain2" class="m-0">Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Nipple Discharge" class="form-check-input position-static" type="checkbox" value="Nipple Discharge" name="Breast[]" >
                              <label for="Nipple Discharge" class="m-0">Nipple Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="None11" class="form-check-input position-static" type="checkbox" value="None" name="Breast[]" >
                              <label for="None11" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Respiratory</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Cough" class="form-check-input position-static" type="checkbox" value="Cough" name="Respiratory[]" >
                              <label for="Cough" class="m-0">Cough</label>
                           </div>
                           <div class="form-check">
                              <input id="Haemoptysis" class="form-check-input position-static" type="checkbox" value="Haemoptysis" name="Respiratory[]">
                              <label for="Haemoptysis" class="m-0">Haemoptysis</label>
                           </div>
                           <div class="form-check">
                              <input id="Dyspnea" class="form-check-input position-static" type="checkbox" value="Dyspnea" name="Respiratory[]" >
                              <label for="Dyspnea" class="m-0">Dyspnea</label>
                           </div>
                           <div class="form-check">
                              <input id="None12" class="form-check-input position-static" type="checkbox" value="None" name="Respiratory[]" >
                              <label for="None12" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Cardiovascular</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Chest Pain" class="form-check-input position-static" type="checkbox" value="Chest Pain" name="Cardiovascular[]" >
                              <label for="Chest Pain" class="m-0">Chest Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Palpitation" class="form-check-input position-static" type="checkbox" value="Palpitation" name="Cardiovascular[]">
                              <label for="Palpitation" class="m-0">Palpitation</label>
                           </div>
                           <div class="form-check">
                              <input id="Edema2" class="form-check-input position-static" type="checkbox" value="Edema" name="Cardiovascular[]" >
                              <label for="Edema2" class="m-0">Edema</label>
                           </div>
                           <div class="form-check">
                              <input id="None13" class="form-check-input position-static" type="checkbox" value="None" name="Cardiovascular[]" >
                              <label for="None13" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Gastrointestinal</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Difficulty Swallowing" class="form-check-input position-static" type="checkbox" value="Difficulty Swallowing" name="Gastrointestinal[]" >
                              <label for="Difficulty Swallowing" class="m-0">Difficulty Swallowing</label>
                           </div>
                           <div class="form-check">
                              <input id="Heart Burn" class="form-check-input position-static" type="checkbox" value="Heart Burn" name="Gastrointestinal[]">
                              <label for="Heart Burn" class="m-0">Heart Burn</label>
                           </div>
                           <div class="form-check">
                              <input id="Pain w/ Defecation" class="form-check-input position-static" type="checkbox" value="Pain w/ Defecation" name="Gastrointestinal[]" >
                              <label for="Pain w/ Defecation" class="m-0">Pain w/ Defecation</label>
                           </div>
                           <div class="form-check">
                              <input id="Abdominal Pain" class="form-check-input position-static" type="checkbox" value="Abdominal Pain" name="Gastrointestinal[]" >
                              <label for="Abdominal Pain" class="m-0">Abdominal Pain</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Haemorrhoids" class="form-check-input position-static" type="checkbox" value="Haemorrhoids" name="Gastrointestinal[]" >
                              <label for="Haemorrhoids" class="m-0">Haemorrhoids</label>
                           </div>
                           <div class="form-check">
                              <input id="Constipation" class="form-check-input position-static" type="checkbox" value="Constipation" name="Gastrointestinal[]">
                              <label for="Constipation" class="m-0">Constipation</label>
                           </div>
                           <div class="form-check">
                              <input id="Diarrhoea" class="form-check-input position-static" type="checkbox" value="Diarrhoea" name="Gastrointestinal[]" >
                              <label for="Diarrhoea" class="m-0">Diarrhoea</label>
                           </div>
                           <div class="form-check">
                              <input id="Hepatitis" class="form-check-input position-static" type="checkbox" value="Hepatitis" name="Gastrointestinal[]" >
                              <label for="Hepatitis" class="m-0">Hepatitis</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Loss of Appetite" class="form-check-input position-static" type="checkbox" value="Loss of Appetite" name="Gastrointestinal[]" >
                              <label for="Loss of Appetite" class="m-0">Loss of Appetite</label>
                           </div>
                           <div class="form-check">
                              <input id="Nausea & Vomiting" class="form-check-input position-static" type="checkbox" value="Nausea & Vomiting" name="Gastrointestinal[]">
                              <label for="Nausea & Vomiting" class="m-0">Nausea & Vomiting</label>
                           </div>
                           <div class="form-check">
                              <input id="Rectal Bleeding" class="form-check-input position-static" type="checkbox" value="Rectal Bleeding" name="Gastrointestinal[]" >
                              <label for="Rectal Bleeding" class="m-0">Rectal Bleeding</label>
                           </div>
                           <div class="form-check">
                              <input id="Black Stool" class="form-check-input position-static" type="checkbox" value="Black Stool" name="Gastrointestinal[]" >
                              <label for="Black Stool" class="m-0">Black Stool</label>
                           </div>
                           <div class="form-check">
                              <input id="None14" class="form-check-input position-static" type="checkbox" value="None" name="Gastrointestinal[]" >
                              <label for="None14" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Peripheral Vascular</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Leg Cramps" class="form-check-input position-static" type="checkbox" value="Leg Cramps" name="peripheralvascular[]" >
                              <label for="Leg Cramps" class="m-0">Leg Cramps</label>
                           </div>
                           <div class="form-check">
                              <input id="Varicose Veins" class="form-check-input position-static" type="checkbox" value="Varicose Veins" name="peripheralvascular[]">
                              <label for="Varicose Veins" class="m-0">Varicose Veins</label>
                           </div>
                           <div class="form-check">
                              <input id="Swellign in Legs or Feet" class="form-check-input position-static" type="checkbox" value="Swellign in Legs or Feet" name="peripheralvascular[]" >
                              <label for="Swellign in Legs or Feet" class="m-0">Swellign in Legs or Feet</label>
                           </div>
                           <div class="form-check">
                              <input id="None15" class="form-check-input position-static" type="checkbox" value="None" name="peripheralvascular[]" >
                              <label for="None15" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Urinary</b></a></span>
                          <div class="form-group m-0">
                              <span class="text-dark"><b>Frequency of Urination</b></span>
                              <input type="text" class="form-control-sm form-control" placeholder="Enter frequency of urinary" name="freq_urinary"> 
                          </div>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Polyuria2" class="form-check-input position-static" type="checkbox" value="Polyuria" name="Urinary[]" >
                              <label for="Polyuria2" class="m-0">Polyuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Dysuria" class="form-check-input position-static" type="checkbox" value="Dysuria" name="Urinary[]">
                              <label for="Dysuria" class="m-0">Dysuria</label>
                           </div>
                           <div class="form-check">
                              <input id="Haematuria" class="form-check-input position-static" type="checkbox" value="Haematuria" name="Urinary[]" >
                              <label for="Haematuria" class="m-0">Haematuria</label>
                           </div>
                           <div class="form-check">
                              <input id="None16" class="form-check-input position-static" type="checkbox" value="None" name="Urinary[]" >
                              <label for="None16" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Kidney Stone" class="form-check-input position-static" type="checkbox" value="Kidney Stone" name="Urinary[]" >
                              <label for="Kidney Stone" class="m-0">Kidney Stone</label>
                           </div>
                           <div class="form-check">
                              <input id="UTI" class="form-check-input position-static" type="checkbox" value="UTI" name="Urinary[]">
                              <label for="UTI" class="m-0">UTI</label>
                           </div>
                           <div class="form-check">
                              <input id="None17" class="form-check-input position-static" type="checkbox" value="None" name="Urinary[]" >
                              <label for="None17" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Male</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Hernia" class="form-check-input position-static" type="checkbox" value="Hernia" name="male[]" >
                              <label for="Hernia" class="m-0">Hernia</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharges/Sore on the penis" class="form-check-input position-static" type="checkbox" value="Discharges/Sore on the penis" name="male[]">
                              <label for="Discharges/Sore on the penis" class="m-0">Discharges/Sore on the penis</label>
                           </div>
                           <div class="form-check">
                              <input id="Testicular Pain or Mass" class="form-check-input position-static" type="checkbox" value="Testicular Pain or Mass" name="male[]" >
                              <label for="Testicular Pain or Mass" class="m-0">Testicular Pain or Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="History of STD" class="form-check-input position-static" type="checkbox" value="History of STD" name="male[]" >
                              <label for="History of STD" class="m-0">History of STD</label>
                           </div>
                           <div class="form-check">
                              <input id="N/A" class="form-check-input position-static" type="checkbox" value="N/A" name="male[]" >
                              <label for="N/A" class="m-0">N/A</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Female</b></a></span>
                          <div class="form-group m-0">
                              <span class="text-dark"><b>Age of Menarche</b></span>
                              <input type="text" class="form-control-sm form-control" placeholder="Enter Age of Menarche" name="age_menarche"> 
                          </div>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Female_History of STD" class="form-check-input position-static" type="checkbox" value="History of STD" name="female[]" >
                              <label for="Female_History of STD" class="m-0">History of STD</label>
                           </div>
                           <div class="form-check">
                              <input id="Itching2" class="form-check-input position-static" type="checkbox" value="Itching" name="female[]">
                              <label for="Itching2" class="m-0">Itching</label>
                           </div>
                           <div class="form-check">
                              <input id="Vaginal Discharge" class="form-check-input position-static" type="checkbox" value="Vaginal Discharge" name="female[]" >
                              <label for="Vaginal Discharge" class="m-0">Vaginal Discharge</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Sores" class="form-check-input position-static" type="checkbox" value="Sores" name="female[]" >
                              <label for="Sores" class="m-0">Sores</label>
                           </div>
                           <div class="form-check">
                              <input id="Lumps22" class="form-check-input position-static" type="checkbox" value="Lumps" name="female[]" >
                              <label for="Lumps22" class="m-0">Lumps</label>
                           </div>
                           </div>
                           <div class="form-check">
                              <input id="N/A2" class="form-check-input position-static" type="checkbox" value="N/A" name="female[]" >
                              <label for="N/A2" class="m-0">N/A</label>
                           </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Muscular Skeletal</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Muscle of Joint Pain" class="form-check-input position-static" type="checkbox" value="Muscle of Joint Pain" name="muscularSkeletal[]" >
                              <label for="Muscle of Joint Pain" class="m-0">Muscle of Joint Pain</label>
                           </div>
                           <div class="form-check">
                              <input id="Arthritis" class="form-check-input position-static" type="checkbox" value="Arthritis" name="muscularSkeletal[]" >
                              <label for="Arthritis" class="m-0">Arthritis</label>
                           </div>
                           <div class="form-check">
                              <input id="Backache" class="form-check-input position-static" type="checkbox" value="Backache" name="muscularSkeletal[]" >
                              <label for="Backache" class="m-0">Backache</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="Gout" class="form-check-input position-static" type="checkbox" value="Gout" name="muscularSkeletal[]" >
                              <label for="Gout" class="m-0">Gout</label>
                           </div>
                           <div class="form-check">
                              <input id="Inflammation" class="form-check-input position-static" type="checkbox" value="Inflammation" name="muscularSkeletal[]" >
                              <label for="Inflammation" class="m-0">Inflammation</label>
                           </div>
                           <div class="form-check">
                              <input id="History of Trauma" class="form-check-input position-static" type="checkbox" value="History of Trauma" name="muscularSkeletal[]" >
                              <label for="History of Trauma" class="m-0">History of Trauma</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Psychiatric</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nervousness" class="form-check-input position-static" type="checkbox" value="Nervousness" name="Psychiatric[]" >
                              <label for="Nervousness" class="m-0">Nervousness</label>
                           </div>
                           <div class="form-check">
                              <input id="Depression" class="form-check-input position-static" type="checkbox" value="Depression" name="Psychiatric[]" >
                              <label for="Depression" class="m-0">Depression</label>
                           </div>
                           <div class="form-check">
                              <input id="Suicide Attempts" class="form-check-input position-static" type="checkbox" value="Suicide Attempts" name="Psychiatric[]" >
                              <label for="Suicide Attempts" class="m-0">Suicide Attempts</label>
                           </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group mt-4">
                           <div class="form-check">
                              <input id="None173" class="form-check-input position-static" type="checkbox" value="None" name="Psychiatric[]" >
                              <label for="None173" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Neurologic</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Change of Moods" class="form-check-input position-static" type="checkbox" value="Change of Moods" name="Neurologic[]" >
                              <label for="Change of Moods" class="m-0">Change of Moods</label>
                           </div>
                           <div class="form-check">
                              <input id="Headache2" class="form-check-input position-static" type="checkbox" value="Headache" name="Neurologic[]" >
                              <label for="Headache2" class="m-0">Headache</label>
                           </div>
                           <div class="form-check">
                              <input id="Dizziness" class="form-check-input position-static" type="checkbox" value="Dizziness" name="Neurologic[]" >
                              <label for="Dizziness" class="m-0">Dizziness</label>
                           </div>
                           <div class="form-check">
                              <input id="Blackouts" class="form-check-input position-static" type="checkbox" value="Blackouts" name="Neurologic[]" >
                              <label for="Blackouts" class="m-0">Blackouts</label>
                           </div>
                           <div class="form-check">
                              <input id="Loss of Sensation" class="form-check-input position-static" type="checkbox" value="Loss of Sensation" name="Neurologic[]" >
                              <label for="Loss of Sensation" class="m-0">Loss of Sensation</label>
                           </div>
                           <div class="form-check">
                              <input id="Tremors" class="form-check-input position-static" type="checkbox" value="Tremors" name="Neurologic[]" >
                              <label for="Tremors" class="m-0">Tremors</label>
                           </div>
                           <div class="form-check">
                              <input id="None18" class="form-check-input position-static" type="checkbox" value="None" name="Neurologic[]" >
                              <label for="None18" class="m-0">None</label>
                           </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Neurologic Exam</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="GCS 15" class="form-check-input position-static" type="checkbox" value="GCS 15" name="NeurologicExam[]" >
                              <label for="GCS 15" class="m-0">GCS 15</label>
                           </div>
                           <div class="form-check">
                              <input id="Oriented to Time and Place" class="form-check-input position-static" type="checkbox" value="Oriented to Time and Place" name="NeurologicExam[]" >
                              <label for="Oriented to Time and Place" class="m-0">Oriented to Time and Place</label>
                           </div>
                           <div class="form-check">
                              <input id="Intact CN" class="form-check-input position-static" type="checkbox" value="Intact CN" name="NeurologicExam[]" >
                              <label for="Intact CN" class="m-0">Intact CN</label>
                           </div>
                           <div class="form-check">
                              <input id="5/5 Motor Strength Bilateral U/L Extremities" class="form-check-input position-static" type="checkbox" value="5/5 Motor Strength Bilateral U/L Extremities" name="NeurologicExam[]" >
                              <label for="5/5 Motor Strength Bilateral U/L Extremities" class="m-0">5/5 Motor Strength Bilateral U/L Extremities</label>
                           </div>
                           <div class="form-check">
                              <input id="100% Sensory Bilateral U/L Extremities" class="form-check-input position-static" type="checkbox" value="100% Sensory Bilateral U/L Extremities" name="NeurologicExam[]" >
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


                       <!--  <div class="col-12 text-right mt-4">
                            <p><b>Dr. Gabby R. Batuigas, Rph, M.D., MPH</b> <br>Licence Number: 124101</p>
                        </div> -->



                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="teacher.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_teacher" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->



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
