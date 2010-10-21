<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */
include_once dirname(__FILE__) . '/src/controllers/Controller.php';

/**
 * Controller for administrator tasks.
 */
class AdministratorController extends Controller {
	
	function process(Request $request) {
		echo "Administrator login";
	}	
}

$controller = new AdministratorController();
$controller->process(new Request($_REQUEST));

?>