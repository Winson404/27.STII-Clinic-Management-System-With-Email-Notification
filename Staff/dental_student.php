<title>STII Clinic Management System | Student dental history</title>
<?php 
    include 'navbar.php'; 
    $req = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$id' AND req_type='Dental Student' AND req_status=1 ");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Student Dental Admission History</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student Dental Admission History</li>
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
                <!-- <a href="dental_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New record</a> -->

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
                    <th>DENTAL HISTORY</th>
                    <th>TEETH PROB.</th>
                    <th>MEDICINE</th>
                    <th>DENTAL ADVISED</th>
                    <th>DATE ADMITTED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE patient.position='Student' ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_admitted'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo $row['dental_history']; ?></td>
                        <td><?php echo $row['teeth_no']; ?></td>
                        <td><?php echo $row['medicine_given']; ?></td>
                        <td><?php echo $row['dental_advised']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="student_view.php?student_Id=<?php echo $row['patient_Id']; ?>&&dental=<?php echo $row['dental_Id']; ?>"><i class="fa-solid fa-eye"></i> View</a>
                          <?php if(mysqli_num_rows($req) > 0): ?>
                            <a class="btn btn-info btn-sm" href="dental_mgmt.php?page=<?php echo $row['dental_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <?php else: ?>
                            <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#requestupdate<?php echo $row['dental_Id']; ?>"><i class="fas fa-pencil-alt"></i> Request update</button>
                          <?php endif; ?>
                          
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['dental_Id']; ?>" disabled><i class="fas fa-trash"></i> Delete</button>
                        </td> 
                    </tr>

                    <?php include 'dental_delete.php'; } ?>

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

