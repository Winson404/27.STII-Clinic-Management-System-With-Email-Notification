<title>STII Clinic Management System | Patient record</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $physical_Id = $_GET['page'];
      $fetch = mysqli_query($conn, "SELECT * FROM physical JOIN patient ON physical.patient_Id=patient.user_Id WHERE physical.physical_Id='$physical_Id'");
      $row = mysqli_fetch_array($fetch);
      $user_Id = $row['user_Id'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- UPDATE -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Patient record</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Patient record</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control"  placeholder="Address" name="form2_Id" value="<?php echo $form2_Id; ?>">
              <div class="card">
                <div class="card-body">
                    <div class="row">

                         <?php 
                          $a   = $row['p_general'];
                          $a   = trim($a);
                          $aa  = explode(",", $a);
                          $aa  = array_map('trim', $aa);
                        ?>

                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="text-bold text-primary"><b>Physical Examination</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>General Survey</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Awake" class="form-check-input position-static" type="checkbox" value="Awake" name="p_general[]" <?php if(in_array('Awake', $aa)) { echo 'checked'; } ?> disabled> 
                              <label for="Awake" class="m-0">Awake</label>
                           </div>
                           <div class="form-check">
                              <input id="Coherent" class="form-check-input position-static" type="checkbox" value="Coherent" name="p_general[]" <?php if(in_array('Coherent', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Coherent" class="m-0">Coherent</label>
                           </div>
                           <div class="form-check">
                              <input id="Responsive" class="form-check-input position-static" type="checkbox" value="Responsive" name="p_general[]" <?php if(in_array('Responsive', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Responsive" class="m-0">Responsive</label>
                           </div>
                           <div class="form-check">
                              <input id="Well Groomed" class="form-check-input position-static" type="checkbox" value="Well Groomed" name="p_general[]" <?php if(in_array('Well Groomed', $aa)) { echo 'checked'; } ?> disabled>
                              <label for="Well Groomed" class="m-0">Well Groomed</label>
                           </div>
                          </div>
                        </div>

                        <?php 
                          $b   = $row['p_skin'];
                          $b   = trim($b);
                          $bb  = explode(",", $b);
                          $bb  = array_map('trim', $bb);
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>Skin</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Warrm to Touch" class="form-check-input position-static" type="checkbox" value="Warrm to Touch" name="p_skin[]" <?php if(in_array('Warrm to Touch', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Warrm to Touch" class="m-0">Warrm to Touch</label>
                           </div>
                           <div class="form-check">
                              <input id="Dry Skin" class="form-check-input position-static" type="checkbox" value="Dry Skin" name="p_skin[]"  <?php if(in_array('Dry Skin', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Dry Skin" class="m-0">Dry Skin</label>
                           </div>
                           <div class="form-check">
                              <input id="Dry Skin Turgor" class="form-check-input position-static" type="checkbox" value="Dry Skin Turgor" name="p_skin[]"  <?php if(in_array('Dry Skin Turgor', $bb)) { echo 'checked'; } ?> disabled>
                              <label for="Dry Skin Turgor" class="m-0">Dry Skin Turgor</label>
                           </div>
                           <div class="form-check">
                              <input id="Other" class="form-check-input position-static" type="checkbox" value="Other" name="p_skin[]" onclick="toggleSkin()" <?php if(in_array('Other', $bb)) { echo 'checked'; } ?> disabled> 
                              <label for="Other" class="m-0">Other</label>
                           </div>
                           <div id="myInputSkin" style="display:none">
                              <span class="text-dark"><b>Specify here</b></span>
                              <input type="text" id="inputOther" class="form-control form-control-sm" name="skinOther" placeholder="Specify here..." value="<?php echo $row['skinOther']; ?>" readonly/>
                           </div>
                          </div>
                        </div>

                        <script>
                          function toggleSkin() {
                            var checkBox = document.getElementById("Other");
                            var inputField = document.getElementById("myInputSkin");
                            var inputOther = document.getElementById("inputOther");
                            if (checkBox.checked == true) {
                              inputField.style.display = "block";
                              inputOther.value = "";
                            } else {
                              inputField.style.display = "none";
                              inputOther.value = "NA";
                            }
                          }
                        </script>

                        <!-- <div class="col-lg-6 col-md-4 col-sm-6 col-12"></div> -->

                        <?php 
                          $c   = $row['p_heent'];
                          $c   = trim($c);
                          $cc  = explode(",", $c);
                          $cc  = array_map('trim', $cc);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>HEENT</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Anicteric Sclerae" class="form-check-input position-static" type="checkbox" value="Anicteric Sclerae" name="p_heent[]"  <?php if(in_array('Anicteric Sclerae', $cc)) { echo 'checked'; } ?> disabled> 
                              <label for="Anicteric Sclerae" class="m-0">Anicteric Sclerae</label>
                           </div>
                           <div class="form-check">
                              <input id="Pale Palpebral Conjunctive" class="form-check-input position-static" type="checkbox" value="Pale Palpebral Conjunctive" name="p_heent[]"  <?php if(in_array('Pale Palpebral Conjunctive', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Pale Palpebral Conjunctive" class="m-0">Pale Palpebral Conjunctive</label>
                           </div>
                           <div class="form-check"> 
                              <input id="Icyeric Sclerae" class="form-check-input position-static" type="checkbox" value="Icyeric Sclerae" name="p_heent[]"  <?php if(in_array('Icyeric Sclerae', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Icyeric Sclerae" class="m-0">Icyeric Sclerae</label>
                           </div>
                           <div class="form-check">
                              <input id="Pupils Equally Reactive to light & accomodation" class="form-check-input position-static" type="checkbox" value="Pupils Equally Reactive to light & accomodation" name="p_heent[]" <?php if(in_array('Pupils Equally Reactive to light & accomodation', $cc)) { echo 'checked'; } ?> disabled>
                              <label for="Pupils Equally Reactive to light & accomodation" class="m-0">Pupils Equally Reactive to light & accomodation</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $d   = $row['p_auditory'];
                          $d   = trim($d);
                          $dd  = explode(",", $d);
                          $dd  = array_map('trim', $dd);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>AUDITORY ACUITY</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Intact" class="form-check-input position-static" type="checkbox" value="Intact" name="p_auditory[]" <?php if(in_array('Intact', $dd)) { echo 'checked'; } ?> disabled> 
                              <label for="Intact" class="m-0">Intact</label>
                           </div>
                           <div class="form-check">
                              <input id="Non-Intact" class="form-check-input position-static" type="checkbox" value="Non-Intact" name="p_auditory[]" <?php if(in_array('Non-Intact', $dd)) { echo 'checked'; } ?> disabled>
                              <label for="Non-Intact" class="m-0">Non-Intact</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $e   = $row['p_nose'];
                          $e   = trim($e);
                          $ee  = explode(",", $e);
                          $ee  = array_map('trim', $ee);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>NOSE</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Nasal Deformity" class="form-check-input position-static" type="checkbox" value="Nasal Deformity" name="p_nose[]" <?php if(in_array('Nasal Deformity', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Nasal Deformity" class="m-0">Nasal Deformity</label>
                           </div>
                           <div class="form-check">
                              <input id="Tender Sinuses" class="form-check-input position-static" type="checkbox" value="Tender Sinuses" name="p_nose[]" <?php if(in_array('Tender Sinuses', $ee)) { echo 'checked'; } ?> disabled>
                              <label for="Tender Sinuses" class="m-0">Tender Sinuses</label>
                           </div> 
                           <div class="form-check">
                              <input id="Normal Nasal Septum" class="form-check-input position-static" type="checkbox" value="Normal Nasal Septum" name="p_nose[]" <?php if(in_array('Normal Nasal Septum', $ee)) { echo 'checked'; } ?> disabled> 
                              <label for="Normal Nasal Septum" class="m-0">Normal Nasal Septum</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $f   = $row['p_mouth_throat'];
                          $f   = trim($f);
                          $ff  = explode(",", $f);
                          $ff  = array_map('trim', $ff);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>MOUTH & THROAT</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Oral Mass" class="form-check-input position-static" type="checkbox" value="Oral Mass" name="p_mouth_throat[]" <?php if(in_array('Oral Mass', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Oral Mass" class="m-0">Oral Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Inflamed Tonsils" class="form-check-input position-static" type="checkbox" value="Inflamed Tonsils" name="p_mouth_throat[]" <?php if(in_array('Inflamed Tonsils', $ff)) { echo 'checked'; } ?> disabled>
                              <label for="Inflamed Tonsils" class="m-0">Inflamed Tonsils</label>
                           </div>
                           <div class="form-check">
                              <input id="Bleeding Gums2" class="form-check-input position-static" type="checkbox" value="Bleeding Gums" name="p_mouth_throat[]" <?php if(in_array('Bleeding Gums', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="Bleeding Gums2" class="m-0">Bleeding Gums</label>
                           </div>
                           <div class="form-check">
                              <input id="None20" class="form-check-input position-static" type="checkbox" value="None" name="p_mouth_throat[]" <?php if(in_array('None', $ff)) { echo 'checked'; } ?> disabled> 
                              <label for="None20" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $g   = $row['p_neck'];
                          $g   = trim($g);
                          $gg  = explode(",", $g);
                          $gg  = array_map('trim', $gg);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>NECK</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Lymphadenpathy" class="form-check-input position-static" type="checkbox" value="Lymphadenpathy" name="p_neck[]" <?php if(in_array('Lymphadenpathy', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Lymphadenpathy" class="m-0">Lymphadenpathy</label>
                           </div>
                           <div class="form-check">
                              <input id="Neck Mass" class="form-check-input position-static" type="checkbox" value="Neck Mass" name="p_neck[]" <?php if(in_array('Neck Mass', $gg)) { echo 'checked'; } ?> disabled>
                              <label for="Neck Mass" class="m-0">Neck Mass</label>
                           </div>
                           <div class="form-check"> 
                              <input id="Tracheal Deviation" class="form-check-input position-static" type="checkbox" value="Tracheal Deviation" name="p_neck[]" <?php if(in_array('Tracheal Deviation', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="Tracheal Deviation" class="m-0">Tracheal Deviation</label>
                           </div>
                           <div class="form-check">
                              <input id="None21" class="form-check-input position-static" type="checkbox" value="None" name="p_neck[]" <?php if(in_array('None', $gg)) { echo 'checked'; } ?> disabled> 
                              <label for="None21" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $h   = $row['p_breast'];
                          $h   = trim($h);
                          $hh  = explode(",", $h);
                          $hh  = array_map('trim', $hh);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>BREAST</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Mass" class="form-check-input position-static" type="checkbox" value="Mass" name="p_breast[]" <?php if(in_array('Mass', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Mass" class="m-0">Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharge" class="form-check-input position-static" type="checkbox" value="Discharge" name="p_breast[]" <?php if(in_array('Discharge', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="Discharge" class="m-0">Discharge</label>
                           </div>
                           <div class="form-check">
                              <input id="None22" class="form-check-input position-static" type="checkbox" value="None" name="p_breast[]" <?php if(in_array('None', $hh)) { echo 'checked'; } ?> disabled> 
                              <label for="None22" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $i   = $row['p_cardiovascular'];
                          $i   = trim($i);
                          $ii  = explode(",", $i);
                          $ii  = array_map('trim', $ii);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>CARDIOVASCULAR</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Jugular Vein Distension" class="form-check-input position-static" type="checkbox" value="Jugular Vein Distension" name="p_cardiovascular[]" <?php if(in_array('Jugular Vein Distension', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Jugular Vein Distension" class="m-0">Jugular Vein Distension</label>
                           </div>
                           <div class="form-check">
                              <input id="Carotid Bruit" class="form-check-input position-static" type="checkbox" value="Carotid Bruit" name="p_cardiovascular[]" <?php if(in_array('Carotid Bruit', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Carotid Bruit" class="m-0">Carotid Bruit</label>
                           </div>
                           <div class="form-check">
                              <input id="Murmur" class="form-check-input position-static" type="checkbox" value="Murmur" name="p_cardiovascular[]" <?php if(in_array('Murmur', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Murmur" class="m-0">Murmur</label>
                           </div>
                           <div class="form-check">
                              <input id="Apex beat at 5th ICS" class="form-check-input position-static" type="checkbox" value="Apex beat at 5th ICS" name="p_cardiovascular[]" <?php if(in_array('Apex beat at 5th ICS', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Apex beat at 5th ICS" class="m-0">Apex beat at 5th ICS</label>
                           </div>
                           <div class="form-check">
                              <input id="Normal Rate & Rythm" class="form-check-input position-static" type="checkbox" value="Normal Rate & Rythm" name="p_cardiovascular[]" <?php if(in_array('Normal Rate & Rythm', $ii)) { echo 'checked'; } ?> disabled> 
                              <label for="Normal Rate & Rythm" class="m-0">Normal Rate & Rythm</label>
                           </div>
                          </div>
                        </div>


                        <?php 
                          $j   = $row['p_abdomen'];
                          $j   = trim($j);
                          $jj  = explode(",", $j);
                          $jj  = array_map('trim', $jj);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>ABDOMEN</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Flat" class="form-check-input position-static" type="checkbox" value="Flat" name="p_abdomen[]" <?php if(in_array('Flat', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Flat" class="m-0">Flat</label>
                           </div>
                           <div class="form-check">
                              <input id="Normoactive" class="form-check-input position-static" type="checkbox" value="Normoactive" name="p_abdomen[]" <?php if(in_array('Normoactive', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Normoactive" class="m-0">Normoactive</label>
                           </div>
                           <div class="form-check">
                              <input id="Tenderness" class="form-check-input position-static" type="checkbox" value="Tenderness" name="p_abdomen[]" <?php if(in_array('Tenderness', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Tenderness" class="m-0">Tenderness</label>
                           </div>
                           <div class="form-check">
                              <input id="Flabby" class="form-check-input position-static" type="checkbox" value="Flabby" name="p_abdomen[]" <?php if(in_array('Flabby', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Flabby" class="m-0">Flabby</label>
                           </div>
                           <div class="form-check">
                              <input id="Bowel Sound" class="form-check-input position-static" type="checkbox" value="Bowel Sound" name="p_abdomen[]" <?php if(in_array('Bowel Sound', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="Bowel Sound" class="m-0">Bowel Sound</label>
                           </div>
                           <div class="form-check">
                              <input id="None23" class="form-check-input position-static" type="checkbox" value="None" name="p_abdomen[]" <?php if(in_array('None', $jj)) { echo 'checked'; } ?> disabled> 
                              <label for="None23" class="m-0">None</label>
                           </div>
                          </div>
                        </div>



                        <?php 
                          $k   = $row['p_genitals'];
                          $k   = trim($k);
                          $kk  = explode(",", $k);
                          $kk  = array_map('trim', $kk);
                        ?>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                          <span class="text-dark"><a class=" text-primary"><b>GENITALS</b></a></span>
                          <div class="form-group">
                           <div class="form-check">
                              <input id="Mass2" class="form-check-input position-static" type="checkbox" value="Mass" name="p_genitals[]" <?php if(in_array('Mass', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="Mass2" class="m-0">Mass</label>
                           </div>
                           <div class="form-check">
                              <input id="Discharges" class="form-check-input position-static" type="checkbox" value="Discharges" name="p_genitals[]" <?php if(in_array('Discharges', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="Discharges" class="m-0">Discharges</label>
                           </div>
                           <div class="form-check">
                              <input id="None24" class="form-check-input position-static" type="checkbox" value="None" name="p_genitals[]" <?php if(in_array('None', $kk)) { echo 'checked'; } ?> disabled> 
                              <label for="None24" class="m-0">None</label>
                           </div>
                          </div>
                        </div>


                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>CLINICAL IMPRESSION</b></a></span>
                            <div class="form-group">
                                <textarea name="clinical_impression" id="" cols="30" rows="3" class="form-control" placeholder="Enter clinical impression..." disabled><?php echo $row['clinical_impression']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="text-dark"><a class=" text-primary"><b>POTENTIAL RISK</b></a></span>
                            <div class="form-group">
                                <textarea name="potential_risk" id="" cols="30" rows="2" class="form-control" placeholder="Enter potential_risk..." disabled><?php echo $row['potential_risk']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                          <h5 class="text-center mt-5">List of Given Medicines</h5>
                          <hr>
                         <table id="example1" class="table table-bordered table-hover table-sm text-sm">
                            <thead>
                                <tr>
                                    <th>Medicine Name</th>
                                    <!-- <th class="text-center">Available Stock</th> -->
                                    <th class="text-center"># of medicine given</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch data from asking_med_transaction_log and medicine tables
                                $fetch2 = mysqli_query($conn, "SELECT *, SUM(stock_used_value) AS sum_stock_used_value FROM physical_transaction_log WHERE physical_Id='$physical_Id' GROUP BY med_Id");
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

                                // Display the medicine data in the table
                                foreach ($medicineData as $medicine) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $medicine['med_name']; ?>
                                        </td>
                                       <!--  <td class="text-center">
                                            <?php //echo $medicine['stock_in'] . ' ' . $medicine['units_label']; ?>
                                        </td> -->
                                        <td class="text-center">
                                            <?php echo $medicine['stock_used_value'] . ' ' . $medicine['units_label']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        

                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="physical.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END UPDATE -->






  </div>

<?php } else { include '404.php'; } ?>









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
<?php include 'footer.php';  ?>

<script>

   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }


   function signaturess(event)
  {
    var signatureimage=URL.createObjectURL(event.target.files[0]);
    var signatureimagediv= document.getElementById('qrpreview');
    var signaturenewimg=document.createElement('img');
    signatureimagediv.innerHTML='';
    signaturenewimg.src=signatureimage;
    signaturenewimg.width="90";
    signaturenewimg.height="90";
    signaturenewimg.style['border-radius']="50%";
    signaturenewimg.style['display']="block";
    signaturenewimg.style['margin-left']="auto";
    signaturenewimg.style['margin-right']="auto";
    signaturenewimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    signatureimagediv.appendChild(signaturenewimg);
  }

  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }


    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
    }

    function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 1);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
      document.getElementById("agestatus").value = age;
      }
      }else{
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      return false;
      }
    }



    function validate_password_confirm_password() {
      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }

    function validate_password() {
       var pass = document.getElementById('password').value;
       var confirm_pass = document.getElementById('cpassword').value;
       var regex = /[a-zA-Z0-9]/g;
       var pass2 = pass.match(regex).length;

      if(pass2 < 8) {
        document.getElementById('length').style.color = 'red';
        document.getElementById('length').innerHTML = 'Password must be at least 8 characters.';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);

      } else {
        document.getElementById('length').style.color = 'green';
        document.getElementById('length').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }
</script>


<script>
function fetchPatientInfo() {
  var patientId = $("#patient_Id").val();
  if (patientId !== "") {
    // Send the AJAX request
    $.ajax({
      url: "ajax.php",
      type: "GET",
      data: { patientId: patientId },
      dataType: "json",
      success: function(response) {
        // Update the input fields with the retrieved data
        $("#grade").val(response.courseYear);
        $("#contact").val(response.contactNumber);
        $("#age").val(response.age);
        $("#sex").val(response.sex);
        $("#address").val(response.address);
        $("#parentName").val(response.parentName);
        $("#parentContact").val(response.parentContact);
      },
      error: function(xhr, status, error) {
        console.log("AJAX Error: " + error);
      }
    });
  }
}
</script>
