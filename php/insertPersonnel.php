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

	$query = 'SELECT COUNT(`email`) FROM `personnel` WHERE `email` = "'.$email.'"';
	$result = $conn->query($query);
	$row = mysqli_fetch_assoc($result);

	if ($row['COUNT(`email`)'] > 0 ){

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "add personnel failed. record already exists.";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;

	};
	
	$query = 'INSERT INTO `personnel` (`firstName`, `lastName`, `jobTitle`, `tel`, `email`, `departmentID`) VALUES ("'.$first.'", "'.$last.'", "'.$title.'", "'.$tel.'", "'.$email.'", "'.$department.'")';

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
	$output['status']['description'] = "Personnel record successfully added.";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 

?>