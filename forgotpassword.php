<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("includes/scripts.php"); ?>
    <title>Forgot Password</title>
  </head>
  <body>
    <?php include_once("includes/noscript.php"); ?>
    <div class="div-center">
      <img src="#" alt="logo" />
      <div class="login-dialog card">
        <div class="card-body">
          <h3 class="login-heading">Forgot Password</h3>
          <?php
            if(isset($_POST["reset"]))
            {
              //Get values POST from form
              $username = trim($_POST["username"]);
              $password = trim($_POST["password"]);
              $confirmpassword = trim($_POST["passwordConfirm"]);

              if(empty($username)) //check whether username is empty
              {
                echo "Username cannot be blank <br />";
              }
              if(empty($password)) //check whether password is empty
              {
                echo "Password cannot be blank <br />";
              }
              if(empty($confirmpassword)) //check whether confirm password is empty
              {
                echo "Confirm Password cannot be blank";
              }
              if(!(empty($username))||!(empty($password))|| !(empty($confirmpassword)))
              {
                //posted values are not empty
                if($password!==$confirmpassword) //password is not equal to confirm password
                {
                  echo "Password and Confirm Passwords are not equal";
                }
                else {
                  //check whether username is available and update password
                  //create object of PasswordConfirm from logic/
                  include_once("logic/password-confirm.php");
                  $password_reset = new PasswordConfirm();
                  $password_reset->reset($username,$password);
                }
              }
            }

          ?>
            <form method="post" action="forgotpassword.php">
              <div class="form-components">
                <div class="label-div">
                  <label> Username </label>
                </div>
                <div class="input-div">
                  <input type="text" class="form-control" placeholder="Enter username" name="username" />
                </div>
              </div>
              <div class="form-components">
                <div class="label-div">
                  <label> Password </label>
                </div>
                <div class="input-div">
                  <input type="password" class="form-control" placeholder="Enter password" name="password" />
                </div>
              </div>
              <div class="form-components">
                <div class="label-div">
                  <label>Confirm Password </label>
                </div>
                <div class="input-div">
                  <input type="password" class="form-control" placeholder="Confirm password" name="passwordConfirm" />
                </div>
              </div>
              <input type="submit" class="btn btn-primary" name="reset" value="Change Password" />
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
