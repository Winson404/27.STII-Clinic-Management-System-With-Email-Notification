<?php include 'sweetalert_messages.php'; ?>
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="row p-3">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Mission</label>
        <p class="text-sm text-justify text-muted">Stii comits itself to promote responsive ,Relevant and innovative curricula that meet the demand of the national and global industry and to provide the students with the necessary knowledge,attitude values and skills to become a successful in their chosen carrers.</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Vision</label>
        <p class="text-sm text-justify text-muted">Stii envision itself as a leading educational institution focusing on holistic formation of individuals for global competitiveness.</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Contact Us</label>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-phone"></i> +63 9123456789</p>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-envelope"></i> admin@gmail.com</p>
      </div>
    </div>
    <div class="dropdown-divider"></div>
    <strong>Copyright &copy; 2023 <a href="#">STII Clinic Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>


<script>


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





  // HIDE/SHOW PASSWORD
  function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }



  // SHOW/HIDE PASSWORDS
  function myFunction2() {
    var x = document.getElementById("mynewpassword");
    var y = document.getElementById("cpassword");
    if (x.type === "password" || y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
 }



  // IMAGE PREVIEW
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


  // LETTER ONLY
  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }



  // EMAIL VALIDATION
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
</script>



</body>
</html>

