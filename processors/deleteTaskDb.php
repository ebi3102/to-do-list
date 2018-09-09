<?php 
	include_once 'loader.php' ;

	if(!isset($_POST['tasksCheck'])){
		header('location:../to-do-list.php');
	}

	$tasksCheck = $_POST['tasksCheck'] ;

	$conn = $conn->dbConnection() ;

	foreach ($tasksCheck as $key => $taskCheck) {


		$sql = "DELETE FROM tasks WHERE task_id = $taskCheck";

		$conn->query($sql) ;	
	}

	header('location:../to-do-list.php');


$conn->close();

 ?>