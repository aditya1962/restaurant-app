<?php
include_once("../logic/dbConnect.php");
//Session created for testing purposes only
session_start();
$_SESSION["username"] = "";
$dbConnect = new DBConnect();
$link = $dbConnect->databaseConnect();
$query = "SELECT saved_item.item_id, item.image_path,item.name,item.price FROM `saved_item`
 INNER JOIN `item` ON `saved_item`.`item_id`= `item`.`item_id` WHERE saved_item.username=?";
$stmt = $link->prepare($query);
$username = $_SESSION["username"];
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->bind_result($item_id,$image_path,$name,$price);
?>
<div class="row">
<?php
while($stmt->fetch())
{
?>


<div id = <?php echo "component-".$item_id; ?> class="col-md-4 col-lg-4">
  <div class="card">
    <div class="card-body">
      <img src=<?php $image_path; ?> alt="item" />
      <br />
      <label><?php $name; ?></label>
      <br />
      <label><?php $price; ?></label>
      <br />
      <div class="remove-saved-item">
        <button id=<?php echo "item-".$item_id; ?> name="remove-item" class="btn btn-primary" onclick = "remove_saved(this.id)">Remove Item</button>
      </div>
    </div>
  </div>
</div>

<?php
}
$link->close();
?>
</div>

