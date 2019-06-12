<?php
  session_start();
  if(!isset($_SESSION["valid"]))
  {
    header("Location:register.php?viewcard=logininformation");
  }
  if(isset($_POST["register"]))
  {
    //Get values from POST
    $fullname = trim($_POST["fullname"]);
    $address = trim($_POST["address"]);
    $sex = "";
    if(isset($_POST["sex"]))
    {
      $sex = $_POST["sex"];
    }
    $phone = trim($_POST["phone"]);
    $age = $_POST["age"];
    $values = array($fullname,$address,$sex,$phone,$age); //insert values to an array for easy trnasfer
    ?>
    <div class="errors">
      <?php validation_second($values); ?>
    </div>
    <?php
  }
  if(isset($_GET["register"])&& $_GET["register"]==="true")
  {
    ?>
    <div class="register-success">
      <?php echo "Registration successfull"; ?>
    </div>
    <?php
  }
  function validation_second($arr)
  {
    include_once("logic/register.php"); //include register.php file from logic/ to validate logic
    $register = new RegisterLogic(); //create an object of the class
    $form_fields = array("Full name","Address", "Sex", "Phone", "Age"); //create form field array to be validated
    $blank_values = $register->is_blanks($arr,$form_fields); //check for blank values
    if(!$blank_values) //if there are no blank values
    {
      $register_success = register($arr); //proceed to register
      if($register_success)
      {
        header("Location:".$_SERVER["REQUEST_URI"]."&register=true");
      }
    }
  }

  function register($arr)
  {
    //create array to store all values to be passed to the function
    $values = array();
    //use session values passed from logicinformation page and iterate over to push to array
    for($i=0;$i<sizeof($_SESSION["values"]);$i++)
    {
      array_push($values,$_SESSION["values"][$i]);
    }
    //push values from current page to array
    for($i=0; $i<sizeof($arr);$i++)
    {
      array_push($values,$arr[$i]);
    }
    include_once("logic/register_control.php"); //include register_control.php from logic/
    $register_user = new RegisterControl(); //create new RegisterControl class object
    //pass data to register function to be saved to database
    $register_user->register($values);
  }
 ?>

<form method="post" action="register.php?viewcard=personalinformation">
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
  <div class="div-center">
    <input type="submit" class="btn btn-primary" name="register" value="Register" />
  </div>
</form>
