<?php 
	include '../config.php';
	// include('../phpqrcode/qrlib.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');

		
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

		$get_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_Id != '$user_Id' ");
		if(mysqli_num_rows($get_email) > 0) {
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
		$blood_type	              = mysqli_real_escape_string($conn, $_POST['blood_type']);
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
		$actDate        = $_POST['actDate'];
		$date_acquired  = date('Y-m-d');
		$update = mysqli_query($conn, "UPDATE announcement SET actName='$activity', actDate='$actDate' WHERE actId='$actId'");

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






	
	// UPDATE DENTAL PATIENT - DENTAL_MGMT.PHP
	if(isset($_POST['update_dental'])) {
		$dental_Id      = mysqli_real_escape_string($conn, $_POST['dental_Id']);
		$patient_Id      = mysqli_real_escape_string($conn, $_POST['patient_Id']);
		$dental_history  = mysqli_real_escape_string($conn, $_POST['dental_history']);
		$teeth_no        = mysqli_real_escape_string($conn, $_POST['teeth_no']);
		$vs_bp           = mysqli_real_escape_string($conn, $_POST['vs_bp']);
		$pr              = mysqli_real_escape_string($conn, $_POST['pr']);
		$rr              = mysqli_real_escape_string($conn, $_POST['rr']);
		$medicine_given  = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$dental_advised  = mysqli_real_escape_string($conn, $_POST['dental_advised']);

		if(empty($vs_bp)) { $vs_bp = 'None'; }
		if(empty($pr))    { $pr    = 'None'; }
		if(empty($rr))    { $rr    = 'None'; }

		$save = mysqli_query($conn, "UPDATE dental SET patient_Id='$patient_Id', dental_history='$dental_history', teeth_no='$teeth_no', vs_bp='$vs_bp', pr='$pr', rr='$rr', medicine_given='$medicine_given', dental_advised='$dental_advised' WHERE dental_Id ='$dental_Id' ");

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






	// REQUEST UPDATE DENTAL STUDENT - DENTAL_DELETE.PHP
	if(isset($_POST['requestupdate_dental'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Dental Student';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update dental student records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: dental_student.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  			$mess = 'Good day sir/maam '.$admin_name.', a request to update dental student records has been set by your staff named, '.$name.'.';
		  		    $save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Dental student update', 'Dental records', '$mess', '$user_Id')");

			  		if($save2) {
			  			  $subject = 'Request Student Dental Update';
					      $message = '<p>Good day sir/maam '.$admin_name.', a request to update dental student records has been set by your staff named, '.$name.'.</p>
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

					        	$_SESSION['message'] = "Request successful.";
							    $_SESSION['text'] = "Requested successfully!";
							    $_SESSION['status'] = "success";
								header("Location: dental_student.php");

						  } catch (Exception $e) { 
						  	$_SESSION['message'] = "Email not sent.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: dental_student.php");
						  }
					} else {
						$_SESSION['message'] = "Something went wrong while saving the information.";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: dental_student.php");
					}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: dental_student.php");
		  }
		}
	}






	// REQUEST UPDATE DENTAL TEACHER - DENTAL_DELETE.PHP
	if(isset($_POST['requestupdate_dental_teacher'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Dental Teacher';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update dental teacher records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: dental_teacher.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  		$mess = 'Good day sir/maam '.$admin_name.', a request to update dental teacher records has been set by your staff named, '.$name.'.';
		  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Dental teacher update', 'Dental records', '$mess', '$user_Id')");

		  		if($save2) {
		  			$subject = 'Request Teacher Dental Update';
				      $message = '<p>Good day sir/maam '.$admin_name.', a request to update dental teacher records has been set by your staff named, '.$name.'.</p>
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

				        	$_SESSION['message'] = "Request successful.";
						    $_SESSION['text'] = "Requested successfully!";
						    $_SESSION['status'] = "success";
							header("Location: dental_teacher.php");

					  } catch (Exception $e) { 
					  	$_SESSION['message'] = "Email not sent.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: dental_teacher.php");
					  }
				} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: dental_teacher.php");
				}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: dental_teacher.php");
		  }
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
		$medical_advised   = mysqli_real_escape_string($conn, $_POST['medical_advised']);

		$save = mysqli_query($conn, "UPDATE form2 SET patient_Id='$patient_Id', vs_bp='$vs_bp', pr='$pr', rr='$rr', temperature='$temperature', vital_sign='$vital_sign', diagnosis='$diagnosis', medical_advised='$medical_advised' WHERE form2_Id='$form2_Id' ");

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







	// REQUEST UPDATE MEDICAL STUDENT - FORM2_DELETE.PHP
	if(isset($_POST['requestupdate_medical_student'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Medical Student';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update student medical records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: form2_student.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {	

		  		$mess = 'Good day sir/maam '.$admin_name.', a request to update student medical records has been set by your staff named, '.$name.'.';
	  		    $save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Medical student update', 'Medical records', '$mess', '$user_Id')");

		  		if($save2) {
		  			  $subject = 'Request Student Medical Update';
				      $message = '<p>Good day sir/maam '.$admin_name.', a request to update student medical records has been set by your staff named, '.$name.'.</p>
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

				        	$_SESSION['message'] = "Request successful.";
						    $_SESSION['text'] = "Requested successfully!";
						    $_SESSION['status'] = "success";
							header("Location: form2_student.php");

					  } catch (Exception $e) { 
					  	$_SESSION['message'] = "Email not sent.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: form2_student.php");
					  }
				} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: form2_student.php");
				}

 				 
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: form2_student.php");
		  }
		}
	}






	// REQUEST UPDATE MEDICAL STUDENT - FORM2_DELETE.PHP
	if(isset($_POST['requestupdate_medical_teacher'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Medical Teacher';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update teacher medical records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: form2_teacher.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  		$mess = 'Good day sir/maam '.$admin_name.', a request to update teacher medical records has been set by your staff named, '.$name.'.';
	  		    $save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Medical teacher update', 'Medical records', '$mess', '$user_Id')");

		  		if($save2) {

		  			$subject = 'Request Teacher Medical Update';
				      $message = '<p>Good day sir/maam '.$admin_name.', a request to update teacher medical records has been set by your staff named, '.$name.'.</p>
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

				        	$_SESSION['message'] = "Request successful.";
						    $_SESSION['text'] = "Requested successfully!";
						    $_SESSION['status'] = "success";
							header("Location: form2_teacher.php");

					  } catch (Exception $e) { 
					  	$_SESSION['message'] = "Email not sent.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: form2_teacher.php");
					  }
				} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: form2_teacher.php");
				}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: form2_teacher.php");
		  }
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
		$medicine_given    = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$chief_complaints  = mysqli_real_escape_string($conn, $_POST['chief_complaints']);

		$save = mysqli_query($conn, "UPDATE asking_med SET patient_Id='$patient_Id', pr='$pr', temperature='$temperature', vital_sign='$vital_sign', medical_advised='$medical_advised', medicine_given='$medicine_given', chief_complaints='$chief_complaints' WHERE asking_med_Id='$asking_med_Id' ");

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
		$plan_medication          = mysqli_real_escape_string($conn, $_POST['plan_medication']);     

		$update = mysqli_query($conn, "UPDATE physical SET patient_Id='$patient_Id', p_general='$p_general', p_skin='$p_skin', skinOther='$skinOther', p_heent='$p_heent', p_auditory='$p_auditory', p_nose='$p_nose', p_mouth_throat='$p_mouth_throat', p_neck='$p_neck', p_breast='$p_breast', p_cardiovascular='$p_cardiovascular', p_abdomen='$p_abdomen', p_genitals='$p_genitals', clinical_impression='$clinical_impression', potential_risk='$potential_risk', plan_medication='$plan_medication' WHERE physical_Id='$physical_Id'");

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






	
	// REQUEST UPDATE PHYSICAL EXAM STUDENT - PHYSICAL_DELETE.PHP
	if(isset($_POST['requestupdate_physical'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Physical Student';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update student physical exam records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: physical_student.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update student physical examination records has been set by your staff named, '.$name.'.';
		  	$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Student Physical Exam update', 'Student Physical Exam records', '$mess', '$user_Id')");

	  		if($save2) {
	  			$subject = 'Request Teacher Medical Update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update student physical examination records has been set by your staff named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: physical_student.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: physical_student.php");
				  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: physical_student.php");
			}


 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: physical_student.php");
		  }
		}
	}






	// REQUEST ASKING MEDICINE TEACHER - ASKING_MED_DELETE.PHP
	if(isset($_POST['requestupdate_asking_med_teacher'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Asking Med Teacher';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update asking medicine records for teachers.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: asking_med_teacher.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update asking medicine records for teachers has been set by your staff named, '.$name.'.';
		  	$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Asking Medicine update', 'Teacher Asking Medicine records', '$mess', '$user_Id')");

	  		if($save2) {
	  			$subject = 'Teacher Asking Medicine Update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update asking medicine records for teachers has been set by your staff named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: asking_med_teacher.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: asking_med_teacher.php");
				  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: asking_med_teacher.php");
			}


 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: asking_med_teacher.php");
		  }
		}
	}





	// REQUEST ASKING MEDICINE STUDENT - ASKING_MED_DELETE.PHP
	if(isset($_POST['requestupdate_asking_med'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Asking Med Student';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update asking medicine records for students.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: asking_med_student.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update asking medicine records for students has been set by your staff named, '.$name.'.';
		  	$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Asking Medicine update', 'Student Asking Medicine records', '$mess', '$user_Id')");

	  		if($save2) {
	  			$subject = 'Student Asking Medicine Update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update asking medicine records for students has been set by your staff named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: asking_med_student.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: asking_med_student.php");
				  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: asking_med_student.php");
			}
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: asking_med_student.php");
		  }
		}
	}





	// REQUEST UPDATE PHYSICAL EXAM TEACHER - PHYSICAL_DELETE.PHP
	if(isset($_POST['requestupdate_physical_teacher'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Physical Teacher';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update teacher medical records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: physical_teacher.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update teacher physical examination records has been set by your staff named, '.$name.'.';
	  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Teacher Physical Exam update', 'Teacher Physical Exam records', '$mess', '$user_Id')");

	  		if($save2) {
  			  $subject = 'Request Teacher Medical Update';
		      $message = '<p>Good day sir/maam '.$admin_name.', a request to update teacher physical examination records has been set by your staff named, '.$name.'.</p>
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

		        	$_SESSION['message'] = "Request successful.";
				    $_SESSION['text'] = "Requested successfully!";
				    $_SESSION['status'] = "success";
					header("Location: physical_teacher.php");

			  } catch (Exception $e) { 
			  	$_SESSION['message'] = "Email not sent.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: physical_teacher.php");
			  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: physical_teacher.php");
			}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: physical_teacher.php");
		  }
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
		$medicine_given      = mysqli_real_escape_string($conn, $_POST['medicine_given']);
		$medical_personnel   = mysqli_real_escape_string($conn, $_POST['medical_personnel']);

		if(empty($vs_bp))    { $vs_bp = 'None'; }
		if(empty($pr))       { $pr    = 'None'; }
		if(empty($rr))       { $rr    = 'None'; }
		if(empty($o2zat))    { $o2zat = 'None'; }


		$save = mysqli_query($conn, "UPDATE consultation SET patient_Id='$patient_Id', mothers_maiden_name='$mothers_maiden_name', chief_complaints='$chief_complaints', temperature='$temperature', vs_bp='$vs_bp', pr='$pr', rr='$rr', o2zat='$o2zat', doctors_advice='$doctors_advice', medicine_given='$medicine_given', medical_personnel='$medical_personnel' WHERE consult_Id='$consult_Id'  ");

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







	// REQUEST UPDATE CONSULTATION STUDENT - CONSULTATION_DELETE.PHP
	if(isset($_POST['requestupdate_consultation'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Consultation Student';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update student consultation records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: consultation_student.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update student consultation records has been set by your staff named, '.$name.'.';
	  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Student Consultation update', 'Student Consultation records', '$mess', '$user_Id')");

	  		if($save2) {
  			  $subject = 'Request Student Consultation Update';
		      $message = '<p>Good day sir/maam '.$admin_name.', a request to update student consultation records has been set by your staff named, '.$name.'.</p>
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

		        	$_SESSION['message'] = "Request successful.";
				    $_SESSION['text'] = "Requested successfully!";
				    $_SESSION['status'] = "success";
					header("Location: consultation_student.php");

			  } catch (Exception $e) { 
			  	$_SESSION['message'] = "Email not sent.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: consultation_student.php");
			  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: consultation_student.php");
			}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: consultation_student.php");
		  }
		}
	}





	

	// REQUEST UPDATE CONSULTATION TEACHER - CONSULTATION_DELETE.PHP
	if(isset($_POST['requestupdate_consultation_teacher'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Consultation Teacher';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update teacher consultation records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: consultation_teacher.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update teacher consultation records has been set by your staff named, '.$name.'.';
	  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Teacher Consultation update', 'Teacher Consultation records', '$mess', '$user_Id')");

	  		if($save2) {
			

 				  $subject = 'Request Teacher Consultation Update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update teacher consultation records has been set by your staff named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: consultation_teacher.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: consultation_teacher.php");
				  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: consultation_teacher.php");
			}	
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: consultation_teacher.php");
		  }
		}
	}






	// UPDATE MEDICINE - MEDICINE_MGMT.PHP
	if(isset($_POST['update_medicine'])) {

		$med_Id           = mysqli_real_escape_string($conn, $_POST['med_Id']);
		$brand_name       = mysqli_real_escape_string($conn, $_POST['brand_name']);
		$other_brand_name = mysqli_real_escape_string($conn, $_POST['other_brand_name']);
		$med_name         = mysqli_real_escape_string($conn, $_POST['med_name']);
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
				  $update = mysqli_query($conn, "UPDATE medicine SeT brand_name='$brand_name', other_brand_name='$other_brand_name', med_name='$med_name', med_stock_in='$med_stock_in', med_stock_in_orig='$med_stock_in', expiration_date='$expiration_date' WHERE med_Id='$med_Id' ");

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






	// REQUEST UPDATE MEDICINE - MEDICINE_UPDATE_DELETE.PHP
	if(isset($_POST['requestupdate_medicine'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Medicine';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update medicine records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: medicine.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update medicine records has been set by your staff named, '.$name.'.';
	  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Medicine update', 'Medicine records', '$mess', '$user_Id')");

	  		if($save2) {
	  			 $subject = 'Medicine request update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update medicine records has been set by your staff named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: medicine.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: medicine.php");
				  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medicine.php");
			}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: medicine.php");
		  }
		}
	}







	// REQUEST UPDATE STUDENT RECORDS - STUDENT_DELETE.PHP
	if(isset($_POST['requestupdate_student'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Student update';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update student records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: student.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update student records has been set by your staff named, '.$name.'.';
	  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Student records update', 'Student records request to update', '$mess', '$user_Id')");

	  		if($save2) {
	  			$subject = 'Student records request to update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update student records has been set by your staff named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: student.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: student.php");
				  }
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: student.php");
			}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: student.php");
		  }
		}
	}








	// REQUEST UPDATE STUDENT RECORDS - STUDENT_DELETE.PHP
	if(isset($_POST['requestupdate_teacher'])) {

		$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$req_type    = 'Teacher update';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		$check = mysqli_query($conn, "SELECT * FROM request_update WHERE user_Id='$user_Id' AND req_type= '$req_type' AND req_status=0 ");
		if(mysqli_num_rows($check) > 0) {
			$_SESSION['message'] = "You have already requested admin to update teacher records.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: teacher.php");
		} else {

		  $save = mysqli_query($conn, "INSERT INTO request_update (user_Id, req_type) VALUES ('$user_Id', '$req_type') ");

		  if($save) {

		  	$mess = 'Good day sir/maam '.$admin_name.', a request to update teacher records has been set by your staff named, '.$name.'.';
	  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, sender) VALUES ('Teacher records update', 'Teacher records request to update', '$mess', '$user_Id')");

	  		if($save2) {

	  			  $subject = 'Teacher records request to update';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request to update teacher records has been set by your staff named, '.$name.'.</p>
			      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p>';

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

			        	$_SESSION['message'] = "Request successful.";
					    $_SESSION['text'] = "Requested successfully!";
					    $_SESSION['status'] = "success";
						header("Location: teacher.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: teacher.php");
				  }

			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: student.php");
			}

 				  
		  	
		  } else {
		    $_SESSION['message'] = "Something went wrong.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
		    header("Location: teacher.php");
		  }
		}
	}



	if (isset($_POST['mark_as_read'])) {
    $notification_ids = isset($_POST['notification_ids']) ? $_POST['notification_ids'] : array();

    // Ensure that $notification_ids contains integer values.
    $notification_ids = array_map('intval', $notification_ids);
    
    if (!empty($notification_ids)) {
        // Create a comma-separated list of notification IDs.
        $notification_ids_str = implode(',', $notification_ids);
    
        // Update records based on notif_Id.
        $update = mysqli_query($conn, "UPDATE notification SET is_read_by_staff = 1 WHERE notif_Id IN ($notification_ids_str)");
    
        if ($update) {
            header("Location: notification.php");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong while marking notifications as read.";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: notification.php");
            exit();
        }
    }
}





?>
