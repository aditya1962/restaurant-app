<?php
include_once("../logic/dbConnect.php");
//session created for testing purposes only
session_start();
$_SESSION["username"] = "";
$dbConnect = new DBConnect();
$link = $dbConnect -> databaseConnect();
$query = "SELECT user_cart.item_id,item.image_path,item.name,item.price, user_cart.date_added,user_cart.quantity
FROM user_cart INNER JOIN item ON user_cart.item_id = item.item_id WHERE user_cart.username=?";
$stmt = $link->prepare($query);
$username = $_SESSION["username"];
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->bind_result($item_id,$image_path,$name,$price,$date_added,$quantity);
while($stmt->fetch())
{
?>

<div id = <?php echo "component-".$item-id; ?> class="card cart-item">
  <div class="card-body">
    <div class="flex-row">
      <div class="cart-image">
        <img src=<?php echo image_path; ?> alt-"cart-item" />
      </div>
      <div class="item-info">
        <label><?php echo $name; ?></label>
        <br/>
        <label><?php echo $price; ?></label>
        <br/>
        <label>Date added: <?php echo $date_added; ?></label>
        <br/>
       <div class="flex-row" style="margin:0% 2%">
        <label>Quantity:</label>
                <button id = <?php echo "quantity-reduce-".$item_id; ?> class="btn btn-primary" onclick="reduce(this.id)">-</button>
                <button id=<?php echo "quantity-".$item_id; ?> class="btn btn-primary quantity"><?php echo $quantity; ?></button>
                <button id=<?php echo "quantity-add-".$item_id; ?> class="btn btn-primary" onclick ="add(this.id)">+</button>
              </div>
      </br/>
      </div>
      <div class="control-elements cart-item-right">
          <button class="btn btn-primary" name="checkout">Checkout</button>
        <div class="flex-row">
          <button id=<?php echo "item-".$item_id; ?> class="btn btn-default" name="delete" onclick=delete_item(this.id)><img src="#" alt="delete" /></button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
$link->close();
?>
