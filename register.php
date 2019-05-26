<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("includes/scripts.php");
    if(!isset($_GET["viewcard"]))
    {
      header("Location:register.php?viewcard=logininformation");
    }
    ?>
    <title>Register</title>
  </head>
  <body>
    <?php include_once("includes/noscript.php"); ?>
    <div class="div-center">
      <img src="#" alt="logo" />
      <div class="form-components register-toggle">
        <?php
        if($_GET["viewcard"]==="logininformation")
        {
          ?>
        <div id="logininformation">
          <a href="register.php?viewcard=logininformation"><button class="btn btn-primary">
            Login Information</button></a>
        </div>
        <div id="personalinformation">
          <a href="register.php?viewcard=personalinformation"><button class="btn btn-secondary">
            Personal Information</button></a>
        </div>
        <?php
          }
          if($_GET["viewcard"]==="personalinformation")
          {
         ?>
         <div id="logininformation">
           <a href="register.php?viewcard=logininformation"><button class="btn btn-secondary">
             Login Information</button></a>
         </div>
         <div id="personalinformation">
           <a href="register.php?viewcard=personalinformation"><button class="btn btn-primary">
             Personal Information</button></a>
         </div>
         <?php
        }
          ?>
      </div>
      <div class="login-dialog card">
        <div class="card-body">
          <h3 class="login-heading">Register</h3>
          <?php if ($_GET["viewcard"]==="logininformation") {
          ?>
            <form method="post" action="login.php">
              <div class="form-components">
                <div class="label-div">
                  <label> Email </label>
                </div>
                <div class="input-div">
                  <input type="email" class="form-control" placeholder="Enter email" name="email" />
                </div>
              </div>
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
                  <label> Confirm Password </label>
                </div>
                <div class="input-div">
                  <input type="password" class="form-control" placeholder="Confirm Password" name="passwordConfirm" />
                </div>
              </div>
              <input type="submit" class="btn btn-primary" name="next" value="Next" />
            </form>
            <?php
          }
          else{
          ?>
          <form method="post" action="login.php?viewcard=personalinformation">
            <div class="form-components">
              <div class="label-div">
                <label> Full Name </label>
              </div>
              <div class="input-div">
                <input type="text" class="form-control" placeholder="Enter full name" name="fullname" />
              </div>
            </div>
            <div class="form-components">
              <div class="label-div">
                <label> Address </label>
              </div>
              <div class="input-div">
                <input type="text" class="form-control" placeholder="Enter address" name="address" />
              </div>
            </div>
            <div class="form-components">
              <div class="label-div">
                <label> Sex </label>
              </div>
              <div class="input-div" style="text-align:left;">
                  <input type="radio" name="sex" value="male"/>Male
                  <input type="radio" name="sex" value="female" />Female
              </div>
            </div>
            <div class="form-components">
              <div class="label-div">
                <label> Phone </label>
              </div>
              <div class="input-div">
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone" />
              </div>
            </div>
            <div class="form-components">
              <div class="label-div">
                <label> Age </label>
              </div>
              <div class="input-div">
                <select class="form-control" name="age">
                  <option value="below15">Below 15</option>
                  <option value="15-25">15-25</option>
                  <option value="25-35">25-35</option>
                  <option value="35-45">35-45</option>
                  <option value="45-55">45-55</option>
                  <option value="55-65">55-65</option>
                  <option value="65over">65 & Above</option>
                </select>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" name="register" value="Register" />
          </form>
          <?php
        } ?>
        </div>
      </div>
    </div>
  </body>
</html>
