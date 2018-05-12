<?php

class Coach{

	private $fName = null;
	private $lname = null;
	private $age = 0;
	private $team = null;

	function fName(){

		//get first name
		if (func_num_args() == 0){
        	return $this->fName;
    	}
    	// set first name
    	else if (func_num_args() == 1) {
    		$this->fName = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function lName(){

		//get last name
		if (func_num_args() == 0){
        	return $this->lName;
    	}
    	// set last name
    	else if (func_num_args() == 1) {
    		$this->lName = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function age(){

		//get age
		if (func_num_args() == 0){
        	return $this->age;
    	}
    	// set age
    	else if (func_num_args() == 1) {
    		$this->age = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function team(){

		//get team name
		if (func_num_args() == 0){
        	return $this->team;
    	}
    	// set team name
    	else if (func_num_args() == 1) {
    		$this->team = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function __construct($fName="",$lName="",$age=0,$team=""){

	$this->fName($fName);
    $this->lName($lName);
    $this->age($age);
    $this->team($team);
 	}

 	function __toString(){
    	return (var_export($this, true));
  	}
}
?>