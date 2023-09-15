<title>STII Clinic Management System | Notification records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Notification History</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Notification History</li>
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
                <!-- <a href="student_add.php" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Student</a> -->
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
                    <th>TYPE</th>
                    <th>SUBJECT</th>
                    <th>CONTENT</th>
                    <th>DATE SENT</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM notification WHERE sender='$id' AND (subject != 'Appointment request' AND subject != 'Medical certificate request' AND subject != 'Medical records request') ORDER BY notif_Id DESC ");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_sent'])) { echo date("F d, Y h:i A", strtotime($row['date_sent'])); } ?></td>
                        <td>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['notif_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td>
                    </tr>

                    <?php include 'notification_delete.php'; } ?>

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