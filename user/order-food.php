<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/user-scripts.php"); ?>
    <title>Order Food</title>
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
        <!-- Item display, import from components/order-food.php" -->
        <?php include_once("../components/order-food.php"); ?>
        <br /><br />
        <!-- Section to display the orders the user has selected -->
        <h3> Orders </h3>
        <br />
        <p>Here are the list of items that you ordered</p>
        <br />
        <?php include_once("../components/orders.php"); ?>
        <br /><br />
        <!--Section to submit orders -->
        <?php include_once("../components/submit-order.php"); ?>
      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
  </body>
</html>
