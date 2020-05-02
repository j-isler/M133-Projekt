<?php
 
  include_once("header.php");

echo'
<body>
    <div id="registration" class="container">
        <form action="../authentication/register.php" method="POST" id="formregistration" style="margin-left: 22%; margin-right: 22%;">
          <div class="container">
            <div>
                <h1>SignUp</h1>
                <hr>
            </div>
            <div class="form-group">
                <label for="firstname"><b>Firstname</b></label>
                <input type="text" class="form-control" placeholder="Enter Firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname"><b>Lastname</b></label>
                <input type="text" class="form-control" placeholder="Enter Lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="username"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email"><b>Email address</b></label>
                <input type="text" class="form-control" placeholder="Enter Email address" name="email" required>
            </div>
            <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password_1" required>
            </div>
            <div class="form-group">
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" class="form-control" placeholder="Repeat Password" name="password_2" required>
            </div>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
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

            <div class="clearfix">
              <a href="login.php"><button type="button" class="btn btn-primary">Cancel</button></a>
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
          </div>
        </form>
    </div>
</body>
</html>
';
?>