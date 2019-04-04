<?php

$uname=$_POST["username"];
$upost=$_POST["userpost"];

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_errno) // if conn returns an error code, found on php.net
{
   die('Could not connect: ' . $conn->connect_errno);
}

echo 'Connected successfully!<br>';

if($upost == "")
{
  echo "Looks like you didn't write anything... Go back and write something!<br>";
}
else
{
    $qry = 'SELECT user_id FROM Users';

    if($result = $conn->query($qry))
    {
      while($row = $result->fetch_assoc())
      {
        if($row["user_id"]==$uname)
        {
            $userFound = true;
            break;
        }
      }
      
    }
    else
    {
      echo "Failed To Query the Database, my bad :(<br>";
    }
    if($userFound)
    {

      echo "Welcome back " . $uname . "!<br>";

      $sql = "INSERT INTO Posts(content, author_id) VALUES('".$upost."', '".$uname."')";

      if($result = $conn->query($sql))
      {
        echo "Your post has been successfully saved.<br>";
      }
      else
      {
         echo "I have failed at life and as a programmer.<br>";
      }
     
        $result->free();
    }
    else
    {
        echo "No User has been registed under that name! Go back and try again!<br>";
    }
 }

$isClosed = $conn->close();

if($isClosed)
{
  echo "Connection was closed successfully.";
}

?>
