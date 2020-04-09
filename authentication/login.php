<?php
   include_once("SessionMngt.class.php");
   include_once("../db/db_connect.php");
   


         if(!SessionMngt::checkLoginState($dbh)){
          
            if (isset($_POST['username']) && isset($_POST['password'])){

               $query = "SELECT * From users Where username = :username And password = :password";
               
               $username = $_POST['username'];
               $password = $_POST['password'];


               $stmt = $dbh->prepare($query);
               $stmt->execute(array(':username' => $username, ':password' => $password));

               $row = $stmt->fetch(PDO::FETCH_ASSOC);

               if ($row['id'] > 0){
                  
                  SessionMngt::createRecord($dbh, $row['id'], $row['username']);
                  header("location: ../Noteboard/index.php");
                  

               } else {
                 header("location: ../frontend/login.php");
               }


            }
         }else{
            header("location: ../Noteboard/index.php");
         }

?>

