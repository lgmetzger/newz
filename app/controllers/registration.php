<?php

class Registration extends Controller {
	public function __construct() {
		$this->model = $this->loadModel('registration_model');
	}


	public function index() {
		$this->renderView('registration/index');
	}

	public function createUser() {
		$userData = [];

		$userData['name'] = $_POST['name'];
		$userData['email'] = $_POST['email'];
		$userData['password'] = Hash::create('sha512', $_POST['password'], HASH_SALT);
		//$userData['password'] = $_POST['password'];

		// error checking ?

		if (!empty($userData['name']) && !empty($userData['email']) && !empty($userData['password'])) {
			$this->model->createUser($userData);
			header('location: ' . URL);
		} else {
			echo "pau";
		}
	}
}

?>