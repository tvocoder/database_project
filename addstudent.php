<!DOCTYPE html>
<?php
session_start();
?>

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
	
	$formatted_datetime = $newticket['DateCreated'] = date('Y/m/d H:i:s');
	// date('c', $formatted_datetime);
	$_SESSION['TicketTime'] = $formatted_datetime;
	
	$today = getdate();
	$year = $today['year'];
	$month = $today['month'];
	$term = "";
	
	switch($month) {
	   case 'January': $term="winter/spring"; break;
	   case 'February': $term="spring"; break;
	   case 'March': $term="spring"; break;
	   case 'April': $term="spring"; break;
	   case 'May': $term="spring"; break;
	   case 'June': $term="summer"; break;
	   case 'July': $term="summer"; break;
	   case 'August': $term="summer/fall"; break;
	   case 'September': $term="fall"; break;
	   case 'October': $term="fall"; break;
	   case 'November': $term="fall"; break;
	   case 'December': $term="fall/winter"; break;
	   default: break;
	}
			
	// create short variable names
	$first = $_POST['FirstName'];
	$last = $_POST['LastName'];
	$termid = $_SESSION['SemesterId'];

	$_SESSION['FirstName'] = $first;
	$_SESSION['LastName'] = $last;
	
	?>
	<?php

	$dbhost="localhost";
	$dbname="class";
	$dbuser="root";
	$dbpass='';

    try {
       $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
       // set the PDO error mode to exception
	   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	   // prepare sql and bind parameters
	   $stmt = $db->prepare("UPDATE semester
							 SET TermName=:termname, AcademicYear=:academicyear
							 WHERE TermID=:termid");
	   $stmt->bindParam(':termname', $term);
	   $stmt->bindParam(':academicyear', $year);
	   $stmt->bindParam(':termid', $termid);

	   $stmt2 = $db->prepare("INSERT INTO student(FirstName, LastName, TermId) VALUES (:firstname, :lastname, :termid)");
	   $stmt2->bindParam(':firstname', $first);
	   $stmt2->bindParam(':lastname', $last);
	   $stmt2->bindParam(':termid', $termid);

	   $stmt->execute();
	   $stmt2->execute();
	   
	   if($stmt->execute()) {
		   if($stmt2->execute()) {
		      $_SESSION['StudentId'] = $db->lastInsertId();
		   }
	   }

	   echo "New records created successfully";
	}
	catch(PDOException $error) {
	   echo "Error: " . $error->getMessage();
	}

    $studentid = $_SESSION['StudentId'];
	?>
	<?php
	echo "<h1>New Student Id: $studentid </h1>";
	echo "<h2>Date created: $formatted_datetime</h2>";

	$db->connection = null;
	?>
	
	<div>
    <p><b>Name: </b><?php print($first); ?> 
				    <?php print($last); ?>
	</p>
	</div>
	
	<p id="demo"></p>
	<form action="view1.php" method="post">
	   <fieldset>
	   <p><input type="submit" name="submit" id="submit" /><p>
	   </fieldset>
	</form>

</body>
</html>