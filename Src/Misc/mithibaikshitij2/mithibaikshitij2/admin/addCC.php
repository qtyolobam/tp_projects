<?php

  
  require_once "../includes/config.php";

 


    $insert = false;
    $everything=true;
     //Generate CCXXX Code
     $sql = "SELECT id from cclogin order by id desc limit 1";
     $stmt = mysqli_prepare($conn, $sql);
     if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
         // echo "hi";
         if(mysqli_stmt_num_rows($stmt) == 1)
                 {
                     mysqli_stmt_bind_result($stmt, $db_id);

                     
                     if(mysqli_stmt_fetch($stmt))
                     { 
                         $userid  = (int)$db_id+1;
                         $ccuser = "CC".$userid;
                         //echo "CC id is : ",$ccuser;
                         //echo $ncp_id;
                     }
                     else{
                         echo "error";
                     }

                 }
                 elseif (mysqli_stmt_num_rows($stmt) == 0){
                  $ccuser="CC1";
  
              }

     }

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
   // Collect post variables
   $userid = $_POST['userid'];
   $collegename = $_POST['collegename']; 
   $phone = $_POST['phone'];
   $emailid = $_POST['emailid'];
   $password=$_POST['password'];

        
        
    // Check for password
    
    if(strlen(trim($_POST['password'])) < 5){
        echo "Password cannot be less than 5 characters";
        $everything=false;
    }

    // Check for confirm password field
    if(trim($_POST['password']) !=  trim($_POST['cpassword'])){
       echo "Passwords should match";
       $everything=false;
    }
   

//email authentication
$sql = "SELECT collegename FROM pi_regi WHERE collegename = ?";
$stmt = mysqli_prepare($conn, $sql);
if($stmt)
{
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Set the value of param username
    $email = trim($_POST['collegename']);

    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        
        mysqli_stmt_store_result($stmt);
       
        if(mysqli_stmt_num_rows($stmt) > 0)
        {
            echo '<script>alert("College is already registered!")</script>';
            echo '<script>window.location.href="addCC.php"</script>';
            // echo (mysqli_stmt_execute($stmt));
            $everything=false;
        }
        else{
            $email = trim($_POST['collegename']);
        }
    }
    else{
        echo '<script>alert("Something went wrong")</script>';
    }
}


mysqli_stmt_close($stmt);




    if($everything){


        $sql = "INSERT INTO `mithibai_kshitij`.`cclogin` (`userid`, `collegename`,`email`,`phone`, `password`) VALUES ('$ccuser','$collegename','$emailid','$phone','$password');";

        // Execute the query
        if($conn->query($sql) == true){
        // echo "Successfully inserted";
        
        // echo '<script>alert("registered succesfully")</script>';

       
        header("location: addCC.php");
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
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
     <!--  meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <link rel="stylesheet" href="../Global1.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <title>Add CC</title>
    

</head>
<?php
  session_start();
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }
?>
<body>
    <header class="dashboard">
        <?php include "../global/admin_sidebar.php" ?>
    </header>

    <div class="container-manual">
        <h1>Add CC</h3>
        <p>Enter CC details </p>
        <hr>
        <!-- display success message -->
         <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?> 


        <form action="addCC.php" method="post">
            <div class="mb-3">
                <label for="userid" class="form-label">User id</label>
                <input type="text" name="userid" id="userid" value = "<?php echo $ccuser;?>" >
                <!--<div id="name-help" class="form-text">enter your ncp id recievd through mail</div>-->
            </div>
            <div class="mb-3">
                <label for="collegename" class="form-label">College Name</label>
                <input type="text" name="collegename" id="collegename" >
                <!--<div id="name-help" class="form-text">enter your ncp id recievd through mail</div>-->
            </div>
            <div class="mb-3">
                <label for="emailid" class="form-label">Email Id</label>
                <input type="email" name="emailid" id="emailid" >
                <!--<div id="name-help" class="form-text">enter your ncp id recievd through mail</div>-->
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Mobile Number</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" id="password"  >
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword"  >
            </div>
          
           
            <button type="submit"  class="btn btn-primary">Add !</button>
            <!-- <a href="../logout/logout.php">logout</a> -->
        </form>
    </div>
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>