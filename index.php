<?php
include "config/config.php";
?>

<!--//checking if the value of del is set or not-->

<?php 
  if((isset($_POST["submit"]))){
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	 $query = "INSERT INTO users(fullname,email,username,password) VALUES('$fullname','$email','$username','$password')";

	 $fire = mysqli_query($con,$query) or die("can not insert data into database.".mysqli_error($con));

	 if($fire) echo "data submitted to database";
  }

?>
<!-- //code for deleting data from database -->
<?php
	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM users WHERE id=$id";
		$fire = mysqli_query($con,$query) or die("can not delete data.".mysqli_error($con));
		if($fire) echo "data is deleted from the database";
	}
	//deleting data from database here


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-8-col-lg-offset-2">
  					<h3> USER DATA </h3>
					  <table class="table table-striped">
    <thead>
      <tr>
        <th>FullName</th>
        <th>UserName</th>
        <th>Email</th>
      </tr>
    </thead>
	<tbody>
				<!--// showing all the data from database to this page -->	
				  <?php
						$query = "SELECT * FROM users";
						$fire = mysqli_query($con,$query);
						//if($fire) echo "We Got The Data";
						if(mysqli_num_rows($fire)>0){
							//execute this code
							while($user = mysqli_fetch_assoc($fire)){ ?>
			<tr>
				<td> <?php echo $user["fullname"] ?></td>
				<td> <?php echo $user["username"] ?></td>
				<td> <?php echo $user["email"]	?></td>
				<td>	<a href="<?php $_SERVER['PHP_SELF']?>?del=<?php echo $user['id'] ?>"
				  		class = "btn btn-sm btn-danger">Delete</a>	</td>	
				<td> <a href="update.php?up=<?php echo $user['id'] ?>"
						class = "btn btn-sm btn-warning">Update</a> </td>		
						  
			</tr>				
						<?php
							}
							
							
						} ?>
						</tbody>



  				


			  </div>

  				<!--signup form-->
				<div class="col-lg-6-col-lg-offset-3">
					<h3>Signup</h3>
					<hr>
					<form name="signup" id="signup" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
						<div class="form-group">
							<label for="fullname">Fullname</label>
							<input name="fullname" id="fullname" type="text" class="form-control" placeholder="fullname">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" class="form-control" placeholder="email">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input name="username" id="username" type="text" class="form-control" placeholder="username">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input name="password" id="password" type="password" class="form-control" placeholder="password">
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



							
	