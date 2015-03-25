<?php

class Home_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getStoriesByLocation($locations = []) {
		// if $locations is empty, gets from any location

		$query = "SELECT Story.id, Story.id_author, Story.id_location, Story.title, User.name, Location.descr AS location_name, GROUP_CONCAT(Tag.id, '_', Tag.`text`) as Tags
					FROM Story, User, Location, Story_Tag, Tag
					WHERE Story.id_author = User.id AND
					Story.id_location = Location.id AND
					Story.id = Story_Tag.id_story AND
					Story_Tag.id_tag = Tag.id";
		
		/*$query = 'SELECT Story.id, Story.id_author, Story.id_location, Story.title, User.name, Location.descr AS location_name 
					FROM Story, User, Location 
					WHERE Story.id_author = User.id AND Story.id_location = Location.id';*/

		if (!empty($locations)) {
			$query .= ' AND ( ';

			foreach ($locations as $key => $value) {
				$query = $query . 'Story.id_location = ' . $value . ' OR ';
			}

			$query = substr($query, 0, strlen($query)-4) . ')';	// rtrim?
		}

		$query .= ' GROUP BY Story.id';

		return $this->db->select($query);


		// substituir pelo uso correto do db->select(a,b,c)?

	}

	public function getStoriesByTag($tag = '') {
		return $this->db->select("SELECT Story.id, Story.id_author, Story.id_location, Story.title, `User`.name, Location.descr AS location_name, Tag.text AS tag
									FROM Story, Story_Tag, `User`, Tag, Location
  									WHERE
									    Story.id_author = `User`.id AND
									    Story.id_location = Location.id AND
									    Story.id = Story_Tag.id_story AND
									    Tag.id = Story_Tag.id_tag AND
									    Story_Tag.id_tag = $tag");
	}

	public function updateUserData($userData) {
		$this->db->update('User', $userData, "id = " . Session::get('userId'));
	}

	public function getUserLocations($userId = '') {
		return $this->db->select('SELECT id_location FROM User_Location WHERE id_user = ' . $userId);
	}
}

?>