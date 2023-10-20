<!-- APPROVE -->
<div class="modal fade" id="add_medical" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-certificate"></i> Request medical certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="patient_Id">
          <div class="form-group">
            <label for="">Reason</label>
            <textarea class="form-control" name="purpose" placeholder="Enter for purpose" id="" cols="30" rows="3" required></textarea>
          </div>
          <div class="form-group">
              <label for="appt_date">Pick desired appointment date</label>
              <input type="date" class="form-control" id="appt_date" name="appt_date" required>
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
        <button type="submit" class="btn bg-primary" name="request_medical_certificate"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>

