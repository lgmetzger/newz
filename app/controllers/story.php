<?php

class Story extends Controller  {
	public function __construct() {
		$this->model = $this->loadModel('story_model');

		// this goes in every page that requires authentication
		// true = redirects to the login page
		Auth::handleLogin(false);
	}

	public function index() {
		header('location: ' . URL);
	}

	public function view($storyId = '', $storyTitle = '') {
		if (!empty($storyId) && !empty($storyTitle)) {
			$storyData = $this->model->getStoryData($storyId);

			$storyData[0]['id'] = $storyId;
			$storyData[0]['title'] = $storyTitle;

			// verificar os valores retornados antes de renderizar

			$this->renderView('story/index', $storyData[0]);

			// TODO: melhorar isso aqui
			if (Session::get('sameIp') == false) {
				$this->model->updateViewCount($storyId);
			}
		} else {
			header('location: ' . URL);
		}
		
	}

	// watch part 4 - ajax
	public function updatePositiveCount() {

	}
}

?>