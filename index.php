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
      <!-- Container that will hold all content so that elements get bootstrap css -->
    <div class="container">
        
        <!-- start navigation bar -->
      <div id="navbar">
          <div id="navbar-left">
            <a href="#"><img id="navbarlogo" src="images/indexLogo.png"></a>
          </div>
          <div id="navbar-right">
            <?php
                //check to see if user is logged in and display appropriate buttons
                if(isset($_SESSION['loggedin'])){
                    echo " Welcome, ".$_SESSION['firstName'];
                    echo "<a href=\"logout.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\"> Sign Out</button></a>";
                }else{
                    echo "<button href=\"#login\" data-toggle=\"modal\" type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Sign In</button>";
                    echo "<a href=\"signup.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Sign Up</button></a>";
               }
            ?>
          </div>
      </div><!--End navigation bar -->
      
        <br />
        
        <!-- start logo -->    
      <div id="indexcontent"> 
          <a href="start.php"> <img id="indexstartlogo" src="images/interviewQuestindext%20logo.png"> </a>
      </div><!-- end start logo -->
        
        <!--start footer -->
      <div id="footer">
            <a href="about.php"> <button type="button" id="aboutbutton" class="btn btn-default btn-lg">About</button></a>
      </div><!--end footer -->
        
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
								<div class="col-lg-10 text-center">
									<a class="btn btn-primary" onclick="attemptLogin()">Login</a>
									<div >
										<h6 id="errorcode" color="red"></h6>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a class="btn btn-warning" data-dismiss="modal">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Login Modal -->
      </div> <!--End content -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page-->
    <script src="js/login.js"></script>
  </body>
</html>
    
    