<?php
include "cnt.php";

    if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POSt['username'];
        $email = $_POSt['email'];
        $password = $_POST['password'];

		$query = "INSERT INTO users(fullname,username,email,password) VALUES('$fullname','$username','$email','$password')";
		$fire = mysqli_query($con,$query);
		if($fire){
			echo 'data submitted to database sucessfully';
		}else{
			echo 'data not submitted';
		}
    }
?>



<!DOCTYPE html>
<html lang="en">
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
	<?php
		$query = "SELECT * FROM users";
		$fire = mysqli_query($con,$query);
		
		if(mysqli_num_rows($fire)>0){
			 while($user = mysqli_fetch_assoc($fire)){
				 ?>

				 <tr>
				 <td> <?php echo $user['fullname'] ?> </td>
				 <td> <?php echo $user['username'] ?> </td>
				 <td> <?php echo $user['email'] ?> </td>
				 <td> <a href ="<?php $_SERVER['PHP_SELF'] ?> ?del=<?php echo $user['id'] ?>"
					class = "btn btn-sm btn-danger">Delete </a>

				 </tr>
				 <?php
			 }
		}
        ?>
            		
            


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





</body>
</html>

