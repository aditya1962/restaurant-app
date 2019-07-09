<?php
  session_start();
  if(isset($_POST["submit-order"]))
  {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $hours = $_POST["hours"];
    $minutes = $_POST["minutes"];
    $payment = $_POST["payment"];
    $remarks = $_POST["remarks"];

    $blanks_arr = array($name,$address,$email,$phone_number,$hours,$minutes);
    $names_arr = array("Name","Address","Email","Phone Number","Hours","Minutes");
    $blanks = blanks($blanks_arr,$names_arr);

    $num_arr = array($hours,$minutes);
    $num_names = array("Hours","Minutes");
    $num = num($num_arr,$num_names);

    $emailValid = validate_email($email);

    if(!isset($payment))
    {
      ?>
      <div class="error-order">
        <?php echo "Payment method not set <br/>"; ?>
      </div>
    <?php
    }
    else if($blanks && $num && $emailValid)
    {
      process($name,$address,$email,$phone_number,$hours,$minutes,$payment,$remarks);
    }
  }

  function blanks($arr,$names)
  {
    $valid = true;
    for ($i=0; $i < sizeof($arr); $i++) { 
      if(empty($arr[$i]))
      {
        $valid = false;
        ?>
        <div class="error-order">
        <?php echo $names[$i]." cannot be blank <br/>"; ?>
      </div>
      <?php
      }
    }
    return $valid;
  }

  function num($arr,$names)
  {
    $valid = true;
    $time = date("H:i");
    for ($i=0; $i < sizeof($arr); $i++) { 
      if(!(is_numeric($arr[$i])))
      {
        $valid = false;
        ?>
        <div class="error-order">
        <?php echo $names[$i]." cannot be text <br/>"; ?>
      </div>
      <?php
      }
      else if($arr[0]>24)
      {
        $valid = false;
        ?>
        <div class="error-order">
        <?php echo "Hours cannot be greater than 24 <br/>"; ?>
      </div>
      <?php
      }
      else if(date("H")<=$arr[0])
      {
        $valid = false;
        ?>
        <div class="error-order">
        <?php echo "Delivery time should be at least one hour ahead of current time <br/>"; ?>
      </div>
      <?php
      } 
      else if($arr[1]>60)
      {
        $valid = false;
        ?>
        <div class="error-order">
        <?php echo "Minutes cannot be greater than 60 <br/>"; ?>
      </div>
      <?php
      }
    }
    return $valid;
  }

  function validate_email($email)
  {
    $valid = filter_var($email,FILTER_VALIDATE_EMAIL);
    if(!($valid))
    {
      ?>
        <div class="error-order">
        <?php echo "Invalid email <br/>"; ?>
      </div>
      <?php
    }
    return $valid;
  }

  function process($name,$address,$email,$phone_number,$hours,$minutes,$payment,$remarks)
  {
    include_once("../logic/submit_order.php");
    $submit = new SubmitOrder();

    $submit->order_details_submit($name,$address,$email,$phone_number,$hours,$minutes,$remarks);
    $submit->order_item_submit($username,$_SESSION["id"],$_SESSION["quantity"]);

  }
?>
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
        <div class="submit-orders card">
          <div class="card-body">
            <h3>Submit Orders</h3>
            <form method="post" action=<?php echo basename($_SERVER['SCRIPT_FILENAME']); ?>>
              <div class="form-components">
                <div class="label-div">
                  <label> Name </label>
                </div>
                <div class="input-div">
                  <input type="text" class="form-control" placeholder="Enter name" name="name" />
                </div>
              </div>
              <div class="form-components">
                <div class="label-div">
                  <label> Address </label>
                </div>
                <div class="input-div">
                  <input type="text" class="form-control" placeholder="Enter address" name="address" />
                </div>
              </div>
              <div class="form-components">
                <div class="label-div">
                  <label> Email </label>
                </div>
                <div class="input-div">
                  <input type="email" class="form-control" placeholder="Enter email" name="email" />
                </div>
              </div>
              <div class="form-components">
                <div class="label-div">
                  <label> Phone Number </label>
                </div>
                <div class="input-div">
                  <input type="text" class="form-control" placeholder="Enter phone number" name="phone-number" />
                </div>
              </div>
              <div class="form-components">
                  <div class="label-div">
                    <label> Time of Delivery </label>
                  </div>
                  <div class="input-div time-input">
                    <input type="number" class="form-control" style="margin:0% 30%;" min="00" max="24" placeholder="hh(24h)" name="hours" />
                  </div>
                  <div class="input-div time-input">
                    <input type="number" class="form-control" min="00" max="60" placeholder="min" name="minutes" />
                  </div>
              </div>
              <div class="form-components">
                  <div class="label-div">
                    <label> Payment </label>
                  </div>
                  <div class="input-div">
                    <input type="radio" name="payment" value="ondelivery"/> <label> On Delivery</label>
                    <input type="radio" name="payment" value="online"/> <label> Online</label>
                  </div>
              </div>
                <div class="form-components">
                  <div class="label-div">
                    <label> Remarks </label>
                  </div>
                  <div class="input-div">
                    <textarea class="form-control" rows="7" style="width:100%;" name="remarks"
                    placeholder="Enter any remarks"></textarea>
                  </div>
                </div>
                <div style="text-align:right;">
                  <input type="submit" class="btn btn-primary" name="submit-order"
                  value="Submit Order"/>
                </div>      
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>