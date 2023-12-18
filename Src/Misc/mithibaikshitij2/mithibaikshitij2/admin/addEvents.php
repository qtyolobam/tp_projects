<?php
namespace Phppot;

use Phppot\DepartmentEvent;
require_once __DIR__ . '/../events/Model/DepartmentEvent.php';
$departmentEvent = new DepartmentEvent();
$departmentResult = $departmentEvent->getAllDepartment();
?>


<?php

  
  require_once "../includes/config.php";

 

    $insert = false;
    $everything=true;
     //Generate CCXXX Code
    //  $sql = "select event_id from events,departments where departments.dept_name = '$deptname' order by event_id desc limit 1 ";
    //  $stmt = mysqli_prepare($conn, $sql);
    //  if(mysqli_stmt_execute($stmt)){
    //      mysqli_stmt_store_result($stmt);
    //      // echo "hi";
    //      if(mysqli_stmt_num_rows($stmt) == 1)
    //              {
    //                  mysqli_stmt_bind_result($stmt, $db_id);

                     
    //                  if(mysqli_stmt_fetch($stmt))
    //                  { 
    //                      $deptid  = (int)$db_id+1;
    //                     //  $ccuser = "CC".$userid;
    //                      //echo "CC id is : ",$ccuser;
    //                      //echo $ncp_id;
    //                  }
    //                  else{
    //                      echo "error";
    //                  }

    //              }

    //  }

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
   // Collect post variables
   $deptid = $_POST['dept_id'];
   $deptname = $_POST['department'];
   $eventname = $_POST['eventname'];
   



    if($everything){


        $sql = "INSERT INTO events(`event_name`) VALUES ('$eventname');";

        // Execute the query    
        if($conn->query($sql) == true){
        // echo "Successfully inserted";
        
        // echo '<script>alert("registered succesfully")</script>';

       
        header("location: addEvents.php");
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

        <!-- function for geetting -->
        <script src="../events/vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getEvent(val) {
    $("#loader").show();
	$.ajax({
	type: "POST",
    // /../events/Model/DepartmentEvent.php
	url: "../events/ajax/get-department-event-ep.php",
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
        <h1>Add Events</h3>
        <p>Enter Event Details</p>
        <hr>
        <!-- display success message -->
         <?php
        if($insert == true){
        echo "<p class='submitMsg'>Form Submitted Successfully.</p>";
        }
        ?> 


        <form action="addEvents.php" method="post">

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

            <div class="mb-3">
                <label for="eventname" class="form-label">Event Name</label>
                <input type="text" name="eventname" id="eventname" >
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