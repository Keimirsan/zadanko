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
					$urodziny = mysqli_real_escape_string($db,$_POST['urodziny']);
					$plec = mysqli_real_escape_string($db,$_POST['plec']);
					
					$sql = "INSERT INTO czytelnicy(login, password, imie, urodziny, plec) VALUES ('$login','$haslo','$imie', '$urodziny', '$plec')";
					$result = mysqli_query($db,$sql);
					//echo $result;
				}
			?>
			<form action = "" method = "post">
				<h2>Dodaj Czytelnika</h2>
				<label>Login: </label><input type = "text" name = "login" class = "box" required/><br/><br/>
				<label>Hasło: </label><input type = "text" name = "haslo" class = "box" required/><br/><br/>
				<label>Imię i Nazwisko: </label><input type = "text" name = "imie" class = "box" required/><br/><br/>
				<label>Data Urodzenia: </label><input type = "date" name = "urodziny" class = "box" required/><br/><br/>
				<label>Płeć: </label>
					<select name = "plec">
						<option value = "1">Mężczyzna</option>
						<option value = "2">Kobieta</option>
					</select>
				<br/><br/>
				<input type = "submit" value = " Submit "/><br/>
			</form>
			<div>
				<h2>Lista Czytelników</h2>
				<ul class = "lista">
					<?php
						$plec = array("Nieokreślono", "Mężczyzna", "Kobieta");
						$sql = "SELECT * FROM czytelnicy";
						$result = mysqli_query($db,$sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<li><div>id: ".$row['id']." | Imię i Nazwisko: ".$row['imie']." | Data Urodzenia: ".$row['urodziny']." | Płeć: ".$plec[$row['plec']]." | </div><form action='deleteuser.php' method='post'>&nbsp<button type='submit' name='delete' value=".$row['id'].">Usuń</button></form></li>";
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