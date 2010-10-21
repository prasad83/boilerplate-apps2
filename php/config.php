<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */

/**
 * Application configuration to be provided by user.
 */
class UserConfiguration {
	
	/**
	 * Helper function to retrieve the configuration value by key
	 */
	static function get($key, $defvalue=false) {
		if (isset(self::$values[$key])) return self::$values[$key];
		return $defvalue;
	}
	
	/**
	 * Configuration values mapped with key
	 */
	static $values = array(
	
		'database' => array(
			'host' => 'localhost:3306',
			'name' => 'dbname',
			'user' => 'username',
			'pwd'  => 'password'			
		)
		
	);
	
}

?>