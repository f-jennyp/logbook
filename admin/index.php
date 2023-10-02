<?php
session_start();
include('../connection.php');
$admin = $_SESSION['admin'];
if ($admin == "") {
	header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<title>Admin Dashboard</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
	<script src="../js/ie-emulation-modes-warning.js"></script>

</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#f5f5f5;border-bottom:1px solid #eee;
">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">Visitors Attendance Logbook | TECH4ED</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">

					<li><a href="logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
				</ul>

			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<!--<li ><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>-->
					<!-- find users' image if image not found then show dummy image -->


					<li><a href="#"><img style="border-radius:20px" src="../images/logo.png" width="100%" alt="not found" /></a></li>



					<li><a href="index.php"><span class="fas fa-menorah"></span> Dashboard</a></li>
					<li><a href="index.php?page=create_attendance"><span class="fas fa-chart-bar"></span> Attendance</a></li>
					<li><a href="index.php?page=display_record"><span class="fas fa-database"></span> Record</a></li>
					<li><a href="index.php?page=settings"><span class="fas fa-cog"></span> Settings</a></li>


				</ul>


			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<!-- container-->
				<?php
				@$page =  $_GET['page'];
				if ($page != "") {

					// CREATE ATTENDANCE
					if ($page == "create_attendance") {
						include('ATTENDANCE/create_attendance.php');
					}
					// READ/DISPLAY RECORD
					if ($page == "display_record") {
						include('RECORD/display_record.php');
					}
					// SEARCH RECORD
					if ($page == "search_record") {
						include('RECORD/search_record.php');
					}


					if ($page == "settings") {
						include('settings.php');
					}
				} else {
					include('dashboard.php');
				}
				?>



			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')
	</script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/vendor/holder.min.js"></script>
	<script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>