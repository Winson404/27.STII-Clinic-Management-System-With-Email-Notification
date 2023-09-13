<?php 
	include '../config.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');


    // UPDATE MY INFO - PATIENT_UPDATE.PHP
	if(isset($_POST['update_user'])) {
		$student_Id	              = mysqli_real_escape_string($conn, $_POST['student_Id']);
		$vaccine_status           = mysqli_real_escape_string($conn, $_POST['vaccine_status']);
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
			  header("Location: profile_info.php");
		} else {
			$exist = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' AND user_Id !='$student_Id' ");
			if(mysqli_num_rows($exist)>0) {
			      $_SESSION['message'] = "Email already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: profile_info.php");
			} else {

				if(empty($file)) {

					$update = mysqli_query($conn, "UPDATE patient SET vaccine_status='$vaccine_status', name='$name', grade='$grade', dob='$dob', age='$age', sex='$sex', address='$address', religion='$religion', contact='$contact', email='$email', parentName='$parentName', parentContact='$parentContact', illness='$illness', pastMedical='$pastMedical', surgicalHistory='$surgicalHistory', blood_type='$blood_type', height='$height', weight='$weight', allergy='$allergy', nutritional_Immunization='$nutritional_Immunization', familyHistory='$familyHistory', socialHistory='$socialHistory', packsYears='$packsYears', environment='$environment', frequency='$frequency', general='$general', hematologic='$hematologic', endocrine='$endocrine', extremities='$extremities', skin='$skin', head='$head', vision='$vision', Eyes='$Eyes', ears='$ears', nose='$nose', mouthThroat='$mouthThroat', yearsMonths='$yearsMonths', neck='$neck', Breast='$Breast', Respiratory='$Respiratory', Cardiovascular='$Cardiovascular', Gastrointestinal='$Gastrointestinal', peripheralvascular='$peripheralvascular', freq_urinary='$freq_urinary', Urinary='$Urinary', male='$male', age_menarche='$age_menarche', female='$female', muscularSkeletal='$muscularSkeletal', Psychiatric='$Psychiatric', Neurologic='$Neurologic', NeurologicExam='$NeurologicExam' WHERE user_Id='$student_Id' ");

		              	  if($update) {
				          	$_SESSION['message'] = "Your information has been updated!";
				            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
							header("Location: profile_info.php");
				          } else {
				            $_SESSION['message'] = "Something went wrong while saving the information.".var_dump($update);
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: profile_info.php");
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
						header("Location: profile_info.php");
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["fileToUpload"]["size"] > 500000) {
					  	$_SESSION['message']  = "File must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: profile_info.php");
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: profile_info.php");
					    $uploadOk = 0;
				    }

				    // Check if $uploadOk is set to 0 by an error
				    elseif ($uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: profile_info.php");

				    // if everything is ok, try to upload file
				    } else {

			        	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

		        		$update = mysqli_query($conn, "UPDATE patient SET vaccine_status='$vaccine_status', name='$name', grade='$grade', dob='$dob', age='$age', sex='$sex', address='$address', religion='$religion', contact='$contact', email='$email', parentName='$parentName', parentContact='$parentContact', illness='$illness', pastMedical='$pastMedical', surgicalHistory='$surgicalHistory', blood_type='$blood_type', height='$height', weight='$weight', allergy='$allergy', nutritional_Immunization='$nutritional_Immunization', familyHistory='$familyHistory', socialHistory='$socialHistory', packsYears='$packsYears', environment='$environment', frequency='$frequency', general='$general', hematologic='$hematologic', endocrine='$endocrine', extremities='$extremities', skin='$skin', head='$head', vision='$vision', Eyes='$Eyes', ears='$ears', nose='$nose', mouthThroat='$mouthThroat', yearsMonths='$yearsMonths', neck='$neck', Breast='$Breast', Respiratory='$Respiratory', Cardiovascular='$Cardiovascular', Gastrointestinal='$Gastrointestinal', peripheralvascular='$peripheralvascular', freq_urinary='$freq_urinary', Urinary='$Urinary', male='$male', age_menarche='$age_menarche', female='$female', muscularSkeletal='$muscularSkeletal', Psychiatric='$Psychiatric', Neurologic='$Neurologic', NeurologicExam='$NeurologicExam', picture='$file' WHERE user_Id='$student_Id' ");

		              	  if($update) {
				          	$_SESSION['message'] = "Your information has been updated!";
				            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
							header("Location: profile_info.php");
				          } else {
				            $_SESSION['message'] = "Something went wrong while saving the information.".var_dump($update);
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: profile_info.php");
				          }
			       			
				        } else {
				        	$_SESSION['message'] = "There was an error uploading your profile picture.";
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: profile_info.php");
				        }
				  	}
				}
			}
		}

		
	}




	// CHANGE ADMIN PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$pass        = $_POST['password'];

    	$check_old_password = mysqli_query($conn, "SELECT * FROM patient WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE patient SET password='$password', pass='$pass' WHERE user_Id='$user_Id' ");
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
	          	$save = mysqli_query($conn, "UPDATE patient SET picture='$file' WHERE user_Id='$user_Id'");
	     
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









	// UPDATE MEDICAL CERTIFICATE REQUEST - MEDICAL_CERTIFICATE_UPDATE_DELETE.PHP
	if(isset($_POST['update_request_medical_certificate'])) {

		$req_Id       = $_POST['req_Id'];
		$patient_Id   = $_POST['patient_Id'];
		$purpose      = mysqli_real_escape_string($conn, $_POST['purpose']);
		$pick_up_date = $_POST['pick_up_date'];
		$type         = 'Medical Certificate';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$patient_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['name'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		if($pick_up_date < $date_today) {
			$_SESSION['message'] = "Selected date must be onward/later.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medical_certificate.php");
		} else {

			$appt_exists = mysqli_query($conn, "SELECT * FROM request_doc WHERE type='$type' AND patient_Id='$patient_Id' AND pick_up_date='$pick_up_date' AND req_Id != '$req_Id' ");
			if(mysqli_num_rows($appt_exists) > 0 ) {
				$_SESSION['message'] = "Request type with the same pick up date already exists.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medical_certificate.php");
			} else {

			  $update = mysqli_query($conn, "UPDATE request_doc SET type='$type', patient_Id='$patient_Id', purpose='$purpose', pick_up_date='$pick_up_date' WHERE req_Id='$req_Id' ");
			  if($update) {

			  	  $subject = 'Request Medical certification';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request for medical certification has been set by new patient named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Medical certification request successful.";
					    $_SESSION['text'] = "Request success";
					    $_SESSION['status'] = "success";
						header("Location: medical_certificate.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: medical_certificate.php");
				  } 

		      } else {
		        $_SESSION['message'] = "Something went wrong while updating the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medical_certificate.php");
		      }
			}
		}
	}









	// UPDATE MEDICAL RECORDS REQUEST - MEDICAL_RECORDS_UPDATE_DELETE.PHP
	if(isset($_POST['update_request_medical_records'])) {

		$req_Id       = $_POST['req_Id'];
		$patient_Id   = $_POST['patient_Id'];
		$purpose      = mysqli_real_escape_string($conn, $_POST['purpose']);
		$pick_up_date = $_POST['pick_up_date'];
		$type         = 'Medical Records';

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$patient_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['name'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		if($pick_up_date < $date_today) {
			$_SESSION['message'] = "Selected date must be onward/later.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medical_records.php");
		} else {

			$appt_exists = mysqli_query($conn, "SELECT * FROM request_doc WHERE type='$type' AND patient_Id='$patient_Id' AND pick_up_date='$pick_up_date' AND req_Id != '$req_Id' ");
			if(mysqli_num_rows($appt_exists) > 0 ) {
				$_SESSION['message'] = "Request type with the same pick up date already exists.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medical_records.php");
			} else {

			  $update = mysqli_query($conn, "UPDATE request_doc SET type='$type', patient_Id='$patient_Id', purpose='$purpose', pick_up_date='$pick_up_date' WHERE req_Id='$req_Id' ");
			  if($update) {

			  	  $subject = 'Request Medical certification';
			      $message = '<p>Good day sir/maam '.$admin_name.', a request for medical records has been set by new patient named, '.$name.'.</p>
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

			        	$_SESSION['message'] = "Medical records request successful.";
					    $_SESSION['text'] = "Request success";
					    $_SESSION['status'] = "success";
						header("Location: medical_records.php");

				  } catch (Exception $e) { 
				  	$_SESSION['message'] = "Email not sent.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: medical_records.php");
				  } 

		      } else {
		        $_SESSION['message'] = "Something went wrong while updating the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medical_records.php");
		      }
			}
		}
	}



?>
