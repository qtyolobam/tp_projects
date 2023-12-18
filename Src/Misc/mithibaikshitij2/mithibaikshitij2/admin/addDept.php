<?php

  
  require_once "../includes/config.php";



    $insert = false;
    $everything=true;
     //Generate CCXXX Code
     $sql = "SELECT dept_id from departments order by dept_id desc limit 1";
     $stmt = mysqli_prepare($conn, $sql);
     if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
         // echo "hi";
         if(mysqli_stmt_num_rows($stmt) == 1)
                 {
                     mysqli_stmt_bind_result($stmt, $db_id);

                     
                     if(mysqli_stmt_fetch($stmt))
                     { 
                         $deptid  = (int)$db_id+1;
                        //  $ccuser = "CC".$userid;
                         //echo "CC id is : ",$ccuser;
                         //echo $ncp_id;
                     }
                     else{
                         echo "error";
                     }

                 }

     }

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
   // Collect post variables
   $deptid = $_POST['deptid'];
   $deptname = $_POST['deptname'];
   



    if($everything){


        $sql = "INSERT INTO departments(`dept_id`,`dept_name`) VALUES ('$deptid','$deptname');";

        // Execute the query
        if($conn->query($sql) == true){
        // echo "Successfully inserted";
        
        // echo '<script>alert("registered succesfully")</script>';

       
        header("location: addDept.php");
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
     <link rel="stylesheet" href="../Global1.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Add Dept</title>
    
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
        <h1>Add Department</h3>
        <p>Enter Department Details</p>
        <hr>
        <!-- display success message -->
         <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?> 


        <form action="addDept.php" method="post">
            <div class="mb-3">
                <label for="deptid" class="form-label">Department id</label>
                <input type="text" name="deptid" id="deptid" value = "<?php echo $deptid;?>" readonly >
                <!--<div id="name-help" class="form-text">enter your ncp id recievd through mail</div>-->
            </div>
            <div class="mb-3">
                <label for="deptname" class="form-label">Department Name</label>
                <input type="text" name="deptname" id="deptname" >
                <!--<div id="name-help" class="form-text">enter your ncp id recievd through mail</div>-->
    </div>
          
            <button type="submit"  class="btn btn-primary">Add !</button>
            <!-- <a href="../logout/logout.php">logout</a> -->
        </form>
    </div>
   
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>