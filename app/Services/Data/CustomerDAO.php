<?php

namespace App\Services\Data;

use App\Services\Data\Utility\Database;
use Exception;
use App\Models\CustomerModel;

class CustomerDAO {
	
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
	
	/**
	 * Method to add a customer
	 * @param CustomerModel $customer
	 * @throws Exception
	 * @return boolean
	 */
	public function addCustomer(CustomerModel $customer) {
		
		try {
			
			//SQL statment to select the user matching the parameter
			$sqlQuery = "INSERT INTO `USERS` (`ID`, `FIRST_NAME`, `LAST_NAME`) VALUES (NULL, '{$customer->getFirstName()}', '{$customer->getLastName()}');";
			$result = mysqli_query($this->db, $sqlQuery);

			// Get the last inserted id
			$userId = mysqli_insert_id($this->db);
			
			if ($result == true) {
				// Return the user id
				return $userId;
			} else {
				// Return -1 for a failure
				return -1;
			}
		}
		catch(Exception $e) {
			//Throw exception
			throw new Exception("Exception: " . $e->getMessage(), 0, $e);
		}
	}
	
}

