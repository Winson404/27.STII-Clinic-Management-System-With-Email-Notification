<title>STII Clinic Management System | Personal request</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Personal request</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Personal request</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <form action="process_save.php" method="POST">
                <div class="card-header p-2">
                  <!-- <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#add_medical"><i class="fa-sharp fa-solid fa-square-plus"></i> New request</button> -->
                  <div class="card-tools mr-1">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
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
                  <div class="form-group">
                    <label for="">Type of document</label>
                    <select name="type" id="" class="form-control" required>
                      <option value="" selected disabled>Select type</option>
                      <option value="Medical Certificate">Medical Certificate</option>
                      <option value="Medical Records">Medical Records</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Reason</label>
                    <textarea class="form-control" name="purpose" placeholder="Enter for purpose" id="" cols="30" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="appt_date">Pick desired date</label>
                    <input type="date" class="form-control" id="appt_date" name="pick_up_date" required value="<?= date('Y-m-d') ?>" readonly>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn bg-primary" name="personal_request"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->
<script>
                    // Get the current date
                    const currentDate = new Date();
                    
                    // Calculate the next day
                    currentDate.setDate(currentDate.getDate() + 1);
                    
                    // Format the next day in the YYYY-MM-DD format
                    const nextDay = currentDate.toISOString().split('T')[0];
                    
                    // Set the minimum date for the input element
                    document.getElementById('appt_date').setAttribute('min', nextDay);
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