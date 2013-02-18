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

	public function post_batch($post) {

		$file = tempnam(sys_get_temp_dir(), 'POST');
		file_put_contents($file, json_encode($post));


		$headers = array( "Content-Type: application/json" );

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://'.$this->get_document_endpoint().'/2011-02-01/documents/batch');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, TRUE);
   		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

		$result_decoded = json_decode($result);
		if($result_decoded->status == 'error') {
			throw new Exception('Could not post batch.');
		}
		
	}

}

?>