<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/admin-scripts.php"); ?>
    <title>Add Food Items</title>
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
      <div class="document-body add-item">
        <div class="flex-row">
          <div class="add-food-items">
            <!--Section to add food items -->
            <?php include_once("../components/add-food-item.php");?>
          </div>
          <div class="preview">
            <!--Sections to preview the item to be added -->
            <?php include_once("../components/preview.php"); ?>
          </div>
        </div>
      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
    <script type="text/javascript" src="../js/add_item_preview.js"></script>
  </body>
</html>
