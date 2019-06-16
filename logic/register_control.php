<?php
include_once("dbConnect.php"); 
class RegisterControl
{
  function verify_username($username)
  {
    $exists = false; //initialize exists to false
    include_once("dbConnect.php"); //create database connection
    //create object of class
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //retreive user data from login table corresponding to username
    $query = "SELECT * FROM login WHERE username=?";
    //using prepared statement bind username to query
    $stmt = $link->prepare($query);
    $stmt->bind_param("s",$username);
    //execute query to determine whether any data is returned
    $stmt->execute();
    while($stmt->fetch())
    {
      $exists = true;
    }
    //close db connection
    $link->close();
    return $exists;
  }
  function add_user_report_entry($username)
  {
    //create database connection
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "INSERT INTO user_report(username,number_of_logins,last_login,orders,feedbacks) 
    VALUES(?,?,?,?,?)";
    //bind parameters using prepared statement
    $stmt = $link->prepare();
    $number_of_logins = 0;
    $last_login = date("Y-m-d H:i:s",mktime(0,0,0,0,0,0));
    $orders = 0;
    $feedbacks = 0;
    $stmt->bind_param("sisii",$username,$number_of_logins,$last_login,$orders,$feedbacks);
    //execute query
    $stmt->execute();
    $link->close();
  }
  function register($values)
  {
    $email = $values[0];
    $username = $values[1];
    $password = password_hash($values[2],PASSWORD_DEFAULT); //hash the password to be stored to database
    $fullname = $values[4];
    $address = $values[5];
    $sex = $values[6];
    $phone = $values[7];
    $age = $values[8];

    //add user entry to user_report db table
    $this->add_user_report_entry($username);

    //first insert data to login table
    //columns (username,password,activated, role,login_time,login_count)
    //value of activated set to true (1), login_count set to 0 and login_time set to null
    $activated = 1;
    $role = "user";
    $login_time = date("Y-m-d H:i:s",mktime(0,0,0,0,0,0));
    $login_count = 0;

    //create object of class
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    $query_login = "INSERT INTO login VALUES(?,?,?,?,?,?)";
    //using prepared statement bind values to query
    $stmt_login = $link->prepare($query_login);
    $stmt_login->bind_param("ssissi",$username,$password,$activated,$role,$login_time,$login_count);
    //execute the statement
    $stmt_login->execute();
    $link->close();

    //second insert data to user table
    //columns (username,email,fullname,address,sex,age)

    $link_two = $dbConnect->databaseConnect();
    $query_user = "INSERT INTO user VALUES(?,?,?,?,?,?)";
    //using prepared statement bind values to query
    $stmt_user = $link_two->prepare($query_user);
    $stmt_user->bind_param("sssssi",$username,$email,$fullname,$address,$sex,$age);
    //exexcute the statement
    $stmt_user->execute();
    $register_success = false;
    if($stmt->affected_rows>0)
    {
      $register_success = true;
    }
    //close db connection
    $link_two->close();
    return $register_success;
  }

}

?>
