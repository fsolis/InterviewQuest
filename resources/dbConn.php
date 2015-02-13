<?php
    //Author: Freddy Solis
    //Created: Jan. 20, 2015
    //This file connects to the proper sql table and database
    $host = "localhost";
    $dbName = "InterviewQuest"; 
    $username = ""; //enter the username that contains the database
    $pwd = "";//Enter Your password for your database

    //creates connection
    $dbConn = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $pwd);

    // Sets Error handling to Exception so it shows ALL errors when trying to get data
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
