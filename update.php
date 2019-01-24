<?php
include "config/config.php";
?>
<!-- code for updating data -->
<?php 
		if(isset($_GET['up'])){
			$id = $_GET['up'];
			$query = "SELECT * FROM users WHERE id=$id";
			$fire = mysqli_query($con,$query) or die("can not update data from database.".mysqli_error($con));
				if($fire) echo "we got the data"; 
				$user = mysqli_fetch_assoc($fire);
		}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	

  				<!--update form-->
			<div class="container">
				  	<div class="row">
				<div class="col-lg-6-col-lg-offset-4">
					<h3>update data</h3>
					<hr>
					<form name="signup" id="signup" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
						<div class="form-group">
							<label for="fullname">Fullname</label>
							<input  value="<?php echo $user['fullname']?>" name="fullname" id="fullname" type="text" class="form-control" placeholder="fullname">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input value="<?php echo $user['email']?>" name="email" id="email" type="email" class="form-control" placeholder="email">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input value="<?php echo $user['username']?>" name="username" id="username" type="text" class="form-control" placeholder="username">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input value="<?php echo $user['password']?>" name="password" id="password" type="password" class="form-control" placeholder="password">
						</div>
						<div class="form-group">
							<button name="submit" id="submit" class="btn btn-primary btn-block">Sign Up</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


							
	