<div class="card">
    <div class="card-body">
      <div class="flex-row item">
          <div class="col-md-2 col-lg-2">
            <img src=<?php echo str_replace('\\', '/', $image_path); ?> alt="item" style="width:200px; height:150px;" />
          </div>
          <div class="col-md-7 col-lg-7" style="padding:0% 0% 0% 8%;">
              <label style="display:block;"><?php echo $name; ?></label>
              <label style="display:block;">Price: <?php echo $price; ?></label>
              <div class="flex-row">
                <a href="#edit-item">
                  <button name="edit" id=<?php echo "product-".$item_id; ?> class="btn btn-default" onclick="getValues(this.id)">
                    <img src="#" alt="edit" />
                  </button>
                  <input type="hidden" name="edit-hidden" value=<?php echo $item_id; ?>>
               </a>
                  <button name=<?php echo "product-".$item_id; ?> class="btn btn-default" id=<?php echo "delete-".$item_id; ?> onclick="deleteItem(this.id)">
                    <img src="#" alt="delete" />
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
          </div>
      </div>
    </div>
</div>
