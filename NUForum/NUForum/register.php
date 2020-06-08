<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sampledb";
	$error = '';
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if(isset($_POST['submit'])){
		$sql = "SELECT email FROM users";
		$result = $conn->query($sql);
	    while($row = $result->fetch_assoc()) {
	    	if($row['email']==$_POST['email']){
	    		$error = 'Email already exists';
	    	}
	    	if(!preg_match("/niituniversity.in$/", $_POST['email'])){
	    		$error = 'Not a university account';
	    	}
	    }
	    if($error==''){
	    	$_SESSION['regmail'] = $_POST['email'];
	    	header("Location: ./sendmail.php");
	    }
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
		<a class="navbar-brand" href="#">Menu</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon" onclick="openNav()"></span>
		</button>

		<!-- Navbar links -->
		<div id="myNav" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="overlay-content">
				<a href="./login.php">Login</a>
				<a href="./register.php">Register</a>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 10%;">
		<h3>Register</h3>
		<br>
		<p>Please use your university account to register on this forum</p>
		<br>
		<?php if($error != ''){ ?>
			<div class="alert alert-danger">
			<strong>Error!</strong> <?php echo $error; ?>
			</div>
		<?php } ?>
		<form action="" method="post">
			<div class="input-group mb-3 input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text">Email  </span>
				</div>
				<input type="text" name="email" class="form-control">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
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