<!doctype html>
<html>
     <head>
          <meta charset="UTF-8" />
          <title>Biblioteka</title>
		  <link rel="stylesheet" href="style.css" type="text/css">
     </head>
     <body>
		<div class="menu">
			<ul class="ulmenu">
				<li class="mbutton center"><a href="index.php"><p>Strona główna</p></a></li>
				<li class="mbutton center"><a href="library.php"><p>Biblioteka</p></a></li>
				<li class="mbutton center"><a href="login.php"><p>Zaloguj</p></a></li>
				<li class="mbutton center"><a href="register.php"><p>Zarejestruj</p></a></li>
			</ul>
		</div>
		<div class="glowna">
		
			<?php
				include("config.php");
				session_start();
			   
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					// username and password sent from form 
					
					$myusername = mysqli_real_escape_string($db,$_POST['username']);
					$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
				  
					$sql = "SELECT id FROM czytelnicy WHERE login = '$myusername' and password = '$mypassword'";
					$result = mysqli_query($db,$sql);
					//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					//$active = $row['active'];
				  
					$count = mysqli_num_rows($result);
				  
					// If result matched $myusername and $mypassword, table row must be 1 row
					
					if($count == 1) {
						//session_register("myusername");
						$_SESSION['login_user'] = $myusername;
					 
					header("location: /zadanko/logon/listbook.php");
					}else {
						$error = "Zły login lub hasło";
						echo $error;
					}
				}
			?>
			</br>
			<h1>Zaloguj się do portalu</h1>
			</br>
			<div class="form">
				<form action = "" method = "post">
					<label>Login  :</label><input type = "text" name = "username" class = "box"/><br /><br/>
					<label>Hasło  :</label><input type = "password" name = "password" class = "box" /><br/><br/>
					<input type = "submit" value = " Zaloguj "/><br/>
				</form>
				</br>
				Nie masz konta?<a href= "register.php"> Zarejestruj się</a>	
			</div>
		</div>
     </body>
</html>