<?php
    //Author:Freddy Solis
    //Created: Jan 15, 2015
    //Description: This page will be the landing page of the site, this is where the user 
    //will be able to log in. 
    session_start(); 
	require_once'dbConn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest</title>
    
    <!-- image for tab and favorite icon -->
    <link rel="shortcut icon" type="image/ico" href="images/i.ico">
      
    <!-- This makes the site resizable -->
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
      <!-- Container that will hold all content so that elements get bootstrap css -->
    <!-- Start Header -->
    <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
              <?php
                if(isset($_SESSION['loggedin'])){
                    echo "<li><a id=\"greenText\">Hello, ". $_SESSION['firstName']."</a></li>";
                    echo "<li><a href=\"logout.php\" class=\"btn\" id=\"greenbutton\">Sign Out</a></li>";
                } else {
                    echo "<li><a  href=\"#login\" data-toggle=\"modal\" class=\"btn\" id=\"greenbutton\">Sign In</a></li>";
                    echo "<li><a href=\"signup.php\"  class=\"btn\" id=\"greenbutton\">Sign Up</a></li>";
                }

              ?>
          </ul>
        </nav>
          <a href="#"><img src="images/indexLogoInline.png" id="logoimg"></a>
      </div>
    </div> <!-- End Header -->
    
    <!-- Start Content Area -->
    <div class="container">
        <br />
        <!-- start logo -->    
      <div class="centerImage"> 
          <a href="start.php"> <img  src="images/interviewQuestindext%20logo.png"> </a>
          
      </div><!-- end start logo -->
    <br /> <br />
      
    <footer class="footer">
      <div class="container">
        <a href="about.php" class="btn" id="greenbutton">About</a>
      </div>
    </footer>
    </div> <!-- End Content Area -->
        
        <!-- Start Login Modal -->
		<div class="modal fade" id="login" role="dialog" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<form class="form-horizontal">
						<div class="modal-header">
							<h3>Login</h3>
						</div>
						<div class="modal-body">
							<div class="form-group" id="usernamefeedback">
								<label for="username" class="col-lg-2 control-label">Username</label>
								<div class="col-lg-10" >
									<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12 text-center">
									<a id="loginButton" class="btn btn-primary" onclick="attemptLogin()">Login</a>
									<div class="haserror">
										<h6 id="errorcode"></h6>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a id="cancelButton" class="btn btn-warning" data-dismiss="modal">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Login Modal -->
      
      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page-->
    <script src="js/login.js"></script>
  </body>
</html>
    
    