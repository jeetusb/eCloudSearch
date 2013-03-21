<?php

class eCloudSearchDocument {

	private $fields = array();
	private $id = null;
	private $version = null;
	private $lang = 'en';
	private $type = 'add';

	public function __construct() {

	}

	public function set_id($id) {
		$this->id = $id;
		return $this;
	}

	public function set_version($version) {
		$this->version = $version;
		return $this;
	}

	public function set_field($field, $data) {

		if(is_array($data) || is_string($data)) {
			$this->fields[$field] = $data;
			return $this;
		} else {
			throw new Exception('Field types for eCouldSearchDocument must be text or an array.');
		}

	}

	public function set_lang($lang) {
		$this->lang = $lang;
		return $this;
	}

	public function get_lang() {
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

	/**
		 * @return the $type
		 */
	public function get_type() {
		return $this->type;
	}

	/**
		 * @param field_type $type
		 */
	public function set_type($type) {
		$this->type = $type;
	}



}

?>