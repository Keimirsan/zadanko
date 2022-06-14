<?php
   session_start();
   try {
	   if($_SESSION['valid'] == true) {
		   echo 'valid';
	   }
	   else {
		   echo 'invalid';
	   }
   }
   catch (Exception $e) {
	   echo 'invalid';
   }
?>