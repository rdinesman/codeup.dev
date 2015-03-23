<?php
	$data = ['failMessage' => ""];
	if (isset($_POST['username'])){
		if($_POST['username'] == 'guest' && $_POST['password'] == 'password'){
			header("Location: authorized.php");
		}
		else{
			$data["failMessage"] = 'Wrong Username or Password.';
		}
	}
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
			<input type = 'text' name = 'password' id = 'password'>
			<button type = 'submit'>Poost</button>
		</form>
		<?php echo $failMessage; ?>
	</body>
</html>