<?php

namespace App\Models;

class UserModel implements \JsonSerializable {
	
	private $username;
	private $password;
	

	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}
	
	
	
	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
	
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}

	
}

