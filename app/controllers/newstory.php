<?php

class NewStory extends Controller {
	public function __construct() {
		Auth::handleLogin(true);
		$this->model = $this->loadModel('newstory_model');
	}

	public function index() {
		$this->renderView('newstory/index');
	}

	public function create() {
		$storyData = array(
			'title' => $_POST['title'],
			'body' => $_POST['text'],
			'id_author' => $_POST['userId'],
			'id_location' => 53);

		// $storyData['title'] = $_POST['title'];
		// $storyData['text'] = $_POST['text'];
		// $storyData['userId'] = $_POST['userId'];
		// $storyData['location'] = 53;

		//print_r($storyData);

		// error checking ?

		if (!empty($storyData['title']) && !empty($storyData['body']) && !empty($storyData['id_author'])) {
			$newStoryId = $this->model->create($storyData);

			$tags = explode(',', $_POST['tags']);

			$this->model->createTags($newStoryId, $tags);
			header('location: ' . URL);
		} else {
			echo "pau";
			header('location: ' . URL . 'newstory');
		}
	}
}

?>