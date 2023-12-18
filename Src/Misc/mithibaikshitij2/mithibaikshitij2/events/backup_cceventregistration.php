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
    // $sql = "SELECT fname,lname,collegename,email,phone,dob from cclogin where userid='$loginuser'";//idr login krne ke baad session id se compare karna hoga
    //$sql1 = "SELECT fname from pi_regi where NCPID='NCP2'";
    // $stmt = mysqli_prepare($conn, $sql);
    // if(mysqli_stmt_execute($stmt)){
    //     mysqli_stmt_store_result($stmt);
    //     // echo "hi";
    //     if(mysqli_stmt_num_rows($stmt) == 1)
    //             {
    //                 mysqli_stmt_bind_result($stmt, $fst_name,$lst_name,$clg_name,$eml,$phn,$dob);

                    
    //                 if(mysqli_stmt_fetch($stmt))
    //                 { 
    //                     $first_name=$fst_name;
    //                     $last_name=$lst_name;
    //                     $college_name=$clg_name;
    //                     $email_id=$eml;
    //                     $phone_no = $phn;
    //                     $dobb = $dob;

    //                     //echo "CC id is : ",$ccuser;
    //                     //echo $ncp_id;
    //                 }
    //                 else{
    //                     echo "error";
    //                 }

    //             }

    // }
    //end

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
   // Collect post variables
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $collegename = $_POST['collegename'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $dob = $_POST['dob'];
   $attachment =$_POST['attachment'];
   $event = $_POST['event'];
   $deptname = $_POST['department'];
   $p2 = $_POST['participant2'];
   $p3 = $_POST['participant3'];
   $p4 = $_POST['participant4'];
   $p5 = $_POST['participant5'];
   $p6 = $_POST['participant6'];

    echo $event;
   
    $loginuser = $_SESSION['ccid'];
    echo $loginuser ;
    // echo $loginuser;



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
                        // echo (mysqli_stmt_execute($stmt));
                        $everything=false;
                    }
                   
                }
                else{
                    echo "Something went wrong";
                }
          
        
    
    
    


//EMAIL

$to_email = $email;
$subject = "You Have Successully Registered for  $event";
$body = "Hello ".$loginuser." thank you for registering for  $event.";
$headers = "From: testmailkshitij@gmail.com";

    if(empty($p2) && empty($p3) && empty($p4) && empty($p5) && empty($p6)){
        $fullname= $fname." ".$lname;
        // $fullname="Aman";
    }
    elseif(empty($p3) && empty($p4) && empty($p5) && empty($p6)){
        $fullname= $fname." ".$lname." \nP2 : ".$p2;
    } 
    elseif(empty($p4) && empty($p5) && empty($p6)){
        $fullname= $fname." ".$lname." \nP2 : ".$p2." \nP3 : ".$p3;
    }  
    elseif(empty($p5) && empty($p6)){
        $fullname= $fname." ".$lname." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4;
    }
    elseif(empty($p6)){
        $fullname= $fname." ".$lname." \nP2 : ".$p2." \nP3 : ".$p3." \nP4 : ".$p4." \nP5 : ".$p5;
    }



    if($everything){
        if (mail($to_email, $subject, $body, $headers)) {
            // echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }


        $sql = "INSERT INTO `cceventregi` (`ccid`,`college_name`,`email`,`phone_number`, `dept_name`,`event_name`,`participant_name`,`dob`,`attachment`,`timeofregistration`) VALUES ('$loginuser','$collegename','$email','$phone','$deptname','$event','$fullname','$dob','$attachment',current_timestamp());";

        // Execute the query
        if($conn->query($sql) == true){
        // echo "Successfully inserted";
        
        // echo '<script>alert("registered succesfully")</script>';

       
        // header("location: ncpeventregistration.php");
        // Flag for successful insertion
        $insert = true;
                                    } 
        else{
            echo "ERROR: $sql <br> $conn->error";
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


        <form action="cceventregistration.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" name="fname" id="fname"   required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" name="lname" id="lname"   required>
            </div>
            <div class="mb-3">
                <label for="collegename" class="form-label">College Name</label>
                <input type="text" name="collegename" id="collegename"   required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Enter your phone number</label>
                <input type="phone" name="phone" id="phone"  required >
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">DOB</label>
                <input type="date" name="dob" id="dob"  required>
            </div>
            <div class="mb-3">
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
            </div>

            <!-- displaying events -->
            <div class="mb-3" id="events">
                <label>Event Name:</label><br /> 
                 <select name="event" id="event-list">
                <option value="">Select Event</option>
                </select>
            </div>

            <div class="mb-3" id="attachment" name ="attachment">
                <label for="attachment" class="form-label">Attachment Link</label>
                <input type="text" name="attachment" id="attachment" required >
            </div>

            <div class="mb-3" id="participant2" name ="participant2" style=display:none>
                <label for="participant2" class="form-label">Participant 2</label>
                <input type="text" name="participant2" id="participant2">
            </div>

            <div class="mb-3" id="participant3" name ="participant3" style=display:none>
                <label for="participant3" class="form-label">participant 3</label>
                <input type="text" name="participant3" id="participant3">
            </div>
            <div class="mb-3" id="participant4" name ="participant4" style=display:none>
                <label for="participant4" class="form-label">participant 4</label>
                <input type="text" name="participant4" id="participant4">
            </div>
            <div class="mb-3" id="participant5" name ="participant5" style=display:none>
                <label for="participant5" class="form-label">participant 5</label>
                <input type="text" name="participant5" id="participant3">
            </div>
            <div class="mb-3" id="participant6" name ="participant6" style=display:none>
                <label for="participant6" class="form-label">participant 6</label>
                <input type="text" name="participant6" id="participant6">
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     <script>
            $('#event-list').on('change', function() {
             
            if((this.value == "Rapping") || (this.value=="Western Duet Singing") || (this.value=="Duo play") || (this.value=="Blended") || (this.value=="Classical solo singing") || (this.value=="Comedy Event") || (this.value=="Word Game Event") || (this.value=="Mandala + quilling ") || (this.value=="YouTube fest") || (this.value=="Rocket League") || (this.value=="Portrait Photography")){
                alert(this.value);
                $("[name='participant2']").prop("required", true);
                $('#participant2').show();
                $('#participant3').hide();
                $('#participant4').hide();
                $('#participant5').hide();
                $('#participant6').hide();  
            }
            else if((this.value == "Short film") || (this.value=="Ad film ") || (this.value=="BGMI")){
                alert(this.value);
                $("[name='participant2']").prop("required", true);
                $("[name='participant3']").prop("required", true);
                $("[name='participant4']").prop("required", true);
                $('#participant2').show();
                $('#participant3').show();
                $('#participant4').show();
            }
            else if((this.value == "CODM") || (this.value == "CSGO") || (this.value == "Valorant")){
                alert(this.value);
                $("[name='participant2']").prop("required", true);
                $("[name='participant3']").prop("required", true);
                $("[name='participant4']").prop("required", true);
                $("[name='participant5']").prop("required", true);
                $('#participant2').show();
                $('#participant3').show();
                $('#participant4').show();
                $('#participant5').show();
                $('#participant6').hide(); 
            }
            //alert( this.value ); // or $(this).val()
            else {
                alert( this.value ); // or $(this).val()
                $("[name='participant2']").prop("required", false);
                $("[name='participant3']").prop("required", false);
                $("[name='participant4']").prop("required", false);
                $("[name='participant5']").prop("required", false);
                $("[name='participant6']").prop("required", false);
                $('#participant2').hide();
                $('#participant3').hide();
                $('#participant4').hide();
                $('#participant5').hide();
                $('#participant6').hide();
            }
            });
            </script>
    </body>
</html>

