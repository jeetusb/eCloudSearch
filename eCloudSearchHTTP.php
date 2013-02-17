<?php 

class eCloudSearchHTTP {
	
	private $search_endpoint = null;
	private $document_endpoint = null;
	
	
	public function set_document_endpoint($url) {

		$this->document_endpoint = $url;
		
	}
	
	public function set_search_endpoint($url) {
		$this->search_endpoint = $url;
	}

	public function get_document_endpoint() {
		return $this->document_endpoint;
	}
	
	public function get_search_endpoint() {
		return $this->search_endpoint;
	}
	
	public function post($url, $post) {
		
	}
	
}

?>