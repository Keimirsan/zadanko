<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 
		$login = mysqli_real_escape_string($db,$_POST['login']);
		$sqlCheck = mysqli_query($db,"select login from czytelnicy where czytelnicy.login = '$login' ");
		mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);
		//echo count($row);
		if(count($row) == 0){
			$haslo = mysqli_real_escape_string($db,$_POST['haslo']);
			$imie = mysqli_real_escape_string($db,$_POST['imie']);
			$urodziny = mysqli_real_escape_string($db,$_POST['urodziny']);
			$plec = mysqli_real_escape_string($db,$_POST['plec']);
			$sql = "INSERT INTO czytelnicy(login, password, imie, urodziny, plec) VALUES ('$login','$haslo','$imie', '$urodziny', '$plec')";
			$result = mysqli_query($db,$sql);
			header("location:readers.php");
		}else{
			echo "uzytkownik z podanym loginem juz istnieje";
		}
	}
?>