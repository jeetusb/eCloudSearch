<?php 

class eCloudSearchDocument {
	
	private $fields = array();
	private $id = null;
	private $version = null;
	
	public function __construct() {
		
	}
	
	public function set_id($id) {
		$this->id = $id;
	}
	
	public function set_version($version) {
		$this->version = $version;
	}
	
	public function set_field($field, $data) {
		$this->fields[$field] = $data;
	}
		
	public function get_id() {
		return $this->id;
	}
	
	public function get_version() {
		return $this->version;
	}
	
	public function get_fields() {
		return $this->fields;
	}
	
}

?>