<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("includes/head.php"); ?>
    <title>Forgot Password</title>
  </head>
  <body>
    <?php include_once("includes/noscript.php"); ?>
    <div class="div-center">
      <img src="#" alt="logo" />
      <div class="login-dialog card">
        <div class="card-body">
          <h3 class="login-heading">Forgot Password</h3>
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
