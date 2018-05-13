<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<style>
	a:link {
    color: white;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
}
a:hover {
    color: grey;
    background-color: transparent;
    text-decoration: underline;
}
a:active {
    color: orange;
    background-color: transparent;
    text-decoration: underline;
}
	</style>
</head>
<body style ="background-image:url('editor_page.jpg');background-color: black; background-repeat: no-repeat; background-position: 50% -5% ;">

<?php



?>
 <table style="width: 100%; border:0px solid black; border-collapse:collapse; background-color: black">
	<tr>
		<th style= "width: 10%"><a href="main_page.php">Home</a></th>
		<th style="width: 5%">  </th>
		<th style= "width: 10%"><a href="lookup_page.php">Lookup</a></th>
		<th style="width: 5%">  </th>
		<th style="width:10%" ><a href="editor_tools.php">Editor Tools</a></th> 
		<th style="width: 5%">  </th>
		<th style="width:10%" ><a href="admin_tools.php">Admin Tools</a></th> 
		<th style="width: 35%"></th>
		<th style="width: 10%; text-align: right;"><a href="home_page">Logout</a></th>
		
		<!--<form action="/lookup.php">
			<td colspan="1" style=" text-align: center;"><input type="submit" value="login" /></td>
		</form>-->
	</tr>
</table >

    <!-- DELETE FROM TEAM -->

    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Team</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_team.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Team Name</td>
              <td><select name="t_name" required>
                  <option value="" selected disabled hidden>Choose team to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT t_name FROM Team ";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($t_name);
                    while($stmt->fetch()){
                        echo'<option value="'.$t_name.'">'.$t_name.'</option>';
                    }
                    $stmt->free_result();
                  }
                 
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>
	
	<!--     DELETE FROM PLAYER    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Player</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_player.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Player Name</td>
              <td><select name="p_ID" required>
                  <option value="" selected disabled hidden>Choose player to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT p_ID, p_fname, p_lname FROM Player ";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($p_ID,$p_fname,$p_lname);
                    while($stmt->fetch()){
                        echo'<option value="'.$p_ID.'">'.$p_fname.', '.$p_lname.'</option>';
                    }
                    $stmt->free_result();
                  }
                  
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>
	
	
        	<!--     DELETE FROM COACH    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Coach</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_coach.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Coach Name</td>
              <td><select name="c_ID" required>
                  <option value="" selected disabled hidden>Choose coach to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT c_ID, c_fname, c_lname FROM Coach ";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($c_ID,$c_fname,$c_lname);
                    while($stmt->fetch()){
                        echo'<option value="'.$c_ID.'">'.$c_fname.', '.$c_lname.'</option>';
                    }
                    $stmt->free_result();
                  }
                  
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>
	
		<!--     DELETE FROM BENCH    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Bench</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_bench.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Date</td>
              <td><select name="bench" required>
                  <option value="" selected disabled hidden>Choose a date</option>
                  <?php
                  require_once ('connect_to_db.php');
                  require_once ('Bench.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT b_injurydate,b_player,p_fname,p_lname "
                            . "FROM Bench,Player "
                            . "WHERE b_player = p_ID";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($b_injurydate,$b_player,$p_fname,$p_lname);
                    
                    while($stmt->fetch()){
                        $ben = new Bench($b_injurydate, $b_player);
                        echo'<option value="'.$ben.'">'.$b_injurydate.' '.$p_fname.', '.$p_lname.'</option>';
                    
                    }
                    $stmt->free_result();
                    
                  }
                  
                  ?>
                  </select></td>
              </tr>
       
              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>
	
	
            	<!--     DELETE FROM GAME    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Game</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_game.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Game</td>
              <td><select name="game" required>
                  <option value="" selected disabled hidden>Choose game to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  require_once ('Game.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT g_date, g_away, g_home FROM Game ";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($g_date,$g_away,$g_home);
                    while($stmt->fetch()){
                        $game = new Game($g_date, $g_away, $g_home);
                        echo'<option value="'.$game.'">'.$g_date.' '.$g_home.' vs '.$g_away.'</option>';
                    }
                    $stmt->free_result();
                  }
                  
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>
	
                
                
            	<!--     DELETE FROM STATISTIC    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Statistics</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_statistic.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Statistic</td>
              <td><select name="stat" required>
                  <option value="" selected disabled hidden>Choose statistic to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  require_once ('Statistic.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT s_date, s_away, s_home, s_player, p_fname, p_lname "
                            . "FROM Statistics, Player "
                            . "WHERE s_player = p_ID ";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($s_date,$s_away,$s_home,$s_player,$p_fname,$p_lname);
                    while($stmt->fetch()){
                        $stat = new Statistic($s_date, $s_away, $s_home, $s_player);
                        echo'<option value="'.$stat.'">'.$s_date.' '.$s_away.' vs '.$s_home.' :'.$p_fname.', '.$p_lname.'</option>';
                    }
                    $stmt->free_result();
                  }
                  
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>           
    
                
    <!--     DELETE FROM ACCOUNT    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Account</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_account.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Account</td>
              <td><select name="a_username" required>
                  <option value="" selected disabled hidden>Choose account to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT a_username "
                            . "FROM Account ";
                            
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($a_username);
                    while($stmt->fetch()){
                        
                        echo'<option value="'.$a_username.'">'.$a_username.'</option>';
                    }
                    $stmt->free_result();
                  }
                  
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>               
                
	
    <!--     DELETE FROM PERSON    -->
	
    <table style="width: 100%; border:0px solid black; border-collapse:collapse; ">
      <tr>
        <th style="width: 100%; color: red;">Delete From Person</th>
      </tr>
      <tr>
        <td style="vertical-align:top; border:1px solid black;background-color: gray">
          
          <form action="delete_person.php" method="post">
            <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; background:darkgrey;">Person</td>
              <td><select name="per_ID" required>
                  <option value="" selected disabled hidden>Choose person to delete</option>
                  <?php
                  require_once ('connect_to_db.php');
                  require_once ('Statistic.php');
                  $db = db_connect();
                  if( mysqli_connect_error() == 0 ){
            
                    $query = "SELECT per_ID,per_fname,per_lname "
                            . "FROM Person ";
                            
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($per_ID,$per_fname,$per_lname);
                    while($stmt->fetch()){
                        
                        echo'<option value="'.$per_ID.'">'.$per_fname.', '.$per_lname.'</option>';
                    }
                    $stmt->free_result();
                  }
                  
                  ?>
                  </select></td>
              </tr>

              <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" value="Delete" /></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>   
    
    
    
</body>
</html>