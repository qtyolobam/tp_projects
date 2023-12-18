<?php
require_once "../includes/config.php";

session_start();
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }



if (isset($_POST["ccid"])){

  

$ccid = $_POST['ccid'];
$eventname=$_POST['eventname'];
$email = $_POST['email'];
echo $ccid.$eventname;

$status_sql = "select status from cceventregi where ccid = '$ccid' and event_name = '$eventname'";
$status_result = mysqli_query($conn,$status_sql);

if (mysqli_num_rows($status_result) > 0) {
  while($row = mysqli_fetch_array($status_result)) {
    echo "Status is : ".$row['status'];
 


    if ($row['status']=='confirmed'){
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Hey You have already confirmed this slot !');
    window.location.href ='../admin/ccregisteredevents.php';
    </script>");

    }

    elseif ($row['status']!='confirmed'){
      $sql = "UPDATE `cceventregi` SET `status` = 'confirmed' WHERE `cceventregi`.`ccid` = '$ccid' and `cceventregi`.event_name='$eventname' ";
      if($conn->query($sql) == true){
        $to_email = $email;
        $subject = "Mithibai Kshitij 21 - Your Slot has been Confirmed";
        // $body = "Hello ".$ccid." your slot for : ".$eventname." has been Confirmed !";
        $body = "<html><body> 
<h3>SVKM'S MITHIBAI COLLEGE & CEREBRA INTEGRATED TECHNOLOGIES PRESENTS KSHITIJ'21 - HAR DIL EK SITARA. </h3> <br>

Congratulations <b>$ccid!!</b><br>
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
        header("location: ccregisteredevents.php");
      }
      else{
            echo "ERROR: $sql <br> $conn->error";
        }
      
      
      
      //UPDATE LEADER BOARD
      $sql1 = "UPDATE leaderboard SET points = points + (select regi_points from events where event_name = '$eventname') WHERE college_code = '$ccid'";
      if($conn->query($sql1) == true){
        $insert = true;
         header("location: ccregisteredevents.php");
      }
      else{
            echo "ERROR: $sql1 <br> $conn->error";
        }
      
      
      //UPDATE CC REGI POINT
      $sql2 = "UPDATE cc_regi_point SET points = points + (select regi_points from events where event_name = '$eventname') WHERE event_name = '$eventname' and ccid = '$ccid'";
      if($conn->query($sql2) == true){
        $insert = true;
         header("location: ccregisteredevents.php");
      }
      else{
            echo "ERROR: $sql2 <br> $conn->error";
      }
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Slot Confirmed !');
    window.location.href ='../admin/ccregisteredevents.php';
    </script>");
      
        
    }
  }
  }


}

?>