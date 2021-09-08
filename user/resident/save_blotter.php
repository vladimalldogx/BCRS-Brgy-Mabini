<?php 
	include('../../server/dataconn.php');

   
    
    
	$complainant    = $conn->real_escape_string($_POST['complainant']);
	$respondent 	= $conn->real_escape_string($_POST['respondent']);
    $victim 	    = $conn->real_escape_string($_POST['victim']);
	$type 	        = $conn->real_escape_string($_POST['type']);
    $location 	    = $conn->real_escape_string($_POST['location']);
    $date           = $conn->real_escape_string($_POST['date']);
	$time 	        = $conn->real_escape_string($_POST['time']);
    $status 	    = $conn->real_escape_string($_POST['status']);
    $details 	    = $conn->real_escape_string($_POST['details']);

    if(!empty($complainant) && !empty($respondent) && !empty($victim) && !empty($type) && !empty($location) && !empty($date) && !empty($time) && !empty($status) && !empty($details)){

        $insert  = "INSERT INTO blotter (`complainant`, `respondent`, `victim`, `type`, `location`,`date`, `time`, `details`, `status`) 
                    VALUES ('$complainant', '$respondent','$victim', '$type','$location','$date', '$time','$details', '$status')";
        $result  = $conn->query($insert);

        if($result === true){
            $message= 'Blotter added!';
      

        }else{
            $message = 'Something went wrong!';
            
        }

    }else{

      $message= 'Please fill up the form completely!';
     
    }

    header("Location: blotter.php");

	$conn->close();