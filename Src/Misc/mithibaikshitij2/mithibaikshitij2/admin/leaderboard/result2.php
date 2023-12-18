<?php
require_once "../../includes/config.php";

session_start();
if(!isset($_SESSION['Admin_loggedin']))
{
    header("location:../../leaderboard.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $res = $_POST['result'];
    
    // if ($zzz="NPR"){
    //     $sql = "update leaderboard set point";  // Use select query here 
    //     $result = mysqli_query($conn,$sql);
    // }
    $event = $_POST['event'];
    echo $res;
    echo $event;

}
?>