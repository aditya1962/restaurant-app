<form method="get" action=<?php echo basename($_SERVER['SCRIPT_FILENAME'])?>>
  <div class="flex-row">
    <!--Search Filter -->
      <div class="col-md-6 col-lg-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Search" />
          <div class="input-group-append">
            <button class="btn btn-default submit" name="submit"><img src="#" alt="search" /></button></span>
          </div>
        </div>
      </div>
      <!--Filter by category -->
      <div class="col-md-3 col-lg-3">
        <select class="form-control" name="category">
          <option value="" selected disabled hidden> By Category </option>
          <option value="food"> Food </option>
        </select>
      </div>
      <!-- Filter by subcategory -->
      <div class="col-md-3 col-lg-3">
        <select class="form-control" name="subcategory">
          <option value="" selected disabled hidden> By Subcategory </option>
          <option value="food"> Food </option>
        </select>
      </div>
  </div>
</form>
