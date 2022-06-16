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
					<th>ID</th>
					<th>Tytuł</th>
					<th>Gatunek</th>
					<th>Autor</tr>
				</tr>
			<?php
			include("config.php");
				session_start();
				
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					$gatunekInt = array("Fantastyka", "Sci-Fi", "Romans", "Horror");
					$tytul = mysqli_real_escape_string($db,$_POST['tytul']); 
					$gatunek = mysqli_real_escape_string($db,$_POST['gatunek']);
				
					mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

					$query = "SELECT id, tytul, gatunek, autor FROM ksiazki WHERE (tytul LIKE '%$tytul%'  OR autor LIKE '%$tytul%') AND gatunek LIKE '%$gatunek%'";
					
					$result = $db->query($query);
					
					while ($row = $result->fetch_row()) {
						echo "<tr>";

						echo "<td>$row[0]</td>";
						echo "<td>$row[1]</td>";
						echo "<td>".$gatunekInt[$row[2]- 1]."</td>";
						echo "<td>$row[3]</td>";
						echo "<td><form action='reservebook.php' method='post'>&nbsp<button type='submit' name='delete' value=".$row[0].">Zarezerwuj</button></form></td>";
						echo "</tr>\n";
						//printf("<ul>%s %s %s %s\n</ul>", $row[0], $row[1], $row[2], $row[3]);
					}
				}
			?>
			</table>
		</div>
     </body>
</html>