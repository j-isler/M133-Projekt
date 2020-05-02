<?php
   include_once("SessionMngt.class.php");
   include_once("../db/db_connect.php");
   include_once("PasswordHash.class.php");
   
   $errors = array();


         if(!SessionMngt::checkLoginState($dbh)){

            if (isset($_SESSION['username']) && isset($_SESSION['password'])){

               $query = "SELECT * From users Where username = :username";
               
               $username = $_SESSION['username'];
               $password = $_SESSION['password'];


               $stmt = $dbh->prepare($query);
               $stmt->execute(array(':username' => $username));

               $row = $stmt->fetch(PDO::FETCH_ASSOC);

               if ($row['id'] > 0){
                  if ($password === $row['password']){

                     SessionMngt::createRecord($dbh, $row['id'], $row['username']);
                     header("location: ../Noteboard/index.php");
                     
                  }else {
                     array_push($errors, "Wrong Username or Password");
                     $_SESSION['error'] = $errors;
                     header("location: ../frontend/login.php");
                  }
            }
         }

            if (isset($_POST['username']) && isset($_POST['password'])){

               $query = "SELECT * From users Where username = :username";
               
               $username = $_POST['username'];
               $password = $_POST['password'];


               $stmt = $dbh->prepare($query);
               $stmt->execute(array(':username' => $username));

               $row = $stmt->fetch(PDO::FETCH_ASSOC);

               if ($row['id'] > 0){
                  if (PasswordHash::checkPassword($password,$row['password'])){
                     SessionMngt::createRecord($dbh, $row['id'], $row['username']);
                     header("location: ../Noteboard/index.php");
                  }else {
                     array_push($errors, "Wrong Username or Password");
                     $_SESSION['error'] = $errors;
                     header("location: ../frontend/login.php");
                   }
                  

               } else {
                  array_push($errors, "Wrong Username or Password");
                  $_SESSION['error'] = $errors;
                  header("location: ../frontend/login.php");
               }


            }
         }else{
            header("location: ../Noteboard/index.php");
         }

?>

