<?php
  include_once("header.php");
?>

<body>
    <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;"> 
        <form action="../authentication/login.php" method="post" style="border:1px solid #ccc; border-radius: 15px; padding: 20px">
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
              <div class="form-group">
                <span class="badge badge-pill badge-light"><a href="registration.php">SignUp</a></span>
                <span class="badge badge-pill badge-light"><a href="#">Forgot password?</a></span>
              </div>
        </form>
    </div>
</body>
</html>
        
