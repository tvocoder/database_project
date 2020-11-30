<!DOCTYPE html>
<html>
<head>
   <title>Update Semester</title>
</head>

<body>
   <h1>Update Semester</h1>
   <?php
	   if ( !isset($_POST['Field']) || !isset($_POST['Value']) || 
		  !isset($_POST['WhereField']) || !isset($_POST['WhereValue'])) {
	   echo "<p>You have not entered all the required details.</br>
	      Please go back and try again.</p>";
	   exit;
	}
	
	$Field=$_POST['Field'];
	$Value=$_POST['Value'];
	$Where=$_POST['WhereField'];
	$WhereValue=$_POST['WhereValue'];
	
	@$db = new mysqli('localhost', 'root', '', 'class');
	
	if(mysqli_connect_errno()) {
	   echo "<p>Error: Could not connect to database.</br>
		Please try again later.</p>";
	   exit;
	}

	$query = "UPDATE semester SET $Field='$Value' WHERE $WhereField='$WhereValue'";
	$stmt = $db->prepare($query);
	$stmt->execute();

	echo "<p><b>Executed SQL Statement: </b>
			UPDATE semester SET $Field='$Value' WHERE $WhereField='$WhereValue'</p>";

	if ($db->query($query) === TRUE) {
	   echo "<p>Semester Updated!</p>";
	} else {
		echo "<p>An error has occurred.</br>
			The item was not added.</p>";
	}

	$db->close();
	
	
   ?>
</body>
</html>