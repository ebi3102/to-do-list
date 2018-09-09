<?php
	session_start();

	//for identifying user login
	if(isset($_SESSION['userId']) && isset($_SESSION['fullName'])){

		//keep user login about 2 hours
		setcookie(session_name() , session_id() , time()+(2*60*60));
		
		$user_login = $_SESSION['userId'];
		$display_name = $_SESSION['fullName'];
	}
	$dir = dirname(__dir__) ;
	include_once $dir."/config.php" ;
	spl_autoload_register(function ($class_name)
	{
		global $dir ;
	    include $dir."/modules/".$class_name.".php";
	});

	$conn = new ConnectionDb($dbConfig['hostname'] , $dbConfig['username'] , $dbConfig['password'] , $dbConfig['db_name']);
