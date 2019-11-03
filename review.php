<!DOCTYPE html>
<head>
    <html>
    <title>Admin Review</title>
 <script>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel ="stylesheet" href ="./css/review.css">
    
 </head>

 <body >
 <h2><a href="admin.php">Back to Admin Panel </a></h2>
</body>

</html>

<?php
$mysqli=new MySQLi('localhost','root','','testing');

if($mysqli){
    // echo "Connected";
}
$var="₹";
$sql = "SELECT * FROM orders";
$result = $mysqli->query($sql);
$prods = null;
if ($result->num_rows > 0) {
    echo "<h1>Dashboard <br> <text-align=\"center\">Recent Bookings</h1><br>";
    echo "<table style width=70% align=\"Center\"> ";

    echo"<tr>";
    echo"<th><h2>User</h2></th>";
    echo"<th><h2>Location</h2></th>";
    echo"<th><h2>Amount</h2></th>";
    echo"</tr>";
    while($row = $result->fetch_assoc()) {
      
        echo"<tr>";
        echo"<td><h3>".$row["user_name"]."</h3></td>";
        echo"<td><h3>".$row["place"]."</h3></td>";
        echo"<td><h3>".$var. $row["price"]."</h3></td>";
        echo"</tr>";
      }
}

else {
    echo"<h1>Bookings are Awaited!</h1>";
}

?>
