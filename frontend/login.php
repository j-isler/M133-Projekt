<?php
   include_once("../authentication/function.php");
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
                  
                  func::createRecord($dbh, $row['id'], $row['username']);
                  header("location: ../NoteBoard/index.php");
                  

               }


            }
         }else{
            header("location: ../Noteboard/index.php");
         }

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1"
    <?php require "../bootstrap/bootstap_temp.php"; ?>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;"> 
        <form action="login.php" method="post" style="border:1px solid #ccc; border-radius: 15px; padding: 20px">
             <h2>Login</h2>
              <div class="imgcontainer" style="padding: 5px">
                <img src="avatar.png" alt="Avatar" class="avatar">
              </div>

              <div class="form-group">
                <label for="uname"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
              </div>
              <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
              </div>
                <button type="submit" class="btn btn-primary">Login</button>
              <div class="form-group form-check">    
                <label>
                  <input type="checkbox" class="form-check-input" checked="checked" name="remember"> Remember me
                </label>
              </div>    
              <div class="form-group">
                <span class="badge badge-pill badge-light"><a href="registration_frontend.php">SignUp</a></span>
                <span class="badge badge-pill badge-light"><a href="#">Forgot password?</a></span>
              </div>
        </form>
    </div>
</body>
</html>
        