<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 
		$id = mysqli_real_escape_string($db,$_POST['delete']);
		$sql = "DELETE FROM ksiazki WHERE ksiazki.id = $id";
		$result = mysqli_query($db,$sql);
		header("location:books.php");
	}
?>