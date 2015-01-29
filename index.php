<?php
    session_start(); 
	//require_once'dbConn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet"> 
      
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div id="navbar">
          <div id="navbar-left">
            <a href="#"><img id="navbarlogo" src="images/indexLogo.png"></a>
          </div>
          <div id="navbar-right">
            <?php
                if(isset($_SESSION['loggedin'])){
                    echo " Welcome,".$_SESSION['firstName'];
                    echo "<a href=\"logout.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\"> Sign Out</button></a>";
                }else{
                    echo "<a href=\"signin.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Sign In</button></a>";
                    echo "<a href=\"signup.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Sign Up</button></a>";
               }
            ?>
          </div>
      </div>
      <br>
      <div id="indexcontent"> 
          <a href="start.php"> <img id="indexstartlogo" src="images/interviewQuestindext%20logo.png"> </a>
      </div>
        
      <div id="footer">
            <a href="about.php"> <button type="button" id="aboutbutton" class="btn btn-default btn-lg">About</button></a>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>