<?php
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
    <div class="container">
        
      <div id="navbar">
          <div id="navbar-left">
            <a href="index.php"><img id="navbarlogo" src="images/indexLogo.png"></a>
          </div>
          <div id="navbar-right">
            <?php
                if(isset($_SESSION['loggedin'])){
                    echo " Welcome, ".$_SESSION['firstName'];
                    echo "<a href=\"logout.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\"> Sign Out</button></a>";
                } else {
                    echo "<a href=\"index.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Home</button></a>";
               }
            ?>
          </div>
      </div>
        
      <br/>
        
      <div id="addquestioncontent"> 
          <div id="pageHeader"><h1>Add A New Question</h1></div>
          <br />
              <div class="form-group">
                  <label >Select Language: </label>
                    <div class="row">
                        <div class="col-sm-9">
                            <select id="language" name="language" class="form-control">
                                <?php
                                    $sql = "SELECT id, languageName FROM Languages ORDER BY languageName ASC";
                                    $stmt = $dbConn -> prepare($sql);
                                    $stmt -> execute();
                                    $record = $stmt -> fetchAll();
                                    if (empty($record)) {
                                        echo "<option>No Languages Found</option>";
                                    } else {
                                        foreach($record as $row) {
                                            echo "<option value='".$row['id']."'>".$row['languageName']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn" id="greenbutton" onclick="newLanguage()">Add Language</a>
                        </div>
                    </div> 
              </div>
              <div id="typeofquestion" class="form-group">
                <label for="questionType">Type of Question:</label>
                    <select id="questionType" name="questionType" class="form-control" onclick="questionTypeChange()">
                        <option>Select:</option>
                        <option value="SA">Single Answer</option>
                        <option value="MC">Multiple Choice</option>
                        <option value="MA">Multiple Answer</option>
                    </select>
              </div>
              <!-- Start Single Answer Form -->
              <div id="singleAnswerForm" class="invisible">
                  <label for="singleAnswerQuestion">Question:</label>
                  <textarea id="singleAnswerQuestion" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="singleAnswerAnswer">Answer:</label>
                  <textarea id="singleAnswerAnswer" class="form-control" rows="3"></textarea>
                  <br />
                  <p id="errorcodeQuestions"></p>
                  <br />
                  <a type="button" class="btn btn-primary" onclick="submitSingleAnswer()">Submit</a>
              </div>
              <!-- Start Multiple Choice Form -->
              <div id="multipleChoiceForm" class="invisible">
                <label for="multipleChoiceQuestion">Question:</label>
                  <textarea id="multipleChoiceQuestion" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 1:</label>
                  <textarea id="multipleChoiceAnswer1" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 2:</label>
                  <textarea id="multipleChoiceAnswer2" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 3:</label>
                  <textarea id="multipleChoiceAnswer3" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 4:</label>
                  <textarea id="multipleChoiceAnswer4" class="form-control" rows="3"></textarea>
                  <br />
                  <label >Choose the Correct Answer:</label>
                  <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3"> 3
                </label>
                  <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4"> 4
                </label>
                  <br />
                  <p id="multipleChoiceError" class="haserror"></p>
                  <br />
                  <a type="button" class="btn btn-primary" onclick="submitMultipleChoice()">Submit</a>
              </div>
               <!-- Start Multiple Answer Form -->
              <div id="multipleAnswerForm" class="invisible">
                  <label for="multipleAnswerQuestion">Question:</label>
                  <textarea id="multipleAnswerQuestion" class="form-control" rows="3"></textarea>
                  <br />
                  
                  <label for="multipleChoiceAnswer1">Answer 1:</label>
                  <textarea id="multipleChoiceAnswer1" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 2:</label>
                  <textarea id="multipleChoiceAnswer2" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 3:</label>
                  <textarea id="multipleChoiceAnswer3" class="form-control" rows="3"></textarea>
                  <br />
                  <label for="multipleChoiceAnswer1">Answer 4:</label>
                  <textarea id="multipleChoiceAnswer4" class="form-control" rows="3"></textarea>
                  <br />
                  <label>Select the Correct Answers:</label>
                  <label class="checkbox-inline">
                  <input type="checkbox" id="inlineCheckbox1" value="1"> 1
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="inlineCheckbox2" value="2"> 2
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" id="inlineCheckbox3" value="3"> 3
                </label>
                  <label class="checkbox-inline">
                  <input type="checkbox" id="inlineCheckbox3" value="4"> 4
                </label>
                  <br /> <br />
                  <a type="button" class="btn btn-primary" onclick="submitQuestion()">Submit</a>
              </div>
            
      </div>
        
      <div id="signupfooter">
            <a href="about.php"type="button" id="aboutbutton" class="btn btn-default btn-lg">About</a>
      </div>
        
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true" id="addLanguageModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="title">Add New Language</h3>
                    </div>
                    <div class="modal-body">
                        <h3>Language Name</h3>
                        <input type="text" class="form-control" id="newLanguageName" name="newLanguageName" required placeholder="New Language">
                        <p id="errorcode"></p>
                    </div>
                     <div class="modal-footer">
                        <a onclick="submitNewLanguage()" id="greenbutton" type="button" class="btn">Submit</a>
                        <a onclick="closeSubmit()" type="button" class="btn btn-warning">Close</a>
                      </div>
                </div>
            </div>
      </div>
        
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleComplete" aria-hidden="true" id="questionSubmitted" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
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
      </div>
        
        
    </div>
      
        
        
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page -->
    <script src="js/add.js"></script>
  </body>
</html>