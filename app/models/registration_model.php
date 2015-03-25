<?php

class Registration_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function createUser($userData = []) {
		$this->db->insert('user', array(
			'name' => $userData['name'],
			'email' => $userData['email'],
			'password' => hash('sha512', $userData['password']),
			'last_ip' => $_SERVER['REMOTE_ADDR']
			));
	}
}

?>