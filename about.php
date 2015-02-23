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
                <h5>Learn, Teach, Succeed.</h5>
            </div>
            <br />
          
          <div><h3><b>What is InterviewQuest?</b></h3></div>
            <div class="indented">
                <p>InterviewQuest is a site that aims to help facilitate studying for the dreaded Technical Interview. Often sample questions for technical interviews are hidden deep in web forums and answers are often worded arbitrarily which usually leaves us more nervous and confused than when we started. InterviewQuest hopes to make studying easier by providing a variety of questions with simple answers in a mock 'interview style' test. </p>
            </div>
          
          <div><h3><b>How does it work?</b></h3></div>
            <div class="indented">
                <p>InterviewQuest is a mock interview test. When you land on the home page. Click START! From here you will be asked to chose the desired topics you want to study, the level of difficulty the questions will fall under, lastly you will choose the number of questions you want to answer. That's It! Your questions will then show up. Don't worry too much if are unsure of the specific steps just do the best you can, if you forget to input something the site will let you know what that is.</p>
            </div>
          
          <div><h3><b>What topics can I study?</b></h3></div>
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
                <div class="row"><div class="col-sm-12" id="center">And many more! We're just trying to conserve space.</div></div>
            </div> 
            <div class="indented">
                <h4>Don't see the topic you wanted?</h4>
                <p>Don't worry, topics are added constantly. Don't want to wait? <b>Sign Up</b> and add it yourself. InterviewQuest can be a great learning tool as well! </p>
            </div>
          
          <div><h3><b>How Can InterviewQuest Help Learning?</b></h3></div>
          <div class="indented">
            <p>As technology aficionados, we constantly have to learn the next best thing. However, retaining all new information can be quite a difficult thing. Goal driven learning is proven to help facilitate retention. Let InterviewQuest be your goal. When we start learning something new, as we progress through the topic, we find that little and often important things are forgotten. Try this: as you learn a new topic, write down questions and answers. Make these answers simple, as if trying to explain it to someone completely new to the topic. This will assure that you truly understand the answer as well as help make it easier for someone new to learn the answer. This way the byproduct of your learning will help someone new to the topic learn it themselves. After all as Albert Einstein put it 'If you can't explain it to a six year old, you don't understand it yourself.'</p>
          </div>
          
          <div><h3><b>What are the Skill Levels? What do they Mean?</b></h3></div>
          <div class="indented">
            <p>The difficulty of question are ranked on a 1 to 4 basis. Where the first level (Entry Level) are the easiest of the questions and 4 (Senior Level) are the hardest. In most engineering positions most of the positions for begineers are Entry Level positions where as Senior Level positions are meant for those with plenty of experience. However, when you choose a higher difficulty you will recieve simpler questions because most technical interviews start off basic and work thier way up. Don't skip the basics, under the pressure of an interview you might just forget some of the most simple answers.</p>
          </div>
          
          <div><h3><b>Origin</b></h3></div>
          <div class="indented">
            <p>InterviewQuest was created by a Software Engineer fresh out of college. He found that you can never really know exactly what the interviewer will ask you, you might prepare for something specific and be asked something trivial that you never thought of studying. He found this out the hard way. So naturally he took to the Internet to study interview questions so it would never happen again. However, the process of tracking down interview questions and answers proved to be a hassle. Forums stuffed with good questions but answers were often too hard to find or to confusing when found. This is where InterviewQuest comes in, instead of going from book to book, forum to forum just select your topics and get ready to answer, just like a real interview. If you don't know the answer, it will be provided, otherwise it will remain hidden to avoid spoilers. Technical interviews can be nerve racking, let's take some of the stress off.</p>
          </div>
          
          <div><h3><b>What's to come?</b></h3></div>
          <div class="indented">
              <p>We are costently adding new features and topics to this site to make it your number one site for prepping for your next great job.</p>
              <p>Features to come:</p>
            <ul>
                <li>New Topics</li>
                <li>New Questions</li>
                <li>Android App</li>
                <li>Ability to report and downvote incorrect questions</li>
                <li>Ability to save certain quizzes</li>
                <li>Email updates</li>
            </ul>
            <p>Can't wait for a new feature? Come help make development faster join our github project.</p>
          </div>
          <div><h4>Have a suggestion? Contact the creator below!</h4></div>
          
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