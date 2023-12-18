<?php
namespace Phppot;

use Phppot\DepartmentEvent;
require_once __DIR__ . '/Model/DepartmentEvent.php';
$departmentEvent = new DepartmentEvent();
$departmentResult = $departmentEvent->getAllDepartment();
?>

<?php
  require_once "../includes/config.php";

    $insert = false;
    $everything=true;
    session_start();
    $loginuser = $_SESSION['ccid'];
    // echo $loginuser;

    //Get ID, Name, Mob
    $sql = "SELECT userid, collegename,email,phone from cclogin where USERID='$loginuser'";//idr login krne ke baad session id se compare karna hoga
    //$sql1 = "SELECT fname from pi_regi where NCPID='NCP2'";
    $stmt = mysqli_prepare($conn, $sql);
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        // echo "hi";
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $uid,$clg_name, $email, $phone);

                    
                    if(mysqli_stmt_fetch($stmt))
                    { 
                        $user_id = $uid;    
                        $college_name=$clg_name;
                        $email = $email;
                        $phone = $phone;
                        //echo "CC id is : ",$ccuser;
                        //echo $ncp_id;
                    }
                    else{
                        echo "error";
                    }

                }

    }
    //end

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
   // Collect post variables
   
   $collegename = $_POST['collegename'];
   $email = $_POST['email'];
   $p1email = $_POST['p1email'];
//    $phone = $_POST['phone'];
//    $dob = $_POST['dob'];
   $attachment =$_POST['attachment'];
   $event = $_POST['event'];
   $deptname = $_POST['department'];
   $p1 = $_POST['participant1'];
   $p2 = $_POST['participant2'];
   $p3 = $_POST['participant3'];
   $p4 = $_POST['participant4'];
   $p5 = $_POST['participant5'];
   $p6 = $_POST['participant6'];
   $p7 = $_POST['participant7'];
   $p8 = $_POST['participant8'];
   $npa1 = $_POST['npa1'];
   $npa2 = $_POST['npa2'];
   $p1num = $_POST['p1num'];
   $p2num = $_POST['p2num'];
   $p3num = $_POST['p3num'];
   $p4num = $_POST['p4num'];
   $p5num = $_POST['p5num'];
   $p6num = $_POST['p6num'];
   $p7num = $_POST['p7num'];
   $p8num = $_POST['p8num'];
   $npa1num = $_POST['npa1num'];
   $npa2num = $_POST['npa2num'];


   function isDigits(string $phone, int $minDigits = 10, int $maxDigits = 10): bool {
    return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $phone);
}
        // echo $event;
   
        // $location="../uploads/";
        // $file11=$_FILES['img1']['name'];
        // $file1=rand().str_replace(' ','',$file11);
        // $file_tmp1=$_FILES['img1']['tmp_name'];
        // $file22=$_FILES['img2']['name'];
        // $file2=rand().str_replace(' ','',$file22);
        // $file_tmp2=$_FILES['img2']['tmp_name'];
        // $file33=$_FILES['img3']['name'];
        // $file3=rand().str_replace(' ','',$file33);
        // $file_tmp3=$_FILES['img3']['tmp_name'];
        // $file44=$_FILES['img4']['name'];
        // $file4=rand().str_replace(' ','',$file44);
        // $file_tmp4=$_FILES['img4']['tmp_name'];
        // $file55=$_FILES['img5']['name'];
        // $file5=rand().str_replace(' ','',$file55);
        // $file_tmp5=$_FILES['img5']['tmp_name'];
        // $file66=$_FILES['img6']['name'];
        // $file6=rand().str_replace(' ','',$file66);
        // $file_tmp6=$_FILES['img6']['tmp_name'];
        // $file77=$_FILES['img7']['name'];
        // $file7=rand().str_replace(' ','',$file77);
        // $file_tmp7=$_FILES['img7']['tmp_name'];
        // $file88=$_FILES['img8']['name'];
        // $file8=rand().str_replace(' ','',$file88);
        // $file_tmp8=$_FILES['img8']['tmp_name'];

        $location="../uploads/";

        $file11=$_FILES['img1']['name'];
        $file1=rand().str_replace(' ','',$file11);
        $file_tmp1=$_FILES['img1']['tmp_name'];
        
        $govt_file11=$_FILES['govt_img1']['name'];
        $govt_file1=rand().str_replace(' ','',$govt_file11);
        $govt_file_tmp1=$_FILES['govt_img1']['tmp_name'];
        

        $file22=$_FILES['img2']['name'];
        $file2=rand().str_replace(' ','',$file22);
        $file_tmp2=$_FILES['img2']['tmp_name'];

        $govt_file22=$_FILES['govt_img2']['name'];
        $govt_file2=rand().str_replace(' ','',$govt_file22);
        $govt_file_tmp2=$_FILES['govt_img2']['tmp_name'];

        
        $file33=$_FILES['img3']['name'];
        $file3=rand().str_replace(' ','',$file33);
        $file_tmp3=$_FILES['img3']['tmp_name'];

        $govt_file33=$_FILES['govt_img3']['name'];
        $govt_file3=rand().str_replace(' ','',$govt_file33);
        $govt_file_tmp3=$_FILES['govt_img3']['tmp_name'];


        $file44=$_FILES['img4']['name'];
        $file4=rand().str_replace(' ','',$file44);
        $file_tmp4=$_FILES['img4']['tmp_name'];

        $govt_file44=$_FILES['govt_img4']['name'];
        $govt_file4=rand().str_replace(' ','',$govt_file44);
        $govt_file_tmp4=$_FILES['govt_img4']['tmp_name'];

        
        $file55=$_FILES['img5']['name'];
        $file5=rand().str_replace(' ','',$file55);
        $file_tmp5=$_FILES['img5']['tmp_name'];

        $govt_file55=$_FILES['govt_img5']['name'];
        $govt_file5=rand().str_replace(' ','',$govt_file55);
        $govt_file_tmp5=$_FILES['govt_img5']['tmp_name'];


        $file66=$_FILES['img6']['name'];
        $file6=rand().str_replace(' ','',$file66);
        $file_tmp6=$_FILES['img6']['tmp_name'];

        $govt_file66=$_FILES['govt_img6']['name'];
        $govt_file6=rand().str_replace(' ','',$govt_file66);
        $govt_file_tmp6=$_FILES['govt_img6']['tmp_name'];


        $file77=$_FILES['img7']['name'];
        $file7=rand().str_replace(' ','',$file77);
        $file_tmp7=$_FILES['img7']['tmp_name'];

        $govt_file77=$_FILES['govt_img7']['name'];
        $govt_file7=rand().str_replace(' ','',$govt_file77);
        $govt_file_tmp7=$_FILES['govt_img7']['tmp_name'];


        $file88=$_FILES['img8']['name'];
        $file8=rand().str_replace(' ','',$file88);
        $file_tmp8=$_FILES['img8']['tmp_name'];

        $govt_file88=$_FILES['govt_img8']['name'];
        $govt_file8=rand().str_replace(' ','',$govt_file88);
        $govt_file_tmp8=$_FILES['govt_img8']['tmp_name'];

        
        $filenpa11=$_FILES['npa1img']['name'];
        $filenpa1='NPA1_'.rand().str_replace(' ','',$filenpa11);
        $file_tmpnpa1=$_FILES['npa1img']['tmp_name'];

        $govt_filenpa11=$_FILES['govt_npa1img']['name'];
        $govt_filenpa1='NPA1_'.rand().str_replace(' ','',$govt_filenpa11);
        $govt_file_tmpnpa1=$_FILES['govt_npa1img']['tmp_name'];

        $filenpa12=$_FILES['npa2img']['name'];
        $filenpa2='NPA2_'.rand().str_replace(' ','',$filenpa12);
        $file_tmpnpa2=$_FILES['npa2img']['tmp_name'];

        $govt_filenpa12=$_FILES['govt_npa2img']['name'];
        $govt_filenpa2='NPA2_'.rand().str_replace(' ','',$govt_filenpa12);
        $govt_file_tmpnpa2=$_FILES['govt_npa2img']['tmp_name'];


        //for college id
        $data=[];
        if(!empty($file11) && !empty($file22) && !empty($file33) && !empty($file44) && !empty($file55) && !empty($file66) && !empty($file77) && !empty($file88)){
            $data=[$file1,$file2,$file3,$file4,$file5,$file6,$file7,$file8];
            $images=implode(' ',$data);
        }
        elseif(!empty($file11) && !empty($filenpa11) && !empty($filenpa12)){
            $data=[$file1,$filenpa1,$filenpa2];
            $images=implode(' ',$data); 
        }
        elseif(!empty($file11) && !empty($filenpa11)){
            $data=[$file1,$filenpa1];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11) && !empty($file22) && !empty($file33) && !empty($file44) && !empty($file55) && !empty($file66) && !empty($file77)){
            $data=[$file1,$file2,$file3,$file4,$file5,$file6,$file7];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11) && !empty($file22) && !empty($file33) && !empty($file44) && !empty($file55) && !empty($file66)){
            $data=[$file1,$file2,$file3,$file4,$file5,$file6];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11) && !empty($file22) && !empty($file33) && !empty($file44) && !empty($file55)){
            $data=[$file1,$file2,$file3,$file4,$file5];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11) && !empty($file22) && !empty($file33) && !empty($file44)){
            $data=[$file1,$file2,$file3,$file4];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11) && !empty($file22) && !empty($file33)){
            $data=[$file1,$file2,$file3];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11) && !empty($file22)){
            $data=[$file1,$file2];
            $images=implode(' ',$data); 
        }
        else if(!empty($file11)){
            $data=[$file1];
            $images=implode(' ',$data); 
        }         

    //for govt id
    $govt_data=[];
    $govt_data=[$govt_file1,$govt_file2,$govt_file3,$govt_file4,$govt_file5,$govt_file6,$govt_file7,$govt_file8,$govt_filenpa1,$govt_filenpa2];
    $govt_images=implode(' ',$govt_data);    


//event authentication

$sqll = "SELECT event_name FROM cceventregi WHERE event_name = '$event' and ccid='$loginuser' ";

            $stmt = mysqli_prepare($conn, $sqll);
            
                // Try to execute this statement
                if(mysqli_stmt_execute($stmt)){
                    // echo "hi";
                    mysqli_stmt_store_result($stmt);
                   
                    if(mysqli_stmt_num_rows($stmt) > 0)
                    {
                        echo '<script>alert("You have already registered for this event!")</script>';
                        echo '<script>window.location.href = "../dashboard/CC_dashboard.php";</script>';
                        // echo (mysqli_stmt_execute($stmt));
                        $everything=false;
                    }
                   
                }
                else{
                    echo "Something went wrong";
                }
          
        
    
    
    


//EMAIL

$to_email = ($email.','.$p1email);
$subject = "You Have Successully Registered for  $event";
// $body = "Hello ".$loginuser." thank you for registering for  $event.";
$body = "<html><body> 
<h3>SVKM'S MITHIBAI COLLEGE & CEREBRA INTEGRATED TECHNOLOGIES PRESENTS KSHITIJ'21 - HAR DIL EK SITARA. </h3> <br>

Greetings <b>$loginuser!!</b><br>
You have successfully registered for <b>$event</b> in <b>Kshitij'21 - ‘Har Dil Ek Sitara’</b>. 
<br><br>
<b><u>Participants please note</b></u>:<br>
Slots will be provided on a <b>first come first served basis</b> and in case your slot is confirmed, you will be receiving a confirmation email from our end.<br>
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
$headers .= "From: testmailkshitij@gmail.com";

if(empty($p2) && empty($p3) && empty($p4) && empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1;
    if(isDigits($p1num)){
        // $phonevalidate=true;
        $mob = $p1num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
    
    // $fullname="Aman";
}
elseif(empty($p3) && empty($p4) && empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2;
    if(isDigits($p1num) && isDigits($p2num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
    
} 
elseif(empty($p4) && empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3;
    if(isDigits($p1num) && isDigits($p2num) && isDigits($p3num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num." ".$p3num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }        
}  
elseif(empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4;
    if(isDigits($p1num) && isDigits($p2num) && isDigits($p3num) && isDigits($p4num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
    
}
elseif(empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5;
    if(isDigits($p1num) && isDigits($p2num) && isDigits($p3num) && isDigits($p4num) && isDigits($p5num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
}
elseif(empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5." \nP6 : ".$p6;
    if(isDigits($p1num) && isDigits($p2num) && isDigits($p3num) && isDigits($p4num) && isDigits($p5num) && isDigits($p6num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num." \nP6 ".$p6num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
}
elseif(empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5." \nP6 : ".$p6." \nP7 : ".$p7;
    if(isDigits($p1num) && isDigits($p2num) && isDigits($p3num) && isDigits($p4num) && isDigits($p5num) && isDigits($p6num) && isDigits($p7num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num." \nP6 ".$p6num." \nP7 ".$p7num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
}
elseif(!empty($p2) && !empty($p3) && !empty($p4) && !empty($p5) && !empty($p6) && !empty($p7) && !empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5." \nP6 : ".$p6." \nP7 : ".$p8." \nP7 : ".$p8;
    if(isDigits($p1num) && isDigits($p2num) && isDigits($p3num) && isDigits($p4num) && isDigits($p5num) && isDigits($p6num) && isDigits($p7num) && isDigits($p8num)){
        // $phonevalidate=true;
        $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num." \nP6 ".$p6num." \nP7 ".$p7num." \nP8 ".$p8num;
    }else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
}



if(!empty($npa1) && !empty($npa2)){
    $fullname = $fullname." \nNPA1 ".$npa1." \nNPA2 ".$npa2;
    if(isDigits($npa1num) && isDigits($npa2num)){
        $mob = $mob." \nNPA1: ".$npa1num." \nNPA2: ".$npa2num;
    }
    else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
}
elseif(!empty($npa1)){
    $fullname = $fullname." \nNPA1 ".$npa1;
    if(isDigits($npa1num)){
        $mob = $mob." \nNPA1: ".$npa1num;
    }
    else{
        echo '<script>alert("Enter Valid Number")</script>';
       $everything=false;
    }
}
elseif(empty($npa2) && empty($npa1)){
    $fullname = $fullname;
    $mob = $mob;
}



    if($everything){
        

        //$query="insert into test (car_name,images) values('$name','$images')";
        // $fire=mysqli_query($con,$query);
        // if($fire)
        // {
        //     move_uploaded_file($file_tmp1, $location.$file1);
        //     move_uploaded_file($file_tmp2, $location.$file2);
        //     move_uploaded_file($file_tmp3, $location.$file3);
        //     move_uploaded_file($file_tmp4, $location.$file4);
        //     echo "success";
        // }
        // else
        // {
        //     echo "failed";
        // }


        $sql = "INSERT INTO `cceventregi` (`ccid`, `college_name`,`email_id`,`dept_name`,`event_name`,`participant_name`,`phone_number`,`idproof`,`govt_id`,`attachment`,`timeofregistration`) VALUES ('$loginuser', '$college_name','$email,$p1email','$deptname','$event','$fullname','$mob','$images','$govt_images','$attachment',current_timestamp());";

        // Execute the query
        if($conn->query($sql) == true){
        // echo "Successfully inserted";
        
        // echo '<script>alert("registered succesfully")</script>';

       
        // header("location: ncpeventregistration.php");
        // Flag for successful insertion
        move_uploaded_file($file_tmp1, $location.$file1);
        move_uploaded_file($file_tmp2, $location.$file2);
        move_uploaded_file($file_tmp3, $location.$file3);
        move_uploaded_file($file_tmp4, $location.$file4);
        move_uploaded_file($file_tmp5, $location.$file5);
        move_uploaded_file($file_tmp6, $location.$file6);
        move_uploaded_file($file_tmp7, $location.$file7);
        move_uploaded_file($file_tmp8, $location.$file8);
        move_uploaded_file($file_tmpnpa1, $location.$filenpa1);
        move_uploaded_file($file_tmpnpa2, $location.$filenpa2);
        
        move_uploaded_file($govt_file_tmp1, $location.$govt_file1);
        move_uploaded_file($govt_file_tmp2, $location.$govt_file2);
        move_uploaded_file($govt_file_tmp3, $location.$govt_file3);
        move_uploaded_file($govt_file_tmp4, $location.$govt_file4);
        move_uploaded_file($govt_file_tmp5, $location.$govt_file5);
        move_uploaded_file($govt_file_tmp6, $location.$govt_file6);
        move_uploaded_file($govt_file_tmp7, $location.$govt_file7);
        move_uploaded_file($govt_file_tmp8, $location.$govt_file8);
        move_uploaded_file($govt_file_tmpnpa1, $location.$govt_filenpa1);
        move_uploaded_file($govt_file_tmpnpa2, $location.$govt_filenpa2);

        if (mail($to_email, $subject, $body, $headers)) {
            // echo "Email successfully sent to $to_email...";
        } 

        echo "<script>alert('Thank you for Registering for $event an Acknowledgement for the same has been sent to your Registered Email !')</script>";
        echo '<script>window.location.href = "../dashboard/CC_dashboard.php";</script>';
        $insert = true;
                                    } 
        else{
            echo "ERROR: $sql <br> $conn->error";
        }

                        
    



  }
  else{
    echo '<script>alert("Hey Please Fill Carefully !")</script>';
}

    }
      ?>





<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
     <!--  meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Global1.css">
    <title>CC Event Registration</title>

    <style>
               @media only screen and (max-width: 600px) {
    
    body{
display:flex;
flex-direction:column;
background-repeat: none;
background-size: cover;
background-attachment: fixed;
text-align: center;
}

p{
font-size: 15px;
}
.container-manual {
width: 80%;
padding: 20px 20px;
border-radius:10px;

}
input {
width: 100%;
}
h1{
font-size: 45px;
}
input{
padding:6px 10px;
}
.form-label{
font-size:15px;
}
header{
width:100%;
}
}
    </style>

    <!-- function for geetting -->
    <script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getEvent(val) {
    $("#loader").show();
	$.ajax({
	type: "POST",
	url: "./ajax/get-department-event-ep.php",
	data:'department_id='+val,
	success: function(data){
		$("#event-list").html(data);
		//$("#loader").hide();
	}
	});
}
</script>
<!-- end of getting -->
</head>

<?php
  
  if(!isset($_SESSION['ccloggedin']))
  {
      header("location:../CC/cclogin.php");
      exit;
  }

?>
<body>

  <header class="dashboard">
      <?php include "../global/cc_sidebar.php" ?>
    </header>

    <div class="container-manual">
        <h1>CC Event Registration Form</h1>
        <p>Enter your details and submit this form to register </p>
        <hr>
        <!-- display success message -->
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?>


        <form action="cceventregistration.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cc" class="form-label">College Code</label>
                <input type="text" name="cc" id="cc" value = "<?php echo $loginuser;?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="collegename" class="form-label">College Name</label>
                <input type="text" name="collegename" id="collegename" value = "<?php echo $college_name;?>" readonly   required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value = "<?php echo $email;?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="deptname" class="form-label">Department Name</label>
                <select name="department"
                id="department-list" 
                required
                onChange="getEvent(this.value);">
                <option value="" >Select Department</option>
                <?php
                foreach ($departmentResult as $department) {
                    ?>
                <option value="<?php echo $department["dept_id"]; ?>"><?php echo $department["dept_name"]; ?></option>
                <?php
                }
                ?>
                </select>
            </div>

            <!-- displaying events -->
            <div class="mb-3" id="events">
                <label>Event Name:</label><br /> 
                 <select name="event" required id="event-list">
                <option value="">Select Event</option>
                </select>
            </div>

            <div class="mb-3" id="attachment" name ="attachment" style=display:none>
                <label for="attachment" class="form-label">Video Submission Link</label>
                <input type="text" name="attachment" id="attachment" >
            </div>
            <div class="mb-3" id="participant1" name ="participant1">
                <label for="participant1" class="form-label">Participant 1 Name</label>
                <input type="text" name="participant1" id="participant1" required>
            </div>
            <div class="mb-3" id="p1num" name ="p2num">
                <label for="p1num" class="form-label">Participant 1 Mobile Number</label>
                <input type="text" name="p1num" id="p1num" required>
            </div>
            <div class="mb-3">
                <label for="p1email" class="form-label">Participant 1 Email</label>
                <input type="email" name="p1email" id="p1email" required>
            </div>
            <div class="mb-3">
                <label for="img1" class="form-label">College ID proof / Fee Receipt </label>
                <input class="black" type="file" name="img1" id="img1" required accept="image/png, image/jpeg, image/jpg" >
            </div>
            <div class="mb-3">
                <label for="govt_img1" class="form-label">Govt. ID proof </label>
                <input class="black" type="file" name="govt_img1" id="govt_img1" accept="image/png, image/jpeg, image/jpg" >
            </div>


            <div class="mb-3" id="participant2" name ="participant2" style=display:none>
                <label for="participant2" class="form-label">Participant 2 Name</label>
                <input type="text" name="participant2" id="participant2">
            </div>

            <div class="mb-3" id="p2num" name ="p2num" style=display:none>
                <label for="p2num" class="form-label">Participant 2 Mobile Number</label>
                <input type="text" name="p2num" id="p2num">
            </div>
            <div class="mb-3" id="dimg2" name="dimg2" style=display:none>
                <label for="img2" class="form-label" >ID proof </label>
                <input class="black" type="file" name="img2" id="img2" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="govt_dimg2" name="govt_dimg2" style=display:none>
                <label for="govt_img2" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img2" id="govt_img2" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="participant3" name ="participant3" style=display:none>
                <label for="participant3" class="form-label">participant 3 Name</label>
                <input type="text" name="participant3" id="participant3">
            </div>
            <div class="mb-3" id="p3num" name ="p3num" style=display:none>
                <label for="p3num" class="form-label">Participant 3 Mobile Number</label>
                <input type="text" name="p3num" id="p3num">
            </div>
            <div class="mb-3" id="dimg3" name="dimg3" style=display:none>
                <label for="img3" class="form-label">ID proof </label>
                <input class="black" type="file" name="img3" id="img3" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dimg3" name="govt_dimg3" style=display:none>
                <label for="govt_img3" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img3" id="govt_img3" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="participant4" name ="participant4" style=display:none>
                <label for="participant4" class="form-label">participant 4 Name</label>
                <input type="text" name="participant4" id="participant4">
            </div>

            <div class="mb-3" id="p4num" name ="p4num" style=display:none>
                <label for="p4num" class="form-label">Participant 4 Mobile Number</label>
                <input type="text" name="p4num" id="p4num">
            </div>
            <div class="mb-3" id="dimg4" name="dimg4" style=display:none>
                <label for="img4" class="form-label">ID proof </label>
                <input class="black" type="file" name="img4" id="img4" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dimg4" name="govt_dimg4" style=display:none>
                <label for="govt_img4" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img4" id="govt_img4" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="participant5" name ="participant5" style=display:none>
                <label for="participant5" class="form-label">participant 5 Name</label>
                <input type="text" name="participant5" id="participant5">
            </div>
            <div class="mb-3" id="p5num" name ="p5num" style=display:none>
                <label for="p5num" class="form-label">Participant 5 Mobile Number</label>
                <input type="text" name="p5num" id="p5num">
            </div>
            <div class="mb-3" id="dimg5" name="dimg5" style=display:none>
                <label for="img5" class="form-label">ID proof </label>
                <input class="black" type="file" name="img5" id="img5" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dimg5" name="govt_dimg5" style=display:none>
                <label for="govt_img5" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img5" id="govt_img5" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="participant6" name ="participant6" style=display:none>
                <label for="participant6" class="form-label">participant 6 Name</label>
                <input type="text" name="participant6" id="participant6">
            </div>
            <div class="mb-3" id="p6num" name ="p6num" style=display:none>
                <label for="p6num" class="form-label">Participant 6 Mobile Number</label>
                <input type="text" name="p6num" id="p6num">
            </div>
            <div class="mb-3" id="dimg6" name="dimg6" style=display:none>
                <label for="img6" class="form-label">ID proof </label>
                <input class="black" type="file" name="img6" id="img6" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dimg6" name="govt_dimg6" style=display:none>
                <label for="govt_img6" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img6" id="govt_img6" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="participant7" name ="participant7" style=display:none>
                <label for="participant7" class="form-label">participant 7 Name</label>
                <input type="text" name="participant7" id="participant7">
            </div>
            <div class="mb-3" id="p7num" name ="p7num" style=display:none>
                <label for="p7num" class="form-label">Participant 7 Mobile Number</label>
                <input type="text" name="p7num" id="p7num">
            </div>
            <div class="mb-3" id="dimg7" name="dimg7" style=display:none>
                <label for="img7" class="form-label">ID proof </label>
                <input class="black" type="file" name="img7" id="img7" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dimg7" name="govt_dimg7" style=display:none>
                <label for="govt_img7" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img7" id="govt_img7" accept="image/png, image/jpeg, image/jpg">
            </div>

            <div class="mb-3" id="participant8" name ="participant8" style=display:none>
                <label for="participant8" class="form-label">participant 8 Name</label>
                <input type="text" name="participant8" id="participant8">
            </div>
            <div class="mb-3" id="p8num" name ="p8num" style=display:none>
                <label for="p8num" class="form-label">Participant 8 Mobile Number</label>
                <input type="text" name="p8num" id="p8num">
            </div>
            <div class="mb-3" id="dimg8" name="dimg8" style=display:none>
                <label for="img8" class="form-label">ID proof </label>
                <input class="black" type="file" name="img8" id="img8" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dimg8" name="govt_dimg8" style=display:none>
                <label for="govt_img8" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_img8" id="govt_img8" accept="image/png, image/jpeg, image/jpg">
            </div>


            <!-- npa1 ke details -->
            <div class="mb-3" id="npa1" name ="npa1" style=display:none>
                <label for="npa1" class="form-label">NPA 1 Name : </label>
                <input type="text" name="npa1" id="npa1">
            </div>
            <div class="mb-3" id="npa1num" name ="npa1num" style=display:none>
                <label for="npa1num" class="form-label">NPA 1 Mobile Number</label>
                <input type="text" name="npa1num" id="npa1num">
            </div>
            <div class="mb-3" id="dnpa1img" name="dnpa1img" style=display:none>
                <label for="npa1img" class="form-label">College ID proof / Fee Receipt </label>
                <input class="black" type="file" name="npa1img" id="npa1img" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dnpa1img" name="govt_dnpa1img" style=display:none>
                <label for="govt_npa1img" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_npa1img" id="govt_npa1img" accept="image/png, image/jpeg, image/jpg">
            </div>

            <!-- npa2 ke details -->
            <div class="mb-3" id="npa2" name ="npa2" style=display:none>
                <label for="npa2" class="form-label">NPA 2 Name : </label>
                <input type="text" name="npa2" id="npa2">
            </div>
            <div class="mb-3" id="npa2num" name ="npa2num" style=display:none>
                <label for="npa2num" class="form-label">NPA 2 Mobile Number</label>
                <input type="text" name="npa2num" id="npa2num">
            </div>
            <div class="mb-3" id="dnpa2img" name="dnpa2img" style=display:none>
                <label for="npa2img" class="form-label">College ID proof / Fee Receipt </label>
                <input class="black" type="file" name="npa2img" id="npa2img" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="mb-3" id="govt_dnpa2img" name="govt_dnpa2img" style=display:none>
                <label for="govt_npa2img" class="form-label" >Govt. ID proof </label>
                <input class="black" type="file" name="govt_npa2img" id="govt_npa2img" accept="image/png, image/jpeg, image/jpg">
            </div>  
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

            
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     <script>
        //  $(document).ready(function(){  
            $('#attachment').on('change', function() {
            if (($("input#attachment").val().indexOf("drive.google.com") != -1) || ($("input#attachment").val().indexOf("youtu.be") != -1) || ($("input#attachment").val().indexOf("youtube") != -1) || ($("input#attachment").val().indexOf("instagram") != -1)){
                
            }  
            else{
                alert('Please Enter the Correct Link');
                $("input#attachment").val("");
            }
              
        }); 
     </script>

     <!-- for mobile num -->
     <script>
        //  $(document).ready(function(){  
            $('#p1num').on('change', function() {
            if ($.isNumeric($("input#p1num").val()) && $("input#p1num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p1num").val("");
            }
              
        }); 

        $('#p2num').on('change', function() {
            if ($.isNumeric($("input#p2num").val()) && $("input#p2num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p2num").val("");
            }
              
        }); 

        $('#p3num').on('change', function() {
            if ($.isNumeric($("input#p3num").val()) && $("input#p3num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p3num").val("");
            }
              
        }); 


        $('#p4num').on('change', function() {
            if ($.isNumeric($("input#p4num").val()) && $("input#p4num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p4num").val("");
            }
              
        });

        $('#p5num').on('change', function() {
            if ($.isNumeric($("input#p5num").val()) && $("input#p5num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p5num").val("");
            }
              
        });  

        $('#p6num').on('change', function() {
            if ($.isNumeric($("input#p6num").val()) && $("input#p6num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p6num").val("");
            }
              
        });  

        $('#p7num').on('change', function() {
            if ($.isNumeric($("input#p7num").val()) && $("input#p7num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p7num").val("");
            }
              
        });  

        $('#p8num').on('change', function() {
            if ($.isNumeric($("input#p8num").val()) && $("input#p8num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#p8num").val("");
            }
              
        }); 

        $('#npa1num').on('change', function() {
            if ($.isNumeric($("input#npa1num").val()) && $("input#npa1num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#npa1num").val("");
            }
              
        }); 

        $('#npa2num').on('change', function() {
            if ($.isNumeric($("input#npa2num").val()) && $("input#npa2num").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#npa2num").val("");
            }
              
        });
     </script>

   <!-- for collegeid and fee recieipt -->
   <script>
       $('#img1').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img1").val("")
  } 
});
<!-- </script>

<script> -->
$('#img2').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img2").val("")
  } 
});
<!-- </script>
<script> -->
$('#img3').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img3").val("")
  } 
});
<!-- </script>
<script> -->
$('#img4').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img4").val("")
  } 
});
<!-- </script>
<script> -->
$('#img5').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img5").val("")
  } 
});
<!-- </script>
<script> -->
$('#img6').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img6").val("")
  } 
});
<!-- </script>
<script> -->
$('#img7').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img7").val("")
  } 
});
<!-- </script>
<script> -->
$('#img8').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#img8").val("")
  } 
});

$('#npa1img').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#npa1img").val("")
  } 
});

$('#npa2img').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#npa2img").val("")
  } 
});

   </script>
   
<!-- for govt id  -->
<script>
       $('#govt_img1').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img1").val("")
  } 
});
<!-- </script>

<script> -->
$('#govt_img2').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img2").val("")
  } 
});
<!-- </script>
<script> -->
$('#govt_img3').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img3").val("")
  } 
});
<!-- </script>
<script> -->
$('#govt_img4').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img4").val("")
  } 
});
<!-- </script>
<script> -->
$('#govt_img5').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img5").val("")
  } 
});
<!-- </script>
<script> -->
$('#govt_img6').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img6").val("")
  } 
});
<!-- </script>
<script> -->
$('#govt_img7').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img7").val("")
  } 
});
<!-- </script>
<script> -->
$('#govt_img8').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_img8").val("")
  } 
});

$('#govt_npa1img').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_npa1img").val("")
  } 
});

$('#govt_npa2img').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_npa2img").val("")
  } 
});
   </script>
   
   <script>
//for attachment
$('#event-list').on('change', function() {
             
             if((this.value == "Mashup Singing") || (this.value=="Rapping") || (this.value=="Classical singing") || (this.value=="Western Duet Singing") || (this.value=="Blended") || (this.value=="Solo classical dance") || (this.value=="Bollywood solo singing") || (this.value=="Western solo dance") || (this.value=="Mono Acting") || (this.value=="Short video choreography") || (this.value=="Fashion Styling Event")){
                 // $('#participant2').attr('required', true);
                 $("[name='attachment']").prop("required", true);
                 $('#attachment').show();
             }
             //alert( this.value ); // or $(this).val()
             else {
                // or $(this).val()
                 $("[name='attachment']").prop("required", false);
                 $('#attachment').hide();
             }
             });




//for events

$('#event-list').on('change', function() {
             
             if((this.value=="Western Duet Singing") || (this.value=="Blended") || (this.value=="Duo play") || (this.value=="Word Game") || (this.value=="Mandala + Quilling") || (this.value=="News Reporting")  || (this.value=="Treasure Hunt") || (this.value=="Rocket League") || (this.value=="IPL Auction")){
                 alert(this.value);
                 // $('#participant2').attr('required', true);
 
                 $("[name='participant2']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $('#participant2').show();
                 $('#p2num').show();
                 $('#dimg2').show();
                 $('#govt_dimg2').show();
 
                 
                 // $('#freeform_first_name').removeAttr('required');
                 $('#p3num').hide();
                  $('#p4num').hide();
                  $('#p5num').hide();
                  $('#p6num').hide();
                  $('#p7num').hide();
                  $('#p8num').hide();
                  $("[name='p3num']").prop("required",false);
                  $("[name='p4num']").prop("required",false);
                  $("[name='p5num']").prop("required",false);
                  $("[name='p6num']").prop("required",false);
                  $("[name='p7num']").prop("required",false);
                  $("[name='p8num']").prop("required",false);
 
                  $('#dimg3').hide();
                  $('#dimg4').hide();
                  $('#dimg5').hide();
                  $('#dimg6').hide();
                  $('#dimg7').hide();
                  $('#dimg8').hide();
 
                  $('#govt_dimg4').hide();
                  $('#govt_dimg3').hide();
                  $('#govt_dimg5').hide();
                  $('#govt_dimg6').hide();
                  $('#govt_dimg7').hide();
                  $('#govt_dimg8').hide();
 
                  $("[name='img3']").prop("required", false);
                  $("[name='img4']").prop("required", false);
                  $("[name='img5']").prop("required", false);
                  $("[name='img6']").prop("required", false);
                  $("[name='img7']").prop("required", false);
                  $("[name='img8']").prop("required", false);
 
                  $('#participant3').hide();
                  $('#participant4').hide();
                  $('#participant5').hide();
                  $('#participant6').hide();
                  $('#participant7').hide();  
                  $('#participant8').hide();
                  $("[name='participant3']").prop("required", false);
                  $("[name='participant4']").prop("required", false);
                  $("[name='participant5']").prop("required", false);
                  $("[name='participant6']").prop("required", false);
                  $("[name='participant7']").prop("required", false);
                  $("[name='participant8']").prop("required", false);
             }
 
             else if((this.value == "Rapping") || (this.value=="Classical singing") || (this.value=="Portrait Photography")){
                 alert(this.value);
                 // $('#participant2').attr('required', true);
 
                
                 $('#npa1').show();
                 $('#npa1num').show();
                 $('#dnpa1img').show();
                 $('#govt_dnpa1img').show();
 
                 
                 // $('#freeform_first_name').removeAttr('required');
                 $('#p2num').hide();
                 $('#p3num').hide();
                  $('#p4num').hide();
                  $('#p5num').hide();
                  $('#p6num').hide();
                  $('#p7num').hide();
                  $('#p8num').hide();
                  $("[name='p2num']").prop("required",false);
                  $("[name='p3num']").prop("required",false);
                  $("[name='p4num']").prop("required",false);
                  $("[name='p5num']").prop("required",false);
                  $("[name='p6num']").prop("required",false);
                  $("[name='p7num']").prop("required",false);
                  $("[name='p8num']").prop("required",false);
 
                  $('#dimg2').hide();
                  $('#dimg3').hide();
                  $('#dimg4').hide();
                  $('#dimg5').hide();
                  $('#dimg6').hide();
                  $('#dimg7').hide();
                  $('#dimg8').hide();
 
                  $('#govt_dimg2').hide();
                  $('#govt_dimg4').hide();
                  $('#govt_dimg3').hide();
                  $('#govt_dimg5').hide();
                  $('#govt_dimg6').hide();
                  $('#govt_dimg7').hide();
                  $('#govt_dimg8').hide();
 
                  $("[name='img2']").prop("required", false);
                  $("[name='img3']").prop("required", false);
                  $("[name='img4']").prop("required", false);
                  $("[name='img5']").prop("required", false);
                  $("[name='img6']").prop("required", false);
                  $("[name='img7']").prop("required", false);
                  $("[name='img8']").prop("required", false);
 
                  $('#participant2').hide();
                  $('#participant3').hide();
                  $('#participant4').hide();
                  $('#participant5').hide();
                  $('#participant6').hide();
                  $('#participant7').hide();  
                  $('#participant8').hide();
                  $("[name='participant2']").prop("required", false);
                  $("[name='participant3']").prop("required", false);
                  $("[name='participant4']").prop("required", false);
                  $("[name='participant5']").prop("required", false);
                  $("[name='participant6']").prop("required", false);
                  $("[name='participant7']").prop("required", false);
                  $("[name='participant8']").prop("required", false);
             }
 
             else if ((this.value=="Panache") || (this.value=="Street dance") || (this.value == "Bollywood Group Dance")){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='participant3']").prop("required", true);
                 $("[name='participant4']").prop("required", true);
                 
                 $("[name='p2num']").prop("required", true);
                 $("[name='p3num']").prop("required", true);
                 $("[name='p4num']").prop("required", true);
                 
 
                 $("[name='img2']").prop("required", true);
                 $("[name='img3']").prop("required", true);
                 $("[name='img4']").prop("required", true);
 
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
                 $('#participant5').show();
                 $('#participant6').show();
                 $('#participant7').show();
                 $('#participant8').show();
 
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#p5num').show();
                  $('#p6num').show();
                  $('#p7num').show();
                  $('#p8num').show();
 
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
                 $('#dimg5').show();
                 $('#dimg6').show();
                 $('#dimg7').show();
                 $('#dimg8').show();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
                 $('#govt_dimg5').show();
                 $('#govt_dimg6').show();
                 $('#govt_dimg7').show();
                 $('#govt_dimg8').show();
 
                 $("[name='participant5']").prop("required", false);
                 $("[name='participant6']").prop("required", false);
                 $("[name='participant7']").prop("required", false);
                 $("[name='participant8']").prop("required", false);
 
                 $("[name='p5num']").prop("required", false);
                 $("[name='p6num']").prop("required", false);
                 $("[name='p7num']").prop("required", false);
                 $("[name='p8num']").prop("required", false);
 
                 $("[name='img5']").prop("required", false);
                 $("[name='img6']").prop("required", false);
                 $("[name='img7']").prop("required", false);
                 $("[name='img8']").prop("required", false);
             }
             else if(this.value == "Short Film Making"){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
 
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
 
                 $("[name='participant3']").prop("required", false);
                 $("[name='participant4']").prop("required", false);
                 $("[name='participant5']").prop("required", false);
                 $("[name='participant6']").prop("required", false);
                 $("[name='participant7']").prop("required", false);
                 $("[name='participant8']").prop("required", false);
 
                 $("[name='p3num']").prop("required", false);
                 $("[name='p4num']").prop("required", false);
                 $("[name='p5num']").prop("required", false);
                 $("[name='p6num']").prop("required", false);
                 $("[name='p7num']").prop("required", false);
                 $("[name='p8num']").prop("required", false);
 
                 $("[name='img3']").prop("required", false);
                 $("[name='img4']").prop("required", false);
                 $("[name='img5']").prop("required", false);
                 $("[name='img6']").prop("required", false);
                 $("[name='img7']").prop("required", false);
                 $("[name='img8']").prop("required", false);
             }
             else if(this.value == "Youtube Fest"){
                 alert(this.value);
                 $('#participant2').show();       
                 $('#p2num').show();
                 $('#dimg2').show();
                 $('#govt_dimg2').show();
 
 
                 $('#participant3').hide();
                  $('#participant4').hide();
                  $('#participant5').hide();
                  $('#participant6').hide();
                  $('#participant7').hide();
                  $('#participant8').hide();
 
 
                  $('#p3num').hide();
                  $('#p4num').hide();
                  $('#p5num').hide();
                  $('#p6num').hide();
                  $('#p7num').hide();
                  $('#p8num').hide();
                  
 
                  $('#dimg3').hide();
                  $('#dimg4').hide();
                  $('#dimg5').hide();
                  $('#dimg6').hide();
                  $('#dimg7').hide();
                  $('#dimg8').hide();
 
 
                  $('#govt_dimg3').hide();
                  $('#govt_dimg4').hide();
                  $('#govt_dimg5').hide();
                  $('#govt_dimg6').hide();
                  $('#govt_dimg7').hide();
                  $('#govt_dimg8').hide();
 
 
                 $("[name='participant3']").prop("required", false);
                 $("[name='participant4']").prop("required", false);
                 $("[name='participant5']").prop("required", false);
                 $("[name='participant6']").prop("required", false);
                 $("[name='participant7']").prop("required", false);
                 $("[name='participant8']").prop("required", false);
                 $("[name='p3num']").prop("required", false);
                 $("[name='p4num']").prop("required", false);
                 $("[name='p5num']").prop("required", false);
                 $("[name='p6num']").prop("required", false);
                 $("[name='p7num']").prop("required", false);
                 $("[name='p8num']").prop("required", false);
                 $("[name='img3']").prop("required", false);
                 $("[name='img4']").prop("required", false);
                 $("[name='img5']").prop("required", false);
                 $("[name='img6']").prop("required", false);
                 $("[name='img7']").prop("required", false);
                 $("[name='img8']").prop("required", false);
 
                 
 
             }
             else if(this.value == "Ad Film Making"){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
 
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
                 $('#participant5').show();
 
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#p5num').show();
 
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
                 $('#dimg5').show();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
                 $('#govt_dimg5').show();
 
                 $("[name='participant3']").prop("required", false);
                 $("[name='participant4']").prop("required", false);
                 $("[name='participant5']").prop("required", false);
                 $("[name='participant6']").prop("required", false);
                 $("[name='participant7']").prop("required", false);
                 $("[name='participant8']").prop("required", false);
                 $("[name='p3num']").prop("required", false);
                 $("[name='p4num']").prop("required", false);
                 $("[name='p5num']").prop("required", false);
                 $("[name='p6num']").prop("required", false);
                 $("[name='p7num']").prop("required", false);
                 $("[name='p8num']").prop("required", false);
                 $("[name='img3']").prop("required", false);
                 $("[name='img4']").prop("required", false);
                 $("[name='img5']").prop("required", false);
                 $("[name='img6']").prop("required", false);
                 $("[name='img7']").prop("required", false);
                 $("[name='img8']").prop("required", false);
                
             }
             
             else if((this.value=="The Ultimate Challenge") || (this.value=="BGMI")){
                 alert(this.value);
                
                 $("[name='participant2']").prop("required", true);
                 $("[name='participant3']").prop("required", true);
                 $("[name='participant4']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='p3num']").prop("required", true);
                 $("[name='p4num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $("[name='img3']").prop("required", true);
                 $("[name='img4']").prop("required", true);
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
 
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
 
                 $('#p5num').hide();
                  $('#p6num').hide();
                  $('#p7num').hide();
                  $('#p8num').hide();
                  $("[name='p5num']").prop("required",false);
                  $("[name='p6num']").prop("required",false);
                  $("[name='p7num']").prop("required",false);
                  $("[name='p8num']").prop("required",false);
 
                  $('#govt_dimg5').hide();
                  $('#govt_dimg6').hide();
                  $('#govt_dimg7').hide();
                  $('#govt_dimg8').hide();
 
                  $('#dimg5').hide();
                  $('#dimg6').hide();
                  $('#dimg7').hide();
                  $('#dimg8').hide();
 
                  $("[name='img5']").prop("required", false);
                  $("[name='img6']").prop("required", false);
                  $("[name='img7']").prop("required", false);
                  $("[name='img8']").prop("required", false);
                  
                  $('#participant5').hide();
                  $('#participant6').hide();
                  $('#participant7').hide();  
                  $('#participant8').hide();
                  $("[name='participant5']").prop("required", false);
                  $("[name='participant6']").prop("required", false);
                  $("[name='participant7']").prop("required", false);
                  $("[name='participant8']").prop("required", false);
             }
             else if((this.value == "CSGO") || (this.value == "Valorant") || (this.value == "Football")){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='participant3']").prop("required", true);
                 $("[name='participant4']").prop("required", true);
                 $("[name='participant5']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='p3num']").prop("required", true);
                 $("[name='p4num']").prop("required", true);
                 $("[name='p5num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $("[name='img3']").prop("required", true);
                 $("[name='img4']").prop("required", true);
                 $("[name='img5']").prop("required", true);
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
                 $('#participant5').show();
                 $('#participant6').hide();
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#p5num').show();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
                 $('#govt_dimg5').show();
 
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
                 $('#dimg5').show();   
 
                 $('#p6num').hide();
                  $('#p7num').hide();
                  $('#p8num').hide();
                  $("[name='p6num']").prop("required",false);
                  $("[name='p7num']").prop("required",false);
                  $("[name='p8num']").prop("required",false);
                  
                  $('#dimg6').hide();
                  $('#dimg7').hide();
                  $('#dimg8').hide();
 
                  $('#govt_dimg6').hide();
                  $('#govt_dimg7').hide();
                  $('#govt_dimg8').hide();
 
                  $("[name='img6']").prop("required", false);
                  $("[name='img7']").prop("required", false);
                  $("[name='img8']").prop("required", false);
                 
                  $('#participant6').hide();
                  $('#participant7').hide();  
                  $('#participant8').hide();
                  $("[name='participant6']").prop("required", false);
                  $("[name='participant7']").prop("required", false);
                  $("[name='participant8']").prop("required", false);
             }
             else if((this.value == "Cricket") || (this.value == "Kabbadi")){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='participant3']").prop("required", true);
                 $("[name='participant4']").prop("required", true);
                 $("[name='participant5']").prop("required", true);
                 $("[name='participant6']").prop("required", true);
                 $("[name='participant7']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='p3num']").prop("required", true);
                 $("[name='p4num']").prop("required", true);
                 $("[name='p5num']").prop("required", true);
                 $("[name='p6num']").prop("required", true);
                 $("[name='p7num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $("[name='img3']").prop("required", true);
                 $("[name='img4']").prop("required", true);
                 $("[name='img5']").prop("required", true);
                 $("[name='img6']").prop("required", true);
                 $("[name='img7']").prop("required", true);
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
                 $('#participant5').show();
                 $('#participant6').show();
                 $('#participant7').show();
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#p5num').show();
                 $('#p6num').show();
                 $('#p7num').show();
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
                 $('#dimg5').show();
                 $('#dimg6').show();
                 $('#dimg7').show();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
                 $('#govt_dimg5').show();
                 $('#govt_dimg6').show();
                 $('#govt_dimg7').show();
 
                 $('#p8num').hide();
                 $("[name='p8num']").prop("required",false);
                 $("[name='img8']").prop("required", false);
                 $('#dimg8').hide();
                 $('#govt_dimg8').hide();
                 $("[name='participant8']").prop("required", false);
                 $('#participant8').hide();
             }
             else if(this.value == "Hindi band event"){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='participant3']").prop("required", true);
                 $("[name='participant4']").prop("required", true);
                 // $("[name='participant5']").prop("required", true);
                 // $("[name='participant6']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='p3num']").prop("required", true);
                 $("[name='p4num']").prop("required", true);
                 // $("[name='p5num']").prop("required", true);
                 // $("[name='p6num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $("[name='img3']").prop("required", true);
                 $("[name='img4']").prop("required", true);
                 // $("[name='img5']").prop("required", true);
                 // $("[name='img6']").prop("required", true);
                 $('#participant2').show();
                 $('#participant3').show();
                 $('#participant4').show();
                 $('#participant5').show();
                 $('#participant6').show();
                 $('#participant7').hide();
                 $('#participant8').hide();
                
                 $('#npa1num').show();
                 $('#npa2num').show();
                 $('#npa1').show();
                 $('#npa2').show(); 
                 $('#dnpa1img').show();
                 $('#dnpa2img').show();
                 $('#govt_dnpa1img').show();
                 $('#govt_dnpa2img').show();
 
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#p5num').show();
                 $('#p6num').show();
                 $('#p7num').hide();
                 $('#p8num').hide();
                 $('#dimg2').show();
                 $('#dimg3').show();
                 $('#dimg4').show();
                 $('#dimg5').show();
                 $('#dimg6').show();
                 $('#dimg7').hide();
                 $('#dimg8').hide();
 
                 $('#govt_dimg2').show();
                 $('#govt_dimg3').show();
                 $('#govt_dimg4').show();
                 $('#govt_dimg5').show();
                 $('#govt_dimg6').show();
                 $('#govt_dimg7').hide();
                 $('#govt_dimg8').hide();
             }
             //alert( this.value ); // or $(this).val()
             else {
                 alert( this.value ); // or $(this).val()
                 $("[name='participant2']").prop("required", false);
                 $("[name='participant3']").prop("required", false);
                 $("[name='participant4']").prop("required", false);
                 $("[name='participant5']").prop("required", false);
                 $("[name='participant6']").prop("required", false);
                 $("[name='participant7']").prop("required", false);
                 $("[name='participant8']").prop("required", false);
                 $('#participant2').hide();
                 $('#participant3').hide();
                  $('#participant4').hide();
                  $('#participant5').hide();
                  $('#participant6').hide();
                  $('#participant7').hide();
                  $('#participant8').hide();
 
                  $('#p2num').hide();
                  $('#p3num').hide();
                  $('#p4num').hide();
                  $('#p5num').hide();
                  $('#p6num').hide();
                  $('#p7num').hide();
                  $('#p8num').hide();
                  
 
                  $('#dimg2').hide();
                  $('#dimg3').hide();
                  $('#dimg4').hide();
                  $('#dimg5').hide();
                  $('#dimg6').hide();
                  $('#dimg7').hide();
                  $('#dimg8').hide();
 
                  $('#govt_dimg2').hide();
                  $('#govt_dimg3').hide();
                  $('#govt_dimg4').hide();
                  $('#govt_dimg5').hide();
                  $('#govt_dimg6').hide();
                  $('#govt_dimg7').hide();
                  $('#govt_dimg8').hide();
 
                  $("[name='p2num']").prop("required",false);
                  $("[name='p3num']").prop("required",false);
                  $("[name='p4num']").prop("required",false);
                  $("[name='p5num']").prop("required",false);
                  $("[name='p6num']").prop("required",false);
                  $("[name='p7num']").prop("required",false);
                  $("[name='p8num']").prop("required",false);
 
                  $("[name='img2']").prop("required", false);
                  $("[name='img3']").prop("required", false);
                  $("[name='img4']").prop("required", false);
                  $("[name='img5']").prop("required", false);
                  $("[name='img6']").prop("required", false);
                  $("[name='img7']").prop("required", false);
                  $("[name='img8']").prop("required", false);
                  
             }
             });
             </script>
    </body>
</html>

