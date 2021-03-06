<?php 
session_start();
if (!isset($_COOKIE['user'])) {
	header('location:csmLogin.php?msg=You have not logged in');
}
?>
<?php
//form input validation
	function validateInput($userInput){
		if (isset($_POST["Enter"])) {
			if (empty($userInput)){
			$input_error= '<font color="red"> User input is empty </font>';
			return $input_error;
			}
		}
	}
?>
<?php
//db connection
	$servername="localhost";
	$ftp_Username="root";
	$password="";
	$con=mysql_connect($servername,$ftp_Username,$password);
	if(!$con){
		echo"there was error in making the connection".mysql_error();
	}
	//select db
	else{
		$db=mysql_select_db('classicsystems');
		if(!$db){
			echo mysql_error();
		}
		if(isset($_POST['Enter'])){
			//form processing
			$coursecode="";
			$coursename="";
			$duration="";
			$dateaccredited="";
			$accreditedby="";
			$coursecode=$_POST['Coursecode'];
			$coursename=$_POST['coursename'];
			$duration=$_POST['duration'];
			$dateaccredited=$_POST['dateaccredited'];
			$accreditedby=$_POST['accreditedby'];
			
			//perform query
			$query="INSERT INTO course(coursecode,coursename,duration,date_accredited,accredited_by)
			VALUES('$coursecode','$coursename','$duration','$dateaccredited','$accreditedby')";
			$query=mysql_query($query);
			if (!$query) {
				die(mysql_error());
			}
			else{
				/*query result which redirects user to the courses dashboard*/
				header('location:csmCoursesDashboard.php?msg= Courses Added Successfully');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSM Courses</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/csmxtension.css">

  <link rel="stylesheet" type="text/css" href="css/courses.css">
</head>
<body>

	<nav class="navbar navbar-expand-md">
		
		<img class="img-fluid" src="images/log.png" alt="logo">
		<button  class="navbar-toggler navbar-dark"  type="button" data-toggle="collapse" data-target="#main-navigation">
			<span  class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-navigation">

	 		<ul  class="navbar-nav navbar-right">
				<li><a href="index.php">HOME</a>
				</li>
				<li> <a href="csmServices.php">SERVICES</a></li>
				<li> <a href="csmRegistration.php">REGISTRATION</a></li>
				<li><a class="active" href="csmLogin.php">MANAGEMENT</a></li>
				<li> <a href="csmContact.php">CONTACT US</a></li>
			</ul>
		</div>
	</nav>

 
	<div class="container-fluid" id="wrapper">
		<div id="aside"> 

			<a href="csmLogin.php" class="col-12" id="link"> Home</a>
				
			<a href="csmProspect.php" class="col-12" id="link"> Receive Prospect</a>

			<a href="csmStudent.php" class="col-12" id="link">Enroll Student</a>

			<a href="csmCourses.php" class="col-12 active" id="link">Add Courses</a> 

			<a href="csmClasses.php" class="col-12" id="link">Add Classes</a>

			<a href="csmGradebook.php" class="col-12" id="link">Gradebook</a>

			<a href="csmPayment.php" class="col-12" id="link">Payment History</a>

			<a href="csmCertification.php" class="col-12" id="link">Certification</a>
		</div>
		
		<div id="main">	
			<header>
				<h5>CLASSIC'S STUDENT MANAGEMENT</h5>
			</header>
			<div id="content">
						<a class="btn btn-primary" id="logout" href="logout.php">LOGOUT</a>  </button><br><br><br><br>

<form method="POST" action="csmCourses.php">
						
						<div class="form-group">
						<label>COURSE CODE:</label>
						<input class="form-control" type="text" name="Coursecode">
						</div>
					
						<div class="form-group">
						<label>COURSENAME:</label>
						<input class="form-control" type="text" name="coursename">
						</div>

						<div class="form-group">
						<label>DURATION:</label>
						<input class="form-control" type="text" name="duration">
						</div>

						<div class="form-group">
						<label>DATE ACCREDITED:</label>
						<input class="form-control" type="Date" name="dateaccredited">
						</div>

						<div class="form-group">
						<label>ACCREDITED BY:</label>
						<input class="form-control" type="text" name="accreditedby">
						</div>

						<input class="btn btn-primary" type="submit" name="Enter" value="ADD COURSES">
					
						</form>
					</div>
				</div>
			</div>
	</div>

	

	<footer class="footer">
		<div class="container-fluid">
			<div id="below">
				<div class="footerbox below">
					<h6 class="text-uppercase font-weight-bold">ADO-EKITI</h6>
					<p>Olaoluwa House, opp. Adamolekun Estate, Adebayo, Ado-Ekiti, Ekiti State.
					<br>+234 806 441 1101</p>
				</div>

				<div class="footerbox below">
					<h6 class="text-uppercase font-weight-bold">ONDO</h6>
					<p>7a, Mode str. opp. Holy Trinity Ang. Church, Yaba, Ondo Town, Ondo State.
					<br>+234 806 441 1101</p>
				</div>

				<div class="footerbox below">
					<h6 class="text-uppercase font-weight-bold">OSHOGBO</h6>
					<p>Beside Eco Bank, Onward Junction, Gbn Road, Oshogbo, Osun State.
					<br>+234 806 441 1101</p>
				</div>

				<div class="below">
					<h6 class="text-uppercase font-weight-bold">IBADAN</h6>
					<p>20, Oyo Road, opp. UI Post Office, Ibadan, Oyo State.
					<br>+234 806 441 1101</p>
				</div>
			</div>
		</div>
		<div  class="copyright text-center">© 2020 Copyright. All Rights Reserved.</div>
	</footer>

<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	$('.body').height($(window).height());
})
</script>
</body>
</html>