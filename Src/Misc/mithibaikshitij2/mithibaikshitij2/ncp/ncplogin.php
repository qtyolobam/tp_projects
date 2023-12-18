<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['ncploggedin']))
{
    header("location: ../dashboard/NCP_dashboard.php");
    exit;
}
require_once "../includes/config.php";

$ncpid = $password = "";
$err = "";


// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['ncpid'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter ncpid + password";
        // echo $err;
        echo "<script>alert('$err')</script>";
    }
    else{
        $ncpid = trim($_POST['ncpid']);
        $password = trim($_POST['password']);
    }

    
    if(empty($err))
    {
        
        $sql = "SELECT NCPID, password FROM pi_regi WHERE NCPID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $ncpid);
        $ncpid = $ncpid;
       
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
                                //session_start();
                                // echo $db_id;
                                echo "<script>alert('$db_id')</script>";
                                $_SESSION["ncpid"] = $db_id;
                                //$_SESSION["id"] = $id;
                                $_SESSION["ncploggedin"] = true;

                                //Redirect user to welcome page
                                // echo 'login hogaya';
                                header("location: ../dashboard/NCP_dashboard.php");
                                
                            }else{
                                echo '<script>alert("Enter correct NCP ID and Password")</script>';
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
     
     <!-- Tangerine & Trirong font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
     <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&family=Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../Global1.css">
    <title>NCP Login</title>

    <style>
        .form-label{
            width:15rem;
        }
        #name-help{
            color:white;
        }
        h1{
        font-size: 40px;
    }
        
    @media only screen and (max-width: 600px) {
    .body{
    background-repeat: none;
    background-size: cover;
    background-attachment: fixed;
    text-align: center;
    }
    p{
        font-size: 15px;
    }
    .container-manual {
      width: 90%;
      padding: 30px 30px;
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
}
    </style>
</head>
<body>

    <div class="container-manual">
        <h1>NCP Login</h1>
        <p>Enter your details to login </p>
        <hr>
        <!-- display success message -->
        <!-- <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?> -->


        <form action="ncplogin.php" method="post">
            <div class="mb-3">
                <label for="ncpid" class="form-label">NCP ID</label>
                <input type="text" name="ncpid" id="ncpid" >
                <div id="name-help" class="form-text">Enter your NCP ID and password recieved through mail</div>
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