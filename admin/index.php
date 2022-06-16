<!doctype html>
<html>
     <head>
          <meta charset="UTF-8" />
          <title>Biblioteka</title>
		  <link rel="stylesheet" href="style.css" type="text/css">
     </head>
     <body>
      
		<h2>Enter Username and Password</h2> 
		<div class = "container form-signin">
			<?php
				include("config.php");
				session_start();
			   
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					// username and password sent from form 
					
					$myusername = mysqli_real_escape_string($db,$_POST['username']);
					$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
				  
					$sql = "SELECT id FROM admin WHERE login = '$myusername' and password = '$mypassword'";
					$result = mysqli_query($db,$sql);
					//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					//$active = $row['active'];
				  
					$count = mysqli_num_rows($result);
				  
					// If result matched $myusername and $mypassword, table row must be 1 row
					
					if($count == 1) {
						//session_register("myusername");
						$_SESSION['login_admin'] = $myusername;
					 
					header("location: start.php");
					}else {
						$error = "Your Login Name or Password is invalid";
					}
				}
			?>
		</div> <!-- /container -->
      
		<div class = "container">
      
			<form action = "" method = "post">
				<label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br/>
				<label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br/>
				<input type = "submit" value = " Submit "/><br/>
			</form>
			
			Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
		</div> 
      
   </body>
</html>