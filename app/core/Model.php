<?php

class Model  {
	public function __construct() {
		//echo "base model construct<br/>";
		$this->db = new Database();
	}
}

?>