<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("includes/head.php"); ?>
    <title>Login</title>
  </head>
  <body>
    <?php include_once("includes/noscript.php"); ?>
    <div class="div-center">
      <img src="#" alt="logo" />
      <div class="login-dialog card">
        <div class="card-body">
          <h3 class="login-heading">Login</h3>
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
