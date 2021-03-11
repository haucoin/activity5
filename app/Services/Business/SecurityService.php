<?php

namespace App\Services\Business;

use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;
use App\Services\Data\Utility\Database;

class SecurityService {
	
	
	public function login(UserModel $user) {
		
		$dao = new SecurityDAO();
		
		return $dao->findByUser($user);
	}
	
	
	public function getAllUsers() {
		
		$dao = new SecurityDAO();
		
		return $dao->findAllUsers();
	}
	
	
	public function getUser(int $userId) {
		
		$dao = new SecurityDAO();
		
		return $dao->findUserById($userId);
	}
	
	
	
	public function addCustomer(CustomerModel $customer) {
		
		$dao = new CustomerDAO();
		
		return $dao->addCustomer($customer);
	}
	
	
	public function addOrder($product, $userId) {
		
		$dao = new OrderDAO();
		
		return $dao->addOrder($product, $userId);
	}
	
	
	public function addAllInformation($product, $userId, $customer) {
		
		// Create a connection to the database
		// Create an instance and call method
		$database = new Database();
		$connection = $database->getConnection();
		
		// Turn off autocommit
		$database->setAutoCommitFalse();
		// Begin transaction
		$database->beginTransaction();
		
		// Instantiate the data access layer
		$customerDAO = new CustomerDAO($connection);
			
		// Add the customer data and set the return to the customerId
		$customerId = $customerDAO->addCustomer($customer); 	
		
		// Instantiate the data access layer
		$orderDAO = new OrderDAO($connection);
		
		// Add the product order
		$orderStatus = $orderDAO->addOrder($product, $customerId);
		
		if($customerId > 0 && $orderStatus) {
			$database->commitTransaction();
			return true;
		}
		else {
			$database->rollbackTransaction();
			return false;
		}
	}
}

