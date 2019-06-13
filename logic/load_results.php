<?php
  include_once("dbConnect.php");
       $dbConnect = new DBConnect();
       $link = $dbConnect->databaseConnect();
       //create query
       $query = "SELECT item_id,name,price,image_path,discount,rating FROM item WHERE available = 1 AND name LIKE "."\"%".$search."%\"";
       //bind parameters using prepared statement
       $stmt = $link->prepare($query);
       //execute query
       $stmt->execute();
       //bind results
       $stmt->bind_result($item_id,$name,$price,$image_path,$discount,$rating);
       //return result set
       while($stmt->fetch())
       {
         include("../components/edit-food-filtered.php");
       }
       //close db connection
       $link->close();
?>
