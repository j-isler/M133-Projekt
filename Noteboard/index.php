<?php
    include_once("../authentication/SessionMngt.class.php");
    include_once("../db/db_connect.php");

    if(!SessionMngt::checkLoginState($dbh)){
        header("location:../frontend/login.php");
       // exit();
    }
//  https://www.pair.com/support/kb/how-to-use-jquery-to-show-hide-a-form-on-click/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Noteboard</title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
        <script type="text?javascript" src="js/script.js" ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require "../bootstrap/bootstap_temp.php"; ?>
    </head>
<body>
    <nav class="navbar navbar-light bg-light">
            <a href="/" class="navbar-brand">Noteboard</a>
            <a href="../authentication/logout.php"><button class="btn btn-link my-2 my-sm-0" type="submit">Logout</button></a>
    </nav>
    <div>
        <?php echo "Willkommen " . $_SESSION['username'] . " auf der Noteboardapplikation!"; ?>
    </div>
        
    
        

    
</body>
</html>