<?php
include('../../includes/config.php');

session_start();
if(!isset($_SESSION['Admin_loggedin']))
{
    header("location:../../leaderboard.php");
    exit;
}

$sql = "SELECT bet_point FROM bets WHERE ccid = '".$_POST['id']."'";
$result = mysqli_query($conn, $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['bet_point'];
	$data['label']=$row['bet_point'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close($conn);
?> 