<form method="post" action=<?php basename($_SERVER['SCRIPT_FILENAME']) ?>>
  <div class="card">
    <div class="card-body">
      <div class="flex-row">
        <div class="label-div">
          <label>Item Category</label>
        </div>
        <div class="input-div">
          <?php include_once("../logic/populate-item.php");
          //create object of PopulateItem
            $populate_item = new PopulateItem();
            //return value array
            $categories = $populate_item->populate_categories();
           ?>
          <select name="category" id="category" class="form-control"
          onchange="request_subcategories()">
            <?php
              for ($i=0; $i < sizeof($categories); $i++) {
                echo "<option value=".$categories[$i].">".$categories[$i]."</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Subcategory</label>
        </div>

        <div class="input-div">
          <select name="sub_category" id="sub_category" class="form-control">

          </select>
          <div id="suggestion"> </div>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Name</label>
        </div>
        <div class="input-div">
          <input type="text" name="itemname" placeholder="Enter Item Name"
          class="form-control"/>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Price</label>
        </div>
        <div class="input-div">
          <input type="text" name="itemprice" placeholder="Enter Item Price"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Image</label>
        </div>
        <div class="input-div">
          <input type="file" name="imagefile" class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Discount</label>
        </div>
        <div class="input-div">
          <input type="text" name="itemprice" placeholder="Enter Item Price"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="preview center">
          <button class="btn btn-primary " name="preview">Preview</button>
        </div>
        <div class="add-food-items center">
          <button class="btn btn-primary" name="add-item">Add Item</button>
        </div>
      </div>
    </div>
  </div>

</form>
