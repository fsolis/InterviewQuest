<?php
    require_once 'dbConn.php';
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest: Sign Up</title>

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
            <a href="index.php"><img id="navbarlogo" src="images/indexLogo.png"></a>
          </div>
          <div id="navbar-right">
            <?php
                if(isset($_SESSION['loggedin'])){
                    echo " Welcome,".$_SESSION['firstName'];
                    echo "<a href=\"logout.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\"> Sign Out</button></a>";
                }else{
                    echo "<a href=\"index.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Home</button></a>";
               }
            ?>
          </div>
      </div>
      <br>
      <div id="signupcontent"> 
          <form method="post">
              <div id="usernamefeedback" class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="Last Name">
              </div>
              <div id="emailfeedback" class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="email@email.com">
              </div>
              <button  id="submitbutton" type="button" onclick="submitUser()" class="btn btn-primary">Submit</button>
        </form>
      </div>
        
      <div id="signupfooter">
            <a href="about.php"> <button type="button" id="aboutbutton" class="btn btn-default btn-lg">About</button></a>
      </div>

    
        <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true" id="successModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="Success">User Successfully Registered</h2>
                    </div>
                    <div class="modal-body">
                        <h3 id="welcomeMessage"></h3>
                        <p>Now that you have an account you will be able to help InterviewQuest become better by submitting your own questions, reporting questions that are incorrect, as well as more upcomeing features! Now let the journey continue.</p>
                    </div>
                     <div class="modal-footer">
                        <a href="index.php" #id="greenbutton" type="button" class="btn btn-primary">Continue</a>
                      </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="failed" aria-hidden="true" id="failedModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="failed">Unable to complete registration</h2>
                    </div>
                    <div class="modal-body">
                        <h3>Uh Oh...</h3>
                        <p>There seems to be a problem completing your registration, please try again. Please make sure you are not already logged in and that your information is both complete and correct.</p>
                    </div>
                     <div class="modal-footer">
                        <a id="greenbutton" type="button" class="btn btn-primary" onclick="closeModal()">Try Again</a>
                      </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true" id="loadingModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="title">Loading....</h2>
                    </div>
                    <div class="modal-body" id="loadingbody">
                    </div>
                </div>
            </div>
        </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page -->
    <script src="js/signup.js"></script>
    <script src="js/spin.js"></script>
  </body>
</html>