<div class="card send-remark">
  <div class="card-body">
    <form method="post" action=<?php basename($_SERVER['SCRIPT_FILENAME']); ?>>
      <div class="flex-row">
        <div class="label-div">
          <label>Order No.</label>
        </div>
        <div class="input-div">
          <input type="text" class="form-control" name="order no."
          placeholder="Enter Order No." />
        </div>
      </div>
      <div class="flex-row">
        <div class="label-div">
          <label>Remarks</label>
        </div>
        <div class="input-div">
          <textarea class="form-control" name="remark" rows="7" cols="25"
          placeholder="Enter remarks"></textarea>
        </div>
      </div>
      <div class="submitremark">
        <button class="btn btn-primary" name="remark">Submit Remark</button>
      </div>
    </form>
  </div>
</div>
