<?php

class Team{

    private $name = null;
    private $executive = null;

    function name(){

        //get team name
        if (func_num_args() == 0){
            return $this->name;
        }
        // set team name
        else if (func_num_args() == 1) {
            $this->name = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
        }
        return $this;
    }

	function executive(){

		//get exectuive name
		if (func_num_args() == 0){
        	return $this->executive;
    	}
    	// set executive name
    	else if (func_num_args() == 1) {
    		$this->executive = filter_var(func_get_arg(0),FILTER_SANITIZE_STRING);
    	}
		return $this;
	}

	function __construct($name="",$executive=""){

	   $this->name($name);
       $this->executive($executive);
 	}

 	function __toString(){
    	return (var_export($this, true));
  	}
}
?>