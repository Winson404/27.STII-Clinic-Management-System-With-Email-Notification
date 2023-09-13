<title>STII Clinic Management System | Dashboard</title>
<?php include 'navbar.php'; ?>
  
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
                  $dental = mysqli_query($conn, "SELECT dental_Id FROM dental WHERE DATE(date_admitted) = '$date_today'");
                  $dentalCountRow = mysqli_num_rows($dental);

                  $form2 = mysqli_query($conn, "SELECT form2_Id FROM form2 WHERE DATE(date_admitted) = '$date_today'");
                  $form2CountRow = mysqli_num_rows($form2);

                  $total = $dentalCountRow + $form2CountRow;
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

                <p>Update Requests</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-hourglass-start"></i>
              </div>
              <a href="request_update.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Admin'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Staff'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Registered Staff</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-secret"></i>
              </div>
              <a href="admin.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
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
            <div class="small-box bg-success">
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
            <div class="small-box bg-danger">
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
            <div class="small-box bg-warning">
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
            <div class="small-box bg-info">
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
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $notif = mysqli_query($conn, "SELECT notif_Id from notification ");
                  $row_notif = mysqli_num_rows($notif);
                ?>
                <h3><?php echo $row_notif; ?></h3>

                <p>Notifications</p>
              </div>
              <div class="icon">
               <i class="fa-solid fa-bell"></i>
              </div>
              <a href="notification.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
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
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $medicine = mysqli_query($conn, "SELECT med_Id from medicine");
                  $row_medicine = mysqli_num_rows($medicine);
                ?>
                <h3><?php echo $row_medicine; ?></h3>

                <p>Medecine</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bell"></i>
              </div>
              <a href="medicine.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          


          <div class="col-12"><hr><h3>Student Medical History</h3></div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE position='Student'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Consultation History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="consultation_student.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>







          <div class="col-12"><hr><h3>School Staff Medical History</h3></div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT * FROM dental JOIN patient ON dental.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT * FROM form2 JOIN patient ON form2.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

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
                  $users = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE position='Teacher'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Consultation History</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="consultation_teacher.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>





        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
