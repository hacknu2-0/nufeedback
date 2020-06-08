<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sampledb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if(isset($_POST['email'])){
		$error = "No such email exists !";
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);
	    while($row = $result->fetch_assoc()) {
	    	if($row['email']==$_POST['email']){
	    		if(password_verify($_POST['password'], $row['password'])){
	    			$_SESSION['email'] = $row['email'];
	    			$_SESSION['username'] = $row['username'];
	    			header("Location: home.php");
	    		}
	    		else{
	    			$error = "Wrong Password";
	    		}
	    	}
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
<?php
	if(isset($_GET['accreg'])){
		echo "<div class='alert alert-success'>
  				Account succesfully registered ! Please check your email.
				</div>";
	}
	if(isset($_GET['changepass'])){
		echo "<div class='alert alert-success'>
  				Password succesfully changed !
				</div>";
	}

?>
<?php
	if(isset($error)){
		echo "<div class='alert alert-danger'>
  				".$error."
				</div>";
	}
?>
		<h3>Login</h3>
		<br>
		<form action="" method="post">
			<div class="input-group mb-3 input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text">Email  </span>
				</div>
				<input type="text" name="email" class="form-control">
			</div>
			<div class="input-group mb-3 input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text">Password</span>
				</div>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
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