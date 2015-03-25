<?php

class App {

	// default controller, method and parameters
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	private $_url = [];

	public function __construct() {
		// gets the url in array form
		$this->_url = $this->_parseUrl();

		// checks if something is being passed through the url
		if (empty($this->_url[0])) {
			$this->controller = $this->_loadDefaultController();	// return the default controller OBJECT
			call_user_func_array([$this->controller, $this->method], []);	// calls the default method from the default controller
			return false;	// as there's nothing set in the url, we can return here so the rest of the code isn't executed
		}
		
		// instantiates the controller specified in the url
		$this->controller = $this->_loadController($this->_url[0]);

		// unsets the element so we can get all the remaining parameters later on
		unset($this->_url[0]);

		// checks if a method was passed through the url and, if so, sets the $method attribute to be called later
		if (!empty($this->_url[1])) {
			if (method_exists($this->controller, $this->_url[1])) {
				$this->method = $this->_url[1];

				unset($this->_url[1]);	// unsets the element so we can get all the remaining parameters later on
			}
		}

		// if there's something left in the url, replace the default parameters with it (array)
		$this->params = $this->_url ? array_values($this->_url) : [];

		// calls the specified method from the specified controller with the specified parameters
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	private function _loadController($controllerName) {
		$file = '../app/controllers/' . $controllerName . '.php';
		if (file_exists( $file )) {
			require_once $file;
			return new $controllerName();
		} else {
			call_user_func(['error', 'e_404']);
			return false;
		}
	}

	private function _loadDefaultController() {
		require_once '../app/controllers/home.php';
		return new Home();
	}

	// creates an array with the values passed in the url
	private function _parseUrl() {
		if (isset($_GET['url'])) {
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}

?>