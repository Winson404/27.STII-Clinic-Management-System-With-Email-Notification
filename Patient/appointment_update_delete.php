<!-- APPROVE -->
<div class="modal fade" id="approve<?php echo $row['appt_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-check"></i> Approve appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['appt_Id']; ?>" name="appt_Id">
          <div class="form-group">
            <label for="">Consultant/Patient</label>
            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="">Pick desired appointment date</label>
            <input type="date" class="form-control" name="appt_date" required value="<?php echo $row['appt_date']; ?>">
          </div>
          <div class="form-group">
            <label for="">Pick desired appointment time</label>
            <input type="time" class="form-control" name="appt_time" required value="<?php echo $row['appt_time']; ?>">
          </div>
          <div class="form-group">
            <label for="">Reason</label>
            <textarea class="form-control" name="appt_reason" placeholder="Enter reason for appointment" id="" cols="30" rows="3" required><?php echo $row['appt_reason']; ?></textarea>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="approve_appointment"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>




<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['appt_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-check"></i> Delete appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['appt_Id']; ?>" name="appt_Id">
          <h6 class="text-center">Delete appointment record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_appointment"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>



<!-- DENY -->
<div class="modal fade" id="deny<?php echo $row['appt_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-check"></i> Deny appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['appt_Id']; ?>" name="appt_Id">
          <h6 class="text-center">Deny appointment record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="deny_appointment"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>