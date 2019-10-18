<?php
	session_start();
	require 'req.php';
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#footer{
			margin-top: 100px;
			font-weight: bold;
		}
		body{
			background-image: url('images/quiz.jpg');
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="css/bootstrap.min.js"></script>
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
	body{
		
		background-image: url('images/plain-black-background.jpg');
	}
	
</style>
<body>
	<div id="navbar">
		<h1><center>Your Final Results</center></h1>
	</div>
	<div class="container text-center">
		
          <!-- <h1 class="text-center text-success">Your Final Results</h1> -->
		<br>
	
	<br><br>
	<table class="table text-center table-bordered table-hover" >
		<tr>
			<th colspan="2" class="bg-dark"><h2 class="text-white">Results</h2></th>
		</tr>
		<tr>
			<td><h3><font color="white">Questions Attempted</font></h3></td>
				<?php
					$result = 0;
					if (isset($_POST['submit'])) {
						if (!empty($_POST['checkans'])) {
							$count = count($_POST['checkans']);
				?>
			<td><h4><font color="white">			
				<?php
					echo "Out of 5,you have Selected ".$count."options";
				?>	
			</font></h4></td>	
				<?php
					$selected = $_POST['checkans'];
					#print_r($selected);
					$q = "SELECT * FROM question1";
					$query = mysqli_query($conn,$q);
					$i=1;
					while ($row = mysqli_fetch_array($query)) {
					#print_r($row['ans_id']);
					$checked = $row['ans_id'] == $selected[$i];
				
					if ($checked) {
						$result++;
					}else{
						}
							$i++;
						}
				?>
		<tr>
			<td><font color="white"><h3>Your Total score</h3></font></td>
			<td colspan="2"><font color="white"><h4>
				<?php
					echo "Your score is ".$result;
					}else{
						echo "<b>Please Select at least one option.</b>";
					}
					}
				?>
			</h4></font></td>
		</tr>
	</table>
	<img src="images/result.png" width="600">

	<div class="m-auto d-block">
		<a href="index.html" class="btn btn-primary">LOGOUT</a>
	</div>
	<br>
	<div class="m-auto d-block">
		<a href="question.php" class="btn btn-primary">Back</a>
	</div>
</div>

	<div id="footer">
		<marquee>&copy; Online Quiz Application | All Right Reserved <br> &nbsp&nbsp&nbsp&nbspW G G Buddhika | 15APC2324</marquee>
	</div>
			
</body>
</html>