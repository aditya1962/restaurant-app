<form method="get" action=<?php echo basename($_SERVER['SCRIPT_FILENAME'])?>>
  <div class="flex-row">
    <!--Search Filter -->
      <div class="col-md-6 col-lg-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Search" />
          <div class="input-group-append">
            <button class="btn btn-default submit"><img src="#" alt="search" /></button></span>
          </div>
        </div>
      </div>
      <!--Filter by category -->
      <div class="col-md-3 col-lg-3">
        <?php include_once("../logic/populate-item.php");
        //create object of PopulateItem
          $populate_item = new PopulateItem();
          //return value array
          $categories = $populate_item->populate_categories();
         ?>
        <select class="form-control" id="category" onchange="request_subcategories(this.id)">
          <?php
            for ($i=0; $i < sizeof($categories); $i++) {
              echo "<option value=".$categories[$i].">".$categories[$i]."</option>";
            }
          ?>
        </select>
      </div>
      <!-- Filter by subcategory -->
      <div class="col-md-3 col-lg-3">
        <select class="form-control" id="sub_category" >
        </select>
      </div>
  </div>
</form>
<?php
  if(isset($_GET["search"]))
  {
    $search = $_GET["search"];
    include_once("../logic/load_results.php");
  }
?>
