<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
   <title>Software Precision Analytics</title>
   <script src="focusblur.js"></script>
</head>

<body>
   <?php
    @$db = new mysqli('localhost', 'root', '', 'class');
	
	if (mysqli_connect_errno()) {
		echo "<p>Error: Could not connect to database.
			</br>Please try again later.</p>";
		exit;
	}
	
	$sql = "INSERT INTO semester(TermName, AcademicYear) VALUES (NULL, NULL)";
	 
	
    if($db->query($sql)) {
	   $_SESSION['SemesterId'] = $db->insert_id;
	   $semesterid = $_SESSION['SemesterId'];
	   
	   echo "New record created successfully. Semester ID is: " . $semesterid;
	   } 
	else {
	   echo "Error: " . $sql . "</br>" . $db->error;
	}
	
	$db->close();
   ?>
<form action="addstudent.php" method="post">

<fieldset>
   <p><label for="FirstName">First Name:</label>
   <input type="text" id="fname" name="FirstName" /></p>
   
   <p><label for="LastName">Last Name:</label>
   <input type="text" id="lname" name="LastName" /></p>
   
   <p><input type="submit" type="submit" />
	  <input type="reset" type="reset" />
   </p>
</fieldset>
</form>

<p id="helpText"></p>

</body>
</html>