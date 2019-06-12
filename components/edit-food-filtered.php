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
              <button name="edit" class="btn btn-default">
                <img src="#" alt="edit" />
              </button>
              <button name="delete" class="btn btn-default">
                <img src="#" alt="delete" />
              </button>
            </div>
            </div>
        <div class="col-md-3 col-lg-3">
            <label>Discount: <?php echo $discount; ?></label>
            <br />
            <label>Rating: <?php echo $rating; ?></label>
            <br />
            <?php include_once("rating.php");?>
        </div>
    </div>
  </div>
</div>
