<?php
	require_once '../Auth.php';
	session_start();
	$sessionId = session_id();

	if (Auth::check()){
		header("Location: authorized.php");
		exit();
	}
	$data=[];
	$data['failMessage'] = '';
	if (isset($_POST['username'])){
		Auth::attempt($_POST['username'], $_POST['password']);
	}
	$_SESSION['LOGGED_IN'] = false;
	extract($data)
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log In, Mortal</title>
	</head>
	<body>
		<form method = 'POST'>
			<label for = 'username'>
				Username
			</label>
			<input type = 'text' name = 'username' id = 'username'>

			<label for = 'password'>
				Password
			</label>
			<input type = 'password' name = 'password' id = 'password'>
			<button type = 'submit'>Poost</button>
		</form>
		<?php echo $failMessage; ?>
	</body>
</html>