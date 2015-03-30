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
		<style type="text/css">
		id newAcctPopup{
		}
		</style>
	</head>
	<body>
		<div id = 'newAcctPopup' hidden>
			<div id = 'newAcctForm'>
				<form>
					<input type = 'text' name = 'newUser' id = 'newUser'>
					<input type = 'text' name = 'newPass' id = 'newPass'>
					<input type = 'text' name = 'confPass' id = 'confPass'>
					<button type = 'submit' id = 'newSubmit' name = 'newSubmit'>Submit</button>
					<button id = 'cancel' name = 'cancel'>Cancel</button>
				</form>
			</div>
		</div>
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
	<button>Create New Account</button>
</html>