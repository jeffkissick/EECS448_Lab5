<?php

$uname=$_POST["username"];

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

if($uname == "")
{
  echo "Username cannot be blank! Go back and try again!<br>";
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
            $isDuplicateName = true;
        }
      }
      
    }
    else
    {
      echo "Failed To Query the Database, my bad :(<br>";
    }
    if($isDuplicateName)
    {
      echo "Username is already registed! Go back and try again!<br>";
    }
    else
    {

      $sql = "INSERT INTO Users(user_id) VALUES('".$uname."')";
      if($result = $conn->query($sql))
      {
        echo "Your username " . $username . " has been created successfully!<br>";
      }
      else
      {
         echo "I have failed at life and as a programmer.<br>";
      }
     }
    $result->free();
 }

$isClosed = $conn->close();

if($isClosed)
{
  echo "Connection was closed successfully.";
}
?>
