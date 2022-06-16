<?php
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") { 			
		$reserve = mysqli_real_escape_string($db,$_POST['reserve']);
		
		$sql = "SELECT id FROM ksiazki WHERE id = $reserve AND stan = 1";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if(is_countable($row)){
			$usrsql = "SELECT id FROM czytelnicy WHERE login = '$user_check'";
			$usrresult = mysqli_query($db,$usrsql);
			$usrrow = mysqli_fetch_array($usrresult,MYSQLI_ASSOC);
			$id = $usrrow['id'];
			$sql = "UPDATE ksiazki SET stan = 3, czytelnik = $id WHERE ksiazki.ID = $reserve;";
			$result = mysqli_query($db,$sql);
			header("location:library.php?var=0");
		}else{
			header("location:library.php?var=1");
		}
	}
?>