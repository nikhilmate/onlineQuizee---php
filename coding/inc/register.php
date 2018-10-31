<?php
session_start();
if (isset($_POST['signin-submit'])) {
	include 'dbh.php';
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$class = mysqli_real_escape_string($conn, $_POST['class']);
	$rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
	if (!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[0-9]*$/", $rollno)) {
		header("location: ../index.php?register=invalid");
		exit();
	} else {
		$sql = "SELECT * from student_details WHERE rollno='$rollno'";
		$query = mysqli_query($conn, $sql);
		$result = mysqli_num_rows($query);
		if ($result > 0) {
			header("location: ../index.php?register=existed");
			exit();
		}	else {
			$sql1 = "INSERT INTO student_details (name, class, rollno) VALUES ('$name', '$class', '$rollno');";
			$query1 = mysqli_query($conn, $sql1);
			if ($query1) {
				$sql = "SELECT * from student_details WHERE rollno='$rollno'";
				$query = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($query)) {
					$_SESSION['user_contest_name'] = $row['name'];
					$_SESSION['user_contest_class'] = $row['class'];
					$_SESSION['user_contest_rollno'] = $row['rollno'];	
				}
				 
				header("location: ../contest.php");
				exit();
			} else {
				header("location: ../index.php?register=failed");
				exit();
			}
		}
	}
}

