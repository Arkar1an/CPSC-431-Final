<?php

class Bench{

	private $injuryDate = 0;
	private $player = 0;
	private $injury = null;
	private $returnDate = 0;

	// date format is 'YYYY-MM-DD'
	function injuryDate(){

		//get date of injury
		if (func_num_args() == 0){
        	return $this->injuryDate;
    	}
    	// set date of injury
    	else if (func_num_args() == 1) {
    		$this->injuryDate = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function player(){

		//get player ID
		if (func_num_args() == 0){
        	return $this->player;
    	}
    	// set player ID
    	else if (func_num_args() == 1) {
    		$this->player = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function injury(){

		//get injury
		if (func_num_args() == 0){
        	return $this->injury;
    	}
    	// set injury
    	else if (func_num_args() == 1) {
    		$this->injury = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	// date format is 'YYYY-MM-DD'
	function returnDate(){

		//get date of return
		if (func_num_args() == 0){
        	return $this->returnDate;
    	}
    	// set date of return
    	else if (func_num_args() == 1) {
    		$this->returnDate = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function __construct($injuryDate=0,$player=0,$injury="",$returnDate=0){

	$this->injuryDate($injuryDate);
    $this->player($player);
    $this->injury($injury);
    $this->returnDate($returnDate);
 	}

 	function __toString(){
    	return (var_export($this, true));
  	}
}

?>