<title>Patient records | </title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Patient List</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Patient List</li>
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

                <div class="card-tools mr-1">
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
                    <th>NAME</th>
                    <th>YEAR & COURSE / POSITION</th>
                    <th>GENDER</th>
                    <th>CONTACT</th>
                    <th>DATE REGISTERED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM patient WHERE DATE(date_registered)='$date_today'");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td><?php echo ucwords($row['position']); ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php if($row['position'] == 'Student') { echo $row['grade']; } else { echo $row['teacher_position']; }; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_registered'])) { echo date("F d, Y h:i A", strtotime($row['date_registered'])); } ?></td>
                    </tr>
                    <?php } ?>
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