<?php 
	include_once 'loader.php' ;

	if(isset($_POST['email'])){

		$email = trim(htmlentities($_POST['email']));
	}else{
		header("location:../login.php");
	}

	if(isset($_POST['password'])){

		$password = $_POST['password'] ;
	}

	$conn = $conn->dbConnection() ;
	$sql = "SELECT user_id, user_email, user_password, user_first_name , user_last_name FROM users ";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()){

		$dbFirstName = $row['user_first_name'];
		$dbLastName = $row['user_last_name'];
		$dbUserId = $row['user_id'] ;
		$dbEmail = $row['user_email'] ;
		$dbPassword = $row['user_password'] ;

		if( $email === $dbEmail && password_verify($password , $dbPassword)) {

			$_SESSION['userId'] = $dbUserId;
			$_SESSION['fullName'] = $dbFirstName ." ". $dbLastName ;

			header("location:../to-do-list.php");
			// echo "welcome {$dbFirstName}";
			// break ;
		} 
			// header("location:../login.php");
	}

 ?>