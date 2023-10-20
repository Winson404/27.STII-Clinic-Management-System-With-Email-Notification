<title>STII Clinic Management System | Medicine record</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



<?php if($page === 'create') { ?>

    <!-- CREATION -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Add New Medicine </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Medicine </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <span class="text-dark"><b>Brand name</b></span>
                      <select class="form-control" name="brand_name" id="brand_name" required>
                        <option selected disabled value="">Select Brand Name</option>
                        <option value="RiteMed">RiteMed</option>
                        <option value="Biogesic">Biogesic</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>        

                    <div class="form-group" id="otherBrand_name" style="display: none;">
                      <span class="text-dark"><b>Other brand name</b></span>
                      <input type="text" class="form-control" placeholder="Enter other brand name" name="other_brand_name" id="other_brand_name">
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Generic name</b></span>
                      <input type="text" class="form-control" placeholder="Enter generic name" name="med_name" required>
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Milligrams</b></span>
                      <input type="text" class="form-control" placeholder="Enter Milligrams" name="milligrams" required>
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Quantity available</b></span>
                      <input type="text" class="form-control" placeholder="Enter quantity  available" name="med_stock_in" min="1" required>
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Expiration date</b></span>
                      <input type="date" class="form-control"  name="expiration_date" required>
                    </div>
                    <!-- END ROW -->
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="medicine.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="create_medicine" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END CREATION -->






<?php } else { 
  $med_Id = $page;
  $fetch = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id='$med_Id'");
  $row = mysqli_fetch_array($fetch);
?>


  <!-- UPDATE -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Update medicine record</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Medicine record</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" placeholder="Enter medicine name" name="med_Id" required value="<?php echo $row['med_Id']; ?>">
              <div class="card">
                <div class="card-body">
                    

                    <div class="form-group">
                      <span class="text-dark"><b>Brand name</b></span>
                      <select class="form-control" name="brand_name" id="brand_name" required>
                        <option selected disabled value="">Select vaccine status</option>
                        <option value="RiteMed" <?php if($row['brand_name'] == 'RiteMed') { echo 'selected'; } ?>>RiteMed</option>
                        <option value="Biogesic" <?php if($row['brand_name'] == 'Biogesic') { echo 'selected'; } ?>>Biogesic</option>
                        <option value="Others" <?php if($row['brand_name'] == 'Others') { echo 'selected'; } ?>>Others</option>
                      </select>
                    </div>        

                    <div class="form-group" id="otherBrand_name" <?php if (!empty($row['other_brand_name'])) { echo "style='display: block;'"; } else { echo "style='display: none;'"; } ?>>
                      <span class="text-dark"><b>Other brand name</b></span>
                      <input type="text" class="form-control" placeholder="Enter other brand name" name="other_brand_name" id="other_brand_name" value="<?php echo $row['other_brand_name']; ?>">
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Generic name</b></span>
                      <input type="text" class="form-control" placeholder="Enter generic name" name="med_name" required value="<?php echo $row['med_name']; ?>">
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Milligrams</b></span>
                      <input type="text" class="form-control" placeholder="Enter Milligrams" name="milligrams" required value="<?php echo $row['milligrams']; ?>">
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Quantity stock available</b></span>
                      <input type="text" class="form-control" placeholder="Enter quantity stock available" name="med_stock_in" min="1" required value="<?php echo $row['med_stock_in']; ?>">
                    </div>
                    <div class="form-group">
                      <span class="text-dark"><b>Expiration date</b></span>
                      <input type="date" class="form-control"  name="expiration_date" required value="<?php echo $row['expiration_date']; ?>">
                    </div>
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <a href="medicine.php" class="btn bg-secondary"><i class="fa-solid fa-backward"></i> Back to list</a>
                    <button type="submit" class="btn bg-primary" name="update_medicine" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- END UPDATE -->


<?php } ?>







  </div>

<?php } else { include '404.php'; } ?>









    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php include 'footer.php';  ?>

<script>  

   // MEDICINE_MGMT.PHP
  var brandNameSelect = document.getElementById('brand_name');
  var otherBrandNameInput = document.getElementById('other_brand_name');

  brandNameSelect.addEventListener('change', function() {
    if (brandNameSelect.value === 'Others') {
      document.getElementById("otherBrand_name").style.display = "block";
      otherBrandNameInput.removeAttribute('readonly');
      otherBrandNameInput.setAttribute('required', 'required');
    } else {
      document.getElementById("otherBrand_name").style.display = "none";
      otherBrandNameInput.setAttribute('readonly', 'readonly');
      otherBrandNameInput.removeAttribute('required');
      otherBrandNameInput.value = '';
    }
  });


   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }


   function signaturess(event)
  {
    var signatureimage=URL.createObjectURL(event.target.files[0]);
    var signatureimagediv= document.getElementById('qrpreview');
    var signaturenewimg=document.createElement('img');
    signatureimagediv.innerHTML='';
    signaturenewimg.src=signatureimage;
    signaturenewimg.width="90";
    signaturenewimg.height="90";
    signaturenewimg.style['border-radius']="50%";
    signaturenewimg.style['display']="block";
    signaturenewimg.style['margin-left']="auto";
    signaturenewimg.style['margin-right']="auto";
    signaturenewimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    signatureimagediv.appendChild(signaturenewimg);
  }

  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }


    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
    }

    function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 1);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
      document.getElementById("agestatus").value = age;
      }
      }else{
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      return false;
      }
    }



    function validate_password_confirm_password() {
      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }

    function validate_password() {
       var pass = document.getElementById('password').value;
       var confirm_pass = document.getElementById('cpassword').value;
       var regex = /[a-zA-Z0-9]/g;
       var pass2 = pass.match(regex).length;

      if(pass2 < 8) {
        document.getElementById('length').style.color = 'red';
        document.getElementById('length').innerHTML = 'Password must be at least 8 characters.';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);

      } else {
        document.getElementById('length').style.color = 'green';
        document.getElementById('length').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
      }
    }
</script>


<script>
function fetchPatientInfo() {

  var patientId = $("#patient_Id").val();
  document.getElementById("as_is_patient").value = patientId;

  if (patientId !== "") {
    // Send the AJAX request
    $.ajax({
      url: "ajax.php",
      type: "GET",
      data: { patientId: patientId },
      dataType: "json",
      success: function(response) {
        // Update the input fields with the retrieved data
        $("#grade").val(response.courseYear);
        $("#contact").val(response.contactNumber);
        $("#age").val(response.age);
        $("#sex").val(response.sex);
        $("#address").val(response.address);
        $("#parentName").val(response.parentName);
        $("#parentContact").val(response.parentContact);
      },
      error: function(xhr, status, error) {
        console.log("AJAX Error: " + error);
      }
    });
  }
}
</script>
