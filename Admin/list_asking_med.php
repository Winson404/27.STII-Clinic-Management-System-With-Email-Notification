<title>Asking Medicine records | </title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Asking Medicine records</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Asking Medicine records</li>
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
                <!-- <a href="form2_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New record</a> -->

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
                        <option value="monthly">Monthly</option>
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

                $sql = mysqli_query($conn, "SELECT * FROM asking_med 
                  JOIN patient ON asking_med.patient_Id=patient.user_Id 
                  WHERE (DATE(date_admitted) 
                  BETWEEN '$startDate' AND '$endDate') ORDER BY date_admitted DESC");
              ?>

              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row invoice-info d-flex p-0 m-0" style="line-height: 18px;">
                    <div class="col-sm-2">
                      <img src="../images/stii.png"  alt="" style="margin-left: 90px;"  width="75">
                    </div>    
                    <div class="col-sm-8 invoice-col text-center">
                      <address>
                        <!-- Republic of the Philippines<br> -->
                        <strong>SIBUGAY TECHNICAL, INSTITUTE, INC.</strong><br>
                        Lower Taway, Ipil, Zamboanga Sibugay<br>
                        Email address: sibugaytech07@gmail.com <br>
                        www.sibugaytech.edu.ph
                      </address>
                    </div>
                    <!-- <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div> -->
                  </div>
                  <hr>
                  <p class="text-center"><b>ASKING MEDICINE RECORDS BETWEEN <?= strtoupper(date("F d, Y", strtotime($weeklyStartDate))).' - '.strtoupper(date("F d, Y", strtotime($weeklyEndDate))); ?></b></p>
                  <table id="example111s" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                    <tr> 
                      <th>YEAR&COURSE / POSITION</th>
                      <th>PATIENT NAME</th>
                      <th>VITAL SIGN</th>
                      <th>MEDICAL ADVISED</th>
                      <th>MEDICINE GIVEN</th>
                      <th>DATE VISITED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                            $asking_med_Id = $row['asking_med_Id'];

                            $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM asking_med_transaction_log WHERE asking_med_Id=$asking_med_Id GROUP BY med_Id");
                            $medicineData = array();

                            // Iterate through the results of asking_med_transaction_log
                            while ($logRow = mysqli_fetch_assoc($fetch2)) {
                                $med_Id = $logRow['med_Id'];

                                // Fetch medicine information based on med_Id
                                $fetchMedicine = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id'");
                                $medicineRow = mysqli_fetch_assoc($fetchMedicine);

                                // Check if the medicine is found and has positive stock
                                if ($medicineRow && $medicineRow['med_stock_in'] > 0 && strtotime($medicineRow['expiration_date']) >= strtotime(date('Y-m-d'))) {
                                    // Use regular expression to extract the unit label
                                    preg_match('/(\d+)\s*(\w+)/', $medicineRow['med_stock_in'], $matches);

                                    $medicineData[] = array(
                                        'med_name' => ucwords($medicineRow['med_name']),
                                        'stock_in' => $matches[1], // Quantity
                                        'units_label' => $matches[2], // Units label
                                        'stock_used_value' => $logRow['sum_stock_used_value'],
                                    );
                                }
                            }
                        ?>
                      <tr>
                        <td><?php if($row['position'] == 'Student') { echo ucwords($row['grade']); } else { echo ucwords($row['teacher_position']); }; ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo ucwords($row['vital_sign']); ?></td>
                        <td><?php echo ucwords($row['medical_advised']); ?></td>
                          <td>
                            <?php foreach ($medicineData as $key => $medicine) { ?>
                                <?php echo $medicine['med_name'] . ' - ' . $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                <?php if ($key < count($medicineData) - 1) { echo ','; } ?>
                            <?php } ?>
                        </td>
                          <td class="text-primary"><?php if($row['date_admitted'] != '') {echo date("F d, Y", strtotime($row['date_admitted']));} ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example1" class="table table-bordered table-hover text-sm">
                    <thead>
                    <tr> 
                      <th>YEAR&COURSE / POSITION</th>
                      <th>PATIENT NAME</th>
                      <th>VITAL SIGN</th>
                      <th>MEDICAL ADVISED</th>
                      <th>MEDICINE GIVEN</th>
                      <th>DATE VISITED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                            $asking_med_Id = $row['asking_med_Id'];

                            $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM asking_med_transaction_log WHERE asking_med_Id=$asking_med_Id GROUP BY med_Id");
                            $medicineData = array();

                            // Iterate through the results of asking_med_transaction_log
                            while ($logRow = mysqli_fetch_assoc($fetch2)) {
                                $med_Id = $logRow['med_Id'];

                                // Fetch medicine information based on med_Id
                                $fetchMedicine = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id'");
                                $medicineRow = mysqli_fetch_assoc($fetchMedicine);

                                // Check if the medicine is found and has positive stock
                                if ($medicineRow && $medicineRow['med_stock_in'] > 0 && strtotime($medicineRow['expiration_date']) >= strtotime(date('Y-m-d'))) {
                                    // Use regular expression to extract the unit label
                                    preg_match('/(\d+)\s*(\w+)/', $medicineRow['med_stock_in'], $matches);

                                    $medicineData[] = array(
                                        'med_name' => ucwords($medicineRow['med_name']),
                                        'stock_in' => $matches[1], // Quantity
                                        'units_label' => $matches[2], // Units label
                                        'stock_used_value' => $logRow['sum_stock_used_value'],
                                    );
                                }
                            }
                        ?>
                      <tr>
                          <td><?php if($row['position'] == 'Student') { echo ucwords($row['grade']); } else { echo ucwords($row['teacher_position']); }; ?></td>
                          <td><?php echo ucwords($row['name']); ?></td>
                          <td><?php echo ucwords($row['vital_sign']); ?></td>
                          <td><?php echo ucwords($row['medical_advised']); ?></td>
                          <td>
                            <?php foreach ($medicineData as $key => $medicine) { ?>
                                <?php echo $medicine['med_name'] . ' - ' . $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                <?php if ($key < count($medicineData) - 1) { echo ','; } ?>
                            <?php } ?>
                        </td>
                          <td class="text-primary"><?php if($row['date_admitted'] != '') {echo date("F d, Y", strtotime($row['date_admitted']));} ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } } elseif(isset($_POST['monthly'])) { 

                $monthlyMonth = $_POST['monthlyMonth'];
                $currentYear = date('Y');
                $sql = mysqli_query($conn, "SELECT * FROM asking_med 
                  JOIN patient ON asking_med.patient_Id=patient.user_Id 
                  WHERE MONTH(date_admitted) = '$monthlyMonth' ORDER BY date_admitted DESC");
              ?>
              <?php if(mysqli_num_rows($sql) > 0) { ?>
                <button id="printButton" class="btn btn-success btn-sm float-sm-right mr-3"><i class="fa-solid fa-print"></i> Print</button>
                <div id="printElement">
                  <div class="row invoice-info d-flex p-0 m-0" style="line-height: 18px;">
                    <div class="col-sm-2">
                      <img src="../images/stii.png"  alt="" style="margin-left: 90px;"  width="75">
                    </div>    
                    <div class="col-sm-8 invoice-col text-center">
                      <address>
                        <!-- Republic of the Philippines<br> -->
                        <strong>SIBUGAY TECHNICAL, INSTITUTE, INC.</strong><br>
                        Lower Taway, Ipil, Zamboanga Sibugay<br>
                        Email address: sibugaytech07@gmail.com <br>
                        www.sibugaytech.edu.ph
                      </address>
                    </div>
                    <!-- <div class="col-lg-1 col-md-1 col-sm-3">
                      <img src="../images/CCIT.png" class="img-fluid" alt="" width="80" style="top: 5px;">
                    </div> -->
                  </div>
                  <hr>
                  <p class="text-center"><b>ASKING MEDICINE RECORDS ON THE MONTH OF <?= strtoupper(date("F", strtotime("$currentYear-$monthlyMonth-01"))) . " $currentYear"; ?> </b></p>
                  <table id="" class="table table-bordered table-hover text-sm table-sm">
                    <thead>
                    <tr> 
                      <th>YEAR&COURSE / POSITION</th>
                      <th>PATIENT NAME</th>
                      <th>VITAL SIGN</th>
                      <th>MEDICAL ADVISED</th>
                      <th>MEDICINE GIVEN</th>
                      <th>DATE VISITED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                            $asking_med_Id = $row['asking_med_Id'];

                            $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM asking_med_transaction_log WHERE asking_med_Id=$asking_med_Id GROUP BY med_Id");
                            $medicineData = array();

                            // Iterate through the results of asking_med_transaction_log
                            while ($logRow = mysqli_fetch_assoc($fetch2)) {
                                $med_Id = $logRow['med_Id'];

                                // Fetch medicine information based on med_Id
                                $fetchMedicine = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id'");
                                $medicineRow = mysqli_fetch_assoc($fetchMedicine);

                                // Check if the medicine is found and has positive stock
                                if ($medicineRow && $medicineRow['med_stock_in'] > 0 && strtotime($medicineRow['expiration_date']) >= strtotime(date('Y-m-d'))) {
                                    // Use regular expression to extract the unit label
                                    preg_match('/(\d+)\s*(\w+)/', $medicineRow['med_stock_in'], $matches);

                                    $medicineData[] = array(
                                        'med_name' => ucwords($medicineRow['med_name']),
                                        'stock_in' => $matches[1], // Quantity
                                        'units_label' => $matches[2], // Units label
                                        'stock_used_value' => $logRow['sum_stock_used_value'],
                                    );
                                }
                            }
                        ?>
                      <tr>
                          <td><?php if($row['position'] == 'Student') { echo ucwords($row['grade']); } else { echo ucwords($row['teacher_position']); }; ?></td>
                          <td><?php echo ucwords($row['name']); ?></td>
                          <td><?php echo ucwords($row['vital_sign']); ?></td>
                          <td><?php echo ucwords($row['medical_advised']); ?></td>
                          <td>
                            <?php foreach ($medicineData as $key => $medicine) { ?>
                                <?php echo $medicine['med_name'] . ' - ' . $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                <?php if ($key < count($medicineData) - 1) { echo ','; } ?>
                            <?php } ?>
                        </td>
                          <td class="text-primary"><?php if($row['date_admitted'] != '') {echo date("F d, Y", strtotime($row['date_admitted']));} ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                  <table id="example1" class="table table-bordered table-hover text-sm">
                    <thead>
                    <tr> 
                      <th>YEAR&COURSE / POSITION</th>
                      <th>PATIENT NAME</th>
                      <th>VITAL SIGN</th>
                      <th>MEDICAL ADVISED</th>
                      <th>MEDICINE GIVEN</th>
                      <th>DATE VISITED</th>
                    </tr>
                    </thead>
                    <tbody id="users_data">
                        <?php 
                          while ($row = mysqli_fetch_array($sql)) {
                            $asking_med_Id = $row['asking_med_Id'];

                            $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM asking_med_transaction_log WHERE asking_med_Id=$asking_med_Id GROUP BY med_Id");
                            $medicineData = array();

                            // Iterate through the results of asking_med_transaction_log
                            while ($logRow = mysqli_fetch_assoc($fetch2)) {
                                $med_Id = $logRow['med_Id'];

                                // Fetch medicine information based on med_Id
                                $fetchMedicine = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id'");
                                $medicineRow = mysqli_fetch_assoc($fetchMedicine);

                                // Check if the medicine is found and has positive stock
                                if ($medicineRow && $medicineRow['med_stock_in'] > 0 && strtotime($medicineRow['expiration_date']) >= strtotime(date('Y-m-d'))) {
                                    // Use regular expression to extract the unit label
                                    preg_match('/(\d+)\s*(\w+)/', $medicineRow['med_stock_in'], $matches);

                                    $medicineData[] = array(
                                        'med_name' => ucwords($medicineRow['med_name']),
                                        'stock_in' => $matches[1], // Quantity
                                        'units_label' => $matches[2], // Units label
                                        'stock_used_value' => $logRow['sum_stock_used_value'],
                                    );
                                }
                            }
                        ?>
                      <tr>
                        <td><?php if($row['position'] == 'Student') { echo ucwords($row['grade']); } else { echo ucwords($row['teacher_position']); }; ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo ucwords($row['vital_sign']); ?></td>
                        <td><?php echo ucwords($row['medical_advised']); ?></td>
                          <td>
                            <?php foreach ($medicineData as $key => $medicine) { ?>
                                <?php echo $medicine['med_name'] . ' - ' . $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                <?php if ($key < count($medicineData) - 1) { echo ','; } ?>
                            <?php } ?>
                        </td>
                          <td class="text-primary"><?php if($row['date_admitted'] != '') {echo date("F d, Y", strtotime($row['date_admitted']));} ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              <?php } } else { ?>
                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr> 
                    <th>YEAR&COURSE / POSITION</th>
                    <th>PATIENT NAME</th>
                    <th>VITAL SIGN</th>
                    <th>MEDICAL ADVISED</th>
                    <th>MEDICINE GIVEN</th>
                    <th>DATE VISITED</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id");
                        while ($row = mysqli_fetch_array($sql)) {

                          $asking_med_Id = $row['asking_med_Id'];

                          $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM asking_med_transaction_log WHERE asking_med_Id=$asking_med_Id GROUP BY med_Id");
                          $medicineData = array();

                          // Iterate through the results of asking_med_transaction_log
                          while ($logRow = mysqli_fetch_assoc($fetch2)) {
                              $med_Id = $logRow['med_Id'];

                              // Fetch medicine information based on med_Id
                              $fetchMedicine = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id'");
                              $medicineRow = mysqli_fetch_assoc($fetchMedicine);

                              // Check if the medicine is found and has positive stock
                              if ($medicineRow && $medicineRow['med_stock_in'] > 0 && strtotime($medicineRow['expiration_date']) >= strtotime(date('Y-m-d'))) {
                                  // Use regular expression to extract the unit label
                                  preg_match('/(\d+)\s*(\w+)/', $medicineRow['med_stock_in'], $matches);

                                  $medicineData[] = array(
                                      'med_name' => ucwords($medicineRow['med_name']),
                                      'stock_in' => $matches[1], // Quantity
                                      'units_label' => $matches[2], // Units label
                                      'stock_used_value' => $logRow['sum_stock_used_value'],
                                  );
                              }
                          }
                      ?>
                    <tr>
                        <td><?php if($row['position'] == 'Student') { echo ucwords($row['grade']); } else { echo ucwords($row['teacher_position']); }; ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo ucwords($row['vital_sign']); ?></td>
                        <td><?php echo ucwords($row['medical_advised']); ?></td>
                        <td>
                            <?php foreach ($medicineData as $key => $medicine) { ?>
                                <?php echo $medicine['med_name'] . ' - ' . $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                <?php if ($key < count($medicineData) - 1) { echo ','; } ?>
                            <?php } ?>
                        </td>
                        <td class="text-primary"><?php if($row['date_admitted'] != '') {echo date("F d, Y", strtotime($row['date_admitted']));} ?></td>
                    </tr>
                    <?php } ?>
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

