<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */
include_once dirname(__FILE__) . '/../../third-party/Smarty/libs/Smarty.class.php';

/**
 * Viewer class
 */
class Viewer extends Smarty {
	
	function __construct() {
		parent::__construct();
		$this->template_dir = dirname(__FILE__) . '/../../templates/';
		$this->compile_dir = dirname(__FILE__) . '/../../writeable/templates_c/';
	}
	
}


?>