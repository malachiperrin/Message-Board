<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Message Board</title>
  </head>
  <body>
      <?php
          if (isset($_POST['submit'])) {
                $Subject = stripslashes($_POST['subject']);
                $Name = stripslashes($_POST['name']);
                $Message = stripslashes($_POST['message']);
                //replace any '~' characters with '-' characters
                $Subject = str_replace('~', '-', $Subject);
                $name = str_replace('~', '-', $Name);
                $message = str_replace('~', '-', $Message);

                $MessageRecord = "$Subject~$Name~$Message\n";
                $MessageFile = fopen("MessageBoard/messages.txt", "ab");

                if ($MessageFile === FALSE) {
                  echo "There was an error saving your message!.\n";
                }
                else {  // The File to open     what gets written to file
                  fwrite($MessageFile, $MessageRecord);
                  fclose($MessageFile); // always close a file after youre done using it
                  echo "Your message has been saved!";
                }
          }

       ?>

       <h1>Post New Message</h1>
       <hr>
       <form action="PostMessage.php" method="POST">
            <span style="font-weight: bold;">Subject:</span>
                  <input type="text" name="subject">
            <span style="font-weight: bold;">Name</span>
                  <input type="text" name="name"><br>
            <textarea name="message" rows="6" cols="80"></textarea><br>
            <input type="submit" name="submit" value="Post Message">
            <input type="reset" name="reset" value="Reset Form">
       </form>
       <hr>
       <p><a href="MessageBoard.php">View Messages</a></p>

  </body>
</html>
