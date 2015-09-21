<?php
class Cars{

	public $carDetails = array(
			array("Car_Maker"=>"BMW","Type"=>"3 Series","Price"=>20000,"Gear"=>"Manual","REG_no"=>"TK08 7GH"),
			array("Car_Maker"=>"BMW","Type"=>"1 Series","Price"=>7000,"Gear"=>"Manual","REG_no"=>"TG98 1JH"),
			array("Car_Maker"=>"Audi","Type"=>"A4","Price"=>9000,"Gear"=>"Manual","REG_no"=>"KU11 3FG"),
			array("Car_Maker"=>"Audi","Type"=>"TT","Price"=>16000,"Gear"=>"Manual","REG_no"=>"Y88 7GH")
	);

	public function getTotalPrice(){
		$total = 0;
		foreach($this->carDetails as $key=>$value){
			$total += $value["Price"];
		}
		return json_encode(array('total'=>$total));
	}

	public function getCarDetails($regNo){
		$carDetails = array();
		foreach ($this->carDetails as $key=>$value){
			if($regNo === $value["REG_no"]){
				array_push($carDetails, $this->carDetails[$key]);
			}
		}
		return json_encode($carDetails);
	}

	public function getCarDetailsWithPriceRange($start, $end){
		$carDetails = array();
		foreach ($this->carDetails as $key=>$value){
			if($value["Price"] >= $start && $value["Price"] <= $end){
				array_push($carDetails, $this->carDetails[$key]);
			}
		}
		return json_encode($carDetails);
	}
}