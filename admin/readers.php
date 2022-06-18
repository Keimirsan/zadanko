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
			<form action = "adduser.php" method = "post">
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
				<?php 
					if(isset($_SESSION['istnieje'])){
						if ($_SESSION['istnieje'] == 1){
							echo "Użytkownik z podanym loginem juz istnieje!";
						}
					}
					unset($_SESSION['istnieje']);
				?>
			</form>
			<table class="tablica">
					<tr>
						<th>Imię i Nazwisko</th>
						<th>Data Urodzenia</th>
						<th>Płeć</th>
						<th>Usuń</th>
					</tr>
				<?php
					//if($_SERVER["REQUEST_METHOD"] == "POST") { 
						$plec = array("Nieokreślono", "Mężczyzna", "Kobieta");
					
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

						$query = "SELECT imie, urodziny, plec, id FROM czytelnicy ORDER BY imie ASC";
						
						$result = $db->query($query);
						
						while ($row = $result->fetch_row()) {
							echo "<tr>";
							
							echo "<td>$row[0]</td>";
							echo "<td>$row[1]</td>";
							echo "<td>".$plec[$row[2]]."</td>";
							echo "<td><form action='deleteuser.php' method='post'><button type='submit' name='delete' value=".$row[3].">Usuń</button></form></td>";
							echo "</tr>\n";
							//printf("<ul>%s %s %s %s\n</ul>", $row[0], $row[1], $row[2], $row[3]);
						}
					//}
				?>
				</table>
		</div>
    </body>
</html>