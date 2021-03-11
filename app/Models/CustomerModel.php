<?php

namespace App\Models;

class CustomerModel {
	
	private $firstName;
	private $lastName;
	

	public function __construct($firstName, $lastName) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
	
	
	
	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param mixed $username
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * @param mixed $password
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	
	
}

