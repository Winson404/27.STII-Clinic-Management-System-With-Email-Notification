<!-- UPDATE MEDICAL RECORDS REQUEST -->
<div class="modal fade" id="update_medical_records<?php echo $row['req_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-house-chimney-medical"></i> Update request medical records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['req_Id']; ?>" name="req_Id">
          <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="patient_Id">
          <div class="form-group">
            <label for="">Reason</label>
            <textarea class="form-control" name="purpose" placeholder="Enter request purpose" id="" cols="30" rows="3" required><?php echo $row['purpose']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Pick-up date</label>
            <input type="date" class="form-control" name="pick_up_date" required value="<?php echo $row['pick_up_date']; ?>">
          </div>
         
          
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="update_request_medical_records"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>



<!-- UPDATE STATUS -->
<div class="modal fade" id="updateStatus<?php echo $row['req_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-house-chimney-medical"></i> Update request medical records status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['req_Id']; ?>" name="req_Id">
          <input type="hidden" class="form-control" value="Medical record" name="type">

          <div class="form-group">
            <span class="text-dark"><b>Medical records request status</b></span>
            <select class="form-control" name="req_status" required>
              <option selected disabled value="">Select status</option>
              <option value="0" <?php if($row['req_status'] == 0) { echo 'selected'; } ?>>Pending</option>
              <option value="1" <?php if($row['req_status'] == 1) { echo 'selected'; } ?>>Processing</option>
              <option value="2" <?php if($row['req_status'] == 2) { echo 'selected'; } ?>>Ready to pick-up</option>
              <option value="3" <?php if($row['req_status'] == 3) { echo 'selected'; } ?>>Released</option>
            </select>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="update_request_medical_certificate_status"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>




<!-- DELETE MEDICAL RECORDS REQUEST-->
<div class="modal fade" id="delete_medical_records<?php echo $row['req_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-house-chimney-medical"></i> Delete medical records request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['req_Id']; ?>" name="req_Id">
          <h6 class="text-center">Delete record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_medical_records"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>

