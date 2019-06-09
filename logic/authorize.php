<?php
class Authorize
{
  private $role="";

  function setRole($role)
  {
    $this->role = $role;
  }

  function getRole()
  {
    return $this->role;
  }

  //this function is still under construction
  function allowed_urls()
  {
    $user = array("user/view-food-items.php","user/add-to-cart.php","user/saved-items.php",
              "user/order-food.php","user/your-cart.php", "user/give-feedback.php");
    $admin = array("admin/add-food-items.php","admin/edit-food-items.php","admin/view-food-items.php",
              "admin/view-feedback.php","admin/generate-reports.php", "admin/maintain-staff.php");
    $moderator = array("moderator/send-remarks.php","moderator/view-orders.php",
                  "components/confirmmoderator.php");
  }

  function home_page()
  {
    $role = $this->getRole();
    $homepage = "";
    if($role==="user")
    {
      $homepage="user/view-food-items.php"; //if role is user, homepage = view-food-items
    }
    else if($role==="admin")
    {
      $homepage = "admin/view-food-items.php"; //if role is admin, homepage = view-food-items
    }
    else if($role==="moderator")
    {
      $homepage = "moderator/confirmmoderator.php"; //if role is moderator, homepage is confirm moderator
    }
    return $homepage;
  }

  function authorize_user($username)
  {
    //connect to database
    include_once("dbConnect.php");
    $db_connect = new DBConnect();
    $link=$db_connect->databaseConnect();
    $query = "SELECT role FROM login WHERE username=?"; //create query statement
    $stmt = $link->prepare($query); //using prepared statement bind username to query
    $stmt->bind_param("s",$username);
    $stmt->execute(); //execute query to determine whether any data is returned
    $stmt->bind_result($role);
    while($stmt->fetch())
    {
      $this->setRole($role);
    }
    $link->close();
  }
}

?>
