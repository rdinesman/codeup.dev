<?php 
	require_once '../Auth.php';
	session_start();
	$sessionId = session_id();
	if(isset($_POST['logOut']) && $_POST['logOut'] == 'true'){
		$_SESSION['LOGGED_IN_USER'] = false;
		$_SESSION['LOGGED_IN'] = false;
		header("Location:login.php");
		exit();
	}
	elseif (Auth::check()){
		$data = ['user' => Auth::user()];
	}

	else{
		header("Location:login.php");
		exit();
	}
	extract($data)
 ?>

<!DOCTYPE html>
 <html>
	 <head>
	 	<title>Log-ed In</title>
	 </head>
	 <body>
	 	<?php echo $user; ?>, ye fool of a mortal! Ye have been authorized!
	 	<form method = 'POST'>
	 		<button type = 'submit' name = 'logOut' value = 'true'>Log Oort</button>
	 	</form>
	 </body>
 </html>