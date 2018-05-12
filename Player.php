<?php

class Team{

    private $fName = null;
    private $lname = null;
    private $position = null;
    private $height = 0; //in inches
    private $weight = 0; //in pounds
    private $team = null;
    private $age = 0;

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

    // should be two characters {C, PG, SG, SF, PF}
    function position(){

        //get last name
        if (func_num_args() == 0){
            return $this->lName;
        }
        // set last name
        else if (func_num_args() == 1) {
            //TODO validate that position isone of the 5 enums
            $this->lName = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
        }
        return $this;
    }

    function height(){

		//get height in inches
		if (func_num_args() == 0){
        	return $this->height;
    	}
    	// set height in inches
    	else if (func_num_args() == 1) {
    		$this->height = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

    function weight(){

        //get weight in pounds
        if (func_num_args() == 0){
            return $this->weight;
        }
        // set weight in pounds
        else if (func_num_args() == 1) {
            $this->weight = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
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

	function __construct($fName="",$lName="",$position="",$height=0,$weight=0,$team="",$age=0){

	$this->fName($fName);
    $this->lName($lName);
    $this->position($position);
    $this->height($height);
    $this->weight($weight);
    $this->team($team);
    $this->age($age);
 	}

 	function __toString(){
    	return (var_export($this, true));
  	}
}
?>