<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("../includes/admin-scripts.php"); ?>
    <title>Confirm Moderator</title>
  </head>
  <body>
    <?php include_once("../includes/noscript.php"); ?>
    <?php include_once("../includes/user-header.php"); ?>
    <div class="cm-div">
      <div class="card cm">
        <div class="card-body">
          <form method="post" action="confirmmoderator.php">
            <div class="flex-row">
              <div class="label-div">
                <label>Enter branch code</label>
              </div>
              <div class="input-div">
                <input type="text" name="branch" class="form-control"
                placeholder="Enter branch code" />
              </div>
            </div>
            <div class="flex-row">
              <div class="label-div">
                <label>Enter id</label>
              </div>
              <div class="input-div">
                <input type="text" name="id" class="form-control"
                placeholder="Enter id" />
              </div>
            </div>
            <div class="confirmmoderator">
              <button class="btn btn-primary" name="confirm">Confirm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--Footer,import from includes/moderator-footer.php -->
    <?php include_once("../includes/moderator-footer.php"); ?>
  </body>
</html>
