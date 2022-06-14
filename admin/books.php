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
					<?php
				//include("config.php");
			   
				if($_SERVER["REQUEST_METHOD"] == "POST") { 
					 
					
					$tytul = mysqli_real_escape_string($db,$_POST['tytul']);
					$gatunek = mysqli_real_escape_string($db,$_POST['gatunek']);
					$autor = mysqli_real_escape_string($db,$_POST['autor']);
					
				  
					$sql = "INSERT INTO ksiazki(tytuł, gatunek, autor) VALUES ('$tytul','$gatunek','$autor')";
					$result = mysqli_query($db,$sql);
					echo $result;
				}
			?>
		<div class="glowna">
			<form action = "" method = "post">
				<h2>Dodaj książkę</h2>
				<label>Tytul:</label><input type = "text" name = "tytul" class = "box"/><br /><br/>
				<label>Gatunek:</label>
					<select name = "gatunek">
						<option value = "1">Fantastyka</option>
						<option value = "2">Sci-Fi</option>
						<option value = "3">Romans</option>
						<option value = "4">Horror</option>
					</select>
				<br/><br/>
				<label>Autor:</label><input type = "text" name = "autor" class = "box"/><br /><br/>
				<input type = "submit" value = " Submit "/><br/>
			</form>
		</div>
     </body>
</html>