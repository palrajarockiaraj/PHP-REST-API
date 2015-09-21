<?php
require_once 'API.class.php';
require_once 'cars.php';

class MyAPI extends API
{
	private $cars;
	
	public function __construct($request){
		parent::__construct($request);
		$this->cars = new Cars();
	}

	protected function total(){
		if($this->method == 'GET'){
			echo $this->cars->getTotalPrice();exit;
		} else {
			return json_encode(array('error'=>'Method Not Allowed'));
		}
	}
	
	protected function car(){
		if($this->method == 'GET'){
			echo $this->cars->getCarDetails($this->verb);exit;
		} else {
			return json_encode(array('error'=>'Method Not Allowed'));
		}
	}
	
	protected function car_price(){
		if($this->method == 'POST'){
			print_r($this->args);exit;
		} else {
			return json_encode(array('error'=>'Method Not Allowed'));
		}
	}
}