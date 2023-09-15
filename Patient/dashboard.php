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
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $dental = mysqli_query($conn, "SELECT dental_Id from dental WHERE patient_Id='$id'");
                  $row_dental = mysqli_num_rows($dental);
                ?>
                <h3><?php echo $row_dental; ?></h3>

                <p>Dental Admission </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-tooth"></i>
              </div>
              <a href="dental.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $form2 = mysqli_query($conn, "SELECT form2_Id from form2 WHERE patient_Id='$id'");
                  $row_form2 = mysqli_num_rows($form2);
                ?>
                <h3><?php echo $row_form2; ?></h3>

                <p>Medical Admission </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house-chimney-medical"></i>
              </div>
              <a href="form2.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $physical = mysqli_query($conn, "SELECT physical_Id from physical WHERE patient_Id='$id'");
                  $row_physical = mysqli_num_rows($physical);
                ?>
                <h3><?php echo $row_physical; ?></h3>

                <p>Physical Exam </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="physical.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $consult = mysqli_query($conn, "SELECT consult_Id from consultation WHERE patient_Id='$id'");
                  $row_consult = mysqli_num_rows($consult);
                ?>
                <h3><?php echo $row_consult; ?></h3>

                <p>Consultation </p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
              <a href="consultation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $appt = mysqli_query($conn, "SELECT appt_Id from appointment WHERE appt_patient_Id='$id'");
                  $row_appt = mysqli_num_rows($appt);
                ?>
                <h3><?php echo $row_appt; ?></h3>

                <p>Appointment</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-calendar-days"></i>
              </div>
              <a href="appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $cert = mysqli_query($conn, "SELECT req_Id from request_doc WHERE patient_Id ='$id' AND type='Medical Certificate' ");
                  $row_cert = mysqli_num_rows($cert);
                ?>
                <h3><?php echo $row_cert; ?></h3>

                <p>Medical Certification request</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-certificate"></i>
              </div>
              <a href="medical_certificate.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $medical = mysqli_query($conn, "SELECT req_Id from request_doc WHERE patient_Id ='$id' AND type='Medical Records' ");
                  $row_medical = mysqli_num_rows($medical);
                ?>
                <h3><?php echo $row_medical; ?></h3>

                <p>Medical Records request</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house-chimney-medical"></i>
              </div>
              <a href="medical_records.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $notif = mysqli_query($conn, "SELECT notif_Id from notification WHERE sender='$id'");
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
            <div class="small-box bg-primary">
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
                <h3 class="text-info">Hidden text</h3>

                <p>All records</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bell"></i>
              </div>
              <a href="all_student_view.php?student_Id=<?= $id; ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          

        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
