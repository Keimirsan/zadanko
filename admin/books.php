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
			<?php
				//include("config.php");
			   
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					 
					
					$tytul = mysqli_real_escape_string($db,$_POST['tytul']);
					$gatunek = mysqli_real_escape_string($db,$_POST['gatunek']);
					$autor = mysqli_real_escape_string($db,$_POST['autor']);
					
				  
					$sql = "INSERT INTO ksiazki(tytuł, gatunek, autor) VALUES ('$tytul','$gatunek','$autor')";
					$result = mysqli_query($db,$sql);
					//echo $result;
				}
			?>
			<div> 
				<form action = "" method = "post">
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
				<h2>Zbiór książek</h2>
				<ul class = "lista">
				<?php
					$gatunekInt = array("Fantastyka", "Sci-Fi", "Romans", "Horror");
					$stanInt = array("Dostępna", "Wypożyczona", "Zarezerwowana");
					$sql = "SELECT * FROM ksiazki";
					$result = mysqli_query($db,$sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<li><div>id: ".$row['ID']." | Tytuł: ".$row['tytul']." | Gatunek: ".$gatunekInt[$row['gatunek']- 1]." | Autor: ".$row['autor']." | Stan: ".$stanInt[$row['stan']- 1]."</div><form action='deletebook.php' method='post'>&nbsp<button type='submit' name='delete' value=".$row['ID'].">Usuń</button></form></li>";
						}
					} else {
						echo "0 results";
					}
				?>
				</ul>
			</div>
		</div>
     </body>
</html>