<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/user-scripts.php"); ?>
    <title>Add To Cart</title>
  </head>
  <body>
    <?php include_once("../includes/noscript.php"); ?>
    <?php include_once("../includes/user-header.php"); ?>
    <div class="user-body">
      <!--User body left section - Navigation -->
      <div class="navigation card">
        <?php include_once("../includes/navigation-bar.php"); ?>
      </div>
      <!--User body right section - Item Filter and Item Display -->
      <div class="document-body">
        <!--Form and Item Filters -->
        <?php include_once("../components/search-filters.php"); ?>
        <!-- Item display, import from components/user-cart-item.php" -->
        <?php include_once("../components/user-cart-item.php") ?>
      </div>
    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
    <script type="text/javascript" src="../js/categories.js"> </script>
  </body>
</html>
