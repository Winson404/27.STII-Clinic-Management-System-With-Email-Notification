<title>STII Clinic Management System | Asking medicine</title>
<?php 
    include 'navbar.php'; 
    $req = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$id' AND req_type='Asking Med Student' AND req_status=1 ");
?>'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Asking medicine History</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Asking medicine history</li>
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
                    <th>POSITION</th>
                    <th>PATIENT NAME</th>
                    <th>VITAL SIGN</th>
                    <th>MEDICAL ADVISED</th>
                    <th>MEDICINE GIVEN</th>
                    <th>DATE ADMITTED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id WHERE patient.position='Student'");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['vital_sign']; ?></td>
                        <td><?php echo $row['medical_advised']; ?></td>
                        <td><?php echo $row['medicine_given']; ?></td>
                        <td class="text-primary"><?php if($row['date_admitted'] != '') {echo date("F d, Y", strtotime($row['date_admitted']));} ?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="student_view.php?student_Id=<?php echo $row['patient_Id']; ?>&&asking_med_Id=<?php echo $row['asking_med_Id']; ?>"><i class="fa-solid fa-eye"></i> View</a>

                          <?php if(mysqli_num_rows($req) > 0): ?>
                            <a class="btn btn-info btn-sm" href="asking_med_mgmt.php?page=<?php echo $row['asking_med_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <?php else: ?>
                            <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#requestupdate<?php echo $row['asking_med_Id']; ?>"><i class="fas fa-pencil-alt"></i> Request update</button>
                          <?php endif; ?>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['asking_med_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td> 
                    </tr>

                    <?php include 'asking_med_delete.php'; } ?>

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

