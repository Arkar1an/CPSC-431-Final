<?php

class Account{
    
    private $username = null;
    private $password = null;
    private $role = null;
    
    function username(){
        
        //get email
	if (func_num_args() == 0){
            return $this->username;
    	}
    	// set email
    	else if (func_num_args() == 1) {
            $this->username = filter_var(func_get_arg(0),FILTER_SANITIZE_EMAIL);
    	}
	return $this;
    }
    
    function password(){
        
        //get email
	if (func_num_args() == 0){
            return $this->password;
    	}
    	// set email
    	else if (func_num_args() == 1) {
            $this->password = filter_var(func_get_arg(0),FILTER_SANITIZE_EMAIL);
    	}
	return $this;
    }
    
    function role(){
        
        //get email
	if (func_num_args() == 0){
            return $this->role;
    	}
    	// set email
    	else if (func_num_args() == 1) {
            $temp = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
            if ($temp == "observer" || 
                    $temp == "user" ||
                    $temp == "manager"){
                $this->role = $temp;
            }
    	}
	return $this;
    }
    
    function __construct($username="",$password="",$role=""){

    $this->username($username);
    $this->password($password);
    $this->role($role);
    
    }

    function __toString(){
        return (var_export($this, true));
    }
}
?>

