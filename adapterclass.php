<?php

/*
	Adapter pattern is like overriding interface methods using another class and without modifying the base code.
*/

//Book interface
interface Bookinterface{

	public function open();
	public function turnpage();
	
}

//Kindle interface

interface kindleinterface{

	public function turnOn();
	public function nextBtn();
}


// Class you using for reading
class Person{


	public function read(Bookinterface $book){
		$book->open();
		$book->turnpage();
	}
}

// class you want to use
class Kindle implements kindleinterface{

	public function turnOn(){
		 var_dump("kindle turned on");
	}

	public function nextBtn(){
		var_dump("next btnn pressed");
	}

}

//class you actually add to override bookinterface with kindleinterface by constructor injection
class KindleAdapter implements Bookinterface{

	private $kindle;

	 function __construct(kindleinterface $kindle){
		$this->kindle = $kindle;
	}


	public function open(){

		return $this->kindle->turnOn();
	}

	public function turnpage(){
		return $this->kindle->nextBtn();
	}

}


echo(new Person)->read(new KindleAdapter(new Kindle));