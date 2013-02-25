<?php 
/*
 * Easy Cloud Search
 * @version 1.0
 * @author Bryan Henry
 */

require 'eCloudSearchHTTP.php';
require 'eCloudSearchResult.php';

class eCloudSearch extends eCloudSearchHTTP {
	
	private $documents = array();
//	private $json_documents = new stdClass();
	
	public function __construct() {
		if(!function_exists('curl_init')) {
			throw new Exception('CURL must be installed to use this library.');
		}
	}
	
	public function find($text, $fields=null, $start=null, $limit=null) {

		if(strlen($text) == 0) {
			throw new Exception('Blank searchs are not allowed.');
		}
		
		$result = $this->get_search($text, $fields, $start, $limit);
		return new eCloudSearchResult($result);
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
		
		$this->post_batch($this->json_documents);
		$this->json_documents = array();
		$this->documents = array();
		
	}
	
}
?>