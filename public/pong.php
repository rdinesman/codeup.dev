<?php
	require 'functions.php';
	require_once '../Input.php';
	function pageController(){
		$data = array();
		if (!Input::has('count')){
			$count = 0;
			$action = 'hit';
		}
		elseif (Input::get('action') == 'hit'){
			$count = $_GET['count'];
			$action = 'hit';
		}
		elseif (Input::get('action') == 'miss'){
			$count = 0;
			$action = 'missed';
		}

		$data['count'] = $count;
		$data['action'] = $action;
		return $data;
	}
	extract(pageController());
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pong</title>
		<link rel="stylesheet" type="text/css" href="css/pingpong.css">
	</head>
	<body>
		<div id = 'ping' class = 'pingpong'>
			<p>P</p>
			<p>i</p>
			<p>n</p>
			<p>g</p>
		</div>

		<div id = 'info'>
			<p>Ping <?php escape($action); ?> the ball!</p>
			<p>The hit count is currently <?php escape($count); ?></p>
			
			<a href="ping.php?action=hit&count=<?php escape($count + 1);?>">Hit!</a>
			<?php
				if ($count > 0)
					echo'<a href="pong.php?action=miss&count=<?php echo $count;?>">Miss!</a>'
			?>
		</div>

		<div id = 'pong' class = 'pingpong active'>
			<p>P</p>
			<p>o</p>
			<p>n</p>
			<p>g</p>
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src='js/pingpong.js'></script>
	</body>
</html>