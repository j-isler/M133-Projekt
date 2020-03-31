<?php
   include_once("function.php");
   include_once("../db/db_connect.php");
   


         if(func::checkLoginState($dbh)){
            echo 'Welcome'. $_SESSION['username'] . '!';
         }else{
            header("location: index.php");
         }

?>

