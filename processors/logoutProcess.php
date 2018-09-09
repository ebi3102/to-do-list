<?php
	include_once 'loader.php' ;
	global $user_login ;
	if(!$user_login){
		header("location:../login.php");
	}
	session_destroy();
	header("location:../login.php");
 ?>