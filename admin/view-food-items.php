<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/admin-scripts.php"); ?>
    <title>View Food Items</title>
  </head>
  <body>
    <?php include_once("../includes/noscript.php"); ?>
    <?php include_once("../includes/user-header.php"); ?>
    <div class="user-body">
      <!--User body left section - Navigation -->
      <div class="navigation card">
        <?php include_once("../includes/admin-navigation.php"); ?>
      </div>
      <!--User body right section - Item Filter and Item Display -->
      <div class="document-body">
        <!--Section for search filters -->
        <?php include_once("../components/search-filters.php"); ?>
        <!--Section to display food items-->
        <?php include_once("../components/view-food-items.php"); ?>
      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
  </body>
</html>
