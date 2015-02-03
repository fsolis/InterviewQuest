<?php
    require_once 'dbConn.php';
    session_start();

    if ($_GET['type']=='checkusername') {
       try{
           $sql = "SELECT * FROM Users WHERE userID = :userName";
           $stmt = $dbConn -> prepare($sql);
           $stmt -> execute(array(":userName"=> $_GET['username']));
           $record = $stmt -> fetch();
           if (empty($record)) {
              echo "0";
           } else {	echo "1";}
       } catch (Exception $e){
            echo 'Error Checking Username';
       }
    } else if ($_GET['type']=='checkemail') {
        try{
           $sql = "SELECT * FROM Users WHERE email = :email";
           $stmt = $dbConn -> prepare($sql);
           $stmt -> execute(array(":email"=>$_GET['email']));
           $record = $stmt -> fetch();
           if (empty($record)) {
              echo "0";
           }else{	echo "1";}
        } catch (Exception $e) {
            echo 'Could not Check email';   
        }
    }else if ($_POST['type']=='register') {
        
        try{
            if(isset($_SESSION['loggedin'])){
                echo "1";
            } else {
            
                $sql = "INSERT INTO Users (userID,password,firstName,lastName,email) VALUES (:username,:password,:firstName,:lastName,:email)";  
                $stmt = $dbConn -> prepare($sql);
                $stmt -> execute(array(":username"=>$_POST['username'], ":password"=>hash("sha1", $_POST['password']), ":firstName"=>$_POST['firstName'], ":lastName"=>$_POST['lastName'],  ":email"=>$_POST['email']));
                echo "0";
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['firstName'] = $_POST['firstName'];
                $_SESSION['lastName'] = $_POST['lastName'];
            }
        } catch (Exception $e){
            echo $e;
               // echo 'Unable to register user, please verify that the username or email are valid.';
        }
            
    } else if ($_POST['type']=='login') {
        
        try{
            if(isset($_SESSION['loggedin'])){
                echo "1";
            } else {
            
                $sql = "SELECT * from Users WHERE userID = :username AND password = :password";
                $stmt = $dbConn -> prepare($sql);
                $stmt -> execute(array(":username"=> $_POST['username'], ":password"=>hash("sha1", $_POST['password'])));
                $record = $stmt -> fetch();
                if(!empty($record)){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userID'] = $record['id'];
                    $_SESSION['username'] = $record['userID'];
                    $_SESSION['firstName'] = $record['firstName'];
                    $_SESSION['lastName'] = $record['lastName'];
                    $_SESSION['admin'] = $record['adminRights'];
                    $_SESSION['email'] = $record['email'];
                    echo "0";
                } else {
                    echo "1";   
                }
            }
        } catch (Exception $e){
            echo $e;
               // echo 'Unable to register user, please verify that the username or email are valid.';
        }
            
    } else if ($_GET['type']=='checkLanguage') {
        
        try{
                $sql = "SELECT * from Languages WHERE languageName = :languageName";
                $stmt = $dbConn -> prepare($sql);
                $stmt -> execute(array(":languageName"=> $_GET['languageName']));
                $record = $stmt -> fetch();
                if(empty($record)){
                    echo "0";
                } else {
                    echo "1";   
                }
        } catch (Exception $e){
            echo $e;
               // echo 'Unable to register user, please verify that the username or email are valid.';
        }
    } else if ($_GET['type']=='submitNewLanguage') {
        if(!isset($_SESSION['loggedin'])){
                echo "1";
        }else {
            
            try{
                $sql = "INSERT INTO Languages (languageName,userID) VALUES (:languageName,:userID)";
                $stmt = $dbConn -> prepare($sql);
                $stmt -> execute(array(":languageName"=> $_GET['languageName'], ":userID"=> $_SESSION['userID']));
                    echo "0";
            } catch (Exception $e){
                echo $e;
                // echo 'Unable to register user, please verify that the username or email are valid.';
            }
            
        }
             
    }else if ($_POST['type'] == 'singleAnswerQuestion') {
        if(!isset($_SESSION['loggedin'])) {
            echo "1";   
        } else {
         
            try{
                $sql = "INSERT INTO Questions (languageID, question, answer1, type, correctAnswer, userID) VALUES (:languageID, :question, :answer1, 'SA', '1', :userID)";
                $stmt = $dbConn -> prepare($sql);
                $stmt -> execute(array(":languageID"=> $_POST['languageId'], ":question"=>$_POST['question'], ":answer1"=>$_POST['answer'], ":userID"=>$_SESSION['userID']));
                echo "0";
                
            } catch (Exception $e) {
               echo $e;   
            }
            
        }
    } else if ($_POST['type'] == 'multipleChoiceQuestion') {
        if(!isset($_SESSION['loggedin'])) {
            echo "1";   
        } else {
         
            try{
                $sql = "INSERT INTO Questions (languageID, question, answer1, answer2, answer3, answer4, type, correctAnswer, userID) VALUES (:languageID, :question, :answer1, :answer2, :answer3, :answer4, 'MC', :correctAnswer, :userID)";
                $stmt = $dbConn -> prepare($sql);
                $stmt -> execute(array(":languageID"=> $_POST['languageId'], ":question"=>$_POST['question'], ":answer1"=>$_POST['answer1'],":answer2"=>$_POST['answer2'],":answer3"=>$_POST['answer3'],":answer4"=>$_POST['answer4'],":correctAnswer"=>$_POST['correctAnswer'], ":userID"=>$_SESSION['userID']));
                echo "0";
                
            } catch (Exception $e) {
               echo $e;   
            }
            
        }
    }
?>