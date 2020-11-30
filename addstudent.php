<!DOCTYPE html>
<html>
<head>
   <title>Software Precision Analytics - Add Student</title>
</head>

<body>
   <?php
    
	if (!isset($_POST['FirstName']) || !isset($_POST['LastName'])) {
		echo "<p>You have not entered all the required details.
			</br>Please go back and try again.</p>";
		exit;
	}
	
	$formatted_date = $newticket['DateCreated'] = date('Y/m/d');
	$today = getdate();
	$year = $today['year'];
	$month = $today['month'];
			
	// create short variable names
	$first = $_POST['FirstName'];
	$last = $_POST['LastName'];
	
	@$db = new mysqli('localhost', 'root', '', 'class');
	
	if (mysqli_connect_errno()) {
		echo "<p>Error: Could not connect to database.
			</br>Please try again later.</p>";
		exit;
	}

	$query_semester = "INSERT INTO semester(TermName, AcademicYear) VALUES (?, ?)";
	$stmt = $db->prepare($query_semester);
	$stmt->bind_param('sd', $term, $year);
	$stmt->execute();
	$term_id = mysqli_insert_id($db);
	
	$query_student = "INSERT INTO student(FirstName, LastName, TermId) VALUES (?, ?, ?)";
	$stmt = $db->prepare($query_student);
	$stmt->bind_param('ssd', $first, $last, $term_id);
	$stmt->execute();
	$last_id = mysqli_insert_id($db);
	
	echo "<h1>New Student Id: $last_id </h1>";
	echo "<h2>Date created: $formatted_date </h2>";
	
	if ($stmt->affected_rows > 0) {
		echo "<p>New student record created in database.</p>";
	} else {
		echo "<p>An error has occurred.
			</br>The item was not added.</p>";
	}
	
	$db->close();
   ?>

<p><b>Name: </b><?php print($_POST['FirstName']); ?> 
				<?php print($_POST['LastName']); ?></p>

</body>
</html>