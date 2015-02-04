<?php
    //Author: Freddy Solis
    //Created: Jan 30th, 2015
    //This file destroys the user session and logs the user out
    session_start();
    session_destroy();

    header("Location: index.php");
?>
