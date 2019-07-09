<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/user-scripts.php"); ?>
    <title>Give Feedback</title>
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
          <h3> Feedback for Product </h3>
          <br /><br />
          <form method="post" action="give-feedback.php">
            <textarea class="form-control" name="product-msg" rows="8" style="width:70%;" placeholder="Enter Feedback"></textarea>
            <br/>
            <div class="feedback-submit">
              <input type="submit" class="btn btn-primary" name="product" value="Submit" />
            </div>
          </form>
          <br/><br/>
          <h3> Feedback for Service </h3>
          <br /><br />
          <form method="post" action="give-feedback.php">
            <textarea class="form-control" name="service-msg" rows="8" style="width:70%;" placeholder="Enter Feedback"></textarea>
            <br/>
            <div class="feedback-submit">
              <input type="submit" class="btn btn-primary" name="service" value="Submit" />
            </div>
          </form>
          <?php
            if(isset($_POST["product"]))
            {
              $message = $_POST["product-msg"];
              if(empty($message))
              {
                ?>
                <div class="feedback-error">
                  <?php echo "Message cannot be blank"; ?>
                </div>
                <?php
              }
              else
              {
                include_once("../logic/feedback.php");
                $feedback = new Feedback();
                $feedback->product($message);
              }
            }
            if(isset($_POST["service"]))
            {
              $message = $_POST["service-msg"];
              if(empty($message))
              {
                ?>
                <div class="feedback-error">
                  <?php echo "Message cannot be blank"; ?>
                </div>
                <?php
              }
              else
              {
                include_once("../logic/feedback.php");
                $feedback = new Feedback();
                $feedback->service($message);
              }
            }

          ?>
      </div>

    </div>
    <!--Footer,import from includes/user-footer-template.php -->
    <?php include_once("../includes/user-footer-template.php"); ?>
  </body>
</html>
