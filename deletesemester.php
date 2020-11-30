<!DOCTYPE html>
<html>
<head>
   <title>Delete Semester</title>
</head>

<body>
   <h1>Delete Semester</h1>
   <?php
	   if( !isset($_POST['Field']) || !isset($_POST['Value']) ) 
	   {
		echo "<p>You have not entered all the required details.
				</br>Please go back and try again.</p>";
		exit;
	   }
	
	   $Field=$_POST['Field'];
	   $Value=$_POST['Value'];

	   @$db = new mysqli('localhost', 'root', '', 'class');

	   if(mysqli_connect_errno())
	   {
		echo "<p>Error: Could not connect to database.
				</br>Please try again later.</p>";
		exit;
	   }

	   $query = "DELETE FROM semester WHERE $Field='$Value'";
	   $stmt = $db->prepare($query);
	   $stmt->execute();

	   echo "<p><b>Executed SQL Statement: </b>
				DELETE FROM semester WHERE $Field='$Value'</p>";
		
	   if($db->query($query) == TRUE) 
	   {
		echo "<p>Tuple(s) deleted!</p>";
	   } else {
		   echo "<p>An error has occurred.</p>";
	   }

	   $db->close();
	?>
</body>
</html>
