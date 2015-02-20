<?php
    //Author: Freddy Solis
    //Created: Jan 20, 2015
    //This page will display a form so a new user can register all transactions
    //will be done asychronously through Ajax
    require_once 'dbConn.php';
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest: Sign Up</title>
    
    <!-- image for tab and favorite icon -->
    <link rel="shortcut icon" type="image/ico" href="images/i.ico">
    
    <!-- allow resizing -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
      <!-- container to hold all elements so that bootstrap can be applied to them -->
      <!-- Start navigation bar -->
      <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
              <?php
                if(isset($_SESSION['loggedin'])){
                    echo "<li><a id=\"greenText\">Hello, ". $_SESSION['firstName']."</a></li>";
                    echo "<li><a href=\"logout.php\" class=\"btn\" id=\"greenbutton\">Sign Out</a></li>";
                } else {
                    echo "<li><a  href=\"index.php\" class=\"btn\" id=\"greenbutton\">Home</a></li>";
                    echo "<li><a href=\"signup.php\"  class=\"btn\" id=\"greenbutton\">Sign Up</a></li>";
                }

              ?>
          </ul>
        </nav>
          <a href="index.php" ><img src="images/indexLogoInline.png" id="logoimg"></a>
      </div>
    </div> <!-- End navigation bar -->
    <div class="container">
      <br>
        <!-- Start signup form -->
      <div id="signupcontent"> 
          <form method="post">
              <div id="usernamefeedback" class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
              </div>
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="Last Name">
              </div>
              <div id="emailfeedback" class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="email@email.com">
              </div>
              <div class="haserror">
                <h5 id="errorMessage"></h5>
              </div>
              <div class="center">
                    <button  id="submitbutton" type="button" onclick="submitUser()" class="btn btn-primary">Submit</button>
              </div>
        </form>
      </div> <!-- End signup form -->
      <br />
      <br />
        
    <!-- Start footer -->
      <footer class="footer">
      <div class="container">
        <a href="about.php" class="btn" id="greenbutton">About</a>
      </div>
    </footer> <!-- End footer -->

        <!-- Start modal that displays a successfully registered message -->
        <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true" id="successModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="success">User Successfully Registered</h2>
                    </div>
                    <div class="modal-body">
                        <h3 id="welcomeMessage"></h3>
                        <p>Now that you have an account you will be able to help InterviewQuest become better by submitting your own questions, reporting questions that are incorrect, as well as more upcomeing features! Now let the journey continue.</p>
                    </div>
                     <div class="modal-footer">
                        <a href="index.php" id="greenbutton" type="button" class="btn btn-primary">Continue</a>
                      </div>
                </div>
            </div>
        </div> <!-- End success modal-->
        
        <!-- Start unsuccessful registration modal -->
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
        </div><!-- end failed modal-->
        
        <!-- Start loading modal -->
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
        </div><!--end loading modal -->
        
      </div><!--end content -->
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page -->
    <script src="js/signup.js"></script>
    <script src="js/spin.js"></script>
  </body>
</html>