<!DOCTYPE html>
<head>
<head>
   <meta charset="utf-8">
   <title>Semester Update</title>
</head>

<body>
   <?php
    
	   @$db = new mysqli('localhost', 'root', '', 'class');
	   if(mysqli_connect_errno()) {
		   echo "<p>Error: Could not connect to database.
				</br>Please try again lagter.</p>";
		   exit;
	   }
	   
	   echo "<p>Field:" .$_COOKIE['Field']. "</p>";
	   echo "<p>Value:" .$_COOKIE['Value']. "</p>";
	   echo "<p>WhereField:" .$_COOKIE['WhereField']. "</p>";
	   echo "<p>WhereValue:" .$_COOKIE['WhereValue']. "</p>";
	   
	   
   
   ?>