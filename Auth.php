<?php 
	require_once "Log.php";
	
	class Auth{
		private static $passwords=[
			'monkey' => '$2y$10$ZXBJIWbvveeVFM8cwpSOvu53ul6.PRZzrqhY/tvWi/yFvZ4DXFFZ.',
			'guest' => '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm',
			'rubber' => '$2y$10$Gyb6K5r6mblS.w76VVs1dO2sQQY4rCF.r6cmIzBsLjWDkT01vHY2m',
			'bert' => '$2y$10$8QKVGJpH193nhVk4CS7YBeNIPvk9cW/71pq9hZ1gHSpMXQjKPd89K'
		];
		
		public static function attempt($username, $password){
			$authLog = new Log();
			if (isset(Auth::$passwords[$username])){ 
				if(password_verify($password, Auth::$passwords[$username])){
					Log::info($username." logged in.");
					$_SESSION['LOGGED_IN_USER'] = $username;
					$_SESSION['LOGGED_IN'] = true;
					header("Location: authorized.php");
					exit;
				}
			}
			else{
				Log::info($username." failed to logged in.");
				$data["failMessage"] = 'Wrong Username or Password.';
			}
		}

		public static function check(){
			return isset($_SESSION['LOGGED_IN'])? $_SESSION['LOGGED_IN'] : false;
		}

		public static function user(){
			return isset($_SESSION['LOGGED_IN_USER'])? $_SESSION['LOGGED_IN_USER'] : false;
		}

		public static function logout(){

		}
	}
 ?>
