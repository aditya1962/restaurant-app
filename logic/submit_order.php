<?php
include_once("dbConnect.php");
class SubmitOrder
{
	function order_item_submit($username,$id,$quantity)
	{
		$dbConnect = new DBConnect();
		$link->databaseConnect();
		$submitted = false;
		//session created for testing purposes only
		session_start();
		$_SESSION["username"]="";

		$username = $_SESSION["username"];
		$order_number = $this->get_order_number();

		for ($i=0; $i < sizeof($id); $i++) { 
			$query="INSERT INTO order_item(username,item_id,quantity,order_number) VALUES (?,?,?,?)";
			$stmt=$link->prepare($query);
			$stmt->bind_param($username,$id[$i],$quantity[$i],$order_number);
			$stmt->execute();
			if($stmt->affected_rows>0)
			{
				$submitted = true;
			}
		}
		return $submitted;
	}
	function order_details_submit($name,$address,$email,$phone_number,$hours,$minutes,$payment,$remarks)
	{
		$dbConnect = new DBConnect();
		$link->databaseConnect();
		$query="INSERT INTO order_details(name, address, email, phone_number, delivery_time, payment, remarks, submitted_time)
		 VALUES (?,?,?,?,?,?,?,?)";
		$stmt=$link->prepare($query);
		$delivery_time = date('Y-m-d H:i:s',mktime(0,0,0,$hours,$minutes,0));
		$submitted_time =  date('Y-m-d H:i:s',mktime(0,0,0,0,0,0));
		$stmt->bind_param($name,$address,$email,$phone_number,$delivery_time,$payment,$remarks,$submitted_time);
		$stmt->execute();
		$submitted = false;
		if($stmt->affected_rows>0)
		{
			$submitted = true;
		}
		return $submitted;
	}
	function get_order_number()
	{
		$dbConnect = new DBConnect();
		$link->databaseConnect();
		$query="SELECT order_number FROM order_details ORDER BY order_number DESC LIMIT 1";
		$stmt=$link->prepare($query);
		$stmt->execute();
		$stmt->bind_result($order_number);
		$number = 1;
		while($stmt->fetch())
		{
			$number = $order_number;
		}
		return $number;
	}
}
?>