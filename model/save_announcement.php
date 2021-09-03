<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    $subject 	= $conn->real_escape_string($_POST['subject']);
    $annountype 	= $conn->real_escape_string($_POST['type']);
	$details 	= $conn->real_escape_string($_POST['details']);

    if(!empty($annountype) && !empty($details)){

        $insert  = "INSERT INTO announcement (`subject`, `type`, `details`) VALUES ('$subject','$annountype' ,'$details')";
        $result  = $conn->query($insert);
        

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../../user/brgysec/secretaryHome.php");

	$conn->close();