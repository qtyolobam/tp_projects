<?php
include('../../includes/config.php');

session_start();
if(!isset($_SESSION['Admin_loggedin']))
{
    header("location:../../leaderboard.php");
    exit;
}

$sql = "SELECT ccid FROM bets WHERE event_name = '".$_POST['id']."'";
$result = mysqli_query($conn, $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['ccid'];
	$data['label']=$row['ccid'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close($conn);
?> 