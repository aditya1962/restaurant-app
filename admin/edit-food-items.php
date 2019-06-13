<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/admin-scripts.php"); ?>
    <title>Edit Food Items</title>
  </head>
  <body onload="request_subcategories()">
    <?php include_once("../includes/noscript.php"); ?>
    <?php include_once("../includes/user-header.php"); ?>
    <div class="user-body">
      <!--User body left section - Navigation -->
      <div class="navigation card">
        <?php include_once("../includes/admin-navigation.php"); ?>
      </div>
      <!--User body right section - Item Filter and Item Display -->
      <div class="document-body">
        <!--Section to display filters-->
        <?php include_once("../components/search-filters.php"); ?>
        <!--Section to edit an item -->
        <div class="flex-row edit-item">
          <div class="edit-food-items">
            <!--Section to edit food items -->
            <?php include_once("../components/edit-food-item.php"); ?>
          </div>
          <div class="preview">
            <!--Sections to preview the item to be updated -->
            <?php include_once("../components/preview.php"); ?>
          </div>
        </div>

      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
    <script type="text/javascript" src="../logic/categories.js"> </script>
    <script type="text/javascript" src="../js/edit-food-item.js"> </script>
  </body>
</html>
