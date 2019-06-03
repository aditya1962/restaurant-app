<?php
//function to style the links based on current url
function activeClass($urls, $fileNames)
{
  $filename = basename($_SERVER['SCRIPT_FILENAME']); //Get the current file name
  for($i=0; $i<sizeof($urls);$i++) //iterate through the array referenced by function call
  {
    if($filename===$urls[$i]) //if current file name is equal to iteration link, add active class
    {
      echo "<div class='item active'><a href=".$urls[$i].">". $fileNames[$i]."</a><hr /></div>";
    }
    else {
      echo "<div class='item'><a href=".$urls[$i].">". $fileNames[$i]."</a><hr /></div>";
    }
  }
}
 ?>

<div class="card-body">
  <?php
  //array of links
  $links = array("view-orders.php","send-remarks.php");
  //array of file names
  $names = array("View Orders", "Send Remarks");
  //call function to generate navigation menu
  activeClass($links,$names);
?>
</div>
