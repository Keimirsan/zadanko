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
			<h2>Najpopularniejsze Gatunki</h2>
			<?php
				$ileG = array(1 => 0, 2 => 0, 3 => 0, 4 => 0);
				$gatunekInt = array("Fantastyka", "Sci-Fi", "Romans", "Horror");
				$gatunekCount = array();
				
				$sql = "SELECT COUNT(id) AS count FROM statystyka2;";
				$result = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$ile = $row['count'];
				
				$sql = "SELECT * FROM statystyka2;";
				$result = mysqli_query($db,$sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$ileG[$row['gatunek']]++;
					}
				}
				rsort($ileG);
				$i = 0;
				foreach($ileG as $x => $x_value) {
					$i++;
					$proc = ($x_value / $ile) * 100;
					$proc = round($proc, 2);
					echo "$i.$gatunekInt[$x] $proc %</br></br>";
				}
			?>
		</div>
     </body>
</html>