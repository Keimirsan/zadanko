<!doctype html>

<?php
	include("config.php");
	session_start();
	$_SESSION['valid'] = false;
?>

<html>
     <head>
          <meta charset="UTF-8" />
          <title>Biblioteka</title>
		  <link rel="stylesheet" href="style.css" type="text/css">
     </head>
     <body>
      
		<h2>Enter Username and Password</h2> 
		<div class = "container form-signin">
			<?php
				$msg = '';
				
				if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) 
				{
					if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time();
						$_SESSION['username'] = 'tutorialspoint';
					  
						echo 'You have entered valid use name and password';
					}
					else 
					{
					  $msg = 'Wrong username or password';
					}
				}
			?>
		</div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username = tutorialspoint" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password = 1234" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
      </div> 
      
   </body>
</html>