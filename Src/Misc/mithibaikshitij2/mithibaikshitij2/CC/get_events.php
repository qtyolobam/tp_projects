<?php
include('../../includes/config.php');
session_start(); 
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }



$sql = "SELECT event_name FROM cceventregi WHERE ccid = '".$loginuser."'";
// $sql = "SELECT event_name FROM cceventregi WHERE ccid = '".$loginuser."' INTERSECT SELECT event_name from events where event_date = '"date('Y-m-d')%"' 
";

$result = mysqli_query($conn, $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['event_name'];
	$data['label']=$row['event_name'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close($conn);
?> 