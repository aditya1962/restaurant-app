<?php

if(isset($_GET["rating"]))
{
  echo $_GET["rating"];
}

?>
<form method="get" action = <?php echo basename($_SERVER['SCRIPT_FILENAME'])?>>
<button class="btn btn-default rating" name="rating" value="1">★</button>
<button class="btn btn-default rating" name="rating" value="2">★</button>
<button class="btn btn-default rating" name="rating" value="3">★</button>
<button class="btn btn-default rating" name="rating" value="4">★</button>
<button class="btn btn-default rating" name="rating" value="5">★</button>
</form>
