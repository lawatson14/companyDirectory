<?php
	
	$executionStartTime = microtime(true);

	include("config.php");
	include("validate.php");

	header('Content-Type: application/json; charset=UTF-8');

	$conn = new mysqli($cd_host, $cd_user, $cd_password, $cd_dbname, $cd_port, $cd_socket);

	if (mysqli_connect_errno()) {
		
		$output['status']['code'] = "300";
		$output['status']['name'] = "failure";
		$output['status']['description'] = "database unavailable";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;

	}
	
	$personnelId = validate_input($_POST['personnelId']); 
	$first = validate_input($_POST['first']);
	$last = validate_input($_POST['last']); 
	$title = validate_input($_POST['title']);
	$email = validate_input($_POST['email']); 
	$tel = validate_input($_POST['tel']);
	$department = validate_input($_POST['department']);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

		$output['status']['code'] = "400";
		$output['status']['name'] = "failed";
		$output['status']['description'] = "Invalid email.";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;
	}
	
	$query = 'UPDATE `personnel` SET `firstName` = "'.$first.'", `lastName` = "'.$last.'", `jobTitle` = "'.$title.'", `email` = "'.$email.'", `tel` = "'.$tel.'", `departmentID` = "'.$department.'" WHERE `id` = "'.$personnelId.'"';

	$result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "Record successfully editted.";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 

?>