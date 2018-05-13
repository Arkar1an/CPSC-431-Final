<?php

    require_once('connect_to_db.php');

    function delete_team($t_name){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Team WHERE t_name = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('s',$t_name);
            $stmt->execute();
        }
    }
    
    function delete_player($p_ID){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Player WHERE p_ID = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i',$p_ID);
            $stmt->execute();
        }
    }
        
    function delete_coach($c_ID){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Coach WHERE c_ID = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i',$c_ID);
            $stmt->execute();
        }
    }
        
    function delete_bench($b_injurydate,$b_player){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Bench WHERE b_injurydate = ? AND b_player = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('si',$b_injurydate,$b_player);
            $stmt->execute();
        }
    }
    
    function delete_game($g_date,$g_away,$g_home){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Game WHERE g_date = ? AND g_away = ? AND g_home = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sss',$g_date,$g_away,$g_home);
            $stmt->execute();
        }
    }
        
    function delete_statistic($s_date,$s_away,$s_home,$s_player){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Statistics "
                    . "WHERE s_date = ? AND s_away = ? AND s_home = ? AND s_player = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sssi',$s_date,$s_away,$s_home,$s_player);
            $stmt->execute();
        }
    }
        
    function delete_account($a_username){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Account WHERE  a_username = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('s',$a_username);
            $stmt->execute();
        }
    }
        
    function delete_person($per_ID){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "DELETE FROM Person WHERE per_ID = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i',$per_ID);
            $stmt->execute();
        }
    }






?>
