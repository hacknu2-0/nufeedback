<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: ./login.php");
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sampledb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if(isset($_POST['oldpass'])){
		if($_POST['newpass']==$_POST['renewpass']){
			$sql = "SELECT * FROM users";
			$result = $conn->query($sql);
		    while($row = $result->fetch_assoc()) {
				if($_SESSION['email']==$row['email']){
					if(password_verify($_POST['oldpass'], $row['password'])){
						$hash = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
						$sql = "UPDATE Users SET password='".$hash."' WHERE username='".$_SESSION['username']."'";

						if ($conn->query($sql) === TRUE) {
							header("Location: ./login.php?changepass=1");
						}else {
    						echo "Error updating record: " . $conn->error;
						}
					}
					else{
						$error = "Wrong current password !";
					}
				}
			}
		}
		else{
			$error = "Retype password correctly";
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
				<a href="./home.php">Home</a>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 10%;">
<?php
	if(isset($error)){
		echo "<div class='alert alert-danger'>
  				".$error."
				</div>";
	}
?>
		<h3>ChangePassword</h3>
		<br>
		<form action="" method="post">
			<div class="input-group mb-3 input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text">Old Password</span>
				</div>
				<input type="password" name="oldpass" class="form-control">
			</div>
			<div class="input-group mb-3 input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text">New Password</span>
				</div>
				<input type="password" name="newpass" class="form-control" required>
			</div>
			<div class="input-group mb-3 input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text">ReType New Password</span>
				</div>
				<input type="password" name="renewpass" class="form-control" required>
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