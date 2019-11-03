<!DOCTYPE html>
<html>
<head>
    <title>OUTLINES-EXPLORING THE MAPS!</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="main">  

           <ul>
               <li class="active"><a href="#">HOME</a></li>
               <li><a href="http://localhost//ip_tours/destinations.php?dest=full">DESTINATIONS</a></li>
               <!-- <META HTTP-EQUIV="Refresh"CONTENT="0; URL=http://www.yoursite.com/redirect_location"> -->
               <li><a href="about.html">ABOUT</a></li>
               <li><a href="team.html">TEAM</a></li>
               
               <?php
                include('database_connection.php');

               if(isset($_SESSION['user_id']))
                {
                echo"<li><a href=\"http://localhost//ip_tours/logout.php\">LOGOUT</a></li>";
                // echo $_SESSION['user_id'];
                }
                else {
                  echo "<li><a href=\"http://localhost//ip_tours/login.php\">LOGIN</a></li>";
                }

                ?>
                <!-- <li><a href="team.html">TEAM</a></li> -->
            </ul>
        </div>
        <div class="title">
          <h1 text-align="centre">OUTLINES-"EXPLORING THE MAP"</h1>
        </div>
        <!-- <div class="button">
          <a href="#" class ="btn">LOGIN</a>
        </div> -->
     </header>
 </body>
 </html>