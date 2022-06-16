<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 
		$login = mysqli_real_escape_string($db,$_POST['login']);
		$haslo = mysqli_real_escape_string($db,$_POST['haslo']);
		$imie = mysqli_real_escape_string($db,$_POST['imie']);
		$urodziny = mysqli_real_escape_string($db,$_POST['urodziny']);
		$plec = mysqli_real_escape_string($db,$_POST['plec']);
		$sql = "INSERT INTO czytelnicy(login, password, imie, urodziny, plec) VALUES ('$login','$haslo','$imie', '$urodziny', '$plec')";
		$result = mysqli_query($db,$sql);
		header("location:readers.php");
	}
?>