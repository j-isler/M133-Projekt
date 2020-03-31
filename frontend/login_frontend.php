<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require "../bootstrap/bootstap_temp.php"; ?>
</head>
<body>
    <div style="width: 50%; text-align: center; margin: auto">
        <h2>Login Form</h2>
        <form action="/action_page.php" method="post">
              <div class="imgcontainer">
                <img src="avatar.png" alt="Avatar" class="avatar">
              </div>

              <div class="form-group">
                <label for="uname"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
              </div>
              <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
              </div>
                <button type="submit" class="btn btn-primary">Login</button>
              <div class="form-group form-check">    
                <label>
                  <input type="checkbox" class="form-check-input" checked="checked" name="remember"> Remember me
                </label>
              </div>    
              <div class="form-group" style="background-color:#f1f1f1">
                <span class="badge badge-pill badge-light"><a href="registration_frontend.php">SignUp</a></span>
                <span class="badge badge-pill badge-light">Forgot <a href="#">password?</a></span>
              </div>
        </form>
    </div>
</body>
</html>
        
