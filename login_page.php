<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
</head>
<body style ="background-image:url('login.jpg');background-color: black; background-repeat: no-repeat; background-position: 50% -5% ;">


<?php

    

?>
	<table style = " width: 100%; margin-top: 25%">
		<tr>
			<th style = "width: 30%"></th>
			<th style = "width: 40%; color: white; text-align: center;">
			
			<form action="login.php" method="post"> 
			  <table style="margin: 0px auto; border: 0px; border-collapse:separate;">
              <tr>
                <td style="text-align: right; ">Username</td>
                <td><input type="text" name="username" value="" size="35" maxlength="250"/></td>
              </tr>

              <tr>
                <td style="text-align: right; ">Password</td>
               <td><input type="text" name="password" value="" size="35" maxlength="250"/></td>
              </tr>

              <tr>
               <td colspan="2" style=" text-align: center;"><input type="submit" value="login" /></td>
              </tr>
            </table>
			</form>
			
	
			</th>
			<th style = "width: 30%; "></th>
		</tr>
	</table>
        
</body>
</html>