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
		<h1><center>Welcome!!!!</center></h1>
	</div>
	<br><br><br><br>
	<p id="title">Online Qiuz Application</p>
	<br>
	<br>
	<br>
	<!-- <h1 ><font color="#ffa200"><center>Welcome!!!!<br>Online Qiuz Application</center></font></h1><br> -->
	
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
				<h3><a href="addQuiz.php">Add Quiz</a></h3>
			</p>
			<p>
				New User Please <a href="reg.php">Register Here</a>
			</p>

		</form>	
		<!-- <form action="addQuiz.php" method="POST">
				<div class="input_grp">
				<input type="submit"  name="submit" value="Add Quiz" class="btn" />
				<button type="submit" onclick="addQuiz.php">ADD QUIZ</button>
			</div>
		</form> -->
	</div>
<br><br><br><br><br><br><br><br><br><br>
	<div id="footer">
		<marquee>&copy; Online Quiz Application | All Right Reserved <br> &nbsp&nbsp&nbsp&nbsp R.M.D.S Rathnayake</marquee>
	</div>
</body>
</html>
 