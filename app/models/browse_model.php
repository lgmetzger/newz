<?php

class Browse_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getLocations() {
		return $this->db->select("SELECT id, id_type, descr, user_count FROM Location ORDER BY id_type");
	}
}

?>