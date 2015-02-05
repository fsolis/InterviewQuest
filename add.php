<?php
    //Author: Freddy Solis
    //Created: 2/3/2015
    //Description: This file will allow the user to add a new language or a new question to the database.
    //All actions will be done Asychonously through ajax. 
    require_once 'dbConn.php';
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest: Add</title>

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
                    header("Location: index.php");
               }
            ?>
          </div>
      </div> <!-- End Navigation bar -->
        
      <br/>
      <!-- main page content -->
      <div id="addquestioncontent"> 
          <div id="pageHeader"><h1>Add A New Question</h1></div>
          <br />
              <!-- Add new language -->
              <div class="form-group">
                  <label >Select Topic: </label>
                    <div class="row">
                        <div class="col-sm-9">
                            <select id="language" name="language" class="form-control">
                                <?php
                                    //this will list all available languages stored in database
                                    $sql = "SELECT id, languageName FROM Languages ORDER BY languageName ASC";
                                    $stmt = $dbConn -> prepare($sql);
                                    $stmt -> execute();
                                    $record = $stmt -> fetchAll();
                                    if (empty($record)) {
                                        echo "<option>No Topics Found</option>";
                                    } else {
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <!-- button to add new language, triggers modal -->
                            <a class="btn" id="greenbutton" onclick="newLanguage()">Add Topic</a>
                        </div>
                    </div> 
              </div> <!-- End add new language -->
          
              <!-- select question type -->
              <div id="typeofquestion" class="form-group">
                <label for="questionType">Type of Question:</label>
                    <select id="questionType" name="questionType" class="form-control" onclick="questionTypeChange()">
                        <option>Select:</option>
                        <option value="SA">Single Answer</option>
                        <option value="MC">Multiple Choice</option>
                        <option value="MA">Multiple Answer</option>
                    </select>
              </div> <!-- End select question type -->
          
              <!--select question difficulty -->
                <div id="questionDifficulty" class="form-group">
                <label for="difficulty">Difficulty of Question:</label>
                    <select id="difficulty" name="difficulty" class="form-control">
                        <option value="1">Entry Level</option>
                        <option value="2">Experienced</option>
                        <option value="3">Advanced</option>
                        <option value="4">Senior Level</option>
                    </select>
              </div><!--end select question difficulty-->
          
              <!-- Start Single Answer Form -->
              <div id="singleAnswerForm" class="invisible">
                  <label for="singleAnswerQuestion">Question:</label>
                  <textarea id="singleAnswerQuestion" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="singleAnswerAnswer">Answer:</label>
                  <textarea id="singleAnswerAnswer" class="form-control" rows="3"></textarea>
                  <br />
                  <p id="errorcodeQuestions" class="haserror"></p>
                  <br />
                  <a type="button" class="btn btn-primary" onclick="submitSingleAnswer()">Submit</a>
              </div> <!-- End single answer form -->
          
              <!-- Start Multiple Choice Form -->
              <div id="multipleChoiceForm" class="invisible">
                <label for="multipleChoiceQuestion">Question:</label>
                  <textarea id="multipleChoiceQuestion" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 1:</label>
                  <textarea id="multipleChoiceAnswer1" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer2">Answer 2:</label>
                  <textarea id="multipleChoiceAnswer2" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer3">Answer 3:</label>
                  <textarea id="multipleChoiceAnswer3" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer4">Answer 4:</label>
                  <textarea id="multipleChoiceAnswer4" class="form-control" rows="3"></textarea>
                  <br />
                  <label >Choose the Correct Answer:</label>
                  <label class="radio-inline">
                  <input type="radio" name="multipleChoiceCorrectAnswer" id="inlineRadio1" value="1">Answer 1
                </label>
                <label class="radio-inline">
                  <input type="radio" name="multipleChoiceCorrectAnswer" id="inlineRadio2" value="3">Answer 2
                </label>
                <label class="radio-inline">
                  <input type="radio" name="multipleChoiceCorrectAnswer" id="inlineRadio3" value="5">Answer 3
                </label>
                  <label class="radio-inline">
                  <input type="radio" name="multipleChoiceCorrectAnswer" id="inlineRadio3" value="11">Answer 4
                </label>
                  <br />
                  <p id="multipleChoiceError" class="haserror"></p>
                  <br />
                  <a type="button" class="btn btn-primary" onclick="submitMultipleChoice()">Submit</a>
              </div> <!-- End multiple choice form -->
          
               <!-- Start Multiple Answer Form -->
              <div id="multipleAnswerForm" class="invisible">
                  <label for="multipleAnswerQuestion">Question:</label>
                  <textarea id="multipleAnswerQuestion" class="form-control" rows="3"></textarea>
                  <br />
                  
                  <label for="multipleAnswer1">Answer 1:</label>
                  <textarea id="multipleAnswer1" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleAnswer2">Answer 2:</label>
                  <textarea id="multipleAnswer2" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleAnswer3">Answer 3:</label>
                  <textarea id="multipleAnswer3" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleAnswer4">Answer 4:</label>
                  <textarea id="multipleAnswer4" class="form-control" rows="3"></textarea>
                  <br />
                  <label>Select the Correct Answers:</label>
                  <label class="checkbox-inline">
                  <input type="checkbox" name="multipleChoiceCorrectAnswer" id="inlineCheckbox1" value="1">Answer 1
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="multipleChoiceCorrectAnswer" id="inlineCheckbox2" value="3">Answer 2
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="multipleChoiceCorrectAnswer" id="inlineCheckbox3" value="5">Answer 3
                </label>
                  <label class="checkbox-inline">
                  <input type="checkbox" name="multipleChoiceCorrectAnswer" id="inlineCheckbox4" value="11">Answer 4
                </label>
                  <br /> 
                  <p id="multipleAnswerError" class="haserror"></p>
                  <br />
                  <a type="button" class="btn btn-primary" onclick="submitMultipleAnswer()">Submit</a>
              </div>
            
      </div> <!-- End multiple answer form -->
    
      <!-- start footer -->
      <div id="signupfooter">
            <a href="about.php"type="button" id="aboutbutton" class="btn btn-default btn-lg">About</a>
      </div> <!--End footer -->
        
      <!-- Start add language modal -->    
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true" id="addLanguageModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="title">Add New Topic</h3>
                    </div>
                    <div class="modal-body">
                        <h3>Topic Name:</h3>
                        <input type="text" class="form-control" id="newLanguageName" name="newLanguageName" required placeholder="New Topic">
                        <p id="errorcode"></p>
                    </div>
                     <div class="modal-footer">
                        <a onclick="submitNewLanguage()" id="greenbutton" type="button" class="btn">Submit</a>
                        <a onclick="closeSubmit()" type="button" class="btn btn-warning">Close</a>
                      </div>
                </div>
            </div>
      </div> <!-- End add language modal -->
        
       <!--start questions successfully added modal -->    
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleComplete" aria-hidden="true" id="questionSubmitted" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="titleComplete">Question Successfully Submitted</h3>
                    </div>
                    <div class="modal-body">
                        <h3>Thank you for your contribution!</h3>
                        <p>You have successfully added a question! You can choose go home and continue your journey or submit another question.</p>
                    </div>
                     <div class="modal-footer">
                        <a href="add.php" id="greenbutton" type="button" class="btn">Another Question</a>
                        <a href="index.php" type="button" class="btn btn-warning">Go Home</a>
                      </div>
                </div>
            </div>
      </div> <!--end question successfully added modal -->
        
        <!--start questions failed to submit modal -->    
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titlefailed" aria-hidden="true" id="questionSubmitionFailed" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="titlefailed">Error Submitting Question..</h3>
                    </div>
                    <div class="modal-body">
                        <h3>Unable to submit question.</h3>
                        <p>There was an error submitting your question. Make sure that all fields are correct. Also submission requires you to be activley logged in.</p>
                    </div>
                     <div class="modal-footer">
                        <a onclick="closeFailedModal()" id="greenbutton" type="button" class="btn">Try Again</a>
                        <a href="index.php" type="button" class="btn btn-warning">Go Home</a>
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
    <script src="js/add.js"></script>
      
  </body>
</html>