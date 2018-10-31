<?php
session_start();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Web - Event!</title>
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css"/>
</head>
<body>
  <section class="strip"></section>
  <div class="index-header">
    <div class="container">
      <div class="logo">
        <img src="images/logo.png" />
      </div>
      <div class="title">
        <h2 class="college">INFORMATION TECHNOLOGY</h2>
        <p class="desc">ONLINE EXAMINATION SYSYEM</p>
      </div>

      <div class="error">
        <h2><?php echo $GLOBALS['output']; ?></h2>
      </div>
    </div>
  </div>

  <div class="register">
    <div class="container">
      <span class="slogan">START WITH FILLING FORM</span>  
      <form method="post" action="inc/register.php" enctype="multipart/form-data">
        <div class="name">
          <input type="text" name="first_name" placeholder="First Name" required/>
          <input type="text" name="Mid_name" placeholder="Mid Name" required/>
          <input type="text" name="Last_name" placeholder="Last Name" required/>
        </div>
        <div class="class">
          <select class="className" name="class" required>
            <option value="S.E.">S.E.</option>
            <option value="T.E.">T.E.</option>
            <option value="B.E.">B.E.</option>
          </select>
        </div>
        <div class="rn">
          <input type="number" name="rollno" class="rollno" placeholder="Roll Number">
        </div>
        <div class="submit">
          <button type="submit" name="submit-register">LET'S GO</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer">
    <div class="copyright">
      <p>&copy; Copyright 2018 by coolnik.</p>
    </div>
  </div>

</body>
</html>
