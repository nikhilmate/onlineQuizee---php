<?php
session_start();
include 'inc/dbh.php';
if (isset($_SESSION['user_contest_rollno'])) {
	$rollno = $_SESSION['user_contest_rollno'];
	$sql = "SELECT * from student_details WHERE rollno='$rollno'";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_num_rows($query);
	if ($result < 0) {
		session_unset();
		session_destroy();
		header("location: index.php");
		exit();
	}
}

$GLOBALS['problem1'] = true;
$GLOBALS['problem2'] = false;
$GLOBALS['problem3'] = false;
$GLOBALS['problem4'] = false;
$GLOBALS['problem5'] = false;
?>

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
    <link rel="stylesheet" href="css/start.css">

</head>
<body>
	<section id="statement">
		<div class="row statement-intro">
			<ul class="nav-tabs">
				<li class="active"><a role="tab" data-toggle="tab" href="#tab1">PROBLEM 1</a></li>
				<li class=""><a role="tab" data-toggle="tab" href="#tab2">PROBLEM 2</a></li>
				<li class=""><a role="tab" data-toggle="tab" href="#tab3">PROBLEM 3</a></li>
				<li class=""><a role="tab" data-toggle="tab" href="#tab4">PROBLEM 4</a></li>
				<li class=""><a role="tab" data-toggle="tab" href="#tab5">PROBLEM 5</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" role="tabpanel" id="tab1">
					<div class="flexing">
						<h3>Problem statement 1</h3>
						<div class="statement">
							<p>aaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaad aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
						</div>
						<div class="code">
							<code class="program"></code>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="tab2">
					<div class="flexing">
						<h3>Problem statement 2</h3>

					</div>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="tab3">
					<div class="flexing">
						<h3>Problem statement 3</h3>

					</div>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="tab4">
					<div class="flexing">
						<h3>Problem statement 4</h3>

					</div>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="tab5">
					<div class="flexing">
						<h3>Problem statement 5</h3>

					</div>
				</div>
			</div>
		</div>
	</section>

	<form action="inc/logout.php" method="post" class="logout">
		<input type="submit" name="logout" value="finish">
	</form>

<script src="js/tab-panel.js"></script>
<script src="js/timer.js"></script>
</body>
</html>
