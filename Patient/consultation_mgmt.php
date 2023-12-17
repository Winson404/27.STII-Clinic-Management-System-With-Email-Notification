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
                                  // Fetch data from dental_transaction_log and medicine tables
                                  $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM consultation_transaction_log WHERE consult_Id='$consult_Id' GROUP BY med_Id ");
                                  $medicineData = array();

                                  // Iterate through the results of dental_transaction_log
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
