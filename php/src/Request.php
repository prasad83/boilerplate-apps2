<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */

/**
 * Request class
 */
class Request {
	private $valuemap;
	private $rawvaluemap;
	private $defaultmap = array();
	
	function __construct($values, $rawvalues = array(), $stripifgpc=true) {
		$this->valuemap = $values;
		$this->rawvaluemap = $rawvalues;
		if ($stripifgpc && get_magic_quotes_gpc()) {
			$this->stripslashes_recursive($this->valuemap);
		}
	}
	
	function stripslashes_recursive($value) {
		$value = is_array($value) ? array_map(array($this, 'stripslashes_recursive'), $value) : stripslashes($value);
		return $value;
	}

	function get($key, $defvalue = '') {
		if(isset($this->valuemap[$key])) {
			return $this->valuemap[$key];
		}
		if($defvalue === '' && isset($this->defaultmap[$key])) {
			$defvalue = $this->defaultmap[$key];
		}
		return $defvalue;
	}
	
	function has($key) {
		return isset($this->valuemap[$key]);
	}
	
	function getRaw($key, $defvalue = '') {
		if (isset($this->rawvaluemap[$key])) {
			return $this->rawvaluemap[$key];
		}
		return $this->get($key, $defvalue);
	}
	
	function set($key, $newvalue) {
		$this->valuemap[$key]= $newvalue;
	}
	
	function setDefault($key, $defvalue) {
		$this->defaultmap[$key] = $defvalue;
	}
	
	function getOperation() {
		return $this->get('_operation');
	}
	
	function getSession() {
		return $this->get('_session');
	}
}