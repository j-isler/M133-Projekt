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
        <meta charset="utf-8">
        <a><title>Noteboard</title></a>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="../index.php">Noteboard</a>
            <a href="../frontend/login.php"><button class="btn btn-link my-2 my-sm-0" type="submit">Login</button></a>
        </nav>
    </head>';

?>
