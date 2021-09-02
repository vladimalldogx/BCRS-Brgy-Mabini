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

	$id = $_SESSION["username"];
	$Hi = "";


	$exist_user = MYDB::query(
															"select
																*
															from
																users
															where
																username = ? "
															,
															array($id)
															,
															"SELECT"
														);
	
	
	foreach ($exist_user as $key){
			$id = "{$key['username']}";
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
	<title>BCRS-Secretary</title>
	<link rel="icon" type="image/png" href="view/image/lock.png">
	<!-- Bootstrap core CSS -->
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/w3.css" rel="stylesheet">
	<link href="../assets/css/w3.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../view/assets/css/scrolling-nav.css" rel="stylesheet"> </head>

    </head>
    <body>
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
            <a class="nav-link" href="#">services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">aboutUs</a>
          </li>
          
        </ul>
        <div class=" nav-item text-right">
        <div class="dropdown">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo("hello Secretary: $lname");?>
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
    <form>
    <!--button-->
 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Announcement 
        </button>
    <!--- end button for modal-->    
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post an Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject for the announcement</label>
    <input type="text" name="txtsub" class="form-control" id="exampleFormControlInput1" placeholder="subject for the announcement">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select type</label>
    <select class="form-control" name="seltype" id="exampleFormControlSelect1">
      <option>Urgent/important</option>
      <option>Non-urgent</option>
      <option>Job-Posting</option>
     
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Your Message</label>
    <textarea class="form-control" name="txtmsg" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="create" class="btn btn-primary">Post</button>
      </div>
    </div>
  </div>
</div>
<!--modal end-->

    <!--page content end-->
     <!-- back-end for the modal result--->
     <?php 
			$txtsub = "";
			$selype = "";
			$txtmsg = "";
			$lname = "";
     
     $stat="PENDING";
			
			if(isset($_POST["crete"]))
			{
				$lastname = trim($_POST["lastname"]);				
				$firstname = trim($_POST["firstname"]);				
				$email = trim($_POST["email"]);				
				$password = trim($_POST["password"]);					

				require_once("db.php");
				
				$db = MYDB::query(
									"insert into users (lastname, firstname, email, password) 
									 values
									 (?, ?, ?, ?)",
									 array($lastname, $firstname, $email, md5($password)),
									 "INSERT"
								);

				header("location: home.php");
				exit;
			}
		?>
    </bdoy>
    
   
    </html>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    