<?php 
	include '../config.php';
	// include('../phpqrcode/qrlib.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');


	
	// CREATE APPOINTMENT
	if(isset($_POST['request_appointment'])) {
		$patient_Id  = $_POST['patient_Id'];
		$appt_date   = $_POST['appt_date'];
		$appt_time   = $_POST['appt_time'];
		$appt_reason = mysqli_real_escape_string($conn, $_POST['appt_reason']);

		// GET PATIENT NAME
		$patient = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$patient_Id' ");
		$row     = mysqli_fetch_array($patient);
		$name    = $row['name'];

		// GET ADMIN NAME
		$admin      = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin' LIMIT 1");
		$row_admin  = mysqli_fetch_array($admin);
		$admin_name = $row_admin['firstname'].' '.$row_admin['middlename'].' '.$row_admin['lastname'].' '.$row_admin['suffix'];
		$email      = $row_admin['email'];

		if($appt_date < $date_today) {
			$_SESSION['message'] = "Selected date must be onward/later.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: appointment.php");
		} else {

			$appt_exists = mysqli_query($conn, "SELECT * FROM appointment WHERE appt_date='$appt_date' AND appt_time='$appt_time' AND appt_patient_Id='$patient_Id' ");
			if(mysqli_num_rows($appt_exists) > 0 ) {
				$_SESSION['message'] = "Appointment date and time already exists.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: appointment.php");
			} else {

				$check = mysqli_query($conn, "SELECT * FROM appointment WHERE appt_patient_Id='$patient_Id' AND (appt_status=0 || appt_status=1) ");
				if(mysqli_num_rows($check) > 0) {
					$_SESSION['message'] = "You still have unsettled appointment.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: appointment.php");
				} else {
					  $save = mysqli_query($conn, "INSERT INTO appointment (appt_patient_Id, appt_date, appt_time, appt_reason) VALUES ('$patient_Id', '$appt_date', '$appt_time', '$appt_reason')");
					  if($save) {

					  		$mess = 'Good day sir/maam '.$admin_name.', an appointment has been set by new patient named, '.$name.'.';
					  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, reason, sender) VALUES ('Appointment', 'Appointment request', '$mess', '$appt_reason', '$patient_Id')");
					  		if($save2) {

							  	  $subject = 'Appointment request';
							      $message = '<p>Good day sir/maam '.$admin_name.', an appointment has been set by new patient named, '.$name.'.</p>
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

							        	$_SESSION['message'] = "Appointment request successful.";
									    $_SESSION['text'] = "Request success";
									    $_SESSION['status'] = "success";
										header("Location: appointment.php");

								  } catch (Exception $e) { 
								  	$_SESSION['message'] = "Email not sent.";
								    $_SESSION['text'] = "Please try again.";
								    $_SESSION['status'] = "error";
									header("Location: appointment.php");
								  } 
							} else {
								$_SESSION['message'] = "Something went wrong while saving the information.";
						        $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header("Location: appointment.php");
							}

				      } else {
				        $_SESSION['message'] = "Something went wrong while saving the information.";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: appointment.php");
				      }
			    }
			}
		}
	}






	// CREATE MEDICAL CERTIFICATE REQUEST - MEDICAL_CERTIFICATE_ADD.PHP
	if(isset($_POST['request_medical_certificate'])) {
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

		$appt_exists = mysqli_query($conn, "SELECT * FROM request_doc WHERE type='$type' AND patient_Id='$patient_Id' AND pick_up_date='$pick_up_date' ");
		if(mysqli_num_rows($appt_exists) > 0 ) {
			$_SESSION['message'] = "Request type with the same pick up date already exists.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medical_certificate.php");
		} else {

			$appt_exists = mysqli_query($conn, "SELECT * FROM request_doc WHERE req_status != 3 AND patient_Id='$patient_Id' ");
			if(mysqli_num_rows($appt_exists) > 0 ) {
				$_SESSION['message'] = "You still have pending request that needs to be released first.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medical_certificate.php");
			} else {
				$save = mysqli_query($conn, "INSERT INTO request_doc (type, patient_Id, purpose, pick_up_date) VALUES ('$type', '$patient_Id', '$purpose', '$pick_up_date')");
				  if($save) {

				  		$mess = 'Good day sir/maam '.$admin_name.', a request for medical records has been set by new patient named, '.$name.'.';
				  		$save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, reason, sender) VALUES ('Medical certificate', 'Medical certificate request', '$mess', '$purpose', '$patient_Id')");

				  		if($save2) {
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
							$_SESSION['message'] = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: appointment.php");
						}

				  	  

			      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: medical_certificate.php");
			      }
			}
		}
	}
	





	// CREATE MEDICAL RECORDS REQUEST - MEDICAL_RECORDS_ADD.PHP
	if(isset($_POST['request_medical_records'])) {
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

			$appt_exists = mysqli_query($conn, "SELECT * FROM request_doc WHERE type='$type' AND patient_Id='$patient_Id' AND pick_up_date='$pick_up_date' ");
			if(mysqli_num_rows($appt_exists) > 0 ) {
				$_SESSION['message'] = "Request type with the same pick up date already exists.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: medical_records.php");
			} else {
				$appt_exists = mysqli_query($conn, "SELECT * FROM request_doc WHERE req_status != 3 AND patient_Id='$patient_Id' ");
				if(mysqli_num_rows($appt_exists) > 0 ) {
					$_SESSION['message'] = "You still have pending request that needs to be released first.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: medical_records.php");
				} else {
					$save = mysqli_query($conn, "INSERT INTO request_doc (type, patient_Id, purpose, pick_up_date) VALUES ('$type', '$patient_Id', '$purpose', '$pick_up_date')");
					  if($save) {

					  	  $mess = 'Good day sir/maam '.$admin_name.', a request for medical records has been set by new patient named, '.$name.'.';
					  	  $save2 = mysqli_query($conn, "INSERT INTO notification (type, subject, message, reason, sender) VALUES ('Medical records', 'Medical records request', '$mess', '$purpose', '$patient_Id')");

					  		if($save2) {
					  			  $subject = 'Request Medical records';
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
								$_SESSION['message'] = "Something went wrong while saving the information.";
						        $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header("Location: appointment.php");
							}

					  	   

				      } else {
				        $_SESSION['message'] = "Something went wrong while saving the information.";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: medical_records.php");
				      }
				}

			  
			}
		}
	}


?>



