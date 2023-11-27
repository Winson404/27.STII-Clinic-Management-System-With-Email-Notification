<title>STII Clinic Management System | Dashboard</title>
<?php 
    include 'navbar.php';  
    $check_appt = mysqli_query($conn, "SELECT * FROM appointment WHERE appt_status=0 AND DATE(date_added)='$date_today' AND seen_by_admin=0"); 
    $result = mysqli_num_rows($check_appt);

    $check_med_cert = mysqli_query($conn, "SELECT * FROM request_doc JOIN patient ON request_doc.patient_Id=patient.user_Id WHERE DATE(date_created)='$date_today' AND seen_by_admin=0 AND req_status=0"); 
    $result2 = mysqli_num_rows($check_med_cert);

    $check_med_stock = mysqli_query($conn, "SELECT * FROM medicine WHERE DATE(expiration_date)>CURDATE() AND is_returned=0  AND med_stock_in<20 AND seen_by_admin=0"); 
    $result3 = mysqli_num_rows($check_med_stock);

    $check_unsettled = mysqli_query($conn, "SELECT * FROM appointment WHERE DATE(appt_date)<CURDATE() AND (appt_status != 3 AND appt_status != 2 AND appt_status !=4) AND seen_by_admin=0"); 
    $result4 = mysqli_num_rows($check_unsettled);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-start">

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $sql = mysqli_query($conn, "SELECT patient_Id FROM dental WHERE DATE(date_admitted) = '$date_today'");
                  $dental = array();
                  while ($row = mysqli_fetch_assoc($sql)) {
                      $dental[$row['patient_Id']] = true;
                  }
                  // Count the unique patient IDs
                  $dental_count = count($dental);

                  $sql2 = mysqli_query($conn, "SELECT patient_Id FROM form2 WHERE DATE(date_admitted) = '$date_today'");
                  $form2 = array();
                  while ($row2 = mysqli_fetch_assoc($sql2)) {
                      $form2[$row2['patient_Id']] = true;
                  }
                  // Count the unique patient IDs
                  $form2_count = count($form2);

                  $sql3 = mysqli_query($conn, "SELECT patient_Id FROM consultation WHERE DATE(date_admitted) = '$date_today'");
                  $consultation = array();
                  while ($row3 = mysqli_fetch_assoc($sql3)) {
                      $consultation[$row3['patient_Id']] = true;
                  }
                  // Count the unique patient IDs
                  $consult_count = count($consultation);

                  $sql4 = mysqli_query($conn, "SELECT patient_Id FROM physical WHERE DATE(date_admitted) = '$date_today'");
                  $physical = array();
                  while ($row4 = mysqli_fetch_assoc($sql4)) {
                      $physical[$row4['patient_Id']] = true;
                  }
                  // Count the unique patient IDs
                  $physical_count = count($physical);

                  $sql5 = mysqli_query($conn, "SELECT patient_Id FROM asking_med WHERE DATE(date_admitted) = '$date_today'");
                  $asking_med = array();
                  while ($row5 = mysqli_fetch_assoc($sql5)) {
                      $asking_med[$row5['patient_Id']] = true;
                  }
                  // Count the unique patient IDs
                  $asking_med_count = count($asking_med);


                  $total = $dental_count + $form2_count + $consult_count + $physical_count + $asking_med_count;
                  // $form2 = mysqli_query($conn, "SELECT form2_Id FROM form2 WHERE DATE(date_admitted) = '$date_today'");
                  // $form2CountRow = mysqli_num_rows($form2);

                  // $total = $dentalCountRow + $form2CountRow;
                ?>
                <h3><?php echo $total; ?></h3>

                <p>Today's patient</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="todays_patient.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $request = mysqli_query($conn, "SELECT req_Id FROM request_update WHERE req_status=0");
                  $request_count = mysqli_num_rows($request);
                ?>
                <h3><?php echo $request_count; ?></h3>

                <p>Approval Requests</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-hourglass-start"></i>
              </div>
              <a href="request_update.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


         <!--  <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  //$users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Admin'");
                  //$row_users = mysqli_num_rows($users);
                ?>
                <h3><?php //echo $row_users; ?></h3>

                <p>Administrators</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-secret"></i>
              </div>
              <a href="admin.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  //$users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Staff'");
                  //$row_users = mysqli_num_rows($users);
                ?>
                <h3><?php //echo $row_users; ?></h3>

                <p>Registered Staff</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-secret"></i>
              </div>
              <a href="admin.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
 -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from patient WHERE position='Student'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Registered Students</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-graduate"></i>
              </div>
              <a href="student.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from patient WHERE position='Teacher'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Registered School Staff</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-chalkboard-user"></i>
              </div>
              <a href="teacher.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $appt = mysqli_query($conn, "SELECT appt_Id from appointment");
                  $row_appt = mysqli_num_rows($appt);
                ?>
                <h3><?php echo $row_appt; ?></h3>

                <p>Appointment </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-calendar-days"></i>
              </div>
              <a href="appointment.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $cert = mysqli_query($conn, "SELECT req_Id from request_doc WHERE type='Medical Certificate' ");
                  $row_cert = mysqli_num_rows($cert);
                ?>
                <h3><?php echo $row_cert; ?></h3>

                <p>Medical Certification Request</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-certificate"></i>
              </div>
              <a href="medical_certificate.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $medical = mysqli_query($conn, "SELECT req_Id from request_doc WHERE type='Medical Records' ");
                  $row_medical = mysqli_num_rows($medical);
                ?>
                <h3><?php echo $row_medical; ?></h3>

                <p>Medical Records Request</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house-chimney-medical"></i>
              </div>
              <a href="medical_records.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $announce = mysqli_query($conn, "SELECT actId from announcement");
                  $row_announce = mysqli_num_rows($announce);
                ?>
                <h3><?php echo $row_announce; ?></h3>

                <p>Announcement</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bell"></i>
              </div>
              <a href="announcement.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $medicine = mysqli_query($conn, "SELECT med_Id from medicine");
                  $row_medicine = mysqli_num_rows($medicine);
                ?>
                <h3><?php echo $row_medicine; ?></h3>

                <p>Medicine Inventory</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house-chimney-medical"></i>
              </div>
              <a href="medicine.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         

        
          


          <div class="col-12"><hr><h3>Student Medical History</h3></div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $dental = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_dental = mysqli_num_rows($dental);
                ?>
                <h3><?php echo $row_dental; ?></h3>

                <p>Dental Admission History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-tooth"></i>
              </div>
              <a href="dental_student.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $form2 = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_form2 = mysqli_num_rows($form2);
                ?>
                <h3><?php echo $row_form2; ?></h3>

                <p>Medical Admission History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house-chimney-medical"></i>
              </div>
              <a href="form2_student.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $physical = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_physical = mysqli_num_rows($physical);
                ?>
                <h3><?php echo $row_physical; ?></h3>

                <p>Physical Exam </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="physical_student.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $consult = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_consult = mysqli_num_rows($consult);
                ?>
                <h3><?php echo $row_consult; ?></h3>

                <p>Consultation History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="consultation_student.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $med = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_med = mysqli_num_rows($med);
                ?>
                <h3><?php echo $row_med; ?></h3>

                <p>Asking Medicine History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="asking_med_student.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>






          <div class="col-12"><hr><h3>School Staff Medical History</h3></div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $teacher_dental = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_teacher_dental = mysqli_num_rows($teacher_dental);
                ?>
                <h3><?php echo $row_teacher_dental; ?></h3>

                <p>Dental Admission History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-tooth"></i>
              </div>
              <a href="dental_teacher.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $teacher_form2 = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_teacher_form2 = mysqli_num_rows($teacher_form2);
                ?>
                <h3><?php echo $row_teacher_form2; ?></h3>

                <p>Medical Admission History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house-chimney-medical"></i>
              </div>
              <a href="form2_teacher.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $teacher_physical = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_teacher_physical = mysqli_num_rows($teacher_physical);
                ?>
                <h3><?php echo $row_teacher_physical; ?></h3>

                <p>Physical Exam </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="physical_teacher.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $consult = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_consult = mysqli_num_rows($consult);
                ?>
                <h3><?php echo $row_consult; ?></h3>

                <p>Consultation History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="consultation_teacher.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $teacher_med = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_teacher_med = mysqli_num_rows($teacher_med);
                ?>
                <h3><?php echo $row_teacher_med; ?></h3>

                <p>Asking Medicine History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="asking_med_teacher.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          

         

          <div class="col-12 mt-5">
              <!-- <hr><h3>Current Month Admission statistics</h3> -->
              <hr><h3>Admission statistics</h3>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-6 d-block m-auto">
              <div class="small-box p-3">
                  <?php
                    // Get the current month and year
                    $currentMonth = date('Y-m');

                    // Calculate the start date for the last 6 months
                    $startDate = date('Y-m', strtotime('-6 months'));

                    // Fetch data for each label: Dental, Form2, Physical, Consultation, and Asking Med
                    $dental = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE DATE_FORMAT(date_admitted, '%Y-%m') BETWEEN '$startDate' AND '$currentMonth'");
                    $row_dental = mysqli_num_rows($dental);

                    $form2 = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE DATE_FORMAT(date_admitted, '%Y-%m') BETWEEN '$startDate' AND '$currentMonth'");
                    $row_form2 = mysqli_num_rows($form2);

                    $physical = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE DATE_FORMAT(date_admitted, '%Y-%m') BETWEEN '$startDate' AND '$currentMonth'");
                    $row_physical = mysqli_num_rows($physical);

                    $consult = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE DATE_FORMAT(date_admitted, '%Y-%m') BETWEEN '$startDate' AND '$currentMonth'");
                    $row_consult = mysqli_num_rows($consult);

                    $med = mysqli_query($conn, "SELECT * FROM asking_med JOIN patient ON asking_med.patient_Id=patient.user_Id WHERE DATE_FORMAT(date_admitted, '%Y-%m') BETWEEN '$startDate' AND '$currentMonth'");
                    $row_med = mysqli_num_rows($med);

                    // Prepare data for the chart
                    $labels = ['Dental', 'Medical', 'Physical', 'Consultation', 'Asking Med'];
                    $data = [$row_dental, $row_form2, $row_physical, $row_consult, $row_med];

                    // Encode the chart data as a JSON string
                    $chart_data = json_encode([
                        'labels' => $labels,
                        'datasets' => [
                            [
                                'label' => 'Last 6 Months Admission Statistics',
                                'data' => $data,
                                'backgroundColor' => ['green', 'blue', 'yellow', 'red', 'purple'],
                            ],
                        ],
                    ]);
                  ?>
                  <div >
                      <canvas id="barChart"></canvas>
                  </div>
              </div>
          </div>
          



        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


  <div class="modal fade" id="announcement_today" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h5 class="modal-title" id="exampleModalLabel">Schedules today</h5>
          <a type="button" class="close" href="process_update.php?seen=appointment">
            <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
          </a>
        </div>
        <div class="modal-body">
          <?php if($result > 0) { ?>
            <h5 class="text-center">Appointment today</h5>
            <hr>
            <table id="example111" class="table table-bordered table-hover text-sm mb-3">
              <thead>
              <tr>  
                <th>ID</th>
                <th>PATIENT NAME</th>
                <th>APPT DATE</th>
                <th>APPT TIME</th>
                <th>APPT STATUS</th>
              </tr>
              </thead>
              <tbody id="users_data">
                  <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE appt_status=0 AND DATE(date_added)='$date_today' AND seen_by_admin=0");
                    while ($row = mysqli_fetch_array($sql)) {
                  ?>
                <tr>
                    <td><?= $row['appt_Id'] ?></td>
                    <td><?php echo ucwords($row['name']); ?></td>
                    <td>
                      <?php if($row['appt_date'] == ""): ?>
                        <span class="badge badge-warning pt-1">Waiting for approval</span>
                      <?php else : ?>
                        <span class="badge badge-success pt-1"><?php echo date("F d, Y", strtotime($row['appt_date'])); ?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($row['appt_time'] == ""): ?>
                        <span>Waiting for approval</span>
                      <?php else : ?>
                        <span><?php echo date("h:i A", strtotime($row['appt_time'])); ?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($row['appt_status'] == 0): ?>
                            <span class="badge badge-warning p-1">Pending</span>
                      <?php elseif($row['appt_status'] == 1): ?>
                            <span class="badge badge-success p-1">Approved</span>
                      <?php elseif($row['appt_status'] == 2): ?>
                            <span class="badge badge-danger p-1">Denied</span>
                      <?php else: ?>
                            <span class="badge badge-info p-1">Settled</span>
                      <?php endif; ?>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php } ?>


          <?php if($result2 > 0) { ?>
            <h5 class="text-center">Document requests today</h5>
            <hr>
            <table id="example1" class="table table-bordered table-hover text-sm">
              <thead>
              <tr> 
                <th>PATIENT NAME</th>
                <th>TYPE</th>
                <th>PICK UP DATE</th>
                <th>DATE REQUESTED</th>
                <th>STATUS</th>
              </tr>
              </thead>
              <tbody id="users_data">
                  <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM request_doc JOIN patient ON request_doc.patient_Id=patient.user_Id WHERE DATE(date_created)='$date_today' AND seen_by_admin=0 AND req_status=0");
                    while ($row = mysqli_fetch_array($sql)) {
                  ?>
                <tr>
                    <td><?php echo ucwords($row['name']); ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo date("F d, Y h:i A", strtotime($row['pick_up_date'])); ?></td>
                    <td class="text-primary"><?php echo date("F d, Y h:i A", strtotime($row['date_created'])); ?></td>
                    <td>
                      <?php if($row['req_status'] == 0): ?>
                        <span class="badge badge-warning pt-1">Pending</span>
                      <?php elseif($row['req_status'] == 1): ?>
                        <span class="badge badge-info pt-1">Processing</span>
                      <?php elseif($row['req_status'] == 2): ?>
                        <span class="badge badge-primary pt-1">Ready to pick-up</span>
                      <?php else: ?>
                        <span class="badge badge-success pt-1">Released</span>
                      <?php endif; ?>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php } ?>

          <?php if($result3 > 0) { ?>
            <h5 class="text-center">Low Stock Medicines</h5>
            <hr>
            <table id="example11" class="table table-bordered table-hover text-sm">
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
                        $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE DATE(expiration_date)>CURDATE() AND is_returned=0  AND med_stock_in<20 AND seen_by_admin=0");
                        while ($row = mysqli_fetch_array($sql)) {
                          $expirationDate = $row['expiration_date'];
                          $currentDate = date('Y-m-d');
                      ?>
                    <tr>
                        <td><?php if($row['brand_name'] == 'Others') { echo ucwords($row['other_brand_name']); } else { echo $row['brand_name']; }; ?></td>
                        <td><?php echo ucwords($row['med_name']); ?></td>
                        <td><?php echo ucwords($row['med_type']); ?></td>
                        <td><?php echo $row['milligrams']; ?></td>
                        <td><?php echo $row['med_stock_in']; ?></td>
                        <td><?php echo $row['med_stock_out']; ?></td>
                        <td class="text-primary"><?php if($row['expiration_date'] < date('Y-m-d')) { echo 'Expired'; } else { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
          <?php } ?>


          <?php if($result4 > 0) { ?>
            <h5 class="text-center">Missed Appointments</h5>
            <hr>
            <table id="missedAppt" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr>  
                    <th>APPOINTMENT DATE</th>
                    <th>APPOINTMENT TIME</th>
                    <th>REASON</th>
                    <th>APPT STATUS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM appointment WHERE DATE(appt_date)<CURDATE() AND (appt_status != 3 AND appt_status != 2 AND appt_status !=4) AND seen_by_admin=0 ");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td>
                          <?php if($row['appt_date'] == ""): ?>
                            <span class="badge badge-warning pt-1">Waiting for approval</span>
                          <?php else : ?>
                            <span class="badge badge-success pt-1"><?php echo date("F d, Y", strtotime($row['appt_date'])); ?></span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if($row['appt_time'] == ""): ?>
                            <span class="badge badge-warning pt-1">Waiting for approval</span>
                          <?php else : ?>
                            <span><?php echo date("h:i A", strtotime($row['appt_time'])); ?></span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $row['appt_reason']; ?></td>
                        <td>
                          <?php if($row['appt_status'] == 0): ?>
                                <span class="badge badge-warning p-1">Pending</span>
                          <?php elseif($row['appt_status'] == 1): ?>
                                <span class="badge badge-success p-1">Approved</span>
                          <?php elseif($row['appt_status'] == 2): ?>
                                <span class="badge badge-danger p-1">Denied</span>
                          <?php elseif($row['appt_status'] == 3): ?>
                                <span class="badge badge-info p-1">Settled</span>
                          <?php else: ?>
                                <span class="badge badge-dark p-1">Denied by patient</span>
                          <?php endif; ?>
                        </td>
                    </tr>

                    <?php } ?>

                  </tbody>
                </table>
          <?php } ?>
          
        </div>
        <div class="modal-footer alert-light">
          <a type="button" class="btn bg-secondary" href="process_update.php?seen=appointment"><i class="fa-solid fa-ban"></i> Close</a>
        </div>
      </div>
    </div>
  </div>


<?php include 'footer.php'; ?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      <?php if ($result > 0 || $result2 > 0 || $result3 > 0 || $result4 > 0) { ?>
          $(document).ready(function() {
              $('#announcement_today').modal({
                  backdrop: 'static',
                  keyboard: false
              });
          });
      <?php } else {?>
          $(document).ready(function() {
              $('#announcement_today').modal('hide');
          });
      <?php } ?>
  });

  var chartData = <?php echo $chart_data; ?>;
  var ctx = document.getElementById('barChart').getContext('2d');
  var examChart = new Chart(ctx, {
      type: 'line',
      data: chartData,
      options: {
          elements: {
              line: {
                  tension: 0,
              }
          }
      }
  });
</script>