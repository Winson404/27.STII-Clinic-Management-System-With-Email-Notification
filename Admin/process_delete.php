<?php 
	include '../config.php';

	// DELETE ADMIN - ADMIN_DELETE.PHP
	if(isset($_POST['delete_admin'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "System User has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: admin.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: admin.php");
	      }
	}


	// DELETE STUDENT - STUDENT_DELETE.PHP
	if(isset($_POST['delete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM patient WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Student record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: student.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: student.php");
	      }
	}



	// DELETE TEACHER - TEACHER_DELETE.PHP
	if(isset($_POST['delete_teacher'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM patient WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Teacher record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: teacher.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: teacher.php");
	      }
	}
	

	// DELETE ACTIVITY - ACTIVITY_UPDATE_DELETE.PHP
	if(isset($_POST['delete_activity'])) {
		$actId = $_POST['actId'];

		$delete = mysqli_query($conn, "DELETE FROM announcement WHERE actId='$actId'");
		 if($delete) {
	      	$_SESSION['message'] = "Announcement has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: announcement.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: announcement.php");
	      }
	}




	// DELETE APPOINTMENT - APPOINTMENT_UPDATE_DELETE.PHP
	if(isset($_POST['delete_appointment'])) {
		$appt_Id = $_POST['appt_Id'];

		$delete = mysqli_query($conn, "DELETE FROM appointment WHERE appt_Id='$appt_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: appointment.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: appointment.php");
	      }
	}



	// DELETE DENTAL - DENTAL_DELETE.PHP
	if(isset($_POST['delete_dental'])) {
		$dental_Id = $_POST['dental_Id'];
		$fetch = mysqli_query($conn, "SELECT * FROM dental WHERE dental_Id='$dental_Id' ");
		$row = mysqli_fetch_array($fetch);
		$patient_Id = $row['patient_Id'];
		$fetch2 = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$patient_Id' ");
		$row2 = mysqli_fetch_array($fetch2);


		$delete = mysqli_query($conn, "DELETE FROM dental WHERE dental_Id='$dental_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";

	        if($row2['position'] == 'Student') {
	        	header("Location: dental_student.php");
	        } else {
	        	header("Location: dental_teacher.php");
	        }
			
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			if($row2['position'] == 'Student') {
	        	header("Location: dental_student.php");
	        } else {
	        	header("Location: dental_teacher.php");
	        }
	      }
	}




	// DELETE FORM2 - FORM2_DELETE.PHP
	if(isset($_POST['delete_form2'])) {
		$form2_Id = $_POST['form2_Id'];
		$fetch = mysqli_query($conn, "SELECT * FROM form2 WHERE form2_Id='$form2_Id' ");
		$row = mysqli_fetch_array($fetch);
		$patient_Id = $row['patient_Id'];
		$fetch2 = mysqli_query($conn, "SELECT * FROM patient WHERE user_Id='$patient_Id' ");
		$row2 = mysqli_fetch_array($fetch2);

		$delete = mysqli_query($conn, "DELETE FROM form2 WHERE form2_Id='$form2_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			if($row2['position'] == 'Student') {
	        	header("Location: form2_student.php");
	        } else {
	        	header("Location: form2_teacher.php");
	        }
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			if($row2['position'] == 'Student') {
	        	header("Location: form2_student.php");
	        } else {
	        	header("Location: form2_teacher.php");
	        }
	      }
	}





	// DELETE MEDICINE - MEDICINE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_medicine'])) {
		$med_Id = $_POST['med_Id'];

		$delete = mysqli_query($conn, "DELETE FROM medicine WHERE med_Id='$med_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: medicine.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medicine.php");
	      }
	}





	// DELETE MEDICINE - MEDICINE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_consultation'])) {
		$consult_Id = $_POST['consult_Id'];

		$delete = mysqli_query($conn, "DELETE FROM consultation WHERE consult_Id='$consult_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: consultation.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: consultation.php");
	      }
	}



	// DELETE NOTIFICATION - NOTIFICATION_DELETE.PHP
	if(isset($_POST['delete_notification'])) {
		$notif_Id = $_POST['notif_Id'];

		$delete = mysqli_query($conn, "DELETE FROM notification WHERE notif_Id='$notif_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: notification.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: notification.php");
	      }
	}




	// DELETE UPDATE REQUESTS - UPDATE REQUESTS_DELETE.PHP
	if(isset($_POST['delete_request_update'])) {
		$req_Id = $_POST['req_Id'];

		$delete = mysqli_query($conn, "DELETE FROM request_update WHERE req_Id='$req_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: request_update.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: request_update.php");
	      }
	}







?>





