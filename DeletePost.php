<?php

$data=$_POST["data"];

$dbhost = 'mysql.eecs.ku.edu';
$dbuser = 'jkissick';
$dbpass = 'AhVid7ie';
$dbname = 'jkissick';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_errno) // if conn returns an error code, found on php.net
{
   die('Could not connect: ' . $conn->connect_errno);
}

//echo 'Connected successfully!<br>';



$qry = 'SELECT author_id, content, post_id FROM Posts';

if($result = $conn->query($qry))
{
    while($row = $result->fetch_assoc())
    {
        for($i = 0; $i < count($data); $i++)
        {
            if($row["post_id"]==$data[$i])
            {
                $modQry = "DELETE FROM Posts WHERE post_id = '".$data[$i]."'";
                if($result = $conn->query($modQry))
                {
                    echo "Mod Hammer success, the post has been deleted.<br>";
                }
                else
                {
                    echo "Oops, my programmer messed up somewhere.<br>";
                }
            }
            else
            {
                echo "Caught here.";
            }
        }
    }
      
}
else
{
    echo "Failed To Query the Database, my bad :(<br>";
}

$result->free();


$isClosed = $conn->close();

// if($isClosed)
// {
//   echo "Connection was closed successfully.";
// }
?>
