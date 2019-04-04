<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Used Bootstrap here for the table, as I have previously! -->
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

$qry = 'SELECT user_id FROM Users';

if($result = $conn->query($qry))
{
    echo "<br><br><table class=table>";
    echo "<tr> <td><b>Users<b></td> </tr>";
    while($row = $result->fetch_assoc())
    {
        
      echo "<tr><td>" . $row["user_id"] . "</td></tr>";

    }
    $result->free();
 }

$conn->close();
?>
