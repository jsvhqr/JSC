<?php
class JSNDatabase {
	private $databaseHost;
	private $databaseName;
	private $databaseUser;
	private $databasePassword;
	private $connection;
	
	function __construct(){
		$this->databaseHost = 'localhost';
		$this->databaseName = 'JSNDatabase';
		$this->databaseUser = 'root';
		$this->databasePassword = 'epAQNahHJyQxeJAv';
	}
	function connect() {
		$this->connection = new mysqli ( $this->databaseHost, $this->databaseUser, $this->databasePassword, $this->databaseName);
		if ($this->connection->connect_errno) {
			die('Unable to connect to database');
		}
	}
	function QueryDatabase($queryString) {
		$result = $this->connection->query ( $queryString );
		if (! $result) {
			return FALSE;
		} else {
			return $result;
		}
	}
	function closeConnection() {
		$this->connection->close ();
	}
}

?>