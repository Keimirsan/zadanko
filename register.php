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
		
		<h1>Zarejestruj się</h1>
			</br>
			<div class="form">
				<form action = "" method = "post">
					<label>Login  :</label><input type = "text" name = "username" class = "box" required/><br /><br/>
					<label>Hasło  :</label><input type = "password" name = "password" class = "box" required/><br/><br/>
					<label>Powtórz hasło  :</label><input type = "password" name = "password1" class = "box" required/><br/><br/>
					<label>Imię i Nazwisko  :</label><input type = "text" name = "imie" class = "box" required/><br /><br/>
					<label>Data urodzenia   :</label><input type="date" name="date" value="" min="1910-01-01" max="2025-12-31" required/></br></br>
					<label>Płeć    :</label><select id="plec" name = "plec">
												<option value="1">Mężczyzna</option>
												<option value="2">Kobieta</option>
											</select></br></br>
					<input type = "submit" value = " Zarejestruj "/><br/>
				</form>
				</br></br>
				<?php
				include("config.php");
				session_start();
			   
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					// username and password sent from form 
					$login = mysqli_real_escape_string($db,$_POST['username']);
					$sqlCheck = mysqli_query($db,"select login from czytelnicy where czytelnicy.login = '$login' ");
					$row = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);
					//echo $row['login'];
					if(is_countable($row)){
						echo "Użytkownik z podanym loginem juz istnieje";
					}else{
							$myusername = mysqli_real_escape_string($db,$_POST['username']);
							$mypassword = mysqli_real_escape_string($db,$_POST['password']);
							$mypassword1 = mysqli_real_escape_string($db,$_POST['password1']);
							$myimie = mysqli_real_escape_string($db,$_POST['imie']);
							$mydate = mysqli_real_escape_string($db,$_POST['date']);
							$myplec = mysqli_real_escape_string($db,$_POST['plec']);
							
							$uppercase = preg_match('@[A-Z]@', $mypassword);
							$lowercase = preg_match('@[a-z]@', $mypassword);
							$number    = preg_match('@[0-9]@', $mypassword);
							$specialChars = preg_match('@[^\w]@', $mypassword);
							
							if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($mypassword) < 8) {
								echo 'Hasło powinno składać się z przynajmniej 8 znaków, powinno zawierać przynajmniej jedną dużą literę, liczbę oraz znak specjalny.';
							}
							else{
								if($mypassword != $mypassword1){
									$error = "Hasła muszą być takie same!";
									echo $error;
								}else{
									$sql = "INSERT INTO czytelnicy(login, password, imie, urodziny, plec) VALUES ('$myusername','$mypassword','$myimie', '$mydate', '$myplec')";
									$result = mysqli_query($db,$sql);
									echo "Pomyślnie zarejestrowano";
								}
							}
						}					
				}
				?>
		</div>
     </body>
</html>