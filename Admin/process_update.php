<?php 
	include '../config.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/phpmailer/src/Exception.php';
	require '../vendor/phpmailer/src/PHPMailer.php';
	require '../vendor/phpmailer/src/SMTP.php';

		
	// UPDATE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['update_admin'])) {

		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
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
		$file             = basename($_FILES["fileToUpload"]["name"]);

		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_Id != '$user_Id' ");
		if(mysqli_num_rows($check_email) > 0) {
		   $_SESSION['message'] = "Email already exists!";
	       $_SESSION['text'] = "Please try again.";
	       $_SESSION['status'] = "error";
		   header("Location: admin_mgmt.php?page=".$user_Id);
		} else {
			if(empty($file)) {
				$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', email='$email', contact='$contact', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region', user_type='$user_type' WHERE user_Id='$user_Id' ");

              	  if($update) {
		          	$_SESSION['message'] = "Record has been updated!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: admin_mgmt.php?page=".$user_Id);
		          } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);
		          }
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
					header("Location: admin_mgmt.php?page=".$user_Id);
					$uploadOk = 0;
				} 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);
					$uploadOk = 0;
				}

				// Allow certain file formats
				elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);
				    $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);

				// if everything is ok, try to upload file
				} else {

					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

					 $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', email='$email', contact='$contact', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region', user_type='$user_type', image='$file' WHERE user_Id='$user_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Record has been updated!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: admin_mgmt.php?page=".$user_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: admin_mgmt.php?page=".$user_Id);
			          }
						
					} else {
						$_SESSION['message'] = "There was an error uploading your profile picture.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: admin_mgmt.php?page=".$user_Id);
					}
				}
			}
		}
	}





	// CHANGE ADMIN PASSWORD - ADMIN_DELETE.PHP
	if(isset($_POST['password_admin'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password did not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: admin.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
        			$_SESSION['message'] = "Password has been changed.";
	           	    $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: admin.php");
                } else {
          			$_SESSION['message'] = "Something went wrong while changing the password.";
            		$_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: admin.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: admin.php");
    	}
    }





    // UPDATE STUDENT - STUDENT_UPDATE.PHP
	if(isset($_POST['update_user'])) {
		$student_Id	              = mysqli_real_escape_string($conn, $_POST['student_Id']);
		$vaccine_status           = mysqli_real_escape_string($conn, $_POST['vaccine_status']);
		$civil_status             = mysqli_real_escape_string($conn, $_POST['civil_status']);
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
		$guardianName             = mysqli_real_escape_string($conn, $_POST['guardianName']);
		$illness		          = mysqli_real_escape_string($conn, $_POST['illness']);
		$pastMedical	          = mysqli_real_escape_string($conn, $_POST['pastMedical']);
		$surgicalHistory          = mysqli_real_escape_string($conn, $_POST['surgicalHistory']);
		$blood_type	          = mysqli_real_escape_string($conn, $_POST['blood_type']);
		$height		              = mysqli_real_escape_string($conn, $_POST['height']);
		$weight		              = mysqli_real_escape_string($conn, $_POST['weight']);
		$allergy		          = mysqli_real_escape_string($conn, $_POST['allergy']);

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


		$exist = mysqli_query($conn, "SELECT * FROM patient WHERE name='$name' AND grade='$grade' AND sex='$sex' AND user_Id !='$student_Id' ");
		if(mysqli_num_rows($exist)>0) {
		      $_SESSION['message'] = "Record already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: student_update.php?student_Id=".$student_Id);
		} else {
			$exist2 = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' AND user_Id !='$student_Id' ");
			if(mysqli_num_rows($exist2)>0) {
			      $_SESSION['message'] = "Email already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: student_update.php?student_Id=".$student_Id);
			} else {

				if(empty($file)) {
					$update = mysqli_query($conn, "UPDATE patient SET vaccine_status='$vaccine_status', civil_status='$civil_status', name='$name', grade='$grade', dob='$dob', age='$age', sex='$sex', address='$address', religion='$religion', contact='$contact', email='$email', parentName='$parentName', parentContact='$parentContact', guardianName='$guardianName', illness='$illness', pastMedical='$pastMedical', surgicalHistory='$surgicalHistory', blood_type='$blood_type', height='$height', weight='$weight', allergy='$allergy', nutritional_Immunization='$nutritional_Immunization', familyHistory='$familyHistory', socialHistory='$socialHistory', packsYears='$packsYears', environment='$environment', frequency='$frequency', general='$general', hematologic='$hematologic', endocrine='$endocrine', extremities='$extremities', skin='$skin', head='$head', vision='$vision', Eyes='$Eyes', ears='$ears', nose='$nose', mouthThroat='$mouthThroat', yearsMonths='$yearsMonths', neck='$neck', Breast='$Breast', Respiratory='$Respiratory', Cardiovascular='$Cardiovascular', Gastrointestinal='$Gastrointestinal', peripheralvascular='$peripheralvascular', freq_urinary='$freq_urinary', Urinary='$Urinary', male='$male', age_menarche='$age_menarche', female='$female', muscularSkeletal='$muscularSkeletal', Psychiatric='$Psychiatric', Neurologic='$Neurologic', NeurologicExam='$NeurologicExam' WHERE user_Id='$student_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Student record has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
				        $_SESSION['status'] = "success";
						header("Location: student_update.php?student_Id=".$student_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.".var_dump($update);
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: student_update.php?student_Id=".$student_Id);
			          }
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
						header("Location: student_update.php?student_Id=".$student_Id);
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["fileToUpload"]["size"] > 500000) {
					  	$_SESSION['message']  = "File must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: student_update.php?student_Id=".$student_Id);
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: student_update.php?student_Id=".$student_Id);
					    $uploadOk = 0;
				    }

				    // Check if $uploadOk is set to 0 by an error
				    elseif ($uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: student_update.php?student_Id=".$student_Id);

				    // if everything is ok, try to upload file
				    } else {

			        	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        		$update = mysqli_query($conn, "UPDATE patient SET vaccine_status='$vaccine_status', civil_status='$civil_status', name='$name', grade='$grade', dob='$dob', age='$age', sex='$sex', address='$address', religion='$religion', contact='$contact', email='$email', parentName='$parentName', parentContact='$parentContact', guardianName='$guardianName', illness='$illness', pastMedical='$pastMedical', surgicalHistory='$surgicalHistory', blood_type='$blood_type', height='$height', weight='$weight', allergy='$allergy', nutritional_Immunization='$nutritional_Immunization', familyHistory='$familyHistory', socialHistory='$socialHistory', packsYears='$packsYears', environment='$environment', frequency='$frequency', general='$general', hematologic='$hematologic', endocrine='$endocrine', extremities='$extremities', skin='$skin', head='$head', vision='$vision', Eyes='$Eyes', ears='$ears', nose='$nose', mouthThroat='$mouthThroat', yearsMonths='$yearsMonths', neck='$neck', Breast='$Breast', Respiratory='$Respiratory', Cardiovascular='$Cardiovascular', Gastrointestinal='$Gastrointestinal', peripheralvascular='$peripheralvascular', freq_urinary='$freq_urinary', Urinary='$Urinary', male='$male', age_menarche='$age_menarche', female='$female', muscularSkeletal='$muscularSkeletal', Psychiatric='$Psychiatric', Neurologic='$Neurologic', NeurologicExam='$NeurologicExam', picture='$file' WHERE user_Id='$student_Id' ");

		              	  if($update) {
				          	$_SESSION['message'] = "Student record has been updated!";
				            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
							header("Location: student_update.php?student_Id=".$student_Id);
				          } else {
				            $_SESSION['message'] = "Something went wrong while saving the information.".var_dump($update);
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: student_update.php?student_Id=".$student_Id);
				          }
			       			
				        } else {
				        	$_SESSION['message'] = "There was an error uploading your profile picture.";
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: student_update.php?student_Id=".$student_Id);
				        }
				    }
				}
			}
		}

	}



	// UPDATE TEACHER - TEACHER_UPDATE.PHP
	if(isset($_POST['update_teacher'])) {
		$teacher_Id	              = mysqli_real_escape_string($conn, $_POST['teacher_Id']);
		$vaccine_status           = mysqli_real_escape_string($conn, $_POST['vaccine_status']);
		$civil_status             = mysqli_real_escape_string($conn, $_POST['civil_status']);
		$name		              = mysqli_real_escape_string($conn, $_POST['name']);
		$teacher_position		  = mysqli_real_escape_string($conn, $_POST['teacher_position']);
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


		$exist = mysqli_query($conn, "SELECT * FROM patient WHERE name='$name' AND teacher_position='$teacher_position' AND sex='$sex' AND user_Id !='$teacher_Id' ");
		if(mysqli_num_rows($exist)>0) {
		      $_SESSION['message'] = "Record already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
		} else {
			$exist2 = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' AND user_Id !='$teacher_Id' ");
			if(mysqli_num_rows($exist2)>0) {
			      $_SESSION['message'] = "Email already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
			} else {

				if(empty($file)) {
					$update = mysqli_query($conn, "UPDATE patient SET vaccine_status='$vaccine_status', civil_status='$civil_status', name='$name', teacher_position='$teacher_position', dob='$dob', age='$age', sex='$sex', address='$address', religion='$religion', contact='$contact', email='$email', parentName='$parentName', parentContact='$parentContact', illness='$illness', pastMedical='$pastMedical', surgicalHistory='$surgicalHistory', blood_type='$blood_type', height='$height', weight='$weight', allergy='$allergy', nutritional_Immunization='$nutritional_Immunization', familyHistory='$familyHistory', socialHistory='$socialHistory', packsYears='$packsYears', environment='$environment', frequency='$frequency', general='$general', hematologic='$hematologic', endocrine='$endocrine', extremities='$extremities', skin='$skin', head='$head', vision='$vision', Eyes='$Eyes', ears='$ears', nose='$nose', mouthThroat='$mouthThroat', yearsMonths='$yearsMonths', neck='$neck', Breast='$Breast', Respiratory='$Respiratory', Cardiovascular='$Cardiovascular', Gastrointestinal='$Gastrointestinal', peripheralvascular='$peripheralvascular', freq_urinary='$freq_urinary', Urinary='$Urinary', male='$male', age_menarche='$age_menarche', female='$female', muscularSkeletal='$muscularSkeletal', Psychiatric='$Psychiatric', Neurologic='$Neurologic', NeurologicExam='$NeurologicExam' WHERE user_Id='$teacher_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Teacher record has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
				        $_SESSION['status'] = "success";
						header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.".var_dump($update);
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
			          }
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
						header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["fileToUpload"]["size"] > 500000) {
					  	$_SESSION['message']  = "File must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
					    $uploadOk = 0;
				    }

				    // Check if $uploadOk is set to 0 by an error
				    elseif ($uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: teacher_update.php?teacher_Id=".$teacher_Id);

				    // if everything is ok, try to upload file
				    } else {

			        	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        		$update = mysqli_query($conn, "UPDATE patient SET vaccine_status='$vaccine_status', civil_status='$civil_status', name='$name', teacher_position='$teacher_position', dob='$dob', age='$age', sex='$sex', address='$address', religion='$religion', contact='$contact', email='$email', parentName='$parentName', parentContact='$parentContact', illness='$illness', pastMedical='$pastMedical', surgicalHistory='$surgicalHistory', blood_type='$blood_type', height='$height', weight='$weight', allergy='$allergy', nutritional_Immunization='$nutritional_Immunization', familyHistory='$familyHistory', socialHistory='$socialHistory', packsYears='$packsYears', environment='$environment', frequency='$frequency', general='$general', hematologic='$hematologic', endocrine='$endocrine', extremities='$extremities', skin='$skin', head='$head', vision='$vision', Eyes='$Eyes', ears='$ears', nose='$nose', mouthThroat='$mouthThroat', yearsMonths='$yearsMonths', neck='$neck', Breast='$Breast', Respiratory='$Respiratory', Cardiovascular='$Cardiovascular', Gastrointestinal='$Gastrointestinal', peripheralvascular='$peripheralvascular', freq_urinary='$freq_urinary', Urinary='$Urinary', male='$male', age_menarche='$age_menarche', female='$female', muscularSkeletal='$muscularSkeletal', Psychiatric='$Psychiatric', Neurologic='$Neurologic', NeurologicExam='$NeurologicExam', picture='$file' WHERE user_Id='$teacher_Id' ");

		              	  if($update) {
				          	$_SESSION['message'] = "Teacher record has been updated!";
				            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
							header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
				          } else {
				            $_SESSION['message'] = "Something went wrong while saving the information.".var_dump($update);
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
				          }
			       			
				        } else {
				        	$_SESSION['message'] = "There was an error uploading your profile picture.";
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: teacher_update.php?teacher_Id=".$teacher_Id);
				        }
				    }
				}
			}
		}

	}









	// CHANGE STUDENT PASSWORD - STUDENT_DELETE.PHP
	if(isset($_POST['password_user'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM student WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password did not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: student.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE student SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
        			$_SESSION['message'] = "Password has been changed.";
	           	    $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: student.php");
                } else {
          			$_SESSION['message'] = "Something went wrong while changing the password.";
            		$_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: student.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: student.php");
    	}
    }





	// UPDATE ADMIN INFO - PROFILE.PHP
	if(isset($_POST['update_profile_info'])) {

		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
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

		$get_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_Id != '$user_Id' ");
		if(mysqli_num_rows($get_email) > 0) {
		   $_SESSION['message'] = "Email already exists!";
	       $_SESSION['text'] = "Please try again.";
	       $_SESSION['status'] = "error";
		   header("Location: profile.php");
		} else { 
			$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', email='$email', contact='$contact', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region' WHERE user_Id='$user_Id' ");

          	  if($update) {
	          	$_SESSION['message'] = "Record has been updated!";
	            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: profile.php");
	          } else {
	            $_SESSION['message'] = "Something went wrong while updating the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	          }
		}
	}



	// CHANGE ADMIN PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
                } else {
                    $_SESSION['message'] = "Something went wrong while changing the password.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
    	}

    }




  	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check == false) {
		    $_SESSION['message']  = "Selected file is not an image.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    } 

		// Check file size // 500KB max size
		elseif ($_FILES["fileToUpload"]["size"] > 500000) {
		  	$_SESSION['message']  = "File must be up to 500KB in size.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
		}

	    // Allow certain file formats
	    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    elseif ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	        }

		}
	}




	
	// UPDATE ACTIVITIY - ACTIVITY_UPDATE_DELETE.PHP
	if(isset($_POST['update_activity'])) {
		$actId 			= $_POST['actId'];
		$activity       = $_POST['activity'];
		$date_acquired  = date('Y-m-d');
		$update = mysqli_query($conn, "UPDATE announcement SET actName='$activity' WHERE actId='$actId'");

		  if($update) {
		  	$_SESSION['message'] = "Announcement has been updated.";
		    $_SESSION['text'] = "Updated successfully!";
		    $_SESSION['status'] = "success";
			header("Location: announcement.php");
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: announcement.php");
		  }
	}





	// DENY APPOINTMENT - APPOINTMENT_UPDATE_DELETE.PHP
	if(isset($_POST['deny_appointment'])) {
		$appt_Id = $_POST['appt_Id'];
		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE appointment.appt_Id='$appt_Id' ");
		$row        = mysqli_fetch_array($patient);
		$patient_Id = $row['appt_patient_Id'];
		$name       = $row['name'];
		$email      = $row['email'];

		$gender = "";
		if($row['sex'] == 'Male') { $gender = 'Sir'; } else { $gender = 'Maam'; }


		$delete = mysqli_query($conn, "UPDATE appointment SET appt_status=2 WHERE appt_Id='$appt_Id'");
		 if($delete) {

		 	
			  $subject = 'Appointment denied';
		      $message = '<p>Good day '.$gender.' '.$name.', your appointment has been denied.</p>
		      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

		      $mail = new PHPMailer(true);                            
		      try {
		        //Server settings
		        $mail->isSMTP();                                     
		        $mail->Host = 'smtp.gmail.com';                      
		        $mail->SMTPAuth = true;                             
		        $mail->Username = 'tatakmedellin@gmail.com';     
		        $mail->Password = 'nzctaagwhqlcgbqq';              
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
		        $mail->setFrom('tatakmedellin@gmail.com');

		        //Recipients
		        $mail->addAddress($email);              
		        $mail->addReplyTo('tatakmedellin@gmail.com');

		        //Content
		        $mail->isHTML(true);                                  
		        $mail->Subject = $subject;
		        $mail->Body    = $message;

		        $mail->send();

		        	// SAVE NOTIFICATION
		        	$message2 = 'Good day '.$gender.' '.$name.', your appointment has been denied.';
		        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Appointment', '$subject', '$message2', '$patient_Id') ");
		        	if($notif) {
		        		$_SESSION['message'] = "Appointment has been denied!";
				        $_SESSION['text'] = "Denied";
				        $_SESSION['status'] = "success";
						header("Location: appointment.php");
		        	} else {
		        		$_SESSION['message'] = "Denied successfully but insertion to notif error.";
				        $_SESSION['text'] = "Denied";
				        $_SESSION['status'] = "success";
						header("Location: appointment.php");
		        	}

		        	

			  } catch (Exception $e) { 
			  	$_SESSION['message'] = "Email not sent.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: appointment.php");
			  } 

	      	
	      } else {
	        $_SESSION['message'] = "Something went wrong while rejecting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: appointment.php");
	      }
	}




	// SETTLE APPOINTMENT - APPOINTMENT_UPDATE_DELETE.PHP
	if(isset($_POST['settle_appointment'])) {
		$appt_Id = $_POST['appt_Id'];

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE appointment.appt_Id='$appt_Id' ");
		$row        = mysqli_fetch_array($patient);
		$patient_Id = $row['appt_patient_Id'];
		$name       = $row['name'];
		$email      = $row['email'];

		$gender = "";
		if($row['sex'] == 'Male') { $gender = 'Sir'; } else { $gender = 'Maam'; }


		$delete = mysqli_query($conn, "UPDATE appointment SET appt_status=3 WHERE appt_Id='$appt_Id'");
		 if($delete) {

	      	  $subject = 'Appointment settled';
		      $message = '<p>Good day '.$gender.' '.$name.', your appointment has been settled.</p>
		      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

		      $mail = new PHPMailer(true);                            
		      try {
		        //Server settings
		        $mail->isSMTP();                                     
		        $mail->Host = 'smtp.gmail.com';                      
		        $mail->SMTPAuth = true;                             
		        $mail->Username = 'tatakmedellin@gmail.com';     
		        $mail->Password = 'nzctaagwhqlcgbqq';              
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
		        $mail->setFrom('tatakmedellin@gmail.com');

		        //Recipients
		        $mail->addAddress($email);              
		        $mail->addReplyTo('tatakmedellin@gmail.com');

		        //Content
		        $mail->isHTML(true);                                  
		        $mail->Subject = $subject;
		        $mail->Body    = $message;

		        $mail->send();

		        	// SAVE NOTIFICATION
		        	$message2 = 'Good day '.$gender.' '.$name.', your appointment has been settled.';
		        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Appointment', '$subject', '$message2', '$patient_Id') ");
		        	if($notif) {
		        		$_SESSION['message'] = "Appointment has been settled!";
				        $_SESSION['text'] = "Settled";
				        $_SESSION['status'] = "success";
						header("Location: appointment.php");
		        	} else {
		        		$_SESSION['message'] = "Settled successfully but insertion to notif error.";
				        $_SESSION['text'] = "Denied";
				        $_SESSION['status'] = "success";
						header("Location: appointment.php");
		        	}

		        	

			  } catch (Exception $e) { 
			  	$_SESSION['message'] = "Email not sent.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: appointment.php");
			  } 

	      } else {
	        $_SESSION['message'] = "Something went wrong while rejecting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: appointment.php");
	      }
	}





	// APPROVE APPOINTMENT - APPOINTMENT_UPDATE_DELETE.PHP
	if(isset($_POST['approve_appointment'])) {
		$appt_Id   = $_POST['appt_Id'];

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE appointment.appt_Id='$appt_Id' ");
		$row        = mysqli_fetch_array($patient);
		$patient_Id = $row['appt_patient_Id'];
		$name       = $row['name'];
		$email      = $row['email'];
		$appt_date  = $row['appt_date'];
		$appt_time  = $row['appt_time'];

		$gender = "";
		if($row['sex'] == 'Male') {
		 	$gender = 'Sir'; 
		} else { 
			$gender = 'Maam'; 
		}

		
		    
		
			$delete = mysqli_query($conn, "UPDATE appointment SET appt_status=1 WHERE appt_Id='$appt_Id'");
			 if($delete) {

			 	  $subject = 'Appointment approved';
			      $message = '<p>Good day '.$gender.' '.$name.', your appointment has been approved. Your schedule will be on '.$appt_date.' at exactly '.$appt_time.'.</p>
			      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

			      $mail = new PHPMailer(true);                            
			      try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'tatakmedellin@gmail.com';     
			        $mail->Password = 'nzctaagwhqlcgbqq';              
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
			        $mail->setFrom('tatakmedellin@gmail.com');

			        //Recipients
			        $mail->addAddress($email);              
			        $mail->addReplyTo('tatakmedellin@gmail.com');

			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();

			        	// SAVE NOTIFICATION
			        	$message2 = 'Good day '.$gender.' '.$name.', your appointment has been approved. Your schedule will be on '.$appt_date.' at exactly '.$appt_time.'.';
			        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Appointment', '$subject', '$message2', '$patient_Id') ");
			        	if($notif) {
			        		$_SESSION['message'] = "Appointment has been approved!";
					        $_SESSION['text'] = "Approved";
					        $_SESSION['status'] = "success";
							header("Location: appointment.php");
			        	} else {
			        		$_SESSION['message'] = "Approved successfully but insertion to notif error.";
					        $_SESSION['text'] = "Denied";
					        $_SESSION['status'] = "success";
							header("Location: appointment.php");
			        	}

			        	

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: appointment.php");
				  } 
		      	
		      } else {
		        $_SESSION['message'] = "Something went wrong while approving the record";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: appointment.php");
		      }
	}





	// RESCHEDULE APPOINTMENT - APPOINTMENT_UPDATE_DELETE.PHP
	if(isset($_POST['reschedule_appointment'])) {
		$appt_Id   = $_POST['appt_Id'];

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM appointment JOIN patient ON appointment.appt_patient_Id=patient.user_Id WHERE appointment.appt_Id='$appt_Id' ");
		$row        = mysqli_fetch_array($patient);
		$patient_Id = $row['appt_patient_Id'];
		$name       = $row['name'];
		$email      = $row['email'];
		$appt_date  = $row['appt_date'];
		$appt_time  = $row['appt_time'];

		$gender = "";
		if($row['sex'] == 'Male') { $gender = 'Sir'; } else { $gender = 'Maam'; }
		
			$delete = mysqli_query($conn, "UPDATE appointment SET is_rescheduled=1 WHERE appt_Id='$appt_Id'");
			 if($delete) {

			 	  $subject = 'Rescheduled appointment';
			      $message = '<p>Good day '.$gender.' '.$name.', your appointment has been rescheduled. Please confirm this message by clicking accept or denied appointment button in your appointment page after you login.</p>
			      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

			      $mail = new PHPMailer(true);                            
			      try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'tatakmedellin@gmail.com';     
			        $mail->Password = 'nzctaagwhqlcgbqq';              
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
			        $mail->setFrom('tatakmedellin@gmail.com');

			        //Recipients
			        $mail->addAddress($email);              
			        $mail->addReplyTo('tatakmedellin@gmail.com');

			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();

			        	// SAVE NOTIFICATION
			        	$message2 = 'Good day '.$gender.' '.$name.', your appointment has been rescheduled. Please confirm this message by clicking accept or denied appointment button in your appointment page after you login.';
			        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Appointment', '$subject', '$message2', '$patient_Id') ");
			        	if($notif) {
			        		$_SESSION['message'] = "Reschedule suggestion has been sent to patient!";
					        $_SESSION['text'] = "Rescheduled";
					        $_SESSION['status'] = "success";
							header("Location: appointment.php");
			        	} else {
			        		$_SESSION['message'] = "Rescheduled successfully but insertion to notif error.";
					        $_SESSION['text'] = "Denied";
					        $_SESSION['status'] = "success";
							header("Location: appointment.php");
			        	}

			        	

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: appointment.php");
				  } 
		      	
		      } else {
		        $_SESSION['message'] = "Something went wrong while rescheduling the record";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: appointment.php");
		      }
	}




	// UPDATE DENTAL PATIENT - DENTAL_MGMT.PHP
	if(isset($_POST['update_dental'])) {
		$dental_Id      = mysqli_real_escape_string($conn, $_POST['dental_Id']);
		$patient_Id      = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$dental_history  = mysqli_real_escape_string($conn, $_POST['dental_history']);
		$teeth_no        = mysqli_real_escape_string($conn, $_POST['teeth_no']);
		$vs_bp           = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr              = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr              = mysqli_real_escape_string($conn, $_POST['rr']);
		// $medicine_given  = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$dental_advised  = mysqli_real_escape_string($conn, $_POST['dental_advised']);

		if(empty($vs_bp)) { $vs_bp = 'None'; }
		if(empty($pr))    { $pr    = 'None'; }
		if(empty($rr))    { $rr    = 'None'; }

		$medicine_given = $_POST['medicine_given'];
	    $stock_used = $_POST['stock_used'];
	    $medicines = array();

	    foreach ($medicine_given as $med_Id) {
	        if (isset($stock_used[$med_Id]) && $stock_used[$med_Id] > 0) {
	            $stock_used_value = (int)$stock_used[$med_Id];

	            $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = $med_Id");

	            // Check if the query was successful
	            if ($sql) {
	                $row = mysqli_fetch_assoc($sql);
	                $medicines[] = $row['med_name'];

	                // Extract the numeric part of med_stock_in
            		$numericPart = (int)$row['med_stock_in'];

            		$updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = CONCAT(CAST($numericPart - $stock_used_value AS CHAR), ' ', SUBSTRING_INDEX('$row[med_stock_in]', ' ', -1)), med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
            		$insert_date = date("Y-m-d h:i:s");
		            $save_ask_med = mysqli_query($conn, "INSERT INTO dental_transaction_log (patient_Id, stock_used_value, med_Id, dental_Id, date_added) VALUES ('$patient_Id', '$stock_used_value', '$med_Id', '$dental_Id', '$insert_date')");


	                // Deduct stock in product table
	                // $updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = med_stock_in - '$stock_used_value', med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
	                // $insert_date = date("Y-m-d h:i:s");
                    // $save_ask_med = mysqli_query($conn, "INSERT INTO asking_med_transaction_log (patient_Id, stock_used_value, med_Id, date_added) VALUEs ('$patient_Id', '$stock_used_value', '$med_Id', '$insert_date')");

	                // Log the transaction in the transaction_log table if stock_used is greater than 0
	                if (!$updateQuery || $stock_used_value <= 0) {

	                    // Handle error if needed
	                    $_SESSION['message'] = "Error deducting stock.";
	                    $_SESSION['text'] = "Please try again.";
	                    $_SESSION['status'] = "error";
	                    header("Location: dental_mgmt.php?page=".$dental_Id);
	                    exit;
	                }
	            }
	        }
	    }

	    // Construct imploded medicine names outside the loop
	    $implodedMedNames = implode(', ', $medicines);

	    // Get the existing medicine names from the database
	    $getExistingMedNamesQuery = mysqli_query($conn, "SELECT medicine_given FROM dental WHERE dental_Id='$dental_Id'");
	    $existingMedNamesRow = mysqli_fetch_assoc($getExistingMedNamesQuery);
	    $existingMedNames = $existingMedNamesRow['medicine_given'];

	    // Concatenate the existing and new medicine names
	    $updatedMedNames = $existingMedNames ? "$existingMedNames, $implodedMedNames" : $implodedMedNames;
	    
		$save = mysqli_query($conn, "UPDATE dental SET patient_Id='$patient_Id', dental_history='$dental_history', teeth_no='$teeth_no', vs_bp='$vs_bp', pr='$pr', rr='$rr', medicine_given='$updatedMedNames', dental_advised='$dental_advised' WHERE dental_Id ='$dental_Id' ");

		  if($save) {
		  	$_SESSION['message'] = "Record has been updated.";
		    $_SESSION['text'] = "Updated successfully!";
		    $_SESSION['status'] = "success";
			header("Location: dental_mgmt.php?page=".$dental_Id);
		  } else {
		    $_SESSION['message'] = "Something went wrong while updating the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: dental_mgmt.php?page=".$dental_Id);
		  }
	}



	// UPDATE FORM2 PATIENT - FORM2_MGMT.PHP
	if(isset($_POST['update_form2'])) {
		$form2_Id          = mysqli_real_escape_string($conn, $_POST['form2_Id']);
		$patient_Id        = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$vs_bp             = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr                = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr                = mysqli_real_escape_string($conn, $_POST['rr']);
		$temperature       = mysqli_real_escape_string($conn, $_POST['temperature']);
		$vital_sign        = mysqli_real_escape_string($conn, $_POST['vital_sign']);
		$diagnosis         = mysqli_real_escape_string($conn, $_POST['diagnosis']);
		// $medical_advised   = mysqli_real_escape_string($conn, $_POST['medical_advised']);
		 
		$medicine_given = $_POST['medicine_given'];
	    $stock_used = $_POST['stock_used'];
	    $medicines = array();

	    foreach ($medicine_given as $med_Id) {
	        if (isset($stock_used[$med_Id]) && $stock_used[$med_Id] > 0) {
	            $stock_used_value = (int)$stock_used[$med_Id];

	            $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = $med_Id");

	            // Check if the query was successful
	            if ($sql) {
	                $row = mysqli_fetch_assoc($sql);
	                $medicines[] = $row['med_name'];

	                // Extract the numeric part of med_stock_in
            		$numericPart = (int)$row['med_stock_in'];

            		$updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = CONCAT(CAST($numericPart - $stock_used_value AS CHAR), ' ', SUBSTRING_INDEX('$row[med_stock_in]', ' ', -1)), med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
            		$insert_date = date("Y-m-d h:i:s");
		            $save_ask_med = mysqli_query($conn, "INSERT INTO form2_transaction_log (patient_Id, stock_used_value, med_Id, form2_Id, date_added) VALUES ('$patient_Id', '$stock_used_value', '$med_Id', '$form2_Id', '$insert_date')");


	                // Deduct stock in product table
	                // $updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = med_stock_in - '$stock_used_value', med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
	                // $insert_date = date("Y-m-d h:i:s");
                    // $save_ask_med = mysqli_query($conn, "INSERT INTO asking_med_transaction_log (patient_Id, stock_used_value, med_Id, date_added) VALUEs ('$patient_Id', '$stock_used_value', '$med_Id', '$insert_date')");

	                // Log the transaction in the transaction_log table if stock_used is greater than 0
	                if (!$updateQuery || $stock_used_value <= 0) {

	                    // Handle error if needed
	                    $_SESSION['message'] = "Error deducting stock.";
	                    $_SESSION['text'] = "Please try again.";
	                    $_SESSION['status'] = "error";
	                    header("Location: form2_mgmt.php?page=".$dental_Id);
	                    exit;
	                }
	            }
	        }
	    }

	    // Construct imploded medicine names outside the loop
	    $implodedMedNames = implode(', ', $medicines);

	    // Get the existing medicine names from the database
	    $getExistingMedNamesQuery = mysqli_query($conn, "SELECT medical_advised FROM form2 WHERE form2_Id='$form2_Id'");
	    $existingMedNamesRow = mysqli_fetch_assoc($getExistingMedNamesQuery);
	    $existingMedNames = $existingMedNamesRow['medical_advised'];

	    // Concatenate the existing and new medicine names
	    $updatedMedNames = $existingMedNames ? "$existingMedNames, $implodedMedNames" : $implodedMedNames;

		$save = mysqli_query($conn, "UPDATE form2 SET patient_Id='$patient_Id', vs_bp='$vs_bp', pr='$pr', rr='$rr', temperature='$temperature', vital_sign='$vital_sign', diagnosis='$diagnosis', medical_advised='$updatedMedNames' WHERE form2_Id='$form2_Id' ");

		  if($save) {
		  	$_SESSION['message'] = "Record has been updated.";
		    $_SESSION['text'] = "Updated successfully!";
		    $_SESSION['status'] = "success";
			header("Location: form2_mgmt.php?page=".$form2_Id);
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: form2_mgmt.php?page=".$form2_Id);
		  }
	}



	// UPDATE ASKING MEDICINE - ASKING_MED_MGMT.PHP
	if(isset($_POST['update_asking_med'])) {
		$asking_med_Id     = mysqli_real_escape_string($conn, $_POST['asking_med_Id']);
		$patient_Id        = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$pr                = mysqli_real_escape_string($conn, $_POST['pr']);
		$temperature       = mysqli_real_escape_string($conn, $_POST['temperature']);
		$vital_sign        = mysqli_real_escape_string($conn, $_POST['vital_sign']);
		$medical_advised   = mysqli_real_escape_string($conn, $_POST['medical_advised']);
		$chief_complaints  = mysqli_real_escape_string($conn, $_POST['chief_complaints']);

		$medicine_given = $_POST['medicine_given'];
	    $stock_used = $_POST['stock_used'];
	    $medicines = array();

	    foreach ($medicine_given as $med_Id) {
	        if (isset($stock_used[$med_Id]) && $stock_used[$med_Id] > 0) {
	            $stock_used_value = (int)$stock_used[$med_Id];

	            $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = $med_Id");

	            // Check if the query was successful
	            if ($sql) {
	                $row = mysqli_fetch_assoc($sql);
	                $medicines[] = $row['med_name'];

	                // Extract the numeric part of med_stock_in
            		$numericPart = (int)$row['med_stock_in'];

            		$updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = CONCAT(CAST($numericPart - $stock_used_value AS CHAR), ' ', SUBSTRING_INDEX('$row[med_stock_in]', ' ', -1)), med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
            		$insert_date = date("Y-m-d h:i:s");
		            $save_ask_med = mysqli_query($conn, "INSERT INTO asking_med_transaction_log (patient_Id, stock_used_value, med_Id, asking_med_Id, date_added) VALUES ('$patient_Id', '$stock_used_value', '$med_Id', '$asking_med_Id', '$insert_date')");


	                // Deduct stock in product table
	                // $updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = med_stock_in - '$stock_used_value', med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
	                // $insert_date = date("Y-m-d h:i:s");
                    // $save_ask_med = mysqli_query($conn, "INSERT INTO asking_med_transaction_log (patient_Id, stock_used_value, med_Id, date_added) VALUEs ('$patient_Id', '$stock_used_value', '$med_Id', '$insert_date')");

	                // Log the transaction in the transaction_log table if stock_used is greater than 0
	                if (!$updateQuery || $stock_used_value <= 0) {

	                    // Handle error if needed
	                    $_SESSION['message'] = "Error deducting stock.";
	                    $_SESSION['text'] = "Please try again.";
	                    $_SESSION['status'] = "error";
	                    header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
	                    exit;
	                }
	            }
	        }
	    }

	    // Construct imploded medicine names outside the loop
	    $implodedMedNames = implode(', ', $medicines);

	    // Get the existing medicine names from the database
	    $getExistingMedNamesQuery = mysqli_query($conn, "SELECT medicine_given FROM asking_med WHERE asking_med_Id='$asking_med_Id'");
	    $existingMedNamesRow = mysqli_fetch_assoc($getExistingMedNamesQuery);
	    $existingMedNames = $existingMedNamesRow['medicine_given'];

	    // Concatenate the existing and new medicine names
	    $updatedMedNames = $existingMedNames ? "$existingMedNames, $implodedMedNames" : $implodedMedNames;
	    $save = mysqli_query($conn, "UPDATE asking_med SET patient_Id='$patient_Id', pr='$pr', temperature='$temperature', vital_sign='$vital_sign', medical_advised='$medical_advised', medicine_given='$updatedMedNames', chief_complaints='$chief_complaints' WHERE asking_med_Id='$asking_med_Id'");

	      // $save = mysqli_query($conn, "UPDATE asking_med SET patient_Id='$patient_Id', pr='$pr', temperature='$temperature', vital_sign='$vital_sign', medical_advised='$medical_advised', medicine_given='$implodedMedNames', chief_complaints='$chief_complaints' WHERE asking_med_Id='$asking_med_Id' ");

		  if($save) {
		  	$_SESSION['message'] = "Record has been updated.";
		    $_SESSION['text'] = "Updated successfully!";
		    $_SESSION['status'] = "success";
			header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		  }

		// $fetch = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id='$medicine_given'");
		// $row = mysqli_fetch_array($fetch);
		// $med_name = $row['med_name'];

		// // GET MEDICINE GIVEN
		// $fetch2 = mysqli_query($conn, "SELECT * FROM asking_med WHERE asking_med_Id='$asking_med_Id'");
		// $row2 = mysqli_fetch_array($fetch2);
		// $row2_medicine_given = $row2['medicine_given'];

		// if($row2_medicine_given == $med_name) {
		// 	$save = mysqli_query($conn, "UPDATE asking_med SET patient_Id='$patient_Id', pr='$pr', temperature='$temperature', vital_sign='$vital_sign', medical_advised='$medical_advised', medicine_given='$med_name', chief_complaints='$chief_complaints' WHERE asking_med_Id='$asking_med_Id' ");

		// 	  if($save) {
		// 	  	$_SESSION['message'] = "Record has been updated.";
		// 	    $_SESSION['text'] = "Updated successfully!";
		// 	    $_SESSION['status'] = "success";
		// 		header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		// 	  } else {
		// 	    $_SESSION['message'] = "Something went wrong while saving the information.";
		// 	    $_SESSION['text'] = "Please try again.";
		// 	    $_SESSION['status'] = "error";
		// 		header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		// 	  }
		// } else {
		// 	$save = mysqli_query($conn, "UPDATE asking_med SET patient_Id='$patient_Id', pr='$pr', temperature='$temperature', vital_sign='$vital_sign', medical_advised='$medical_advised', medicine_given='$med_name', chief_complaints='$chief_complaints' WHERE asking_med_Id='$asking_med_Id' ");

		// 	  if($save) {
		// 	  	$update = mysqli_query($conn, "UPDATE medicine SET med_stock_in=med_stock_in+1 WHERE med_name='$row2_medicine_given'");
		// 	  	if($update) {
		// 	  		$update2 = mysqli_query($conn, "UPDATE medicine SET med_stock_in=med_stock_in-1 WHERE med_Id='$medicine_given'");
		// 	  		if($update2) {
		// 	  			$_SESSION['message'] = "Record has been updated.";
		// 			    $_SESSION['text'] = "Updated successfully!";
		// 			    $_SESSION['status'] = "success";
		// 				header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		// 	  		} else {
		// 	  			$_SESSION['message'] = "Cannot update stock.";
		// 			    $_SESSION['text'] = "Please try again.";
		// 			    $_SESSION['status'] = "error";
		// 				header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		// 	  		}
		// 	  	} else {
		// 	  		$_SESSION['message'] = "Cannot update stock.";
		// 		    $_SESSION['text'] = "Please try again.";
		// 		    $_SESSION['status'] = "error";
		// 			header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		// 	  	}
			  	
		// 	  } else {
		// 	    $_SESSION['message'] = "Something went wrong while saving the information.";
		// 	    $_SESSION['text'] = "Please try again.";
		// 	    $_SESSION['status'] = "error";
		// 		header("Location: asking_med_mgmt.php?page=".$asking_med_Id);
		// 	  }

		// }

		
	}

	


	// UPDATE PHYSICAL EXAM CONSULTATION - PHYSICAL_MGMT.PHP
	if(isset($_POST['update_physical_exam'])) {
		$physical_Id    = mysqli_real_escape_string($conn, $_POST['physical_Id']);
		$patient_Id     = mysqli_real_escape_string($conn, $_POST['patient_Id']);

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
		// $plan_medication          = mysqli_real_escape_string($conn, $_POST['plan_medication']); 
		
		$medicine_given = $_POST['medicine_given'];
	    $stock_used = $_POST['stock_used'];
	    $medicines = array();

	    foreach ($medicine_given as $med_Id) {
	        if (isset($stock_used[$med_Id]) && $stock_used[$med_Id] > 0) {
	            $stock_used_value = (int)$stock_used[$med_Id];

	            $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = $med_Id");

	            // Check if the query was successful
	            if ($sql) {
	                $row = mysqli_fetch_assoc($sql);
	                $medicines[] = $row['med_name'];

	                // Extract the numeric part of med_stock_in
            		$numericPart = (int)$row['med_stock_in'];

            		$updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = CONCAT(CAST($numericPart - $stock_used_value AS CHAR), ' ', SUBSTRING_INDEX('$row[med_stock_in]', ' ', -1)), med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
            		$insert_date = date("Y-m-d h:i:s");
		            $save_ask_med = mysqli_query($conn, "INSERT INTO physical_transaction_log (patient_Id, stock_used_value, med_Id, physical_Id, date_added) VALUES ('$patient_Id', '$stock_used_value', '$med_Id', '$physical_Id', '$insert_date')");


	                // Deduct stock in product table
	                // $updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = med_stock_in - '$stock_used_value', med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
	                // $insert_date = date("Y-m-d h:i:s");
                    // $save_ask_med = mysqli_query($conn, "INSERT INTO asking_med_transaction_log (patient_Id, stock_used_value, med_Id, date_added) VALUEs ('$patient_Id', '$stock_used_value', '$med_Id', '$insert_date')");

	                // Log the transaction in the transaction_log table if stock_used is greater than 0
	                if (!$updateQuery || $stock_used_value <= 0) {

	                    // Handle error if needed
	                    $_SESSION['message'] = "Error deducting stock.";
	                    $_SESSION['text'] = "Please try again.";
	                    $_SESSION['status'] = "error";
	                     header("Location: physical_mgmt.php?page=".$physical_Id);
	                    exit;
	                }
	            }
	        }
	    }

	    // Construct imploded medicine names outside the loop
	    $implodedMedNames = implode(', ', $medicines);

	    // Get the existing medicine names from the database
	    $getExistingMedNamesQuery = mysqli_query($conn, "SELECT plan_medication FROM physical WHERE physical_Id='$physical_Id'");
	    $existingMedNamesRow = mysqli_fetch_assoc($getExistingMedNamesQuery);
	    $existingMedNames = $existingMedNamesRow['plan_medication'];

	    // Concatenate the existing and new medicine names
	    $updatedMedNames = $existingMedNames ? "$existingMedNames, $implodedMedNames" : $implodedMedNames;    

		$update = mysqli_query($conn, "UPDATE physical SET patient_Id='$patient_Id', p_general='$p_general', p_skin='$p_skin', skinOther='$skinOther', p_heent='$p_heent', p_auditory='$p_auditory', p_nose='$p_nose', p_mouth_throat='$p_mouth_throat', p_neck='$p_neck', p_breast='$p_breast', p_cardiovascular='$p_cardiovascular', p_abdomen='$p_abdomen', p_genitals='$p_genitals', clinical_impression='$clinical_impression', potential_risk='$potential_risk', plan_medication='$updatedMedNames' WHERE physical_Id='$physical_Id'");

  	  if($update) {
	  	$_SESSION['message'] = "Record has been updated.";
	    $_SESSION['text'] = "Updated successfully!";
	    $_SESSION['status'] = "success";
		header("Location: physical_mgmt.php?page=".$physical_Id);
	  } else {
	    $_SESSION['message'] = "Something went wrong while saving the information.";
	    $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
	    header("Location: physical_mgmt.php?page=".$physical_Id);
	  }
	}





	// UPDATE CONSULTATION PATIENT - CONSULTATION_MGMT.PHP
	if(isset($_POST['update_consultation'])) {

		$consult_Id          = mysqli_real_escape_string($conn, $_POST['consult_Id']);
		$patient_Id          = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$mothers_maiden_name = mysqli_real_escape_string($conn, $_POST['mothers_maiden_name']);
		$chief_complaints    = mysqli_real_escape_string($conn, $_POST['chief_complaints']);
		$temperature         = mysqli_real_escape_string($conn, $_POST['temperature']);
		$vs_bp               = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr                  = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr                  = mysqli_real_escape_string($conn, $_POST['rr']);
		$o2zat               = mysqli_real_escape_string($conn, $_POST['o2zat']);
		$doctors_advice      = mysqli_real_escape_string($conn, $_POST['doctors_advice']);
		// $medicine_given      = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$medical_personnel   = mysqli_real_escape_string($conn, $_POST['medical_personnel']);

		if(empty($vs_bp))    { $vs_bp = 'None'; }
		if(empty($pr))       { $pr    = 'None'; }
		if(empty($rr))       { $rr    = 'None'; }
		if(empty($o2zat))    { $o2zat = 'None'; }


		$medicine_given = $_POST['medicine_given'];
	    $stock_used = $_POST['stock_used'];
	    $medicines = array();

	    foreach ($medicine_given as $med_Id) {
	        if (isset($stock_used[$med_Id]) && $stock_used[$med_Id] > 0) {
	            $stock_used_value = (int)$stock_used[$med_Id];

	            $sql = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = $med_Id");

	            // Check if the query was successful
	            if ($sql) {
	                $row = mysqli_fetch_assoc($sql);
	                $medicines[] = $row['med_name'];

	                // Extract the numeric part of med_stock_in
            		$numericPart = (int)$row['med_stock_in'];

            		$updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = CONCAT(CAST($numericPart - $stock_used_value AS CHAR), ' ', SUBSTRING_INDEX('$row[med_stock_in]', ' ', -1)), med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
            		$insert_date = date("Y-m-d h:i:s");
		            $save_ask_med = mysqli_query($conn, "INSERT INTO consultation_transaction_log (patient_Id, stock_used_value, med_Id, consult_Id, date_added) VALUES ('$patient_Id', '$stock_used_value', '$med_Id', '$consult_Id', '$insert_date')");


	                // Deduct stock in product table
	                // $updateQuery = mysqli_query($conn, "UPDATE medicine SET med_stock_in = med_stock_in - '$stock_used_value', med_stock_out=med_stock_out + '$stock_used_value' WHERE med_Id = $med_Id");
	                // $insert_date = date("Y-m-d h:i:s");
                    // $save_ask_med = mysqli_query($conn, "INSERT INTO asking_med_transaction_log (patient_Id, stock_used_value, med_Id, date_added) VALUEs ('$patient_Id', '$stock_used_value', '$med_Id', '$insert_date')");

	                // Log the transaction in the transaction_log table if stock_used is greater than 0
	                if (!$updateQuery || $stock_used_value <= 0) {

	                    // Handle error if needed
	                    $_SESSION['message'] = "Error deducting stock.";
	                    $_SESSION['text'] = "Please try again.";
	                    $_SESSION['status'] = "error";
	                    header("Location: consultation_mgmt.php?page=".$consult_Id);
	                    exit;
	                }
	            }
	        }
	    }

	    // Construct imploded medicine names outside the loop
	    $implodedMedNames = implode(', ', $medicines);

	    // Get the existing medicine names from the database
	    $getExistingMedNamesQuery = mysqli_query($conn, "SELECT medicine_given FROM consultation WHERE consult_Id='$consult_Id'");
	    $existingMedNamesRow = mysqli_fetch_assoc($getExistingMedNamesQuery);
	    $existingMedNames = $existingMedNamesRow['medicine_given'];

	    // Concatenate the existing and new medicine names
	    $updatedMedNames = $existingMedNames ? "$existingMedNames, $implodedMedNames" : $implodedMedNames; 


		$save = mysqli_query($conn, "UPDATE consultation SET patient_Id='$patient_Id', mothers_maiden_name='$mothers_maiden_name', chief_complaints='$chief_complaints', temperature='$temperature', vs_bp='$vs_bp', pr='$pr', rr='$rr', o2zat='$o2zat', doctors_advice='$doctors_advice', medicine_given='$updatedMedNames', medical_personnel='$medical_personnel' WHERE consult_Id='$consult_Id'  ");

		  if($save) {
		  	$_SESSION['message'] = "Record has been updated.";
		    $_SESSION['text'] = "Updated successfully!";
		    $_SESSION['status'] = "success";
			header("Location: consultation_mgmt.php?page=".$consult_Id);
		  } else {
		    $_SESSION['message'] = "Something went wrong while updating the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: consultation_mgmt.php?page=".$consult_Id);
		  }
	}


	



	// UPDATE MEDICINE - MEDICINE_MGMT.PHP
	if(isset($_POST['update_medicine'])) {

		$med_Id           = mysqli_real_escape_string($conn, $_POST['med_Id']);
		$brand_name       = mysqli_real_escape_string($conn, $_POST['brand_name']);
		$other_brand_name = mysqli_real_escape_string($conn, $_POST['other_brand_name']);
		$med_name         = mysqli_real_escape_string($conn, $_POST['med_name']);
		$med_type        = mysqli_real_escape_string($conn, $_POST['med_type']);
		$milligrams       = mysqli_real_escape_string($conn, $_POST['milligrams']);
		$med_stock_in     = mysqli_real_escape_string($conn, $_POST['med_stock_in']);
		$expiration_date  = mysqli_real_escape_string($conn, $_POST['expiration_date']);

		if($expiration_date < $date_today) {
			$_SESSION['message'] = "Selected date must be onward/later.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medicine_mgmt.php?page=".$med_Id);
		} else {

			$check = mysqli_query($conn, "SELECT * FROM medicine WHERE med_name='$med_name' AND med_Id != '$med_Id' ");
			if(mysqli_num_rows($check) > 0) {
				$_SESSION['message'] = "Medicine name already exists.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
			    header("Location: medicine_mgmt.php?page=".$med_Id);
			} else {
				  $update = mysqli_query($conn, "UPDATE medicine SeT brand_name='$brand_name', other_brand_name='$other_brand_name', med_name='$med_name', med_type='$med_type', milligrams='$milligrams', med_stock_in='$med_stock_in', med_stock_in_orig='$med_stock_in', expiration_date='$expiration_date' WHERE med_Id='$med_Id' ");

				  if($update) {
				  	$_SESSION['message'] = "Record has been updated.";
				    $_SESSION['text'] = "Updated successfully!";
				    $_SESSION['status'] = "success";
					header("Location: medicine_mgmt.php?page=".$med_Id);
				  } else {
				    $_SESSION['message'] = "Something went wrong while updating the information.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
				    header("Location: medicine_mgmt.php?page=".$med_Id);
				  }
			}
		}
	}





	// UPDATE MEDICINE - MEDICINE_MGMT.PHP
	if(isset($_POST['medicine_used'])) {

		$med_Id           = mysqli_real_escape_string($conn, $_POST['med_Id']);
		$med_stock_out    = mysqli_real_escape_string($conn, $_POST['med_stock_out']);

		$check = mysqli_query($conn, "SELECT * FROM medicine WHERE med_Id = '$med_Id' ");
		if(mysqli_num_rows($check) > 0) {
			$row                   = mysqli_fetch_array($check);
			$current_med_stock_in  = $row['med_stock_in'];
			$current_med_stock_out = $row['med_stock_out'];

			// Extract numeric value from $current_med_stock_in
			preg_match('/\d+/', $current_med_stock_in, $numeric_stock_in);
			$current_med_stock_in_value = (int) $numeric_stock_in[0];
			$current_med_stock_in_text = preg_replace('/\d+/', '', $current_med_stock_in);
	
			// Extract numeric value from $current_med_stock_out
			preg_match('/\d+/', $current_med_stock_out, $numeric_stock_out);
			$current_med_stock_out_value = (int) $numeric_stock_out[0];
			$current_med_stock_out_text = preg_replace('/\d+/', '', $current_med_stock_out);

			if($current_med_stock_in_value < $med_stock_out) {
				$_SESSION['message'] = "Medicine used value must be lower than the current stock.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
			    header("Location: medicine.php");
			} else {
				$difference = $current_med_stock_in_value - $med_stock_out;
				$sum = $current_med_stock_out_value + $med_stock_out;

				// Concatenate text with the updated numeric value
				$updated_stock_in = $difference . $current_med_stock_in_text;
				$updated_stock_out = $sum . $current_med_stock_out_text;

				$updated_stock_out = $sum . $current_med_stock_out_text;
				$update = mysqli_query($conn, "UPDATE medicine SET med_stock_in='$updated_stock_in', med_stock_out='$sum' WHERE med_Id='$med_Id' ");

				  if($update) {
				  	$_SESSION['message'] = "Record has been updated.";
				    $_SESSION['text'] = "Updated successfully!";
				    $_SESSION['status'] = "success";
					header("Location: medicine.php");
				  } else {
				    $_SESSION['message'] = "Something went wrong while updating the information.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
				    header("Location: medicine.php");
				  }
			}
		} else {
			$_SESSION['message'] = "Medicine record does not exist.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: medicine.php");		  
		}
	}








	// DENY REQUEST - DENTAL_DELETE.PHP
	if(isset($_POST['deny_request'])) {

		$req_Id     = mysqli_real_escape_string($conn, $_POST['req_Id']);

		// GET PATIENT NAME
		$staff = mysqli_query($conn, "SELECT * FROM request_update JOIN users ON request_update.user_Id=users.user_Id WHERE request_update.req_Id='$req_Id' ");
		$row     = mysqli_fetch_array($staff);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];
		$email   = $row['email'];
		$type    = $row['req_type'];

		$gender = "";
		if($row['sex'] == 'Male') { $gender = 'Sir'; } else { $gender = 'Maam'; }


	    $update = mysqli_query($conn, "UPDATE request_update SET req_status=2 WHERE req_Id='$req_Id' ");

		  if($update) {

 				  $subject = 'Request update denied';
			      $message = '<p>Good day '.$gender.' '.$name.', a request to update '.$type.' records has been denied.</p>
			      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

			      $mail = new PHPMailer(true);                            
			      try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'tatakmedellin@gmail.com';     
			        $mail->Password = 'nzctaagwhqlcgbqq';              
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
			        $mail->setFrom('tatakmedellin@gmail.com');

			        //Recipients
			        $mail->addAddress($email);              
			        $mail->addReplyTo('tatakmedellin@gmail.com');

			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();

			        	// SAVE NOTIFICATION
			        	$message2 = 'Good day '.$gender.' '.$name.', a request to update '.$type.' records has been denied.';
			        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Request to edit', '$subject', '$message2', '$name') ");
			        	if($notif) {
			        		$_SESSION['message'] = "Request denied";
						    $_SESSION['text'] = "Denied";
						    $_SESSION['status'] = "success";
							header("Location: request_update.php");
			        	} else {
			        		$_SESSION['message'] = "Denied successfully but insertion to notif error.";
					        $_SESSION['text'] = "Denied";
					        $_SESSION['status'] = "success";
							header("Location: request_update.php");
			        	}

			        	

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: request_update.php");
				  }
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.".$req_Id;
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: request_update.php");
		  }
	}






	// APPROVE REQUEST - DENTAL_DELETE.PHP
	if(isset($_POST['approve_request'])) {

		$req_Id     = mysqli_real_escape_string($conn, $_POST['req_Id']);

		// GET PATIENT NAME
		$staff = mysqli_query($conn, "SELECT * FROM request_update JOIN users ON request_update.user_Id=users.user_Id WHERE request_update.req_Id='$req_Id' ");
		$row     = mysqli_fetch_array($staff);
		$sender_Id = $row['user_Id'];
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];
		$email   = $row['email'];
		$type    = $row['req_type'];

		$gender = "";
		if($row['sex'] == 'Male') { $gender = 'Sir'; } else { $gender = 'Maam'; }


	    $update = mysqli_query($conn, "UPDATE request_update SET req_status=1 WHERE req_Id='$req_Id' ");

		  if($update) {

 				  $subject = 'Request update approved';
			      $message = '<p>Good day '.$gender.' '.$name.', a request to update '.$type.' records has been approved.</p>
			      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

			      $mail = new PHPMailer(true);                            
			      try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'tatakmedellin@gmail.com';     
			        $mail->Password = 'nzctaagwhqlcgbqq';              
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
			        $mail->setFrom('tatakmedellin@gmail.com');

			        //Recipients
			        $mail->addAddress($email);              
			        $mail->addReplyTo('tatakmedellin@gmail.com');

			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();

			        	
						// SAVE NOTIFICATION
			        	$message2 = 'Good day '.$gender.' '.$name.', a request to update '.$type.' records has been approved.';
			        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('$type', '$subject', '$message2', '$sender_Id') ");
			        	if($notif) {
			        		$_SESSION['message'] = "Request approved";
						    $_SESSION['text'] = "Approved";
						    $_SESSION['status'] = "success";
							header("Location: request_update.php");
			        	} else {
			        		$_SESSION['message'] = "Approved successfully but insertion to notif error.";
					        $_SESSION['text'] = "Denied";
					        $_SESSION['status'] = "success";
							header("Location: request_update.php");
			        	}

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: request_update.php");
				  }
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.".$req_Id;
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: request_update.php");
		  }
	}





	// UPDATE MEDICAL CERTIFICATE REQUESTS - MEDICAL_CERTIFICATE_UPDATE_REQUESTS.PHP
	if(isset($_POST['update_request_medical_certificate_status'])) {
		$req_Id     = $_POST['req_Id'];
		$req_status = $_POST['req_status'];
		$type       = $_POST['type'];

		$stat = "";
		if($req_status == 0) { $stat = "Pending"; }
		elseif($req_status == 1) { $stat = "Processing"; }
		elseif($req_status == 2) { $stat = "Ready to pick-up"; }
		else{ $stat = "Released"; }


		// GET PATIENT NAME
		$staff = mysqli_query($conn, "SELECT * FROM request_doc JOIN patient ON request_doc.patient_Id=patient.user_Id WHERE request_doc.req_Id='$req_Id' ");
		$row     = mysqli_fetch_array($staff);
		$name    = $row['name'];
		$email   = $row['email'];
		$senderId = $row['patient_Id'];

		$gender = "";
		if($row['sex'] == 'Male') { $gender = 'Sir'; } else { $gender = 'Maam'; }


		$update = mysqli_query($conn, "UPDATE request_doc SET req_status='$req_status' WHERE req_Id='$req_Id'");
		 if($update) {	




			  $subject = 'Request status: '.$stat;
		      $message = '<p>Good day '.$gender.' '.$name.', your requested document, '.$type.' status has been set to '.$stat.'.</p>
		      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

		      $mail = new PHPMailer(true);                            
		      try {
		        //Server settings
		        $mail->isSMTP();                                     
		        $mail->Host = 'smtp.gmail.com';                      
		        $mail->SMTPAuth = true;                             
		        $mail->Username = 'tatakmedellin@gmail.com';     
		        $mail->Password = 'nzctaagwhqlcgbqq';              
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
		        $mail->setFrom('tatakmedellin@gmail.com');

		        //Recipients
		        $mail->addAddress($email);              
		        $mail->addReplyTo('tatakmedellin@gmail.com');

		        //Content
		        $mail->isHTML(true);                                  
		        $mail->Subject = $subject;
		        $mail->Body    = $message;

		        $mail->send();

		        	
					// SAVE NOTIFICATION
		        	$message2 = 'Good day '.$gender.' '.$name.', your requested document, '.$type.' status has been set to '.$stat.'.';
		        	$notif = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('$type', '$subject', '$message2', '$senderId') ");
		        	if($notif) {
		        		$_SESSION['message'] = "Record has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
				        $_SESSION['status'] = "success";
						if($type == 'Medical certificate') {
					 		header("Location: medical_certificate.php");
					 	} else {
					 		header("Location: medical_records.php");
					 	}
		        	} else {
		        		$_SESSION['message'] = "Approved successfully but insertion to notif error.";
				        $_SESSION['text'] = "Denied";
				        $_SESSION['status'] = "success";
						if($type == 'Medical certificate') {
					 		header("Location: medical_certificate.php");
					 	} else {
					 		header("Location: medical_records.php");
					 	}
		        	}

			  } catch (Exception $e) { 
			  	$_SESSION['message'] = "Email not sent.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				if($type == 'Medical certificate') {
			 		header("Location: medical_certificate.php");
			 	} else {
			 		header("Location: medical_records.php");
			 	}
			  }
		  	




	      	
	      } else {
	        $_SESSION['message'] = "Something went wrong while updating the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			if($type == 'Medical certificate') {
		 		header("Location: medical_certificate.php");
		 	} else {
		 		header("Location: medical_records.php");
		 	}
	      }
	}

	

	if(isset($_GET['seen'])) {
	    $date_today = date('Y-m-d');
		$type = $_GET['seen'];
		if($type == 'appointment') {
			$query = mysqli_query($conn, "UPDATE appointment SET seen_by_admin=1 WHERE appt_status=0 AND DATE(date_added)='$date_today'");
			if($query) {
				$query2 = mysqli_query($conn, "UPDATE request_doc SET seen_by_admin=1 WHERE DATE(date_created)='$date_today' AND seen_by_admin=0 AND req_status=0");
				if($query2) {
					$query3 = mysqli_query($conn, "UPDATE medicine SET seen_by_admin=1 WHERE DATE(expiration_date)>CURDATE() AND is_returned=0  AND med_stock_in<20 AND seen_by_admin=0");
					if($query3) {
						$query4 = mysqli_query($conn, "UPDATE appointment SET seen_by_admin=1 WHERE appt_date < '$date_today' AND (appt_status != 3 AND appt_status != 2 AND appt_status !=4) AND seen_by_admin=0 ");
						if($query4) {
							header("Location: dashboard.php");
						} else {
							$_SESSION['message'] = "Something went wrong while updating the record";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: dashboard.php");
						}
					} else {
						$_SESSION['message'] = "Something went wrong while updating the record";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: dashboard.php");
					}
				} else {
					$_SESSION['message'] = "Something went wrong while updating the record";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: dashboard.php");
				}
			} else {
				$_SESSION['message'] = "Something went wrong while updating the record";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: dashboard.php");
			}
		} else {

		}
	}


	if(isset($_POST['return_medicine'])) {
		$med_Id = $_POST['med_Id'];

		$sql = mysqli_query($conn, "UPDATE medicine SET is_returned=1 WHERE med_Id='$med_Id'");
		if($sql) {
			$_SESSION['message'] = "Medicine has been returned!";
	        $_SESSION['text'] = "Returned successfully!";
	        $_SESSION['status'] = "success";
			header("Location: medicine_expired.php");
		} else {
			$_SESSION['message'] = "Something went wrong while returning the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medicine_expired.php");
		}
	}



	

?>
