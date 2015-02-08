<?php
    //Author: Freddy Solis
    //Created: 2/4/2015
    //Description: This page will get test information and pass that information 
    //asychronouly through ajax so that 
    require_once 'dbConn.php';
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest: Start</title>

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
    <!-- Main container for content so that bootstrap is applied to elements -->
    <div class="container"> 
      <!-- Navagation bar -->
      <div id="navbar">
          <div id="navbar-left">
            <a href="index.php"><img id="navbarlogo" src="images/indexLogo.png"></a>
          </div>
          <div id="navbar-right">
            <?php
                //This will display user's name and signout button if logged in 
                //otherwise it will redirect the user to the index page as only 
                //questions can be submitted if logged in
                if(isset($_SESSION['loggedin'])){
                    echo " Welcome, ".$_SESSION['firstName'];
                    echo "<a href=\"logout.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\"> Sign Out</button></a>";
                } else {
                    echo "<a href=\"index.php\" id=\"greenbutton\" class=\"btn btn-lg\">Home</a>";
                    echo "<a href=\"signup.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Sign Up</button></a>";
               }
            ?>
          </div>
      </div> <!-- End Navigation bar -->
        
      <br/>
      <!-- main page content -->
      <div id="addquestioncontent"> 
          <div id="pageHeader"><h1>Lets Customize Your Test</h1></div>
          
          <?php
                if (isset($_SESSION['loggedin'])) {
                    echo "<br />";
                    echo "<div class=\"center\">";
                    echo "<a href=\"add.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\"> Submit My Own Question </button></a>";
                    echo "</div>";
                }
          ?>
          
          <br />
              <!-- choose test topics -->
              <div class="form-group">
                  <h3>Choose <u>Up To</u> 5 Topics:</label></h3>
                  <br />
                    <div class="row">
                        <div class="col-sm-4">
                            <select id="language1" name="language1" class="form-control">
                                <?php
                                    //this will list all available languages stored in database
                                    $sql = "SELECT id, languageName FROM Languages ORDER BY languageName ASC";
                                    $stmt = $dbConn -> prepare($sql);
                                    $stmt -> execute();
                                    $record = $stmt -> fetchAll();
                                    if (empty($record)) {
                                        echo "<option>No Topics Found</option>";
                                    } else {
                                        echo "<option value='0'>Select 1st Topic</option>";
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id="language2" name="language2" class="form-control">
                            <?php
                                    if (empty($record)) {
                                        echo "<option>No Topics Found</option>";
                                    } else {
                                        echo "<option value='0'>Select 2nd Topic</option>";
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id="language3" name="language3" class="form-control">
                            <?php
                                    if (empty($record)) {
                                        echo "<option>No Topics Found</option>";
                                    } else {
                                        echo "<option value='0'>Select 3rd Topic</option>";
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                    </div> <!-- End first row -->
                  <br /> 
                  <!-- start second row -->
                  <div class="row">
                        <div class="col-sm-6">
                            <select id="language4" name="language4" class="form-control">
                            <?php
                                    if (empty($record)) {
                                        echo "<option>No Topics Found</option>";
                                    } else {
                                        echo "<option value='0'>Select 4th Topic</option>";
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select id="language5" name="language5" class="form-control">
                            <?php
                                    if (empty($record)) {
                                        echo "<option>No Topics Found</option>";
                                    } else {
                                        echo "<option value='0'>Select 5th Topic</option>";
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                    </div> <!-- End second row -->
              </div> <!-- End choose topic-->
              <br />
              <!-- select question difficulty -->
              <div id="difficultyofquestions" class="form-group">
                <h3>Choose Question Difficulty:</h3>
                    <div  class="row">
                        <div class="col-sm-3">
                            <a class="btn btn-lg btn-primary"  onclick="changeActiveButton('Entry Level')" name="difficulty">Entry Level</a>
                        </div>
                        <div class="col-sm-3">
                            <div></div>
                            <a class="btn btn-lg btn-success" onclick="changeActiveButton('Experienced')" name="difficulty">Experienced</a>
                        </div>
                        
                        <div class="col-sm-3">
                            <a class="btn btn-lg btn-warning" onclick="changeActiveButton('Advanced')" name="difficulty">Advanced</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-lg btn-danger" onclick="changeActiveButton('Senior Level')" name="difficulty">Senior Level</a>
                        </div>
                  
                    </div>
              </div> <!-- End question difficulty -->
                <br />
              <!--select test size -->
                <div id="questionDifficulty" class="form-group">
                <h3>Select Test Size:</h3>
                    <select id="size" name="size" class="form-control">
                        <option value="10">10 Questions</option>
                        <option value="25">25 Questions</option>
                        <option value="35">35 Questions</option>
                        <option value="50">50 Questions</option>
                    </select>
              </div><!--end select test size-->
              <br />
            
              <!-- submit button -->
              <div class="center">
                <a class="btn btn-lg" id="greenbutton" onclick="submitClicked()">Start Test!</a>
              </div><!--End submit button -->
        
        
    
      <!-- start footer -->
      <div id="signupfooter">
            <a href="about.php"type="button" id="aboutbutton" class="btn btn-default btn-lg">About</a>
      </div> <!--End footer -->
        
        <!--start failed to modal -->    
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titlefailed" aria-hidden="true" id="validationFailed" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="titlefailed">There was an error</h3>
                    </div>
                    <div class="modal-body">
                        <h3>Uh oh, Unable to continue.</h3>
                        <h4 id="errorCode"></h4>
                    </div>
                     <div class="modal-footer">
                        <a onclick="closeError()" id="greenbutton" type="button" class="btn">Try Again</a>
                      </div>
                </div>
            </div>
      </div> <!--end question failed modal -->
        
      <!--start failed to modal -->    
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titlecontinue" aria-hidden="true" id="continueModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="titlecontinue">Ready to Continue?</h3>
                    </div>
                    <div class="modal-body">
                        <h4>If you are ready to continue, please choose so. Otherwise, click cancel and revise your answer</h4>
                        <div class="center">
                            <a id="finalButton" class="btn btn-lg btn-primary">Continue!</a>
                        </div>
                    </div>
                     <div class="modal-footer">
                        <a onclick="closeContinueModal()" id="greenbutton" type="button" class="btn btn-warning">Cancel</a>
                      </div>
                </div>
            </div>
      </div> <!--end question failed modal -->
        
    </div> <!-- end content for bootstrap -->
      
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page -->
    <script src="js/start.js"></script>
      
  </body>
</html>