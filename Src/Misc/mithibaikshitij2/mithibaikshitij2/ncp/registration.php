<?php
  require_once "../includes/config.php";

    $insert = false;
    $everything=true;

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
   // Collect post variables
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $collegename = $_POST['collegename'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $dob = $_POST['dob'];
   $file = $_FILES['file'];
   $govt_id = $_FILES['govt_file'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];
  
   $filename=$file['name'];
   $filepath=$file['tmp_name'];
   $fileerror=$file['error'];

   if ($file['size']<500000){

    //flag sing for file size
    

    if($fileerror==0){
        // $destfile='../uploads/'.$filename;
        // move_uploaded_file($filepath , $destfile);

        date_default_timezone_set("Asia/Calcutta");
        $newfilename = date("h-i-sa Y-m-d").rand().$filename;
        $destfile='../uploads/'.$newfilename;
        move_uploaded_file($filepath , $destfile);
    }
    }else{
        $everything=false;
        echo '<script>alert("Check file size before uploading!")</script>';
    }


    //govt id proof
    if ($govt_id['size']<500000){

        //flag sing for file size
        
    
        if($fileerror==0){
            // $destfile='../uploads/'.$filename;
            // move_uploaded_file($filepath , $destfile);
    
            date_default_timezone_set("Asia/Calcutta");
            $newfilename1 = date("h-i-sa Y-m-d").rand().$filename;
            $destfile1='../uploads/'.$newfilename1;
            move_uploaded_file($filepath , $destfile1);
        }
        }else{
            $everything=false;
            echo '<script>alert("Check file size before uploading!")</script>';
        }


    function isDigits(string $phone, int $minDigits = 10, int $maxDigits = 10): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $phone);
    }

    if(strlen($phone) === 10 && isDigits($phone)){
        // $phonevalidate=true;
    }else{
        echo '<script>alert("Enter valid phone number!")</script>';
       $everything=false;
    }

       //email authentication
            $sql = "SELECT email FROM pi_regi WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "s", $email);
    
                // Set the value of param username
                $email = trim($_POST['email']);
    
                // Try to execute this statement
                if(mysqli_stmt_execute($stmt)){
                    
                    mysqli_stmt_store_result($stmt);
                   
                    if(mysqli_stmt_num_rows($stmt) > 0)
                    {
                        echo '<script>alert("Email is already registered!")</script>';
                        // echo (mysqli_stmt_execute($stmt));
                        $everything=false;
                    }
                    else{
                        $email = trim($_POST['email']);
                    }
                }
                else{
                    echo '<script>alert("Something went wrong")</script>';
                }
            }
        
    
        mysqli_stmt_close($stmt);
    
    
        //Generate NCPXXX
        $sql = "SELECT id from pi_regi order by id desc limit 1";
        $stmt = mysqli_prepare($conn, $sql);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            // echo "hi";
            if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                        mysqli_stmt_bind_result($stmt, $db_id);

                        
                        if(mysqli_stmt_fetch($stmt))
                        { 
                            $ncp_id  = (int)$db_id+1;
                            $ncpuser = "NCP".$ncp_id;
                            // echo "NCP id is : ",$ncpuser;
                            //echo $ncp_id;
                        }
                        else{
                            echo "error";
                        }

                    }
            elseif (mysqli_stmt_num_rows($stmt) == 0){
                $ncpuser="NCP1";

            }

        }

        
//EMAIL
$to_email = $email;
$subject = "Welcome ".$fname." ".$lname." to Mithibai Kshitij";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// $body = "Hello ".$fname." ".$lname." your ID is : ".$ncpuser." and password is : ".$password;
$body = "<html><body> 
<h3>SVKM'S MITHIBAI COLLEGE & CEREBRA INTEGRATED TECHNOLOGIES PRESENTS KSHITIJ'21 - HAR DIL EK SITARA. </h3> <br>

Greetings <b>$fname!!</b><br>
Your NCP ID is <b> $ncpuser </b> and password is <b> $password </b> for <b>Kshitij'21 - ‘Har Dil Ek Sitara’.</b> <br>
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
$headers .= "From: testmailkshitij@gmail.com";



    // Check for password
    
    if(strlen(trim($_POST['password'])) < 5){
        echo '<script>alert("Password cannot be less than 5 character")</script>';
        $everything=false;
    }

    // Check for confirm password field
    if(trim($_POST['password']) !=  trim($_POST['cpassword'])){
        echo '<script>alert("Password should match!")</script>';
       $everything=false;
    }


    

    if($everything){
  

        if($everything){
            $sql = "INSERT INTO `mithibai_kshitij`.`pi_regi` (`NCPID`, `fname`, `lname`, `collegename`,`email`, `phone`, `dob`, `file`, `govt_id` ,`password`, `cpassword`,`dt`) VALUES ('$ncpuser','$fname','$lname','$collegename','$email', '$phone', '$dob', '$destfile','$destfile1','$password', '$cpassword', current_timestamp());";
            if($conn->query($sql) == true){
            // echo "Successfully inserted";        
            echo '<script>alert("registered succesfully")</script>';
            mail($to_email, $subject, $body, $headers);
            header("location: ncplogin.php");
            // Flag for successful insertion
            $insert = true;
            } 
            else{
                // echo "ERROR: $sql <br> $conn->error";
                echo "<script>alert('ERROR: $sql <br> $conn->error')</script>";
            }
           } 
           else {
               echo "Hey Please Fill Carefully!";
           }

                        
    }



  }
  ?>





<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
<head>
    
     <!--  meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>NCP Registration Form</title>
    <link rel="stylesheet" href="../Global.css">
    <style>
        h1{
            font-size: 40px;
        }
    </style>
    
</head>
<body>

    <div class="container">
        <h1>NCP Registration</h3>
        <p>Enter your details and submit this form to register </p>
        <hr>
        <!-- display success message -->
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?>


        <form action="registration.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name *</label>
                <input type="text" name="fname" id="fname" required>
               <!-- <div id="name-help" class="form-text">please enter your full name</div>  -->
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name *</label>
                <input type="text" name="lname" id="lname" required>
            </div>
            <div class="mb-3">
                <label for="collegename" class="form-label">College Name *</label>
                <input type="text" name="collegename" id="collegename" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email *</label>
                <input type="email" name="email" id="email"  required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number *</label>
                <input type="phone" name="phone" id="phone" required >
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">DOB *</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">College ID / Fee Receipt (max:500 kb) *</label>
                <input class="black" type="file" name="file" id="file" required >
            </div>
            <div class="mb-3">
                <label for="govt_file" class="form-label">Government ID Proof (max:500 kb)</label>
                <input class="black" type="file" name="govt_file" id="govt_file">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> Create Password *</label>
                <input type="password" name="password" id="password" >
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label"> Confirm Password *</label>
                <input type="password" name="cpassword" id="cpassword" >
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</script>
<script>
    $('#phone').on('change', function() {
            if ($.isNumeric($("input#phone").val()) && $("input#phone").val().length == 10){
                // alert('Done');
            }  
            else{
                alert('Mobile number invalid');
                $("input#phone").val("");
            }
              
        }); 
        $('#password').on('change', function() {
        if ($("input#password").val().length>=6 && $("input#password").val().length<=16){
            // alert('Done');
        }  
        else{
            alert('Password Length Should be between 6 to 16');
            $("input#password").val("");
        }
    });
    $('#cpassword').on('change', function() {
        if ($("input#cpassword").val()== $("input#password").val() ){
            // alert('Done');
        }  
        else{
            alert('Please Enter same password');
            $("input#cpassword").val("");
        }
            
    });
    $('#file').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#file").val("")
  } 
});

$('#govt_file').on('change', function() {
  var numb = $(this)[0].files[0].size / 1024 / 1024;
  numb = numb.toFixed(2);
  if (numb > 0.5) {
    alert('to big, maximum is 500Kb. You file size is: ' + numb + ' MiB');
    $("#govt_file").val("")
  } 
});
</script>
    </body>
</html>

