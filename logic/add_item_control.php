<?php
include_once("../logic/dbConnect.php");
class AddItemControl
{
  function verify($name)
  {
    //create connection object
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT * FROM item WHERE name=?";
    //bind parameters in prepared statement
    $stmt = $link->prepare($query);
    $stmt->bind_param("s",$name);
    //execute query
    $stmt->execute();
    //get returned results and check whether results available
    $exists = false;
    while($stmt->fetch())
    {
      $exists = true;
    }
    if($exists)
    {
      ?>
      <div class="add-item-error">
        <?php echo "Item already exists"; ?>
      </div>
      <?php
    }
    //close db connection
    $link->close();
    return $exists;
  }
  function get_category_id($sub_category)
  {
    //create connection object
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT category_id FROM item_category WHERE sub_category=?";
    //bind parameters using prepared statement
    $stmt = $link->prepare($query);
    $stmt->bind_param("s",$sub_category);
    //execute the query
    $stmt->execute();
    //bind results on return
    $stmt->bind_result($category_id);
    $id = 0;
    while($stmt->fetch())
    {
      $id = $category_id;
    }
    $link->close();
    return $id;
  }
  function add_promotion($sub_category)
  {
    //create connection object
    $dbConnect = new DBConnect();
    $link=$dbConnect->databaseConnect();
    //create query
    $query = "INSERT INTO item_promotion (item_promotion_id,item_id) VALUES(?,?)";
    //bind parameters using prepared statement
    $stmt = $link->prepare($query);
    $item_promotion_id="0";
    $item_id=$this->get_item_id($sub_category);
    $stmt->bind_param("si",$item_promotion_id,$item_id);
    //execute query
    $stmt->execute();
    $link->close();
  }
  function verify_item()
  {
    //create connection object
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT * FROM item";
    $stmt = $link->prepare($query);
    //execute query
    $stmt->execute();
    //get returned results and check whether results available
    $exists = false;
    while($stmt->fetch())
    {
      $exists = true;
    }
    $link->close();
    return $exists;
  }
  function get_item_id()
  {
    //create connection object
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT item_id FROM item ORDER BY item_id DESC";
    //bind parameters in prepared statement
    $stmt = $link->prepare($query);
    //execute query
    $stmt->execute();
    $stmt->bind_result($item_id);
    //get returned results and check whether results available
    $id = 0;
    while($stmt->fetch())
    {
      $id = $item_id+1;
      break;
    }
    $link->close();
    return $id;
  }
  function add_item($values)
  {
      //add promotion to item_promotion table because item_promotion contains foreign key of item table
      $this->add_promotion($values[1]);
      $category_id = $this->get_category_id($values[1]);  //get category id
      $date_added = date('Y-m-d H:i:s'); //get current date and time as added date
      //create db connection
      $db = new DBConnect();
      $link = $db->databaseConnect();
      //create query
      $query = "INSERT INTO item VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      //bind parameters using prepared statement
      $stmt = $link->prepare($query);
      $item_id = 0;
      //find whether items exist in item table
      $exists = $this->verify_item();
      if($exists)
      {
        $item_id = $this->get_item_id();
      }
      else
      {
        $item_id = 1;
      }
      $rating = 0;
      $available = 1;
      $number_of_orders = 0;
      $stmt->bind_param("isssdsiisiii",$item_id,$values[0],$values[1],$values[2],$values[3],$values[4],
      $values[5], $rating,$date_added,$available,$number_of_orders,$category_id);
      //execute the query
      $stmt->execute();
      if($stmt->affected_rows>0)
      {
        //data inserted, display item added message
        ?>
        <div class="item-added">
          <?php echo "Item added successfully"; ?>
        </div>
        <?php
      }
      $link->close();
  }
}

?>
