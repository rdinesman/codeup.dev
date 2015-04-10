<?php 

	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'national_parks_db');
	define("DB_USER", 'np_user');
	define("DB_PASS", 'password');

	require_once('../db_connect.php');

	// If a new park has been posted, it the data will be caught and inserted into the parks table.
	// Because everything asides from a picture is required, if one field is entered, they all have
	// to be. This means we only have to check for one field's existence. 
	if (isset($_POST['nameInput'])){
		$query = "insert into national_parks (name, location, date_established, area_in_acres, description, pic) values (:name, :location, :date_established, :area_in_acres, :description, :pic)";
		$stmt = $dbc->prepare($query);

		// Date value is formatted here to keep the bind values cleaner.
		$dateStr = $_POST['yearInput']."-".$_POST['monthInput']."-".$_POST['dayInput'];

		$stmt->bindValue(':name',             $_POST['nameInput'], PDO::PARAM_STR);
		$stmt->bindValue(':location',         $_POST['locInput'],  PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $dateStr,            PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres',    $_POST['sizeInput'], PDO::PARAM_STR);
		$stmt->bindValue(':description',      $_POST['descInput'], PDO::PARAM_STR);

		// Because a picture is not required, it binds picInput as a string if it exists,
		// and as null if it doesn't.
		if(isset($_POST['picInput'])){
			$stmt->bindValue(':pic',          $_POST['picInput'],  PDO::PARAM_STR);
		}
		else{
			$stmt->bindValue(':pic',          $_POST['picInput'],  PDO::PARAM_NULL);
		}

		$stmt->execute();
	}

	// If a limit is passed in that is invalid, or a limit is not passed in, the default value is 5. 
	// Otherwise the passed value is assigned to limit. Casting the passed value as an Int insures
	// that we won't get any errors from being passed a float.
	if (!isset($_GET['limit'])){
		$limit = 5;
	}
	elseif (!is_numeric($_GET['limit'])){
		$limit = 5;
	}
	else{ 
		$limit = (int)$_GET['limit'];
	}
	

	// Here we get the length of the park DB. fetchColumn() is used because we are only returning
	// a single column.
	$stmt = $dbc->prepare("SELECT count('id') FROM national_parks");
	$stmt->execute();
	$count = $stmt->fetchColumn();

	// This is the max page count used for pagination. It is rounded up to insure that we will 
	// have enough pages when there is only a partial page left over. (e.g. 15 items, 10 limit will leave us with 1.5 pages)
	$maxPage = ceil($count / $limit);

	// Here we assign our current page value. The default page value is 1. If a page number greater
	// than our max is passed in, the current page will be set to the max page. Otherwise, the 
	// current page is set to what's passed in.
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

	// Here we pull the results that will be displayed. The offset is calculated by subtracting one,
	// and then multiplying that result by the limit (line 83). The -1 is because we are actually 
	// starting on the 0th page, with no offset. The * $limit is because each page offsets by the 
	// limit.
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
	 	<!-- We set the current page and limit as attributes here so we can reference them 
	 		 easily in JQuery -->
	 	<div id="parks" page=<?= $page?> limit=<?= $limit?>>
		 	<h1>U.S. National Parks</h1>
		 	<table id = "parksTable">
		 		<!-- Table column headers -->
		 		<tr>
		 			<td class="name">Name</td>
		 			<td class="location">Location</td>
		 			<td class="date_established">Date Established</td>
		 			<td class="area_in_acres">Area in Acres</td>
		 		</tr>

		 		<!-- For each park returned to be displayed, add a table row with the appropriate data -->
		 		<? foreach ($parks as $park){ ?>
		 		<tr>
 					<td class="name"><?= $park['name']; ?></td>
 					<td class="location"><?= $park['location']; ?></td>
 					<td class="date_established"><?= $park['date_established']; ?></td>
 					<td class="area_in_acres"><?= $park['area_in_acres']; ?></td>
		 		</tr>
		 		<? } ?>
		 	</table>
		
			<!-- Dispalys the pagination. If it is the first page, previous page doens't appear, and if it
			is the last page, next page doesn't appear. -->
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

			<!-- Allows for the selection of how many parks are displayed. Ranges from 1 to 10 results. -->
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
		<!-- End of the parks table -->

		<!-- This button bring up the New Park Modal -->
		<button id="newParkButton">Add New Park</button>
		
		<!-- This modal holds the form to submit a new park to the DB -->
		<div id="newParkModal" hidden>
			<div id="newParkForm">
				<!-- All inputs are required, except for picture. Date is a series of selects, and
				area is a number input. Everything else is text/textarea. This eliminates the 
				need to check for proper types. -->

<!-- TODO: check for negative values for areas -->
<!-- TODO: check for leap years/even months that have 32/31 days -->
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

								<!-- For each year between 1900 and the current date, add it as an
								option in the selector. -->
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
								<!-- For each day in the month, add an option in the selector. -->
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

						<!-- Buttons to submit or exit the form. -->
						<button type="submit" id="newParkSubmit">Submit</button>
						<button id="parkSubmitCancel">Cancel</button>
				</form>
			</div>
		</div>
		<!-- End of the modal's code -->


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript">

			// If a new park result limit is selected, reload on the current page with the new limit.
			$("#limitSelector").change(function(event){
				location = "/national_parks.php?page="+($("#parks").attr("page"))+"&limit="+this.value;
			});

			// If the 'Add New Park' or 'Cancel' buttons are clicked, slide toggle the parks and the modal.
			// This allows for the switching between the two, and ensures that only one aspect is on the page.
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