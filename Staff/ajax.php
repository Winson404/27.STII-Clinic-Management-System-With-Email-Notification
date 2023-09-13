<?php 
  include '../config.php';

// fetch_patient_info.php

// Retrieve the patientId from the query parameter
$patientId = $_GET["patientId"];

// Fetch the grade record from the database based on the patientId
// Perform your database query here and retrieve the necessary information
// Example query assuming your table name is 'patient' and grade is stored in the 'courseYear' column
$query = "SELECT * FROM patient WHERE user_Id = $patientId";
$result = mysqli_query($conn, $query);

if ($result) {
  // Fetch the grade as an associative array
  $gradeRecord = mysqli_fetch_assoc($result);
  $user_type = $gradeRecord["position"];

  $course_position = '';
  if($user_type == 'Teacher') {
    $course_position = $gradeRecord["teacher_position"];
  } else {
    $course_position = $gradeRecord["grade"];
  }

  // Check if a record was found for the provided patientId
  if ($gradeRecord) {
    // Create the response array
    $response = array(
      "courseYear" => $course_position,
      "user_type" => $user_type,
      "contactNumber" => $gradeRecord["contact"],
      "age" => $gradeRecord["age"],
      "sex" => $gradeRecord["sex"],
      "address" => $gradeRecord["address"],
      "parentName" => $gradeRecord["parentName"],
      "parentContact" => $gradeRecord["parentContact"]
    );
  } else {
    // No record found for the provided patientId
    $response = array(
      "error" => "No grade record found for the provided patientId"
    );
  }
} else {
  // Error in the database query
  $response = array(
    "error" => "Error in fetching grade record from the database"
  );
}

// Convert the response array to JSON format
$jsonResponse = json_encode($response);

// Set the response content type to JSON
header('Content-Type: application/json');

// Send the JSON response back to the client
echo $jsonResponse;


?>





