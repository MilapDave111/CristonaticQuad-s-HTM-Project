<?php
 
$db_conn = mysqli_connect('localhost', 'root', '', 'hackathon');

if (!$db_conn)
{
    echo "connection fail";
    exit();
}

// include('functions.php'); 
?>