<title>STII Clinic Management System | Student records</title>
<?php 
    include 'navbar.php'; 
    $req = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$id' AND req_type='Student update' AND req_status=1 ");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Student List</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
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
                <a href="student_add.php" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> Add New Student</a>

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
                    <th>PHOTO</th>
                    <th>NAME</th>
                    <th>YEAR & COURSE</th>
                    <th>GENDER</th>
                    <th>CONTACT</th>
                    <th>DATE REGISTERED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM patient WHERE position='Student' ");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                        <td>
                            <a data-toggle="modal" data-target="#viewphoto<?php echo $row['user_Id']; ?>">
                              <img src="../images-users/<?php echo $row['picture']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                            </a href="">
                        </td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_registered'])) { echo date("F d, Y h:i A", strtotime($row['date_registered'])); } ?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="student_view.php?student_Id=<?php echo $row['user_Id']; ?>"><i class="fa-solid fa-eye"></i> View</a>
                          <?php if(mysqli_num_rows($req) > 0): ?>
                          <a class="btn btn-info btn-sm" href="student_update.php?student_Id=<?php echo $row['user_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <?php else: ?>
                          <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#requestupdate<?php echo $row['user_Id']; ?>"><i class="fas fa-pencil-alt"></i> Request update</button>
                          <?php endif; ?>
                          <!-- <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php //echo $row['user_Id']; ?>"><i class="fas fa-trash"></i> Delete</button> -->
                          <!-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#password<?php //echo $row['user_Id']; ?>"><i class="fa-solid fa-lock"></i> Security</button> -->
                        </td> 
                    </tr>

                    <?php include 'student_delete.php'; } ?>

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->