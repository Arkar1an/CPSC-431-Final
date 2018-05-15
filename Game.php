<?php

class Game{

	private $date = null;
	private $away = null;
	private $home = null;
	private $homepts = 0;
	private $awaypts = 0;
        
	// date format for sql is 'YYYY-MM-DD'
	function date(){

		//get date
		if (func_num_args() == 0){
        	return $this->date;
    	}
    	// set date
    	else if (func_num_args() == 1) {
    		$this->date = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}	

		return $this;
	}

	function away(){

		//get away team
		if (func_num_args() == 0){
        	return $this->away;
    	}
    	// set away team
    	else if (func_num_args() == 1) {
    		$this->away = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function home(){

		//get home team
		if (func_num_args() == 0){
        	return $this->home;
    	}
    	// set home team
    	else if (func_num_args() == 1) {
    		$this->home = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function homepts(){

		//get home team points
		if (func_num_args() == 0){
        	return $this->homepts;
    	}
    	// set home team points
    	else if (func_num_args() == 1) {
    		$this->homepts = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function awaypts(){

		//get away team points
		if (func_num_args() == 0){
        	return $this->awaypts;
    	}
    	// set away team points
    	else if (func_num_args() == 1) {
    		$this->awaypts = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function __construct($date="",$away="",$home="",$awaypts=0,$homepts=0){

	$this->date($date);
    $this->away($away);
    $this->home($home);
    $this->awaypts($awaypts);
    $this->homepts($homepts);
 	}

 	function __toString(){
    	return (var_export($this, true));
  	}
}
?>