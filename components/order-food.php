<?php
  if(!$filtered)
  {
    include_once("../logic/dbConnect.php");
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    $query = "SELECT item_id,image_path,name,price,rating FROM item";
    $stmt=$link->prepare($query);
    $stmt->execute();
    $stmt->bind_result($item_id,$image_path,$name,$price,$rating);
    while($stmt->fetch())
    {
      include("order-food-filtered.php");
    }
}
?>
