<title>STII Clinic Management System | Appointment records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Appointment History</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Appointment History</li>
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
                <!-- <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#add_appointment"><i class="fa-sharp fa-solid fa-square-plus"></i> New appointment</button> -->
                <a type="button" class="btn btn-sm bg-primary" href="appointment_mgmt.php?page=create"><i class="fa-sharp fa-solid fa-square-plus"></i> New appointment</a>
                
                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                 <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr>  
                    <th>APPOINTMENT DATE</th>
                    <th>APPOINTMENT TIME</th>
                    <th>REASON</th>
                    <th>APPT STATUS</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE appointment.appt_patient_Id='$id' ");
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
                        <td><?= $row['appt_time'] ?></td>
                        <td><?php echo $row['appt_reason']; ?></td>
                        <td>
                          <?php if($row['appt_status'] == 0): ?>
                                <?php if ($row['appt_date'] < date('Y-m-d')): ?>
                                    <span class="badge badge-warning p-1">Pending / Missed</span>
                                <?php else: ?>
                                    <span class="badge badge-warning p-1">Pending</span>
                                <?php endif; ?>
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
                        <td>
                          <?php if($row['appt_status'] == 0): ?>

                                <!-- <button type="button" class="btn bg-success btn-sm" data-toggle="modal" data-target="#approve<?php echo $row['appt_Id']; ?>"><i class="fa-solid fa-circle-check"></i> Edit</button> -->
                                <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['appt_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                                <?php if ($row['appt_date'] < date('Y-m-d') && $row['is_rescheduled'] == 1): ?>
                                      <a type="button" class="btn bg-primary btn-sm" href="appointment_mgmt.php?page=<?php echo $row['appt_Id']; ?>"><i class="fas fa-calendar-check"></i> Accept reschedule</a>
                                      <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#deny<?php echo $row['appt_Id']; ?>"><i class="fas fa-calendar-check"></i> Deny reschedule</button>
                                <?php else: ?>
                                      <a type="button" class="btn bg-primary btn-sm" href="appointment_mgmt.php?page=<?php echo $row['appt_Id']; ?>" style="pointer-events: none;opacity: .5;"><i class="fas fa-calendar-check"></i> Accept reschedule</a>
                                      <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#deny<?php echo $row['appt_Id']; ?>" disabled><i class="fas fa-calendar-check"></i> Deny reschedule</button>
                                <?php endif; ?>

                          <?php elseif($row['appt_status'] == 3): ?>

                                <!-- <button type="button" class="btn bg-success btn-sm" data-toggle="modal" data-target="#approve<?php echo $row['appt_Id']; ?>"><i class="fa-solid fa-circle-check"></i> Edit</button> -->
                                <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['appt_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>

                          <?php else: ?>

                                <!-- <button type="button" class="btn bg-success btn-sm" data-toggle="modal" data-target="#approve<?php echo $row['appt_Id']; ?>"><i class="fa-solid fa-circle-check"></i> Edit</button> -->
                                <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['appt_Id']; ?>" disabled><i class="fas fa-trash"></i> Delete</button>
                                <?php if ($row['appt_status'] == 1 && $row['appt_date'] < date('Y-m-d') && $row['is_rescheduled'] == 1): ?>
                                      <a type="button" class="btn bg-primary btn-sm" href="appointment_mgmt.php?page=<?php echo $row['appt_Id']; ?>"><i class="fas fa-calendar-check"></i> Accept reschedule</a>
                                      <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#deny<?php echo $row['appt_Id']; ?>"><i class="fas fa-calendar-check"></i> Deny reschedule</button>
                                <?php else: ?>
                                      <a type="button" class="btn bg-primary btn-sm" href="appointment_mgmt.php?page=<?php echo $row['appt_Id']; ?>" style="pointer-events: none;opacity: .5;"><i class="fas fa-calendar-check"></i> Accept reschedule</a>
                                      <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#deny<?php echo $row['appt_Id']; ?>" disabled><i class="fas fa-calendar-check"></i> Deny reschedule</button>
                                <?php endif; ?>

                          <?php endif; ?>

                          
                          
                        </td> 
                    </tr>

                    <?php include "appointment_update_delete.php"; } ?>

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'appointment_add.php'; include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->

<script>
    $(document).ready(function() {
        $('#appt_date').on('change', function() {
            var selectedDate = $(this).val();

            // AJAX call to fetch existing appointments for the selected date
            $.ajax({
                url: 'process_save.php', // PHP script to fetch appointments
                type: 'POST',
                data: { selectedDate: selectedDate },
                success: function(response) {
                    var existingAppointments = JSON.parse(response);
                    var availableTimes = [
                        "07:00-08:00 AM", "08:00-09:00 AM", "09:00-10:00 AM",
                        "10:00-11:00 AM", "01:00-02:00 PM", "02:00-03:00 PM",
                        "03:00-04:00 PM", "04:00-05:00 PM"
                    ];

                    // Filter available times based on existing appointments
                    for (var i = 0; i < existingAppointments.length; i++) {
                        var apptTime = existingAppointments[i].appt_time;
                        var index = availableTimes.indexOf(apptTime);
                        if (index !== -1) {
                            availableTimes.splice(index, 1);
                        }
                    }

                    // Populate the dropdown with available times
                    var dropdown = $('#appt_time');
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled>Select time</option>');
                    for (var j = 0; j < availableTimes.length; j++) {
                        dropdown.append('<option value="' + availableTimes[j] + '">' + availableTimes[j] + '</option>');
                    }
                }
            });
        });
    });
</script>