<!-- Get Category -->
<?php
  include_once("../logic/dbConnect.php");
  $categories = get_categories();
  for ($i=0; $i < sizeof($categories); $i++)
  { 
    echo "<h3>".$categories[$i]. "</h3><br/>";
    $sub_categories = get_subcategories($categories[$i]);
    for($j = 0; $j < sizeof($sub_categories);$j++)
    {
      echo "<h4>".$sub_categories[$j]."</h4><br/>";
      display_items($sub_categories[$j]);
      echo "<br/>";
    }
  }

  function get_categories()
  {
    //create database connection
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT DISTINCT category FROM item_category";
    //execute query
    $stmt = $link->prepare($query);
    $stmt->execute();
    //bind results to returned set
    $stmt->bind_result($category);
    //create array and push results
    $categories = array();
    while($stmt->fetch())
    {
      array_push($categories, $category);
    }
    $link->close();
    return $categories;
  }

  function get_subcategories($category)
  {
    //create database connection
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT sub_category FROM item_category WHERE category = ?";
    //bind paremeters
    $stmt = $link->prepare($query);
    $stmt->bind_param("s",$category);
    //execute query
    $stmt->execute();
    //bind results to returned set
    $stmt->bind_result($subcategory);
    //create array and push results
    $subcategories = array();
    while($stmt->fetch())
    {
      array_push($subcategories, $subcategory);
    }
    $link->close();
    return $subcategories;
  }
  function display_items($subcategory)
  {
    //create database connection
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT name,price,image_path,discount,rating FROM item WHERE subcategory = ? AND available = ?";
    //bind paremeters
    $stmt = $link->prepare($query);
    $available = 1;
    $stmt->bind_param("si",$subcategory,$available);
    //execute query
    $stmt->execute();
    //bind results to returned set
    $stmt->bind_result($name,$price,$image_path,$discount,$rating);
    //create array and push results
    $subcategories = array();
    ?>
    <div class="row">
    <?php
    while($stmt->fetch())
    {
      ?>
      <div class="col-md-4 col-lg-4 view-item">
      <div class="card">
        <div class="card-body">
            <img src=<?php echo $image_path; ?> alt="item" style="width:150px; height:110px;"/>
            <br/>
            <label><?php echo $name; ?></label>
          <br />
          <div class="flex-row">
            <label>Price : $ <?php echo $price; ?></label>
            <br />
            <?php
              if($discount!==0)
                {
                  ?>
                  <label>Discount: <?php echo $discount; ?></label>
                  <?php
                }
            ?>            
          </div>
          <br />
          <div class="rating">
            <!-- Display item rating here -->
          </div>
        </div>
      </div>
    </div>
<?php
    }
    ?>
  </div>
  <?php
    $link->close();
  }
?>

