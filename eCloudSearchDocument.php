<?php 

class eCloudSearchDocument {
	
	private $fields = array();
	private $id = null;
	private $version = null;
	private $lang = 'en';
	
	public function __construct() {
		
	}
	
	public function set_id($id) {
		$this->id = $id;
	}
	
	public function set_version($version) {
		$this->version = $version;
	}
	
	public function set_field($field, $data) {
		
		if(is_array($data) || is_string($data)) {
			$this->fields[$field] = $data;	
		} else {
			throw new Exception('Field types for eCouldSearchDocument must be text or an array.');
		}
		
	}
		
	public function set_lang($lang) {
		$this->lang = $lang;
	}
	
	public function get_lang($lang) {
		return $this->lang;
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