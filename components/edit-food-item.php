<form method="post" enctype="multipart/form-data" action=<?php basename($_SERVER['SCRIPT_FILENAME']) ?>>
  <div class="card" style="margin:4% 0%;">
    <div class="card-body">
      <h3 id="edit-item">Edit Item</h3>
      <?php
        if(isset($_POST["update-item"]))
        {
          $category = $_POST["category"];
          $subcategory = $_POST["subcategory"];
          $itemname = trim($_POST["itemname"]);
          $itemprice = trim($_POST["itemprice"]);
          $image = $_FILES["upload"]["name"];
          $itemdiscount = trim($_POST["itemdiscount"]);

          //add values to array to check blanks and number errors
          $values = array($category,$subcategory,$itemname,$itemprice,$image,$itemdiscount);
          $keys = array("Category","Subcategory","Item name","Item price","Image file","Item discount");
          //check values for blanks
          $blanks = is_blank($values,$keys);
          if($blanks)
          {
            //if there are no blank errors, check for number errors
            $num_errors = is_number($values);
            if($num_errors)
            {
              process($values);
            }
          }
        }
        function is_blank($arr,$keys)
        {
          $valid = true;
          for ($i=2; $i < sizeof($arr); $i++) { 
            if(empty($arr[$i]) && $i!==4)
            {
              ?>
              <div class="edit-item-error">
                <?php echo $keys[$i]. " cannot be blank"; ?>
              </div>
              <?php
              $valid = false;
            }
            else if(empty($arr[$i]) && $i===4)
            {
              ?>
              <div class="edit-item-error">
                <?php echo $keys[$i]. " not selected"; ?>
              </div>
            <?php
              $valid = false;
            }
          }
          return $valid;
        }
        function is_number($arr)
        {
          $valid = true;
          if(!(is_numeric($arr[3])))
          {
            ?>
            <div class="edit-item-error">
              <?php echo "Item price should be a number"; ?>
            </div>
            <?php
            $valid = false;
          }
          if(!(is_numeric($arr[5])))
          {
            ?>
            <div class="edit-item-error">
              <?php echo "Item discount should be a number"; ?>
            </div>
            <?php
            $valid = false;
          }
          return $valid;
        }
        function process($values)
        {
          //delete current image file
          include_once("../logic/edit_item_control.php");
          $edit_item = new EditItem();
            //move new image file to images/items
            try
            {
              $uploads_dir = "../images/items";
              $tmp_name = $_FILES["upload"]["tmp_name"];
              $file_name = basename($_FILES["upload"]["name"]);
              $file_path = "$uploads_dir/$file_name";
              $file_types = array("jpg","png","bmp","gif");

              if(!(in_array(pathinfo($file_path)["extension"],$file_types)))
              {
                ?>
                <div class="edit-item-error">
                  <?php echo "File type should be jpg/png/bmp/gif";?>
                </div>
                <?php
              }
              else if($_FILES["upload"]["size"]>5242880)
              {
                ?>
                <div class="edit-item-error">
                  <?php echo "File size should be less than 5 MB"; ?>
                </div>
                <?php
              }
              else
              {
                $file_move = move_uploaded_file($tmp_name, $file_path);
                if($file_move)
                {
                  //if file was uploaded to images/items, continue to update item in database
                  $edit_item->update_item($values,$file_path);
                }
                else
                {
                  ?>
                  <div class="edit-item-error">
                    <?php echo "Unable to upload file. Make sure file size is less than 5 MB"; ?>
                  </div>
                  <?php
                }
              }
            }
            catch(RuntimeException $e)
            {
              echo $e->getMessage();
            }
        }
      ?>
      
      <div class="flex-row">
        <div class="label-div">
          <label>Item Category</label>
        </div>
        <div class="input-div">
          <?php
            include_once("../logic/populate-item.php");
            $populate = new PopulateItem();
          ?>
          <select name="category" id="edit-category" class="form-control" onchange="subcategories();">
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
          <input type="text" id="itemname" name="itemname" placeholder="Enter Item Name"
          class="form-control"/>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Price</label>
        </div>
        <div class="input-div">
          <input type="text" id="itemprice" name="itemprice" placeholder="Enter Item Price"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Image</label>
        </div>
        <div class="input-div">
         <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
          <input type="file" name="upload" onchange="file(event)" class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Discount</label>
        </div>
        <div class="input-div">
          <input type="text" id="itemdiscount" name="itemdiscount" placeholder="Enter Item Discount"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="preview center">
          <button class="btn btn-primary " id="preview" name="preview">Preview</button>
        </div>
        <div class="add-food-items center">
          <button class="btn btn-primary" name="update-item">Update Item</button>
        </div>
      </div>
    </div>
  </div>

</form>
