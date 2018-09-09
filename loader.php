<?php

//for identifying user login
session_start();
if(isset($_SESSION['userId']) && isset($_SESSION['fullName'])){

	//keep user login about 2 hours
	setcookie(session_name() , session_id() , time()+(2*60*60));

	$user_login = $_SESSION['userId'];
	$display_name = $_SESSION['fullName'];
}

include_once "config.php" ;

spl_autoload_register(function ($class_name)
{
    include "modules/".$class_name.".php";
});

$conn = new ConnectionDb($dbConfig['hostname'] , $dbConfig['username'] , $dbConfig['password'] , $dbConfig['db_name']);

//define header and footer

function get_header(){
	include_once 'header.php' ;
}

function get_footer(){
	include_once 'footer.php' ;
}

//Pathes

define('Processors' , 'processors') ;


//Form Processors


define('INSERT_TASK' , Processors.'/insertTaskDb.php') ;

define('DELETE_TASK' , Processors.'/deleteTaskDb.php') ;

define('INSERT_USER' , Processors.'/insertUserDb.php') ;

define('LOGIN_PROCESS' , Processors.'/loginProcess.php') ;

define('LOGOUT_PROCESS', Processors.'/logoutProcess.php') ;


