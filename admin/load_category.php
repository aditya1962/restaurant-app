<?php
  //include database connection
  include_once("../logic/dbConnect.php");
  $dbConnect = new DBConnect();
  $link = $dbConnect->databaseConnect();
  //create query
  $query = "SELECT sub_category FROM item_category WHERE category=?";
  //bind parameters using prepared statement
  $stmt = $link->prepare($query);
  if($_POST["category"]==="Main")
  {
    $category = "Main Course";
  }
  else
  {
    $category = $_POST["category"];
  }
  $stmt->bind_param("s",$category);
  //execute query
  $stmt->execute();
  //bind results
  $stmt->bind_result($sub_category);
  //return result set
  while($stmt->fetch())
  {
    echo "<option value=".$sub_category.">".$sub_category."</option>";
  }
  //close db connection
  $link->close();
?>
