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
                        $sql = mysqli_query($conn, "SELECT * FROM notification WHERE sender='$id' AND subject = 'Request update approved' ORDER BY notif_Id DESC ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $rowClass = $row['is_read_by_staff'] == 1 ? 'text-muted' : 'text-black text-bold'; 
                      ?>
                    <tr class="<?php echo $rowClass; ?>">
                        <td><input type="checkbox" class="notificationCheckbox" name="notification_ids[]" value="<?php echo $row['notif_Id']; ?>"></td>
                        <td>
                          <?php if($row['type'] == 'Medicine'): ?>
                          <a href="medicine.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Student update'): ?>
                          <a href="student.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Teacher update'): ?>
                          <a href="teacher.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Consultation Teacher'): ?>
                          <a href="consultation_teacher.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Consultation Student'): ?>
                          <a href="consultation_student.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Physical Teacher'): ?>
                          <a href="physical_teacher.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Physical Student'): ?>
                          <a href="physical_student.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Asking Med Student'): ?>
                          <a href="asking_student.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Asking Med Teacher'): ?>
                          <a href="asking_teacher.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Medical Teacher'): ?>
                          <a href="form2_teacher.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Medical Student'): ?>
                          <a href="form2_student.php"><?php echo $row['type']; ?></a>
                          <?php elseif($row['type'] == 'Dental Teacher'): ?>
                          <a href="dental_teacher.php"><?php echo $row['type']; ?></a>
                          <?php else: ?>
                          <a href="dental_student.php"><?php echo $row['type']; ?></a>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_sent'])) { echo date("F d, Y h:i A", strtotime($row['date_sent'])); } ?></td>
                        <td>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['notif_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    </form>
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