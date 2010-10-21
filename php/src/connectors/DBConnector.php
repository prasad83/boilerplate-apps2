<?php
include_once dirname(__FILE__) . '/../../third-party/MDB2/MDB2.php';

class DBConnector {
	
	var $connector = false;
	var $lastError = false;
	
	function __construct($config) {
		$dsn = array(
			'phptype' => $config['type'],
			'username'=> $config['user'],
			'password'=> $config['pwd'],
			'hostspec'=> $config['host'],
			'database'=> $config['name']
		);

		if($this->connector === false) {
			$this->connector = MDB2::singleton($dsn);
			if(PEAR::isError($this->connector)) {
				echo "Connecting to database failed!";
				$this->connector = false;
				return;
			}
		}
		$this->connector->setFetchMode(MDB2_FETCHMODE_ASSOC);
	}
	
	function close() {
		$this->connector->disconnect();
	}
	
	function query($sql, $params = array(), $types = false) {
		$this->lastError = false;

		$result = false;
		if(empty($params)) {
			$result = $this->connector->query($sql);
		} else {
			if($types === false) {
				$types = array_fill(0, count($params), 'text');
			}
			$stmt = $this->connector->prepare($sql, $types, MDB2_PREPARE_RESULT);
			if(!PEAR::isError($stmt)) {
				$result = $stmt->execute($params);
				$stmt->free();
			} else {
				$this->lastError = $result;
				return false;
			}			
		}
		if(PEAR::isError($result)) {
			$this->lastError = $result;
			$result = false;
		}
		return $result;
	}
	
	function getLastInsertId() {
		return $this->connector->lastInsertID();
	}
	
	function __destruct() {
		if($this->connector) {
			$this->connector->disconnect();
			$this->connector = false; 
		}		
	}
	
	function setOption($key, $value) {
		$this->connector->setOption($key, $value);
	}
	
	static function getInstance($hostname, $username, $password, $dbname, $type='mysql') {
		$config = array('type' => $type, 'host'=>$hostname, 'user' => $username, 'pwd' => $password, 'name' => $dbname);
		$instance = new self($config);

		// NOTE: MDB2 directory should be on the include_path if it is not installed via pear!
		self::includePath('../../third-party/MDB2');
		
		return $instance;
	}
	
	static function includePath($relpath) {
		$fullpath = dirname(__FILE__) . "/{$relpath}";
		$ini_include_path = ini_get('include_path');
		if(strpos($fullpath, $ini_include_path) === false) {
			ini_set('include_path', $ini_include_path . PATH_SEPARATOR . $fullpath);
		}
	}
	
}

