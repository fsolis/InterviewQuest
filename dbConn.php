<?php
    //Author: Freddy Solis
    //Created: Jan. 20, 2015
    //This file connects to the proper sql table and database
    $host = "localhost";
    $dbName = "InterviewQuest"; 
    $username = "fsolis"; 
    $pwd = "apple117";

    //creates connection
    $dbConn = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $pwd);

    // Sets Error handling to Exception so it shows ALL errors when trying to get data
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
