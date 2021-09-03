<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../database/db_class.php");

	//check for login

	if(! isset($_SESSION["username"]) )
	{
		header("location: ../login1.php");
		exit;
	}

	$id = $_SESSION["usr_id"];
	$Hi = "";


	$exist_user = MYDB::query(
															"select
																*
															from
																users
															where
																usr_id = ? "
															,
															array($id)
															,
															"SELECT"
														);
	
	
	foreach ($exist_user as $key){
			$id = "{$key['usr_id']}";
			$username = "{$key['username']}";
			$lname = "{$key['lname']}";
			$fname = "{$key['fname']}";
			
				
	}
   
    
?>
<html>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BCRS-Captain</title>
	<link rel="icon" type="image/png" href="view/image/lock.png">
	<!-- Bootstrap core CSS -->
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/w3.css" rel="stylesheet">
	<link href="../assets/css/w3.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../view/assets/css/scrolling-nav.css" rel="stylesheet"> </head>

    </head>
    <body>
    
<!--navbar here--->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">BCRS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      
    </ul>
    <div class=" nav-item text-right">
    <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?php echo("hello captain: $lname");?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="../login1.php">Logout</a>
  </div>
</div>
   
    </div>
  </div>
</nav>
 <!--end navbar-->
 <!--page content-->
    Hello world the system is still on progress be right back
    <!--page content end-->
</bdoy>

<a href="../login1.php">logout</a>
</html>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
