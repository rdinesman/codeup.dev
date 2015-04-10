<?php 

	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'national_parks_db');
	define("DB_USER", 'np_user');
	define("DB_PASS", 'password');

	require_once('../db_connect.php');

	if (isset($_POST['nameInput'])){
		$query = "insert into national_parks (name, location, date_established, area_in_acres, description, pic) values (:name, :location, :date_established, :area_in_acres, :description, :pic)";
		$stmt = $dbc->prepare($query);

		$dateStr = $_POST['yearInput']."-".$_POST['monthInput']."-".$_POST['dayInput'];

		$stmt->bindValue(':name',             $_POST['nameInput'], PDO::PARAM_STR);
		$stmt->bindValue(':location',         $_POST['locInput'],  PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $dateStr,            PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres',    $_POST['sizeInput'], PDO::PARAM_STR);
		$stmt->bindValue(':description',      $_POST['descInput'], PDO::PARAM_STR);
		
		if(isset($_POST['picInput'])){
			$stmt->bindValue(':pic',          $_POST['picInput'],  PDO::PARAM_STR);
		}
		else{
			$stmt->bindValue(':pic',          $_POST['picInput'],  PDO::PARAM_NULL);
		}

		$stmt->execute();
	}

	if (!isset($_GET['limit'])){
		$limit = 5;
	}
	elseif (!is_numeric($_GET['limit'])){
		$limit = 5;
	}
	else{ 
		$limit = (int)$_GET['limit'];
	}
	
	$stmt = $dbc->prepare("SELECT count('id') FROM national_parks");
	$stmt->execute();
	$count = $stmt->fetchColumn();

	$maxPage = ceil($count / $limit);

	if (!isset($_GET['page'])){
		$page = 1;
	}
	elseif (!is_numeric($_GET['page'])){
		$page = 1;
	}
	elseif ($_GET['page'] > $maxPage){
		$page = $maxPage;
	}
	else{
		$page = (int)$_GET['page'];
	}

	$stmt = $dbc->prepare(("SELECT * FROM national_parks LIMIT :lim OFFSET :offset"));
	$stmt->bindValue(":lim", $limit, PDO::PARAM_INT); 
	$stmt->bindValue(":offset", ($page -1) * $limit, PDO::PARAM_INT);
	$stmt->execute();
	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	extract([$parks]);
 ?>
<!DOCTYPE html>
 <html>
	 <head>
	 	<title>National Parks Database</title>
	 	<link rel="stylesheet" type="text/css" href="css/national_parks.css">
	 </head>
	 <body>
	 	<div id="parks" page=<?= $page?> limit=<?= $limit?>>
		 	<h1>U.S. National Parks</h1>
		 	<table id = "parksTable">
		 		<tr>
		 			<td class="name">Name</td>
		 			<td class="location">Location</td>
		 			<td class="date_established">Date Established</td>
		 			<td class="area_in_acres">Area in Acres</td>
		 		</tr>

		 		<? foreach ($parks as $park){ ?>
		 		<tr>
 					<td class="name"><?= $park['name']; ?></td>
 					<td class="location"><?= $park['location']; ?></td>
 					<td class="date_established"><?= $park['date_established']; ?></td>
 					<td class="area_in_acres"><?= $park['area_in_acres']; ?></td>
		 		</tr>
		 		<? } ?>
		 	</table>
		
		 	<div id="paginator">
			 	<? if ($page != 1): ?>
			 	<a href="national_parks.php?page=<?= $page - 1?>&amp;limit=<?= $limit ?>">Previous Page</a>
			 	<? endif; ?>

				<? for ($i = 1; $i <= $maxPage; $i++){ ?>
			 		<a href="national_parks.php?page=<?=$i?>&amp;limit=<?=$limit?>" <? if ($i == $page) echo 'class = "current"' ?> id = <?='page'.$i?>><?=$i ?></a>
			 	<? } ?>

			 	<? if ($page != $maxPage): ?>
			 	<a href="national_parks.php?page=<?= $page + 1?>&amp;limit=<?= $limit ?>">Next Page</a>
			 	<? endif; ?>
			</div>
			<select id="limitSelector">
				<option disabled selected># of Displayed Parks</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		<button id="newParkButton">Add New Park</button>
		<div id="newParkModal" hidden>
			<div id="newParkForm">
				<form method="POST">
					<h1>Submit New Park</h1>
						<div>
							<div>
								<label for="nameInput">Park Name:</label>
							</div>
							<input type="text" placeholder="Oralton Town Park" name="nameInput" id="nameInput" required>
						</div>

						<div>
							<div>
								<label for="locInput">Park Location:</label>
							</div>
							<input type="text" placeholder="Statesonia" name="locInput" id="locInput" required>
						</div>

						<div id="dateInput">
							<div>
								<label>Date Established</label>
							</div>
							<select id="yearInput" name="yearInput" required>
								<option disabled label value="">Year</option>

								<? for($year = 1900; $year <= date('Y'); $year++):?>
									<option value=<?=$year.""?>><?= $year?></option>
								<? endfor;?>
							</select>

							<select id="monthInput" name="monthInput" required>
								<option disabled label value="">Month</option>

								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>

							<select id="dayInput" name="dayInput" required>
								<option disabled label value="">Day</option>

								<? for($day = 1; $day <= 30; $day++):?>
									<option value=<? if($day >= 10){echo $day."";} else {echo "0".$day;}?>><?= $day?></option>
								<? endfor;?>
							</select>
						</div>

						<div>
							<div>
								<label for="sizeInput">Park Size in Acres:</label>
							</div>
							<input type="number" placeholder="13.37" name="sizeInput" id="sizeInput" required>
						</div>

						<div>
							<div>
								<label for="descInput">Park Description:</label>
							</div>
							<textarea placeholder="The best park in the whole United States! It has trees, and turtles, and fish, and even birds!" name="descInput" id="descInput" required></textarea>
						</div>

						<div>
							<div>
								<label for="picInput">Park Picture Link:</label>
							</div>
							<input type="text" placeholder="moral_oral.jpg" name="picInput" id="picInput">
						</div>

						<button type="submit" id="newParkSubmit">Submit</button>
						<button id="parkSubmitCancel">Cancel</button>
				</form>
			</div>
		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript">
			$("#limitSelector").change(function(event){
				location = "/national_parks.php?page="+($("#parks").attr("page"))+"&limit="+this.value;
			});

			$("#newParkButton").click(function(event){
				$("#parks").slideToggle();
				$("#newParkModal").slideToggle();
				$("#newParkButton").slideToggle();
			});
			$("#parkSubmitCancel").click(function(event){
				$("#parks").slideToggle();
				$("#newParkModal").slideToggle();
				$("#newParkButton").slideToggle();
			});
		</script>
	 </body>	
 </html>