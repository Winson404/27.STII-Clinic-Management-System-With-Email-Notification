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
                <form method="post" action="process_update.php">
                  <button type="submit" class="btn btn-danger btn-sm mb-3" id="markAsReadButton" name="mark_as_read" disabled>Mark as Read</button>
                  <table id="example1" class="table table-bordered table-hover text-sm">
                      <thead>
                          <tr>
                              <th><input type="checkbox" id="selectAllCheckboxes" name="select_all"></th>
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
                            $rowClass = $row['is_read_by_patient'] == 1 ? 'text-muted' : 'text-black text-bold'; // Define the CSS class based on is_read_by_patient value
                        ?>
                        <tr class="<?php echo $rowClass; ?>">
                            <td><input type="checkbox" class="notificationCheckbox" name="notification_ids[]" value="<?php echo $row['notif_Id']; ?>"></td>
                            <td>
                                <?php if($row['type'] == 'Appointment'): ?>
                                    <a href="appointment.php" class="text-dark" >Appointment</a>
                                <?php elseif($row['type'] == 'Medical certificate'): ?>
                                    <a href="medical_certificate.php" class="text-dark" >Medical certificate</a>
                                <?php else: ?>
                                    <a href="medical_records.php" class="text-dark" >Medical records</a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td class="text-primary"><?php if(!empty($row['date_sent'])) { echo date("F d, Y h:i A", strtotime($row['date_sent'])); } ?></td>
                            <td>
                                <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['notif_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                        <!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['notif_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bell"></i> Delete record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['notif_Id']; ?>" name="notif_Id">
          <h6 class="text-center">Delete record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_notification"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
                        <?php } ?>
                    </tbody>
                  </table>
              </form>
                <br>
                <hr>
                <br>
                <table id="example11" class="table table-bordered table-hover text-sm mt-5">
                  <thead>
                  <tr class="bg-light">
                    <th>#</th>
                    <th>ANNOUNCEMENT </th>
                    <th>DATE ADDED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                  <?php 
                    $no = 1;
                    $currentDate = date("Y-m-d"); // Get the current date in the format 'YYYY-MM-DD'
                    $sql = mysqli_query($conn, "SELECT * FROM announcement ORDER BY actId DESC");
                    while ($row = mysqli_fetch_array($sql)) {
                      $recordDate = date("Y-m-d", strtotime($row['date_added'])); // Convert the record date to 'YYYY-MM-DD' format
                      $cssClass = '';
                      if ($recordDate < $currentDate) {
                        $cssClass = 'text-muted';
                      } elseif ($recordDate == $currentDate) {
                        $cssClass = 'font-weight-bold text-dark';
                      }
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><a href="announcement.php" class="<?php echo $cssClass; ?>"><?php echo $row['actName']; ?></a></td>
                      <td><?php echo date("F d, Y", strtotime($row['date_added'])); ?></td>
                    </tr>
                  <?php include 'announcement_update_delete.php'; } ?>
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
<script>
    const selectAllCheckboxes = document.getElementById("selectAllCheckboxes");
const notificationCheckboxes = document.querySelectorAll(".notificationCheckbox");
const markAsReadButton = document.getElementById("markAsReadButton");

function updateMarkAsReadButton() {
    const anyCheckboxChecked = Array.from(notificationCheckboxes).some(checkbox => checkbox.checked);
    markAsReadButton.disabled = !anyCheckboxChecked;
    selectAllCheckboxes.checked = notificationCheckboxes.length > 0 && notificationCheckboxes.length === Array.from(notificationCheckboxes).filter(checkbox => checkbox.checked).length;
}

selectAllCheckboxes.addEventListener("change", function() {
    const isChecked = selectAllCheckboxes.checked;
    notificationCheckboxes.forEach(checkbox => {
        checkbox.checked = isChecked;
    });
    updateMarkAsReadButton();
});

notificationCheckboxes.forEach(checkbox => {
    checkbox.addEventListener("change", updateMarkAsReadButton);
});

</script>