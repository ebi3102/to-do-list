<?php
	include_once 'loader.php' ;

	if(!isset($_POST['task'])){
		header('location:index.php');
	}

	$task = trim(htmlentities($_POST['task']));
	$date = $_POST['date'];
	$priority = $_POST['priority'];

	$conn = $conn->dbConnection() ;
	$sql = "INSERT INTO tasks (task_description, task_priority , task_date ) VALUES ('$task' , '$date' , '$priority')";
	$result = $conn->query($sql); 

	if ($result === TRUE) {
    	header('location:index.php');
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

 ?>
