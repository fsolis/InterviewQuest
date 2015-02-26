<?php

    session_start();
    require_once "dbConn.php";

if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    //enter your email address.
    $email_to = "fsolis@csumb.edu";
 
    $email_subject = "InterviewQuest Contact";
 
     
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 
    if (isset($_POST['type'])) {
        if($_POST['type'] == 'email') {
           $first_name = $_POST['firstName']; // required
 
            $last_name = $_POST['lastName']; // required
 
            $email_from = $_POST['email']; // required
 
            $comments = $_POST['comments']; // required    
            
            
            $email_message = "Form details below.\n\n";
            
            $email_message .= "First Name: ".clean_string($first_name)."\n";
 
            $email_message .= "Last Name: ".clean_string($last_name)."\n";

            $email_message .= "Email: ".clean_string($email_from)."\n";

            $email_message .= "Comments: ".clean_string($comments)."\n";

            // create email headers
 
            $headers = 'From: '.$email_from."\r\n".

            'Reply-To: '.$email_from."\r\n" .

            'X-Mailer: PHP/' . phpversion();
            
            try {
                
                if (mail($email_to, $email_subject, $email_message, $headers)) {
                    echo "Email Sent.";   
                } else {
                    echo "Email Did Not Send. ";
                }
                
            } catch (Exception $e) {
                echo "Error Sending Email. Try Later.";  
            }

        }
    }
 

}
?>