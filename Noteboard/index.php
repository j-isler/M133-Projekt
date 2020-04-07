<?php
    include_once("../authentication/function.php");
    include_once("../db/db_connect.php");

    if(!func::checkLoginState($dbh)){
        header("location:../frontend/login.php");
       // exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "Willkommen " . $_SESSION['username'] . " auf der Noteboardapplikation!"; ?>
    <p>hier geht es raus: </p> <a href="../authentication/logout.php"> Logout </a>
</body>
</html>