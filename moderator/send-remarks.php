<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/admin-scripts.php"); ?>
    <title>Send Remarks</title>
  </head>
  <body>
    <?php include_once("../includes/noscript.php"); ?>
    <?php include_once("../includes/user-header.php"); ?>
    <div class="user-body">
      <!--User body left section - Navigation -->
      <div class="navigation card">
        <?php include_once("../includes/moderator-navigation.php"); ?>
      </div>
      <!--User body right section - Item Filter and Item Display -->
      <div class="document-body">
        <!--Section to send remarks to user -->
        <?php include_once("../components/send-remarks.php"); ?>
      </div>

    </div>
    <!--Footer,import from includes/moderator-footer.php -->
    <?php include_once("../includes/moderator-footer.php"); ?>
  </body>
</html>
