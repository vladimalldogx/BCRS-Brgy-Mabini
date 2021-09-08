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
			$ava = "{$key['picture']}";
			
				
	}
   
    
?>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BCRS Home</title>
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
						<div class="profile_pic">    <img src="#" class="img-fluid" width="100"></div>
						
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
								<li> <a href="residentHome.php"><i class="fa fa-home"></i> Home </a> </li>
								<li> <a href="#"><i class="fa fa-lock"></i> Resident Information </a> </li>
								<li> <a href="#"><i class="fa fa-check-square-o"></i> Barangay Official and staff </a> </li>
								<li> <a href="#"><i class="fa fa-book"></i> Request Certificate / Clearance</a> </li>
								<li> <a href="#"><i class="fa fa-list"></i> Request Barangay Permit  </a> </li>
								<li> <a href="#"><i class="fa fa-bar-chart"></i> File Blotter</a> </li>
								
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
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='../../assets/uploads/resident_profile/{$ava}' alt='Avatar'> {$lastname} <span class='fa fa-angle-down'></span> </a>";
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
							<h3>Blotter</h3> </div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>File a Complain </h2>
									<div class="clearfix"></div>
								</div>
								<?php
								require_once("../../server/homecon.php");
								$error_message = "";
								$error = false;
								$complainant    ="";
								$respondent 	= "";
								$victim 	    = "";
								$type 	        = "";
								$location 	    = "";
								$date           = "";
								$time 	        = "";
								$status 	    = "";
								$details 	    ="";
									
								if(isset($_POST['save'])){
								   $complainant  = $_POST['complainant'];
									$respondent 	= $_POST['respondent'];
									$victim 	    = $_POST['victim'];
									$type 	        = $_POST['type'];
									$location 	    = $_POST['location'];
									$date           = $_POST['respondent'];
									$time 	        = $_POST['time'];
									$status  	    = $_POST['status'];
									$details 	    =$_POST['details'];

									$query = "INSERT INTO blotter(complainant, respondent, victim, type, location, date, time, details, status)VALUES('$complainant', '$respondent','$victim', '$type','$location','$date', '$time','$details', '$status')";
											mysqli_query($con, $query);
											$error_message = "Record successfully saved!";
											$error = false;
											}
									
								

								?>
								<div class="x_content">
								<div class ="text-center">
                                			<div class="card-tools">
											<a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
											<i class="fa fa-plus"></i>
												File a Blotter/Incident Report
												</a>

											</div>
								</div>             
                            <!-- Modal -->
                            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Manage Blotter</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="blotter.php" >
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Complainant</label>
                                                            <input type="text" class="form-control" value="<?=$fisrtname?> <?=$lastname?>" name="complainant" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Respondent</label>
                                                            <input type="text" class="form-control" placeholder="Enter Respondent Name" name="respondent" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Victim(s)</label>
                                                            <input type="text" class="form-control" value="<?=$fisrtname?> <?=$lastname?>" placeholder="Enter Victim(s) Name" name="victim" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <select class="form-control" name="type">
                                                                <option disabled selected>Select Blotter Type</option>
                                                                <option value="Amicable">Amicable</option>
                                                                <option value="Incident">Incident</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <input type="text" class="form-control" placeholder="Enter Location" name="location" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input type="date" class="form-control" name="date" value="<?= date('Y-m-d'); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Time</label>
                                                            <input type="time" class="form-control" name="time" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status">
                                                                <option disabled selected value="PENDING">PENDING</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Details</label>
                                                    <textarea class="form-control" placeholder="Enter Blotter or Incident here..." name="details" required></textarea>
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
									<?php
									if($error_message !=""){
									echo"<script>alert('blotter added wait for the text message ');</script>";
									}
									?>
										
                                    </div>
                                </div>
                            </div>
                            <!--modal end --->
                                 </div>
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
    
    </body>
     
    </html>
  	<script src="../../assets/js/jq.js"></script>
	<script src="../../assets/js/bs.js"></script>
	<script src="../../assets/js/fc.js"></script>
	<script src="../../assets/js/progress.js"></script>
	<script src="../../assets/js/custom.js"></script>
   
   


