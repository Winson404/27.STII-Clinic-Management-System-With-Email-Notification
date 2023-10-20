<?php 

	include '../config.php';


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




	// DELETE REQUEST MEDICAL CERTIFICATION - MEDICAL_CERTIFICATION_UPDATE_DELETE.PHP
	if(isset($_POST['delete_medical_certification'])) {
		$req_Id = $_POST['req_Id'];

		$delete = mysqli_query($conn, "DELETE FROM request_doc WHERE req_Id='$req_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: medical_certificate.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medical_certificate.php");
	      }
	}




	// DELETE REQUEST MEDICAL RECORDS - MEDICAL_RECORDS_UPDATE_DELETE.PHP
	if(isset($_POST['delete_medical_records'])) {
		$req_Id = $_POST['req_Id'];

		$delete = mysqli_query($conn, "DELETE FROM request_doc WHERE req_Id='$req_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: medical_records.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: medical_records.php");
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


?>




