<?php

class Controller {
	public function __construct() {
		//echo "construct Controller";
	}

	public function loadModel($modelName) {

		if (file_exists('../app/models/' . $modelName . '.php')) {
			require_once '../app/models/' . $modelName . '.php';
			return new $modelName();
		} else {
			// file (model) does not exist
			throw new Exception('No such model');
		}
	}

	public function renderView($viewName, $viewData = []) {
		Session::init();

		require_once '../app/views/header.php';
		require_once '../app/views/' . $viewName . '.php';
		require_once '../app/views/footer.php';
	}
}

?>