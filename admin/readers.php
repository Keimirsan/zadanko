<?php
	include("config.php");
	session_start();
?>
<html>
     <head>
		<meta http-equiv="Cache-control" content="no-store"/>
        <meta charset="UTF-8" />
        <title>Biblioteka</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
     </head>
     <body>
		<div class="menu">
			<ul class="ulmenu">
				<li class="mbutton center"><a href="start.php"><p>Strona główna</p></a></li>
				<li class="mbutton center"><a href="books.php"><p>Książki</p></a></li>
				<li class="mbutton center"><a href="readers.php"><p>Czytelnicy</p></a></li>
				<li class="mbutton center"><a href="stats.php"><p>Statystyka</p></a></li>
				<li class="mbutton center"><a href="logout.php"><p>Wyloguj</p></a></li>
			</ul>
		</div>
		<div class="glowna">
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					//echo 'add';
					$login = mysqli_real_escape_string($db,$_POST['login']);
					$haslo = mysqli_real_escape_string($db,$_POST['haslo']);
					$imie = mysqli_real_escape_string($db,$_POST['imie']);
					
					$sql = "INSERT INTO czytelnicy(login, password, imie) VALUES ('$login','$haslo','$imie')";
					$result = mysqli_query($db,$sql);
					//echo $result;
				}
			?>
			<form action = "" method = "post">
				<h2>Dodaj Czytelnika</h2>
				<label>Login: </label><input type = "text" name = "login" class = "box" required/><br/><br/>
				<label>Hasło: </label><input type = "text" name = "haslo" class = "box" required/><br/><br/>
				<label>Imię i Nazwisko: </label><input type = "text" name = "imie" class = "box" required/><br/><br/>
				<input type = "submit" value = " Submit "/><br/>
			</form>
			<div>
				<h2>Lista Czytelników</h2>
				<ul class = "lista">
					<?php
						$sql = "SELECT * FROM czytelnicy";
						$result = mysqli_query($db,$sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<li><div>id: ".$row['id']." | Imię i Nazwisko: ".$row['imie']." | <form action='deleteuser.php' method='post'><input type='submit' name='delete' value=".$row['id']." /></form></li>";
							} //.$row['id'].
						} else {
							echo "0 results";
						}
					?>
				</ul>
			</div>
		</div>
    </body>
</html>