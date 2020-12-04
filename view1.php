<!DOCTYPE html>
<?php
session_start();
?>
<html>
   <head>
      <title>Semester View</title>
	  <meta charset="utf-8">
   </head>
   
 <body>
	<?php
   
	   @$db = new mysqli('localhost', 'root', '', 'class');
	   if(mysqli_connect_errno()) {
		   echo "<p>Error: Could not connect to database.
				</br>Please try again later.</p>";
		   exit;
	   }
	   
	   $studentid = $_SESSION['StudentId'];
	   
	   $query = "
	   CREATE OR REPLACE VIEW Temp
	   AS SELECT stud.FirstName, stud.LastName, s.TermName, s.AcademicYear
	   FROM Student AS stud, Semester AS s
	   WHERE stud.TermID = s.TermID AND stud.StudentID = $studentid";
	   
	   if($db->query($query) === TRUE) {
		   
		   $query1 = "SELECT * FROM Temp";
		   $result = $db->query($query1);
		   
		   if($result->num_rows > 0) {
			   
		      while($row = $result->fetch_assoc()) {
				  
				  $first=$row['FirstName'];
				  $last=$row['LastName'];
				  $term=$row['TermName'];
				  $year=$row['AcademicYear'];
				  
				  echo "<p><b>FirstName: </b> $first
						</br><b>LastName: </b> $last
						</br><b>TermName: </b> $term
						</br><b>Year: </b> $year</p>";
			  }
		   }
		   else {
			   echo "0 results";
		   }   
	   }
	   
	   $db->close();
	   
	?>
	<div id="semester">
       <form action="updatesemester.html">
          <p><input type="submit" value="Update Semester"></p>
       </form>

       <form action="deletesemester.html">
          <p><input type="submit" value="Delete Semester"></p>
       </form>
    </div>
 </body>
 </html>