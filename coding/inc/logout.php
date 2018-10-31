<?php
session_start();

if (isset($_SESSION['user_contest_rollno'])) {
	session_unset();
	session_destroy();
	header("location: ../index.php?logout=success");
	exit();
} else{
	header("location: ../contest.php?logout=failed");
}

?>