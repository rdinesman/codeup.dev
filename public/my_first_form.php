<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<!-- Place PHP stuff at the beginning of the file
	before the body of the html.... if you wanna
	place it -->
<html>
<head>
	<title>My First Form</title>
</head>
<body>
	<form method="POST" action="/my_first_form.php">
    <h1>User Login</h1>
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placerholder="Username">
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placerholder="Password">
    </p>
    <p>
        <input type="submit" value="Login">
    </p>
	</form>
	<h1>Compose an Email</h1>
	<form method="POST" action="/my_first_form.php">
		<label for="to">To:</label>
		<input name="to" id="to" type="text" placeholder="rdinesman@gmail.com">
		<p></p>
		<label for="from">From:</label>
		<input name="from" id="from" type="text" placeholder="rdinesman@yahoo.com">
		<p></p>
		<label for="subj">Subject:</label>
		<input name="subj" id="subj" type="text" placeholder="CodeUp">
		<p></p>
		<label for="save_draft"><input type="checkbox" id="save_draft" name="save_draft" value="save" checked>Save a copy to your sent folder</label>
		<p></p>
		<textarea id="email_body" rows="5" cols="40" placeholder="Compose your email here:"></textarea>
		<p></p>
		<button type="submit">Send</button>
	</form>
	<form method="_POST" action="/my_first_form.php">
		<h1>Multiple Choice Test</h1>
		<p>What PC are you using?</p>
		<label><input type="radio" name="pc_q" id="pc_q1" value="mac">Mac</label>
		<label><input type="radio" name="pc_q" id="pc_q2" value="surface">Surface</label>
		<label><input type="radio" name="pc_q" id="pc_q3" value="toaster">Toaster</label>
		<label><input type="radio" name="pc_q" id="pc_q4" value="woof">Bark</label>
		<p></p>
		<p>Did you eat lunch?</p>
		<label><input type="radio" name="lunch_q" id="lunch_q1" value="yes">Yes</label>
		<label><input type="radio" name="lunch_q" id="lunch_q2" value="no">No</label>
		<p></p>
		<button type="submit">Submit</button>
	</form>
</body>
</html>