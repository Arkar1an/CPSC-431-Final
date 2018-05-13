<?php

class Statistic {

	private $date = null;
	private $away = null;
	private $home = null;
    	private $player = 0;
	private $min = 0;
	private $sec = 0;
	private $points = 0;
	private $assists = 0;
	private $rebounds = 0;

	// date format for sql is 'YYYY-MM-DD'
	function date(){

		//get date
		if (func_num_args() == 0){
        	return $this->date;
    	}
    	// set date
    	else if (func_num_args() == 1) {
    		$this->date = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
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

    function player(){

        //get player id
        if (func_num_args() == 0){
            return $this->player;
        }
        // set player id
        else if (func_num_args() == 1) {
            $this->player = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
        }
        return $this;
    }

	function min(){

		//get minutes
		if (func_num_args() == 0){
        	return $this->min;
    	}
    	// set minutes
    	else if (func_num_args() == 1) {
    		$this->min = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}	

		return $this;
	}

	function sec(){

		//get seconds
		if (func_num_args() == 0){
        	return $this->sec;
    	}
    	// set seconds
    	else if (func_num_args() == 1) {
    		$this->sec = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}	

		return $this;
	}

	function points(){

		//get points
		if (func_num_args() == 0){
        	return $this->points;
    	}
    	// set points
    	else if (func_num_args() == 1) {
    		$this->points = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function assists(){

		//get assists
		if (func_num_args() == 0){
        	return $this->assists;
    	}
    	// set assists
    	else if (func_num_args() == 1) {
    		$this->assists = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function rebounds(){

		//get rebounds
		if (func_num_args() == 0){
        	return $this->rebounds;
    	}
    	// set rebounds
    	else if (func_num_args() == 1) {
    		$this->rebounds = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function __construct($date="",$away="",$home="",$player=0,$min=0,$sec=0,$points=0,$assists=0,$rebounds=0){

	$this->date($date);
    $this->away($away);
    $this->home($home);
    $this->player($player);
    $this->min($min);
    $this->sec($sec);
    $this->points($points);
    $this->assists($assists);
    $this->rebounds($rebounds);
  }

  function __toString(){
    return (var_export($this, true));
  }

}

?>
