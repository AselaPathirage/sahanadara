<?php
class Database{
	private $_connection;
	private static $_instance; //The single instance
	private $_host = DB_HOST;
	private $_username = DB_USER;
	private $_password = DB_PASS;
	private $_database = DB_NAME; 

	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
		//$this->_connection = parent::__construct($this->_host, $this->_username,$this->_password, $this->_database);
		//parent::__construct($this->_host, $this->_username,$this->_password, $this->_database);
		if (!$this->_connection){
			error_reporting(0);
			die("Error: Unable to connect to MySQL." . PHP_EOL);
		}
		if($this->_connection->connect_errno) {
			//trigger_error("Failed to conencto to MySQL: " . $this->_connection->connect_errno,E_USER_ERROR);
			echo json_encode(array("code"=>$this->_connection->connect_errno));
			exit();
		}
	}

	private function __clone() { }

	public function getConnection() {
		return $this->_connection;
	}
	
}