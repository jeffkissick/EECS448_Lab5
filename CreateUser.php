<?php


$uname=$_POST["username"];

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn)
{
   die('Could not connect: ' . mysqli_error());
}

echo 'Connected successfully<br>';

if($uname == "")
{
  echo "Username cannot be blank!";
}
else
{
    $qry = 'SELECT user_id FROM Users';

    if
}


$sql = 'INSERT INTO Users (user_id) VALUES (\''$uname'\')';
$result = mysqli_query($conn, $sql);

echo "Your username " . $username . " has been created successfully!<br>";
?>
