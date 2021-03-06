<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: ./login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>NU-Forum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
	body {
	  font-family: 'Lato', sans-serif;
	}

	.overlay {
	  height: 100%;
	  width: 0;
	  position: fixed;
	  z-index: 1;
	  top: 0;
	  left: 0;
	  background-color: rgb(0,0,0);
	  background-color: rgba(0,0,0, 0.9);
	  overflow-x: hidden;
	  transition: 0.5s;
	}

	.overlay-content {
	  position: relative;
	  top: 25%;
	  width: 100%;
	  text-align: center;
	  margin-top: 30px;
	}

	.overlay a {
	  padding: 8px;
	  text-decoration: none;
	  font-size: 36px;
	  color: #818181;
	  display: block;
	  transition: 0.3s;
	}

	.overlay a:hover, .overlay a:focus {
	  color: #f1f1f1;
	}

	.overlay .closebtn {
	  position: absolute;
	  top: 20px;
	  right: 45px;
	  font-size: 60px;
	}

	@media screen and (max-height: 450px) {
	  .overlay a {font-size: 20px}
	  .overlay .closebtn {
	  font-size: 40px;
	  top: 15px;
	  right: 35px;
	  }
	}
	</style>
</head>
<body>
	<nav class="navbar bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="#">Discussion Categories</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon" onclick="openNav()"></span>
		</button>

		<!-- Navbar links -->
		<div id="myNav" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="overlay-content">
				<a href="./programming.php"><h5>Programming</h5></a>
				<a href="./maths.php"><h5>Maths</h5></a>
				<a href="./chemistry.php"><h5>Chemistry</h5></a>
				<a href="./physics.php"><h5>Physics / Electronics</h5></a>
				<a href="./ds.php"><h5>Data Structures</h5></a>
				<a href="./communication.php"><h5>Communication Skills</h5></a>
				<a href="./economics.php"><h5>Economics</h5></a>
				<br><br>
				<a href="./changepass.php"><h4>Change Password</h4></a>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 10%;">
		<h3>Categories</h3>
		<p>Select Category from below and sub-category from sidebar to create/view threads about it.</p> 
		<br>
		<center><a href="home.php"><button type="button" class="btn btn-primary active">I Year</button></a></center>
		<br><br>
		<center><a href="home2.php"><button type="button" class="btn btn-outline-primary">II Year</button></a></center>
		<br><br>
		<center><a href="misc.php"><button type="button" class="btn btn-outline-primary">Miscellaneous</button></a></center>
	</div>
</body>
<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
</html>