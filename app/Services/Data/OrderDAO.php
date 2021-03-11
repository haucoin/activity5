<?php

namespace App\Services\Data;

use App\Services\Data\Utility\Database;
use Exception;

class OrderDAO {
	
	private $connection;
	private $db;
	
	/**
	 * Default Constuctor inorder to initialze the connection varible to the database
	 */
	public function __construct($db) {
		
		$this->db = $db;
// 		$database = new Database();
// 		$this->connection = $database->getConnection();
	}
	
	// Method to add an order
	public function addOrder(string $product, int $userId) {
		
		try {
			
			//SQL statment to select the user matching the parameter
			$sqlQuery = "INSERT INTO `ORDERS` (`ID`, `PRODUCT`, `USER_ID`) VALUES (NULL, '" . $product . "', " . $userId . ");";
			$result = mysqli_query($this->db, $sqlQuery);
			//$this->db->query($sqlQuery);

			if ($result == true) {
				//$this->connection->closeConnection();
				//mysqli_close($this->connection);
				return true;
			} else {
				//$this->connection->closeConnection();
				//mysqli_close($this->connection);
				return false;
			}
		}
		catch(Exception $e) {
			//Throw exception
			throw new Exception("Exception: " . $e->getMessage(), 0, $e);
		}
	}
}

