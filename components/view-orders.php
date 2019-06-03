<div class="card">
  <div class="card-body">
    <h3>Current Orders</h3>
    <br /><br />
    <table class="table table-striped">
      <tr>
        <th> Order No. </th>
        <th> Order Time </th>
        <th> Order Items </th>
        <th> Username </th>
        <th> Remarks </th>
        <th> Mark as complete </th>
      </tr>
      <tr>
        <td> Order 1 </td>
        <td> Order 1 </td>
        <td> <button id="1" class="btn btn-primary"
          data-toggle="modal" data-target="#order" name="vieworder">
        View</button> </td>
        <td> Order 1 </td>
        <td> <button id="1" class="btn btn-primary"
          data-toggle="modal" data-target="#review" name="viewremark">
        View</button>  </td>
        <td> <button id="1" class="btn btn-primary" name="complete">
        Complete</button> </td>
      </tr>
    </table>
  </div>
</div>
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
 aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Details about the order
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel"
 aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Remarks
      </div>
    </div>
  </div>
</div>
