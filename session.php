<?php
  if(!isset($_SESSION))
  {
    //navigate to login.php
    header("Location:../login.php?user=false");
  }
?>
