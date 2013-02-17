<?php 
/*
 * Easy Cloud Search
 * @version 1.0
 * @author Bryan Henry
 */

class eCloudSearch {
	
	const host = '';
	
	public function __construct($host=null) {
		
		if($host == null) {
			throw new Exception('You must specify a cloudsearch host.');
		}
	}
	
	public function add_document($array) {
		
	}
	
	public function add_batch_document() {
		
	}

	public function delete($id) {
		
	}
	public function save() {
		
	}
	
}
?>