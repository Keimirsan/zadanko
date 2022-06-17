<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 			
		$id = mysqli_real_escape_string($db,$_POST['confirm']);
		$sql = "UPDATE ksiazki SET stan = 2 WHERE ksiazki.ID = $id;";
		$result = mysqli_query($db,$sql);
		
		$sql = "SELECT czytelnik FROM ksiazki WHERE id = $id;";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$idczytelnik = $row['czytelnik'];
		$idadmin = $_SESSION['id_admin'];
		$date = date("Y-m-d");
		$sql = "INSERT INTO statystyka (id_ksiazka, id_czytelnik, data, typ, id_admin) VALUES ($id, $idczytelnik, '$date', 2, $idadmin);";
		$result = mysqli_query($db,$sql);
		
		header("location:books.php");
	}
?>