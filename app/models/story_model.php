<?php

class Story_model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getStoryData($storyId) {
		$query = "SELECT Story.id, Story.id_author, Story.id_location, Story.title, Story.body, Story.view_count, User.name,
						Location.descr, GROUP_CONCAT(Tag.id, '_', Tag.`text`) as Tags
					FROM Story, User, Location, Story_Tag, Tag
					WHERE Story.id_author = User.id AND
					Story.id_location = Location.id AND
					Story.id = Story_Tag.id_story AND
					Story_Tag.id_tag = Tag.id AND
					Story.id = $storyId
					GROUP BY Story.id";


		return $this->db->select($query);
	}

	public function updatePositiveCount($storyId) {
		$this->db->updateCounter('Story', 'positives', $storyId);
	}

	public function updateNegativeCount($storyId) {
		$this->db->updateCounter('Story', 'negatives', $storyId);
	}

	public function updateViewCount($storyId) {
		$this->db->updateStoryViewCount($storyId);
	}
}

?>