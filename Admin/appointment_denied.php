<title>STII Clinic Management System | Denied Appointment records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Denied Appointment List</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Denied Appointment List</li>
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
                    <!--<th>PATIENT TYPE</th>-->
                    <th>PATIENT NAME</th>
                    <th>APPT DATE</th>
                    <th>APPT TIME</th>
                    <th>REASON</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE (appt_status=2 || appt_status=4)");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <!--<td><?php //echo $row['position']; ?></td>-->
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td>
                          <?php if($row['appt_date'] == ""): ?>
                            <span class="badge badge-warning pt-1">Waiting for approval</span>
                          <?php else : ?>
                            <span class="badge badge-success pt-1"><?php echo date("F d, Y", strtotime($row['appt_date'])); ?></span>
                          <?php endif; ?>
                        </td>
                        <td><?= $row['appt_time'] ?></td>
                        <td><?php echo $row['appt_reason']; ?></td>
                    </tr>

                    <?php include "appointment_update_delete.php"; } ?>

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

