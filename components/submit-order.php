<div class="submit-orders">
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
          <input type="text" class="form-control" style="margin:0% 30%;" placeholder="hh(24h)" name="hours" />
        </div>
        <div class="input-div time-input">
          <input type="text" class="form-control" placeholder="min" name="minutes" />
        </div>
    </div>
    <div class="form-components">
        <div class="label-div">
          <label> Payment </label>
        </div>
        <div class="input-div">
          <input type="radio" name="ondelivery" /> <label> On Delivery</label>
          <input type="radio" name="online" /> <label> Online</label>
        </div>
    </div>
      <div class="form-components">
        <div class="label-div">
          <label> Remarks </label>
        </div>
        <div class="input-div">
          <textarea class="form-control" rows="7" style="width:100%;"
          placeholder="Enter any remarks"></textarea>
        </div>
      </div>
      <div style="text-align:right;">
        <input type="submit" class="btn btn-primary" name="submit-order"
        value="Submit Order"/>
      </div>      
  </form>
</div>
