<form method="get" action=<?php echo basename($_SERVER['SCRIPT_FILENAME'])?>>
  <div class="flex-row">
    <!--Search Filter -->
      <div class="col-md-5 col-lg-5">
        <input type="text" class="form-control" name="search" placeholder="Search" />
      </div>
      <!--Filter by category -->
      <div class="col-md-3 col-lg-3">
        <?php include_once("../logic/populate-item.php");
        //create object of PopulateItem
          $populate_item = new PopulateItem();
          //return value array
          $categories = $populate_item->populate_categories();
         ?>
        <select class="form-control" name="category" id="category" onchange="request_subcategories()">
          <?php
            for ($i=0; $i < sizeof($categories); $i++) {
              echo "<option value=".$categories[$i].">".$categories[$i]."</option>";
            }
          ?>
        </select>
      </div>
      <!-- Filter by subcategory -->
      <div class="col-md-3 col-lg-3">
        <select class="form-control" name="subcategory" id="sub_category" >
        </select>
      </div>
      <button class="btn btn-default submit"><img src="#" alt="search" /></button>
  </div>
</form>
<?php
  if(isset($_GET["search"]))
  {
    $search = $_GET["search"];
    $category = $_GET["category"];
    $subcategory = $_GET["subcategory"];
    include_once("../logic/dbConnect.php");
      $dbConnect = new DBConnect();
       $link = $dbConnect->databaseConnect();
       //create query
       $query = "";
       if(empty($search))
       {
          $query = "SELECT item_id,name,price,image_path,discount,rating FROM item WHERE available = 1 AND 
       category=? AND subcategory=?";
       }
       else
       {
        $query = "SELECT item_id,name,price,image_path,discount,rating FROM item WHERE available = 1 AND 
       category=? AND subcategory=? AND name LIKE "."\"%".$search."%\"";
     }       
       //bind parameters using prepared statement
       $stmt = $link->prepare($query);
       $stmt->bind_param("ss",$category,$subcategory);
       //execute query
       $stmt->execute();
       //bind results
       $stmt->bind_result($item_id,$name,$price,$image_path,$discount,$rating);
       $stmt->store_result();
       if($stmt->fetch())
       {
        echo "<h5> Your search : ";
        if(!empty($search))
        {
          echo "Item - ".$search;
        }
        echo " Category - ".$category." Subcategory - ".$subcategory." </h5><br />";
        echo "<h5>Returned ". $stmt->num_rows. " results </h5>";
       }
       else
       {
        echo "<h5> No items matched found for Category - ".$category. " and Subcategory - ".$subcategory. "</h5>";
       }
       //return result set
       while($stmt->fetch())
       {
         include("../components/edit-food-filtered.php");
       }
       echo "<hr>";
       //close db connection
       $link->close();
       
  }
?>
