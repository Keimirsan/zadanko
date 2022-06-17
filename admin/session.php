<?php
	include('config.php');
	session_start();
   
	$user_check = $_SESSION['login_admin'];
	
	$ses_sql = mysqli_query($db,"select login, id from admin where login = '$user_check' ");
   
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
	$login_session = $row['login'];
   
	if(!isset($_SESSION['login_admin'])){
		header("location:index.php");
		die();
	}
?>