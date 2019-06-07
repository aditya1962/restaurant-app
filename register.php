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
    </div>
      <div class="login-dialog card">
        <div class="card-body">
          <h3 class="login-heading" style="text-align:center;">Register</h3>
          <?php if ($_GET["viewcard"]==="logininformation") {
            include_once("components/login-information.php");
          }
          else{
            include_once("components/personal-information.php");
        } ?>
        </div>
      </div>
    </div>
  </body>
</html>
