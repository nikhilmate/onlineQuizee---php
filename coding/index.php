<?php
session_start();
include 'inc/dbh.php';
$GLOBALS['output'] = '';
if (isset($_GET['register'])) {
	$result = $_GET['register'];
	switch ($result) {
		case 'invalid':
			$GLOBALS['output'] =  "invalid";
			break;
		case 'existed':
			$GLOBALS['output'] =  "existed";
			break;
		case 'failed':
			$GLOBALS['output'] =  "failed";
			break;
		default:
			$GLOBALS['output'] =  "not getting any value!";
			break;
	}
}

if (isset($_SESSION['user_contest_rollno'])) {
	$rollno = $_SESSION['user_contest_rollno'];
	$sql = "SELECT * from student_details WHERE rollno='$rollno'";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_num_rows($query);
	if ($result > 0) {
		header("location: contest.php");
		exit();
	} else {
	session_unset();
	session_destroy();
	}
	session_start();
}
?>


<!-- Made with custom template by coolnik --> 
<!DOCTYPE html>
<html lang="en">

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Raw!</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="css/main.css">

</head>

<body id="top">

	<div class="header">
		<div class="logo">
			<img src="images/logo.png">
		</div>
		<h2>INFORMATION TECHNOLOGY</h2>
	</div>

	<div class="error">
		<h2><?php echo $GLOBALS['output']; ?></h2>
	</div>
   <!-- home
   ================================================== -->
   <section id="home">

            <div class="row">
              <div class="inner-container">
                <div class="box">
                  <form method="POST" action="inc/register.php" name="register-form" required>
                  <input type="text" class="input-form" placeholder="FULL NAME" name="name" required>
                  <select class="input-select" name="class" required>
                  	<option value="B.E." name="B.E.">B.E.</option>
                  	<option value="T.E." name="T.E.">T.E.</option>
                  	<option value="S.E." name="S.E.">S.E.</option>
                  </select>
                  <input type="text" class="input-form" placeholder="ROLL NUMBER" name="rollno">
                  <p id="error-pass" style="display: block;color: white;"></p>
                  <input class="submit-button" type="submit" value="Start" name="signin-submit" id="signin-submit">
                  </form>
                </div>
              </div>
            </div>

            <style type="text/css">
              @media only screen and (max-width: 768px) {
                #home {
                  min-height: 600px;
                }
              }
            </style>
    </section> <!-- end home -->

     

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>