<?php
include("dbConnect.php");
	class Feedback
	{
		function __construct()
		{
			//Session created for testing purposes only
			session_start();
			$_SESSION["username"] = "";
		}
		function product($message)
		{
			$this->feedback_submit($message,"product");
		}
		function service($message)
		{
			$this->feedback_submit($message,"service");
		}
		function feedback_submit($message,$feedback_type)
		{
			$dbConnect = new DBConnect();
			$link=$dbConnect->databaseConnect();
			$query = "INSERT INTO feedback(feedbackid, username, message, feedback_type, submitted_date, reply, reply_status) 
			VALUES (?,?,?,?,?,?,?)";
			$stmt = $link->prepare($query);
			$username = $_SESSION["username"];
			$submitted_date = date("Y-m-d H:i:s",mktime(0,0,0,0,0,0));
			$reply = "";
			$reply_status = 0;
			$stmt->bind_param("isssssi",$feedback_id,$username,$message,$feedback_type,$submitted_date,$reply,$reply_status);
			$stmt->execute();
			if($stmt->affected_rows>0)
			{
				?>
				<div class="submit-success">
					<?php echo "Feedback was submitted successfully"; ?>
				</div>
				<?php
			}
		}
	}
?>


