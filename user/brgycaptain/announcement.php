<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../../server/db_class.php");

	//check for login

	if(! isset($_SESSION["username"]) )
	{
		header("location: ../loginpage/brgystaff/login1.php");
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
			$utype = "{$key['position']}";
			
			
				
	}
    
    
?>



<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BCRS-BrgyCaptain</title>
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
 <body>
    <body class="nav-md">
    <div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"> <span> MabiniBCRS</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="#" alt="Avatar" class="#"> </div>
						
						<?php
						
						echo"<div class='profile_info'> <span>Welcome {$utype} </span> <h2>{$fname} {$lname}</h2> </div>";
						
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
								<li> <a href="captainHome.php"><i class="fa fa-home"></i> Home </a> </li>
								<li> <a href="#"><i class="fa fa-lock"></i> Resident Information </a> </li>
								<li> <a href="announcement.php"><i class="fa fa-lock"></i> Announcements </a> </li>
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
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='image/blank.png' alt='Avatar'> {$fname} <span class='fa fa-angle-down'></span> </a>";
							?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="javascript:;"> Profile</a></li>
									<li><a href="../../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
							<h3>Barangay Announcements</h3> </div>
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
                                <?php
                                $html="";
                                $errmsg="";
                                require_once("../../server/dataconn.php");
                                $query = "SELECT * FROM announcement";
                                $result = mysqli_query($con, $query);
                                while($rows = mysqli_fetch_assoc($result)){
                                
                                $html .= "
                                            <h4> ".$rows['subject']."
                                            <h5> ".$rows['option']."</h5>
                                            Posted By:".$rows['staffname']."
                                            </br>
                                            ".$rows['date_posted']."
                                            </br>
                                            ".$rows['details']."
                                        
                                            
                                            </td>
                                                            </tr>";
                                                }
                                    //else{
                                        //echo("no message");
                                    //}
                                ?>
                <?php echo $html;?>

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
				<div class="pull-right"> Software Engineering 2018
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