<?php
/*
 * License text here.
 * Author: Prasad
 * 
 */
include_once dirname(__FILE__) . '/src/controllers/Controller.php';
include_once dirname(__FILE__) . '/src/Session.php';

// Include files to let session variable unserialize properly
include_once dirname(__FILE__) . '/src/models/UserModel.php';

class IndexController extends Controller {
	
	function process(Request $request) {
		Session::init();
		
		$viewer = $this->viewer();
		$viewer->display('index.tpl');
	}
	
}

$controller = new IndexController();
$controller->process(new Request($_REQUEST));

?>