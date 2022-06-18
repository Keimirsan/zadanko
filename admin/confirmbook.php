<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 			
		$id = mysqli_real_escape_string($db,$_POST['confirm']);
		$sql = "UPDATE ksiazki SET stan = 2 WHERE ksiazki.ID = $id;";
		$result = mysqli_query($db,$sql);
		
		$sql = "SELECT czytelnik, gatunek FROM ksiazki WHERE id = $id;";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$idczytelnik = $row['czytelnik'];
		$gatunek = $row['gatunek'];
		
		$sql = "SELECT urodziny, plec FROM czytelnicy WHERE id = $idczytelnik;";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$urodziny = $row['urodziny'];
		$plec = $row['plec'];
		
		$sql = "INSERT INTO statystyka2 (urodziny, plec, gatunek) VALUES ('$urodziny', $plec, $gatunek);";
		$result = mysqli_query($db,$sql);
		
		header("location:books.php");
	}
?>