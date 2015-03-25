<?php

class Account_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getUserData($userId) {
		return $this->db->select("SELECT name, email, email_update FROM User WHERE id = $userId");
	}

	public function update($newName) {
		$this->db->update('User', array('name' => $newName), "id = " . Session::get('userId') );
		Session::set('userName', $newName);
	}
}

?>