<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>BCRS</title>
	<link rel="icon" type="image/png" href="view/image/lock.png">
	<!-- Bootstrap core CSS -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/w3.css" rel="stylesheet">
	<link href="assets/css/w3.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="view/assets/css/scrolling-nav.css" rel="stylesheet"> </head>

<body id="page-top" ng-app="myApp" ng-controller="myCtrl">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-blue fixed-top" style="background-color: #e3f2fd;" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="view/image/locker.png" width="50" height="50" alt=""><span class="w3-hide-small w3-text-grey">Mabini</span><span class="w3-padding w3-black w3-opacity-min"><b>BCRS</b></span> </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#about">About</a> </li>
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#services">Services</a> </li>
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#inquiries">Inquiries</a> </li>
					<li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#contact">Contact</a> </li>
					<div class=" nav-item text-right">
        		<div class="dropdown">
    	  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      			LoginAs
      			</button>
     				 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        			<a class="dropdown-item" href="loginpage/barangaystaff/login1.php">Staff or Official</a>
					<a class="dropdown-item" href="loginpage/resident/login1.php">I Am resident / visitor</a>
      				</div>
    				</div>
				</ul>
			</div>
		</div>
	</nav>
	<div class="mySlides w3-display-container w3-center"> <img src="images/image1.jpg" height="600" width="100%">
		<div class="w3-display-middle w3-margin-top w3-center">
			<h1 class="w3-xxlarge w3-text-white"> <span class="w3-hide-small w3-text-grey">Mabini</span><span class="w3-padding w3-black w3-opacity-min"><b>BCRS</b></span></h1> </div>
	</div>
	<div class="mySlides w3-display-container w3-center"> <img src="images/image2.jpg" height="600" width="100%">
		<div class="w3-display-middle w3-margin-top w3-center">
			<h1 class="w3-xxlarge w3-text-white"> <span class="w3-hide-small w3-text-grey">Mabini</span><span class="w3-padding w3-black w3-opacity-min"><b>BCRS</b></span></h1> </div>
	</div>
	<div class="mySlides w3-display-container w3-center"> <img src="images/image3.jpeg" height="600" width="100%">
		<div class="w3-display-middle w3-margin-top w3-center">
			<h1 class="w3-xxlarge w3-text-white"> <span class="w3-hide-small w3-text-grey">Mabini</span><span class="w3-padding w3-black w3-opacity-min"><b>BCRS</b></span></h1> </div>
	</div>
	</br>
	<section id="about">
	<div class="w3-container col-lg-8 mx-auto ">
	<h1><span class="w3-padding w3-black w3-opacity-min w3-round">Anouncement for today</span></h1>
		<div class="w3-container">
			<div class="w3-container ">
				</br> 
				<?php
					$html="";
					$errmsg="";
					require_once("server/homecon.php");
					$query = "SELECT * FROM announcement WHERE status ='APPROVED' ";
					$result = mysqli_query($con, $query);
					while($rows = mysqli_fetch_assoc($result)){
					
					$html .= "
								 <h4> ".$rows['purpose']."
								 <h5> ".$rows['annountype']."</h5>
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
				<small><?php echo $html;?></small>
			</small> </div>
			</div>
			</br>
		<div class="w3-container">
			<div class="w3-container col-lg-8 mx-auto">
				<h1><span class="w3-padding w3-black w3-opacity-min w3-round">About Us</span></h1>
				<div class="w3-container">
					<div class="w3-container">
						</br> <small>With safety and security being two key assurances all schools should give to their students, it’s often surprising how many schools fail to provide a safe space for students to store their belongings. Far from simply being a ‘nice-to-have’, school lockers offer a great deal to students, teachers and parents beyond serving as a secure place for students to keep their things over the course of the school day.</small> </div>
				</div>
				
				<h3><span class="w3-padding w3-black w3-opacity-min w3-round">We can assure your the following:</span></h3>
				<div class="w3-row-padding w3-container">
					<div class="w3-container w3-left" style="width:50%"> </div>
					<div class="w3-container w3-left">
						</br>
						<h1>Security</h1> <small>The single most important thing that lockers provide for students is security. With an increasing number of students carrying a mobile phone, tablet or even laptop, lockers for schools are more important than ever when it comes to keeping cases of theft and damage to a minimum. The added security of school lockers isn’t only beneficial to students, either, as the presence of a personal locker gives parents peace of mind that their children’s costly belongings are secure throughout the day.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Independence and Respect</h1> <small>One key lesson that school lockers teach children is the responsibility of looking after their own possessions and the importance of their belongings – a lesson which will stay with them in later life. Lockers in schools teach students to respect not only their own possessions, but also those of their peers.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Health and Safety</h1> <small>With research supporting the claim that heavy backpacks can cause back pain and related issues, school lockers play an important role in ensuring the health and wellbeing of students. For students carrying particularly heavy loads – including textbooks and electronic devices, on top of their everyday possessions – the strain of this collective weight can contribute to back pain and discomfort.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Personalisation</h1> <small>With many students following a uniform dress code, it can be difficult for students to express creativity and individualism outside of the classroom. Giving students a personal area they can call their own – and allowing them to personalise it with stickers, photos and other embellishments – is one way to let their unique personality shine through. While ground rules should be laid out regarding what students can and can’t do with their lockers, giving them the freedom to add their own finishing touches may seem small but can make a big difference to their overall wellbeing – particularly for students who struggle socially.</small> </div>
					<div class="w3-container w3-left">
						</br>
						</br>
						<h1>Privacy</h1> <small>Privacy is important. Whether you’re a student, teacher, parent or professor, privacy is something we all see as valuable – but why is that? The concept of privacy creates boundaries that teach students about mutual respect, defines value in their belongings, thoughts and ideas, and builds trust by giving them access to a space that’s theirs and theirs alone. A locker plays an essential role in guaranteeing privacy by creating a place in schools where students can house their personal belongings, rather than having them out in the open.</small> </div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2>Lockers Available in all Department</h2>
					<p class="lead">
						<ol>
							<li ng-repeat="x in dept">{{x.dept_description}}</li>
						</ol> Availble Lockers :
						<table class="table-striped">
							<thead>
								<tr>
									<th ng-repeat="d in label ">{{ d }}</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="l in locker ">
									<td>{{ l.dept_id}} </td>
									<td>{{ l.NoOfLockers}} </td>
								</tr>
							</tbody>
						</table>
						For more info see the the department 
						<br>
						<button type="button" class="btn btn-secondary"  data-target="#"><a href="studentside/loginstudent.php">Login to see all department</a></button>
					</p>
				</div>
			</div>
		</div>
	</section>
	<section id="inquiries">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2>Inquires</h2>
					<center> insert info here</center>
				</div>
			</div>
		</div>
	</section>
	<section id="contact" class="bg-light">
		<div class="w3-container">
			<div class="w3-row-padding w3-grayscale">
				<h1 class="w3-center">Contact us</h1> </br>
				Insert Contact here
			</div>
		</div>
	</section>
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body">
					<form method="post" action="controller/loginController/loginUser.php">
						<input type="text" class="form-control" placeholder="Username" required="" name="username" />
						<br/>
						<input type="password" class="form-control" placeholder="Password" required="" name="password" />
						<br/>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; LockItUp 2018</p>
		</div>
		<!-- /.container -->
	</footer>
	<!-- Bootstrap core JavaScript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/angular.js"></script>
	<!-- Plugin JavaScript -->
	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom JavaScript for this theme -->
	<script src="assets/js/scrolling-nav.js"></script>
	<script>
	var myIndex = 0;
	carousel();

	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for(i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		myIndex++;
		if(myIndex > x.length) {
			myIndex = 1
		}
		x[myIndex - 1].style.display = "block";
		setTimeout(carousel, 4000);
	}
	</script>
	<script>
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('controller/lockerController/countLocker.php').then(function(response) {
			$scope.label = ["Dept Code", "No. of Lockers"];
			$scope.locker = response.data;
		});
		$http.get('controller/departmentController/allDept.php').then(function(response) {
			$scope.dept_label = ["Dept ID ", "Dept Code"];
			$scope.dept = response.data;
		});
	});
	</script>
</body>

</html>