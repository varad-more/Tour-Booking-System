<?php
//logout.php
session_start();

session_destroy();
// echo "Logout Successful";
// sleep(10);
header("location:index.php");

?>

<!-- <html>
<Body>
<H1>Logout Successful</H1>
</Body>
</html> -->