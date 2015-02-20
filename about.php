<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Interview Quest: About</title>

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
                    echo "<li><a  href=\"index.php\" class=\"btn\" id=\"greenbutton\">Home</a></li>";
                    echo "<li><a href=\"signup.php\"  class=\"btn\" id=\"greenbutton\">Sign Up</a></li>";
                }

              ?>
          </ul>
        </nav>
          <a href="index.php"><img src="images/indexLogoInline.png" id="logoimg"></a>
      </div>
    </div> <!-- End Header -->
      <!-- Container that will hold all content so that elements get bootstrap css -->
    <div class="container">
      <br>
        <!-- start about content -->
      <div>
            <div class="center">
                <h1 id="greenText"><b>About</b></h1>
            </div>
            <br />
          
          <div><h3><b>What is InterviewQuest?</b></h3></div>
            <div class="indented">
                <p>InterviewQuest is a site that aims to help facilitate studying for the dreaded Technical Interview. Often sample questions for technical interviews are hidden deep in web forums and answers are often worded arbitarily which usually leaves us more nervous and confused than when we started. InterviewQuest hopes to make studying easier by providing a variety of questions with simple answers in a mock 'interview style' test. </p>
            </div>
          
            <div><h3>How Does It Work?</h3></div>
            <div class="indented">
                <p>InterviewQuest is a mock interview test. When you land on the home page. Click START! From here you will be asked to chose the desired topics you want to study, the level of difficulty the questions will fall under, lastly you will choose the number of questions you want to answer. That's It! Your questions will then show up. Don't worry too much if are unsure of the specific steps just do the best you can, if you forget to input something the site will let you know what that is.</p>
            </div>
            <div><h3>What Topics Can I Study?</h3></div>
            <div class="indented">
                <h4>Currently Supported:</h4>
                <div class="row" id="greenText">
                    <div class="col-sm-2"><h6>Algorithms</h6></div>
                    <div class="col-sm-2"><h6>Android</h6></div>
                    <div class="col-sm-2"><h6>BASH</h6></div>
                    <div class="col-sm-2"><h6>C</h6></div>
                    <div class="col-sm-2"><h6>C++</h6></div>
                    <div class="col-sm-2"><h6>CSS</h6></div>
                </div>
                <div class="row" id="greenText">
                    <div class="col-sm-2"><h6>Data Structures</h6></div>
                    <div class="col-sm-2"><h6>Design Patterns</h6></div>
                    <div class="col-sm-2"><h6>HTML5</h6></div>
                    <div class="col-sm-2"><h6>Java</h6></div>
                    <div class="col-sm-2"><h6>JavaScript</h6></div>
                    <div class="col-sm-2"><h6>Software Engineering</h6></div>
                </div>
                <div class="row"><div class="col-sm-12" id="center">And Many More! We're Just Trying To Conserve Space.</div></div>
            </div> 
            <div class="indented">
                <h4>Don't See The Topic You Wanted?</h4>
                <p>Don't worry, topics are added constantly. Don't want to wait? <b>Sign Up</b> and add it yourself. InterviewQuest can be a great learning tool as well! </p>
            </div>
      </div> <!-- end skill level information -->
      
        <br /> <br />
        <!-- Start footer -->
      <footer class="footer">
      <div class="container">
        <a href="https://github.com/fsolis/InterviewQuest" class="btn" id="githubButton">Join Github Project</a>
        <a class="btn" id="greenbutton">Contact Creator</a>
      </div>
    </footer> <!-- End footer -->
    </div> <!--end container -->
      
      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>