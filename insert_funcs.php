<?php
    require_once('connect_to_db.php');
    
    function insert_team($t_name,$t_executive) {
        
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "INSERT into Team values (?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ss',$t_name,$t_executive);
            $stmt->execute();
        }
    }
    
    function insert_player($p_fname,$p_lname,$p_position,$p_height,$p_weight,$p_team,$p_age){
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "INSERT into Player (p_fname,p_lname,p_position,p_height,p_weight,p_team,p_age) "
                    . "values (?,?,?,?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sssiisi',
                    $p_fname,
                    $p_lname,
                    $p_position,
                    $p_height,
                    $p_weight,
                    $p_team,
                    $p_age);
            $stmt->execute();
        }
    }
    
    function insert_coach($c_fname,$c_lname,$c_age,$c_team){
        
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "INSERT into Coach values (?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssis',
                    $c_fname,
                    $c_lname,
                    $c_age,
                    $c_team);
            $stmt->execute();
        }
        
    }
    
    function insert_bench($b_injurydate,$b_player,$b_injury,$b_returndate){
        
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "INSERT into Bench values (?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('siss',
                    $b_injurydate,
                    $b_player,
                    $b_injury,
                    $b_returndate);
            $stmt->execute();
        }
    }

    function insert_game($g_date,$g_away,$g_home,$g_awaypoints,$g_homepoints){
        
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "INSERT into Game values (?,?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sssii',
                    $g_date,
                    $g_away,
                    $g_home,
                    $g_awaypoints,
                    $g_homepoints);
            $stmt->execute();
        }
    }
    
    function insert_statistic($s_date,$s_away,$s_home,$s_player,$s_playingTimeMin,$s_playingTimeSec,$s_points,$s_assists,$s_rebounds){
        
        $db = db_connect();
        if( mysqli_connect_error() == 0 ){
            
            $query = "INSERT into Statistics values (?,?,?,?,?,?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('sssiiiiii',
                    $s_date,
                    $s_away,
                    $s_home,
                    $s_player,
                    $s_playingTimeMin,
                    $s_playingTimeSec,
                    $s_points,
                    $s_assists,
                    $s_rebounds);
            $stmt->execute();
        }
    }
    


?>

