<?php 
    include_once("../authentication/SessionMngt.class.php");
    include_once("../db/db_connect.php");

    if(SessionMngt::checkLoginState($dbh)){
        header("location: ../Noteboard/index.php");
     }
     require("../bootstrap/bootstap_temp.php");
     echo'<!DOCTYPE html>
     <html>
     <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="css/style.css" rel="stylesheet">
         <link href="css/style.css" rel="stylesheet">
     </head>';

?>
