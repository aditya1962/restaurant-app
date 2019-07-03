<?php
include_once("dbConnect.php");
//Optional session for testing purposes 
session_start();
$_SESSION["username"] = "";
$username = $_SESSION["username"];
$item_id = $_POST["item_id"];

$verify = verify_item($username,$item_id);

if($verify===false)
{
	add_item($username,$item_id);
}
else
{
	delete_item($username,$item_id);
}

function add_item($username,$item_id)
{
	$dbConnect = new DBConnect();
	$link = $dbConnect->databaseConnect();
	$query = "INSERT INTO saved_item (username,item_id,date_added) VALUES (?,?,?)";
	$stmt = $link->prepare($query);
	$date_added = date("Y-m-d H;i:s",mktime(0,0,0,0,0,0));
	$stmt->bind_param("sis",$username,$item_id,$date_added);
	$stmt->execute();
	if($stmt->affected_rows>0)
	{
		echo "Item saved";
	}
	$link->close();
}

function verify_item($username,$item_id)
{
	$dbConnect = new DBConnect();
	$link = $dbConnect->databaseConnect();
	$query = "SELECT * FROM saved_item WHERE username = ? AND item_id = ?";
	$stmt = $link->prepare($query);
	$stmt->bind_param("si",$username,$item_id);
	$stmt->execute();
	$exists = false;
	while($stmt->fetch())
	{
		$exists = true;
	}
	$link->close();
	return $exists;
}

function delete_item($username,$item_id)
{
	$dbConnect = new DBConnect();
	$link = $dbConnect->databaseConnect();
	$query = "DELETE FROM saved_item WHERE username=? AND item_id=?";
	$stmt = $link->prepare($query);
	$stmt->bind_param("si",$username,$item_id);
	$stmt->execute();
	if($stmt->affected_rows>0)
	{
		echo "Item removed";
	}
	$link->close();
}
?>