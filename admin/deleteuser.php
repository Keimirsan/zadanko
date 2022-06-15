<?php
	include('config.php');
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") { 
		//echo 'add';
		$id = mysqli_real_escape_string($db,$_POST['delete']);
					
		$sql = "DELETE FROM czytelnicy WHERE czytelnicy.id = $id";
		$result = mysqli_query($db,$sql);
		//echo $result;
		header("location:readers.php");
		}
?>