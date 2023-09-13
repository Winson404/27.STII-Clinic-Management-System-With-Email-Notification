<title>STII Clinic Management System | Teacher Consultation records</title>
<?php  include 'navbar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>School Satff Consultation History</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">School Satff Consultation History</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <!-- <a href="form2_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New record</a> -->

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>PATIENT NAME</th>
                    <th>CHIEF COMPLAINTS</th>
                    <th>TEMPERATURE</th>
                    <th>VS/BP</th>
                    <th>PR</th>
                    <th>RR</th>
                    <th>O2ZAT</th>
                    <th>DATE ADMITTED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE patient.position='Teacher' ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_admitted'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['chief_complaints']; ?></td>
                        <td><?php echo $row['temperature']; ?></td>
                        <td><?php echo $row['vs_bp']; ?></td>
                        <td><?php echo $row['pr']; ?></td>
                        <td><?php echo $row['rr']; ?></td>
                        <td><?php echo $row['o2zat']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="student_view.php?student_Id=<?php echo $row['patient_Id']; ?>&&consult_Id=<?php echo $row['consult_Id']; ?>"><i class="fa-solid fa-eye"></i> View</a>
                          <a class="btn btn-info btn-sm" href="consultation_mgmt.php?page=<?php echo $row['consult_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['consult_Id']; ?>" disabled><i class="fas fa-trash"></i> Delete</button>
                        </td> 
                    </tr>

                    <?php include 'consultation_delete.php'; } ?>

                  </tbody>
                </table>

              </div>
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

