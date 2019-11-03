<?php
//login.php
$profpic = "reg_wall.jpg";
include('database_connection.php');

if(isset($_SESSION['user_id']))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
 $query = "
 SELECT * FROM register_user 
  WHERE user_email = :user_email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    'user_email' => $_POST["user_email"]
  )
 );
 $count = $statement->rowCount();
 if($count > 0)
 {
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   if($row['user_email_status'] == 'verified')
   {
    if(password_verify($_POST["user_password"], $row["user_password"]))
    {
     $_SESSION['user_id'] = $row['register_user_id'];
     if($row['admin'] == 'admin'){
       header("location:admin.php");
     }
     else{
      header("location:index.php");
     }
    }
    
  
    else
    {
     $message = "<label>Wrong Password</label>";
    }
   }
 
   else
   {
    $message = "<label class='text-danger'>Please First Verify, your email address</label>";
   }
  }
 }
 else
 {
  $message = "<label class='text-danger'>Wrong Email Address</label>";
 }
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Login</title>  
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
 
 </head>
 <link rel="stylesheet" type="text/css" href="css/style1.css">
 <body><!-- background="reg_wall.jpg"> -->
    <!-- <backround > -->
		<div class="loginbox">
			<img src="logo.png" class="logo">


  <!-- <div class="container" style="width:100%; max-width:600px"> -->
   <!-- <h1 >IP Project</h1> -->
   <!-- <br /> -->
   <div class="panel panel-default">
    <div class="panel-heading"><h1>Login</h1></div>
    <div class="panel-body">
     <form method="post">
      <?php echo $message; ?>
      <div class="form-group">
      
      
     

		
      
      <label>User Email</label>
       <input type="text" name="user_email" placeholder="ENTER USERNAME" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="user_password" placeholder="ENTER PASSWORD" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" value="Login" class="btn btn-info" />
      </div>
     </form>
     <a href="forgot.php"> LOST YOUR PASSWORD?</a><br>
		 <a href="register.php">DON'T HAVE AN ACCOUNT?</a>
     
    </div>
   </div>
  </div>
 </body>
</html>


<!-- <html>
<head>
	<title>Login Form Design</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<body>
		<div class="loginbox">
			<img src="logo.png" class="logo">
			<h1> LOGIN HERE </h1>
			<form>
				<p>USERNAME</p>
				<input type="text" name="" placeholder="ENTER USERNAME">
				<p>PASSWORD</p>
				<input type="PASSWORD" name="" placeholder="ENTER PASSWORD">
				<input type="SUBMIT" name="" value="LOGIN">		
				<a href="#"> LOST YOUR PASSWORD?</a><br>
				<a href="./index3.html">DON'T HAVE AN ACCOUNT?</a>
		</div>
	</body>
</head>
</html> -->