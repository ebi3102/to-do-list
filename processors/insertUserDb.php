<?php
include_once 'loader.php' ;

if(isset($_POST['email'])){

	$email = trim(htmlentities($_POST['email']));
}

if(isset($_POST['password'])){

	$options = [
    'cost' => 12,
	];

	$password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
}

$firstName = trim(htmlentities($_POST['firstName']));
$lastName = trim(htmlentities($_POST['lastName']));

$conn = $conn->dbConnection() ;

$sql = "INSERT INTO users (user_email, user_first_name , user_last_name , user_password ) VALUES ('$email' , '$firstName' , '$lastName' , '$password')";

$result = $conn->query($sql); 

if ($result === TRUE) {
	header("location:../to-do-list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



 ?>