<?php

class Browse extends Controller {
	public function __construct() {
		$this->model = $this->loadModel('browse_model');

		Auth::handleLogin();
	}

	public function index() {
		$locations = $this->model->getLocations();
		$this->renderView("browse/index", $locations);
	}
}

?>