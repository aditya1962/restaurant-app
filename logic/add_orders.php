<?php
	session_start();
	$data_value = file_get_contents('php://input');
	$data = json_decode($data_value);
	array_push($_SESSION["id"], $data->item_id);
	array_push($_SESSION["quantity"], $data->quantity);
	array_push($_SESSION["names"], $data->item_name);
  echo "<tr><th> Item Name </th><th>Quantity</th><th>&nbsp;</th></tr>";
	for($i=0;$i<sizeof($_SESSION["id"]);$i++)
	{
		echo "<tr id ='ordered-item-".$_SESSION["id"][$i]."' >
        <td><p>". $_SESSION["names"][$i]."</p></td>
        <td><p>".$_SESSION["quantity"][$i],"</p></td>  
        <td><button class='btn btn-primary' name='remove-item' id ='remove-".$_SESSION["id"][$i]."' 
        style='align:right;' onclick='remove(this.id)'>Remove Item</button></td>
      </tr>";
    }
?>
