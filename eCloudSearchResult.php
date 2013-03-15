<?php

class eCloudSearchResult {

	private $num_rows;

	public function __construct($results_obj) {
		$this->num_rows = $results_obj->hits->found;

		foreach($results_obj->hits->hit as $value) {

			foreach($value->data as $name => $data) {

				if(sizeof($data) == 1) {
				$value->{$name} = $data[0];
				} elseif(sizeof($data) > 1) {
				$value->{$name} = $data;
				} else {
				$value->{$name} = null;
				}

			}
			unset($value->data);

		}

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

		return $this->results[0];

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

			return $this->results;

		} elseif($this->num_rows == 1) {
			return array($this->row());
		} else {
			return array();
		}
	}


}
?>