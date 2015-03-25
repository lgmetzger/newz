<?php

class Account extends Controller {
	public function __construct() {
		parent::__construct();

		Auth::handleLogin(true);
		$this->model = $this->loadModel('account_model');
	}

	public function index() {
		$userData = $this->model->getUserData(Session::get('userId'));

		$this->renderView('account/index', $userData[0]);
	}

	public function update() {
		if (isset($_POST['name'])) {
			$this->model->update($_POST['name']);
			header('location: ' . URL);
		}
	}
}

?>