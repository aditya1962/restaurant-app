<form method="post" action="register.php?viewcard=personalinformation">
  <div class="form-components">
    <div class="label-div">
      <label> Full Name </label>
    </div>
    <div class="input-div">
      <input type="text" class="form-control" placeholder="Enter full name" name="fullname" />
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
      <label> Sex </label>
    </div>
    <div class="input-div" style="text-align:left;">
        <input type="radio" name="sex" value="male"/>Male
        <input type="radio" name="sex" value="female" />Female
    </div>
  </div>
  <div class="form-components">
    <div class="label-div">
      <label> Phone </label>
    </div>
    <div class="input-div">
      <input type="text" class="form-control" placeholder="Enter phone number" name="phone" />
    </div>
  </div>
  <div class="form-components">
    <div class="label-div">
      <label> Age </label>
    </div>
    <div class="input-div">
      <select class="form-control" name="age">
        <option value="below15">Below 15</option>
        <option value="15-25">15-25</option>
        <option value="25-35">25-35</option>
        <option value="35-45">35-45</option>
        <option value="45-55">45-55</option>
        <option value="55-65">55-65</option>
        <option value="65over">65 & Above</option>
      </select>
    </div>
  </div>
  <input type="submit" class="btn btn-primary" name="register" value="Register" />
</form>
<?php
  session_start();
  if(!isset($_SESSION["valid"]))
  {
    header("Location:register.php?viewcard=logininformation");
  }
  $values = $_SESSION["values"];
  for ($i=0; $i < sizeof($values); $i++) {
    echo $values[$i];
  }
 ?>
