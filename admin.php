<!DOCTYPE html>
<head>
    <html>
 <title>ADMIN Entry Panel</title>
 <script>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel ="stylesheet" href ="./css/admin.css">
    

    
 </head>

 <body>
     <h2><a href="review.php">Review Recent Bookings</a></h2>
     <h4 text-align="Right"><a href="logout.php">Logout</a></h4>
     <br>
     <div class="wrap">
     <div>
     <form method="post" id="admin">
     
     <div class="form-group">
       <label>Area</label>
       <input type="text" name="var_db" class="form-control" placeholder="Database" required />
      </div>

     <div class="form-group">
       <label>ID</label>
       <input type="number" name="id" class="form-control"  placeholder= "Location ID" required />
      </div>

      <div class="form-group">
       <label>Name</label>
       <input type="text" name="name" class="form-control" placeholder="Location Name" required />
      </div>

      <div class="form-group">
       <label>Details</label>
       <input type="text" name="det" class="form-control" placeholder="Itinerary Details" required />
      </div>
 
      

      <div class="form-group">
       <label>Price</label>
       <input type="number" name="cost" class="form-control" placeholder="Price" required />
      </div>

      <div class="form-group">
       <label>Image Path</label>
       <input type="text" name="imgpath" class="form-control" placeholder="Image Path" required />
      </div>
      
      <div class="form-group">
       <input type="submit" id="admin" name="admin" type="button" value="Insert" onclick="execute();"/>
      </div>

</form>


</div>
      
</body>

</html>

<?php
$mysqli=new MySQLi('localhost','root','','destinations');

if($mysqli){
    // echo "Connected";
}
    if(isset($_POST["admin"])){



   
// $insert_query = "INSERT INTO :var_db 
//   (loc_id, loc_name, details, price, imagepath) 
//   VALUES (:id, :name, :det, :cost, :imgpath)  ";


//   $statement = $mysqli->query($insert_query);
//   $statement->execute(
//     array(
//      ':var_db'   => $_POST['var_db'],   
//      ':id'   => $_POST['id'],
//      ':name'   => $_POST['name'],
//      ':det'  => $_POST['det'],
//      ':cost' =>$_POST['cost'],
//      ':imgpath' => $_POST['imgpath']
//     )
//    );

//   $result = $statement->fetchAll();
//   if(isset($result)){
//       echo "Inserted!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
//   }
// if(!$statement->execute()){
//     echo "Failed" ;
// }

    $var_db   = $_POST['var_db'];
     $id  = $_POST['id'];
     $name   = $_POST['name'];
     $det  = $_POST['det'];
     $cost =$_POST['cost'];
     $imgpath = $_POST['imgpath'];

     if ($var_db)
     {
         echo $var_db ;
         echo $id;
         echo $name ;
         echo $det ;
         echo $cost ;
         echo $imgpath ;

        }
$insert=$mysqli->query("INSERT INTO $var_db (loc_id, loc_name, details, price, imagepath) VALUES ('$id', '$name', '$det', '$cost', '$imgpath')  ");
$insert1=$mysqli->query("INSERT INTO full  (loc_id, loc_name, details, price, imagepath) VALUES ('$id', '$name', '$det', '$cost', '$imgpath')  ");
// $insert=$mysqli->query("INSERT INTO europe (loc_id, loc_name, details, price, imagepath) VALUES (1, 'London','5D', 56564, 'images\\pi3b.jpg')  ");

// INSERT into buy (email,address,pincode,quantity,contact,payment_mode,total,odakh,buyername,category,deliverydate) values ('$email_id','$address','$pincode','$quantity','$contact','$paymentmethod','$total','$odakh','$name','$category','$Date2')");

 
  if ($insert && $insert1) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . $mysqli->error;
}
}
?>
