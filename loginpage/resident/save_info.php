<?php 
	include '../../server/dataconn.php';

	
    $msg ="";
    
	$national_id 		= $conn->real_escape_string($_POST['national']);
	$citizen 		= $conn->real_escape_string($_POST['citizenship']);
	$fname 		= $conn->real_escape_string($_POST['fname']);
	$mname 		= $conn->real_escape_string($_POST['mname']);
    $lname 		= $conn->real_escape_string($_POST['lname']);
	$alias 		= $conn->real_escape_string($_POST['alias']);
    $bplace 	= $conn->real_escape_string($_POST['bplace']);
	$bdate 		= $conn->real_escape_string($_POST['bdate']);
    $age 		= $conn->real_escape_string($_POST['age']);
    $cstatus 	= $conn->real_escape_string($_POST['cstatus']);
	$gender 	= $conn->real_escape_string($_POST['gender']);
    $purok 		= $conn->real_escape_string($_POST['purok']);
	$vstatus 	= $conn->real_escape_string($_POST['vstatus']);
    $indetity 	= $conn->real_escape_string($_POST['indetity']);
    $email 	    = $conn->real_escape_string($_POST['email']);
    $username	    = $conn->real_escape_string($_POST['username']);
    $password 	    = $conn->real_escape_string($_POST['password']);
	$number 	= $conn->real_escape_string($_POST['number']);
	$occupation 	= $conn->real_escape_string($_POST['occupation']);
    $address 	= $conn->real_escape_string($_POST['address']);
	$profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
	$profile2 	= $_FILES['img']['name'];

	// change profile2 name
	$newName = date('dmYHis').str_replace(" ", "", $profile2);

	  // image file directory
  	$target = "../../assets/uploads/resident_profile/".basename($newName);
	$check = "SELECT id FROM resident WHERE national_id='$national_id'";
	$nat = $conn->query($check)->num_rows;	

	if($nat == 0){
		if(!empty($fname)){

			if(!empty($profile) && !empty($profile2)){

				$query = "INSERT INTO resident (`national_id`,citizenship,`picture`, `firstname`, `middlename`, `lastname`, `alias`, `birthplace`, `birthdate`, age, `civilstatus`, `gender`, `purok`, `voterstatus`, `identified_as`, `phone`, `email`, occupation, `address`) 
							VALUES ('$national_id','$citizen','$profile','$fname','$mname','$lname','$alias','$bplace','$bdate',$age,'$cstatus','$gender','$purok','$vstatus','$indetity','$number','$email','$occupation','$address')";

				if($conn->query($query) === true){

					$msg['message'] = 'Resident Information has been saved!';
					
				}
			}else if(!empty($profile) && empty($profile2)){

				$query = "INSERT INTO resident (`national_id`, citizenship, `picture`, `firstname`, `middlename`, `lastname`, `alias`, `birthplace`, `birthdate`, age, `civilstatus`, `gender`, `purok`, `voterstatus`, `identified_as`, `phone`, `email`,occupation, `address`) 
							VALUES ('$national_id','$citizen','$profile','$fname','$mname','$lname','$alias','$bplace','$bdate',$age,'$cstatus','$gender','$purok','$vstatus','$indetity','$number','$email','$occupation','$address')";

				if($conn->query($query) === true){

					$msg['message'] = 'Resident Information has been saved!';
					
				}

			}else if(empty($profile) && !empty($profile2)){

				$query = "INSERT INTO resident (`national_id`, citizenship, `picture`, `firstname`, `middlename`, `lastname`, `alias`, `birthplace`, `birthdate`, age, `civilstatus`, `gender`, `purok`, `voterstatus`, `identified_as`, `phone`, `email`, occupation, `address`) 
							VALUES ('$national_id','$citizen','$newName','$fname','$mname','$lname','$alias','$bplace','$bdate',$age,'$cstatus','$gender','$purok','$vstatus','$indetity','$number','$email','$occupation','$address')";

				if($conn->query($query) === true){

					$msg = 'Resident Information has been saved!';
					

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$msg= 'Resident Information has been saved!';
					
				}

			}else{
				$query = "INSERT INTO resident (`national_id`, citizenship, `picture`,`firstname`, `middlename`, `lastname`, `alias`, `birthplace`, `birthdate`, age, `civilstatus`, `gender`, `purok`, `voterstatus`, `identified_as`, `phone`, `email`, occupation, `address`) 
							VALUES ('$national_id','$citizen','person.png','$fname','$mname','$lname','$alias','$bplace','$bdate',$age,'$cstatus','$gender','$purok','$vstatus','$indetity','$number','$email','$occupation','$address')";

				if($conn->query($query) === true){

					$msg= 'Resident Information has been saved!';
					
				}
			}

		}else{

			$msg = 'Please complete the form!';
			
		}
	}else{
		$msg= 'National ID is already taken. Please enter a unique national ID!';

	}
     header("Location: registration.php");
     
	$conn->close();
    }
