<title>STII Clinic Management System | All Faculty records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>All Faculty records</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Faculty records</li>
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
                    <th>LEVEL</th>
                    <th>BIRTHDAY</th>
                    <th>AGE</th>
                    <th>SEX</th>
                    <th>DATE REGISTERED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM patient WHERE patient.position='Teacher' ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_registered'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="all_teacher_view.php?student_Id=<?php echo $row['user_Id']; ?>"><i class="fa-solid fa-eye"></i> View</a>
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

