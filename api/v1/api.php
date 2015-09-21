<?php
require_once '../../class/MyAPI.class.php';

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
	$_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
	$API = new MyAPI($_REQUEST['request']);
	echo $API->processAPI();
} catch (Exception $e) {
	echo json_encode(array('error' => $e->getMessage()));
}