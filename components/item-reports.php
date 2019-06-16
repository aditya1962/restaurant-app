<h3>Item Reports</h3>
<br /><br />
<table class="table table-striped">
  <tr>
    <th> Item Id </th>
    <th> No. of orders </th>
    <th> Rating </th>
  </tr>
  <?php
    include_once("../logic/dbConnect.php");
    //create database connection
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT item_id,number_of_orders,rating FROM item_report";
    //create parameterized query
    $stmt = $link->prepare($query);
    //execute query
    $stmt->execute();
    //bind results returned
    $stmt->bind_result($item_id,$number_of_orders,$rating);
    while($stmt->fetch())
    {
      echo "<tr>";
      echo "<td>".$item_id."</td>";
      echo "<td>".$number_of_orders."</td>";
      echo "<td>".$rating."</td>";
      echo "</tr>";
    }
    $link->close();
  ?>
</table>
