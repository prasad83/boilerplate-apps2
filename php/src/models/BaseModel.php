<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */

/**
 * Base model class
 */
class BaseModel {
	protected $values = array();
	
	function set($key, $value) {
		$this->values[$key] = $value;
	}
	
	function get($key, $defvalue='') {
		if (isset($this->values[$key])) return $this->values[$key];
		return $defvalue;
	}
}