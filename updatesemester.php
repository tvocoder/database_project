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
	$WhereField=$_POST['WhereField'];
	$WhereValue=$_POST['WhereValue'];
	
	// plus2net
	setcookie("Field", $Field, time()+3600, "/");
	setcookie("Value", $Value, time()+3600, "/");
	setcookie("WhereField", $WhereField, time()+3600, "/");
	setcookie("WhereValue", $WhereValue, time()+3600, "/");
	/* expire in 1 hour */
	
	@$db = new mysqli('localhost', 'root', '', 'class');
	
	if(mysqli_connect_errno()) {
	   echo "<p>Error: Could not connect to database.</br>
		Please try again later.</p>";
	   exit;
	}

	$query = "UPDATE semester SET $Field='$Value' WHERE $WhereField='$WhereValue'";
	$stmt = $db->prepare($query);

	echo "<p><b>Executed SQL Statement: </b>
			UPDATE semester SET $Field='$Value' WHERE $WhereField='$WhereValue'</p>";

	if ($stmt->execute()) {
	   echo "<p>Semester Updated!</p>";
	} else {
		echo "<p>An error has occurred.</br>
			The item was not added.</p>";
	}

	$db->close();
	
	
   ?>
   
	<form action="viewsemesterupdate.php">
       <p><input type="Submit" name="Submit" value="Get View" /></p>
	</form>
</body>
</html>