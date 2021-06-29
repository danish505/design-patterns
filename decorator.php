<?php


interface Services{

	public function getcost();
}



class OilChange implements Services{

	 
	 public function getcost(){
	 	return 10;
	 }


}

class OilChangeAndTireRotation implements Services{

	protected $oil;

	function __construct(OilChange $oil){
		$this->oil = $oil;
	}
	public function getCost(){
		return $this->oil + 25;		
	}

}

echo (new OilChangeAndTireRotation(new OilChange()))->getcost();