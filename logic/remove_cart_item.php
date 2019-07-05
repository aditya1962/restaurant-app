<?php
include_once("dbConnect.php");
//Session created for testing purposes only
session_start();
$_SESSION["username"] = "";
$dbConnect = new DBConnect();
$link = $dbConnect->databaseConnect();
$query = "DELETE FROM user_cart WHERE username=? AND item_id=?";
$stmt = $link->prepare($query);
$username = $_SESSION["username"]
$item_id = $_POST["item_id"];
$stmt->bind_param("si",$username,$item_id);
$stmt->execute();
if($stmt->affected_rows>0)
{
	echo "Item removed";
}
$link->close();
?>