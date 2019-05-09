<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Message Board</title>
  </head>
  <body>
      <h1>Message Board</h1>
      <?php
          if ((!file_exists("MessageBoard/messages.txt")) || (filesize("MessageBoard/messages.txt") == 0)) {
              echo "<p>There are no messages posted</p>\n";
          }
          else {
              $MessageArray = file("MessageBoard/messages.txt");
              echo "<table style='background-color: lightgray' border='1' width='100%'>\n";
              $count = count($MessageArray);
              for($i = 0; $i < $count; ++$i) {
                  $CurrMsg = explode('~', $MessageArray[$i]); // looks for the ~ character in the $MessageArray
                  echo "<tr>\n";
                  echo "<td width='5%' style='text-align:center; font-weight:bold';>" . ($i + 1) . "</td>\n";
                  echo "<td width='95%'><span style='font-weight: bold;'>Subject:</span> " . htmlentities($CurrMsg[0]) . "<br>\n";
                  echo "<span style='font-weight: bold;'>Name:</span> " . htmlentities($CurrMsg[1]) . "<br>\n";
                  echo "<span style='font-weight: bold; text-decoration: underline;'>Message:</span></br>\n " . htmlentities($CurrMsg[2]) . "</td>\n";
                  echo "</tr>\n";
              } // End of for loop
              echo "</table>\n";
          }// End of else command block

       ?>
       <p><a href="PostMessage.php">Post New Message</a></p>
  </body>
</html>
