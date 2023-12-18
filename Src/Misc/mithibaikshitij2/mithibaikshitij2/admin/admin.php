<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['Admin_loggedin']))
{
    header("location:admin_dashboard.php");
    exit;
}
require_once "../includes/config.php";

$userid = $password = "";
$err = "";


// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['userid'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter userid + password";
        echo $err;
    }
    else{
        $userid = trim($_POST['userid']);
        $password = trim($_POST['password']);
    }

    
    if(empty($err))
    {
        
        $sql = "SELECT userid, password FROM admin WHERE userid = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $userid);
        $userid= $userid;
       
        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            
            
            mysqli_stmt_store_result($stmt);
            // echo "hi";
            if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                        mysqli_stmt_bind_result($stmt, $db_id,  $db_password);

                       
                        
                        if(mysqli_stmt_fetch($stmt))
                        { 
                            
                            if($password===$db_password)
                            {
                                // this means the password is corrct. Allow user to login
                                session_start();
                                
                                $_SESSION["Admin_loggedin"] = true;
                               
                                //Redirect user to welcome page
                                // echo 'login hogaya';
                                header("location: admin_dashboard.php");
                                
                            }else{
                              echo '<script>alert("Enter correct Admin ID and Password")</script>';
                            }
                        }

                    }

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
    <title>Admin Login</title>
    
    
  

    
</head>

<style>
h1{
    font-size:45px;
}
</style>

<body>



    <div class="container-manual">
        <h1>Admin Login</h3>
        <p>Enter your details to login </p>
        <hr>
        <!-- display success message -->
        <!-- <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?> -->


        <form action="admin.php" method="post">
            <div class="mb-3">
                <label for="userid" class="form-label">User id</label>
                <input type="text" name="userid" id="userid" >
                <!--<div id="name-help" class="form-text">enter your ncp id recievd through mail</div>-->
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" id="password"  >
            </div>
          
           
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

   
   
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>