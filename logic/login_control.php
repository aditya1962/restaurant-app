<?php
class LoginControl
{
  private $username="";

  function setUsername($username)
  {
    $this->username = $username;
    //set session variable
    if(!isset($_SESSION)) //if session does not exist
    {
      session_start(); //start session
      $_SESSION["username"] = $username; //set username as current session username
    }
    else {
      session_destroy(); //destroy current session
      session_start(); //start session
      $_SESSION["username"] = $username; //set username as current session username
    }
  }

  function getUsername()
  {
    return $this->username;
  }

  function verify($username,$password)
  {
    include_once("dbConnect.php"); //include database connection
    $db_connect = new DBConnect(); //create object of DBConnect class
    $link = $db_connect->databaseConnect(); //call databaseConnect method
    //create verify variable to determine whether username and password is found
    $verify = false;
    $query = "SELECT password FROM login WHERE username=?"; //create query statement
    $stmt = $link->prepare($query); //using prepared statement bind username to query
    $stmt->bind_param("s",$username);
    $stmt->execute(); //execute query to determine whether any data is returned
    $stmt->bind_result($password_database);
    while($stmt->fetch())
    {
      if(password_verify($password,$password_database)) //verify that unhashed and hashed passwords are equal
      {
        $verify = true;//username and password exists
        $this->setUsername($username);//set username for current user
      }
    }
    $link->close(); //close the db connection
    return $verify;
  }
  function activated($username)
  {
    include_once("dbConnect.php"); //include database connection
    $db_connect = new DBConnect(); //create object of DBConnect class
    $link = $db_connect->databaseConnect(); //call databaseConnect method
    //create active variable to determine whether user is active
    $active = false;
    $query = "SELECT activated FROM login WHERE username=?"; //create query statement
    $stmt = $link->prepare($query); //using prepared statement bind username to query
    $stmt->bind_param("s",$username);
    $stmt->execute(); //execute query to determine whether any data is returned
    $stmt->bind_result($activated);
    while($stmt->fetch())
    {
      if($activated === 1) //verify that the user is active
      {
        $active = true;//user account activated
      }
      else {
        ?>
        <div class="login-error">
          <?php echo "User account not activated"; ?>
        </div>
        <?php
      }
    }
    $link->close(); //close the db connection
    return $active;
  }
  function get_login_count($username)
  {
    include_once("dbConnect.php"); //include database connection
    $db_connect = new DBConnect(); //create object of DBConnect class
    $link = $db_connect->databaseConnect(); //call databaseConnect method
    //create active variable to determine whether user is active
    $active = false;
    //get current login count
    $query = "SELECT login_count FROM login WHERE username=? "; //create query statement
    $stmt = $link->prepare($query); //using prepared statement bind username to query
    $stmt->bind_param("s",$username);
    $stmt->execute(); //execute query to determine whether any data is returned
    $stmt->bind_result($login_count);
    $count = 0;
    while($stmt->fetch())
    {
      $count = $login_count; //set count to current login count
    }
    $link->close(); //close the db connection
    return $count;
  }
  function last_login_time($username)
  {
    include_once("dbConnect.php"); //include database connection
    $db_connect = new DBConnect(); //create object of DBConnect class
    $link = $db_connect->databaseConnect(); //call databaseConnect method
    //get current date and time
    $login_time = date('Y-m-d H:i:s');
    $query = "UPDATE login SET login_time=? WHERE username=?"; //create query statement
    $stmt = $link->prepare($query); //using prepared statement bind username to query
    $stmt->bind_param("ss",$login_time,$username);
    $stmt->execute(); //execute query to update count
    $link->close(); //close the db connection
  }
  function login_count($username)
  {
    include_once("dbConnect.php"); //include database connection
    $db_connect = new DBConnect(); //create object of DBConnect class
    $link = $db_connect->databaseConnect(); //call databaseConnect method
    //get current login count and increment by 1
    $login_count = $this->get_login_count($username)+1;
    $query = "UPDATE login SET login_count=? WHERE username=?"; //create query statement
    $stmt = $link->prepare($query); //using prepared statement bind username to query
    $stmt->bind_param("is",$login_count,$username);
    $stmt->execute(); //execute query to update count
    $link->close(); //close the db connection
  }
  function redirect_user($username)
  {
    //detect whether user account is activated
    $activated = $this->activated($username);
    if($activated)
    {
      //increase login count
      $this->login_count($username);
      //update login time
      $this->last_login_time($username);
      //get role of user
      //include Authorize class
      include_once("authorize.php");
      //create object of Authorize
      $authorize = new Authorize();
      $authorize->authorize_user($username);
      $role = $authorize->home_page();
      header("Location:".$role);
    }

  }
}

?>
