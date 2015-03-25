<?php

class NewStory_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function create($storyData) {
		return $this->db->insert('Story', $storyData);
		//$this->db->insert('User_Story', array('id_user' => $storyData['id_author'], 'id_story' => $newId));
	}

	public function createTags($storyId, $tags) {
		foreach ($tags as $key => $value) {
			// first, check if the tag has already been used / exists
			$tagId = $this->_tagExists($tags[$key]);

			// then (if it doesn't exist) get its id to create a new record in the story_tag table
			if ($tagId == -1) {
				$tagId = $this->db->insert('Tag', array(
					'text' => $tags[$key]));
			}

			$this->db->insert('Story_Tag', array(
				'id_tag' => $tagId,
				'id_story' => $storyId));
		}
	}

	private function _tagExists($tag) {
		$result = $this->db->select("SELECT id FROM Tag WHERE `text` = '$tag'");

		if (empty($result)) {
			return -1;
		} else {
			return $result[0]['id'];
		}
	}
}

?>