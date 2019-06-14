<?php
include_once("dbConnect.php");
class EditItem
{
	function verify_item($name)
	{
		//create database connection
		$dbConnect = new DBConnect();
		$link = $dbConnect->databaseConnect();
		//create query
		$query = "SELECT * FROM item WHERE name=?";
		//prepare query
		$stmt=$link->prepare($query);
		$stmt->bind_param("s",$name);
		//execute the query
		$stmt->execute();
		$exists = false;
		while($stmt->fetch())
		{
			$exists = true;
		}
		$link->close();
		return $exists;
	}
	function update_item($values,$file_path)
	{
		//create database connection
		$dbConnect = new DBConnect();
		$link = $dbConnect->databaseConnect();
		//verify whether item exists
		$exists = $this->verify_item($values[2]);
		var_dump($values);
		if($exists)
		{
			//create query
			$query = "UPDATE item SET category=?,subcategory=?,price=?,image_path=?,discount=? WHERE name=?";
			//bind parameters using prepared statement
			$stmt = $link->prepare($query);
			$stmt->bind_param("sssdsis",$values[0],$values[1],floatval($values[3]),$file_path,intval($values[5]),$values[2]);
			//execute the query
			$stmt->execute();
			$link->close();
		}
		else
		{
			//call add item method of add_item_control.php
			include_once("add_item_control.php");
			$add_item = new AddItemControl();
			$add_item->add_item($values);
		}	
	}
}

?>