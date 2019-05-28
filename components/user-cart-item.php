<?php
  $value = 0;
 ?>

<div class="flex-row item">
  <div class="col-md-2 col-lg-2">
    <img src="#" alt="item" />
  </div>
  <div class="col-md-7 col-lg-7">
      <label style="display:block;">Name</label>
      <label style="display:block;">Price</label>
      <div class="flex-row">
        <button name="cart" class="btn btn-default">
          <img src="#" alt="cart" />
        </button>
        <button name="save" class="btn btn-default">
          <img src="#" alt="save" />
        </button>
      </div>
      </div>
  </div>
  <div class="col-md-3 col-lg-3">
    <div class="flex-row">
      <label>Rating</label>
      <?php include_once("rating.php");?>
    </div>
    <div class="flex-row">
      <label>Quantity</label>
      <div class="flex-row" style="margin:0% 2%">
        <button class="btn btn-primary quantity">-</button>
        <button class="btn btn-primary quantity"><?php echo $value ?></button>
        <button class="btn btn-primary quantity">+</button>
      </div>
    </div>
  </div>
</div>
