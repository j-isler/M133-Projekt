<?php
  include_once("header.php");

echo '
<body>
    <div id="login"> 
        <form action="../authentication/login.php" method="post" id="formlogin">
             <h2>Login</h2>
              <div class="imgcontainer" id="avatar">
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
                <p style="color:red">
                ';
                    if(isset($_SESSION['error']) AND !(count($_SESSION['error']) === 0)) {
                        foreach($_SESSION['error'] as $error){
                            echo $error . '<br>';
                        }
                        unset($_SESSION['error']); 
                    }
                echo '
                </p>
                <button type="submit" class="btn btn-primary">Login</button>   
              <div class="form-group">
                <span class="badge badge-pill badge-light"><a href="registration.php">SignUp</a></span>
                <span class="badge badge-pill badge-light"><a href="#">Forgot password?</a></span>
              </div>
        </form>
    </div>
</body>
</html>
';        
?>