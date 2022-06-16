<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 			
		$id = mysqli_real_escape_string($db,$_POST['confirm']);
		$sql = "UPDATE ksiazki SET stan = 2 WHERE ksiazki.ID = $id;";
		$result = mysqli_query($db,$sql);
		header("location:books.php");
	}
?>