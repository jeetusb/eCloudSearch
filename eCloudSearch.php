<?php 
/*
 * Easy Cloud Search
 * @version 1.0
 * @author Bryan Henry
 */

require 'eCloudSearchHTTP.php';

class eCloudSearch extends eCloudSearchHTTP {
	
	private $documents = array();
	private $json_documents = array();
	
	public function __construct() {
//		if(!function_exists('http_post_fields')) {
//			throw new Exception('PECL_HTTP must be installed to use this library.');
//		}
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
			
			$json_obj->type = 'add';
			$json_obj->id = $document_object->get_id();
			$json_obj->lang = $document_object->get_lang();
			$json_obj->version = $document_object->get_version();
			$json_obj->fields = $document_object->get_fields();
			
			
			$this->json_documents[] = $json_obj;
				
			
		}
		
		$this->post($this->json_documents);
		
	}
	
}
?>