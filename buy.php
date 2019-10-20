<?php
 
    $change=$_GET['change'];
    $ref=$_GET['ref'];
    $mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT  quantity  FROM $ref where product_id='$change'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$stock=$row["quantity"];
if($stock=0)
{
    header('location:thankyou.php');
}
 
 ?>
 <?php
$error=null;
if(isset($_POST['Confirm'])){

    $change=$_GET['change'];
    $ref=$_GET['ref'];
    
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql = "SELECT  quantity,price  FROM $ref where product_id='$change'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$stock=$row["quantity"];
$email_id = $_POST['email_id'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$quantity = $_POST['quantity'];
$contact = $_POST['phone_no'];
$paymentmethod = $_POST['pay'];
$email_id=$mysqli->real_escape_string($email_id);
$address=$mysqli->real_escape_string($address);
$pincode=$mysqli->real_escape_string($pincode);
$quantity=$mysqli->real_escape_string($quantity);
$contact=$mysqli->real_escape_string($contact);
$paymentmethod=$mysqli->real_escape_string($paymentmethod);
$total = $quantity * $row["price"];
$odakh=md5(time().$email_id);


$insert=$mysqli->query("INSERT into buy (email,address,pincode,quantity,contact,payment_mode,total,odakh) values ('$email_id','$address','$pincode','$quantity','$contact','$paymentmethod','$total','$odakh')");
if($insert)
    {
        $stock=$stock-$quantity;
        
        header('location:displaytest.php?tp='.$total.'&odakh='.$odakh.'&email='.$email_id.'&nref='.$ref.'&change='.$change.'&stock='.$stock.'&sel=buy');

    }
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="abc.css">
</head>
<body>
<div id="container_demo" >
<div id="wrapper">

                <div id="signup" class="animate form">

                    <form  method="post" action="" autocomplete="on"> 

                     


                        <p> 

                            <label for="email_id" class="email" data-icon="e" > Email Address </label>

                            <input id="email_id" name="email_id" required="required" type="email" placeholder="myemail@gmail.com"/>

                        </p>
                        
                        <p> 

                            <label for="address" class="address" data-icon="d"> Delivery Address </label>

                            <input id="address" name="address" required="required" type="text" placeholder="eg. Moon lane, Sun Apartments, Mumbai - 400001" /> 

                        </p>
                        <p> 

                            <label for="pincode" class="youpasswd" data-icon="p"> Pincode </label>

                            <input id="pin" name="pincode" required="required" type="number" placeholder="eg. X8df!90EO" /> 

                        </p>
                        

                        <p> 

                            <label for="quantity" class="c_passwd" data-icon="cp"> Quantity </label>

                            <input id="password" name="quantity" required="required" type="number" placeholder="eg. X8df!90EO" /> 

                        </p>


                        <p> 

                            <label for="phone_no" class="phone" data-icon="pn"> Contact </label>

                            <input id="phone_no" name="phone_no" required="required" type="number" placeholder="eg. 9876543210" /> 

                        </p>

                        <br>    
                        
    </diV>                        
    </diV>                                                

                        <p>Please select preferred payment method:</p>
  <div>
    <input  type="radio" id="contactChoice1"
     name="pay" required="required" value="Cash on Delivery">
    <label for="contactChoice1">Cash on Delivery</label>

    <input  type="radio" id="contactChoice2"
     name="pay" value="Online" required="required">
    <label for="contactChoice2">Online</label>

    <div id="wrapper">
  <p class="Sign Up button"> 
      

<input type="submit" name="Confirm" value="Proceed to Pay" /> 

</p>
</div>
  <!-- <div>
    <input type="submit">Submit</button>
  </div> -->
                    
                    </form>
                <center>
                    <?php
                    
                    echo $error;
                    ?>
                </center>
                </div>
                



                </body>
                
                </html>