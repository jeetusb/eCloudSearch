<?php 
/*
 * Easy Cloud Search
 * @version 1.0
 * @author Bryan Henry
 */

require 'eCloudSearchHTTP.php';

class eCloudSearch extends eCloudSearchHTTP {
	
	private $documents = array();
	
	public function __construct() {
	}
	
	public function add_document($obj) {
		if(!$obj instanceof eCloudSearchDocument) {
			throw new Exception('Document must be an eCloudSearchDocument object.');	
		}
		
		if($obj->get_id() == null) {
			throw new Exception('eCloudSearchDocument must have an id before adding.');
		}
		
		if($obj->get_version() == null) {
			$obj->set_version(1);
		}
		
		$this->documents[] = $obj;
	}
	

	public function delete($id) {
		
	}
	
	public function save() {
		
		if(sizeof($this->documents) == 0) {
			throw new Exception('No documents to save.');
		}
		
		if($this->get_document_endpoint() == null) {
			throw new Exception('No document endpoint specified');
		}
		
		foreach($this->documents as $document_object) {
			echo json_encode($document_object);
		}
		
	}
	
}
?>