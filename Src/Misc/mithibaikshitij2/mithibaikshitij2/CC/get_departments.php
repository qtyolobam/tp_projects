<?php
include('../includes/config.php');

session_start(); 
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }



$sql = "SELECT departments.dept_name FROM departments, cceventregi where cceventregi.dept_name= departments.dept_id and cceventregi.ccid=  'CC17'";
$result = mysqli_query($conn, $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['dept_name'];
	$data['label']=$row['dept_name'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close($conn);
?> 