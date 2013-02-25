<?php 

class eCloudSearchResult {
	
	private $num_rows;
	
	public function __construct($results_obj) {
		$this->num_rows = $results_obj->hits->found;
		$this->results = $results_obj->hits->hit;
	}
	
	/**
	 *
	 * Returns the number of rows
	 * @return integer
	 *
	 */
	public function num_rows() {
		return $this->num_rows;
	}
	
	
	/**
	 *
	 * Returns a simple object with the first row of data.
	 * @return object
	 */
	public function row() {

		if($this->num_rows > 0) {

		return $this->results->hits->hit[0];
		
		} else {
			return false;
		}
	}
	
	/**
	 * Iterates through the results and returns an array of objects.
	 * @return array
	 */
	public function result() {
		if($this->num_rows > 1) {

			return $this->results->hits->hit;
			
		} elseif($this->num_rows == 1) {
			return array($this->row());
		} else {
			return array();
		}
	}
	
	
}
?>