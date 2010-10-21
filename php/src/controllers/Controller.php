<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */
include_once dirname(__FILE__) . '/../../config.php';
include_once dirname(__FILE__) . '/../connectors/DBConnector.php';
include_once dirname(__FILE__) . '/../viewers/Viewer.php';
include_once dirname(__FILE__) . '/../Request.php';

/**
 * Abstract controller class
 */
abstract class Controller {
	
	static $dbinstance = false;
	
	/**
	 * Abstract function to be defined in sub-classes.
	 */
	abstract function process(Request $request);
	
	/**
	 * Viewer instance
	 */
	function viewer() {
		return new Viewer();
	}
	
	/**
	 * Database instance
	 */
	function db() {
		if (self::$dbinstance === false) {
			$dbconfig = UserConfiguration::get('database');
			self::$dbinstance = DBConnector::getInstance($dbconfig['host'], $dbconfig['user'], 
				$dbconfig['pwd'], $dbconfig['name'] );
			self::$dbinstance->query("SET NAMES UTF8");
		}
		return self::$dbinstance;
	}
	
	function query($sql, $params=false) {
		return $this->db()->query($sql, $params);
	}
	
}

?>