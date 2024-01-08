<title>STII Clinic Management System | Manage appointment </title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



<?php if($page === 'create') { ?>

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>New system user</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">System user info</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                  <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="patient_Id">
                  <!-- <h6 class="text-center">Request for an appointment?</h6> -->
                  <div class="form-group">
                      <label for="appt_date">Pick desired appointment date</label>
                      <input type="date" class="form-control" id="appt_date" name="appt_date" required>
                  </div>
                  <div class="form-group">
                    <?php 
                      $get_date = mysqli_query($conn, "SELECT * FROM appointment");
                    ?>
                    <label for="">Pick desired appointment time</label>
                    <!-- <select class="form-control" name="appt_time" id="" required>
                      <option value="" selected disabled>Select time</option>
                      <option value="07:00-08:00 AM">07:00-08:00 AM</option>
                      <option value="08:00-09:00 AM">08:00-09:00 AM</option>
                      <option value="09:00-10:00 AM">09:00-10:00 AM</option>
                      <option value="10:00-11:00 AM">10:00-11:00 AM</option>
                      <option value="01:00-02:00 PM">01:00-02:00 PM</option>
                      <option value="02:00-03:00 PM">02:00-03:00 PM</option>
                      <option value="03:00-04:00 PM">03:00-04:00 PM</option>
                      <option value="04:00-05:00 PM">04:00-05:00 PM</option>
                    </select> -->
                    <select class="form-control" name="appt_time" id="appt_time" required>
                        <option value="" selected disabled>Select time available</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Reason</label>
                    <textarea class="form-control" name="appt_reason" placeholder="Enter reason for appointment" id="" cols="30" rows="3" required></textarea>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="appointment.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="request_appointment"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->









<?php } else { 
  $appt_Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM appointment WHERE appt_Id='$appt_Id'");
  $row = mysqli_fetch_array($fetch);
?>


  <!-- UPDATE -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update Appointment</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Appointment info</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                  <input type="hidden" class="form-control" value="<?php echo $row['appt_Id']; ?>" name="appt_Id">
                  <!-- <h6 class="text-center">Request for an appointment?</h6> -->
                  <div class="form-group">
                      <label for="appt_date">Pick desired appointment date</label>
                      <input type="date" class="form-control" id="appt_date" name="appt_date"  value="<?php echo $row['appt_date']; ?>" required>
                  </div>
                  <div class="form-group">
                    <?php 
                      $get_date = mysqli_query($conn, "SELECT * FROM appointment");
                    ?>
                    <label for="">Pick desired appointment time</label>
                    <!-- <select class="form-control" name="appt_time" id="" required>
                      <option value="" selected disabled>Select time</option>
                      <option value="07:00-08:00 AM">07:00-08:00 AM</option>
                      <option value="08:00-09:00 AM">08:00-09:00 AM</option>
                      <option value="09:00-10:00 AM">09:00-10:00 AM</option>
                      <option value="10:00-11:00 AM">10:00-11:00 AM</option>
                      <option value="01:00-02:00 PM">01:00-02:00 PM</option>
                      <option value="02:00-03:00 PM">02:00-03:00 PM</option>
                      <option value="03:00-04:00 PM">03:00-04:00 PM</option>
                      <option value="04:00-05:00 PM">04:00-05:00 PM</option>
                    </select> -->
                    <select class="form-control" name="appt_time" id="appt_time" required>
                        <option value="" selected disabled>Select time available</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Reason</label>
                    <textarea class="form-control" name="appt_reason" placeholder="Enter reason for appointment" id="" cols="30" rows="3" required><?php echo $row['appt_reason']; ?></textarea>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="appointment.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="update_appointment"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END UPDATE -->


<?php } ?>







  </div>

<?php } else { include '404.php'; } ?>









    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php include 'footer.php';  ?>
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
                    if (availableTimes.length === 0) {
                        dropdown.append('<option value="" selected disabled>No time available</option>');
                    } else {
                        dropdown.append('<option value="" selected disabled>Select time</option>');
                        for (var j = 0; j < availableTimes.length; j++) {
                            dropdown.append('<option value="' + availableTimes[j] + '">' + availableTimes[j] + '</option>');
                        }
                    }
                }
            });
        });
    });
</script>
<script>
    document.getElementById('appt_date').addEventListener('input', function () {
        var selectedDate = new Date(this.value);

        // Check if the selected date is a Sunday (0 index in JavaScript)
        if (selectedDate.getDay() === 0) {
            alert('Sundays are not allowed. Please choose another date.');
            this.value = ''; // Clear the input value
        }
    });

    // Calculate the starting date for allowed selections (tomorrow)
    const currentDate = new Date();
    const startingDate = new Date(currentDate);
    startingDate.setDate(currentDate.getDate() + 1);

    // Exclude Sundays within the 7-day range
    const allowedDates = [];
    for (let i = 0; allowedDates.length < 7; i++) {
        const currentDate = new Date(startingDate);
        currentDate.setDate(currentDate.getDate() + i);

        // Exclude Sundays
        if (currentDate.getDay() !== 0) {
            allowedDates.push(currentDate.toISOString().split('T')[0]);
        }
    }

    // Set the minimum date for the input element and allow only the allowed dates
    document.getElementById('appt_date').setAttribute('min', allowedDates[0]);
    document.getElementById('appt_date').setAttribute('max', allowedDates[allowedDates.length - 1]);
</script>