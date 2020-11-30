<!DOCTYPE html>

<!-- database.php -->
<html>
<head>
<meta charset="utf-8">
<title>Search Results</title>

<style type="text/css">
   body   { font-family: sans-serif;
            background-color: lightyellow; }
   table  { background-color: lightblue;
            border-collapse: collapse;
            border: 1px solid gray; }
   td   { padding: 5px; }
   tr:nth-child(odd) {
      background-color: white; }
</style>
</head>

<body>
   <?php
      $select = $_POST[ "select" ]; // creates variable $select
      
      // build SELECT query
      $query = "SELECT " .$select. " FROM books";
      
      // connect to MySQL
      if ( !( $database = mysqil_connect( "localhost", "root", "" ) ) )
         die( "Could not connect to database </body></html>" );
      
      // open Products database
      if ( !mysqli_select_db( "class", $database ) )
         die( "Could not open products database </body></html>" );
         
      // query Products database
      if( !( $result = mysqli_query( $query, $database ) ) )
      {
         print( "<p>Could not execute query!</p>" );
         die( mysqli_error(). "</body></html>" );
      } // end if
      
      mysql_close( $database );
   ?> <!-- end PHP script -->
   
   <table>
      <caption>Results of "SELECT <?php print( "$select" ) ?>
         FROM books"</caption>
         
         <?php
         // fetch each record in result set
            while ( $row = mysqli_fetch_row( $result ) )
            {
               // build table to display results
               print( "<tr>" );
            
               foreach ( $row as $key => $value )
                  print( "<td>$value</td>" );
               
               print( "</tr>" );
            } // end while
         ?> <!-- end PHP script -->
   </table>
   
   <p>Your search yielded
      <?php print( mysqli_num_rows( $result ) ) ?> results.</p>
   <p>Please email comments to <a href="mailto:deitel@deitel.com">
         Deitel and Associates, Inc.</a></p>
</body>
</html>