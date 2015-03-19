<?php 
	function randoAdj(){
		$adjectives = ['Monstrous', 'Talmudic', 'Gender-Nuetral', 'Hedonistic', 'Totally-Rad', 'Synergistic', 'Solipsistic'];
		return $adjectives[rand(0, count($adjectives)-1)];
	}
	function randoNoun(){
		$nouns = ['Pangolin', 'Mini-Pig', 'Mt. Olympus', 'Mastodon', 'Rengar', 'Shrike', 'POTUS', 'Potato', 'Snow-Beings'];
		return $nouns[rand(0,count($nouns)-1)];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			What Should I Name My Server?
		</title>

		<style type="text/css">
			/*h1{
				background: black;
				border: solid 5px #19ff00;
				color: white;
				width: 351px;
			}*/
			#hangInThere{
				position: relative;
				bottom: 1350px;
				left: 1050px;
			}

			#backgroundTop{
				z-index: -1;
				background: #66b3e2;
				width: 100%;
				height: 526px;
			}

			#backgroundBottom{
				z-index: -1;
				background: url('img/purty_wood.png');
				width: 100%;
				height: 244px;
				border-top: solid black 1px;
			}

			#computer{
				position: relative;
				top: -700px;
				left: 300px;
			}


			#monitor{
				color: #4ee55d;
				font-family: 'Abel', sans-serif;
				font-size: 12px;
				padding: 15px;
				background: black;
				height: 360px;
				width: 375px;
				margin-left: -5px;
				margin-top: 22px;
				box-shadow: 0px 0px 5px black;
			}
			#monitorCase{
				padding-left: 40px;
				padding-top: 0px;
				background: #eae9dc;
				height: 430px;
				width: 430px;
				border: solid black 1px;
				position: relative;
				right: -127px;
			}


			#tower{
				width: 680px;
				height: 150px;
				background: #eae9dc;
				border: solid black 1px;
				position: relative;
				right: -20px;
			}
			#floppySlotExt{
				width: 300px;
				height: 50px;
				background: #4c4343;
				float: left;
				margin-left: 190px;
				margin-top: 25px;
				box-shadow: inset 0px 0px 5px black;
			}
			#floppySlot{
				width: 250px;
				height: 10px;
				border: solid black 1px;
				background: black;
				box-shadow: 0px 0px 5px black;
				position: relative;
				left: 25px;
				top: 15px;
			}
			#powerButton{
				border-radius: 100%;
				background: #eae9dc;
				height: 50px;
				width: 50px;
				float: right;
				position: relative;
				top: 25px;
				right: 15px;
				border: solid black 1px;
				box-shadow: inset 0px 0px 9px gray;
			}
			#ellipsoid{
				width: 5px;
				height: 20px;
				border-top-right-radius: 40%;
				border-top-left-radius: 40%;
				border-bottom-right-radius: 40%;
				border-bottom-left-radius: 40%;
				border: solid black 1px;
				background: #eae9dc;
				box-shadow: inset 0px 0px 5px gray;
				position: relative;
				left: 21px;
				top: 3px;
			}
			#powerCircle{
				height: 40px;
				width: 40px;
				border: solid black 1px;
				border-radius: 100%;
				position: relative; 
				top: 10px;
			}
			#powerCircle : after{
				height: 40px;
				width: 40px;
				border: solid black 1px;
				border-radius: 100%;
				position: relative;
				bottom: 10px;
				background: red;
			}


			#keyboard{
				width: 720px;
				height: 40px;
				background: #eae9dc;
				border: solid black 1px;
				position: relative;
				top:-40px;
			}
			#keys{
				width: 700px;
				height: 11px;
				position: relative;
				top: -12px;
				left: 35px;
			}
			.button{
				height: 10px;
				background: #4c4343; /*#eae9dc;*/
				border: solid black 2px;
				border-bottom: none;
				float: left;
				margin-right: 10px;
			}
			.button1{
				width: 40px;
			}
			.button2{
				width: 60px;
			}
			.button3{
				width: 20px;
			}
			#spacebar{
				width: 200px;
			}
		</style>
		<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	</head>

	<body>
		<div id = 'container'>

			<div id = 'background'>
				<div id = 'backgroundTop'></div>
				<div id = 'backgroundBottom'></div>
			</div>

			<div id = 'computer'>
				<div id = 'monitorCase'>
					<div id = 'monitor'>
						<h1>
							My New Server is Called:
						</h1>
						<h3>
							<?php echo randoAdj().' '.randoNoun();?>
						</h3>
					</div>
				</div>
				<div id = 'tower'>
					<div id = 'floppySlotExt'>
						<div id = 'floppySlot'></div>
					</div>
					<div id = 'powerButton'>
						<div id = 'ellipsoid'></div>
						<div id = 'powerCircle'></div>
					</div>
				</div>
				<div id = 'keyboard'>
					<div id = 'keys'>
						<div class = 'button button1'>
						</div>
						<div class = 'button button1'>
						</div>
						<div class = 'button button1'>
						</div>

						<div class = 'button button2'>
						</div>

						<div id = 'spacebar' class = 'button'>
						</div>

						<div class = 'button button2'>
						</div>

						<div class = 'button button1'>
						</div>

						<div class = 'button button3'>
						</div>
						<div class = 'button button3'>
						</div>
						<div class = 'button button3'>
						</div>
					</div>
				</div>
			</div>
			<img id = 'hangInThere' src="img/hanginthere.jpeg">
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
	</body>
</html>