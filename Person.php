<?php
	class Person{

	private $email = null;
	private $username = null;
	private $fName = null;
	private $lName = null;
	private $address = null;
	private $city = null;
	private $state = null;
	private $zip = 0;

	function email(){

		//get email
		if (func_num_args() == 0){
        	return $this->email;
    	}
    	// set email
    	else if (func_num_args() == 1) {
    		$this->email = filter_var(func_get_arg(0),FILTER_SANITIZE_EMAIL);
    	}
		return $this;
	}

	function username(){

		//get username
		if (func_num_args() == 0){
        	return $this->username;
    	}
    	// set username
    	else if (func_num_args() == 1) {
    		$this->username = filter_var(func_get_arg(0),FILTER_SANITIZE_EMAIL);
    	}
		return $this;
	}

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

	function address(){

		//get address
		if (func_num_args() == 0){
        	return $this->adress;
    	}
    	// set email
    	else if (func_num_args() == 1) {
    		$this->address = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function city(){

		//get city
		if (func_num_args() == 0){
        	return $this->city;
    	}
    	// set city
    	else if (func_num_args() == 1) {
    		$this->city = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function state(){

		//get state
		if (func_num_args() == 0){
        	return $this->state;
    	}
    	// set state
    	else if (func_num_args() == 1) {
    		$this->state = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function zip(){
		//get email
		if (func_num_args() == 0){
        	return $this->zip;
    	}
    	// set email
    	else if (func_num_args() == 1) {
    		$this->zip = filter_var(func_get_arg(0),FILTER_SANITIZE_NUMBER_INT);
    	}
		return $this;
	}

	function __construct($email="",$username="",$fName="",$lName="",$street="",$city="",$state="",$zip=0){

	$this->email($email);
    $this->username($username);
    $this->fName($fName);
    $this->lName($lName);
    $this->street($street);
    $this->city($city);
    $this->state($state);
    $this->zip($zip);
    $this->country($country);
  }

  function __toString(){
    return (var_export($this, true));
  }

}
?>