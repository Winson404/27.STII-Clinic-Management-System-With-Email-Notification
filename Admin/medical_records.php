<title>STII Clinic Management System | Medical records requests</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Medical records requests</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Medical records requests</li>
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
               <!-- <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#add_medical"><i class="fa-sharp fa-solid fa-square-plus"></i> New request</button>-->
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
                    <!--<th>POSITION</th>-->
                    <th>PURPOSE</th>
                    <th>PICK UP DATE</th>
                    <th>DATE REQUESTED</th>
                    <th>STATUS</th>
                    <th>PRINT</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM request_doc JOIN patient ON request_doc.patient_Id=patient.user_Id WHERE type='Medical Records' ");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <!--<td><?php echo $row['position']; ?></td>-->
                        <td><?php echo $row['purpose']; ?></td>
                        <td><?php echo date("F d, Y", strtotime($row['pick_up_date'])); ?></td>
                        <td class="text-primary"><?php echo date("F d, Y h:i A", strtotime($row['date_created'])); ?></td>
                        <td>
                          <?php if($row['req_status'] == 0): ?>
                            <span class="badge badge-warning pt-1">Pending</span>
                          <?php elseif($row['req_status'] == 1): ?>
                            <span class="badge badge-info pt-1">Processing</span>
                          <?php elseif($row['req_status'] == 2): ?>
                            <span class="badge badge-primary pt-1">Ready to pick-up</span>
                          <?php else: ?>
                            <span class="badge badge-success pt-1">Released</span>
                          <?php endif; ?>

                        </td>
                        <td>
                          <div class="dropdown dropleft">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"> Print </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a type="button" href="print_basic_info.php?patient_Id=<?php echo $row['patient_Id']; ?>" class="text-dark ml-2">Basic information</a>
                              <a type="button" href="print_asking_medicine.php?patient_Id=<?php echo $row['patient_Id']; ?>" class="text-dark ml-2">Asking medicine</a>
                              <a type="button" href="print_dental.php?patient_Id=<?php echo $row['patient_Id']; ?>" class="text-dark ml-2">Dental record</a>
                              <a type="button" href="print_medical_admission.php?patient_Id=<?php echo $row['patient_Id']; ?>" class="text-dark ml-2">Medical admission</a>
                              <a type="button" href="print_physical_admission.php?patient_Id=<?php echo $row['patient_Id']; ?>" class="text-dark ml-2">Physical admission</a>
                              <a type="button" href="print_consultation.php?patient_Id=<?php echo $row['patient_Id']; ?>" class="text-dark ml-2">Consultation</a>
                            </div>
                          </div>
                        </td> 
                        <td>
                          <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#updateStatus<?php echo $row['req_Id']; ?>"><i class="fas fa-pencil-alt"></i> Update status</button>
                        </td>
                        <!-- <td>
                          <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#update_medical_records<?php //echo $row['req_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete_medical_records<?php //echo $row['req_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td>  -->
                    </tr>

                    <?php include 'medical_records_update_delete.php'; } ?>

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'medical_records_add.php'; include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->

