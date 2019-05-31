<div class="card">
  <div class="card-body">
    <div class="flex-row item">
        <div class="col-md-2 col-lg-2">
          <img src="#" alt="item" />
        </div>
        <div class="col-md-7 col-lg-7">
            <label style="display:block;">Name</label>
            <label style="display:block;">Price</label>
            <div class="flex-row">
              <button name="edit" class="btn btn-default">
                <img src="#" alt="edit" />
              </button>
              <button name="delete" class="btn btn-default">
                <img src="#" alt="delete" />
              </button>
            </div>
            </div>
        <div class="col-md-3 col-lg-3">
            <label>Discount</label>
            <br />
            <label>Rating</label>
            <br />
            <?php include_once("rating.php");?>
        </div>
    </div>
  </div>
</div>
