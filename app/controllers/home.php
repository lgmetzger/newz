<?php

class Home extends Controller {
	
	public function __construct() {
		parent::__construct();

		$this->model = $this->loadModel('home_model');

		// this goes in every page that requires authentication
		// true = redirects to the login page
		Auth::handleLogin(false);
	}

	public function index($location = '') {
		try {
			$locations = [];
			$stories = [];

			if (empty($location)) {
				if (Session::get('loggedIn') == true) {
					// get prefered locations
					// DEGUB

					$locations_temp = $this->model->getUserLocations(Session::get('userId'));

					foreach ($locations_temp as $key => $value) {
						array_push($locations, $locations_temp[$key]['id_location']);
					}
				}
			} else {
				array_push($locations, $location);
			}

			$stories = $this->model->getStoriesByLocation($locations);
			$this->renderView('home/index', $stories);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function user() {
		echo "nope";
	}

	public function tag($tag = '') {
		$stories = $this->model->getStoriesByTag($tag);
		$this->renderView('home/index2', $stories);
	}

	public function all() {
		$stories = $this->model->getStoriesByLocation([]);
		$this->renderView('home/index', $stories);
	}

	public function logout() {
		$this->model->updateUserData(array('last_ip' => Session::get('userIp')));
		Auth::logout();
	}
}

?>