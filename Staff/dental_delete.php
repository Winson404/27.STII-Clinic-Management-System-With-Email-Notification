<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['dental_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-tooth"></i> Delete record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['dental_Id']; ?>" name="dental_Id">
          <h6 class="text-center">Delete record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_dental"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>



  <!-- VIEW PROFILE PHOTO -->
<div class="modal fade" id="viewphoto<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Student's photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
          <img src="../images-users/<?php echo $row['picture']; ?>" alt="" width="200" height="200" class="img-circle" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
      </div>
      <div class="modal-footer alert-light d-flex justify-content-center">
        <a href="../images-users/<?php echo $row['picture']; ?>" type="button" class="btn bg-gradient-primary" download><i class="fa-solid fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>



<!-- UPDATE REQUEST -->
<div class="modal fade" id="requestupdate<?php echo $row['dental_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-tooth"></i> Request update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" placeholder="Enter medicine name" name="user_Id" required value="<?php echo $id; ?>">
          <h6 class="text-center">Request permission to update dental student records?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="requestupdate_dental"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- UPDATE REQUEST -->
<div class="modal fade" id="requestupdate_teacher<?php echo $row['dental_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-tooth"></i> Request update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" placeholder="Enter medicine name" name="user_Id" required value="<?php echo $id; ?>">
          <h6 class="text-center">Request permission to update dental teacher records?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="requestupdate_dental_teacher"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
