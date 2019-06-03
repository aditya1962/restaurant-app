<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/admin-scripts.php"); ?>
    <title>View Feedback</title>
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
        <!--Section to display user feedbacks-->
        <?php include_once("../components/feedbacks.php") ?>
      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
  </body>
</html>
