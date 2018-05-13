<?php

require_once('Adaptation.php');

function db_connect(){
    //this is what it needs to be once session variable has been situated
    //$result = new mysqli('DATA_BASE_HOST', $_SESSION['role'], $_SESSION['role_pass'], 'DATA_BASE_NAME');
    $result = new mysqli(DATA_BASE_HOST, MANAGER, MANAGER_PASS, DATA_BASE_NAME);
    if (!$result) {
        throw new Exception('Could not connect to database server');
    } 
    else {
        return $result;
   }
}



?>

