<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 			
		$tytul = mysqli_real_escape_string($db,$_POST['tytul']);
		$gatunek = mysqli_real_escape_string($db,$_POST['gatunek']);
		$autor = mysqli_real_escape_string($db,$_POST['autor']);
		$sql = "INSERT INTO ksiazki(tytul, gatunek, autor) VALUES ('$tytul','$gatunek','$autor')";
		$result = mysqli_query($db,$sql);
		header("location:books.php");
	}
?>