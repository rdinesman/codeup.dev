<?php
	
	print_r($_GET);
	function updateCount(){
		// This did not work. Keeping this code as an educational reference
		// $data = [];
		// if (empty($data['counter']))
		// 	$count = 0;
		// elseif ($_GET['q'] == 'up')
		// 		$data['counter'] = $count++;
		// elseif ($_GET['q'] == 'dn')
		// 		$data['counter'] = $count--;
		// $data = ['count' => $count];
		// print_r($data);
		// return $data;

		$data = [];
		if (empty($_GET['counter'])){
			$counter = 0;
		}
		else
			$counter = $_GET['counter'];
		$data['counter'] = $counter;
		
		return $data;
	}
	extract(updateCount());
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			GET Counter Exercise
		</title>
	</head>
	<body>
		<p>Current count: <?php echo $counter; ?> </p>
		<a href="?q=up&counter=<?php echo $counter + 1?>">
			Up
		</a>
		
		<a href="?q=dn&counter=<?php echo $counter - 1?>">
			Down
		</a>
	</body>
</html>