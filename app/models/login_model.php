<?php

class Login_Model extends Model {
	public function __construct() {
		parent::__construct();
		//echo "login_model construct<br/>";
	}

	public function run() {

		// @TODO: substituir
		$query = $this->db->prepare("SELECT id, name, last_ip FROM user WHERE name = :name AND password = :password");
		$query->execute(array(
			':name' => $_POST['name'],
			':password' => Hash::create('sha512', $_POST['password'], HASH_SALT)
			));

		//':password' => hash('sha512', $_POST['password'])

		$data = $query->fetch();

		$count = $query->rowCount();

		if ($count > 0) {
			Session::init();
			Session::set('loggedIn', true);
			// set other session attributes with:
			Session::set('role', $data['role']);
			Session::set('userName', $data['name']);
			Session::set('userId', $data['id']);
			Session::set('userIp', $_SERVER['REMOTE_ADDR']);
			Session::set('sameIp', $data['last_ip'] == $_SERVER['REMOTE_ADDR']);

			header('location: ' . URL);
		} else {
			header('location: ' . URL . 'login');
		}

		
	}
}

?>