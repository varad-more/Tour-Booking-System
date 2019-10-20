<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Form</title>

  <!-- Media Queries!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content= "IP Project" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel ="stylesheet" href ="./mystyle.css">
</head>

<body>
  
    <br />
  
    <!-- <div class="container" style="width:100%; max-width:600px"> -->

    <div class="wrap">
		<h2>Sign Up</h2>
        <form method="post" id="forgot_form">
        
      
      <div class="form-group">
       <label>Email ID</label>
       <input type="text" name="user_email" class="form-control" placeholder="Email ID" required />
      </div>


      <div class="form-group">
       <input type="submit" name="forgot" id="forgot" value="Confirm" class="btn btn-info" />
      </div>  
    

    </form>
    <br>
    <!-- <a href="login.php" style= "font-size= 12px;	line-height: 20px;	color:darkgrey; align = centre">ALREADY HAVE AN ACCOUNT?</a> -->
     
</div>
</body>
</html>


<?php

if(isset($_POST["forgot"])){
$user = $_POST['user_email'];

$mail_body = "
   <p>Hi,</p>
   <p>Flow Reaching, its working!!</p>
   <p>Please Open this link to reset your password - http://localhost/IP_project/test2/forgot.php</p>
   <p>Best Regards,<br />Varad More</p>";

   
   require 'E:/xampp/php/pear/PHPMailer-master/src/PHPMailer.php';// Please update location
   require 'E:/xampp/php/pear/PHPMailer-master/src/SMTP.php';
   $mail =   new PHPMailer\PHPMailer\PHPMailer(); // new PHPMailer(true);
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP

   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "smtp.gmail.com";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);
   $mail->Username = "1pdftoword@gmail.com";/// email ID 
   $mail->Password = "aiimsair1";// Pass
   $mail->SetFrom("1pdftoword@gmail.com");// email ID 
   //$mail->Subject = "Test";
   //$mail->Body = "hello";
  // $mail->AddAddress("xxxxxx@xxxxx.com");


   $mail->FromName = 'IP_Project_tours';     //Sets the From name of the message
   $mail->AddAddress($_POST['user_email']);  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Reset Password';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '<label class="text-success">Reset Password link is sent, Please check your mail.</label>';
   }
   else {
    echo "Mailer Error: " . $mail->ErrorInfo;
   }
  }



?>