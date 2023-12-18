<?php
require_once "../includes/config.php";
session_start();
if(!isset($_SESSION['Admin_loggedin']))
{
    header("location:../leaderboard.php");
    exit;
}


if (isset($_POST["ncpid"])){
  
$ncpid = $_POST['ncpid'];
$eventname=$_POST['eventname'];
$status=$_POST['status'];
$email = $_POST['email'];
echo $ncpid.$eventname;


echo $status;
if ($status=='confirmed'){
    echo "confirmed pressed";
    echo ("<script LANGUAGE='JavaScript'>
  window.alert('Hey You have already confirmed this slot !');
  window.location.href ='../admin/ncpregisteredevents.php';
  </script>");

  }
  elseif($status!='confirmed'){
    echo "pending pressed";
    $sql = "UPDATE `ncpeventregi` SET `status` = 'confirmed' WHERE `ncpeventregi`.`ncpid` = '$ncpid' and `ncpeventregi`.event_name='$eventname' ";
if($conn->query($sql) == true){
  $to_email = $email;
  $subject = "Mithibai Kshitij 21 - Your Slot has been Confirmed";
  // $body = "Hello ".$ncpid." your slot for : ".$eventname." has been Confirmed !";
  $body = "<html><body> 
<h3>SVKM'S MITHIBAI COLLEGE & CEREBRA INTEGRATED TECHNOLOGIES PRESENTS KSHITIJ'21 - HAR DIL EK SITARA. </h3> <br>

Congratulations <b>$ncpid!!</b><br>
Your slot for <b>$eventname</b> is confirmed in <b>Kshitij'21 - ‘Har Dil Ek Sitara’</b>. 
<br><br>
Slot Number and Meeting link will be mailed to you on the day of the event.<br><br>
We are waiting to see you!
<br>
For further details, contact:<br>

Priya Desai<br>
Head of Department, Logistics<br>
<b>+91 90822 24554</b><br>

Praneet Parvataneni<br>
Sub-head of Department, Logistics<br>
<b>+9194252 74121</b><br>

Mansi Muchhala<br>
Sub-head of Department, Logistics<br>
<b>+9179765 31177</b><br>

<img src='https://mithibaikshitij.com/wp-content/uploads/2021/11/Logos.jpeg' width='45%' alt='Mithibai Kshitij'><br>

</body></html>";
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers.= "From: testmailkshitij@gmail.com";
  mail($to_email, $subject, $body, $headers);
  $insert = true;
   header("location: ncpregisteredevents.php");
}
else{
      echo "ERROR: $sql <br> $conn->error";
  }
  }


}


?>