<h3>User Reports</h3>
<br /><br />
<table class="table table-striped">
  <tr>
    <th> Username </th>
    <th> No. of logins </th>
    <th> Last login </th>
    <th> Orders </th>
    <th> Feedbacks </th>
  </tr>
  <?php
    include_once("../logic/dbConnect.php");
    //create database connection
    $dbConnect = new DBConnect();
    $link = $dbConnect->databaseConnect();
    //create query
    $query = "SELECT username,number_of_logins,last_login,orders,feedbacks FROM user_report";
    //create parameterized query
    $stmt = $link->prepare($query);
    //execute query
    $stmt->execute();
    //bind result returned
    $stmt->bind_result($username,$number_of_logins,$last_login,$orders,$feedbacks);
    while($stmt->fetch())
    {
      echo "<tr>";
      echo "<td>".$username."</td>";
      echo "<td>".$number_of_logins."</td>";
      echo "<td>".$last_login."</td>";
      echo "<td>".$orders."</td>";
      echo "<td>".$feedbacks."</td>";
      echo "</tr>";
    }
    $link->close();
  ?>
</table>
