<title>STII Clinic Management System | Medicine records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Medicine records</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Medicine records</li>
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
                <a href="medicine_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New record</a>

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">
                <form id="sortingForm" class="mb-3" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="sortBy">Sort By:</label>
                      <select id="sortBy" class="form-control" onchange="showDateInputs()" required>
                        <option value="" selected disabled>Select sorting type</option>
                        <!-- <option value="daily">Daily</option> -->
                        <option value="weekly">Weekly</option>
                        <option value="monthlyMedicine">Monthly</option>
                        <!-- <option value="yearly">Yearly</option> -->
                        <!-- <option value="custom">Custom Date</option> -->
                      </select>
                    </div>
                    <div id="dateInputs" class="form-group col-md-6">
                      <!-- Date inputs will be dynamically added here based on the selection -->
                    </div>
                    <div class="form-group col-md-3" style="margin-top: 31px;">
                      <button type="submit" class="btn btn-warning" onclick="sortRecords()"><i class="fa-solid fa-sort"></i> Sort Records</button>
                      <button type="button" name="filter" class="btn btn-primary" onclick=location=URL><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                    </div>
                  </div>
                </form>

              <?php 
                if(isset($_POST['weekly'])) {
                $weeklyStartDate = $_POST['weeklyStartDate'];
                $weeklyEndDate = $_POST['weeklyEndDate'];

                // Modify the format of the selected dates if needed
                $startDate = date('Y-m-d', strtotime($weeklyStartDate));
                $endDate = date('Y-m-d', strtotime($weeklyEndDate));

                $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE is_returned=0 AND (DATE(date_added) BETWEEN '$startDate' AND '$endDate') ORDER BY date_added DESC");

              ?>

              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/stii.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>Sibugay Technical Institute Incorporated</b></p>
                        <!-- <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p> -->
                        <p class="text-sm m-0">Ipil, Zamboanga Sibugay</p>
                    </div>
                    <!-- <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div> -->
                  </div>
                  <hr>
                  <p class="text-center"><b>MEDICINE RECORDS BETWEEN <?= strtoupper(date("F d, Y", strtotime($weeklyStartDate))).' - '.strtoupper(date("F d, Y", strtotime($weeklyEndDate))); ?></b></p>
                  <table id="" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                    <tr> 
                      <th>BRAND NAME</th>
                      <th>MEDICINE NAME</th>
                      <th>MEDICINE TYPE</th>                    
                      <th>MILLIGRAMS</th>
                      <th>AVAILABLE</th>
                      <th>RELEASED</th>
                      <th>EXP. DATE</th>
                      <th>DATE ADDED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                      <tr>
                          <td><?php if(empty($row['brand_name'])) { echo ucwords($row['other_brand_name']); } else { echo $row['brand_name']; }; ?></td>
                          <td><?php echo ucwords($row['med_name']); ?></td>
                          <td><?php echo ucwords($row['med_type']); ?></td>
                          <td><?php echo $row['milligrams']; ?></td>
                          <td><?php echo $row['med_stock_in']; ?></td>
                          <td><?php echo $row['med_stock_out']; ?></td>
                          <td class="text-primary"><?php if($row['expiration_date'] < date('Y-m-d')) { echo 'Expired'; } else { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                          <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                      </tr>
                      <?php include 'medicine_delete.php'; } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example1" class="table table-bordered table-hover text-sm">
                    <thead>
                    <tr> 
                      <th>BRAND NAME</th>
                      <th>MEDICINE NAME</th>
                      <th>MEDICINE TYPE</th>                    
                      <th>MILLIGRAMS</th>
                      <th>AVAILABLE</th>
                      <th>RELEASED</th>
                      <th>EXP. DATE</th>
                      <th>DATE ADDED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                      <tr>
                          <td><?php if(empty($row['brand_name'])) { echo ucwords($row['other_brand_name']); } else { echo $row['brand_name']; }; ?></td>
                          <td><?php echo ucwords($row['med_name']); ?></td>
                          <td><?php echo ucwords($row['med_type']); ?></td>
                          <td><?php echo $row['milligrams']; ?></td>
                          <td><?php echo $row['med_stock_in']; ?></td>
                          <td><?php echo $row['med_stock_out']; ?></td>
                          <td class="text-primary"><?php if($row['expiration_date'] < date('Y-m-d')) { echo 'Expired'; } else { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                          <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                      </tr>
                      <?php include 'medicine_delete.php'; } ?>
                    </tbody>
                  </table>
              <?php } } elseif(isset($_POST['monthlyMedicine'])) { 

                $monthlyStartDate = $_POST['monthlyStartDate'];
                $monthlyEndDate = $_POST['monthlyEndDate'];

                // Modify the format of the selected dates if needed
                $startDate = date('Y-m-d', strtotime($monthlyStartDate));
                $endDate = date('Y-m-d', strtotime($monthlyEndDate));
                $currentYear = date('Y');
                $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE is_returned=0 AND (DATE(date_added) BETWEEN '$startDate' AND '$endDate') ORDER BY date_added DESC");

              ?>
              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/stii.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 text-center">
                        <p class="text-sm m-0">Republic of the Philippines</p>
                        <p class="m-0"><b>Sibugay Technical Institute Incorporated</b></p>
                        <!-- <p class="text-sm font-italic m-0">(Formerly Ramon Magsaysay Technological University)</p> -->
                        <p class="text-sm m-0">Ipil, Zamboanga Sibugay</p>
                    </div>
                    <!-- <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div> -->
                  </div>
                  <hr>
                  <p class="text-center"><b>MEDICINE RECORDS BETWEEN <?= strtoupper(date("F", strtotime($monthlyStartDate))).' - '.strtoupper(date("F", strtotime($monthlyEndDate))).' '.$currentYear ?> </b></p>
                  <table id="" class="table table-bordered table-hover table-sm text-sm">
                    <thead>
                    <tr> 
                      <th>BRAND NAME</th>
                      <th>MEDICINE NAME</th>
                      <th>MEDICINE TYPE</th>                    
                      <th>MILLIGRAMS</th>
                      <th>STOCK</th>
                      <th>RELEASED</th>
                      <th>EXP. DATE</th>
                      <th>DATE ADDED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                      <tr>
                          <td><?php if(empty($row['brand_name'])) { echo ucwords($row['other_brand_name']); } else { echo $row['brand_name']; }; ?></td>
                          <td><?php echo ucwords($row['med_name']); ?></td>
                          <td><?php echo ucwords($row['med_type']); ?></td>
                          <td><?php echo $row['milligrams']; ?></td>
                          <td><?php echo $row['med_stock_in']; ?></td>
                          <td><?php echo $row['med_stock_out']; ?></td>
                          <td class="text-primary"><?php if($row['expiration_date'] < date('Y-m-d')) { echo 'Expired'; } else { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                          <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                      </tr>
                      <?php include 'medicine_delete.php'; } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example1" class="table table-bordered table-hover text-sm">
                    <thead>
                    <tr> 
                      <th>BRAND NAME</th>
                      <th>MEDICINE NAME</th>
                      <th>MEDICINE TYPE</th>                    
                      <th>MILLIGRAMS</th>
                      <th>AVAILABLE</th>
                      <th>RELEASED</th>
                      <th>EXP. DATE</th>
                      <th>DATE ADDED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                      <tr>
                          <td><?php if(empty($row['brand_name'])) { echo ucwords($row['other_brand_name']); } else { echo $row['brand_name']; }; ?></td>
                          <td><?php echo ucwords($row['med_name']); ?></td>
                          <td><?php echo ucwords($row['med_type']); ?></td>
                          <td><?php echo $row['milligrams']; ?></td>
                          <td><?php echo $row['med_stock_in']; ?></td>
                          <td><?php echo $row['med_stock_out']; ?></td>
                          <td class="text-primary"><?php if($row['expiration_date'] < date('Y-m-d')) { echo 'Expired'; } else { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                          <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                      </tr>
                      <?php include 'medicine_delete.php'; } ?>
                    </tbody>
                  </table>
              <?php } } else { ?>
                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>BRAND NAME</th>
                    <th>MEDICINE NAME</th>
                    <th>MEDICINE TYPE</th>                    
                    <th>MILLIGRAMS</th>
                    <th>AVAILABLE</th>
                    <th>RELEASED</th>
                    <th>EXP. DATE</th>
                    <th>DATE ADDED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE DATE(expiration_date)>CURDATE() AND is_returned=0 ");
                        while ($row = mysqli_fetch_array($sql)) {
                          $expirationDate = $row['expiration_date'];
                          $currentDate = date('Y-m-d');
                      ?>
                    <tr>
                       
                        <td><?php if(empty($row['brand_name'])) { echo ucwords($row['other_brand_name']); } else { echo $row['brand_name']; }; ?></td>
                        <td><?php echo ucwords($row['med_name']); ?></td>
                        <td><?php echo ucwords($row['med_type']); ?></td>
                        <td><?php echo $row['milligrams']; ?></td>
                        <td><?php echo $row['med_stock_in']; ?></td>
                        <td><?php echo $row['med_stock_out']; ?></td>
                        <td class="text-primary"><?php if($row['expiration_date'] < date('Y-m-d')) { echo 'Expired'; } else { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                        <td>
                          <a href="medicine_mgmt.php?page=<?php echo $row['med_Id']; ?>" class="btn bg-info btn-sm" ><i class="fas fa-pencil-alt"></i> Edit</a>
                          <?php if($row['med_stock_in'] != 0): ?>
                            <button type="button" class="btn bg-success btn-sm" data-toggle="modal" data-target="#stockUsed<?php echo $row['med_Id']; ?>"><i class="fas fa-pencil-alt"></i> Update Qty used</button>
                          <?php else: ?>
                            <button type="button" class="btn bg-success btn-sm" data-toggle="modal" data-target="#stockUsed<?php echo $row['med_Id']; ?>" disabled><i class="fas fa-pencil-alt"></i> Update Qty used</button>
                          <?php endif; ?>
                          <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['med_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>

                        </td> 
                    </tr>
                    <?php include 'medicine_delete.php'; } ?>
                  </tbody>
                </table>
              <?php } ?>
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

