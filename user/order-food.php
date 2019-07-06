<?php
session_start();
$_SESSION["id"] = [];
$_SESSION["names"] = [];
$_SESSION["quantity"] = [];
?>
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
        <h3 id="view-orders"> Orders </h3>
        <br />
        <p>Here are the list of items that you ordered</p>
        <br />
        <form method="post" action="submit-order.php">
        <div class="table-orders">
         <table class="table table-striped" id="order-table">
          <tr><td>You have not placed any orders</td></tr>
         </table>
         <div style="text-align:right;">
          <button class="btn btn-primary" id="submit-orders" style="visibility:hidden;">Submit orders </button>
         </div>
        </div>
      </form>
        <br /><br />
      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
    <script type="text/javascript" src="../js/quantity.js"></script>
    <script type="text/javascript" src="../js/add_to_orders.js"></script>
    <script type="text/javascript">
        function remove(id)
        {
          var item_id = id.split('-')[1];
          document.getElementById("ordered-item-"+item_id).remove();
        }
    </script>
  </body>
</html>
