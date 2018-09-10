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

/**________________________get_header() function ________________________________
____________________for adding header to a page_______________________________**/


function get_header(){
	include_once 'header.php' ;
}

/**________________________End of get_header() function__________________________
______________________________________________________________________________**/



/**________________________get_footer() function ________________________________
____________________for adding footer to a page_______________________________**/

function get_footer(){
	include_once 'footer.php' ;
}
/**________________________End of get_footer() function__________________________
______________________________________________________________________________**/


/**_________________________add_user_meta($arg) function _______________________
____________________Insert data to user_meta table in database_______________**/


function add_user_meta($arg){ //$arg is an array

	global $user_login ;
	global $conn ;
	$conn = $conn->dbConnection() ;

	foreach ($arg as $meta_key => $meta_value) {
		$sql = "INSERT INTO user_meta (user_id , meta_key , meta_value ) VALUES ('$user_login' , '$meta_key' , '$meta_value')";
		$conn->query($sql);
	}
}

/**________________________End of add_user_meta() function_______________________
______________________________________________________________________________**/



//Pathes

define('Processors' , 'processors') ;


//Form Processors


define('INSERT_TASK' , Processors.'/insertTaskDb.php') ;

define('DELETE_TASK' , Processors.'/deleteTaskDb.php') ;

define('INSERT_USER' , Processors.'/insertUserDb.php') ;

define('LOGIN_PROCESS' , Processors.'/loginProcess.php') ;

define('LOGOUT_PROCESS', Processors.'/logoutProcess.php') ;


