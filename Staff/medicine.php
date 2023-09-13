<title>STII Clinic Management System | Medicine records</title>
<?php 
    include 'navbar.php'; 
    $req = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$id' AND req_type='Medicine' AND req_status=1 ");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Medicine List</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Medicine List</li>
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
                <a href="medicine_mgmt.php?page=create" class="btn bg-primary btn-sm ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> Add New Medicine</a>

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
                    <th>BRAND NAME</th>
                    <th>MEDECINE NAME</th>
                    <th>QTY AVAILABLE</th>
                    <th>QTY USED</th>
                    <th>EXP. DATE</th>
                    <th>DATE ADDED</th>
                    <th>TOOLS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM medicine ");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <tr>
                       
                        <td><?php echo $row['brand_name']; ?></td>
                        <td><?php echo $row['med_name']; ?></td>
                        <td><?php echo $row['med_stock_in']; ?></td>
                        <td><?php echo $row['med_stock_out']; ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['expiration_date'])); } ?></td>
                        <td class="text-primary"><?php if(!empty($row['date_added'])) { echo date("F d, Y", strtotime($row['date_added'])); } ?></td>
                        <td>
                          <?php if(mysqli_num_rows($req) > 0): ?>
                          <a type="button" href="medicine_mgmt.php?page=<?php echo $row['med_Id']; ?>" class="btn btn-info btn-sm ml-2"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <?php else: ?>
                          <button type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#requestupdate<?php echo $row['med_Id']; ?>"><i class="fas fa-pencil-alt"></i> Request update</button>
                          <?php endif; ?>
                          <!--  <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['med_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>-->

                        </td> 
                    </tr>

                    <?php include 'medicine_delete.php'; } ?>

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

