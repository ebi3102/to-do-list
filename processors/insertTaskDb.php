<?php
	include_once 'loader.php' ;

	if(!isset($_POST['task'])){
		header("location:../to-do-list.php");
	}

	$task = trim(htmlentities($_POST['task']));
	$date = $_POST['date'];
	$priority = $_POST['priority'];
	$userId = $_SESSION['userId'];
	var_dump($userId);

	$conn = $conn->dbConnection() ;
	$sql = "INSERT INTO tasks (user_id, task_description, task_priority , task_date ) VALUES ('$userId', '$task' , '$date' , '$priority')";
	$result = $conn->query($sql); 

	if ($result === TRUE) {
    	header("location:../to-do-list.php");
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

 ?>
