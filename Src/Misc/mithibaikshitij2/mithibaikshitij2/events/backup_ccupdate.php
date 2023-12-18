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
    $sql = "SELECT userid,collegename,email,phone from cclogin where cclogin.USERID='$loginuser';";
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
//    $deptname = $_POST['department'];
   $p1 = $_POST['participant1'];
   $p2 = $_POST['participant2'];
   $p3 = $_POST['participant3'];
   $p4 = $_POST['participant4'];
   $p5 = $_POST['participant5'];
   $p6 = $_POST['participant6'];
   $p7 = $_POST['participant7'];
   $p8 = $_POST['participant8'];
   $p1num = $_POST['p1num'];
   $p2num = $_POST['p2num'];
   $p3num = $_POST['p3num'];
   $p4num = $_POST['p4num'];
   $p5num = $_POST['p5num'];
   $p6num = $_POST['p6num'];
   $p7num = $_POST['p7num'];
   $p8num = $_POST['p8num'];
   
        echo $event;
        
        
   
        $location="../uploads/";
        $file11=$_FILES['img1']['name'];
        $file1=rand().str_replace(' ','',$file11);
        $file_tmp1=$_FILES['img1']['tmp_name'];
        $file22=$_FILES['img2']['name'];
        $file2=rand().str_replace(' ','',$file22);
        $file_tmp2=$_FILES['img2']['tmp_name'];
        $file33=$_FILES['img3']['name'];
        $file3=rand().str_replace(' ','',$file33);
        $file_tmp3=$_FILES['img3']['tmp_name'];
        $file44=$_FILES['img4']['name'];
        $file4=rand().str_replace(' ','',$file44);
        $file_tmp4=$_FILES['img4']['tmp_name'];
        $file55=$_FILES['img5']['name'];
        $file5=rand().str_replace(' ','',$file55);
        $file_tmp5=$_FILES['img5']['tmp_name'];
        $file66=$_FILES['img6']['name'];
        $file6=rand().str_replace(' ','',$file66);
        $file_tmp6=$_FILES['img6']['tmp_name'];
        $file77=$_FILES['img7']['name'];
        $file7=rand().str_replace(' ','',$file77);
        $file_tmp7=$_FILES['img7']['tmp_name'];
        $file88=$_FILES['img8']['name'];
        $file8=rand().str_replace(' ','',$file88);
        $file_tmp8=$_FILES['img8']['tmp_name'];
        
        $data=[];
        if(!empty($file11) && !empty($file22) && !empty($file33) && !empty($file44) && !empty($file55) && !empty($file66) && !empty($file77) && !empty($file88)){
            $data=[$file1,$file2,$file3,$file4,$file5,$file6,$file7,$file8];
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

    


//event authentication

// $sqll = "SELECT event_name FROM cceventregi WHERE event_name = '$event' and ccid='$loginuser' ";

//             $stmt = mysqli_prepare($conn, $sqll);
            
//                 // Try to execute this statement
//                 if(mysqli_stmt_execute($stmt)){
//                     // echo "hi";
//                     mysqli_stmt_store_result($stmt);
                   
//                     if(mysqli_stmt_num_rows($stmt) > 0)
//                     {
//                         echo '<script>alert("You have already registered for this event!")</script>';
//                         // echo (mysqli_stmt_execute($stmt));
//                         $everything=false;
//                     }
                   
//                 }
//                 else{
//                     echo "Something went wrong";
//                 }
          
        
    
    
    


//EMAIL

$to_email = $email;
$subject = "You Have Successully Registered for  $event";
$body = "Hello ".$loginuser." thank you for registering for  $event.";
$headers = "From: testmailkshitij@gmail.com";

if(empty($p2) && empty($p3) && empty($p4) && empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1;
    $mob = $p1num;
    // $fullname="Aman";
}
elseif(empty($p3) && empty($p4) && empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2;
    $mob = $p1num." \nP2 ".$p2num;
} 
elseif(empty($p4) && empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3;
    $mob = $p1num." \nP2 ".$p2num." ".$p3num;
}  
elseif(empty($p5) && empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4;
    $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num;
}
elseif(empty($p6) && empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5;
    $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num;
}
elseif(empty($p7) && empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5." \nP6 : ".$p6;
    $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num." \nP6 ".$p6num;
}
elseif(empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5." \nP6 : ".$p6." \nP7 : ".$p7;
    $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num." \nP6 ".$p6num." \nP7 ".$p7num;
}
elseif(!empty($p2) && !empty($p3) && !empty($p4) && !empty($p5) && !empty($p6) && !empty($p7) && !empty($p8)){
    $fullname= $p1." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5." \nP6 : ".$p6." \nP7 : ".$p8." \nP7 : ".$p8;
    $mob = $p1num." \nP2 ".$p2num." \nP3 ".$p3num." \nP4 ".$p4num." \nP5 ".$p5num." \nP6 ".$p6num." \nP7 ".$p7num." \nP8 ".$p8num;
}



    if($everything){
        // if (mail($to_email, $subject, $body, $headers)) {
        //     // echo "Email successfully sent to $to_email...";
        // } else {
        //     echo "Email sending failed...";
        // }

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

        function curdate() {
            return date('Y-m-d');
        }
        $event_date_sql = "select event_date from events where event_name = '$event'";
        $event_date_result = mysqli_query($conn,$event_date_sql);
        if (mysqli_num_rows($event_date_result) > 0) {
            while($row = mysqli_fetch_array($event_date_result)) {
            //   echo "Your Event Date is : ".$row['event_date'];
              $evdat = date('Y-m-d',strtotime($row['event_date']));
              echo $evdat;
              echo curdate();
              
              $date1=date_create(curdate());
              $date2=date_create($evdat);
              $diff=date_diff($date1,$date2);
              $gap = $diff->format("%a");
              echo "<br>".$gap;
            if ($gap>='1' && $gap<='3'){
                echo "yes u can update";
                $sql = "update cceventregi set email_id = '$email.$p1email', participant_name = '$fullname', phone_number = '$mob', idproof='$images', attachment='$attachment' where ccid='$loginuser' and event_name='$event';";
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
        echo "success";

        $insert = true;
                                    } 
        else{
            echo "ERROR: $sql <br> $conn->error";
        }


            }
            elseif (!($gap>='1' && $gap<='3')){
                echo "sorry you cannot update";
            }
            }
        }


        
                        
    



  }

    }
      ?>





<!DOCTYPE html>
<html lang="en">
<head>
    
     <!--  meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="ccevent.css">
    
    <title>Registration Form</title>

    <style>
        .form-label{
            width:15rem;
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
<body>

    <div class="container">
        <h1>CC Event Registration Form</h3>
        <p>Enter your details and submit this form to register </p>
        <hr>
        <!-- display success message -->
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?>


        <form action="ccupdate.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="cc" class="form-label">College Code</label>
                <input type="text" name="cc" id="cc" value = "<?php echo $loginuser;?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="collegename" class="form-label">College Name</label>
                <input type="text" name="collegename" id="collegename" value = "<?php echo $college_name;?>" readonly   required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" id="email" value = "<?php echo $email;?>" readonly required>
            </div>

            <!-- <div class="mb-3">
                <label for="deptname" class="form-label">Department Name</label>
                <select name="department"
                id="department-list" 
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
            </div> -->

            <!-- displaying events -->
            <div class="mb-3" id="events">
                <label>Event Name:</label><br /> 
                 <select name="event" id="event-list">
                     <?php 
                     $sql = "select event_name from cceventregi where ccid = '$loginuser';";
                     $records = mysqli_query($conn,$sql);
                        while($data = mysqli_fetch_array($records))
                        {
                            echo "<option value='". $data['event_name'] ."'>" .$data['event_name'] ."</option>";  // displaying data in option menu
                        }	
                     ?>
                

                </select>
            </div>

            <div class="mb-3" id="attachment" name ="attachment" style=display:none>
                <label for="attachment" class="form-label">Attachment Link</label>
                <input type="text" name="attachment" id="attachment" >
            </div>

            <div class="mb-3" id="participant1" name ="participant1">
                <label for="participant1" class="form-label">Participant 1</label>
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
                <label for="img1" class="form-label">ID proof </label>
                <input class="black" type="file" name="img1" id="img1" required >
            </div>

            <div class="mb-3" id="participant2" name ="participant2" style=display:none>
                <label for="participant2" class="form-label">Participant 2</label>
                <input type="text" name="participant2" id="participant2">
            </div>

            <div class="mb-3" id="p2num" name ="p2num" style=display:none>
                <label for="p2num" class="form-label">Participant 2 Mobile Number</label>
                <input type="text" name="p2num" id="p2num">
            </div>
            <div class="mb-3" id="img2" name="img2" style=display:none>
                <label for="img2" class="form-label" >ID proof </label>
                <input class="black" type="file" name="img2" id="img2" >
            </div>

            <div class="mb-3" id="participant3" name ="participant3" style=display:none>
                <label for="participant3" class="form-label">participant 3</label>
                <input type="text" name="participant3" id="participant3">
            </div>
            <div class="mb-3" id="p3num" name ="p3num" style=display:none>
                <label for="p3num" class="form-label">Participant 3 Mobile Number</label>
                <input type="text" name="p3num" id="p3num">
            </div>
            <div class="mb-3" id="img3" name="img3" style=display:none>
                <label for="img3" class="form-label">ID proof </label>
                <input class="black" type="file" name="img3" id="img3" >
            </div>

            <div class="mb-3" id="participant4" name ="participant4" style=display:none>
                <label for="participant4" class="form-label">participant 4</label>
                <input type="text" name="participant4" id="participant4">
            </div>

            <div class="mb-3" id="p4num" name ="p4num" style=display:none>
                <label for="p4num" class="form-label">Participant 4 Mobile Number</label>
                <input type="text" name="p4num" id="p4num">
            </div>
            <div class="mb-3" id="img4" name="img4" style=display:none>
                <label for="img4" class="form-label">ID proof </label>
                <input class="black" type="file" name="img4" id="img4">
            </div>

            <div class="mb-3" id="participant5" name ="participant5" style=display:none>
                <label for="participant5" class="form-label">participant 5</label>
                <input type="text" name="participant5" id="participant5">
            </div>
            <div class="mb-3" id="p5num" name ="p5num" style=display:none>
                <label for="p5num" class="form-label">Participant 5 Mobile Number</label>
                <input type="text" name="p5num" id="p5num">
            </div>
            <div class="mb-3" id="img5" name="img5" style=display:none>
                <label for="img5" class="form-label">ID proof </label>
                <input class="black" type="file" name="img5" id="img5">
            </div>


            <div class="mb-3" id="participant6" name ="participant6" style=display:none>
                <label for="participant6" class="form-label">participant 6</label>
                <input type="text" name="participant6" id="participant6">
            </div>
            <div class="mb-3" id="p6num" name ="p6num" style=display:none>
                <label for="p6num" class="form-label">Participant 6 Mobile Number</label>
                <input type="text" name="p6num" id="p6num">
            </div>
            <div class="mb-3" id="img6" name="img6" style=display:none>
                <label for="img6" class="form-label">ID proof </label>
                <input class="black" type="file" name="img6" id="img6">
            </div>
            <div class="mb-3" id="participant7" name ="participant7" style=display:none>
                <label for="participant7" class="form-label">participant 7</label>
                <input type="text" name="participant7" id="participant7">
            </div>
            <div class="mb-3" id="p7num" name ="p7num" style=display:none>
                <label for="p7num" class="form-label">Participant 7 Mobile Number</label>
                <input type="text" name="p7num" id="p7num">
            </div>
            <div class="mb-3" id="img7" name="img7" style=display:none>
                <label for="img7" class="form-label">ID proof </label>
                <input class="black" type="file" name="img7" id="img7">
            </div>

            <div class="mb-3" id="participant8" name ="participant8" style=display:none>
                <label for="participant8" class="form-label">participant 8</label>
                <input type="text" name="participant8" id="participant8">
            </div>
            <div class="mb-3" id="p8num" name ="p8num" style=display:none>
                <label for="p8num" class="form-label">Participant 8 Mobile Number</label>
                <input type="text" name="p8num" id="p8num">
            </div>
            <div class="mb-3" id="img8" name="img8" style=display:none>
                <label for="img8" class="form-label">ID proof </label>
                <input class="black" type="file" name="img8" id="img8">
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     <script>
//for attachment
$('#event-list').on('change', function() {
             
             if((this.value == "Mashup Singing") || (this.value=="Rapping") || (this.value=="Classical singing") || (this.value=="Western Duet Singing") || (this.value=="Mono Acting") || (this.value=="Solo classical dance") || (this.value=="western solo dance") || (this.value=="Short video choreography event") || (this.value=="Blended") || (this.value=="Fashion Styling Event") || (this.value=="Bollywood Group Dance") || (this.value=="Poetry Slam") || (this.value=="Ghost Story writing") || (this.value=="MMK")){
                 // $('#participant2').attr('required', true);
                 $("[name='attachment']").prop("required", true);
                 $('#attachment').show();
                 
             }
             //alert( this.value ); // or $(this).val()
             else {
                 alert( this.value ); // or $(this).val()
                 $("[name='attachment']").prop("required", false);
                 $('#attachment').hide();
             }
             });
//for events

$('#event-list').on('change', function() {
             
             if((this.value == "Rapping") || (this.value=="Classical singing")  || (this.value=="Western Duet Singing") || (this.value=="Blended") || (this.value=="Duo play") || (this.value=="Word Game") || (this.value=="Mandala + Quilling")  || (this.value=="Portrait Photography")  || (this.value=="Youtube Fest")  || (this.value=="News Reporting")  || (this.value=="Treasure Hunt") || (this.value=="Rocket League")  || (this.value=="IPL Auction")){
                 alert(this.value);
                 
               
                 // $('#participant2').attr('required', true);
                 $("[name='participant2']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $('#participant2').show();
                 $('#p2num').show();
                 $('#img2').show();
                 
                 // $('#freeform_first_name').removeAttr('required');
                 $('#p3num').hide();
                 $('#p4num').hide();
                 $('#p5num').hide();
                 $('#p6num').hide();
                 $('#p7num').hide();
                 $('#p8num').hide();
                 $('#img3').hide();
                 $('#img4').hide();
                 $('#img5').hide();
                 $('#img6').hide();
                 $('#img7').hide();
                 $('#img8').hide();
                 $('#participant3').hide();
                 $('#participant4').hide();
                 $('#participant5').hide();
                 $('#participant6').hide();
                 $('#participant7').hide();  
                 $('#participant8').hide();
             }
             else if((this.value == "Short Film Making") || (this.value=="The Ultimate Challenge") || (this.value=="BGMI")){
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
                 $('#img2').show();
                 $('#img3').show();
                 $('#img4').show();

        
                 $('#p5num').hide();
                 $('#p6num').hide();
                 $('#p7num').hide();
                 $('#p8num').hide();
                 $('#img5').hide();
                 $('#img6').hide();
                 $('#img7').hide();
                 $('#img8').hide();
                 $('#participant5').hide();
                 $('#participant6').hide();
                 $('#participant7').hide();  
                 $('#participant8').hide();
             }
             else if((this.value == "Ad Film Making") || (this.value == "CSGO") || (this.value == "Valorant") || (this.value == "Football")){
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
                 $('#p2num').show();
                 $('#p3num').show();
                 $('#p4num').show();
                 $('#p5num').show();
                 $('#img2').show();
                 $('#img3').show();
                 $('#img4').show();
                 $('#img5').show();   

                 $('#p6num').hide();
                 $('#p7num').hide();
                 $('#p8num').hide();
                 
                 $('#img6').hide();
                 $('#img7').hide();
                 $('#img8').hide();
                
                 $('#participant6').hide();
                 $('#participant7').hide();  
                 $('#participant8').hide();
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
                 $('#img2').show();
                 $('#img3').show();
                 $('#img4').show();
                 $('#img5').show();
                 $('#img6').show();
                 $('#img7').show();

                 $('#p8num').hide();

                 $('#img8').hide();
 
                 $('#participant8').hide();
             }
             else if((this.value == "Panache") || (this.value == "Hindi band event") || (this.value == "Street dance") || (this.value == "Bollywood Group Dance") ){
                 alert(this.value);
                 $("[name='participant2']").prop("required", true);
                 $("[name='participant3']").prop("required", true);
                 $("[name='participant4']").prop("required", true);
                 $("[name='participant5']").prop("required", true);
                 $("[name='participant6']").prop("required", true);
                 $("[name='participant7']").prop("required", true);
                 $("[name='participant8']").prop("required", true);
                 $("[name='p2num']").prop("required", true);
                 $("[name='p3num']").prop("required", true);
                 $("[name='p4num']").prop("required", true);
                 $("[name='p5num']").prop("required", true);
                 $("[name='p6num']").prop("required", true);
                 $("[name='p7num']").prop("required", true);
                 $("[name='p8num']").prop("required", true);
                 $("[name='img2']").prop("required", true);
                 $("[name='img3']").prop("required", true);
                 $("[name='img4']").prop("required", true);
                 $("[name='img5']").prop("required", true);
                 $("[name='img6']").prop("required", true);
                 $("[name='img7']").prop("required", true);
                 $("[name='img8']").prop("required", true);
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
                 $('#img2').show();
                 $('#img3').show();
                 $('#img4').show();
                 $('#img5').show();
                 $('#img6').show();
                 $('#img7').show();
                 $('#img8').show();
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

                 $('#img2').hide();
                 $('#img3').hide();
                 $('#img4').hide();
                 $('#img5').hide();
                 $('#img6').hide();
                 $('#img7').hide();
                 $('#img8').hide();
             }
            });
            </script>
    </body>
</html>

