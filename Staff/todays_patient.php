<title>STII Clinic Management System | Today's medical records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Today's Patient</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Today's Patient</li>
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

          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center">
                <h6 class="text-primary text-bold">DENTAL ADMISSION </h6>
              </div>
              <div class="card-body p-3">
                 <table id="example111" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>USERTYPE</th>
                    <th>PATIENT NAME</th>
                    <th>DATE ADMITTED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE DATE(date_admitted) = '$date_today' ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_admitted'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center">
                <h6 class="text-primary text-bold">MEDICAL ADMISSION </h6>
              </div>
              <div class="card-body p-3">
                 <table id="example1111" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>USERTYPE</th>
                    <th>PATIENT NAME</th>
                    <th>DATE ADMITTED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE DATE(date_admitted) = '$date_today' ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_admitted'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>





          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center">
                <h6 class="text-primary text-bold">PHYSICAL EXAM </h6>
              </div>
              <div class="card-body p-3">
                 <table id="example1111" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>USERTYPE</th>
                    <th>PATIENT NAME</th>
                    <th>DATE ADMITTED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE DATE(date_admitted) = '$date_today'");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_admitted'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>





          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center">
                <h6 class="text-primary text-bold">CONSULTATION </h6>
              </div>
              <div class="card-body p-3">
                 <table id="example1111" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>USERTYPE</th>
                    <th>PATIENT NAME</th>
                    <th>DATE ADMITTED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE DATE(date_admitted) = '$date_today' ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $dateString = $row['date_admitted'];
                          $timezone = new DateTimeZone('Asia/Manila'); // Replace 'Your_Timezone' with your desired timezone
                          $datetime = new DateTime($dateString, $timezone);
                          $formattedDate = $datetime->format("F d, Y h:i A");
                      ?>
                    <tr>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td class="text-primary"><?php echo $formattedDate; ?></td>
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

