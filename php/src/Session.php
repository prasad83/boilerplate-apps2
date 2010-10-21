<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */

/**
 * Session class
 */
class Session {
	
	/**
	 * Initialize session
	 */
	static function init() {
		@session_start();
	}
	
	/**
	 * Invalidate session
	 */
	static function invalidate() {
		@session_destroy();
	}
	
	/**
	 * Get value from session by key
	 */
	static function get($key, $defvalue='') {
		if (isset($_SESSION) && isset($_SESSION[$key])) return $_SESSION[$key];
		return $defvalue;
	}
	
	/**
	 * Set value in session for key
	 */
	static function set($key, $value) {
		$_SESSION[$key] = $value;
	}
}

?>