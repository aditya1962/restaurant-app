<?php
	include_once("dbConnect.php");
	//create database connection
	$dbConnect = new DBConnect();
	$link = $dbConnect->databaseConnect();
	//create query
	$query = "SELECT category,subcategory,name,price,discount FROM item WHERE item_id=?";
	//bind parameters using prepared statement
	$stmt = $link->prepare($query);
	$stmt->bind_param("i",$_POST["item_id"]);
	//execute the query
	$stmt->execute();
	//bind results on retrieve
	$stmt->bind_result($category,$sub_category,$name,$price,$discount);
	while($stmt->fetch())
	{
		$values = array($category,$sub_category,$name,$price,$discount);
		echo json_encode($values);
	}
	$link->close();

?>