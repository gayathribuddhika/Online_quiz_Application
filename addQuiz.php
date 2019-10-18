	<?php include "req.php"; ?>
	<?php 
if (isset($_POST['submit'])){
   //Get Post variables
   $question_number = $_POST['question_number'];      
   $question_text = $_POST['question_text'];
   $correct_choice = $_POST['correct_choice'];
   $choices = array();
   $choices[1] = $_POST['choice1'];
   $choices[2] = $_POST['choice2'];
   $choices[3] = $_POST['choice3'];
   $choices[4] = $_POST['choice4'];

   //Question query
    //get total answers
   //dilki's idea
	$query = "select * from answer1";
	$answers = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total_ans=$answers->num_rows;
	$next_ans=$total_ans+1;
   $correct_choice01=$total_ans+$correct_choice;
   $query="insert into question1 (questions, ans_id) 
   	 values('$question_text','$correct_choice01')";
   	 //methana correct answer eka yanawa weradi
   $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);

   //VALIDATE INSERT
   if($insert_row){
      foreach($choices as $choice => $value){
        if($value != ''){
	       if($correct_choice == $choice){
	          $is_correct = 1;
	       } else {
	         $is_correct = 0;
	       }
              $query="insert into answer1 (answers,ans_id,is_correct) 
   	          values('$value','$question_number','$is_correct')";
              $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);
	          if($insert_row){
	            continue;
	          }else {
	      		die("Error: (".$mysqli->errno.") ".$mysqli->eerror);
	    	}
        }
    }
   $msg="Question has been added";
}
}
//get total questions
$query = "select * from question1";
$questions = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total=$questions->num_rows;
$next=$total+1;



?>


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
	body{
    font-family:arial;
    font-size:15px;
    line-height:1.6em;
    background:#f4f4f4;
}

li{
    list-style:none;
}

a{
    text-decoration:none;
}

label{
    display:inline-block;
    width:180px;
}

input[type='text']{
    width:97%;
    padding:4px;
    border-radius:5px;
    border: 1px solid #ccc;
}

input[type='number']{
    width:50px;
    padding:4px;
    border-radius:5px;
    border: 1px solid #ccc;
}

#container{
    margin: 0 auto;
    overflow:auto;
    width:60%;
}

header {
    border-bottom:3px solid #f4f4f4 solid;
}

footer{
    border-top:3px #f4f4f4 solid;
    text-align:center;
    padding-top:5px;
}

main{
    padding-bottom:20px;
}

/*a.start{
    display:inline-block;
    color:#666;
    border:1px dotted #ccc;
    padding:6px 13px;
}
*/
.current{
    padding:10px;
    background:#f4f4f4;
    border:#ccc dotted 1px;
     margin:20px 0 10px 0;
}

@media only screen and (max-width:960px){
    .container{
	width:80%;
    }
}

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
.tb{
	background-color: #636260;
	border-style: none;
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
		<h1><center>Add Your Questions Here...</center></h1>
	</div>
	<br>
	<br>
	<br><br>
	<br>
	<br>
    <div id="container">
      <header>
        <div class="container">
         <!--  <h1>Quizzer</h1> -->
	</div>
      </header>


      <main>
	<div class="container">
	     <!-- <h2>Add A question</h2> -->
	     <?php 
	     	   if(isset($msg)) {
	     	      echo "<p>".$msg."</p>";
	     }
	     ?>
	     <form method="post" action="addQuiz.php"><font size="6" color="white" >
	    <p>
			<label>Question Number</label>
			<input type="number" class="tb" value="<?php echo $next; ?>" name="question_number" />
		   </p>
	     	   <p>
			<label>Question</label>
			<input type="text" class="tb" name="question_text" />
		   </p>
	     	   <p>
			<label>Choice #1: </label>
			<input type="text" class="tb" name="choice1" />
		   </p>
	     	   <p>
			<label>Choice #2: </label>
			<input type="text" class="tb" name="choice2" />
		   </p>
	     	   <p>
			<label>Choice #3: </label>
			<input type="text" class="tb" name="choice3" />
		   </p>
	     	   <p>
			<label>Choice #4: </label>
			<input type="text" class="tb" name="choice4" />
		   </p>
	     	   <p>
			<label>Correct choice number </label>
			<input type="number" class="tb" name="correct_choice" />
		   </p>
		   <p>
			<input type="submit" class="tb" name="submit" value="Submit" />
		   </p>
		  	<p>
			<h3><a href="login.php">Login</a></h3>
			</p>
		   </font>

	     </form>
	</div>
      </main>


  <br><br><br><br><br><br><br><br>
      <div id="footer">
		<marquee>&copy; Online Quiz Application | All Right Reserved <br> &nbsp&nbsp&nbsp&nbsp R.M.D.S Rathnayake</marquee>
	</div>
    </footer>
  </body>
</html>
