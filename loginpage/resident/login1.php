<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../../server/db_class.php");

	
	$username = "";

	$error = "";
	

	if(isset($_GET["username"]))
	{
		$username = trim($_GET["username"]);
		
		$exist_user = MYDB::query(
															"select
																*
															from
																resident
															where
																username= ? "
															,
															array($username)
															,
															"SELECT"
														);	

		if(count($exist_user) > 0)
		{
			//retrieve single array
			$exist_user = $exist_user[0];
			$_SESSION["username"] = $username;
			$_SESSION["username"] = $exist_user["username"];
			
			
			
			header("location: login2.php");
			exit;
		}
		if(trim($username) == ""){
			$error = "<p class ='alert alert-warning'>Please fill out this field.</p>";
		}		
		else 
		{
			if($exist_user);
			$error = "<p class = 'alert alert-danger'>Invalid username. Please try again.</p>";
		}
	}	
														

?>	



<!-- html file here-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="../../assets/css/materialize.min.css">

     <!-- Compiled and minified JavaScript -->
     <script src="../../assets/js/materialize.min.js"></script>
  </head>
  <style>
	  
	body {
	width: 100vw;
	height: 100vh;
	margin: 0;
	padding: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	}
	.login-div {
	max-width: 430px;
	padding: 35px;
	border: 1px solid #ddd;
	border-radius: 8px;
	}
	.logo {
	background-image: url("locker.png");
	width:100px;
	height:100px;
	border-radius: 50%;
	margin:0 auto;
	}
  </style>
  <body>
    <div class="login-div">
      <div class="row">
        <div class="logo"></div>
      </div>
      <div class="row center-align">
	  <form method = "GET" action = "login1.php">
        <h5>Sign in</h5>
        <h6>Use your BCRS Account</h6>
      </div>
      <div class="row">
        <div class="input-field col s12">
		<label for="username">Username</label>
          <input name="username" type="text" class="validate">
		  
		  	<?php 

				echo $error;

			?>
        </div>
      </div>
		
      <div class="row">
        <div class="col s12">Not your computer? Use a Private Window to sign in. <a href="#"><b>Learn more</b></a></div>
      </div>
      <div class="row"></div>
      <div class="row">
        <div class="col s6"><a href="registration.php">Create account</a></div>
		<div class="col s6 right-align"><button type = "submit" name = "login-username" class = "btn">Sign in</button></div>
		</form>
      </div>
    </div>
	
  </body>
</html>

