<?php
  if(isset($_POST["next"]))
  {
    //Get values using POST
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['passwordConfirm']);
    $values = array($email,$username,$password,$confirmpassword); //insert values to an array for easy transfer
    ?>
    <div class="errors">
      <?php validation($values); //validate fields and business logic ?>
    </div>
    <?php
  }
  function validation($values)
  {
    include_once("logic/register.php"); //include register.php file from logic/ to validate logic
    $register_logic = new RegisterLogic(); //create an object of the class
    $form_fields = array("Username","Password","Confirm Password"); //create form field array to be validated
    $blanks_valid = $register_logic->is_blanks($values,$form_fields);  //check for valid values
    $valid = $register_logic->validate_email($values[0]); //check for valid email
    $logicErrors = logic($values,$register_logic); //check for business logic
    if(empty($blanks_valid) && $valid && !($logicErrors)) //if all validations are correct
    {
      //verify that username does not exists
      $user = verify_username($values[1]);
      if(!$user) //if user does not exist, navigate to next page
      {
        session_start(); //start session
        $_SESSION["values"]= $values; //set values session attribute to be passed to next page
        $_SESSION["valid"] = true; //set valid session attribute to be passed to next page
        header("Location:register.php?viewcard=personalinformation"); //locate to next page using header
      }
      else { //display error message
        echo "Username not available. Try a different username";
      }
    }
  }

  function verify_username($username)
  {
    include_once("logic/register_control.php");
    $register_control = new RegisterControl();
    $verify=$register_control->verify_username($username);
    echo $verify;
    return $verify;
  }

  function logic($arr,$register_logic)
  {
    $form_fields = array("Username","Password","Confirm Password"); //create form field array to be validated
    $values = array($arr[1],$arr[2],$arr[3]); //create values array to be validated
    $errors=false; //variable to store if any errors exists
    $field_length = $register_logic->fieldLength($values,$form_fields); //check for lengths of values
    $capital_character = $register_logic->capitalCharacter($values,$form_fields); //check for capital characters
    $number = $register_logic->numericCharacter($values,$form_fields); //check for numbers of values
    $special_symbol = $register_logic->specialCharacter($values,$form_fields); //check for special characters
    $username_password = $register_logic->usernamePassword($values); //check whether username and password are same
    if(!empty($field_length) || !empty($capital_character) || !empty($number)
    || !empty($special_symbol) || !empty($username_password) )
    {
      $errors = true; //set errors to true if any of the arrays are not empty
    }
    return $errors;
  }

  function display_blanks_errors($arr)
  {
    $names = array("Email","Username","Password","Confirm Password");
    for ($i=0; $i < sizeof($names) ; $i++) {
      if(in_array($i,$arr))
      {
        echo "*".$names[$i]." cannot be empty <br />";
      }
    }
  }
?>

<form method="post" action="register.php?viewcard=logininformation">
  <div class="form-components">
    <div class="label-div">
      <label> Email </label>
    </div>
    <div class="input-div">
      <input id="email" type="email" class="form-control" placeholder="Enter email" name="email"
      required/>
      <br />
      <p id="emailvalidation"> </p>
    </div>
  </div>
  <div class="form-components">
    <div class="label-div">
      <label> Username </label>
    </div>
    <div class="input-div">
      <input id="username" type="text" class="form-control" placeholder="Enter username" name="username"
      required minlength=7/>
      <br />
      <p id="usernamevalidation"> </p>
    </div>
  </div>
  <div class="form-components">
    <div class="label-div">
      <label> Password </label>
    </div>
    <div class="input-div">
      <input id="password" type="password" class="form-control" placeholder="Enter password" name="password"
      required />
      <br />
      <p id="passwordvalidation"> </p>
    </div>
  </div>
  <div class="form-components">
    <div class="label-div">
      <label> Confirm Password </label>
    </div>
    <div class="input-div">
      <input id="confirmpassword" type="password" class="form-control" placeholder="Confirm Password" name="passwordConfirm"
      required/>
      <br />
      <p id="confirmpasswordvalidation"> </p>
    </div>
  </div>
  <div class="div-center">
    <input type="submit" class="btn btn-primary" name="next" value="Next" />
  </div>
</form>
<script src="js/register.js" type="text/javascript"></script>
