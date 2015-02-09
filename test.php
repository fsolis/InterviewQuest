<?php
    ini_set("display_errors", TRUE);
    //Author: Freddy Solis
    //Created: 2/5/2014
    //Description: This file will recieve variables through GET, quiery the
    // database and display the results to the user in a question and answer
    // style test score will be kept and results will be displayed at the end
    //all of this will be done in with PHP and JS
    require_once 'dbConn.php';
    session_start();

    if (isset($_GET['type'])) {
        if ($_GET['type'] != "startQuiz") {
           header("Location: start.php"); 
		}
    } else {
        header("Location: start.php"); 
    }
    
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
                    echo "<a href=\"index.php\"><button type=\"button\" id=\"greenbutton\" class=\"btn btn-default btn-lg\">Home</button></a>";
               }
            ?>
          </div>
      </div> <!-- End Navigation bar -->
        
      <br/>
      <!-- main page / test -->
      <div id="questions">
      <?php
      
      		switch ($_GET['numberOfTopics']) {
				  case '1':
					  get1Lang();
					  break;
				  case 2:
					  get2Lang();
					  break;
				  case 3:
					  get3Lang();
					  break;
				  case 4:
					  get4Lang();
					  break;
				  case 5:
					  get5Lang();
					  break;
				  default:
					  break;
			  }
      
      		function get1Lang() {
      			require 'dbConn.php';
				$sql = "SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :languageID AND Questions.difficulty <= :difficulty ORDER BY RAND() LIMIT " . $_GET['size'];
				$stmt = $dbConn -> prepare($sql);
           		$stmt -> execute(array(":languageID"=>$_GET['1LangId'],":difficulty"=>$_GET['difficulty']));
           		$record = $stmt -> fetchAll();
				if(empty($record)){
					echo "<div><h1 class=\"center\">Sorry, No Questions Found</h1></div>";
				}else{
					displayRecords($record);
				}
				
      		}
			
			function get2Lang() {
				require 'dbConn.php';
				$sql = "SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :languageID AND Questions.difficulty <= :difficulty UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language2ID AND Questions.difficulty <= :difficulty2 ORDER BY RAND() LIMIT " . $_GET['size'];
				$stmt = $dbConn -> prepare($sql);
           		$stmt -> execute(array(":languageID"=>$_GET['1LangId'],":difficulty"=>$_GET['difficulty'],":language2ID"=>$_GET['2LangId'], ":difficulty2" => $_GET['difficulty']));
           		$record = $stmt -> fetchAll();
				if(empty($record)){
					echo "<div><h1 class=\"center\">Sorry, No Questions Found</h1></div>";
				}else{
					displayRecords($record);
				}
				
			}
			
			function get3Lang() {
				require 'dbConn.php';
				$sql = "SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :languageID AND Questions.difficulty <= :difficulty UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language2ID AND Questions.difficulty <= :difficulty2 UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language3ID AND Questions.difficulty <= :difficulty3 ORDER BY RAND() LIMIT " . $_GET['size'];
				$stmt = $dbConn -> prepare($sql);
           		$stmt -> execute(array(":languageID"=>$_GET['1LangId'],":difficulty"=>$_GET['difficulty'],":language2ID"=>$_GET['2LangId'], ":difficulty2" => $_GET['difficulty'],":language3ID"=>$_GET['3LangId'], ":difficulty3" => $_GET['difficulty']));
           		$record = $stmt -> fetchAll();
				if(empty($record)){
					echo "<div><h1 class=\"center\">Sorry, No Questions Found</h1></div>";
				}else{
					displayRecords($record);
				}
				
			}
			
			function get4Lang() {
				require 'dbConn.php';
				$sql = "SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :languageID AND Questions.difficulty <= :difficulty UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language2ID AND Questions.difficulty <= :difficulty2 UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language3ID AND Questions.difficulty <= :difficulty3 UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language4ID AND Questions.difficulty <= :difficulty4 ORDER BY RAND() LIMIT " . $_GET['size'];
				$stmt = $dbConn -> prepare($sql);
				$size = (int)$_GET['size'];
           		$stmt -> execute(array(":languageID"=>$_GET['1LangId'],":difficulty"=>$_GET['difficulty'],":language2ID"=>$_GET['2LangId'], ":difficulty2" => $_GET['difficulty'],":language3ID"=>$_GET['3LangId'], ":difficulty3" => $_GET['difficulty'],":language4ID"=>$_GET['4LangId'], ":difficulty4" => $_GET['difficulty']));
           		$record = $stmt -> fetchAll();
				if(empty($record)){
					echo "<div><h1 class=\"center\">Sorry, No Questions Found</h1></div>";
				}else{
					displayRecords($record);
				}
				
			}
			
			function get5Lang() {
				require 'dbConn.php';
				$sql = "SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :languageID AND Questions.difficulty <= :difficulty UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language2ID AND Questions.difficulty <= :difficulty2 UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language3ID AND Questions.difficulty <= :difficulty3 UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language4ID AND Questions.difficulty <= :difficulty4 UNION SELECT Languages.languageName, Questions.question, Questions.answer1, Questions.answer2, Questions.answer3, Questions.answer4, Questions.type, Questions.correctAnswer FROM Questions INNER JOIN Languages ON Questions.languageID = Languages.id WHERE Questions.languageID = :language5ID AND Questions.difficulty <= :difficulty5 ORDER BY RAND() LIMIT " . $_GET['size'];
				$stmt = $dbConn -> prepare($sql);
				$size = (int)$_GET['size'];
           		$stmt -> execute(array(":languageID"=>$_GET['1LangId'],":difficulty"=>$_GET['difficulty'],":language2ID"=>$_GET['2LangId'], ":difficulty2" => $_GET['difficulty'],":language3ID"=>$_GET['3LangId'], ":difficulty3" => $_GET['difficulty'],":language4ID"=>$_GET['4LangId'], ":difficulty4" => $_GET['difficulty'],":language5ID"=>$_GET['5LangId'], ":difficulty5" => $_GET['difficulty']));
           		$record = $stmt -> fetchAll();
				if(empty($record)){
					echo "<div><h1 class=\"center\">Sorry, No Questions Found</h1></div>";
				}else{
					displayRecords($record);
				}
				
			}

			function displayRecords($record) {
				$i = 1;
				foreach ($record as $row) {
					echo "<div class=\"row\"><!--Start Question-->";
					echo "<div class=\"col-md-12\"><h3>Q: ". $row['question'] ."</h3></div>";
					if ($row['type'] == 'SA') {
						echo "<div class=\"collapse\" id=\"answer".$i."\"collapseExample\">";
						echo "<div class=\"col-md-12\"><h3> A: ". $row['answer1'] . "</h3></div>";
						echo "</div>";
						echo "<div class=\"center\">";	
						echo "<button class=\"btn btn-primary\" id=\"answerShow".$i."\" type=\"button\" data-toggle=\"collapse\" data-target=\"#answer".$i."\" aria-expanded=\"false\" aria-controls=\"answer".$i."\">Show Answer</button>";
						echo "</div> <br />";	
                        echo "<div class=\"center\" id=\"answerFeedback".$i."\">";
                        echo "<a class=\"btn btn-success\" type=\"button\" onclick=\"disableButtons(answerFeedback".$i.", 1,answerShow".$i.")\">Correct </a>";
                        echo "<a class=\"btn btn-danger\" type=\"button\" onclick=\"disableButtons(answerFeedback".$i.",-1,answerShow".$i.")\"> Incorrect</a>";
                        echo "</div>";
						$i++;
					} else if ($row['type'] == 'MC'){
                        $answer1 = getMCAnswer($row['correctAnswer'],1);
                        $answer2 = getMCAnswer($row['correctAnswer'],2);
                        $answer3 = getMCAnswer($row['correctAnswer'],3);
                        $answer4 = getMCAnswer($row['correctAnswer'],4);
                        echo "<div class=\"col-md-12\">";
                        echo "<label class=\"radio-inline\">";
						echo "<input type=\"radio\" name=\"multipleChoice".$i."\" id=\"multipleChoiceAnswer".$i."\" value=\"".$answer1."\">".$row['answer1'] ."</label></div>";
						echo "<div class=\"col-md-12\">";
						"<label class=\"radio-inline\">";
						echo "<input type=\"radio\" name=\"multipleChoice".$i."\" id=\"multipleChoiceAnswer".$i."\" value=\"".$answer2."\">".$row['answer2'] ."</label></div>";
						echo "<div class=\"col-md-12\">";
						"<label class=\"radio-inline\">";
						echo "<input type=\"radio\" name=\"multipleChoice".$i."\" id=\"multipleChoiceAnswer".$i."\" value=\"".$answer3."\">".$row['answer3'] ."</label></div>";
						echo "<div class=\"col-md-12\">";
						"<label class=\"radio-inline\">";
						echo "<input type=\"radio\" name=\"multipleChoice".$i."\" id=\"multipleChoiceAnswer".$i."\" value=\"".$answer4."\">".$row['answer4'] ."</label></div>";
						echo "<div class=\"center\">";
                        echo "<a class=\"btn btn-primary\" type=\"button\" id=\"multipleChoiceButton".$i."\" onclick=\"checkMultipleChoice(multipleChoiceAnswer".$i.",multipleChoiceButton".$i.")\">Check Answer</a>";
						echo "</div>";
						$i++;
						
					} else if ($row['type'] == 'MA'){
						$answer1 = getMAAnswer($row['correctAnswer'],1);
                        $answer2 = getMAAnswer($row['correctAnswer'],2);
                        $answer3 = getMAAnswer($row['correctAnswer'],3);
                        $answer4 = getMAAnswer($row['correctAnswer'],4);
						echo "<div class=\"col-md-12\">";
              			echo "<label class=\"checkbox-inline\">";
              			echo "<input type=\"checkbox\" id=\"multipleAnswer".$i."\" value=\"".$answer1."\">".$row['answer1']."</label>";
						echo "</div>";
						echo "<div class=\"col-md-12\">";
              			echo "<label class=\"checkbox-inline\">";
              			echo "<input type=\"checkbox\" id=\"multipleAnswer".$i."\" value=\"".$answer2."\">".$row['answer2']."</label>";
						echo "</div>";
						echo "<div class=\"col-md-12\">";
              			echo "<label class=\"checkbox-inline\">";
              			echo "<input type=\"checkbox\" id=\"multipleAnswer".$i."\" value=\"".$answer3."\">".$row['answer3']."</label>";
						echo "</div>";
						echo "<div class=\"col-md-12\">";
              			echo "<label class=\"checkbox-inline\">";
              			echo "<input type=\"checkbox\" id=\"multipleAnswer".$i."\" value=\"".$answer4."\">".$row['answer4']."</label>";
						echo "</div>";
						
          				echo "<div class=\"center\">";
            			echo "<a class=\"btn btn-primary\" type=\"button\" id=\"multipleAnswerButton".$i."\" onclick=\"checkMultipleAnswer(multipleAnswer".$i.",multipleAnswerButton".$i.")\" >Check Answer</a>";
						echo "</div>";
						$i++;
					}
					echo "</div><!--End Questions-->";
					echo "<br/>";
				}
                
                echo "</div>  <!-- End test -->";
                echo "<div class=\"center\">";
                echo "<div>";
                echo "<h1>Total Score:</h1>";
                echo "<h1 id=\"finalscore\">0</h1>";
                echo "</div></div>";
                
			}

            function getMCAnswer($correctAnswer,$currentRow) {
                if( (int)$correctAnswer == $currentRow) {
                    return 1;
                } else {
                    return 0;   
                }
            }
			
			function getMAAnswer($correctAnswer, $currentRow) {
				if($currentRow == 4){
					if((int)$correctAnswer > 11) {
						return 1;
					} else {
						return 0;
					}
				} else if($currentRow == 3){
					switch((int)$correctAnswer) {
						case 5:
							return 1;
							break;
						case 6: 
							return 1;
							break;
						case 8:
							return 1;
							break;
						case 9:
							return 1;
							break;
						case 16:
							return 1;
							break;
						case 17:
							return 1;
							break;
						case 19:
							return 1;
							break;
						case 20:
							return 1;
							break;
						default:
							return 0;
							break;
					}
				} else if($currentRow == 2){
								
					switch((int)$correctAnswer) {
						case 3:
							return 1;
							break;
						case 4: 
							return 1;
							break;
						case 8:
							return 1;
							break;
						case 9:
							return 1;
							break;
						case 14:
							return 1;
							break;
						case 15:
							return 1;
							break;
						case 19:
							return 1;
							break;
						case 20:
							return 1;
							break;
						default:
							return 0;
							break;
					}
				} else if ($currentRow == 1){
					switch((int)$correctAnswer) {
						case 1:
							return 1;
							break;
						case 4: 
							return 1;
							break;
						case 6:
							return 1;
							break;
						case 9:
							return 1;
							break;
						case 12:
							return 1;
							break;
						case 15:
							return 1;
							break;
						case 17:
							return 1;
							break;
						case 20:
							return 1;
							break;
						default:
							return 0;
							break;
					}
				}
				
			}
      
      ?>
      
      <!-- start footer -->
      <div id="signupfooter">
            <a href="about.php"type="button" id="aboutbutton" class="btn btn-default btn-lg">About</a>
      </div> <!--End footer -->
        
    </div> <!-- end content for bootstrap -->
      
        
        
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--Include javascript for this page -->
    <script src="js/test.js"></script>
      
  </body>
</html>