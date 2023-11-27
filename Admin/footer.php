<div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered p-3">
    <div class="modal-content">
       <div class="modal-header bg-light">
          <img src="../images/stii.png" alt="" class="d-block m-auto img-circle img-fluid shadow-sm" width="100">
      </div>
      <div class="modal-body p-5">
          <h6 class="text-center">Your session has timed out. Please login again</h6>
      </div>
      <div class="modal-footer alert-light">
        <a href="../logout.php" type="button" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>

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
<br>

  <footer class="main-footer">
    <!-- <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Mission</label>
        <p class="text-sm text-justify text-muted" style="text-indent: 30px;">Stii comits itself to promote responsive ,Relevant and innovative curricula that meet the demand of the national and global industry and to provide the students with the necessary knowledge,attitude values and skills to become a successful in their chosen carrers.</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Vision</label>
        <p class="text-sm text-justify text-muted" style="text-indent: 30px;">Stii envision itself as a leading educational institution focusing on holistic formation of individuals for global competitiveness.</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Contact Us</label>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-phone"></i> +63 9123456789</p>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-envelope"></i> admin@gmail.com</p>
      </div>

    </div> -->
    <div class="dropdown-divider"></div>
    <strong>Copyright &copy; 2023 <a href="#">STII Clinic Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="print.js"></script> 
<!-- GOOGLE PIE CHART -->
<script type="text/javascript" src="../plugins/google-pie-chart/loader.js"></script>

<script src="../plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<!-- <script src="js/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="js/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="js/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="js/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="js/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="js/moment/moment.min.js"></script> -->
<!-- <script src="js/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="js/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="js/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });



     $("#example111").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example111_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });



    $("#example1111").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1111_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $("#example11111").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example11111_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $("#example111111").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example111111_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $("#askingMed").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#askingMed_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $("#missedAppt").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#missedAppt_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


  });

</script>
<script>
    $(function () {
      //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });


// AUTO LOGOUT AFTER 10 MINS
  setInterval(function() {
    var lastActive = <?php echo $_SESSION['last_active']; ?>;
    var currentTime = new Date().getTime() / 1000;
    var inactiveTime = currentTime - lastActive;
    if (inactiveTime > 600) { // inactivity period is 10 seconds
        
        $('#approve').modal({
          backdrop: 'static',
          keyboard: false
        }).modal('show');

        setTimeout(function() {
          window.location.href = '../logout.php';
        }, 15000); 

    }
  }, 1000); // check every second



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


  // PASSWORD MATCHING
  function validate_password_confirm_password() {
    var pass = document.getElementById('password').value;
    var confirm_pass = document.getElementById('cpassword').value;
    if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').style.color = '#e60000';
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


  // VALIDATE - MATCHED OR NOT MATCHED PASSWORDS
  function validate_password() {
      var pass = document.getElementById('mynewpassword').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if(pass == "") {
        confirm_pass.disabled = true;
      } else if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('changepassword').disabled = true;
        document.getElementById('changepassword').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').style.display = 'none';
        document.getElementById('changepassword').disabled = false;
        document.getElementById('changepassword').style.opacity = (1);
      }
  }



  /*MAKE PASSWORD MORE SECURED / VALIDATE PASSWORD*/
  const passwordField = document.getElementById('password');
  const passwordMessage = document.getElementById('password-message');
  passwordField.addEventListener('input', () => {
    const password = passwordField.value;
    let errors = [];

    // Check password length
    if (password.length < 8) {
      errors.push('Password must be at least 8 characters long.');
    }

    // Check if password contains a special character
    if (!/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) {
      errors.push('Password must contain at least one special character.');
    }

    // Display error messages if any
    if (errors.length > 0) {
      passwordMessage.innerText = errors.join(' ');
      passwordMessage.classList.add('error');
    } else {
      passwordMessage.innerText = '';
      passwordMessage.classList.remove('error');
    }
  });




  // AUTO CALCULATE AGE
  function calculateAge() {
    var birthdate = new Date(document.getElementById("birthdate").value);
    var now = new Date();

    var ageInMilliseconds = now.getTime() - birthdate.getTime();
    var ageInSeconds = ageInMilliseconds / 1000;
    var ageInMinutes = ageInSeconds / 60;
    var ageInHours = ageInMinutes / 60;
    var ageInDays = ageInHours / 24;
    var ageInWeeks = ageInDays / 7;
    var ageInMonths = ageInDays / 30.44;
    var ageInYears = ageInDays / 365;

    var age = Math.floor(ageInYears);

    if (ageInDays >= 365) {
      var ageDescription = age + " year" + (age > 1 ? "s" : "") + " old";
    } else if (ageInDays >= 30) {
      var ageDescription = Math.floor(ageInMonths) + " month" + (Math.floor(ageInMonths) > 1 ? "s" : "") + " old";
    } else if (ageInDays >= 7) {
      var ageDescription = Math.floor(ageInWeeks) + " week" + (Math.floor(ageInWeeks) > 1 ? "s" : "") + " old";
    } else {
      var ageDescription = Math.floor(ageInDays) + " day" + (Math.floor(ageInDays) > 1 ? "s" : "") + " old";
    }

    document.getElementById("txtage").value = ageDescription;
  }



  // GRADE / POSITION
   function handlePositionChange() {
    var selectedValue = document.getElementById("position-select").value;
    var gradeDiv = document.getElementById("grade");
    var positionDiv = document.getElementById("position");
    var positionInput = document.querySelector("#position input[name='position']");
    var gradeInput = document.querySelector("#grade input[name='grade']");

    if (selectedValue === "Student") {
        // Show gradeDiv and make gradeInput required
        gradeDiv.style.display = "block";
        gradeInput.required = true;

        // Hide positionDiv and remove required attribute from positionInput
        positionDiv.style.display = "none";
        positionInput.removeAttribute("required");
    } else if (selectedValue === "Teacher") {
        // Hide gradeDiv and remove required attribute from gradeInput
        gradeDiv.style.display = "none";
        gradeInput.removeAttribute("required");

        // Show positionDiv and make positionInput required
        positionDiv.style.display = "block";
        positionInput.required = true;
    }
}
 

 function showDateInputs() {
  var sortBy = $('#sortBy').val();
  var dateInputsContainer = $('#dateInputs');
  dateInputsContainer.empty(); // Clear previous inputs

  if (sortBy === 'daily') {
    dateInputsContainer.append('<label for="dailyDate">Date:</label>' +
      '<input type="date" class="form-control" id="dailyDate" name="dailyDate" required>');
  } else if (sortBy === 'weekly') {
    // Create a form row for horizontal layout
    dateInputsContainer.append('<div class="form-row"></div>');

    // Add start date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="weeklyStartDate">Start Date:</label>' +
      '<input type="date" class="form-control" id="weeklyStartDate" name="weeklyStartDate" required>' +
      '</div>');

    // Add end date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="weeklyEndDate">End Date (7th day):</label>' +
      '<input type="date" class="form-control" id="weeklyEndDate" name="weeklyEndDate" required readonly>' +
      '</div>');

    // Add an event listener to the start date input
    $('#weeklyStartDate').on('change', function () {
      // Calculate and set the value of the end date input to be the 7th day
      var startDate = new Date($(this).val());
      var endDate = new Date(startDate);
      endDate.setDate(startDate.getDate() + 6);
      
      // Format the date as 'YYYY-MM-DD' and set the value of the end date input
      var formattedEndDate = endDate.toISOString().split('T')[0];
      $('#weeklyEndDate').val(formattedEndDate);
    });
  } else if (sortBy === 'monthly') {
    // For simplicity, let's assume a fixed set of months
    dateInputsContainer.append('<label for="monthlyMonth">Month:</label>' +
      '<select class="form-control" id="monthlyMonth" name="monthlyMonth" required>' +
      '<option value="" selected disabled>Select month</option>' +
      '<option value="01">January</option>' +
      '<option value="02">February</option>' +
      '<option value="03">March</option>' +
      '<option value="04">April</option>' +
      '<option value="05">May</option>' +
      '<option value="06">June</option>' +
      '<option value="07">July</option>' +
      '<option value="08">August</option>' +
      '<option value="09">September</option>' +
      '<option value="10">October</option>' +
      '<option value="11">November</option>' +
      '<option value="12">December</option>' +
      '</select>');
  } else if (sortBy === 'monthlyMedicine') {
    // Create a form row for horizontal layout
    dateInputsContainer.append('<div class="form-row"></div>');

    // Add start date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="weeklyStartDate">Start Month:</label>' +
      '<input type="date" class="form-control" id="monthlyStartDate" name="monthlyStartDate" required>' +
      '</div>');

    // Add end date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="weeklyEndDate">End Month:</label>' +
      '<input type="date" class="form-control" id="monthlyEndDate" name="monthlyEndDate" required>' +
      '</div>');

    // Add an event listener to the start date input
    $('#monthlyStartDate').on('change', function () {
      // Calculate and set the value of the end date input to be the 7th day
      var startDate = new Date($(this).val());
      var endDate = new Date(startDate);
      endDate.setDate(startDate.getDate() + 6);
      
      // Format the date as 'YYYY-MM-DD' and set the value of the end date input
      var formattedEndDate = endDate.toISOString().split('T')[0];
      $('#monthlyEndDate').val(formattedEndDate);
    });
  } else if (sortBy === 'yearly') {
    dateInputsContainer.append('<label for="yearly">Date:</label>' +
    '<input type="number" class="form-control" id="yearly" name="yearlyDate" required placeholder="2000" min="1000" step="1">');

      // Add an input event listener to enforce the maximum length
      $('#yearly').on('input', function() {
        if ($(this).val().length > 4) {
          $(this).val($(this).val().slice(0, 4));
        }
      });
  } else if (sortBy === 'custom') {
    // Create a form row for horizontal layout
    dateInputsContainer.append('<div class="form-row"></div>');

    // Add start date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="StartDate">Start Date:</label>' +
      '<input type="date" class="form-control" id="StartDate" name="StartDate" required>' +
      '</div>');

    // Add end date input to the form row
    dateInputsContainer.find('.form-row').append('<div class="form-group col-md-6">' +
      '<label for="EndDate">End Date:</label>' +
      '<input type="date" class="form-control" id="EndDate" name="EndDate" required>' +
      '</div>');
  } 

  // Update the name attribute of the submit button
  var submitButton = $('#sortingForm button[type="submit"]');
  submitButton.attr('name', sortBy);
}




  // function sortRecords() {
  //   var sortBy = $('#sortBy').val();
  //   // WHATEVER VALUE IS SELECTED FROM THE DROPDOWN (DAILY, WEEKLY, MONTHLY, YEARLY, CUSTOM DATE), THAT WILL BE THE NAME OF THE SUBMIT BUTTON
  //   var sortBy = $('#sortingForm button[type="submit"]').attr('name');

  //   if (sortBy === 'daily') {
  //     var dailyDate = $('#dailyDate').val();
  //   } else if (sortBy === 'custom') {
  //     var StartDate = $('#StartDate').val();
  //     var EndDate = $('#EndDate').val();
  //   } else if (sortBy === 'monthly') {
  //     var monthlyMonth = $('#monthlyMonth').val();
  //   }
  // }
  

</script>
</body>
</html>