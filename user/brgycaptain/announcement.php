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
	<link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/responsive.bootstrap.min.css">
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
									<h2>Manage Barangay Annoucement</h2>
									<div class="clearfix"></div>
								</div>
								<br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject/title</th>
                    <th>Attention type</th>
                    <th>Message</th>	
                    <th>Posted By</th>
					<th>STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
           
            <tbody>
			
                <?php 
					require_once("../../server/dataconn.php");
                    $sql = "SELECT  * FROM announcement ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row['aid'];
                            $subject = $row['purpose'];
                            $option = $row['annountype'];
                            $message = $row['details'];
                            $sname = $row['staffname'];
							$stat = $row['status'];
                            $dp = $row['date_posted'];
                           // $qty = $row['qty'];

                           // if($qty == 0){
                               // $alert = "<div class='alert alert-danger'>
                                //<strong>$qty</strong> No Stock
                                //</div>";
                           // }else if($dp >= $qty){
                                //$alert = "<div class='alert alert-warning'>
                              //  <strong>$qty</strong> Critical Level
                             //   </div>";
                           // }else {
                                
                          //  }

                    ?>
                <tr>
				<td>
                     <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $subject; ?>
                    </td>
                    <td>
                        <?php echo $option; ?>
                    </td>
                    <td>
                        <?php echo $message; ?>
                    </td>
                    <td>
                        <?php echo $sname; ?>
                    </td>
					<td>
						<?php echo $stat;?>
					</td>
                    <td>
                        <a href="#edit<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
    
                            </div>
                        </div>
                    </div>
                    <!--Edit Item Modal -->
                    <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-sm">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Announcement</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="item_code">Purpose</label>
											<select class="custom-select custom-select-lg mb-3 form-control" value="<?php echo $option; ?>"  name="option">
											<option selected><?php echo $option; ?></option>
											<option value="Urgent / Important">Urgent / Important</option>
											<option value="Not Urgent / Unimportant">Not Urgent / Unimportant</option>
		
											</select>
                                        </div>

                                        <div class="form-group">
                                            <label for="item_name">Title of the Mssage:</label>
                                            <input type="text" class="form-control" id="msgname" name="msgname" value="<?php echo $subject; ?>" placeholder="Item Name" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="item_description">Enter your message:</label>
                                            <textarea class="form-control" id="item_description" name="txtmsg" placeholder="Description" required><?php echo $message ;   ?></textarea>
                                        </div>
										<div class="form-group">
                                            <label for="item_code">Status</label>
											<select class="custom-select custom-select-lg mb-3 form-control" value="<?php echo $stat; ?>"  name="stat">
											<option selected><?php echo $stat; ?></option>
											<option value="DENIED">DENIED</option>
											<option value="APPROVED">APPROVED</option>
		
											</select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Update</button>
                                    </div>
									</div>
								</div>
							</form>
						</div>
						<!--Delete Modal -->
						<div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<form method="post">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Delete</h4>
										</div>
										<div class="modal-body">
											<input type="hidden" name="delete_id" value="<?php echo $id; ?>">
											<div class="alert alert-danger">Are you Sure you want Delete <strong>
													<?php echo $subject; ?>?</strong> </div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
												<button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					
                <?php
                        }
                        
                        }


                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $msgname = $_POST['msgname'];
                            $option = $_POST['option'];
                            $txtmsg = $_POST['txtmsg'];
							$stat = $_POST['stat'];
                            
                            $sql = "UPDATE announcement SET 
                                purpose='$msgname',
                                annountype ='$option',
                                details    ='$txtmsg',
								status   = '$stat'
                                WHERE aid='$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>One announcement update"</script>';
							
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM announcement WHERE aid='$delete_id' ";
                           
                            
                        }
                    

                    //Add Item                           
				?>
           
    			</div>
				</tr>
					</tbody>
					</table>
                </form>
							
			
							
	       
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
	<script src="../../assets/js/jquery-1.12.4.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
  	<script src="../../assets/js/jq.js"></script>
	<script src="../../assets/js/bs.js"></script>
	<script src="../../assets/js/fc.js"></script>
	<script src="../../assets/js/progress.js"></script>
	<script src="../../assets/js/custom.js"></script>
	<script src="../../assets/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
            $('#example').DataTable({});
        });

	</script>