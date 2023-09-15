<?php 

	include 'config.php';

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';


	// USERS LOGIN - LOGIN.PHP
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		// Check if the user has attempted to log in before
		if (!isset($_SESSION['login_attempts'])) {
		    $_SESSION['login_attempts'] = 0;
		}

		// Check if the user has reached the maximum number of login attempts
		if ($_SESSION['login_attempts'] > 3) {
		    // Check if the user has been blocked for 30 minutes
		    if (time() - $_SESSION['last_login_attempt'] <= 600) {
		        // User is still blocked, display an error message and exit
		        $_SESSION['message'] = "You have been blocked for 10 minutes due to multiple failed login attempts.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: login.php");
		        exit();
		    } else {
		        // Block has expired, reset the login attempts counter
		        $_SESSION['login_attempts'] = 0;
		    }
		}


		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {
			$row = mysqli_fetch_array($check);
			$position = $row['user_type'];
			if($position == 'Admin') {
				$_SESSION['login_attempts'] = 0;
	    		$_SESSION['last_login_attempt'] = time();
				$_SESSION['admin_Id'] = $row['user_Id'];
				header("Location: Admin/dashboard.php");
			} else {
				$_SESSION['login_attempts'] = 0;
	    		$_SESSION['last_login_attempt'] = time();
				$_SESSION['user_Id'] = $row['user_Id'];
				header("Location: Staff/dashboard.php");
			}
		} else {
			$check2 = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' AND password='$password'");
			if(mysqli_num_rows($check2)===1) {
				$row = mysqli_fetch_array($check2);
				$_SESSION['login_attempts'] = 0;
	    		$_SESSION['last_login_attempt'] = time();
				$_SESSION['patient_Id'] = $row['user_Id'];
				header("Location: Patient/dashboard.php");
			} else {
				$_SESSION['login_attempts']++;
			    $_SESSION['last_login_attempt'] = time();
				$_SESSION['message'] = "Incorrect password.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: login.php");
			}
		    
		}
	}




	// SAVE USERS - REGISTER.PHP
	if(isset($_POST['create_user'])) {
		$vaccine_status           = mysqli_real_escape_string($conn, $_POST['vaccine_status']);
		$position                 = mysqli_real_escape_string($conn, $_POST['position']);
		$civil_status             = mysqli_real_escape_string($conn, $_POST['civil_status']);
		$name		              = mysqli_real_escape_string($conn, $_POST['name']);
		$grade		              = mysqli_real_escape_string($conn, $_POST['grade']);
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
		$blood_type	              = mysqli_real_escape_string($conn, $_POST['blood_type']);
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

		$exist = mysqli_query($conn, "SELECT * FROM patient WHERE name='$name' AND grade='$grade' AND sex='$sex'");
		if(mysqli_num_rows($exist)>0) {
		      $_SESSION['message'] = "Record already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: register.php");
		} else {

			$exist = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' ");
			if(mysqli_num_rows($exist)>0) {
			      $_SESSION['message'] = "Email already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: register.php");
			} else { 

				// Check if image file is a actual image or fake image
			    $target_dir = "images-users/";
			    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $uploadOk = 1;
			    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");
				    $uploadOk = 0;
			    }

			    // Check if $uploadOk is set to 0 by an error
			    elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");

			    // if everything is ok, try to upload file
			    } else {

		        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        		$save = mysqli_query($conn, "INSERT INTO patient (vaccine_status, position, civil_status, name, grade, teacher_position, dob, age, sex, address, religion,contact, email, parentName, parentContact, illness, pastMedical, surgicalHistory, blood_type, height, weight, allergy, password, pass, nutritional_Immunization, familyHistory, socialHistory, packsYears, environment, frequency, general, hematologic, endocrine, extremities, skin, head, vision, Eyes, ears, nose, mouthThroat, yearsMonths, neck, Breast, Respiratory, Cardiovascular, Gastrointestinal, peripheralvascular, freq_urinary, Urinary, male, age_menarche, female, muscularSkeletal, Psychiatric, Neurologic, NeurologicExam, picture) VALUES ('$vaccine_status', '$position', '$civil_status', '$name', '$grade', '$teacher_position', '$dob', '$age', '$sex', '$address', '$religion', '$contact', '$email', '$parentName', '$parentContact', '$illness', '$pastMedical', '$surgicalHistory', '$blood_type', '$height', '$weight', '$allergy', '$password', '$pass', '$nutritional_Immunization', '$familyHistory', '$socialHistory', '$packsYears', '$environment', '$frequency', '$general', '$hematologic', '$endocrine', '$extremities', '$skin', '$head', '$vision', '$Eyes', '$ears', '$nose', '$mouthThroat', '$yearsMonths', '$neck', '$Breast', '$Respiratory', '$Cardiovascular', '$Gastrointestinal', '$peripheralvascular', '$freq_urinary', '$Urinary', '$male', '$age_menarche', '$female', '$muscularSkeletal', '$Psychiatric', '$Neurologic', '$NeurologicExam', '$file')");

	              	  if($save) {

	              	  	  $subject = 'Registration successful';
					      $message = '<p>Good day sir/maam '.$name.', you have successfully registered to the system. Thank you!</p>
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

					        	$_SESSION['message'] = "Registration successful!";
					            $_SESSION['text'] = "Saved successfully!";
						        $_SESSION['status'] = "success";
								header("Location: register.php");

						  } catch (Exception $e) { 
						  	$_SESSION['message'] = "Email not sent.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: register.php");
						  } 

			          	
			          } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: register.php");
			          }
		       			
		        } else {
		        	$_SESSION['message'] = "There was an error uploading your profile picture.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: register.php");
		        }
			  }
			}
		}
	}




	// SEARCH EMAIL - FORGOT-PASSWORD.PHP
	if(isset($_POST['search'])) {
	      $email = mysqli_real_escape_string($conn, $_POST['email']);
	      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	      if(mysqli_num_rows($fetch) > 0) {
	      	$row = mysqli_fetch_array($fetch);
	      	$user_Id = $row['user_Id'];
	      	header("Location: sendcode.php?user_Id=".$user_Id);
	      } else {
      		  $fetch2 = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email'");
		      if(mysqli_num_rows($fetch2) > 0) {
		      	$row = mysqli_fetch_array($fetch2);
		      	$user_Id = $row['user_Id'];
		      	header("Location: sendcode.php?patient_Id=".$user_Id);
		      } else {
		      		$_SESSION['message'] = "Email does not exists in the database.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: forgot-password.php");
		      }
	      }
	}




	// SEND CODE - SENDCODE.PHP
	if(isset($_POST['sendcode'])) {

	    $email   = $_POST['email'];
	    $user_Id = $_POST['user_Id'];
	    $key     = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

	    $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE email='$email' AND user_Id='$user_Id'");
	    if($insert_code) {

	      $subject = 'Verification code';
	      $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$key.'</b>. Please do not share this code to other people. Thank you!</p>
	      <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%200.%20My%20NEW%20Template%20System/changepassword.php?user_Id='.$user_Id.'">here!</a></p> 
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

	        	$_SESSION['message'] = "Verification code has been sent to your email.";
			    $_SESSION['text'] = "Code has been sent";
			    $_SESSION['status'] = "success";
				header("Location: verifycode.php?user_Id=".$user_Id."&&email=".$email);

		  } catch (Exception $e) { 
		  	$_SESSION['message'] = "Email not sent.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: sendcode.php?user_Id=".$user_Id);
		  } 
		} else {
			$_SESSION['message'] = "Something went wrong while generating verification code through email.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: sendcode.php?user_Id=".$user_Id);
		} 
	}




	// PATIENT SEND CODE - SENDCODE.PHP
	if(isset($_POST['sendcode_patient'])) {

	    $email   = $_POST['email'];
	    $patient_Id = $_POST['patient_Id'];
	    $key     = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

	    $insert_code = mysqli_query($conn, "UPDATE patient SET verification_code='$key' WHERE email='$email' AND user_Id='$patient_Id'");
	    if($insert_code) {

	      $subject = 'Verification code';
	      $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$key.'</b>. Please do not share this code to other people. Thank you!</p>
	      <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%200.%20My%20NEW%20Template%20System/changepassword.php?patient_Id='.$patient_Id.'">here!</a></p> 
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

	        	$_SESSION['message'] = "Verification code has been sent to your email.";
			    $_SESSION['text'] = "Code has been sent";
			    $_SESSION['status'] = "success";
				header("Location: verifycode.php?patient_Id=".$patient_Id."&&email=".$email);

		  } catch (Exception $e) { 
		  	$_SESSION['message'] = "Email not sent.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: sendcode.php?patient_Id=".$patient_Id);
		  } 
		} else {
			$_SESSION['message'] = "Something went wrong while generating verification code through email.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: sendcode.php?patient_Id=".$patient_Id);
		} 
	}




	// VERIFY CODE - VERIFYCODE.PHP
	if(isset($_POST['verify_code'])) {
	    $user_Id = $_POST['user_Id'];
	    $email   = $_POST['email'];
	    $code    = mysqli_real_escape_string($conn, $_POST['code']);
	    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND verification_code='$code' AND user_Id='$user_Id'");
	    if(mysqli_num_rows($fetch) > 0) {
			header("Location: changepassword.php?user_Id=".$user_Id);
		} else {
			$_SESSION['message'] = "Verification code is incorrect.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: verifycode.php?user_Id=".$user_Id."&&email=".$email);
		}
	}




	// PATIENT VERIFY CODE - VERIFYCODE.PHP
	if(isset($_POST['verify_code_patient'])) {
	    $patient_Id = $_POST['patient_Id'];
	    $email   = $_POST['email'];
	    $code    = mysqli_real_escape_string($conn, $_POST['code']);
	    $fetch = mysqli_query($conn, "SELECT * FROM patient WHERE email='$email' AND verification_code='$code' AND user_Id='$patient_Id'");
	    if(mysqli_num_rows($fetch) > 0) {
			header("Location: changepassword.php?patient_Id=".$patient_Id);
		} else {
			$_SESSION['message'] = "Verification code is incorrect.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: verifycode.php?patient_Id=".$patient_Id."&&email=".$email);
		}
	}




	// CHANGE PASSWORD - CHANGEPASSWORD.PHP
	if(isset($_POST['changepassword'])) {
		$user_Id   = $_POST['user_Id'];
		$cpassword = md5($_POST['cpassword']);

		$update = mysqli_query($conn, "UPDATE users SET password='$cpassword' WHERE user_Id='$user_Id' ");
		if($update) {
			$_SESSION['message'] = "Password has been changed.";
		    $_SESSION['text'] = "Please login to your account";
		    $_SESSION['status'] = "success";
			header("Location: login.php");
		} else {
			$_SESSION['message'] = "Something went wrong while updating your password.";
		    $_SESSION['text'] = "Please try again";
		    $_SESSION['status'] = "error";
			header("Location: changepassword.php?user_Id=".$user_Id);
		}
	}




	// PATIENT CHANGE PASSWORD - CHANGEPASSWORD.PHP
	if(isset($_POST['changepassword_patient'])) {
		$patient_Id   = $_POST['patient_Id'];
		$cpassword = md5($_POST['cpassword']);

		$update = mysqli_query($conn, "UPDATE patient SET password='$cpassword' WHERE user_Id='$patient_Id' ");
		if($update) {
			$_SESSION['message'] = "Password has been changed.";
		    $_SESSION['text'] = "Please login to your account";
		    $_SESSION['status'] = "success";
			header("Location: login.php");
		} else {
			$_SESSION['message'] = "Something went wrong while updating your password.";
		    $_SESSION['text'] = "Please try again";
		    $_SESSION['status'] = "error";
			header("Location: changepassword.php?patient_Id=".$patient_Id);
		}
	}

























?>
