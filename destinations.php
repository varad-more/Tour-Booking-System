
<!DOCTYPE html>
<html>
<head>
 <title>Destinations</title>
 <script>
  
 
  </script>

</head>

<style type="text/css">


*{
 margin: 0px;
 padding: 5px;
}
.dropbtn {
  background-color: #000000;
    color: white;
    position:relative;
    margin-top:3%;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: absolute;
    margin-top:-2%;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: lightgrey;
    min-width: 200px;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {background-color: white;}
.dropdown:hover .dropdown-content {display: inline;} /*contents */
.dropdown:hover .dropbtn {background-color: grey;}

body{
 font-family: arial;
}
.main{

 margin: 2%;
}

ul{
	 float:right;
	 list-style-type: none;
	 margin-top: 25px;

}
ul li{
	 display:inline-block;
}
ul li a{
	 text-decoration: none;
	 color: #000; /**Change */
	 padding: 5px 20px;
	 border: 1px solid transparent;
	 transition: 0.6s ease;
}
ul li a:hover{
	background-color: #fff;
	color:#000;
}
ul li.active a{
	background-color: #000;
	color:#fff;

}

.card{
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2%;
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  

 
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h1{
  font-size: 20px;
 }

.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}

</style>



<body background="black">



<div class="main">
            <ul>
               <li><a href="./index.html">HOME</a></li>
               <li  class="active"><a href="http://localhost//ip_tours/destinations.php?dest=full">DESTINATIONS</a></li>
               <!-- <META HTTP-EQUIV="Refresh"CONTENT="0; URL=http://www.yoursite.com/redirect_location"> -->
               <li><a href="#">SERVICES</a></li>
               <li><a href="about.html">ABOUT</a></li>
               <li><a href="#">CONTACTS</a></li>
           </ul>
<div class="dropdown">
<button class="dropbtn" style="margin-top:2%;">Select Destination </button>
<div class="dropdown-content">

<a href="destinations.php?dest=india">India </a>
<a href="destinations.php?dest=europe">Europe</a>
<a href="destinations.php?dest=mid_east">Middle East</a>
<a href="destinations.php?dest=america">America</a>
<a href="destinations.php?dest=asia" >Asia</a>
<a href="destinations.php?dest=full " >All </a>

</div>

</div>
<br>
<br>
<br>
<br>
</body>
</html>
<?php
$var="₹";
$var2=$_GET['dest'];
session_start();
$mysqli=new MySQLi('localhost','root','','destinations');
$sql = "SELECT loc_id, loc_name,details,price,imagepath FROM $var2";
$result = $mysqli->query($sql);
$prods = null;
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
  
      echo'<div class="card">';
      echo '<div class="image">';
      echo'<img class="prodimage" id ="img1" src="'.$row["imagepath"].'" width=300 height=200 alt="Error">';
      // echo'<img class="prodimage" id ="img1" src="images/pi3b.jpg" width=300 height=200 >'; //alt="Error">';

      echo'</div>';
      echo'<div class="title">';
      echo"<h1>".$row["loc_name"]."</h1>";
      echo"<h1>".$var. $row["price"]."</h1>";
      echo'</div>';
      echo'<div class="des">';
      echo"<p>Tour Duration - ".$row["details"]."<p>";
      echo'<a href="billing.php?location='.$row["loc_name"].'&duration='.$row["details"].'&price='.$row["price"].'" target="_parent"><button >Book </button></a>';
      echo'</div>';
      echo'</div>';

    }
  
}


// if(!isset($_SESSION['email_id']))
// {
//   echo '<script language="javascript">';
//   echo 'alert("You must login to access this page")';
//   echo '</script>';
//   die();
  
// }
?>
