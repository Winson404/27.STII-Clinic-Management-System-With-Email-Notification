<title>STII Clinic Management System | Announcement records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Announcement History</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Announcement History</li>
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
                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#add_activity"><i class="fa-sharp fa-solid fa-square-plus"></i> Add New Announcement</button>
                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                  <table id="examplse1" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr class="bg-light">
                    <th>ANNOUNCEMENT TOPIC</th>
                    <th>DATE ADDED</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php 
                      $sql = mysqli_query($conn, "SELECT * FROM announcement ORDER BY actId DESC");
                      if(mysqli_num_rows($sql) > 0 ) {
                      while ($row = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row['actName']; ?></td>
                        <td><?php echo date("F d, Y", strtotime($row['date_added'])); ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view<?php echo $row['actId']; ?>"><i class="fas fa-folder"></i> View</button>
                          <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php //echo $row['actId']; ?>"><i class="fas fa-pencil-alt"></i> Edit</button> -->
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['actId']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    <?php include 'announcement_update_delete.php'; } } else { ?>
                      <tr>
                        <td colspan="100%" class="text-center">No activity found</td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'announcement_add.php'; include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->

