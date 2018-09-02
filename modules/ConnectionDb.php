<?php
 /**
   * Connection to Database class
   * 
   * 
   * @package    
   * @subpackage 
   * @author     Ebrahim Moeini <padiabcom@gmail.com>
   */

class ConnectionDb
{

	public $hostname ;
	public $username ;
	public $password ;
	public $db ;

	public function __construct($servername , $dbUsername , $dbPassword , $dbName ) {

		$this->hostname = $servername ;
		$this->username = $dbUsername ;
		$this->password = $dbPassword ;
		$this->db = $dbName ;
	}

	public function dbConnection(){

		$conn = new mysqli($this->hostname, $this->username, $this->password, $this->db );

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;	
	}
}	