<?php

namespace App\Services\Data\Utility;

use mysqli;

class Database {
	
	private $servername = "localhost";
	private $username = "root";
	private $password = "root";
	private $dbName = "256activity";
	
	private $connection;
	
	/**
	 * getConnection uses the private class varibles to connect to the database using mysqli and return the connection object
	 * @return $connection - Connection - connection object to the database
	 */
	function getConnection() {
		
		// Create connection
		$this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
		
		// Check connection
		if (!$this->connection)
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();
			//die("Connection failed: " . mysqli_connect_error());
		}
		
		return $this->connection;
	}
	
	// 	public function getConnectionn() {
	// 		// OOP Style
	// 		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
	
	// 		// Procedural
	// 		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
	
	// 		// Scope resolution
	// 		//$this->conn = mysqli::connect($this->servername, $this->username, $this->password, $this->dbName);
	// 	}
	
	/**
	 * Turn on autocommit
	 */
	function setAutoCommitTrue() {
		
// 		$this->conn->autocommit(TRUE);
		mysqli_autocommit($this->connection, TRUE);
	}
	
	/**
	 * Turn off autocommit
	 */
	function setAutoCommitFalse() {
		
// 		$this->conn->autocommitFalse(FALSE);
		mysqli_autocommit($this->connection, FALSE);
	}
	
	
	/**
	 * Close the connection
	 */
	function closeConnection() {
		
		mysqli_close($this->connection);
		
		// OOP
		//$this->conn->close();
	}
	
	
	/**
	 * Begin a transaction
	 */
	function beginTransaction() {
		
		mysqli_begin_transaction($this->connection);
		
		//OOP
		//$this->conn->begin_transaction();
	}
	
	
	/**
	 * Commit a transaction
	 */
	function commitTransaction() {
		
		mysqli_commit($this->connection);
		
		//OOP
		//$this->conn->commit();
	}
	
	
	/**
	 * Rollback a transaction
	 */
	function rollbackTransaction() {
		
		mysqli_rollback($this->connection);
		
		//OOP
		//$this->conn->rollback();
	}
}

