<?php
   include_once("function.php");
   include_once("../db/db_connect.php");
   


         if(!func::checkLoginState($dbh)){
          
            if (isset($_POST['username']) && isset($_POST['password'])){

               $query = "SELECT * From users Where username = :username And password = :password";
               
               $username = $_POST['username'];
               $password = $_POST['password'];


               $stmt = $dbh->prepare($query);
               $stmt->execute(array(':username' => $username, ':password' => $password));

               $row = $stmt->fetch(PDO::FETCH_ASSOC);

               if ($row['id'] > 0){
                  
                  //func::createRecord($row['id'], $row['username']);
                  //header("location: index.php");

                  echo func::createString(32);

               }


            }else{
               echo '
               <form action="login.php" method="post">
                  <label>username</label><br>
                  <input type="text" name="username" /><br>
                  <label >Password</label><br>
                  <input type="text" name="password" /><br>
                  <input type="submit" value="login" />
               </form>
               ';
            }
         }else{
            header("location: index.php");
         }

?>

