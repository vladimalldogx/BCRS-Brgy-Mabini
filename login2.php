<?php
	session_start();
	error_reporting(E_ALL);
	require_once("database/db_class.php");


	$password = "";
	$error = "";

	if(isset($_POST["proceed"]))
	{
		$password = trim($_POST["password"]);
		
		$exist_user = MYDB::query(
															"select
																*
															from
															users
															where
																password = ? "
															,
															array($password)
															,
															"SELECT"
														);	

		if(trim($password) == ""){
			$error = "<p class = 'Warning'>Please fill out this field.</p>";
		}	
		else if(count($exist_user) > 0)
		{
			//retrieve single array
			$exist_user = $exist_user[0];
            if($exist_user['usertype']=="ADMIN"){

                $_SESSION["username"] = $exist_user["username"];
                 header("location:administrator/adminhome.php");
                
            }
            else if($exist_user['usertype']=="CAPTAIN"){
                $_SESSION["username"] = $exist_user["username"];
              header("location:brgycaptain/captainHome.php");  
              
            }
            else if($exist_user['usertype']=="SECRETARY"){
                $_SESSION["username"] = $exist_user["username"];
                header("location:brgysec/secretaryHome.php");
                exit;
            }
            else if($exist_user['usertype']=="RESIDENT"){
                $_SESSION["username"] = $exist_user["username"];
                header("location:resident/residentHome.php");
                exit;
            }
			
           // header("location: ../view/home.php");
            //exit;
		}
		else 
		{
			$error = "<p class = 'Warning'>Invalid password. Please try again.</p>";
		}
	}	


?>


<!-- html file here-->
<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="assets/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="assets/js/materialize.min.js"></script>
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
	  <form method = "POST" action = "login2.php">  
        <h5><?php echo "Hello ".$_SESSION["username"].""	; ?></h5>
        <div><a href="login1.php"><b>Not <?php echo " ".$_SESSION["username"].""	; ?> ?</b></a></div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="password" name="password">
          <label for="password_input">Password</label>
		  <div><a href="#"><b>Forgot password?</b></a></div>
		  <?php 

				echo $error;

		?>
        </div>
      </div>
      <div class="row">
        
      </div>
      <div class="row"></div>
      <div class="row">
        <div class="col s6"><a href="#">Create account</a></div>
		<div class="col s6 right-align"><button type = "submit" name = "proceed" class = "btn">Sign in</button></div>
	</div>
	</div>
	
  </body>
</html>
