<?php
class DBConnect
{
  function databaseConnect()
  {
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database="restaurant";

    $link = new mysqli($db_host,$db_username,$db_password,$db_database);
    //check connection
    if(!(mysqli_connect_errno()))
    {
      echo "Connection succeeded";
      return $link;
    }
    else {
      echo "Error in db connection";
    }
  }
}
 ?>
