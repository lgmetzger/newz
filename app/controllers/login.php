<?php

class Login extends Controller {
	public function __construct() {
		parent::__construct();

		$this->model = $this->loadModel('login_model');
		$this->index();
	}

	public function index() {
		Session::init();

		if (Session::get('loggedIn') == true) {
			header('location: ' . URL);
			exit;
		}

		$this->renderView('login/index');
	}

	public function run() {
		$this->model->run();
	}
}

?>