<?php
session_start();

if (isset($_SESSION['user_contest_rollno'])) {
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
    <link rel="stylesheet" href="css/contest.css">

</head>

<body>
	<div class="instructions">
		<div class="Ilayout">
			<h1>INSTRUCTIONS</h1>
			<ul>
				<li>rule 1</li>
				<li>rule 1</li>
				<li>rule 1</li>
				<li>rule 1</li>
				<li>rule 1</li>
			</ul>
			<a href="start.php" class="start">Start</a>
		</div>
	</div>

	<form action="inc/logout.php" method="post" class="logout">
		<input type="submit" name="logout" value="finish">
	</form>
</body>
</html>

<?php	
} else {
	header("location: index.php?sessionFailed");
	exit();
}
?>