<?php 

session_start();

	require 'req.php';	
	
?>	



<!DOCTYPE html>
<html> 
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	
	#navbar{
		margin-left: 0px;
		height: 100px;
		background-color:#ffa200;
		border-radius: 5px; 
		padding-top: 5px;
		padding-bottom: 10px;
	}
	.header{
	width: 30%;
	margin:50px auto 0px;
	color: black;
	background-color:#ffa200;
	text-align: center;
	border:1px solid #0d0d0c;
	border-bottom: none;
	border-radius: 10px;
	padding:20px; 
}
.input_grp{
	margin: 10px 0px 10px 0px;
}

.input_grp label{
	display: block;
	text-align: left;
	margin: 3px;
	font-size: 20px;
}

.input_grp input{
	height: 40px;
	width: 90%;
	padding: 5px 10px;
	font-size: 20px;
	border-radius: 5px;
	border:1px solid gray;
}
	#title{
		font-size: 40px;
		text-align: center;
		color: #ffa200;
	}
	.footer{
		font-weight: bold;
		margin-top: 150px;
		color: white;
	}
	body{
		
		background-image: url('images/plain-black-background.jpg');
	}
	
	
	
</style>
<body>
	<div id="navbar">
		<h1><center>Register here...</center></h1>
	</div>
	<br><br>
<div class="header">	
	<h1>Registration Form</h1>
	
	<p>Enter all required fields*</p>
	
	<form action="reg.php" method = "post" class="form">
		<?php
	if(isset($_POST['reg_btn'])){
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$u_name = $_POST['u_name']; 
		$email = $_POST['email'];
		$contact_no = $_POST['contact_no'];
		$new_password = $_POST['new_password'];
		$retype_password = $_POST['retype_password'];

		$s = "select * from registration where u_name = '$u_name'";
		$result = mysqli_query($conn,$s);
		$num = mysqli_num_rows($result);

		if($num == 1){
			echo "Username Already Taken";
		}

		elseif ($new_password != $retype_password) {
			echo "Two Passwords do not matched";
		}else{

			$query = "insert into registration (first_name , last_name, u_name, email, contact_no, new_password, retype_password) values ('$first_name', '$last_name', '$u_name', '$email', '$contact_no', '$new_password', '$retype_password')";

			mysqli_query($conn,$query);
			echo "You have Registered Successfully";
				}		
	}
?>
		<div class="input_grp">
			<label>First Name* :</label>
			<input type="text" name="first_name" placeholder="Enter your firstname" required />
		</div>	
			<div id="name_error" class="val_error  "></div>
		<div class="input_grp">	
			<label>Last Name* :</label>
			<input type="text" name="last_name" placeholder="Enter your lastname" required/>
		</div>	
			<div id="name_error" class="val_error  "></div>
		<div class="input_grp">	
			<label>Username* :</label>
			<input type="text" name="u_name" placeholder="Enter your username" required />
		</div>	
			<div id="name_error" class="val_error  "></div>
		<div class="input_grp">	
			<label>E mail* :</label>
			<input type="email" name="email" placeholder="Enter your email" required/>
		</div>	
			<div id="email_error" class="val_error  "></div>
		<div class="input_grp">	
			<label>Contact No* :</label>
			<input type="text" name="contact_no" placeholder="Enter your contactno" required/>
		</div>	
			<div id="email_error" class="val_error  "></div>
		<div class="input_grp">	
			<label>New Password* :</label>
			<input type="password" name="new_password" placeholder="Enter a password" required/>
		</div>
			<div id="password_error" class="val_error  "></div>
		<div class="input_grp">	
			<label>Retype New Password* :</label>
			<input type="password" name="retype_password" placeholder=" Retype your password" required/>
		</div>
			<div id="newpassword_error" class="val_error  "></div>
		<div class="input_grp">	
			<input type="submit" name="reg_btn" value="REGISTER" class="btn" />
		</div>
		<p>Already a user <a href = "login.php" text-color = "red">Login here </a></p>
	</form>	
</div>

<div id="footer">
	<marquee>&copy; Online Quiz Application | All Right Reserved <br> &nbsp&nbsp&nbsp&nbspW G G Buddhika | 15APC2324</marquee>
</div>
</body>
</html>


