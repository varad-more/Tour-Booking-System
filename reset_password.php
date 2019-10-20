<!DOCTYPE html>
<head>
    <html>
 <title>Reset Password</title>
 <script>

</script>
 </head>


 <body>
     <div>
     <form method="post" id="reset">
     
     <div class="form-group">
       <label>Email ID</label>
       <input type="text" name="email" class="form-control" placeholder="Email ID" required />
      </div>

     <div class="form-group">
       <label>New Password</label>
       <input type="password" name="pass" class="form-control" placeholder="NEW PASSWORD" required />
      </div>

     <div class="form-group">
       <label>Confirm Password</label>
       <input type="password" name="conf_pass" class="form-control"  placeholder= "CONFIRM PASSWORD" required />
      </div>
      <div class="form-group">
       <input type="submit" id="reset" name="reset" type="button" value="Insert" onclick="execute();"/>
      </div>

    </form>
</div>
</body>

<?php


$mysqli=new MySQLi('localhost','root','','testing');

if($mysqli){
    echo "Connected";
}


if(isset($_POST["reset"])){

if ($_POST['pass']==$_POST['conf_pass']){
    echo "\n True";
    $encrypted_password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    echo "\n";
    echo $encrypted_password;
    $mail= $_POST['email'];
    $insert=$mysqli->query("UPDATE register_user SET user_password = '$encrypted_password'  WHERE user_email ='$mail' "); 
    // $insert=$mysqli->query("INSERT INTO $var_db (loc_id, loc_name, details, price, imagepath) VALUES ('$id', '$name', '$det', '$cost', '$imgpath')  ");

    /*SQL Query change
UPDATE `register_user` SET `register_user_id`=[value-1],`user_name`=[value-2],`user_email`=[value-3],`user_password`=[value-4],`user_activation_code`=[value-5],`user_email_status`=[value-6] WHERE 1
*/
}

else {
    echo "Passwords dont match";
}
}


?>
