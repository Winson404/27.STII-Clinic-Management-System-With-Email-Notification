<title>STII Clinic Management System | Consultation record</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



<?php 
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
            <h3>Consultation record</h3>
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
              <div class="card">
                <div class="card-body">
                    <div class="row">

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
                            <input type="text" class="form-control" name="vs_bp" placeholder="Enter BP" value="<?php echo $row['vs_bp']; ?>" readonly> 
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark text-bold">PR</span>
                            <input type="text" class="form-control" name="pr" placeholder="Enter BP" value="<?php echo $row['pr']; ?>" readonly> 
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
                            <span class="text-dark"><b>Doctor's Advice</b></span>
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
                        

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="consultation.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  </div>
                </div>
              </div>
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
