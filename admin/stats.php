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
				$gatunekInt = array(1 => "Fantastyka", 2 => "Sci-Fi", 3 => "Romans", 4 => "Horror");
				//$gatunekCount = array();
				
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
				arsort($ileG);
				$i = 0;
				foreach($ileG as $x => $x_value) {
					$i++;
					$proc = ($x_value / $ile) * 100;
					$proc = round($proc, 2);
					echo "$i.$gatunekInt[$x] $proc %</br></br>";
				}
			?>
			<h2>Najpopularniejsze Gatunki Wsród Mężczyzn</h2>
			<?php 
				$ileG = array(1 => 0, 2 => 0, 3 => 0, 4 => 0);
				$grupy = array(1 => $ileG, 2 => $ileG, 3 => $ileG, 4 => $ileG, 5 => $ileG, 6 => $ileG, 7 => $ileG,  8 => $ileG);
				$gatunekInt = array(1 => "Fantastyka", 2 => "Sci-Fi", 3 => "Romans", 4 => "Horror");
				$wiek10 = date('Y-m-d', strtotime('- 10 years'));
				$wiek20 = date('Y-m-d', strtotime('- 20 years'));
				$wiek30 = date('Y-m-d', strtotime('- 30 years'));
				$wiek40 = date('Y-m-d', strtotime('- 40 years'));
				$wiek50 = date('Y-m-d', strtotime('- 50 years'));
				$wiek60 = date('Y-m-d', strtotime('- 60 years'));
				$wiek70 = date('Y-m-d', strtotime('- 70 years'));
				
				//echo $wiek10;
				
				$sql = "SELECT * FROM statystyka2 WHERE plec = 1;";
				$result = mysqli_query($db,$sql);
				
				//echo mysqli_num_rows($result);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						//echo '</br>ile';
						if($row['urodziny'] >= $wiek10){
							$grupy[1][$row['gatunek']]++;
						}
						if($wiek10 > $row['urodziny'] && $row['urodziny'] >= $wiek20){
							$grupy[2][$row['gatunek']]++;
							//echo 'test2';
						}
						if($wiek20 > $row['urodziny'] && $row['urodziny'] >= $wiek30){
							$grupy[3][$row['gatunek']]++;
							//echo 'test3';
						}
						if($wiek30 > $row['urodziny'] && $row['urodziny'] >= $wiek40){
							$grupy[4][$row['gatunek']]++;
							//echo 'test4';
						}
						if($wiek40 > $row['urodziny'] && $row['urodziny'] >= $wiek50){
							$grupy[5][$row['gatunek']]++;
							//echo 'test5';
						}
						if($wiek50 > $row['urodziny'] && $row['urodziny'] >= $wiek60){
							$grupy[6][$row['gatunek']]++;
							//echo 'test6';
						}
						if($wiek60 > $row['urodziny'] && $row['urodziny'] >= $wiek70){
							$grupy[7][$row['gatunek']]++;
							//echo 'test7';
						}
						if($row['urodziny'] <= $wiek70){
							$grupy[8][$row['gatunek']]++;
							//echo 'test8';
						}
					}
				}
				for($i = 1; $i <= 8; $i++){
					$ile = $grupy[$i][1] + $grupy[$i][2] + $grupy[$i][3] + $grupy[$i][4];
					if ($ile != 0){
						arsort($grupy[$i]);
						$st = 10 * ($i - 1);
						$en = 10 * $i;
						$j = 0;
						echo "<b>Grupa Wiekowa od $st do $en lat.</b>";
						foreach($grupy[$i] as $x => $x_value) {
							$j++;
							$proc = ($x_value / $ile) * 100;
							$proc = round($proc, 2);
							echo "$j.$gatunekInt[$x] $proc %&nbsp";
						}
						echo "</br>";
					}
				}
			?>
			<h2>Najpopularniejsze Gatunki Wsród Kobiet</h2>
			<?php 
				$ileG = array(1 => 0, 2 => 0, 3 => 0, 4 => 0);
				$grupy = array(1 => $ileG, 2 => $ileG, 3 => $ileG, 4 => $ileG, 5 => $ileG, 6 => $ileG, 7 => $ileG,  8 => $ileG);
				$gatunekInt = array(1 => "Fantastyka", 2 => "Sci-Fi", 3 => "Romans", 4 => "Horror");
				$wiek10 = date('Y-m-d', strtotime('- 10 years'));
				$wiek20 = date('Y-m-d', strtotime('- 20 years'));
				$wiek30 = date('Y-m-d', strtotime('- 30 years'));
				$wiek40 = date('Y-m-d', strtotime('- 40 years'));
				$wiek50 = date('Y-m-d', strtotime('- 50 years'));
				$wiek60 = date('Y-m-d', strtotime('- 60 years'));
				$wiek70 = date('Y-m-d', strtotime('- 70 years'));
				
				//echo $wiek10;
				
				$sql = "SELECT * FROM statystyka2 WHERE plec = 2;";
				$result = mysqli_query($db,$sql);
				
				//echo mysqli_num_rows($result);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						//echo '</br>ile';
						if($row['urodziny'] >= $wiek10){
							$grupy[1][$row['gatunek']]++;
							//echo 'test1';
						}
						if($wiek10 > $row['urodziny'] && $row['urodziny'] >= $wiek20){
							$grupy[2][$row['gatunek']]++;
							//echo 'test2';
						}
						if($wiek20 > $row['urodziny'] && $row['urodziny'] >= $wiek30){
							$grupy[3][$row['gatunek']]++;
							//echo 'test3';
						}
						if($wiek30 > $row['urodziny'] && $row['urodziny'] >= $wiek40){
							$grupy[4][$row['gatunek']]++;
							//echo 'test4';
						}
						if($wiek40 > $row['urodziny'] && $row['urodziny'] >= $wiek50){
							$grupy[5][$row['gatunek']]++;
							//echo 'test5';
						}
						if($wiek50 > $row['urodziny'] && $row['urodziny'] >= $wiek60){
							$grupy[6][$row['gatunek']]++;
							//echo 'test6';
						}
						if($wiek60 > $row['urodziny'] && $row['urodziny'] >= $wiek70){
							$grupy[7][$row['gatunek']]++;
							//echo 'test7';
						}
						if($row['urodziny'] <= $wiek70){
							$grupy[8][$row['gatunek']]++;
							//echo 'test8';
						}
					}
				}
				for($i = 1; $i <= 8; $i++){
					$ileTemp = $grupy[$i];
					$ile = $ileTemp[1] + $ileTemp[2] + $ileTemp[3] + $ileTemp[4];
					arsort($ileTemp);
					if ($ile != 0){
						$st = 10 * ($i - 1);
						$en = 10 * $i;
						$j = 0;
						echo "<b>Grupa Wiekowa od $st do $en lat.</b>";
						foreach($ileTemp as $x => $x_value) {
							$j++;
							$proc = ($x_value / $ile) * 100;
							$proc = round($proc, 2);
							echo "$j.$gatunekInt[$x] $proc %&nbsp";
						}
						echo "</br>";
					}
				}
			?>
		</div>
     </body>
</html>