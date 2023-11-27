<!-- APPROVE -->
<div class="modal fade" id="add_appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-check"></i> Request appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="patient_Id">
          <!-- <h6 class="text-center">Request for an appointment?</h6> -->
          <div class="form-group">
              <label for="appt_date">Pick desired appointment date</label>
              <input type="date" class="form-control" id="appt_date" name="appt_date" required>
          </div>

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
                <option value="" selected disabled>Select time</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Reason</label>
            <textarea class="form-control" name="appt_reason" placeholder="Enter reason for appointment" id="" cols="30" rows="3" required></textarea>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="request_appointment"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!--  <script>
    document.getElementById('appt_date').addEventListener('input', function () {
        var selectedDate = new Date(this.value);

        // Check if the selected date is a Sunday (0 index in JavaScript)
        if (selectedDate.getDay() === 0) {
            alert('Sundays are not allowed. Please choose another date.');
            this.value = ''; // Clear the input value
        }
    });

    // Get the current date
    const currentDate = new Date();
    
    // Calculate the next 7 days excluding Sundays
    let allowedDates = [];
    for (let i = 1; i <= 7; i++) {
        let nextDay = new Date(currentDate);
        nextDay.setDate(currentDate.getDate() + i);

        // Check if the next day is not a Sunday
        if (nextDay.getDay() !== 0) {
            allowedDates.push(nextDay.toISOString().split('T')[0]);
        }
    }

    // Set the minimum date for the input element
    document.getElementById('appt_date').setAttribute('min', allowedDates[0]);
    // Set the maximum date for the input element
    document.getElementById('appt_date').setAttribute('max', allowedDates[allowedDates.length - 1]);
</script> -->