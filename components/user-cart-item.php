<?php
  include_once("../logic/dbConnect.php");
  $dbConnect = new DBConnect();
  $link = $dbConnect->databaseConnect();
  $query = "SELECT item_id,name,price,image_path,discount,rating FROM item";
  $stmt = $link->prepare($query);
  $stmt->execute();
  $stmt->bind_result($item_id,$name,$price,$image_path,$discount,$rating);
  while($stmt->fetch())
  {
?>

<div id=<?php echo "component-".$item_id; ?> class="card">
    <div class="card-body">
      <div class="flex-row item">
          <div class="col-md-3 col-lg-3">
            <img src=<?php echo str_replace('\\', '/', $image_path); ?> alt="item" style="width:200px; height:150px;" />
          </div>
          <div class="col-md-6 col-lg-6" style="padding:0% 0% 0% 8%;">
              <label style="display:block;"><?php echo $name; ?></label>
              <label style="display:block;">Price: $ <?php echo $price; ?></label>
              <div class="flex-row">
                  <button name=<?php echo "cart-".$item_id; ?> id=<?php echo "cart-".$item_id; ?> class="btn btn-primary" onclick="addToCart(this.id)">
                    <img src="#" alt="cart" />
                  </button>
                  <button name=<?php echo "save-".$item_id; ?> class="btn btn-primary" id=<?php echo "save-".$item_id; ?> onclick="save(this.id)">
                    <img src="#" alt="save" />
                  </button>
              </div>
              </div>
          <div class="col-md-3 col-lg-3">
             <?php
                      if($discount!==0)
                        {
                          ?>
                          <label>Discount:
                           <?php echo $discount; ?>
                         </label>
                         <?php
                       } ?>
                      <br />
                      <label>Rating: <?php echo $rating; ?></label>
                      <br />
                      <?php include("rating.php");?>
          <div class="flex-row">
              <label>Quantity</label>
              <div class="flex-row" style="margin:0% 2%">
                <button id = <?php echo "quantity-reduce-".$item_id; ?> class="btn btn-primary" onclick="reduce(this.id)">-</button>
                <button id=<?php echo "quantity-".$item_id; ?> class="btn btn-primary quantity">0</button>
                <button id=<?php echo "quantity-add-".$item_id; ?> class="btn btn-primary" onclick ="add(this.id)">+</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
  }
  $link->close();
?>
