

<?php
   $location=$_GET['location'];
   $duration=$_GET['duration'];
   $price=$_GET['price'];
$mysqli=new MySQLi('localhost','root','','testing');

// $con = mysqli_connect("localhost","root","","testing");
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($mysqli){
  echo "Connection zala";
}

if(isset($_POST['submit'])) {

    // $customer_ip = getIp();
    $customer_ip='localhost';
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
  // echo $customer_ip;
  echo $firstname;
  echo $email;
  // $insert =;
$insert=$mysqli->query( "INSERT INTO orders (customer_ip, user_name, email, address, city, state, zip, name_card, card_num, expiry_month, expiry_year, CVV) VALUES ('$customer_ip','$firstname','$email','$address','$city','$state','$zip','$cardname','$cardnumber','$expmonth','$expyear','$cvv')");


//  $run_c = mysqli_query($con, $insert_c);
//  if($run_c) {
//   echo "<script>alert('booking successful')</script>";
//  }
 if ($insert) {
  echo "<script>alert('booking successful')</script>";

  
  $mail_body = "
  <p>Hi ".$_POST['firstname'].",</p>
  
  <p>Thanks for booking through our Portal.</p>
  <p>This is confirmation Mail for your booking:</p>
  <p> </p>
  <p> </p>
  
  <p>Location - ".$location." </p>
  <p>Tour Itinerary - ".$duration." </p>
  <p>Total Cost - ".$price." </p>
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
  $mail->AddAddress($_POST['email'], $_POST['firstname']);  //Adds a "To" address   
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML    
  $mail->Subject = 'Bill Receipt';   //Sets the Subject of the message
  $mail->Body = $mail_body;       //An HTML or plain text message body
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $message = '<label class="text-success">Register Done, Please check your mail.</label>';
  }
  else {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
 
} else {
  echo "Error: " .$insert. "<br>" . $mysqli->error;
}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Travel website">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="Shrunjala Mul">
        <title>Outlines | Checkout</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="http://cdn.dcodes.net/2/payment_icons/dc_payment_icons.css" />
        <style>
          .header img {
    float: left;
    width: 50px;
    height: 50px;
    background: #555;
    
  }
  
  .header h1 {
    position: relative;
    top: 18px;
    left: 10px;
    bottom: 18px;
  }
body{
font-family: "Palatino Linotype", "Book Antiqua", serif;
font-size: 15 px;
line-height: 1.5;
 padding: 0;
 margin: 0;
 background-color:#efe5ff;
}
/*Global*/
.container{
    width: 80%;
    margin: auto;
    overflow: hidden;
}
header ul{
    padding: o;
    margin: 0;

}
/* Header */
header{
    background: #1f1433;
    color: #ffffff;
    padding-top: 30px;
    min-height: 70px;
    border-bottom: #671604 5px solid;

}
header img {
    float: left;
    width: 100px;
    height: 100px;
    background: #555;
  }
  
  header h1 {
    position: relative;
    top: 18px;
    left: 10px;
  }
header a{
    color: #1f1433;
    text-decoration: #1f1433;
    text-transform: uppercase;
    font-size: 16px;
}

header li{
    float: left;
    display: inline;
    padding: 0 20px 0 20px;
}
header #branding{
    float: left;
}
header #branding h1{
    margin: 0;
}
header nav{
    float: right;
    margin-top: 10px;
}
header .highlight, header .current a{
    color: #efe5ff;
    font-weight: bolder;
}
header a:hover{
    color: ;
    font-weight: bold;

}
/* Showcase */
#showcase{
    min-height: 400px;
    width: 100%;
    background: url('../img/aruba-1-950x530.jpg') no-repeat ;
    background-size: 100% 100%;
    text-align: center;
    color: #ffffff;

}
#showcase h1{
    margin-top: 100px;
    font-size: 55px;
    margin-bottom: 10px;

}
#showcase p{
    font-size: 20px;
}
/* boxes */
#boxes{
    margin-top: 20px;

}
#boxes.box{
    float: left;
    width: 33%;
    padding: 10px;
    text-align: center;
}
#boxes .box imp{
    width: 90px;
}
footer{
    padding:20px;
    margin-top: 20px;
    color: #ffffff;
    background-color: #671604;
    text-align: center;
}
html {
    box-sizing: border-box;
  }
  
  *, *:before, *:after {
    box-sizing: inherit;
  }
  
  .column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
  }
  
  @media screen and (max-width: 400px) {
    .column {
      width: 100%;
      display: block;
    }
  }
  
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }
  
  .container {
    padding: 0 16px;
  }
  
  .container::after, .row::after {
    content: "";
    clear: both;
    display: table;
  }
  
  .title {
    color: #1f1433;
  }
  
  .button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #1f1433;
    text-align: center;
    cursor: pointer;
    width: 100%;
  }
  
  .button:hover {
    background-color: #555;
  }
  
  .row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
  }
  
  .col-25 {
    -ms-flex: 25%; /* IE10 */
    flex: 25%;
  }
  
  .col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
  }
  
  .col-75 {
    -ms-flex: 75%; /* IE10 */
    flex: 75%;
  }
  
  .col-25,
  .col-50,
  .col-75 {
    padding: 0 16px;
  }
  
 /* .container {
    background-color: #f2f2f2;
    padding: 5px 20px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
  }
  */
  input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  
  label {
    margin-bottom: 10px;
    display: block;
  }
  
  .icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
  }
  
  .btn {
    background-color: #1f1433;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }
  
  .btn:hover {
    background-color: #45a049;
  }
  
  span.price {
    float: right;
    color: grey;
  }
  
  /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
  @media (max-width: 800px) {
    .row {
      flex-direction: column-reverse;
    }
    .col-25 {
      margin-bottom: 20px;
    }
  }

  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }
  
  .price {
    color: grey;
    font-size: 22px;
  }
  
  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color:#1f1433;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  
  .card button:hover {
    opacity: 0.7;
  }
  
  .column {
  float: right;
  width: 100%;
  padding: 70px;
  height: 400px; /* Should be removed. Only for demonstration */
}
</style>
        </head> 

    
    <body>
        <!-- <header>

            <div class="container">
                
                        <div class="header">
                                <img src="https://i.pinimg.com/564x/fd/e4/ab/fde4abfda12abfc3ecaec36c05847731.jpg" alt="logo" />
                                <h1><span class = "highlight">Outline</span> Travels</h1>
                              </div>
                    <nav>
                    <ul> 
                        <li> <a href="index.html">Packages</a></li>
                        <li> <a href="checkout.html">About</a></li>
                        <li> <a href="index.html">Services</a></li>

                </nav>
            
                            </div>
              
            </div>
           
        </header> -->


        <br>
        <br>
        
        <div class="row">
                <div class="col-75">
                  <div class="container">
                    <form method="post" id = "billing_test">
              
                      <div class="row">
                        <div class="col-50">
                          <h3>Billing Address</h3>
                          <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                          <input type="text" id="fname" name="firstname" placeholder="Name" required>
                          <label for="email"><i class="fa fa-envelope"></i> Email</label>
                          <input type="text" id="email" name="email" placeholder="email@example.com" required>
                          <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                          <input type="text" id="adr" name="address" placeholder="Address" required>
                          <label for="city"><i class="fa fa-institution"></i> City</label>
                          <input type="text" id="city" name="city" placeholder="City" required>
              
                          <div class="row">
                            <div class="col-50">
                              <label for="City">State</label>
                              <input type="text" id="state" name="state" placeholder="State" required>
                            </div>
                            <div class="col-50">
                              <label for="zip">Zip</label>
                              <input type="text" id="zip" name="zip" placeholder="Zip" required>
                            </div>
                          </div>
                        </div>
              
                        <div class="col-50">
                          <h3>Payment</h3>
                          <label for="fname">Accepted Cards</label>
                          
                          <span class="dc_payment_icons_smini_32 dc_visa_alt_smini" title="Visa"></span>
                          <span class="dc_payment_icons_smini_32 dc_visa_smini" title="Visa"></span>
                            <span class="dc_payment_icons_smini_32 dc_mastercard_alt_smini" title="Mastercard"></span>
                            <span class="dc_payment_icons_smini_32 dc_mastercard_smini" title="Mastercard"></span>
                            <span class="dc_payment_icons_smini_32 dc_amex_alt_smini" title="American Express"></span>
                            <span class="dc_payment_icons_smini_32 dc_amex_smini" title="American Express"></span>
                          <label for="cname">Name on Card</label>
                          <input type="text" id="cname" name="cardname" placeholder="Name" required>
                          <label for="ccnum">Credit card number</label>
                          <input type="text" id="ccnum" name="cardnumber" placeholder="XXXX-XXXX-XXXX" required>
                          <label for="expmonth">Expiry Month</label>
                          <input type="text" id="expmonth" name="expmonth" placeholder="Expiry Month" required>
              
                          <div class="row">
                            <div class="col-50">
                              <label for="expyear">Expiry Year</label>
                              <input type="text" id="expyear" name="expyear" placeholder="Expiry Year" required>
                            </div>
                            <div class="col-50">
                              <label for="cvv">CVV</label>
                              <input type="text" id="cvv" name="cvv" placeholder="CVV" required>
                            </div>
                          </div>
                        </div>
              
                      </div>
                      
                     <input type="submit" class="btn" name="submit" value="Submit">

                    </form>
                  </div>
                </div>
                <!-- <div class="col-15">
                  
                    </div>
                  </div> -->
                <div class="col-25">
               
                  <div class="container">
                    <h1>Cart
                      <span class="price" style="color:black">
                        <i class="fa fa-shopping-cart"></i>
                      
                      </span>
                    </h1>
                    <h1>Location - <?php echo $location; ?></h1>
                    
                               
                    <hr>
                    <h3>Total <span class="price" style="color:black"><b><?php $var="₹"; echo $var; echo $price; ?></b></span></h3>
                    <div class="row">
                  <div class="column" style="background-color:#ccc;" >
                
                  <iframe src="https://www.google.com/maps/d/embed?mid=1mJa7HIXTeb3WU7FrDAhqmzQO2IQDoDnB" width="100%" height="100%"></iframe>
                </div>
                  </div>
                  </div>
                </div>
              </div>

        
        <section id = "boxes">
                
        <!-- <footer>
            <p> shrunjala web designs, Copyright &copy; 2019</p>
        </footer> -->
     
          



    </body>
</html>
