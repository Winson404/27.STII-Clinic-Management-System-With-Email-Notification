<title>STII Clinic Management System | Consultation record</title>
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
            <h3>New Consultation </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Consultation </li>
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

                        
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Mother's maiden name</span>
                            <input type="text" class="form-control" name="mothers_maiden_name" placeholder="Enter mothers maiden name" required> 
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Chief complaints</span>
                            <textarea class="form-control" name="chief_complaints" placeholder="Enter Chief complaints" required cols="30" rows="2"></textarea>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Temperature</span>
                            <input type="text" class="form-control" name="temperature" placeholder="Enter Temperature" required> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">VS/BP</span>
                            <input type="text" class="form-control" name="vs_bp" placeholder="Enter VS/BP" > 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">PR</span>
                            <input type="text" class="form-control" name="pr" placeholder="Enter PR" > 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">RR</span>
                            <input type="text" class="form-control" name="rr" placeholder="Enter RR" > 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">O2ZAT</span>
                            <input type="text" class="form-control" name="o2zat" placeholder="Enter O2ZAT" > 
                          </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Nurse's Advice</b></span>
                            <div class="form-group">
                                <textarea name="doctors_advice" id="" cols="30" rows="3" class="form-control" placeholder="Enter Nurse's advice..."></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medicine given</b></span>
                            <div class="form-group">
                                <textarea name="medicine_given" id="" cols="30" rows="2" class="form-control" placeholder="Enter medicine given..."></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medical personnel</b></span>
                            <div class="form-group">
                                <textarea name="medical_personnel" id="" cols="30" rows="2" class="form-control" placeholder="Enter medical personnel..."></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="consultation.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_consultation" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
  $consult_Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE consultation.consult_Id='$consult_Id'");
  $row = mysqli_fetch_array($fetch);
  $user_Id = $row['user_Id'];
?>


  <!-- UPDATE -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update Consultation record</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Consultation record</li>
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
              <input type="hidden" class="form-control" name="consult_Id" value="<?php echo $consult_Id; ?>">
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


                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Mother's maiden name</span>
                            <input type="text" class="form-control" name="mothers_maiden_name" placeholder="Enter mothers maiden name" required value="<?php echo $row['mothers_maiden_name']; ?>"> 
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Chief complaints</span>
                            <textarea class="form-control" name="chief_complaints" placeholder="Enter Chief complaints" required cols="30" rows="2"><?php echo $row['chief_complaints']; ?></textarea>
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">Temperature</span>
                            <input type="text" class="form-control" name="temperature" placeholder="Enter Temperature" required value="<?php echo $row['temperature']; ?>"> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">VS/BP</span>
                            <input type="text" class="form-control" name="vs_bp" placeholder="Enter BP" value="<?php echo $row['vs_bp']; ?>"> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">PR</span>
                            <input type="text" class="form-control" name="pr" placeholder="Enter BP" value="<?php echo $row['pr']; ?>"> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">RR</span>
                            <input type="text" class="form-control" name="rr" placeholder="Enter RR" value="<?php echo $row['rr']; ?>"> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">O2ZAT</span>
                            <input type="text" class="form-control" name="o2zat" placeholder="Enter O2ZAT" value="<?php echo $row['o2zat']; ?>"> 
                          </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Doctor's Advice</b></span>
                            <div class="form-group">
                                <textarea name="doctors_advice" id="" cols="30" rows="3" class="form-control" placeholder="Enter doctor's advice..."><?php echo $row['doctors_advice']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medicine given</b></span>
                            <div class="form-group">
                                <textarea name="medicine_given" id="" cols="30" rows="2" class="form-control" placeholder="Enter medicine given..."><?php echo $row['medicine_given']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><b>Medical personnel</b></span>
                            <div class="form-group">
                                <textarea name="medical_personnel" id="" cols="30" rows="2" class="form-control" placeholder="Enter medical personnel..."><?php echo $row['medical_personnel']; ?></textarea>
                            </div>
                        </div>
                        

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="consultation.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="update_consultation" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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
