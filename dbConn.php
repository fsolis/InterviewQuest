<?php
$host = "localhost";
$dbName = "InterviewQuest"; 
$username = "fsolis"; 
$pwd = "apple117"; 

//creates connection
$dbConn = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $pwd);

// Sets Error handling to Exception so it shows ALL errors when trying to get data
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
