<!DOCTYPE html>
<html>
<head>
     <?php require "../bootstrap/bootstap_temp.php"; ?>
     <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <form action="/action_page.php" style="border:1px solid #ccc">
      <div class="container">
        <div>
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
        </div>
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
        </div>
        <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
        </div>
        <div class="form-group">
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
        </div>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>

</body>
</html>
