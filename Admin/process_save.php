<?php 
	include '../config.php';
	// include('../phpqrcode/qrlib.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');


	// SAVE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['create_admin'])) {
		$user_type		  = mysqli_real_escape_string($conn, $_POST['user_type']);
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace       = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus      = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$occupation       = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		  = mysqli_real_escape_string($conn, $_POST['religion']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no         = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name      = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok            = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone             = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province         = mysqli_real_escape_string($conn, $_POST['province']);
		$region           = mysqli_real_escape_string($conn, $_POST['region']);
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);
		$date_registered  = date('Y-m-d');


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Email already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: admin_mgmt.php?page=create");
		} else {

			// Check if image file is a actual image or fake image
		    $target_dir = "../images-users/";
		    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "File is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
			    $uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");

		    // if everything is ok, try to upload file
		    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        		$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, email, contact, birthplace, gender, civilstatus, occupation, religion, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$email', '$contact', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$file', '$password', '$user_type', '$date_registered')");

              	  if($save) {
		          	$_SESSION['message'] = "Record has been saved!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: admin_mgmt.php?page=create");
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=create");
		          }
	       			
	        } else {
	        	$_SESSION['message'] = "There was an error uploading your profile picture.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
	        }
		  }
		}
	}




	// SAVE STUDENT - STUDENT_ADD.PHP
	if(isset($_POST['create_user'])) {
		$vaccine_status           = mysqli_real_escape_string($conn, $_POST['vaccine_status']);
		$position		          = 'Student';
		$name		              = mysqli_real_escape_string($conn, $_POST['name']);
		$grade		              = mysqli_real_escape_string($conn, $_POST['grade']);
		$dob	                  = mysqli_real_escape_string($conn, $_POST['dob']);
		$age		              = mysqli_real_escape_string($conn, $_POST['age']);
		$sex		              = mysqli_real_escape_string($conn, $_POST['sex']);
		$address		          = mysqli_real_escape_string($conn, $_POST['address']);
		$religion                 = mysqli_real_escape_string($conn, $_POST['religion']);
		$contact		          = mysqli_real_escape_string($conn, $_POST['contact']);
		$email		              = mysqli_real_escape_string($conn, $_POST['email']);
		$parentName		          = mysqli_real_escape_string($conn, $_POST['parentName']);
		$parentContact	          = mysqli_real_escape_string($conn, $_POST['parentContact']);
		$illness		          = mysqli_real_escape_string($conn, $_POST['illness']);
		$pastMedical	          = mysqli_real_escape_string($conn, $_POST['pastMedical']);
		$surgicalHistory          = mysqli_real_escape_string($conn, $_POST['surgicalHistory']);
		$blood_type	          = mysqli_real_escape_string($conn, $_POST['blood_type']);
		$height		              = mysqli_real_escape_string($conn, $_POST['height']);
		$weight		              = mysqli_real_escape_string($conn, $_POST['weight']);
		$allergy		          = mysqli_real_escape_string($conn, $_POST['allergy']);
		$password                 = md5($_POST['password']);
		$pass                     = $_POST['password'];

		if(isset($_POST['nutritional_Immunization'])) { 
			$nutritional_Immunization = implode(',', $_POST['nutritional_Immunization']); 
		} else {
			$nutritional_Immunization = "";
		}

		if(isset($_POST['familyHistory'])) { 
			$familyHistory = implode(',', $_POST['familyHistory']); 
		} else {
			$familyHistory = "";
		}

		if(isset($_POST['socialHistory'])) { 
			$socialHistory = implode(',', $_POST['socialHistory']); 
		} else {
			$socialHistory = "";
		}


		// NOT ARRAY
		$packsYears               = mysqli_real_escape_string($conn, $_POST['packsYears']);
		$environment              = mysqli_real_escape_string($conn, $_POST['environment']);
		$frequency                = mysqli_real_escape_string($conn, $_POST['frequency']);

		if(isset($_POST['general'])) {
		 $general= implode(',', $_POST['general']); 
		} else {
			$general = "";
		}

		if(isset($_POST['hematologic'])) {
		 $hematologic = implode(',', $_POST['hematologic']); 
		} else {
			$hematologic = "";
		}

		if(isset($_POST['endocrine'])) {
		 $endocrine = implode(',', $_POST['endocrine']); 
		} else {
			$endocrine = "";
		}

		if(isset($_POST['extremities'])) {
		 $extremities = implode(',', $_POST['extremities']); 
		} else {
			$extremities = "";
		}

		if(isset($_POST['skin'])) {
		 $skin = implode(',', $_POST['skin']);
	    } else {
	    	$skin = "";
		}

		if(isset($_POST['head'])) {
		 $head = implode(',', $_POST['head']); 
		} else {
			$head = "";
		}


		// NOT ARRAY
		$vision                   = mysqli_real_escape_string($conn, $_POST['vision']);


		if(isset($_POST['Eyes'])) {
		 $Eyes = implode(',', $_POST['Eyes']); 
		} else {
			$Eyes = "";
		}

		if(isset($_POST['ears'])) {
		 $ears = implode(',', $_POST['ears']); 
		} else {
			$ears = "";
		}

		if(isset($_POST['nose'])) {
		 $nose = implode(',', $_POST['nose']); 
		} else {
			$nose = "";
		}

		if(isset($_POST['mouthThroat'])) { 
		  $mouthThroat = implode(',', $_POST['mouthThroat']); 
		} else {
			$mouthThroat = "";
		}


		// NOT ARRAY
		$yearsMonths              = mysqli_real_escape_string($conn, $_POST['yearsMonths']);   

		if(isset($_POST['neck'])) { 
			$neck = implode(',', $_POST['neck']); 
		} else {
			$neck = "";
		}

		if(isset($_POST['Breast'])) {
		 	$Breast  = implode(',', $_POST['Breast']); 
		} else {
			$Breast = "";
		}

		if(isset($_POST['Respiratory'])) { 
			$Respiratory = implode(',', $_POST['Respiratory']); 
		} else {
			$Respiratory = "";
		}

		if(isset($_POST['Cardiovascular'])) {
		    $Cardiovascular = implode(',', $_POST['Cardiovascular']); 
		} else {
			$Cardiovascular = "";
		} 

		if(isset($_POST['Gastrointestinal'])) {
		    $Gastrointestinal = implode(',', $_POST['Gastrointestinal']); 
		} else {
			$Gastrointestinal = "";
		}

		if(isset($_POST['peripheralvascular'])) { 
			$peripheralvascular = implode(',', $_POST['peripheralvascular']); 
		} else {
			$peripheralvascular = "";
		}



		// NOT ARRAY
		$freq_urinary             = mysqli_real_escape_string($conn, $_POST['freq_urinary']);       


		if(isset($_POST['Urinary'])){ $Urinary = implode(',', $_POST['Urinary']); }
		if(isset($_POST['male']))   { $male    = implode(',', $_POST['male']); }

		
		// NOT ARRAY
		$age_menarche             = mysqli_real_escape_string($conn, $_POST['age_menarche']);       


		if(isset($_POST['female'])) {
		    $female = implode(',', $_POST['female']);
		} else {
		    $female = "";
		}

		if(isset($_POST['muscularSkeletal'])) {
		    $muscularSkeletal = implode(',', $_POST['muscularSkeletal']);
		} else {
		    $muscularSkeletal = "";
		}

		if(isset($_POST['Psychiatric'])) {
		    $Psychiatric = implode(',', $_POST['Psychiatric']);
		} else {
		    $Psychiatric = "";
		}

		if(isset($_POST['Neurologic'])) {
		    $Neurologic = implode(',', $_POST['Neurologic']);
		} else {
		    $Neurologic = "";
		}

		if(isset($_POST['NeurologicExam'])) {
		    $NeurologicExam = implode(',', $_POST['NeurologicExam']);
		} else {
		    $NeurologicExam = "";
		}

		
		$file                     = basename($_FILES["fileToUpload"]["name"]);
		

		$exist = mysqli_query($conn, "SELECT * FROM patient WHERE name='$name' AND dob='$dob' AND age='$age' AND sex='$sex'");
		if(mysqli_num_rows($exist)>0) {
		      $_SESSION['message'] = "Record already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: student_add.php");
		} else {
			$exist2 = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' ");
			if(mysqli_num_rows($exist2)>0) {
			      $_SESSION['message'] = "Email already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: student_add.php");
			} else { 

				// Check if image file is a actual image or fake image
			    $target_dir = "../images-users/";
			    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $uploadOk = 1;
			    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: student_add.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: student_add.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: student_add.php");
				    $uploadOk = 0;
			    }

			    // Check if $uploadOk is set to 0 by an error
			    elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: student_add.php");

			    // if everything is ok, try to upload file
			    } else {

		        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        		$save = mysqli_query($conn, "INSERT INTO patient (vaccine_status, position, name, grade, dob, age, sex, address, religion, contact, email, parentName, parentContact, illness, pastMedical, surgicalHistory, blood_type, height, weight, allergy, password, pass, nutritional_Immunization, familyHistory, socialHistory, packsYears, environment, frequency, general, hematologic, endocrine, extremities, skin, head, vision, Eyes, ears, nose, mouthThroat, yearsMonths, neck, Breast, Respiratory, Cardiovascular, Gastrointestinal, peripheralvascular, freq_urinary, Urinary, male, age_menarche, female, muscularSkeletal, Psychiatric, Neurologic, NeurologicExam, picture) VALUES ('$vaccine_status', '$position', '$name', '$grade', '$dob', '$age', '$sex', '$address', '$religion', '$contact', '$email', '$parentName', '$parentContact', '$illness', '$pastMedical', '$surgicalHistory', '$blood_type', '$height', '$weight', '$allergy', '$password', '$pass', '$nutritional_Immunization', '$familyHistory', '$socialHistory', '$packsYears', '$environment', '$frequency', '$general', '$hematologic', '$endocrine', '$extremities', '$skin', '$head', '$vision', '$Eyes', '$ears', '$nose', '$mouthThroat', '$yearsMonths', '$neck', '$Breast', '$Respiratory', '$Cardiovascular', '$Gastrointestinal', '$peripheralvascular', '$freq_urinary', '$Urinary', '$male', '$age_menarche', '$female', '$muscularSkeletal', '$Psychiatric', '$Neurologic', '$NeurologicExam', '$file')");

	              	  if($save) {
			          	$_SESSION['message'] = "Student record has been saved!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: student_add.php");
			          } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: student_add.php");
			          }
		       			
		        } else {
		        	$_SESSION['message'] = "There was an error uploading your profile picture.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: student_add.php");
		        }
		    }
		  }
		}
	}






	// SAVE TEACHER - TEACHER_ADD.PHP
	if(isset($_POST['create_teacher'])) {
		$vaccine_status           = mysqli_real_escape_string($conn, $_POST['vaccine_status']);
		$position		          = 'Teacher';
		$name		              = mysqli_real_escape_string($conn, $_POST['name']);
		$teacher_position	      = mysqli_real_escape_string($conn, $_POST['teacher_position']);
		$dob	                  = mysqli_real_escape_string($conn, $_POST['dob']);
		$age		              = mysqli_real_escape_string($conn, $_POST['age']);
		$sex		              = mysqli_real_escape_string($conn, $_POST['sex']);
		$address		          = mysqli_real_escape_string($conn, $_POST['address']);
		$religion                 = mysqli_real_escape_string($conn, $_POST['religion']);
		$contact		          = mysqli_real_escape_string($conn, $_POST['contact']);
		$email		              = mysqli_real_escape_string($conn, $_POST['email']);
		$parentName		          = mysqli_real_escape_string($conn, $_POST['parentName']);
		$parentContact	          = mysqli_real_escape_string($conn, $_POST['parentContact']);
		$illness		          = mysqli_real_escape_string($conn, $_POST['illness']);
		$pastMedical	          = mysqli_real_escape_string($conn, $_POST['pastMedical']);
		$surgicalHistory          = mysqli_real_escape_string($conn, $_POST['surgicalHistory']);
		$blood_type	          = mysqli_real_escape_string($conn, $_POST['blood_type']);
		$height		              = mysqli_real_escape_string($conn, $_POST['height']);
		$weight		              = mysqli_real_escape_string($conn, $_POST['weight']);
		$allergy		          = mysqli_real_escape_string($conn, $_POST['allergy']);
		$password                 = md5($_POST['password']);
		$pass                     = $_POST['password'];

		if(isset($_POST['nutritional_Immunization'])) { 
			$nutritional_Immunization = implode(',', $_POST['nutritional_Immunization']); 
		} else {
			$nutritional_Immunization = "";
		}

		if(isset($_POST['familyHistory'])) { 
			$familyHistory = implode(',', $_POST['familyHistory']); 
		} else {
			$familyHistory = "";
		}

		if(isset($_POST['socialHistory'])) { 
			$socialHistory = implode(',', $_POST['socialHistory']); 
		} else {
			$socialHistory = "";
		}


		// NOT ARRAY
		$packsYears               = mysqli_real_escape_string($conn, $_POST['packsYears']);
		$environment              = mysqli_real_escape_string($conn, $_POST['environment']);
		$frequency                = mysqli_real_escape_string($conn, $_POST['frequency']);

		if(isset($_POST['general'])) {
		 $general= implode(',', $_POST['general']); 
		} else {
			$general = "";
		}

		if(isset($_POST['hematologic'])) {
		 $hematologic = implode(',', $_POST['hematologic']); 
		} else {
			$hematologic = "";
		}

		if(isset($_POST['endocrine'])) {
		 $endocrine = implode(',', $_POST['endocrine']); 
		} else {
			$endocrine = "";
		}

		if(isset($_POST['extremities'])) {
		 $extremities = implode(',', $_POST['extremities']); 
		} else {
			$extremities = "";
		}

		if(isset($_POST['skin'])) {
		 $skin = implode(',', $_POST['skin']);
	    } else {
	    	$skin = "";
		}

		if(isset($_POST['head'])) {
		 $head = implode(',', $_POST['head']); 
		} else {
			$head = "";
		}


		// NOT ARRAY
		$vision                   = mysqli_real_escape_string($conn, $_POST['vision']);


		if(isset($_POST['Eyes'])) {
		 $Eyes = implode(',', $_POST['Eyes']); 
		} else {
			$Eyes = "";
		}

		if(isset($_POST['ears'])) {
		 $ears = implode(',', $_POST['ears']); 
		} else {
			$ears = "";
		}

		if(isset($_POST['nose'])) {
		 $nose = implode(',', $_POST['nose']); 
		} else {
			$nose = "";
		}

		if(isset($_POST['mouthThroat'])) { 
		  $mouthThroat = implode(',', $_POST['mouthThroat']); 
		} else {
			$mouthThroat = "";
		}


		// NOT ARRAY
		$yearsMonths              = mysqli_real_escape_string($conn, $_POST['yearsMonths']);   

		if(isset($_POST['neck'])) { 
			$neck = implode(',', $_POST['neck']); 
		} else {
			$neck = "";
		}

		if(isset($_POST['Breast'])) {
		 	$Breast  = implode(',', $_POST['Breast']); 
		} else {
			$Breast = "";
		}

		if(isset($_POST['Respiratory'])) { 
			$Respiratory = implode(',', $_POST['Respiratory']); 
		} else {
			$Respiratory = "";
		}

		if(isset($_POST['Cardiovascular'])) {
		    $Cardiovascular = implode(',', $_POST['Cardiovascular']); 
		} else {
			$Cardiovascular = "";
		} 

		if(isset($_POST['Gastrointestinal'])) {
		    $Gastrointestinal = implode(',', $_POST['Gastrointestinal']); 
		} else {
			$Gastrointestinal = "";
		}

		if(isset($_POST['peripheralvascular'])) { 
			$peripheralvascular = implode(',', $_POST['peripheralvascular']); 
		} else {
			$peripheralvascular = "";
		}



		// NOT ARRAY
		$freq_urinary             = mysqli_real_escape_string($conn, $_POST['freq_urinary']);       


		if(isset($_POST['Urinary'])){ $Urinary = implode(',', $_POST['Urinary']); }
		if(isset($_POST['male']))   { $male    = implode(',', $_POST['male']); }

		
		// NOT ARRAY
		$age_menarche             = mysqli_real_escape_string($conn, $_POST['age_menarche']);       


		if(isset($_POST['female'])) {
		    $female = implode(',', $_POST['female']);
		} else {
		    $female = "";
		}

		if(isset($_POST['muscularSkeletal'])) {
		    $muscularSkeletal = implode(',', $_POST['muscularSkeletal']);
		} else {
		    $muscularSkeletal = "";
		}

		if(isset($_POST['Psychiatric'])) {
		    $Psychiatric = implode(',', $_POST['Psychiatric']);
		} else {
		    $Psychiatric = "";
		}

		if(isset($_POST['Neurologic'])) {
		    $Neurologic = implode(',', $_POST['Neurologic']);
		} else {
		    $Neurologic = "";
		}

		if(isset($_POST['NeurologicExam'])) {
		    $NeurologicExam = implode(',', $_POST['NeurologicExam']);
		} else {
		    $NeurologicExam = "";
		}

		
		$file                     = basename($_FILES["fileToUpload"]["name"]);
		


		$exist = mysqli_query($conn, "SELECT * FROM patient WHERE name='$name' AND dob='$dob' AND age='$age' AND sex='$sex'");
		if(mysqli_num_rows($exist)>0) {
		      $_SESSION['message'] = "Record already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: teacher_add.php");
		} else {
			$exist2 = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' ");
			if(mysqli_num_rows($exist2)>0) {
			      $_SESSION['message'] = "Email already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: teacher_add.php");
			} else { 

				// Check if image file is a actual image or fake image
			    $target_dir = "../images-users/";
			    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $uploadOk = 1;
			    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: teacher_add.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: student_add.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: teacher_add.php");
				    $uploadOk = 0;
			    }

			    // Check if $uploadOk is set to 0 by an error
			    elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: teacher_add.php");

			    // if everything is ok, try to upload file
			    } else {

		        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        		$save = mysqli_query($conn, "INSERT INTO patient (vaccine_status, position, name, teacher_position, dob, age, sex, address, religion, contact, email, parentName, parentContact, illness, pastMedical, surgicalHistory, blood_type, height, weight, allergy, password, pass, nutritional_Immunization, familyHistory, socialHistory, packsYears, environment, frequency, general, hematologic, endocrine, extremities, skin, head, vision, Eyes, ears, nose, mouthThroat, yearsMonths, neck, Breast, Respiratory, Cardiovascular, Gastrointestinal, peripheralvascular, freq_urinary, Urinary, male, age_menarche, female, muscularSkeletal, Psychiatric, Neurologic, NeurologicExam, picture) VALUES ('$vaccine_status', '$position', '$name', '$teacher_position', '$dob', '$age', '$sex', '$address', '$religion', '$contact', '$email', '$parentName', '$parentContact', '$illness', '$pastMedical', '$surgicalHistory', '$blood_type', '$height', '$weight', '$allergy', '$password', '$pass', '$nutritional_Immunization', '$familyHistory', '$socialHistory', '$packsYears', '$environment', '$frequency', '$general', '$hematologic', '$endocrine', '$extremities', '$skin', '$head', '$vision', '$Eyes', '$ears', '$nose', '$mouthThroat', '$yearsMonths', '$neck', '$Breast', '$Respiratory', '$Cardiovascular', '$Gastrointestinal', '$peripheralvascular', '$freq_urinary', '$Urinary', '$male', '$age_menarche', '$female', '$muscularSkeletal', '$Psychiatric', '$Neurologic', '$NeurologicExam', '$file')");

	              	  if($save) {
			          	$_SESSION['message'] = "Teacher record has been saved!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: teacher_add.php");
			          } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: teacher_add.php");
			          }
		       			
		        } else {
		        	$_SESSION['message'] = "There was an error uploading your profile picture.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: teacher_add.php");
		        }
		    }
		  }
		}
	}









	// CREATE/SAVE ACTIVITIY - ACTIVITY_ADD.PHP
	if(isset($_POST['create_activity'])) {

		$activity       = mysqli_real_escape_string($conn, $_POST['activity']);
		$date_acquired  = date('Y-m-d');
		$save = mysqli_query($conn, "INSERT INTO announcement (actName, date_added) VALUES ('$activity', '$date_acquired')");

		  if($save) {
		  	$_SESSION['message'] = "New announcement has been added.";
		    $_SESSION['text'] = "Saved successfully!";
		    $_SESSION['status'] = "success";
			header("Location: announcement.php");
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: announcement.php");
		  }
	}






	// CREATE/SAVE DENTAL PATIENT - DENTAL_MGMT.PHP
	if(isset($_POST['create_dental'])) {

		$patient_Id      = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$dental_history  = mysqli_real_escape_string($conn, $_POST['dental_history']);
		$teeth_no        = mysqli_real_escape_string($conn, $_POST['teeth_no']);
		$vs_bp           = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr              = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr              = mysqli_real_escape_string($conn, $_POST['rr']);
		$medicine_given  = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$dental_advised  = mysqli_real_escape_string($conn, $_POST['dental_advised']);
		$date_admitted   = date('Y-m-d H:i:s');

		if(empty($vs_bp)) { $vs_bp = 'None'; }
		if(empty($pr))    { $pr    = 'None'; }
		if(empty($rr))    { $rr    = 'None'; }

		$save = mysqli_query($conn, "INSERT INTO dental (patient_Id, dental_history, teeth_no, vs_bp, pr, rr, medicine_given, dental_advised, date_admitted) VALUES ('$patient_Id', '$dental_history', '$teeth_no', '$vs_bp', '$pr', '$rr', '$medicine_given', '$dental_advised', '$date_admitted')");

		  if($save) {
		  	$_SESSION['message'] = "Record has been added.";
		    $_SESSION['text'] = "Saved successfully!";
		    $_SESSION['status'] = "success";
			header("Location: dental_mgmt.php?page=create");
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: dental_mgmt.php?page=create");
		  }
	}








	// CREATE/SAVE FORM2 PATIENT - FORM2_MGMT.PHP
	if(isset($_POST['create_form2'])) {

		$patient_Id        = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$vs_bp             = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr                = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr                = mysqli_real_escape_string($conn, $_POST['rr']);
		$temperature       = mysqli_real_escape_string($conn, $_POST['temperature']);
		$vital_sign        = mysqli_real_escape_string($conn, $_POST['vital_sign']);
		$diagnosis         = mysqli_real_escape_string($conn, $_POST['diagnosis']);
		$medical_advised   = mysqli_real_escape_string($conn, $_POST['medical_advised']);
		$medical_personnel = mysqli_real_escape_string($conn, $_POST['medical_personnel']);
		$date_admitted     = date('Y-m-d H:i:s');

		$save = mysqli_query($conn, "INSERT INTO form2 (patient_Id, vs_bp, pr, rr, temperature, vital_sign, diagnosis, medical_advised, medical_personnel, date_admitted) VALUES ('$patient_Id', '$vs_bp', '$pr', '$rr', '$temperature', '$vital_sign', '$diagnosis', '$medical_advised', '$medical_personnel', '$date_admitted')");

		  if($save) {
		  	$_SESSION['message'] = "Record has been added.";
		    $_SESSION['text'] = "Saved successfully!";
		    $_SESSION['status'] = "success";
			header("Location: form2_mgmt.php?page=create");
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: form2_mgmt.php?page=create");
		  }
	}






	// CREATE PHYSICAL EXAM> CONSULTATION - PHYSICAL_MGMT.PHP
	if(isset($_POST['create_physical_exam'])) {

		$patient_Id    = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$date_admitted = date('Y-m-d H:i:s');

		if(isset($_POST['p_general'])) {
		    $p_general = implode(',', $_POST['p_general']);
		} else {
		    $p_general = "";
		}

		if(isset($_POST['p_skin'])) {
		    $p_skin = implode(',', $_POST['p_skin']);
		} else {
		    $p_skin = "";
		}

		

		// NOT ARRAY
		$skinOther                = mysqli_real_escape_string($conn, $_POST['skinOther']);       

		if(isset($_POST['p_heent'])) {
		    $p_heent = implode(',', $_POST['p_heent']);
		} else {
		    $p_heent = "";
		}

		if(isset($_POST['p_auditory'])) {
		    $p_auditory = implode(',', $_POST['p_auditory']);
		} else {
		    $p_auditory = "";
		}

		if(isset($_POST['p_nose'])) {
		    $p_nose = implode(',', $_POST['p_nose']);
		} else {
		    $p_nose = "";
		}

		if(isset($_POST['p_mouth_throat'])) {
		    $p_mouth_throat = implode(',', $_POST['p_mouth_throat']);
		} else {
		    $p_mouth_throat = "";
		}

		if(isset($_POST['p_neck'])) {
		    $p_neck = implode(',', $_POST['p_neck']);
		} else {
		    $p_neck = "";
		}

		if(isset($_POST['p_breast'])) {
		    $p_breast = implode(',', $_POST['p_breast']);
		} else {
		    $p_breast = "";
		}

		if(isset($_POST['p_cardiovascular'])) {
		    $p_cardiovascular = implode(',', $_POST['p_cardiovascular']);
		} else {
		    $p_cardiovascular = "";
		}

		if(isset($_POST['p_abdomen'])) {
		    $p_abdomen = implode(',', $_POST['p_abdomen']);
		} else {
		    $p_abdomen = "";
		}

		if(isset($_POST['p_genitals'])) {
		    $p_genitals = implode(',', $_POST['p_genitals']);
		} else {
		    $p_genitals = "";
		}


 		// NOT ARRAY
		$clinical_impression      = mysqli_real_escape_string($conn, $_POST['clinical_impression']);     
		$potential_risk           = mysqli_real_escape_string($conn, $_POST['potential_risk']);     
		$plan_medication          = mysqli_real_escape_string($conn, $_POST['plan_medication']);     

		$save = mysqli_query($conn, "INSERT INTO physical (patient_Id, p_general, p_skin, skinOther, p_heent, p_auditory, p_nose, p_mouth_throat, p_neck, p_breast, p_cardiovascular, p_abdomen, p_genitals, clinical_impression, potential_risk, plan_medication) VALUES ('$patient_Id', '$p_general', '$p_skin', '$skinOther', '$p_heent', '$p_auditory', '$p_nose', '$p_mouth_throat', '$p_neck', '$p_breast', '$p_cardiovascular', '$p_abdomen', '$p_genitals', '$clinical_impression', '$potential_risk', '$plan_medication')");

  	  if($save) {
	  	$_SESSION['message'] = "Record has been added.";
	    $_SESSION['text'] = "Saved successfully!";
	    $_SESSION['status'] = "success";
		header("Location: physical_mgmt.php?page=create");
	  } else {
	    $_SESSION['message'] = "Something went wrong while saving the information.";
	    $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
	    header("Location: physical_mgmt.php?page=create");
	  }
	}








	// CREATE/SAVE CONSULTATION PATIENT - CONSULTATION_MGMT.PHP
	if(isset($_POST['create_consultation'])) {

		$patient_Id          = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$mothers_maiden_name = mysqli_real_escape_string($conn, $_POST['mothers_maiden_name']);
		$chief_complaints    = mysqli_real_escape_string($conn, $_POST['chief_complaints']);
		$temperature         = mysqli_real_escape_string($conn, $_POST['temperature']);
		$vs_bp               = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr                  = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr                  = mysqli_real_escape_string($conn, $_POST['rr']);
		$o2zat               = mysqli_real_escape_string($conn, $_POST['o2zat']);
		$doctors_advice      = mysqli_real_escape_string($conn, $_POST['doctors_advice']);
		$medicine_given      = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$medical_personnel   = mysqli_real_escape_string($conn, $_POST['medical_personnel']);
		$date_admitted       = date('Y-m-d H:i:s');

		if(empty($vs_bp))    { $vs_bp = 'None'; }
		if(empty($pr))       { $pr    = 'None'; }
		if(empty($rr))       { $rr    = 'None'; }
		if(empty($o2zat))    { $o2zat = 'None'; }



		$save = mysqli_query($conn, "INSERT INTO consultation (patient_Id, mothers_maiden_name, chief_complaints, temperature, vs_bp, pr, rr, o2zat, doctors_advice, medicine_given, medical_personnel, date_admitted) VALUES ('$patient_Id', '$mothers_maiden_name', '$chief_complaints', '$temperature', '$vs_bp', '$pr', '$rr', '$o2zat', '$doctors_advice', '$medicine_given', '$medical_personnel', '$date_admitted')");

		  if($save) {
		  	$_SESSION['message'] = "Record has been added.";
		    $_SESSION['text'] = "Saved successfully!";
		    $_SESSION['status'] = "success";
			header("Location: consultation_mgmt.php?page=create");
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: consultation_mgmt.php?page=create");
		  }
	}









	// CREATE MEDICINE - MEDICINE_MGMT.PHP
	if(isset($_POST['create_medicine'])) {

		$brand_name       = mysqli_real_escape_string($conn, $_POST['brand_name']);
		$other_brand_name = mysqli_real_escape_string($conn, $_POST['other_brand_name']);
		$med_name         = mysqli_real_escape_string($conn, $_POST['med_name']);
		$med_stock_in     = mysqli_real_escape_string($conn, $_POST['med_stock_in']);
		$expiration_date  = mysqli_real_escape_string($conn, $_POST['expiration_date']);
		$date_added       = date('Y-m-d h:i A');

		if($expiration_date < $date_today) {
			$_SESSION['message'] = "Selected date must be onward/later.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medicine_mgmt.php?page=create");
		} else {

			$check = mysqli_query($conn, "SELECT * FROM medicine WHERE med_name='$med_name' ");
			if(mysqli_num_rows($check) > 0) {
				$_SESSION['message'] = "Medicine name already exists.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
			    header("Location: medicine_mgmt.php?page=create");
			} else {

			  $save = mysqli_query($conn, "INSERT INTO medicine (brand_name, other_brand_name, med_name, med_stock_in, med_stock_in_orig, expiration_date, date_added) VALUES ('$brand_name', '$other_brand_name', '$med_name', '$med_stock_in', '$med_stock_in', '$expiration_date', '$date_added')");

			  if($save) {
			  	$_SESSION['message'] = "Record has been added.";
			    $_SESSION['text'] = "Saved successfully!";
			    $_SESSION['status'] = "success";
				header("Location: medicine_mgmt.php?page=create");
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
			    header("Location: medicine_mgmt.php?page=create");
			  }
			}
		}
	}



















	// CONTACT EMAIL MESSAGING - CONTACT-US.PHP
	if(isset($_POST['sendEmail'])) {

		$name    = mysqli_real_escape_string($conn, $_POST['name']);
		$email	 = mysqli_real_escape_string($conn, $_POST['email']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$msg     = mysqli_real_escape_string($conn, $_POST['message']);

	    $message = '<h3>'.$subject.'</h3>
					<p>
						Good day!<br>
						'.$msg.'
					</p>
					<p>
						Name of Sender: '.$name.'<br>
						Email: '.$email.'
					</p>
					<p><b>Note:</b> This is a system generated email please do not reply.</p>';
					//Load composer's autoloader

			    $mail = new PHPMailer(true);                            
			    try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'nhsmedellin@gmail.com';     
	        		$mail->Password = 'fgzyhjjhjxdikkjp';                
			        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                         
			        $mail->SMTPSecure = 'ssl';                           
			        $mail->Port = 465;                                   

			        //Send Email
			        $mail->setFrom('nhsmedellin@gmail.com');
			        
			        //Recipients
			        $mail->addAddress('sonerwin12@gmail.com');              
			        $mail->addReplyTo('sonesrwin12@gmail.com');
			        
			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();
					$_SESSION['success'] = "Email sent successfully!";
					header("Location: contact-us.php");

			    } catch (Exception $e) {
			    	$_SESSION['success'] = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
					header("Location: contact-us.php");
			    }
    }
	

?>



