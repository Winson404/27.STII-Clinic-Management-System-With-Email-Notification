<title>STII Clinic Management System | Update request records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update request</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update request</li>
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
              <div class="card-header text-center">
              </div>
              <div class="card-body p-3">
                 <table id="example111" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>REQUESTER'S NAME</th>
                    <th>REQUEST TYPE</th>
                    <th>REQUEST STATUS</th>
                    <th>DATE REQUESTED</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM request_update JOIN users ON request_update.user_Id=users.user_Id ");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td><?php echo $row['req_type']; ?></td>
                        <td>
                          <?php if($row['req_status'] == 0): ?>
                            <span class="badge pt-1 bg-warning">Waiting for approval</span>
                          <?php elseif($row['req_status'] == 1): ?>
                            <span class="badge pt-1 bg-success">Request approved</span>
                          <?php else: ?>
                            <span class="badge pt-1 bg-danger">Request denied</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-primary"><?php echo date("F d, Y", strtotime($row['date_added'])); ?></td>
                        <td>
                          <?php if($row['req_status'] == 0): ?>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve<?php echo $row['req_Id']; ?>"><i class="fa-solid fa-floppy-disk"></i> Approve</button>
                            <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#deny<?php echo $row['req_Id']; ?>"><i class="fa-solid fa-ban"></i> Deny</button>
                          <?php else: ?>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve<?php echo $row['req_Id']; ?>" disabled><i class="fa-solid fa-floppy-disk"></i> Approve</button>
                            <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#deny<?php echo $row['req_Id']; ?>" disabled><i class="fa-solid fa-ban"></i> Deny</button>
                          <?php endif; ?>
                            <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['req_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                          
                        </td>
                    </tr>
                    <?php include 'request_action.php'; } ?>
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

