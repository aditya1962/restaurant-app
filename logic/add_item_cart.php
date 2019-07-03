<?php
include_once("dbConnect.php");
//Optional session for testing purposes 
session_start();
$_SESSION["username"] = "";

$data_value = file_get_contents('php://input');
$data = json_decode($data_value);
$rating = $data->rating;
$quantity = $data->quantity;
$item_id = $data->item_id;
$username = $_SESSION["username"];

$verify = verify_item($username,$item_id);

if($verify===false)
{
	add_item($username,$item_id,$rating,$quantity);
}
else
{
	delete_item($username,$item_id);
}

function add_item($username,$item_id,$rating,$quantity)
{
	$dbConnect = new DBConnect();
	$link = $dbConnect->databaseConnect();
	$query = "INSERT INTO user_cart (username, item_id,rating,quantity, date_added) VALUES (?,?,?,?,?)";
	$stmt = $link->prepare($query);
	$date_added = date("Y-m-d H:i:s",mktime(0,0,0,0,0,0));
	$stmt->bind_param("siiis",$username,$item_id,$rating,$quantity,$date_added);
	$stmt->execute();
	if($stmt->affected_rows>0)
	{
		echo "Item added";
	}
	$link->close();
}

function verify_item($username,$item_id)
{
	$dbConnect = new DBConnect();
	$link = $dbConnect->databaseConnect();
	$query = "SELECT * FROM user_cart WHERE username = ? AND item_id = ?";
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
	$query = "DELETE FROM user_cart WHERE username=? AND item_id=?";
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