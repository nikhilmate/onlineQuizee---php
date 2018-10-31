<?php
session_start();
if (isset($_POST['submit-register'])) {
  include 'dbh.php';

  $first = mysqli_real_escape_string($conn, $_POST['first_name']);
  $mid = mysqli_real_escape_string($conn, $_POST['mid_name']);
  $last = mysqli_real_escape_string($conn, $_POST['last_name']);
  $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
  $class = mysqli_real_escape_string($conn, $_POST['class']);

    if (empty($rollno) || empty($class) || empty($first) || empty($mid) || empty($last)) {
      header("location: ../index.php?register=empty");
      exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $mid) || !preg_match("/^[a-zA-Z]*$/", $last)) {
          header("location: ../index.php?register=invalid");
          exit();
        } else {
        $sql = "SELECT * FROM `students_register` WHERE first_name='$first' AND mid_name='$mid' AND last_name='$last' AND class='$class' AND roll_no=$rollno;";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if ($result > 0) {
          header("location: ../index.php?register=existed");
          exit();
        } else {
          $finalsql = "INSERT INTO `students_register`(`first_name`, `mid_name`, `last_name`, `class`, `roll_no`) VALUES ('$first','$mid','$last','$class','$rollno');";
          $finalquery = mysqli_query($conn, $finalsql);
          if (!$finalquery) {
            header("location: ../index.php?register=failed");
            exit();
          } else {
            header("location: ../instruction.php?register=success");
            exit();
          }
        } 
    }
  }
} else {
  header("location: ../index.php");
  exit();
}

//INSERT INTO `students_register`(`first_name`, `mid_name`, `last_name`, `class`, `roll_no`) VALUES ('nikhil','ram','mate','B.E.','09');
?>