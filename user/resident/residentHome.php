<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../../server/db_class.php");

	//check for login

	if(! isset($_SESSION["username"]) )
	{
		header("location: ../loginpage/resident/login1.php");
		exit;
	}

	$id = $_SESSION["username"];
	$Hi = "";


	$exist_user = MYDB::query(
															"select
																*
															from
																resident
															where
																username = ? "
															,
															array($id)
															,
															"SELECT"
														);
	
	
	foreach ($exist_user as $key){
			$id = "{$key['id']}";
			$username = "{$key['username']}";
			$lastname = "{$key['lastname']}";
			$fisrtname = "{$key['firstname']}";
			
				
	}
   
    
?>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BCRS-Secretary</title>
	<link rel="icon" type="image/png" href="view/image/lock.png">
	<!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../assets/css/bs.css">
	<link rel="stylesheet" href="../../assets/css/fa.css">
	<link rel="stylesheet" href="../../assets/css/progress.css">
	<link rel="stylesheet" href="../../assets/css/animate.css">
	<link rel="stylesheet" href="../../assets/css/custom.css"> 
	<!-- Custom styles for this template -->
	 </head>
  <!-- other stylesheet-->
 
  </head>

    </head>
    <body>
    <body class="nav-md">
    <div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"> <span>BCRS</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="#" alt="Avatar" class="#"> </div>
						
						<?php
						
						echo"<div class='profile_info'> <span>Welcome  </span> <h2>{$lastname}</h2> </div>";
						
						?>
							
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
								<li> <a href="secretaryHome.php"><i class="fa fa-home"></i> Home </a> </li>
								<li> <a href="#"><i class="fa fa-lock"></i> Resident Information </a> </li>
								<li> <a href="#"><i class="fa fa-check-square-o"></i> Barangay Official and staff </a> </li>
								<li> <a href="#"><i class="fa fa-book"></i> Barangay Certificate and Clearance</a> </li>
								<li> <a href="#"><i class="fa fa-list"></i> Business Clearance </a> </li>
								<li> <a href="#"><i class="fa fa-bar-chart"></i> Blotter Records</a> </li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
						<ul class="nav navbar-nav navbar-right">
							<li class="">
							<?php
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='image/blank.png' alt='Avatar'> {$lastname} <span class='fa fa-angle-down'></span> </a>";
							?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="javascript:;"> Profile</a></li>
									<li><a href="../login1.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Home Page</h3> </div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Plain Page</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content"> 
             <!--page content-->
    

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
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
          <label for="exampleFormControlInput1">Subject</label>
       <input type="text" name="subject" class="form-control" required="required" id="exampleFormControlInput1">
     </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" name="anountype" id="exampleFormControlSelect1" required="required">
      <option>Urgent/important</option>
      <option>Non Urgent/unimportant</option>
      <option>Others</option>

    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" required="required" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
    <button type="submit" name="create" class="btn btn-primary">Post</button>
  </div>
  <label for="exampleFormControlSelect1" name="lblname"> Posted </label>
</form>. </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="create" class="btn btn-primary">Post</button>
      </div>
    </div>
  </div>
</div>
<!--modal end-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Mabini BCRS beta 2021
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
    <!--page content end-->
    </body>   
     <!-- back-end for the modal result--->
     <?php 
			$subject = "";
      $errmsg="";
			$anountype = "";
			$text = "";
      $status = "" ;
			
			if(isset($_POST["create"]))
			{
				$subject = trim($_POST["subject"]);				
				$anountype = trim($_POST["anountype"]);				
				$text = trim($_POST["text"]);					
				//$status = trim($_POST["status"]);	
        
       
        
        if(trim($subject) == "" || trim($anountype) == "" || trim($text) == ""  ){
          $error = "<p class = 'Warning'>Please fill out this field.</p>";
        }
        else{
          $db = MYDB::query(
            "insert into announcement(subject, anountype, details) 
             values
             (?, ?, ?, ?, ?)",
             array($subject, $anountype, $text),
             "INSERT"
          );
          if($db)
			  	{
				  echo "<script>alert('sucessfuly post');</script>";				
				  }
				  else 
				  {
					  echo "An error has occurred. Cannot insert.";					
				  }
  
        exit;
        }
				
			}
		?>
    </body>
     
    </html>
  	<script src="../../assets/js/jq.js"></script>
	<script src="../../assets/js/bs.js"></script>
	<script src="../../assets/js/fc.js"></script>
	<script src="../../assets/js/progress.js"></script>
	<script src="../../assets/js/custom.js"></script>
   
   

