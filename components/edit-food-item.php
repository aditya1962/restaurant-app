<form method="post" action=<?php basename($_SERVER['SCRIPT_FILENAME']) ?>>
  <div class="card" style="margin:4% 0%;">
    <div class="card-body">
      <h3 id="edit-item">Edit Item</h3>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Category</label>
        </div>
        <div class="input-div">
          <?php
            include_once("../logic/populate-item.php");
            $populate = new PopulateItem();
          ?>
          <select name="category" id="edit-category" class="form-control" onchange="request_subcategories();">
            <?php
              $categories = $populate->populate_categories();
              for ($i=0; $i < sizeof($categories); $i++) 
              { 
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
          <select name="subcategory" id="edit-subcategory" class="form-control">
          </select>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Name</label>
        </div>
        <div class="input-div">
          <input type="text" id="name" name="itemname" placeholder="Enter Item Name"
          class="form-control"/>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Price</label>
        </div>
        <div class="input-div">
          <input type="text" id="price" name="itemprice" placeholder="Enter Item Price"
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
          <input type="text" id="discount" name="itemdiscount" placeholder="Enter Item Discount"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="preview center">
          <button class="btn btn-primary " name="preview">Preview</button>
        </div>
        <div class="add-food-items center">
          <button class="btn btn-primary" name="update-item">Update Item</button>
        </div>
      </div>
    </div>
  </div>

</form>
