<?php 

session_start();

	require 'req.php';


	
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	
	<h1><center>Welcome!!!!!<br>Online Qiuz Application</center></h1><br>
	
	<div class="header">
	<h2>LOGIN</h2>	

		<form action="login.php" method = "POST" class="form">
			<?php	
		if(isset($_POST['submit'])){
			$u_name = $_POST['u_name']; 
			$new_password = $_POST['new_password'];
			$mysql_error = "fail";

			$result =mysqli_query($conn,"select * from registration where u_name = '$u_name' && new_password = '$new_password' ") or die ("Faild to query database ".$mysql_error);
		
			$row = mysqli_fetch_array($result);

			if($row["u_name"] == $u_name && $row["new_password"]){
			
				//echo "Login Success";
				header('location:question.php');
			}else{
				echo "Faild to Login";
			
		}
	}	
	
?>
			<div class="input_grp">
				<label>Username :</label>
				<input type="text" name="u_name" placeholder="Enter your username here" />
			</div>
			<div class="input_grp">
				<label>Password &nbsp:</label>
				<input type="password" name="new_password" placeholder="Enter your password here" />
			</div>
			<div class="input_grp">
				<input type="submit" name="submit" value="LOGIN" class="btn" />
			</div>
			<p>
				New User Please <a href="reg.php">Register Here</a>
			</p>
		</form>	
	</div>

	<div id="footer">
		<marquee>&copy; Online Quiz Application | All Right Reserved <br> &nbsp&nbsp&nbsp&nbspW G G Buddhika | 15APC2324</marquee>
	</div>
</body>
</html>
 