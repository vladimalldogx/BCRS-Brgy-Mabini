    <html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BCRS-registration</title>
	<link rel="icon" type="image/png" href="view/image/lock.png">
	<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/atlantis.css">
<link rel="stylesheet" href="assets/css/custom.css">

    
	<!-- Custom styles for this template -->
	 </head>
    <?php echo $msg;?>
            <form method="POST" action="save_info.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="width: 370px; height: 250;" class="text-center" id="my_camera">
                                            <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" >
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam">Open Camera</button>
                                            <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo()">Capture</button>   
                                        </div>
                                        <div id="profileImage">
                                            <input type="hidden" name="profileimg">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="img" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label>National ID No.</label>
                                            <input type="text" class="form-control" name="national" placeholder="Enter National ID No." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Citizenship</label>
                                            <input type="text" class="form-control" name="citizenship" placeholder="Enter citizenship" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Firstname</label>
                                                    <input type="text" class="form-control" placeholder="Enter Firstname" name="fname" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Middlename</label>
                                                    <input type="text" class="form-control" placeholder="Enter Middlename" name="mname" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Lastname</label>
                                                    <input type="text" class="form-control" placeholder="Enter Lastname" name="lname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Alias</label>
                                                    <input type="text" class="form-control" placeholder="Enter Alias" name="alias">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Place of Birth</label>
                                                    <input type="text" class="form-control" placeholder="Enter Birthplace" name="bplace" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Birthdate</label>
                                                    <input type="date" class="form-control" placeholder="Enter Birthdate" name="bdate" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="number" class="form-control" placeholder="Enter Age" min="1" name="age" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                    <label>Civil Status</label>
                                                    <select class="form-control" name="cstatus">
                                                        <option disabled selected>Select Civil Status</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widow">Widow</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" required name="gender">
                                                        <option disabled selected value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Purok</label>
                                                    <select class="form-control" required name="purok">
                                                        <option disabled selected>Select Purok Name</option>
                                                    
                                                            <option value=""></option>
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Voters Status</label>
                                                    <select class="form-control vstatus" required name="vstatus">
                                                        <option disabled selected>Select Voters Status</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Identified As</label>
                                                    <select class="form-control indetity" name="indetity">
                                                        <option value="Positive">Positive</option>
                                                        <option value="Negative">Negative</option>
                                                        <option value="Unidentified">Unidentified</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>username</label>
                                                    <input type="text" class="form-control" placeholder="Enter username" name="username">
                                                </div>
                                                <div class="col">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Contact Number" name="number">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Occupation</label>
                                                    <input type="text" class="form-control" placeholder="Enter Occupation" name="occupation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" required placeholder="Enter Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
    </html>