<div class="card" id=<?php echo "component-".$item_id; ?>>
  <div class="card-body">
<div class="flex-row item">
  <div class="col-md-3 col-lg-3">
    <img src=<?php echo str_replace('\\', '/', $image_path); ?> alt="item" style="width:200px; height:150px;"/>
  </div>
  <div class="col-md-6 col-lg-6">
      <label style="display:block;" id=<?php echo "name-".$item_id;?>><?php echo $name; ?></label>
      <label style="display:block;">$ <?php echo $price; ?></label>
      <div class="flex-row">
        <button name="add-to-orders" class="btn btn-primary" id=<?php echo "item-".$item_id; ?> onclick="add_order(this.id)"> Add to Orders </button>
        <a href="#view-orders"><button name="view-orders" class="btn btn-primary"> View Orders </button></a>
      </div>
  </div>
  <div class="col-md-3 col-lg-3">
    <div class="flex-row">
      <label>Rating</label>
      <?php include("rating.php");?>
    </div>
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