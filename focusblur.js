// Fig. 13.8: focusblur.js

var helpArray = [ 
"Enter first name, please.",
"Enter last name, please.",
// "Please select today's date.", 
"You're agreeing to submit data to be stored.",
"This button clears the form.", "" ];

var helpText;

// initialize helpTextDiv and register event handlers
function init()
{
   helpText = document.getElementById( "helpText" );
   
   // register listeners
   registerListeners(document.getElementById( "FirstName" ), 0 );
   registerListeners(document.getElementById( "LastName" ), 1 );
   // registerListeners(document.getElementById( "currDate" ), 2 );
   registerListeners(document.getElementById( "submit" ), 2 );
   registerListeners(document.getElementById( "reset" ), 3 );
} // end function init

// utility function to help register events
function registerListeners( object, messageNumber )
{
   object.addEventListener( "focus", 
      function() { helpText.innerHTML = helpArray[ messageNumber ]; },
      false );
   object.addEventListener( "blur", 
      function() { helpText.innerHTML = helpArray[ 4 ]; }, false );
} // end function registerListener

window.addEventListener( "load", init, false );

/*************************************************************************
* (C) Copyright 1992-2012 by Deitel & Associates, Inc. and               *
* Pearson Education, Inc. All Rights Reserved.                           *
*                                                                        *
* DISCLAIMER: The authors and publisher of this book have used their     *
* best efforts in preparing the book. These efforts include the          *
* development, research, and testing of the theories and programs        *
* to determine their effectiveness. The authors and publisher make       *
* no warranty of any kind, expressed or implied, with regard to these    *
* programs or to the documentation contained in these books. The authors *
* and publisher shall not be liable in any event for incidental or       *
* consequential damages in connection with, or arising out of, the       *
* furnishing, performance, or use of these programs.                     *
*************************************************************************/