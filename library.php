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
				<li class="mbutton center"><a href="lend.php"><p>Wypożycz</p></a></li>
				<li class="mbutton center"><a href="return.php"><p>Zwróć</p></a></li>
				<li class="mbutton center"><a href="stats.php"><p>Statystyka</p></a></li>
			</ul>
		</div>
		<div class="glowna">
		<h1>WYSZUKIWANIE KSIĄŻEK</h1>
			
			<?php
			$mysqli = new mysqli("localhost","root","","biblioteka");

			// Check connection
			if ($mysqli -> connect_errno) {
			  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			  exit();
			}
			
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

			$query = "SELECT id, tytuł, gatunek, autor FROM ksiazki ORDER BY ID DESC";

			$result = $mysqli->query($query);
			
			/* fetch object array */
			while ($row = $result->fetch_row()) {
				printf("<ul>%s %s %s %s\n</ul>", $row[0], $row[1], $row[2], $row[3]);
			}
			?>
		</div>
     </body>
</html>