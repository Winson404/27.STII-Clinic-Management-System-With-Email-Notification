<title>STII Clinic Management System | Physical Exam records</title>
<?php 
  include 'navbar.php'; 
  if(isset($_GET['patient_Id'])) {
    $student_Id = $_GET['patient_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM consultation JOIN patient ON consultation.patient_Id=patient.user_Id WHERE consultation.patient_Id='$student_Id' ORDER BY consultation.consult_Id DESC LIMIT 1");
    if(mysqli_num_rows($fetch) > 0) {
    $row = mysqli_fetch_array($fetch);


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Physical Exam records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Physical Exam records</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <div class="card card-light p-0">
              <div class="card-header">
                <button class="btn btn-secondary float-sm-right" id="printButton"><i class="fa-solid fa-print"></i> Print</button>
              </div>
              <div class="card-body">
                <div class="container"id="printElement">
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
                    <div class="col-sm-12">
                      <!-- <center>
                        <small>Multi-Purpose Barangay Hall Pildera II, Pasay City 1300, MM, Phil's, Telefax: 8853-6275; email:brgy193@gmail.com</small>
                      </center> -->
                      <div class="dropdown-divider"></div>
                    </div>

                    <div class="col-12">
                      <p class="text-center text-bold">OFFICE OF THE SCHOOL CLINIC <br> STII CONSULTATION RECORD</p>
                      <p class="float-right" style="margin-top: -30px;"><?php echo date("d/m/Y"); ?></p>
                    </div>

                    
                    <div class="col-12 mt-3">
                      <p><b>Mother's maiden name:</b> <?php echo $row['mothers_maiden_name']; ?></p>
                    </div>
                    <div class="col-12">
                      <p><b>Chief complaints:</b> <?php echo $row['chief_complaints']; ?></p>
                    </div>
                    <div class="col-12">
                      <p><b>Temperature:</b> <?php echo $row['temperature']; ?></p>
                    </div>
                    <div class="col-6">
                      <p><b>VS/BP:</b> <?php echo $row['vs_bp']; ?></p>
                    </div>
                    <div class="col-6">
                      <p><b>PR:</b> <?php echo $row['pr']; ?></p>
                    </div>
                    <div class="col-6">
                      <p><b>RR:</b> <?= $row['rr']; ?></p>
                    </div> 
                    <div class="col-6">
                      <p><b>O2ZAT:</b> <?= $row['o2zat']; ?></p>
                    </div> 
                    <div class="col-12">
                      <p><b>Doctor's Advice:</b> <?= $row['doctors_advice']; ?></p>
                    </div> 
                    <div class="col-12">
                      <p><b>Medicine given:</b> <?= $row['medicine_given']; ?></p>
                    </div> 
                    


                    <div class="col-12 mt-3">
                      <p>Issued upon the request of the above named for school purposes only it may serve her/him best.</p>
                      <?php
                        function getDaySuffix($day) {
                            if ($day >= 11 && $day <= 13) {
                                return 'th';
                            }
                            $lastDigit = $day % 10;
                            switch ($lastDigit) {
                                case 1: return 'st';
                                case 2: return 'nd';
                                case 3: return 'rd';
                                default: return 'th';
                            }
                        }

                        $day = date("d");
                        $month = date("F");
                        $year = date("Y");

                        $daySuffix = getDaySuffix($day);

                        $formattedDate = "Issued this $day$daySuffix day of $month, $year";
                        ?>
                        <p style="text-indent: 30px;"><?php echo $formattedDate; ?>.</p>
                    </div>

                    <div class="col-12"><hr></div>

                    <div class="col-12">
                      <div class="row">
                      <div class="col-4">
                      </div>
                      <div class="col-4">
                      </div>
                      <div class="col-4">
                          <div class="text-center">
                            <br>
                            <p><?= ucwords($row['medical_personnel']); ?></p>
                            <p style="border-top: 1px solid grey;"><strong>Medical Personnel</strong></p>
                            <p class="text-sm" style="margin-top: -15px;">(Signature Over Printed Name)</p>
                          </div>
                          <p class="text-sm float-right">License Number: ____________</p><br>
                      </div>
                    </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="card-footer">
                  
              </div>
            </div>
         </div>
        </div>
      </div>
    </section>

    <?php } else { include '404.php'; } } ?>
  
  </div>

<script src="print.js"> </script>
<?php include 'footer.php'; ?>
 

<script>
   $(window).on('load', function() {
    document.getElementById("printButton").click();
   })
 </script>