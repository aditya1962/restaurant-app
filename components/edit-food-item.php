<form method="post" action=<?php basename($_SERVER['SCRIPT_FILENAME']) ?>>
  <div class="card" style="margin:4% 0%;">
    <div class="card-body">
      <h3>Edit Item</h3>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Category</label>
        </div>
        <div class="input-div">
          <select name="category" class="form-control">
            <option value="" selected disabled hidden> By Category </option>
            <option value="food"> Food </option>
          </select>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Subcategory</label>
        </div>
        <div class="input-div">
          <select name="category" class="form-control">
            <option value="" selected disabled hidden> By Subcategory </option>
            <option value="food"> Food </option>
          </select>
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
          <button class="btn btn-primary" name="update-item">Update Item</button>
        </div>
      </div>
    </div>
  </div>

</form>
