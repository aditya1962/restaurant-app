<form method="post" enctype="multipart/form-data" action=<?php basename($_SERVER['SCRIPT_FILENAME']); ?>>
  <div class="card">
    <div class="card-body">
      <?php
        if(isset($_POST["add-item"]))
        {
          //get data posted using POST
          $category = $_POST["category"];
          $sub_category = $_POST["sub_category"];
          $name = trim($_POST["itemname"]);
          $price =floatval(trim($_POST["itemprice"]));
          $file = $_FILES["imagefile"];
          $discount = intval(trim($_POST["itemdiscount"]));

          //check whether input values are blank
          $values = array($name,$price,$file,$discount);
          $keys = array("Item name","Item price","File", "Item Discount");
          $blanks = check_blanks($values,$keys);
          if($blanks===false)
          {
            $number = check_num($values,$keys);
            if(floatval($discount) > $price) //if discount is greater than price display error
            {
              ?>
              <div class="add-item-error">
                <?php echo "Discount should be less than the price"; ?>
              </div>
              <?php
            }
            if($number===false)
            {

              process($category,$sub_category,$values);
            }
          }
        }

        function process($category,$sub_category,$values)
        {
          //check whether item exists
          include_once("../logic/add_item_control.php");
          $verify = new AddItemControl();
          $exists = $verify->verify($values[0]);
          if(!$exists)
          {
            //move image file to directory images/items/
            try {
              $uploads_dir = "..\images\items";
              $tmp_name = $_FILES["imagefile"]["tmp_name"];
              $file_name = basename($_FILES["imagefile"]["name"]);
              $file_path = "$uploads_dir/$file_name";
              //check whether file is of valid type
              $file_types = array("jpg","png","gif","bmp");
              var_dump($_FILES["imagefile"]["error"]);
              if(!(in_array(pathinfo($file_path)['extension'],$file_types)))
              {
                ?>
                <div class="add-item-error">
                  <?php echo "File type should be jpg,png,gif,bmp"; ?>
                </div>
                <?php
              }
              //check whether file size > 5MB
              else if($_FILES["imagefile"]["size"]>5242880)
              {
                ?>
                <div class="add-item-error">
                  <?php echo "File size should be less than 5MB"; ?>
                </div>
                <?php
              }
              else
              {
                $file_move = move_uploaded_file($tmp_name,$file_path);
                //upload values to database
                $value_array = array($category,$sub_category,$values[0],$values[1],$file_path,$values[3]);
                //include AddItemControl object
                include_once("../logic/add_item_control.php");
                $add_item = new AddItemControl();
                if($file_move)
                {
                  $add_item->add_item($value_array);
                }
                else
                {
                  ?>
                  <div class="add-item-error">
                    <?php echo "Unable to upload file. Make sure file size is less than 5 MB"; ?>
                  </div>
                  <?php
                }
              }

            } catch (RuntimeException $e) {
              echo $e->getMessage();
            }
          }
        }

        function check_blanks($values,$keys)
        {
          $error = false;
          for ($i=0; $i < sizeof($values) ; $i++) {
            if(empty($values[$i]) && $i!==2)
            {
              ?>
              <div class="add-item-error">
                <?php echo $keys[$i]." cannot be blank"; ?>
              </div>
              <?php
              $error=true;
            }
            if(empty($values[$i]) && $i===2)
            {
              ?>
              <div class="add-item-error">
                <?php echo $keys[$i]." is not selected"; ?>
              </div>
              <?php
              $error=true;
            }
          }
          return $error;
        }

        function check_num($values,$keys)
        {
          $error = false;
          for ($i=0; $i < sizeof($values); $i++) {
            if($i%2===1 && is_nan($values[$i]))
            {
              ?>
              <div class="add-item-error">
                <?php echo $keys[$i]. " should be a number"; ?>
              </div>
              <?php
              $error=true;
            }
          }
          return $error;
        }
      ?>
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
          <input type="text" name="itemname" id="itemname" placeholder="Enter Item Name"
          class="form-control"/>
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Price</label>
        </div>
        <div class="input-div">
          <input type="text" name="itemprice" id="itemprice" placeholder="Enter Item Price"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Image</label>
        </div>
        <div class="input-div">
          <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
          <input type="file" name="imagefile" onchange="file(event)" class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Item Discount</label>
        </div>
        <div class="input-div">
          <input type="text" name="itemdiscount" id="itemdiscount" placeholder="Enter Item Discount"
          class="form-control" />
        </div>
      </div>
      <div class="flex-row">
        <div class="preview center">
          <button class="btn btn-primary " id="preview" name="preview">Preview</button>
        </div>
        <div class="add-food-items center">
          <button class="btn btn-primary" name="add-item">Add Item</button>
        </div>
      </div>
    </div>
  </div>

</form>
