<?php
class RegisterControl
{
  function verify_username($username)
  {
    $exists = false; //initialize exists to false
    include_once("dbConnect.php"); //create database connection
    //retreive user data from login table corresponding to username
    $query = "SELECT * FROM login WHERE username=?";
    //using prepared statement bind username to query
    $stmt = $link->prepare($query);
    $stmt->bind_param("s",$username);
    //execute query to determine whether any data is returned
    if($link->query($query))
    {
      $exists = true; //if returned, set exists to true
    }
    //close db connection
    $link->close();
    return $exists;
  }
}

?>
