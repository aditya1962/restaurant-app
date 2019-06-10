<?php
  include_once("dbConnect.php");
  class PasswordConfirm
  {
    function verify_username($username)
    {
      //create database object and create connection
      $dbConnect = new DBConnect();
      $link = $dbConnect->databaseConnect();
      //query to retrieve username
      $query = "SELECT * FROM login WHERE username=?";
      //use prepared statement to bind parameters
      $stmt = $link->prepare($query);
      $stmt->bind_param("s",$username);
      //execute query
      $stmt->execute();
      //return execution and check whether results are available
      $user_available = false;
      while($stmt->fetch())
      {
        $user_available = true;
      }
      //close connection
      $link->close();
      return $user_available;
    }
    function reset($username,$password)
    {
      //check whether username exists
      $user = $this->verify_username($username);
      if(!$user)
      {
        ?>
        <div class="update-error">
          <?php echo "Username incorrect"; ?>
        </div>
        <?php
      }
      else {
        //update user's password
        //create database object and connection
        $dbConnect = new DBConnect();
        $link = $dbConnect->databaseConnect();
        //create query to update password
        $query = "UPDATE login SET password=? WHERE username=?";
        //use prepared statements to bind parameters
        $stmt = $link->prepare($query);
        $stmt->bind_param("ss",$password,$username);
        //execute the query
        $stmt->execute();
        if($stmt->execute())
        {
          ?>
          <div class="update-password">
            <?php echo "Password update successfully. Login to continue"; ?>
          </div>
          <?php
        }
        //close the connection
        $link->close();
      }
    }
  }

?>
