<!DOCTYPE html>
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
	
	$query_semester = "INSERT INTO semester(TermName, AcademicYear) VALUES (NULL, NULL)";
	$query_rating = "INSERT INTO course_rating(Rating, Date) VALUES (NULL, NULL)";
	 
	$stmt1 = $db->prepare($query_semester);
	$stmt1->execute();
	$last_id = mysqli_insert_id($db);
	
	$stmt2 = $db->prepare($query_rating);
	$stmt2->execute();
	
	echo "<h1>New Semester Id: $last_id </h1>";
	
	if ($stmt1->affected_rows > 0) {
		echo "<p>New semester created in database.</p>";
		if ($stmt2->affected_rows > 0) {
			echo "<p>New rating created in database.</p>";
		} else {
			echo "<p>An error has occurred.
				</br>The item was not added.</p>";
		}
	} else {
		echo "<p>An error has occurred.
			</br>The item was not added.</p>";
	}
	
	$db->close();
   ?>
<form action="addstudent.php" method="post">

<fieldset>
   <p><label for="FirstName">First Name:</label>
   <input type="text" id="FirstName" name="FirstName" /></p>
   
   <p><label for="LastName">Last Name:</label>
   <input type="text" id="LastName" name="LastName" /></p>
   
   <p><input type="submit" type="submit" />
	  <input type="reset" type="reset" />
   </p>
</fieldset>
</form>

<p id="helpText"></p>

</body>
</html>