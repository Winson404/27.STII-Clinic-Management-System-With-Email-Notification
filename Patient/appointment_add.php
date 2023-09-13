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
            <label for="">Pick desired appointment date</label>
            <input type="date" class="form-control" name="appt_date" required>
          </div>
          <div class="form-group">
            <label for="">Pick desired appointment time</label>
            <input type="time" class="form-control" name="appt_time" required>
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

