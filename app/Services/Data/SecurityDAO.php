<?php

namespace App\Services\Data;

use App\Models\UserModel;
use App\Services\Data\Utility\Database;
use Exception;
use Illuminate\Support\Facades\Log;

class SecurityDAO {	
	
	private $connection;
	
	/**
	 * Default Constuctor inorder to initialze the connection varible to the database
	 */
	public function __construct() {
		$database = new Database();
		$this->connection = $database->getConnection();
	}
	
	
	// Method to find a user
	public function findByUser(UserModel $user) {
		
		try {
			//SQL statment to select the user matching the parameter
			$sqlQuery = "SELECT * FROM USERS WHERE USERNAME = '{$user->getUsername()}' AND PASSWORD = '{$user->getPassword()}'";
			mysqli_query($this->connection, $sqlQuery);
			
			if($this->connection->affected_rows == 0) {
				return false;
			}			
			else {
				return true;
			}
		}
		catch(Exception $e) {
			Log::info("Exception in SecurityDAO: findByUser() - " . $e->getMessage());
			//Throw exception
			throw new Exception("Exception: " . $e->getMessage(), 0, $e);
		}
	}
	
	
	// Method to get all users
	public function findAllUsers() {
		
		try {
			// Create an array to store the users with an index
			$users = array();
			$indexUser = 0;
			
			// SQL select statement to retrieve all users from the database
			$sqlQuery = "SELECT * FROM USERS";
			// Run the select users SQL statement
			$results = mysqli_query($this->connection, $sqlQuery);
			
			// Iterate through all users retrieved
			while($row = $results->fetch_assoc()) {
				// Get the id of current user
				$username = $row['USERNAME'];
				$password = $row['PASSWORD'];
				
				$currentUser = new UserModel($username, $password);
				
				// Add the user object to the array
				$users[$indexUser] = $currentUser;
				$indexUser++;
			}
			
			// Return the array of user objects
			return $users;
		}
		catch(Exception $e) {
			Log::info("Exception in SecurityDAO: findAllUsers() - " . $e->getMessage());
			//Throw exception
			throw new Exception("Exception: " . $e->getMessage(), 0, $e);
		}
	}
	
	
	public function findUserById(int $userId) {
		
		try{
			// SQL select statement to retrieve the user matching the given id
			$sqlUsers = "SELECT * FROM USERS WHERE ID = {$userId}";
			
			// Run the queries
			$resultsUsers = mysqli_query($this->connection, $sqlUsers);
			
			// Get the user and profile information from the queries
			$rowUser = $resultsUsers->fetch_assoc();
			
			// Get each variable from the results
			$username = $rowUser['USERNAME'];
			$password = $rowUser['PASSWORD'];
			
			// Create a user object using the variables
			$currentUser = new UserModel($username, $password);
			
			// Return the user model
			return $currentUser;
		}
		// An error occurred, throw exception
		catch(Exception $e) {
			throw new Exception("Exception: " . $e->getMessage(), 0, $e);
		}
	}
	
}

