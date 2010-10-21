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
		$this->query("CREATE TABLE fileshare_file (id int auto_increment not null primary key, name varchar(255), type varchar(20), size int) ");
		$this->query("CREATE TABLE fileshare_filekey (uid varchar(255), fileid int, usecount int, expireson date)");		
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