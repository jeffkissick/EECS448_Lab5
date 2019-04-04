<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Used Bootstrap here for the table, as I have previously! -->
<?php

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// should return true if the username has been declared, found here https://www.php.net/manual/en/function.isset.php
// listen for the post then set the value
if(isset($_POST["username"]))
{
    $uname=$_POST["username"];
}

if($conn->connect_errno) // if conn returns an error code, found on php.net
{
   die('Could not connect: ' . $conn->connect_errno);
}

//echo 'Connected successfully!<br>';

$qry2 = 'SELECT author_id, content FROM Posts';

if($result = $conn->query($qry2))
{
    echo "<br><br><table class=table>";
    echo "<tr> <td><b>User's Posts<b></td> </tr>";
    while($row = $result->fetch_assoc())
    {
        if($row["author_id"] == $uname)
        {
            echo "<tr><td>" . $row["content"] . "</td></tr>";
        }
    }
    echo "</table>";
    $result->free();
 }

$conn->close();
?>
