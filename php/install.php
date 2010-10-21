<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */
include_once dirname(__FILE__) . '/src/controllers/Controller.php';

/**
 * Installer class.
 */
class InstallController extends Controller {
	
	function process(Request $request) {
		// $this->query("CREATE TABLE app_table (uid int auto_increment not null primary key, name varchar(255), pwd varchar(50), isactive int(1)))");		
	}
	
}

/* 
 * Allow only command line execution
 * php -f install.php
 */
if (isset($argc)) {
	$controller = new InstallController();
	$controller->process(new Request());
}

?>
