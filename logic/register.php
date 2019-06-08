<?php
class RegisterLogic
{
  //field should be at least 7 characters
  function fieldLength($values,$form_fields)
  {
    $errors = false; //variable to store if any errors exists
    for($i=0; $i<sizeof($values);$i++) //iterate through values array
    {
      if(strlen($values[$i])< 7) //check if length of value is less than 7
      {
        $errors = true;
        echo $form_fields[$i]." should be at least 7 characters <br />";
      }
    }
    return $errors;
  }
  //field should contain at least one capital letter
  function capitalCharacter($values,$form_fields)
  {
    $errors = false; //variable to store if any errors exists
    for($i=0; $i<sizeof($values);$i++) //iterate through values array
    {
      if(strtolower($values[$i])==$values[$i]) //check if when converted to lower equals original value
      {
        $errors = true;
        echo $form_fields[$i]." should be contain at least one capital letter <br />";
      }
    }
    return $errors;
  }
  //field should contain at least one number
  function numericCharacter($values,$form_fields)
  {
    $errors=false; //variable to store if any errors exists
    for($i = 0; $i<sizeof($values);$i++) //iterate through each value
    {
      $number = false; //initialize number to false
      for($j = 0; $j<strlen($values[$i]);$j++) //for each value, iterate through each character
      {
        if(is_numeric($values[$i][$j])) //if character is a number, set number to true
        {
          $number = true;
        }
      }
      if(!($number))//check for every value whether number is false
      {
        $errors = true;
        echo $form_fields[$i]." should contain a number <br />";
      }
    }
    return $errors;
  }
  //field should contain special characters
  function specialCharacter($values,$form_fields)
  {
    $errors = false; //variable to store if any errors exists
    //for all values check whether special characters are found
    for($i=0;$i<sizeof($values);$i++)
    {
      if(!(preg_match('/[@#&*]/',$values[$i])))
      {
        $errors = true ;
        echo $form_fields[$i]." should contain at least one special character(&,*,@,#) <br />";
      }
    }
    return $errors;
  }
  //function to check whether username is equal to passwordConfirm
  function usernamePassword($values)
  {
    $error = false; //variable to store if any errors exists
    if($values[0]===$values[1])
    {
      $error = true;
      echo "Password cannot be the same as username <br />";
    }
    return $error;
  }
  //function to check whether password and confirm password are the same
  function passwordConfirm($values)
  {
    $error = false; //variable to store if any errors exists
    if($values[1]!==$values[2])
    {
      $error = true;
      echo "Password and Confirm Password should be the same <br />";
    }
    return $error;
  }
  //function to validate emails
  function validate_email($email)
  {
    $valid = filter_var($email,FILTER_VALIDATE_EMAIL);
    if(!($valid))
    {
      echo "Invalid Email <br />";
    }
    return $valid;
  }
  //function to check blanks
  function is_blanks($arr,$form_fields)
  {
    $errors = false; //variable to store if any errors exists
    for ($i=0; $i < sizeof($arr) ; $i++) {
      if(empty($arr[$i]))
      {
        $errors = true;
        if($form_fields[$i]==="Sex"|| $form_fields[$i]==="Age")
        {
          echo $form_fields[$i]." is not selected <br />";
        }
        else {
          echo $form_fields[$i]." cannot be empty <br />";
        }
      }
    }
    return $errors;
  }
}
?>
