<?php
    include '../config.php';
    if(isset($_SESSION['admin_Id'])) {
    $id = $_SESSION['admin_Id'];

    // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON FOOTER.PHP
    $_SESSION['last_active'] = time();

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STII Clinic Management System</title>
  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="../images/stii.png">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
  <script src="../plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="css/tempudsdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="css/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="css/jqvmap/jqvmap.min.css"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="css/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="css/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="css/summernote/summernote-bs4.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .modal-content{
      -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
      -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
      -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
      box-shadow: 0 5px 15px rgba(0,0,0,0);
    }
    .nav-link {
      padding-top: 5px;
      padding-bottom: 5px;
    }

    .nav-treeview > .nav-item > .nav-link {
      padding-left: 20px;
    }

    .nav-treeview > .nav-item > .nav-link p {
      margin-bottom: 0;
    }

    .form-control:not([type="email"]):not([type="password"]) {
      text-transform: capitalize;
    }
  </style>

</head>
<!-- LIGHT MODE -->
<!-- <body class="hold-transition sidebar-mini layout-fixed"> -->
<!-- DARK MODE -->
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">  -->
<body class="hold-transition sidebar-mini  layout-fixed layout-navbar-fixed"> 
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../images/stii.png" alt="BMSLogo" height="105" width="105">
  </div> 

  <!-- Navbar -->
  <!-- LIGHT MODE -->
  <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    <!--   <li class="nav-item d-none d-sm-inline-block">
        <a href="contact-us.php" class="nav-link">Contact</a>
      </li> -->
    </ul>

<?php 
    $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
    $row = mysqli_fetch_array($users);
?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- <li class="mt-1">
        <a class="mt-3">Today is <?php //echo date("l"); ?> | <?php// echo date("F d, Y"); ?></a>
      </li> -->
       <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa-solid fa-user"></i><?php //echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?><i class="fa-solid fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="profile.php" class="dropdown-item">
            <div class="media">
              <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" class="mr-3 img-circle" height="50" width="50">
              <div class="media-body">
                  <h3 class="dropdown-item-title"><?php //echo ' '.$row['firstname'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></h3>
                  <p class="text-sm text-muted"><?php //echo $row['user_type']; ?></p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
            <a type="button" href="profile.php" class="dropdown-item">&nbsp;<i class="fa-solid fa-gear"></i>&nbsp;&nbsp; Profile settings</a>
          <div class="dropdown-divider"></div>
           <a href="#" class="d-flex justify-content-start dropdown-item dropdown-footer" onclick="logout()">&nbsp;<i class="fa-solid fa-power-off"></i>&nbsp;&nbsp; Logout</a>
        </div>
      </li> -->

      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <?php  
          // Count the total records
        $countSql = mysqli_query($conn, "SELECT COUNT(*) AS total FROM notification WHERE (subject = 'Appointment request' || subject = 'Medical certificate request' || subject = 'Medical records request' || subject = 'Student records request to update' || subject = 'Dental records' || subject = 'Medicine records' || subject = 'Teacher records request to update' || subject = 'Teacher Consultation records' || subject = 'Student Consultation records' || subject = 'Teacher Physical Exam records' || subject = 'Student Physical Exam records')");
        $countRow = mysqli_fetch_assoc($countSql);
        $totalNotifications = $countRow['total'];

        $getNotif = mysqli_query($conn, "SELECT * FROM notification WHERE (subject = 'Appointment request' || subject = 'Medical certificate request' || subject = 'Medical records request' || subject = 'Student records request to update' || subject = 'Dental records' || subject = 'Medicine records' || subject = 'Teacher records request to update' || subject = 'Teacher Consultation records' || subject = 'Student Consultation records' || subject = 'Teacher Physical Exam records' || subject = 'Student Physical Exam records' || subject = 'Appointment denied by patient') ORDER BY notif_Id DESC LIMIT 5");
            // $sql = mysqli_query($conn, "SELECT *, patient.user_Id AS patient_userId FROM notification LEFT JOIN patient ON notification.receiver=patient.user_Id LEFT JOIN users ON notification.receiver=users.user_Id");
        ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa-solid fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><?= $totalNotifications ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php 
            while ($row_notif = mysqli_fetch_array($getNotif)) {
          ?>
          <div class="dropdown-divider"></div>
          <a type="button" href="#" class="dropdown-item"><?= $row_notif['type'] . '<br><span class="text-xs">' . substr($row_notif['message'], 0, 45); echo strlen($row_notif['message']) > 45 ? '...' : ''; ?></span>
          </a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a type="button" href="notification.php" class="dropdown-item">See <?php if($totalNotifications == 1) { echo 'notification'; } else { echo 'all notifications'; } ?></a>
        </div>
      </li>


     


       <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <!-- <img src="../images-users/<?php echo $row['image']; ?>" alt="User Image" class="mr-3 img-circle" height="50" width="50"> -->
          <img src="../images-users/<?php echo $row['image']; ?>" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../images-users/<?php echo $row['image']; ?>" class="img-circle elevation-2" alt="User Image">
            <p>
              <?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?>
              <small><?php echo $row['user_type']; ?></small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-12 text-center">
                <small>Member since <?php echo date("F d, Y", strtotime($row['date_registered'])); ?></small>
              </div>
              <!-- <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div> -->
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-right" onclick="logout()">Sign out</a>
          </li>
        </ul>
      </li>

      <!-- FULL SCREEN -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- END FULL SCREEN -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../images/stii.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">STII Clinic MS</span>
      <br>
      <span class="ml-5 font-weight-light mt-2 text-xs">&nbsp;&nbsp;Lower Taway, Zamboanga Sibugay</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-4 pb-2 pt-3 mb-3 d-flex">
        <div class="image">
          <?php //if($row['image'] == ""): ?>
          <img src="../dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
          <?php //else: ?>
          <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" style="height: 34px; width: 34px; border-radius: 50%;">
          <?php //endif; ?>
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php //echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></a>
        </div>
      </div> -->
      

      <!-- SidebarSearch Form -->
      <!--   <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-4 mb-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          
          <li class="nav-item">
            <a href="#" class="nav-link 
            <?php echo (
                basename($_SERVER['PHP_SELF']) == 'list_patients.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_appointments.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_asking_med.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_consultation.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_documents.php' ||
                basename($_SERVER['PHP_SELF']) == 'dashboard.php' || 
                basename($_SERVER['PHP_SELF']) == 'todays_patient.php' || 
                basename($_SERVER['PHP_SELF']) == 'request_update.php' || 
                basename($_SERVER['PHP_SELF']) == 'notification.php' ||
                basename($_SERVER['PHP_SELF']) == 'dashboard_asking_med.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_dental.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_medical.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_physical.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_consultaion.php'
              ) ? 'active' : ''; 
            ?> 
            ">
            <i class="fa-solid fa-file"></i><p>&nbsp;&nbsp;Dashboard<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'list_patients.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_appointments.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_asking_med.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_consultation.php' || 
                basename($_SERVER['PHP_SELF']) == 'list_documents.php' ||
                basename($_SERVER['PHP_SELF']) == 'dashboard.php' || 
                basename($_SERVER['PHP_SELF']) == 'todays_patient.php' || 
                basename($_SERVER['PHP_SELF']) == 'request_update.php' || 
                basename($_SERVER['PHP_SELF']) == 'notification.php' ||
                basename($_SERVER['PHP_SELF']) == 'dashboard_asking_med.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_dental.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_medical.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_physical.php' || 
                basename($_SERVER['PHP_SELF']) == 'dashboard_consultaion.php'
                ) ? 'style="display: block;"' : ''; 
              ?> 
            >
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>"><i class="fa-solid fa-gauge"></i><p>&nbsp;&nbsp; Main Dashboard</p></a>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link <?php// echo (basename($_SERVER['PHP_SELF']) == 'reports.php') ? 'active' : ''; ?>">
                  <i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; Reports</p>
                </a>
              </li> -->



              <li class="nav-item">
                  <a href="#" class="nav-link
                    <?php echo (
                      basename($_SERVER['PHP_SELF']) == 'list_patients.php' || 
                      basename($_SERVER['PHP_SELF']) == 'list_appointments.php' || 
                      basename($_SERVER['PHP_SELF']) == 'list_asking_med.php' || 
                      basename($_SERVER['PHP_SELF']) == 'list_consultation.php' || 
                      basename($_SERVER['PHP_SELF']) == 'list_documents.php'
                      ) ? 'active' : ''; 
                    ?> 
                  ">
                      <i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; Reports<i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview"
                  <?php echo (
                    basename($_SERVER['PHP_SELF']) == 'list_patients.php' || 
                    basename($_SERVER['PHP_SELF']) == 'list_appointments.php' || 
                    basename($_SERVER['PHP_SELF']) == 'list_asking_med.php' || 
                    basename($_SERVER['PHP_SELF']) == 'list_consultation.php' || 
                    basename($_SERVER['PHP_SELF']) == 'list_documents.php'
                    ) ? 'style="display: block;"' : ''; 
                  ?> 
                  >
                      <li class="nav-item">
                          <a href="list_patients.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'list_patients.php') ? 'active' : ''; ?>"><i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; List of Patient</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="list_appointments.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'list_appointments.php') ? 'active' : ''; ?>"><i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; List of Appointment</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="list_asking_med.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'list_asking_med.php') ? 'active' : ''; ?>"><i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; List of Asking Medicine</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="list_consultation.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'list_consultation.php') ? 'active' : ''; ?>"><i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; List of Consultation</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="list_documents.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'list_documents.php') ? 'active' : ''; ?>"><i class="fas fa-chart-bar"></i><p>&nbsp;&nbsp; List of Requests Document</p></a>
                      </li>
                  </ul>
              </li>



              <li class="nav-item">
                  <a href="#" class="nav-link
                    <?php echo (
                      basename($_SERVER['PHP_SELF']) == 'dashboard_asking_med.php' || 
                      basename($_SERVER['PHP_SELF']) == 'dashboard_dental.php' || 
                      basename($_SERVER['PHP_SELF']) == 'dashboard_medical.php' || 
                      basename($_SERVER['PHP_SELF']) == 'dashboard_physical.php' || 
                      basename($_SERVER['PHP_SELF']) == 'dashboard_consultaion.php'
                      ) ? 'active' : ''; 
                    ?> 
                  ">
                      <i class="fa-solid fa-calendar-days"></i><p>&nbsp;&nbsp; Todays Patient<i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview"
                  <?php echo (
                    basename($_SERVER['PHP_SELF']) == 'dashboard_asking_med.php' || 
                    basename($_SERVER['PHP_SELF']) == 'dashboard_dental.php' || 
                    basename($_SERVER['PHP_SELF']) == 'dashboard_medical.php' || 
                    basename($_SERVER['PHP_SELF']) == 'dashboard_physical.php' || 
                    basename($_SERVER['PHP_SELF']) == 'dashboard_consultaion.php'
                    ) ? 'style="display: block;"' : ''; 
                  ?> 
                  >
                      <li class="nav-item">
                          <a href="dashboard_asking_med.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard_asking_med.php') ? 'active' : ''; ?>"><i class="fa-solid fa-hospital"></i><p>&nbsp;&nbsp; Asking medicine</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="dashboard_dental.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard_dental.php') ? 'active' : ''; ?>"><i class="fa-solid fa-tooth"></i><p>&nbsp;&nbsp; Dental Admisiion</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="dashboard_medical.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard_medical.php') ? 'active' : ''; ?>"><i class="fa-solid fa-hospital"></i><p>&nbsp;&nbsp; Medical Admission</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="dashboard_physical.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard_physical.php') ? 'active' : ''; ?>"><i class="fa-solid fa-stethoscope"></i><p>&nbsp;&nbsp; Physical Exam</p></a>
                      </li>
                      <li class="nav-item">
                          <a href="dashboard_consultaion.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard_consultaion.php') ? 'active' : ''; ?>"><i class="fa-solid fa-comments"></i><p>&nbsp;&nbsp; Consultation</p></a>
                      </li>
                  </ul>
              </li>

              <!-- <li class="nav-item">
                <a href="todays_patient.php" class="nav-link <?php //echo (basename($_SERVER['PHP_SELF']) == 'todays_patient.php') ? 'active' : ''; ?>"><i class="fa-solid fa-calendar-days"></i><p>&nbsp;&nbsp; Todays Patient</p></a>
              </li> -->
              <li class="nav-item">
                <a href="request_update.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'request_update.php') ? 'active' : ''; ?>"><i class="fa-solid fa-hourglass-start"></i><p>&nbsp;&nbsp; Approval Requests</p></a>
              </li>
              <li class="nav-item">
               <a href="notification.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'notification.php') ? 'active' : ''; ?>"><i class="fa-solid fa-bell"></i><p>&nbsp;&nbsp; Notification</p></a>
              </li>
            </ul>
          </li>





          

          <li class="nav-header text-secondary" style="margin-bottom: -14px;">REGISTERED PATIENTS</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'student.php' || 
                basename($_SERVER['PHP_SELF']) == 'student_add.php' || 
                basename($_SERVER['PHP_SELF']) == 'student_update.php' || 
                basename($_SERVER['PHP_SELF']) == 'student_view.php' || 
                basename($_SERVER['PHP_SELF']) == 'teacher.php' ||
                basename($_SERVER['PHP_SELF']) == 'teacher_add.php' || 
                basename($_SERVER['PHP_SELF']) == 'teacher_update.php' || 
                basename($_SERVER['PHP_SELF']) == 'teacher_view.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_student_view.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_teacher_view.php'
                ) ? 'active' : ''; 
              ?> 
            "><i class="fa-solid fa-notes-medical"></i><p>&nbsp;&nbsp;Patient<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'student.php' || 
                basename($_SERVER['PHP_SELF']) == 'student_add.php' || 
                basename($_SERVER['PHP_SELF']) == 'student_update.php' || 
                basename($_SERVER['PHP_SELF']) == 'student_view.php' || 
                basename($_SERVER['PHP_SELF']) == 'teacher.php' ||
                basename($_SERVER['PHP_SELF']) == 'teacher_add.php' || 
                basename($_SERVER['PHP_SELF']) == 'teacher_update.php' || 
                basename($_SERVER['PHP_SELF']) == 'teacher_view.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_student_view.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_teacher_view.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
                <a href="student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'student.php' || basename($_SERVER['PHP_SELF']) == 'student_add.php' || basename($_SERVER['PHP_SELF']) == 'student_update.php' || basename($_SERVER['PHP_SELF']) == 'student_view.php' || basename($_SERVER['PHP_SELF']) == 'all_student_view.php') ? 'active' : ''; ?>"><i class="fa-solid fa-user-graduate"></i><p>&nbsp; Student</p></a>
              </li>
              <li class="nav-item">
                <a href="teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'teacher.php' || basename($_SERVER['PHP_SELF']) == 'teacher_add.php' || basename($_SERVER['PHP_SELF']) == 'teacher_update.php' || basename($_SERVER['PHP_SELF']) == 'teacher_view.php' || basename($_SERVER['PHP_SELF']) == 'all_teacher_view.php') ? 'active' : ''; ?>"><i class="fa-solid fa-user-graduate"></i><p>&nbsp;&nbsp;School Staff</p></a>
              </li>
            </ul>
          </li>


         


          <!-- <li class="nav-item">
           <a href="appointment.php" class="nav-link <?php// echo (basename($_SERVER['PHP_SELF']) == 'appointment.php') ? 'active' : ''; ?>"><i class="fa-solid fa-calendar-check"></i><p>&nbsp;&nbsp; Apppointment</p></a>
          </li> -->

          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'appointment.php' || 
                basename($_SERVER['PHP_SELF']) == 'appointment_approved.php' ||
                basename($_SERVER['PHP_SELF']) == 'appointment_denied.php'
                ) ? 'active' : ''; 
              ?>
            "><i class="fa-solid fa-calendar-check"></i><p>&nbsp;&nbsp;Apppointment<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'appointment.php' || 
                basename($_SERVER['PHP_SELF']) == 'appointment_approved.php' ||
                basename($_SERVER['PHP_SELF']) == 'appointment_denied.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
                  <a href="appointment.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment.php') ? 'active' : ''; ?>">
                      <i class="fa-solid fa-certificate"></i><p>&nbsp;&nbsp; All appointments</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="appointment_approved.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment_approved.php') ? 'active' : ''; ?>">
                      <i class="fa-solid fa-check"></i><p>&nbsp;&nbsp;Approved appt</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="appointment_denied.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment_denied.php') ? 'active' : ''; ?>">
                      <i class="fa-solid fa-times"></i><p>&nbsp;&nbsp; Denied appt</p>
                  </a>
              </li>

            </ul>
          </li>



          <li class="nav-header text-secondary" style="margin-bottom: -14px;">MEDICINE MANAGEMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'medicine.php' || 
                basename($_SERVER['PHP_SELF']) == 'medicine_mgmt.php' || 
                basename($_SERVER['PHP_SELF']) == 'medicine_returned.php' || 
                basename($_SERVER['PHP_SELF']) == 'medicine_expired.php'
                ) ? 'active' : ''; 
              ?>
            "><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp;Medicine<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'medicine.php' || 
                basename($_SERVER['PHP_SELF']) == 'medicine_mgmt.php' || 
                basename($_SERVER['PHP_SELF']) == 'medicine_returned.php' || 
                basename($_SERVER['PHP_SELF']) == 'medicine_expired.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
                <a href="medicine.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'medicine.php' || basename($_SERVER['PHP_SELF']) == 'medicine_mgmt.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp; Medicine Inventory</p></a>
              </li>
              <li class="nav-item">
               <a href="medicine_returned.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'medicine_returned.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp; Medicine Returned</p></a>
              </li>
              <li class="nav-item">
               <a href="medicine_expired.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'medicine_expired.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp; Medicine Expired</p></a>
              </li>
            </ul>
          </li>

          

          <li class="nav-header text-secondary" style="margin-bottom: -14px;">PATIENT ADMISSION</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
            <?php echo (
              basename($_SERVER['PHP_SELF']) == 'asking_med_mgmt.php' || 
              basename($_SERVER['PHP_SELF']) == 'dental_mgmt.php' || 
              basename($_SERVER['PHP_SELF']) == 'form2_mgmt.php' || 
              basename($_SERVER['PHP_SELF']) == 'physical_mgmt.php' || 
              basename($_SERVER['PHP_SELF']) == 'consultation_mgmt.php'
              ) ? 'active' : ''; 
            ?> 
            "><i class="fa-solid fa-address-book"></i><p>&nbsp;&nbsp;Add records<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview"  
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'asking_med_mgmt.php' || 
                basename($_SERVER['PHP_SELF']) == 'dental_mgmt.php' || 
                basename($_SERVER['PHP_SELF']) == 'form2_mgmt.php' || 
                basename($_SERVER['PHP_SELF']) == 'physical_mgmt.php' || 
                basename($_SERVER['PHP_SELF']) == 'consultation_mgmt.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            > 
              <li class="nav-item">
                <a href="asking_med_mgmt.php?page=create" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'asking_med_mgmt.php') ? 'active' : ''; ?>"><i class="fa-solid fa-hospital"></i><p>&nbsp; Asking Medicine</p></a>
              </li>
              <li class="nav-item">
                <a href="dental_mgmt.php?page=create" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dental_mgmt.php') ? 'active' : ''; ?>"><i class="fa-solid fa-tooth"></i><p>&nbsp;&nbsp; Dental Admission</p></a>
              </li>
              <li class="nav-item">
                <a href="form2_mgmt.php?page=create" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'form2_mgmt.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp;Medical Admission</p></a>
              </li>
              <li class="nav-item">
                <a href="physical_mgmt.php?page=create" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'physical_mgmt.php') ? 'active' : ''; ?>"><i class="fa-solid fa-heart-pulse"></i><p>&nbsp;&nbsp;Physical Exam</p></a>
              </li>
              <li class="nav-item">
                <a href="consultation_mgmt.php?page=create" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'consultation_mgmt.php') ? 'active' : ''; ?>"><i class="fa-solid fa-heart-pulse"></i><p>&nbsp;&nbsp;Consultation</p></a>
              </li>
            </ul>
          </li>



          <li class="nav-header text-secondary" style="margin-bottom: -14px;">PATIENT RECORDS</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'asking_med_student.php' ||
                basename($_SERVER['PHP_SELF']) == 'dental_student.php' ||  
                basename($_SERVER['PHP_SELF']) == 'form2_student.php' || 
                basename($_SERVER['PHP_SELF']) == 'physical_student.php' || 
                basename($_SERVER['PHP_SELF']) == 'consultation_student.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_student.php'
                ) ? 'active' : ''; 
              ?> 
            "><i class="fa-solid fa-user-graduate"></i><p>&nbsp;&nbsp;Student <i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview"  
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'asking_med_student.php' ||
                basename($_SERVER['PHP_SELF']) == 'dental_student.php' ||  
                basename($_SERVER['PHP_SELF']) == 'form2_student.php' || 
                basename($_SERVER['PHP_SELF']) == 'physical_student.php' || 
                basename($_SERVER['PHP_SELF']) == 'consultation_student.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_student.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
               <a href="asking_med_student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'asking_med_student.php') ? 'active' : ''; ?>"><i class="fa-solid fa-hospital"></i><p>&nbsp;&nbsp; Asking medicine</p></a>
              </li>
              <li class="nav-item">
               <a href="dental_student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dental_student.php') ? 'active' : ''; ?>"><i class="fa-solid fa-tooth"></i><p>&nbsp;&nbsp; Dental History</p></a>
              </li>
              <li class="nav-item">
               <a href="form2_student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'form2_student.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp; Medical History</p></a>
              </li>
              <li class="nav-item">
               <a href="physical_student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'physical_student.php') ? 'active' : ''; ?>"><i class="fa-solid fa-heart-pulse"></i><p>&nbsp;&nbsp; Physical Exam</p></a>
              </li>
              <li class="nav-item">
                <a href="consultation_student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'consultation_student.php') ? 'active' : ''; ?>"><i class="fa-solid fa-heart-pulse"></i><p>&nbsp;&nbsp; Consultation History </p></a>
              </li>
              <li class="nav-item">
                <a href="all_student.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'all_student.php') ? 'active' : ''; ?>"><i class="fa-solid fa-calendar-check"></i><p>&nbsp;&nbsp; All records</p></a>
             </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'asking_med_teacher.php' ||
                basename($_SERVER['PHP_SELF']) == 'dental_teacher.php' ||  
                basename($_SERVER['PHP_SELF']) == 'form2_teacher.php' || 
                basename($_SERVER['PHP_SELF']) == 'physical_teacher.php' || 
                basename($_SERVER['PHP_SELF']) == 'consultation_teacher.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_teacher.php'
                ) ? 'active' : ''; 
              ?>
             "><i class="fa-solid fa-chalkboard-user"></i><p>&nbsp;&nbsp;School Staff <i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview"  
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'asking_med_teacher.php' ||
                basename($_SERVER['PHP_SELF']) == 'dental_teacher.php' ||  
                basename($_SERVER['PHP_SELF']) == 'form2_teacher.php' || 
                basename($_SERVER['PHP_SELF']) == 'physical_teacher.php' || 
                basename($_SERVER['PHP_SELF']) == 'consultation_teacher.php' ||
                basename($_SERVER['PHP_SELF']) == 'all_teacher.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
               <a href="asking_med_teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'asking_med_teacher.php') ? 'active' : ''; ?>"><i class="fa-solid fa-hospital"></i><p>&nbsp;&nbsp; Asking medicine</p></a>
              </li>
              <li class="nav-item">
               <a href="dental_teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dental_teacher.php') ? 'active' : ''; ?>"><i class="fa-solid fa-tooth"></i><p>&nbsp;&nbsp; Dental History</p></a>
              </li>
              <li class="nav-item">
               <a href="form2_teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'form2_teacher.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp; Medical History</p></a>
              </li>
              <li class="nav-item">
               <a href="physical_teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'physical_teacher.php') ? 'active' : ''; ?>"><i class="fa-solid fa-heart-pulse"></i><p>&nbsp;&nbsp; Physical Exam</p></a>
              </li>
              <li class="nav-item">
               <a href="consultation_teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'consultation_teacher.php') ? 'active' : ''; ?>"><i class="fa-solid fa-heart-pulse"></i><p>&nbsp;&nbsp; Consultation History</p></a>
              </li>
              <li class="nav-item">
                <a href="all_teacher.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'all_teacher.php') ? 'active' : ''; ?>"><i class="fa-solid fa-calendar-check"></i><p>&nbsp;&nbsp; All records</p></a>
              </li>
            </ul>
          </li>



          <li class="nav-header text-secondary" style="margin-bottom: -14px;">REQUESTS</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'medical_new_request.php' || 
                basename($_SERVER['PHP_SELF']) == 'medical_certificate.php' ||
                basename($_SERVER['PHP_SELF']) == 'medical_records.php'
                ) ? 'active' : ''; 
              ?>
            "><i class="fa-solid fa-file"></i><p>&nbsp;&nbsp;Document Requests<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php echo (
                basename($_SERVER['PHP_SELF']) == 'medical_new_request.php' || 
                basename($_SERVER['PHP_SELF']) == 'medical_certificate.php' ||
                basename($_SERVER['PHP_SELF']) == 'medical_records.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
               <a data-toggle="modal" data-target="#newRequest" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'medical_new_request.php') ? 'active' : ''; ?>"><i class="fa-sharp fa-solid fa-square-plus"></i><p>&nbsp;&nbsp; New request</p></a>
              </li>
              <li class="nav-item">
               <a href="medical_certificate.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'medical_certificate.php') ? 'active' : ''; ?>"><i class="fa-solid fa-certificate"></i><p>&nbsp;&nbsp; Medical Certification</p></a>
              </li>
              <li class="nav-item">
               <a href="medical_records.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'medical_records.php') ? 'active' : ''; ?>"><i class="fa-solid fa-house-chimney-medical"></i><p>&nbsp;&nbsp; Medical Record</p></a>
              </li>
            </ul>
          </li>

          
          <!-- 
          <li class="nav-item">
           <a href="student.php" class="nav-link"><i class="fa-solid fa-user-graduate"></i><p>&nbsp;&nbsp; Student records</p></a>
          </li>
          <li class="nav-item">
           <a href="teacher.php" class="nav-link"><i class="fa-solid fa-user-graduate"></i><p>&nbsp;&nbsp; Faculty records</p></a>
          </li> -->

          <li class="nav-item">
            <a href="announcement.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'announcement.php') ? 'active' : ''; ?>"><i class="fa-solid fa-bell"></i><p>&nbsp;&nbsp; Announcement</p></a>
          </li>
          <li class="nav-item">
           <a href="admin.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' || basename($_SERVER['PHP_SELF']) == 'admin_view.php') ? 'active' : ''; ?>"><i class="fa-solid fa-users-gear"></i><p>&nbsp;&nbsp;System Users</p></a>
          </li>
          <li class="nav-item">
           <a href="profile.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : ''; ?>"><i class="fa-solid fa-user-gear"></i><p>&nbsp;&nbsp;Profile</p></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="logout()"><i class="fa-solid fa-power-off"></i><p>&nbsp;&nbsp;Logout</p></a>
          </li>

          <!-- <li class="nav-header text-secondary" style="margin-bottom: -14px;">DATABASE MGMT</li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fa-solid fa-window-restore"></i><p>&nbsp;&nbsp;Back-up and Restore<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="backup.php" class="nav-link"><i class="fa-solid fa-puzzle-piece"></i><p>&nbsp; Back-up database</p></a>
              </li>
              <li class="nav-item">
                <a href="restore.php" class="nav-link"><i class="fa-solid fa-puzzle-piece"></i><p>&nbsp;&nbsp;Restore database</p></a>
              </li>
            </ul>
          </li> -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



 

  <!-- APPROVE -->
<div class="modal fade" id="newRequest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-certificate"></i> Request medical document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <div class="form-group">
            <label for="">Patient name</label>
            <select name="patient_Id" id="" class="form-control" required>
              <option value="" selected disabled>Select patient</option>
              <?php 
                $get = mysqli_query($conn, "SELECT * FROM patient");
                if(mysqli_num_rows($get) > 0) {
                  while($row_get = mysqli_fetch_array($get)) { ?>
                    <option value="<?= $row_get['user_Id'] ?>"><?= ucwords($row_get['name']) ?></option>
              <?php }
                } else { ?> 
                  <option value="">No patient record found</option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Type of document</label>
            <select name="type" id="" class="form-control" required>
              <option value="" selected disabled>Select type</option>
              <option value="Medical Certificate">Medical Certificate</option>
              <option value="Medical Records">Medical Records</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Reason</label>
            <textarea class="form-control" name="purpose" placeholder="Enter for purpose" id="" cols="30" rows="3" required></textarea>
          </div>
          <div class="form-group">
              <label for="appt_date">Pick desired appointment date</label>
              <input type="date" class="form-control" id="appt_date" name="pick_up_date" required>
          </div>

          <script>
              // Get the current date
              const currentDate = new Date();
              
              // Calculate the next day
              currentDate.setDate(currentDate.getDate() + 1);
              
              // Format the next day in the YYYY-MM-DD format
              const nextDay = currentDate.toISOString().split('T')[0];
              
              // Set the minimum date for the input element
              document.getElementById('appt_date').setAttribute('min', nextDay);
          </script>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="personal_request"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>




  <script>

    function logout() {
        swal({
          title: 'Are you sure you want to logout?',
          text: "You won't be able to revert this!",
          icon: "warning",
          buttons: true,
          // dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
          //   swal("Poof! Your imaginary file has been deleted!", {
          //   icon: "success",
          // }); 
            window.location = "../logout.php";
            
          } else {
            // swal("Poof! Your imaginary file has been deleted!", {
            //       icon: "info",
            //     }); 
          }
        });
    }
</script>

<script src="../sweetalert2.min.js"></script>
<?php include '../sweetalert_messages.php'; ?>

<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../login.php');
    }
?>
