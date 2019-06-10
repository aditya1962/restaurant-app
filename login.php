<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("includes/scripts.php"); ?>
    <title>Login</title>
  </head>
  <body>
    <?php include_once("includes/noscript.php"); ?>
    <div class="div-center">
      <img src="#" alt="logo" />
      <div class="login-dialog card">
        <div class="card-body">
          <h3 class="login-heading">Login</h3>
          <?php
          if(isset($_GET["user"]) && $_GET["user"]==="false")
          {
            ?>
            <div class="login-error">
              <?php echo "Not logged in. Log in to continue."; ?>
            </div>
            <?php
          }
          if(isset($_POST['login']))
          {
            //Get values submitted from POST
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            if(empty($username))
            {
              ?>
              <div class="login-error">
                <?php echo "Username cannot be blank";?>
              </div>
              <?php
            }
            if(empty($password))
            {
              ?>
              <div class="login-error">
                <?php echo "Password cannot be blank"; ?>
              </div>
              <?php
            }
            if(!(empty($username))&& !(empty($password)))
            {
              user_login_control($username,$password);
            }
          }
          function user_login_control($username,$password)
          {
            //determine whether username and password match
            //include LoginControl from logic/
            include_once("logic/login_control.php");
            //create object of LoginControl from logic/
            $login_ctrl = new LoginControl();
            //call verify method to verify username and password
            $verified = $login_ctrl->verify($username,$password);
            if(!($verified))
            {
              ?>
              <div class="login-error">
                <?php echo "Username/Password incorrect"; ?>
              </div>
              <?php
            }
            else {
              //find authorization and navigate to home page
              $login_ctrl->redirect_user($username);
            }
          }
          ?>
            <form method="post" action="login.php">
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
              <input type="submit" class="btn btn-primary" name="login" value="Login" />
            </form>
            <div class="form-components">
              <a class="forgotpassword" href="forgotpassword.php">Forgot Password?</a>
              <span class="register">
                <a href="register.php"><button class="btn btn-primary">Register</button></a>
              </span>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
