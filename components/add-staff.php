<div class="card">
  <div class="card-body add-staff">
    <h3> Add Staff </h3>
    <form method="post" action=<?php basename($_SERVER['SCRIPT_FILENAME']);?>>
      <div class="flex-row">
        <div class="flex-row-column">
          <div class="label-div">
            <label>Name</label>
          </div>
          <div class="input-div">
            <input type="text" class="form-control" name="name" placeholder="Enter name" />
          </div>
        </div>
        <div class="flex-row-column" style="padding:0% 0% 0% 5%;">
          <div class="label-div">
            <label>Username</label>
          </div>
          <div class="input-div">
            <input type="text" class="form-control" name="username" placeholder="Enter username" />
          </div>
        </div>
      </div>
      <div class="flex-row">
        <div class="flex-row-column">
          <div class="label-div">
            <label>Department</label>
          </div>
          <div class="input-div">
            <input type="text" class="form-control" name="department" placeholder="Enter department" />
          </div>
        </div>
        <div class="flex-row-column" style="padding:0% 0% 0% 5%;">
          <div class="label-div">
            <label>Password</label>
          </div>
          <div class="input-div">
            <input type="password" class="form-control" name="password" placeholder="Enter password" />
          </div>
        </div>
      </div>
      <div class="flex-row">
        <div class="flex-row-column">
          <div class="label-div">
            <label>Role</label>
          </div>
          <div class="input-div">
            <input type="text" class="form-control" name="role" placeholder="Enter role" />
          </div>
        </div>
        <div class="flex-row-column" style="padding:0% 0% 0% 5%;">
          <div class="label-div">
            <label>Gender</label>
          </div>
          <div class="input-div">
            <input type="radio" name="gender" value="male" /> Male
            <input type="radio" name="gender" value="female" />Female
          </div>
        </div>
      </div>
      <div class="add-member">
        <input type="submit" class="btn btn-primary" name="addmember" value="Add Member" />
      </div>
    </form>
  </div>
</div>
