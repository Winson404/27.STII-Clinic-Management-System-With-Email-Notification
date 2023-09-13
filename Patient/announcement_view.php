<!-- SERVES AS REMINDER: DISPLAY ACTIVITY WHEN ACTIVITY DATE IS TODAY -->
<div class="modal fade" id="reminder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bell"></i> Announcement notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
            $i = 1;
            $getAct = mysqli_query($conn, "SELECT * FROM announcement");
            if(mysqli_num_rows($getAct) > 0) {
              while ($aa = mysqli_fetch_array($getAct)) {
        ?>

            <div class="form-group p-0">
              <span class="text-dark"><b>Announcement # <?php echo $i++; ?></b></span>
              <p style="text-indent: 30px;text-align: justify;"><?php echo $aa['actName']; ?></p>
              <!-- <p class="text-sm text-right"><?php// echo date("F d, Y", strtotime($aa['actDate'])); ?></p> -->
              <div class="dropdown-divider"></div>
            </div>

        <?php
              }
            }
        ?>
          
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
      </div>
    </div>
  </div>
</div>
