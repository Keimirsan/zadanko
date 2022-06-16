<?php
	include('session.php');
?>
<html>
     <head>
          <meta charset="UTF-8" />
          <title>Biblioteka</title>
		  <link rel="stylesheet" href="style.css" type="text/css">
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
			<div> 
				<form action = "addbook.php" method = "post">
					<h2>Dodaj książkę</h2>
					<label>Tytul:</label><input type = "text" name = "tytul" class = "box" required/><br /><br/>
					<label>Gatunek:</label>
						<select name = "gatunek">
							<option value = "1">Fantastyka</option>
							<option value = "2">Sci-Fi</option>
							<option value = "3">Romans</option>
							<option value = "4">Horror</option>
						</select>
					<br/><br/>
					<label>Autor:</label><input type = "text" name = "autor" class = "box" required/><br /><br/>
					<input type = "submit" value = " Submit "/><br/>
				</form>
			</div>
			<div>
				<h1>WYSZUKIWANIE KSIĄŻEK</h1>
				<form action = "" method = "post">
					<label>Tytuł:</label><input type = "text" name = "tytul" class = "box"/>
					<label for="gatunek">Gatunek:</label>
					<select id="gatunek" name = "gatunek">
						<option value="">Wszystkie</option>
						 <option value="1">Fantastyka</option>
						 <option value="2">Sci-Fi</option>
						 <option value="3">Romans</option>
						 <option value="4">Horror</option>
					</select>
					<input type = "submit" value = " Szukaj "/><br/>
				</form>
				</br>
				<table class="tablica">
					<tr>
						<th>Tytuł</th>
						<th>Gatunek</th>
						<th>Autor</th>
						<th>Dostępność</th>
						<th>Usuń</th>
					</tr>
					<?php
						if($_SERVER["REQUEST_METHOD"] == "POST") { 
							$gatunekInt = array("Fantastyka", "Sci-Fi", "Romans", "Horror");
							$stanInt = array("Dostępna", "Wypożyczona", "Zarezerwowana");
							$tytul = mysqli_real_escape_string($db,$_POST['tytul']); 
							$gatunek = mysqli_real_escape_string($db,$_POST['gatunek']);
						
							mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

							$query = "SELECT tytul, gatunek, autor, stan, id FROM ksiazki WHERE (tytul LIKE '%$tytul%'  OR autor LIKE '%$tytul%') AND gatunek LIKE '%$gatunek%' ORDER BY tytul ASC";
							
							$result = $db->query($query);
							
							while ($row = $result->fetch_row()) {
								echo "<tr>";

								echo "<td>$row[0]</td>";
								echo "<td>".$gatunekInt[$row[1]- 1]."</td>";
								echo "<td>$row[2]</td>";
								echo "<td>".$stanInt[$row[3]- 1]."</td>";
								echo "<td><form action='deletebook.php' method='post'><button type='submit' name='delete' value=".$row[4].">Usuń</button></form></td>";
								echo "</tr>\n";
							}
						}
					?>
				</table></br></br>
				<table class="tablica">
					<tr>
						<th>Tytuł</th>
						<th>Gatunek</th>
						<th>Autor</th>
						<th>Dostępność</th>
						<th>Potwierdź</th>
					</tr>
					<?php
							$gatunekInt = array("Fantastyka", "Sci-Fi", "Romans", "Horror");
							$stanInt = array("Dostępna", "Wypożyczona", "Zarezerwowana");
						
							mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

							$query = "SELECT tytul, gatunek, autor, stan, id FROM ksiazki WHERE stan = 3 ORDER BY tytul ASC";
							
							$result = $db->query($query);
							
							while ($row = $result->fetch_row()) {
								echo "<tr>";

								echo "<td>$row[0]</td>";
								echo "<td>".$gatunekInt[$row[1]- 1]."</td>";
								echo "<td>$row[2]</td>";
								echo "<td>".$stanInt[$row[3]- 1]."</td>";
								echo "<td><form action='confirmbook.php' method='post'><button type='submit' name='confirm' value=".$row[4].">Potwierdź</button></form></td>";
								echo "</tr>\n";
							}
					?>
				</table>
			</div>
		</div>
     </body>
</html>