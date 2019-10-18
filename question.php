<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
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
		<h1><center>......Let's Start.....</center></h1>
	</div>
<p id="title">You have to select only one answer out of  four answers.</p>
	<!-- <h1><center>Let's Start Our Qiuz</center></h1> -->
	<br>
	<div class="col-lg-8 m-auto d-block">
	<div class="card"> 
		<!-- <h4 class="text-center card-header">You have to select only one answer out of  four answers.</h4> -->
	</div>
	<br>

<form action="result.php" method="POST">	
<?php

	require 'req.php';

	$sql1 = "SELECT * FROM question1 ORDER BY RAND()";
	$result1 = mysqli_query($conn,$sql1);

	while($row = mysqli_fetch_array($result1)){
	    
?>
	
	<div class="card">
		<h5 class="card-header"> <?php echo $row['questions'] ?></h5>
	
    		
<?php
	
	$sql2 = "SELECT * FROM answer1 WHERE `ans_id` = '{$row['q_id']}' ORDER BY RAND()";
	$result2 = mysqli_query($conn,$sql2);

		while($row = mysqli_fetch_array($result2)){
?>
			<div class="card-body">
				<input type="radio" name="checkans[<?php echo $row['ans_id'];?>]" value="<?php echo $row['a_id'];?>">
				<?php echo $row['answers'];?>
   			</div>

<?php
}
}
?>
<br>
				
<input type="submit" name="submit" value="Submit Quiz" class="btn btn-success m-auto d-block">


</form>
</div>    	
</div>
</div> 

<br>
<div class="m-auto d-block">
	<a href="index.html" class="btn btn-primary">LOGOUT</a>
</div>

<div id="footer">
		<marquee>&copy; Online Quiz Application | All Right Reserved <br> &nbsp&nbsp&nbsp&nbsp R.M.D.S Rathnayake</marquee>
</div>

</body>
</html>

