<?php
	function pageController(){
		$data = array();
		if (empty($_GET['count'])){
			$count = 0;
			$action = 'hit';
		}
		elseif ($_GET['action'] == 'hit'){
			$count = $_GET['count'];
			$action = 'hit';
		}
		elseif ($_GET['action'] == 'miss'){
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
		<title id = 'pingNpong'>Ping</title>
		<link rel="stylesheet" type="text/css" href="css/pingpong.css">
	</head>
	<body>
		<div id = 'ping' class = 'pingpong active'>
			<p>P</p>
			<p>i</p>
			<p>n</p>
			<p>g</p>
		</div>

		<div id = 'info'>
			<p>Pong <?php echo $action; ?> the ball!</p>
			<p>The hit count is currently <?php echo $count; ?></p>
			
			<a href="pong.php?action=hit&count=<?php echo $count + 1;?>">Hit!</a>
			<?php
				if ($count > 0)
					echo '<a href="pong.php?action=miss&count=<?php echo $count;?>">Miss!</a>'
			?>
		</div>

		<div id = 'pong' class = 'pingpong'>
			<p>P</p>
			<p>o</p>
			<p>n</p>
			<p>g</p>
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
	</body>
</html>