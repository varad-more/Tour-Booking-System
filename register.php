<?php
//register.php
$profpic = "./reg_wall.jpg";
include('database_connection.php');

if(isset($_SESSION['user_id']))
{
 header("location:index.html");
}

$message = '';

if(isset($_POST["register"]))
{
 $query = "
 SELECT * FROM register_user 
 WHERE user_email = :user_email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    ':user_email' => $_POST['user_email']
  //  ':passwd' => $_POST['user_passwd']  
   )
 );
 $no_of_row = $statement->rowCount();
 if($no_of_row > 0)
 {
  $message = '<label class="text-danger">Email Already Exits</label>';
 }
 else
 {

  // INSERT INTO register_user 
  // (user_name, user_email, user_password, user_activation_code, user_email_status) 
  // VALUES (:user_name, :user_email, :user_password, :user_activation_code, :user_email_status)

  // $user_password = rand(100000,999999);
  // $user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
  $user_encrypted_password = password_hash($_POST['user_passwd'], PASSWORD_DEFAULT);
  $user_activation_code = md5(rand());
  $insert_query = "
    INSERT INTO register_user 
  (user_name, user_email, user_password, user_activation_code, user_email_status) 
  VALUES (:user_name, :user_email, :user_password, :user_activation_code, :user_email_status)
  ";
  $statement = $connect->prepare($insert_query);
  $statement->execute(
   array(
    ':user_name'   => $_POST['user_name'],
    ':user_email'   => $_POST['user_email'],
    ':user_password'  => $user_encrypted_password,
    // ':user_passwd'  => $_POST['user_passwd'],
    ':user_activation_code' => $user_activation_code,
    ':user_email_status' => 'not verified'
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
   $base_url = "http://localhost/IP_project/test2/";  ///Project URL
   $mail_body = "
   <p>Hi ".$_POST['user_name'].",</p>
   <p>Flow Reaching, its working!!</p>
   <p>Thanks for Registration. This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
   <p>Best Regards,<br />Varad More</p>";

   //require('class.phpmailer.php');
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
   $mail->AddAddress($_POST['user_email'], $_POST['user_name']);  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Email Verification';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
   }
   else {
    echo "Mailer Error: " . $mail->ErrorInfo;
   }
  }
 }
}

?>








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


    <!-- Captcha function -->
    <script type="text/javascript">
			 function IsValid(){

                      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                     var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 == string2){
                        return true;
                      }
                      else{        
                        return false;}
                  }

                function CaptchaGenerator(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                       var f = alpha[Math.floor(Math.random() * alpha.length)];
                       var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var res = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").value = res
                  }

                 function removeSpaces(string){
                   return string.split(' ').join('');
                  }
             </script>    
   
   
    <!-- function Ends -->
</head>

<body onload="Captcha();">
  
    <br />
  <!-- Worked previous version change by varad -->
    <!-- <div class="container" style="width:100%; max-width:600px"> -->

    <div class="wrap">
		<h2>Sign Up</h2>
        <form method="post" id="register_form">
      <?php echo $message; ?>

      <div class="form-group">
       <label>Name</label>
       <input type="text" name="user_name" class="form-control" pattern="[a-zA-Z ]+"  placeholder= "Full Name" required />
      </div>
      
      <div class="form-group">
       <label>Email ID</label>
       <input type="text" name="user_email" class="form-control" placeholder="Email ID" required />
      </div>

      <div class="form-group">
       <label>Password</label>
       <input type="password" name="user_passwd" class= "form-control" placeholder="Password" required />
      </div>

      <!-- Captcha code -->
      <table>
          <tr>           <td>
             Text Captcha<br />
           </td>
          </tr>
          <tr>
           <td>
            <input type="text" id="mainCaptcha"/>
            <input type="button" id="refresh" value="Refresh" onclick="CaptchaGenerator();" />
           </td>
          </tr>
         <tr>
         <td>

        <input type="text" id="txtInput"/>    
          </td>
         </tr>
         <tr>
          <td>
           <input id="Button1" type="button" value="Check" onclick="alert(IsValid());"/>
          </td>
       </tr>
      </table>
<!-- Captcha Ends -->


      <div class="form-group">
       <input type="submit" name="register" id="register" value="Register" class="btn btn-info" />
      </div>
    
<!-- Redirects to login page -->
    </form>
    <br>
    <a href="login.php" style= "font-size= 12px;	line-height: 20px;	color:darkgrey; align = centre">ALREADY HAVE AN ACCOUNT?</a>




     
</div>


</body>
</html>


   <!-- <input type="text" placeholder="FIRST NAME" required>
			<input type="text" placeholder="MIDDLE NAME" required>
			<input type="text" placeholder="LAST NAME" required>
			<input type="text" placeholder="EMAIL " required>
			<input type="password" placeholder="PASSWORD" required>
			<input type="submit" value ="Submit"> -->
        <!-- </form> -->



<!-- 
<!DOCTYPE html>
<html>
 <head>
  <title>IP PROJECT REGISTRATION PAGE</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
 </head>
 <body>
  <br />
  <div class="container" style="width:100%; max-width:600px">
   <h2 align="center">IP PROJECT REGISTRATION PAGE</h2>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading"><h4>Register</h4></div>
    <div class="panel-body">
   
   
   
    <form method="post" id="register_form">
           <div class="form-group">
       <label>User Name</label>
       <input type="text" name="user_name" class="form-control" pattern="[a-zA-Z ]+" required />
      </div>
      <div class="form-group">
       <label>User Email</label>
       <input type="email" name="user_email" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="register" id="register" value="Register" class="btn btn-info" />
      </div>
     </form>
   
   
     <p align="right"><a href="login.php">Login</a></p>
   
    </div>
   </div>
  </div>
 </body>
</html> -->




