<?php
include("dbConnect.php");
//create database connection
$dbConnect = new DBConnect();
$link = $dbConnect->databaseConnect();
//create query
$query = "DELETE FROM item WHERE item_id = ?";
//bind values using prepared statement
$stmt = $link->prepare($query);
$stmt->bind_param("i",intval($_POST["item_id"]));
//execute query
$stmt->execute();
if($stmt->affected_rows>0)
{
	echo "Item deleted";
}
$link->close();
?>