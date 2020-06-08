<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sampledb";	
	$conn = new mysqli($servername, $username, $password, $dbname);
	session_start();
	if(!isset($_SESSION['email'])){
		header("Location: ./login.php");
	}
	if(isset($_POST['title'])){

		$sql = "INSERT INTO threads (Creator, IsMainThread, Time, Topic, Title, Text)
		VALUES ('".$_SESSION['username']."', '1', '".date("Y-m-d h:i:sa")."', 'MNG', '".$_POST['title']."', '".$_POST['text']."')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header("Location: ./mng.php");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
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
		<a class="navbar-brand" href="#">Management</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon" onclick="openNav()"></span>
		</button>

		<!-- Navbar links -->
		<div id="myNav" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="overlay-content">
				<a href="./home.php"><h5>Home</h5></a>
			</div>
		</div>
	</nav>
	<br>
	<center><h3>Threads</h3></center>
	<br>
	<center>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	Create Thread
	</button>
	</center>
	<br>

<?php
	$sql = "SELECT * FROM threads WHERE Topic='MNG' AND IsMainThread='1'";
	$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
?>
<a href="./showthread.php?creator=<?php echo $row['Creator']; ?>&title=<?php echo $row['Title']; ?>&topic=<?php echo $row['Topic']; ?>">
	<div class="alert alert-secondary">
		<strong><?php echo $row['Title']; ?></strong>
		<br>
		<?php echo $row['Text']; ?>
	</div>
</a>
<?php } ?>

	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create Thread</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="input-group mb-3 input-group-lg">
							<div class="input-group-prepend">
								<span class="input-group-text">Title </span>
							</div>
							<input type="text" name="title" class="form-control">
						</div>
						<div class="input-group mb-3 input-group-lg">
							<div class="input-group-prepend">
								<span class="input-group-text">Text</span>
							</div>
							<input type="text" name="text" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
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