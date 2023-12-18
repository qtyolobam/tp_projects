<?php
include('../../includes/config.php');

session_start();
if(!isset($_SESSION['Admin_loggedin']))
{
    header("location:../../leaderboard.php");
    exit;
}

$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['dept_id'];
	$data['label']=$row['dept_name'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close($conn);
?> 